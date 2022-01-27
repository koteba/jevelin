<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$theme = wp_get_theme();
$options = array(
	'info' => array(
		'title'   => esc_html__( 'Theme Information', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(
			'info-box' => array(
				'title'   => esc_html__( 'Theme Information', 'jevelin' ),
				'type'    => 'box',
				'options' => array(

					'theme_information' => array(
					    'type'  => 'html-full',
					    'value' => false,
					    'label' => false,
					    'html'  => '
							<div class="sh-theme-info">
								<div><img src="'.esc_url($theme->get_screenshot()).'" /></div>
								<div><h3>'.esc_attr( $theme->get( 'Name' )).'</h3></div>
								<div>by <a href="'.esc_url($theme->get( 'AuthorURI' )).'">'.esc_attr( $theme->get( 'Author' ) ).'</a>
								<div>'.esc_html__( 'Version', 'jevelin' ).': <strong>'.esc_attr(  $theme->get( 'Version' ) ).'</strong></div>
								<div class="sh-theme-desct">'.esc_attr( $theme->get( 'Description' ) ).'</div>
							</div>',
					)

				)
			),
		)
	)
);
