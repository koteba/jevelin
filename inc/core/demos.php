<?php
if ( ! function_exists( 'shufflehound_unyson_demo_notice' ) ) :
function shufflehound_unyson_demo_notice() { ?>

    <?php
    $phpversion = phpversion();
    if( class_exists( 'OCDI_Plugin' ) && version_compare( (float)$phpversion, '5.3.2', '>' ) ) : ?>

        <div class="shufflehound-notice shufflehound-notice-important">
        	<i class="dashicons-before dashicons-warning"></i>
        	<span><?php esc_html_e('Demo installation method deprecased', 'shufflehound') ?></span>
        	<p>
                Please use <strong><a href="<?php echo admin_url( 'themes.php?page=pt-one-click-demo-import' ); ?>">One Click Demo Import</a></strong> installation method instead.

                <br /><br />
                <i>Use only if <strong>One Click Demo Import</strong> is not installing demos correctly.</i>
                <br />
                <i><?php esc_html_e('This method is deprecased due to compatibility/installation issues with various website hostings', 'shufflehound') ?></i>
            </p>
        </div>

    <?php else : ?>

        <div class="shufflehound-notice shufflehound-notice-important">
        	<i class="dashicons-before dashicons-warning"></i>
        	<span><?php esc_html_e('Demo installation method deprecased', 'shufflehound') ?></span>
        	<p>
                Please install/activate <strong>One Click Demo Import</strong> plugin under
                <a href="<?php echo admin_url( 'themes.php?page=tgmpa-install-plugins' ); ?>" target="_blank">Appearance > Install Plugins</a>
                and then go to <strong><a href="<?php echo admin_url( 'themes.php?page=pt-one-click-demo-import' ); ?>">One Click Demo Import plugin page</a></strong>.

                <br /><br />
                <i>Use only if <strong>One Click Demo Import</strong> is not installing demos correctly.</i>
                <br />
                <i><?php esc_html_e('This method is deprecased due to compatibility/installation issues with various website hostings', 'shufflehound') ?></i>
            </p>
        </div>

    <?php endif; ?>


    <div class="shufflehound-notice" style="margin-bottom: 30px;">
    	<i class="dashicons-before dashicons-warning"></i>
    	<span><?php esc_html_e( 'This method will replace all your current website content', 'shufflehound' ) ?></span>
    	<p><?php esc_html_e( 'Please create current website content backup before installing it', 'shufflehound' ) ?></p>
    </div>

<?php }
endif;


/* OCDI WPbakery notice */
if ( ! function_exists( 'shufflehound_ocdi_demo_notice' ) ) :
function shufflehound_ocdi_demo_notice() {

    if( !defined( 'WPB_VC_VERSION' ) ) :
        return '
            <div class="shufflehound-notice shufflehound-notice-important" style="margin-top: 0; margin-bottom: 20px;">
                <i class="dashicons-before dashicons-warning"></i>
                <span>'.esc_html__('Install/activate WPbakery Page Builder before Demo Import', 'shufflehound').'</span>
                <p>
                    Please install/activate <strong>WPbakery Page Builder</strong> plugin under
                    <a href="'.admin_url( 'themes.php?page=tgmpa-install-plugins' ).'" target="_blank">Appearance > Install Plugins</a> for WPbakery Page Builder based demos to work correctly
                </p>
            </div>';
    endif;

}
endif;
