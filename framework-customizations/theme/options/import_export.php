<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$admin_url = function_exists( 'admin_url' ) ? admin_url() : '';
$theme_settings_export = get_option( 'fw_theme_settings_options:jevelin' ) ? json_encode( get_option( 'fw_theme_settings_options:jevelin' ) ) : '';
$import_export_options = array(
    'content_title4' => array( 'type' => 'html-full', 'value' => '', 'label' => false, 'html'  =>
        '
		<div class="sh-theme-settings-import-container">
			<h3 style=margin-top:0;>
	            '.esc_html__( 'Import Options', 'jevelin' ).'
	        </h3>
	        <p style=color:red;>
	            '.esc_html__( 'WARNING! This will overwrite all existing option values, please proceed with caution!', 'jevelin' ).'
	        </p>
	        <p style=color:#696969;>
	            '.esc_html__( 'Enter your saved theme settings', 'jevelin' ).'
	        </p>
	        <div class="sh-theme-settings-import">
	            <textarea class="sh-theme-settings-import-textarea" id="" rows="12"></textarea>
				<br>
				<span class="sh-theme-settings-import-submit" data-url="'.esc_url( $admin_url ).'">
					'.esc_html__( 'Import Settings', 'jevelin' ).'
		        </span>
	        </div>


	        <h3 style=margin-top:60px;margin-bottom:0px;>
	            '.esc_html__( 'Export Options', 'jevelin' ).'
	        </h3>
	        <p style=color:#696969;>
	            '.esc_html__( 'Here you can copy your last saved theme settings. Keep this safe as you can use it as a backup should anything go wrong, or you can use it to restore your settings.', 'jevelin' ).'
	        </p>
	        <div>
	            <textarea rows="12">'. $theme_settings_export .'</textarea>
	        </div>
		</div>',
    ),
);

$options = array(
	'import_export' => array(
		'title'   => esc_html__( 'Import / Export', 'jevelin' ),
		'type'    => 'tab',
		'icon'	  => 'fa fa-phone',
		'options' => array(
			'ad-box' => array(
				'title'   => esc_html__( 'Import / Export', 'jevelin' ),
				'type'    => 'box',
				'options' => $import_export_options
			),
		)
	)
);
