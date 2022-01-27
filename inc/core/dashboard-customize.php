<?php
/**
 * Dashboard - Customize page
 */
function shufflehound_customize_page() {
    if( jevelin_framework() == 'redux' ) :
        $settings_url = 'admin.php?page=jevelin-theme-settings';
    else :
        $settings_url = 'themes.php?page=fw-settings';
    endif;

    sh_tgmpa_header(); ?>

    <div class="shufflehound-dashboard-content" style="padding: 0; max-width: 1400px; box-shadow: none; background-color: transparent;">
        <div class="shufflehound-dashboard-start-list shufflehound-dashboard-start-list-large">
            <div class="shufflehound-dashboard-start-item">
                <a href="<?php echo admin_url( 'customize.php' ); ?>" class="shufflehound-dashboard-start-item-overlay"></a>
                <h2>1</h2>
                <span>Option 1</span>
                <h3>Frontend Options</h3>
                <p>Change options directly in WordPress Customizer and see live changes before saving them</p>
                <?php /*<a href="//youtube.com/embed/wQX8_nwylTY?rel=0&amp;controls=0&amp;showinfo=0" class="shufflehound-dashboard-start-item-button" data-rel="lightcase"> */ ?>
                <a href="<?php echo admin_url( 'customize.php' ); ?>" class="shufflehound-dashboard-start-item-button">
                    Open
                    <i class="fas fa-angle-right"></i>
                </a>
            </div>
            <div class="shufflehound-dashboard-start-item">
                <a href="<?php echo admin_url( $settings_url ); ?>" class="shufflehound-dashboard-start-item-overlay"></a>
                <h2>2</h2>
                <span>Option 2</span>
                <h3>Backend Options</h3>
                <p>Change options faster from our custom back-end options panel and see changes afterwards</p>
                <?php /*<a href="//youtube.com/embed/wQX8_nwylTY?rel=0&amp;controls=0&amp;showinfo=0" class="shufflehound-dashboard-start-item-button" data-rel="lightcase"> */ ?>
                <a href="<?php echo admin_url( $settings_url ); ?>" class="shufflehound-dashboard-start-item-button">
                    Open
                    <i class="fas fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>


    <div class="shufflehound-dashboard-content" style="padding: 0; max-width: 1400px;">
        <div class="shufflehound-dashboard-start-list shufflehound-dashboard-start-list-small">
            <a href="<?php echo admin_url( 'widgets.php' ); ?>" class="shufflehound-dashboard-start-item">
                <i class="fas fa-puzzle-piece"></i>
                <h3>Widgets</h3>
                <p>Manage your sidebar widgets</p>
            </a>
            <a href="<?php echo admin_url( 'nav-menus.php' ); ?>" class="shufflehound-dashboard-start-item">
                <i class="fas fa-compass"></i>
                <h3>Navigation Menus</h3>
                <p>Manage your header and footer navigation links</p>
            </a>
            <a href="<?php echo admin_url( 'edit.php?post_type=shufflehound_header' ); ?>" class="shufflehound-dashboard-start-item">
                <i class="fas fa-layer-group"></i>
                <h3>Headers</h3>
                <p>Manage your headers built with WPbakery page builder</p>
            </a>
            <a href="<?php echo admin_url( 'edit.php?post_type=shufflehound_footer' ); ?>" class="shufflehound-dashboard-start-item">
                <i class="fas fa-layer-group"></i>
                <h3>Footers</h3>
                <p>Manage your footers built with WPbakery page builder</p>
            </a>
        </div>
    </div>
<?php }
