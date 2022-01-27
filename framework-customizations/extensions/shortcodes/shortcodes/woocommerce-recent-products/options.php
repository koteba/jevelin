<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(

	'id' => array( 'type' => 'unique' ),

	'per_page' => array(
	    'type'  => 'slider',
	    'value' => 12,
	    'properties' => array(
	        'min' => 1,
	        'max' => 40,
	    ),
	    'label' => esc_html__('Limit', 'jevelin'),
	    'desc'  => esc_html__('Choose products limit', 'jevelin'),
	),

	'columns' => array(
	    'type'  => 'slider',
	    'value' => 5,
	    'properties' => array(
	        'min' => 2,
	        'max' => 6,
	    ),
	    'label' => esc_html__('Columns', 'jevelin'),
	    'desc'  => esc_html__('Choose product column count', 'jevelin'),
	),

	'carousel' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Carousel', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable carousel', 'jevelin' ),
		'value' => false,
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__('Off', 'jevelin'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('On', 'jevelin'),
		),
	),

	'order_by' => array(
		'type'    => 'radio',
		'label'   => esc_html__('Order By', 'jevelin'),
		'desc'  => esc_html__( 'Choose product order by', 'jevelin' ),
		'value'	  => 'date',
		'choices' => array(
			'date' => esc_html__('Date', 'jevelin'),
			'name' => esc_html__('Name', 'jevelin'),
			'author' => esc_html__('Author', 'jevelin'),
			'rand' => esc_html__('Random', 'jevelin'),
			'comment_count' => esc_html__('Comment Count', 'jevelin'),
		)
	),

	'order' => array(
		'type'    => 'radio',
		'label'   => esc_html__('Order', 'jevelin'),
		'desc'  => esc_html__( 'Choose product order', 'jevelin' ),
		'value'	  => 'desc',
		'choices' => array(
			'asc' => esc_html__('Ascending', 'jevelin'),
			'desc' => esc_html__('Descending', 'jevelin'),
		)
	),

	'style' => array(
		'type'    => 'radio',
		'label'   => esc_html__('Style', 'jevelin'),
		'desc'  => esc_html__( 'Choose item style', 'jevelin' ),
		'value'	  => 'style1',
		'choices' => array(
			'style1' => esc_html__('Style 1', 'jevelin'),
			'style2' => esc_html__('Style 2', 'jevelin'),
		)
	),

	'filter' => array(
		'type'    => 'radio',
		'label'   => esc_html__('Filter', 'jevelin'),
		'desc'  => esc_html__('Select filter style or disable it', 'jevelin'),
		'choices' => array(
			'none' => esc_html__('None', 'jevelin'),
			'default' => esc_html__('Style 1', 'jevelin'),
			'style2' => esc_html__('Style 2', 'jevelin'),
			'style3' => esc_html__('Style 3', 'jevelin'),
			'style3 sh-portfolio-filter-style4' => esc_html__('Style 4', 'jevelin'),
		),
		'value'	  => 'none',
	),

);
