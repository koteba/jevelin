<?php
/*
Element: Image Gallery
*/

class vcj_image_animated extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_image_animated', array( $this, '_html' ) );
    }


    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }

        vc_map(
            array(
                'name' => __('Image Animated', 'jevelin'),
                'base' => 'vcj_image_animated',
                'description' => __('Simple animated image', 'jevelin'),
                'category' => __('Jevelin Elements', 'jevelin'),
                'icon' => get_template_directory_uri().'/img/builder-icon.png',
                'params' => array(

                    array(
                        'param_name' => 'image',
                        'heading' => __( 'Image', 'gillion' ),
                        'value' => __( 'Choose image (must be wider than 2000px)', 'gillion' ),
                        'type' => 'attach_image',
                        'admin_label' => true,
                    ),

                    array (
                        'param_name' => 'animation_speed',
                        'heading' => 'Animation Speed',
                        'description' => 'Choose animation speed (depends on how wide is image)',
                        'value' => array (
                            'Fastest' => '10',
                            'Fast' => '25',
                            'Normal' => '50',
                            'Slow' => '100',
                            'Slowest' => '150',
                        ),
                        'type' => 'dropdown',
                        'class' => '',
                        'std' => '100',
                        'group' => 'Styling',
                    ),

                ),
            )
        );
    }


    public function _html( $atts ) {
        /* Get Values */
        extract( shortcode_atts( array(
            'image' => '',
            'animation_speed' => '10',
            'css' => 'none'
        ), $atts ));
        $image = ( $image > 0 ) ? wp_get_attachment_image_src( $image , 'full' ) : '';

        /* Set Classes */
        $class = array();
        $settings_base = !empty( $this->settings['base'] ) ? $this->settings['base'] : '';
        $class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $settings_base, $atts );
        ob_start(); ?>

            <div class="vcg-image-animated sh-loop-animation <?php echo implode( ' ', $class ); ?>">
                <?php if( isset( $image[0] ) ) : ?>
                    <div class="sh-loop-animation-item" style="animation-duration: <?php echo intval( $animation_speed ); ?>s;">
                        <img src="<?php echo esc_url( $image[0] ); ?>" alt="" />
                    </div>
                    <div class="sh-loop-animation-item" style="animation-duration: <?php echo intval( $animation_speed ); ?>s;">
                        <img src="<?php echo esc_url( $image[0] ); ?>" alt="" />
                    </div>
                    <div class="sh-loop-animation-item" style="animation-duration: <?php echo intval( $animation_speed ); ?>s;">
                        <img src="<?php echo esc_url( $image[0] ); ?>" alt="" />
                    </div>
                <?php endif; ?>
            </div>

        <?php return ob_get_clean();
    }

}
new vcj_image_animated();
