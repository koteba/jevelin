<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) {
	die('Forbidden.');
}

$options = array(
	'id' => array( 'type' => 'unique' ),
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'width' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Section Width', 'jevelin'),
				'desc' => esc_html__( 'Choose section width', 'jevelin' ),
				'value'	  => 'standard',
				'choices' => array(
					'standard' => esc_html__('Standard Width', 'jevelin'),
					'full' => esc_html__('Full Width', 'jevelin'),
				)
			),

			'padding' => array(
				'type'  => 'text',
			    'label' => esc_html__('Padding', 'jevelin'),
				'desc'  => wp_kses( __( 'Enter your custom margin (<b>top right bottom left</b>)', 'jevelin' ), jevelin_allowed_html() ),
			    'value' => '100px 0px 100px 0px',
				'help'  => wp_kses( __( 'Example 1: 100px 0px 100px 0px <br>Example 2: 0% 15% 0% 15%', 'jevelin' ), jevelin_allowed_html() ),
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
						    'label' => esc_html__('Padding', 'jevelin'),
							'desc'  => wp_kses( __( 'Enter your custom mobile padding (<b>top right bottom left</b>)', 'jevelin' ), jevelin_allowed_html() ),
						    'value' => '60px 0px 60px 0px',
						    'help'  => wp_kses( __( 'Example 1: 100px 0px 100px 0px <br>Example 2: 0% 15% 0% 15%', 'jevelin' ), jevelin_allowed_html() ),
						),
			        ),
			    ),
			),

			'columns_height' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Justify Columns Height', 'jevelin'),
				'desc' => esc_html__( 'Choose to vertically center all section columns', 'jevelin' ),
				'value' => false,
				'choices' => array(
					false => esc_html__('Off', 'jevelin'),
					true => esc_html__('On', 'jevelin'),
					'height' => esc_html__('On (without vertial centering)', 'jevelin'),
					'full' => esc_html__('On (set full browser window height)', 'jevelin'),
				)
			),

			'visibility' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Visibility', 'jevelin'),
				'desc' => esc_html__( 'Choose section visibility', 'jevelin' ),
				'value'	  => 'everywhere',
				'choices' => array(
					'everywhere' => esc_html__('Visible Everywhere', 'jevelin'),
					'desktop' => esc_html__('Visible Desktop Only', 'jevelin'),
					'mobile' => esc_html__('Visible Mobile Only', 'jevelin'),
				)
			),

			'elememt_alignment' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Mobile Element Alignment', 'jevelin'),
				'desc' => esc_html__( 'Choose mobile element aLignment (will force text block, heading, button elements to adjust to center)', 'jevelin' ),
				'value'	  => 'default',
				'choices' => array(
					'default' => esc_html__('Default', 'jevelin'),
					'center' => esc_html__('Center', 'jevelin'),
				)
			),

			'strech_edge' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Strech Column to Edge', 'jevelin'),
				'desc' => esc_html__( 'Choose section visibility', 'jevelin' ),
				'value'	  => 'disabled',
				'choices' => array(
					'disabled' => esc_html__('Disabled', 'jevelin'),
					'left' => esc_html__('First Column to Left Edge', 'jevelin'),
					'right' => esc_html__('Last Column to Right Edge', 'jevelin'),
				)
			),

		),
	),

	'background_type' => array(
		'title'   => esc_html__( 'Background', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'background_image' => array(
				'label'   => esc_html__('Background Image', 'jevelin'),
				'desc'    => esc_html__( 'Upload background image', 'jevelin' ),
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
							'parallax_video' => esc_html__('Parallax Video', 'jevelin'),
							'video' => esc_html__('Video', 'jevelin'),
						)
					),
			    ),
			    'choices' => array(
			        'none' => array(
						'background_image_options' => array(
							'type'    => 'select',
							'label'   => esc_html__('Background Image Options', 'jevelin'),
							'desc'    => esc_html__( 'Choose background image options', 'jevelin' ),
							'choices' => array(
								'cover' => esc_html__('Cover', 'jevelin'),
								'contain' => esc_html__('Contain', 'jevelin'),
								'repeat' => esc_html__('Repeat', 'jevelin'),
								'norepeat' => esc_html__('No Repeat', 'jevelin'),
								'norepeat-top' => esc_html__('No Repeat (top position)', 'jevelin'),
								'norepeat-bottom' => esc_html__('No Repeat (bottom position)', 'jevelin'),
								'norepeat-left' => esc_html__('No Repeat (top left)', 'jevelin'),
								'norepeat-right' => esc_html__('No Repeat (top right)', 'jevelin'),
							)
						),
			        ),
			        'parallax' => array(
						'parallax_options' => array(
							'type'    => 'select',
							'label'   => esc_html__('Parallax Speed', 'jevelin'),
							'desc'    => esc_html__( 'Choose parallax speed', 'jevelin' ),
							'choices' => array(
								'slow' => esc_html__('Slow', 'jevelin'),
								'normal' => esc_html__('Normal', 'jevelin'),
								'fixed' => esc_html__('Fixed', 'jevelin'),
							)
						),
			        ),
			        'parallax_video' => array(
						'parallax_video_url' => array(
							'type'  => 'text',
						    'label' => esc_html__('Video URL', 'jevelin'),
						    'desc'  => esc_html__('Enter video url from YouTube or Vimeo', 'jevelin'),
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


			'background_color' => array(
				'label' => esc_html__('Background Color', 'jevelin'),
				'desc'  => esc_html__( 'Select background color', 'jevelin' ),
				'type'  => 'rgba-color-picker',
				'value' => '#ffffff'
			),

			'background_color_overlay' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Background Color Variations', 'jevelin'),
				'desc' => esc_html__( 'Set background color variation', 'jevelin' ),
				'value'	  => false,
				'choices' => array(
					false => esc_html__( 'Standard (as section background)', 'jevelin' ),
					'columns' => esc_html__( 'Standard (as section background for column width only)', 'jevelin' ),
					true => esc_html__( 'Overlay (above background images to)', 'jevelin' ),
				)
			),

		),
	),

	'other_type' => array(
		'title'   => esc_html__( 'Other', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'border_radius' => array(
				'type'  => 'text',
			    'label' => esc_html__('Border Radius', 'jevelin'),
				'desc'  => wp_kses( __( 'Enter border radius (<b>top-left top-right bottom-right bottom-left</b>)', 'jevelin' ), jevelin_allowed_html() ),
			    'value' => '',
				'help'  => esc_html__( 'Example 1: 100px 0px 100px 0px', 'jevelin' ),
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
						    'value' => '0px 0px 0px 0px',
							'help'  => esc_html__( 'Example 1: 100px 0px 100px 0px <br>Example 2: 0% 15% 0% 15%', 'jevelin' ),
						),
			        ),
			    ),
			),

			'p_width'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Max Width', 'jevelin' ),
				'desc'  => esc_html__( 'Enter max column content width (in px or %, default px)', 'jevelin' )
			),

			'shadow' => array(
				'type'    => 'radio',
				'label'   => esc_html__( 'Shadow', 'jevelin' ),
				'desc'    => esc_html__( 'Choose column shadow', 'jevelin' ),
				'help'    => esc_html__( 'If shadow is not visible, please try to set z-index for column parent section to 1000 or more', 'jevelin' ),
				'value'	  => 'disabled',
				'choices' => array(
					'disabled' => esc_html__('Disabled', 'jevelin'),
					'shadow2' => esc_html__('Shadow Medium', 'jevelin'),
					'shadow1' => esc_html__('Shadow Large', 'jevelin'),
					'shadow3' => esc_html__('Shadow Xlarge', 'jevelin'),
				)
			),

			'diognal_sides' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Diognal sides', 'jevelin' ),
				'desc' => esc_html__( 'Add diognal sides to the top and the bottom of section', 'jevelin' ),
				'help'  => wp_kses( __( '<b>Expermental feature!</b> For the best result dont use this feature for the next section. Available only when background color is used', 'jevelin' ), jevelin_allowed_html() ),
				'value' => false,
				'left-choice' => array(
					'value' => false,
					'label' => esc_html__('Off', 'jevelin'),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__('On', 'jevelin'),
				),
			),


			'text_color' => array(
				'label' => esc_html__('Default Text Color', 'jevelin'),
				'desc'  => esc_html__( 'Select default text color', 'jevelin' ).'<br />'.esc_html__('(leave empty for default body color)', 'jevelin'),
				'type'  => 'color-picker',
			),

			'extra_white_space' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Extra White Space', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable extra white space over column background image', 'jevelin' ),
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

			'min_height'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Min Height', 'jevelin' ),
				'desc'  => esc_html__( 'Enter min height', 'jevelin' )
			),

			'class'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Class Name', 'jevelin' ),
				'desc'  => esc_html__( 'Enter custom class', 'jevelin' )
			),

			'custom_id'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'ID Name', 'jevelin' ),
				'desc'  => esc_html__( 'Enter custom ID', 'jevelin' )
			),

			'custom_css'   => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Custom CSS', 'jevelin' ),
				'desc'  => esc_html__( 'Enter custom CSS', 'jevelin' )
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
			        'max' => 25,
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
			        'max' => 25,
			        'step' => 0.1,
			    ),
			    'label' => esc_html__('Animation Delay', 'jevelin'),
			    'desc'  => esc_html__('Choose animation delay (seconds', 'jevelin'),
			),

		),
	),

);
