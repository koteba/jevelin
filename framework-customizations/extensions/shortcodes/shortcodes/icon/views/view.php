<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Icon HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$alignment = ( isset( $atts['alignment']) ) ? $atts['alignment'] : 'center';
$icon = ( isset( $atts['icon']) ) ? $atts['icon'] : 'ti-check';
$inline_element = ( isset( $atts['inline_element'] ) && $atts['inline_element'] == 'enabled' ) ? ' sh-element-inline' : false;
$url = ( isset( $atts['url'] ) ) ? $atts['url'] : '';
$target = ( isset( $atts['target'] ) ) ? $atts['target'] : '_self';
$url_lightbox = ( isset( $atts['url_lightbox'] ) && $atts['url_lightbox'] == 'enabled' ) ? 'lightcase' : '';

$animated = ( isset( $atts['animation'] ) && $atts['animation'] != 'none' ) ? ' sh-animated '. $atts['animation'] : '';
$animated_delay = ( $animated && $atts['animation_delay'] ) ? 'data-wow-delay="'. $atts['animation_delay'] .'s"' : '';
$animated_speed = ( $animated && $atts['animation_speed'] ) ? 'data-wow-duration="'. $atts['animation_speed'] .'s"' : '';
?>

<div id="icon-<?php echo esc_attr( $id ); ?>" class="sh-icon <?php echo $inline_element; ?> sh-icon-<?php echo esc_attr( $alignment ); ?><?php echo esc_attr( $animated ); ?>" <?php echo wp_kses_post( $animated_speed ) . wp_kses_post( $animated_delay ); ?>>

	<?php if( $url ) : ?>
		<a href="<?php echo esc_url( $url ); ?>" data-rel="<?php echo esc_attr( $url_lightbox ); ?>" target="<?php echo esc_attr( $target ); ?>">
	<?php endif; ?>

		<div class="sh-element-margin">
			<div class="sh-icon-container">
				<i class="sh-icon-data <?php echo esc_attr( $icon ); ?>"></i>
			</div>
		</div>

	<?php if( $url ) : ?>
		</a>
	<?php endif; ?>
</div>
