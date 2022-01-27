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
				'type'  => 'addable-option',
				'value' => array( 'Example text', 'For demo' ),
				'label' => esc_html__('Content', 'jevelin'),
				'desc'  => esc_html__('Enter content', 'jevelin'),
				'option' => array( 'value' => esc_html__('Content', 'jevelin'), 'desc'  => '', 'type' => 'text' ),
				'add-button-text' => esc_html__('Add', 'jevelin'),
				'sortable' => true,
			),

			'content_fixed'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Content fixed', 'jevelin' ),
				'desc'  => esc_html__( 'Enter fixed content before main content', 'jevelin' )
			),

			'heading' => array(
				'type'  => 'select',
				'label' => esc_html__( 'Heading Type', 'jevelin'),
				'desc'  => esc_html__( 'Select heading type', 'jevelin' ),
				'choices' => array(
					'h1' => esc_html__( 'h1', 'jevelin' ),
					'h2' => esc_html__( 'h2', 'jevelin' ),
					'h3' => esc_html__( 'h3', 'jevelin' ),
					'h4' => esc_html__( 'h4', 'jevelin' ),
					'h5' => esc_html__( 'h5', 'jevelin' ),
					'h6' => esc_html__( 'h6', 'jevelin' ),
				),
				'value'	  => 'h3',
			),

			'alignment' => array(
				'type'  => 'radio',
				'label' => esc_html__('Alignment', 'jevelin'),
				'desc'  => esc_html__( 'Choose alignment', 'jevelin' ),
				'choices' => array(
					'left' => esc_html__( 'Left', 'jevelin' ),
					'center' => esc_html__( 'Center', 'jevelin' ),
					'right' => esc_html__( 'Right', 'jevelin' ),
				),
				'value'	  => 'left',
			),

			'loop' => array(
				'type'  => 'radio',
				'label' => esc_html__('Loop', 'jevelin'),
				'desc'  => esc_html__( 'Choose if you want to enable or disable loop', 'jevelin' ),
				'choices' => array(
					'enable' => esc_html__( 'Enable', 'jevelin' ),
					'disable' => esc_html__( 'Disable', 'jevelin' ),
				),
				'value'	  => 'enable',
			),

		),
	),

	'styling' => array(
		'title'   => esc_html__( 'Styling', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'font' => array(
				'type'  => 'select',
				'label' => esc_html__('Font Famility', 'jevelin'),
				'desc'  => esc_html__( 'Select from theme options', 'jevelin' ),
				'choices' => array(
					'heading' => esc_html__( 'Heading', 'jevelin' ),
					'body' => esc_html__( 'Body', 'jevelin' ),
					'additional1' => esc_html__( 'Additional font 1', 'jevelin' ),
					'additional2' => esc_html__( 'Additional font 2', 'jevelin' ),
				),
				'value'	  => 'heading',
			),

			'size' => array(
			    'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
			    'value' => array(
			        'size' => 'default',
			        'custom' => array(
			        ),
			    ),
			    'picker' => array(
			        'size' => array(
			            'label'   => esc_html__('Font Size', 'jevelin'),
			            'desc'    => esc_html__('Choose font size', 'jevelin'),
			            'type'    => 'select',
			            'choices' => array(
			                'default' => esc_html__('Default', 'jevelin'),
			                'xs' => esc_html__('XSmall (14px)', 'jevelin'),
			                's' => esc_html__('Small (16px)', 'jevelin'),
			                'm' => esc_html__('Medium (20px)', 'jevelin'),
			                'l' => esc_html__('Large (30px)', 'jevelin'),
			                'xl' => esc_html__('XLarge (36px)', 'jevelin'),
			                'xxl' => esc_html__('XXLarge (48px)', 'jevelin'),
			                'xxxl' => esc_html__('XXXLarge (60px)', 'jevelin'),
			                'xxxxl' => esc_html__('XXXXLarge (72px)', 'jevelin'),
			                'custom' => esc_html__('Custom', 'jevelin'),
			            ),
			        )
			    ),
			    'choices' => array(
			        'custom' => array(
						'desktop_size'   => array(
							'type'  => 'text',
							'label' => esc_html__( 'Font Size (desktop)', 'jevelin' ),
							'desc'  => wp_kses( __( 'Enter font size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
							'help'  => esc_html__( 'Example: 18px;', 'jevelin' ),
						),

						'responsive_size'   => array(
							'type'  => 'text',
							'label' => esc_html__( 'Font Size (mobile and tablet)', 'jevelin' ),
							'desc'  => wp_kses( __( 'Enter font size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
							'help'  => esc_html__( 'Example: 18px;', 'jevelin' ),
						),
			        ),
			    ),
			),

			'line_height'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Line height', 'jevelin' ),
							'desc'  => wp_kses( __( 'Enter line height (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
			),

			'color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Text Color', 'jevelin'),
			    'desc'  => esc_html__('Select  color for heading', 'jevelin'),
			),

			'fixed_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Fixed Text Color', 'jevelin'),
			    'desc'  => esc_html__('Select  color for heading', 'jevelin'),
			),

			'margin'   => array(
				'label' => esc_html__( 'Margin', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter your custom margin (<b>top right bottom left</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'type'  => 'text',
				'value' => '0px 0px 15px 0px',
				'help'  => esc_html__( 'Example: 0px 0px 15px 0px', 'jevelin' ),
			),

			'custom_class'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Class Name', 'jevelin' ),
				'desc'  => esc_html__( 'Enter custom class name', 'jevelin' )
			),

		),
	),

);
