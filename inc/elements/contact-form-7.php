<?php
class vcj_contact_form_7 extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_contact_form_7', array( $this, '_html' ) );
    }

    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        $forms = array();
        $get_forms = new WP_Query( array( 'post_type' => 'wpcf7_contact_form', 'post_per_page' => -1 ) );
        if( $get_forms->have_posts() ) :
            while ( $get_forms->have_posts() ) : $get_forms->the_post();
                $forms[get_the_title()] = get_the_ID();
            endwhile;
        endif;

        vc_map( array (
            'name' => 'Contact Form 7',
            'base' => 'vcj_contact_form_7',
            'description' => 'Place Contact Form 7',
            'category' => 'Jevelin Elements',
            'icon' => get_template_directory_uri().'/img/builder-icon.png',
            'params' => array(


                /*
                ** General
                */
                array (
                    'param_name' => 'form_id',
                    'heading' => 'Select Form',
                    'description' => 'Select your Contact Form 7 form.<br />New form can be created <a target="_blank" href="'. admin_url( 'admin.php?page=wpcf7' ) .'">here</a>',
                    'value' => $forms,
                    'type' => 'dropdown',
                ),

                array (
                    'param_name' => 'style',
                    'heading' => 'Style',
                    'description' => 'Select main style',
                    'value' =>
                    array (
                        'Standard' => 'style1',
                        'Standard (round corners)' => 'style1 round',
                        'Input Round Edges (2px border)' => 'style2',
                        'Input Center Text' => 'style3',
                        'Bottom Line with simple submit button' => 'style4',
                        'Bottom Line with submit button in accent color' => 'style4 style6',
                        'Dark line' => 'style5',
                    ),
                    'type' => 'dropdown',
                    'std' => 'style1',
                ),

                array (
                    'param_name' => 'layout',
                    'heading' => 'Layout',
                    'description' => 'Select form layout',
                    'value' =>
                    array (
                        'Default' => 'default',
                        'Inline (all fields in one line)' => 'inline',
                        'Inline (all fields in one line) + Full Width' => 'inline sh-cf7-inline-full-width',
                    ),
                    'type' => 'dropdown',
                    'std' => 'default',
                ),

                array (
                    'param_name' => 'inline_position',
                    'heading' => 'Inline Layout Position',
                    'value' =>
                    array (
                        'Middle' => 'middle',
                        'Top' => 'top',
                    ),
                    'type' => 'dropdown',
                    'std' => 'middle',
                ),




                /*
                ** Text
                */
                array (
                    'param_name' => 'label_text_alignment',
                    'heading' => 'Text Alignment',
                    'value' => array (
                        'Default' => 'default',
                        'Left' => 'left',
                        'Center' => 'center',
                        'Right' => 'right',
                    ),
                    'type' => 'dropdown',
                    'std' => 'default',
                    //'edit_field_class' => 'vc_col-xs-6',
                    'group' => __( 'Text', 'jevelin' ),
                ),

                array (
                    'param_name' => 'label_font_size',
                    'heading' => __( 'Font Size', 'jevelin' ),
                    'description' => __( 'Enter top margin (Note: CSS measurement units allowed).', 'jevelin' ),
                    'type' => 'textfield',
                    'std' => '',
                    'edit_field_class' => 'vc_col-xs-6',
                    'group' => __( 'Text', 'jevelin' ),
                ),

                array (
                    'param_name' => 'label_font_color',
                    'heading' => 'Text Color',
                    'type' => 'colorpicker',
                    'group' => __( 'Text', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-6',
                ),

                array (
                    'param_name' => 'label_font_weight',
                    'heading' => 'Font Weight',
                    'description' => 'Choose heading font weight',
                    'value' => array (
                        'Default' => 'default',
                        'Extra Light' => 200,
                        'Light' => 300,
                        'Regular' => 400,
                        'Semi-Bold' => 600,
                        'Bold' => 700,
                        'Extra Bold' => 900,
                    ),
                    'type' => 'dropdown',
                    'class' => '',
                    'group' => __( 'Text', 'jevelin' ),
                ),

                array (
                    'param_name' => 'label_letter_spacing',
                    'heading' => __( 'Letter Spacing', 'jevelin' ),
                    'description' => __( 'Enter text letter spacing (Note: CSS measurement units allowed).', 'jevelin' ),
                    'type' => 'textfield',
                    'std' => '',
                    'group' => __( 'Text', 'jevelin' ),
                ),

                array (
                    'param_name' => 'input_margin_top',
                    'heading' => __( 'Bottom Margin', 'jevelin' ),
                    'description' => __( 'Enter text bottom margin (Note: CSS measurement units allowed).', 'jevelin' ),
                    'type' => 'textfield',
                    'std' => '',
                    'group' => __( 'Text', 'jevelin' ),
                ),



                /*
                ** Input fields
                */
                array (
                    'param_name' => 'input_text_alignment',
                    'heading' => 'Text Alignment',
                    'value' => array (
                        'Default' => 'default',
                        'Left' => 'left',
                        'Center' => 'center',
                        'Right' => 'right',
                    ),
                    'type' => 'dropdown',
                    'std' => 'default',
                    //'edit_field_class' => 'vc_col-xs-6',
                    'group' => __( 'Input Fields', 'jevelin' ),
                ),

                array (
                    'param_name' => 'input_font_size',
                    'heading' => __( 'Font Size', 'jevelin' ),
                    'description' => __( 'Enter font size (Note: CSS measurement units allowed).', 'jevelin' ),
                    'type' => 'textfield',
                    'std' => '',
                    'edit_field_class' => 'vc_col-xs-6',
                    'group' => __( 'Input Fields', 'jevelin' ),
                ),

                array (
                    'param_name' => 'input_height',
                    'heading' => __( 'Input Field Height', 'jevelin' ),
                    'description' => __( 'Enter input field height (Note: CSS measurement units allowed).', 'jevelin' ),
                    'type' => 'textfield',
                    'std' => '',
                    //'edit_field_class' => 'vc_col-xs-6',
                    'group' => __( 'Input Fields', 'jevelin' ),
                ),

                array (
                    'param_name' => 'textarea_height',
                    'heading' => __( 'Textarea Field Height', 'jevelin' ),
                    'description' => __( 'Enter textarea field height (Note: CSS measurement units allowed).', 'jevelin' ),
                    'type' => 'textfield',
                    'std' => '',
                    // 'edit_field_class' => 'vc_col-xs-6',
                    'group' => __( 'Input Fields', 'jevelin' ),
                ),

                array (
                    'param_name' => 'input_leftright_padding',
                    'heading' => 'Horizontal Padding (left/right)',
                    'type' => 'textfield',
                    'group' => __( 'Input Fields', 'jevelin' ),
                ),

                array (
                    'param_name' => 'input_text_color',
                    'heading' => 'Text Color',
                    'type' => 'colorpicker',
                    'group' => __( 'Input Fields', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-4',
                ),

                array (
                    'param_name' => 'input_text_hover_color',
                    'heading' => 'Text Hover Color',
                    'type' => 'colorpicker',
                    'group' => __( 'Input Fields', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-4',
                ),

                array (
                    'param_name' => 'input_text_focus_color',
                    'heading' => 'Text Focus Color',
                    'type' => 'colorpicker',
                    'group' => __( 'Input Fields', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-4',
                ),

                array (
                    'param_name' => 'input_background_color',
                    'heading' => 'Background Color',
                    'type' => 'colorpicker',
                    'group' => __( 'Input Fields', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-4',
                ),

                array (
                    'param_name' => 'input_background_hover_color',
                    'heading' => 'Background Hover Color',
                    'type' => 'colorpicker',
                    'group' => __( 'Input Fields', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-4',
                ),

                array (
                    'param_name' => 'input_background_focus_color',
                    'heading' => 'Background Focus Color',
                    'type' => 'colorpicker',
                    'group' => __( 'Input Fields', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-4',
                ),

                array (
                    'param_name' => 'input_border_color',
                    'heading' => 'Border Color',
                    'type' => 'colorpicker',
                    'group' => __( 'Input Fields', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-4',
                ),

                array (
                    'param_name' => 'input_border_hover_color',
                    'heading' => 'Border Hover Color',
                    'type' => 'colorpicker',
                    'group' => __( 'Input Fields', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-4',
                ),

                array (
                    'param_name' => 'input_border_focus_color',
                    'heading' => 'Border Focus Color',
                    'type' => 'colorpicker',
                    'group' => __( 'Input Fields', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-4',
                ),

                array (
                    'param_name' => 'input_border_width',
                    'heading' => 'Border Width',
                    'type' => 'textfield',
                    'group' => __( 'Input Fields', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-6',
                ),

                array (
                    'param_name' => 'input_border_radius',
                    'heading' => __( 'Border Radius', 'jevelin' ),
                    //'description' => __( 'Enter input field border radius (Note: CSS measurement units allowed).', 'jevelin' ),
                    'type' => 'textfield',
                    'edit_field_class' => 'vc_col-xs-6',
                    'group' => __( 'Input Fields', 'jevelin' ),
                ),

                array (
                    'param_name' => 'input_letter_spacing',
                    'heading' => __( 'Input Letter Spacing', 'jevelin' ),
                    'description' => __( 'Enter text letter spacing (Note: CSS measurement units allowed).', 'jevelin' ),
                    'type' => 'textfield',
                    'std' => '',
                    'group' => __( 'Text', 'jevelin' ),
                ),

                array (
                    'param_name' => 'input_margin',
                    'heading' => __( 'Bottom Margin', 'jevelin' ),
                    'description' => __( 'Enter bottom margin (Note: CSS measurement units allowed).', 'jevelin' ),
                    'type' => 'textfield',
                    'std' => '',
                    // 'edit_field_class' => 'vc_col-xs-6',
                    'group' => __( 'Input Fields', 'jevelin' ),
                ),




                /*
                ** Submit Button
                */
                array(
                    'param_name' => 'submit_font_size',
                    'heading' => __( 'Font Size', 'jevelin' ),
                    'description' => __( 'Enter submit button font size (Note: CSS measurement units allowed).', 'jevelin' ),
                    'type' => 'textfield',
                    'group' => __( 'Submit Button', 'jevelin' ),
                ),

                array (
                    'param_name' => 'submit_font_weight',
                    'heading' => 'Font Weight',
                    'value' => array (
                        'Default' => '',
                        'Light' => '300',
                        'Normal' => '400',
                        'Medium' => '500',
                        'Semi-Bold' => '600',
                        'Bold' => '700',
                        'Extra Bold' => '800',
                        'Black' => '900',
                    ),
                    'type' => 'dropdown',
                    'group' => __( 'Submit Button', 'jevelin' ),
                ),

                array (
                    'param_name' => 'submit_text_transform',
                    'heading' => 'Text Transformation',
                    'value' => array (
                        'Default' => 'default',
                        'None' => 'none',
                        'Uppercase' => 'uppercase',
                        'Lowercase' => 'lowercase',
                        'Capitalize' => 'capitalize',
                    ),
                    'type' => 'dropdown',
                    'std' => 'default',
                    'group' => __( 'Submit Button', 'jevelin' ),
                ),

                array (
                    'param_name' => 'submit_background_color',
                    'heading' => 'Background Color',
                    'type' => 'colorpicker',
                    'group' => __( 'Submit Button', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-6',
                ),

                array (
                    'param_name' => 'submit_background_hover_color',
                    'heading' => 'Background Hover Color',
                    'type' => 'colorpicker',
                    'group' => __( 'Submit Button', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-6',
                ),

                array (
                    'param_name' => 'submit_text_color',
                    'heading' => 'Text Color',
                    'type' => 'colorpicker',
                    'group' => __( 'Submit Button', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-6',
                ),

                array (
                    'param_name' => 'submit_text_hover_color',
                    'heading' => 'Text Hover Color',
                    'type' => 'colorpicker',
                    'group' => __( 'Submit Button', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-6',
                ),

                array (
                    'param_name' => 'submit_border_color',
                    'heading' => 'Border Color',
                    'type' => 'colorpicker',
                    'group' => __( 'Submit Button', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-6',
                ),

                array (
                    'param_name' => 'submit_border_hover_color',
                    'heading' => 'Border Color',
                    'type' => 'colorpicker',
                    'group' => __( 'Submit Button', 'jevelin' ),
                    'edit_field_class' => 'vc_col-xs-6',
                ),

                array (
                    'param_name' => 'submit_alignment',
                    'heading' => 'Alignment',
                    'value' => array (
                        'Default' => 'default',
                        'Left' => 'left',
                        'Center' => 'center',
                        'Right' => 'right',
                    ),
                    'type' => 'dropdown',
                    'std' => 'default',
                    'edit_field_class' => 'vc_col-xs-6',
                    'group' => __( 'Submit Button', 'jevelin' ),
                ),

                array (
                    'param_name' => 'submit_mobile_alignment',
                    'heading' => 'Mobile Alignment',
                    'value' => array (
                        'Default' => 'default',
                        'Left' => 'left',
                        'Center' => 'center',
                        'Right' => 'right',
                    ),
                    'type' => 'dropdown',
                    'std' => 'default',
                    'edit_field_class' => 'vc_col-xs-6',
                    'group' => __( 'Submit Button', 'jevelin' ),
                ),


                array (
                    'param_name' => 'submit_width',
                    'heading' => 'Width',
                    'value' => array (
                        'Default' => 'default',
                        'Inline' => 'inline',
                        'Full' => 'full',
                    ),
                    'type' => 'dropdown',
                    'std' => 'default',
                    'edit_field_class' => 'vc_col-xs-6',
                    'group' => __( 'Submit Button', 'jevelin' ),
                ),

                array (
                    'param_name' => 'submit_height',
                    'heading' => 'Submit Height',
                    'type' => 'textfield',
                    'group' => __( 'Submit Button', 'jevelin' ),
                ),

                array (
                    'param_name' => 'submit_line_height',
                    'heading' => 'Submit Line Height',
                    'type' => 'textfield',
                    'group' => __( 'Submit Button', 'jevelin' ),
                ),

                array (
                    'param_name' => 'submit_leftright_padding',
                    'heading' => 'Horizontal Padding (left/right)',
                    'type' => 'textfield',
                    'group' => __( 'Submit Button', 'jevelin' ),
                ),

                array (
                    'param_name' => 'submit_border_radius',
                    'heading' => __( 'Border Radius', 'jevelin' ),
                    //'description' => __( 'Enter input field border radius (Note: CSS measurement units allowed).', 'jevelin' ),
                    'type' => 'textfield',
                    'edit_field_class' => 'vc_col-xs-6',
                    'group' => __( 'Submit Button', 'jevelin' ),
                ),

                array (
                    'param_name' => 'submit_letter_spacing',
                    'heading' => 'Letter Spacing',
                    'type' => 'textfield',
                    'group' => __( 'Submit Button', 'jevelin' ),
                ),

                array (
                    'param_name' => 'submit_margin',
                    'heading' => 'Margin',
                    'description' => __( 'Here you can set custom margin (<b>top right bottom left</b>). For example: <b>30px 0px 30px 0px</b>', 'jevelin' ),
                    'type' => 'textfield',
                    'group' => __( 'Submit Button', 'jevelin' ),
                ),

                array (
                    'param_name' => 'submit_margin_responsive',
                    'heading' => 'Responsive Margin',
                    'description' => __( 'Here you can set custom respinsive margin (<b>top right bottom left</b>). For example: <b>30px 0px 30px 0px</b>', 'jevelin' ),
                    'type' => 'textfield',
                    'group' => __( 'Submit Button', 'jevelin' ),
                ),

            ),
        ));
    }

    public function _html( $atts, $content ) {
        // Params extraction
        extract( shortcode_atts( array(
            'style' => 'style1',
            'layout' => 'default',
            'inline_position' => 'middle',
            'form_id' => '',

            // Text
            'label_text_alignment' => 'default',
            'label_font_size' => '',
            'label_font_color' => '',
            'label_font_weight' => '',
            'input_margin_top' => '',
            'label_letter_spacing' => '',

            // Input fields
            'input_font_size' => '',
            'input_border_width' => '',
            'input_text_color' => '',
            'input_text_hover_color' => '',
            'input_text_focus_color' => '',
            'input_background_color' => '',
            'input_background_hover_color' => '',
            'input_background_focus_color' => '',
            'input_border_color' => '',
            'input_border_hover_color' => '',
            'input_border_focus_color' => '',
            'input_text_alignment' => 'default',
            'submit_width' => 'default',
            'input_margin' => '',
            'input_height' => '',
            'textarea_height' => '',
            'input_leftright_padding' => '',
            'input_border_radius' => '',
            'input_letter_spacing' => '',

            // Submit button
            'submit_font_weight' => '',
            'submit_height' => '',
            'submit_line_height' => '',
            'submit_alignment' => 'default',
            'submit_mobile_alignment' => 'default',
            'submit_background_color' => '',
            'submit_background_hover_color' => '',
            'submit_text_color' => '',
            'submit_text_hover_color' => '',
            'submit_border_color' => '',
            'submit_border_hover_color' => '',
            'submit_font_size' => '',
            'submit_text_transform' => 'default',
            'submit_leftright_padding' => '',
            'submit_border_radius' => '',
            'submit_letter_spacing' => '',
            'submit_margin' => '',
            'submit_margin_responsive' => '',
        ), $atts ) );


        // HTML
        $element_class = array();
        if( $input_text_alignment != 'default' ) :
            $element_class[] = 'sh-cf7-text-align-'.$input_text_alignment;
        endif;

        if( $label_text_alignment != 'default' ) :
            $element_class[] = 'sh-cf7-text-align-label-'.$label_text_alignment;
        endif;

        if( $submit_alignment != 'default' ) :
            $element_class[] = 'sh-cf7-submit-align-'.$submit_alignment;
        endif;

        if( $submit_mobile_alignment != 'default' ) :
            $element_class[] = 'sh-cf7-submit-mobile-align-'.$submit_mobile_alignment;
        endif;

        if( $submit_width != 'default' ) :
            $element_class[] = 'sh-cf7-submit-width-'.$submit_width;
        endif;

        ob_start(); ?>

            <style media="screen">
                <?php
                    /*
                    ** Text
                    */
                ?>
                #cf7-<?php echo intval( $form_id ); ?> label {
                    <?php if( $label_font_size ) : ?>
                        font-size: <?php echo esc_attr( $label_font_size ); ?>;
                    <?php endif; ?>

                    <?php if( $label_font_color ) : ?>
                        color: <?php echo esc_attr( $label_font_color ); ?>!important;
                    <?php endif; ?>

                    <?php if( $label_font_weight != 'default' ) : ?>
                        font-weight: <?php echo esc_attr( $label_font_weight ); ?>!important;
                    <?php endif; ?>

                    <?php if( $label_letter_spacing ) : ?>
                        letter-spacing: <?php echo jevelin_addpx( $label_letter_spacing ); ?>;
                    <?php endif; ?>
                }




                <?php
                    /*
                    ** Input fields
                    */
                ?>
                #cf7-<?php echo intval( $form_id ); ?> input:not([type="submit"]),
                #cf7-<?php echo intval( $form_id ); ?> select,
                #cf7-<?php echo intval( $form_id ); ?> textarea,
                #cf7-<?php echo intval( $form_id ); ?> .SumoSelect > .CaptionCont {
                    <?php if( $input_leftright_padding ) : ?>
                        padding-left: <?php echo jevelin_addpx( $input_leftright_padding ); ?>!important;
                        padding-right: <?php echo jevelin_addpx( $input_leftright_padding ); ?>!important;
                    <?php endif; ?>

                    <?php if( $input_font_size ) : ?>
                        font-size: <?php echo jevelin_addpx( $input_font_size ); ?>!important;
                    <?php endif; ?>

                    <?php if( $input_text_color ) : ?>
                        color: <?php echo esc_attr( $input_text_color ); ?>!important;
                    <?php endif; ?>

                    <?php if( $input_background_color ) : ?>
                        background-color: <?php echo esc_attr( $input_background_color ); ?>!important;
                    <?php endif; ?>

                    <?php if( $input_border_color ) : ?>
                        border-color: <?php echo esc_attr( $input_border_color ); ?>!important;
                    <?php endif; ?>

                    <?php if( $input_border_radius ) : ?>
                        border-radius: <?php echo jevelin_addpx( $input_border_radius ); ?>;
                    <?php endif; ?>

                    <?php if( $input_border_width ) : ?>
                        border-width: <?php echo jevelin_addpx( $input_border_width ); ?>!important;
                    <?php endif; ?>

                    transition: 0.3s all ease-in-out;
                }


                #cf7-<?php echo intval( $form_id ); ?> input:not([type="submit"]):hover,
                #cf7-<?php echo intval( $form_id ); ?> select:hover,
                #cf7-<?php echo intval( $form_id ); ?> textarea:hover {
                    <?php if( $input_text_hover_color ) : ?>
                        color: <?php echo jevelin_addpx( $input_text_hover_color ); ?>!important;
                    <?php endif; ?>

                    <?php if( $input_background_hover_color ) : ?>
                        background-color: <?php echo jevelin_addpx( $input_background_hover_color ); ?>!important;
                    <?php endif; ?>

                    <?php if( $input_border_hover_color ) : ?>
                        border-color: <?php echo jevelin_addpx( $input_border_hover_color ); ?>!important;
                    <?php endif; ?>
                }


                #cf7-<?php echo intval( $form_id ); ?> input:not([type="submit"]):focus,
                #cf7-<?php echo intval( $form_id ); ?> select:focus,
                #cf7-<?php echo intval( $form_id ); ?> textarea:focus {
                    <?php if( $input_text_focus_color ) : ?>
                        color: <?php echo jevelin_addpx( $input_text_focus_color ); ?>!important;
                    <?php endif; ?>

                    <?php if( $input_background_focus_color ) : ?>
                        background-color: <?php echo jevelin_addpx( $input_background_focus_color ); ?>!important;
                    <?php endif; ?>

                    <?php if( $input_border_focus_color ) : ?>
                        border-color: <?php echo jevelin_addpx( $input_border_focus_color ); ?>!important;
                    <?php endif; ?>
                }


                <?php if( $textarea_height ) : ?>
                    #cf7-<?php echo intval( $form_id ); ?> textarea {
                        height: <?php echo esc_attr( $textarea_height ); ?>;
                    }
                <?php endif; ?>


                <?php if( $input_height ) : ?>
                    #cf7-<?php echo intval( $form_id ); ?> input:not([type="submit"]),
                    #cf7-<?php echo intval( $form_id ); ?> select,
                    #cf7-<?php echo intval( $form_id ); ?> .SumoSelect > .CaptionCont {
                        height: <?php echo jevelin_addpx( $input_height ); ?>!important;
                        line-height: <?php echo jevelin_addpx( $input_height ); ?>!important;
                    }

                    #cf7-<?php echo intval( $form_id ); ?> .SumoSelect.open > .optWrapper {
                        top: <?php echo jevelin_addpx( (int)$input_height + 6 ); ?>!important;
                    }

                    <?php if( is_numeric( strpos( $input_height, "px") ) ) : ?>
                        #cf7-<?php echo intval( $form_id ); ?> textarea {
                            padding-top: <?php echo esc_attr( ( intval( $input_height ) / 2 ) - 13 ); ?>px!important;
                            padding-bottom: <?php echo esc_attr( ( intval( $input_height ) / 2 ) - 13 ); ?>px!important;
                        }
                    <?php endif; ?>
                <?php endif; ?>

                <?php if( $input_margin || $input_margin_top ) : ?>
                    #cf7-<?php echo intval( $form_id ); ?>:not(.sh-cf7-layout-inline)  .wpcf7-form-control-wrap {
                        <?php if( $input_margin ) : ?>
                    	    margin-bottom: <?php echo esc_attr( $input_margin ); ?>!important;
                        <?php endif; ?>

                        <?php if( $input_margin_top ) : ?>
                    	    margin-top: <?php echo esc_attr( $input_margin_top ); ?>!important;
                        <?php endif; ?>
                    }
                <?php endif; ?>




                <?php
                    /*
                    ** Submit form
                    */
                ?>
                #cf7-<?php echo intval( $form_id ); ?> .wpcf7-submit {

                    <?php if( $submit_leftright_padding ) : ?>
                        padding-left: <?php echo jevelin_addpx( $submit_leftright_padding ); ?>!important;
                        padding-right: <?php echo jevelin_addpx( $submit_leftright_padding ); ?>!important;
                    <?php endif; ?>

                    <?php if( $submit_font_weight ) : ?>
                        font-weight: <?php echo esc_attr( $submit_font_weight ); ?>!important;
                    <?php endif; ?>

                    <?php if( $submit_letter_spacing ) : ?>
                        letter-spacing: <?php echo jevelin_addpx( $submit_letter_spacing ); ?>!important;
                    <?php endif; ?>

                    <?php if( $submit_height ) : ?>
                        height: <?php echo jevelin_addpx( $submit_height ); ?>!important;
                    <?php endif; ?>

                    <?php if( $submit_border_radius ) : ?>
                        border-radius: <?php echo jevelin_addpx( $submit_border_radius ); ?>!important;
                    <?php endif; ?>

                    <?php if( $submit_height || $submit_line_height ) : ?>
                        line-height: <?php echo ( $submit_line_height ) ? jevelin_addpx( $submit_line_height ) : jevelin_addpx( $submit_height ); ?>!important;
                    <?php endif; ?>

                    <?php if( $submit_text_color ) : ?>
                        color: <?php echo esc_attr( $submit_text_color ); ?>!important;
                    <?php endif; ?>

                    <?php if( $submit_background_color ) : ?>
                        background-color: <?php echo esc_attr( $submit_background_color ); ?>!important;
                    <?php endif; ?>

                    <?php if( $submit_font_size ) : ?>
                        font-size: <?php echo esc_attr( $submit_font_size ); ?>!important;
                    <?php endif; ?>

                    <?php if( $submit_text_transform && $submit_text_transform != 'default' ) : ?>
                        text-transform: <?php echo esc_attr( $submit_text_transform ); ?>;
                    <?php endif; ?>

                    <?php if( $submit_border_color || $submit_background_color ) : ?>
                        <?php if( $submit_border_color ) : ?>
                            border-color: <?php echo esc_attr( $submit_border_color ); ?>!important;
                        <?php elseif( $submit_background_color ) : ?>
                            border-color: <?php echo esc_attr( $submit_background_color ); ?>;
                        <?php else : ?>
                            border-color: inherit;
                        <?php endif; ?>

                        border-width: 2px;
                        border-style: solid;
                    <?php endif; ?>

                    <?php if( $submit_margin ) : ?>
                        margin: <?php echo esc_attr( $submit_margin ); ?>!important;
                    <?php endif; ?>
                }


                <?php if( $submit_margin_responsive ) : ?>
                    @media (max-width: 800px) {
                        #cf7-<?php echo intval( $form_id ); ?> .wpcf7-submit {
                            margin: <?php echo esc_attr( $submit_margin_responsive ); ?>!important;
                        }
                    }
                <?php endif; ?>


                <?php if( $submit_text_hover_color || $submit_background_hover_color || $submit_border_hover_color ) : ?>
                    #cf7-<?php echo intval( $form_id ); ?> .wpcf7-submit:hover,
                    #cf7-<?php echo intval( $form_id ); ?> .wpcf7-submit:focus {
                        <?php if( $submit_text_hover_color ) : ?>
                            color: <?php echo esc_attr( $submit_text_hover_color ); ?>!important;
                        <?php endif; ?>

                        <?php if( $submit_background_hover_color ) : ?>
                            background-color: <?php echo esc_attr( $submit_background_hover_color ); ?>!important;
                        <?php endif; ?>

                        <?php if( $submit_border_hover_color ) : ?>
                            border-color: <?php echo esc_attr( $submit_border_hover_color ); ?>!important;
                        <?php endif; ?>
                    }
                <?php endif; ?>


                <?php if( $layout != 'default' && $inline_position == 'top' ) : ?>
                    @media (min-width: 800px) {
                        #cf7-<?php echo intval( $form_id ); ?>.sh-cf7-layout-inline form > p,
                        #cf7-<?php echo intval( $form_id ); ?>.sh-cf7-layout-inline .sh-cf7-body > * {
                            vertical-align: top!important;
                        }
                    }
                <?php endif; ?>
            </style>


            <div id="cf7-<?php echo intval( $form_id ); ?>" class="sh-cf7 sh-cf7-wpbakery sh-cf7-<?php echo esc_attr( $style ); ?> sh-cf7-layout-<?php echo esc_attr( $layout ); ?> <?php echo esc_attr( implode( ' ', $element_class ) ); ?>">
                <?php
                    if( $form_id > 0 && shortcode_exists( 'contact-form-7' ) ) :
                        if( $layout == 'inline' || $layout == 'inline sh-cf7-inline-full-width' ) :
                            add_filter( 'wpcf7_autop_or_not', '__return_false' );
                        endif;

                        echo do_shortcode( '[contact-form-7 id="'.intval( $form_id ).'" title="Subscribe"]' );

                        if( $layout == 'inline' || $layout == 'inline sh-cf7-inline-full-width' ) :
                            add_filter( 'wpcf7_autop_or_not', '__return_true' );
                        endif;
                    endif;
                ?>
            </div>

        <?php return ob_get_clean();
    }
}

new vcj_contact_form_7();
