<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Widget Area', 'jevelin' ),
	'description' => esc_html__( 'Add a Widget Area', 'jevelin' ),
	'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
	'icon'  => 'ti-layers',
);
