<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(

	'id' => array( 'type' => 'unique' ),

	'height' => array(
	    'type'  => 'text',
	    'value' => '40px',
	    'label' => esc_html__('Height', 'jevelin'),
	    'help'  => wp_kses( __( 'Enter height (<b>with px</b>)', 'jevelin' ), jevelin_allowed_html() ),
	),
	
	'mobile' => array(
	    'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
	    'value' => array(
	        'mobile' => 'off',
	    ),
	    'picker' => array(
			'mobile' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Custom Mobile Height', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable custom mobile height', 'jevelin' ),
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
	    'choices' => array(
	        'on' => array(
				'height' => array(
				    'type'  => 'text',
				    'value' => '20px',
				    'label' => esc_html__('Mobile Height', 'jevelin'),
	    			'help'  => wp_kses( __( 'Enter height (<b>with px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				),
	        ),
	    ),
	),

	'class'   => array(
		'type'  => 'text',
		'label' => esc_html__( 'Class Name', 'jevelin' ),
		'desc'  => esc_html__( 'Enter custom class name', 'jevelin' )
	),
);
