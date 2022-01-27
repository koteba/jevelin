<?php
/*
Element: Empty Space (responsive)
*/

class vcj_single_woocommerce_addtocart extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_single_woocommerce_addtocart', array( $this, '_html' ) );
    }


    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }

        vc_map(
            array(
                'name' => __('Single Add to Cart', 'jevelin'),
                'base' => 'vcj_single_woocommerce_addtocart',
                //'description' => __('Blank space with custom height', 'jevelin'),
                'category' => __('Jevelin Single Elements', 'jevelin'),
                'icon' => get_template_directory_uri().'/img/builder-icon.png',
                'params' => array(

                    array(
                        'param_name' => 'product_id',
                        'heading' => __( 'Enter Product ID', 'jevelin' ),
                        'description' => __( 'Enter product ID which will be added to cart', 'jevelin' ),
                        'type' => 'textfield',
                    ),

                    array (
                        'param_name' => 'align',
                        'heading' => 'Alignment',
                        'description' => 'Choose content alignment',
                        'value' =>
                        array (
                            'Left' => 'left',
                            'Center' => 'center',
                            'Right' => 'right',
                        ),
                        'type' => 'dropdown',
                        'class' => '',
                        'std' => 'left',
                        'group' => 'Styling',
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
            'product_id' => '',
            'align' => 'left',
            'class' => '',
            'css' => 'none'
        ), $atts ) );

        // HTML
        $element_class = array();
        $element_class[] = $class;
        $settings_base = !empty( $this->settings['base'] ) ? $this->settings['base'] : '';
        $element_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $settings_base, $atts );
        ob_start(); ?>

            <style media="screen">
                .sh-element-woocommerce-addtocart .button {
                    font-weight: bold;
                    font-size: 14px;
                }

                .sh-element-woocommerce-addtocart .added_to_cart {
                    display: none;
                }
            </style>

            <div class="sh-element-woocommerce-addtocart text-<?php echo esc_attr( $align ); ?>">
                <?php if( class_exists( 'WooCommerce' ) && $product_id > 0 && get_post_type( $product_id ) == 'product' ) : ?>
                    <div class="product">
                        <a href="?add-to-cart=<?php echo intval( $product_id ); ?>" data-quantity="1"
                            class="button product_type_simple add_to_cart_button ajax_add_to_cart sh-heading-color sh-accent-color-hover" data-product_id="<?php echo intval( $product_id ); ?>" data-product_title="<?php echo get_the_title( $product_id ); ?>"
                            data-product_sku="" aria-label="Add “<?php echo get_the_title( $product_id ); ?>” to your cart" rel="nofollow">
                            <?php echo esc_attr__( 'Add to cart', 'jevelin' ); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        <?php return ob_get_clean();
    }

}
new vcj_single_woocommerce_addtocart();
