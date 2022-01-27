<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$get_styles_from = 'https://snazzymaps.com/';

$map_shortcode = fw_ext('shortcodes')->get_shortcode('google_maps');
$options = array(

	'id' => array( 'type' => 'unique' ),

	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			/*'api_key_info' => array(
			    'type'  => 'html',
			    'value' => 'api info',
			    'label' => esc_html__('Google Maps API Key', 'jevelin'),
			    'desc'  => esc_html__('To use Google Maps, please add API key under "Apperance > Theme Settings > API Key"', 'jevelin'),
			    'html'  => ''
			),*/

			'data_provider' => array(
				'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
				'picker' => array(
					'population_method' => array(
						'label'   => esc_html__('Population Method', 'jevelin'),
						'desc'    => false,
						'type'    => 'select',
						'choices' => $map_shortcode->_get_picker_dropdown_choices(),
					)
				),
				'choices' => $map_shortcode->_get_picker_choices(),
				'show_borders' => false,
			),

			'map_type' => array(
				'type'  => 'select',
				'label' => esc_html__('Map Type', 'jevelin'),
				'desc'  => esc_html__('Select map type', 'jevelin'),
				'choices' => array(
					'roadmap'   => esc_html__('Roadmap', 'jevelin'),
					'terrain' => esc_html__('Terrain', 'jevelin'),
					'satellite' => esc_html__('Satellite', 'jevelin'),
					'hybrid'    => esc_html__('Hybrid', 'jevelin')
				)
			),

			'icons' => array(
			    'label' => esc_html__('Marker Image', 'jevelin'),
			    'desc'  => esc_html__('Upload marker image', 'jevelin'),
			    'type'  => 'upload',
			),

			'map_height' => array(
				'label' => esc_html__('Height', 'jevelin'),
				'desc'  => wp_kses( __( 'Enter map height (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'type'  => 'text',
				'value' => '350px'
			),

			'gmap-key' => array_merge(
				array(
					'label' => __( 'Google Maps API Key (outdated method)', 'jevelin' ),
					'desc' => sprintf(
						__( 'Create an application in %sGoogle Console%s and add the Key here.', 'jevelin' ),
						'<a href="https://console.developers.google.com/flows/enableapi?apiid=places_backend,maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true">',
						'</a>'
					),
				),
				version_compare(fw()->manifest->get_version(), '2.5.7', '>=')
				? array(
					'type' => 'gmap-key',
				)
				: array(
					'type' => 'text',
					'fw-storage' => array(
						'type'      => 'wp-option',
						'wp_option' => 'fw-option-types:gmap-key',
					),
				)
			),


		),
	),

	'other_options' => array(
		'title'   => esc_html__( 'Options', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'disable_ui' => array(
				'type'  => 'switch',
				'value' => false,
				'label' => esc_html__('Show Controls', 'jevelin'),
				'desc'  => esc_html__('Enable or disable Google Map controls', 'jevelin'),
				'left-choice' => array(
					'value' => true,
					'label' => esc_html__('No', 'jevelin'),
				),
				'right-choice' => array(
					'value' => false,
					'label' => esc_html__('Yes', 'jevelin'),
				),
			),

			'disable_scrolling' => array(
				'type'  => 'switch',
				'value' => false,
				'label' => esc_html__('Scrollwheel Zoom', 'jevelin'),
				'desc'  => esc_html__('Enable or disable scrollwheel zoom', 'jevelin'),
				'left-choice' => array(
					'value' => false,
					'label' => esc_html__('No', 'jevelin'),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__('Yes', 'jevelin'),
				),
			),

			'custom_zoom' => array(
			    'type'  => 'slider',
			    'properties' => array(
			        'min' => 1,
			        'max' => 19,
			        'step' => 1,
			    ),
			    'label' => esc_html__('Custom Zoom', 'jevelin'),
			    'desc'  => esc_html__('Select custom zoom level. Only available if one location is used', 'jevelin'),
			    'value' => 12,
			),

			'styling' => array(
			    'type'  => 'textarea',
			    'label' => esc_html__('Advanced styling', 'jevelin'),
			    'desc'  => esc_html__('Enter styling data from', 'jevelin').' <a href="'.esc_url( $get_styles_from ).'" target="_blank">'.esc_html__('Snazzy maps', 'jevelin').'</a>',
			),

		),
	),

);
