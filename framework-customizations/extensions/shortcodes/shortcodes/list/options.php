<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(

	'id' => array( 'type' => 'unique' ),

	'list' => array(
	    'label' => esc_html__('Items', 'jevelin'),
	    'desc'  => esc_html__('Enter list items', 'jevelin'),
	    'type'  => 'addable-box',
	    'value' => array(
	        array(
	            'title' => 'Item 1',
	        )
	    ),
	    'box-options' => array(
	        'title' => array( 'type' => 'text' ),
	    ),
	    'template' => '{{- title }}',
	    'limit' => 0,
	    'add-button-text' => esc_html__('Add', 'jevelin'),
	    'sortable' => true,
	),

	'icon' => array(
	    'type'  => 'new-icon',
	    'value' => 'icon-arrow-right-circle',
	    'label' => esc_html__('Icon', 'jevelin'),
	    'desc'  => esc_html__('Choose icon', 'jevelin'),
	    'set' => 'jevelin-icons',
	),

    'style' => array(
        'label'   => esc_html__('Style', 'jevelin'),
        'desc'    => esc_html__('Choose main style', 'jevelin'),
        'type'    => 'radio',
        'choices' => array(
            'style1' => esc_html__('Style 1', 'jevelin'),
            'style2' => esc_html__('Style 2', 'jevelin'),
            'style3' => esc_html__('Style 3', 'jevelin'),
			'style4' => esc_html__('Style 4 (inline)', 'jevelin'),
        ),
        'value' => 'style1',
    ),

	'text_color' => array(
	    'label' => esc_html__('Text Color', 'jevelin'),
	    'desc'  => esc_html__('Select text color', 'jevelin'),
	    'type'  => 'color-picker'
	),

	'icon_color' => array(
	    'label' => esc_html__('Icon Color', 'jevelin'),
	    'desc'  => esc_html__('Select icon color', 'jevelin'),
	    'type'  => 'color-picker'
	),

);
