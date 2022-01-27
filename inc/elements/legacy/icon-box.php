<?php
class vcj_icon_box extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_icon_box', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Icon Box',
  'base' => 'vcj_icon_box',
  'description' => 'Enter services details',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'icon',
      'heading' => 'Icon',
      'description' => 'Select Icon',
      'value' => '',
      'type' => 'iconpicker',
      'class' => '',
      'std' => '',
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
      'param_name' => 'title',
      'heading' => 'Title',
      'description' => 'Enter Title',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
      'admin_label' => true,
    ),
    2 => 
    array (
      'param_name' => 'content',
      'heading' => 'Content',
      'description' => 'Enter content
					<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
      'value' => '',
      'type' => 'textarea_html',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    3 => 
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
    4 => 
    array (
      'param_name' => 'improved_responsiveness',
      'heading' => 'Improved Responsiveness',
      'description' => 'Enable or disable improved responsiveness, which limits text width in moble devices and improves readability',
      'value' => 
      array (
        'Off' => false,
        'On' => true,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => true,
      'group' => 'General',
    ),
    5 => 
    array (
      'param_name' => 'style',
      'heading' => 'Style',
      'description' => 'Choose main style',
      'value' => 
      array (
        'Double icons' => 'style1',
        'Simple Iconbox 1' => 'style2',
        'Simple Iconbox 2' => 'style12',
        'Large Iconbox 1' => 'style3',
        'Large Iconbox 2' => 'style4',
        'Large Iconbox 3' => 'style5',
        'Large Iconbox 4' => 'style6',
        'Large Iconbox 5' => 'style7',
        'Large Iconbox 6' => 'style8',
        'Large Iconbox 7' => 'style9',
        'Large Iconbox 8' => 'style10',
        'Large Iconbox 9' => 'style11',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    6 => 
    array (
      'param_name' => 'icon2',
      'heading' => 'Icon',
      'description' => 'Select Icon',
      'value' => '',
      'type' => 'iconpicker',
      'class' => '',
      'std' => 'icon-like',
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'style',
        'value' => 'style1',
      ),
      'settings' => 
      array (
        'emptyIcon' => true,
        'type' => 'jevelin_vc_icons',
      ),
    ),
    7 => 
    array (
      'param_name' => 'color_line',
      'heading' => 'Line Color',
      'description' => 'Select line color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'style',
        'value' => 
        array (
          0 => 'style1',
          1 => 'style4',
          2 => 'style5',
          3 => 'style7',
        ),
      ),
    ),
    8 => 
    array (
      'param_name' => 'shape',
      'heading' => 'Shape',
      'description' => 'Select icon shape',
      'value' => 
      array (
        'Circle' => 'circle',
        'Square' => 'square',
        'Rounded' => 'rounded',
        'Rhombus' => 'rhombus',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'circle',
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'style',
        'value' => 
        array (
          0 => 'style7',
          1 => 'style8',
          2 => 'style9',
        ),
      ),
    ),
    9 => 
    array (
      'param_name' => 'background_color',
      'heading' => 'Background Color',
      'description' => 'Select background color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'style',
        'value' => 
        array (
          0 => 'style8',
          1 => 'style9',
        ),
      ),
    ),
    10 => 
    array (
      'param_name' => 'alignment',
      'heading' => 'Icon Alignment',
      'description' => 'Choose icon alignment',
      'value' => 
      array (
        'Left' => 'left',
        'Center' => 'center',
        'Right' => 'right',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'center',
      'group' => 'Styling',
    ),
    11 => 
    array (
      'param_name' => 'box_alignment',
      'heading' => 'Box Alignment',
      'description' => 'Choose box alignment',
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
      'group' => 'Styling',
    ),
    12 => 
    array (
      'param_name' => 'color_title',
      'heading' => 'Title Color',
      'description' => 'Select title color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    13 => 
    array (
      'param_name' => 'color_text',
      'heading' => 'Text Color',
      'description' => 'Select text color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    14 => 
    array (
      'param_name' => 'color_icon',
      'heading' => 'Icon Color',
      'description' => 'Select icon color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    15 => 
    array (
      'param_name' => 'color_text_hover',
      'heading' => 'Text Hover Color',
      'description' => 'Select text hover color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    16 => 
    array (
      'param_name' => 'color_icon_hover',
      'heading' => 'Icon Hover Color',
      'description' => 'Select icon hover color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    17 => 
    array (
      'param_name' => 'font',
      'heading' => 'Title Font Famility',
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
      'group' => 'Typography',
    ),
    18 => 
    array (
      'param_name' => 'weight',
      'heading' => 'Title Weight',
      'description' => 'Select title weight',
      'value' => 
      array (
        'Default (from theme settings)' => 'default',
        'Normal' => 'normal',
        'Bold' => 'bold',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'default',
      'group' => 'Typography',
    ),
    19 => 
    array (
      'param_name' => 'font_size',
      'heading' => 'Title Size',
      'description' => 'Enter title size (with <b>px</b>)',
      'value' => '16px',
      'type' => 'textfield',
      'class' => '',
      'std' => '16px',
      'group' => 'Typography',
    ),
    20 => 
    array (
      'param_name' => 'icon_size',
      'heading' => 'Icon Size',
      'description' => 'Enter icon size (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Typography',
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/icon-box/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/icon-box/static.php';
        if( function_exists( 'jevelin_shortcode_icon_box_css' ) ) :
            jevelin_shortcode_icon_box_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_icon_box();