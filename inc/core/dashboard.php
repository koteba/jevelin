<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Shufflehound - Dashboard functions
 */
if( is_admin() && function_exists( 'shufflehound_theme' ) && in_array( shufflehound_theme(), array( 'jevelin', 'gillion' ) ) ) :
    add_action( 'admin_menu', 'shufflehound_panel' );
    function shufflehound_panel() {
    	add_menu_page( shufflehound_theme( 1 ).' - Dashboard', shufflehound_theme( 1 ), 'manage_options', 'shufflehound_dashboard', 'shufflehound_dashboard_page', get_template_directory_uri().'/inc/core/assets/'.shufflehound_theme().'.png', 2  );
    	add_submenu_page( 'shufflehound_dashboard', shufflehound_theme( 1 ).' - Dashboard', 'Dashboard ', 'manage_options', 'shufflehound_dashboard', 'shufflehound_dashboard_page' );

        $phpversion = phpversion();
        if( class_exists( 'OCDI_Plugin' ) && version_compare( (float)$phpversion, '5.3.2', '>' ) ) :
            add_submenu_page( 'shufflehound_dashboard', shufflehound_theme( 1 ).' - Install Demo', 'Import Demo', 'manage_options', 'themes.php?page=pt-one-click-demo-import' );
        else :
            add_submenu_page( 'shufflehound_dashboard', shufflehound_theme( 1 ).' - Install Demo', 'Import Demo', 'manage_options', 'shufflehound_ocdi_activate', 'shufflehound_ocdi_activate_page' );
        endif;

        add_submenu_page( 'shufflehound_dashboard', shufflehound_theme( 1 ).' - Templates', 'Templates', 'manage_options', 'shufflehound_templates', 'shufflehound_templates_page' );
        add_submenu_page( 'shufflehound_dashboard', shufflehound_theme( 1 ).' - Customize', 'Customize', 'manage_options', 'shufflehound_customize', 'shufflehound_customize_page' );
        add_submenu_page( 'shufflehound_dashboard', shufflehound_theme( 1 ).' - System Status', 'System Status', 'manage_options', 'shufflehound_system', 'shufflehound_system_page' );

        add_submenu_page( 'shufflehound_dashboard', shufflehound_theme( 1 ).' - Documentation', 'Documentation', 'manage_options', 'shufflehound_documentation', 'shufflehound_documentation_page' );
        add_submenu_page( 'shufflehound_dashboard', shufflehound_theme( 1 ).' - Support Center', 'Support Center', 'manage_options', 'shufflehound_support', 'shufflehound_support_page' );

        add_submenu_page( 'shufflehound_dashboard', shufflehound_theme( 1 ).' - Framework Upgrade', 'Framework Upgrade', 'manage_options', 'shufflehound_framework_upgrade', 'shufflehound_framework_upgrade_page' );
    }


    function shufflehound_dashboard_page() {
        $theme = wp_get_theme();
        $theme_name = shufflehound_theme();
        $theme_version = ( $theme->Version ) ? $theme->Version : '';
        echo sh_tgmpa_header(); ?>

        <div class="shufflehound-dashboard-content" style="padding: 0; max-width: 1400px; box-shadow: none; background-color: transparent;">
            <div class="shufflehound-dashboard-start-list">
                <?php $tgmpa = \TGM_Plugin_Activation::get_instance()->is_tgmpa_complete();
                if( class_exists( 'TGM_Plugin_Activation' ) && !$tgmpa ) : ?>
                    <div class="shufflehound-dashboard-start-item">
                        <a href="<?php echo admin_url( 'themes.php?page=tgmpa-install-plugins' ); ?>" class="shufflehound-dashboard-start-item-overlay"></a>

                        <h2>1</h2>
                        <span>Step 1</span>
                        <h3>Install Plugins</h3>
                        <p>Install necessary plugins to get most functionality of the theme</p>

                        <?php if( $theme_name == 'gillion' ) : ?>
                            <a class="shufflehound-dashboard-start-item-button">
                                Watch Video
                                <i class="fas fa-angle-right"></i>

                                <span class="shufflehound-dashboard-start-item-button-soon">
                                    Next updates
                                </span>
                            </a>
                        <?php else : ?>
                            <a href="//youtube.com/embed/fh_G4OtNAqc?rel=0&amp;controls=0&amp;showinfo=0" class="shufflehound-dashboard-start-item-button" data-rel="lightcase">
                                Watch Video
                                <i class="fas fa-angle-right"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php else : ?>
                    <div class="shufflehound-dashboard-start-item">
                        <h2>1</h2>
                        <span style="opacity: 0.65;">Step 1</span>
                        <h3 style="opacity: 0.65;">Install Plugins</h3>
                        <p style="opacity: 0.65;">Install necessary plugins to get most functionality of the theme</p>
                    </div>
                <?php endif; ?>


                <?php
                    $phpversion = phpversion();
                    $ocdi_link = '';
                    if( class_exists( 'OCDI_Plugin' ) && version_compare( (float)$phpversion, '5.3.2', '>' ) ) :
                        $ocdi_link = admin_url( 'themes.php?page=pt-one-click-demo-import' );
                    else :
                        $ocdi_link = admin_url( 'admin.php?page=shufflehound_ocdi_activate' );
                    endif;
                ?>
                <div href="<?php echo esc_url( $ocdi_link ); ?>" class="shufflehound-dashboard-start-item">
                    <a href="<?php echo esc_url( $ocdi_link ); ?>" class="shufflehound-dashboard-start-item-overlay"></a>

                    <h2>2</h2>
                    <span>Step 2</span>
                    <h3>Import Demo</h3>
                    <p>Set up website content with just one click by choosing pre-made demo content</p>
                    <?php if( $theme_name == 'gillion' ) : ?>
                        <a class="shufflehound-dashboard-start-item-button">
                            Watch Video
                            <i class="fas fa-angle-right"></i>

                            <span class="shufflehound-dashboard-start-item-button-soon">
                                Next updates
                            </span>
                        </a>
                    <?php else : ?>
                        <a href="//youtube.com/embed/AdVLX-JR9nM?rel=0&amp;controls=0&amp;showinfo=0" class="shufflehound-dashboard-start-item-button" data-rel="lightcase">
                            Watch Video
                            <i class="fas fa-angle-right"></i>
                        </a>
                    <?php endif; ?>

                </div>
                <div href="<?php echo esc_url( $ocdi_link ); ?>" class="shufflehound-dashboard-start-item">
                    <a href="<?php echo admin_url( 'admin.php?page=shufflehound_templates' ); ?>" class="shufflehound-dashboard-start-item-overlay"></a>

                    <h2>3</h2>
                    <span>Step 3</span>
                    <h3>Use Templates</h3>
                    <p>Insert additional pre-made section and elements with just one click</p>
                    <?php if( $theme_name == 'gillion' ) : ?>
                        <a class="shufflehound-dashboard-start-item-button">
                            Watch Video
                            <i class="fas fa-angle-right"></i>

                            <span class="shufflehound-dashboard-start-item-button-soon">
                                Next updates
                            </span>
                        </a>
                    <?php else : ?>
                        <a href="//youtube.com/embed/uDCC8f7pWSs?rel=0&amp;controls=0&amp;showinfo=0" class="shufflehound-dashboard-start-item-button" data-rel="lightcase">
                            Watch Video
                            <i class="fas fa-angle-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="shufflehound-dashboard-start-item">
                    <a href="<?php echo admin_url( 'admin.php?page=shufflehound_customize' ); ?>" class="shufflehound-dashboard-start-item-overlay"></a>
                    <h2>4</h2>
                    <span>Step 4</span>
                    <h3>Customize Settings</h3>
                    <p>Finish website setup by tweaking theme related settings in our option panel</p>
                    <?php /*<a href="//youtube.com/embed/wQX8_nwylTY?rel=0&amp;controls=0&amp;showinfo=0" class="shufflehound-dashboard-start-item-button" data-rel="lightcase"> */ ?>
                    <a href="<?php echo admin_url( 'admin.php?page=shufflehound_customize' ); ?>" class="shufflehound-dashboard-start-item-button">
                        Open
                        <i class="fas fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <style>
            .shufflehound-dashboard-activate input {
                height: 60px;
                line-height: 60px;
                max-width: 400px;
                display: block;
                width: 100%;
                padding: 0 20px;
                font-size: 18px;
                border-radius: 8px;
                border: 1px solid #ccc;
            }

            .shufflehound-dashboard-activate button {
                height: 60px;
                line-height: 60px;
                padding: 0 30px;
                font-size: 13px;
                text-transform: uppercase;
                background-color: #00b50f;
                border-width: 0px;
                border-radius: 8px;
                color: #fff;
                font-weight: bold;
                cursor: pointer;
                margin-left: 10px;
                transition: 0.3s all ease;
            }

            .shufflehound-dashboard-activate button:hover {
                background-color: #4cb78c;
            }

            .shufflehound-dashboard-activate form {
                display: flex;
            }

            .shufflehound-dashboard-activate .notice {
                display: inline-block;
                margin: 0;
                padding: 10px 15px;
                margin-bottom: 10px;
            }
        </style>

        <div class="shufflehound-dashboard-content shufflehound-dashboard-activate">
            <?php
                $activated = Shufflehound_Theme_Server::get_license();
                if( !$activated && !empty( $_POST['purchase_code'] ) ) :
                    $purchase_code = sanitize_text_field( $_POST['purchase_code'] );

                    $connect = new Shufflehound_Theme_Server();
                    if( $connect->check_license( $purchase_code ) ) :
                        $activated = 1;
                        echo '<div class="notice notice-success">Thank you, theme was activated successfully!</div>';
                    else :
                        echo '<div class="notice notice-warning">The provided purchase code was not found. Please check the code and try again!</div>';
                    endif;
                elseif( $activated && isset( $_GET['remove_purchase_code'] ) ) :
                    $activated = 0;
                    $connect = new Shufflehound_Theme_Server();
                    $connect->remove_license();
                    echo '<div class="notice notice-success">Theme license was removed successfully!</div>';
                endif;
            ?>

            <?php if( $activated ) : ?>
                <?php add_thickbox(); ?>

                <h1>
                    Theme is activated <i class="fas fa-check-circle"></i>
                </h1>
                <p style="margin-top: 21px; max-width: 600px; margin-bottom: 20px;">
                    You will recieve automatic updates and other benefits. <br>
                    To remove the license from this website <a href="#TB_inline?width=300&height=200&inlineId=modal-window-id" class="thickbox">click here</a>
                </p>

                <div id="modal-window-id" style="display:none;">
                    <div class="wp-core-ui" style="text-align: center; padding: 20px 20px;">
                        <h1 style="line-height: 130%;">Are you sure you want to remove the license from this website?</h1>
                        <a href="<?php echo esc_url( admin_url( 'admin.php?page=shufflehound_dashboard&remove_purchase_code=1' ) ); ?>" class="button button-primary">Remove</a>
                        <a href="" class="button button-secondary">Cancel</a>
                    </div>
                </div>

            <?php else : ?>
                
                <h1>
                    Theme is not activated <i class="fas fa-exclamation-circle"></i>
                </h1>
                <p style="margin-top: 21px; max-width: 600px; margin-bottom: 20px;">
                    Enter your theme's purchase code to get automatic updates and other benefits. <br>
                    Find your purchase code in your <a href="https://themeforest.net/downloads" target="_blank">purchased products</a> 
                    and by following <a href="https://support.shufflehound.com/wp-content/plugins/aqua-verifier/img/find-item-purchase-code.png" target="_blank">these steps</a>.
                </p>

                <form action="<?php echo esc_url( admin_url( 'admin.php?page=shufflehound_dashboard' ) ); ?>" method="post">
                    <input type="hidden" name="pageX" value="shufflehound_dashboard">
                    <input type="text" name="purchase_code" placeholder="xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx" value="<?php echo isset( $_POST['purchase_code'] ) ? $_POST['purchase_code'] : ''; ?>" autocomplete="off" required>
                    <button type="submit">Activate</button>
                </form>

                <p style="margin-top: 21px; max-width: 600px; font-size: 12px; opacity: 0.5; font-size: 12px;">
                    Please note that with a single purchase code you can recieve updates only on one website at a time. 
                    <?php /* <br> Using the same code on another website will disable activation for the current website. */ ?>
                </p>

            <?php endif; ?>
        </div>

        <div class="shufflehound-dashboard-content">
            <div class="shufflehound-dashboard-message" style="padding: 0; max-width: 100%;">
                <h1 style="margin-top: 3px;">Changelog</h1>
                <p style="margin-top: 21px; max-width: 600px; margin-bottom: 30px;">
                    Latest added features, improvements and bugfixes
                </p>

                <div class="shufflehound-changelog-list-container">
                    <div class="shufflehound-changelog-list">
                        <?php
                            $fn = fopen( get_template_directory().'/changelog.txt', 'r' );
                            $count_versions = 0;

                            while( !feof( $fn ) ) :
                            	$item = fgets( $fn );

                                if( substr( $item, 0, 8 ) == 'Version ' ) :
                                    if( $count_versions >= 10 ) :
                                        break;
                                    endif;

                                    echo '<div class="shufflehound-changelog-title">'.$item.'</div>';
                                    $count_versions++;
                                else :
                                    $item = str_replace( '* Added - ', '<span class="shufflehound-changelog-item-added">Added</span>', $item );
                                    $item = str_replace( '* Improved - ', '<span class="shufflehound-changelog-item-improved">Improved</span>', $item );
                                    $item = str_replace( '* Updated - ', '<span class="shufflehound-changelog-item-updated">Updated</span>', $item );
                                    $item = str_replace( '* Fixed - ', '<span class="shufflehound-changelog-item-fixed">Fixed</span>', $item );

                                    echo '<div class="shufflehound-changelog-item">'.$item.'</div>';
                                endif;
                            endwhile;

                            fclose( $fn );
                        ?>
                    </div>
                </div>
            </div>
        </div>

    <?php }


    function shufflehound_dashboard_performance( $title, $description, $icon, $status = false ) { ?>
        <div class="shufflehound-dashboard-list-item<?php echo ( $status ) ? ' shufflehound-dashboard-list-item-outdated' : ''; ?>">
            <div class="shufflehound-dashboard-item-icon">
                <i class="<?php echo ( $icon ); ?>"></i>
            </div>
            <div class="shufflehound-dashboard-item-content">
                <h3><?php echo esc_attr( $title ); ?></h3>
                <p><?php echo ( $description ); ?></p>
            </div>
        </div>
    <?php }


    function shufflehound_documentation_page() {
        sh_tgmpa_header();

        if( shufflehound_theme() == 'gillion' ) :
            $link = '//support.shufflehound.com/documentation/gillion/?source=theme&version=3';
        else :
            $link = '//support.shufflehound.com/documentation/jevelin/?source=theme&version=4';
        endif; ?>

        <div class="shufflehound-dashboard-content-frame">
            <iframe class="shufflehound-live-window" src="<?php echo esc_url( $link ); ?>" frameborder="0"></iframe>
            <style>.shufflehound-live-window { width: 100%; min-height: 500px; }</style>
            <script>jQuery(function($){ $('.shufflehound-live-window').height( $(window).height() - 42 ); });</script>
        </div>
    <?php }


    function shufflehound_support_page() {
        sh_tgmpa_header();

        $link = '//support.shufflehound.com/'; ?>

        <div class="shufflehound-dashboard-content-frame">
            <iframe class="shufflehound-live-window" src="<?php echo esc_url( $link ); ?>" frameborder="0"></iframe>
            <style>.shufflehound-live-window { width: 100%; min-height: 500px; }</style>
            <script>jQuery(function($){ $('.shufflehound-live-window').height( $(window).height() - 42 ); });</script>
        </div>
    <?php }


    function shufflehound_templates_page() {
        sh_tgmpa_header(); ?>

        <div class="shufflehound-dashboard-content">

            <div class="shufflehound-dashboard-message" style="padding: 0; max-width: 100%;">
                <h1 style="margin-top: 3px;">WPBakery Page Builder Templates</h1>
                <p style="margin-top: 21px; max-width: 600px;">
                    Choose one of our <strong>100+</strong> ready to go template elements from more than 20+ categories. Add them to your current or new pages.
                </p>

                <div class="shufflehound-dashboard-text">
                    <p>Here is a simple guide on how to use them:</p>

                    <p style="margin-bottom: 0px!important;">
                        1. Add a <a href="<?php echo admin_url( 'post-new.php?post_type=page' ); ?>" target="_blank">new page</a>
                        or go to an <a href="<?php echo admin_url( 'edit.php?post_type=page' ); ?>" target="_blank">existing page</a></p>

                    <p style="margin-top: 10px!important;">2. Switch to WPBakery Page Builder (if not already) by pressing on it (in the top left corner)</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/core/assets/templates/templates-how-to-1.png" alt="" />

                    <p>3. Switch to one of the editing modes - Frontend or Backend (we prefer Frontend Editor)</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/core/assets/templates/templates-how-to-2.png" alt="" />

                    <p>4. Click on Templates icon (third from the left on the top bar</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/core/assets/templates/templates-how-to-3.png" alt="" />

                    <p>5. Choose one of our templates and click on the image to install it</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/core/assets/templates/templates-how-to-4-<?php echo shufflehound_theme(); ?>.png" alt="" />

                </div>

                <div class="shufflehound-dashboard-notice">
                    <strong>Notice:</strong>
                    Some styles can differ from images as many styling options comes from global theme settings such as colors, fonts and others
                </div>
            </div>

        </div>
    <?php }
endif;




function shufflehound_framework_upgrade_page() {
    sh_tgmpa_header();
    $method = !empty( $_GET['method'] ) ? $_GET['method'] : '';
    $msg = '';
    if( $method == 'full' && jevelin_framework() == 'unyson' && class_exists( 'Redux' ) ) :
        $msg = jevelin_framework_migrate_redux( 'start' );
    elseif( $method == 'partial' && jevelin_framework() == 'unyson' && class_exists( 'Redux' ) ) :
        update_option( 'jevelin_framework', 'redux' );
        $msg = 'Done!';
    elseif( $method == 'downgrade' ) :
        delete_option( 'jevelin_framework' );
        $msg = 'You are now using Unyson Framework';
    endif;


    // Get current step
    if( jevelin_framework() == 'redux' && !defined( 'FW' ) ) :
        $step = 4;
    elseif( jevelin_framework() == 'redux' && defined( 'FW' ) ) :
        $step = 3;
    elseif( jevelin_framework() == 'unyson' && class_exists( 'Redux' ) ) :
        $step = 2;
    else :
        $step = 1;
    endif;

    // $step = 0;
?>


    <style media="screen">
    .sh-framework-upgrade-progress {
        display: flex;
        width: 600px;
        max-width: 100%;
        margin: 20px 0;
        user-select: none;
        margin-left: -3.5%;
    }

    /* Upgrade progress */
    .sh-framework-upgrade-progress-item {
        width: 25%;
        text-align: center;
        position: relative;
    }

    .sh-framework-upgrade-progress-item i {
        display: inline-block;
        width: 50px;
        height: 50px;
        line-height: 50px;
        border-radius: 100px;
        font-size: 21px;
        margin-bottom: 12px;
        border: 2px solid #ebebeb;
        color: #ebebeb;
        background: #fff;
        position: relative;
        z-index: 1;
    }

    .sh-framework-upgrade-progress-item span {
        display: block;
        font-weight: bold;
        color: #bbbbbb;
    }

    .sh-framework-upgrade-progress-item-line:before {
        content: "";
        display: block;
        position: absolute;
        top: 30px; left: 0; right: 50%;
        height: 2px;
        background-color: #ebebeb;
    }

    .sh-framework-upgrade-progress-item-line:after {
        content: "";
        display: block;
        position: absolute;
        top: 30px; left: 50%; right: 0;
        height: 2px;
        background-color: #ebebeb;
    }

    .sh-framework-upgrade-progress .step-item1 .step-line:before,
    .sh-framework-upgrade-progress .step-item4 .step-line:after {
        display: none;
    }


    /* Upgrade active items */
    .sh-framework-upgrade-progress.step1 .step-item1 i,
    .sh-framework-upgrade-progress.step2 .step-item1 i,
    .sh-framework-upgrade-progress.step2 .step-item2 i,
    .sh-framework-upgrade-progress.step3 .step-item1 i,
    .sh-framework-upgrade-progress.step3 .step-item2 i,
    .sh-framework-upgrade-progress.step3 .step-item3 i,
    .sh-framework-upgrade-progress.step4 i {
        border-color: #294cff;
        color: #294cff;
    }

    .sh-framework-upgrade-progress.step1 .step-item1 span,
    .sh-framework-upgrade-progress.step2 .step-item1 span,
    .sh-framework-upgrade-progress.step2 .step-item2 span,
    .sh-framework-upgrade-progress.step3 .step-item1 span,
    .sh-framework-upgrade-progress.step3 .step-item2 span,
    .sh-framework-upgrade-progress.step3 .step-item3 span,
    .sh-framework-upgrade-progress.step4 span {
        color: #3f3f3f;
    }

    .sh-framework-upgrade-progress.step2 .step-item1 .step-line:after,
    .sh-framework-upgrade-progress.step2 .step-item2 .step-line:before,
    .sh-framework-upgrade-progress.step3 .step-item1 .step-line:after,
    .sh-framework-upgrade-progress.step3 .step-item2 .step-line:before,
    .sh-framework-upgrade-progress.step3 .step-item2 .step-line:after,
    .sh-framework-upgrade-progress.step3 .step-item3 .step-line:before,
    .sh-framework-upgrade-progress.step4 .step-line:before,
    .sh-framework-upgrade-progress.step4 .step-line:after {
        background-color: #294cff;
    }


    /* Upgrade content */
    .sh-framework-upgrade-content h2 {
        font-weight: bold;
        font-size: 18px;
    }

    .sh-framework-upgrade-method-item {
        position: relative;
    }

    .sh-framework-upgrade-method-item-input {
        position: absolute;
        top: 40px; left: 25px;
    }

    .sh-framework-upgrade-method-item-content {
        display: block;
        border: 2px solid #ebebeb;
        max-width: 600px;
        margin: 20px 0;
        border-radius: 5px;
        padding: 20px 30px;
        padding-left: 60px;
        user-select: none;
    }

    .sh-framework-upgrade-method-item-input:checked + .sh-framework-upgrade-method-item-content {
        border-color: #294cff;
        box-shadow: 0 5px 12px 1px rgba( 134, 38, 237, 0.10 );
    }

    .sh-framework-upgrade-method-item-content strong {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .sh-framework-upgrade-method-item-content p {
        margin: 0;
    }

    .sh-framework-upgrade-method-button {
        background-color: #00b50f;
        color: #fff;
        border-radius: 100px;
        border-width: 0px;
        font-weight: 600;
        padding: 12px 28px;
        line-height: 19px;
        font-size: 13px;
        cursor: pointer;
        transition: 0.3s all ease;
    }

    .sh-framework-upgrade-method-button:hover,
    .sh-framework-upgrade-method-button:focus {
        background-color: #00a00d;
    }

    .sh-framework-upgrade-method-button,
    .sh-framework-upgrade-method-button:focus,
    .sh-framework-upgrade-method-button:hover {
        outline:none;
    }
    </style>


    <div class="shufflehound-dashboard-content">
        <div class="shufflehound-dashboard-message" style="padding-top: 0;">
            <h1 style="margin-top: 0px;">
                Framework Upgrade
            </h1>

            <?php if( in_array( $step, [ 0, 1, 2 ] ) ) : ?>
                <div class="shufflehound-dashboard-notice">
                    <strong>Important:</strong>
                    Upgrade extension and Redux Framework features are still in beta stage! Please create a backup before starting the upgrade.
                </div>
            <?php endif; ?>

            <p>
                Jevelin is upgrading its main framework from Unyson to Redux Framework.<br>
                Benefits for the upgrade are better supported/more futureproof framework, faster loading times and improved backend theme options.
            </p>
        </div>


        <div class="sh-framework-upgrade-progress step<?php echo intval( $step ); ?>">
            <div class="sh-framework-upgrade-progress-item step-item1" title="Install/activate Redux Framework plugin">
                <i class="fas fa-cloud-download-alt"></i>
                <span>
                    Install
                </span>
                <div class="sh-framework-upgrade-progress-item-line step-line"></div>
            </div>
            <div class="sh-framework-upgrade-progress-item step-item2" title="Switch data to Redux Framework plugin">
                <i class="fas fa-file-import"></i>
                <span>
                    Upgrade
                </span>
                <div class="sh-framework-upgrade-progress-item-line step-line"></div>
            </div>
            <div class="sh-framework-upgrade-progress-item step-item3" title="Remove Unyson framework plugin">
                <i class="fas fa-trash"></i>
                <span>
                    Remove
                </span>
                <div class="sh-framework-upgrade-progress-item-line step-line"></div>
            </div>
            <div class="sh-framework-upgrade-progress-item step-item4" title="Done, you are now using Redux framework">
                <i class="fas fa-check"></i>
                <span>
                    Done
                </span>
                <div class="sh-framework-upgrade-progress-item-line step-line"></div>
            </div>
        </div>


    </div>
    <div class="shufflehound-dashboard-content">


        <div class="sh-framework-upgrade-content">
            <?php if( $step == 1 ) : ?>
                <h2>
                    Install and activate Redux Framework plugin
                </h2>
                <ul>
                    <li>
                        1. Open <a href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ); ?>" target="_blank"><strong>plugin installer</strong></a>
                    </li>
                    <li>
                        2. Find <strong>Redux Framework</strong> in the plugins list
                    </li>
                    <li>
                        3. <strong>Install</strong> and <strong>activate</strong> it
                    </li>
                    <li>
                        4. <a href=""><strong>Refresh</strong></a> this page
                    </li>
                </ul>
            <?php elseif( $step == 2 ) : ?>
                <h2>
                    Choose upgrade method
                </h2>

                <form action="<?php echo esc_url( admin_url( 'admin.php' ) ); ?>" method="get">
                    <input type="hidden" name="page" value="shufflehound_framework_upgrade">
                    <div class="sh-framework-upgrade-method">
                        <div class="sh-framework-upgrade-method-item">
                            <input type="radio" id="method-full" name="method" class="sh-framework-upgrade-method-item-input" value="full" required>
                            <label for="method-full" class="sh-framework-upgrade-method-item-content">
                                <strong>
                                    Full upgrade
                                </strong>
                                <p>
                                    Will copy page, post and theme settings to Redux Framework
                                </p>
                            </label>
                        </div>
                        <div class="sh-framework-upgrade-method-item">
                            <input type="radio" id="method-partial" name="method" class="sh-framework-upgrade-method-item-input" value="partial" required>
                            <label for="method-partial" class="sh-framework-upgrade-method-item-content">
                                <strong>
                                    Partial upgrade
                                </strong>
                                <p>
                                    Won't copy page, post and theme settings
                                </p>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="sh-framework-upgrade-method-button">
                        Upgrade
                    </button>
                </form>
            <?php elseif( $step == 3 ) : ?>
                <h2>
                    Almost done! Remove or deactivate Unyson Framework plugin
                </h2>
                <ul>
                    <li>
                        1. Open <a href="<?php echo esc_url( admin_url( 'plugins.php' ) ); ?>" target="_blank"><strong>plugins manager</strong></a>
                    </li>
                    <li>
                        2. Find <strong>Unyson</strong> (framework) in the plugins list
                    </li>
                    <li>
                        3. <strong>Remove</strong> or <strong>deactivate</strong> it
                    </li>
                    <li>
                        4. <a href=""><strong>Refresh</strong></a> this page
                    </li>
                </ul>
            <?php elseif( $step == 4 ) : ?>
                <h2>
                    Upgrade done!
                </h2>
                <p>
                    Let us know if you encounter any bugs in our
                    <a href="https://support.shufflehound.com" target="_blank">support forum</a>.
                </p>
                <p style="opacity: 0.5; font-size: 90%;">
                    It is possible to downgrade back to Unyson, but it is not recommended.
                    <a href="<?php echo esc_url( admin_url( 'admin.php?page=shufflehound_framework_upgrade&method=downgrade' ) ); ?>">Switch back</a> to Unyson Framework (Unyson plugin needs to be active, to switch back).
                </p>
            <?php endif; ?>
        </div>

<?php }