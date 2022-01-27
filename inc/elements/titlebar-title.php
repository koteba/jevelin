<?php
/*
Element: Empty Space (responsive)
*/

class vcj_titlebar_title extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_titlebar_title', array( $this, '_html' ) );
    }


    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }

        vc_map(
            array(
                'name' => __('Titlebar Title', 'jevelin'),
                'base' => 'vcj_titlebar_title',
                //'description' => __('Blank space with custom height', 'jevelin'),
                'category' => __('Jevelin Single Elements', 'jevelin'),
                'icon' => get_template_directory_uri().'/img/builder-icon.png',
                'params' => array(

                    array (
                        'param_name' => 'heading',
                        'heading' => 'Heading',
                        //'description' => 'Select main style',
                        'value' => array (
                            'H1' => 'h1',
                            'H2' => 'h2',
                            'H3' => 'h3',
                            'H4' => 'h4',
                            'H5' => 'h5',
                            'H6' => 'h6',
                        ),
                        'type' => 'dropdown',
                        'std' => 'h1',
                    ),

                    array (
                        'param_name' => 'align',
                        'heading' => 'Alignment',
                        //'description' => 'Select main style',
                        'value' => array (
                            esc_attr( 'Left', 'jevelin' ) => 'left',
                            esc_attr( 'Center', 'jevelin' ) => 'center',
                            esc_attr( 'Right', 'jevelin' ) => 'right',
                        ),
                        'type' => 'dropdown',
                    ),

                    array (
                        'param_name' => 'font_size',
                        'heading' => __( 'Font Size', 'jevelin' ),
                        'description' => __( 'Enter font size (Note: CSS measurement units allowed).', 'jevelin' ),
                        'type' => 'textfield',
                        'std' => '',
                    ),

                    array (
                        'param_name' => 'text_color',
                        'heading' => 'Text Color',
                        'type' => 'colorpicker',
                        //'group' => __( 'Text', 'jevelin' ),
                        //'edit_field_class' => 'vc_col-xs-6',
                    ),



                    array(
                        'param_name' => 'class',
                        'heading' => __( 'Extra class name', 'jevelin' ),
                        'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'jevelin' ),
                        'type' => 'textfield',
                    ),

            		array(
            			'param_name' => 'css',
            			'type' => 'css_editor',
            			'heading' => __( 'CSS box', 'jevelin' ),
            			'group' => __( 'Design Options', 'jevelin' ),
            		),

                ),
            )
        );

    }


    public function _html( $atts ) {
        // Params extraction
        extract( shortcode_atts( array(
            'heading' => 'h1',
            'align' => 'left',
            'font_size' => '',
            'text_color' => '',
            'class' => '',
            'css' => 'none'
        ), $atts ) );

        // HTML
        $id = 'sh-element-titlebar-title-'.jevelin_rand();
        $element_class = array();
        $element_class[] = $class;
        $settings_base = !empty( $this->settings['base'] ) ? $this->settings['base'] : '';
        $element_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $settings_base, $atts );

        $default_home = esc_html__( 'Home', 'jevelin' );
        $default_blog = esc_html__( 'Blog', 'jevelin' );
        $default_portfolio = esc_html__( 'Portfolio', 'jevelin' );
        $default_404 = esc_html__( '404', 'jevelin' );
        ob_start(); ?>

            <style media="screen">
                <?php if( $text_color ) : ?>
                    #<?php echo esc_attr( $id ); ?> .sh-element-titlebar-title-content {
                        color: <?php echo esc_attr( $text_color ); ?>;
                    }
                <?php endif; ?>

                <?php if( $font_size ) : ?>
                    #<?php echo esc_attr( $id ); ?> .sh-element-titlebar-title-content {
                        font-size: <?php echo jevelin_addpx( $font_size ); ?>;
                    }
                <?php endif; ?>


                .sh-element-titlebar-title .sh-element-titlebar-title-content {
                    margin-top: 0;
                    margin-bottom: 0;
                    line-height: 1;
                }
            </style>


            <div class="sh-element-titlebar-title" id="<?php echo esc_attr( $id ); ?>">
                <<?php echo esc_attr( $heading ); ?> class="sh-element-titlebar-title-content text-<?php echo esc_attr( $align ); ?>">
                    <?php
                        wp_reset_postdata();
                        if( ( is_front_page() && is_home() ) || is_front_page() ) :
                            echo esc_attr( jevelin_option( 'titlebar-home-title', $default_home ) );
                        elseif( is_home() ) :
                            echo get_the_title( jevelin_page_id() );
                        elseif( is_404() ) :
                            echo esc_attr( jevelin_option( 'titlebar-404-title', $default_404 ) );
                        elseif( is_search() ) :
                            printf(esc_html__('Search Results for "%s"', 'jevelin'), get_search_query());
                        elseif( jevelin_is_realy_woocommerce_page() ) :
                            echo esc_attr( jevelin_option( 'titlebar-blog-woocommerce' ) );
                        elseif( is_archive() ) :
                            echo get_the_archive_title();
                        elseif( is_page() ) :
                            echo get_the_title();
                        elseif( is_author() ) :
                            echo get_the_author();
                        elseif( is_singular( 'fw-portfolio' ) ) :
                            echo esc_attr( jevelin_option( 'titlebar-portfolio-title', $default_portfolio ) );
                        elseif( is_singular( 'post' ) || get_option('page_for_posts', true) ) :
                            echo esc_attr( jevelin_option( 'titlebar-post-title', $default_blog ) );
                        else :
                            echo get_the_title();
                        endif;
                    ?>
                </<?php echo esc_attr( $heading ); ?>>
            </div>

        <?php return ob_get_clean();
    }

}
new vcj_titlebar_title();
