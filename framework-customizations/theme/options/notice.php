<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$notice_options = array(
	'notice_status' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Notice', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable notice abowe header', 'jevelin' ),
		'value' => false,
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__('Off', 'jevelin'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('On', 'jevelin'),
		),
	),

	'notice_text' => array(
		'type'   => 'wp-editor',
		'teeny'  => true,
		'reinit' => true,
		'size'   => 'large',
		'label'  => esc_html__( 'Notice Text', 'jevelin' ),
		'desc'   => esc_html__( 'Enter notice text', 'jevelin' ).'
			<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
		'editor_height' => 110,
		'value' => 'By using our website, you agree to the use of our cookies.'
	),

	'notice_close' => array(
	    'type'  => 'radio',
	    'value' => 'enable',
	    'label' => esc_html__('Close Button', 'jevelin'),
	    'desc'  => esc_html__('Select if this notice can be closed', 'jevelin'),
	    'choices' => array(
	        'disable' => esc_html__( 'Disable', 'jevelin' ),
	        'enable' => esc_html__( 'Enable (remember close action)', 'jevelin' ),
	        'enable2' => esc_html__( 'Enable (do not remember close action)', 'jevelin' ),
	    ),
	),

	'notice_more_url' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Learn More URL', 'jevelin'),
		'desc'  => esc_html__('Enter learn more URL', 'jevelin'),
	),
);


$options = array(
	'notice-page' => array(
		'title'   => esc_html__( 'Notice', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(
			'404-page-box' => array(
				'title'   => esc_html__( 'Notice Settings', 'jevelin' ),
				'type'    => 'box',
				'options' => $notice_options
			),
		)
	)
);
