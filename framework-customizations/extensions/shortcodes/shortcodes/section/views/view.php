<?php
/*-----------------------------------------------------------------------------------*/
/* Section HTML
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }

	$animated = ( isset( $atts['animation'] ) && $atts['animation'] != 'none' ) ? ' sh-animated '. $atts['animation'] : '';
	$animated_delay = ( $animated && $atts['animation_delay'] ) ? ' data-wow-delay="'. $atts['animation_delay'] .'s" ' : '';
	$animated_speed = ( $animated && $atts['animation_speed'] ) ? ' data-wow-duration="'. $atts['animation_speed'] .'s" ' : '';

	$background_type = jevelin_get_picker_value( $atts['background'], 'none' );
	$background_type_atts = jevelin_get_picker( $atts['background'] );
	$container = ( isset( $atts['width'] ) && $atts['width'] == 'full' ) ? 'container-fluid' : 'container';
	$class = ( $atts['class'] ) ? ' '.esc_attr( $atts['class'] ) : '';
	$custom_id = ( isset($atts['custom_id']) ) ? esc_attr( $atts['custom_id'] ) : '';
	$adjust = ( isset($atts['adjust_layout']) ) ? esc_attr( $atts['adjust_layout'] ) : '';
	if( $adjust == 'left_side' ) {
		$class.= ' sh-column-adjust-left';
	}

	if( isset($atts['strech_edge']) && $atts['strech_edge'] != 'disabled' && $container == 'container' ) :
		$class.= ' sh-section-strech-edge-'.$atts['strech_edge'];
	endif;

	if( $background_type == 'parallax_video' && $background_type_atts['parallax_video_url'] ) :
		$video = ' data-jarallax-video="'.esc_url( $background_type_atts['parallax_video_url'] ).'" ';
	else :
		$video = '';
	endif;

	if( isset($atts['columns_height']) && $atts['columns_height'] ) :
		$container.= ' section-justify-height';
	endif;

	if( isset($atts['columns_height']) && $atts['columns_height'] == 'height' ) :
		$container.= ' section-justify-height-only';
	endif;

	if( isset($atts['columns_height']) && $atts['columns_height'] == 'full' ) :
		$container.= ' section-justify-height-full';
	endif;

	if( isset($atts['columns_height']) && $atts['columns_height'] == 'bottom' ) :
		$container.= ' section-justify-height-bottom';
	endif;

	if( isset($atts['elememt_alignment']) && $atts['elememt_alignment'] == 'center' ) :
		$container.= ' sh-section-mobile-alignment-center';
	endif;

	if( isset($atts['visibility']) && $atts['visibility'] ) :
		$class.= ' sh-section-visibility-'.esc_attr( $atts['visibility'] );
	endif;

	if( isset($atts['extra_white_space']) && $atts['extra_white_space'] == 'on' ) :
		$class.= ' sh-section-extra-white-space';
	endif;
?>

<section class="sh-section sh-section-<?php echo esc_attr( $atts['id'] ); ?> fw-main-row<?php echo esc_attr( $class ) . esc_attr( $animated ); ?>"<?php echo wp_kses_post( $video ); ?><?php if( $custom_id ): ?> id="<?php echo esc_attr( $custom_id ); ?>"<?php endif; ?><?php echo wp_kses_post( $animated_speed ) . wp_kses_post( $animated_delay ); ?>>
	<?php if( $atts['background_color_overlay'] == true && $atts['background_color_overlay'] != 'columns' ) : ?>
		<div class="sh-section-overlay-<?php echo esc_attr( $atts['id'] ); ?> <?php if( $atts['background_color_overlay'] == true ) : echo 'sh-section-overlay-front'; endif; ?>"></div>
	<?php endif; ?>

	<?php if( ( $background_type == 'parallax' && jevelin_get_image($atts['background_image'] ) ) || $background_type == 'video' || $background_type == 'parallax_video' ) : ?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				<?php if( $background_type == 'parallax' && jevelin_get_image($atts['background_image'] ) ) : ?>

					if( $(window).width() >= 800 ) {
						if( document.documentMode || /Edge/.test(navigator.userAgent) ) {
							$('.sh-section-<?php echo esc_js( $atts['id'] ); ?>').css( 'background-attachment', 'fixed' );
						} else {
							$('.sh-section-<?php echo esc_js( $atts['id'] ); ?>').jarallax({
								speed: <?php
									if( $background_type_atts['parallax_options'] == 'fixed' ) :
										echo '0.0';
									elseif( $background_type_atts['parallax_options'] == 'slow' ) :
										echo '0.2';
									else :
										echo '0.5';
									endif;
								?>
							});
						}
					}

				<?php elseif( $background_type == 'parallax_video' ) : ?>

					if( $(window).width() >= 800 ) {
						$('.sh-section-<?php echo esc_js( $atts['id'] ); ?>').jarallax({
							speed: 0.2
						});
					}

				<?php endif; ?>
				<?php if( $background_type == 'video' ) : ?>

					$('.sh-section-<?php echo esc_js( $atts['id'] ); ?>').vide({
						mp4: '<?php echo esc_url($background_type_atts['mp4_url']);?>',
						webm: '<?php echo esc_url($background_type_atts['webm_url']);?>',
						ogv: '<?php echo esc_url($background_type_atts['ogv_url']);?>',
						poster: '<?php echo esc_url(jevelin_get_image(($atts['background_image'])));?>'
					});

				<?php endif; ?>
			});
		</script>
	<?php endif; ?>

	<div class="sh-section-container <?php echo esc_attr( $container ); ?>">
		<?php echo do_shortcode( $content ); ?>
	</div>
</section>
