<?php
class vcj_image_points extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_image_points', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Image Points',
  'base' => 'vcj_image_points',
  'description' => 'Information on image',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'image',
      'heading' => 'Image',
      'description' => 'Upload a image',
      'value' => '',
      'type' => 'attach_image',
      'class' => '',
      'std' => '',
      'group' => '',
    ),
    1 => 
    array (
      'param_name' => 'points',
      'heading' => 'Points',
      'description' => 'Here you can add, remove and edit your Points.',
      'value' => '',
      'type' => 'param_group',
      'class' => '',
      'std' => '',
      'group' => '',
      'params' => 
      array (
        0 => 
        array (
          'type' => 'textfield',
          'heading' => 'Top / Bottom Alignment',
          'description' => 'Select the top edge alignment percentege (0% for top edge 100% for bottom edge)',
          'param_name' => 'top',
          'value' => 20,
        ),
        1 => 
        array (
          'type' => 'textfield',
          'heading' => 'Left / Right Alignment',
          'description' => 'Select the top edge alignment percentege (0% for left edge 100% for right edge)',
          'param_name' => 'left',
          'value' => 20,
        ),
        2 => 
        array (
          'type' => 'textarea',
          'heading' => 'Content',
          'description' => 'Enter your content',
          'param_name' => 'content',
          'value' => '',
        ),
      ),
    ),
    2 => 
    array (
      'param_name' => 'style',
      'heading' => 'Style',
      'description' => 'Choose main style',
      'value' => 
      array (
        'Style 1 (smaller pointers)' => 'style1',
        'Style 2 (larger pointers)' => 'style2',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'style1',
      'group' => '',
      'admin_label' => true,
    ),
    3 => 
    array (
      'param_name' => 'pointer_color',
      'heading' => 'Pointer Color',
      'description' => 'Select button color or leave blank for white color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => '',
    ),
    4 => 
    array (
      'param_name' => 'source',
      'heading' => 'Image Source',
      'description' => 'Choose image source size',
      'value' => 
      array (
        'Large Size' => 'large',
        'Full Size' => 'full',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'large',
      'group' => '',
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/image-points/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/image-points/static.php';
        if( function_exists( 'jevelin_shortcode_image_points_css' ) ) :
            jevelin_shortcode_image_points_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_image_points();