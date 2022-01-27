<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }

$manifest = array();
$manifest['id'] = 'jevelin';
$manifest['display'] = true;
$manifest['standalone'] = true;
$manifest['supported_extensions'] = array(
	'page-builder' => array(),
	'megamenu' => array(),
	'portfolio' => array(),
	'backups' => array(),
	//'seo' => array(),
	//'wp-shortcodes' => array()
);
