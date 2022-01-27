<?php
class vcj_accordion extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_accordion', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Accordion',
  'base' => 'vcj_accordion',
  'description' => 'Collapsible content panels',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'testimonials',
      'heading' => 'Accordions',
      'description' => 'Add, remove, edit or reorder your a ccordions',
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
          'value' => 'Title',
        ),
        1 => 
        array (
          'type' => 'textarea',
          'heading' => 'Content',
          'description' => 'Enter content
							<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
          'param_name' => 'content',
          'value' => 'Content',
        ),
        2 => 
        array (
          'type' => 'iconpicker',
          'heading' => 'Icon (for style 5 only)',
          'description' => 'Choose icon for style 5 only',
          'param_name' => 'icon',
          'value' => 'fa fa-chevron-down',
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
      'param_name' => 'collapsed',
      'heading' => 'First element expanded',
      'description' => 'Show the first accordion element expanded',
      'value' => 
      array (
        'Off' => false,
        'On' => true,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => true,
      'group' => 'General',
    ),
    2 => 
    array (
      'param_name' => 'icon',
      'heading' => 'Icon Collapsed',
      'description' => 'Choose collapsed icon',
      'value' => 'fa fa-chevron-down',
      'type' => 'iconpicker',
      'class' => '',
      'std' => 'fa fa-chevron-down',
      'group' => 'Icons',
      'settings' => 
      array (
        'emptyIcon' => true,
        'type' => 'jevelin_vc_icons',
      ),
    ),
    3 => 
    array (
      'param_name' => 'icon_close',
      'heading' => 'Icon Expanded',
      'description' => 'Choose expanded icon',
      'value' => 'fa fa-chevron-up',
      'type' => 'iconpicker',
      'class' => '',
      'std' => 'fa fa-chevron-up',
      'group' => 'Icons',
      'settings' => 
      array (
        'emptyIcon' => true,
        'type' => 'jevelin_vc_icons',
      ),
    ),
    4 => 
    array (
      'param_name' => 'icon_position',
      'heading' => 'Icon Alignment',
      'description' => 'Choose icon alignment',
      'value' => 
      array (
        'Left' => 'left',
        'Right' => 'right',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'left',
      'group' => 'Icons',
    ),
    5 => 
    array (
      'param_name' => 'icon_size',
      'heading' => 'Icon Size',
      'description' => 'Choose icon size',
      'value' => 
      array (
        'Small' => '14px',
        'Medium' => '18px',
        'Large' => '22px',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '14px',
      'group' => 'Icons',
    ),
    6 => 
    array (
      'param_name' => 'style',
      'heading' => 'Style',
      'description' => 'Choose main style for accordion',
      'value' => 
      array (
        'Style 1' => 'style1',
        'Style 2' => 'style3',
        'Style 3' => 'style3 sh-accordion-style3-center',
        'Style 4' => 'style4',
        'Style 5' => 'style1 sh-accordion-style6',
        'Style 6' => 'style7',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    7 => 
    array (
      'param_name' => 'border_color',
      'heading' => 'Border Color',
      'description' => 'Select border color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '#e5e5e5',
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'style',
        'value' => 
        array (
          0 => 'style3',
          1 => 'style3 sh-accordion-style3-center',
          2 => 'style7',
        ),
      ),
    ),
    8 => 
    array (
      'param_name' => 'border_radius',
      'heading' => 'Border Radius',
      'description' => 'Enter border radius in px',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    9 => 
    array (
      'param_name' => 'icon_color',
      'heading' => 'Icon Color',
      'description' => 'Select icon color (not expanded)',
      'value' => '#505050',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '#505050',
      'group' => 'Styling',
    ),
    10 => 
    array (
      'param_name' => 'text_color',
      'heading' => 'Heading Text Color',
      'description' => 'Select heading text color',
      'value' => '#505050',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '#505050',
      'group' => 'Styling',
    ),
    11 => 
    array (
      'param_name' => 'background_color',
      'heading' => 'Heading Background Color',
      'description' => 'Select heading background color',
      'value' => '#f4f4f4',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '#f4f4f4',
      'group' => 'Styling',
    ),
    12 => 
    array (
      'param_name' => 'expanded_text_color',
      'heading' => 'Expanded Heading Text Color',
      'description' => 'Select expanted heading text color',
      'value' => '#ffffff',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '#ffffff',
      'group' => 'Styling',
    ),
    13 => 
    array (
      'param_name' => 'expanded_background_color',
      'heading' => 'Expanded Heading Background Color',
      'description' => 'Select expanded heading background color or leave blank for theme accent color',
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
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/accordion/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/accordion/static.php';
        if( function_exists( 'jevelin_shortcode_accordion_css' ) ) :
            jevelin_shortcode_accordion_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_accordion();