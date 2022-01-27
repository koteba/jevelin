<?php
class vcj_single_image extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_single_image', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Single Image',
  'base' => 'vcj_single_image',
  'description' => 'Single Image',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'image',
      'heading' => 'Image',
      'description' => 'Upload image',
      'value' => '',
      'type' => 'attach_image',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    1 => 
    array (
      'param_name' => 'image_hover',
      'heading' => 'Image (on hover)',
      'description' => 'Upload hover image (recommended to use image in same dimenstions as main image)',
      'value' => '',
      'type' => 'attach_image',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    2 => 
    array (
      'param_name' => 'url',
      'heading' => 'URL',
      'description' => 'Enter URL',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    3 => 
    array (
      'param_name' => 'alignment',
      'heading' => 'Alignment',
      'description' => 'Select alignment',
      'value' => 
      array (
        'Left' => 'left',
        'Center' => 'center',
        'Right' => 'right',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'left',
      'group' => 'General',
      'admin_label' => true,
    ),
    4 => 
    array (
      'param_name' => 'alignment_mobile',
      'heading' => 'Mobile Alignment',
      'description' => 'Select mobile alignment',
      'value' => 
      array (
        'Default' => 'default',
        'Left' => 'left',
        'Center' => 'center',
        'Right' => 'right',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'default',
      'group' => 'General',
    ),
    5 => 
    array (
      'param_name' => 'size',
      'heading' => 'Size',
      'description' => 'Select image size',
      'value' => 
      array (
        'Large' => 'large',
        'Full' => 'full',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'large',
      'group' => 'General',
    ),
    6 => 
    array (
      'param_name' => 'radius',
      'heading' => 'Image Radius',
      'description' => 'Select image radius',
      'value' => 0,
      'type' => 'textfield',
      'class' => '',
      'std' => 0,
      'group' => 'General',
    ),
    7 => 
    array (
      'param_name' => 'lightbox',
      'heading' => 'Lightbox',
      'description' => 'Open in lightbox (will override URL)',
      'value' => 
      array (
        'Enabled' => 1,
        'Disabled' => 0,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => true,
      'group' => 'General',
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
      'param_name' => 'overlay',
      'heading' => 'Overlay',
      'description' => 'Choose image overlay style',
      'value' => 
      array (
        'Disabled' => 'disabled',
        'Overlay 1 ' => 'overlay1',
        'Overlay 2 ' => 'overlay2',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    10 => 
    array (
      'param_name' => 'button_name',
      'heading' => 'Button Name',
      'description' => 'Enter button name',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => 'This is button',
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'overlay',
        'value' => 'overlay1',
      ),
    ),
    11 => 
    array (
      'param_name' => 'button_icon',
      'heading' => 'Icon',
      'description' => 'Select icon',
      'value' => '',
      'type' => 'iconpicker',
      'class' => '',
      'std' => 'ti-check',
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'overlay',
        'value' => 'overlay1',
      ),
      'settings' => 
      array (
        'emptyIcon' => true,
        'type' => 'jevelin_vc_icons',
      ),
    ),
    12 => 
    array (
      'param_name' => 'popover',
      'heading' => 'Popover',
      'description' => 'Enter popover text',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
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
    14 => 
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
    15 => 
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
    16 => 
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
    17 => 
    array (
      'param_name' => 'inline_element',
      'heading' => 'Inline Element',
      'description' => 'Enable for multiple elements to add them in one line Doesnt work in WPbakery page builder front-end mode',
      'value' => 
      array (
        'Disabled' => 'disabled',
        'Enabled' => 'enabled',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'disabled',
      'group' => 'Position',
    ),
    18 => 
    array (
      'param_name' => 'margin',
      'heading' => 'Margin',
      'description' => 'Enter your custom margin (<b>top right bottom left</b>)',
      'value' => '0px 0px 15px 0px',
      'type' => 'textfield',
      'class' => '',
      'std' => '0px 0px 15px 0px',
      'group' => 'Position',
    ),
    19 => 
    array (
      'param_name' => 'margin_responsive',
      'heading' => 'Margin Responsive',
      'description' => 'Here you can set responsive smartphone and tablet margin (top right bottom left). For example: 30px 0px 30px 0px',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Position',
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/single-image/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/single-image/static.php';
        if( function_exists( 'jevelin_shortcode_single_image_css' ) ) :
            jevelin_shortcode_single_image_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_single_image();