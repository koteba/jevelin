<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_alert_message_css' ) ) :
	function jevelin_shortcode_alert_message_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'alert_message' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		ob_start(); ?>


			#alert-<?php echo esc_attr( $id ); ?>,
			#alert-<?php echo esc_attr( $id ); ?> .sh-alert-title {
				<?php if( isset( $atts['text_color'] ) && $atts['text_color'] ) : ?>
					color: <?php echo esc_attr($atts['text_color']); ?>;
				<?php endif; ?>

				<?php if( isset( $atts['background_color'] ) && $atts['background_color'] ) : ?>
					background-color: <?php echo esc_attr( $atts['background_color'] ); ?>;
				<?php endif; ?>
			}

			<?php if( isset( $atts['border_color'] ) && $atts['border_color'] ) : ?>
			#alert-<?php echo esc_attr( $id ); ?> {
				border: 5px solid <?php echo esc_attr( $atts['border_color'] ); ?>;
			}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action( 'fw_ext_shortcodes_enqueue_static:alert_message', 'jevelin_shortcode_alert_message_css' );
endif;
?>
