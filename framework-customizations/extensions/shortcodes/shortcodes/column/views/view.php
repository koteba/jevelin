<?php
/*-----------------------------------------------------------------------------------*/
/* Column HTML
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }

	$animated = ( isset( $atts['animation'] ) && $atts['animation'] != 'none' ) ? ' sh-animated '. $atts['animation'] : '';
	$animated_delay = ( $animated && $atts['animation_delay'] ) ? 'data-wow-delay="'. $atts['animation_delay'] .'s"' : '';
	$animated_speed = ( $animated && $atts['animation_speed'] ) ? 'data-wow-duration="'. $atts['animation_speed'] .'s"' : '';

	$background_type = jevelin_get_picker_value( $atts['background'], 'none' );
	$background_type_atts = jevelin_get_picker( $atts['background'] );
	$container = fw_ext_builder_get_item_width('page-builder', $atts['width'] . '/frontend_class');
	$video = ( isset( $atts['background_video'] ) && $atts['background_video'] ) ? ' data-vide-bg="'.esc_url($atts['background_video']).'" data-vide-options="loop: true, muted: true, position: 50% 50%"' : '';
	$class = ( $atts['class'] ) ? ' '.$atts['class'] : '';

	$padding_mobile = ( isset( $atts['padding_mobile']['padding_mobile'] ) ) ? $atts['padding_mobile']['padding_mobile'] : '';
	$padding_mobile_atts = jevelin_get_picker( $atts['padding_mobile'] );
	if( !empty( $padding_mobile_atts['padding'] ) ) :
		$class.= ' sh-column-mobile-padding';
	endif;

	if( isset($atts['shadow']) && $atts['shadow'] != 'disabled' ) :
		$class.= ' sh-column-shadow';
	endif;
?>

<div class="sh-column sh-column-<?php echo esc_attr( $atts['id'] ); ?> <?php echo esc_attr( $container ) . esc_attr( $class ) . esc_attr( $animated ); ?>" <?php echo wp_kses_post( $animated_speed ) . wp_kses_post( $animated_delay ); ?>>

	<?php if( ( $background_type == 'parallax' && jevelin_get_image($atts['background_image'] ) ) || $background_type == 'video' ) : ?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				<?php if( $background_type == 'parallax' && jevelin_get_image($atts['background_image'] ) ) : ?>

				if( $(window).width() >= 800 ) {
					if( document.documentMode || /Edge/.test(navigator.userAgent) ) {
						$('.sh-section-<?php echo esc_js( $atts['id'] ); ?>').css( 'background-attachment', 'fixed' );
					} else {
						$('.sh-column-<?php echo esc_js( $atts['id'] ); ?>').jarallax({
							speed: <?php
								if( $background_type_atts['parallax_options'] == 'fixed' ) :
									echo '0.0';
								elseif( $background_type_atts['parallax_options'] == 'veryslow' ) :
									echo '0.05';
								elseif( $background_type_atts['parallax_options'] == 'slow' ) :
									echo '0.2';
								else :
									echo '0.5';
								endif;
							?>
						});
					}
				}

				<?php endif; ?>
				<?php if( $background_type == 'video' ) : ?>

					$('.sh-column-<?php echo esc_js( $atts['id'] ); ?>').vide({
						mp4: '<?php echo esc_url($background_type_atts['mp4_url']);?>',
						webm: '<?php echo esc_url($background_type_atts['webm_url']);?>',
						ogv: '<?php echo esc_url($background_type_atts['ogv_url']);?>',
						poster: '<?php echo esc_url(jevelin_get_image(($atts['background_image'])));?>'
					});

				<?php endif; ?>
			});
		</script>
	<?php endif; ?>

	<div class="sh-column-wrapper">
		<?php echo do_shortcode($content); ?>
	</div>


	<?php /* Preload background image on hover */ ?>
	<?php if( jevelin_get_image( $atts['background_image_hover'] ) ) : ?>
		<div class="preload">
			<img src="<?php echo esc_url( jevelin_get_image( $atts['background_image_hover'] ) ); ?>" />
		</div>
	<?php endif; ?>


</div>
