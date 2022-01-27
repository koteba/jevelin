<?php
/*
Element: Empry Space (responsive)
*/

class vcj_list extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_list', array( $this, '_html' ) );
    }


    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }

        vc_map(
            array(
                'name' => __('List', 'jevelin'),
                'base' => 'vcj_list',
                'description' => __('Simple list element', 'jevelin'),
                'category' => __('Jevelin Elements', 'jevelin'),
                'icon' => get_template_directory_uri().'/img/builder-icon.png',
                'params' => array(

                    array(
                        'param_name' => 'list_content',
                        'heading' => __( 'content', 'jevelin' ),
                        'description' => __( 'Enter list content', 'jevelin' ),
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => '',
                        'std' => 'I am list',
                        'admin_label' => true,
                    ),

                    array (
                        'param_name' => 'icon',
                        'heading' => 'Icon',
                        'description' => 'Choose icon',
                        'value' => 'icon-arrow-right-circle',
                        'type' => 'iconpicker',
                        'class' => '',
                        'std' => 'icon-arrow-right-circle',
                        'group' => '',
                        'settings' =>
                        array (
                            'emptyIcon' => true,
                            'type' => 'jevelin_vc_icons',
                        ),
                    ),

                    array (
                        'param_name' => 'style',
                        'heading' => 'Style',
                        'description' => 'Choose main style',
                        'value' =>
                        array (
                            'Style 1' => 'style1',
                            'Style 2' => 'style2',
                            'Style 3' => 'style3',
                            'Style 4 (inline)' => 'style4',
                        ),
                        'type' => 'dropdown',
                        'class' => '',
                        'std' => 'style1',
                        'group' => '',
                    ),

                    array(
                        'param_name' => 'url',
                        'heading' => __( 'URL', 'gillion' ),
                        'type' => 'vc_link',
                    ),

                    array (
                        'param_name' => 'text_color',
                        'heading' => 'Text Color',
                        'description' => 'Select text color',
                        'edit_field_class' => 'vc_col-xs-6',
                        'type' => 'colorpicker',
                        'group' => 'Styling',
                    ),

                    array (
                        'param_name' => 'icon_color',
                        'heading' => 'Icon Color',
                        'description' => 'Select icon color',
                        'edit_field_class' => 'vc_col-xs-6',
                        'type' => 'colorpicker',
                        'group' => 'Styling',
                    ),

                    array (
                        'param_name' => 'text_font_size',
                        'heading' => __( 'Text Font Size', 'jevelin' ),
                        'description' => __( 'Enter text font size in PX', 'jevelin' ),
                        'edit_field_class' => 'vc_col-xs-6',
                        'type' => 'textfield',
                        'group' => 'Styling',
                    ),

                    array (
                        'param_name' => 'icon_font_size',
                        'heading' => __( 'Icon Font Size', 'jevelin' ),
                        'description' => __( 'Enter icon font size in PX', 'jevelin' ),
                        'edit_field_class' => 'vc_col-xs-6',
                        'type' => 'textfield',
                        'group' => 'Styling',
                    ),

                    array (
                        'param_name' => 'text_font_weight',
                        'heading' => 'Text Font Weight',
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
                        'edit_field_class' => 'vc_col-xs-6',
                        'group' => 'Styling',
                    ),

                    array (
                        'param_name' => 'spacing',
                        'heading' => 'Spacing between icon and content in PX',
                        'edit_field_class' => 'vc_col-xs-6',
                        'type' => 'textfield',
                        'group' => 'Styling',
                    ),

                    array (
                        'param_name' => 'text_line_height',
                        'heading' => 'Text Line Height',
                        'edit_field_class' => 'vc_col-xs-6',
                        'type' => 'textfield',
                        'group' => 'Styling',
                    ),

                    array (
                        'param_name' => 'align',
                        'heading' => 'Alignment',
                        'description' => 'Choose content alignment',
                        'value' =>
                        array (
                            'Left' => 'left',
                            'Center' => 'center',
                            'Right' => 'right',
                        ),
                        'type' => 'dropdown',
                        'class' => '',
                        'std' => 'left',
                        'group' => 'Styling',
                    ),

                    array (
                        'param_name' => 'image',
                        'heading' => __( 'Replace Icon With Image', 'jevelin' ),
                        'type' => 'attach_image',
                        'group' => 'Styling',
                    ),

                ),
            )
        );

    }


    public function _html( $atts ) {
        // Params extraction
        extract( shortcode_atts( array(
            'list_content' => 'I am list',
            'icon' => 'icon-arrow-right-circle',
            'style' => 'style1',
            'url' => '',
            'text_color' => '',
            'icon_color' => '',
            'text_font_size' => '',
            'icon_font_size' => '',
            'spacing' => '',
            'text_font_weight' => '',
            'text_line_height' => '',
            'align' => 'left',
            'image' => '',
        ), $atts ) );

        // HTML
        $id = jevelin_rand();

        // Link construct
        $url = ( $url == '||' ) ? '' : $url;
        $url = vc_build_link( $url );
        $a_link = ( isset( $url['url'] ) ) ? $url['url'] : '';
        $a_title = ( isset( $url['title'] ) && $url['title'] == '' ) ? '' : 'title="'.$url['title'].'"';
        $a_target = ( isset( $url['target'] ) && $url['target'] == '' ) ? '' : 'target="'.$url['target'].'"';

        if( $image > 0 ) :
            $image = jevelin_get_small_thumb( $image );
        endif;

        ob_start(); ?>

            <?php if( $text_color || $icon_color ) : ?>
                <style media="screen">
                    <?php if( $text_color ) : ?>
        				#list-<?php echo esc_attr( $id ); ?> .sh-list-content {
        					color: <?php echo esc_attr( $text_color ); ?>!important;
        				}
        			<?php endif; ?>

                    <?php if( $spacing ) : ?>
        				#list-<?php echo esc_attr( $id ); ?> .sh-list-icon {
        					padding-right: <?php echo esc_attr( $spacing ); ?>!important;
        				}
        			<?php endif; ?>

        			<?php if( $icon_color ) : ?>
        				#list-<?php echo esc_attr( $id ); ?> .sh-list-icon i {
        					color: <?php echo esc_attr( $icon_color ); ?>!important;
        				}
        			<?php endif; ?>

                    <?php if( $text_font_size ) : ?>
        				#list-<?php echo esc_attr( $id ); ?> .sh-list-content {
        					font-size: <?php echo esc_attr( $text_font_size ); ?>!important;
        				}
        			<?php endif; ?>

                    <?php if( $text_font_weight ) : ?>
        				#list-<?php echo esc_attr( $id ); ?> .sh-list-content {
        					font-weight: <?php echo esc_attr( $text_font_weight ); ?>!important;
        				}
        			<?php endif; ?>

                    <?php if( $text_line_height ) : ?>
        				#list-<?php echo esc_attr( $id ); ?> .sh-list-content {
        					line-height: <?php echo jevelin_addpx( $text_line_height ); ?>!important;
        				}
        			<?php endif; ?>

                    <?php if( $icon_font_size ) : ?>
        				#list-<?php echo esc_attr( $id ); ?> .sh-list-icon i {
        					font-size: <?php echo jevelin_addpx( $icon_font_size ); ?>!important;
        				}
        			<?php endif; ?>

                    <?php if( $align == 'center' ) : ?>
        				#list-<?php echo esc_attr( $id ); ?> {
        					display: table;
                            margin: 0 auto;
        				}
                    <?php elseif( $align == 'right' ) : ?>

                    #list-<?php echo esc_attr( $id ); ?> {
                        display: table;
                        margin-left: auto;
                    }
        			<?php endif; ?>
                </style>
            <?php endif; ?>

            <ul class="sh-list sh-list-vc sh-list-<?php echo esc_attr( $style ); ?>" id="list-<?php echo esc_attr( $id ); ?>">
            	<?php if( $list_content ) : ?>
            		<li class="sh-list-item">
                        <?php if( $a_link ) : ?>
                            <a href="<?php echo esc_attr( $a_link ); ?>" <?php echo esc_attr( $a_title ); ?> <?php echo esc_attr( $a_target ); ?>>
                        <?php endif; ?>

                			<span class="sh-list-icon">
                                <?php if( $image ) : ?>
                                    <img src="<?php echo esc_url( $image ); ?>" class="sh-list-image" alt="">
                                <?php else : ?>
                                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                <?php endif; ?>
                			</span>
                			<span class="sh-list-content">
                                <?php echo esc_attr( $list_content ); ?>
                            </span>

                        <?php if( $a_link ) : ?>
                            </a>
                        <?php endif; ?>
            		</li>
            	<?php endif; ?>
            </ul>

        <?php return ob_get_clean();
    }

}
new vcj_list();
