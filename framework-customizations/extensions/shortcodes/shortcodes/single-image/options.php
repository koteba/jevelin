<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(
	'id' => array( 'type' => 'unique' ),

	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'image' => array(
				'label'   => esc_html__( 'Image', 'jevelin' ),
				'desc'    => esc_html__( 'Upload image', 'jevelin' ),
				'type'    => 'upload',
			),

			'image_hover' => array(
				'label'   => esc_html__( 'Image (on hover)', 'jevelin' ),
				'desc'    => esc_html__( 'Upload hover image (recommended to use image in same dimenstions as main image)', 'jevelin' ),
				'type'    => 'upload',
			),

			'url'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'URL', 'jevelin' ),
				'desc'  => esc_html__( 'Enter URL', 'jevelin' ),
			),

			'alignment' => array(
				'type'    => 'select',
				'label'   => esc_html__('Alignment', 'jevelin'),
				'desc'	=> esc_html__( 'Select alignment', 'jevelin' ),
				'value' => 'left',
				'choices' => array(
					'left' => esc_html__('Left', 'jevelin'),
					'center' => esc_html__('Center', 'jevelin'),
					'right' => esc_html__('Right', 'jevelin'),
				)
			),

			'alignment_mobile' => array(
				'type'    => 'select',
				'label'   => esc_html__('Mobile Alignment', 'jevelin'),
				'desc'	=> esc_html__( 'Select mobile alignment', 'jevelin' ),
				'value' => 'default',
				'choices' => array(
					'default' => esc_html__('Default', 'jevelin'),
					'left' => esc_html__('Left', 'jevelin'),
					'center' => esc_html__('Center', 'jevelin'),
					'right' => esc_html__('Right', 'jevelin'),
				)
			),

			'size' => array(
				'type'    => 'select',
				'label'   => esc_html__('Size', 'jevelin'),
				'desc'	=> esc_html__( 'Select image size', 'jevelin' ),
				'value' => 'large',
				'choices' => array(
					'large' => esc_html__('Large', 'jevelin'),
					'full' => esc_html__('Full', 'jevelin'),
				)
			),

			'radius'  => array(
			    'label' => esc_html__( 'Image Radius', 'jevelin' ),
			    'desc'  => esc_html__( 'Select image radius', 'jevelin' ),
			    'type'  => 'slider',
			    'value' => 0,
			    'properties' => array(
			        'min' => 0,
			        'max' => 100,
			        'sep' => 1,
			    ),
			),

			'lightbox' => array(
				'type' => 'select',
				'label' => esc_html__( 'Lightbox', 'jevelin' ),
				'desc' => esc_html__( 'Open in lightbox (will override URL)', 'jevelin' ),
				'value' => true,
				'choices' => array(
					true => esc_html__('Enabled', 'jevelin'),
					false => esc_html__('Disabled', 'jevelin'),
				)
			),

		),
	),

	'styling' => array(
		'title'   => esc_html__( 'Styling', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

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

			'overlay' => array(
			    'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
			    'value' => array(
			        'style' => ''
			    ),
			    'picker' => array(
			        'overlay' => array(
						'label' => esc_html__( 'Overlay', 'jevelin' ),
						'desc' => esc_html__( 'Choose image overlay style', 'jevelin' ),
			            'type' => 'radio',
			            'choices' => array(
							'disabled' => esc_html__('Disabled', 'jevelin'),
							'overlay1' => esc_html__('Overlay 1 ', 'jevelin'),
							'overlay2' => esc_html__('Overlay 2 ', 'jevelin'),
			            ),
			        )
			    ),
			    'choices' => array(
			        'overlay1' => array(
						'button_name' => array(
							'type'  => 'text',
							'desc'  => esc_html__( 'Enter button name', 'jevelin' ),
							'label' => esc_html__( 'Button Name', 'jevelin' ),
							'value' => esc_html__( 'This is button', 'jevelin' ),
						),

						'button_icon' => array(
							'type'  => 'new-icon',
							'label' => esc_html__('Icon', 'jevelin'),
							'desc'   => esc_html__( 'Select icon', 'jevelin' ),
							'set' => 'jevelin-icons',
							'value' => 'ti-check'
						),
			        ),
			    ),
			),

			'popover' => array(
				'type'  => 'text',
				'label'   => esc_html__( 'Popover', 'jevelin' ),
				'desc'    => esc_html__( 'Enter popover text', 'jevelin' ),
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
