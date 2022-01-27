<?php
/**
 * Add VC Support
 */
add_action( 'vc_before_init', 'jevelin_vc_support' );
function jevelin_vc_support() {
    vc_set_as_theme();
}


/**
 * Supported Post Types
 */
$list = array(
    'page',
    'posts',
    'fw-portfolio',
    'shufflehound_header',
    'shufflehound_footer',
);
vc_set_default_editor_post_types( $list );


/**
 * Custom Element Dir
 */
if( function_exists( 'vc_set_shortcodes_templates_dir' ) ) :
    $dir = get_template_directory() . '/inc/elements/standard';
    vc_set_shortcodes_templates_dir( $dir );
endif;


/**
 * VC Option Picker
 */
function jevelin_vc_option_picker( $atts = '', $items = '' ) {

    if( is_array( $items ) ) :
        $return = array();
        foreach( $items as $item ) :
            if( isset( $item['name'] ) && $item['name'] ) :

                if( isset( $atts[$item['name']] ) && $atts[$item['name']] ) :
                    $return[$item['name']] = $atts[$item['name']];
                elseif( isset( $item['if'] ) && $item['if'] && isset( $item['default'] ) ) :
                    $return[$item['name']] = $item['default'];
                else :
                    $return[$item['name']] = '';
                endif;

            endif;
        endforeach;
        unset( $atts );
        unset( $items );
        return $return;
    endif;

}


/**
 * Load VC Elements
 */
if( defined( 'WPB_VC_VERSION' ) ) :
    global $pagenow;
    $pagenow = ( isset( $pagenow ) ) ? $pagenow : 'post.php';

    if( !is_admin() || ( is_admin() && in_array( $pagenow, array( 'post.php', 'post-new.php' ) ) ) || defined('DOING_AJAX') && DOING_AJAX  ) :
        add_action( 'vc_before_init', 'jevelin_vc_before_init_actions' );
        function jevelin_vc_before_init_actions() {

            $elements = array();

            /* Legacy Elements */
            $dir = trailingslashit( get_template_directory() ) . '/inc/elements/legacy/';
            $files = scandir( $dir, 1 );
            $files = array_reverse($files);
            foreach( $files as $file ) :
                if( !in_array( $file, array(".","..") ) ) :
                    if( file_exists( $dir.$file ) ) :

                        $elements[$file] = $dir.$file;

                    endif;
                endif;
            endforeach;

            /* New Elements */
            $dir = trailingslashit( get_template_directory() ) . '/inc/elements/';
            $files = scandir( $dir, 1 );
            foreach( $files as $file ) :
                if( !in_array( $file, array(".","..","standard","legacy","header-builder") ) ) :
                    if( file_exists( $dir.$file ) ) :

                        $name = $file.'newelement';
                        $elements[$name] = $dir.$file;

                    endif;
                endif;
            endforeach;

            /* Load Elements */
            ksort( $elements );
            foreach( $elements as $element ) :
                require_once( $element );
            endforeach;

        }
    endif;
endif;


/**
 * Load VC legacy
 */
if( function_exists( 'jevelin_vc_legacy' ) ) :
    jevelin_vc_legacy();
endif;


/**
 * Add VC Options
 */
require_once ( trailingslashit( get_template_directory() ) . '/inc/plugins/wpbakery/wpbakery-options.php' );


/**
 * Add VC Icons
 */
if( is_admin() && defined( 'DOING_AJAX' ) && DOING_AJAX ) :
    function jevelin_vc_icons_data() {
        require_once ( 'wpbakery-icons.php' );
        if( function_exists( 'jevelin_vc_icons' ) ) :
            return jevelin_vc_icons();
        endif;
    }
    add_filter( 'vc_iconpicker-type-jevelin_vc_icons', 'jevelin_vc_icons_data' );
endif;
