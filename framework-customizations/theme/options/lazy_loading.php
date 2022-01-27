<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$lazy_loading_options = array(
	'lazy_loading' => array(
	    'type'  => 'radio',
	    'value' => 'disabled',
	    'label' => esc_html__('Lazy Loading', 'jevelin'),
	    'desc'  => esc_html__('Enable or disable lazy loading for image gallery and single image elements (improves page loading time)', 'jevelin'),
	    'choices' => array(
            'disabled' => esc_html__( 'Disabled', 'jevelin' ),
            'enabled' => esc_html__( 'Enabled', 'jevelin' ),
	    ),
	    'inline' => false,
	),
);


$options = array(
	'lazy' => array(
		'title'   => esc_html__( 'Lazy Loading', 'gillion' ),
		'type'    => 'tab',
		'icon'	  => 'fa fa-phone',
		'options' => array(
			'ad-box' => array(
				'title'   => esc_html__( 'Lazy Loading', 'gillion' ),
				'type'    => 'box',
				'options' => $lazy_loading_options
			),
		)
	)
);
