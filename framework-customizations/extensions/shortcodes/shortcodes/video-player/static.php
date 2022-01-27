<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_video_player_css' ) ) :
	function jevelin_shortcode_video_player_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'video_player' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$width = ( isset( $atts['width'] ) ) ? $atts['width'] : '';
		ob_start(); ?>


			<?php if( $width ) : ?>
				#video-player-<?php echo esc_attr( $id ); ?> {
					max-width: <?php echo esc_attr( $width ); ?>;
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:video_player','jevelin_shortcode_video_player_css');
endif;
?>
