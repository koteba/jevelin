<?php
/*
** Set up AMP plugin
*/

if( function_exists( 'amp_init' ) && !class_exists( 'Jevelin_AMP' ) ) :
    class Jevelin_AMP {

        /*
        ** __construct
        */
		function __construct() {
            // Added custom template files
            add_filter( 'amp_post_template_file', array( $this, 'templates_files' ), 10, 3 );

            // Update options
            add_filter( 'pre_update_option_amp-options', array( $this, 'set_amp_option' ), 10, 2 );

            // Disable customizer options
            add_filter( 'amp_customizer_is_enabled', '__return_false' );
        }


        /*
        ** templates_files
        */
		function templates_files( $file, $type, $post ){
            if( jevelin_option( 'amp_mode' ) != 'all' && jevelin_option( 'amp_mode' ) != 'disabled' ) :
                $files = [
                    'footer',
                    'header-bar',
                    'html-start',
                    'meta-taxonomy',
                    'single',
                    'style',
                ];

                if( in_array( $type, $files ) ) :
                    return locate_template( 'inc/templates/amp-templates/'. esc_attr( $type ) .'.php' );
                endif;
            endif;

			return $file;
		}


        /**
		 * set_amp_option
		 */
		function set_amp_option( $value, $old_value ) {
            if( jevelin_option( 'amp_mode' ) != 'all' && jevelin_option( 'amp_mode' ) != 'disabled' ) :
    			$value['theme_support'] = 'reader';
            endif;
			return $value;
		}
    }
    new Jevelin_AMP();


    add_filter( 'amp_post_template_data', function( $data ) {
        if( jevelin_option( 'amp_mode' ) != 'all' && jevelin_option( 'amp_mode' ) != 'disabled' ) :
        	$data['amp_component_scripts'] = array_merge(
        		$data['amp_component_scripts'],
        		array(
        			'amp-iframe' => 'https://cdn.ampproject.org/v0/amp-iframe-0.1.js',
        		)
        	);
        endif;

    	return $data;
    } );
endif;
