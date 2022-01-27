<?php
if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Helper functions
 */



 /**
 * Back to top
 */
add_action('wp_footer', 'jevelin_footer_backtotop'); 
function jevelin_footer_backtotop() { 
    if( jevelin_post_option( get_the_ID(), 'back_to_top' ) != 'none' ) :

		/* Inlcude back to top button HTML */
		get_template_part('inc/templates/back_to_top' );

	endif;
}




/**
* Jevelin Style
*/
if( !function_exists( 'jevelin_style' ) ) :
    function jevelin_style() {
        $style = jevelin_option( 'blog_style', 'style1' );
        $style = str_replace( 'style', '', $style );
        return intval( $style );
    }
endif;

if( !function_exists( 'is_jevelin_style' ) ) :
    function is_jevelin_style( $style ) {
        if( jevelin_style() == $style ) :
            return true;
        endif;
    }
endif;




/*
** WooCommerce Login Forms
*/
add_action( 'woocommerce_before_customer_login_form', 'jevelin_woocommerce_before_login' );
add_action( 'woocommerce_before_lost_password_form', 'jevelin_woocommerce_before_login' );
add_action( 'woocommerce_before_reset_password_form', 'jevelin_woocommerce_before_login' );
function jevelin_woocommerce_before_login() {
    echo '<div id="sh-woocomerce-login-form">';
}

add_action( 'woocommerce_after_customer_login_form', 'jevelin_woocommerce_after_login' );
add_action( 'woocommerce_after_lost_password_form', 'jevelin_woocommerce_after_login' );
add_action( 'woocommerce_after_reset_password_form', 'jevelin_woocommerce_after_login' );
function jevelin_woocommerce_after_login() {
    echo '</div>';
}






/**
* Fix Unyson Portfolio Categories Not Showing
*/
if( !function_exists( 'jevelin_is_wpbakery_frontend_disabled' ) ) :
    function jevelin_is_wpbakery_frontend_disabled() {
        return function_exists( 'vc_is_inline' ) && vc_is_inline() ? false : true;
    }
endif;


/**
* Fix Unyson Portfolio Categories Not Showing
*/
if( !function_exists( 'jevelin_fix_unyson_portfolio_categories_in_block_editor' ) ) :
   function jevelin_fix_unyson_portfolio_categories_in_block_editor() {
       $args = get_taxonomy( 'fw-portfolio-category' );
       if( is_object( $args ) ) :
           $args->show_in_rest = true;
       endif;
       register_taxonomy( 'fw-portfolio-category', 'fw-portfolio', (array) $args );
   }
   add_action( 'rest_api_init', 'jevelin_fix_unyson_portfolio_categories_in_block_editor', 11 );
endif;


 /**
 * Element Inline Option
 */
if ( ! function_exists( 'jevelin_element_lazy_option' ) ) :
    function jevelin_element_lazy_option( $atts ) {
        if( !isset( $atts['lazy'] ) || ( isset( $atts['lazy'] ) && $atts['lazy'] == 'default' ) ) :
        	$lazy = ( jevelin_option('lazy_loading') == 'enabled' ) ? 1 : 0;
        else :
        	$lazy = ( isset( $atts['lazy'] ) && $atts['lazy'] == 'enabled' ) ? 1 : 0;
        endif;

        return $lazy;
    }
endif;


/**
* Element Inline Option
*/
if ( ! function_exists( 'jevelin_element_inline_option' ) ) :
    function jevelin_element_inline_option() {
        return array(
            'label' => esc_html__('Inline Element', 'jevelin'),
            'desc'  => esc_html__('Enable for multiple elements to add them in one line Doesnt work in WPbakery page builder front-end mode', 'jevelin'),
            'type'  => 'radio',
            'value' => 'disabled',
            'choices' => array(
                'disabled' => esc_html__( 'Disabled', 'jevelin' ),
                'enabled' => esc_html__( 'Enabled', 'jevelin' ),
            )
        );
    }
endif;


/**
* Element Margin Option
*/
if ( ! function_exists( 'jevelin_element_margin_option' ) ) :
    function jevelin_element_margin_option() {
        return array(
            'label' => esc_html__( 'Margin', 'jevelin' ),
            'desc'  => wp_kses( __( 'Enter your custom margin (<b>top right bottom left</b>)', 'jevelin' ), jevelin_allowed_html() ),
            'type'  => 'text',
            'value' => '0px 0px 15px 0px',
            'help'  => esc_html__( 'Example: 0px 0px 15px 0px', 'jevelin' ),
        );
    }
endif;



/**
* Element Margin Option
*/
if ( ! function_exists( 'jevelin_wpcf7_form_elements' ) ) :
    add_filter( 'wpcf7_form_elements', 'jevelin_wpcf7_form_elements' );

    function jevelin_wpcf7_form_elements( $form ) {
        return '<div class="sh-cf7-body">'.$form.'</div>';
    }
endif;



/**
 * Check If Gutenberg is being used
*/
if ( ! function_exists( 'jevelin_is_gutenberg_page' ) ) :
    function jevelin_is_gutenberg_page() {
        if ( function_exists( 'is_gutenberg_page' ) && is_gutenberg_page() ) {
            // The Gutenberg plugin is on.
            return true;
        }

        if( function_exists( 'get_current_screen' ) ) :
            $current_screen = get_current_screen();
            if ( method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor() ) :
                // Gutenberg page on 5+.
                return true;
            endif;
        endif;

        return false;
    }
endif;


/**
* If is URL
*/
function jevelin_is_url( $url = '' ) {
    if( $url && !is_array( $url ) ) :
        if( esc_url_raw( $url ) === $url ) :
            return true;
        endif;
    endif;

    return false;
}


/**
 * Load header items
 */
function jevelin_get_headers() {
    $header_layout_choices = array(
    	'1' => esc_html__( 'Header 1', 'jevelin' ),
    	'2' => esc_html__( 'Header 2', 'jevelin' ),
    	'3' => esc_html__( 'Header 3', 'jevelin' ),
    	'4' => esc_html__( 'Header 4', 'jevelin' ),
    	'5' => esc_html__( 'Header 5', 'jevelin' ),
    	'6' => esc_html__( 'Header 6 (side navigation)', 'jevelin' ),
        '61' => esc_html__( 'Header 6 Clean (side navigation)', 'jevelin' ),
    	'7' => esc_html__( 'Header 7 (side navigation)', 'jevelin' ),
    	'8' => esc_html__( 'Header 8', 'jevelin' ),
    	'9' => esc_html__( 'Header 9', 'jevelin' ),
    	'10' => esc_html__( 'Header 10', 'jevelin' ),
    	'left-1' => esc_html__( 'Left Header 11', 'jevelin' ),
    	'left-2' => esc_html__( 'Left Header 12', 'jevelin' ),
    );

    global $post;
    $post2 = $post;
    $headers = new WP_Query( array(
        'post_type' => 'shufflehound_header',
        'post_status' => 'publish',
        'posts_per_page' => 20
    ));
    if( $headers->have_posts() ) :
        while( $headers->have_posts() ) : $headers->the_post();

		    $header_id = 'header-'.get_the_ID();
            $header_layout_choices[ $header_id ] = html_entity_decode( get_the_title() ).' (from WPbakery page builder)';

        endwhile;
    endif;

    wp_reset_postdata();
    $post = $post2;
    return $header_layout_choices;
}


/**
 * Load titlebar items
 */
function jevelin_get_titlebars( $default = 0 ) {
    if( $default ) :
        $layout_choices = array(
            'default' => esc_html__( 'Default (from theme settings)', 'jevelin' ),
            'side' => esc_html__( 'Content in Sides', 'jevelin' ),
            'side-reversed' => esc_html__( 'Content in Sides (reversed)', 'jevelin' ),
            'center' => esc_html__( 'Center', 'jevelin' ),
        );
    else :
        $layout_choices = array(
            'side' => esc_html__( 'Content in Sides', 'jevelin' ),
            'side-reversed' => esc_html__( 'Content in Sides (reversed)', 'jevelin' ),
            'center' => esc_html__( 'Center', 'jevelin' ),
        );
    endif;

    global $post;
    $post2 = $post;
    $titlebars = new WP_Query( array(
        'post_type' => 'shufflehound_titleb',
        'post_status' => 'publish',
        'posts_per_page' => 20
    ));
    if( $titlebars->have_posts() ) :
        while( $titlebars->have_posts() ) : $titlebars->the_post();

		    $titlebar_id = 'titlebar-'.get_the_ID();
            $layout_choices[ $titlebar_id ] = html_entity_decode( get_the_title() ).' (from WPbakery page builder)';

        endwhile;
    endif;

    wp_reset_postdata();
    $post = $post2;
    return $layout_choices;
}


/**
 * Load footer items
 */
function jevelin_get_footers() {
    $layout_choices = array(
    	'default' => esc_html__( 'Default (from theme settings)', 'jevelin' ),
    );

    global $post;
    $post2 = $post;
    $footers = new WP_Query( array(
        'post_type' => 'shufflehound_footer',
        'post_status' => 'publish',
        'posts_per_page' => 20
    ));
    if( $footers->have_posts() ) :
        while( $footers->have_posts() ) : $footers->the_post();

    		$footer_id = get_the_ID();
            $layout_choices[ $footer_id ] = get_the_title().' (from WPbakery page builder)';

        endwhile;
    endif;

    wp_reset_postdata();
    $post = $post2;
    return $layout_choices;
}


/**
 * Load page items
 */
function jevelin_get_pages() {
    $layout_choices = array(
    	'disabled' => esc_html__( 'Disabled', 'jevelin' ),
    );

    global $post;
    $post2 = $post;
    $footers = new WP_Query( array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'posts_per_page' => -1
    ));
    if( $footers->have_posts() ) :
        while( $footers->have_posts() ) : $footers->the_post();

    		$footer_id = get_the_ID();
            $layout_choices[ $footer_id ] = get_the_title();

        endwhile;
    endif;

    wp_reset_postdata();
    $post = $post2;
    return $layout_choices;
}



 /**
  * Create Custom Random Function
  */
 function jevelin_rand( $length = 10 ) {
     return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
 }


 /**
  * Load Instagram Widget template
  */
add_filter( 'wpiw_template_part', 'jevelin_instagram_class' );
function jevelin_instagram_class( $array ) {
    return 'inc/templates/instagram-widget.php';
}


/* Portfolio Comments Support */
function jevelin_portfolio_comments_support() {
    add_post_type_support( 'fw-portfolio', array( 'comments' ) );
}
add_action( 'init', 'jevelin_portfolio_comments_support' );


 /**
  * Render template
  */
if ( ! function_exists( 'jevelin_link_it' ) ) :
    function jevelin_link_it($text) {
        $text = preg_replace("/(^|[\n ])([\w]*?)([\w]*?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a href=\"$3\" target=\"_blank\" >$3</a>", $text);
        $text = preg_replace("/(^|[\n ])([\w]*?)((www)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a href=\"http://$3\" target=\"_blank\" >$3</a>", $text);
        $text = preg_replace("/(^|[\n ])([\w]*?)((ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a href=\"ftp://$3\" >$3</a>", $text);
        $text = preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a href=\"mailto:$2@$3\">$2@$3</a>", $text);
        return ( $text );
    }
endif;


/**
 * Render template
 */
if ( ! function_exists( 'jevelin_render_css' ) ) :
    function jevelin_render_css() {
        ob_start();
        get_template_part( 'inc/templates/render-css' );
        $css = ob_get_clean();
        return $css;
    }
endif;


/**
 * Render template - mini
 */
function jevelin_render_css_mini() {
    ob_start();
    get_template_part( 'inc/templates/render-css-mini' );
    return ob_get_clean();
}


/**
 * Get page ID
 */
if ( ! function_exists( 'jevelin_page_id' ) ) :
function jevelin_page_id() {

    if( function_exists( 'is_shop' ) && is_shop() == true ) {
        $post_id = get_option( 'woocommerce_shop_page_id' );
    } else if( is_search() || is_archive() || is_404() ) {
        $post_id = false;
    } else if (in_the_loop()) {
        $post_id = get_the_ID();
    } else {
        global $wp_query;
        $post_id = $wp_query->get_queried_object_id();
    }

    return $post_id;

}
endif;


/* Load image ratio - By Post ID */
if ( ! function_exists( 'jevelin_image_ratio' ) ) :
	function jevelin_image_ratio( $id = '', $size = '', $ratio = '') {
        $load_ratio = '';
        if( $ratio == '') :
            $load_ratio = ' sh-ratio-container-square';
        endif;

        return '
        <div class="sh-ratio">
            <div class="sh-ratio-container'.$load_ratio.'">
                <div class="sh-ratio-content" style="background-image: url('.jevelin_get_small_thumb( get_post_thumbnail_id( $id ), $size ).');"></div>
            </div>
        </div>';
	}
endif;


/* Load image ratio - By Thumbnail ID */
if ( ! function_exists( 'jevelin_image_ratio_by_thumbnail' ) ) :
	function jevelin_image_ratio_by_thumbnail( $id = '', $size = '', $ratio = '') {
        $load_ratio = '';
        if( $ratio == '') :
            $load_ratio = ' sh-ratio-container-square';
        elseif( $ratio == 'landscape') :
            $load_ratio = '';
        endif;

        return '
        <div class="sh-ratio">
            <div class="sh-ratio-container'.$load_ratio.'">
                <div class="sh-ratio-content" style="background-image: url('. jevelin_get_small_thumb( $id, $size ) .');"></div>
            </div>
        </div>';
	}
endif;


/**
 * Get post options
 */
if ( ! function_exists( 'jevelin_post_option' ) ) :
    function jevelin_post_option( $id = NULL, $name = NULL, $default = NULL) {
        if( jevelin_framework() == 'redux' && $id > 0 && $name ) :

            if( empty( $id ) ) :
                $id = get_queried_object_id();
            endif;

            // Get value
            GLOBAL $jevelin_post_options;
            if( empty( $jevelin_post_options[$id] ) ) :
                $meta_values = get_post_meta( $id );
                $jevelin_post_options[$id] = $meta_values;
            endif;

            if( !empty( $jevelin_post_options[$id][$name][0] ) ) :
                return maybe_unserialize( $jevelin_post_options[$id][$name][0] );
            endif;

            // When default value, allow blank text value
            if( isset( $jevelin_post_options[$id][$name][0] ) && in_array( $name, [ 'header_style_description' ] ) ) :
                return '';
            endif;

            // Get default field value
            GLOBAL $jevelin_post_fields;
            $post_type = get_post_type( $id );
            if( !isset( $jevelin_post_fields[$post_type] ) ) :
                $jevelin_post_fields[$post_type] = Shufflehound_Metaboxes::save_fields( $post_type );
            endif;

            if( !empty( $jevelin_post_fields[$post_type][$name] ) ) :
                return $jevelin_post_fields[$post_type][$name];
            endif;

        elseif( jevelin_framework() == 'unyson' && function_exists( 'fw_get_db_post_option' ) ) :
            return fw_get_db_post_option( $id, $name, $default );
        endif;

        if( $default ) :
            return $default;
        endif;
    }
endif;


/**
 * Get theme options
 */
if( !function_exists( 'jevelin_option' ) ) :
    if( function_exists( 'jevelin_framework' ) && jevelin_framework() == 'redux' ) :

        function jevelin_option( $id = NULL, $default = NULL) {
            if( $id ) :
                GLOBAL $jevelin_options;
                if( isset( $jevelin_options[$id] ) ) :
                    if( isset( $jevelin_options[$id]['rgba'] ) ) :
                        return $jevelin_options[$id]['rgba'];
                    elseif( isset( $jevelin_options[$id]['font-family'] ) ) :
                        return $jevelin_options[$id];
                    elseif( isset( $jevelin_options[$id]['color'] ) ) :
                        return $jevelin_options[$id]['color'];
                    else :
                        return $jevelin_options[$id];
                    endif;
                endif;
            endif;

            if( $default ) :
                return $default;
            endif;
        }

    else :

        if ( is_customize_preview() ) {

        	function jevelin_option( $id = NULL, $default = NULL) {

                if( function_exists('fw_get_db_settings_option') ) :

                    global $wp_customize;
                    $customizer_option = fw_get_db_customizer_option($id);
                    return fw_get_db_customizer_option($id);

                elseif( !empty( $default ) ) :
                    return $default;
                else :
                    return false;
                endif;

        	}

        } else {

            function jevelin_option( $id = NULL, $default = NULL) {

                if( $id == 'lazy' && function_exists('shufflehound_lazy_loading_enabled_all_sites') ) :
                    return 1;
                endif;

                if( function_exists('fw_get_db_settings_option') ) :

                    if( in_array( $id, array( 'accent_color', 'accent_hover_color', 'header_nav_active_color', 'footer_hover_color') ) ) :

                        if( $id == 'accent_color' && jevelin_post_option( jevelin_page_id(), 'accent_color' ) ) :
                            return jevelin_post_option( jevelin_page_id(), 'accent_color' );
                        elseif( $id == 'accent_hover_color' && jevelin_post_option( jevelin_page_id(), 'accent_hover_color' ) ) :
                            return jevelin_post_option( jevelin_page_id(), 'accent_hover_color' );
                        elseif( $id == 'header_nav_active_color' && jevelin_post_option( jevelin_page_id(), 'header_nav_active_color' ) ) :
                            return jevelin_post_option( jevelin_page_id(), 'header_nav_active_color' );
                        elseif( $id == 'footer_hover_color' && jevelin_post_option( jevelin_page_id(), 'footer_hover_color' ) ) :
                            return jevelin_post_option( jevelin_page_id(), 'footer_hover_color' );
                        else :
                            return fw_get_db_settings_option($id);
                        endif;

                    else :

                        $option = fw_get_db_settings_option( $id );

                        if( !empty( $option ) || $option === false ) :
                            return $option;
                        elseif( !empty( $default ) || $default === false ) :
                            return $default;
                        else :
                            return false;
                        endif;

                    endif;

                elseif( !empty( $default ) ) :
                    return $default;
                else :
                    return false;
                endif;

            }

        }
    endif;
endif;


/**
 * Get theme options value
 */
if ( ! function_exists( 'jevelin_option_value' ) ) :
    function jevelin_option_value( $id = NULL, $key = NULL ) {

        if( $id && $key && jevelin_framework_active() ) :
            $val = jevelin_option( $id );

            // Redux Framework compatibility
            if( function_exists( 'jevelin_framework' ) && jevelin_framework() == 'redux' ) :
                if( !empty( $val['font-family'] ) ) :
                    $val['family'] = $val['font-family'];
                endif;
                if( !empty( $option['font-weight'] ) ) :
                    $val['variation'] = $val['font-weight'];
                endif;
            endif;

            if( isset( $val[$key] ) ) :
                return esc_attr( $val[$key] );
            endif;
        else :
            return false;
        endif;

    }
endif;


/**
 * Get image by url by ID
 */
if ( !function_exists( 'jevelin_image_url_by_id' ) ) :
    function jevelin_image_url_by_id( $id, $size = 'large' ) {
        $thumb = wp_get_attachment_image_src( $id, $size );
        if( !empty( $thumb['0'] ) ) :
            return esc_url( $thumb['0'] );
        endif;
    }
endif;


/**
 * Get theme options image
 */
if ( ! function_exists( 'jevelin_option_image' ) ) :
    function jevelin_option_image( $id = NULL ) {

        if( function_exists('jevelin_option') ) :
            $url = jevelin_option( $id );
            if( isset( $url['url'] ) ) :
                return esc_url( $url['url'] );
            endif;
        elseif( function_exists('fw_get_db_settings_option') ) :
            $url = fw_get_db_settings_option( $id );
            if( isset( $url['url'] ) ) :
                return esc_url( $url['url'] );
            endif;
        else :
            return false;
        endif;

    }
endif;


/**
 * Get theme options thumbnail
 */
if ( ! function_exists( 'jevelin_get_thumb' ) ) :
    function jevelin_get_thumb( $id, $size = 'large' ) {
        if( isset( $id ) && $id > 0) :

            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), $size );
            if( isset($thumb['0']) && $thumb['0'] ) :
                return esc_url( $thumb['0'] );
            endif;

        else :
            return false;
        endif;
    }
endif;


/**
 * Get theme options thumbnail
 */
if ( ! function_exists( 'jevelin_get_small_thumb' ) ) :
    function jevelin_get_small_thumb( $id, $size = 'post-thumbnail' ) {
        if( isset( $id ) && $id > 0) :

            $thumb = wp_get_attachment_image_src( $id, $size );
            if( isset($thumb['0']) && $thumb['0'] ) :
                return esc_url( $thumb['0'] );
            endif;

        else :
            return false;
        endif;
    }
endif;


/**
 * Get option image
 */
if ( ! function_exists( 'jevelin_get_image' ) ) :
    function jevelin_get_image( $id = NULL ) {

        if( isset( $id['url'] ) ) :
            return esc_url( $id['url'] );
        elseif( isset( $id[0] ) ) :
            return esc_url( $id[0] );
        else :
            return false;
        endif;

    }
endif;


/**
 * Get option image alt
 */
if ( ! function_exists( 'jevelin_get_image_alt' ) ) :
    function jevelin_get_image_alt( $id = NULL ) {
        if( is_object( $id ) || is_array( $id ) ) :

            if( isset( $id['attachment_id'] ) ) :
                $post = get_post( $id['attachment_id'] );
                if( is_object( $post ) ) :
                    if( $post->post_excerpt ) :
                        return $post->post_excerpt;
                    else :
                        return $post->post_title;
                    endif;
                endif;
            else :
                return false;
            endif;

        elseif( $id > 0 ) :

            $post = get_post( $id );
            if( is_object( $post ) ) :
                if( $post->post_excerpt ) :
                    return $post->post_excerpt;
                else :
                    return $post->post_title;
                endif;
            endif;

        endif;

    }
endif;


/**
 * Get option image size
 */
if ( ! function_exists( 'jevelin_get_image_size' ) ) :
    function jevelin_get_image_size( $item, $size = 'large' ) {
        if( !empty( $item['attachment_id'] ) || !empty( $item['id'] ) ) :

            if( !empty( $item['attachment_id'] ) ) : 
                $id = $item['attachment_id'];
                $url = $item['url'];
            else :
                $id = $item['id'];
                $url = '';
            endif;

            $thumb = wp_get_attachment_image_src( $id, $size );
            if( !empty( $thumb['0'] ) ) :
                return esc_url( $thumb['0'] );
            else :
                return $url;
            endif;

        else :
            return false;
        endif;
    }
endif;


/**
 * Get picker value
 */
if ( ! function_exists( 'jevelin_get_picker_value' ) ) :
    function jevelin_get_picker_value( $atts = NULL, $var = NULL ) {

        if( !is_null($atts) && isset($atts[key($atts)]) ) :
            return $atts[key($atts)];
        else :
            return $var;
        endif;

    }
endif;


/**
 * Get picker
 */
if ( ! function_exists( 'jevelin_get_picker' ) ) :
    function jevelin_get_picker( $atts = NULL ) {

        if( is_array($atts) && $atts != NULL ) :
            $key = key($atts);
            if( isset($atts[$atts[$key]]) ) :
                return $atts[$atts[key($atts)]];
            else :
                return false;
            endif;
        endif;
    }
endif;


/**
 * Get font option
 */
 if ( ! function_exists( 'jevelin_font_option' ) ) :
     function jevelin_font_option( $id ) {
         $option = jevelin_option( $id );
         $o = '';

         // Redux Framework compatibility
         if( function_exists( 'jevelin_framework' ) && jevelin_framework() == 'redux' ) :
             if( !empty( $option['font-size'] ) ) :
                 $option['size'] = $option['font-size'];
             endif;
             if( !empty( $option['font-family'] ) ) :
                 $option['family'] = $option['font-family'];
             endif;
             if( !empty( $option['font-weight'] ) ) :
                 $option['variation'] = $option['font-weight'];
             endif;
         endif;

         if( !empty( $option['family'] ) ) :
             $o.= 'font-family: "'.$option['family'].'"; ';
         endif;

         if( !empty( $option['color'] ) ) :
             $o.= 'color: '.$option['color'].'; ';
         endif;

         if( !empty( $option['letter-spacing'] ) && $option['letter-spacing'] > 0 ) :
             $o.= 'letter-spacing: '.$option['letter-spacing'].'px; ';
         endif;

         if( !empty( $option['variation'] ) && $option['variation'] != '100' ) :
             if( $option['variation'] == 'regular' ) :
                 $o.= 'font-weight: 400; ';
             else :
                 $o.= 'font-weight: '.$option['variation'].'; ';
             endif;
         endif;

         if( !empty( $option['size'] ) ) :
             $o.= 'font-size: '.$option['size'].'px; ';
         endif;

         if( !empty( $option['line-height'] ) && $option['line-height'] > 0 ) :
             $o.= 'line-height: '.$option['line-height'].'px; ';
         endif;


         // Fix double PX
         $o = str_replace( 'pxpx', 'px', $o );

         return $o;

     }
 endif;


/**
 * Get font
 */
if ( ! function_exists( 'jevelin_get_font' ) ) :
    function jevelin_get_font( $option ) {
        $o = '';

        if( isset($option['family']) && $option['family'] ) :
            $o.= 'font-family: "'.$option['family'].'"; ';
        endif;

        if( isset($option['color']) && $option['color'] ) :
            $o.= 'color: '.$option['color'].'; ';
        endif;

        if( isset($option['letter-spacing']) && $option['letter-spacing'] ) :
            $o.= 'letter-spacing: '.$option['letter-spacing'].'px; ';
        endif;

        if( isset($option['variation']) && $option['variation'] && $option['variation'] != '100' ) :
            if( $option['variation'] == 'regular' ) :
                $o.= 'font-weight: 400; ';
            else :
                $o.= 'font-weight: '.$option['variation'].'; ';
            endif;
        /*elseif( isset($option['weight']) && $option['weight'] ) :
            $o.= 'font-weight: '.$option['weight'].'; ';*/
        endif;

        if( isset($option['size']) && $option['size'] ) :
            $o.= 'font-size: '.$option['size'].'px; ';
        endif;

        if( isset($option['line-height']) && $option['line-height'] ) :
            $o.= 'line-height: '.$option['line-height'].'px; ';
        endif;

        return $o;

    }
endif;


/**
 * Minify output
 */
if ( ! function_exists( 'jevelin_is_vc_front' ) ) :
    function jevelin_is_vc_front(){
        return ( isset( $_GET['vc_editable'] ) && $_GET['vc_editable'] == true ) ? true : false;
    }
endif;


/**
 * Minify output
 */
if ( ! function_exists( 'jevelin_echo_style' ) ) :
    function jevelin_echo_style( $css ){
        if( $css ) : ?>
            <style type="text/css">
                <?php echo jevelin_compress( $css ); ?>
            </style>
        <?php endif;
    }
endif;

/**
 * Minify output
 */
if ( ! function_exists( 'jevelin_compress' ) ) :
	function jevelin_compress($buf){
        return preg_replace(array('/<!--(.*)-->/Uis',"/[[:blank:]]+/"),array('',' '),str_replace(array("\n","\r","\t"),'',$buf));
	}
endif;


/**
 * Count sidebar items
 */
if ( ! function_exists( 'jevelin_count_sidebar' ) ) :
	function jevelin_count_sidebar( $sidebar_id ) {
	    $the_sidebars  = wp_get_sidebars_widgets();

	    if( isset( $the_sidebars [$sidebar_id] ) && count( $the_sidebars[$sidebar_id] ) > 0 ) :
	        return count( $the_sidebars[$sidebar_id] );
	    endif;
	}
endif;


/**
 * Remove tags
 */
if ( ! function_exists( 'jevelin_remove_tag' ) ) :
	function jevelin_remove_tag( $excerpt ) {
        $o = str_replace( array("<p>", "</p>"), "", $excerpt );
        echo wp_kses_post( $o );
	}
endif;


/**
 * Remove p tags
 */
if ( ! function_exists( 'jevelin_remove_p' ) ) :
	function jevelin_remove_p( $text ) {
        $text = preg_replace('/\<[\/]{0,1}p[^\>]*\>/i', '', $text);
        return $text;
	}
endif;


/**
 * Replace p with span
 */
if ( ! function_exists( 'jevelin_replace_p' ) ) :
    function jevelin_replace_p( $text ) {
        $text = str_replace( '<p', '<span', $text );
        $text = str_replace( '</p','</span',$text);
        return $text;
    }
endif;


/**
 * Get page content structure (not wrapper structure)
 */
if ( ! function_exists( 'jevelin_page_layout' ) ) :
    function jevelin_page_layout( $loop = 0 ) {
        $page_layout1 = esc_attr( jevelin_post_option( jevelin_page_id( $loop ), 'page_layout', 'global_default' ) );
        $page_layout2 = esc_attr( jevelin_option( 'global_page_layout', 'default' ) );
        return ( isset($page_layout1) && $page_layout1 && $page_layout1 != 'global_default' ) ? $page_layout1 : ( ( isset($page_layout2) && $page_layout2 ) ? $page_layout2 : 'default' );
    }
endif;


/**
 * Get blog page layout
 */
if ( ! function_exists( 'jevelin_blog_page_layout' ) ) :
    function jevelin_blog_page_layout( $loop = 0 ) {
        $page_layout1 = esc_attr( jevelin_post_option( jevelin_page_id( $loop ), 'page_layout', 'global_default' ) );
        $page_layout2 = esc_attr( jevelin_option( 'post_layout', 'default' ) );
        return ( isset($page_layout1) && $page_layout1 && $page_layout1 != 'global_default' ) ? $page_layout1 : ( ( isset($page_layout2) && $page_layout2 ) ? $page_layout2 : 'default' );
    }
endif;



/**
 * Get header layout
 */
if ( ! function_exists( 'jevelin_header_layout' ) ) :
    function jevelin_header_layout() {
        $header_layout1 = esc_attr( jevelin_post_option( jevelin_page_id(), 'header_layout', '1' ) );
        $header_layout2 = esc_attr( jevelin_option( 'header_layout', '1' ) );

        if( ( !is_numeric( $header_layout1 ) && !in_array( $header_layout1, [ 'left-1', 'left-2' ] ) ) && $header_layout1 != 'default' ) :
            $header_layout1 = 1;
        endif;

        if( !is_numeric( $header_layout2 ) && !in_array( $header_layout2, [ 'left-1', 'left-2' ] ) ) :
            $header_layout2 = 1;
        endif;

        if( !is_search() && !is_singular('product') && !is_archive() && !is_home() && !is_404() ) :
            return ( !empty( $header_layout1 ) && $header_layout1 != 'default' ) ? $header_layout1 : ( ( !empty( $header_layout2 ) ) ? $header_layout2 : '1' );
        else :
            return $header_layout2;
        endif;
    }
endif;


/**
 * Get header style
 */
if ( ! function_exists( 'jevelin_header_style' ) ) :
    function jevelin_header_style() {
        if( jevelin_framework() == 'redux' ) :
    		return jevelin_post_option( jevelin_page_id(), 'header_style' );
    	else :
    		$titlebar_style_val = jevelin_post_option( jevelin_page_id(), 'header_style' );
    		return ( isset( $titlebar_style_val['header_style'] ) ) ? esc_attr($titlebar_style_val['header_style']) : 'default';
    	endif;
    }
endif;


/**
 * Get desktop header style
 */
if ( ! function_exists( 'jevelin_header_desktop_style' ) ) :
    function jevelin_header_desktop_style() {
        $get_header_style = jevelin_header_style();
        if( $get_header_style == 'light' || $get_header_style == 'light_mobile_off' ) :
            return ' primary-desktop-light';
        elseif( $get_header_style == 'light light_noborder' ) :
            return ' primary-desktop-light primary-desktop-light-noborder';
        else :
            return '';
        endif;
    }
endif;


/**
 * Get mobile header style
 */
if ( ! function_exists( 'jevelin_header_mobile_style' ) ) :
    function jevelin_header_mobile_style() {
        $get_header_style = jevelin_header_style();
        if( $get_header_style == 'light' ) :
            return ' primary-mobile-light';
        elseif( $get_header_style == 'light light_noborder' ) :
            return ' primary-mobile-light primary-mobile-light-noborder';
        else :
            return '';
        endif;
    }
endif;


/**
 * Determine if left header needs to be included
 */
if ( ! function_exists( 'jevelin_header_page_container' ) ) :
    function jevelin_header_page_container() {
        $get_header_layout = jevelin_header_layout();

        if( jevelin_post_option( jevelin_page_id(), 'header', 'on' ) != 'off' ) :
            if( $get_header_layout == 'left-1' || $get_header_layout == 'left-2' ) :
                return 'sh-header-in-side';
            endif;
        endif;
    }
endif;


/**
 * Determine if right header needs to be included
 */
if ( ! function_exists( 'jevelin_header_right' ) ) :
    function jevelin_header_right() {
        $get_header_layout = jevelin_header_layout();
        if( jevelin_post_option( jevelin_page_id(), 'header', 'on' ) != 'off' ) :
            if( $get_header_layout == 6 || $get_header_layout == 61 || $get_header_layout == 7 || $get_header_layout == 9 ) :
                return true;
            endif;
        endif;
    }
endif;



/**
 * Get header classes
 */
if ( ! function_exists( 'jevelin_header_classes' ) ) :
	function jevelin_header_classes( $id, $side = NULL, $id2 = '' ) {
	    $o = '';

	    if( jevelin_option( 'header_nav_uppercase' ) == true ) :
	        $o.= ' sh-nav-uppercase';
	    endif;

	    if( jevelin_option( 'header_sticky',true ) == true && !isset( $_GET['vc_editable'] ) ) :
	        $o.= ' sh-sticky-header';
	    endif;

        if( jevelin_option( 'header_icons', 'large' ) == 'small' ) :
	        $o.= ' sh-header-small-icons';
	    endif;

        if( jevelin_option( 'header_mega_style', 'style1' ) == 'style2' ) :
            $o.= ' sh-header-megamenu-style2';
	    endif;

	    if( $side == 1 ) :
	        echo 'sh-header-side sh-header-'.$id;
	    else :
            if( $id2 > 0 ) {
                echo 'sh-header sh-header-'.$id.' sh-header-'.$id2;
            } else {
                echo 'sh-header sh-header-'.$id;
            }
	    endif;

        echo $o;

	}
endif;


/**
 * Get footer status
 */
if ( ! function_exists( 'jevelin_footer_enabled' ) ) :
    function jevelin_footer_enabled() {
        if( jevelin_framework_active() ) :
            $footer1 = jevelin_post_option( jevelin_page_id(), 'footer_widgets', 'on' );
            $footer2 = jevelin_option( 'footer_widgets', 'on' );
            $footer3 = jevelin_count_sidebar('footer_widgets');

            return ( $footer3 > 0 ? ( ( isset($footer1) && ( $footer1 == 'on' || $footer1 == 'off' ) && ! is_singular( 'product' ) ) ? $footer1 : ( (isset($footer2) && $footer2 ) ? $footer2 : false) ) : false );
        else :
            return 'off';
        endif;
    }
endif;


/**
 * Get footer copyrights status
 */
if ( ! function_exists( 'jevelin_copyrights_enabled' ) ) :
    function jevelin_copyrights_enabled() {
        if( jevelin_framework_active() ) :
            $copyright1 = jevelin_post_option( jevelin_page_id(), 'copyright_bar', 'on' );
            $copyright2 = jevelin_option( 'copyright_bar', 'on' );

            return ( isset($copyright1) && ( $copyright1 == 'on' || $copyright1 == 'off' )) ? $copyright1 : ( ( isset($copyright2) && $copyright2 ) ? $copyright2 : false );
        else :
            return 'on';
        endif;
    }
endif;


/**
 * Set excerpt more
 */
if ( ! function_exists( 'jevelin_new_excerpt_more' ) ) :
	function jevelin_new_excerpt_more( $more ) {
        return '...';
	}
	add_filter( 'excerpt_more', 'jevelin_new_excerpt_more' );
endif;


/**
 * Set excerpt lenght
 */
if ( ! function_exists( 'jevelin_new_excerpt_word_length' ) ) :
	function jevelin_new_excerpt_word_length($length) {
	    return jevelin_option( 'post_desc', 45 );
	}
    add_filter('excerpt_length', 'jevelin_new_excerpt_word_length', 9999 );
endif;


/**
 * Show navigation not assigned
 */
if ( ! function_exists( 'jevelin_asign_menu' ) ) :
	function jevelin_asign_menu() {
	    if( current_user_can( 'manage_options' ) ) : ?>
	    <div class="sh-nav-container">
	        <ul class="sh-nav">
	            <li class="menu-item">
	                <a href="<?php echo admin_url('nav-menus.php?action=edit'); ?>">
	                    <?php esc_html_e('Click here to asign menu','jevelin'); ?>
	                </a>
	            </li>
	        </ul>
	    </div>
    <?php else : ?>
        <div class="sh-nav-container">
            <ul class="sh-nav">
                <li class="menu-item">
                    <a href="<?php echo admin_url('nav-menus.php?action=edit'); ?>">
                        <?php esc_html_e('Assign menu','jevelin'); ?>
                    </a>
                </li>
            </ul>
        </div>
	<?php endif;
	}
endif;


/**
 * Get the widget
 */
if( !function_exists('jevelin_get_the_widget') ) {
    function jevelin_get_the_widget( $widget, $instance = '', $args = '' ){
        ob_start();
        the_widget($widget, $instance, $args);
        return ob_get_clean();
    }
}


/**
 * Add pixels if needed
 */
if ( !function_exists( 'jevelin_addpx' ) ) :
    function jevelin_addpx( $number ) {
        $number = $number;
        if( is_numeric($number) ) :
            return $number.'px';
        else :
            return $number;
        endif;
    }
endif;


/**
 * Show pagination
 */
if ( !function_exists( 'jevelin_pagination' ) ) {
    function jevelin_pagination( $wp_query = NULL, $new = 1, $oldpagination = 0 ) {
        if( !jevelin_framework_active() || jevelin_option('pagination') != 'off' ) :

            $prev_arrow = esc_html__( 'Previous', 'jevelin' );
            $next_arrow = esc_html__( 'Next', 'jevelin' );

            if( !$wp_query ) :
                global $wp_query;
            endif;
            $total = $wp_query->max_num_pages;
            $big = 999999999; // need an unlikely integer
            if( $total > 1 )  {
                 if( !$current_page = get_query_var('paged') )
                     $current_page = 1;
                 if( get_option('permalink_structure') ) {
                     $format = 'page/%#%/';
                 } else {
                     $format = '&paged=%#%';
                 }

                if( is_front_page() ) {
                    if( get_query_var('page') ) :
 					    $page = get_query_var('page');
                    else :
                        $page = get_query_var('paged');
                    endif;
 				} else {
 					$page = get_query_var('paged');
 				}

                if( $oldpagination == 1 ) :
                    $base = '%_%';
                    $page = ( get_query_var('page') ) ? get_query_var('page') : 1;
                    $format = '?page=%#%';
                else :
                    $base = str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) );
                endif;

                if( $new ) :
                    echo '<div class="sh-pagination sh-default-color">';

                        ob_start();
                        echo paginate_links(array(
                            'base'          => $base,
                            'format'        => $format,
                            'current'       => max( 1, $page ),
                            'total'         => $total,
                            'mid_size'      => 3,
                            'type'          => 'list',
                            'prev_text'     => $prev_arrow,
                            'next_text'     => $next_arrow,
                         ) );
                        $pagination = ob_get_contents();
                        ob_end_clean();

                        if( $oldpagination == 1 ) :
                            $pagination = str_replace( 'class="page-numbers" href="">1', "class='page-numbers' href='?page=1'>1", $pagination );
                        endif;
                        echo str_replace( 'page/1/', '', $pagination );

                    echo '</div>';
                else :
                    wp_link_pages( array() );
                endif;
            }

        endif;
    }
}


/**
 * Show page links
 */
if ( !function_exists( 'jevelin_page_links' ) ) :
    function jevelin_page_links() {
        echo '<div class="sh-page-links">';
        wp_link_pages();
        echo '</div>';
    }
endif;


/**
 * Woocommerce - change default pagination
 */
if( !function_exists('jevelin_woocommerce_pagination') ) :
    remove_action('woocommerce_pagination', 'jevelin_woocommerce_pagination', 10);
    function jevelin_woocommerce_pagination() {
        jevelin_pagination();
    }
    add_action( 'woocommerce_pagination', 'jevelin_woocommerce_pagination', 10);
endif;


/**
 * Woocommerce - excerpt
 */
if( !function_exists('jevelin_woocommerce_product_excerpt') ) {
    function jevelin_woocommerce_product_excerpt() {
        if ( is_home() ) {
            echo '<span class="excerpt">';
            the_excerpt();
            echo '</span>';
        }
    }
    add_action( 'woocommerce_after_shop_loop_item_title', 'jevelin_woocommerce_product_excerpt', 35, 2);
}


/**
 * Woocommerce - if related page
 */
if( !function_exists('jevelin_is_realy_woocommerce_page') ) :
    function jevelin_is_realy_woocommerce_page () {
        if( function_exists ( "is_woocommerce" ) && is_woocommerce()){
            return true;
        }
        $woocommerce_keys = array(
            "woocommerce_shop_page_id" ,
            "woocommerce_terms_page_id" ,
            "woocommerce_cart_page_id" ,
            "woocommerce_checkout_page_id" ,
            "woocommerce_pay_page_id" ,
            "woocommerce_thanks_page_id" ,
            "woocommerce_myaccount_page_id" ,
            "woocommerce_edit_address_page_id" ,
            "woocommerce_view_order_page_id" ,
            "woocommerce_change_password_page_id" ,
            "woocommerce_logout_page_id" ,
            "woocommerce_lost_password_page_id"
        );

        foreach ( $woocommerce_keys as $wc_page_id ) {
            if ( get_the_ID () == get_option ( $wc_page_id , 0 ) ) {
                    return true ;
            }
        }
        return false;
    }
endif;


/**
 * Woocommerce - shop columns
 */
if( !function_exists('jevelin_wc_loop_shop_columns') ) :
    function jevelin_wc_loop_shop_columns() {

        if( jevelin_option('wc_columns') ) :
            return jevelin_option('wc_columns');
        else :
            return 4;
        endif;
    }
endif;


/**
 * Woocommerce - remove related products
 */
if( !function_exists('jevelin_wc_remove_related_products') ) :
    function jevelin_wc_remove_related_products( $args ) {
        return array();
    }
endif;


if( !function_exists( 'jevelin_wc_related_products' ) ) :
    function jevelin_wc_related_products( $args ) {
        $args['posts_per_page'] = 4;
    	$args['columns'] = 4;
    	return $args;
    }
endif;



/**
 * WooCommerce - add Second Image on Hover
 * Source: https://github.com/jameskoster/woocommerce-product-image-flipper/blob/master/image-flipper.php
 */
if( !class_exists('Jevelin_WC_Image_Hover') ) :

    class Jevelin_WC_Image_Hover {

        public function __construct() {
            //add_action( 'wp_enqueue_scripts', array( $this, 'pif_scripts' ) );                                                        // Enqueue the styles
            add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'jevelin_woocommerce_template_loop_second_product_thumbnail' ), 11 );
            add_filter( 'post_class', array( $this, 'jevelin_product_has_gallery' ) );
        }

        // Add pif-has-gallery class to products that have a gallery
        function jevelin_product_has_gallery( $classes ) {
            global $product;
            $post_type = get_post_type( get_the_ID() );
            if ( ! is_admin() ) {
                if ( $post_type == 'product' ) {
                    $attachment_ids = ( method_exists('WC_Product','get_gallery_attachment_ids') ) ? $product->get_gallery_image_ids() : $product->get_gallery_attachment_ids();
                    if ( $attachment_ids ) {
                        $classes[] = 'pif-has-gallery';
                    }
                }
            }
            return $classes;
        }

        // Display the second thumbnails
        function jevelin_woocommerce_template_loop_second_product_thumbnail() {
            global $product, $woocommerce;

            $attachment_ids = $product->get_gallery_image_ids();

            if ( $attachment_ids ) {
                $secondary_image_id = $attachment_ids['0'];
                echo '<div class="secondary-image-container">'.wp_get_attachment_image( $secondary_image_id, 'shop_catalog', '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog' ) ).'</div>';
            }
        }

    }

    $jevelin_wc_image_hover = new Jevelin_WC_Image_Hover();
endif;


/**
 * WooCommerce - Change paypal icon
 */
if( !function_exists('jevelin_wc_paypal') ) :
    function jevelin_wc_paypal($iconUrl) {
        return get_template_directory_uri() . '/img/paypal.png';
    }
    add_filter('woocommerce_paypal_icon', 'jevelin_wc_paypal');
endif;


/**
 * WooCommerce - Update
 */
if( !function_exists( 'jevelin_header_wc_header_add_to_cart_fragment' ) ) :
    add_filter( 'woocommerce_add_to_cart_fragments', 'jevelin_header_wc_header_add_to_cart_fragment' );
    function jevelin_header_wc_header_add_to_cart_fragment( $fragments ) {
        ob_start();
        ?>

        <div class="sh-header-cart-count cart-icon sh-group">
            <span><?php echo WC()->cart->cart_contents_count; ?></span>
        </div>

        <?php
        $fragments['div.sh-header-cart-count'] = ob_get_clean();
        return $fragments;
    }
endif;


/**
 * Override toolbar margin
 */
if ( ! function_exists( 'jevelin_override_toolbar_margin' ) ) :
    add_action( 'wp_head', 'jevelin_override_toolbar_margin', 11 );
    function jevelin_override_toolbar_margin() {
        if ( is_admin_bar_showing() && !jevelin_is_vc_front() ) { ?>
            <style type="text/css" media="screen">
                html { margin-top: 0px !important; }
                #page-container { padding-top: 32px !important; }
                @media (max-width: 782px) {
                    #page-container { padding-top:46px !important; }
                }
            </style>
        <?php }
    }
endif;


/**
 * Popover
 */
if ( ! function_exists( 'jevelin_popover' ) ) :
    function jevelin_popover( $type ) {

        if( isset( $type ) && $type && $type != 'none' ) :
            if( $type == 'hot' ) :
                $val = esc_html__( 'Hot', 'jevelin' );
            else :
                $val = esc_html__( 'New', 'jevelin' );
            endif;

            echo '<span class="sh-popover-mini">'.$val.'</span>';
        endif;

    }
endif;


/**
 * Popover
 */
if ( ! function_exists( 'jevelin_sticky_post' ) ) :
    function jevelin_sticky_post() {
        if( is_sticky() ) :
            echo '<i class="post-sticky icon-pin"></i>';
        endif;
    }
endif;


/**
 * Popover
 */
if ( ! function_exists( 'jevelin_blog_overlay' ) ) :
    function jevelin_blog_overlay( $image = '', $link = '1', $lightbox = '1', $lightbox_group = '', $lightbox_name_val = '' ) {
        $lightbox_name = ( $lightbox_name_val ) ? $lightbox_name_val : 'lightcase';
        if( !$image ) :
            $image = get_permalink();
        endif;
    ?>

        <div class="sh-overlay-style1">
            <div class="sh-table-full">
                <?php if( $link ) : ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="sh-overlay-item sh-table-cell" title="<?php echo esc_attr( 'Open the article', 'jevelin' ) . ' - ' . get_the_title(); ?>">
                        <div class="sh-overlay-item-container">
                            <i class="icon-link"></i>
                        </div>
                    </a>
                <?php endif; ?>

                <?php if( $lightbox ) : ?>
                    <a href="<?php echo esc_url( $image ); ?>" class="sh-overlay-item sh-table-cell" data-rel="<?php echo esc_attr( $lightbox_name.$lightbox_group); ?>">
                        <div class="sh-overlay-item-container">
                            <i class="icon-magnifier-add"></i>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div>

    <?php }
endif;


/**
 * Share
 */
if ( ! function_exists( 'jevelin_share' ) ) :
    function jevelin_share( $location = '' ) {

        $icon = 'icon-share';
        if( is_jevelin_style( 3 ) ) :
            $icon = 'shi shi-share';
        endif;

        if( $location == 'portfolio' ) :
            echo '<div class="sh-portfolio-single-share">';
        endif;

            echo '
            <div class="sh-social-share">
                <div class="sh-social-share-button sh-noselect">
                    <i class="'. $icon .'"></i>
                    <span>'.esc_html__( 'Share', 'jevelin' ).'</span>
                </div>
                <div class="sh-social-share-networks"></div>
            </div>';

        if( $location == 'portfolio' ) :
            echo '</div>';
        endif;

    }
endif;


/**
 * Page Switch
 */
if ( ! function_exists( 'jevelin_page_switch' ) ) :
    function jevelin_page_switch( $prev_post = '', $content = '', $next_post = '' ) {

        echo '
        <div class="sh-page-switcher">
            <a href="#" class="sh-page-switcher-button sh-page-switcher-button-next">
                <i class="ti-arrow-left"></i>
            </a>
            <a href="#" class="sh-page-switcher-button sh-page-switcher-button-prev">
                <i class="ti-arrow-right"></i>
            </a>
        </div>';

    }
endif;


/**
 * Export categories
 */
if ( ! function_exists( 'jevelin_show_categories' ) ) :
    function jevelin_show_categories() {
        $i = 0;
        $o = '';


        if( is_single() ) :
            $limit_categories = 9999999;
        else :
            $limit_categories = 6;
        endif;


        $categories = get_the_category();
        if( $categories ) :
            foreach( $categories as $category ) :
                if( $i <= $limit_categories ) :
                    $o.= '<a href="'.get_category_link($category->term_id).'" rel="category tag">'.$category->name.'</a>';

                    $i++;
                    if( $i < count($categories) ) :
                        $o.= ', ';
                    endif;
                endif;
            endforeach;
        endif;

        if( $i > $limit_categories ) :
            $o.= '...';
        endif;

        return $o;
    }
endif;


/**
 * Navigation - login
 */
if ( ! function_exists( 'jevelin_nav_wrap_login' ) ) :
    function jevelin_nav_wrap_login() {
        $elements = jevelin_option( 'header_elements' );
        if ( class_exists( 'WooCommerce' ) && isset($elements['woo_account']) && $elements['woo_account'] == true ) :

            if ( !is_user_logged_in() ) :
                $val = esc_html__( 'Login', 'jevelin' );
            else :
                $val = esc_html__( 'My Account', 'jevelin' );
            endif;

            return '
            <li class="menu-item sh-nav-login">
                <a href="'.esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ).'" id="header-login">
                    <span>'.$val.'</span>
                </a>
            </li>';
        endif;
    }
endif;


/**
 * Navigation - search
 */
if ( ! function_exists( 'jevelin_nav_wrap_search' ) ) :
    function jevelin_nav_wrap_search() {

        $icon = 'icon icon-magnifier';
        if( is_jevelin_style( 3 ) ) :
            $icon = 'shi shi-search';
        endif;

        $elements = jevelin_option( 'header_elements' );
        if( isset($elements['search']) && $elements['search'] == true ) :
            return '
            <li class="menu-item sh-nav-search sh-nav-special">
                <a href="#"><i class="'. $icon .'"></i></a>
            </li>';
        endif;

    }
endif;


/**
 * Navigation - language switcher
 */
if ( ! function_exists( 'jevelin_nav_wrap_lang' ) ) :
    function jevelin_nav_wrap_lang() {
        $lang_option = jevelin_option( 'header_lang' );
        $languages = array();
        $current = '';
        $dropdown = '';

        // Polyland plugin
        if( $lang_option == 'polylang' && function_exists( 'pll_the_languages' ) ) :
            $languages = pll_the_languages( array( 'raw' => 1 ) );
            foreach( $languages as $lang ) :
                if( $lang['current_lang'] ) :
                    $current = $lang['slug'];
                endif;
            endforeach;
            foreach( $languages as $lang ) :
                $dropdown.= '<li class="menu-item sh-nav-lang-item">
                    <a href="'.$lang['url'].'" lang="'.$lang['locale'].'">'.$lang['slug'].'</a>
                </li>';
            endforeach;
        endif;

        // WPML plugin
        if( $lang_option == 'wpml' && function_exists( 'icl_get_languages' ) ) :
            $languages = icl_get_languages('skip_missing=0');
            foreach( $languages as $lang ) :
                if( $lang['active'] ) :
                    $current = $lang['language_code'];
                endif;
            endforeach;
            foreach( $languages as $lang ) :
                $dropdown.= '<li class="menu-item sh-nav-lang-item">
                    <a href="'.$lang['url'].'" lang="'.$lang['language_code'].'">'.$lang['language_code'].'</a>
                </li>';
            endforeach;
        endif;

        // Output
        if( count( $languages ) ) :
            return '
            <li class="menu-item current-menu-parent menu-item-has-children sh-nav-lang">
                <a><span>'.$current.'</span></a>
                <ul class="sub-menu">'.$dropdown.'</ul>
            </li>';
        endif;
    }
endif;

/**
 * Navigation - social
 */
if ( ! function_exists( 'jevelin_nav_wrap_social' ) ) :
    function jevelin_nav_wrap_social() {

        $elements = jevelin_option( 'header_elements' );
        if( isset($elements['social']) && $elements['social'] == true ) :
            return '
            <li class="menu-item sh-nav-social sh-nav-special">
                '.jevelin_social_media().'
            </li>';
        endif;

    }
endif;


/**
 * Navigation - cart
 */
if ( ! function_exists( 'jevelin_nav_wrap_cart' ) ) :
    function jevelin_nav_wrap_cart( $title = NULL, $show = 0 ) {
        $elements = jevelin_option( 'header_elements' );
        if( class_exists( 'WooCommerce' ) && function_exists( 'wc_get_cart_url' ) && ( isset($elements['woo_cart']) && $elements['woo_cart'] == true ) || $show == 1 ) {

            if( $title == true ) {
                $title = '<div class="sh-cart-title">'.esc_html__( 'Cart', 'jevelin' ).'</div>';
            }

            $cart = '';
            if ( jevelin_get_the_widget( 'WC_Widget_Cart', 'title= ' ) ) {
                $content = jevelin_get_the_widget( 'WC_Widget_Cart', 'title= ' );
                $content = str_replace( '<h2 class="widgettitle"> </h2>', '', $content );
                $content = str_replace( '<h2 class="widgettitle"></h2>', '', $content );
                $cart = '
                <ul class="sub-menu">
                    <li class="menu-item menu-item-cart">
                        ' . $content . '
                    </li>
                </ul>';
            }

            $icon = 'icon icon-basket';
            if( is_jevelin_style( 3 ) ) :
                $icon = 'shi shi-cart';
            endif;

            return '
            <li class="menu-item sh-nav-cart sh-nav-special sh-header-builder-main-element-cart">
                <a href="'.wc_get_cart_url().'">
                    <div class="sh-nav-cart-content">
                        <i class="'. $icon .' sh-header-builder-main-element-icon"></i>
                        <div class="sh-header-cart-count cart-icon sh-group">

                            <span>'.WC()->cart->cart_contents_count.'</span>

                        </div>
                    </div>
                    '.$title.'
                </a>
                '.$cart.'
            </li>';
        }
    }
endif;


/**
 * Mobile navigation - menu
 */
if ( ! function_exists( 'jevelin_nav_wrap_menu_mobile' ) ) :
    function jevelin_nav_wrap_menu_mobile() {

        //$icon = jevelin_option( 'header_nav_icon' );
        //$icon_close = jevelin_option( 'header_nav_icon_close', 'ti-close' );
        /*if( $icon_type == 'on' && $icon ) :
            $content = '
            <span class="sh-nav-custom-icon" data-icon="' . esc_attr( $icon ) . '" data-icon-close="' . esc_attr( $icon_close ) . '">
                <i class="' . esc_attr( $icon ) . '"></i>
            </span>';*/

        $icon_type = jevelin_option( 'header_menu_icon', 'hamburger' );
        if( $icon_type == 'dots' ) :
            $content = '
            <span class="sh-nav-custom-icon-image">

                <div class="sh-nav-custom-icon-image-standard">
                    <svg id="menu_copy" data-name="menu copy" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <rect class="cls-1" width="4" height="4"/>
                        <rect id="Rectangle_523_copy_5" data-name="Rectangle 523 copy 5" class="cls-1" x="8" width="4" height="4"/>
                        <rect id="Rectangle_523_copy_6" data-name="Rectangle 523 copy 6" class="cls-1" x="16" width="4" height="4"/>
                        <rect id="Rectangle_523_copy_7" data-name="Rectangle 523 copy 7" class="cls-1" y="8" width="4" height="4"/>
                        <rect id="Rectangle_523_copy_7-2" data-name="Rectangle 523 copy 7" class="cls-1" x="8" y="8" width="4" height="4"/>
                        <rect id="Rectangle_523_copy_7-3" data-name="Rectangle 523 copy 7" class="cls-1" x="16" y="8" width="4" height="4"/>
                        <rect id="Rectangle_523_copy_8" data-name="Rectangle 523 copy 8" class="cls-1" y="16" width="4" height="4"/>
                        <rect id="Rectangle_523_copy_8-2" data-name="Rectangle 523 copy 8" class="cls-1" x="8" y="16" width="4" height="4"/>
                        <rect id="Rectangle_523_copy_8-3" data-name="Rectangle 523 copy 8" class="cls-1" x="16" y="16" width="4" height="4"/>
                    </svg>
                </div>

                <div class="sh-nav-custom-icon-image-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21">
                        <path id="Rectangle_652_copy_3" data-name="Rectangle 652 copy 3" class="cls-1" d="M19.293,0.293l1.414,1.414L1.414,21,0,19.586Z"/>
                        <path id="Rectangle_652_copy_4" data-name="Rectangle 652 copy 4" class="cls-1" d="M20.988,19.555l-1.433,1.433L0,1.433,1.433,0Z"/>
                    </svg>
                </div>

            </span>';
        else :
            $content = '
            <div class="sh-table-full">
                <div class="sh-table-cell">
                    <span class="c-hamburger c-hamburger--htx">
                        <span>'.esc_html__( 'Toggle menu', 'jevelin' ).'</span>
                    </span>
                </div>
            </div>';
        endif;

        return '
        <li class="menu-item sh-nav-dropdown">
            <a>' . $content . '</a>
        </li>';
    }
endif;


/**
 * Blog - meta one
 */
if ( ! function_exists( 'jevelin_meta_one' ) ) :
    function jevelin_meta_one() {
        $elements = jevelin_option( 'post_elements' );

        global $post;
        $author_id = $post->post_author;
    ?>

        <span class="post-meta-author">
            <?php esc_html_e( 'by', 'jevelin' ); ?>
            <a href="<?php echo get_author_posts_url( $author_id ); ?>" class="bypostauthor" itemprop="url" rel="author">
                <?php echo esc_attr( get_the_author_meta( 'display_name', $author_id ) ); ?>
            </a>
        </span>

        <?php if( !jevelin_framework_active() || ( isset($elements['date']) && $elements['date'] == true ) ) :
            $meta_data = get_post_modified_time( 'Y-m-d|H:i:s', true );
            $meta_data = str_replace( '|', 'T', $meta_data ) . '+00:00';
        ?>
            <time class="updated semantic" itemprop="dateModified" datetime="<?php echo esc_attr( $meta_data ); ?>"></time>
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="post-meta-date sh-default-color"><?php echo esc_attr( get_the_date() ); ?></a>
        <?php endif; ?>

    <?php }
endif;


/**
 * Blog - meta two
 */
if ( ! function_exists( 'jevelin_meta_two' ) ) :
    function jevelin_meta_two( $order = 0, $icon = 'icon-speech' ) {
        $elements = jevelin_option( 'post_elements' );
    ?>

        <div class="sh-columns post-meta-comments">
            <span class="post-meta-categories">
                <i class="icon-tag"></i>
                <?php echo jevelin_show_categories(); ?>
            </span>

            <?php if( ( !jevelin_framework_active() && comments_open() ) || ( isset($elements['comments']) && $elements['comments'] == true && comments_open() ) ) : ?>
                <meta itemprop="interactionCount" content="UserComments:<?php echo intval( get_comments_number( '0', '1', '%' ) ); ?>">
                <a href="<?php echo esc_url( get_permalink() ); ?>#comments" class="post-meta-comments">
                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                    <?php echo esc_attr( get_comments_number( '0', '1', '%' ) ); ?>
                </a>
            <?php else : ?>
                <div></div>
            <?php endif; ?>
        </div>

    <?php }
endif;


/**
 * Show social media
 */
if ( ! function_exists( 'jevelin_social_media' ) ) :
    function jevelin_social_media( $location = '' ) {

        if( jevelin_option('social_newtab') == true ) :
            $new_tab = ' target = "_blank" ';
        else :
            $new_tab = '';
        endif;
        $o = '';

        if( jevelin_option('social_twitter') ) :
            $o.= '<a href="'.esc_url( ltrim( jevelin_option('social_twitter') ) ).'" '.$new_tab.' class="social-media-twitter">
                <i class="icon-social-twitter"></i>
            </a>';
        endif;

        if( jevelin_option('social_facebook') ) :
            $o.= '<a href="'.esc_url( ltrim( jevelin_option('social_facebook') ) ).'" '.$new_tab.' class="social-media-facebook">
                <i class="icon-social-facebook"></i>
            </a>';
        endif;

        if( jevelin_option('social_instagram') ) :
            $o.= '<a href="'.esc_url( ltrim( jevelin_option('social_instagram') ) ).'" '.$new_tab.' class="social-media-instagram">
                <i class="icon-social-instagram"></i>
            </a>';
        endif;

        if( jevelin_option('social_youtube') ) :
            $o.= '<a href="'.esc_url( ltrim( jevelin_option('social_youtube') ) ).'" '.$new_tab.' class="social-media-youtube">
                <i class="icon-social-youtube"></i>
            </a>';
        endif;

        if( jevelin_option('social_pinterest') ) :
            $o.= '<a href="'.esc_url( ltrim( jevelin_option('social_pinterest') ) ).'" '.$new_tab.' class="social-media-pinterest">
                <i class="icon-social-pinterest"></i>
            </a>';
        endif;

        if( jevelin_option('social_tumblr') ) :
            $o.= '<a href="'.esc_url( ltrim( jevelin_option('social_tumblr') ) ).'" '.$new_tab.' class="social-media-tumblr">
                <i class="icon-social-tumblr"></i>
            </a>';
        endif;

        if( jevelin_option('social_dribbble') ) :
            $o.= '<a href="'.esc_url( ltrim( jevelin_option('social_dribbble') ) ).'" '.$new_tab.' class="social-media-dribbble">
                <i class="icon-social-dribbble"></i>
            </a>';
        endif;

        if( jevelin_option('social_linkedIn') ) :
            $o.= '<a href="'.esc_url( ltrim( jevelin_option('social_linkedIn') ) ).'" '.$new_tab.' class="social-media-linkedin">
                <i class="icon-social-linkedin"></i>
            </a>';
        endif;

        if( jevelin_option('social_skype') ) :
            $o.= '<a href="skype:'.esc_attr( ltrim( jevelin_option('social_skype') ) ).'?chat" '.$new_tab.' class="social-media-skype">
                <i class="icon-social-skype"></i>
            </a>';
        endif;

        if( jevelin_option('social_spotify') ) :
            $o.= '<a href="'.esc_url( ltrim( jevelin_option('social_spotify') ) ).'" '.$new_tab.' class="social-media-spotify">
                <i class="icon-social-spotify"></i>
            </a>';
        endif;

        if( jevelin_option('social_soundcloud') ) :
            $o.= '<a href="'.esc_url( ltrim( jevelin_option('social_soundcloud') ) ).'" '.$new_tab.' class="social-media-soundcloud">
                <i class="icon-social-soundcloud"></i>
            </a>';
        endif;

        if( jevelin_option('social_reddit') ) :
            $o.= '<a href="'.esc_url( ltrim( jevelin_option('social_reddit') ) ).'" '.$new_tab.' class="social-media-soundcloud">
                <i class="ti-reddit"></i>
            </a>';
        endif;

        if( jevelin_option('social_flickr') ) :
            $o.= '<a href="'.esc_url( ltrim( jevelin_option('social_flickr') ) ).'" '.$new_tab.' class="social-media-flickr">
                <i class="ti-flickr"></i>
            </a>';
        endif;

        if( jevelin_option('social_wordpress') ) :
            $o.= '<a href="'.esc_url( ltrim( jevelin_option('social_wordpress') ) ).'" '.$new_tab.' class="social-media-wordpress">
                <i class="ti-wordpress"></i>
            </a>';
        endif;

        if( jevelin_option('social_snapchat') ) :
            $o.= '<a href="'.esc_url( ltrim( jevelin_option('social_snapchat') ) ).'" '.$new_tab.' class="social-media-snapchat">
                <i class="fa fa-snapchat"></i>
            </a>';
        endif;

        if( is_array( jevelin_option('social_custom') ) ) :
            $social_custom = jevelin_option( 'social_custom' );
            if( jevelin_framework() == 'redux' ) :
                foreach( $social_custom as $social ) :
                    if( !empty( $social['title'] ) ) :
                        $o.= '<a href="'.esc_url( ltrim( $social['url'] ) ).'" '.$new_tab.' class="social-media-wordpress">
                            <i class="'.esc_attr( $social['title'] ).'"></i>
                        </a>';
                    endif;
                endforeach;
            else :
                foreach( $social_custom as $social ) :
                    $o.= '<a href="'.esc_url( ltrim( $social['link'] ) ).'" '.$new_tab.' class="social-media-wordpress">
                        <i class="'.esc_attr( $social['icon'] ).'"></i>
                    </a>';
                endforeach;
            endif;
        endif;

        if( $location != 'footer' ) :
            $o.= '<div class="sh-clear"></div>';
        endif;

        return $o;
    }

endif;


/**
 * Show search form
 */
if ( !function_exists( 'jevelin_search_form' ) ) {
    function jevelin_search_form( $form ) {

        $form = '
            <form method="get" class="search-form" action="' . esc_url( home_url('/') ) . '">
                <div>
                    <label>
                        <input type="search" class="sh-sidebar-search search-field" placeholder="'.esc_html__( 'Search here...', 'jevelin' ).'" value="" name="s" title="' . esc_html__( 'Search text', 'jevelin' ) . '" required />
                    </label>
                    <button type="submit" class="search-submit">
                        <i class="icon-magnifier"></i>
                    </button>
                </div>
            </form>';
        return $form;
    }
    add_filter( 'get_search_form', 'jevelin_search_form' );
}


/**
 * Get logo height
 */
if ( !function_exists( 'jevelin_logo_height' ) ) {
    function jevelin_logo_height( $type = NULL ) {
        if( jevelin_framework() == 'redux' ) :
            $header_logo_sizes = jevelin_option( 'header_logo_sizes' );
            $responsive_height = jevelin_option( 'header_logo_sizes_responsive_height' );
            $sticky_height = jevelin_option( 'header_logo_sizes_sticky_height' );
            $standard_height = jevelin_option( 'header_logo_sizes_standard_height' );

            if( $header_logo_sizes == 'orginal' ) :
                $responsive_height = $sticky_height = $standard_height = '';
            endif;
        else :
            $logo_sizes_val = jevelin_option( 'header_logo_sizes' );
            $logo_sizes_atts = jevelin_get_picker( $logo_sizes_val );
            $responsive_height = isset( $logo_sizes_atts['responsive_height'] ) ? $logo_sizes_atts['responsive_height'] : '';
            $sticky_height = isset( $logo_sizes_atts['sticky_height'] ) ? $logo_sizes_atts['sticky_height'] : '';
            $standard_height = isset( $logo_sizes_atts['standard_height'] ) ? $logo_sizes_atts['standard_height'] : '';
        endif;


        if( $type == 'responsive' ) :

            if( $responsive_height > 0 ) :
                return intval( $responsive_height ).'px';
            else :
                return 'auto';
            endif;

        elseif( $type == 'sticky' ) :

            if( $sticky_height > 0 ) :
                return intval( $sticky_height).'px';
            else :
                return 'auto';
            endif;

        else :

            if( $standard_height > 0 ) :
                return intval( $standard_height ).'px';
            else :
                return 'auto';
            endif;

        endif;
    }
}


/**
 * Header Logo
 */
if( !function_exists('jevelin_header_logo') ) :
    function jevelin_header_logo() {

        if( jevelin_option( 'logo_status', true ) ) :
            $standard_logo = jevelin_option_image('logo');

            /* Use Jevelin Logo if Logo is not uploaded */
            if( !$standard_logo ) :
                $standard_logo = get_template_directory_uri().'/img/logo.png';
            endif;

            $sticky_logo = ( jevelin_option_image('logo_sticky') ) ? jevelin_option_image('logo_sticky') : $standard_logo;
            $light_logo = ( jevelin_option_image('logo_light') ) ? jevelin_option_image('logo_light') : $standard_logo;

	        if( jevelin_framework() == 'redux' ) :
                $title = jevelin_option( 'logo_title' );
                $logo_title_value = jevelin_option( 'logo_title_value' );
                $logo_both = jevelin_option( 'logo_both' );
            else :
                $title_val = jevelin_option( 'logo_title' );
                $title = ( isset( $title_val['logo_title'] ) ) ? esc_attr( $title_val['logo_title'] ) : 'off';
        		$title_atts = jevelin_get_picker( $title_val );
                $logo_title_value = isset( $title_atts['logo_title_value'] ) ? $title_atts['logo_title_value'] : '';
                $logo_both = isset( $title_atts['logo_both'] ) ? $title_atts['logo_both'] : '';
            endif;

            $height_value = str_replace( 'px', '', jevelin_logo_height() );
            if( jevelin_logo_height() && jevelin_logo_height() != 'auto' ) :
                $height = ' height="'. intval( $height_value ) .'"';
            else :
                $height = '';
            endif;
        ?>
            <div class="header-logo sh-group-equal">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo-container sh-table-small" rel="home">
                    <?php if( $title == 'on' && $logo_title_value ) : ?>

                        <?php if( $logo_both == 'on' ) : ?>
                            <div class="sh-table-cell" style="padding-right: 20px;">
                                <img class="sh-standard-logo" src="<?php echo esc_url( $standard_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"<?php echo ( $height ); ?> />
                                <img class="sh-sticky-logo" src="<?php echo esc_url( $sticky_logo ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>"<?php echo ( $height ); ?> />
                                <img class="sh-light-logo" src="<?php echo esc_url( $light_logo ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>"<?php echo ( $height ); ?> />
                            </div>
                        <?php endif; ?>

                        <div id="header-logo-title" class="sh-heading-font">
                            <div class="header-logo-title-alignment">
                                <?php echo ( $logo_title_value ); ?>
                            </div>
                        </div>

                    <?php else : ?>

                        <div class="sh-table-cell">
                            <img class="sh-standard-logo" src="<?php echo esc_url( $standard_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"<?php echo ( $height ); ?> />
                            <img class="sh-sticky-logo" src="<?php echo esc_url( $sticky_logo ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>"<?php echo ( $height ); ?> />
                            <img class="sh-light-logo" src="<?php echo esc_url( $light_logo ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>"<?php echo ( $height ); ?> />
                        </div>

                    <?php endif; ?>
                </a>
            </div>

    <?php endif; }
endif;


/**
 * Get excerpt
 */
if ( !function_exists( 'jevelin_get_excerpt' ) ) {
    function jevelin_get_excerpt( $count, $string ){

        $excerpt = $string;
        $excerpt = strip_tags($excerpt);
        $excerpt = wp_trim_words($excerpt, $count);

        return $excerpt;

    }
}


/**
 * Get posts count
 */
if ( !function_exists( 'jevelin_count_posts' ) ) :
    function jevelin_count_posts() {

        $post_count = 1;
        $post_ok = false;
        $posts = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => -1, 'fields' => 'ids', 'order' => 'ASC' ) );
        if( $posts->have_posts() ) :
            $current_post = $posts->post_count;
            foreach ( $posts->posts as $id ) :

                if( $id == get_the_ID() ) :
                    $post_ok = true;
                elseif( $post_ok == false ) :
                    $post_count++;
                endif;

            endforeach;
            return '<strong>'.$post_count.'</strong> / '.$posts->post_count.'';
        endif;

    }
endif;


/**
 * Convert color code to rgb or rgba
 */
if ( !function_exists( 'jevelin_hex2rgba' ) ) {
    function jevelin_hex2rgba($color, $opacity = false) {

        $default = 'rgb(0,0,0)';

        //Return default if already rgb
        if (strpos($color, 'rgba(') !== false) :
            if( $opacity ) :
                return str_replace( ',1)', ','.$opacity.')', $color );
            else :
                return $color;
            endif;
        endif;

        //Return default if no color provided
        if(empty($color))
            return $default;

        //Sanitize $color if "#" is provided
            if ($color[0] == '#' ) {
                $color = substr( $color, 1 );
            }

            //Check if color has 6 or 3 characters and get values
            if (strlen($color) == 6) {
                    $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
            } elseif ( strlen( $color ) == 3 ) {
                    $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
            } else {
                    return $default;
            }

            //Convert hexadec to rgb
            $rgb =  array_map('hexdec', $hex);

            //Check if opacity is set(rgba or rgb)
            if($opacity){
                if(abs($opacity) > 1)
                    $opacity = 1.0;
                $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
            } else {
                $output = 'rgb('.implode(",",$rgb).')';
            }

            //Return rgb(a) color string
            return $output;
    }
}


/**
 * Show breadcrumbs tree
 */
if ( !function_exists( 'jevelin_breadcrumbs' ) ) {
    function jevelin_breadcrumbs( $args = array() ) {
        // Do not display on the homepage

        // Set default arguments
        $defaults = array(
            'separator_icon'      => '&gt;',
            'breadcrumbs_id'      => 'breadcrumbs',
            'breadcrumbs_classes' => 'breadcrumb-trail breadcrumbs',
            'home_title'          =>  esc_html__( 'Home', 'jevelin' ),
        );
        // Parse any arguments added
        $args = apply_filters( 'ct_ignite_breadcrumbs_args', wp_parse_args( $args, $defaults ) );
        // Set variable for adding separator markup
        $separator = '<span class="separator"> ' . esc_attr( $args['separator_icon'] ) . ' </span>';
        // Get global post object
        global $post;
        /***** Begin Markup *****/
        // Open the breadcrumbs
        $html = '<div id="' . esc_attr( $args['breadcrumbs_id'] ) . '" class="' . esc_attr( $args['breadcrumbs_classes']) . '">';
        // Add Homepage link & separator (always present)
        $html .= '<span class="item-home"><a class="bread-link bread-home" href="' . esc_url( home_url('/') ) . '" title="' . esc_attr( $args['home_title'] ) . '">' . esc_attr( $args['home_title'] ) . '</a></span>';

        if ( !is_front_page() ) {
            $html .= $separator;
        }
        // Post

        if ( is_front_page() ) {
            //return;
        } elseif ( is_singular( 'post' ) ) {
            // Get post category info
            $category = get_the_category();
            // Get category values
            $category_values = array_values( $category );
            // Get last category post is in
            $last_category = end( $category_values );
            // Get parent categories
            $cat_parents = rtrim( (string)get_category_parents( $last_category->term_id, true, ',' ), ',' );
            // Convert into array
            $cat_parents = explode( ',', $cat_parents );
            // Loop through parent categories and add to breadcrumb trail
            foreach ( $cat_parents as $parent ) {
                $html .= '<span class="item-cat">' . wp_kses( $parent, wp_kses_allowed_html( 'a' ) ) . '</span>';
                $html .= $separator;
            }
            // add name of Post
            $html .= '<span class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></span>';
        } // Page
        elseif ( is_singular( 'page' ) ) {
            // if page has a parent page
            if ( $post->post_parent ) {
                // Get all parents
                $parents = get_post_ancestors( $post->ID );
                // Sort parents into the right order
                $parents = array_reverse( $parents );
                // Add each parent to markup
                foreach ( $parents as $parent ) {
                    $html .= '<span class="item-parent item-parent-' . esc_attr( $parent ) . '"><a class="bread-parent bread-parent-' . esc_attr( $parent ) . '" href="' . get_permalink( $parent ) . '" title="' . get_the_title( $parent ) . '">' . get_the_title( $parent ) . '</a></span>';
                    $html .= $separator;
                }
            }
            // Current page
            $html .= '<span class="item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></span>';
        } // Attachment
        elseif ( is_singular( 'attachment' ) ) {
            // Get the parent post ID
            $parent_id = $post->post_parent;
            // Get the parent post title
            $parent_title = get_the_title( $parent_id );
            // Get the parent post permalink
            $parent_permalink = get_permalink( $parent_id );
            // Add markup
            $html .= '<span class="item-parent"><a class="bread-parent" href="' . esc_url( $parent_permalink ) . '" title="' . esc_attr( $parent_title ) . '">' . esc_attr( $parent_title ) . '</a></span>';
            $html .= $separator;
            // Add name of attachment
            $html .= '<span class="item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></span>';
        } // Custom Post Types
        elseif ( is_singular() ) {
            // Get the post type
            $post_type = get_post_type();
            // Get the post object
            $post_type_object = get_post_type_object( $post_type );
            // Get the post type archive
            $post_type_archive = get_post_type_archive_link( $post_type );
            // Add taxonomy link and separator
            $post_type_name = $post_type_object->labels->name;
            if( $post_type == 'product' ) :
                $post_type_name = jevelin_option( 'titlebar-blog-woocommerce' );
            endif;

            if( $post_type_name ) :
                $html .= '<span class="item-cat item-custom-post-type-' . esc_attr( $post_type ) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr( $post_type ) . '" href="' . esc_url( $post_type_archive ) . '" title="' . esc_attr( $post_type_object->labels->name ) . '">' . esc_attr( $post_type_name ) . '</a></span>';
                $html .= $separator;
            endif;
            // Add name of Post
            $html .= '<span class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . $post->post_title . '">' . $post->post_title . '</span></span>';
        } // Category
        elseif ( is_category() ) {
            // Get category object
            $parent = get_queried_object()->category_parent;
            // If there is a parent category...
            if ( $parent !== 0 ) {
                // Get the parent category object
                $parent_category = get_category( $parent );
                // Get the link to the parent category
                $category_link = get_category_link($parent);
                // Output the markup for the parent category item
                $html .= '<span class="item-parent item-parent-' . esc_attr( $parent_category->slug ) . '"><a class="bread-parent bread-parent-' . esc_attr( $parent_category->slug ) . '" href="' . esc_url( $category_link ) . '" title="' . esc_attr( $parent_category->name ) . '">' . esc_attr( $parent_category->name ) . '</a></span>';
                $html .= $separator;
            }
            // Add category markup
            $html .= '<span class="item-current item-cat"><span class="bread-current bread-cat" title="' . $post->ID . '">' . single_cat_title( '', false ) . '</span></span>';
        } // Tag
        elseif ( is_tag() ) {
            // Add tag markup
            $html .= '<span class="item-current item-tag"><span class="bread-current bread-tag">' . single_tag_title( '', false ) . '</span></span>';
        } // Author
        elseif ( is_author() ) {
            // Add author markup
            $html .= '<span class="item-current item-author"><span class="bread-current bread-author">' . get_queried_object()->display_name . '</span></span>';
        } // Day
        elseif ( is_day() ) {
            // Add day markup
            $html .= '<span class="item-current item-day"><span class="bread-current bread-day">' . get_the_date() . '</span></span>';
        } // Month
        elseif ( is_month() ) {
            // Add month markup
            $html .= '<span class="item-current item-month"><span class="bread-current bread-month">' . get_the_date( 'F Y' ) . '</span></span>';
        } // Year
        elseif ( is_year() ) {
            // Add year markup
            $html .= '<span class="item-current item-year"><span class="bread-current bread-year">' . get_the_date( 'Y' ) . '</span></span>';
        } // Custom Taxonomy
        elseif ( is_archive() ) {
            // get the name of the taxonomy
            $custom_tax_name = get_queried_object()->name;
            // Add markup for taxonomy
            $html .= '<span class="item-current item-archive"><span class="bread-current bread-archive">' . esc_attr($custom_tax_name) . '</span></span>';
        } // Search
        elseif ( is_search() ) {
            // Add search markup
            $html .= '<span class="item-current item-search"><span class="bread-current bread-search">' . sprintf(esc_html__('Search Results for "%s"', 'jevelin'), get_search_query()) . '</span></span>';
        } // 404
        elseif ( is_404() ) {
            // Add 404 markup
            $html .= '<span>' . esc_html__( 'Error 404', 'jevelin' ) . '</span>';
        } else {
            $html .= '<span class="item-current"><span class="bread-current">' . esc_attr( get_the_title( jevelin_page_id() ) ) . '</span></span>';
        }
        // Close breadcrumb container
        $html .= '</div>';
        apply_filters( 'ct_ignite_breadcrumbs_filter', $html );
        return wp_kses_post( $html );
    }
}


/*
 * Search Page Results - Posts Only
 */
if( is_search() ) :
    function jevelin_search_results_postsonly( $query ) {
        if( jevelin_option( 'header_search_results', 'posts' ) == 'onlyposts' && $query->is_search) :
            $query->set('post_type', 'post');
        endif;
        return $query;
    }
    add_filter( 'pre_get_posts', 'jevelin_search_results_postsonly' );
endif;




/**
** WooCommerce Sales Sorting Filter
** https://lakewood.media/woocommerce-add-sales-filter/
**/
if( class_exists( 'WooCommerce' ) ) :
    if( !function_exists( 'jevelin_get_catalog_ordering_args' ) ) :
        add_filter( 'woocommerce_get_catalog_ordering_args', 'jevelin_get_catalog_ordering_args' );
        function jevelin_get_catalog_ordering_args( $args ) {
            if( jevelin_option( 'wc_sort_sale' ) == 'on' ) :
                $orderby_value = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );

                if ( 'on_sale' == $orderby_value ) {
                    $args['orderby'] = 'meta_value_num';
                    $args['order'] = 'DESC';
                    $args['meta_key'] = '_sale_price';
                }
            endif;
            return $args;
        }
    endif;

    if( !function_exists( 'jevelin_catalog_orderby' ) ) :
        add_filter( 'woocommerce_default_catalog_orderby_options', 'jevelin_catalog_orderby' );
        add_filter( 'woocommerce_catalog_orderby', 'jevelin_catalog_orderby' );
        function jevelin_catalog_orderby( $sortby ) {
            if( jevelin_option( 'wc_sort_sale' ) == 'on' ) :
                $sortby['on_sale'] = 'Sort by on sale';
            endif;
            return $sortby;
        }
    endif;

    function jevelin_change_recent_posts( $output, $tag ) {
        $style = jevelin_option( 'wc_style' );
    	if( 'recent_products' == $tag && in_array( $style, [ 'style2', 'style3' ] ) ) :
    		return '<div class="woocomerce-styling sh-woocommerce-products-' . $style . '">' . $output . '</div>';
        else :
		    return $output;
        endif;
    }
    add_filter('do_shortcode_tag', 'jevelin_change_recent_posts', 10, 2);
endif;




/*
 * WordPress 5.0 compatibility
 */
if( is_admin() ) :
    if( !function_exists('jevelin_disable_block_editor_pt') &&
        isset( $_GET['post'] ) && $_GET['post'] > 0 &&
        isset( $_GET['action'] ) && $_GET['action'] == 'edit' &&
        !isset( $_GET['vcv-gutenberg-editor'] )
    ) :
        function jevelin_disable_block_editor_pt( $use_block_editor, $post_type ) {

            $use_block_editor = true;
            if( function_exists( 'is_plugin_active' ) && !is_plugin_active( 'classic-editor/classic-editor.php' ) ) :
                $id = ( isset( $_GET['post'] ) && $_GET['post'] > 0 ) ? intval( $_GET['post'] ) : 0;
                if( $id ) :
                    $data = get_post_meta( $id, 'fw:opt:ext:pb:page-builder:json', 1 );

                    if( $data && $data != '[]' ) :
                        $use_block_editor = false;
                    endif;
                endif;

                if( isset( $_GET['classic-editor'] ) ) :
                    $use_block_editor = false;
                endif;

                if( $use_block_editor == true ) :
                    $post = get_post( $id );
                    if( $post && preg_match( '/vc_row/', $post->post_content ) ) :
                        $use_block_editor = false;
                    endif;
                endif;
            endif;

            return $use_block_editor;
        }
        add_filter('use_block_editor_for_post_type', 'jevelin_disable_block_editor_pt', 10, 2);
    endif;


    if( !function_exists('jevelin_fix_unyson_color_picker_issue') ) :
        function jevelin_fix_unyson_color_picker_issue() {
            if( function_exists( 'is_plugin_active' ) && !is_plugin_active( 'classic-editor/classic-editor.php' ) ) :
            	wp_enqueue_script( 'wp-color-picker' );
        	endif;
        }
    endif;
    add_action( 'admin_enqueue_scripts', 'jevelin_fix_unyson_color_picker_issue' );
endif;
