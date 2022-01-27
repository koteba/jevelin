<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(

	'id' => array( 'type' => 'unique' ),

	'title'   => array(
		'label' => esc_html__( 'Title', 'jevelin' ),
		'desc'  => esc_html__( 'Enter title', 'jevelin' ),
		'type'  => 'text'
	),

	'percentage'   => array(
		'label' => esc_html__( 'Percentage', 'jevelin' ),
		'desc'  => esc_html__( 'Enter percentage between 0-100 (without %)', 'jevelin' ),
		'type'  => 'text'
	),

	'style' => array(
		'type'    => 'radio',
		'label'   => esc_html__('Style', 'jevelin'),
		'desc'  => esc_html__('Choose main style', 'jevelin'),
		'choices' => array(
			'style1' => esc_html__('Style 1', 'jevelin'),
			'style2' => esc_html__('Style 2', 'jevelin'),
			'style3' => esc_html__('Style 3', 'jevelin'),
			'style4' => esc_html__('Style 4', 'jevelin'),
			'style5' => esc_html__('Style 5', 'jevelin'),
		),
		'value'	  => 'style1',
	),

	'accent_color' => array(
	    'type'  => 'color-picker',
	    'label' => esc_html__('Accent Color', 'jevelin'),
	    'desc'  => esc_html__('Select accent color or leave empty for global value', 'jevelin'),
	),

	'accent_color2' => array(
	    'type'  => 'rgba-color-picker',
	    'label' => esc_html__('Accent Color 2 (to create a gradient)', 'jevelin'),
	    'desc'  => esc_html__('Choose accent color 2 to create a gradient effect', 'jevelin'),
	    'value' => ''
	),

	'background_color' => array(
	    'type'  => 'rgba-color-picker',
	    'label' => esc_html__('Background Color', 'jevelin'),
	    'desc'  => esc_html__('Choose background color', 'jevelin'),
	    'value' => ''
	),

);
