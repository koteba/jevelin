<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }

$options = array(

	'id' => array( 'type' => 'unique' ),
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'width' => array(
			    'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
			    'value' => array(
			        'width' => 'full',
			        'fixed' => array(
			            'fixed_width' => 30,
			        ),
			    ),
			    'picker' => array(
			        'width' => array(
						'type' => 'switch',
						'label' => esc_html__( 'Divider Width', 'jevelin' ),
						'desc' => esc_html__( 'Choose divider width', 'jevelin' ),
						'left-choice' => array(
							'value' => 'full',
							'label' => esc_html__('Full', 'jevelin'),
						),
						'right-choice' => array(
							'value' => 'fixed',
							'label' => esc_html__('Fixed', 'jevelin'),
						),
						'value' => 'full'
					),
			    ),
			    'choices' => array(
			        'fixed' => array(
			        	'fixed_width' => array(
						    'type'  => 'slider',
						    'properties' => array(
						        'min' => 0,
						        'max' => 400,
						    ),
						    'label' => esc_html__('Custom Width', 'jevelin'),
						    'desc'  => esc_html__('Choose custom width', 'jevelin'),
							'value' => 30
					    ),
			        ),
			    ),
			),

	        'type' => array(
	            'label'   => esc_html__('Line Type', 'jevelin'),
	            'type'    => 'select',
	            'choices' => array(
	                'solid'  => esc_html__('Normal', 'jevelin'),
	                'dotted' => esc_html__('Dotted', 'jevelin'),
	                'dashed' => esc_html__('Dashed', 'jevelin'),
	                'double' => esc_html__('Double', 'jevelin'),
	            ),
	            'desc'    => esc_html__('Select line type', 'jevelin'),
	        ),

        	'height' => array(
			    'type'  => 'slider',
			    'properties' => array(
			        'min' => 0,
			        'max' => 10,
			    ),
			    'value' => '1',
			    'label' => esc_html__('Line Height', 'jevelin'),
			    'desc'  => esc_html__('Choose line height', 'jevelin'),
		    ),

			'radius'  => array(
			    'label' => esc_html__( 'Line Radius', 'jevelin' ),
			    'desc'  => esc_html__( 'Select line radius', 'jevelin' ),
			    'type'  => 'slider',
			    'value' => 0,
			    'properties' => array(
			        'min' => 0,
			        'max' => 35,
			        'sep' => 5,
			    ),
			),

	        'alignment' => array(
	            'label'   => esc_html__('Alignment', 'jevelin'),
	            'desc'    => esc_html__('Select divider alignment', 'jevelin'),
	            'type'    => 'radio',
	            'value'	  => 'center',
	            'choices' => array(
	                'left' => esc_html__('Left', 'jevelin'),
	                'center' => esc_html__('Center', 'jevelin'),
	                'right' => esc_html__('Right', 'jevelin'),
	            ),
	        ),

		),
	),

	'divider_style' => array(
		'title'   => esc_html__( 'Style', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'content' => array(
			    'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
			    'value' => array(
			        'content' => 'none',
			        'icon_option' => array(
			            'icon' => '',
			            'icon_color' => '#ccc',
			            'icon_multiplier' => '1',
			        ),
			        'title_option' => array(
			            'title' => 'Divider Title',
			            'title_color' => '#8d8d8d',
			        ),
			        'title_box_option' => array(
			            'title' => 'Divider Title Box',
			            'title_color' => '#fff',
			            'title_background_color' => '#8d8d8d',
			            'title_radius' => '0',
			        ),
			    ),
			    'picker' => array(
			        'content' => array(
			            'label'   => esc_html__('Content', 'jevelin'),
			            'desc'    => esc_html__('Select what kind of content divider will have', 'jevelin'),
			            'type'    => 'radio',
			            'choices' => array(
			                'none' => esc_html__('None', 'jevelin'),
			                'icon_option' => esc_html__('Icon', 'jevelin'),
			                'title_option' => esc_html__('Text', 'jevelin'),
			                'title_box_option' => esc_html__('Text Box', 'jevelin'),
			            ),
						'value' => 'none',
			        )
			    ),
			    'choices' => array(
			        'icon_option' => array(
			        	'icon' => array(
						    'type'  => 'new-icon',
						    'label' => esc_html__('Icon', 'jevelin'),
						    'desc'  => esc_html__('Select icon', 'jevelin'),
						    'set' => 'jevelin-icons',
					    ),
						'icon_color' => array(
						    'label' => esc_html__('Icon Color', 'jevelin'),
						    'desc'  => esc_html__('Select icon color', 'jevelin'),
						    'type'  => 'color-picker',
							'value' => '#cccccc',
						),
				        'icon_multiplier' => array(
				            'label'   => esc_html__('Icon multiplier', 'jevelin'),
				            'type'    => 'select',
				            'choices' => array(
				                '1' => esc_html__('1 time', 'jevelin'),
				                '2' => esc_html__('2 times', 'jevelin'),
				                '3' => esc_html__('3 times', 'jevelin'),
								'5' => esc_html__('5 times', 'jevelin'),
				            ),
				            'desc'    => esc_html__('Select how many times icon will be duplicated', 'jevelin'),
							'value' => '1',
				        ),
						'icon_size'   => array(
							'type'  => 'text',
							'label' => esc_html__( 'Icon Size', 'jevelin' ),
							'desc'  => wp_kses( __( 'Enter icon size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
							'help'  => esc_html__( 'Example: 14px;', 'jevelin' ),
						),
			        ),
			        'title_option' => array(
						'title' => array(
						    'label' => esc_html__('Title', 'jevelin'),
						    'desc'  => esc_html__('Enter title', 'jevelin'),
							'type'   => 'wp-editor',
							'teeny'  => false,
							'reinit' => true,
							'size'   => 'large',
							'label'  => esc_html__( 'Content', 'jevelin' ),
							'desc'   => esc_html__( 'Enter content', 'jevelin' ).'
								<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
							'editor_height' => 160,
							'value' => 'Divider Title',
						),
						'font' => array(
							'type'  => 'select',
							'label' => esc_html__('Title Font Famility', 'jevelin'),
							'desc'  => esc_html__( 'Select font famility', 'jevelin' ),
							'help'  => wp_kses( __( 'You can set them in <i>Theme Settings > Styling</i>', 'jevelin' ), jevelin_allowed_html() ),
							'choices' => array(
								'heading' => esc_html__( 'Heading', 'jevelin' ),
								'body' => esc_html__( 'Body', 'jevelin' ),
								'additional1' => esc_html__( 'Additional font 1', 'jevelin' ),
								'additional2' => esc_html__( 'Additional font 2', 'jevelin' ),
							),
							'value'	  => 'heading',
						),
						'title_color' => array(
						    'label' => esc_html__('Title Color', 'jevelin'),
						    'desc'  => esc_html__('Select icon color', 'jevelin'),
						    'type'  => 'color-picker',
						),
			        ),
			        'title_box_option' => array(
						'title_box' => array(
						    'label' => esc_html__('Title', 'jevelin'),
						    'desc'  => esc_html__('Enter title', 'jevelin'),
							'type'   => 'wp-editor',
							'teeny'  => false,
							'reinit' => true,
							'size'   => 'large',
							'label'  => esc_html__( 'Content', 'jevelin' ),
							'desc'   => esc_html__( 'Enter content', 'jevelin' ).'
								<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
							'editor_height' => 160,
							'value' => 'Divider Title Box',
						),
						'font' => array(
							'type'  => 'select',
							'label' => esc_html__('Title Font Famility', 'jevelin'),
							'desc'  => esc_html__( 'Select font famility', 'jevelin' ),
							'help'  => wp_kses( __( 'You can set them in <i>Theme Settings > Styling</i>', 'jevelin' ), jevelin_allowed_html() ),
							'choices' => array(
								'heading' => esc_html__( 'Heading', 'jevelin' ),
								'body' => esc_html__( 'Body', 'jevelin' ),
								'additional1' => esc_html__( 'Additional font 1', 'jevelin' ),
								'additional2' => esc_html__( 'Additional font 2', 'jevelin' ),
							),
							'value'	  => 'heading',
						),
						'title_color' => array(
						    'label' => esc_html__('Title Color', 'jevelin'),
						    'desc'  => esc_html__('Select title color', 'jevelin'),
						    'type'  => 'color-picker',
							'value' => '#ffffff'
						),
						'title_background_color' => array(
						    'label' => esc_html__('Title Background Color', 'jevelin'),
						    'desc'  => esc_html__('Select title background color', 'jevelin'),
						    'type'  => 'color-picker',
							'value' => '#8d8d8d'
						),
				        'title_radius' => array(
						    'type'  => 'slider',
						    'properties' => array(
						        'min' => 0,
						        'max' => 50,
						    ),
						    'label' => esc_html__('Title Box Radius', 'jevelin'),
						    'desc'  => esc_html__('Choose title box radius', 'jevelin'),
							'value' => '0'
						),
			        ),
			    ),
			),

			'line_color' => array(
			    'label' => esc_html__('Line Color', 'jevelin'),
			    'desc'  => esc_html__('Select line color', 'jevelin'),
			    'type'  => 'rgba-color-picker',
			    'value' => ''
			),

			'margin'   => array(
				'label' => esc_html__( 'Margin', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter your custom margin (<b>top right bottom left</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'type'  => 'text',
				'value' => '30px 0px 30px 0px',
				'help'  => esc_html__( 'Example: 30px 0px 30px 0px', 'jevelin' ),
			),

		),
	),

);
