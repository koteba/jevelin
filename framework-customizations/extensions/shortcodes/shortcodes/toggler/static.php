<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');
if(!function_exists('jevelin_shortcode_toggler_css')) :
	function jevelin_shortcode_toggler_css ($data) {
		$atts = jevelin_shortcode_options($data,'toggler');
		$style = ( isset( $atts['style']['style'] ) ) ? esc_attr($atts['style']['style']) : 'style1';
		$style_atts = jevelin_get_picker( $atts['style'] );
		ob_start(); ?>


			#accordion-<?php echo esc_attr( $atts['id'] ); ?>.sh-accordion .panel-title a.collapsed,
			#accordion-<?php echo esc_attr( $atts['id'] ); ?>.sh-accordion .panel-title a.collapsed i {
				<?php /* Text color */ if( isset($atts['text_color']) && $atts['text_color'] ) : ?>
					color: <?php echo esc_attr( $atts['text_color'] ); ?>;
				<?php endif; ?>

				<?php /* Background color */ if( isset($atts['background_color']) && $atts['background_color'] != 'f4f4f4' ) : ?>
					background-color: <?php echo esc_attr( $atts['background_color'] ); ?>;
				<?php endif; ?>
			}

			#accordion-<?php echo esc_attr( $atts['id'] ); ?>.sh-accordion .panel-title a,
			#accordion-<?php echo esc_attr( $atts['id'] ); ?>.sh-accordion .panel-title a i {
				<?php /* Active text color */ if( isset($atts['expanded_text_color']) && $atts['expanded_text_color'] ) : ?>
					color: <?php echo esc_attr( $atts['expanded_text_color'] ); ?>;
				<?php endif; ?>

				<?php /* Active background color */
					$accent_color = ( $atts['expanded_background_color'] ) ? $atts['expanded_background_color'] : jevelin_option('accent_color');
					if( $accent_color ) : ?>
						background-color: <?php echo esc_attr( $accent_color ); ?>;
				<?php endif; ?>
			}

			<?php /* Icon size */ if( isset($atts['icon_size']) && $atts['icon_size'] ) : ?>
				#accordion-<?php echo esc_attr( $atts['id'] ); ?> .sh-accordion-icon {
					font-size: <?php echo esc_attr($atts['icon_size']); ?>
				}
			<?php endif; ?>

			<?php /* Icon position */ if( isset($atts['icon_position']) && $atts['icon_position'] == 'right' ) : ?>
				#accordion-<?php echo esc_attr( $atts['id'] ); ?> .sh-accordion-icon {
					display: block;
					float: right;
					margin-right: -5px;
					margin-left: 0;
				}

				#accordion-<?php echo esc_attr( $atts['id'] ); ?> .sh-accordion-icon-cell {
					padding-right: 0;
					padding-left: 20px;
				}
			<?php endif; ?>

			<?php if( $style_atts['border_color'] ) : ?>
				#accordion-<?php echo esc_attr( $atts['id'] ); ?> .panel {
					border-bottom: 1px solid <?php echo esc_attr( $style_atts['border_color'] ); ?>!important;
				}

				#accordion-<?php echo esc_attr( $atts['id'] ); ?> .panel .panel-collapse .panel-body {
					border-color: <?php echo esc_attr( $style_atts['border_color'] ); ?>!important;
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) );
	}
	add_action('fw_ext_shortcodes_enqueue_static:toggler','jevelin_shortcode_toggler_css');
endif;
?>