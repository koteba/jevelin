<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$page_loader_options = array(
	'page_loader' => array(
	    'type'  => 'radio',
	    'value' => 'off',
	    'label' => esc_html__('Enable Page Loader', 'jevelin'),
	    'desc'  => esc_html__('Choose page loader status', 'jevelin'),
	    'choices' => array(
	        'off' => esc_html__( 'Off', 'jevelin' ),
	        'on1' => esc_html__( 'On - In every page', 'jevelin' ),
	        'on2' => esc_html__( 'On - Only first load', 'jevelin' ),
	    ),
	),

	'page_loader_style' => array(
	    'type'  => 'radio',
	    'value' => 'cube-folding',
	    'label' => esc_html__('Page Loader Style', 'jevelin'),
	    'desc'  => esc_html__('Choose page loader style', 'jevelin'),
	    'choices' => array(
	        'cube-folding' => esc_html__( 'Cube Folding', 'jevelin' ),
	        'cube-grid' => esc_html__( 'Cube Grid', 'jevelin' ),
	        'spinner' => esc_html__( 'Dots', 'jevelin' ),
	    ),
	),

	'page_loader_accent_color' => array(
	    'type'  => 'rgba-color-picker',
		'value' => '',
	    'label' => esc_html__('Page Loader Accent Color', 'jevelin'),
	    'desc'  => esc_html__('Select page loader accent color', 'jevelin'),
	),

	'page_loader_background_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#ffffff',
	    'label' => esc_html__('Page Loader Background Color', 'jevelin'),
	    'desc'  => esc_html__('Select page loader background color', 'jevelin'),
	),
);


$options = array(
	'page_loader' => array(
		'title'   => esc_html__( 'Page Loader', 'jevelin' ),
		'type'    => 'tab',
		'icon'	  => 'fa fa-phone',
		'options' => array(
			'lightbox-box' => array(
				'title'   => esc_html__( 'Page Loader Settings', 'jevelin' ),
				'type'    => 'box',
				'options' => $page_loader_options
			),
		)
	)
);
