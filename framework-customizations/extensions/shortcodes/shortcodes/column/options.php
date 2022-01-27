<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) {
	die('Forbidden.');
}

$options = array(
	'id' => array( 'type' => 'unique' ),
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'padding' => array(
				'type'  => 'text',
			    'label' => esc_html__('Padding', 'jevelin'),
				'desc'  => wp_kses( __( 'Enter your custom margin (<b>top right bottom left</b>)', 'jevelin' ), jevelin_allowed_html() ),
			    'value' => '0px 15px 0px 15px',
				'help'  => wp_kses( __( 'Example 1: 20px 0px 20px 0px <br>Example 2: 0% 15% 0% 15%', 'jevelin' ), jevelin_allowed_html() ),
			),

			'padding_mobile' => array(
			    'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
			    'value' => array(
			        'mobile' => 'off',
			    ),
			    'picker' => array(
					'padding_mobile' => array(
						'type' => 'switch',
						'label' => esc_html__( 'Custom Mobile Padding', 'jevelin' ),
						'desc' => esc_html__( 'Enable or disable custom mobile paddings', 'jevelin' ),
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
						'padding' => array(
							'type'  => 'text',
						    'label' => esc_html__('Mobile Padding', 'jevelin'),
							'desc'  => wp_kses( __( 'Enter your custom mobile padding (<b>top right bottom left</b>)', 'jevelin' ), jevelin_allowed_html() ),
						    'value' => '0px 15px 0px 15px',
							'help'  => esc_html__( 'Example 1: 100px 0px 100px 0px <br>Example 2: 0% 15% 0% 15%', 'jevelin' ),
						),
			        ),
			    ),
			),

			'shadow' => array(
				'type'    => 'radio',
				'label'   => esc_html__( 'Shadow', 'jevelin' ),
				'desc'    => esc_html__( 'Choose column shadow', 'jevelin' ),
				'help'    => esc_html__( 'If shadow is not visible, please try to set z-index for column parent section to 1000 or more', 'jevelin' ),
				'value'	  => 'disabled',
				'choices' => array(
					'disabled' => esc_html__('Disabled', 'jevelin'),
					'shadow1' => esc_html__('Shadow 1 (large)', 'jevelin'),
					'shadow2' => esc_html__('Shadow 2 (medium)', 'jevelin'),
					'shadow3' => esc_html__('Shadow 3', 'jevelin'),
				)
			),

	        'shadow_hover' => array(
				'type'    => 'radio',
				'label'   => esc_html__( 'Shadow on Hover', 'jevelin' ),
				'desc'    => esc_html__( 'Choose column shadow on hover', 'jevelin' ),
				'help'    => esc_html__( 'If shadow is not visible, please try to set z-index for column parent section to 1000 or more', 'jevelin' ),
				'value'	  => 'disabled',
				'choices' => array(
					'disabled' => esc_html__('Disabled', 'jevelin'),
					'shadow1' => esc_html__('Shadow 1 (large)', 'jevelin'),
					'shadow2' => esc_html__('Shadow 2 (medium)', 'jevelin'),
				)
			),

			'border_radius' => array(
				'type'  => 'text',
			    'label' => esc_html__('Border Radius', 'jevelin'),
				'desc'  => wp_kses( __( 'Enter border radius (<b>top-left top-right bottom-right bottom-left</b>)', 'jevelin' ), jevelin_allowed_html() ),
			    'value' => '',
				'help'  => esc_html__( 'Example 1: 100px 0px 100px 0px', 'jevelin' ),
			),

			'class'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Class Name', 'jevelin' ),
				'desc'  => esc_html__( 'Enter custom class name', 'jevelin' )
			),

		),
	),

	'background_type' => array(
		'title'   => esc_html__( 'Background', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'background_padding' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Extra Background Padding (between columns)', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable extra background padding between columns', 'jevelin' ),
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

			'background_color' => array(
				'label' => esc_html__('Background Color', 'jevelin'),
				'desc'  => esc_html__( 'Select background color', 'jevelin' ),
				'type'  => 'rgba-color-picker',
				'value' => ''
			),

			'background_image' => array(
				'label'   => esc_html__('Background Image', 'jevelin'),
				'desc'    => esc_html__( 'Upload background image', 'jevelin' ),
				'type'    => 'upload',
			),

			'background_image_hover' => array(
				'label'   => esc_html__('Background Image Hover', 'jevelin'),
				'desc'    => esc_html__( 'Upload background image hover', 'jevelin' ),
				'type'    => 'upload',
			),

			'background' => array(
			    'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
			    'value' => array(
			        'background_type' => 'none',
			        'none' => array(
			            'background_image_options' => 'cover',
			        ),
			        'parallax' => array(
			            'parallax_options' => 'normal',
			        ),
			    ),
			    'picker' => array(
			        'background_type' => array(
						'type'    => 'radio',
						'label'   => esc_html__('Background Type', 'jevelin'),
						'desc'    => esc_html__( 'Choose background type', 'jevelin' ),
						'value'	  => 'none',
						'choices' => array(
							'none' => esc_html__('Image', 'jevelin'),
							'parallax' => esc_html__('Parallax Image', 'jevelin'),
							'video' => esc_html__('Video', 'jevelin'),
						)
					),
			    ),
			    'choices' => array(
			        'none' => array(
						'background_image_options' => array(
							'type'    => 'select',
							'label'   => esc_html__('Background Repeat', 'jevelin'),
							'desc'    => esc_html__( 'Choose background repeat', 'jevelin' ),
							'choices' => array(
								'cover' => esc_html__('Cover', 'jevelin'),
								'contain' => esc_html__('Contain', 'jevelin'),
								'repeat' => esc_html__('Repeat', 'jevelin'),
								'norepeat' => esc_html__('No Repeat', 'jevelin'),
							)
						),

						'background_image_position' => array(
							'type'    => 'select',
							'label'   => esc_html__('Background Position', 'jevelin'),
							'desc'    => esc_html__( 'Choose background position', 'jevelin' ),
							'choices' => array(
								'left top' => esc_html__('Left Top', 'jevelin'),
								'left center' => esc_html__('Left Center', 'jevelin'),
								'left bottom' => esc_html__('Left Bottom', 'jevelin'),
								'right top' => esc_html__('Right Top', 'jevelin'),
								'right center' => esc_html__('Right Center', 'jevelin'),
								'right bottom' => esc_html__('Right Bottom', 'jevelin'),
								'center top' => esc_html__('Center Top', 'jevelin'),
								'center center' => esc_html__('Center Center', 'jevelin'),
								'center bottom' => esc_html__('Center Bottom', 'jevelin'),
							),
							'value' => 'center center'
						),
			        ),
			        'parallax' => array(
						'parallax_options' => array(
							'type'    => 'select',
							'label'   => esc_html__('Parallax Speed', 'jevelin'),
							'desc'    => esc_html__( 'Choose parallax speed', 'jevelin' ),
							'choices' => array(
								'veryslow' => esc_html__('Very slow', 'jevelin'),
								'slow' => esc_html__('Slow', 'jevelin'),
								'normal' => esc_html__('Normal', 'jevelin'),
								'fixed' => esc_html__('Fixed', 'jevelin'),
							)
						),
			        ),
			        'video' => array(
						'mp4_url' => array(
							'type'  => 'text',
						    'label' => esc_html__('MP4 Video URL', 'jevelin'),
						    'desc'  => esc_html__('Enter full path to MP4 video', 'jevelin'),
						),
						'webm_url' => array(
							'type'  => 'text',
						    'label' => esc_html__('WebM Video URL', 'jevelin'),
						    'desc'  => esc_html__('Enter full path to WebM video', 'jevelin'),
						),
						'ogv_url' => array(
							'type'  => 'text',
						    'label' => esc_html__('OGV Video URL', 'jevelin'),
						    'desc'  => esc_html__('Enter full path to OGV video', 'jevelin'),
						),
			        ),
			    ),
			),

		),
	),

	'border_type' => array(
		'title'   => esc_html__( 'Border', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'border_left' => array(
				'label' => esc_html__('Border Left Color', 'jevelin'),
				'desc'  => esc_html__( 'Select border left color', 'jevelin' ),
				'type'  => 'rgba-color-picker',
				'value' => ''
			),

			'border_left_responsive' => array(
			    'type'  => 'checkbox',
			    'label' => esc_html__('Mobile Devices', 'jevelin'),
			    'desc'  => false,
			    'text'  => esc_html__('Show', 'jevelin'),
			    'value' => false,
			),

			'border_right' => array(
				'label' => esc_html__('Border Right Color', 'jevelin'),
				'desc'  => esc_html__( 'Select border right color', 'jevelin' ),
				'type'  => 'rgba-color-picker',
				'value' => ''
			),

			'border_right_responsive' => array(
			    'type'  => 'checkbox',
			    'label' => esc_html__('Mobile Devices', 'jevelin'),
			    'desc'  => false,
			    'text'  => esc_html__('Show', 'jevelin'),
			    'value' => false,
			),

			'border_top' => array(
				'label' => esc_html__('Border Top Color', 'jevelin'),
				'desc'  => esc_html__( 'Select border top color', 'jevelin' ),
				'type'  => 'rgba-color-picker',
				'value' => ''
			),

			'border_top_responsive' => array(
			    'type'  => 'checkbox',
			    'label' => esc_html__('Mobile Devices', 'jevelin'),
			    'desc'  => false,
			    'text'  => esc_html__('Show', 'jevelin'),
			    'value' => false,
			),

			'border_bottom' => array(
				'label' => esc_html__('Border Bottom Color', 'jevelin'),
				'desc'  => esc_html__( 'Select border bottom color', 'jevelin' ),
				'type'  => 'rgba-color-picker',
				'value' => ''
			),

			'border_bottom_responsive' => array(
			    'type'  => 'checkbox',
			    'label' => esc_html__('Mobile Devices', 'jevelin'),
			    'desc'  => false,
			    'text'  => esc_html__('Show', 'jevelin'),
			    'value' => false,
			),

		),
	),
	'position' => array(
		'title'   => esc_html__( 'Position', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'p_align' => array(
				'type'    => 'radio',
				'label'   => esc_html__( 'Horizontal Alignment', 'jevelin' ),
				'desc'    => esc_html__( 'Choose column content horizontal alignment', 'jevelin' ),
				'value'	  => 'left',
				'choices' => array(
					'left' => esc_html__('Left', 'jevelin'),
					'center' => esc_html__('Center', 'jevelin'),
					'right' => esc_html__('Right', 'jevelin'),
				)
			),

			'p_align_responsive' => array(
				'type'    => 'radio',
				'label'   => esc_html__( 'Horizontal Alignment Responsive', 'jevelin' ),
				'desc'    => esc_html__( 'Choose column content horizontal alignment in responsive (under 800px page width)', 'jevelin' ),
				'value'	  => 'center',
				'choices' => array(
					'left' => esc_html__('Left', 'jevelin'),
					'center' => esc_html__('Center', 'jevelin'),
					'right' => esc_html__('Right', 'jevelin'),
				)
			),

			'p_width'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Max Width', 'jevelin' ),
				'desc'  => esc_html__( 'Enter max column content width (in px or %, default px)', 'jevelin' )
			),


			'margin' => array(
				'type'  => 'text',
			    'label' => esc_html__('Margin', 'jevelin'),
				'desc'  => wp_kses( __( 'Enter your custom margin (<b>top right bottom left</b>)', 'jevelin' ), jevelin_allowed_html() ),
			    'value' => '0px 0px 0px 0px',
				'help'  => wp_kses( __( 'Example 1: 20px 0px 20px 0px <br>Example 2: 0% 15% 0% 15%', 'jevelin' ), jevelin_allowed_html() ),
			),

			'margin_mobile' => array(
			    'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
			    'value' => array(
			        'mobile' => 'off',
			    ),
			    'picker' => array(
					'margin_mobile' => array(
						'type' => 'switch',
						'label' => esc_html__( 'Custom Mobile Margin', 'jevelin' ),
						'desc' => esc_html__( 'Enable or disable custom mobile margin', 'jevelin' ),
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
						'margin' => array(
							'type'  => 'text',
						    'label' => esc_html__('Margin', 'jevelin'),
							'desc'  => wp_kses( __( 'Example 1: 20px 0px 20px 0px <br>Example 2: 0% 15% 0% 15%', 'jevelin' ), jevelin_allowed_html() ),
						    'value' => '0px 15px 0px 15px',
							'help'  => esc_html__( 'Example 1: 100px 0px 100px 0px <br>Example 2: 0% 15% 0% 15%', 'jevelin' ),
						),
			        ),
			    ),
			),

			'z_index'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Z-Index', 'jevelin' ),
				'desc'  => esc_html__( 'Enter custom z-index', 'jevelin' )
			),

		),
	),
	'animation_tab' => array(
		'title'   => esc_html__( 'Animation', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'animation' => array(
				'type'    => 'select',
				'label'   => esc_html__('Animation', 'jevelin'),
				'desc'  => esc_html__( 'Select button animation', 'jevelin' ),
				'value'	  => 'none',
				'choices' => array(
					'none' => esc_html__('None', 'jevelin'),
					'fadeIn' => esc_html__('Fade In', 'jevelin'),
					'fadeInDown' => esc_html__('Fade In Down', 'jevelin'),
					'fadeInDownBig' => esc_html__('Fade In Down Big', 'jevelin'),
					'fadeInLeft' => esc_html__('Fade In Left', 'jevelin'),
					'fadeInLeftBig' => esc_html__('Fade In Left Big', 'jevelin'),
					'fadeInRight' => esc_html__('Fade In Right', 'jevelin'),
					'fadeInRightBig' => esc_html__('Fade In Right Big', 'jevelin'),
					'fadeInUp' => esc_html__('Fade In Up', 'jevelin'),
					'fadeInUpBig' => esc_html__('Fade In Up Big', 'jevelin'),
					'slideInDown' => esc_html__('Slide In Down', 'jevelin'),
					'slideInLeft' => esc_html__('Slide In Left', 'jevelin'),
					'slideInRight' => esc_html__('Slide In Right', 'jevelin'),
					'slideInUp' => esc_html__('Slide In Up', 'jevelin'),
					'zoomIn' => esc_html__('Zoom In', 'jevelin'),
					'zoomInDown' => esc_html__('Zoom In Down', 'jevelin'),
					'zoomInLeft' => esc_html__('Zoom In Left', 'jevelin'),
					'zoomInRight' => esc_html__('Zoom In Right', 'jevelin'),
					'zoomInUp' => esc_html__('Zoom In Up', 'jevelin'),
					'rotateIn' => esc_html__('Rotate In', 'jevelin'),
					'rotateInDownLeft' => esc_html__('Rotate In Down Left', 'jevelin'),
					'rotateInDownRight' => esc_html__('Rotate In Down Right', 'jevelin'),
					'rotateInUpLeft' => esc_html__('Roate In Up Left', 'jevelin'),
					'rotateInUpRight' => esc_html__('Roate In Up Right', 'jevelin'),
					'bounceIn' => esc_html__('Bounce In', 'jevelin'),
					'bounceInDown' => esc_html__('Bounce In Down', 'jevelin'),
					'bounceInLeft' => esc_html__('Bounce In Left', 'jevelin'),
					'bounceInRight' => esc_html__('Bounce In Right', 'jevelin'),
					'bounceInUp' => esc_html__('Bounce In Up', 'jevelin'),
					'bounce' => esc_html__('Bounce', 'jevelin'),
					'flash' => esc_html__('Flash', 'jevelin'),
					'pulse' => esc_html__('Pulse', 'jevelin'),
					'rubberBand' => esc_html__('Rubber Band', 'jevelin'),
					'shake' => esc_html__('Shake', 'jevelin'),
					'headShake' => esc_html__('Head Shake', 'jevelin'),
					'swing' => esc_html__('Swing', 'jevelin'),
					'tada' => esc_html__('Tada', 'jevelin'),
					'wobble' => esc_html__('Wobble', 'jevelin'),
					'jello' => esc_html__('Jello', 'jevelin'),
					'flipInX' => esc_html__('Flip In X', 'jevelin'),
					'flipInY' => esc_html__('Flip In Y', 'jevelin'),
					'lightSpeedIn' => esc_html__('Light Speed In', 'jevelin'),
					'hinge' => esc_html__('Hinge', 'jevelin'),
					'rollIn' => esc_html__('Roll In', 'jevelin'),
				)
			),

			'animation_speed' => array(
			    'type'  => 'slider',
			    'value' => 2,
			    'properties' => array(
			        'min' => 0,
			        'max' => 5,
			        'step' => 0.1,
			    ),
			    'label' => esc_html__('Animation Speed', 'jevelin'),
			    'desc'  => esc_html__('Choose animation speed (seconds)', 'jevelin'),
			),

			'animation_delay' => array(
			    'type'  => 'slider',
			    'value' => 0,
			    'properties' => array(
			        'min' => 0,
			        'max' => 5,
			        'step' => 0.1,
			    ),
			    'label' => esc_html__('Animation Delay', 'jevelin'),
			    'desc'  => esc_html__('Choose animation delay (seconds', 'jevelin'),
			),

		),
	),

);
