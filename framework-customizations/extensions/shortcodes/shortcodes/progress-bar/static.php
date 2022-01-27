<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_progress_bar_css' ) ) :
	function jevelin_shortcode_progress_bar_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'progress-bar' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$accent_color = ( isset( $atts['accent_color'] ) && $atts['accent_color'] ) ? $atts['accent_color'] : jevelin_option('accent_color');
		$accent_color2 = ( isset( $atts['accent_color2'] ) && $atts['accent_color2'] ) ? $atts['accent_color2'] : '';
		$background_color = ( isset( $atts['background_color'] ) && $atts['background_color'] ) ? $atts['background_color'] : '';
		ob_start(); ?>


			#progress-<?php echo esc_attr( $id ); ?> .sh-progress-status-value {
				background-color: <?php echo esc_attr( $accent_color ); ?>;
				<?php if( $accent_color2 ) : ?>
					background: -webkit-linear-gradient( 90deg, <?php echo esc_attr( $accent_color ); ?>, <?php echo esc_attr( $accent_color2 ); ?> );
					background: linear-gradient( 90deg, <?php echo esc_attr( $accent_color ); ?>, <?php echo esc_attr( $accent_color2 ); ?> );
				<?php endif; ?>
			}

			#progress-<?php echo esc_attr( $id ); ?> .sh-progress-status-value-edge {
				border-left-color: <?php echo esc_attr( $accent_color ); ?>;
			}

			#progress-<?php echo esc_attr( $id ); ?> .sh-progress-status-value:before {
				border-color: <?php echo esc_attr( $accent_color ) ?>;
			}

			<?php if( $background_color ) : ?>
				#progress-<?php echo esc_attr( $id ); ?>.sh-progress-style1 .sh-progress-status,
				#progress-<?php echo esc_attr( $id ); ?>.sh-progress-style2 .sh-progress-content-container,
				#progress-<?php echo esc_attr( $id ); ?>.sh-progress-style3 .sh-progress-content-container,
				#progress-<?php echo esc_attr( $id ); ?>.sh-progress-style4 .sh-progress-status,
				#progress-<?php echo esc_attr( $id ); ?>.sh-progress-style5 .sh-progress-status {
					background-color: <?php echo esc_attr( $background_color ); ?>;
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:progress_bar','jevelin_shortcode_progress_bar_css');
endif;
?>
