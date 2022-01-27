<?php
/**
 * Yellow Pencil Security Notification
 */
function sh_yellow_pencil_security_notification() {
    if( defined( 'YP_VERSION' ) ) :
        $version = constant( 'YP_VERSION' );
        if( version_compare( $version, '7.2.0') < 0 ) :

            echo '
            <div class="notice notice-error is-dismissible">
                <p style="margin-bottom: 0; padding-bottom: 0;">
                    <strong>It is Very Important to Update Yellow Pencil plugin</strong>
                </p>
                <p>Please update or uninstall (if you don\'t use it) Yellow Pencil plugin as all its versions below 7.2.0 have a security flaw.</p>
                <p>
                    <a href="'.admin_url( 'themes.php?page=tgmpa-install-plugins' ).'" class="button button-primary" style="margin-right: 15px;">Update Here</a>
                    <a href="'.admin_url( 'plugins.php' ).'" style="text-decoration: none;">Uninstall Here</a>
                </p>
            </div>';

        endif;
    endif;
}
add_action( 'admin_notices', 'sh_yellow_pencil_security_notification' );
