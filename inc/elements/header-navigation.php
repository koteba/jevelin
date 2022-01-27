<?php
/*
Element: Empry Space (responsive)
*/

class vcj_header_nav extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_header_nav', array( $this, '_html' ) );
    }


    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }


        $menus_values = array();
        $menus_values['Default'] = 'default';
        $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
        if( is_array( $menus ) && count( $menus ) ) :
            foreach( $menus as $menu ) :
                $menus_values[$menu->name] = $menu->term_id;
            endforeach;
        endif;


        vc_map(
            array(
                'name' => __('Navigation', 'jevelin'),
                'base' => 'vcj_header_nav',
                'description' => __('Customize and add header navigation', 'jevelin'),
                'category' => __('Jevelin Elements', 'jevelin'),
                'icon' => get_template_directory_uri().'/img/builder-icon.png',
                'params' => array(


                    // Navigation
                    /*array (
                        'heading' => '<span style="color: #999;">Assign your pages and posts to your navigation <a href="'.admin_url( 'nav-menus.php' ).'" target="_blank">in this page</a>
                        <br />(display location - Header Navigation)</span>',
                        'description' => 'Choose text font',
                        'param_name' => 'no-input3',
                        'type' => 'textfield',
                        'group' => 'Header',
                    ),*/

                    array (
                        'param_name' => 'source',
                        'heading' => 'Navigation Source',
                        'description' => 'Choose navigation source',
                        'value' => $menus_values,
                        'type' => 'dropdown',
                        'std' => 'body',
                    ),

                    array (
                        'param_name' => 'dropdowns',
                        'heading' => 'Dropdowns',
                        'value' => array (
                            'No dropdowns' => 1,
                            '1 level' => 2,
                            '2 levels' => 3,
                            '3 levels' => 4,
                        ),
                        'type' => 'dropdown',
                    ),

                    array (
                        'param_name' => 'alignment',
                        'heading' => 'Alignment',
                        'value' => array (
                            'Left' => 'left',
                            'Center' => 'center',
                            'Right' => 'right',
                        ),
                        'type' => 'dropdown',
                        'std' => 'center',
                    ),

                    array (
                        'param_name' => 'header_nav_font_family',
                        'heading' => 'Font',
                        'description' => 'Choose text font',
                        'value' => array (
                            'Body' => 'body',
                            'Heading' => 'heading',
                        ),
                        'type' => 'dropdown',
                        'std' => 'body',
                    ),

                    array (
                        'param_name' => 'header_nav_font_weight',
                        'heading' => 'Font Weight',
                        'value' => array (
                            'Light' => '300',
                            'Normal' => '400',
                            'Medium' => '500',
                            'Semi-Bold' => '600',
                            'Bold' => '700',
                            'Extra Bold' => '800',
                            'Black' => '900',
                        ),
                        'type' => 'dropdown',
                        'std' => '400',
                    ),

                    array (
                        'param_name' => 'header_nav_font_weight_active',
                        'heading' => 'Font Weight (For Active Items)',
                        'value' => array (
                            'Disabled' => 'disabled',
                            'Light' => '300',
                            'Normal' => '400',
                            'Medium' => '500',
                            'Semi-Bold' => '600',
                            'Bold' => '700',
                            'Extra Bold' => '800',
                            'Black' => '900',
                        ),
                        'type' => 'dropdown',
                        'std' => 'disabled',
                    ),

                    array (
                        'param_name' => 'header_nav_text_color',
                        'heading' => 'Link Color',
                        'type' => 'colorpicker',
                    ),

                    array (
                        'param_name' => 'header_nav_text_hover_color',
                        'heading' => 'Link Hover Color',
                        'type' => 'colorpicker',
                    ),

                    array (
                        'param_name' => 'header_nav_spacing',
                        'heading' => 'Navigation Spacing',
                        'description' => 'Choose header navigation element spacing',
                        'value' =>
                        array (
                            'Small' => 'small',
                            'Standard' => 'standard',
                            'Large' => 'large',
                        ),
                        'type' => 'dropdown',
                        'std' => 'standard',
                    ),

                    array (
                        'param_name' => 'header_nav_letter_spacing',
                        'heading' => __( 'Letter Spacing', 'jevelin' ),
                        'description' => __( 'Enter navigation letter spacing in PX', 'jevelin' ),
                        'type' => 'textfield',
                    ),


                ),
            )
        );

    }


    public function _html( $atts ) {
        // Params extraction
        extract( shortcode_atts( array(
            'source' => 'default',
            'alignment' => 'center',
            'header_font_size' => '',
            'header_icon_size' => '',
            'header_nav_font_family' => 'body',
            'header_nav_font_weight' => '400',
            'header_nav_font_weight_active' => 'disabled',
            'header_nav_text_color' => '',
            'header_nav_text_hover_color' => '',
            'header_nav_elements_spacing' => '',
            'header_nav_letter_spacing' => '',
            'dropdowns' => 1,
        ), $atts ) );

        // HTML
        $id = 'header-navigation-' . jevelin_rand();
        ob_start(); ?>


            <style media="screen">
                #<?php echo esc_attr( $id ); ?> .sh-nav-container {
                    display: table;
                    margin: 0 auto;
                }

                #<?php echo esc_attr( $id ); ?>,
                #<?php echo esc_attr( $id ); ?> ul.sh-nav > li > a {
                    font-size: <?php echo esc_attr( $header_font_size ); ?>;
                }

                #<?php echo esc_attr( $id ); ?> ul.sh-nav > li > a {
                    color: <?php echo esc_attr( $header_nav_text_color ); ?>!important;

                    <?php if( $header_nav_letter_spacing ) : ?>
                        letter-spacing: <?php echo esc_attr( $header_nav_letter_spacing ); ?>!important;
                    <?php endif; ?>

                    <?php if( $header_nav_font_family == 'heading' ) : ?>
                        font-family: '<?php echo jevelin_option_value('styling_headings','family'); ?>'!important;
                    <?php endif; ?>

                    font-weight: <?php echo intval( $header_nav_font_weight ); ?>!important;
                }

                #<?php echo esc_attr( $id ); ?> ul.sh-nav > li:hover > a {
                    color: <?php echo esc_attr( $header_nav_text_hover_color ); ?>!important;
                }

                <?php if( $header_nav_font_weight_active != 'default' ) : ?>
                    #<?php echo esc_attr( $id ); ?> ul.sh-nav > li.current_page_item > a,
                    #<?php echo esc_attr( $id ); ?> ul.sh-nav > li.current-menu-ancestor > a {
                        font-weight: <?php echo intval( $header_nav_font_weight_active ); ?>!important;
                    }
                <?php endif; ?>

                #<?php echo esc_attr( $id ); ?> .sh-header-builder-main-element-divider {
                    margin-right: <?php echo esc_attr( $header_nav_elements_spacing ); ?>!important;
                }

                <?php if( $alignment == 'left' || $alignment == 'right' ) : ?>
                    #<?php echo esc_attr( $id ); ?> .sh-nav-container {
                        <?php if( $alignment == 'left' ) : ?>
                            margin-left: 0;
                            margin-right: 0;
                        <?php else : ?>
                            margin-left: auto;
                            margin-right: 0;
                        <?php endif; ?>
                    }
                <?php endif; ?>

                .sh-header-navigation-dropdowns-1 .sh-nav li.menu-item-has-children > a:after {
                    display: none;
                }
            </style>


            <div class="sh-header-navigation sh-header-navigation-dropdowns-<?php echo esc_attr( $dropdowns ); ?>" id="<?php echo esc_attr( $id ); ?>">
                <?php if ( has_nav_menu( 'header' ) ) : ?>
                    <?php
                        if( is_nav_menu( $source ) ) :
                            wp_nav_menu( array(
                                'menu' => $source,
                                'depth' => $dropdowns,
                                'container_class' => 'sh-nav-container',
                                'menu_class' => 'sh-nav',
                            ));
                        else :
                            wp_nav_menu( array(
                                'theme_location' => 'header',
                                'depth' => $dropdowns,
                                'container_class' => 'sh-nav-container',
                                'menu_class' => 'sh-nav',
                            ));
                        endif;
                    ?>
                <?php endif; ?>
            </div>

        <?php return ob_get_clean();
    }

}
new vcj_header_nav();
