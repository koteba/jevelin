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
				'images_only' => true,
			),

			'name'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Name', 'jevelin' ),
				'desc'  => esc_html__( 'Enter name', 'jevelin' )
			),

			'role'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Profession', 'jevelin' ),
				'desc'  => esc_html__( 'Enter profession', 'jevelin' )
			),

			'description' => array(
				'type'   => 'wp-editor',
				'teeny'  => false, //true
				'reinit' => true,
				'size'   => 'large',
				'label'  => esc_html__( 'Description', 'jevelin' ),
				'desc'   => esc_html__( 'Enter description', 'jevelin' ).'
					<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
				'editor_height' => 90
			),

		),
	),
	'social-icons' => array(
		'title'   => esc_html__( 'Social Icons', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			/*'qrcode' => array(
				'type' => 'switch',
				'label' => esc_html__( 'QR Code VCard', 'jevelin' ),
				'desc' => esc_html__( 'Select if you want to add simple QR VCard from entered data', 'jevelin' ),
				'value' => true,
				'left-choice' => array(
					'value' => false,
					'label' => esc_html__('Off', 'jevelin'),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__('On', 'jevelin'),
				),
			),*/

			'facebook'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Facebook', 'jevelin' ),
				'desc'  => esc_html__( 'Enter Facebook URL or leave it blank', 'jevelin' )
			),

			'twitter'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Twitter', 'jevelin' ),
				'desc'  => esc_html__( 'Enter Twitter URL or leave it blank', 'jevelin' )
			),

			'googleplus'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Google Plus', 'jevelin' ),
				'desc'  => esc_html__( 'Enter Google Plus URL or leave it blank', 'jevelin' )
			),

			'instagram'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Instagram', 'jevelin' ),
				'desc'  => esc_html__( 'Enter Instagram URL or leave it blank', 'jevelin' )
			),

			'skype'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Skype', 'jevelin' ),
				'desc'  => esc_html__( 'Enter Skype URL or leave it blank', 'jevelin' )
			),

			'behance'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Behance', 'jevelin' ),
				'desc'  => esc_html__( 'Enter Behance URL or leave it blank', 'jevelin' )
			),

			'linkedin'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'linkedin', 'jevelin' ),
				'desc'  => esc_html__( 'Enter Linkedin URL or leave it blank', 'jevelin' )
			),

			'tumblr'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Tumblr', 'jevelin' ),
				'desc'  => esc_html__( 'Enter Tumblr URL or leave it blank', 'jevelin' )
			),

		),
	),
	'styling' => array(
		'title'   => esc_html__( 'Styling', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'layout' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Style', 'jevelin'),
				'desc'    => esc_html__('Choose main style for accordion', 'jevelin'),
				'choices' => array(
					'style1' => esc_html__('Style 1', 'jevelin'),
					'style2' => esc_html__('Style 2', 'jevelin'),
					'style3' => esc_html__('Style 3 (left alignment)', 'jevelin'),
					'style4' => esc_html__('Style 4', 'jevelin'),
				),
				'value' => 'style1'
			),

			'image_ratio' => array(
				'type'    => 'select',
				'label'   => esc_html__('Image Ratio', 'jevelin'),
				'desc'    => esc_html__('Select image aspect ratio', 'jevelin'),
				'choices' => array(
					'landscape' => esc_html__('Landscape', 'jevelin'),
					'portrait' => esc_html__('Portrait', 'jevelin'),
					'square' => esc_html__('Square', 'jevelin'),
				),
				'value' => 'landscape'
			),

	        'icon_style' => array(
				'type'    => 'select',
				'label'   => esc_html__('Social Media Position', 'jevelin'),
				'desc'    => esc_html__('Choose main style for social icons', 'jevelin'),
				'choices' => array(
					'standard' => esc_html__('Standard', 'jevelin'),
					'overlay' => esc_html__('Overlay', 'jevelin'),
					'overlay2' => esc_html__('Overlay 2', 'jevelin'),
				),
				'value' => 'overlay'
	        ),

			'color_name' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Name Color', 'jevelin'),
			    'desc'  => esc_html__('Select name color', 'jevelin').'<br />'.esc_html__('(leave empty for default heading color)', 'jevelin'),
			),

			'color_role' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Proffesion Color', 'jevelin'),
			    'desc'  => esc_html__('Select name color', 'jevelin').'<br />'.esc_html__('(leave empty for default heading color)', 'jevelin'),
			),

			'color_description' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Description Color', 'jevelin'),
			    'desc'  => esc_html__('Select description color', 'jevelin').'<br />'.esc_html__('(leave empty for default body color)', 'jevelin'),
			),

			'color_accent' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Accent Color', 'jevelin'),
			    'desc'  => esc_html__('Select accent color or leave it blank for theme accent color', 'jevelin'),
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
