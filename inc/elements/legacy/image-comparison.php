<?php
class vcj_image_comparison extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_image_comparison', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Image Comparison',
  'base' => 'vcj_image_comparison',
  'description' => 'Image before and after',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'image_b',
      'heading' => 'Image Before (Left Side)',
      'description' => 'Upload a image before',
      'value' => '',
      'type' => 'attach_image',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    1 => 
    array (
      'param_name' => 'image_a',
      'heading' => 'Image After (Right Side)',
      'description' => 'Upload a image right',
      'value' => '',
      'type' => 'attach_image',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    2 => 
    array (
      'param_name' => 'text_b',
      'heading' => 'Image Caption (before)',
      'description' => 'Enter image caption (before)',
      'value' => 'Before',
      'type' => 'textfield',
      'class' => '',
      'std' => 'Before',
      'group' => 'General',
    ),
    3 => 
    array (
      'param_name' => 'text_a',
      'heading' => 'Image Caption (after)',
      'description' => 'Enter image caption (after)',
      'value' => 'After',
      'type' => 'textfield',
      'class' => '',
      'std' => 'After',
      'group' => 'General',
    ),
    4 => 
    array (
      'param_name' => 'button_color',
      'heading' => 'Button Color',
      'description' => 'Select button color or leave blank for theme accent color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    5 => 
    array (
      'param_name' => 'source',
      'heading' => 'Image Source',
      'description' => 'Choose image source size',
      'value' => 
      array (
        'Large Size (dynamic image sizes)' => 'large',
        'Full Size (dynamic image sizes)' => 'full',
        'Portrait' => 'jevelin-portrait',
        'Square' => 'jevelin-square',
        'Landscape' => 'jevelin-landscape-large',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'large',
      'group' => 'General',
      'admin_label' => true,
    ),
    6 => 
    array (
      'param_name' => 'animation',
      'heading' => 'Animation',
      'description' => 'Select button animation',
      'value' => 
      array (
        'None' => 'none',
        'Fade In' => 'fadeIn',
        'Fade In Down' => 'fadeInDown',
        'Fade In Down Big' => 'fadeInDownBig',
        'Fade In Left' => 'fadeInLeft',
        'Fade In Left Big' => 'fadeInLeftBig',
        'Fade In Right' => 'fadeInRight',
        'Fade In Right Big' => 'fadeInRightBig',
        'Fade In Up' => 'fadeInUp',
        'Fade In Up Big' => 'fadeInUpBig',
        'Slide In Down' => 'slideInDown',
        'Slide In Left' => 'slideInLeft',
        'Slide In Right' => 'slideInRight',
        'Slide In Up' => 'slideInUp',
        'Zoom In' => 'zoomIn',
        'Zoom In Down' => 'zoomInDown',
        'Zoom In Left' => 'zoomInLeft',
        'Zoom In Right' => 'zoomInRight',
        'Zoom In Up' => 'zoomInUp',
        'Rotate In' => 'rotateIn',
        'Rotate In Down Left' => 'rotateInDownLeft',
        'Rotate In Down Right' => 'rotateInDownRight',
        'Roate In Up Left' => 'rotateInUpLeft',
        'Roate In Up Right' => 'rotateInUpRight',
        'Bounce In' => 'bounceIn',
        'Bounce In Down' => 'bounceInDown',
        'Bounce In Left' => 'bounceInLeft',
        'Bounce In Right' => 'bounceInRight',
        'Bounce In Up' => 'bounceInUp',
        'Bounce' => 'bounce',
        'Flash' => 'flash',
        'Pulse' => 'pulse',
        'Rubber Band' => 'rubberBand',
        'Shake' => 'shake',
        'Head Shake' => 'headShake',
        'Swing' => 'swing',
        'Tada' => 'tada',
        'Wobble' => 'wobble',
        'Jello' => 'jello',
        'Flip In X' => 'flipInX',
        'Flip In Y' => 'flipInY',
        'Light Speed In' => 'lightSpeedIn',
        'Hinge' => 'hinge',
        'Roll In' => 'rollIn',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'none',
      'group' => 'Animation',
    ),
    7 => 
    array (
      'param_name' => 'animation_speed',
      'heading' => 'Animation Speed',
      'description' => 'Choose animation speed (seconds)',
      'value' => 2,
      'type' => 'textfield',
      'class' => '',
      'std' => 2,
      'group' => 'Animation',
    ),
    8 => 
    array (
      'param_name' => 'animation_delay',
      'heading' => 'Animation Delay',
      'description' => 'Choose animation delay (seconds',
      'value' => 0,
      'type' => 'textfield',
      'class' => '',
      'std' => 0,
      'group' => 'Animation',
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/image-comparison/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/image-comparison/static.php';
        if( function_exists( 'jevelin_shortcode_image_comparison_css' ) ) :
            jevelin_shortcode_image_comparison_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_image_comparison();