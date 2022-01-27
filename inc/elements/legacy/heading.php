<?php
class vcj_heading extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_heading', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Heading (pro)',
  'base' => 'vcj_heading',
  'description' => 'Advenced heading element',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'content',
      'heading' => 'Content',
      'description' => 'Enter content
					<script>jQuery(document).ready(function ($) { setTimeout(function(){
						$("#textarea_dynamic_id-tmce").trigger("click");
					}, 1); });</script>',
      'value' => '<p style="text-align: center;"><strong></strong></p>',
      'type' => 'textarea_html',
      'class' => '',
      'std' => '<p style="text-align: center;"><strong></strong></p>',
      'group' => 'General',
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
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'h2',
      'group' => 'General',
    ),
    2 => 
    array (
      'param_name' => 'style',
      'heading' => 'Style',
      'description' => 'Choose main style',
      'value' => 
      array (
        'Style 1' => 'style1',
        'Style 2' => 'style2',
        'Style 3' => 'style3',
        'Style 4' => 'style4',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    3 => 
    array (
      'param_name' => 'background_text',
      'heading' => 'Background Text',
      'description' => 'Enter background text',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => 'Just a sample text',
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'style',
        'value' => 'style2',
      ),
    ),
    4 => 
    array (
      'param_name' => 'background_color',
      'heading' => 'Background Color',
      'description' => 'Select background color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '#dadada',
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'style',
        'value' => 
        array (
          0 => 'style3',
          1 => 'style4',
        ),
      ),
    ),
    5 => 
    array (
      'param_name' => 'background_image',
      'heading' => 'Background Image',
      'description' => 'Upload background image',
      'value' => '',
      'type' => 'attach_image',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'style',
        'value' => 
        array (
          0 => 'style3',
          1 => 'style4',
        ),
      ),
    ),
    6 => 
    array (
      'param_name' => 'text_color',
      'heading' => 'Text Color',
      'description' => 'Select color text',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    7 => 
    array (
      'param_name' => 'hover_color',
      'heading' => 'Hover Color',
      'description' => 'Select color text',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    8 => 
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
      'group' => 'Styling',
    ),
    9 => 
    array (
      'param_name' => 'custom_class',
      'heading' => 'Class Name',
      'description' => 'Enter custom class name',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    10 => 
    array (
      'param_name' => 'font_bold',
      'heading' => 'Font Famility (headings and bold)',
      'description' => 'Select font famility for bold tags',
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
    11 => 
    array (
      'param_name' => 'font_bold_weight',
      'heading' => 'Font Weight (headings and bold)',
      'description' => 'Select font weight',
      'value' => 
      array (
        'Default (from theme settings)' => 'default',
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
      'std' => 'default',
      'group' => 'Typography',
    ),
    12 => 
    array (
      'param_name' => 'font',
      'heading' => 'Font Famility (regular text)',
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
    13 => 
    array (
      'param_name' => 'weight',
      'heading' => 'Font Weight (regular text)',
      'description' => 'Select font weight',
      'value' => 
      array (
        'Default (from theme settings)' => 100,
        'Extra Light' => 200,
        'Light' => 300,
        'Normal' => 400,
        'Semi-bold' => 600,
        'Bold' => 700,
        'Extra Bold' => 900,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '400',
      'group' => 'Typography',
    ),
    14 => 
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
    15 => 
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
    16 => 
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
    17 => 
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
    18 => 
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
    19 => 
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
    20 => 
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
    21 => 
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
    22 => 
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
    23 => 
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
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/heading/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/heading/static.php';
        if( function_exists( 'jevelin_shortcode_heading_css' ) ) :
            jevelin_shortcode_heading_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_heading();