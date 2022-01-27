<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

$cfg = array(
	'page_builder' => array(
		'tab'         => esc_html__('Layout Elements', 'jevelin'),
		'title'       => esc_html__('Section', 'jevelin'),
		'description' => esc_html__('Add a Section', 'jevelin'),
		'popup_size'  => 'medium',
		'type'        => 'section', // WARNING: Do not edit this
	)
);
