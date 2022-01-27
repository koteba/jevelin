<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in backend
 */


/* Load only in back-end */
if( !is_admin() && ( !defined('DOING_AJAX') || !DOING_AJAX ) ) :
	return false;
endif;


// Check current framework
if( jevelin_framework() == 'redux' ) :
	return false;
endif;


$options = array(
	fw()->theme->get_options( 'general' ),
	fw()->theme->get_options( 'styling' ),
	fw()->theme->get_options( 'header' ),
	fw()->theme->get_options( 'footer' ),
	fw()->theme->get_options( 'titlebar' ),
	fw()->theme->get_options( 'social_media' ),
	fw()->theme->get_options( 'blog' ),
	fw()->theme->get_options( 'amp' ),
	fw()->theme->get_options( 'portfolio' ),
	fw()->theme->get_options( 'lightbox' ),
	fw()->theme->get_options( 'carousel' ),
	fw()->theme->get_options( 'woocommerce' ),
	fw()->theme->get_options( 'lazy_loading' ),
	fw()->theme->get_options( 'page_loader' ),
	fw()->theme->get_options( '404_page' ),
	fw()->theme->get_options( 'notice' ),
	fw()->theme->get_options( 'custom_code' ),
	fw()->theme->get_options( 'import_export' ),
);
