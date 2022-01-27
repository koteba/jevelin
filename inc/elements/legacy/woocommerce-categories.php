<?php
class vcj_woocommerce_categories extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_woocommerce_categories', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Woocommerce Categories',
  'base' => 'vcj_woocommerce_categories',
  'description' => 'Enter event details',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'categories',
      'heading' => 'Blog Categories',
      'description' => 'Choose which blog categories you want to show',
      'value' => '',
      'type' => 'exploded_textarea',
      'class' => '',
      'std' => '',
      'group' => '',
    ),
    1 => 
    array (
      'param_name' => 'columns',
      'heading' => 'Columns',
      'description' => 'Choose columns count',
      'value' => 
      array (
        '2 columns' => 2,
        '3 columns' => 3,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '3',
      'group' => '',
      'admin_label' => true,
    ),
    2 => 
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
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/woocommerce-categories/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/woocommerce-categories/static.php';
        if( function_exists( 'jevelin_shortcode_woocommerce_categories_css' ) ) :
            jevelin_shortcode_woocommerce_categories_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_woocommerce_categories();