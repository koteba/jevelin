<?php
class vcj_event extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_event', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Event',
  'base' => 'vcj_event',
  'description' => 'Enter event details',
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
      'group' => 'General',
      'admin_label' => true,
    ),
    1 => 
    array (
      'param_name' => 'desc',
      'heading' => 'Description',
      'description' => 'Enter description',
      'value' => '',
      'type' => 'textarea',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    2 => 
    array (
      'param_name' => 'button_name',
      'heading' => 'Button Name',
      'description' => 'Enter button name',
      'value' => 'More',
      'type' => 'textfield',
      'class' => '',
      'std' => 'More',
      'group' => 'General',
    ),
    3 => 
    array (
      'param_name' => 'button_link',
      'heading' => 'Button Link',
      'description' => 'Enter button link',
      'value' => '#',
      'type' => 'textfield',
      'class' => '',
      'std' => '#',
      'group' => 'General',
    ),
    4 => 
    array (
      'param_name' => 'title_color',
      'heading' => 'Title Color',
      'description' => 'Select title color (optional)',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    5 => 
    array (
      'param_name' => 'desc_color',
      'heading' => 'Description Color',
      'description' => 'Select description color (optional)',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    6 => 
    array (
      'param_name' => 'line_color',
      'heading' => 'Line Color',
      'description' => 'Select line color (optional)',
      'value' => '',
      'type' => 'colorpicker',
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
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/event/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/event/static.php';
        if( function_exists( 'jevelin_shortcode_event_css' ) ) :
            jevelin_shortcode_event_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_event();