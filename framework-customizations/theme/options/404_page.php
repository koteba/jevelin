<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$page_404_options = array(
	'404_status' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Enable 404 page', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable 404 page', 'jevelin' ),
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

	'404_wpbakery_page' => array(
	    'type'  => 'select',
	    'value' => 'disabled',
	    'label' => esc_html__('Replace with page content', 'jevelin'),
	    'desc'  => esc_html__('Choose any WPbakery page builder page and set it to 404 page', 'jevelin'),
	    'choices' => jevelin_get_pages(),
	),

	'404_title' => array(
		'type'  => 'text',
		'value' => 'Oops, This Page Could Not Be Found!',
		'label' => esc_html__('Title', 'jevelin'),
		'desc'  => esc_html__('Enter 404 page title', 'jevelin'),
	),

	'404_text' => array(
		'type'  => 'text',
		'value' => 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.',
		'label' => esc_html__('Message', 'jevelin'),
		'desc'  => esc_html__('Enter 404 page message', 'jevelin'),
	),

	'404_button' => array(
		'type'  => 'text',
		'value' => 'Reload',
		'label' => esc_html__('Reload Button', 'jevelin'),
		'desc'  => esc_html__('Enter 404 page "Reload" button name', 'jevelin'),
	),

	'404_image' => array(
		'label' => esc_html__( 'Image', 'jevelin' ),
		'desc'  => esc_html__( 'Upload a background image for 404 page', 'jevelin' ),
		'type'  => 'upload'
	),

	'404_background' => array(
	    'type'  => 'color-picker',
	    'value' => '#3f3f3f',
	    'label' => esc_html__('Background Color', 'jevelin'),
	    'desc'  => esc_html__('Select 404 page background color', 'jevelin'),
	),
);


$options = array(
	'404-page' => array(
		'title'   => esc_html__( '404 Page', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(
			'404-page-box' => array(
				'title'   => esc_html__( '404 Page Settings', 'jevelin' ),
				'type'    => 'box',
				'options' => $page_404_options
			),
		)
	)
);
