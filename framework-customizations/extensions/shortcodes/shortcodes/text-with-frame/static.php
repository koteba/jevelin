<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_text_with_frame_css' ) ) :
	function jevelin_shortcode_text_with_frame_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'text_with_frame' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$line_color = ( isset( $atts['line_color'] ) ) ? $atts['line_color'] : 'rgba(0,0,0,.07)';
		$text_font = ( isset( $atts['text_font'] ) ) ? $atts['text_font'] : 'body';
		$heading_font = ( isset( $atts['heading_font'] ) ) ? $atts['heading_font'] : 'heading';
		ob_start(); ?>

			<?php if( $line_color ) : ?>
				#text-with-frame-<?php echo esc_attr( $id ); ?> .sh-text-with-frame-container {
					border-color: <?php echo esc_attr( $line_color ); ?>;
				}
			<?php endif; ?>

			<?php if( $text_font == 'additional1' || $text_font == 'additional2' || $text_font == 'heading' ) : ?>
				#text-with-frame-<?php echo esc_attr( $id ); ?> .sh-text-with-frame-container p {

					<?php if( $text_font == 'additional1' ) : ?>
						font-family: '<?php echo esc_attr( jevelin_option_value('additional_font1','family') ); ?>'!important;
					<?php elseif( $text_font == 'additional2' ) : ?>
						font-family: '<?php echo esc_attr( jevelin_option_value('additional_font2','family') ); ?>'!important;
					<?php elseif( $text_font == 'body' ) : ?>
						font-family: '<?php echo esc_attr( jevelin_option_value('styling_body','family') ); ?>'!important;
					<?php endif; ?>

				}
			<?php endif; ?>

			<?php if( $heading_font == 'additional1' || $heading_font == 'additional2' || $heading_font == 'body' ) : ?>
				#text-with-frame-<?php echo esc_attr( $id ); ?> .sh-text-with-frame-container h1,
				#text-with-frame-<?php echo esc_attr( $id ); ?> .sh-text-with-frame-container h2,
				#text-with-frame-<?php echo esc_attr( $id ); ?> .sh-text-with-frame-container h3,
				#text-with-frame-<?php echo esc_attr( $id ); ?> .sh-text-with-frame-container h4,
				#text-with-frame-<?php echo esc_attr( $id ); ?> .sh-text-with-frame-container h5,
				#text-with-frame-<?php echo esc_attr( $id ); ?> .sh-text-with-frame-container h6 {

					<?php if( $heading_font == 'additional1' ) : ?>
						font-family: '<?php echo esc_attr( jevelin_option_value('additional_font1','family') ); ?>'!important;
					<?php elseif( $heading_font == 'additional2' ) : ?>
						font-family: '<?php echo esc_attr( jevelin_option_value('additional_font2','family') ); ?>'!important;
					<?php elseif( $heading_font == 'body' ) : ?>
						font-family: '<?php echo esc_attr( jevelin_option_value('styling_body','family') ); ?>'!important;
					<?php endif; ?>

				}
			<?php endif; ?>

		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:text_with_frame','jevelin_shortcode_text_with_frame_css');
endif;
?>
