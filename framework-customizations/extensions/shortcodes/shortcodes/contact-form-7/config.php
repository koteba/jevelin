<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Contact Form 7', 'jevelin' ),
	'description' => esc_html__( 'Add a Contact Form 7', 'jevelin' ),
	'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
	'popup_size'  => 'medium',
    'icon' => 'ti-pencil-alt',
    'title_template' => '<b>{{- title }}</b>',
);
