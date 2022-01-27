<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Heading HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$heading = ( isset( $atts['heading'] ) ) ? $atts['heading'] : 'h2';
$alignment = ( isset( $atts['alignment'] ) ) ? $atts['alignment'] : 'center';
$inline_element = ( isset( $atts['inline_element'] ) && $atts['inline_element'] == 'enabled' ) ? ' sh-element-inline' : false;

$link = ( isset( $atts['link'] ) ) ? $atts['link'] : '';
$link_target = ( isset( $atts['link_target'] ) ) ? $atts['link_target'] : '_self';

$animated = ( isset( $atts['animation'] ) && $atts['animation'] != 'none' ) ? ' sh-animated '. $atts['animation'] : '';
$animated_delay = ( $animated && $atts['animation_delay'] ) ? 'data-wow-delay="'. $atts['animation_delay'] .'s"' : '';
$animated_speed = ( $animated && $atts['animation_speed'] ) ? 'data-wow-duration="'. $atts['animation_speed'] .'s"' : '';

if( isset( $atts['content2'] ) && $atts['content2'] ) :
	$content = $atts['content2'];
elseif( isset( $atts['content'] ) ) :
	$content = $atts['content'];
else :
	$content = 'This is heading element';
endif;

/* If Visual Composer */
if( !isset( $atts['id'] ) ) :
	$size = ( isset( $atts['size'] ) ) ? $atts['size'] : 'default';
else :
	$size = ( isset( $atts['size']['size'] ) ) ? $atts['size']['size'] : 'default';
endif;
$size_class = ' size-'.$size;
?>

<div class="sh-heading <?php echo $inline_element; ?> <?php echo esc_attr( $animated ); ?>" id="heading-<?php echo esc_attr( $id ); ?>"<?php echo wp_kses_post( $animated_speed ) . wp_kses_post( $animated_delay ); ?>>
	<div class="sh-element-margin">

		<?php echo $link ? '<a href="'.esc_url( $link ).'" target="'.esc_attr( $link_target ).'">' : ''; ?>

			<<?php echo esc_attr( $heading ); ?> class="sh-heading-content<?php echo esc_attr( $size_class ); ?> text-<?php echo esc_attr( $alignment ); ?>">
				<?php echo jevelin_remove_p( $content ); ?>
			</<?php echo esc_attr( $heading ); ?>>

		<?php echo $link ? '</a>' : ''; ?>

	</div>
</div>
