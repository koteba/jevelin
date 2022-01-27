<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(
	'id' => array( 'type' => 'unique' ),

	'url' => array(
		'type'  => 'text',
		'label'   => esc_html__( 'URL', 'jevelin' ),
		'desc'    => esc_html__( 'Enter video URL', 'jevelin' ),
	),

	'width'   => array(
		'type'  => 'text',
		'label' => esc_html__( 'Width', 'jevelin' ),
		'desc'  => wp_kses( __( 'Enter element width (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
		'value' => '100px'
	),

	'video_ratio' => array(
		'type'  => 'radio',
		'label' => esc_html__('Ratio', 'jevelin'),
		'desc'  => esc_html__( 'Choose video ratio ', 'jevelin' ),
		'choices' => array(
			'16_9' => esc_html__( '16:9 (like modern laptops)', 'jevelin' ),
			'4_3' => esc_html__( '4:3 (like iPad)', 'jevelin' ),
		),
		'value'	  => '16_9',
	),

	'placement' => array(
		'type'  => 'radio',
		'label' => esc_html__('Alignment', 'jevelin'),
		'desc'  => esc_html__( 'Choose video alignment ', 'jevelin' ),
		'choices' => array(
			'left' => esc_html__( 'Left', 'jevelin' ),
			'center' => esc_html__( 'Center', 'jevelin' ),
			'right' => esc_html__( 'Right', 'jevelin' ),
		),
		'value'	  => 'left',
	),

	'image' => array(
		'label' => esc_html__( 'Placeholder Image', 'jevelin' ),
		'desc'  => esc_html__( 'Upload a placeholder image', 'jevelin' ),
		'type'  => 'upload',
	),

	'image_size' => array(
		'type'    => 'select',
		'label'   => esc_html__('Placeholder Size', 'jevelin'),
		'desc'	=> esc_html__( 'Select uploaded placeholder image size', 'jevelin' ),
		'value' => 'large',
		'choices' => array(
			'large' => esc_html__( 'Large', 'jevelin' ),
			'full' => esc_html__( 'Full', 'jevelin' ),
		)
	),

	'placeholder_icon' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Placholder Icon', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable placeholder icon when placholder image is selected', 'jevelin' ),
		'value' => 'on',
		'left-choice' => array(
			'value' => 'off',
			'label' => esc_html__('Off', 'jevelin'),
		),
		'right-choice' => array(
			'value' => 'on',
			'label' => esc_html__('On', 'jevelin'),
		),
	),

	'placeholder_icon_style' => array(
		'type'  => 'radio',
		'label' => esc_html__('Placholder Icon Style', 'jevelin'),
		'desc'  => esc_html__( 'Choose placholder icon style', 'jevelin' ),
		'choices' => array(
			'style1' => esc_html__( 'Style 1', 'jevelin' ),
			'style2' => esc_html__( 'Style 2', 'jevelin' ),
		),
		'value'	  => 'style1',
	),

	'custom_class'   => array(
		'type'  => 'text',
		'label' => esc_html__( 'Class Name', 'jevelin' ),
		'desc'  => esc_html__( 'Enter custom class name', 'jevelin' )
	),

);
