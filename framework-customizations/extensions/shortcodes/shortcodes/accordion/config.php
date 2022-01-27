<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Accordion', 'jevelin' ),
	'description' => esc_html__( 'Add a Accordion', 'jevelin' ),
	'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
	'popup_size'  => 'medium',
	'icon' => 'ti-layout-accordion-list',
    'title_template' => '
    	<b>{{- title }}</b>',
);
