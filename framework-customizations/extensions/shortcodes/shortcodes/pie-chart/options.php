<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(
	'id' => array( 'type' => 'unique' ),
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'type' => array(
				'type'  => 'radio',
				'label' => esc_html__('Type', 'jevelin'),
				'desc'  => esc_html__( 'Choose video alignment ', 'jevelin' ),
				'choices' => array(
					'circle' => esc_html__( 'Circle', 'jevelin' ),					
					'rhomb' => esc_html__( 'Rhomb', 'jevelin' ),
				),
				'value'	=> 'circle',
			),

			'percentage' => array(
			    'type'  => 'slider',
			    'value' => 50,
			    'properties' => array(
			        'min' => 1,
			        'max' => 100,
			    ),
			    'label' => esc_html__('Percentage', 'jevelin'),
			    'desc'  => esc_html__('Choose products per page', 'jevelin'),
			),

		),
	),
	'styling' => array(
		'title'   => esc_html__( 'Styling', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'text_color' => array(
			    'type'  => 'color-picker',
			    'value' => '',
			    'label' => esc_html__('Text Color', 'jevelin'),
			    'desc'  => esc_html__('Select text color', 'jevelin'),
			),

			'line_color' => array(
			    'type'  => 'color-picker',
			    'value' => '#eeeeee',
			    'label' => esc_html__('Line Color', 'jevelin'),
			    'desc'  => esc_html__('Select line color', 'jevelin'),
			),

			'accent_color' => array(
			    'type'  => 'color-picker',
			    'value' => '',
			    'label' => esc_html__('Accent Color', 'jevelin'),
			    'desc'  => esc_html__('Select line accent color', 'jevelin'),
			),

			'accent_hover_color' => array(
			    'type'  => 'color-picker',
			    'value' => '',
			    'label' => esc_html__('Accent Hover Color', 'jevelin'),
			    'desc'  => esc_html__('Select line accent color', 'jevelin'),
			),

			'background_color' => array(
			    'type'  => 'rgba-color-picker',
			    'value' => '#ffffff',
			    'label' => esc_html__('Background Color', 'jevelin'),
			    'desc'  => esc_html__('Select text color', 'jevelin'),
			),

		),
	),
);
