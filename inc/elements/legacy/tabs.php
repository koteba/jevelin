<?php
class vcj_tabs extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_tabs', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Tabs (old)',
  'base' => 'vcj_tabs',
  'description' => 'Show your tabs',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'tabs',
      'heading' => 'Tabs',
      'description' => 'Here you can add, remove and edit your Tabs.',
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
          'heading' => 'Title',
          'description' => 'Enter title',
          'param_name' => 'title',
          'value' => '',
        ),
        1 => 
        array (
          'type' => 'textarea',
          'heading' => 'Content',
          'description' => 'Enter content
							<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
          'param_name' => 'content2',
          'value' => '',
        ),
        2 => 
        array (
          'type' => 'iconpicker',
          'heading' => 'Icon',
          'description' => 'Enter title',
          'param_name' => 'icon',
          'value' => '',
          'settings' => 
          array (
            'emptyIcon' => true,
            'type' => 'jevelin_vc_icons',
          ),
        ),
      ),
    ),
    1 => 
    array (
      'param_name' => 'style',
      'heading' => 'Style',
      'description' => 'Choose main style',
      'value' => 
      array (
        'Style 1' => 'style1',
        'Style 2' => 'style2',
        'Style 3' => 'style2 sh-tabs-style3',
        'Style 4' => 'style4',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'style1',
      'group' => 'Styling',
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
      'param_name' => 'border_color',
      'heading' => 'Tab Line Color',
      'description' => 'Select border color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    4 => 
    array (
      'param_name' => 'accent_color',
      'heading' => 'Active Tab Color',
      'description' => 'Select accent tab color or leave it empty for global value',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    5 => 
    array (
      'param_name' => 'border_accent_color',
      'heading' => 'Active Tab Line Color',
      'description' => 'Select active border color',
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
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/tabs/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/tabs/static.php';
        if( function_exists( 'jevelin_shortcode_tabs_css' ) ) :
            jevelin_shortcode_tabs_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_tabs();