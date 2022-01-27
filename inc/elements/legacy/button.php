<?php
class vcj_button extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_button', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Button',
  'base' => 'vcj_button',
  'description' => 'Simple button',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'text',
      'heading' => 'Button Text',
      'description' => 'Enter button text',
      'value' => 'This is button',
      'type' => 'textfield',
      'class' => '',
      'std' => 'This is button',
      'group' => 'General',
      'admin_label' => true,
    ),
    1 => 
    array (
      'param_name' => 'url',
      'heading' => 'Button URL',
      'description' => 'Enter button URL',
      'value' => '#',
      'type' => 'textfield',
      'class' => '',
      'std' => '#',
      'group' => 'General',
    ),
    2 => 
    array (
      'param_name' => 'target',
      'heading' => 'Button Target',
      'description' => 'Choose if you want to open the linked page in a new window',
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
    3 => 
    array (
      'param_name' => 'alignment',
      'heading' => 'Alignment',
      'description' => 'Select button alignment',
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
      'param_name' => 'image',
      'heading' => 'Background Image',
      'description' => 'Upload image background image',
      'value' => '',
      'type' => 'attach_image',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    6 => 
    array (
      'param_name' => 'icon',
      'heading' => 'Icon',
      'description' => 'Select icon',
      'value' => '',
      'type' => 'iconpicker',
      'class' => '',
      'std' => '',
      'group' => 'Icon',
      'settings' => 
      array (
        'emptyIcon' => true,
        'type' => 'jevelin_vc_icons',
      ),
    ),
    7 => 
    array (
      'param_name' => 'icon_size',
      'heading' => 'Icon Size',
      'description' => 'Enter icon size (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Icon',
    ),
    8 => 
    array (
      'param_name' => 'icon_alignment',
      'heading' => 'Icon Alignment',
      'description' => 'Choose icon alignment',
      'value' => 
      array (
        'Left' => 'left',
        'Right' => 'right',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'left',
      'group' => 'Icon',
    ),
    9 => 
    array (
      'param_name' => 'style',
      'heading' => 'Button Style',
      'description' => 'Choose button style (notice: style 4 is always in full width)',
      'value' => 
      array (
        'Simple Button' => 1,
        'Fancy Button' => 2,
        'Fancy Spacing Button' => 5,
        'Link Button' => 3,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '1',
      'group' => 'Styling',
    ),
    10 => 
    array (
      'param_name' => 'size',
      'heading' => 'Button Size',
      'description' => 'Choose button size',
      'value' => 
      array (
        'XSmall' => 'xsmall',
        'Small' => 'small',
        'Medium' => 'medium',
        'Large' => 'large',
        'XLarge' => 'xlarge',
        'XLarge (small text)' => 'xlarge sh-button-xlarge-small',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'medium',
      'group' => 'Styling',
    ),
    11 => 
    array (
      'param_name' => 'font_size',
      'heading' => 'Font Size',
      'description' => 'Enter font size (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    12 => 
    array (
      'param_name' => 'font_weight',
      'heading' => 'Font Weight',
      'description' => 'Select font weight',
      'value' => 
      array (
        'Extra Light' => 200,
        'Light' => 300,
        'Normal' => 400,
        'Medium' => 500,
        'Semi-bold' => 600,
        'Bold' => 700,
        'Extra Bold' => 800,
        'Black' => 900,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '700',
      'group' => 'Styling',
    ),
    13 => 
    array (
      'param_name' => 'radius',
      'heading' => 'Button Radius',
      'description' => 'Select button radius',
      'value' => 0,
      'type' => 'textfield',
      'class' => '',
      'std' => 0,
      'group' => 'Styling',
    ),
    14 => 
    array (
      'param_name' => 'border_size',
      'heading' => 'Border Size',
      'description' => 'Choose button border size',
      'value' => 2,
      'type' => 'textfield',
      'class' => '',
      'std' => 2,
      'group' => 'Styling',
    ),
    15 => 
    array (
      'param_name' => 'shadow',
      'heading' => 'Shadow',
      'description' => 'Choose button shadow',
      'value' => 
      array (
        'None' => 'none',
        'Simple' => 'simple',
        'Near spread' => 'near',
        'Far spread' => 'far',
        'Extra Far spread' => 'extrafar',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'none',
      'group' => 'Styling',
    ),
    16 => 
    array (
      'param_name' => 'full',
      'heading' => 'Button 100% Width',
      'description' => 'Enable or disable full button width',
      'value' => 
      array (
        'Off' => false,
        'On' => true,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => false,
      'group' => 'Styling',
    ),
    17 => 
    array (
      'param_name' => 'tale',
      'heading' => 'Button Tale',
      'description' => 'Choose button tale. Notice: this option works only for style 1',
      'value' => 
      array (
        'None' => 'none',
        'Top' => 'top',
        'Bottom' => 'bottom',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'none',
      'group' => 'Styling',
    ),
    18 => 
    array (
      'param_name' => 'height',
      'heading' => 'Button Height',
      'description' => 'Enter your custom button height (with px)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    19 => 
    array (
      'param_name' => 'line_height',
      'heading' => 'Button Line Height',
      'description' => 'Enter your custom button line height (with px)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    20 => 
    array (
      'param_name' => 'leftright_padding',
      'heading' => 'Button Left/Right Padding',
      'description' => 'Enter your custom button left/right padding (with px)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    21 => 
    array (
      'param_name' => 'text_color',
      'heading' => 'Text Color',
      'description' => 'Select text color',
      'value' => '#ffffff',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '#ffffff',
      'group' => 'Colors',
    ),
    22 => 
    array (
      'param_name' => 'text_hover_color',
      'heading' => 'Text Hover Color',
      'description' => 'Select text hover color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Colors',
    ),
    23 => 
    array (
      'param_name' => 'background_color',
      'heading' => 'Background Color',
      'description' => 'Select background colors',
      'value' => '#3f3f3f',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '#3f3f3f',
      'group' => 'Colors',
    ),
    24 => 
    array (
      'param_name' => 'background_hover_color',
      'heading' => 'Background Hover Color',
      'description' => 'Select background hover color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Colors',
    ),
    25 => 
    array (
      'param_name' => 'border_color',
      'heading' => 'Border Color',
      'description' => 'Select border color to add border',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Colors',
    ),
    26 => 
    array (
      'param_name' => 'border_hover_color',
      'heading' => 'Border Hover Color',
      'description' => 'Select border hover color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Colors',
    ),
    27 => 
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
    28 => 
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
    29 => 
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
    30 => 
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
    31 => 
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
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/button/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/button/static.php';
        if( function_exists( 'jevelin_shortcode_button_css' ) ) :
            jevelin_shortcode_button_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_button();