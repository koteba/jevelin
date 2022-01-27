<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Tabs', 'jevelin' ),
	'description' => esc_html__( 'Add some Tabs', 'jevelin' ),
	'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
	'popup_size'  => 'medium',
    'icon' => 'ti-layout-tab',
    'title_template' => '
    	<b>{{- title }}</b>',
);
