<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }

$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Output HTML', 'jevelin' ),
		'description' => esc_html__( 'Add a Output HTML', 'jevelin' ),
		'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
		//'popup_size'  => 'medium',

		'icon' => 'fa fa-code',
        'title_template' => '
        	<b>{{- title }}</b>',
	)
);
