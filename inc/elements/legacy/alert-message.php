<?php
class vcj_alert_message extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_alert_message', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Alert Message',
  'base' => 'vcj_alert_message',
  'description' => 'Message box',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'type',
      'heading' => 'Type',
      'description' => 'Choose message type',
      'value' => 
      array (
        'Notice Message' => 'notice',
        'Success Message' => 'success',
        'Warning Message' => 'warning',
        'Error Message' => 'error',
        'Info Message' => 'info',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'notice',
      'group' => 'General',
    ),
    1 => 
    array (
      'param_name' => 'title',
      'heading' => 'Title',
      'description' => 'Enter message title',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
      'admin_label' => true,
    ),
    2 => 
    array (
      'param_name' => 'text',
      'heading' => 'Content',
      'description' => 'Enter message content',
      'value' => '',
      'type' => 'textarea',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    3 => 
    array (
      'param_name' => 'icon',
      'heading' => 'Icon',
      'description' => 'Choose message icon',
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
    4 => 
    array (
      'param_name' => 'alignment',
      'heading' => 'Alignment',
      'description' => 'Choose message information alignment',
      'value' => 
      array (
        'Left' => 'left',
        'Center' => 'center',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'left',
      'group' => 'General',
    ),
    5 => 
    array (
      'param_name' => 'close',
      'heading' => 'Closable',
      'description' => 'Message can be closed',
      'value' => 
      array (
        'No' => false,
        'Yes' => true,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => true,
      'group' => 'General',
    ),
    6 => 
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
    7 => 
    array (
      'param_name' => 'background_color',
      'heading' => 'Background Color',
      'description' => 'Select background color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    8 => 
    array (
      'param_name' => 'border_color',
      'heading' => 'Border Color',
      'description' => 'Select border color',
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
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/alert-message/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/alert-message/static.php';
        if( function_exists( 'jevelin_shortcode_alert_message_css' ) ) :
            jevelin_shortcode_alert_message_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_alert_message();