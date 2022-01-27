<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$carousel_options = array(

    'carousel_dots_style' => array(
	    'type'  => 'radio',
	    'value' => 'style1',
	    'label' => esc_html__('Dots Style', 'jevelin'),
	    'choices' => array(
	        'style1' => esc_html__( 'Standard - Large active (width shadow) and smaller other dots with background color', 'jevelin' ),
            'style2' => esc_html__( 'Standard - Equal size dots with background color', 'jevelin' ),
	        'style3' => esc_html__( 'Modern - Equal size dots with background color for active and border only for other dots', 'jevelin' ),
	    ),
	),

    'carousel_dots_spacing' => array(
	    'type'  => 'radio',
	    'value' => '5px',
	    'label' => esc_html__('Dots Spacing', 'jevelin'),
	    'choices' => array(
            '3px' => esc_html__( '3px', 'jevelin' ),
	        '5px' => esc_html__( '5px', 'jevelin' ),
            '8px' => esc_html__( '8px', 'jevelin' ),
            '10px' => esc_html__( '10px', 'jevelin' ),
            '12px' => esc_html__( '12px', 'jevelin' ),
            '15px' => esc_html__( '15px', 'jevelin' ),
	    ),
	),

	'carousel_dots_top_margin' => array(
	    'type'  => 'select',
	    'value' => '0px',
	    'label' => esc_html__('Dots Additional Top Margin', 'jevelin'),
	    'choices' => array(
			'0px' => esc_html__( '0px', 'jevelin' ),
            '3px' => esc_html__( '3px', 'jevelin' ),
	        '5px' => esc_html__( '5px', 'jevelin' ),
            '8px' => esc_html__( '8px', 'jevelin' ),
            '10px' => esc_html__( '10px', 'jevelin' ),
            '12px' => esc_html__( '12px', 'jevelin' ),
            '15px' => esc_html__( '15px', 'jevelin' ),
	    ),
	),

    'carousel_dots_size' => array(
	    'type'  => 'radio',
	    'value' => 'standard',
	    'label' => esc_html__('Dots Size', 'jevelin'),
	    'choices' => array(
            'small' => esc_html__( 'Small', 'jevelin' ),
            'standard' => esc_html__( 'Standard', 'jevelin' ),
	    ),
	),

    'carousel_dots_background_color' => array(
	    'type'  => 'rgba-color-picker',
	    'label' => esc_html__( 'Dot Background Color', 'jevelin' ),
	),

    'carousel_dots_border_color' => array(
	    'type'  => 'rgba-color-picker',
	    'label' => esc_html__( 'Dot Border Color', 'jevelin' ),
	    'desc'  => esc_html__( 'Changes dot border color if this style uses border', 'jevelin' ),
	),

    'carousel_dots_active_background_color' => array(
	    'type'  => 'rgba-color-picker',
	    'label' => esc_html__( 'Active Dot Background Color', 'jevelin' ),
	),

    'carousel_dots_active_border_color' => array(
	    'type'  => 'rgba-color-picker',
	    'label' => esc_html__( 'Active Dot Border Color', 'jevelin' ),
	    'desc'  => esc_html__( 'Changes dot border color if this style uses border', 'jevelin' ),
	),

);


$options = array(
	'carousel' => array(
		'title'   => esc_html__( 'Carousel', 'jevelin' ),
		'type'    => 'tab',
		'icon'	  => 'fa fa-phone',
		'options' => array(
			'carousel-box' => array(
				'title'   => esc_html__( 'Carousel Settings', 'jevelin' ),
				'type'    => 'box',
				'options' => $carousel_options
			),
		)
	)
);
