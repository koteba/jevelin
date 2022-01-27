<?php
class vcj_text_with_frame extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_text_with_frame', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Text With Frame',
  'base' => 'vcj_text_with_frame',
  'description' => 'A block of text with WYSIWYG editor inside frame',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'content',
      'heading' => 'Content',
      'description' => 'Enter content
					<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
      'value' => '<span style="font-size: 24px;">Lorem ipsum</span>
		<h2><span style="font-size: 48px;">DOLOR SIT AMET</span></h2>',
      'type' => 'textarea_html',
      'class' => '',
      'std' => '<span style="font-size: 24px;">Lorem ipsum</span>
		<h2><span style="font-size: 48px;">DOLOR SIT AMET</span></h2>',
      'group' => 'General',
      'admin_label' => true,
    ),
    1 => 
    array (
      'param_name' => 'line_color',
      'heading' => 'Line Color',
      'description' => 'Select text color',
      'value' => 'rgba(0,0,0,.07)',
      'type' => 'colorpicker',
      'class' => '',
      'std' => 'rgba(0,0,0,.07)',
      'group' => 'General',
    ),
    2 => 
    array (
      'param_name' => 'text_font',
      'heading' => 'Text Font Famility',
      'description' => 'Select text font famility',
      'value' => 
      array (
        'Heading' => 'heading',
        'Body' => 'body',
        'Additional font 1' => 'additional1',
        'Additional font 2' => 'additional2',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'body',
      'group' => 'General',
    ),
    3 => 
    array (
      'param_name' => 'heading_font',
      'heading' => 'Heading Font Famility',
      'description' => 'Select heading font famility',
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
      'group' => 'General',
    ),
    4 => 
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
    5 => 
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
    6 => 
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
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/text-with-frame/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/text-with-frame/static.php';
        if( function_exists( 'jevelin_shortcode_text_with_frame_css' ) ) :
            jevelin_shortcode_text_with_frame_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_text_with_frame();