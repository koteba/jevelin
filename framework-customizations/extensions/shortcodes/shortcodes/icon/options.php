<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(

	'id' => array( 'type' => 'unique' ),

	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'icon'    => array(
				'type'  => 'new-icon',
				'label' => esc_html__('Icon', 'jevelin'),
				'desc'   => esc_html__( 'Select Icon', 'jevelin' ),
				'set' => 'jevelin-icons',
				'value' => 'ti-check'
			),

			/*'url'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'URL', 'jevelin' ),
				'desc'   => esc_html__( 'Enter URL', 'jevelin' ),
			),*/

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

			'url'   => array(
				'label' => esc_html__( 'Icon URL', 'jevelin' ),
				'desc'  => esc_html__( 'Enter icon URL', 'jevelin' ),
				'type'  => 'text',
				'value' => ''
			),

			'url_lightbox' => array(
		        'label'   => esc_html__('Icon URL in Lightbox', 'jevelin'),
		        'desc'    => esc_html__('When enabled URLs will be opened in lightbox view. Notice: For Youtube embed URL should be used, for example - https://www.youtube.com/embed/XYXYXYX?rel=0&controls=0&showinfo=0&autoplay=1', 'jevelin'),
		        'type'    => 'radio',
		        'choices' => array(
		            'disabled' => esc_html__('Disabled', 'jevelin'),
		            'enabled' => esc_html__('Enabled', 'jevelin'),
		        ),
		        'value' => 'disabled'
		    ),

			'target' => array(
				'type'  => 'switch',
				'label'   => esc_html__( 'Icon URL Target', 'jevelin' ),
				'desc'    => esc_html__( 'Choose if you want to open the URL in a new window', 'jevelin' ),
				'right-choice' => array(
					'value' => '_blank',
					'label' => esc_html__('Yes', 'jevelin'),
				),
				'left-choice' => array(
					'value' => '_self',
					'label' => esc_html__('No', 'jevelin'),
				),
			),

		    'shadow' => array(
				'label'   => esc_html__('Shadow', 'jevelin'),
				'desc'    => esc_html__('Choose shadow', 'jevelin'),
				'type'    => 'radio',
				'choices' => array(
					'none' => esc_html__('None', 'jevelin'),
					'small' => esc_html__('Small', 'jevelin'),
					'large' => esc_html__('Large', 'jevelin'),
				),
				'value' => 'none'
			),

			'icon_size' => array(
				'type'  => 'select',
				'label' => esc_html__('Size', 'jevelin'),
				'desc'  => wp_kses( __( 'Enter icon size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'type'  => 'text',
				'attr'  => array( 'style' => 'max-width: 70px;' ),
				'value' => '30px'
			),

			'icon_line_height' => array(
				'type'  => 'select',
				'label' => esc_html__('Line Height', 'jevelin'),
				'desc'  => wp_kses( __( 'Enter line height (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'type'  => 'text',
				'attr'  => array( 'style' => 'max-width: 70px;' ),
				'value' => ''
			),

			'icon_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Color', 'jevelin'),
			    'desc'  => esc_html__('Select icon color or leave blank for default body color', 'jevelin'),
			    'value' => '',
			),

			'icon_second_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Second Color', 'jevelin'),
			    'desc'  => esc_html__('Select icon color to create a gradient color (Only for chrome, safari and opera browsers)', 'jevelin'),
			    'value' => '',
			),

			'icon_hover_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Hover Color', 'jevelin'),
			    'desc'  => esc_html__('Select hover color', 'jevelin'),
			    'value' => '',
			),

			'icon_hover_second_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Second Hover Color', 'jevelin'),
			    'desc'  => esc_html__('Select icon hover color to create a hover gradient color (Only for chrome, safari and opera browsers)', 'jevelin'),
			    'value' => '',
			),

		),
	),

	'box_options' => array(
		'title'   => esc_html__( 'Background Box', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'box_status' => array(
				'label'   => esc_html__( 'Background Box', 'jevelin' ),
				'desc'    => esc_html__( 'Enable or disable background box', 'jevelin' ),
				'type'    => 'radio',
				'choices' => array(
					'enabled' => esc_html__( 'Enabled', 'jevelin' ),
					'disabled' => esc_html__( 'Disabled', 'jevelin' ),
				),
				'value' => 'disabled'
			),

			'box_background_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__( 'Background Color', 'jevelin' ),
			    'desc'  => esc_html__( 'Select box background color', 'jevelin' ),
			    'value' => '',
			),

			'box_background_hover_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__( 'Background Hover Color', 'jevelin' ),
			    'desc'  => esc_html__( 'Select box background color', 'jevelin' ),
			    'value' => '#fafafa',
			),

			'box_border_radius' => array(
				'type'  => 'select',
				'label' => esc_html__( 'Border Radius', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter border radius (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'type'  => 'text',
				'attr'  => array( 'style' => 'max-width: 70px;' ),
				'value' => '5px'
			),



			'box_border_width' => array(
				'type'  => 'select',
				'label' => esc_html__('Border Width', 'jevelin'),
				'desc'  => wp_kses( __( 'Enter border width', 'jevelin' ), jevelin_allowed_html() ),
				'type'  => 'text',
				'attr'  => array( 'style' => 'max-width: 70px;' ),
				'value' => '0px'
			),

			'box_border_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__( 'Border Color', 'jevelin' ),
			    'desc'  => esc_html__( 'Select box border color', 'jevelin' ),
			    'value' => '',
			),

			'box_border_hover_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__( 'Border Hover Color', 'jevelin' ),
			    'desc'  => esc_html__( 'Select box border hover color', 'jevelin' ),
			    'value' => '#fafafa',
			),




			'box_padding' => array(
				'type'  => 'select',
				'label' => esc_html__( 'Padding', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter padding (with <b>px</b>, <b>top right bottom left</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'type'  => 'text',
				'attr'  => array( 'style' => 'max-width: 70px;' ),
				'value' => '10px 10px 10px 10px'
			),

			'box_size' => array(
				'type'  => 'select',
				'label' => esc_html__( 'Or Box Size in px (width/height)', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter box size in px (make sure that padding option is empty)', 'jevelin' ), jevelin_allowed_html() ),
				'type'  => 'text',
				'attr'  => array( 'style' => 'max-width: 70px;' ),
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
