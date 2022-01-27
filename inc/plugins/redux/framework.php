<?php
/*
** Get current framework
**/
function jevelin_framework( $framework = '' ) {
    $current_framework = get_option( 'jevelin_framework' );
    if( in_array( $current_framework, [ 'redux', 'unyson' ] ) ) :
        return $current_framework;

    // When no framework is set
    else :
        // Set Unyson if settings added and plugin activated
        if( get_option( 'fw_theme_settings_options:jevelin' ) && defined( 'FW' ) ) :
            update_option( 'jevelin_framework', 'unyson' );
            return 'unyson';

        // Set Redux if plugin activated
        elseif( class_exists( 'Redux' ) ) :
            update_option( 'jevelin_framework', 'redux' );
            return 'redux';

        // Set Unyson if plugin activated
        elseif( defined( 'FW' ) ) :
            update_option( 'jevelin_framework', 'unyson' );
            return 'unyson';

        // Output redux when framework no plugins activated
        else :
            return 'redux';
        endif;
    endif;
}

/*
** Get current framework
**/
function jevelin_framework_active() {
    if(
        ( class_exists( 'Redux' ) && jevelin_framework() == 'redux' ) ||
        ( defined( 'FW' ) && jevelin_framework() == 'unyson' )
    ) :
        return true;
    endif;
}


/*
** Disable Unyson
**/
if( jevelin_framework() == 'redux' ) :
    add_action( 'admin_menu', 'remove_unyson_theme_settings', 999 );
    function remove_unyson_theme_settings() {
    	remove_submenu_page( 'themes.php', 'fw-settings' );
    }

    global $pagenow;
    $themes_page_id = isset( $_GET['page'] ) ? $_GET['page'] : '';
    if( $pagenow == 'themes.php' && $themes_page_id == 'fw-settings' ) :
        wp_redirect( admin_url( '/' ) );
        exit;
    endif;
endif;


/**
 * Add link to theme settings
 */
if ( !function_exists( 'jevelin_theme_options_link' ) && current_user_can('manage_options') && jevelin_framework_active() ) :
    function jevelin_theme_options_link( $wp_admin_bar ) {
        $url = ( jevelin_framework() == 'redux' ) ? 'admin.php?page=jevelin-theme-settings' : 'themes.php?page=fw-settings';

        $args = [
            'id' => 'jevelin-options',
            'title' => 'Jevelin Settings',
            'href' => get_admin_url( NULL, $url ),
        ];
        $wp_admin_bar->add_node( $args );
    }
    add_action( 'admin_bar_menu', 'jevelin_theme_options_link', 999 );
endif;


/**
** Theme Body Class
**/
add_filter( 'admin_body_class', 'jevelin_admin_body_class' );
function jevelin_admin_body_class( $classes ) {
    return $classes . ' jevelin-theme';
}


/**
 * Dynamic Styles Update
 */
if( !function_exists( 'jevelin_dynamic_styles_update' ) ) :
    function jevelin_dynamic_styles_update() {

        $css = jevelin_render_css();
        $upload_dir = wp_upload_dir();
        if( isset( $upload_dir['basedir'] ) ) :
            $file_path  = $upload_dir['basedir'] . '/jevelin-dynamic-styles.css';

            global $wp_filesystem;
            if( empty( $wp_filesystem ) ) :
                require_once ( ABSPATH . '/wp-admin/includes/file.php' );
                WP_Filesystem();
            endif;

            if( !$wp_filesystem || !$wp_filesystem->put_contents( $file_path, $css ) ) :
        		delete_option( 'jevelin_settings_updated' );
        	else :
                update_option( 'jevelin_settings_updated', rand( 10000000, 900000000 ) );
            endif;
        endif;

    }
    add_action( 'redux/options/jevelin_options/saved', 'jevelin_dynamic_styles_update' );
    add_action( 'fw_settings_form_saved', 'jevelin_dynamic_styles_update' );
    add_action( 'fw_settings_form_reset', 'jevelin_dynamic_styles_update' );
    add_action( 'customize_save_after', 'jevelin_dynamic_styles_update' );
    add_action( 'after_switch_theme', 'jevelin_dynamic_styles_update' );
endif;
