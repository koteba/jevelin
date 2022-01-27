<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }

$options = array(

	'id' => array( 'type' => 'unique' ),

	'date'  => array(
	    'label' => esc_html__('Date', 'jevelin'),
	    'desc'  => esc_html__('Choose target date (example: 2029/01/31 12:00)', 'jevelin'),
	    'type'  => 'datetime-picker',
	    'value' => '',
	    'datetime-picker' => array(
	        'format'        => 'Y/m/d H:i',
	        'maxDate'       => false,
	        'minDate'       => false,
	        'timepicker'    => true,
	        'datepicker'    => true,
	        'defaultTime'   => '12:00',
	        'step' => 30
	    ),
	),

    'style' => array(
        'label'   => esc_html__('Style', 'jevelin'),
        'desc'    => esc_html__('Select main style', 'jevelin'),
        'type'    => 'radio',
        'choices' => array(
            'style1' => esc_html__('Style 1', 'jevelin'),
            'style2' => esc_html__('Style 2', 'jevelin'),
            'style3' => esc_html__('Style 3', 'jevelin'),
        ),
        'value' => 'style1',
    ),

    'size' => array(
        'label'   => esc_html__('Size', 'jevelin'),
        'desc'    => esc_html__('Select countdown number and text size', 'jevelin'),
        'type'    => 'select',
        'choices' => array(
            'small' => esc_html__('Small', 'jevelin'),
            'medium' => esc_html__('Medium', 'jevelin'),
            'large' => esc_html__('Large', 'jevelin'),
        ),
        'value' => 'medium',
    ),

    'alignment' => array(
        'label'   => esc_html__('Alignment', 'jevelin'),
        'desc'    => esc_html__('Select coundown alignment', 'jevelin'),
        'type'    => 'select',
        'choices' => array(
            'center' => esc_html__('Center', 'jevelin'),
            'left' => esc_html__('Left', 'jevelin'),
            'right' => esc_html__('Right', 'jevelin'),
        ),
        'value' => 'center',
    ),

	'number_color' => array(
	    'label' => esc_html__('Number Color', 'jevelin'),
	    'desc'  => esc_html__('Select number color', 'jevelin'),
	    'type'  => 'rgba-color-picker',
	),

	'title_color' => array(
	    'label' => esc_html__('Title Color', 'jevelin'),
	    'desc'  => esc_html__('Select title color', 'jevelin'),
	    'type'  => 'rgba-color-picker',
	),

	'border_color' => array(
	    'label' => esc_html__('Border Color', 'jevelin'),
	    'desc'  => esc_html__('Select border color', 'jevelin'),
	    'type'  => 'rgba-color-picker',
	    'value' => ''
	),

    'bold' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Bold Numbers', 'jevelin' ),
		'desc' => esc_html__( 'Switch between regular and bold numbers', 'jevelin' ),
		'value' => 'regular',
		'left-choice' => array(
			'value' => 'regular',
			'label' => esc_html__('Regular', 'jevelin'),
		),
		'right-choice' => array(
			'value' => 'bold',
			'label' => esc_html__('Bold', 'jevelin'),
		),
    ),

	'title_size'   => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title Size', 'jevelin' ),
		'desc'  => wp_kses( __( 'Enter custom title size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
		'help'  => esc_html__( 'Example: 16px;', 'jevelin' ),
	),

);
