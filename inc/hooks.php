<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Filters and Actions
 */


/**
 * https://codex.wordpress.org/Content_Width
 */
if( !isset( $content_width ) ) :
    $content_width = 1200;
endif;


/**
 * Change Header Content
 */
if( !function_exists('jevelin_before_header_nav_content') ) :
    add_filter( 'jevelin_before_header_nav' , 'jevelin_before_header_nav_content' );
    function jevelin_before_header_nav_content( $blog_id ) {
        //
    }
endif;

if( !function_exists('jevelin_after_header_nav_content') ) :
    add_filter( 'jevelin_after_header_nav' , 'jevelin_after_header_nav_content' );
    function jevelin_after_header_nav_content( $blog_id ) {
        //
    }
endif;


/**
 * General Setup
 */

if ( ! function_exists( 'jevelin_setup' ) ) :
	add_action('after_setup_theme', 'jevelin_setup');
	function jevelin_setup(){

		/* Translations */
	    load_theme_textdomain( 'jevelin', get_template_directory() . '/languages' );

		if ( is_child_theme() ) {
			load_child_theme_textdomain( 'jevelin', get_stylesheet_directory() . '/languages' );
		}

	    /* Add WooCommerce support */
	    add_theme_support( 'woocommerce' );

		/* Add WooCommerce product image lightbox support */
        if( jevelin_option( 'wc_lightbox', 'jevelin' ) == 'woocommerce' ) :
		    add_theme_support( 'wc-product-gallery-lightbox' );
        endif;

	}
endif;
function jevelin_addnew_query_vars($vars){
    $vars[] = 'blogcategory';
    return $vars;
}
add_filter( 'query_vars', 'jevelin_addnew_query_vars', 10, 1 );


/* Removes WooCommerce select library */
add_action( 'wp_enqueue_scripts', 'jevelin_woocommerce_remove_select2', 100 );
function jevelin_woocommerce_remove_select2() {
    // Deregisters 3th party WordPress plugin script, which isn't WordPress core functionality
    if ( class_exists( 'woocommerce' ) ) {
        wp_dequeue_style( 'select2' );
        wp_deregister_style( 'select2' );
        wp_dequeue_script( 'select2');
        wp_deregister_script('select2');
    }
}


if ( ! function_exists( 'jevelin_general_setup' ) ) :
    function jevelin_general_setup_per_page() {
        return jevelin_option( 'wc_items', 20 );
    }

	function jevelin_general_setup() {

        if( class_exists( 'WooCommerce' ) ) :
            /* Woo items per page */
            add_filter( 'loop_shop_per_page', 'jevelin_general_setup_per_page', 20 );

            /* Woo remove sorting */
            if( jevelin_option( 'wc_sort' ) == 0 ) :
                remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
            endif;

            /* Woo loop items */
            add_filter( 'loop_shop_columns', 'jevelin_wc_loop_shop_columns', 1, 10 );

            /* Woo related products */
            if( jevelin_option( 'wc_related', true ) == false ) :
                add_filter('woocommerce_related_products_args', 'jevelin_wc_remove_related_products', 10);
            else :
                add_filter('woocommerce_output_related_products_args', 'jevelin_wc_related_products', 20);
            endif;
        endif;


		/* Add RSS feed links to <head> for posts and comments */
		add_theme_support( 'automatic-feed-links' );

		/* Enable support for Post Thumbnails, and declare two sizes */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 660, 420, true );
		add_image_size( 'jevelin-portrait', 420, 660, true );
		add_image_size( 'jevelin-square', 660, 660, true );
		add_image_size( 'jevelin-landscape-large', 1200, 675, true );

		/* Other init */
		add_theme_support( 'title-tag' );
		//add_theme_support( 'custom-background' );
		//add_theme_support( 'custom-header' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		/* Enable support for Post Formats */
		add_theme_support( 'post-formats', array(
			'gallery',
			'quote',
			'link',
			'video',
			'audio',
		) );

		/* Enable support for background color */
        $args = array(
        	'default-color' => jevelin_option('styling_body_background'),
        );
        add_theme_support( 'custom-background', $args );

        // Set Elementor options
        update_option( 'elementor_disable_color_schemes', 'yes' );
		update_option( 'elementor_disable_typography_schemes', 'yes' );

	}
	add_action( 'init', 'jevelin_general_setup' );
endif;


/**
 * Extend the default WordPress body classes
 */
if ( ! function_exists( 'jevelin_filter_theme_body_classes' ) ) :
	function jevelin_filter_theme_body_classes( $classes ) {

		if ( is_singular() && ! is_front_page() ) {
			$classes[] = 'singular';
		}

		$white_borders = ( esc_attr( jevelin_option('white_borders', false)) == true ) ? 'page-white-borders' : '';
        $white_borders_only_on_pages = jevelin_option('white_borders_only_on_pages', false);
		if( $white_borders ) {
            if( $white_borders_only_on_pages == false || is_page() ) {
			    $classes[] = $white_borders;
            }
		}

		$ipad_navigation = ( jevelin_option('ipad_landscape_full_navigation', false) == true ) ? 'sh-ipad-landscape-full-navigation' : '';
		if( $ipad_navigation ) {
			$classes[] = $ipad_navigation;
		}

        $header_mobile_layout = ( jevelin_option( 'header_mobile_spacing', 'compact' ) == 'compact'  ) ? 'sh-header-mobile-spacing-compact' : '';
        if( $header_mobile_layout ) {
            $classes[] = $header_mobile_layout;
        }

		$header_sticky = ( jevelin_option( 'header_sticky', true ) == true  ) ? 'sh-body-header-sticky' : '';
		if( $header_sticky ) {
			$classes[] = $header_sticky;
		}

		$footer_parallax = ( jevelin_option( 'footer_parallax', 'off' ) == 'on'  ) ? 'sh-footer-parallax' : '';
		if( $footer_parallax ) {
			$classes[] = $footer_parallax;
		}

        $blog_style = jevelin_option( 'blog_style', 'style1' );
		if( $blog_style == 'style2' ) {
			$classes[] = 'sh-blog-style2';
		} elseif( $blog_style == 'style3' ) {
            $classes[] = 'sh-jevelin-style3';
        }

        $woo_style = jevelin_option( 'wc_style', 'style1' );
		if( $woo_style == 'style3' ) {
            $classes[] = 'sh-woocommerce-style3';
        }

        $carousel_dots_style = jevelin_option( 'carousel_dots_style', 'style1' );
		if( $carousel_dots_style ) {
			$classes[] = 'carousel-dot-'.$carousel_dots_style;
		}

        $carousel_dots_spacing = jevelin_option( 'carousel_dots_spacing', '5px' );
		if( $carousel_dots_spacing ) {
			$classes[] = 'carousel-dot-spacing-'.$carousel_dots_spacing;
		}

        $carousel_dots_size = jevelin_option( 'carousel_dots_size', 'standard' );
		if( $carousel_dots_size ) {
			$classes[] = 'carousel-dot-size-'.$carousel_dots_size;
		}

        $carousel_dots_active_background_color = jevelin_option( 'carousel_dots_active_background_color' );
		if( $carousel_dots_active_background_color ) {
			$classes[] = 'carousel-dot-active-background';
		}

        $boxed_layout_val = jevelin_option('page_layout');
        $boxed_layout = ( isset( $boxed_layout_val['page_layout'] ) ) ? esc_attr($boxed_layout_val['page_layout']) : 'line';
        if( $boxed_layout == 'boxed' ) :
			$classes[] = 'sh-boxed-layout';
        endif;

        $header_layout = jevelin_header_layout();
		if( $header_layout == 'left-1' || $header_layout == 'left-2' ) {
			$classes[] = 'header-in-left-side';
		}

        if( jevelin_framework_active() && jevelin_option( 'notice_status', true ) == true ) :
            $classes[] = 'sh-page-notice-enabled';
        endif;

		return $classes;
	}
	add_filter( 'body_class', 'jevelin_filter_theme_body_classes', 1000, 2 );
endif;


/**
 * Extend the default WordPress post classes
 */
if ( ! function_exists( 'jevelin_filter_theme_body_classes' ) ) :
	function jevelin_post_classes( $classes ) {
		if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
			$classes[] = 'has-post-thumbnail';
		}
		return $classes;
	}

	add_filter( 'post_class', 'jevelin_filter_theme_body_classes' );
endif;


/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 */
if ( ! function_exists( 'jevelin_wp_title' ) ) :
	function jevelin_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() ) {
			return $title;
		}

		// Add the site name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title = "$title $sep $site_description";
		}

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 ) {
			$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'jevelin' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'jevelin_wp_title', 10, 2 );
endif;


/**
 * Theme Customizer support
 */
{

	/**
	 * Sanitize the Featured Content layout value.
	 *
	 * @param string $layout Layout type.
	 *
	 * @return string Filtered layout type (grid|slider).
	 * @internal
	 */
	function jevelin_fw_theme_sanitize_layout( $layout ) {
		if ( ! in_array( $layout, array( 'grid', 'slider' ) ) ) {
			$layout = 'grid';
		}

		return $layout;
	}

	/**
	 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
	 * @internal
	 */
	function jevelin_action_theme_customize_preview_js() {
		wp_enqueue_script(
			'jevelin-theme-customizer',
			get_template_directory_uri() . '/assets/admin/js/admin-customizer.js',
			array( 'customize-preview' ),
			'1.0',
			true
		);
	}

	add_action( 'customize_preview_init', 'jevelin_action_theme_customize_preview_js' );
}


/**
 * Theme Customizer support
 */
if ( defined( 'FW' ) ):
	/**
	 * Display current submitted FW_Form errors
	 * @return array
	 */
	if ( ! function_exists( 'jevelin_display_form_errors' ) ):
		function jevelin_display_form_errors() {
			$form = FW_Form::get_submitted();

			if ( ! $form || $form->is_valid() ) {
				return;
			}

			wp_enqueue_script(
				'jevelin-show-form-errors',
				get_template_directory_uri() . '/js/plugins/form-errors.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script( 'jevelin-show-form-errors', '_localized_form_errors', array(
				'errors'  => $form->get_errors(),
				'form_id' => $form->get_id()
			) );
		}
	endif;
	add_action('wp_enqueue_scripts', 'jevelin_display_form_errors');
endif;


/**
 * Register widget areas.
 */
if ( ! function_exists( 'jevelin_theme_widgets' ) ) :
	function jevelin_theme_widgets() {
		register_sidebar( array(
			'name'          => esc_html__( 'Blog Widgets', 'jevelin' ),
			'id'            => 'blog-widgets',
			'description'   => esc_html__( 'Appears in the blog page sidebar.', 'jevelin' ),
			'before_widget' => '<div id="%1$s" class="widget-item %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Page Widgets', 'jevelin' ),
			'id'            => 'page-widgets',
			'description'   => esc_html__( 'Appears in the page sidebar if widgets are added, otherwise footer widgets are used.', 'jevelin' ),
			'before_widget' => '<div id="%1$s" class="widget-item %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widgets', 'jevelin' ),
			'id'            => 'footer_widgets',
			'description'   => esc_html__( 'Appears in the page footer.', 'jevelin' ),
			'before_widget' => '<div id="%1$s" class="widget-item %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));

		register_sidebar( array(
			'name'          => esc_html__( 'WooCommerce Widgets', 'jevelin' ),
			'id'            => 'woocommerce-widgets',
			'description'   => esc_html__( 'Appears in the shop page sidebar.', 'jevelin' ),
			'before_widget' => '<div id="%1$s" class="widget-item %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));

        register_sidebar( array(
			'name'          => esc_html__( 'Portfolio Widgets', 'jevelin' ),
			'id'            => 'portfolio-widgets',
			'description'   => esc_html__( 'Can be used in builder widget area.', 'jevelin' ),
			'before_widget' => '<div id="%1$s" class="widget-item %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));

        register_sidebar( array(
			'name'          => esc_html__( 'Other Widgets', 'jevelin' ),
			'id'            => 'other-widgets',
			'description'   => esc_html__( 'Can be used in builder widget area.', 'jevelin' ),
			'before_widget' => '<div id="%1$s" class="widget-item %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
	}

	add_action( 'widgets_init', 'jevelin_theme_widgets' );
endif;


/**
 * Display current submitted FW_Form errors
 */
if ( defined( 'FW' ) && !function_exists( 'jevelin_form_errors' ) ):
	function jevelin_form_errors() {
		$form = FW_Form::get_submitted();

		if ( ! $form || $form->is_valid() ) {
			return;
		}

		wp_enqueue_script(
			'jevelin-theme-show-form-errors',
			get_template_directory_uri() . '/js/plugins/form-errors.js',
			array( 'jquery' ),
			'1.0',
			true
		);

		wp_localize_script( 'fw-theme-show-form-errors', '_localized_form_errors', array(
			'errors'  => $form->get_errors(),
			'form_id' => $form->get_id()
		) );
	}
	add_action('wp_enqueue_scripts', 'jevelin_form_errors');
endif;


/**
 * Woocommerce - change image sizes
 */
if( !function_exists('jevelin_woocommerce_image_sizes') ) :
    function jevelin_woocommerce_image_sizes() {
        global $pagenow;

        if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
            return;
        }
        $catalog = array(
            'width'     => '660',
            'height'    => '660',
            'crop'      => 1
        );
        $single = array(
            'width'     => '1024',
            'height'    => '1024',
            'crop'      => 0
        );
        $thumbnail = array(
            'width'     => '150',
            'height'    => '150',
            'crop'      => 1
        );

        // Image sizes
        update_option( 'shop_catalog_image_size', $catalog );
        update_option( 'shop_single_image_size', $single );
        update_option( 'shop_thumbnail_image_size', $thumbnail );
    }
    add_action( 'after_switch_theme', 'jevelin_woocommerce_image_sizes', 1 );
endif;


/**
 * Text dropcaps
 */
if ( ! function_exists( 'jevelin_editor_dropcaps' ) ) :
	add_filter( 'mce_buttons_2', 'jevelin_editor_dropcaps' );
	function jevelin_editor_dropcaps( $buttons ) {

	    array_unshift( $buttons, 'styleselect' );
	    return $buttons;

	}
endif;


/**
 * Text dropcaps init
 */
if ( ! function_exists( 'jevelin_editor_dropcaps_init' ) ) :
	add_filter( 'tiny_mce_before_init', 'jevelin_editor_dropcaps_init' );
	function jevelin_editor_dropcaps_init( $settings ) {

	    $style_formats = array(
	        array(
	            'title' => esc_html__('Dropcaps','jevelin'),
	            'inline' => 'span',
	            'classes' => 'sh-dropcaps',
	            'styles' => array(
	                'fontSize' => '18px',
	            )
	        ),

	        array(
	            'title' => esc_html__('Dropcaps Full Square','jevelin'),
	            'inline' => 'span',
	            'classes' => 'sh-dropcaps-full-square',
                'styles' => array(
                    'fontSize' => '18px',
                )
	        ),

            array(
                'title' => esc_html__('Dropcaps Full Square With Border', 'jevelin'),
                'inline' => 'span',
                'classes' => 'sh-dropcaps-full-square-border',
                'styles' => array(
                    'fontSize' => '18px',
                )
            ),

            array(
                'title' => esc_html__('Dropcaps Full Square With Tale', 'jevelin'),
                'inline' => 'span',
                'classes' => 'sh-dropcaps-full-square-tale',
                'styles' => array(
                    'fontSize' => '18px',
                )
            ),

            array(
                'title' => esc_html__('Dropcaps Square With 1px Borde', 'jevelin'),
                'inline' => 'span',
                'classes' => 'sh-dropcaps-square-border',
                'styles' => array(
                    'fontSize' => '18px',
                )
            ),

            array(
                'title' => esc_html__('Dropcaps Square With 2px Borde', 'jevelin'),
                'inline' => 'span',
                'classes' => 'sh-dropcaps-square-border2',
                'styles' => array(
                    'fontSize' => '18px',
                )
            ),

            array(
                'title' => esc_html__('Dropcaps Cricle', 'jevelin'),
                'inline' => 'span',
                'classes' => 'sh-dropcaps-circle',
                'styles' => array(
                    'fontSize' => '18px',
                )
            ),

	    );

        // $settings['style_formats'] = json_encode( $style_formats );
        // Use another styles defined by another module
        // See: https://support.shufflehound.com/forums/topic/incompatibility-with-tinymce-custom-styles-solution-included/
        // Copied from: tinymce-custom-styles.php
        // Add the array, JSON ENCODED, into 'style_formats', preserving anything already there
        if( isset($settings['style_formats']) ) :

            $json_decode_orig_settings = json_decode($settings['style_formats'], true);

            // Check to make sure incoming 'style_formats' is an array
            if( is_array($json_decode_orig_settings) ) :
                $newArray = array_merge($json_decode_orig_settings, $style_formats);
                $settings['style_formats'] = json_encode($newArray);
            else :
                $settings['style_formats'] = json_encode($style_formats);
            endif;

        else :
            $settings['style_formats'] = json_encode($style_formats);
        endif;

	    return $settings;

	}
endif;


/**
 * Text highlight
 */
if ( ! function_exists( 'jevelin_editor_text_background' ) ) :
	add_filter( 'mce_buttons_2', 'jevelin_editor_text_background' );
	function jevelin_editor_text_background( $buttons ){
	    array_splice( $buttons, 2, 0, 'backcolor' );
        array_splice( $buttons, 1, 0, 'fontsizeselect' );
	    return $buttons;
	}
endif;


function customize_text_sizes($initArray){
    $initArray['fontsize_formats'] = '10px 12px 13px 14px 16px 18px 21px 24px 30px 36px 40px 48px 60px';
    return $initArray;
}
add_filter('tiny_mce_before_init', 'customize_text_sizes');


/**
 * Get Host
 */
function jevelin_gethost($Address) {
    $parseUrl = parse_url(trim($Address));
    if( isset( $parseUrl['host'] ) ) :
        return trim($parseUrl['host'] ? $parseUrl['host'] : array_shift(explode('/', $parseUrl['path'], 2)));
    endif;
}


/**
 * Allowed_html
 */
function jevelin_allowed_html() {
    return array(
        'a' => array(
            'href' => array(),
            'title' => array()
        ),
        'br' => array(),
        'i' => array(),
        'style' => array(),
        'b' => array(
            'data' => array()
        ),
    );
}


/**
 * Allow iframe
 */
function jevelin_allow_iframe_tags( $multisite_tags ){
    $multisite_tags['iframe'] = array(
        'src' => true,
        'width' => true,
        'height' => true,
        'align' => true,
        'class' => true,
        'name' => true,
        'id' => true,
        'frameborder' => true,
        'seamless' => true,
        'srcdoc' => true,
        'sandbox' => true,
        'allowfullscreen' => true
    );
    return $multisite_tags;
}


function jevelin_allowed_html_form() {
    return array(
        'p' => array(),
        'sup' => array(),
        'div' => array(
            'class' => array(),
            'id' => array(),
            'style' => array()
        ),
        'form' => array(
            'data-fw-form-id' => array(),
            'data-fw-ext-forms-type' => array(),
            'id' => array(),
            'class' => array(),
            'action' => array(),
            'method' => array(),
            'style' => array(),
        ),
        'label' => array(
            'for' => array(),
        ),
        'input' => array(
            'type' => array(),
            'name' => array(),
            'placeholder' => array(),
            'value' => array(),
            'id' => array(),
            'class' => array(),
            'required' => array(),
        ),
        'select' => array(
            'type' => array(),
            'name' => array(),
            'placeholder' => array(),
            'value' => array(),
            'required' => array(),
            'id' => array(),
            'class' => array(),
        ),
        'option' => array(
            'value' => array(),
            'selected' => array(),
        ),
        'textarea' => array(
            'name' => array(),
            'placeholder' => array(),
            'id' => array(),
            'required' => array(),
        ),
    );
}

function jevelin_allowed_html_icons() {
    return array(
        'div' => array(
            'class' => array(),
            'id' => array(),
            'style' => array()
        ),
        'a' => array(
            'href' => array(),
            'target' => array(),
            'id' => array(),
            'class' => array(),
        ),
        'i' => array(
            'class' => array(),
        ),
    );
}

function jevelin_allowed_html_basic() {
    return array(
        'strong' => array(),
        'div' => array(
            'class' => array(),
            'id' => array(),
            'style' => array()
        ),
        'span' => array(
            'class' => array(),
            'id' => array(),
            'style' => array()
        ),
        'a' => array(
            'href' => array(),
            'target' => array(),
            'id' => array(),
            'class' => array(),
        ),
        'img' => array(
            'src' => array(),
            'class' => array(),
            'alt' => array(),
        ),
    );
}

function jevelin_allowed_html_icon_option() {
    return array(
        'i' => array(
            'class' => array(),
            'data-value' => array(),
            'data-group' => array()
        ),
    );
}


/**
 * Admin panel - Customizer Styling
 */
function jevelin_customizer_styles() { ?>
	<style>
        .fw-backend-option {
            opacity: 1!important;
        }

        .customize-control h3.sh-custom-group-divder {
            font-size: 24px!important;
            margin-bottom: 0px!important;
            line-height: 1.1!important;
        }

        .fw-backend-customizer-option .button.wp-color-result > .color-alpha {
            height: 28px!important;
        }

        <?php /* Fix for Unyson Framework 2.7.9 color picker issue */
        if( is_admin() && defined( 'FW' ) && defined('WP_PLUGIN_DIR') ) :
            $unyson = get_plugin_data( WP_PLUGIN_DIR. '/unyson/unyson.php' );
            if( isset( $unyson['Version'] ) && $unyson['Version'] == '2.7.9' ) : ?>

                .fw-backend-option-input-type-rgba-color-picker .wp-color-result span {
                    border: 1px solid rgba(16, 16, 16, 0.32)!important;
                }

                .fw-backend-option-input-type-rgba-color-picker .wp-color-result{
                    display: block;
                    width: 152px!important;
                    max-width: 152px!important;
                    height: 19px !important;
                    position: relative;
                }

                .fw-backend-option-input-type-rgba-color-picker .iris-palette {
                    height: 19.5784px!important;
                    width: 19.5784px!important;
                }

                .fw-backend-option-input-type-rgba-color-picker .wp-color-result:after {
                    display: none!important;
                }

            <?php elseif( isset( $unyson['Version'] ) && version_compare( $unyson['Version'], '2.7.9', '>' ) && !isset( $_GET['vc_actionx'] ) ) : ?>

                .wp-picker-container input[type=text].wp-color-picker {
                    display: inline-block!important;
                }

                .wp-picker-container .wp-color-result {
                    vertical-align: top;
                }

            <?php endif;
        endif; ?>
	</style>
	<?php

}
add_action( 'customize_controls_print_styles', 'jevelin_customizer_styles', 999 );


/**
 * Admin panel - styling
 */
if ( ! function_exists( 'jevelin_admin_styling' ) ) :
    add_action('admin_head', 'jevelin_admin_styling');
    function jevelin_admin_styling() { ?>

        <?php
            /* Gutenberg - Page Settings option reset to default fix */
        ?>
        <script type="text/javascript">
            /*
            * Gutenberg - Page Settings option reset to default fix
            */
            <?php if( jevelin_is_gutenberg_page() ) : ?>
                var GuttenbergPageSettingsFixAdded = 0;
                jQuery( function($) {


                    // while content is loading
                    function GuttenbergPageSettingsFix(){
                        if( document.readyState != "complete" ) {
                            if( $('#fw-options-box-page_settings ul.ui-tabs-nav.ui-widget-header > li').length ) {
                                $('#fw-options-box-page_settings ul.ui-tabs-nav.ui-widget-header > li').each( function() {
                                    $(this).find('a').trigger( 'click' );
                                });
                                $('#fw-options-box-page_settings ul.ui-tabs-nav.ui-widget-header > li:first-child > a').trigger( 'click' );
                                GuttenbergPageSettingsFixAdded++;
                                // console.log( 'tabs ready' );
                            }
                            if( GuttenbergPageSettingsFixAdded == 0 ) {
                                setTimeout( GuttenbergPageSettingsFix, 15 );
                            }
                        }
                    }
                    GuttenbergPageSettingsFix();


                    // when content is loaded
                    jQuery( window ).load( function() {
                        if( GuttenbergPageSettingsFixAdded == 0 ) {
                            $('#fw-options-box-page_settings ul.ui-tabs-nav.ui-widget-header > li').each( function() {
                                $(this).find('a').trigger( 'click' );
                            });
                            $('#fw-options-box-page_settings ul.ui-tabs-nav.ui-widget-header > li:first-child > a').trigger( 'click' );
                            // console.log( 'tabs ready' );
                            GuttenbergPageSettingsFixAdded++;
                        }
                    });


                    // Fix - Portfolio Custom Fields not working
                    if( $('body').hasClass('post-type-fw-portfolio') ) {
                        jQuery( window ).load( function() {
                            setTimeout(function() {
                                $('#fw-backend-option-fw-option-info .fw-option-box').each( function() {
                                    $(this).html( $(this).html() );
                                });
                            }, 500);
                            setTimeout(function() {
                                $('#fw-backend-option-fw-option-info .fw-option-box').each( function() {
                                    $(this).html( $(this).html() );
                                });
                            }, 3000);
                        });

                        $( ".block-editor" ).on( "click", "#fw-backend-option-fw-option-info .dashicons-no-alt", function() {
                            $(this).closest('.fw-option-box.fw-backend-options-virtual-context').remove();
                        });

                        $( ".block-editor" ).on( "click", "#fw-backend-option-fw-option-info .hndle.ui-sortable-handle", function() {
                            if( $(this).parent().hasClass('closed') ) {
                                $(this).parent().removeClass('closed');
                            } else {
                                $(this).parent().addClass('closed');
                            }
                        });
                    }


                });
            <?php endif; ?>
        </script>

        <?php /* If portfolio page */ ?>
        <?php
        if( jevelin_is_gutenberg_page() ) : ?>
            <?php if( defined( 'FW' ) && jevelin_framework() != 'redux' ) : ?>
                <script>
                    jQuery(function($){
                        $(window).load(function (){
                            if( $('body').hasClass('post-type-fw-portfolio') && $('.components-panel__body .editor-post-featured-image').length ) {
                                setTimeout(function() { $('.components-panel__body .editor-post-featured-image').parent().hide(); }, 10);
                                setTimeout(function() { $('.components-panel__body .editor-post-featured-image').parent().hide(); }, 100);
                                setTimeout(function() { $('.components-panel__body .editor-post-featured-image').parent().hide(); }, 300);
                                setTimeout(function() { $('.components-panel__body .editor-post-featured-image').parent().hide(); }, 800);
                            }
                        });
                    });
                </script>
                <style media="screen">
                    .post-type-fw-portfolio .components-panel__body .editor-post-featured-image {
                        display: none!important;
                    }
                </style>
            <?php elseif( defined( 'FW' ) && jevelin_framework() == 'redux' ) : ?>
                <style media="screen">
                    .post-type-fw-portfolio #fw-options-box-general.project-gallery-postbox.postbox-with-fw-options,
                    .post-type-fw-portfolio #fw-options-box-general.project-gallery-postbox.postbox-with-fw-options + #postimagediv.postbox {
                        display: none!important;
                    }
                </style>
            <?php endif; ?>

        <?php elseif( defined( 'FW' ) && jevelin_framework() == 'redux' ) : ?>
            <style media="screen">
                .post-type-fw-portfolio #fw-options-box-general.project-gallery-postbox.postbox-with-fw-options {
                    display: none!important;
                }
            </style>
        <?php endif; ?>


        <script type="text/javascript">
            function htmlDecode(value) {
               return (typeof value === 'undefined') ? '' : jQuery('<div/>').html(value).text();
            }

            jQuery(function($){
                /* Improve Unyson page builder ease of use */
                <?php if( isset( $_GET['post'] ) && isset( $_GET['action'] ) && $_GET['post'] > 0 && $_GET['action'] == 'edit' ) : ?>
                    $(window).load(function (){
                        var builder_scrollTop = localStorage.getItem('fw_builder_scroll');
                        if( builder_scrollTop != 'null' && builder_scrollTop > 0 ) {
                            $(window).scrollTop( builder_scrollTop );
                            setTimeout(function(){ $(window).scrollTop( builder_scrollTop ); }, 950);
                            setTimeout(function(){ $(window).scrollTop( builder_scrollTop ); }, 1500);
                            var builder_scrollTop_active = 0;
                            $(window).blur(function() {
                                $(window).focus(function() {
                                    if( builder_scrollTop_active == 0) {
                                        builder_scrollTop_active++;
                                        $(window).scrollTop( builder_scrollTop );
                                        setTimeout(function(){ $(window).scrollTop( builder_scrollTop ); }, 100);
                                    }
                                });
                            });
                            $(window).focus(function() {
                                builder_scrollTop_active++;
                            });
                            localStorage.fw_builder_scroll = 0;
                        }

                        jQuery( 'body' ).on( 'click', '.fw-builder-header-tools', function( e ) {
                            if( $(e.target).hasClass('fw-builder-header-post-save-button') ) {
                                localStorage.fw_builder_scroll = $(window).scrollTop();
                            }
                        });
                    });
                <?php endif; ?>


                /* Post format meta box show */
                <?php if( jevelin_is_gutenberg_page() ) : ?>

                    jQuery( window ).load( function() {
                        var post_format = $('.editor-post-format .editor-post-format__content select option:selected').val();
                        if( post_format != 0 ) {
                            $('#fw-options-box-post-format-0').hide();
                            $('#fw-options-box-post-format-gallery').hide();
                            $('#fw-options-box-post-format-quote').hide();
                            $('#fw-options-box-post-format-link').hide();
                            $('#fw-options-box-post-format-video').hide();
                            $('#fw-options-box-post-format-audio').hide();
                            $('#fw-options-box-post-format-'+post_format).show();

                            if( post_format == 'standard' ) {
                                $('#fw-options-box-post-format-0').show();
                            }
                        }

                        $('.editor-post-format .editor-post-format__content select').on( 'change', function() {
                            var post_format_change = $(this).find('option:selected').val();
                            $('#fw-options-box-post-format-0').hide();
                            $('#fw-options-box-post-format-gallery').hide();
                            $('#fw-options-box-post-format-quote').hide();
                            $('#fw-options-box-post-format-link').hide();
                            $('#fw-options-box-post-format-video').hide();
                            $('#fw-options-box-post-format-audio').hide();
                            $('#fw-options-box-post-format-'+ post_format_change ).show();

                            if( post_format_change == 'standard' ) {
                                $('#fw-options-box-post-format-0').show();
                            }
                        });
                    });

                <?php else : ?>

                    var post_format = $('input[name=post_format]:checked', '#post-formats-select').val();
                    if( post_format != 0 ) {
                        $('#fw-options-box-post-format-'+post_format).show();
                    } else {
                        $('#fw-options-box-post-format-0').show();
                    }

                    $('input[name=post_format]').on( 'change', function() {
                        var post_format_change = $(this).val();

                        $('#fw-options-box-post-format-0').hide();
                        $('#fw-options-box-post-format-gallery').hide();
                        $('#fw-options-box-post-format-quote').hide();
                        $('#fw-options-box-post-format-link').hide();
                        $('#fw-options-box-post-format-video').hide();
                        $('#fw-options-box-post-format-audio').hide();
                        $('#fw-options-box-post-format-'+ post_format_change ).show();
                    });

                <?php endif; ?>


                var timeoutId;
                $(document).on('widget-updated widget-added', function(){
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(function(){ // wait a few milliseconds for html replace to finish
                        fwEvents.trigger('fw:options:init', { $elements: $('#widgets-right .fw-theme-admin-widget-wrap') });
                    }, 100);
                });

                $('.mega-menu-column-new-row').parent().parent().remove();

                $('.sh-demo-install-issues-button').on('click', function(){
                    $('.sh-demo-install-issues').toggle('fast');
                });

                $(window).load(function() {
                    $('body').removeClass( 'sh-adminbody-loading' );
                });

                /* Visual Composer Comptatibility Mode to fix Unyson Builder Related isues */
		        <?php if( is_plugin_active( 'js_composer/js_composer.php' ) ) : ?>
		        	//console.log('VC Mode');
			    	if( $('#page_template').val() == 'page-vc.php' ) {
						jQuery(window).load(function () {
			                setTimeout(function(){
								jQuery('.button.button-primary.page-builder-hide-button').trigger('click');
							}, 1000);

							if( jQuery('.composer-switch').hasClass('vc_backend-status') ) {
								jQuery('.wp-editor-expand').css( 'visibility', 'hidden' ).css( 'height', '0' );
								jQuery('#fw-options-box-page-builder-box').css( 'visibility', 'hidden' ).css( 'height', '0' );
							}
						});
			    	}

			    	$("#page_template").on('change', function() {
			    		if( $('#page_template').val() == 'page-vc.php' && jQuery('.composer-switch').hasClass('vc_backend-status') ) {
			    			$('#fw-option-input--page-builder').remove();
			                jQuery('.button.button-primary.page-builder-hide-button').trigger('click');
							if( jQuery('.composer-switch').hasClass('vc_backend-status') ) {
								jQuery('.wp-editor-expand').css( 'visibility', 'hidden' ).css( 'height', '0' );
								jQuery('#fw-options-box-page-builder-box').css( 'visibility', 'hidden' ).css( 'height', '0' );
							}
			    		}
			    	});
		    	<?php endif; ?>

                <?php global $pagenow;
                if( $pagenow == 'nav-menus.php' ) : ?>
                    $(".publishing-action input.menu-save").on( 'click', function() {
                        $('.mega-menu-title-off-label .mega-menu-title-off').remove();
                    });
                <?php endif; ?>

            });
        </script>
        <style type="text/css">
            <?php /* Fix for Unyson Framework 2.7.9 color picker issue */
            if( is_admin() && defined( 'FW' ) && defined('WP_PLUGIN_DIR') ) :
                $unyson = get_plugin_data( WP_PLUGIN_DIR. '/unyson/unyson.php' );
                if( isset( $unyson['Version'] ) && $unyson['Version'] == '2.7.9' ) : ?>

                    .fw-backend-option-input-type-rgba-color-picker .wp-color-result span {
                        border: 1px solid rgba(16, 16, 16, 0.32)!important;
                    }

                    .fw-backend-option-input-type-rgba-color-picker .wp-color-result{
                        display: block;
                        width: 152px!important;
                        max-width: 152px!important;
                        height: 19px !important;
                        position: relative;
                    }

                    .fw-backend-option-input-type-rgba-color-picker .iris-palette {
                        height: 19.5784px!important;
                        width: 19.5784px!important;
                    }

                    .fw-backend-option-input-type-rgba-color-picker .wp-color-result:after {
                        display: none!important;
                    }

                <?php elseif( isset( $unyson['Version'] ) && version_compare( $unyson['Version'], '2.7.9', '>' ) && !isset( $_GET['vc_actionx'] ) ) : ?>

                    .wp-picker-container input[type=text].wp-color-picker {
                        display: inline-block!important;
                    }

                    .wp-picker-container .wp-color-result {
                        vertical-align: top;
                    }

                <?php endif; ?>
            <?php endif; ?>

            .notice.fw-brz-dismiss {
                display: none!important;
            }

            .fw-shortcode-item .fw-ext-builder-icon:before {
                font-family: "themify";
            }

            .widget-inside .fw-backend-option-type-multi-picker .fw-backend-option {
                padding-left: 0px!important;
                padding-right: 0px!important;
            }

            .sh-demo-install-descr {
                padding-top: 4px;
                padding-bottom: 4px;
            }

            .sh-demo-install-issues-button {
                display: inline-block;
                position: relative;
                background-color: #40413c;
                color: #fff!important;
                text-transform: uppercase;
                font-weight: 600;
                border-radius: 100px;
                height: 40px;
                line-height: 38px;
                text-decoration: none;
                border: none;
                font-size: 13px;
                text-shadow: none;
                padding: 0 22px;
                margin: 15px 0;
                margin-top: 0px;
                transition: 0.3s all ease-in-out;
                outline: none;
                -webkit-box-shadow: none!important;
                box-shadow: none!important;
            }

            .sh-demo-install-issues-button:hover,
            .sh-demo-install-issues-button:focus {
                background-color: #353531;
                outline: none!important;
            }

            .sh-demo-install-issues {
                display: none;
                border: 2px solid #d6d6d6;
                padding: 25px;
                background-color: #fff;
                margin: 15px 0;
            }

            .sh-demo-install-issues,
            .sh-demo-install-issues * {
                font-size: 14px;
            }

            .sh-demo-install-issues-intro {
                margin-bottom: 0px;
            }

            .sh-demo-install-issues-intro-last {
                margin-bottom: 20px;
            }

            .sh-demo-install-issues p {
                margin-top: 0px;
            }

            .sh-demo-install-issues p:last-child {
                margin-bottom: 0px;
            }

            #fw-options-box-post-format-gallery,
            #fw-options-box-post-format-quote,
            #fw-options-box-post-format-link,
            #fw-options-box-post-format-video,
            #fw-options-box-post-format-audio,
            .mega-menu-column-new-row {
                display: none;
            }

            .fw-options-box-page-builder-box,
            .fw-options-box-page-builder-box * {
                transform: translate3d(0, 0, 0);
                -webkit-transform: translate3d(0, 0, 0);
                -webkit-perspective: 1000;
                perspective: 1000;
                -webkit-backface-visibility:hidden;
                backface-visibility:hidden;
                -webkit-transform-style: preserve-3d;
                transform-style: preserve-3d;
            }

            #setting-error-tgmpa {
                display: block!important;
            }

            #sh_post_thumbs {
                width: 100px;
                max-width: 100px;
            }

            .sh_post_thumbs img {
                width: 100px;
                height: auto;
            }

            .fw-modal .media-modal.wp-core-ui {
        		z-index: 9999 !important;
        	}

        	.fw-modal .media-modal-backdrop {
        		z-index: 999 !important;
        	}

            /* Disable mega menu column hide option  */
            label.mega-menu-title-off-label {
                display: none!important;
            }

            <?php
                $accent_color = ( function_exists( 'fw_get_db_customizer_option' ) && fw_get_db_customizer_option('accent_color') ) ? fw_get_db_customizer_option('accent_color') : '';
                if( $accent_color ) :
            ?>

                .sh-revslider-button2 {
                    background-color: <?php echo esc_attr( $accent_color ); ?>!important;
                }

            <?php endif; ?>




            <?php
            // AMP styling
            if( jevelin_option('amp_mode') != 'all' && jevelin_option('amp_mode') != 'disabled' ) : ?>
                #theme_support_standard,
                #theme_support_transitional,
                label[for="theme_support_standard"],
                label[for="theme_support_transitional"] {
                    opacity: 0.5;
                    cursor: default;
                }

                #amp-settings:before {
                    display: block;
                    content: "Jevelin AMP optimized mode is enabled (supports only reader mode). You can disable it under Jevelin Settings > AMP > AMP Mode (by setting it to All)";
                    color: red;
                }
            <?php endif; ?>
        </style>
    <?php }
endif;




/**
 * Shortcode Options
*/
if ( !function_exists( 'jevelin_shortcode_options' ) && defined('FW')) :
    function jevelin_shortcode_options($data,$shortcode){

        $atts = shortcode_parse_atts( $data['atts_string'] );
        if( is_array($atts) ) :
            $atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);
        endif;

        return $atts;
    }
endif;
