<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Button HTML
/*-----------------------------------------------------------------------------------*/
$animated = ( isset( $atts['animation'] ) && $atts['animation'] != 'none' ) ? ' sh-animated '. $atts['animation'] : '';
$animated_delay = ( $animated && $atts['animation_delay'] ) ? 'data-wow-delay="'. $atts['animation_delay'] .'s"' : '';
$animated_speed = ( $animated && $atts['animation_speed'] ) ? 'data-wow-duration="'. $atts['animation_speed'] .'s"' : '';
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$url = ( isset( $atts['url'] ) ) ? $atts['url'] : '#';
$target = ( isset( $atts['target'] ) ) ? $atts['target'] : '_self';
$size = ( isset( $atts['size'] ) ) ? $atts['size'] : 'medium';
$icon = ( isset( $atts['icon'] ) ) ? $atts['icon'] : '';
$text = ( isset( $atts['text'] ) ) ? $atts['text'] : esc_attr__( 'This is button', 'jevelin' );
$icon_alignment = ( isset( $atts['icon_alignment'] ) ) ? $atts['icon_alignment'] : 'left';
$style = ( isset( $atts['style'] ) ) ? $atts['style'] : '1';
$tale = ( isset( $atts['tale'] ) ) ? $atts['tale'] : 'none';
$inline_element = ( isset( $atts['inline_element'] ) && $atts['inline_element'] == 'enabled' ) ? ' sh-element-inline' : false;
?>

<div id="button-<?php echo esc_attr( $id ); ?>" class="sh-button-container <?php echo $inline_element; ?> sh-button-style-<?php echo esc_attr( $style ); ?><?php echo esc_attr( $animated ); ?>"<?php echo wp_kses_post( $animated_speed ) . wp_kses_post( $animated_delay ); ?>>
	<div class="sh-element-margin">
		<a href="<?php echo esc_url( $url ); ?>" target="<?php echo esc_attr( $target ); ?>" class="sh-button sh-button-<?php echo esc_attr( $size ); ?> <?php if( $icon ) : ?>sh-button-icon-<?php echo esc_attr( $icon_alignment ); ?><?php endif; ?>">

			<?php if( $icon ) : ?>
				<span class="sh-button-icon">
					<i class="<?php echo esc_attr( $icon ); ?>"></i>
				</span>
			<?php endif; ?>

			<?php if( $text ) : ?>
				<span class="sh-button-text">
					<?php echo esc_attr( $text ); ?>
				</span>
			<?php endif; ?>

			<?php if( $tale != 'none' && $style != '3' ) : ?>
				<span class="sh-button-tale sh-button-tale-<?php echo esc_attr( $tale ); ?>"></span>
			<?php endif; ?>

		</a>
		<?php if( $style == '4' ) : ?>

			<div class="sh-button sh-button-<?php echo esc_attr( $size ); ?> sh-button-icon-<?php echo esc_attr( $icon_alignment ); ?> sh-button-hidden">
				<?php if( $icon ) : ?>
					<span class="sh-button-icon">
						<i class="<?php echo esc_attr( $icon ); ?>"></i>
					</span>
				<?php endif; ?>

				<?php if( $text ) : ?>
					<span class="sh-button-text">
						<?php echo esc_attr( $text ); ?>
					</span>
				<?php endif; ?>
			</div>

		<?php endif; ?>
	</div>
</div>
