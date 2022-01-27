<?php
/*
Element: Footer Widgets
*/

class vcj_instagram extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_instagram', array( $this, '_html' ) );
    }


    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }

        vc_map(
            array(
                'name' => __('Instagram', 'jevelin'),
                'base' => 'vcj_instagram',
                'description' => __('Add instagram widget', 'jevelin'),
                'category' => __('Jevelin Elements', 'jevelin'),
                'icon' => get_template_directory_uri().'/img/builder-icon.png',
                'admin_enqueue_js' => array( get_template_directory_uri() . '/js/plugins/jquery.instagramFeed.min.js' ),
                'params' => array(

                    array (
                        'param_name' => 'username',
                        'heading' => 'Username',
                        'description' => 'Enter instagram username',
                        'type' => 'textfield',
                    ),

                    array (
                        'param_name' => 'number',
                        'heading' => 'Number of photos',
                        'description' => 'Enter instagram number of items',
                        'type' => 'textfield',
                        'std' => '6',
                    ),

                    array (
                        'param_name' => 'offset',
                        'heading' => 'Offset',
                        'description' => 'Enter instagram item offest',
                        'type' => 'textfield',
                        'std' => '0',
                    ),

                    array (
                        'param_name' => 'size',
                        'heading' => 'Size',
                        'description' => 'Enter image size',
                        'value' => array (
                            'Thumbnail' => 'thumbnail',
                            'Small' => 'small',
                            'Large' => 'large',
                            'Original' => 'original',
                        ),
                        'type' => 'dropdown',
                        'std' => 'thumbnail',
                    ),

                    array (
                        'param_name' => 'target',
                        'heading' => 'Open links in',
                        'description' => 'Choose color preset, that can be overwritten by color options',
                        'value' => array (
                            'Current window (_self)' => '_self',
                            'New window (_blank)' => '_blank',
                        ),
                        'type' => 'dropdown',
                        'std' => '_self',
                        'edit_field_class' => 'vc_hide_option',
                    ),




                    array (
                        'param_name' => 'columns',
                        'heading' => 'Columns',
                        'description' => 'Choose item columns',
                        'value' => array (
                            '1 Column' => '1',
                            '2 Columns' => '2',
                            '3 Columns' => '3',
                            '4 Columns' => '4',
                            '5 Columns' => '5',
                            '6 Columns' => '6',
                        ),
                        'type' => 'dropdown',
                        'std' => '3',
            			'group' => __( 'Styling', 'jevelin' ),
                    ),

                    array (
                        'param_name' => 'spacing',
                        'heading' => 'Spacing',
                        'description' => 'Enter instagram item spacing (with px)',
                        'type' => 'textfield',
                        'std' => '5px',
            			'group' => __( 'Styling', 'jevelin' ),
                    ),

                    array (
                        'param_name' => 'border_radius',
                        'heading' => 'Border Radius',
                        'description' => 'Enter border radius (with px)',
                        'type' => 'textfield',
                        'std' => '0px',
            			'group' => __( 'Styling', 'jevelin' ),
                    ),

                    array (
                        'param_name' => 'overlay_text_color',
                        'heading' => 'Overlay Text/Icon Color',
                        'description' => 'Choose overlay text color',
                        'type' => 'colorpicker',
                        'group' => __( 'Styling', 'jevelin' ),
                    ),

                    array (
                        'param_name' => 'text_font_size',
                        'heading' => 'Text Font Size',
                        'description' => 'Enter icon font size (with px)',
                        'type' => 'textfield',
            			'group' => __( 'Styling', 'jevelin' ),
                        'edit_field_class' => 'vc_hide_option',
                    ),

                    array (
                        'param_name' => 'icon_font_size',
                        'heading' => 'Icon Font Size',
                        'description' => 'Enter icon font size (with px)',
                        'type' => 'textfield',
            			'group' => __( 'Styling', 'jevelin' ),
                        // 'edit_field_class' => 'vc_col-xs-6',
                    ),

                    array (
                        'param_name' => 'overlay_background_color1',
                        'heading' => 'Overlay Background Color',
                        'description' => 'Main background color',
                        'type' => 'colorpicker',
                        'group' => __( 'Styling', 'jevelin' ),
                        'edit_field_class' => 'vc_col-xs-6',
                    ),

                    array (
                        'param_name' => 'overlay_background_color2',
                        'heading' => 'Overlay Background Color 2',
                        'description' => 'Choose for gradient look',
                        'type' => 'colorpicker',
                        'group' => __( 'Styling', 'jevelin' ),
                        'edit_field_class' => 'vc_col-xs-6',
                    ),

                    array (
                        'param_name' => 'overlay_direction',
                        'heading' => 'Overlay Directions',
                        'description' => 'Choose item columns',
                        'value' => array (
                            'To bottom' => 'to bottom',
                            'To right' => 'to right',
                            'To bottom right' => 'to bottom right',
                            'To bottom left' => 'to bottom left',
                        ),
                        'type' => 'dropdown',
                        'std' => '3',
            			'group' => __( 'Styling', 'jevelin' ),
                    ),

            		array(
            			'param_name' => 'css',
            			'type' => 'css_editor',
            			'heading' => __( 'CSS box', 'jevelin' ),
            			'group' => __( 'Design Options', 'jevelin' ),
            		),

                ),
            )
        );

    }


    public function _html( $atts ) {
        // Params extraction
        extract( shortcode_atts( array(
            'username' => '',
            'number' => '6',
            'offset' => '0',
            'size' => 'thumbnail',
            'target' => '_self',
            'columns' => '3',
            'spacing' => '5px',
            'border_radius' => '0px',
            'overlay_text_color' => '',
            'text_font_size' => '',
            'icon_font_size' => '',
            'overlay_background_color1' => '',
            'overlay_background_color2' => '',
            'overlay_direction' => 'to bottom',
            'css' => '',
        ), $atts ) );
        $limit = $number;
        $items_per_row = $number;
        $image = 640;
        $username = str_replace( '@', '', $username );


        // HTML
        $id_rand = jevelin_rand();
        $id = 'sh-instagram-element-' . $id_rand;
        $element_class = array();
        $element_class[] = $id;
        $element_class[] = 'sh-instagram-element';
        $element_class[] = 'sh-instagram-element-columns'.$columns;
        $settings_base = !empty( $this->settings['base'] ) ? $this->settings['base'] : '';
        $element_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $settings_base, $atts );
        $number = $offset ? ( $number + $offset ) : $number;
        ob_start(); ?>

            <style media="screen">
                <?php if( $spacing ) : ?>
                    #<?php echo $id; ?> {
                        margin: -<?php echo jevelin_addpx( $spacing ); ?>;
                    }

                    #<?php echo $id; ?> .sh-widget-instagramv2 a {
                        padding: <?php echo jevelin_addpx( $spacing ); ?>;
                    }

                    #<?php echo $id; ?> .sh-widget-instagramv2 a:before {
                        margin: <?php echo jevelin_addpx( $spacing ); ?>;
                    }
                <?php endif; ?>

                <?php if( $text_font_size ) : ?>
                    #<?php echo $id; ?> .sh-instagram-element-overlay .sh-instagram-element-overlay-text {
                        font-size: <?php echo jevelin_addpx( $text_font_size ); ?>;
                    }
                <?php endif; ?>

                <?php if( $icon_font_size ) : ?>
                    #<?php echo $id; ?> .sh-widget-instagramv2 a:before {
                        font-size: <?php echo jevelin_addpx( $icon_font_size ); ?>;
                    }
                <?php endif; ?>

                <?php if( $border_radius ) : ?>
                    #<?php echo $id; ?> .sh-widget-instagramv2 img,
                    #<?php echo $id; ?> .sh-widget-instagramv2 a:before {
                        border-radius: <?php echo jevelin_addpx( $border_radius ); ?>;
                    }
                <?php endif; ?>

                <?php if( $overlay_background_color1 ) : ?>
                    #<?php echo $id; ?> .sh-widget-instagramv2 a:before {
                        background-color: <?php echo $overlay_background_color1; ?>;

                        <?php if( $overlay_background_color2 ) : ?>
                            background: linear-gradient( <?php echo $overlay_direction; ?>, <?php echo $overlay_background_color1; ?>, <?php echo $overlay_background_color2; ?> );
                        <?php endif; ?>
                    }
                <?php endif; ?>

                <?php if( $overlay_text_color ) : ?>
                    #<?php echo $id; ?> .sh-widget-instagramv2 a:before {
                        color: <?php echo $overlay_text_color; ?>;
                    }
                <?php endif; ?>
            </style>


            <div<?php echo $id ? ' id="'.$id.'" ' : ''; ?> class="sh-instagram-element <?php echo implode( ' ', $element_class ); ?>">
                <script>
                    (function($){
                        $(window).on('load', function(){
                            $.instagramFeed({
                                'username': '<?php echo esc_attr( $username ); ?>',
                                'container': "#instagram-feed-<?php echo esc_attr( $id_rand ); ?>",
                                'display_profile': false,
                                'display_biography': false,
                                'display_gallery': true,
                                'callback': null,
                                'styling': true,
                                'items': <?php echo intval( $limit ); ?>,
                                'items_per_row': <?php echo intval( $limit ); ?>,
                                'margin': 0,
                                'image_size': <?php echo esc_attr( $image ); ?>,
                                'styling': 0,
                            });
                        });
                    })(jQuery);
                </script>
                <div id="instagram-feed-<?php echo esc_attr( $id_rand ); ?>" class="sh-widget-instagramv2 sh-widget-instagramv2-columns<?php echo intval( $columns ); ?>"></div>
            </div>

        <?php return ob_get_clean();
    }

}
new vcj_instagram();
