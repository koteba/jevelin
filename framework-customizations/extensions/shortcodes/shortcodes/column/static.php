<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');
wp_enqueue_style('fw-ext-builder-frontend-grid');

if(!function_exists('jevelin_shortcode_column_css')) :
	function jevelin_shortcode_column_css($data) {
		$atts = jevelin_shortcode_options($data,'column');
		$background_type = jevelin_get_picker_value( $atts['background'], 'none' );
		$background_type_atts = jevelin_get_picker( $atts['background'] );
		$padding_mobile = ( isset( $atts['padding_mobile']['padding_mobile'] ) ) ? esc_attr($atts['padding_mobile']['padding_mobile']) : '';
		$padding_mobile_atts = jevelin_get_picker( $atts['padding_mobile'] );
		$margin_mobile = ( isset( $atts['margin_mobile']['margin_mobile'] ) ) ? esc_attr($atts['margin_mobile']['margin_mobile']) : '';
		$margin_mobile_atts = jevelin_get_picker( $atts['margin_mobile'] );
		ob_start(); ?>


			.sh-column-<?php echo esc_attr( $atts['id'] ); ?><?php echo ( isset( $atts['background_padding'] ) && $atts['background_padding'] == 'on' ) ? ' .sh-column-wrapper' : ''; ?> {
				<?php if( $atts['padding'] && $atts['padding'] != '0px 15px 0px 15px' ) : ?>
					padding: <?php echo esc_attr($atts['padding']); ?>;
				<?php endif;  ?>

				<?php if( $atts['margin'] && $atts['margin'] != '0px 0px 0px 0px' ) : ?>
					margin: <?php echo esc_attr($atts['margin']); ?>;
				<?php endif;  ?>

				<?php if( isset( $atts['z_index'] ) && $atts['z_index'] ) : ?>
					z-index: <?php echo esc_attr($atts['z_index']); ?>;
				<?php endif; ?>

				<?php if( isset( $atts['border_radius'] ) && $atts['border_radius'] ) : ?>
					border-radius: <?php echo esc_attr($atts['border_radius']); ?>;
				<?php endif; ?>


				<?php if( $atts['background_color'] ) : ?>
					background-color: <?php echo esc_attr($atts['background_color']); ?>;
				<?php endif;  ?>

				<?php if( $atts['border_left'] ) : ?>
					border-left: 1px solid <?php echo esc_attr($atts['border_left']); ?>;
				<?php endif; ?>
				<?php if( $atts['border_right'] ) : ?>
					border-right: 1px solid <?php echo esc_attr($atts['border_right']); ?>;
				<?php endif; ?>
				<?php if( $atts['border_top'] ) : ?>
					border-top: 1px solid <?php echo esc_attr($atts['border_top']); ?>;
				<?php endif; ?>
				<?php if( $atts['border_bottom'] ) : ?>
					border-bottom: 1px solid <?php echo esc_attr($atts['border_bottom']); ?>;
				<?php endif; ?>

				<?php if( $background_type != 'parallax_simple' && $background_type != 'video' && jevelin_get_image($atts['background_image'] ) ) : ?>
					background-image: url(<?php echo esc_url(jevelin_get_image(($atts['background_image']))); ?>);
				<?php endif; ?>

				<?php if( isset($background_type_atts['background_image_options']) ) : ?>
					<?php if( $background_type_atts['background_image_options'] == 'repeat' ) : ?>
						background-repeat: repeat;
						background-size: auto;
					<?php elseif( $background_type_atts['background_image_options'] == 'norepeat' ) : ?>
						background-repeat: no-repeat;
						background-size: auto;
					<?php elseif( $background_type_atts['background_image_options'] == 'contain' ) : ?>
						background-size: contain;
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif; ?>

				<?php if( isset($background_type_atts['background_image_position']) && $background_type_atts['background_image_position'] ) : ?>
					background-position: <?php echo esc_attr( $background_type_atts['background_image_position'] ); ?>;
				<?php endif; ?>

				<?php if( isset($atts['shadow']) && $atts['shadow'] != 'disabled' ) : ?>
					<?php if( $atts['shadow'] == 'shadow1' ) : ?>
						box-shadow: 0 15px 25px -7px rgba(0,0,0,0.09), 0 -12px 10px -10px rgba(0,0,0,0.04);
					<?php elseif( $atts['shadow'] == 'shadow2' ) : ?>
						box-shadow: 0px 3px 13px 1px rgba(0,0,0,0.12);
					<?php elseif( $atts['shadow'] == 'shadow3' ) : ?>
						box-shadow: 0px 15px 45px -9px rgba(0,0,0,0.25);
					<?php endif; ?>
				<?php endif; ?>
			}

			<?php if(
					( isset($atts['p_align']) && $atts['p_align'] != 'left' )
					||
					( isset($atts['p_width']) && $atts['p_width'] )
			) : ?>
				.sh-column-<?php echo esc_attr( $atts['id'] ); ?> .sh-column-wrapper {
					<?php if( isset($atts['p_align']) && $atts['p_align'] != 'left' ) : ?>
						<?php if( $atts['p_align'] == 'center' ) : ?>
							margin-left: auto;
							margin-right: auto;
						<?php else : ?>
							margin-left: auto;
						<?php endif; ?>
					<?php endif; ?>

					<?php if( isset($atts['p_width']) && $atts['p_width'] ) : ?>
						max-width: <?php echo jevelin_addpx( $atts['p_width'] ); ?>
					<?php endif; ?>
				}
			<?php endif; ?>

			<?php if( jevelin_get_image(($atts['background_image_hover']) ) ) : ?>
				.sh-column-<?php echo esc_attr( $atts['id'] ); ?><?php echo ( isset( $atts['background_padding'] ) && $atts['background_padding'] == 'on' ) ? ' .sh-column-wrapper' : ''; ?>:hover {
					background-image: url(<?php echo esc_url(jevelin_get_image(($atts['background_image_hover']))); ?>);
				}
			<?php endif; ?>

			<?php if( isset($atts['shadow_hover']) && $atts['shadow_hover'] != 'disabled' ) : ?>
				.sh-column-<?php echo esc_attr( $atts['id'] ); ?><?php echo ( isset( $atts['background_padding'] ) && $atts['background_padding'] == 'on' ) ? ' .sh-column-wrapper' : ''; ?>:hover {
					transition: all 0.5s ease-in-out!important;

					<?php if( $atts['shadow_hover'] == 'shadow1' ) : ?>
						box-shadow: 0 15px 25px -7px rgba(0,0,0,0.09), 0 -12px 10px -10px rgba(0,0,0,0.04);
					<?php elseif( $atts['shadow_hover'] == 'shadow2' ) : ?>
						box-shadow: 0px 3px 13px 1px rgba(0,0,0,0.12);
					<?php endif; ?>
				}
			<?php endif; ?>


			<?php if( !empty( $padding_mobile_atts['padding'] ) ) : ?>
				@media (max-width: 800px) {
					.sh-column-<?php echo esc_attr( $atts['id'] ); ?><?php echo ( isset( $atts['background_padding'] ) && $atts['background_padding'] == 'on' ) ? ' .sh-column-wrapper' : ''; ?> {
						padding: <?php echo esc_attr( $padding_mobile_atts['padding'] ); ?>;
					}
				}
			<?php endif; ?>

			<?php if( isset( $atts['p_align_responsive'] ) && $atts['p_align_responsive'] ) : ?>
				@media (max-width: 800px) {
					.sh-column-<?php echo esc_attr( $atts['id'] ); ?> .sh-column-wrapper {
						<?php if( $atts['p_align_responsive'] == 'center' ) : ?>
							margin-left: auto;
							margin-right: auto;
						<?php elseif( $atts['p_align_responsive'] == 'left' ) : ?>
							margin-right: auto;
						<?php else : ?>
							margin-left: auto;
						<?php endif; ?>
					}
				}
			<?php endif; ?>

			<?php if( !empty( $margin_mobile_atts['margin'] ) ) : ?>
				@media (max-width: 1024px) {
					.sh-column-<?php echo esc_attr( $atts['id'] ); ?><?php echo ( isset( $atts['background_padding'] ) && $atts['background_padding'] == 'on' ) ? ' .sh-column-wrapper' : ''; ?> {
						margin: <?php echo esc_attr( $margin_mobile_atts['margin'] ); ?>;
					}
				}
			<?php endif; ?>

			<?php if( $atts['border_left'] ||  $atts['border_right'] || $atts['border_top'] ||  $atts['border_bottom'] ) : ?>
				@media (max-width: 800px) {
					.sh-column-<?php echo esc_attr( $atts['id'] ); ?> {
						<?php if( $atts['border_left_responsive'] == false ) : ?>
							border-left-color: transparent!important;
						<?php endif; ?>

						<?php if( $atts['border_right_responsive'] == false ) : ?>
							border-right-color: transparent!important;
						<?php endif; ?>

						<?php if( $atts['border_top_responsive'] == false ) : ?>
							border-top-color: transparent!important;
						<?php endif; ?>
						<?php if( $atts['border_bottom_responsive'] == false ) : ?>
							border-bottom-color: transparent!important;
						<?php endif; ?>
					}
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) );
	}
	add_action('fw_ext_shortcodes_enqueue_static:column','jevelin_shortcode_column_css');
endif;
?>
