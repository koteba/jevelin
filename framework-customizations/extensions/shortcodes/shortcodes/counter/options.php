<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }

$options = array(

	'id' => array( 'type' => 'unique' ),
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'number'  => array(
				'label' => esc_html__( 'Number', 'jevelin' ),
				'desc'  => esc_html__( 'Enter number', 'jevelin' ),
				'type'  => 'text',
				'value' => ''
			),

			'number_symbol'  => array(
				'label' => esc_html__( 'Number Symbol', 'jevelin' ),
				'desc'  => esc_html__( 'Here you can add symbol like + after number', 'jevelin' ),
				'type'  => 'text',
				'value' => ''
			),

			'title'   => array(
				'label' => esc_html__( 'Title', 'jevelin' ),
				'desc'  => esc_html__( 'Enter title', 'jevelin' ),
				'type'  => 'text',
				'value' => ''
			),

			'subtitle'   => array(
				'label' => esc_html__( 'Subtitle', 'jevelin' ),
				'desc'  => esc_html__( 'Enter subtitle', 'jevelin' ),
				'type'  => 'text',
				'value' => ''
			),

			'icon'       => array(
				'type' => 'new-icon',
				'label' => esc_html__( 'Icon', 'jevelin' ),
				'desc'  => esc_html__( 'Select icon', 'jevelin' ),
				'set' => 'jevelin-icons',
			),

		),
	),

	'styling' => array(
		'title'   => esc_html__( 'Styling', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'style' => array(
			    'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
			    'value' => array(
			        'style' => 'style1',
			        'style2' => array(
			            'divider_color' => '#fff',
			        ),
			        'style3' => array(
			            'divider_color' => '#fff',
			        ),
			        'style5' => array(
			            'icon_border_color' => '#fff',
			            'icon_background_color' => '#fff',
			        ),
			        'style6' => array(
			            'divider_color' => '#fff',
			            'divider_style' => 'normal',
			        ),
			    ),
			    'picker' => array(
			        'style' => array(
			            'label'   => esc_html__('Style', 'jevelin'),
			            'type'    => 'select',
			            'choices' => array(
			                'style1' => esc_html__('Style 1', 'jevelin'),
			                'style2' => esc_html__('Style 2', 'jevelin'),
			                'style3' => esc_html__('Style 3', 'jevelin'),
			                'style4' => esc_html__('Style 4', 'jevelin'),
			                'style5' => esc_html__('Style 5', 'jevelin'),
			                'style6' => esc_html__('Style 6', 'jevelin'),
							'style7' => esc_html__('Number Only', 'jevelin'),
			            ),
			            'desc'    => esc_html__('Select main style', 'jevelin'),
			        )
			    ),
			    'choices' => array(
			        'style2' => array(
						'divider_color' => array(
						    'label' => esc_html__('Divider Color', 'jevelin'),
						    'desc'  => esc_html__('Select divider color', 'jevelin'),
						    'type'  => 'rgba-color-picker',
						    'value' => ''
						),
			        ),
			        'style3' => array(
						'divider_color' => array(
						    'label' => esc_html__('Divider Color', 'jevelin'),
						    'desc'  => esc_html__('Select divider color', 'jevelin'),
						    'type'  => 'rgba-color-picker',
						    'value' => ''
						),
			        ),
			        'style5' => array(
						'icon_border_color' => array(
						    'label' => esc_html__('Icon Border Color', 'jevelin'),
						    'desc'  => esc_html__('Select icon border color', 'jevelin'),
						    'type'  => 'color-picker',
						),
						'icon_background_color' => array(
						    'label' => esc_html__('Icon Background Color', 'jevelin'),
						    'desc'  => esc_html__('Select icon background color', 'jevelin'),
						    'type'  => 'color-picker',
						),
					),
			        'style6' => array(
						'divider_color' => array(
						    'label' => esc_html__('Divider Color', 'jevelin'),
						    'desc'  => esc_html__('Select divider color', 'jevelin'),
						    'type'  => 'rgba-color-picker',
						    'value' => ''
						),
				        'divider_style' => array(
				            'label'   => esc_html__('Divider Style', 'jevelin'),
				            'desc'    => esc_html__('Description', 'jevelin'),
				            'type'    => 'select',
				            'choices' => array(
				                'solid' => esc_html__('Normal', 'jevelin'),
				                'dotted' => esc_html__('Dotted', 'jevelin'),
				                'dashed' => esc_html__('Dashed', 'jevelin'),
				                'double' => esc_html__('Double', 'jevelin'),
				            ),
				        )
			        ),
			    ),
			),

			'icon_color' => array(
			    'label' => esc_html__('Icon Color', 'jevelin'),
			    'desc'  => esc_html__('Select icon color', 'jevelin'),
			    'type'  => 'color-picker',
			),

			'number_color' => array(
			    'label' => esc_html__('Number Color', 'jevelin'),
			    'desc'  => esc_html__('Select number color', 'jevelin'),
			    'type'  => 'color-picker',
			),

			'title_color' => array(
			    'label' => esc_html__('Title Color', 'jevelin'),
			    'desc'  => esc_html__('Select title color', 'jevelin'),
			    'type'  => 'color-picker',
			),

			'subtitle_color' => array(
			    'label' => esc_html__('Subtitle Color', 'jevelin'),
			    'desc'  => esc_html__('Select subtitle color', 'jevelin'),
			    'type'  => 'color-picker',
			),

			'number_size' => array(
			    'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
			    'value' => array(
			        'size' => 'default',
			        'custom' => array(
			        ),
			    ),
			    'picker' => array(
			        'number_size' => array(
			            'label'   => esc_html__('Number Font Size', 'jevelin'),
			            'desc'    => esc_html__('Choose number font size', 'jevelin'),
			            'type'    => 'select',
			            'choices' => array(
			                'default' => esc_html__('Default', 'jevelin'),
			                'xs' => esc_html__('XSmall (14px)', 'jevelin'),
			                's' => esc_html__('Small (16px)', 'jevelin'),
			                'm' => esc_html__('Medium (20px)', 'jevelin'),
			                'l' => esc_html__('Large (30px)', 'jevelin'),
			                'xl' => esc_html__('XLarge (36px)', 'jevelin'),
			                'xxl' => esc_html__('XXLarge (48px)', 'jevelin'),
			                'xxxl' => esc_html__('XXXLarge (60px)', 'jevelin'),
			                'xxxxl' => esc_html__('XXXXLarge (72px)', 'jevelin'),
			                'custom' => esc_html__('Custom', 'jevelin'),
			            ),
			        )
			    ),
			    'choices' => array(
			        'custom' => array(
						'desktop_size'   => array(
							'type'  => 'text',
							'label' => esc_html__( 'Font Size (desktop)', 'jevelin' ),
							'desc'  => wp_kses( __( 'Enter font size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
							'help'  => esc_html__( 'Example: 18px;', 'jevelin' ),
						),

						'responsive_size'   => array(
							'type'  => 'text',
							'label' => esc_html__( 'Font Size (mobile and tablet)', 'jevelin' ),
							'desc'  => wp_kses( __( 'Enter font size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
							'help'  => esc_html__( 'Example: 18px;', 'jevelin' ),
						),
			        ),
			    ),
			),

			'font' => array(
				'type'  => 'select',
				'label' => esc_html__('Number Font Famility', 'jevelin'),
				'desc'  => esc_html__( 'Select number font famility', 'jevelin' ),
				'help'  => wp_kses( __( 'You can set them in <i>Theme Settings > Styling</i>', 'jevelin' ), jevelin_allowed_html() ),
				'choices' => array(
					'heading' => esc_html__( 'Heading', 'jevelin' ),
					'body' => esc_html__( 'Body', 'jevelin' ),
					'additional1' => esc_html__( 'Additional font 1', 'jevelin' ),
					'additional2' => esc_html__( 'Additional font 2', 'jevelin' ),
				),
				'value'	  => 'body',
			),

			'number_weight' => array(
				'type'  => 'select',
				'label' => esc_html__('Number Font Weight', 'jevelin'),
				'desc'  => esc_html__( 'Select font weight', 'jevelin' ),
				'help'  => esc_html__( 'Notice that not every font will support semi-bold and light font weight', 'jevelin' ),
				'choices' => array(
					'200' => esc_html__( 'Extra Light', 'jevelin' ),
					'300' => esc_html__( 'Light', 'jevelin' ),
					'400' => esc_html__( 'Normal', 'jevelin' ),
					'500' => esc_html__( 'Medium', 'jevelin' ),
					'600' => esc_html__( 'Semi-bold', 'jevelin' ),
					'700' => esc_html__( 'Bold', 'jevelin' ),
					'900' => esc_html__( 'Extra Bold', 'jevelin' ),
				),
				'value'	  => '700',
			),

			'title_size'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title Font Size', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter font size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'help'  => esc_html__( 'Example: 18px;', 'jevelin' ),
			),

		),
	),

);
