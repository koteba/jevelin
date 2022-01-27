<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

/** @internal */
function jevelin_filter_disable_shortcodes($to_disable)
{
	$to_disable[] = 'demo_disabled';
	$to_disable[] = 'call-to-action';
	$to_disable[] = 'call_to_action';
	$to_disable[] = 'calendar';
	$to_disable[] = 'notification';
	$to_disable[] = 'special_heading';
	$to_disable[] = 'media_image';
	$to_disable[] = 'media_video';
	$to_disable[] = 'slider';
	$to_disable[] = 'map';

	return $to_disable;
}
add_filter('fw_ext_shortcodes_disable_shortcodes', 'jevelin_filter_disable_shortcodes');
