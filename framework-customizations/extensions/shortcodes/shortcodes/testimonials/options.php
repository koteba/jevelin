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
				'label'         => esc_html__( 'Testimonials', 'jevelin' ),
				'popup-title'   => esc_html__( 'Add/Edit Testimonial', 'jevelin' ),
				'desc'          => esc_html__( 'Here you can add, remove and edit your Testimonials.', 'jevelin' ),
				'type'          => 'addable-popup',
				'template'      => '{{=name}}',
				'size'			=> 'medium',
				'popup-options' => array(

					'name'   => array(
						'label' => esc_html__( 'Name', 'jevelin' ),
						'desc'  => esc_html__( 'Enter name', 'jevelin' ),
						'type'  => 'text'
					),

					'job'    => array(
						'label' => esc_html__( 'Profession', 'jevelin' ),
						'desc'  => esc_html__( 'Enter profession', 'jevelin' ),
						'type'  => 'text'
					),

					'quote'       => array(
						'label' => esc_html__( 'Quote', 'jevelin' ),
						'desc'  => esc_html__( 'Enter quote', 'jevelin' ),
						'type'  => 'textarea',
					),

					'avatar' => array(
						'label' => esc_html__( 'Avatar', 'jevelin' ),
						'desc'  => esc_html__( 'Upload avatar', 'jevelin' ),
						'type'  => 'upload',
					),

					'avatar2' => array(
						'label' => esc_html__( 'Avater (for Style 4)', 'jevelin' ),
						'desc'  => esc_html__( 'Upload avatar', 'jevelin' ),
						'type'  => 'upload',
					),

				)
			),

			'autoplay' => array(
			    'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
			    'picker' => array(
					'autoplay' => array(
						'type' => 'switch',
						'label' => esc_html__( 'Autoplay', 'jevelin' ),
						'desc' => esc_html__( 'Enable or disable autoplay', 'jevelin' ),
						'value' => 'off',
						'left-choice' => array(
							'value' => 'off',
							'label' => esc_html__('Off', 'jevelin'),
						),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__('On', 'jevelin'),
						),
					),
			    ),
			),

		),
	),

	'styling' => array(
		'title'   => esc_html__( 'Styling', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'style' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Style', 'jevelin'),
				'desc'  => esc_html__('Choose main style', 'jevelin'),
				'choices' => array(
					'style1' => esc_html__('Style 1', 'jevelin'),
					'style2' => esc_html__('Style 2', 'jevelin'),
					'style3' => esc_html__('Style 3', 'jevelin'),
					'style4' => esc_html__('Style 4', 'jevelin'),
					'style5' => esc_html__('Style 5', 'jevelin'),
					'style6' => esc_html__('Style 6', 'jevelin'),
				),
				'value'	  => 'style1',
			),

			'color_accent' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Accent Color', 'jevelin'),
			    'desc'  => esc_html__('Select accent color or leave it empty for global value', 'jevelin'),
			),

			'color_heading' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Heading Color', 'jevelin'),
			    'desc'  => esc_html__('Choose heading color', 'jevelin'),
			),

			'color_job' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Profession Color', 'jevelin'),
			    'desc'  => esc_html__('Choose profession color', 'jevelin'),
			),

			'color_text' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Text Color', 'jevelin'),
			    'desc'  => esc_html__('Choose text color', 'jevelin'),
			),

			'line_text' => array(
			    'type'  => 'rgba-color-picker',
			    'label' => esc_html__('Line Color', 'jevelin'),
			    'desc'  => esc_html__('Choose line color. Only for Style 3 and Style 4', 'jevelin'),
			    'value' => ''
			),

			'color_switch' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Switch Color', 'jevelin'),
			    'desc'  => esc_html__('Choose switch color', 'jevelin'),
			),

			'color_quote' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Quote Color', 'jevelin'),
			    'desc'  => esc_html__('Choose quote color', 'jevelin'),
			),

			'quote' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Quote Icon', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable quote icon', 'jevelin' ),
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
		),
	),

	'typography' => array(
		'title'   => esc_html__( 'Typography', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'description_styles' => array(
			    'type'  => 'checkboxes',
			    'label' => esc_html__('Description Styles', 'jevelin'),
			    'desc'  => esc_html__('Select font styles you want to apply for description text', 'jevelin'),
			    'choices' => array(
					'regular' => esc_html__('Regular', 'jevelin'),
			        'bold' => esc_html__('Bold', 'jevelin'),
			        'italic' => esc_html__('Italic', 'jevelin'),
			        'underline' => esc_html__('Underline', 'jevelin'),
			    ),
			),

			'description_size'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Description Size', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter description size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'help'  => esc_html__( 'Example: 5px', 'jevelin' ),
			),

		),
	),

);
