<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(

	'id' => array( 'type' => 'unique' ),

	'slides' => array(
		'label'         => esc_html__( 'Icon box slides', 'jevelin' ),
		'popup-title'   => esc_html__( 'Add/Edit Icon box slides', 'jevelin' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Icon Box Slides.', 'jevelin' ),
		'type'          => 'addable-popup',
		'template'      => '{{=title}}',
		'size'			=> 'large',
		'popup-options' => array(

			'title'   => array(
				'label' => esc_html__( 'Title', 'jevelin' ),
				'desc'  => esc_html__( 'Enter name', 'jevelin' ),
				'type'  => 'text'
			),

			'content' => array(
				'type'   => 'wp-editor',
				'teeny'  => false,
				'reinit' => true,
				'size'   => 'large',
				'label'  => esc_html__( 'Content', 'jevelin' ),
				'desc'   => esc_html__( 'Enter content', 'jevelin' ).'
					<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
				'editor_height' => 160,
				'value' => '<h1 style="text-align: center;"><span style="font-size: 36px;">Mauris vel velit dignissim</span></h1><p style="text-align: center;"><span style="font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate vehicula sollicitudin. Aliquam rutrum aliquet nisl sit amet viverra. Nunc ac augue nunc.</span></p>',
			),

			'icon'    => array(
				'type'  => 'new-icon',
				'label' => esc_html__('Icon', 'jevelin'),
				'desc'   => esc_html__( 'Select Icon', 'jevelin' ),
				'set' => 'jevelin-icons',
				'value' => 'ti-check'
			),

			'color' => array(
				'type'  => 'color-picker',
				'label' => esc_html__('Background color', 'jevelin'),
				'desc'  => esc_html__('Select background color or leave it blank for dark background', 'jevelin'),
			),

			'image' => array(
				'label' => esc_html__( 'Background Image', 'jevelin' ),
				'desc'  => esc_html__( 'Upload slide background image', 'jevelin' ),
				'type'  => 'upload',
			),

		)
	),

	'autoplay' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Autoplay', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable autoplay', 'jevelin' ),
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

	'arrows' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Slide Arrows', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable slide arrows', 'jevelin' ),
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

	'accent_color' => array(
		'type'  => 'color-picker',
		'label' => esc_html__('Accent Color', 'jevelin'),
		'desc'  => esc_html__('Select accent color or leave it empty for global value', 'jevelin'),
	),

	'slide_title_color' => array(
		'type'  => 'rgba-color-picker',
		'label' => esc_html__('Slide Title Color', 'jevelin'),
		'desc'  => esc_html__('Select slide title color or leave it empty for white', 'jevelin'),
	),

	'slide_descr_color' => array(
		'type'  => 'rgba-color-picker',
		'label' => esc_html__('Slide Description Color', 'jevelin'),
		'desc'  => esc_html__('Select slide description color or leave it empty for light grey', 'jevelin'),
	),

	'height'   => array(
		'label' => esc_html__( 'Mobile Height', 'jevelin' ),
		'desc'  => esc_html__( 'Increase mobile height, if content is being cropped', 'jevelin' ),
		'type'  => 'text',
		'value' => '600px'
	),

);
