<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }

$options = array(

	'id' => array( 'type' => 'unique' ),

	'form_id'   => array(
		'type'  => 'text',
		'label' => esc_html__( 'Form ID', 'jevelin' ),
		'desc'  => esc_html__( 'Enter your Contact Form ID', 'jevelin' ),
	),

    'style' => array(
        'label'   => esc_html__('Style', 'jevelin'),
        'desc'    => esc_html__('Select main style', 'jevelin'),
        'type'    => 'radio',
        'choices' => array(
            'style1' => esc_html__('Standard', 'jevelin'),
            'style2' => esc_html__('Input Round Edges (2px border)', 'jevelin'),
            'style3' => esc_html__('Input Center Text', 'jevelin'),
			'style4' => esc_html__('Bottom Line with simple submit button', 'jevelin'),
			'style4 style6' => esc_html__('Bottom Line with submit button in accent color', 'jevelin'),
			'style5' => esc_html__('Dark line', 'jevelin'),
        ),
        'value' => 'style1',
    ),

	/*'layout' => array(
        'label'   => esc_html__('Layout', 'jevelin'),
        'desc'    => esc_html__('Select main layout', 'jevelin'),
        'type'    => 'radio',
        'choices' => array(
            'layout1' => esc_html__('Standard', 'jevelin'),
            'layout-inline' => esc_html__('Inline (useful for subscription form)', 'jevelin'),
        ),
        'value' => 'layout1',
    ),*/

);
