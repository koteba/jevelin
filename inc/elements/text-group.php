<?php
/*
Element: Empty Space (responsive)
*/

class vcj_text_group extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_text_group', array( $this, '_html' ) );
    }


    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }

        vc_map(
            array(
                'name' => __('Text Group', 'jevelin'),
                'base' => 'vcj_text_group',
                'description' => __('2 text input field columns', 'jevelin'),
                'category' => __('Jevelin Elements', 'jevelin'),
                'icon' => get_template_directory_uri().'/img/builder-icon.png',
                'params' => array(

                    array (
                        'param_name' => 'content',
                        'heading' => 'Content (left column)',
                        'description' => 'Enter content',
                        'type' => 'textarea_html',
                        'class' => '',
                        'std' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
                        'group' => 'General',
                        'admin_label' => true,
                    ),

                    array (
                        'param_name' => 'content_right',
                        'heading' => 'Content (right column)',
                        'description' => 'Enter content',
                        'type' => 'textarea',
                        'class' => '',
                        'std' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                        'group' => 'General',
                        'admin_label' => true,
                    ),

                    array (
                        'param_name' => 'content_right_alignment',
                        'heading' => 'Content (right column) Text Alignment',
                        'value' => array (
                            'Left' => 'left',
                            'Center' => 'center',
                            'Right' => 'right',
                        ),
                        'type' => 'dropdown',
                        'class' => '',
                        'std' => 'right',
                        'group' => 'General',
                    ),

                    array (
                        'param_name' => 'layout',
                        'heading' => 'Layout',
                        'description' => 'Choose column layout',
                        'value' => array (
                            '50% + %50 column layout' => 'layout1',
                            'Inline both columns' => 'layout2',
                        ),
                        'type' => 'dropdown',
                        'class' => '',
                        'std' => 'style1',
                        'group' => 'General',
                    ),

                    array (
                        'param_name' => 'paragraph_whitespace',
                        'heading' => 'Paragraph Whitespace',
                        'description' => 'Enable or disable paragraph line brake whitespace',
                        'value' => array (
                            'Off' => 'off',
                            'On' => 'on',
                        ),
                        'type' => 'dropdown',
                        'std' => 'on',
                        'group' => 'Styling',
                    ),

                    array (
                        'param_name' => 'text_font',
                        'heading' => 'Text Font Famility',
                        'description' => 'Select text font famility',
                        'value' => array (
                            'Heading' => 'heading',
                            'Body' => 'body',
                            'Additional font 1' => 'additional1',
                            'Additional font 2' => 'additional2',
                        ),
                        'type' => 'dropdown',
                        'class' => '',
                        'std' => 'body',
                        'group' => 'Styling',
                    ),

                    array (
                        'param_name' => 'heading_font',
                        'heading' => 'Heading Font Famility',
                        'description' => 'Select heading font famility',
                        'value' => array (
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

                    array (
                        'param_name' => 'heading_font_weight',
                        'heading' => 'Heading Font Weight',
                        'description' => 'Select heading font weight',
                        'value' => array (
                            'Extra Light' => 200,
                            'Light' => 300,
                            'Regular' => 400,
                            'Semi-Bold' => 600,
                            'Bold' => 700,
                            'Extra Bold' => 900,
                        ),
                        'type' => 'dropdown',
                        'class' => '',
                        'std' => '700',
                        'group' => 'Styling',
                    ),

                    array(
                        'param_name' => 'font_size',
                        'heading' => __( 'Font Size', 'jevelin' ),
                        'description' => __( 'Enter font size (Note: CSS measurement units allowed).', 'jevelin' ),
                        'type' => 'textfield',
                        'group' => 'Styling',
                    ),

                ),
            )
        );

    }


    public function _html( $atts, $content ) {
        // Params extraction
        extract( shortcode_atts( array(
            //'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
            'content_right' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'content_right_alignment' => 'right',
            'layout' => 'style1',
            'paragraph_whitespace' => 'on',
            'text_font' => 'body',
            'heading_font' => 'heading',
            'heading_font_weight' => '700',
            'font_size' => '',
        ), $atts ) );

        // HTML
        $class = array();
        $class[] = 'sh-text-group';
        $id = 'sh-text-group-'.jevelin_rand();
        ob_start(); ?>

            <style media="screen">
                <?php if( $paragraph_whitespace == false ) : ?>
    				#<?php echo esc_attr( $id ); ?> p {
    					margin-bottom: 0;
    				}
    			<?php endif; ?>

    			<?php if( isset( $text_font ) && $text_font == 'additional1' || $text_font == 'additional2' || $text_font == 'heading' ) : ?>
    				#<?php echo esc_attr( $id ); ?> .text-group-content p {

    					<?php if( $text_font == 'additional1' ) : ?>
    						font-family: '<?php echo esc_attr( jevelin_option_value('additional_font1','family') ); ?>'!important;
    					<?php elseif( $text_font == 'additional2' ) : ?>
    						font-family: '<?php echo esc_attr( jevelin_option_value('additional_font2','family') ); ?>'!important;
    					<?php elseif( $text_font == 'body' ) : ?>
    						font-family: '<?php echo esc_attr( jevelin_option_value('styling_body','family') ); ?>'!important;
    					<?php endif; ?>

    				}
    			<?php endif; ?>

    			<?php if( isset( $heading_font ) && $heading_font == 'additional1' || $heading_font == 'additional2' || $heading_font == 'body' ) : ?>
    				#<?php echo esc_attr( $id ); ?> .text-group-content h1,
    				#<?php echo esc_attr( $id ); ?> .text-group-content h2,
    				#<?php echo esc_attr( $id ); ?> .text-group-content h3,
    				#<?php echo esc_attr( $id ); ?> .text-group-content h4,
    				#<?php echo esc_attr( $id ); ?> .text-group-content h5,
    				#<?php echo esc_attr( $id ); ?> .text-group-content h6 {

    					<?php if( $heading_font == 'additional1' ) : ?>
    						font-family: '<?php echo esc_attr( jevelin_option_value('additional_font1','family') ); ?>'!important;
    					<?php elseif( $heading_font == 'additional2' ) : ?>
    						font-family: '<?php echo esc_attr( jevelin_option_value('additional_font2','family') ); ?>'!important;
    					<?php elseif( $heading_font == 'body' ) : ?>
    						font-family: '<?php echo esc_attr( jevelin_option_value('styling_body','family') ); ?>'!important;
    					<?php endif; ?>

    				}
    			<?php endif; ?>

    			<?php if( isset( $heading_font_weight ) && $heading_font_weight > 0 ) : ?>
    				#<?php echo esc_attr( $id ); ?> .text-group-content h1,
    				#<?php echo esc_attr( $id ); ?> .text-group-content h2,
    				#<?php echo esc_attr( $id ); ?> .text-group-content h3,
    				#<?php echo esc_attr( $id ); ?> .text-group-content h4,
    				#<?php echo esc_attr( $id ); ?> .text-group-content h5,
    				#<?php echo esc_attr( $id ); ?> .text-group-content h6 {
    					font-weight: <?php echo intval( $heading_font_weight ); ?>
    				}
    			<?php endif; ?>

                <?php if( $font_size ) : ?>
    				#<?php echo esc_attr( $id ); ?> {
    					font-size: <?php echo jevelin_addpx( $font_size ); ?>
    				}
    			<?php endif; ?>

                <?php if( $content_right_alignment != 'left' ) : ?>
                    #<?php echo esc_attr( $id ); ?> .text-group-content-right {
                        text-align: <?php echo ( $content_right_alignment ); ?>;
                    }
                <?php endif; ?>
            </style>


            <div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( implode( " ", $class ) ); ?>">
            	<?php if( $content && $content_right ) : ?>
            		<?php if( isset( $layout ) && $layout == 'layout2' ) : ?>
            			<div class="text-group-layout2">
            				<div class="text-group-content" style="display: inline-block; vertical-align: bottom; margin-right: 15px;">
            					<?php echo do_shortcode( $content ); ?>
            				</div>
            				<div class="text-group-content text-group-content-right" style="display: inline-block; vertical-align: bottom;">
            					<?php echo do_shortcode( $content_right ); ?>
            				</div>
            			</div>
            		<?php else : ?>
            			<div class="row">
            				<div class="col-md-6">
            					<?php echo do_shortcode( $content ); ?>
            				</div>
            				<div class="col-md-6 text-group-content-right">
            					<?php echo do_shortcode( $content_right ); ?>
            				</div>
            			</div>
            		<?php endif; ?>
            	<?php elseif( $content_right ) : ?>
            		<div class="row">
            			<div class="text-group-content text-group-content-right col-md-12">
            				<?php echo do_shortcode( $content_right ); ?>
            			</div>
            		</div>
            	<?php elseif( $content ) : ?>
            		<div class="row">
            			<div class="text-group-content col-md-12">
            				<?php echo do_shortcode( $content ); ?>
            			</div>
            		</div>
            	<?php endif; ?>
            </div>

        <?php return ob_get_clean();
    }

}
new vcj_text_group();
