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
			),

			'title'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'jevelin' ),
				'desc'   => esc_html__( 'Enter Title', 'jevelin' ),
			),

			'content' => array(
				'type'   => 'wp-editor',
				'teeny'  => false, //true
				'reinit' => true,
				'media_buttons' => false,
				'size'   => 'large',
				'label'  => esc_html__( 'Content', 'jevelin' ),
				'desc'   => esc_html__( 'Enter content', 'jevelin' ).'
					<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
				'editor_height' => 120
			),

			'url'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'URL', 'jevelin' ),
				'desc'   => esc_html__( 'Enter URL', 'jevelin' ),
			),

			'improved_responsiveness' => array(
				'label' => esc_html__( 'Improved Responsiveness', 'jevelin' ),
				'desc'  => esc_html__( 'Enable or disable improved responsiveness, which limits text width in moble devices and improves readability', 'jevelin' ),
				'type'  => 'switch',
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

		),
	),

	'styling' => array(
		'title'   => esc_html__( 'Styling', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'style' => array(
			    'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
			    'value' => array(
			        'style' => 'style1',
			        'style1' => array(
			            'icon' => 'icon-like',
			        ),
			    ),
			    'picker' => array(
			        'style' => array(
			            'label'   => esc_html__('Style', 'jevelin'),
			            'type'    => 'select',
			            'choices' => array(
			                'style1' => esc_html__('Double icons', 'jevelin'),
			                'style2' => esc_html__('Simple Iconbox 1', 'jevelin'),
			                'style12' => esc_html__('Simple Iconbox 2', 'jevelin'),
			                'style3' => esc_html__('Large Iconbox 1', 'jevelin'),
			                'style4' => esc_html__('Large Iconbox 2', 'jevelin'),
			                'style5' => esc_html__('Large Iconbox 3', 'jevelin'),
			                'style6' => esc_html__('Large Iconbox 4', 'jevelin'),
			                'style7' => esc_html__('Large Iconbox 5', 'jevelin'),
			                'style8' => esc_html__('Large Iconbox 6', 'jevelin'),
			                'style9' => esc_html__('Large Iconbox 7', 'jevelin'),
			                'style10' => esc_html__('Large Iconbox 8', 'jevelin'),
			                'style11' => esc_html__('Large Iconbox 9', 'jevelin'),
			            ),
			            'desc'    => esc_html__('Choose main style', 'jevelin'),
			        )
			    ),
			    'choices' => array(
			        'style1' => array(
						'icon'    => array(
							'type'  => 'new-icon',
							'label' => esc_html__('Icon', 'jevelin'),
							'desc'   => esc_html__( 'Select Icon', 'jevelin' ),
							'set' => 'jevelin-icons',
							'value' => 'icon-like'
						),
						'color_line' => array(
							'label'   => esc_html__( 'Line Color', 'jevelin' ),
							'desc'    => esc_html__( 'Select line color', 'jevelin' ),
							'type'    => 'color-picker',
						),
					),
					'style4' => array(
						'color_line' => array(
							'label'   => esc_html__( 'Line Color', 'jevelin' ),
							'desc'    => esc_html__( 'Select line color', 'jevelin' ),
							'type'    => 'color-picker',
						),
					),
					'style5' => array(
						'color_line' => array(
							'label'   => esc_html__( 'Line Color', 'jevelin' ),
							'desc'    => esc_html__( 'Select line color', 'jevelin' ),
							'type'    => 'color-picker',
						),
					),
					'style7' => array(
						'color_line' => array(
							'label'   => esc_html__( 'Line Color', 'jevelin' ),
							'desc'    => esc_html__( 'Select line color', 'jevelin' ),
							'type'    => 'color-picker',
						),

						'shape'   => array(
							'type'    => 'select',
							'label'   => esc_html__('Shape', 'jevelin'),
							'desc'  => esc_html__('Select icon shape', 'jevelin'),
						    'value' => 'circle',
							'choices' => array(
								'circle' => esc_html__('Circle', 'jevelin'),
								'square' => esc_html__('Square', 'jevelin'),
								'rounded' => esc_html__('Rounded', 'jevelin'),
								'rhombus' => esc_html__('Rhombus', 'jevelin'),
							)
						),
					),
					'style8' => array(
						'background_color' => array(
							'label'   => esc_html__( 'Background Color', 'jevelin' ),
							'desc'    => esc_html__( 'Select background color', 'jevelin' ),
							'type'    => 'color-picker',
						),

						'shape'   => array(
							'type'    => 'select',
							'label'   => esc_html__('Shape', 'jevelin'),
							'desc'  => esc_html__('Select icon shape', 'jevelin'),
						    'value' => 'circle',
							'choices' => array(
								'circle' => esc_html__('Circle', 'jevelin'),
								'square' => esc_html__('Square', 'jevelin'),
								'rounded' => esc_html__('Rounded', 'jevelin'),
								'rhombus' => esc_html__('Rhombus', 'jevelin'),
							)
						),
					),
					'style9' => array(
						'background_color' => array(
							'label'   => esc_html__( 'Background Color', 'jevelin' ),
							'desc'    => esc_html__( 'Select background color', 'jevelin' ),
							'type'    => 'color-picker',
						),

						'shape'   => array(
							'type'    => 'select',
							'label'   => esc_html__('Shape', 'jevelin'),
							'desc'  => esc_html__('Select icon shape', 'jevelin'),
						    'value' => 'circle',
							'choices' => array(
								'circle' => esc_html__('Circle', 'jevelin'),
								'square' => esc_html__('Square', 'jevelin'),
								'rounded' => esc_html__('Rounded', 'jevelin'),
								'rhombus' => esc_html__('Rhombus', 'jevelin'),
							)
						),
					),
			    ),
			),

	        'alignment' => array(
	            'label'   => esc_html__('Icon Alignment', 'jevelin'),
	            'desc'    => esc_html__('Choose icon alignment', 'jevelin'),
	            'type'    => 'radio',
	            'choices' => array(
	                'left' => esc_html__('Left', 'jevelin'),
	                'center' => esc_html__('Center', 'jevelin'),
	                'right' => esc_html__('Right', 'jevelin'),
	            ),
	            'value' => 'center'
	        ),

			'box_alignment' => array(
	            'label'   => esc_html__('Box Alignment', 'jevelin'),
	            'desc'    => esc_html__('Choose box alignment', 'jevelin'),
	            'type'    => 'radio',
	            'choices' => array(
					'default' => esc_html__('Default', 'jevelin'),
	                'left' => esc_html__('Left', 'jevelin'),
	                'center' => esc_html__('Center', 'jevelin'),
	                'right' => esc_html__('Right', 'jevelin'),
	            ),
	            'value' => 'default'
	        ),

			'color_title' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Title Color', 'jevelin'),
			    'desc'  => esc_html__('Select title color', 'jevelin'),
			    'value' => '',
			),

			'color_text' => array(
			    'type'  => 'color-picker',
			    'value' => '',
			    'label' => esc_html__('Text Color', 'jevelin'),
			    'desc'  => esc_html__('Select text color', 'jevelin'),
			),

			'color_icon' => array(
			    'type'  => 'color-picker',
			    'value' => '',
			    'label' => esc_html__('Icon Color', 'jevelin'),
			    'desc'  => esc_html__('Select icon color', 'jevelin'),
			),

			'color_text_hover' => array(
			    'type'  => 'color-picker',
			    'value' => '',
			    'label' => esc_html__('Text Hover Color', 'jevelin'),
			    'desc'  => esc_html__('Select text hover color', 'jevelin'),
			),

			'color_icon_hover' => array(
			    'type'  => 'color-picker',
			    'value' => '',
			    'label' => esc_html__('Icon Hover Color', 'jevelin'),
			    'desc'  => esc_html__('Select icon hover color', 'jevelin'),
			),

		),
	),

	'typography_options' => array(
		'title'   => esc_html__( 'Typography', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'font' => array(
				'type'  => 'select',
				'label' => esc_html__('Title Font Famility', 'jevelin'),
				'desc'  => esc_html__( 'Select from theme options', 'jevelin' ),
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
				'label' => esc_html__('Title Weight', 'jevelin'),
				'desc'   => esc_html__( 'Select title weight', 'jevelin' ),
				'choices' => array(
					'default' => esc_html__( 'Default (from theme settings)', 'jevelin' ),
					'normal' => esc_html__( 'Normal', 'jevelin' ),
					'bold' => esc_html__( 'Bold', 'jevelin' ),
				),
				'value'	  => 'default',
			),

			'font_size'   => array(
				'type'    => 'select',
				'label'   => esc_html__('Title Size', 'jevelin'),
				'desc'  => wp_kses( __( 'Enter title size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'type'  => 'text',
				'value' => '16px'
			),

			'icon_size'   => array(
				'type'    => 'select',
				'label'   => esc_html__('Icon Size', 'jevelin'),
				'desc'  => wp_kses( __( 'Enter icon size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'type'  => 'text',
			),

		),
	),
);
