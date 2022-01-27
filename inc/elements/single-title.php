<?php
/*
Element: Empty Space (responsive)
*/

class vcj_single_title extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_single_title', array( $this, '_html' ) );
    }


    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }

        vc_map(
            array(
                'name' => __('Single Title', 'jevelin'),
                'base' => 'vcj_single_title',
                //'description' => __('Blank space with custom height', 'jevelin'),
                'category' => __('Jevelin Single Elements', 'jevelin'),
                'icon' => get_template_directory_uri().'/img/builder-icon.png',
                'params' => array(

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
            'heading' => '32px',
            'class' => '',
            'css' => 'none'
        ), $atts ) );

        // HTML
        $element_class = array();
        $element_class[] = $class;
        $settings_base = !empty( $this->settings['base'] ) ? $this->settings['base'] : '';
        $element_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $settings_base, $atts );
        ob_start(); ?>

            <div class="sh-element-post-single">
                <h2>
                    <?php
                        if( is_single() ) :
                            wp_reset_postdata();
                            the_title();
                        else :
                            esc_attr_e( 'Single title', 'jevelin' );
                        endif;
                    ?>
                </h2>
            </div>

        <?php return ob_get_clean();
    }

}
new vcj_single_title();
