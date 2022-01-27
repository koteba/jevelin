<?php
class vcj_countdown extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_countdown', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Countdown',
  'base' => 'vcj_countdown',
  'description' => 'Simple countdown',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'date',
      'heading' => 'Date',
      'description' => 'Choose target date (example: 2029/01/31 12:00)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => '',
      'admin_label' => true,
    ),
    1 => 
    array (
      'param_name' => 'style',
      'heading' => 'Style',
      'description' => 'Select main style',
      'value' => 
      array (
        'Style 1' => 'style1',
        'Style 2' => 'style2',
        'Style 3' => 'style3',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'style1',
      'group' => '',
    ),
    2 => 
    array (
      'param_name' => 'size',
      'heading' => 'Size',
      'description' => 'Select countdown number and text size',
      'value' => 
      array (
        'Small' => 'small',
        'Medium' => 'medium',
        'Large' => 'large',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'medium',
      'group' => '',
    ),
    3 => 
    array (
      'param_name' => 'alignment',
      'heading' => 'Alignment',
      'description' => 'Select coundown alignment',
      'value' => 
      array (
        'Center' => 'center',
        'Left' => 'left',
        'Right' => 'right',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'center',
      'group' => '',
    ),
    4 => 
    array (
      'param_name' => 'number_color',
      'heading' => 'Number Color',
      'description' => 'Select number color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => '',
    ),
    5 => 
    array (
      'param_name' => 'title_color',
      'heading' => 'Title Color',
      'description' => 'Select title color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => '',
    ),
    6 => 
    array (
      'param_name' => 'border_color',
      'heading' => 'Border Color',
      'description' => 'Select border color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => '',
    ),
    7 => 
    array (
      'param_name' => 'bold',
      'heading' => 'Bold Numbers',
      'description' => 'Switch between regular and bold numbers',
      'value' => 
      array (
        'Regular' => 'regular',
        'Bold' => 'bold',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'regular',
      'group' => '',
    ),
    8 => 
    array (
      'param_name' => 'title_size',
      'heading' => 'Title Size',
      'description' => 'Enter custom title size (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => '',
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/countdown/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/countdown/static.php';
        if( function_exists( 'jevelin_shortcode_countdown_css' ) ) :
            jevelin_shortcode_countdown_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_countdown();