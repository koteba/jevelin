<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Image Comparision HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$animated = ( isset( $atts['animation'] ) && $atts['animation'] != 'none' ) ? ' sh-animated '. $atts['animation'] : '';
$animated_delay = ( $animated && $atts['animation_delay'] ) ? 'data-wow-delay="'. $atts['animation_delay'] .'s"' : '';
$animated_speed = ( $animated && $atts['animation_speed'] ) ? 'data-wow-duration="'. $atts['animation_speed'] .'s"' : '';

if( isset( $atts['source'] ) && $atts['source'] ) :
	$source = $atts['source'];
else :
	$source = 'large';
endif;

if( isset( $atts['image_b'] ) ) :
	$image_b = ( isset( $atts['image_b'] ) && $atts['image_b'] && !is_array( $atts['image_b'] ) ) ? jevelin_get_small_thumb( $atts['image_b'], $source ) : jevelin_get_image_size( $atts['image_b'], $source );
else :
	$image_b = '';
endif;

if( isset( $atts['image_a'] ) ) :
	$image_a = ( isset( $atts['image_a'] ) && $atts['image_a'] && !is_array( $atts['image_a'] ) ) ? jevelin_get_small_thumb( $atts['image_a'], $source ) : jevelin_get_image_size( $atts['image_a'], $source );
else :
	$image_a = '';
endif;

$text_b = ( isset( $atts['text_b'] ) ) ? $atts['text_b'] : '';
$text_a = ( isset( $atts['text_a'] ) ) ? $atts['text_a'] : '';


// Enqueue scripts
if( !defined( 'FW' ) ) :
	wp_enqueue_script('jevelin-event-move', get_template_directory_uri() . '/framework-customizations/extensions/shortcodes/shortcodes/image-comparison/static/jquery.event.move.js', array('jquery'));
	wp_enqueue_style( 'jevelin-twentytwenty-css', get_template_directory_uri() . '/framework-customizations/extensions/shortcodes/shortcodes/image-comparison/static/twentytwenty.css' );
	wp_enqueue_script('jevelin-twentytwenty-js', get_template_directory_uri() . '/framework-customizations/extensions/shortcodes/shortcodes/image-comparison/static/jquery.twentytwenty.js', array('jquery', 'jevelin-event-move'));
endif;
?>

<script type="text/javascript">
	<?php echo ( jevelin_is_vc_front() ) ? 'jQuery(document).ready(function ($)' : 'jQuery(window).load(function()'; ?> {
		if( jQuery.isFunction( jQuery.fn.twentytwenty ) ) {
			jQuery("#image-comparison-<?php echo esc_js($id); ?>").twentytwenty({
				default_offset_pct: 0.5,
			});
		}
	});
</script>

<div class="sh-image-comparison-container">
	<div id="image-comparison-<?php echo esc_attr($id); ?>" class="sh-image-comparison<?php echo esc_attr( $animated ); ?>"<?php echo wp_kses_post( $animated_speed ) . wp_kses_post( $animated_delay ); ?>>
		<img src="<?php echo esc_url( $image_b ); ?>" alt="<?php echo esc_attr( $text_b ); ?>" />
		<img src="<?php echo esc_url( $image_a ); ?>" alt="<?php echo esc_attr( $text_a ); ?>" />
	</div>
</div>
