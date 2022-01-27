<?php
class vcj_timeline extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_timeline', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Timeline',
  'base' => 'vcj_timeline',
  'description' => 'Show your timeline',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'timeline',
      'heading' => 'Timeline',
      'description' => 'Here you can add, remove and edit your Timeline.',
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
          'type' => 'textfield',
          'heading' => 'Date',
          'description' => 'Enter date',
          'param_name' => 'date',
          'value' => '',
        ),
        2 => 
        array (
          'type' => 'textarea',
          'heading' => 'Content',
          'description' => 'Enter content
							<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
          'param_name' => 'content',
          'value' => '',
        ),
        3 => 
        array (
          'type' => 'attach_image',
          'heading' => 'Image',
          'description' => 'Upload image for style 2 and style 3 only',
          'param_name' => 'image',
          'value' => '',
        ),
        4 => 
        array (
          'type' => 'iconpicker',
          'heading' => 'Icon',
          'description' => 'Select Icon',
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
        'Style 3' => 'style2 style3',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    2 => 
    array (
      'param_name' => 'title_color',
      'heading' => 'Heading Color',
      'description' => 'Choose heading color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    3 => 
    array (
      'param_name' => 'content_color',
      'heading' => 'Content Color',
      'description' => 'Choose content color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    4 => 
    array (
      'param_name' => 'date_color',
      'heading' => 'Date Color',
      'description' => 'Choose date box text color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    5 => 
    array (
      'param_name' => 'date_background_color',
      'heading' => 'Background Color',
      'description' => 'Choose background color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    6 => 
    array (
      'param_name' => 'border_color',
      'heading' => 'Border Color',
      'description' => 'Choose background color. Only for Style 1',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    7 => 
    array (
      'param_name' => 'accent_color',
      'heading' => 'Accent Color',
      'description' => 'Choose accent color or Leave it empty for global value',
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
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/timeline/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/timeline/static.php';
        if( function_exists( 'jevelin_shortcode_timeline_css' ) ) :
            jevelin_shortcode_timeline_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_timeline();