<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_portfolio_fancy_css' ) ) :
	function jevelin_shortcode_portfolio_fancy_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'portfolio-fancy' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$overlay_color = ( isset( $atts['overlay_color'] ) ) ? $atts['overlay_color'] : '';
		$overlay_second_color = ( isset( $atts['overlay_second_color'] ) ) ? $atts['overlay_second_color'] : '';
		$spacing = ( isset( $atts['spacing'] ) ) ? $atts['spacing'] : '15px';

		/* If Visual Composer */
		if( !isset( $atts['id'] ) ) :
			$padding_mobile = ( isset( $atts['padding_mobile'] ) ) ? $atts['padding_mobile'] : 'style1';
			$padding_mobile_atts = array();
			$padding_mobile_atts['padding'] = ( isset( $atts['padding'] ) ) ? $atts['padding'] : 'off';
		else :
			$padding_mobile = ( isset( $atts['padding_mobile']['padding_mobile'] ) ) ? esc_attr($atts['padding_mobile']['padding_mobile']) : '';
			$padding_mobile_atts = jevelin_get_picker( $atts['padding_mobile'] );
		endif;
		ob_start(); ?>

			<?php if( isset( $overlay_color ) && $overlay_color && isset( $overlay_second_color ) && $overlay_second_color ) :
				$first_color = ( strpos($overlay_color, 'rgba' ) !== false) ? esc_attr( $overlay_color ) : jevelin_hex2rgba( $overlay_color );
				$second_color = ( strpos($overlay_second_color, 'rgba') !== false) ?  esc_attr( $overlay_second_color ) : jevelin_hex2rgba( $overlay_second_color );
			?>
				#portfolio-fancy-<?php echo esc_attr( $id ); ?> .sh-portfolio-fancy-item-overlay-bg {
					background: <?php echo esc_attr( $first_color ); ?>;
					background: -moz-linear-gradient(45deg, <?php echo esc_attr( $first_color ); ?> 0%, <?php echo esc_attr( $second_color ); ?> 100%);
					background: -webkit-linear-gradient(45deg, <?php echo esc_attr( $first_color ); ?> 0%, <?php echo esc_attr( $second_color ); ?> 100%);
					background: linear-gradient(45deg, <?php echo esc_attr( $first_color ); ?> 0%, <?php echo esc_attr( $second_color ); ?> 100%);
				}
			<?php elseif( isset( $overlay_color ) && $overlay_color ) : ?>
				#portfolio-fancy-<?php echo esc_attr( $id ); ?> .sh-portfolio-fancy-item-overlay-bg {
					background: <?php echo esc_attr( $overlay_color ); ?>;
				}
			<?php endif; ?>

			<?php if( isset( $atts['padding'] ) && $atts['padding'] && $atts['padding'] != '0px 0px 0px 0px' ) : ?>
				#portfolio-fancy-filter-<?php echo esc_attr( $id ); ?> {
    				padding: <?php echo esc_attr($atts['padding']); ?>;
				}
			<?php endif; ?>

			<?php if( isset( $padding_mobile ) && $padding_mobile == 'on' && $padding_mobile_atts['padding'] ) : ?>
				@media (max-width: 1024px) {
					#portfolio-fancy-filter-<?php echo esc_attr( $id ); ?> {
						padding: <?php echo esc_attr( $padding_mobile_atts['padding'] ); ?>;
					}
				}
			<?php endif; ?>

			#portfolio-fancy-<?php echo esc_attr( $id ); ?> .sh-portfolio-fancy-item {
				padding: 0 <?php echo jevelin_addpx( $spacing ); ?>;
			    margin: <?php echo jevelin_addpx( $spacing ); ?> 0;
			}

		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:portfolio_fancy','jevelin_shortcode_portfolio_fancy_css');
endif;
?>
