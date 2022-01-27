<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(

	'id' => array( 'type' => 'unique' ),

	'posts_per_page' => array(
	    'type'  => 'slider',
	    'value' => 12,
	    'properties' => array(
	        'min' => 1,
	        'max' => 40,
	    ),
	    'label' => esc_html__('Show Posts', 'jevelin'),
	    'desc'  => esc_html__('Choose how many posts will be shown. Notice: Currently this element works only when using one instance per page', 'jevelin'),
	),

	'load_more' => array(
	    'type'  => 'slider',
	    'value' => 4,
	    'properties' => array(
	        'min' => 1,
	        'max' => 40,
	    ),
	    'label' => esc_html__('Load More Posts Per Page', 'jevelin'),
	    'desc'  => esc_html__('Choose how many items will be loaded', 'jevelin'),
	),

	'pagination_type' => array(
		'type'  => 'radio',
		'value' => 'button',
		'label' => esc_html__( 'Pagination Type', 'jevelin' ),
		'desc'  => esc_html__( 'Choose pagination type', 'jevelin' ),
		'choices' => array(
			'button' => esc_html__( 'Load More button (on click)', 'jevelin' ),
			'infinite' => esc_html__( 'Infinite loading (on scroll)', 'jevelin' ),
		),
		'inline' => false,
	),

	'columns' => array(
		'type'    => 'radio',
		'label'   => esc_html__('Columns', 'jevelin'),
		'desc'  => esc_html__( 'Choose column count', 'jevelin' ),
		'value'	  => '4',
		'choices' => array(
			'3' => esc_html__('Columns 3', 'jevelin'),
			'4' => esc_html__('Columns 4', 'jevelin'),
		)
	),

);
