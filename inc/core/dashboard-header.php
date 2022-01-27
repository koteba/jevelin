<?php
/**
 * Dashboard Header
 */
function sh_tgmpa_header() {
    $page = ( isset( $_GET['page'] ) && $_GET['page'] ) ? $_GET['page'] : '';

    $theme = wp_get_theme();
    $theme_version = ( $theme->Version ) ? $theme->Version : '';
    $theme_name = shufflehound_theme();
    $theme_color = ( $theme_name == 'jevelin' ) ? '#294cff' : '#8d39ed';
    $theme_color2 = ( $theme_name == 'jevelin' ) ? '#dee3ff' : '#cb9eff';
?>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome-5.min.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/lightcase.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugins/lightcase.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready( function($) {
            $( "a[data-rel^=lightcase]" ).lightcase({
                maxWidth: 1000,
                maxHeight: 1000,
                video: {
                    width: 1000,
                    height: 562,
                },
                iframe: {
                    width: 1000,
                    height: 562,
                }
            });
        });
    </script>

    <div class="shufflehound-dashboard-logo">
        <div style="display: flex; align-items: center;">
            <div style="flex: 1;">
                <a href="<?php echo admin_url( 'admin.php?page=shufflehound_dashboard' ); ?>" style="display: inline-block; text-decoration: none;">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="" style="width: 95px;">
                    <div class="shufflehound-dashboard-theme-version">
                        <?php echo $theme_version; ?>
                    </div>
                </a>
            </div>
            <div class="shufflehound-dashboard-social">
                <a href="https://www.facebook.com/shufflehound/" target="_blank">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://www.youtube.com/channel/UChPD7Ly3-wD7jOunExM37GA" target="_blank">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="shufflehound-dashboard-header">
        <di class="shufflehound-dashboard-navigation-container">
            <ul class="shufflehound-dashboard-navigation shufflehound-dashboard-navigation-left">
                <li<?php echo ( $page == 'shufflehound_dashboard' ) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo admin_url( 'admin.php?page=shufflehound_dashboard' ); ?>">
                        <?php esc_html_e( 'Dashboard', 'shufflehound' ); ?>
                    </a>
                </li>

                <?php
                    $tgmpa = \TGM_Plugin_Activation::get_instance()->is_tgmpa_complete();
                    if( class_exists( 'TGM_Plugin_Activation' ) && !$tgmpa ) :
                ?>
                <li<?php echo ( $page == 'tgmpa-install-plugins' ) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo admin_url( 'themes.php?page=tgmpa-install-plugins' ); ?>">
                        <?php esc_html_e( 'Install Plugins', 'shufflehound' ); ?>
                    </a>
                </li>
                <?php endif; ?>


                <?php $phpversion = phpversion();
                if( class_exists( 'OCDI_Plugin' ) && version_compare( (float)$phpversion, '5.3.2', '>' ) ) : ?>
                    <li<?php echo ( $page == 'pt-one-click-demo-import' || $page == 'one-click-demo-import' ) ? ' class="active"' : ''; ?>>
                        <a href="<?php echo admin_url( 'themes.php?page=pt-one-click-demo-import' ); ?>">
                            <?php esc_html_e( 'Import Demo', 'shufflehound' ); ?>
                        </a>
                    </li>
                <?php else : ?>
                    <li<?php echo ( $page == 'shufflehound_ocdi_activate' ) ? ' class="active"' : ''; ?>>
                        <a href="<?php echo admin_url( 'admin.php?page=shufflehound_ocdi_activate' ); ?>">
                            <?php esc_html_e( 'Import Demo', 'shufflehound' ); ?>
                        </a>
                    </li>
                <?php endif; ?>


                <li<?php echo ( $page == 'shufflehound_templates' ) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo admin_url( 'admin.php?page=shufflehound_templates' ); ?>">
                        <?php esc_html_e( 'Templates', 'shufflehound' ); ?>
                    </a>
                </li>
                <li<?php echo ( $page == 'shufflehound_customize' || $page == 'fw-settings' || $page == 'jevelin-theme-settings' ) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo admin_url( 'admin.php?page=shufflehound_customize' ); ?>">
                        <?php esc_html_e( 'Customize', 'shufflehound' ); ?>
                    </a>
                </li>
                <li<?php echo ( $page == 'shufflehound_system' ) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo admin_url( 'admin.php?page=shufflehound_system' ); ?>">
                        <?php esc_html_e( 'Status', 'shufflehound' ); ?>
                    </a>
                </li>
            </ul>

            <ul class="shufflehound-dashboard-navigation shufflehound-dashboard-navigation-right">
                <li<?php echo ( $page == 'shufflehound_support' ) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo admin_url( 'admin.php?page=shufflehound_support' ); ?>">
                        <?php esc_html_e( 'Support Center', 'shufflehound' ); ?>
                    </a>
                </li>
                <li<?php echo ( $page == 'shufflehound_documentation' ) ? ' class="active"' : ''; ?>>
                    <a href="<?php echo admin_url( 'admin.php?page=shufflehound_documentation' ); ?>">
                        <?php esc_html_e( 'Documentation', 'shufflehound' ); ?>
                    </a>
                </li>
            </ul>
        </di>
    </div>


    <style media="screen">
        #setting-error-tgmpa {
            display: none!important;
        }

        /* Accent Color */
        .tgmpa.wrap .subsubsub li:not(.all) a,
        #tgmpa-plugins td.plugin strong > a,
        .shufflehound-dashboard-content a,
        .shufflehound-dashboard-social a:hover i,
        #wpbody-content > .tgmpa .update-php p a,
        .ocdi__gl-navigation li a:hover,
        .shufflehound-dashboard-start-item .shufflehound-dashboard-start-item-button {
            color: <?php echo esc_attr( $theme_color ); ?>;
        }

        .shufflehound-dashboard-start-item:hover > h3,
        .fw-backend-option a,
        .fw-backend-option input[type=checkbox]:checked:before,
        .fw-option-type-switch .adaptive-switch.switch-right .switch-switcher label.switch-label {
            color: <?php echo esc_attr( $theme_color ); ?>!important;
        }

        .ui-state-default.ui-tabs-active .fw-wp-link,
        .fw-backend-option input[type=radio]:checked:before,
        .fw-backend-option .fw-option-type-slider .irs-single,
        .fw-option-type-switch .adaptive-switch.switch-right .switch-dot span {
        	background-color: <?php echo esc_attr( $theme_color ); ?>!important;
        }

        .shufflehound-dashboard-navigation li.active a {
            border-bottom-color: <?php echo esc_attr( $theme_color ); ?>;
        }

        .ocdi__gl-navigation li.active a,
        .ocdi__gl-navigation li.active a:hover,
        .ocdi__gl input[type=search]:focus {
            border-color: <?php echo esc_attr( $theme_color ); ?>;
        }


        /* Accent 2 - Slider Background color */
        .fw-backend-option .fw-option-type-slider .irs-bar {
        	background-color: <?php echo esc_attr( $theme_color2 ); ?>;
            box-shadow: none!important;
        }

        <?php if( $theme_name == 'gillion' ) : ?>
            .shufflehound-dashboard-logo img {
                width: 115px!important;
                bottom: -8px;
                position: relative;
            }

            .shufflehound-dashboard-theme-version {
                left: 127px!important;
            }

            .shufflehound-dashboard-start-item-button-soon {
                display: block;
            }
        <?php endif; ?>

        /* Other */
        .notice.notice-warning.mc4wp-is-dismissible,
        .updated.vc_license-activation-notice {
            display: none!important;
        }

        .fw-modal.fw-sole-modal .fw-text-muted {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
<?php }


// Add header to pages
$page = ( isset( $_GET['page'] ) && $_GET['page'] ) ? $_GET['page'] : '';
if( $page == 'pt-one-click-demo-import' || /*( $page == 'one-click-demo-import' && !empty( $_GET['step'] ) ) ||*/ $page == 'fw-settings' || $page == 'tgmpa-install-plugins' || $page == 'jevelin-theme-settings' ) :
    function sample_admin_notice__success() {
        sh_tgmpa_header();

        $page = ( isset( $_GET['page'] ) && $_GET['page'] ) ? $_GET['page'] : '';
        if( $page == 'jevelin-theme-settings' ) :
            echo '<div class="shufflehound-dashboard-content">';
        endif;
    }
    add_action( 'admin_notices', 'sample_admin_notice__success' );
endif;




function jevelin_ocdi_header() {
    $page = ( isset( $_GET['page'] ) && $_GET['page'] ) ? $_GET['page'] : '';
    if( $page == 'one-click-demo-import' ) :
        sh_tgmpa_header();
    endif;
}
add_action( 'ocdi/plugin_page_header', 'jevelin_ocdi_header' );
