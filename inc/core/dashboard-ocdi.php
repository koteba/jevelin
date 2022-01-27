<?php
/**
 * OCDI - Demo Importer
 */


// Add body text
function jevelin_ocdi_plugin_intro_text( $default_text ) {
	//$default_text .= 'O!';
    $default_text = '
<div class="shufflehound-dashboard-message-ocdi">

    <div class="shufflehound-dashboard-notice">
        <strong>Important:</strong>
        Make sure to activate the required plugins before importing a demo
    </div>

    <p>
        Importing demo data (post, pages, images, theme settings, ...) is the easiest way to setup your theme.
        It will allow you to quickly edit everything instead of creating content from scratch.
    </p>

    <p>
        When you import the data, the following things might happen:
    </p>

    <ul>
        <li>No existing posts, pages, categories, images, custom post types or any other data will be deleted or modified.</li>
        <li>Posts, pages, images, widgets, menus and other theme settings will get imported.</li>
        <li>Please click on the Import button only once and wait, it can take a couple of minutes.</li>
    </ul>

    <p>
        <i>It is recommended to install demos on clean WordPress instalation</i> as existing content won"t be replaced and some parts of the demo may be skipped (like main content, header, footer etc)
    </p>
</div>
';

	return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'jevelin_ocdi_plugin_intro_text' );


// Activate page
function shufflehound_ocdi_activate_page() {
    sh_tgmpa_header(); ?>

    <div class="shufflehound-dashboard-content">

        <div class="shufflehound-dashboard-message" style="padding: 0; max-width: 100%;">
            <h1 style="margin-top: 3px;">Activate One Click Demo Import plugin</h1>
            <p style="margin-top: 21px; max-width: 600px;">
                Before importing our pre-made demos please activate<br />
                One Click Demo Import <a href="<?php echo admin_url( 'themes.php?page=tgmpa-install-plugins' ); ?>">plugin here</a>
            </p>
        </div>

    </div>
<?php }
