<?php
class vcj_testimonials extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_testimonials', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Testimonials',
  'base' => 'vcj_testimonials',
  'description' => 'Simple testimonials',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'testimonials',
      'heading' => 'Testimonials',
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
          'type' => 'textfield',
          'heading' => 'Name',
          'description' => 'Enter name',
          'param_name' => 'name',
          'value' => '',
        ),
        1 => 
        array (
          'type' => 'textfield',
          'heading' => 'Profession',
          'description' => 'Enter profession',
          'param_name' => 'job',
          'value' => '',
        ),
        2 => 
        array (
          'type' => 'textarea',
          'heading' => 'Quote',
          'description' => 'Enter quote',
          'param_name' => 'quote',
          'value' => '',
        ),
        3 => 
        array (
          'type' => 'attach_image',
          'heading' => 'Avatar',
          'description' => 'Upload avatar',
          'param_name' => 'avatar',
          'value' => '',
        ),
        4 => 
        array (
          'type' => 'attach_image',
          'heading' => 'Avater (for Style 4)',
          'description' => 'Upload avatar',
          'param_name' => 'avatar2',
          'value' => '',
        ),
      ),
    ),
    1 => 
    array (
      'param_name' => 'autoplay',
      'heading' => 'Autoplay',
      'description' => 'Enable or disable autoplay',
      'value' => 
      array (
        'Off' => 'off',
        'On' => 'on',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'off',
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
        'Style 5' => 'style5',
        'Style 6' => 'style6',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'style1',
      'group' => 'Styling',
      'admin_label' => true,
    ),
    3 => 
    array (
      'param_name' => 'color_accent',
      'heading' => 'Accent Color',
      'description' => 'Select accent color or leave it empty for global value',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    4 => 
    array (
      'param_name' => 'color_heading',
      'heading' => 'Heading Color',
      'description' => 'Choose heading color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    5 => 
    array (
      'param_name' => 'color_job',
      'heading' => 'Profession Color',
      'description' => 'Choose profession color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    6 => 
    array (
      'param_name' => 'color_text',
      'heading' => 'Text Color',
      'description' => 'Choose text color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    7 => 
    array (
      'param_name' => 'line_text',
      'heading' => 'Line Color',
      'description' => 'Choose line color. Only for Style 3 and Style 4',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    8 => 
    array (
      'param_name' => 'color_switch',
      'heading' => 'Switch Color',
      'description' => 'Choose switch color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    9 => 
    array (
      'param_name' => 'color_quote',
      'heading' => 'Quote Color',
      'description' => 'Choose quote color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    10 => 
    array (
      'param_name' => 'quote',
      'heading' => 'Quote Icon',
      'description' => 'Enable or disable quote icon',
      'value' => 
      array (
        'Off' => 'off',
        'On' => 'on',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'on',
      'group' => 'Styling',
    ),
    11 => 
    array (
      'param_name' => 'description_styles',
      'heading' => 'Description Styles',
      'description' => 'Select font styles you want to apply for description text',
      'value' => 
      array (
        'Regular' => 'regular',
        'Bold' => 'bold',
        'Italic' => 'italic',
        'Underline' => 'underline',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '',
      'group' => 'Typography',
    ),
    12 => 
    array (
      'param_name' => 'description_size',
      'heading' => 'Description Size',
      'description' => 'Enter description size (with <b>px</b>)',
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
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/testimonials/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/testimonials/static.php';
        if( function_exists( 'jevelin_shortcode_testimonials_css' ) ) :
            jevelin_shortcode_testimonials_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_testimonials();