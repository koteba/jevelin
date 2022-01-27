<?php
class vcj_team_member extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_team_member', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        vc_map( array (
  'name' => 'Team Member',
  'base' => 'vcj_team_member',
  'description' => 'Simple team member',
  'category' => 'Jevelin Elements',
  'params' => 
  array (
    0 => 
    array (
      'param_name' => 'image',
      'heading' => 'Image',
      'description' => 'Upload image',
      'value' => '',
      'type' => 'attach_image',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    1 => 
    array (
      'param_name' => 'name',
      'heading' => 'Name',
      'description' => 'Enter name',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
      'admin_label' => true,
    ),
    2 => 
    array (
      'param_name' => 'role',
      'heading' => 'Profession',
      'description' => 'Enter profession',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'General',
      'admin_label' => true,
    ),
    3 => 
    array (
      'param_name' => 'content',
      'heading' => 'Description',
      'description' => 'Enter description
					<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
      'value' => '',
      'type' => 'textarea_html',
      'class' => '',
      'std' => '',
      'group' => 'General',
    ),
    4 => 
    array (
      'param_name' => 'facebook',
      'heading' => 'Facebook',
      'description' => 'Enter Facebook URL or leave it blank',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Social Icons',
    ),
    5 => 
    array (
      'param_name' => 'twitter',
      'heading' => 'Twitter',
      'description' => 'Enter Twitter URL or leave it blank',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Social Icons',
    ),
    6 => 
    array (
      'param_name' => 'googleplus',
      'heading' => 'Google Plus',
      'description' => 'Enter Google Plus URL or leave it blank',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Social Icons',
    ),
    7 => 
    array (
      'param_name' => 'instagram',
      'heading' => 'Instagram',
      'description' => 'Enter Instagram URL or leave it blank',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Social Icons',
    ),
    8 => 
    array (
      'param_name' => 'skype',
      'heading' => 'Skype',
      'description' => 'Enter Skype URL or leave it blank',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Social Icons',
    ),
    9 => 
    array (
      'param_name' => 'behance',
      'heading' => 'Behance',
      'description' => 'Enter Behance URL or leave it blank',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Social Icons',
    ),
    10 => 
    array (
      'param_name' => 'linkedin',
      'heading' => 'linkedin',
      'description' => 'Enter Linkedin URL or leave it blank',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Social Icons',
    ),
    11 => 
    array (
      'param_name' => 'tumblr',
      'heading' => 'Tumblr',
      'description' => 'Enter Tumblr URL or leave it blank',
      'value' => '',
      'type' => 'textfield',
      'class' => '',
      'std' => '',
      'group' => 'Social Icons',
    ),
    12 => 
    array (
      'param_name' => 'layout',
      'heading' => 'Style',
      'description' => 'Choose main style for accordion',
      'value' => 
      array (
        'Style 1' => 'style1',
        'Style 2' => 'style2',
        'Style 3 (left alignment)' => 'style3',
        'Style 4' => 'style4',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'style1',
      'group' => 'Styling',
    ),
    13 => 
    array (
      'param_name' => 'image_ratio',
      'heading' => 'Image Ratio',
      'description' => 'Select image aspect ratio',
      'value' => 
      array (
        'Landscape' => 'landscape',
        'Portrait' => 'portrait',
        'Square' => 'square',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'landscape',
      'group' => 'Styling',
    ),
    14 => 
    array (
      'param_name' => 'icon_style',
      'heading' => 'Social Media Position',
      'description' => 'Choose main style for social icons',
      'value' => 
      array (
        'Standard' => 'standard',
        'Overlay' => 'overlay',
        'Overlay 2' => 'overlay2',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'overlay',
      'group' => 'Styling',
    ),
    15 => 
    array (
      'param_name' => 'color_name',
      'heading' => 'Name Color',
      'description' => 'Select name color<br />(leave empty for default heading color)',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    16 => 
    array (
      'param_name' => 'color_role',
      'heading' => 'Proffesion Color',
      'description' => 'Select name color<br />(leave empty for default heading color)',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    17 => 
    array (
      'param_name' => 'color_description',
      'heading' => 'Description Color',
      'description' => 'Select description color<br />(leave empty for default body color)',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    18 => 
    array (
      'param_name' => 'color_accent',
      'heading' => 'Accent Color',
      'description' => 'Select accent color or leave it blank for theme accent color',
      'value' => '',
      'type' => 'colorpicker',
      'class' => '',
      'std' => '',
      'group' => 'Styling',
    ),
    19 => 
    array (
      'param_name' => 'lazy',
      'heading' => 'Lazy Loading',
      'description' => 'Choose to enable to disable lazy loading',
      'value' => 
      array (
        'Default (from theme settings)' => 'default',
        'Disabled' => 'disabled',
        'Enabled' => 'enabled',
      ),
      'type' => 'dropdown',
      'class' => '',
      'std' => 'default',
      'group' => 'Lazy Loading',
    ),
  ),
) );
    }

    public function _html( $atts, $content ) {
        $id_rand = jevelin_rand();
        ob_start();

        $path = trailingslashit( get_template_directory() );
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/team-member/views/view.php';
        include $path . '/framework-customizations/extensions/shortcodes/shortcodes/team-member/static.php';
        if( function_exists( 'jevelin_shortcode_team_member_css' ) ) :
            jevelin_shortcode_team_member_css( $atts, $id_rand );
        endif;

        return ob_get_clean();
    }
}

new vcj_team_member();