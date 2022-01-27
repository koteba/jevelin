<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(

	'id' => array( 'type' => 'unique' ),
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'timeline' => array(
				'label'         => esc_html__( 'Timeline', 'jevelin' ),
				'popup-title'   => esc_html__( 'Add/Edit Timeline', 'jevelin' ),
				'desc'          => esc_html__( 'Here you can add, remove and edit your Timeline.', 'jevelin' ),
				'type'          => 'addable-popup',
				'template'      => '{{=date}}: <b>{{=title}}</b>',
				'size'			=> 'medium',
				'popup-options' => array(

					'title'       => array(
						'label' => esc_html__( 'Title', 'jevelin' ),
						'desc'  => esc_html__( 'Enter title', 'jevelin' ),
						'type'  => 'text',
						'teeny' => true
					),

					'date'    => array(
						'label' => esc_html__( 'Date', 'jevelin' ),
						'desc'  => esc_html__( 'Enter date', 'jevelin' ),
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
						'editor_height' => 270,
					),

					'image' => array(
						'label' => esc_html__( 'Image', 'jevelin' ),
						'desc'  => esc_html__( 'Upload image for style 2 and style 3 only', 'jevelin' ),
						'type'  => 'upload',
					),

					'icon'    => array(
						'type'  => 'new-icon',
						'label' => esc_html__('Icon', 'jevelin'),
						'desc'   => esc_html__( 'Select Icon', 'jevelin' ),
						'set' => 'jevelin-icons',
					),

				)
			)

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
			        'style3' => array(
			            'border_color' => '#e5e5e5',
			        ),
			        'style4' => array(
			            'border_color' => '#e5e5e5',
			        ),
			    ),
			    'picker' => array(
			        'style' => array(
			            'label'   => esc_html__('Style', 'jevelin'),
			            'type'    => 'radio',
			            'choices' => array(
			                'style1' => esc_html__('Style 1', 'jevelin'),
			                'style2' => esc_html__('Style 2', 'jevelin'),
			                'style2 style3' => esc_html__('Style 3', 'jevelin'),
			            ),
			            'desc'    => esc_html__('Choose main style', 'jevelin'),
			        )
			    ),
			    'choices' => array(
			        /*'style2' => array(
						'background_color' => array(
						    'label' => esc_html__('Background Color', 'jevelin'),
						    'desc'  => esc_html__('Select item background color', 'jevelin'),
						    'type'  => 'rgba-color-picker',
						    'value' => '#F9F9F9'
						),
			        ),*/
			    ),
			),

			'title_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Heading Color', 'jevelin'),
			    'desc'  => esc_html__('Choose heading color', 'jevelin'),
			),

			'content_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Content Color', 'jevelin'),
			    'desc'  => esc_html__('Choose content color', 'jevelin'),
			),

			'date_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Date Color', 'jevelin'),
			    'desc'  => esc_html__('Choose date box text color', 'jevelin'),
			),

			'date_background_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Background Color', 'jevelin'),
			    'desc'  => esc_html__('Choose background color', 'jevelin'),
			),

			'border_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Border Color', 'jevelin'),
			    'desc'  => esc_html__('Choose background color. Only for Style 1', 'jevelin'),
			),

			'accent_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Accent Color', 'jevelin'),
			    'desc'  => esc_html__('Choose accent color or Leave it empty for global value', 'jevelin'),
			),

		),
	),

);
