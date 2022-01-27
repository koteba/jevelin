<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_single_image_css' ) ) :
	function jevelin_shortcode_single_image_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'single-image' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$alignment_mobile = ( isset( $atts['alignment_mobile'] ) ) ? $atts['alignment_mobile'] : 'default';
		$margin = ( isset( $atts['margin'] ) ) ? $atts['margin'] : '';
		$margin_responsive = ( isset( $atts['margin_responsive'] ) ) ? $atts['margin_responsive'] : '';
	ob_start(); ?>

			#single-image-<?php echo esc_attr( $id ); ?> {
				<?php if( isset($atts['alignment']) && $atts['alignment'] == 'center' ) : ?>
					text-align: center;
				<?php elseif( isset($atts['alignment']) && $atts['alignment'] == 'right' ) : ?>
					text-align: right;
				<?php else : ?>
					text-align: left;
				<?php endif; ?>
			}


			<?php if( $alignment_mobile && $alignment_mobile != 'default' ) : ?>
				@media (max-width: 800px) {
					#single-image-<?php echo esc_attr( $id ); ?> {
						<?php if( $alignment_mobile == 'center' ) : ?>
							text-align: center;
						<?php elseif( $alignment_mobile == 'right' ) : ?>
							text-align: right;
						<?php else : ?>
							text-align: left;
						<?php endif; ?>
					}
				}
			<?php endif; ?>



			<?php
			$lazy = isset( $atts['lazy'] ) ? $atts['lazy'] : '';
			if( $lazy == 'enabled' || ( $lazy == 'default' && jevelin_option( 'lazy_loading' ) == 'enabled' ) ) : ?>
				#single-image-<?php echo esc_attr( $id ); ?> .sh-image-lazy-loading {
					<?php if( isset($atts['alignment']) && $atts['alignment'] == 'center' ) : ?>
						margin-left: auto;
						margin-right: auto;
					<?php elseif( isset($atts['alignment']) && $atts['alignment'] == 'right' ) : ?>
						margin-right: 0;
						margin-left: auto;
					<?php endif; ?>
				}
				<?php if( $alignment_mobile && $alignment_mobile != 'default' ) : ?>
					@media (max-width: 800px) {
						#single-image-<?php echo esc_attr( $id ); ?> .sh-image-lazy-loading {
							<?php if( $alignment_mobile == 'center' ) : ?>
								margin-left: auto;
								margin-right: auto;
							<?php elseif( $alignment_mobile == 'right' ) : ?>
								margin-right: 0;
								margin-left: auto;
							<?php else : ?>
								margin-right: auto;
								margin-left: 0;
							<?php endif; ?>
						}
					}
				<?php endif; ?>
			<?php endif; ?>

			<?php if( isset($atts['radius']) && $atts['radius'] ) : ?>
				#single-image-<?php echo esc_attr( $id ); ?> .sh-single-image-container,
				#single-image-<?php echo esc_attr( $id ); ?> .sh-single-image-container img.sh-image-url {
					border-radius: <?php echo jevelin_addpx( $atts['radius'] ); ?>;
				}
			<?php endif; ?>

			<?php if( $margin ) : ?>
				#single-image-<?php echo esc_attr( $id ); ?> .sh-element-margin {
					margin: <?php echo esc_attr( $margin ); ?>;
				}
			<?php endif; ?>

			<?php if( $margin_responsive ) : ?>
				@media (max-width: 800px) {
					#single-image-<?php echo esc_attr( $id ); ?> .sh-element-margin {
						margin: <?php echo esc_attr( $margin_responsive ); ?>;
					}
				}
			<?php endif; ?>

		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:single_image','jevelin_shortcode_single_image_css');
endif;
?>
