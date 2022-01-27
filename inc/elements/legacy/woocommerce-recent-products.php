<?php
class vcj_woocommerce_recent_products extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_woocommerce_recent_products', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Woocommerce Recent Products',
  'base' => 'vcj_woocommerce_recent_products',
  'description' => 'Recent WooCommerce products',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'per_page',
      'heading' => 'Limit',
      'description' => 'Choose products limit',
      'value' => 12,
      'type' => 'textfield',
      'class' => '',
      'std' => 12,
      'group' => '',
    ),
    1 => 
    array (
      'param_name' => 'columns',
      'heading' => 'Columns',
      'description' => 'Choose product column count',
      'value' => 5,
      'type' => 'textfield',
      'class' => '',
      'std' => 5,
      'group' => '',
      'admin_label' => true,
    ),
    2 => 
    array (
      'param_name' => 'carousel',
      'heading' => 'Carousel',
      'description' => 'Enable or disable carousel',
      'value' => 
      array (
        'Off' => false,
        'On' => true,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => false,
      'group' => '',
    ),
    3 => 
    array (
      'param_name' => 'order_by',
      'heading' => 'Order By',
      'description' => 'Choose product order by',
      'value' => 
      array (
        'Date' => 'date',
        'Name' => 'name',
        'Author' => 'author',
        'Random' => 'rand',
        'Comment Count' => 'comment_count',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'date',
      'group' => '',
    ),
    4 => 
    array (
      'param_name' => 'order',
      'heading' => 'Order',
      'description' => 'Choose product order',
      'value' => 
      array (
        'Ascending' => 'asc',
        'Descending' => 'desc',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'desc',
      'group' => '',
    ),
    5 => 
    array (
      'param_name' => 'style',
      'heading' => 'Style',
      'description' => 'Choose item style',
      'value' => 
      array (
        'Style 1' => 'style1',
        'Style 2' => 'style2',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'style1',
      'group' => '',
    ),
    6 => 
    array (
      'param_name' => 'filter',
      'heading' => 'Filter',
      'description' => 'Select filter style or disable it',
      'value' => 
      array (
        'None' => 'none',
        'Style 1' => 'default',
        'Style 2' => 'style2',
        'Style 3' => 'style3',
        'Style 4' => 'style3 sh-portfolio-filter-style4',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'none',
      'group' => '',
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/woocommerce-recent-products/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/woocommerce-recent-products/static.php';
        if( function_exists( 'jevelin_shortcode_woocommerce_recent_products_css' ) ) :
            jevelin_shortcode_woocommerce_recent_products_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_woocommerce_recent_products();