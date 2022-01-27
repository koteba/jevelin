<?php
class vcj_text_block extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_text_block', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Text Block',
  'base' => 'vcj_text_block',
  'description' => 'A block of text with WYSIWYG editor',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'content',
      'heading' => 'Content',
      'description' => 'Enter content
					<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
      'value' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
      'type' => 'textarea_html',
      'class' => '',
      'std' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
      'group' => 'General',
      'admin_label' => true,
    ),
    1 => 
    array (
      'param_name' => 'paragraph_whitespace',
      'heading' => 'Paragraph Whitespace',
      'description' => 'Enable or disable paragraph line brake whitespace',
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
    2 => 
    array (
      'param_name' => 'text_size',
      'heading' => 'Font Size',
      'description' => 'Enter title size (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    3 => 
    array (
      'param_name' => 'text_size_mobile',
      'heading' => 'Font Size (responsive)',
      'description' => 'Enter title size (with <b>px</b>) for mobile devices',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    4 => 
    array (
      'param_name' => 'line_height',
      'heading' => 'Line height',
      'description' => 'Enter line height (with <b>px</b>)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    5 => 
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
    6 => 
    array (
      'param_name' => 'link_color',
      'heading' => 'Link Color',
      'description' => 'Select link color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    7 => 
    array (
      'param_name' => 'link_hover_color',
      'heading' => 'Link Hover Color',
      'description' => 'Select link hover color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    8 => 
    array (
      'param_name' => 'margin',
      'heading' => 'Margin',
      'description' => 'Enter your custom margin (<b>top right bottom left</b>)',
      'value' => '0px 0px 15px 0px',
      'type' => 'textfield',
      'class' => '',
      'std' => '0px 0px 15px 0px',
      'group' => 'Styling',
    ),
    9 => 
    array (
      'param_name' => 'class',
      'heading' => 'Class Name',
      'description' => 'Enter custom class name',
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
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/text-block/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/text-block/static.php';
        if( function_exists( 'jevelin_shortcode_text_block_css' ) ) :
            jevelin_shortcode_text_block_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_text_block();