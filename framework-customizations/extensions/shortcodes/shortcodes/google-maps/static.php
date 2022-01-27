<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

$shortcodes_extension = fw_ext('shortcodes');

{
	$query_params = array(
		'language' => substr( get_locale(), 0, 2 ),
		'libraries' => 'places',
	);

	/**
	 * Check if Map option type has the `api_key` method, as user may have a older Unyson version.
	 * TODO: Remove in next versions and provide a better solution
	 */
	if( function_exists( 'shufflehound_google_maps_api_key' ) ) :
		$query_params['key'] = shufflehound_google_maps_api_key();
	elseif( jevelin_option('api_key') ) :
		$query_params['key'] = jevelin_option('api_key');
	elseif (method_exists('FW_Option_Type_Map', 'api_key')) :
		$query_params['key'] = FW_Option_Type_Map::api_key();
	endif;

	wp_enqueue_script(
		'google-maps-api-v3',
		'https://maps.googleapis.com/maps/api/js?'. http_build_query($query_params),
		array(),
		true
	);
}

wp_enqueue_style(
	'fw-shortcode-map',
	fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/google-maps/static/css/styles.css')
);

wp_enqueue_script(
	'fw-shortcode-map-script',
	fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/google-maps/static/js/scripts.js'),
	array('jquery', 'underscore', 'google-maps-api-v3'),
	fw()->manifest->get_version(),
	true
);
