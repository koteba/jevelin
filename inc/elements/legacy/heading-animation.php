<?php
class vcj_heading_animation extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_heading_animation', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Heading Animation',
  'base' => 'vcj_heading_animation',
  'description' => 'Animated heading',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'content2',
      'heading' => 'Content',
      'description' => 'Enter content',
      'value' => '',
      'type' => 'param_group',
      'class' => '',
      'std' => '',
      'group' => 'General',
      'params' => 
      array (
        0 => 
        array (
          'type' => 'textfield',
          'heading' => 'Text',
          'param_name' => 'text',
        ),
      ),
    ),
    1 => 
    array (
      'param_name' => 'content_fixed',
      'heading' => 'Content fixed',
      'description' => 'Enter fixed content before main content',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    2 => 
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
      'std' => 'h3',
      'group' => 'General',
      'admin_label' => true,
    ),
    3 => 
    array (
      'param_name' => 'alignment',
      'heading' => 'Alignment',
      'description' => 'Choose alignment',
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
      'param_name' => 'loop',
      'heading' => 'Loop',
      'description' => 'Choose if you want to enable or disable loop',
      'value' => 
      array (
        'Enable' => 'enable',
        'Disable' => 'disable',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'enable',
      'group' => 'General',
    ),
    5 => 
    array (
      'param_name' => 'font',
      'heading' => 'Font Famility',
      'description' => 'Select from theme options',
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
      'group' => 'Styling',
    ),
    6 => 
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
      'group' => 'Styling',
    ),
    7 => 
    array (
      'param_name' => 'desktop_size',
      'heading' => 'Font Size (desktop)',
      'description' => 'Enter font size (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'size',
        'value' => 'custom',
      ),
    ),
    8 => 
    array (
      'param_name' => 'responsive_size',
      'heading' => 'Font Size (mobile and tablet)',
      'description' => 'Enter font size (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'size',
        'value' => 'custom',
      ),
    ),
    9 => 
    array (
      'param_name' => 'line_height',
      'heading' => 'Line height',
      'description' => 'Enter line height (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    10 => 
    array (
      'param_name' => 'color',
      'heading' => 'Text Color',
      'description' => 'Select  color for heading',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    11 => 
    array (
      'param_name' => 'fixed_color',
      'heading' => 'Fixed Text Color',
      'description' => 'Select  color for heading',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    12 => 
    array (
      'param_name' => 'margin',
      'heading' => 'Margin',
      'description' => 'Enter your custom margin (<b>top right bottom left</b>)',
      'value' => '0px 0px 15px 0px',
      'type' => 'textfield',
      'class' => '',
      'std' => '0px 0px 15px 0px',
      'group' => 'Styling',
    ),
    13 => 
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
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/heading-animation/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/heading-animation/static.php';
        if( function_exists( 'jevelin_shortcode_heading_animation_css' ) ) :
            jevelin_shortcode_heading_animation_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_heading_animation();