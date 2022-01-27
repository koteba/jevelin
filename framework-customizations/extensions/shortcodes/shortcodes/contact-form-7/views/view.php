<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Contact Form 7 HTML
/*-----------------------------------------------------------------------------------*/
$style = ( isset( $atts['style'] ) && $atts['style'] ) ? $atts['style'] : 'style1';
$form_id = ( isset( $atts['form_id'] ) && $atts['form_id'] > 0 ) ? $atts['form_id'] : '';
?>

<div id="cf7-<?php echo intval( $form_id ); ?>" class="sh-cf7 sh-cf7-unyson sh-cf7-<?php echo esc_attr($atts['style']); ?>">
    <?php
        if( $form_id > 0 && shortcode_exists( 'contact-form-7' ) ) :
            echo do_shortcode( '[contact-form-7 id="'.intval( $form_id ).'" title="Subscribe"]' );
        endif;
    ?>
</div>
