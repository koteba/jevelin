<?php
/**
 * Sync common Theme Settings and Customizer options db values
 * @internal
 */
class Jevelin_Sync_Customizer_Options {
    public static function init() {
        add_action('customize_save_after', array(__CLASS__, '_action_after_customizer_save'));
        add_action('fw_settings_form_saved', array(__CLASS__, '_action_after_settings_save'));
        add_action('fw_settings_form_reset', array(__CLASS__, '_action_after_settings_save'));

        /* Callback when lattest settings is not registered */
        add_action('customize_save_after', array(__CLASS__, '_action_after_customizer_save_delay'));
        add_action('customize_save_after_delay','Jevelin_Sync_Customizer_Options::_action_after_customizer_save', 5 );
    }

    /**
     * If a customizer option also exists in settings options, copy its value to settings option value
     */

     public static function _action_after_customizer_save_delay() {
         Jevelin_Sync_Customizer_Options::_action_after_customizer_save();
         wp_schedule_single_event(time() + 0, 'customize_save_after_delay');
     }


    public static function _action_after_customizer_save()
    {
        delete_transient( 'jevelin_css' );
        $settings_options = fw_extract_only_options(fw()->theme->get_settings_options());
        //error_log( print_r( $settings_options, true ) );

        foreach (
            array_intersect_key(
                fw_extract_only_options(fw()->theme->get_customizer_options()),
                $settings_options
            )
            as $option_id => $option
        ) {
            if ($option['type'] === $settings_options[$option_id]['type']) {
                fw_set_db_settings_option(
                    $option_id, fw_get_db_customizer_option($option_id)
                );
            }
        }
    }

    /**
     * If a settings option also exists in customizer options, copy its value to customizer option value
     */
    public static function _action_after_settings_save()
    {
        delete_transient( 'jevelin_css' );
        $customizer_options = fw_extract_only_options(fw()->theme->get_customizer_options());

        foreach (
            array_intersect_key(
                fw_extract_only_options(fw()->theme->get_settings_options()),
                $customizer_options
            )
            as $option_id => $option
        ) {
            if ($option['type'] === $customizer_options[$option_id]['type']) {
                fw_set_db_customizer_option(
                    $option_id, fw_get_db_settings_option($option_id)
                );
            }
        }
    }
}
Jevelin_Sync_Customizer_Options::init();




/**
 * Jevelin Predefined Templates - Deprecated
 */
if ( ( $e = get_option( 'fw_active_extensions' ) ) && isset( $e['page-builder'] ) ) :
    if( is_admin() ) :
        require_once trailingslashit( get_template_directory() ) . '/inc/presets.php';
    endif;
endif;
