<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$lightbox_options = array(
	'lightbox_transition' => array(
	    'type'  => 'radio',
	    'value' => 'elastic',
	    'label' => esc_html__('Transition', 'jevelin'),
	    'desc'  => esc_html__('Choose lightbox transition', 'jevelin'),
	    'choices' => array(
	        'none' => esc_html__( 'None', 'jevelin' ),
	        'elastic' => esc_html__( 'Elastic', 'jevelin' ),
	        'fade' => esc_html__( 'Fade', 'jevelin' ),
	        'fadeInline' => esc_html__( 'Fade Inline', 'jevelin' ),
	    ),
	),

	'lightbox_opacity' => array(
	    'type'  => 'slider',
	    'value' => 88,
	    'properties' => array(
	        'min' => 1,
	        'max' => 100,
	    ),
	    'label' => esc_html__('Background Opacity', 'jevelin'),
	    'desc'  => esc_html__('Choose lightbox background opacity', 'jevelin'),
	),

	'lightbox_window_max_width' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Window Max Width', 'jevelin'),
		'desc'  => esc_html__('Enter window max width', 'jevelin'),
	),

	'lightbox_window_max_height' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Window Max Height', 'jevelin'),
		'desc'  => esc_html__('Enter window max height', 'jevelin'),
	),

	'lightbox_window_size' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Windows Size in Percentage', 'jevelin'),
		'desc'  => esc_html__('Enter window size 10-100, default is 80', 'jevelin'),
		'value' => 80,
	),
);


$options = array(
	'lightbox' => array(
		'title'   => esc_html__( 'Lightbox', 'jevelin' ),
		'type'    => 'tab',
		'icon'	  => 'fa fa-phone',
		'options' => array(
			'lightbox-box' => array(
				'title'   => esc_html__( 'Lightbox Options', 'jevelin' ),
				'type'    => 'box',
				'options' => $lightbox_options
			),
		)
	)
);
