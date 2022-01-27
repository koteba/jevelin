<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/*
 * Shufflehound - Core
 * Version: 0.6.0
 */
if( is_admin() ) :
    require_once ( trailingslashit( get_template_directory() ) . '/inc/core/dashboard.php' );
    require_once ( trailingslashit( get_template_directory() ) . '/inc/core/dashboard-header.php' );
    require_once ( trailingslashit( get_template_directory() ) . '/inc/core/dashboard-ocdi.php' );
    require_once ( trailingslashit( get_template_directory() ) . '/inc/core/dashboard-tgmpa.php' );
    require_once ( trailingslashit( get_template_directory() ) . '/inc/core/dashboard-system-status.php' );
    require_once ( trailingslashit( get_template_directory() ) . '/inc/core/dashboard-customize.php' );
    require_once ( trailingslashit( get_template_directory() ) . '/inc/core/dashboard-update.php' );
    require_once ( trailingslashit( get_template_directory() ) . '/inc/core/demos.php' );
    require_once ( trailingslashit( get_template_directory() ) . '/inc/core/unyson-import-settings.php' );
    require_once ( trailingslashit( get_template_directory() ) . '/inc/core/yellow-pencil-security-notification.php' );
    require_once ( trailingslashit( get_template_directory() ) . '/inc/core/page-settings.php' );

    if ( !function_exists( 'shufflehound_assets' ) ) :
        function shufflehound_assets() {
            $theme = wp_get_theme();
            $theme_version = ( $theme->Version ) ? $theme->Version : '';

            wp_enqueue_style( 'shufflehound-css', get_template_directory_uri() . '/inc/core/assets/shufflehound.css', array(), $theme_version );
        }
        add_action( 'admin_enqueue_scripts', 'shufflehound_assets' );
    endif;
endif;
