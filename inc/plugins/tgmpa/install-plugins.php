<?php
/**
 * Load TGM Plugin
 */
if( is_admin() && !function_exists('jevelin_register_required_plugins') ) :
    require_once ( trailingslashit( get_template_directory() ) . '/inc/plugins/tgmpa/tgmpa.php' );
    function jevelin_register_required_plugins() {

        tgmpa( array(
            array(
                'order'     => 0,
                'name'      => esc_html__( 'Redux Framework', 'jevelin' ),
                'desc'      => 'Adds main theme settings for controling layouts, colors, fonts etc',
                'image'     => 'redux.png',
                'slug'      => 'redux-framework',
                'required'  => true,
            ),

            array(
                'order'     => 1,
                'name'      => esc_html__( 'WPBakery Page Builder', 'jevelin' ),
                'desc'      => 'Main page builder (formerly Visual Composer). Build a responsive website and manage your content easily with intuitive WordPress Front end editor',
                'image'     => 'wpbakery.png',
                'slug'      => 'js_composer',
                'source'    => 'https://cdn.shufflehound.com/theme-plugins/wpbakery-page-builder-89UBoHSXC/wpbakery-page-builder-6.8.0.zip',
                'required'  => true,
                'version'   => '6.8.0',
            ),

            array(
                'order'     => 3,
                'name'      => esc_html__( 'Slider Revolution', 'jevelin' ),
                'desc'      => 'Slider Revolution is a new way to build rich & dynamic slides',
                'image'     => 'slider-revolution.png',
                'slug'      => 'revslider',
                'source'    => 'https://cdn.shufflehound.com/theme-plugins/slider-revolution-Tvq6Y9lU9/slider-revolution-6.5.12.zip',
                'required'  => true,
                'version'   => '6.5.12',
            ),

            array(
                'order'     => 4,
                'name'      => esc_html__( 'One Click Demo Import', 'jevelin' ),
                'desc'      => 'Install demo content, widgets and theme settings with one click',
                'image'     => 'ocdi.png',
                'slug'      => 'one-click-demo-import',
                'required'  => false,
            ),

            array(
                'order'     => 5,
                'name'      => esc_html__( 'Contact Form 7', 'jevelin' ),
                'desc'      => 'Manage multiple contact forms, customize the form and the mail contents flexibly',
                'image'     => 'contact-form-7.png',
                'slug'      => 'contact-form-7',
                'required'  => false,
            ),

            array(
                'order'     => 6,
                'name'      => esc_html__( 'WooCommerce', 'jevelin' ),
                'desc'      => 'Most customizable eCommerce platform for building online business',
                'image'     => 'woocommerce.png',
                'slug'      => 'woocommerce',
                'required'  => false,
            ),

            array(
                'order'     => 7,
                'name'      => esc_html__( 'Yellow Pencil Pro', 'jevelin' ),
                'desc'      => 'Visual CSS style editor',
                'image'     => 'yellow-pencil.png',
                'slug'      => 'waspthemes-yellow-pencil',
                'source'    => 'https://cdn.shufflehound.com/theme-plugins/yellow-pencil-ws2BVHf6h/yellow-pencil-7.5.3.zip',
                'required'  => false,
                'version'   => '7.5.3',
            ),

            /*array(
                'order'     => 7,
                'name'      => esc_html__( 'WP Instagram Widget', 'jevelin' ),
                'desc'      => 'WordPress widget to showcase your latest Instagram pics',
                'image'     => 'instagram.png',
                'slug'      => 'wp-instagram-widget',
                'source'    => trailingslashit( get_template_directory() ) . '/inc/plugins/wp-instagram-widget.zip',
                'required'  => false,
                'version'   => '2.0.4',
            ),*/

            array(
                'order'     => 8,
                'name'      => esc_html__( 'MailChimp for WordPress', 'jevelin' ),
                'desc'      => 'Flexible, user-friendly and good looking sign-up forms for your Mailchimp list.',
                'image'     => 'mailchimp.png',
                'slug'      => 'mailchimp-for-wp',
                'required'  => false,
            ),

            array(
                'order'     => 9,
                'name'      => esc_html__( 'Envato Market', 'jevelin' ),
                'desc'      => 'Receive updates to premium Themes & Plugins purchased through Envato Market',
                'image'     => 'envato.png',
                'slug'      => 'envato-market',
                'source'    => trailingslashit( get_template_directory() ) . '/inc/plugins/envato-market.zip',
                'required'  => false,
                'version'   => '2.0.1',
            ),

            array(
                'order'     => 10,
                'name'      => esc_html__( 'AMP', 'jevelin' ),
                'desc'      => 'Enable AMP on your WordPress site, the WordPress way (works best with Reader mode)',
                'image'     => 'amp.png',
                'slug'      => 'amp',
                'required'  => false,
            ),

            array(
                'order'     => 11,
                'name'      => esc_html__( 'Elementor Page Builder', 'jevelin' ),
                'desc'      => esc_html__( 'Secondary theme page builder. One of the worlds leading WordPress website builders', 'jevelin' ),
                'image'     => 'elementor.png',
                'slug'      => 'elementor',
                'required'  => false,
            ),


            array(
                'order'     => 12,
                'name'      => esc_html__( 'Unyson Framework (deprecated)', 'jevelin' ),
                'desc'      => 'Adds theme settings, layouts and other major components',
                'image'     => 'unyson.jpg',
                'slug'      => 'unyson',
                'required'  => false,
            ),
        ), array( 'is_automatic' => true ));

    }
    add_action( 'tgmpa_register', 'jevelin_register_required_plugins' );
endif;
