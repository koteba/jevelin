<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
$options = array(

	'id' => array( 'type' => 'unique' ),

	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'images' => array(
			    'label' => esc_html__('Images', 'jevelin'),
			    'desc'  => esc_html__('To select multiple images use the CTRL key for PC or COMMAND key for MAC.', 'jevelin'),
			    'type'  => 'multi-upload',
			    'images_only' => true,
			),

			'columns' => array(
				'type'  => 'select',
				'label' => esc_html__('Image Columns', 'jevelin'),
				'desc'  => esc_html__('Choose image columns count', 'jevelin'),
				'choices' => array(
					'1columns' => esc_html__('1 Column', 'jevelin'),
					'2columns' => esc_html__('2 Columns', 'jevelin'),
					'3columns' => esc_html__('3 Columns', 'jevelin'),
					'4columns' => esc_html__('4 Columns', 'jevelin'),
					'5columns' => esc_html__('5 columns', 'jevelin'),
				),
				'value'	  => '3columns',
			),

			'image_ratio' => array(
				'type'  => 'select',
				'label' => esc_html__('Image Ratio', 'jevelin'),
				'desc'  => esc_html__('Choose image ratio', 'jevelin'),
				'choices' => array(
					'landscape' => esc_html__('Landscape', 'jevelin'),
					'portrait' => esc_html__('Portrait', 'jevelin'),
					'square' => esc_html__('Square', 'jevelin'),
					'large' => esc_html__('Large (default ratio)', 'jevelin'),
					'full' => esc_html__('Full (default ratio)', 'jevelin'),
				),
				'value'	  => 'square',
			),

			'autoplay' => array(
			    'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
			    'value' => array(
			        'mobile' => 'off',
			    ),
			    'picker' => array(
					'autoplay' => array(
						'type' => 'switch',
						'label' => esc_html__( 'Autoplay', 'jevelin' ),
						'desc' => esc_html__( 'Enable or disable autoplay', 'jevelin' ),
						'value' => 'off',
						'left-choice' => array(
							'value' => 'off',
							'label' => esc_html__('Off', 'jevelin'),
						),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__('On', 'jevelin'),
						),
					),
			    ),
			    'choices' => array(
			        'on' => array(
						'animation_speed' => array(
						    'type'  => 'slider',
						    'value' => 3,
						    'properties' => array(
						        'min' => 0,
						        'max' => 6,
						        'step' => 0.1,
						    ),
						    'label' => esc_html__('Animation Speed', 'jevelin'),
						    'desc'  => esc_html__('Choose animation speed (seconds)', 'jevelin'),
						),
			        ),
			    ),
			),

		),
	),

	'styling_tab' => array(
		'title'   => esc_html__( 'Styling', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'overlay' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Overlay', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable overlay', 'jevelin' ),
				'value' => 'on',
				'left-choice' => array(
					'value' => 'off',
					'label' => esc_html__('Off', 'jevelin'),
				),
				'right-choice' => array(
					'value' => 'on',
					'label' => esc_html__('On', 'jevelin'),
				),
			),

			'margin'  => array(
			    'label' => esc_html__( 'Image Margin', 'jevelin' ),
			    'desc'  => esc_html__( 'Select image margin for white space around them', 'jevelin' ),
			    'type'  => 'slider',
			    'properties' => array(
			        'min' => 0,
			        'max' => 30,
			        'sep' => 1,
			    ),
			),

			'radius'  => array(
				'label' => esc_html__( 'Image Radius', 'jevelin' ),
				'desc'  => esc_html__( 'Select image radius', 'jevelin' ),
				'type'  => 'slider',
				'properties' => array(
					'min' => 0,
					'max' => 100,
					'sep' => 1,
				),
			),

			'shadow' => array(
				'type'    => 'radio',
				'label'   => esc_html__( 'Shadow', 'jevelin' ),
				'desc'    => esc_html__( 'Choose image shadow', 'jevelin' ),
				'value'	  => 'disabled',
				'choices' => array(
					'disabled' => esc_html__('Disabled', 'jevelin'),
					'shadow1' => esc_html__('Shadow 1 (large)', 'jevelin'),
					'shadow2' => esc_html__('Shadow 2 (medium)', 'jevelin'),
					'shadow3' => esc_html__('Shadow 3 (Xlage)', 'jevelin'),
					'shadow4' => esc_html__('Shadow 4 (focus at the bottom middle)', 'jevelin'),
				)
			),

		),
	),

	'dots_tab' => array(
		'title'   => esc_html__( 'Dots', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'dots' => array(
				'type'  => 'select',
				'label' => esc_html__('Position', 'jevelin'),
				'desc'  => esc_html__('Choose dots position', 'jevelin'),
				'choices' => array(
					'dots1' => esc_html__('Below Images', 'jevelin'),
					'dots2' => esc_html__('On Images', 'jevelin'),
					'disable' => esc_html__('Disable', 'jevelin'),
				),
				'value'	=> 'dots1',
			),

			'dots_alignment' => array(
				'type'  => 'select',
				'label' => esc_html__('Alignment', 'jevelin'),
				'desc'  => esc_html__('Choose dots alignment', 'jevelin'),
				'choices' => array(
					'left' => esc_html__('Left', 'jevelin'),
					'center' => esc_html__('Center', 'jevelin'),
					'right' => esc_html__('Right', 'jevelin'),
				),
				'value'	=> 'center',
			),

			'dots_color' => array(
				'type'  => 'color-picker',
				'label' => esc_html__('Active Color', 'jevelin'),
				'desc'   => esc_html__( 'Select active dot color', 'jevelin' ),
			),

			'bottom_margin'   => array(
				'label' => esc_html__( 'Bottom Margin', 'jevelin' ),
				'desc'  => esc_html__( 'Enter bottom margin, default 45px', 'jevelin' ),
				'type'  => 'text'
			),

		),
	),

	'lazy_tab' => array(
		'title'   => esc_html__( 'Lazy Loading', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'lazy' => array(
				'type'    => 'radio',
				'label'   => esc_html__( 'Lazy Loading', 'jevelin' ),
				'desc'    => esc_html__( 'Choose to enable to disable lazy loading', 'jevelin' ),
				'value'	  => 'default',
				'choices' => array(
					'default' => esc_html__('Default (from theme settings)', 'jevelin'),
					'disabled' => esc_html__('Disabled', 'jevelin'),
					'enabled' => esc_html__('Enabled', 'jevelin'),
				)
			),

		),
	),
);
