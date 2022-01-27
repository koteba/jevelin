<?php
class vcj_pricing_table extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_pricing_table', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Pricing Table',
  'base' => 'vcj_pricing_table',
  'description' => 'Simple pricing table',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'name',
      'heading' => 'Title',
      'description' => 'Enter title',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    1 => 
    array (
      'param_name' => 'price',
      'heading' => 'Price',
      'description' => 'Enter price',
      'value' => '$ 100',
      'type' => 'textfield',
      'class' => '',
      'std' => '$ 100',
      'group' => 'General',
      'admin_label' => true,
    ),
    2 => 
    array (
      'param_name' => 'description',
      'heading' => 'Description',
      'description' => 'Center description',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
      'admin_label' => true,
    ),
    3 => 
    array (
      'param_name' => 'content2',
      'heading' => 'Content',
      'description' => 'Enter your content',
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
          'heading' => 'Amount',
          'description' => '',
          'param_name' => 'amount',
          'value' => '',
        ),
        1 => 
        array (
          'type' => 'textfield',
          'heading' => 'Description',
          'description' => '',
          'param_name' => 'description',
          'value' => '',
        ),
        2 => 
        array (
          'type' => 'iconpicker',
          'heading' => 'Icon',
          'description' => '',
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
    4 => 
    array (
      'param_name' => 'popover',
      'heading' => 'Popover message',
      'description' => 'Enter popover message',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    5 => 
    array (
      'param_name' => 'enlarge',
      'heading' => 'Enlarge',
      'description' => 'Enable or disable enlarged version',
      'value' => 
      array (
        'Off' => false,
        'On' => true,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => false,
      'group' => 'General',
    ),
    6 => 
    array (
      'param_name' => 'first_symbol',
      'heading' => 'First Symbol Smaller',
      'description' => 'Enable or disable first symbol smaller',
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
    7 => 
    array (
      'param_name' => 'button_status',
      'heading' => 'Button',
      'description' => 'Enable or disable button',
      'value' => 
      array (
        'Off' => false,
        'On' => true,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => true,
      'group' => 'Button',
    ),
    8 => 
    array (
      'param_name' => 'button_name',
      'heading' => 'Button Name',
      'description' => 'Enter button name',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Button',
    ),
    9 => 
    array (
      'param_name' => 'button_url',
      'heading' => 'Button Link',
      'description' => 'Enter button link',
      'value' => '#',
      'type' => 'textfield',
      'class' => '',
      'std' => '#',
      'group' => 'Button',
    ),
    10 => 
    array (
      'param_name' => 'button_style',
      'heading' => 'Button Style',
      'description' => 'Select button style',
      'value' => 
      array (
        'Text 1 (dark)' => 'style1',
        'Text 2 (light)' => 'style2',
        'Text 3 (accent color)' => 'style3',
        'Fancy 1 (dark)' => 'style5',
        'Fancy 2 (light)' => 'style6',
        'Fancy 3 (white)' => 'style7',
        'Fancy 4 (accent color)' => 'style4',
        'Fancy Spacing 1 (dark)' => 'style8',
        'Fancy Spacing 2 (light)' => 'style9',
        'Fancy Spacing 3 (white)' => 'style10',
        'Fancy Spacing 4 (accent color)' => 'style11',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'style1',
      'group' => 'Button',
    ),
    11 => 
    array (
      'param_name' => 'font_size',
      'heading' => 'Font Size',
      'description' => 'Enter font size in px',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Button',
    ),
    12 => 
    array (
      'param_name' => 'button_border_width',
      'heading' => 'Button Border Width',
      'description' => 'Enter button border width',
      'value' => '1px',
      'type' => 'textfield',
      'class' => '',
      'std' => '1px',
      'group' => 'Button',
    ),
    13 => 
    array (
      'param_name' => 'button_text_color',
      'heading' => 'Text Color',
      'description' => 'Select text color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Button',
    ),
    14 => 
    array (
      'param_name' => 'button_text_hover_color',
      'heading' => 'Text Hover Color',
      'description' => 'Select text hover color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Button',
    ),
    15 => 
    array (
      'param_name' => 'button_background_color',
      'heading' => 'Background Color',
      'description' => 'Select background colors',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Button',
    ),
    16 => 
    array (
      'param_name' => 'button_background_hover_color',
      'heading' => 'Background Hover Color',
      'description' => 'Select background hover color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Button',
    ),
    17 => 
    array (
      'param_name' => 'button_border_color',
      'heading' => 'Border Color',
      'description' => 'Select border color to add border',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Button',
    ),
    18 => 
    array (
      'param_name' => 'button_border_hover_color',
      'heading' => 'Border Hover Color',
      'description' => 'Select border hover color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Button',
    ),
    19 => 
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
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    20 => 
    array (
      'param_name' => 'icon',
      'heading' => 'Icon',
      'description' => 'Choose icon',
      'value' => '',
      'type' => 'iconpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
      'dependency' => 
      array (
        'element' => 'style',
        'value' => 
        array (
          0 => 'style1',
          1 => 'style2',
        ),
      ),
      'settings' => 
      array (
        'emptyIcon' => true,
        'type' => 'jevelin_vc_icons',
      ),
    ),
    21 => 
    array (
      'param_name' => 'image',
      'heading' => 'Background Image',
      'description' => 'Upload background image',
      'value' => '',
      'type' => 'attach_image',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    22 => 
    array (
      'param_name' => 'font',
      'heading' => 'Title Font Famility',
      'description' => 'Select font famility from the theme options',
      'value' => 
      array (
        'Heading' => 'heading',
        'Body' => 'body',
        'Additional font 1' => 'additional1',
        'Additional font 2' => 'additional2',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'heading',
      'group' => 'Styling',
    ),
    23 => 
    array (
      'param_name' => 'content_alignment',
      'heading' => 'Alignment',
      'description' => 'Choose content laignment',
      'value' => 
      array (
        'Center' => 'center',
        'Left' => 'left',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'center',
      'group' => 'Styling',
    ),
    24 => 
    array (
      'param_name' => 'background_text_color',
      'heading' => 'Heading Color',
      'description' => 'Choose heading color',
      'value' => '#ffffff',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '#ffffff',
      'group' => 'Colors',
    ),
    25 => 
    array (
      'param_name' => 'text_color',
      'heading' => 'Text Color',
      'description' => 'Choose text color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Colors',
    ),
    26 => 
    array (
      'param_name' => 'border_color',
      'heading' => 'Border Color',
      'description' => 'Choose border color',
      'value' => 'rgba(0,0,0,0.08)',
      'type' => 'colorpicker',
      'class' => '',
      'std' => 'rgba(0,0,0,0.08)',
      'group' => 'Colors',
    ),
    27 => 
    array (
      'param_name' => 'border_line',
      'heading' => 'Border Line',
      'description' => 'Enable or disable border line around the table',
      'value' => 
      array (
        'Off' => false,
        'On' => true,
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => true,
      'group' => 'Colors',
    ),
    28 => 
    array (
      'param_name' => 'accent_color',
      'heading' => 'Accent Color',
      'description' => 'Select accent color or leave it blank for global theme accent color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Colors',
    ),
    29 => 
    array (
      'param_name' => 'background_color',
      'heading' => 'Background Color',
      'description' => 'Choose background color',
      'value' => '#f8f8f8',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '#f8f8f8',
      'group' => 'Colors',
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/pricing-table/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/pricing-table/static.php';
        if( function_exists( 'jevelin_shortcode_pricing_table_css' ) ) :
            jevelin_shortcode_pricing_table_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_pricing_table();