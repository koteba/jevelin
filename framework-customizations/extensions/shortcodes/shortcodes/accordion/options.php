<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(

	'id' => array( 'type' => 'unique' ),
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'testimonials' => array(
				'label'         => esc_html__( 'Accordions', 'jevelin' ),
				'popup-title'   => esc_html__( 'Add/Edit Accordion', 'jevelin' ),
				'desc'          => esc_html__( 'Add, remove, edit or reorder your a ccordions', 'jevelin' ),
				'type'          => 'addable-popup',
				'template'      => '{{=title}}',
				'size'			=> 'medium',
				'popup-options' => array(

					'title'   => array(
						'label' => esc_html__( 'Title', 'jevelin' ),
						'desc'  => esc_html__( 'Enter title', 'jevelin' ),
						'type'  => 'text',
						'value' => 'Title',
					),

					'content' => array(
						'type'   => 'wp-editor',
						'teeny'  => false, // true
						'reinit' => true,
						'size'   => 'large',
						'label'  => esc_html__( 'Content', 'jevelin' ),
						'desc'   => esc_html__( 'Enter content', 'jevelin' ).'
							<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
						'editor_height' => 280,
						'value' => 'Content',
					),

					'icon' => array(
					    'type'  => 'new-icon',
					    'value' => 'fa fa-chevron-down',
					    'label' => esc_html__('Icon (for style 5 only)', 'jevelin'),
					    'desc'  => esc_html__('Choose icon for style 5 only', 'jevelin'),
					    'set' => 'jevelin-icons',
					),

				)
			),

			'collapsed' => array(
				'type' => 'switch',
				'label' => esc_html__( 'First element expanded', 'jevelin' ),
				'desc' => esc_html__( 'Show the first accordion element expanded', 'jevelin' ),
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

	'icons' => array(
		'title'   => esc_html__( 'Icons', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'icon' => array(
			    'type'  => 'new-icon',
			    'value' => 'fa fa-chevron-down',
			    'label' => esc_html__('Icon Collapsed', 'jevelin'),
			    'desc'  => esc_html__('Choose collapsed icon', 'jevelin'),
			    'set' => 'jevelin-icons',
			),

			'icon_close' => array(
			    'type'  => 'new-icon',
			    'value' => 'fa fa-chevron-up',
			    'label' => esc_html__('Icon Expanded', 'jevelin'),
			    'desc'  => esc_html__('Choose expanded icon', 'jevelin'),
			    'set' => 'jevelin-icons',
			),

			'icon_position' => array(
			    'type'  => 'radio',
			    'value' => 'left',
			    'label' => esc_html__('Icon Alignment', 'jevelin'),
			    'desc'  => esc_html__('Choose icon alignment', 'jevelin'),
			    'choices' => array(
			        'left' => esc_html__( 'Left', 'jevelin' ),
			        'right' => esc_html__( 'Right', 'jevelin' ),
			    ),
			),

			'icon_size' => array(
			    'type'  => 'radio',
			    'value' => '14px',
			    'label' => esc_html__('Icon Size', 'jevelin'),
			    'desc'  => esc_html__('Choose icon size', 'jevelin'),
			    'choices' => array(
			        '14px' => esc_html__( 'Small', 'jevelin' ),
			        '18px' => esc_html__( 'Medium', 'jevelin' ),
			        '22px' => esc_html__( 'Large', 'jevelin' ),
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
			                'style3' => esc_html__('Style 2', 'jevelin'),
			                'style3 sh-accordion-style3-center' => esc_html__('Style 3', 'jevelin'),
			                'style4' => esc_html__('Style 4', 'jevelin'),
							'style1 sh-accordion-style6' => esc_html__('Style 5', 'jevelin'),
							'style7' => esc_html__('Style 6', 'jevelin'),
			            ),
			            'desc'    => esc_html__('Choose main style for accordion', 'jevelin'),
			        )
			    ),
			    'choices' => array(
			        'style3' => array(
						'border_color' => array(
						    'label' => esc_html__('Border Color', 'jevelin'),
						    'desc'  => esc_html__('Select border color', 'jevelin'),
						    'type'  => 'color-picker',
							'value' => '#e5e5e5'
						),
			        ),
			        'style3 sh-accordion-style3-center' => array(
						'border_color' => array(
						    'label' => esc_html__('Border Color', 'jevelin'),
						    'desc'  => esc_html__('Select border color', 'jevelin'),
						    'type'  => 'color-picker',
							'value' => '#e5e5e5'
						),
			        ),
			        'style7' => array(
						'border_color' => array(
						    'label' => esc_html__('Border Color', 'jevelin'),
						    'desc'  => esc_html__('Select border color', 'jevelin'),
						    'type'  => 'color-picker',
							'value' => '#e5e5e5'
						),
			        ),

			    ),
			),

			'border_radius'   => array(
				'label' => esc_html__( 'Border Radius', 'jevelin' ),
				'desc'  => esc_html__( 'Enter border radius in px', 'jevelin' ),
				'type'  => 'text',
			),

			'icon_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__( 'Icon Color', 'jevelin' ),
			    'desc'  => esc_html__( 'Select icon color (not expanded)', 'jevelin' ),
			    'value' => '#505050'
			),

			'text_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__( 'Heading Text Color', 'jevelin' ),
			    'desc'  => esc_html__( 'Select heading text color', 'jevelin' ),
			    'value' => '#505050'
			),

			'background_color' => array(
			    'type'  => 'rgba-color-picker',
			    'label' => esc_html__( 'Heading Background Color', 'jevelin' ),
			    'desc'  => esc_html__( 'Select heading background color', 'jevelin' ),
			    'value'	=> '#f4f4f4'
			),

			'expanded_text_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__( 'Expanded Heading Text Color', 'jevelin'),
			    'desc'  => esc_html__( 'Select expanted heading text color', 'jevelin' ),
			    'value'	=> '#ffffff'
			),

			'expanded_background_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__( 'Expanded Heading Background Color', 'jevelin' ),
			    'desc'  => esc_html__( 'Select expanded heading background color or leave blank for theme accent color', 'jevelin' ),
			),

		),
	),

);
