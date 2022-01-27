<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_image_points_css' ) ) :
	function jevelin_shortcode_image_points_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'image_points' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$accent_color = ( isset( $atts['pointer_color'] ) && $atts['pointer_color'] ) ? esc_attr( $atts['pointer_color'] ) : esc_attr( jevelin_option('accent_color') );
		ob_start(); ?>


			#image-points-<?php echo esc_attr( $id ); ?> .sh-image-point{
				background-color: <?php echo esc_attr($accent_color); ?>;
			}


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:image_points','jevelin_shortcode_image_points_css');
endif;
?>
