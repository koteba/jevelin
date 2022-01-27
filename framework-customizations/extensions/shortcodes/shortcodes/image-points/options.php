<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(
	'id' => array( 'type' => 'unique' ),

	'image' => array(
		'label'   => esc_html__( 'Image', 'jevelin' ),
		'desc'    => esc_html__( 'Upload a image', 'jevelin' ),
		'type'    => 'upload',
	),

	'points' => array(
		'label'         => esc_html__( 'Points', 'jevelin' ),
		'popup-title'   => esc_html__( 'Add/Edit Points', 'jevelin' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Points.', 'jevelin' ),
		'type'          => 'addable-popup',
		'template'      => '{{=content}}',
		'size'			=> 'medium',
		'popup-options' => array(

			'top' => array(
				'label' => esc_html__('Top / Bottom Alignment', 'jevelin'),
				'desc'  => esc_html__('Select the top edge alignment percentege (0% for top edge 100% for bottom edge)', 'jevelin'),
				'type'  => 'slider',
				'value' => 20,
				'properties' => array(
					'min' => 0,
					'max' => 100,
					'step' => 1,
				),
			),

			'left' => array(
				'label' => esc_html__('Left / Right Alignment', 'jevelin'),
				'desc'  => esc_html__('Select the top edge alignment percentege (0% for left edge 100% for right edge)', 'jevelin'),
				'type'  => 'slider',
				'value' => 20,
				'properties' => array(
					'min' => 0,
					'max' => 100,
					'step' => 1,
				),
			),

			'content' => array(
				'label' => esc_html__( 'Content', 'jevelin' ),
				'desc'  => esc_html__( 'Enter your content', 'jevelin' ),
				'type'  => 'textarea',
				'teeny' => false
			),

		)
	),

	'style' => array(
		'type'    => 'radio',
		'label'   => esc_html__('Style', 'jevelin'),
		'desc'  => esc_html__('Choose main style', 'jevelin'),
		'choices' => array(
			'style1' => esc_html__('Style 1 (smaller pointers)', 'jevelin'),
			'style2' => esc_html__('Style 2 (larger pointers)', 'jevelin'),
		),
		'value'	  => 'style1',
	),

	'pointer_color' => array(
	    'type'  => 'rgba-color-picker',
	    'label' => esc_html__( 'Pointer Color', 'jevelin' ),
	    'desc'  => esc_html__( 'Select button color or leave blank for white color', 'jevelin' ),
	    'value' => ''
	),

    'source' => array(
        'type'    => 'select',
        'label'   => esc_html__('Image Source', 'jevelin'),
        'desc'  => esc_html__('Choose image source size', 'jevelin'),
        'choices' => array(
            'large' => esc_html__('Large Size', 'jevelin'),
            'full' => esc_html__('Full Size', 'jevelin'),
        ),
        'value'	=> 'large'
    ),

);
