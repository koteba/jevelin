<?php
class vcj_icon_box_slider extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_icon_box_slider', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Icon Box Slider',
  'base' => 'vcj_icon_box_slider',
  'description' => 'Enter slider services details',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'slides',
      'heading' => 'Icon box slides',
      'description' => 'Here you can add, remove and edit your Icon Box Slides.',
      'value' => '',
      'type' => 'param_group',
      'class' => '',
      'std' => '',
      'group' => '',
      'params' => 
      array (
        0 => 
        array (
          'type' => 'textfield',
          'heading' => 'Title',
          'description' => 'Enter name',
          'param_name' => 'title',
          'value' => '',
        ),
        1 => 
        array (
          'type' => 'textarea',
          'heading' => 'Content',
          'description' => 'Enter content
					<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
          'param_name' => 'content',
          'value' => '<h1 style="text-align: center;"><span style="font-size: 36px;">Mauris vel velit dignissim</span></h1><p style="text-align: center;"><span style="font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate vehicula sollicitudin. Aliquam rutrum aliquet nisl sit amet viverra. Nunc ac augue nunc.</span></p>',
        ),
        2 => 
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
        3 => 
        array (
          'type' => 'colorpicker',
          'heading' => 'Background color',
          'description' => 'Select background color or leave it blank for dark background',
          'param_name' => 'color',
          'value' => '',
        ),
        4 => 
        array (
          'type' => 'attach_image',
          'heading' => 'Background Image',
          'description' => 'Upload slide background image',
          'param_name' => 'image',
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
      'std' => 'on',
      'group' => '',
    ),
    2 => 
    array (
      'param_name' => 'arrows',
      'heading' => 'Slide Arrows',
      'description' => 'Enable or disable slide arrows',
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
    3 => 
    array (
      'param_name' => 'accent_color',
      'heading' => 'Accent Color',
      'description' => 'Select accent color or leave it empty for global value',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => '',
    ),
    4 => 
    array (
      'param_name' => 'slide_title_color',
      'heading' => 'Slide Title Color',
      'description' => 'Select slide title color or leave it empty for white',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => '',
    ),
    5 => 
    array (
      'param_name' => 'slide_descr_color',
      'heading' => 'Slide Description Color',
      'description' => 'Select slide description color or leave it empty for light grey',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => '',
    ),
    6 => 
    array (
      'param_name' => 'height',
      'heading' => 'Mobile Height',
      'description' => 'Increase mobile height, if content is being cropped',
      'value' => '600px',
      'type' => 'textfield',
      'class' => '',
      'std' => '600px',
      'group' => '',
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/icon-box-slider/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/icon-box-slider/static.php';
        if( function_exists( 'jevelin_shortcode_icon_box_slider_css' ) ) :
            jevelin_shortcode_icon_box_slider_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_icon_box_slider();