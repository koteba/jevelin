<?php
/**
 * Import Unyson Theme Settings
 */
add_action( 'wp_ajax_nopriv_import_unyson_theme_settings', 'sh_import_unyson_theme_settings' );
add_action( 'wp_ajax_import_unyson_theme_settings', 'sh_import_unyson_theme_settings' );

function sh_import_unyson_theme_settings() {
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) :

        $settings = ( isset( $_POST['settings'] ) && $_POST['settings'] ) ? json_decode( stripslashes_deep( $_POST['settings'] ), true ) : '';
        $settings = str_replace( '<script>', '', $settings );
        $settings = str_replace( '</script>', '', $settings );

        if( $settings ) :
            update_option( 'fw_theme_settings_options:jevelin', $settings, true );
        endif;
        echo 'OK!';

    endif;
	die();
}
