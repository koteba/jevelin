<?php
class vcj_woocommerce_recent_products_ajax extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_woocommerce_recent_products_ajax', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Woocommerce Recent Products Ajax',
  'base' => 'vcj_woocommerce_recent_products_ajax',
  'description' => 'Recent AJAX WooCommerce products',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'posts_per_page',
      'heading' => 'Show Posts',
      'description' => 'Choose how many posts will be shown. Notice: Currently this element works only when using one instance per page',
      'value' => 12,
      'type' => 'textfield',
      'class' => '',
      'std' => 12,
      'group' => '',
    ),
    1 => 
    array (
      'param_name' => 'load_more',
      'heading' => 'Load More Posts Per Page',
      'description' => 'Choose how many items will be loaded',
      'value' => 4,
      'type' => 'textfield',
      'class' => '',
      'std' => 4,
      'group' => '',
    ),
    2 => 
    array (
      'param_name' => 'pagination_type',
      'heading' => 'Pagination Type',
      'description' => 'Choose pagination type',
      'value' => 
      array (
        'Load More button (on click)' => 'button',
        'Infinite loading (on scroll)' => 'infinite',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'button',
      'group' => '',
    ),
    3 => 
    array (
      'param_name' => 'columns',
      'heading' => 'Columns',
      'description' => 'Choose column count',
      'value' => 
      array (
        'Columns 3' => 3,
        'Columns 4' => 4,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '4',
      'group' => '',
      'admin_label' => true,
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/woocommerce-recent-products-ajax/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/woocommerce-recent-products-ajax/static.php';
        if( function_exists( 'jevelin_shortcode_woocommerce_recent_products_ajax_css' ) ) :
            jevelin_shortcode_woocommerce_recent_products_ajax_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_woocommerce_recent_products_ajax();