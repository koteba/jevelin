<?php
class vcj_blog_posts extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_blog_posts', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Blog Posts',
  'base' => 'vcj_blog_posts',
  'description' => 'Recent blog posts',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'limit',
      'heading' => 'Limit posts',
      'description' => 'Choose post limit. Choose 41 posts to select unlimited posts',
      'value' => 6,
      'type' => 'textfield',
      'class' => '',
      'std' => 6,
      'group' => 'General',
      'admin_label' => true,
    ),
    1 => 
    array (
      'param_name' => 'style',
      'heading' => 'Style',
      'description' => 'Choose main style for recent posts',
      'value' => 
      array (
        'Masonry 2.0' => 'masonry masonry2',
        'Masonry Shadow' => 'masonry masonry-shadow',
        'Masonry Standard' => 'masonry',
        'Grid 2.0' => 'grid masonry2',
        'Grid' => 'grid',
        'Mix' => 'mix masonry2',
        'Large Images' => 'large',
        'Medium Images' => 'medium',
        'Small Images' => 'small',
        'Date only' => 'largedate',
        'Image only' => 'largeimage',
        'Minimalistic' => 'minimalistic',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'masonry',
      'group' => 'General',
      'admin_label' => true,
    ),
    2 => 
    array (
      'param_name' => 'columns',
      'heading' => 'Columns',
      'description' => 'Choose columns count',
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
    3 => 
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
      'group' => 'General',
    ),
    4 => 
    array (
      'param_name' => 'categories',
      'heading' => 'Blog Categories',
      'description' => 'Choose which blog categories you want to show',
      'value' => '',
      'type' => 'exploded_textarea',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    5 => 
    array (
      'param_name' => 'tags',
      'heading' => 'Blog Tags',
      'description' => 'Choose which blog tags you want to show',
      'value' => '',
      'type' => 'exploded_textarea',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    6 => 
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
    7 => 
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
    8 => 
    array (
      'param_name' => 'margin_bottom',
      'heading' => 'Bottom Posts Margin',
      'description' => 'Here you can set custom bottom post margin (top right bottom left). For example: 30px',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    9 => 
    array (
      'param_name' => 'pagination',
      'heading' => 'Pagination',
      'description' => 'Enable or disable element pagination',
      'value' => 
      array (
        'Off' => 'off',
        'On' => 'on',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'off',
      'group' => 'Pagination',
    ),
    10 => 
    array (
      'param_name' => 'categories_switch',
      'heading' => 'Categories Switch',
      'description' => 'Enable or disable element categories switch',
      'value' => 
      array (
        'Off' => 'off',
        'On' => 'on',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'off',
      'group' => 'Categories Switch',
    ),
    11 => 
    array (
      'param_name' => 'title_color',
      'heading' => 'Title Color',
      'description' => '',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    12 => 
    array (
      'param_name' => 'title_size',
      'heading' => 'Title Size',
      'description' => 'Enter title size (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    13 => 
    array (
      'param_name' => 'content_color',
      'heading' => 'Content Color',
      'description' => '',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    14 => 
    array (
      'param_name' => 'content_size',
      'heading' => 'Content Size',
      'description' => 'Enter content size (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    15 => 
    array (
      'param_name' => 'category_color',
      'heading' => 'Category Color',
      'description' => '',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    16 => 
    array (
      'param_name' => 'category_size',
      'heading' => 'Category Size',
      'description' => 'Enter category size (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    17 => 
    array (
      'param_name' => 'category_transform',
      'heading' => 'Category Text Transform',
      'description' => '',
      'value' => 
      array (
        'Default' => 'default',
        'None' => 'none',
        'Uppercase' => 'uppercase',
        'Lowercase' => 'lowercase',
        'Capitalize' => 'capitalize',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'default',
      'group' => 'Styling',
    ),
    18 => 
    array (
      'param_name' => 'readmore_color',
      'heading' => 'Read More Color',
      'description' => '',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    19 => 
    array (
      'param_name' => 'readmore_size',
      'heading' => 'Read More Size',
      'description' => 'Enter read more size (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    20 => 
    array (
      'param_name' => 'readmore_transform',
      'heading' => 'Read More Text Transform',
      'description' => '',
      'value' => 
      array (
        'Default' => 'default',
        'None' => 'none',
        'Uppercase' => 'uppercase',
        'Lowercase' => 'lowercase',
        'Capitalize' => 'capitalize',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'default',
      'group' => 'Styling',
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/blog-posts/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/blog-posts/static.php';
        if( function_exists( 'jevelin_shortcode_blog_posts_css' ) ) :
            jevelin_shortcode_blog_posts_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_blog_posts();