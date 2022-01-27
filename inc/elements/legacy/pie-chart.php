<?php
class vcj_pie_chart extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_pie_chart', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Pie Chart',
  'base' => 'vcj_pie_chart',
  'description' => 'Simple pie chart',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'type',
      'heading' => 'Type',
      'description' => 'Choose video alignment ',
      'value' => 
      array (
        'Circle' => 'circle',
        'Rhomb' => 'rhomb',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'circle',
      'group' => 'General',
      'admin_label' => true,
    ),
    1 => 
    array (
      'param_name' => 'percentage',
      'heading' => 'Percentage',
      'description' => 'Choose products per page',
      'value' => 50,
      'type' => 'textfield',
      'class' => '',
      'std' => 50,
      'group' => 'General',
      'admin_label' => true,
    ),
    2 => 
    array (
      'param_name' => 'text_color',
      'heading' => 'Text Color',
      'description' => 'Select text color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    3 => 
    array (
      'param_name' => 'line_color',
      'heading' => 'Line Color',
      'description' => 'Select line color',
      'value' => '#eeeeee',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '#eeeeee',
      'group' => 'Styling',
    ),
    4 => 
    array (
      'param_name' => 'accent_color',
      'heading' => 'Accent Color',
      'description' => 'Select line accent color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    5 => 
    array (
      'param_name' => 'accent_hover_color',
      'heading' => 'Accent Hover Color',
      'description' => 'Select line accent color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    6 => 
    array (
      'param_name' => 'background_color',
      'heading' => 'Background Color',
      'description' => 'Select text color',
      'value' => '#ffffff',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '#ffffff',
      'group' => 'Styling',
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/pie-chart/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/pie-chart/static.php';
        if( function_exists( 'jevelin_shortcode_pie_chart_css' ) ) :
            jevelin_shortcode_pie_chart_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_pie_chart();