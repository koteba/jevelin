<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_text_block_css' ) ) :
	function jevelin_shortcode_text_block_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'text-block' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$line_height = ( isset( $atts['line_height'] ) ) ? $atts['line_height'] : '';
		$paragraph_whitespace = ( isset( $atts['paragraph_whitespace'] ) ) ? $atts['paragraph_whitespace'] : true;
		$margin = ( isset( $atts['margin'] ) ) ? $atts['margin'] : '0px 0px 15px 0px';
		$text_size = ( isset( $atts['text_size'] ) ) ? $atts['text_size'] : '';
		$text_size_mobile = ( isset( $atts['text_size_mobile'] ) ) ? $atts['text_size_mobile'] : '';
		$text_color = ( isset( $atts['text_color'] ) ) ? $atts['text_color'] : '';
		$link_color = ( isset( $atts['link_color'] ) ) ? $atts['link_color'] : '';
		$link_hover_color = ( isset( $atts['link_hover_color'] ) ) ? $atts['link_hover_color'] : '';
		$link_hover_color = ( $link_hover_color ) ? $link_hover_color : jevelin_option('link_hover_color');
		ob_start(); ?>


			<?php if( $text_size || $margin || $text_color ) : ?>
				#text-block-<?php echo esc_attr( $id ); ?> {
					<?php if( $text_size ) : ?>
						font-size: <?php echo jevelin_addpx( $text_size ); ?>;
					<?php endif; ?>

					<?php if( $text_color ) : ?>
						color: <?php echo esc_attr( $text_color ); ?>;
					<?php endif; ?>

					<?php if( $margin ) : ?>
						margin: <?php echo esc_attr( $margin ); ?>;
					<?php endif; ?>
				}
			<?php endif; ?>


			<?php if( $text_size_mobile ) : ?>
				@media (max-width: 800px) {
					#text-block-<?php echo esc_attr( $id ); ?> {
						font-size: <?php echo jevelin_addpx( $text_size_mobile ); ?>;
					}
				}
			<?php endif; ?>


			<?php if( $link_color ) : ?>
				#text-block-<?php echo esc_attr( $id ); ?> a {
					color: <?php echo esc_attr( $link_color ); ?>;
				}
			<?php endif; ?>

			#text-block-<?php echo esc_attr( $id ); ?> a:hover,
			#text-block-<?php echo esc_attr( $id ); ?> a:focus {
				color: <?php echo esc_attr( $link_hover_color ); ?>;
			}

			<?php if( $line_height ) : ?>
				#text-block-<?php echo esc_attr( $id ); ?> p,
				#text-block-<?php echo esc_attr( $id ); ?> {
					line-height: <?php echo jevelin_addpx( $line_height ); ?>;
				}
			<?php endif; ?>

			#text-block-<?php echo esc_attr( $id ); ?> .drop-cap {
				font-weight: bold;
				font-size: 50px;
				display: block;
				float: left;
				margin: 8px 10px 0 0;
			}

			<?php if( $paragraph_whitespace == false ) : ?>
				#text-block-<?php echo esc_attr( $id ); ?> p {
					margin-bottom: 0;
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:text_block','jevelin_shortcode_text_block_css');
endif;
?>
