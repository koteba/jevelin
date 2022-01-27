<?php
class vcj_icon extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_icon', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Icon',
  'base' => 'vcj_icon',
  'description' => 'Simple icon element',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'icon',
      'heading' => 'Icon',
      'description' => 'Select Icon',
      'value' => 'ti-check',
      'type' => 'iconpicker',
      'class' => '',
      'std' => 'ti-check',
      'group' => 'General',
      'admin_label' => true,
      'settings' => 
      array (
        'emptyIcon' => true,
        'type' => 'jevelin_vc_icons',
      ),
    ),
    1 => 
    array (
      'param_name' => 'alignment',
      'heading' => 'Alignment',
      'description' => 'Choose alignment',
      'value' => 
      array (
        'Center' => 'center',
        'Left' => 'left',
        'Right' => 'right',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'center',
      'group' => 'General',
      'admin_label' => true,
    ),
    2 => 
    array (
      'param_name' => 'url',
      'heading' => 'Icon URL',
      'description' => 'Enter icon URL',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    3 => 
    array (
      'param_name' => 'url_lightbox',
      'heading' => 'Icon URL in Lightbox',
      'description' => 'When enabled URLs will be opened in lightbox view. Notice: For Youtube embed URL should be used, for example - https://www.youtube.com/embed/XYXYXYX?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1',
      'value' => 
      array (
        'Disabled' => 'disabled',
        'Enabled' => 'enabled',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'disabled',
      'group' => 'General',
    ),
    4 => 
    array (
      'param_name' => 'target',
      'heading' => 'Icon URL Target',
      'description' => 'Choose if you want to open the URL in a new window',
      'value' => 
      array (
        'No' => '_self',
        'Yes' => '_blank',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    5 => 
    array (
      'param_name' => 'shadow',
      'heading' => 'Shadow',
      'description' => 'Choose shadow',
      'value' => 
      array (
        'None' => 'none',
        'Small' => 'small',
        'Large' => 'large',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'none',
      'group' => 'General',
    ),
    6 => 
    array (
      'param_name' => 'icon_size',
      'heading' => 'Size',
      'description' => 'Enter icon size (with <b>px</b>)',
      'value' => '30px',
      'type' => 'textfield',
      'class' => '',
      'std' => '30px',
      'group' => 'General',
    ),
    7 => 
    array (
      'param_name' => 'icon_line_height',
      'heading' => 'Line Height',
      'description' => 'Enter line height (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    8 => 
    array (
      'param_name' => 'icon_color',
      'heading' => 'Color',
      'description' => 'Select icon color or leave blank for default body color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    9 => 
    array (
      'param_name' => 'icon_second_color',
      'heading' => 'Second Color',
      'description' => 'Select icon color to create a gradient color (Only for chrome, safari and opera browsers)',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    10 => 
    array (
      'param_name' => 'icon_hover_color',
      'heading' => 'Hover Color',
      'description' => 'Select hover color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    11 => 
    array (
      'param_name' => 'icon_hover_second_color',
      'heading' => 'Second Hover Color',
      'description' => 'Select icon hover color to create a hover gradient color (Only for chrome, safari and opera browsers)',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    12 => 
    array (
      'param_name' => 'box_status',
      'heading' => 'Background Box',
      'description' => 'Enable or disable background box',
      'value' => 
      array (
        'Enabled' => 'enabled',
        'Disabled' => 'disabled',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'disabled',
      'group' => 'Background Box',
    ),
    13 => 
    array (
      'param_name' => 'box_background_color',
      'heading' => 'Background Color',
      'description' => 'Select box background color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Background Box',
    ),
    14 => 
    array (
      'param_name' => 'box_background_hover_color',
      'heading' => 'Background Hover Color',
      'description' => 'Select box background color',
      'value' => '#fafafa',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '#fafafa',
      'group' => 'Background Box',
    ),
    15 => 
    array (
      'param_name' => 'box_border_radius',
      'heading' => 'Border Radius',
      'description' => 'Enter border radius (with <b>px</b>)',
      'value' => '5px',
      'type' => 'textfield',
      'class' => '',
      'std' => '5px',
      'group' => 'Background Box',
    ),
    16 => 
    array (
      'param_name' => 'box_border_width',
      'heading' => 'Border Width',
      'description' => 'Enter border width',
      'value' => '0px',
      'type' => 'textfield',
      'class' => '',
      'std' => '0px',
      'group' => 'Background Box',
    ),
    17 => 
    array (
      'param_name' => 'box_border_color',
      'heading' => 'Border Color',
      'description' => 'Select box border color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Background Box',
    ),
    18 => 
    array (
      'param_name' => 'box_border_hover_color',
      'heading' => 'Border Hover Color',
      'description' => 'Select box border hover color',
      'value' => '#fafafa',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '#fafafa',
      'group' => 'Background Box',
    ),
    19 => 
    array (
      'param_name' => 'box_padding',
      'heading' => 'Padding',
      'description' => 'Enter padding (with <b>px</b>, <b>top right bottom left</b>)',
      'value' => '10px 10px 10px 10px',
      'type' => 'textfield',
      'class' => '',
      'std' => '10px 10px 10px 10px',
      'group' => 'Background Box',
    ),
    20 => 
    array (
      'param_name' => 'box_size',
      'heading' => 'Or Box Size in px (width/height)',
      'description' => 'Enter box size in px (make sure that padding option is empty)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Background Box',
    ),
    21 => 
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
      'group' => 'Show Animation',
    ),
    22 => 
    array (
      'param_name' => 'animation_speed',
      'heading' => 'Animation Speed',
      'description' => 'Choose animation speed (seconds)',
      'value' => 2,
      'type' => 'textfield',
      'class' => '',
      'std' => 2,
      'group' => 'Show Animation',
    ),
    23 => 
    array (
      'param_name' => 'animation_delay',
      'heading' => 'Animation Delay',
      'description' => 'Choose animation delay (seconds',
      'value' => 0,
      'type' => 'textfield',
      'class' => '',
      'std' => 0,
      'group' => 'Show Animation',
    ),
    24 => 
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
    25 => 
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
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/icon/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/icon/static.php';
        if( function_exists( 'jevelin_shortcode_icon_css' ) ) :
            jevelin_shortcode_icon_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_icon();