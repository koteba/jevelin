<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Heading Animation', 'jevelin' ),
		'description' => esc_html__( 'Add a Heading Animation', 'jevelin' ),
		'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
		'popup_size'  => 'medium',
		'icon' => 'ti-control-play',
        'title_template' => '
        	<b>{{- title }}</b>',
	)
);
