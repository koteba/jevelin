<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }

$options = array(
	'content' => array(
	    'type'  => 'textarea',
	    'label' => esc_html__('Content', 'jevelin'),
	    'desc'  => esc_html__('Enter your custom HTML content', 'jevelin'),
	    'value' => '<p>This is simple <strong>HTML output</strong><br />With some <i>styling</i>.</b>'
	),
);
