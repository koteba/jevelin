<?php
class vcj_partners extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_partners', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Partners',
  'base' => 'vcj_partners',
  'description' => 'Responsive partners',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'partners',
      'heading' => 'Partners',
      'description' => 'Here you can add, remove and edit your Testimonials.',
      'value' => '',
      'type' => 'param_group',
      'class' => '',
      'std' => '',
      'group' => 'General',
      'params' => 
      array (
        0 => 
        array (
          'type' => 'attach_image',
          'heading' => 'Logo',
          'description' => 'Upload a logo',
          'param_name' => 'logo',
          'value' => '',
        ),
        1 => 
        array (
          'type' => 'textfield',
          'heading' => 'Company',
          'description' => 'Enter company name',
          'param_name' => 'company',
          'value' => '',
        ),
        2 => 
        array (
          'type' => 'textfield',
          'heading' => 'Website',
          'description' => 'Enter company website',
          'param_name' => 'website',
          'value' => '',
        ),
      ),
    ),
    1 => 
    array (
      'param_name' => 'autoplay',
      'heading' => 'Autoplay Speed',
      'description' => 'Choose autoplay speed (in seconds)',
      'value' => '5',
      'type' => 'textfield',
      'class' => '',
      'std' => '5',
      'group' => 'General',
    ),
    2 => 
    array (
      'param_name' => 'columns',
      'heading' => 'Columns',
      'description' => 'Select partner column count',
      'value' => 
      array (
        '6 columns' => 6,
        '5 columns' => 5,
        '4 columns' => 4,
        '3 columns' => 3,
        '2 columns' => 2,
        '1 columns' => 1,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '5',
      'group' => 'Styling',
      'admin_label' => true,
    ),
    3 => 
    array (
      'param_name' => 'opacity',
      'heading' => 'Opacity',
      'description' => 'Enter custom image opacity 0-100 (0 hidden, 100 fully visible)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    4 => 
    array (
      'param_name' => 'opacity_hover',
      'heading' => 'Opacity on Hover (for images with links)',
      'description' => 'Enter custom image hover opacity 0-100 (0 hidden, 100 fully visible)',
      'value' => '75',
      'type' => 'textfield',
      'class' => '',
      'std' => '75',
      'group' => 'Styling',
    ),
    5 => 
    array (
      'param_name' => 'line',
      'heading' => 'Divider Line',
      'description' => 'Enable or disable divider line',
      'value' => 
      array (
        'Off' => false,
        'On' => true,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => false,
      'group' => 'Styling',
    ),
    6 => 
    array (
      'param_name' => 'padding',
      'heading' => 'Vertical Additional padding',
      'description' => 'Enable or disable additional vertical padding',
      'value' => 
      array (
        'Off' => false,
        'On' => true,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => false,
      'group' => 'Styling',
    ),
    7 => 
    array (
      'param_name' => 'padding_horizontal',
      'heading' => 'Horizontal Additional padding',
      'description' => 'Enable or disable additional horizontal padding',
      'value' => 
      array (
        'Off' => false,
        'On' => true,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => true,
      'group' => 'Styling',
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/partners/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/partners/static.php';
        if( function_exists( 'jevelin_shortcode_partners_css' ) ) :
            jevelin_shortcode_partners_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_partners();