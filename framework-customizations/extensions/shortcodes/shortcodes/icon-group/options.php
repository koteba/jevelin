<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(

	'id' => array( 'type' => 'unique' ),

	'general_box' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

		'icons' => array(
			'label'         => esc_html__( 'Icons', 'jevelin' ),
			'popup-title'   => esc_html__( 'Add/Edit Icons', 'jevelin' ),
			'desc'          => esc_html__( 'Here you can add, remove and edit your icons', 'jevelin' ),
			'type'          => 'addable-popup',
			'template'      => '<i class="{{=icon}}" style="font-size: 21px;"></i>',
			'size'			=> 'medium',
			'popup-options' => array(

				'icon'    => array(
					'type'  => 'new-icon',
					'label' => esc_html__('Icon', 'jevelin'),
					'desc'   => esc_html__( 'Select Icon', 'jevelin' ),
					'set' => 'jevelin-icons',
					'value' => 'ti-check'
				),

				'link'    => array(
					'label' => esc_html__( 'Link', 'jevelin' ),
					'desc'  => esc_html__( 'Enter icon link', 'jevelin' ),
					'type'  => 'text'
				),

			)
		),

	    'alignment' => array(
	        'label'   => esc_html__('Alignment', 'jevelin'),
	        'desc'    => esc_html__('Choose alignment', 'jevelin'),
	        'type'    => 'radio',
	        'choices' => array(
	            'center' => esc_html__('Center', 'jevelin'),
	            'left' => esc_html__('Left', 'jevelin'),
	            'right' => esc_html__('Right', 'jevelin'),
	        ),
	        'value' => 'center'
	    ),

		'alignment_mobile' => array(
	        'label'   => esc_html__('Alignment (mobile)', 'jevelin'),
	        'desc'    => esc_html__('Choose mobile alignment', 'jevelin'),
	        'type'    => 'radio',
	        'choices' => array(
				'default' => esc_html__('Default', 'jevelin'),
	            'center' => esc_html__('Center', 'jevelin'),
	            'left' => esc_html__('Left', 'jevelin'),
	            'right' => esc_html__('Right', 'jevelin'),
	        ),
	        'value' => 'default'
	    ),


		'style' => array(
	        'label'   => esc_html__('Style', 'jevelin'),
	        'desc'    => esc_html__('Choose icon style', 'jevelin'),
	        'type'    => 'radio',
	        'choices' => array(
	            'style1' => esc_html__('Style 1 (background on hover)', 'jevelin'),
	            'style2' => esc_html__('Style 2 (with line)', 'jevelin'),
				'style3' => esc_html__('Style 3 (without background color)', 'jevelin'),
				'style4' => esc_html__('Style 4 (without padding)', 'jevelin'),
	        ),
	        'value' => 'style1'
	    ),

		'icon_size' => array(
			'type'  => 'select',
			'label' => esc_html__('Size', 'jevelin'),
			'desc'  => wp_kses( __( 'Enter icon size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
			'type'  => 'text',
			'attr'  => array( 'style' => 'max-width: 70px;' ),
			'value' => '24px'
		),

		'icon_color' => array(
		    'type'  => 'rgba-color-picker',
		    'label' => esc_html__('Icon Color', 'jevelin'),
		    'desc'  => esc_html__('Select icon color or leave blank for default body color', 'jevelin'),
		    'value' => '',
		),

		'icon_hover_color' => array(
		    'type'  => 'rgba-color-picker',
		    'label' => esc_html__('Icon Hover Color', 'jevelin'),
		    'desc'  => esc_html__('Select icon color or leave blank for default body color', 'jevelin'),
		    'value' => '',
		),

		'width'    => array(
			'label' => esc_html__( 'Icon Box Size', 'jevelin' ),
			'desc'  => esc_html__( 'Enter icon box size for width/height, default 60px. You can disable it by enterting auto', 'jevelin' ),
			'type'  => 'text'
		),

		'padding'    => array(
			'label' => esc_html__( 'Padding', 'jevelin' ),
			'desc'  => esc_html__( 'Enter icon padding, default is 0px 10px 0px 10px (<b>top right bottom left</b>)', 'jevelin' ),
			'type'  => 'text'
		),


		),
	),
	'position_box' => array(
		'title'   => esc_html__( 'Position', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(


			'margin_desktop' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Margin v22', 'jevelin' ),
				'desc'  => esc_html__( 'Enter your custom margin (top right bottom left)', 'jevelin' ),
				'value' => '0px 0px 0px 0px',
			),

			'margin_responsive' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Margin Responsive', 'jevelin' ),
				'desc'  => esc_html__( 'Here you can set responsive smartphone and tablet margin (top right bottom left). For example: 30px 0px 30px 0px', 'jevelin' ),
			),


		),
	),

);
