<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_pricing_table_css' ) ) :
	function jevelin_shortcode_pricing_table_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'pricing-table' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$font = ( isset( $atts['font'] ) && $atts['font'] ) ? $atts['font'] : 'heading';
		$text_color = ( isset( $atts['text_color'] ) && $atts['text_color'] ) ? $atts['text_color'] : '';
		$background_text_color = ( isset( $atts['background_text_color'] ) && $atts['background_text_color'] ) ? $atts['background_text_color'] : '#ffffff';
		$background_color = ( isset( $atts['background_color'] ) && $atts['background_color'] ) ? $atts['background_color'] : '#f8f8f8';
		$border_color = ( isset( $atts['border_color'] ) && $atts['border_color'] ) ? $atts['border_color'] : 'rgba(0,0,0,0.08)';
		$border_line = ( isset( $atts['border_line'] ) && $atts['border_line'] ) ? $atts['border_line'] : true;
		$accent_color = ( isset( $atts['accent_color'] ) && $atts['accent_color'] ) ? $atts['accent_color'] : jevelin_option('accent_color');

		$font_size = ( isset( $atts['font_size'] ) ) ? $atts['font_size'] : '';
		$button_border_width = ( isset( $atts['button_border_width'] ) ) ? $atts['button_border_width'] : '1px';
		$button_text_color = ( isset( $atts['button_text_color'] ) ) ? $atts['button_text_color'] : '';
		$button_text_hover_color = ( isset( $atts['button_text_hover_color'] ) ) ? $atts['button_text_hover_color'] : '';
		$button_background_color = ( isset( $atts['button_background_color'] ) ) ? $atts['button_background_color'] : '';
		$button_background_hover_color = ( isset( $atts['button_background_hover_color'] ) ) ? $atts['button_background_hover_color'] : '';
		$button_border_color = ( isset( $atts['button_border_color'] ) ) ? $atts['button_border_color'] : '';
		$button_border_hover_color = ( isset( $atts['button_border_hover_color'] ) ) ? $atts['button_border_hover_color'] : '';

		$image = ( isset( $atts['image'] ) && $atts['image'] ) ? $atts['image'] : '';
		if( $image ) :
			$image = ( $atts['image'] && !is_array( $atts['image'] ) ) ? jevelin_get_small_thumb( $atts['image'], 'large' ) : jevelin_get_image( $atts['image'] );
		endif;
		ob_start(); ?>

			<?php if( $font_size ) : ?>
				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-button span {
					font-size: <?php echo esc_attr( $font_size ); ?>!important;
				}
			<?php endif; ?>

			<?php if( $button_text_color ) : ?>
				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-button span {
					color: <?php echo esc_attr( $button_text_color ); ?>!important;
				}
			<?php endif; ?>

			<?php if( $button_text_hover_color ) : ?>
				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-button:hover span,
				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-button:focus span {
					color: <?php echo esc_attr( $button_text_hover_color ); ?>!important;
				}
			<?php endif; ?>

			<?php if( $button_border_color || $button_background_color ) : ?>
				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-button {
					<?php if( $button_border_color ) : ?>
						border: <?php echo jevelin_addpx( $button_border_width ); ?> solid <?php echo esc_attr( $button_border_color ); ?>!important;
					<?php endif; ?>

					<?php if( $button_background_color ) : ?>
						background-color: <?php echo esc_attr( $button_background_color ); ?>!important;
					<?php endif; ?>
				}
			<?php endif; ?>


			<?php if( $button_border_hover_color || $button_background_hover_color ) : ?>
				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-button:hover,
				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-button:focus {
					<?php if( $button_border_color ) : ?>
						border: <?php echo jevelin_addpx( $button_border_width ); ?> solid <?php echo esc_attr( $button_border_hover_color ); ?>!important;
					<?php endif; ?>

					<?php if( $button_background_hover_color ) : ?>
						background-color: <?php echo esc_attr( $button_background_hover_color ); ?>!important;
					<?php endif; ?>
				}
			<?php endif; ?>


			<?php if( $image ) : ?>
				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-style1 .sh-pricing-top,
				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-style2 .sh-pricing-top,
				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-style3,
				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-style4 {
					background-image: url(<?php echo esc_url( $image ); ?>);
					background-position: 50% 50%;
					background-size: cover;
				}
			<?php endif; ?>

			<?php if( in_array( $font, array( 'additional1', 'additional2', 'body' ) ) ) : ?>
				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-name h2 {
					<?php if( $font == 'additional1' ) : ?>
						font-family: '<?php echo jevelin_option_value('additional_font1','family'); ?>'!important;
					<?php elseif( $font == 'additional2' ) : ?>
						font-family: '<?php echo jevelin_option_value('additional_font2','family'); ?>'!important;
					<?php elseif( $font == 'body' ) : ?>
						font-family: '<?php echo jevelin_option_value('styling_body','family'); ?>'!important;
					<?php endif; ?>
				}
			<?php endif; ?>

			<?php if( $text_color ) : ?>
				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-icon,
				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-content-item,
				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-amount,
				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-style4 .sh-pricing-top,
				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-style3 .sh-pricing-top-aside {
					color: <?php echo esc_attr( $text_color ); ?>!important;
				}
			<?php endif; ?>

			<?php if( $background_text_color ) : ?>
				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-style1 .sh-pricing-top,
				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-style2 .sh-pricing-top,
				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-style4 .sh-pricing-top,
				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-style1 .sh-pricing-name h2,
				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-style2 .sh-pricing-name h2,
				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-style3 .sh-pricing-name h2,
				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-style4 .sh-pricing-name h2 {
					color: <?php echo esc_attr( $background_text_color ); ?>!important;
				}
			<?php endif; ?>

			<?php if( $background_color ) : ?>
				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-icon,
				#pricing-<?php echo esc_attr( $id ); ?> {
					background-color: <?php echo esc_attr( $background_color ); ?>;
				}
			<?php endif; ?>

			<?php if( $border_color ) : ?>
				#pricing-<?php echo esc_attr( $id ); ?>,
				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-content-item,
				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-style3 .sh-pricing-content-item:first-child,
				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-style4 .sh-pricing-content-item:first-child {
					border-color: <?php echo esc_attr( $border_color ); ?>!important;
				}
			<?php endif; ?>

			<?php if( $border_line == false ) : ?>
				#pricing-<?php echo esc_attr( $id ); ?> {
					border-width: 0!important;
				}
			<?php endif; ?>

			<?php if( $accent_color ) : ?>
				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-style1 .sh-pricing-top,
				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-style2 .sh-pricing-top,
				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-style3 .sh-pricing-name,
				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-button1 {
					background-color: <?php echo esc_attr( $accent_color ); ?>;
				}

				#pricing-<?php echo esc_attr( $id ); ?>.sh-pricing-20 .sh-pricing-name:after {
					border-top-color: <?php echo esc_attr( $accent_color ); ?>;
				}

				#pricing-<?php echo esc_attr( $id ); ?> .sh-pricing-button2 {
					color: <?php echo esc_attr( $accent_color ); ?>;
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:pricing_table','jevelin_shortcode_pricing_table_css');
endif;
?>
