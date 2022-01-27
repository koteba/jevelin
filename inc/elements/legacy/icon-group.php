<?php
class vcj_icon_group extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_icon_group', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Icon Group',
  'base' => 'vcj_icon_group',
  'description' => 'Add multiple icons',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'icons',
      'heading' => 'Icons',
      'description' => 'Here you can add, remove and edit your icons',
      'value' => '',
      'type' => 'param_group',
      'class' => '',
      'std' => '',
      'group' => 'General',
      'params' => 
      array (
        0 => 
        array (
          'type' => 'iconpicker',
          'heading' => 'Icon',
          'description' => 'Select Icon',
          'param_name' => 'icon',
          'value' => 'ti-check',
          'settings' => 
          array (
            'emptyIcon' => true,
            'type' => 'jevelin_vc_icons',
          ),
        ),
        1 => 
        array (
          'type' => 'textfield',
          'heading' => 'Link',
          'description' => 'Enter icon link',
          'param_name' => 'link',
          'value' => '',
        ),
      ),
    ),
    1 => 
    array (
      'param_name' => 'alignment',
      'heading' => 'Alignment',
      'description' => 'Choose alignment',
      'value' => 
      array (
        'Center' => 'center',
        'Left' => 'left',
        'Right' => 'right',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'center',
      'group' => 'General',
      'admin_label' => true,
    ),
    2 => 
    array (
      'param_name' => 'alignment_mobile',
      'heading' => 'Alignment (mobile)',
      'description' => 'Choose mobile alignment',
      'value' => 
      array (
        'Default' => 'default',
        'Center' => 'center',
        'Left' => 'left',
        'Right' => 'right',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'default',
      'group' => 'General',
    ),
    3 => 
    array (
      'param_name' => 'style',
      'heading' => 'Style',
      'description' => 'Choose icon style',
      'value' => 
      array (
        'Style 1 (background on hover)' => 'style1',
        'Style 2 (with line)' => 'style2',
        'Style 3 (without background color)' => 'style3',
        'Style 4 (without padding)' => 'style4',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'style1',
      'group' => 'General',
    ),
    4 => 
    array (
      'param_name' => 'icon_size',
      'heading' => 'Size',
      'description' => 'Enter icon size (with <b>px</b>)',
      'value' => '24px',
      'type' => 'textfield',
      'class' => '',
      'std' => '24px',
      'group' => 'General',
    ),
    5 => 
    array (
      'param_name' => 'icon_color',
      'heading' => 'Icon Color',
      'description' => 'Select icon color or leave blank for default body color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    6 => 
    array (
      'param_name' => 'icon_hover_color',
      'heading' => 'Icon Hover Color',
      'description' => 'Select icon color or leave blank for default body color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    7 => 
    array (
      'param_name' => 'width',
      'heading' => 'Icon Box Size',
      'description' => 'Enter icon box size for width/height, default 60px. You can disable it by enterting auto',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    8 => 
    array (
      'param_name' => 'padding',
      'heading' => 'Padding',
      'description' => 'Enter icon padding, default is 0px 10px 0px 10px (&lt;b&gt;top right bottom left&lt;/b&gt;)',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    9 => 
    array (
      'param_name' => 'margin_desktop',
      'heading' => 'Margin v22',
      'description' => 'Enter your custom margin (top right bottom left)',
      'value' => '0px 0px 0px 0px',
      'type' => 'textfield',
      'class' => '',
      'std' => '0px 0px 0px 0px',
      'group' => 'Position',
    ),
    10 => 
    array (
      'param_name' => 'margin_responsive',
      'heading' => 'Margin Responsive',
      'description' => 'Here you can set responsive smartphone and tablet margin (top right bottom left). For example: 30px 0px 30px 0px',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Position',
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/icon-group/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/icon-group/static.php';
        if( function_exists( 'jevelin_shortcode_icon_group_css' ) ) :
            jevelin_shortcode_icon_group_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_icon_group();