<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_event_css' ) ) :
	function jevelin_shortcode_event_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'event' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$title_color = ( isset( $atts['title_color'] ) ) ? $atts['title_color'] : '';
		$desc_color = ( isset( $atts['desc_color'] ) ) ? $atts['desc_color'] : '';
		$line_color = ( isset( $atts['line_color'] ) ) ? $atts['line_color'] : '';
		ob_start(); ?>

			<?php if( $title_color ) : ?>
				#event-<?php echo esc_attr( $id ); ?> .sh-event-title {
					color: <?php echo esc_attr( $title_color ); ?>;
				}
			<?php endif; ?>

			<?php if( $desc_color ) : ?>
				#event-<?php echo esc_attr( $id ); ?> .sh-event-desc {
					color: <?php echo esc_attr( $desc_color ); ?>;
				}
			<?php endif; ?>

			<?php if( $line_color ) : ?>
				#event-<?php echo esc_attr( $id ); ?>.sh-event {
					border-color: <?php echo esc_attr( $line_color ); ?>;
				}
			<?php endif; ?>

			#event-<?php echo esc_attr( $id ); ?> .sh-event-title {
				border-color: <?php echo esc_attr( jevelin_option('accent_color') ); ?>;
			}

			#event-<?php echo esc_attr( $id ); ?> .sh-event-button:hover {
				border-color: <?php echo esc_attr( jevelin_option('accent_color') ); ?>;
				background-color: <?php echo esc_attr( jevelin_option('accent_color') ); ?>;
			}

		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:event','jevelin_shortcode_event_css');
endif;
?>
