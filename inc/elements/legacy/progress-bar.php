<?php
class vcj_progress_bar extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_progress_bar', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Progress Bar',
  'base' => 'vcj_progress_bar',
  'description' => 'Animated progress bar',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'title',
      'heading' => 'Title',
      'description' => 'Enter title',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => '',
      'admin_label' => true,
    ),
    1 => 
    array (
      'param_name' => 'percentage',
      'heading' => 'Percentage',
      'description' => 'Enter percentage between 0-100 (without %)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => '',
      'admin_label' => true,
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
        'Style 5' => 'style5',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'style1',
      'group' => '',
    ),
    3 => 
    array (
      'param_name' => 'accent_color',
      'heading' => 'Accent Color',
      'description' => 'Select accent color or leave empty for global value',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => '',
    ),
    4 => 
    array (
      'param_name' => 'accent_color2',
      'heading' => 'Accent Color 2 (to create a gradient)',
      'description' => 'Choose accent color 2 to create a gradient effect',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => '',
    ),
    5 => 
    array (
      'param_name' => 'background_color',
      'heading' => 'Background Color',
      'description' => 'Choose background color',
      'value' => '',
      'type' => 'colorpicker',
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
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/progress-bar/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/progress-bar/static.php';
        if( function_exists( 'jevelin_shortcode_progress_bar_css' ) ) :
            jevelin_shortcode_progress_bar_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_progress_bar();