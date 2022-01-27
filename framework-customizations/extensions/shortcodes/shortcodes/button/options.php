<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }

$options = array(

	'id' => array( 'type' => 'unique' ),
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'text'  => array(
				'label' => esc_html__( 'Button Text', 'jevelin' ),
				'desc'  => esc_html__( 'Enter button text', 'jevelin' ),
				'type'  => 'text',
				'value' => 'This is button'
			),

			'url'   => array(
				'label' => esc_html__( 'Button URL', 'jevelin' ),
				'desc'  => esc_html__( 'Enter button URL', 'jevelin' ),
				'type'  => 'text',
				'value' => '#'
			),

			'target' => array(
				'type'  => 'switch',
				'label'   => esc_html__( 'Button Target', 'jevelin' ),
				'desc'    => esc_html__( 'Choose if you want to open the linked page in a new window', 'jevelin' ),
				'right-choice' => array(
					'value' => '_blank',
					'label' => esc_html__('Yes', 'jevelin'),
				),
				'left-choice' => array(
					'value' => '_self',
					'label' => esc_html__('No', 'jevelin'),
				),
			),

			'alignment' => array(
				'label' => esc_html__('Alignment', 'jevelin'),
				'desc'  => esc_html__('Select button alignment', 'jevelin'),
				'type'  => 'select',
				'value' => 'left',
				'choices' => array(
					'left' => esc_html__('Left', 'jevelin'),
					'center' => esc_html__('Center', 'jevelin'),
					'right' => esc_html__('Right', 'jevelin'),
				)
			),

			'alignment_mobile' => array(
				'label' => esc_html__('Mobile Alignment', 'jevelin'),
				'desc'  => esc_html__('Select mobile alignment', 'jevelin'),
				'type'  => 'select',
				'value' => 'default',
				'choices' => array(
					'default' => esc_html__('Default', 'jevelin'),
					'left' => esc_html__('Left', 'jevelin'),
					'center' => esc_html__('Center', 'jevelin'),
					'right' => esc_html__('Right', 'jevelin'),
				)
			),

			'image' => array(
				'label' => esc_html__( 'Background Image', 'jevelin' ),
				'desc'  => esc_html__( 'Upload image background image', 'jevelin' ),
				'type'  => 'upload',
			),

		),
	),

	'icon_tab' => array(
		'title'   => esc_html__( 'Icon', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'icon'       => array(
				'type' => 'new-icon',
				'label' => esc_html__( 'Icon', 'jevelin' ),
				'desc'  => esc_html__( 'Select icon', 'jevelin' ),
				'set' => 'jevelin-icons',
			),

			'icon_size' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Icon Size', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter icon size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'help'  => esc_html__( 'Example: 18px;', 'jevelin' ),
			),

			'icon_alignment' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Icon Alignment', 'jevelin' ),
				'desc' => esc_html__( 'Choose icon alignment', 'jevelin' ),
				'value' => 'left',
				'left-choice' => array(
					'value' => 'left',
					'label' => esc_html__('Left', 'jevelin'),
				),
				'right-choice' => array(
					'value' => 'right',
					'label' => esc_html__('Right', 'jevelin'),
				),
			),

		),
	),

	'styling' => array(
		'title'   => esc_html__( 'Styling', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'style' => array(
				'label' => esc_html__('Button Style', 'jevelin'),
				'desc'  => esc_html__('Choose button style (notice: style 4 is always in full width)', 'jevelin'),
				'type'  => 'radio',
				'value' => '1',
				'choices' => array(
					'1' => esc_html__('Simple Button', 'jevelin'),
					'2' => esc_html__('Fancy Button', 'jevelin'),
					'5' => esc_html__('Fancy Spacing Button', 'jevelin'),
					'3' => esc_html__('Link Button', 'jevelin'),
				)
			),

			'size' => array(
				'label' => esc_html__('Button Size', 'jevelin'),
				'desc'  => esc_html__('Choose button size', 'jevelin'),
				'type'  => 'select',
				'value' => 'medium',
				'choices' => array(
					'xsmall' => esc_html__('XSmall', 'jevelin'),
					'small' => esc_html__('Small', 'jevelin'),
					'medium' => esc_html__('Medium', 'jevelin'),
					'large' => esc_html__('Large', 'jevelin'),
					'xlarge' => esc_html__('XLarge', 'jevelin'),
					'xlarge sh-button-xlarge-small' => esc_html__('XLarge (small text)', 'jevelin'),
				)
			),

			'font_size' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Font Size', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter font size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'help'  => esc_html__( 'Example: 18px;', 'jevelin' ),
			),

			'font_weight' => array(
				'type'  => 'select',
				'label' => esc_html__('Font Weight', 'jevelin'),
				'desc'  => esc_html__( 'Select font weight', 'jevelin' ),
				'help'  => esc_html__( 'Notice that not every font will support semi-bold and light font weight', 'jevelin' ),
				'choices' => array(
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

			'radius'  => array(
			    'label' => esc_html__( 'Button Radius', 'jevelin' ),
			    'desc'  => esc_html__( 'Select button radius', 'jevelin' ),
			    'type'  => 'slider',
			    'value' => 0,
			    'properties' => array(
			        'min' => 0,
			        'max' => 35,
			        'sep' => 5,
			    ),
			),

			'border_size' => array(
			    'type'  => 'slider',
			    'value' => 2,
			    'properties' => array(
			        'min' => 1,
			        'max' => 5,
			        'sep' => 1,
			    ),
			    'label' => esc_html__('Border Size', 'jevelin'),
			    'desc'  => esc_html__('Choose button border size', 'jevelin'),
			),

			'shadow' => array(
				'label' => esc_html__('Shadow', 'jevelin'),
				'desc'  => esc_html__('Choose button shadow', 'jevelin'),
				'type'  => 'select',
				'value' => 'none',
				'choices' => array(
					'none' => esc_html__('None', 'jevelin'),
					'simple' => esc_html__('Simple', 'jevelin'),
					'near' => esc_html__('Near spread', 'jevelin'),
					'far' => esc_html__('Far spread', 'jevelin'),
					'extrafar' => esc_html__('Extra Far spread', 'jevelin'),
				)
			),

			'full' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Button 100% Width', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable full button width', 'jevelin' ),
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

			'tale' => array(
				'label' => esc_html__('Button Tale', 'jevelin'),
				'desc'  => esc_html__('Choose button tale. Notice: this option works only for style 1', 'jevelin'),
				'type'  => 'select',
				'value' => 'none',
				'choices' => array(
					'none' => esc_html__('None', 'jevelin'),
					'top' => esc_html__('Top', 'jevelin'),
					'bottom' => esc_html__('Bottom', 'jevelin'),
				)
			),

			'height'   => array(
				'label' => esc_html__( 'Button Height', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter your custom button height (with px)', 'jevelin' ), jevelin_allowed_html() ),
				'type'  => 'text',
				'help'  => esc_html__( 'Example: 20px', 'jevelin' ),
			),

			'line_height'   => array(
				'label' => esc_html__( 'Button Line Height', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter your custom button line height (with px)', 'jevelin' ), jevelin_allowed_html() ),
				'type'  => 'text',
				'help'  => esc_html__( 'Example: 20px', 'jevelin' ),
			),

			'leftright_padding'   => array(
				'label' => esc_html__( 'Button Left/Right Padding', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter your custom button left/right padding (with px)', 'jevelin' ), jevelin_allowed_html() ),
				'type'  => 'text',
				'help'  => esc_html__( 'Example: 30px', 'jevelin' ),
			),

		),
	),

	'colors' => array(
		'title'   => esc_html__( 'Colors', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'text_color' => array(
			    'label' => esc_html__('Text Color', 'jevelin'),
			    'desc'  => esc_html__('Select text color', 'jevelin'),
			    'type'  => 'color-picker',
			    'value' => '#ffffff'
			),

			'text_hover_color' => array(
			    'label' => esc_html__('Text Hover Color', 'jevelin'),
			    'desc'  => esc_html__('Select text hover color', 'jevelin'),
			    'type'  => 'color-picker',
			),

			'background_color' => array(
			    'label' => esc_html__('Background Color', 'jevelin'),
			    'desc'  => esc_html__('Select background colors', 'jevelin'),
			    'type'  => 'rgba-color-picker',
			    'value' => '#3f3f3f'
			),

			'background_hover_color' => array(
			    'label' => esc_html__('Background Hover Color', 'jevelin'),
			    'desc'  => esc_html__('Select background hover color', 'jevelin'),
			    'type'  => 'rgba-color-picker',
			    'value' => ''
			),

			'border_color' => array(
			    'label' => esc_html__('Border Color', 'jevelin'),
			    'desc'  => esc_html__('Select border color to add border', 'jevelin'),
			    'type'  => 'rgba-color-picker',
			    'value' => ''
			),

			'border_hover_color' => array(
			    'label' => esc_html__('Border Hover Color', 'jevelin'),
			    'desc'  => esc_html__('Select border hover color', 'jevelin'),
			    'type'  => 'rgba-color-picker',
			    'value' => ''
			),

		),
	),

	'load_animation' => array(
		'title'   => esc_html__( 'Show Animation', 'jevelin' ),
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

		),
	),

);
