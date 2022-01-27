<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(
	'id' => array( 'type' => 'unique' ),
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'name'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'jevelin' ),
				'desc'  => esc_html__( 'Enter title', 'jevelin' )
			),

			'price'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Price', 'jevelin' ),
				'desc'  => esc_html__( 'Enter price', 'jevelin' ),
				'value' => '$ 100',
				'attr'  => array( 'style' => 'max-width: 200px;' ),
			),

			'description'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Description', 'jevelin' ),
				'desc'  => esc_html__( 'Center description', 'jevelin' )
			),

			'content' => array(
			    'type'  => 'addable-box',
			    'label' => esc_html__('Content', 'jevelin'),
			    'desc'  => esc_html__('Enter your content', 'jevelin'),
			    'box-options' => array(
			        'amount' => array( 'label' => esc_html__('Amount', 'jevelin'), 'desc' => '', 'type' => 'text' ),
			        'description' => array( 'label' => esc_html__('Description', 'jevelin'), 'desc' => '', 'type' => 'text' ),
			        'icon' => array( 'label' => esc_html__('Icon', 'jevelin'), 'desc' => '', 'type' => 'new-icon', 'set' => 'jevelin-icons', ),
			    ),
			    'template' => '<i class="{{- icon }}"></i> {{- amount }} {{- description }}',
			    'limit' => 50,
			),

			'popover'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Popover message', 'jevelin' ),
				'desc'  => esc_html__( 'Enter popover message', 'jevelin' )
			),

			'enlarge' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Enlarge', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable enlarged version', 'jevelin' ),
				'value' => false,
				'left-choice' => array(
					'value' => false,
					'label' => esc_html__('Off', 'jevelin'),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__('On', 'jevelin'),
				),
			),

			'first_symbol' => array(
				'type' => 'switch',
				'label' => esc_html__( 'First Symbol Smaller', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable first symbol smaller', 'jevelin' ),
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

	'button' => array(
		'title'   => esc_html__( 'Button', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'button_status' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Button', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable button', 'jevelin' ),
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

			'button_name'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Button Name', 'jevelin' ),
				'desc'  => esc_html__( 'Enter button name', 'jevelin' ),
				'attr'  => array( 'style' => 'max-width: 200px;' ),
			),

			'button_url'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Button Link', 'jevelin' ),
				'desc'  => esc_html__( 'Enter button link', 'jevelin' ),
				'value'  => '#',
			),

			'button_style' => array(
				'type'    => 'select',
				'label'   => esc_html__('Button Style', 'jevelin'),
				'desc'    => esc_html__( 'Select button style', 'jevelin' ),
				'value'	  => 'button2',
				'choices' => array(
					'style1' => esc_html__('Text 1 (dark)', 'jevelin'),
					'style2' => esc_html__('Text 2 (light)', 'jevelin'),
					'style3' => esc_html__('Text 3 (accent color)', 'jevelin'),
					'style5' => esc_html__('Fancy 1 (dark)', 'jevelin'),
					'style6' => esc_html__('Fancy 2 (light)', 'jevelin'),
					'style7' => esc_html__('Fancy 3 (white)', 'jevelin'),
					'style4' => esc_html__('Fancy 4 (accent color)', 'jevelin'),
					'style8' => esc_html__('Fancy Spacing 1 (dark)', 'jevelin'),
					'style9' => esc_html__('Fancy Spacing 2 (light)', 'jevelin'),
					'style10' => esc_html__('Fancy Spacing 3 (white)', 'jevelin'),
					'style11' => esc_html__('Fancy Spacing 4 (accent color)', 'jevelin'),
				),
				'value' => 'style1'
			),



			'font_size'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Font Size', 'jevelin' ),
				'desc'  => esc_html__( 'Enter font size in px', 'jevelin' ),
			),

			'button_border_width'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Button Border Width', 'jevelin' ),
				'desc'  => esc_html__( 'Enter button border width', 'jevelin' ),
				'value'  => '1px',
			),

			'button_text_color' => array(
			    'label' => esc_html__('Text Color', 'jevelin'),
			    'desc'  => esc_html__('Select text color', 'jevelin'),
			    'type'  => 'color-picker',
			   // 'value' => ''
			),

			'button_text_hover_color' => array(
			    'label' => esc_html__('Text Hover Color', 'jevelin'),
			    'desc'  => esc_html__('Select text hover color', 'jevelin'),
			    'type'  => 'color-picker',
			   /// 'value' => ''
			),

			'button_background_color' => array(
			    'label' => esc_html__('Background Color', 'jevelin'),
			    'desc'  => esc_html__('Select background colors', 'jevelin'),
			    'type'  => 'rgba-color-picker',
			   // 'value' => ''
			),

			'button_background_hover_color' => array(
			    'label' => esc_html__('Background Hover Color', 'jevelin'),
			    'desc'  => esc_html__('Select background hover color', 'jevelin'),
			    'type'  => 'rgba-color-picker',
			    //'value' => ''
			),

			'button_border_color' => array(
			    'label' => esc_html__('Border Color', 'jevelin'),
			    'desc'  => esc_html__('Select border color to add border', 'jevelin'),
			    'type'  => 'rgba-color-picker',
			   // 'value' => ''
			),

			'button_border_hover_color' => array(
			    'label' => esc_html__('Border Hover Color', 'jevelin'),
			    'desc'  => esc_html__('Select border hover color', 'jevelin'),
			    'type'  => 'rgba-color-picker',
			   // 'value' => ''
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
			    ),
			    'picker' => array(
			        'style' => array(
			            'label'   => esc_html__('Style', 'jevelin'),
			            'type'    => 'radio',
			            'choices' => array(
			                'style1' => esc_html__('Style 1', 'jevelin'),
			                'style2' => esc_html__('Style 2', 'jevelin'),
			                'style3' => esc_html__('Style 3', 'jevelin'),
			                'style4' => esc_html__('Style 4', 'jevelin'),
			            ),
			            'desc'    => esc_html__('Choose main style', 'jevelin'),
			        )
			    ),
			    'choices' => array(
			        'style1' => array(
						'icon'    => array(
							'type'  => 'new-icon',
							'label' => esc_html__('Icon', 'jevelin'),
							'desc'  => esc_html__( 'Choose icon', 'jevelin' ),
							'set' => 'jevelin-icons',
						),
			        ),
			        'style2' => array(
						'icon'    => array(
							'type'  => 'new-icon',
							'label' => esc_html__('Icon', 'jevelin'),
							'desc'  => esc_html__( 'Choose icon', 'jevelin' ),
							'set' => 'jevelin-icons',
						),
			        ),
			    ),
			),

			'image' => array(
				'label'   => esc_html__( 'Background Image', 'jevelin' ),
				'desc'    => esc_html__( 'Upload background image', 'jevelin' ),
				'type'    => 'upload',
			),

			'font' => array(
				'type'  => 'select',
				'label' => esc_html__('Title Font Famility', 'jevelin'),
				'desc'  => esc_html__( 'Select font famility from the theme options', 'jevelin' ),
				'choices' => array(
					'heading' => esc_html__( 'Heading', 'jevelin' ),
					'body' => esc_html__( 'Body', 'jevelin' ),
					'additional1' => esc_html__( 'Additional font 1', 'jevelin' ),
					'additional2' => esc_html__( 'Additional font 2', 'jevelin' ),
				),
				'value'	  => 'heading',
			),

			'content_alignment' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Alignment', 'jevelin'),
				'desc'    => esc_html__( 'Choose content laignment', 'jevelin' ),
				'value'	  => 'center',
				'choices' => array(
					'center' => esc_html__('Center', 'jevelin'),
					'left' => esc_html__('Left', 'jevelin'),
				)
			),

		),
	),


	'colors' => array(
		'title'   => esc_html__( 'Colors', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'background_text_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Heading Color', 'jevelin'),
			    'desc'  => esc_html__('Choose heading color', 'jevelin'),
			    'value' => '#ffffff'
			),

			'text_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Text Color', 'jevelin'),
			    'desc'  => esc_html__('Choose text color', 'jevelin'),
			),

			'border_color' => array(
			    'type'  => 'rgba-color-picker',
			    'label' => esc_html__('Border Color', 'jevelin'),
			    'desc'  => esc_html__('Choose border color', 'jevelin'),
			    'value' => 'rgba(0,0,0,0.08)'
			),

			'border_line' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Border Line', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable border line around the table', 'jevelin' ),
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

			'accent_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Accent Color', 'jevelin'),
			    'desc'  => esc_html__('Select accent color or leave it blank for global theme accent color', 'jevelin'),
			),

			'background_color' => array(
			    'type'  => 'rgba-color-picker',
			    'label' => esc_html__('Background Color', 'jevelin'),
			    'desc'  => esc_html__('Choose background color', 'jevelin'),
			    'value' => '#f8f8f8'
			),

		),
	),
);
