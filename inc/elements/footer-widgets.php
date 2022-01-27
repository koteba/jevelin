<?php
/*
Element: Footer Widgets
*/

class vcj_footer_widgets extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_footer_widgets', array( $this, '_html' ) );
    }


    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }

        vc_map(
            array(
                'name' => __('Footer Widgets Builder', 'jevelin'),
                'base' => 'vcj_footer_widgets',
                'description' => __('Add widgets in WPbakery based footer', 'jevelin'),
                'category' => __('Jevelin Elements', 'jevelin'),
                'icon' => get_template_directory_uri().'/img/builder-icon.png',
                'params' => array(

                    array (
                        'param_name' => 'columns',
                        'heading' => 'Columns',
                        'description' => 'Choose widgets columns count',
                        'value' =>
                        array (
                            '1 Columns' => '1',
                            '2 Columns' => '2',
                            '3 Columns' => '3',
                            '4 Columns' => '4',
                            '5 Columns' => '5',
                        ),
                        'type' => 'dropdown',
                        'std' => '3',
                    ),

                    array (
                        'param_name' => 'columns_gap',
                        'heading' => 'Columns Gap',
                        'description' => 'Select gap between columns in row.',
                        'value' =>
                        array (
                            '1px' => '1px',
                            '2px' => '2px',
                            '3px' => '3px',
                            '4px' => '4px',
                            '5px' => '5px',
                            '10px' => '10px',
                            '15px' => '15px',
                            '20px' => '20px',
                            '30px' => '30px',
                            '35px' => '35px',
                            '40px' => '40px',
                            '50px' => '50px',
                            '60px' => '60px',
                        ),
                        'type' => 'dropdown',
                        'std' => '30px',
                    ),

                    array (
                        'param_name' => 'preset',
                        'heading' => 'Color Preset',
                        'description' => 'Choose color preset, that can be overwritten by color options',
                        'value' =>
                        array (
                            'Dark Text' => 'dark',
                            'Light Text' => 'light',
                        ),
                        'type' => 'dropdown',
                        'std' => 'dark',
                    ),

                    array(
                        'param_name' => 'text_size',
                        'heading' => __( 'Text Font Size', 'jevelin' ),
                        'description' => __( 'Enter text font size (Note: CSS measurement units allowed).', 'jevelin' ),
                        'type' => 'textfield',
                        'std' => '',
                    ),

                    array(
                        'param_name' => 'heading_size',
                        'heading' => __( 'Heading Font Size', 'jevelin' ),
                        'description' => __( 'Enter heading size (Note: CSS measurement units allowed).', 'jevelin' ),
                        'type' => 'textfield',
                        'std' => '',
                    ),

                    array (
                        'param_name' => 'heading_font_weight',
                        'heading' => 'Heading Font Weight',
                        'description' => 'Choose heading font weight',
                        'value' => array (
                            'Default' => 'default',
                            'Extra Light' => 200,
                            'Light' => 300,
                            'Regular' => 400,
                            'Semi-Bold' => 600,
                            'Bold' => 700,
                            'Extra Bold' => 900,
                        ),
                        'type' => 'dropdown',
                        'class' => '',
                        'std' => '700',
                    ),

                    array (
                        'param_name' => 'headings_status',
                        'heading' => 'Show Headings',
                        'description' => __( 'Enable or disable footer headings', 'jevelin' ),
                        'value' => array (
                            'Disabled' => 'disabled',
                            'Enabled' => 'enabled',
                        ),
                        'type' => 'dropdown',
                        'std' => 'enabled',
                    ),

                    array(
                        'param_name' => 'line_height',
                        'heading' => __( 'Line Height', 'jevelin' ),
                        'description' => __( 'Enter line height (Note: CSS measurement units allowed).', 'jevelin' ),
                        'type' => 'textfield',
                        'std' => '',
                    ),

                    array (
                        'param_name' => 'source',
                        'heading' => 'Widget Source',
                        'description' => 'Modify widgets <a href="'.admin_url( '/widgets.php' ).'" target="_blank">here</a>. If necessary, you can choose other widget source than footer widgets',
                        'value' =>
                        array (
                            'Footer Widgets' => 'footer_widgets',
                            'Blog Widgets' => 'blog-widgets',
                            'Page Widgets' => 'page-widgets',
                            'WooCommerce Widgets' => 'woocommerce-widgets',
                            'Other Widgets' => 'other-widgets',
                        ),
                        'type' => 'dropdown',
                        'std' => 'footer_widgets',
                    ),

                    array (
                        'param_name' => 'heading_color',
                        'heading' => 'Heading Color',
                        'description' => 'Select heading color',
                        'type' => 'colorpicker',
                        'group' => 'Colors',
                    ),

                    array (
                        'param_name' => 'text_color',
                        'heading' => 'Text Color',
                        'description' => 'Select text color',
                        'type' => 'colorpicker',
                        'group' => 'Colors',
                    ),

                    array (
                        'param_name' => 'link_color',
                        'heading' => 'Link Color',
                        'description' => 'Select link color',
                        'type' => 'colorpicker',
                        'group' => 'Colors',
                    ),

                    array (
                        'param_name' => 'link_hover_color',
                        'heading' => 'Link Hover Color',
                        'description' => 'Select link hover color',
                        'type' => 'colorpicker',
                        'group' => 'Colors',
                    ),

                    array (
                        'param_name' => 'icon_color',
                        'heading' => 'Icon Color',
                        'description' => 'Select icon color',
                        'type' => 'colorpicker',
                        'group' => 'Colors',
                    ),

                    array (
                        'param_name' => 'border_color',
                        'heading' => 'Border Color',
                        'description' => 'Select border color',
                        'type' => 'colorpicker',
                        'group' => 'Colors',
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
            'columns' => '3',
            'columns_gap' => '30px',
            'css' => 'none',
            'text_size' => '',
            'heading_size' => '',
            'heading_font_weight' => 'default',
            'headings_status' => 'enabled',
            'line_height' => '',
            'source' => 'footer_widgets',
            'preset' => 'dark',
            'heading_color' => '',
            'text_color' => '',
            'link_color' => '',
            'link_hover_color' => '',
            'icon_color' => '',
            'border_color' => '',
        ), $atts ) );


        // HTML
        $id = 'sh-footer-builder-widgets-'.jevelin_rand();
        $element_class = array();
        $element_class[] = $id;
        $element_class[] = 'sh-footer-builder-widgets-'.$columns.'columns';
        $settings_base = !empty( $this->settings['base'] ) ? $this->settings['base'] : '';
        $element_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $settings_base, $atts );


        // Preset
        if( $preset == 'light' ) :
            $colors = (object)array(
                'heading_color' => '#ffffff',
                'text_color' => '#e3e3e3',
                'link_color' => '#ffffff',
                'link_hover_color' => '#47c9e5',
                'icon_color' => '#f7f7f7',
                'border_color' => 'rgba(255,255,255,0.10)',
            );
        else :
            $colors = (object)array(
                'heading_color' => '#505050',
                'text_color' => '#8d8d8d',
                'link_color' => '#505050',
                'link_hover_color' => '#8d8d8d',
                'icon_color' => '#8d8d8d',
                'border_color' => '#ececec',
            );
        endif;


        // Colors
        if( $heading_color ) :
            $colors->heading_color = $heading_color;
        endif;

        if( $text_color ) :
            $colors->text_color = $text_color;
        endif;

        if( $link_color ) :
            $colors->link_color = $link_color;
        endif;

        if( $link_hover_color ) :
            $colors->link_hover_color = $link_hover_color;
        endif;

        if( $icon_color ) :
            $colors->icon_color = $icon_color;
        endif;

        if( $border_color ) :
            $colors->border_color = $border_color;
        endif;

        $columns_gap = (int)$columns_gap;
        ob_start(); ?>

            <style media="screen">
                <?php if( $columns_gap && $columns_gap != '30px' ) : ?>
                    #<?php echo esc_attr( $id ); ?> {
                        margin-left: -<?php echo ( $columns_gap ) / 2; ?>px;
                        margin-right: -<?php echo ( $columns_gap ) / 2; ?>px;
                    }

                    #<?php echo esc_attr( $id ); ?> > div {
                        padding-left: <?php echo ( $columns_gap ) / 2; ?>px;
                        padding-right: <?php echo ( $columns_gap ) / 2; ?>px;
                    }
                <?php endif; ?>

                <?php if( $headings_status == 'disabled' ) : ?>
                #<?php echo esc_attr( $id ); ?> .widget-title {
                    display: none;
                }
                <?php endif; ?>

                <?php if( $text_size ) : ?>
                    #<?php echo esc_attr( $id ); ?> {
                        font-size: <?php echo esc_attr( $text_size ); ?>;
                    }
                <?php endif; ?>

                <?php if( $line_height ) : ?>
                    #<?php echo esc_attr( $id ); ?> {
                        line-height: <?php echo esc_attr( $line_height ); ?>;
                    }
                <?php endif; ?>

                <?php if( $heading_size ) : ?>
                    #<?php echo esc_attr( $id ); ?> h3,
                    #<?php echo esc_attr( $id ); ?> h3.widget-title {
                        font-size: <?php echo esc_attr( $heading_size ); ?>;
                    }
                <?php endif; ?>

                <?php if( $heading_font_weight != 'default' ) : ?>
                    #<?php echo esc_attr( $id ); ?> h3,
                    #<?php echo esc_attr( $id ); ?> h3.widget-title {
                        font-weight: <?php echo esc_attr( $heading_font_weight ); ?>;
                    }
                <?php endif; ?>

                #<?php echo esc_attr( $id ); ?> h3,
                #<?php echo esc_attr( $id ); ?> h3.widget-title {
                    color: <?php echo esc_attr( $colors->heading_color ); ?>
                }

                #<?php echo esc_attr( $id ); ?>,
            	#<?php echo esc_attr( $id ); ?> .sh-recent-posts-widgets-item-meta a {
            		color: <?php echo esc_attr( $colors->text_color ); ?>;
            	}

            	#<?php echo esc_attr( $id ); ?> i:not(.icon-link),
            	#<?php echo esc_attr( $id ); ?> .widget_recent_entries li:before {
            		color: <?php echo esc_attr( $colors->icon_color ); ?>!important;
            	}

            	#<?php echo esc_attr( $id ); ?> ul li,
            	#<?php echo esc_attr( $id ); ?> ul li,
            	#<?php echo esc_attr( $id ); ?> .sh-recent-posts-widgets .sh-recent-posts-widgets-item {
            		border-color: <?php echo esc_attr( $colors->border_color ); ?>;
            	}

            	#<?php echo esc_attr( $id ); ?> a,
            	#<?php echo esc_attr( $id ); ?> li a,
            	#<?php echo esc_attr( $id ); ?> h6,
            	#<?php echo esc_attr( $id ); ?> .product-title,
            	#<?php echo esc_attr( $id ); ?> .woocommerce-Price-amount {
            		color: <?php echo esc_attr( $colors->link_color ); ?>!important;
            	}

            	#<?php echo esc_attr( $id ); ?> a:hover,
            	#<?php echo esc_attr( $id ); ?> li a:hover,
            	#<?php echo esc_attr( $id ); ?> h6:hover {
            		color: <?php echo esc_attr( $colors->link_hover_color ); ?>!important;
            	}

                .sh-footer-builder-widgets {
                    position: relative;
                    margin-bottom: -25px;
                    margin-left: -15px;
                    margin-right: -15px;
                }

                .sh-footer-builder-widgets > div {
                    display: inline-block;
                    width: 100%;
                    vertical-align: top;
                    padding: 0 15px;
                    margin-bottom: 25px;
                    margin-right: -4px;
                }

                @media (min-width: 800px) {
                    .sh-footer-builder-widgets-2columns > div {
                        width: 50%;
                    }

                    .sh-footer-builder-widgets-3columns > div {
                        width: 33.3%;
                    }

                    .sh-footer-builder-widgets-4columns > div {
                        width: 25%;
                    }

                    .sh-footer-builder-widgets-5columns > div {
                        width: 20%;
                    }
                }

                @media (max-width: 800px) {
                    .sh-footer-builder-widgets > div:not(:last-child) {
                        margin-bottom: 40px;
                    }

                    .sh-footer-builder-widgets > div:last-child {
                        margin-bottom: 0px;
                    }
                }
            </style>

            <div<?php echo $id ? ' id="'.$id.'" ' : ''; ?> class="sh-footer-builder-widgets <?php echo implode( ' ', $element_class ); ?>">
                <?php
                    /* Show theme footer widgets */
                    if( $source != 'footer_widgets' ) :
                        if( is_active_sidebar( $source ) ) :
                            dynamic_sidebar( $source );
                        endif;
                    else :
                        if( is_active_sidebar( 'footer-widgets' ) ) :
                            dynamic_sidebar( 'footer-widgets' );
                        elseif( is_active_sidebar( 'footer_widgets' ) ) :
                            dynamic_sidebar( 'footer_widgets' );
                        endif;
                    endif;
                ?>
            </div>

        <?php return ob_get_clean();
    }

}
new vcj_footer_widgets();
