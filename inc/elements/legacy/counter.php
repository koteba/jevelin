<?php
class vcj_counter extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_counter', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Counter',
  'base' => 'vcj_counter',
  'description' => 'Animated counter',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'number',
      'heading' => 'Number',
      'description' => 'Enter number',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
      'admin_label' => true,
    ),
    1 => 
    array (
      'param_name' => 'number_symbol',
      'heading' => 'Number Symbol',
      'description' => 'Here you can add symbol like + after number',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    2 => 
    array (
      'param_name' => 'title',
      'heading' => 'Title',
      'description' => 'Enter title',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
      'admin_label' => true,
    ),
    3 => 
    array (
      'param_name' => 'subtitle',
      'heading' => 'Subtitle',
      'description' => 'Enter subtitle',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    4 => 
    array (
      'param_name' => 'icon',
      'heading' => 'Icon',
      'description' => 'Select icon',
      'value' => '',
      'type' => 'iconpicker',
      'class' => '',
      'std' => '',
      'group' => 'General',
      'settings' => 
      array (
        'emptyIcon' => true,
        'type' => 'jevelin_vc_icons',
      ),
    ),
    5 => 
    array (
      'param_name' => 'style',
      'heading' => 'Style',
      'description' => 'Select main style',
      'value' => 
      array (
        'Style 1' => 'style1',
        'Style 2' => 'style2',
        'Style 3' => 'style3',
        'Style 4' => 'style4',
        'Style 5' => 'style5',
        'Style 6' => 'style6',
        'Number Only' => 'style7',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    6 => 
    array (
      'param_name' => 'divider_color',
      'heading' => 'Divider Color',
      'description' => 'Select divider color',
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
          0 => 'style2',
          1 => 'style3',
          2 => 'style6',
        ),
      ),
    ),
    7 => 
    array (
      'param_name' => 'icon_border_color',
      'heading' => 'Icon Border Color',
      'description' => 'Select icon border color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'style',
        'value' => 'style5',
      ),
    ),
    8 => 
    array (
      'param_name' => 'icon_background_color',
      'heading' => 'Icon Background Color',
      'description' => 'Select icon background color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'style',
        'value' => 'style5',
      ),
    ),
    9 => 
    array (
      'param_name' => 'divider_style',
      'heading' => 'Divider Style',
      'description' => 'Description',
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
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'style',
        'value' => 'style6',
      ),
    ),
    10 => 
    array (
      'param_name' => 'icon_color',
      'heading' => 'Icon Color',
      'description' => 'Select icon color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    11 => 
    array (
      'param_name' => 'number_color',
      'heading' => 'Number Color',
      'description' => 'Select number color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    12 => 
    array (
      'param_name' => 'title_color',
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
      'param_name' => 'subtitle_color',
      'heading' => 'Subtitle Color',
      'description' => 'Select subtitle color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    14 => 
    array (
      'param_name' => 'number_size',
      'heading' => 'Number Font Size',
      'description' => 'Choose number font size',
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
    15 => 
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
        'element' => 'number_size',
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
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'number_size',
        'value' => 'custom',
      ),
    ),
    17 => 
    array (
      'param_name' => 'font',
      'heading' => 'Number Font Famility',
      'description' => 'Select number font famility',
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
      'group' => 'Styling',
    ),
    18 => 
    array (
      'param_name' => 'number_weight',
      'heading' => 'Number Font Weight',
      'description' => 'Select font weight',
      'value' => 
      array (
        'Extra Light' => 200,
        'Light' => 300,
        'Normal' => 400,
        'Medium' => 500,
        'Semi-bold' => 600,
        'Bold' => 700,
        'Extra Bold' => 900,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '700',
      'group' => 'Styling',
    ),
    19 => 
    array (
      'param_name' => 'title_size',
      'heading' => 'Title Font Size',
      'description' => 'Enter font size (with <b>px</b>)',
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
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/counter/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/counter/static.php';
        if( function_exists( 'jevelin_shortcode_counter_css' ) ) :
            jevelin_shortcode_counter_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_counter();