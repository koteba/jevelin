<?php
/*
Element: Empty Space (responsive)
*/

class vcj_empty_space extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_empty_space', array( $this, '_html' ) );
    }


    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }

        vc_map(
            array(
                'name' => __('Empty Space (responsive)', 'jevelin'),
                'base' => 'vcj_empty_space',
                'description' => __('Blank space with custom height', 'jevelin'),
                'category' => __('Jevelin Elements', 'jevelin'),
                'icon' => get_template_directory_uri().'/img/builder-icon.png',
                'params' => array(

                    array(
                        'param_name' => 'height',
                        'heading' => __( 'Height', 'jevelin' ),
                        'description' => __( 'Enter empty space height (Note: CSS measurement units allowed).', 'jevelin' ),
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => '',
                        'std' => '32px',
                        'admin_label' => true,
                    ),

                    array(
                        'param_name' => 'height_tablet',
                        'heading' => __( 'Height (tablet and mobile)', 'jevelin' ),
                        'description' => __( 'Enter empty space height in tablet and mobile (Note: CSS measurement units allowed).', 'jevelin' ),
                        'type' => 'textfield',
                    ),

                    array(
                        'param_name' => 'id',
                        'heading' => __( 'Element ID', 'jevelin' ),
                        'description' => __( 'Enter element ID (Note: make sure it is unique and valid according to <a href="https://www.w3schools.com/tags/att_global_id.asp" target="_blank">w3c specification</a>).', 'jevelin' ),
                        'type' => 'textfield',
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
            'height' => '32px',
            'height_tablet' => '',
            'id' => '',
            'class' => '',
            'css' => 'none'
        ), $atts ) );

        // HTML
        $element_id = $id;
        $id = 'sh-empty-space-'.jevelin_rand();
        $element_class = array();
        $element_class[] = $id;
        $element_class[] = $class;
        $settings_base = !empty( $this->settings['base'] ) ? $this->settings['base'] : '';
        $element_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $settings_base, $atts );
        ob_start(); ?>

            <?php if( $height_tablet ) : ?>
                <style media="screen">
                    @media (max-width: 1025px) {
                        .<?php echo esc_attr( $id ); ?> {
                            height: <?php echo $height_tablet; ?>!important;
                        }
                    }
                </style>
            <?php endif; ?>

            <div <?php echo $element_id ? 'id="'.$element_id.'" ' : ''; ?>class="sh-empty-space vc_empty_space <?php echo implode( ' ', $element_class ); ?>" style="height: <?php echo ( is_numeric( $height ) ) ? $height.'px' : $height; ?>">
                <span class="vc_empty_space_inner"></span>
            </div>

        <?php return ob_get_clean();
    }

}
new vcj_empty_space();
