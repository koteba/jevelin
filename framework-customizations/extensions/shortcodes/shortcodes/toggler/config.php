<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Toggler', 'jevelin' ),
	'description' => esc_html__( 'Add a Toggler', 'jevelin' ),
	'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
	'popup_size'  => 'medium',
	'icon' => 'ti-panel',
    'title_template' => '
    	<b>{{- title }}</b>',
);
