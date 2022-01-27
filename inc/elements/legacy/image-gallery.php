<?php
class vcj_image_gallery extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_image_gallery', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Image Gallery (slider)',
  'base' => 'vcj_image_gallery',
  'description' => 'Responsive image gallery',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'images',
      'heading' => 'Images',
      'description' => 'To select multiple images use the CTRL key for PC or COMMAND key for MAC.',
      'value' => '',
      'type' => 'attach_images',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    1 => 
    array (
      'param_name' => 'columns',
      'heading' => 'Image Columns',
      'description' => 'Choose image columns count',
      'value' => 
      array (
        '1 Column' => '1columns',
        '2 Columns' => '2columns',
        '3 Columns' => '3columns',
        '4 Columns' => '4columns',
        '5 columns' => '5columns',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '3columns',
      'group' => 'General',
      'admin_label' => true,
    ),
    2 => 
    array (
      'param_name' => 'image_ratio',
      'heading' => 'Image Ratio',
      'description' => 'Choose image ratio',
      'value' => 
      array (
        'Landscape' => 'landscape',
        'Portrait' => 'portrait',
        'Square' => 'square',
        'Large (default ratio)' => 'large',
        'Full (default ratio)' => 'full',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'square',
      'group' => 'General',
    ),
    3 => 
    array (
      'param_name' => 'autoplay',
      'heading' => 'Autoplay',
      'description' => 'Enable or disable autoplay',
      'value' => 
      array (
        'Off' => 'off',
        'On' => 'on',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'off',
      'group' => 'General',
    ),
    4 => 
    array (
      'param_name' => 'animation_speed',
      'heading' => 'Animation Speed',
      'description' => 'Choose animation speed (seconds)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => 3,
      'group' => 'General',
      'dependency' => 
      array (
        'element' => 'autoplay',
        'value' => 'on',
      ),
    ),
    5 => 
    array (
      'param_name' => 'overlay',
      'heading' => 'Overlay',
      'description' => 'Enable or disable overlay',
      'value' => 
      array (
        'Off' => 'off',
        'On' => 'on',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'on',
      'group' => 'Styling',
    ),
    6 => 
    array (
      'param_name' => 'margin',
      'heading' => 'Image Margin',
      'description' => 'Select image margin for white space around them',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '0px 0px 15px 0px',
      'group' => 'Styling',
    ),
    7 => 
    array (
      'param_name' => 'radius',
      'heading' => 'Image Radius',
      'description' => 'Select image radius',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    8 => 
    array (
      'param_name' => 'shadow',
      'heading' => 'Shadow',
      'description' => 'Choose image shadow',
      'value' => 
      array (
        'Disabled' => 'disabled',
        'Shadow 1 (large)' => 'shadow1',
        'Shadow 2 (medium)' => 'shadow2',
        'Shadow 3 (Xlage)' => 'shadow3',
        'Shadow 4 (focus at the bottom middle)' => 'shadow4',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'disabled',
      'group' => 'Styling',
    ),
    9 => 
    array (
      'param_name' => 'dots',
      'heading' => 'Position',
      'description' => 'Choose dots position',
      'value' => 
      array (
        'Below Images' => 'dots1',
        'On Images' => 'dots2',
        'Disable' => 'disable',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'dots1',
      'group' => 'Dots',
    ),
    10 => 
    array (
      'param_name' => 'dots_alignment',
      'heading' => 'Alignment',
      'description' => 'Choose dots alignment',
      'value' => 
      array (
        'Left' => 'left',
        'Center' => 'center',
        'Right' => 'right',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'center',
      'group' => 'Dots',
    ),
    11 => 
    array (
      'param_name' => 'dots_color',
      'heading' => 'Active Color',
      'description' => 'Select active dot color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Dots',
    ),
    12 => 
    array (
      'param_name' => 'bottom_margin',
      'heading' => 'Bottom Margin',
      'description' => 'Enter bottom margin, default 45px',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Dots',
    ),
    13 => 
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
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/image-gallery/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/image-gallery/static.php';
        if( function_exists( 'jevelin_shortcode_image_gallery_css' ) ) :
            jevelin_shortcode_image_gallery_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_image_gallery();