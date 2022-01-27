<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Text Block HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$content = ( isset( $content ) && $content ) ? $content : $atts['content'];
$class = ( isset( $atts['class'] ) && $atts['class'] ) ? ' '. $atts['class'] : '';
?>

<div id="text-block-<?php echo esc_attr( $id ); ?>" class="sh-text-block<?php echo esc_attr( $class ); ?>">
	<?php echo do_shortcode( $content ); ?>
</div>
