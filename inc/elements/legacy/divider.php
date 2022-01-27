<?php
class vcj_divider extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_divider', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Divider',
  'base' => 'vcj_divider',
  'description' => 'Add divider',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'width',
      'heading' => 'Divider Width',
      'description' => 'Choose divider width',
      'value' => 
      array (
        'Full' => 'full',
        'Fixed' => 'fixed',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'full',
      'group' => 'General',
    ),
    1 => 
    array (
      'param_name' => 'fixed_width',
      'heading' => 'Custom Width',
      'description' => 'Choose custom width',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => 30,
      'group' => 'General',
      'dependency' => 
      array (
        'element' => 'width',
        'value' => 'fixed',
      ),
    ),
    2 => 
    array (
      'param_name' => 'type',
      'heading' => 'Line Type',
      'description' => 'Select line type',
      'value' => 
      array (
        'Normal' => 'solid',
        'Dotted' => 'dotted',
        'Dashed' => 'dashed',
        'Double' => 'double',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    3 => 
    array (
      'param_name' => 'height',
      'heading' => 'Line Height',
      'description' => 'Choose line height',
      'value' => '1',
      'type' => 'textfield',
      'class' => '',
      'std' => '1',
      'group' => 'General',
    ),
    4 => 
    array (
      'param_name' => 'radius',
      'heading' => 'Line Radius',
      'description' => 'Select line radius',
      'value' => 0,
      'type' => 'textfield',
      'class' => '',
      'std' => 0,
      'group' => 'General',
    ),
    5 => 
    array (
      'param_name' => 'alignment',
      'heading' => 'Alignment',
      'description' => 'Select divider alignment',
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
      'admin_label' => true,
    ),
    6 => 
    array (
      'param_name' => 'contentlayout',
      'heading' => 'Content',
      'description' => 'Select what kind of content divider will have',
      'value' => 
      array (
        'None' => 'none',
        'Icon' => 'icon_option',
        'Text' => 'title_option',
        'Text Box' => 'title_box_option',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'none',
      'group' => 'Style',
    ),
    7 => 
    array (
      'param_name' => 'icon',
      'heading' => 'Icon',
      'description' => 'Select icon',
      'value' => '',
      'type' => 'iconpicker',
      'class' => '',
      'std' => '',
      'group' => 'Style',
      'dependency' => 
      array (
        'element' => 'contentlayout',
        'value' => 'icon_option',
      ),
      'settings' => 
      array (
        'emptyIcon' => true,
        'type' => 'jevelin_vc_icons',
      ),
    ),
    8 => 
    array (
      'param_name' => 'icon_color',
      'heading' => 'Icon Color',
      'description' => 'Select icon color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '#cccccc',
      'group' => 'Style',
      'dependency' => 
      array (
        'element' => 'contentlayout',
        'value' => 'icon_option',
      ),
    ),
    9 => 
    array (
      'param_name' => 'icon_multiplier',
      'heading' => 'Icon multiplier',
      'description' => 'Select how many times icon will be duplicated',
      'value' => 
      array (
        '1 time' => 1,
        '2 times' => 2,
        '3 times' => 3,
        '5 times' => 5,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '1',
      'group' => 'Style',
      'dependency' => 
      array (
        'element' => 'contentlayout',
        'value' => 'icon_option',
      ),
    ),
    10 => 
    array (
      'param_name' => 'icon_size',
      'heading' => 'Icon Size',
      'description' => 'Enter icon size (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Style',
      'dependency' => 
      array (
        'element' => 'contentlayout',
        'value' => 'icon_option',
      ),
    ),
    11 => 
    array (
      'param_name' => 'title',
      'heading' => 'Content',
      'description' => 'Enter content
								<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
      'value' => '',
      'type' => 'textarea',
      'class' => '',
      'std' => 'Divider Title',
      'group' => 'Style',
      'dependency' => 
      array (
        'element' => 'contentlayout',
        'value' => 'title_option',
      ),
    ),
    12 => 
    array (
      'param_name' => 'font',
      'heading' => 'Title Font Famility',
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
      'group' => 'Style',
      'dependency' => 
      array (
        'element' => 'contentlayout',
        'value' => 
        array (
          0 => 'title_option',
          1 => 'title_box_option',
        ),
      ),
    ),
    13 => 
    array (
      'param_name' => 'title_color',
      'heading' => 'Title Color',
      'description' => 'Select icon color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Style',
      'dependency' => 
      array (
        'element' => 'contentlayout',
        'value' => 
        array (
          0 => 'title_option',
          1 => 'title_box_option',
        ),
      ),
    ),
    14 => 
    array (
      'param_name' => 'title_box',
      'heading' => 'Content',
      'description' => 'Enter content
								<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
      'value' => '',
      'type' => 'textarea',
      'class' => '',
      'std' => 'Divider Title Box',
      'group' => 'Style',
      'dependency' => 
      array (
        'element' => 'contentlayout',
        'value' => 'title_box_option',
      ),
    ),
    15 => 
    array (
      'param_name' => 'title_background_color',
      'heading' => 'Title Background Color',
      'description' => 'Select title background color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '#8d8d8d',
      'group' => 'Style',
      'dependency' => 
      array (
        'element' => 'contentlayout',
        'value' => 'title_box_option',
      ),
    ),
    16 => 
    array (
      'param_name' => 'title_radius',
      'heading' => 'Title Box Radius',
      'description' => 'Choose title box radius',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '0',
      'group' => 'Style',
      'dependency' => 
      array (
        'element' => 'contentlayout',
        'value' => 'title_box_option',
      ),
    ),
    17 => 
    array (
      'param_name' => 'line_color',
      'heading' => 'Line Color',
      'description' => 'Select line color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Style',
    ),
    18 => 
    array (
      'param_name' => 'margin',
      'heading' => 'Margin',
      'description' => 'Enter your custom margin (<b>top right bottom left</b>)',
      'value' => '30px 0px 30px 0px',
      'type' => 'textfield',
      'class' => '',
      'std' => '0px 0px 15px 0px',
      'group' => 'Style',
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/divider/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/divider/static.php';
        if( function_exists( 'jevelin_shortcode_divider_css' ) ) :
            jevelin_shortcode_divider_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_divider();