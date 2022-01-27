<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(

	'id' => array( 'type' => 'unique' ),
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'title'   => array(
				'label' => esc_html__( 'Title', 'jevelin' ),
				'desc'  => esc_html__( 'Enter title', 'jevelin' ),
				'type'  => 'text'
			),

			'desc' => array(
			    'type'  => 'textarea',
			    'label' => esc_html__('Description', 'jevelin' ),
			    'desc'  => esc_html__('Enter description', 'jevelin' ),
			    'attr'  => array( 'style' => 'max-height: 80px;' ),
			),

			'button_name'   => array(
				'label' => esc_html__( 'Button Name', 'jevelin' ),
				'desc'  => esc_html__( 'Enter button name', 'jevelin' ),
				'type'  => 'text',
				'value'  => esc_html__( 'More', 'jevelin' ),
			),

			'button_link'   => array(
				'label' => esc_html__( 'Button Link', 'jevelin' ),
				'desc'  => esc_html__( 'Enter button link', 'jevelin' ),
				'type'  => 'text',
				'value'  => '#',
			),

		),
	),

	'styling' => array(
		'title'   => esc_html__( 'Styling', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'title_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__( 'Title Color', 'jevelin' ),
			    'desc'  => esc_html__( 'Select title color (optional)', 'jevelin' ),
			),

			'desc_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__( 'Description Color', 'jevelin' ),
			    'desc'  => esc_html__( 'Select description color (optional)', 'jevelin' ),
			),

			'line_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__( 'Line Color', 'jevelin' ),
			    'desc'  => esc_html__( 'Select line color (optional)', 'jevelin' ),
			),

		),
	),

);
