<?php
class vcj_heading_simple extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_heading_simple', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Heading',
  'base' => 'vcj_heading_simple',
  'description' => 'Enter heading details',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'content2',
      'heading' => 'Content',
      'description' => 'Enter content',
      'value' => 'This is heading element',
      'type' => 'textfield',
      'class' => '',
      'std' => 'This is heading element',
      'group' => 'General',
      'admin_label' => true,
    ),
    1 => 
    array (
      'param_name' => 'heading',
      'heading' => 'Heading Type',
      'description' => 'Select heading type',
      'value' => 
      array (
        'h1' => 'h1',
        'h2' => 'h2',
        'h3' => 'h3',
        'h4' => 'h4',
        'h5' => 'h5',
        'h6' => 'h6',
        'span' => 'span',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'h2',
      'group' => 'General',
      'admin_label' => true,
    ),
    2 => 
    array (
      'param_name' => 'alignment',
      'heading' => 'Text Alignment',
      'description' => 'Select text alignment',
      'value' => 
      array (
        'Left' => 'left',
        'Center' => 'center',
        'Right' => 'right',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'center',
      'group' => 'General',
    ),
    3 => 
    array (
      'param_name' => 'color_text',
      'heading' => 'Text Color',
      'description' => 'Select text color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    4 => 
    array (
      'param_name' => 'color_text_hover',
      'heading' => 'Text Hover Color',
      'description' => 'Select text hover color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    5 => 
    array (
      'param_name' => 'hover_element',
      'heading' => 'Hover Element',
      'description' => 'Choose hover element',
      'value' => 
      array (
        'Heading' => 'heading',
        'Column' => 'column',
        'Section' => 'section',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'heading',
      'group' => 'General',
    ),
    6 => 
    array (
      'param_name' => 'link',
      'heading' => 'Link',
      'description' => 'Enter heading link',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Link',
    ),
    7 => 
    array (
      'param_name' => 'link_target',
      'heading' => 'Link Target',
      'description' => 'Enter heading link',
      'value' => 
      array (
        'Open in current window' => '_self',
        'Open in new tab' => '_blank',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '_self',
      'group' => 'Link',
    ),
    8 => 
    array (
      'param_name' => 'font',
      'heading' => 'Font Famility',
      'description' => 'Select font famility',
      'value' => 
      array (
        'Heading' => 'heading',
        'Body' => 'body',
        'Additional font 1' => 'additional1',
        'Additional font 2' => 'additional2',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'heading',
      'group' => 'Typography',
    ),
    9 => 
    array (
      'param_name' => 'weight',
      'heading' => 'Font Weight',
      'description' => 'Select font weight',
      'value' => 
      array (
        'Default (from theme settings)' => 100,
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
      'group' => 'Typography',
    ),
    10 => 
    array (
      'param_name' => 'italic',
      'heading' => 'Font Style Italic',
      'description' => 'Enable or disable font style italic',
      'value' => 
      array (
        'Off' => false,
        'On' => true,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => false,
      'group' => 'Typography',
    ),
    11 => 
    array (
      'param_name' => 'size',
      'heading' => 'Font Size',
      'description' => 'Choose font size',
      'value' => 
      array (
        'Default' => 'default',
        'XSmall (14px)' => 'xs',
        'Small (16px)' => 's',
        'Medium (20px)' => 'm',
        'Large (30px)' => 'l',
        'XLarge (36px)' => 'xl',
        'XXLarge (48px)' => 'xxl',
        'XXXLarge (60px)' => 'xxxl',
        'XXXXLarge (72px)' => 'xxxxl',
        'Custom' => 'custom',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '',
      'group' => 'Typography',
    ),
    12 => 
    array (
      'param_name' => 'desktop_size',
      'heading' => 'Font Size (desktop)',
      'description' => 'Enter font size (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Typography',
      'dependency' => 
      array (
        'element' => 'size',
        'value' => 'custom',
      ),
    ),
    13 => 
    array (
      'param_name' => 'responsive_size',
      'heading' => 'Font Size (mobile and tablet)',
      'description' => 'Enter font size (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Typography',
      'dependency' => 
      array (
        'element' => 'size',
        'value' => 'custom',
      ),
    ),
    14 => 
    array (
      'param_name' => 'line_height',
      'heading' => 'Line height',
      'description' => 'Enter line height (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Typography',
    ),
    15 => 
    array (
      'param_name' => 'letter_spacing',
      'heading' => 'Letter spacing',
      'description' => 'Enter letter spacing (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Typography',
    ),
    16 => 
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
    17 => 
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
    18 => 
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
    19 => 
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
    20 => 
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
    21 => 
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
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/heading-simple/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/heading-simple/static.php';
        if( function_exists( 'jevelin_shortcode_heading_simple_css' ) ) :
            jevelin_shortcode_heading_simple_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_heading_simple();