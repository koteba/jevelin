<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(
	'id' => array( 'type' => 'unique' ),

	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'content'   => array(
				'label'  => esc_html__( 'Content', 'jevelin' ),
				'desc'   => esc_html__( 'Enter content', 'jevelin' ),
				'type'  => 'text',
				'value' => 'This is heading element'
			),

			'heading' => array(
				'type'  => 'select',
				'label' => esc_html__('Heading Type', 'jevelin'),
				'desc'   => esc_html__( 'Select heading type', 'jevelin' ),
				'choices' => array(
					'h1' => esc_html__( 'h1', 'jevelin' ),
					'h2' => esc_html__( 'h2', 'jevelin' ),
					'h3' => esc_html__( 'h3', 'jevelin' ),
					'h4' => esc_html__( 'h4', 'jevelin' ),
					'h5' => esc_html__( 'h5', 'jevelin' ),
					'h6' => esc_html__( 'h6', 'jevelin' ),
					'span' => esc_html__( 'span', 'jevelin' ),
				),
				'value'	  => 'h2',
			),

			'alignment' => array(
				'type'  => 'select',
				'label' => esc_html__('Text Alignment', 'jevelin'),
				'desc'  => esc_html__( 'Select text alignment', 'jevelin' ),
				'choices' => array(
					'left' => esc_html__( 'Left', 'jevelin' ),
					'center' => esc_html__( 'Center', 'jevelin' ),
					'right' => esc_html__( 'Right', 'jevelin' ),
				),
				'value'	=> 'center',
			),

			'color_text' => array(
				'type'  => 'color-picker',
				'label' => esc_html__( 'Text Color', 'jevelin' ),
				'desc'  => esc_html__( 'Select text color', 'jevelin' ),
			),

			'color_text_hover' => array(
				'type'  => 'color-picker',
				'label' => esc_html__( 'Text Hover Color', 'jevelin' ),
				'desc'  => esc_html__( 'Select text hover color', 'jevelin' ),
			),

			'hover_element' => array(
	            'label'   => esc_html__('Hover Element', 'jevelin'),
	            'desc'    => esc_html__('Choose hover element', 'jevelin'),
				'help'  => esc_html__( 'This element will start hover animation', 'jevelin' ),
	            'type'    => 'select',
	            'choices' => array(
	                'heading' => esc_html__('Heading', 'jevelin'),
	                'column' => esc_html__('Column', 'jevelin'),
	                'section' => esc_html__('Section', 'jevelin'),
	            ),
	            'value' => 'heading'
	        ),

		),
	),


	'likn_options' => array(
		'title'   => esc_html__( 'Link', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'link'   => array(
				'label' => esc_html__( 'Link', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter heading link', 'jevelin' ), jevelin_allowed_html() ),
				'type'  => 'text',
				'value' => '',
			),

			'link_target'   => array(
				'label' => esc_html__( 'Link Target', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter heading link', 'jevelin' ), jevelin_allowed_html() ),
				'type'    => 'select',
	            'choices' => array(
	                '_self' => esc_html__('Open in current window', 'jevelin'),
	                '_blank' => esc_html__('Open in new tab', 'jevelin'),
	            ),
	            'value' => '_self',
			),

		),
	),


	'typography_options' => array(
		'title'   => esc_html__( 'Typography', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'font' => array(
				'type'  => 'select',
				'label' => esc_html__('Font Famility', 'jevelin'),
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

			'weight' => array(
				'type'  => 'select',
				'label' => esc_html__('Font Weight', 'jevelin'),
				'desc'  => esc_html__( 'Select font weight', 'jevelin' ),
				'help'  => esc_html__( 'Notice that not every font will support semi-bold and light font weight', 'jevelin' ),
				'choices' => array(
					'100' => esc_html__( 'Default (from theme settings)', 'jevelin' ),
					'200' => esc_html__( 'Extra Light', 'jevelin' ),
					'300' => esc_html__( 'Light', 'jevelin' ),
					'400' => esc_html__( 'Normal', 'jevelin' ),
					'500' => esc_html__( 'Medium', 'jevelin' ),
					'600' => esc_html__( 'Semi-bold', 'jevelin' ),
					'700' => esc_html__( 'Bold', 'jevelin' ),
					'800' => esc_html__( 'Extra Bold', 'jevelin' ),
					'900' => esc_html__( 'Black', 'jevelin' ),
				),
				'value'	  => '700',
			),

			'italic' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Font Style Italic', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable font style italic', 'jevelin' ),
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

			'size' => array(
			    'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
			    'value' => array(
			        'size' => 'default',
			        'custom' => array(
			        ),
			    ),
			    'picker' => array(
			        'size' => array(
			            'label'   => esc_html__('Font Size', 'jevelin'),
			            'desc'    => esc_html__('Choose font size', 'jevelin'),
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

			'line_height'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Line height', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter line height (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'help'  => esc_html__( 'Example: 30px;', 'jevelin' ),
			),

			'letter_spacing'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Letter spacing', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter letter spacing (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'help'  => esc_html__( 'Example: 5px;', 'jevelin' ),
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

	'position_box' => array(
		'title'   => esc_html__( 'Position', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'inline_element' => jevelin_element_inline_option(),
			'margin' => jevelin_element_margin_option(),

			'margin_responsive' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Margin Responsive', 'jevelin' ),
				'desc'  => esc_html__( 'Here you can set responsive smartphone and tablet margin (top right bottom left). For example: 30px 0px 30px 0px', 'jevelin' ),
			),

		),
	),

);
