<?php
/*
Element: Empty Space (responsive)
*/

class vcj_titlebar_breadcrumbs extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_titlebar_breadcrumbs', array( $this, '_html' ) );
    }


    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }

        vc_map(
            array(
                'name' => __('Titlebar Breadcrumbs', 'jevelin'),
                'base' => 'vcj_titlebar_breadcrumbs',
                //'description' => __('Blank space with custom height', 'jevelin'),
                'category' => __('Jevelin Single Elements', 'jevelin'),
                'icon' => get_template_directory_uri().'/img/builder-icon.png',
                'params' => array(

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
                        'param_name' => 'text_color',
                        'heading' => 'Text Color',
                        'type' => 'colorpicker',
                        //'group' => __( 'Text', 'jevelin' ),
                        //'edit_field_class' => 'vc_col-xs-6',
                    ),

                    array (
                        'param_name' => 'link_color',
                        'heading' => 'Link Color',
                        'type' => 'colorpicker',
                        //'group' => __( 'Text', 'jevelin' ),
                        //'edit_field_class' => 'vc_col-xs-6',
                    ),

                    array (
                        'param_name' => 'link_hover_color',
                        'heading' => 'Link Hover Color',
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
            'align' => 'left',
            'heading' => '32px',
            'text_color' => '',
            'link_color' => '',
            'link_hover_color' => '',
            'class' => '',
            'css' => 'none'
        ), $atts ) );

        // HTML
        $id = 'sh-element-titlebar-breadcrumbs-'.jevelin_rand();
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
                    #<?php echo esc_attr( $id ); ?> #breadcrumbs {
                        color: <?php echo esc_attr( $text_color ); ?>;
                    }
                <?php endif; ?>

                <?php if( $link_color ) : ?>
                    #<?php echo esc_attr( $id ); ?> #breadcrumbs a {
                        color: <?php echo esc_attr( $link_color ); ?>;
                    }
                <?php endif; ?>

                <?php if( $link_hover_color ) : ?>
                    #<?php echo esc_attr( $id ); ?> #breadcrumbs a:hover,
                    #<?php echo esc_attr( $id ); ?> #breadcrumbs a:focus {
                        color: <?php echo esc_attr( $link_hover_color ); ?>;
                    }
                <?php endif; ?>


                /*.sh-element-titlebar-title .sh-element-titlebar-title-content {
                    margin-top: 0;
                    margin-bottom: 0;
                    line-height: 1;
                }*/
            </style>


            <div id="<?php echo esc_attr( $id ); ?>" class="sh-element-titlebar-breadcrumbs text-<?php echo esc_attr( $align ); ?>">
                <div class="title-level">
                    <?php
                        wp_reset_postdata();
                        echo jevelin_breadcrumbs( array(
                            'home_title' => esc_attr( jevelin_option( 'titlebar-home-title', $default_home ) ),
                        ));
                    ?>
                </div>
            </div>

        <?php return ob_get_clean();
    }

}
new vcj_titlebar_breadcrumbs();
