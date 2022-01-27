<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_heading_simple_css' ) ) :
	function jevelin_shortcode_heading_simple_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data, 'heading-simple' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$margin = ( isset( $atts['margin'] ) ) ? $atts['margin'] : '';
		$margin_responsive = ( isset( $atts['margin_responsive'] ) ) ? $atts['margin_responsive'] : '';
		$line_height = ( isset( $atts['line_height'] ) ) ? $atts['line_height'] : '';
		$weight = ( isset( $atts['weight'] ) ) ? $atts['weight'] : '700';
		$letter_spacing = ( isset( $atts['letter_spacing'] ) ) ? $atts['letter_spacing'] : '';
		$font = ( isset( $atts['font'] ) ) ? $atts['font'] : 'heading';
		$italic = ( isset( $atts['italic'] ) ) ? $atts['italic'] : false;
		$color_text = ( isset( $atts['color_text'] ) ) ? $atts['color_text'] : '';
		$color_text_hover = ( isset( $atts['color_text_hover'] ) ) ? $atts['color_text_hover'] : '';
		$hover_element = ( isset( $atts['hover_element'] ) ) ? $atts['hover_element'] : '';

		/* If Visual Composer */
		if( !isset( $atts['id'] ) ) :
			$size = ( isset( $atts['size'] ) ) ? $atts['size'] : 'default';
			$size_atts = jevelin_vc_option_picker( $atts, array(
				array( 'name' => 'desktop_size' ),
				array( 'name' => 'responsive_size' ),
			));
		else :
			$size = ( isset( $atts['size']['size'] ) ) ? $atts['size']['size'] : 'default';
			$size_atts = jevelin_get_picker( $atts['size'] );
		endif;
		ob_start(); ?>


			#heading-<?php echo esc_attr( $id ); ?> .sh-element-margin {
				<?php if( $margin ) : ?>
					margin: <?php echo esc_attr( $margin ); ?>;
				<?php endif; ?>
			}

			<?php if( $margin_responsive ) : ?>
				@media (max-width: 800px) {
					#heading-<?php echo esc_attr( $id ); ?> .sh-element-margin {
						margin: <?php echo esc_attr( $margin_responsive ); ?>;
					}
				}
			<?php endif; ?>


			<?php if( !empty( $size_atts['responsive_size'] ) ) : ?>
			@media (max-width: 1024px) {
				#heading-<?php echo esc_attr( $id ); ?> .sh-heading-content {
					font-size: <?php echo jevelin_addpx( $size_atts['responsive_size'] ); ?>!important;
				}
			}
			<?php endif; ?>

			#heading-<?php echo esc_attr( $id ); ?> .sh-heading-content {
				<?php if( !empty( $size_atts['desktop_size'] ) ) : ?>
					font-size: <?php echo jevelin_addpx( $size_atts['desktop_size'] ); ?>;
				<?php endif; ?>

				<?php if( $line_height ) : ?>
					line-height: <?php echo jevelin_addpx( $line_height ); ?>!important;
				<?php endif; ?>

				<?php if( $weight != '100' ) : ?>
					font-weight: <?php echo esc_attr( $weight ); ?>!important;
				<?php endif; ?>

				<?php if( $letter_spacing ) : ?>
					letter-spacing: <?php echo jevelin_addpx( $letter_spacing ); ?>;
				<?php endif; ?>

				<?php if( $color_text ) : ?>
					color: <?php echo esc_attr( $color_text ); ?>;
				<?php endif; ?>
			}

			<?php if( $color_text_hover ) : ?>
				#heading-<?php echo esc_attr( $id ); ?>:hover .sh-heading-content {
					color: <?php echo esc_attr( $color_text_hover ); ?>;
				}
			<?php endif; ?>

			#heading-<?php echo esc_attr( $id ); ?> .sh-heading-content,
			#heading-<?php echo esc_attr( $id ); ?> .sh-heading-additional-text {
				<?php if( $font == 'additional1' ) : ?>
					font-family: '<?php echo jevelin_option_value('additional_font1','family'); ?>'!important;
				<?php elseif( $font == 'additional2' ) : ?>
					font-family: '<?php echo jevelin_option_value('additional_font2','family'); ?>'!important;
				<?php elseif( $font == 'body' ) : ?>
					font-family: '<?php echo jevelin_option_value('styling_body','family'); ?>'!important;
				<?php endif; ?>
			}

			<?php if( $italic == true ) : ?>
				#heading-<?php echo esc_attr( $id ); ?> .sh-heading-content {
					font-style: italic!important;
				}
			<?php endif; ?>

			<?php if( $color_text_hover ) : ?>
				<?php if( $hover_element == 'section') : ?>
					.vc_row:hover #heading-<?php echo esc_attr( $id ); ?> .sh-heading-content,
					.sh-section:hover #heading-<?php echo esc_attr( $id ); ?> .sh-heading-content {
				<?php elseif( $hover_element == 'column') : ?>
					.vc_column_container:hover > div > div > #heading-<?php echo esc_attr( $id ); ?> .sh-heading-content,
					.sh-column:hover #heading-<?php echo esc_attr( $id ); ?> .sh-heading-content {
				<?php else : ?>
					#heading-<?php echo esc_attr( $id ); ?>:hover .sh-heading-content {
				<?php endif; ?>
					color: <?php echo esc_attr( $color_text_hover ); ?>;
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:heading_simple','jevelin_shortcode_heading_simple_css');
endif;
?>
