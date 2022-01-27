<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Woo Recent Products', 'jevelin' ),
		'description' => esc_html__( 'Embed WooCommerce Recent Products', 'jevelin' ),
		'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
		'popup_size'  => 'medium',
		'icon' => 'ti-shopping-cart',
        'title_template' => '
        	<b>{{- title }}</b>',
	)
);
