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
				'editor_height' => 260,
				'value' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
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

			'text_size'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Font Size', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter title size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'help'  => esc_html__( 'Example: 16px;', 'jevelin' ),
			),

			'text_size_mobile'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Font Size (responsive)', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter title size (with <b>px</b>) for mobile devices', 'jevelin' ), jevelin_allowed_html() ),
				'help'  => esc_html__( 'Example: 16px;', 'jevelin' ),
			),

			'line_height'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Line height', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter line height (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'help'  => esc_html__( 'Example: 30px;', 'jevelin' ),
			),

			'text_color' => array(
			    'label' => esc_html__('Text Color', 'jevelin'),
			    'desc' => esc_html__( 'Select text color', 'jevelin' ),
			    'type'  => 'color-picker',
			),

			'link_color' => array(
			    'label' => esc_html__('Link Color', 'jevelin'),
			    'desc' => esc_html__( 'Select link color', 'jevelin' ),
			    'type'  => 'color-picker',
			),

			'link_hover_color' => array(
			    'label' => esc_html__('Link Hover Color', 'jevelin'),
			    'desc' => esc_html__( 'Select link hover color', 'jevelin' ),
			    'type'  => 'color-picker',
			),

			'margin'   => array(
				'label' => esc_html__( 'Margin', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter your custom margin (<b>top right bottom left</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'type'  => 'text',
				'value' => '0px 0px 15px 0px',
				'help'  => esc_html__( 'Example: 0px 0px 15px 0px', 'jevelin' ),
			),

			'class'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Class Name', 'jevelin' ),
				'desc'  => esc_html__( 'Enter custom class name', 'jevelin' )
			),

		),
	),
);
