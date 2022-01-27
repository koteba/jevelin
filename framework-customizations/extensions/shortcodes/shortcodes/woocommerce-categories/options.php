<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(

	'id' => array( 'type' => 'unique' ),

	/*'limit' => array(
	    'type'  => 'slider',
	    'value' => 6,
	    'properties' => array(
	        'min' => 1,
	        'max' => 41,
	    ),
	    'label' => esc_html__('Limit posts', 'jevelin'),
	    'desc'  => esc_html__('Choose post limit. Choose 41 posts to select unlimited posts', 'jevelin'),
	),*/

    'categories' => array(
        'type'  => 'multi-select',
        'label' => esc_html__('Blog Categories', 'jevelin'),
        'desc'  => esc_html__('Choose which blog categories you want to show', 'jevelin'),
        'population' => 'taxonomy',
        'source' => 'product_cat',
        'prepopulation' => 15,
        'limit' => 100,
    ),

	'columns' => array(
		'type'    => 'radio',
		'label'   => esc_html__('Columns', 'jevelin'),
		'desc'  => esc_html__( 'Choose columns count', 'jevelin' ),
		'value'	  => '3',
		'choices' => array(
			'2' => esc_html__( '2 columns', 'jevelin' ),
			'3' => esc_html__( '3 columns', 'jevelin' ),
		)
	),

	/*'carousel' => array(
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
	),*/

	/*'order_by' => array(
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
	),*/

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

);
