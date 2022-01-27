<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

if(!function_exists('jevelin_shortcode_text_group_css')) :
	function jevelin_shortcode_text_group_css ($data) {
		$atts = jevelin_shortcode_options($data,'text-group'); ob_start(); ?>


			<?php if( $atts['paragraph_whitespace'] == false ) : ?>
				#text-group-<?php echo esc_attr( $atts['id'] ); ?> p {
					margin-bottom: 0;
				}
			<?php endif; ?>

			<?php if( isset( $atts['text_font'] ) && $atts['text_font'] == 'additional1' || $atts['text_font'] == 'additional2' || $atts['text_font'] == 'heading' ) : ?>
				#text-group-<?php echo esc_attr( $atts['id'] ); ?> .text-group-content p {

					<?php if( $atts['text_font'] == 'additional1' ) : ?>
						font-family: '<?php echo esc_attr( jevelin_option_value('additional_font1','family') ); ?>'!important;
					<?php elseif( $atts['text_font'] == 'additional2' ) : ?>
						font-family: '<?php echo esc_attr( jevelin_option_value('additional_font2','family') ); ?>'!important;
					<?php elseif( $atts['text_font'] == 'body' ) : ?>
						font-family: '<?php echo esc_attr( jevelin_option_value('styling_body','family') ); ?>'!important;
					<?php endif; ?>

				}
			<?php endif; ?>

			<?php if( isset( $atts['heading_font'] ) && $atts['heading_font'] == 'additional1' || $atts['heading_font'] == 'additional2' || $atts['heading_font'] == 'body' ) : ?>
				#text-group-<?php echo esc_attr( $atts['id'] ); ?> .text-group-content h1,
				#text-group-<?php echo esc_attr( $atts['id'] ); ?> .text-group-content h2,
				#text-group-<?php echo esc_attr( $atts['id'] ); ?> .text-group-content h3,
				#text-group-<?php echo esc_attr( $atts['id'] ); ?> .text-group-content h4,
				#text-group-<?php echo esc_attr( $atts['id'] ); ?> .text-group-content h5,
				#text-group-<?php echo esc_attr( $atts['id'] ); ?> .text-group-content h6 {

					<?php if( $atts['heading_font'] == 'additional1' ) : ?>
						font-family: '<?php echo esc_attr( jevelin_option_value('additional_font1','family') ); ?>'!important;
					<?php elseif( $atts['heading_font'] == 'additional2' ) : ?>
						font-family: '<?php echo esc_attr( jevelin_option_value('additional_font2','family') ); ?>'!important;
					<?php elseif( $atts['heading_font'] == 'body' ) : ?>
						font-family: '<?php echo esc_attr( jevelin_option_value('styling_body','family') ); ?>'!important;
					<?php endif; ?>

				}
			<?php endif; ?>

			<?php if( isset( $atts['heading_font_weight'] ) && $atts['heading_font_weight'] > 0 ) : ?>
				#text-group-<?php echo esc_attr( $atts['id'] ); ?> .text-group-content h1,
				#text-group-<?php echo esc_attr( $atts['id'] ); ?> .text-group-content h2,
				#text-group-<?php echo esc_attr( $atts['id'] ); ?> .text-group-content h3,
				#text-group-<?php echo esc_attr( $atts['id'] ); ?> .text-group-content h4,
				#text-group-<?php echo esc_attr( $atts['id'] ); ?> .text-group-content h5,
				#text-group-<?php echo esc_attr( $atts['id'] ); ?> .text-group-content h6 {
					font-weight: <?php echo intval( $atts['heading_font_weight'] ); ?>
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) );
	}
	add_action('fw_ext_shortcodes_enqueue_static:text_group','jevelin_shortcode_text_group_css');
endif;
?>
