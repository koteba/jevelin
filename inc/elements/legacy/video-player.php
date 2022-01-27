<?php
class vcj_video_player extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_video_player', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Video Player',
  'base' => 'vcj_video_player',
  'description' => 'Embed YouTube/Vimeo player',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'url',
      'heading' => 'URL',
      'description' => 'Enter video URL',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => '',
      'admin_label' => true,
    ),
    1 => 
    array (
      'param_name' => 'width',
      'heading' => 'Width',
      'description' => 'Enter element width (with <b>px</b>)',
      'value' => '100px',
      'type' => 'textfield',
      'class' => '',
      'std' => '100px',
      'group' => '',
    ),
    2 => 
    array (
      'param_name' => 'video_ratio',
      'heading' => 'Ratio',
      'description' => 'Choose video ratio ',
      'value' => 
      array (
        '16:9 (like modern laptops)' => '16_9',
        '4:3 (like iPad)' => '4_3',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => '16_9',
      'group' => '',
    ),
    3 => 
    array (
      'param_name' => 'placement',
      'heading' => 'Alignment',
      'description' => 'Choose video alignment ',
      'value' => 
      array (
        'Left' => 'left',
        'Center' => 'center',
        'Right' => 'right',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'left',
      'group' => '',
    ),
    4 => 
    array (
      'param_name' => 'image',
      'heading' => 'Placeholder Image',
      'description' => 'Upload a placeholder image',
      'value' => '',
      'type' => 'attach_image',
      'class' => '',
      'std' => '',
      'group' => '',
    ),
    5 => 
    array (
      'param_name' => 'image_size',
      'heading' => 'Placeholder Size',
      'description' => 'Select uploaded placeholder image size',
      'value' => 
      array (
        'Large' => 'large',
        'Full' => 'full',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'large',
      'group' => '',
    ),
    6 => 
    array (
      'param_name' => 'placeholder_icon',
      'heading' => 'Placholder Icon',
      'description' => 'Enable or disable placeholder icon when placholder image is selected',
      'value' => 
      array (
        'Off' => 'off',
        'On' => 'on',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'on',
      'group' => '',
    ),
    7 => 
    array (
      'param_name' => 'placeholder_icon_style',
      'heading' => 'Placholder Icon Style',
      'description' => 'Choose placholder icon style',
      'value' => 
      array (
        'Style 1' => 'style1',
        'Style 2' => 'style2',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'style1',
      'group' => '',
    ),
    8 => 
    array (
      'param_name' => 'custom_class',
      'heading' => 'Class Name',
      'description' => 'Enter custom class name',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => '',
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/video-player/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/video-player/static.php';
        if( function_exists( 'jevelin_shortcode_video_player_css' ) ) :
            jevelin_shortcode_video_player_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_video_player();