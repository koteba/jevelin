<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Heading Animated HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$class = ( isset( $atts['custom_class'] ) && $atts['custom_class'] ) ? ' '. $atts['custom_class'] : '';
$size = ( isset( $atts['size']['size'] ) ) ? $atts['size']['size'] : 'default';
$heading = ( isset( $atts['heading'] ) ) ? $atts['heading'] : 'h3';
$content_fixed = ( isset( $atts['content_fixed'] ) ) ? $atts['content_fixed'] : '';
$loop_value = ( isset( $atts['loop'] ) ) ? $atts['loop'] : 'enable';


if( $loop_value == 'enable' ) :
	$loop = 'true';
else :
	$loop = 'false';
endif;


if( isset( $atts['content2'] ) && $atts['content2'] ) :
	$content = vc_param_group_parse_atts( $atts['content2'] );
elseif( isset( $atts['content'] ) ) :
	$content = $atts['content'];
else :
	$content = array();
endif;


/* If Visual Composer */
if( !isset( $atts['id'] ) ) :
	$size = ( isset( $atts['size'] ) ) ? $atts['size'] : 'default';
else :
	$size = ( isset( $atts['size']['size'] ) ) ? $atts['size']['size'] : 'default';
endif;
$size_class = ' size-'.$size;
?>

<script>
jQuery(document).ready(function ($) {
	if( typeof Typed !== 'undefined' ) {
		var typed = new Typed("#heading-animated-<?php echo esc_js( $id ); ?> .sh-heading-animated-typed", {
			strings: [<?php
				$i = 0; $placeholder = '';
				foreach( $content as $item ) :
					if( $i == 0 ) {
						$placeholder = $item;
					}
					$text = ( isset( $item['text'] ) ) ? $item['text'] : $item;
					echo '"'.wp_kses_post( $text ).'",'; $i++;
				endforeach;
			?> ],
			contentType: 'html',
			typeSpeed: 0,
			loop: <?php echo esc_attr($loop); ?>,
			startDelay: 300,
			typeSpeed: 80,
			backSpeed: 20,
			backDelay: 700,
		});
	}
});
</script>

<div class="sh-heading" id="heading-animated-<?php echo esc_attr( $id ); ?>">
	<<?php echo esc_attr( $heading ); ?> class="sh-heading-content<?php echo esc_attr( $size_class ); ?> sh-heading-animated-content<?php echo esc_attr( $class ); ?>">
		<?php if( $content_fixed ) : ?>
			<span class="sh-heading-animated-fixed">
				<?php echo esc_attr( $content_fixed ); ?>
			</span>
		<?php endif; ?>

		<span class="sh-heading-animated-typed"><?php /*echo wp_kses_post( $placeholder );*/ ?></span>
	</<?php echo esc_attr( $heading ); ?>>
</div>
