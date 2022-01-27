<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$custom_code_options = array(
	'custom_css'   => array(
		'label' => esc_html__( 'CSS Code', 'jevelin' ),
		'desc'  => esc_html__( 'Just want to do some quick CSS changes? Enter them here, they will be applied to the theme. If you need to change major portions of the theme please use the custom.css file.', 'jevelin' ),
		'type'  => 'textarea',
	),

	'custom_js'   => array(
		'label' => esc_html__( 'JavaScript Code', 'jevelin' ),
		'desc'  => esc_html__( 'Enter your JavaScript code', 'jevelin' ),
		'type'  => 'textarea',
	),

	'google_analytics'   => array(
		'label' => esc_html__( 'Google Analytics ID', 'jevelin' ),
		'desc'  => esc_html__( 'Enter your Google Analytics ID like UA-XXXXX-Y to enable Google Analytics statistic', 'jevelin' ),
		'type'  => 'text',
		'attr'  => array( 'style' => 'max-width: 150px' ),
	),
);


$options = array(
	'custom' => array(
		'title'   => esc_html__( 'Custom Code', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(
			'custom-box' => array(
				'title'   => esc_html__( 'Custom', 'jevelin' ),
				'type'    => 'box',
				'options' => $custom_code_options
			),
		)
	)
);
