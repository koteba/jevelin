<?php
class vcj_portfolio_fancy extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_portfolio_fancy', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Portfolio Fancy',
  'base' => 'vcj_portfolio_fancy',
  'description' => 'Show your portfolio',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'image_ratio',
      'heading' => 'Image Ratio',
      'description' => 'Choose default image ratio',
      'value' => 
      array (
        'Fluid' => 'fluid',
        'Landscape' => 'landscape',
        'Portrait' => 'portrait',
        'Square' => 'square',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'fluid',
      'group' => 'General',
      'admin_label' => true,
    ),
    1 => 
    array (
      'param_name' => 'columns',
      'heading' => 'Columns',
      'description' => 'Select column count',
      'value' => 
      array (
        '2 columns' => 2,
        '3 columns' => 3,
        '4 columns' => 4,
        '5 columns' => 5,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '3',
      'group' => 'General',
      'admin_label' => true,
    ),
    2 => 
    array (
      'param_name' => 'categories',
      'heading' => 'Categories',
      'description' => 'Select categories',
      'value' => '',
      'type' => 'exploded_textarea',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    3 => 
    array (
      'param_name' => 'limit',
      'heading' => 'Limit',
      'description' => 'Enter item limit (default 6, infinite -1)',
      'value' => '6',
      'type' => 'textfield',
      'class' => '',
      'std' => '6',
      'group' => 'General',
    ),
    4 => 
    array (
      'param_name' => 'spacing',
      'heading' => 'Spacing',
      'description' => 'Enter portfolio item spacing (with px)',
      'value' => '15px',
      'type' => 'textfield',
      'class' => '',
      'std' => '15px',
      'group' => 'General',
    ),
    5 => 
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
      'group' => 'General',
    ),
    6 => 
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
      'group' => 'General',
    ),
    7 => 
    array (
      'param_name' => 'page_link',
      'heading' => 'Page Link',
      'description' => 'Enable or disable portfolio page link',
      'value' => 
      array (
        'Off' => false,
        'On' => true,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => true,
      'group' => 'General',
    ),
    8 => 
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
        'Style 4 (light background)' => 'style3 sh-portfolio-filter-style4',
        'Style 5 (dark background)' => 'style3 sh-portfolio-filter-style4 sh-portfolio-filter-style5',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'default',
      'group' => 'Filter',
    ),
    9 => 
    array (
      'param_name' => 'filter_alignment',
      'heading' => 'Filter Alignment',
      'description' => 'Select filter alignment',
      'value' => 
      array (
        'Left' => 'left',
        'Center' => 'center',
        'Right' => 'right',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'center',
      'group' => 'Filter',
    ),
    10 => 
    array (
      'param_name' => 'filter_mobile_alignment',
      'heading' => 'Mobile Filter Alignment',
      'description' => 'Select mobile filter alignment',
      'value' => 
      array (
        'Left' => 'left',
        'Center' => 'center',
        'Right' => 'right',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'center',
      'group' => 'Filter',
    ),
    11 => 
    array (
      'param_name' => 'filter_icon',
      'heading' => 'Filter Icon',
      'description' => 'Select filter icon',
      'value' => 'icon-layers',
      'type' => 'iconpicker',
      'class' => '',
      'std' => 'icon-layers',
      'group' => 'Filter',
      'settings' => 
      array (
        'emptyIcon' => true,
        'type' => 'jevelin_vc_icons',
      ),
    ),
    12 => 
    array (
      'param_name' => 'padding',
      'heading' => 'Padding',
      'description' => 'Enter your custom margin (<b>top right bottom left</b>)',
      'value' => '0px 0px 0px 0px',
      'type' => 'textfield',
      'class' => '',
      'std' => '0px 0px 0px 0px',
      'group' => 'Filter',
    ),
    13 => 
    array (
      'param_name' => 'padding_mobile',
      'heading' => 'Custom Mobile Padding',
      'description' => 'Enable or disable custom mobile paddings',
      'value' => 
      array (
        'Off' => 'off',
        'On' => 'on',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'off',
      'group' => 'Filter',
    ),
    14 => 
    array (
      'param_name' => 'padding',
      'heading' => 'Mobile Padding',
      'description' => 'Enter your custom mobile padding (<b>top right bottom left</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '0px 0px 0px 0px',
      'group' => 'Filter',
      'dependency' => 
      array (
        'element' => 'padding_mobile',
        'value' => 'on',
      ),
    ),
    15 => 
    array (
      'param_name' => 'overlay_color',
      'heading' => 'Overlay Color',
      'description' => 'Choose overlay color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Colors',
    ),
    16 => 
    array (
      'param_name' => 'overlay_second_color',
      'heading' => 'Overlay Second Color',
      'description' => 'Choose overlay second color to change color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Colors',
    ),
    17 => 
    array (
      'param_name' => 'pagination',
      'heading' => 'Pagination',
      'description' => 'Enable or disable portfolio pagination',
      'value' => 
      array (
        'Off' => false,
        'On' => true,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => false,
      'group' => 'Pagination',
    ),
    18 => 
    array (
      'param_name' => 'pagination_filters',
      'heading' => 'Pagination Filters',
      'description' => 'Enable or disable portfolio pagination filters',
      'value' => 
      array (
        'Off' => false,
        'On' => true,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => false,
      'group' => 'Pagination',
    ),
    19 => 
    array (
      'param_name' => 'pagination_per_page',
      'heading' => 'Projects Per Page',
      'description' => 'Enter projects per page limit (default: 6)',
      'value' => '6',
      'type' => 'textfield',
      'class' => '',
      'std' => '6',
      'group' => 'Pagination',
    ),
    20 => 
    array (
      'param_name' => 'lazy',
      'heading' => 'Lazy Loading',
      'description' => 'Choose to enable to disable lazy loading',
      'value' => 
      array (
        'Default (from theme settings)' => 'default',
        'Disabled' => 'disabled',
        'Enabled' => 'enabled',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'default',
      'group' => 'Lazy Loading',
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/portfolio-fancy/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/portfolio-fancy/static.php';
        if( function_exists( 'jevelin_shortcode_portfolio_fancy_css' ) ) :
            jevelin_shortcode_portfolio_fancy_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_portfolio_fancy();