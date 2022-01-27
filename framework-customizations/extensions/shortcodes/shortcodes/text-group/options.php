<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(
	'id' => array( 'type' => 'unique' ),
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'content' => array(
				'type'   => 'wp-editor',
				'teeny'  => false,
				'reinit' => true,
				'size'   => 'large',
				'label'  => esc_html__( 'Content', 'jevelin' ),
				'desc'   => esc_html__( 'Enter content', 'jevelin' ).'
					<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
				'editor_height' => 120,
				'value' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
			),

			'content_two' => array(
				'type'   => 'wp-editor',
				'teeny'  => false,
				'reinit' => true,
				'size'   => 'large',
				'label'  => esc_html__( 'Content', 'jevelin' ),
				'desc'   => esc_html__( 'Enter content', 'jevelin' ).'
					<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
				'editor_height' => 120,
				'value' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
			),

			'layout' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Layout', 'jevelin'),
				'desc'    => esc_html__('Choose column layout', 'jevelin'),
				'choices' => array(
					'layout1' => esc_html__('50% + %50 column layout', 'jevelin'),
					'layout2' => esc_html__('Inline both columns', 'jevelin'),
				),
				'value' => 'style1'
			),

		),
	),
	'styling' => array(
		'title'   => esc_html__( 'Styling', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'paragraph_whitespace' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Paragraph Whitespace', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable paragraph line brake whitespace', 'jevelin' ),
				'value' => true,
				'left-choice' => array(
					'value' => false,
					'label' => esc_html__('Off', 'jevelin'),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__('On', 'jevelin'),
				),
			),

			'text_font' => array(
				'type'  => 'select',
				'label' => esc_html__('Text Font Famility', 'jevelin'),
				'desc'  => esc_html__( 'Select text font famility', 'jevelin' ),
				'help'  => wp_kses( __( 'You can set them in <i>Theme Settings > Styling</i>', 'jevelin' ), jevelin_allowed_html() ),
				'choices' => array(
					'heading' => esc_html__( 'Heading', 'jevelin' ),
					'body' => esc_html__( 'Body', 'jevelin' ),
					'additional1' => esc_html__( 'Additional font 1', 'jevelin' ),
					'additional2' => esc_html__( 'Additional font 2', 'jevelin' ),
				),
				'value'	  => 'body',
			),

			'heading_font' => array(
				'type'  => 'select',
				'label' => esc_html__('Heading Font Famility', 'jevelin'),
				'desc'  => esc_html__( 'Select heading font famility', 'jevelin' ),
				'help'  => wp_kses( __( 'You can set them in <i>Theme Settings > Styling</i>', 'jevelin' ), jevelin_allowed_html() ),
				'choices' => array(
					'heading' => esc_html__( 'Heading', 'jevelin' ),
					'body' => esc_html__( 'Body', 'jevelin' ),
					'additional1' => esc_html__( 'Additional font 1', 'jevelin' ),
					'additional2' => esc_html__( 'Additional font 2', 'jevelin' ),
				),
				'value'	  => 'heading',
			),

			'heading_font_weight' => array(
				'type'  => 'select',
				'label' => esc_html__('Heading Font Weight', 'jevelin'),
				'desc'  => esc_html__( 'Select heading font weight', 'jevelin' ),
				'choices' => array(
					'200' => esc_html__( 'Extra Light', 'jevelin' ),
					'300' => esc_html__( 'Light', 'jevelin' ),
					'400' => esc_html__( 'Regular', 'jevelin' ),
					'600' => esc_html__( 'Semi-Bold', 'jevelin' ),
					'700' => esc_html__( 'Bold', 'jevelin' ),
					'900' => esc_html__( 'Extra Bold', 'jevelin' ),
				),
				'value'	  => '700',
			),

		),
	),
);
