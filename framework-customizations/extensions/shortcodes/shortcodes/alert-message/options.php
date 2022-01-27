<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }

$options = array(

	'id' => array( 'type' => 'unique' ),
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'type' => array(
				'label' => esc_html__('Type', 'jevelin'),
				'desc' => esc_html__( 'Choose message type', 'jevelin' ),
				'type'  => 'select',
				'value' => 'notice',
				'choices' => array(
					'notice' => esc_html__( 'Notice Message', 'jevelin' ),
					'success' => esc_html__( 'Success Message', 'jevelin' ),
					'warning' => esc_html__( 'Warning Message', 'jevelin' ),
					'error' => esc_html__( 'Error Message', 'jevelin' ),
					'info' => esc_html__( 'Info Message', 'jevelin' ),
				)
			),

			'title'   => array(
				'label' => esc_html__( 'Title', 'jevelin' ),
				'desc' => esc_html__( 'Enter message title', 'jevelin' ),
				'type'  => 'text',
				'value' => ''
			),

			'text'  => array(
				'label' => esc_html__( 'Content', 'jevelin' ),
				'desc' => esc_html__( 'Enter message content', 'jevelin' ),
				'type'  => 'textarea',
				'value' => ''
			),

			'icon'       => array(
				'type' => 'new-icon',
				'label' => esc_html__( 'Icon', 'jevelin' ),
				'desc' => esc_html__( 'Choose message icon', 'jevelin' ),
				'set' => 'jevelin-icons',
			),

			'alignment' => array(
				'label' => esc_html__('Alignment', 'jevelin'),
				'desc' => esc_html__( 'Choose message information alignment', 'jevelin' ),
				'type'  => 'select',
				'value' => 'left',
				'choices' => array(
					'left' => esc_html__( 'Left', 'jevelin' ),
					'center' => esc_html__( 'Center', 'jevelin' ),
				)
			),

			'close' => array(
				'type'  => 'switch',
				'label'   => esc_html__( 'Closable', 'jevelin' ),
				'desc'    => esc_html__( 'Message can be closed', 'jevelin' ),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__('Yes', 'jevelin'),
				),
				'left-choice' => array(
					'value' => false,
					'label' => esc_html__('No', 'jevelin'),
				),
				'value' => true
			),
			
		),
	),

	'styling' => array(
		'title'   => esc_html__( 'Styling', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'text_color' => array(
			    'label' => esc_html__('Text Color', 'jevelin'),
			    'desc' => esc_html__( 'Select text color', 'jevelin' ),
			    'type'  => 'color-picker',
			),

			'background_color' => array(
			    'label' => esc_html__('Background Color', 'jevelin'),
			    'desc' => esc_html__( 'Select background color', 'jevelin' ),
			    'type'  => 'color-picker',
			),

			'border_color' => array(
			    'label' => esc_html__('Border Color', 'jevelin'),
			    'desc' => esc_html__( 'Select border color', 'jevelin' ),
			    'type'  => 'rgba-color-picker',
			),

		),
	),
);
