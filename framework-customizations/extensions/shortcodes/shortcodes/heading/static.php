<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_heading_css' ) ) :
	function jevelin_shortcode_heading_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data, 'heading' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$margin = ( isset( $atts['margin'] ) ) ? $atts['margin'] : '';
		$margin_responsive = ( isset( $atts['margin_responsive'] ) ) ? $atts['margin_responsive'] : '';
		$line_height = ( isset( $atts['line_height'] ) ) ? $atts['line_height'] : '';
		$weight = ( isset( $atts['weight'] ) ) ? $atts['weight'] : '400';
		$font_bold_weight = ( isset( $atts['font_bold_weight'] ) ) ? $atts['font_bold_weight'] : 'default';
		$letter_spacing = ( isset( $atts['letter_spacing'] ) ) ? $atts['letter_spacing'] : '';
		$font = ( isset( $atts['font'] ) ) ? $atts['font'] : 'heading';
		$font_bold = ( isset( $atts['font_bold'] ) ) ? $atts['font_bold'] : 'heading';
		$hover_color = ( isset( $atts['hover_color'] ) ) ? $atts['hover_color'] : '';
		$hover_element = ( isset( $atts['hover_element'] ) ) ? $atts['hover_element'] : '';
		$text_color = ( isset( $atts['text_color'] ) ) ? $atts['text_color'] : '';

		/* If Visual Composer */
		if( !isset( $atts['id'] ) ) :
			$style = ( isset( $atts['style'] ) ) ? $atts['style'] : 'style1';
			$style_atts = jevelin_vc_option_picker( $atts, array(
				array( 'name' => 'background_color', 'if' => in_array( $style, array( 'style3', 'style4' ) ), 'default' => '#dadada' ),
				array( 'name' => 'background_image', 'if' => in_array( $style, array( 'style3', 'style4' ) ), 'default' => '' ),
			));

			$size = ( isset( $atts['size'] ) ) ? $atts['size'] : 'default';
			$size_atts = jevelin_vc_option_picker( $atts, array(
				array( 'name' => 'desktop_size' ),
				array( 'name' => 'responsive_size' ),
			));
		else :
			$style = ( isset( $atts['style']['style'] ) ) ? $atts['style']['style'] : 'style1';
			$style_atts = jevelin_get_picker( $atts['style'] );


			$size = ( isset( $atts['size']['size'] ) ) ? $atts['size']['size'] : 'default';
			$size_atts = jevelin_get_picker( $atts['size'] );
		endif;
		ob_start(); ?>

			<?php if( $margin ) : ?>
				#heading-<?php echo esc_attr( $id ); ?>  {
					margin: <?php echo esc_attr( $margin ); ?>;
				}
			<?php endif; ?>

			<?php if( $margin_responsive ) : ?>
				@media (max-width: 800px) {
					#heading-<?php echo esc_attr( $id ); ?> {
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


			<?php if( $font_bold_weight != 'default' ) : ?>
				#heading-<?php echo esc_attr( $id ); ?> .sh-heading-content strong,
				#heading-<?php echo esc_attr( $id ); ?> .sh-heading-additional-text strong {
					font-weight: <?php echo esc_attr( $font_bold_weight ); ?>!important;
				}
			<?php endif; ?>


			#heading-<?php echo esc_attr( $id ); ?> .sh-heading-content {
				<?php if( !empty( $size_atts['desktop_size'] ) ) : ?>
					font-size: <?php echo jevelin_addpx( $size_atts['desktop_size'] ); ?>;
				<?php endif; ?>

				<?php if( $line_height ) : ?>
					line-height: <?php echo jevelin_addpx( $line_height ); ?>!important;
				<?php endif; ?>

				<?php if( $letter_spacing ) : ?>
					letter-spacing: <?php echo jevelin_addpx( $letter_spacing ); ?>;
				<?php endif; ?>

				<?php if( $weight != '100' ) : ?>
					font-weight: <?php echo esc_attr( $weight ); ?>!important;
				<?php endif; ?>

				<?php if( $text_color ) : ?>
					color: <?php echo esc_attr( $text_color ); ?>;
				<?php endif; ?>

				<?php if( isset( $style_atts['background_color'] ) && $style_atts['background_color'] ) : ?>
					background-color: <?php echo esc_attr( $style_atts['background_color'] ); ?>;
				<?php endif; ?>

				<?php if( isset( $style_atts['background_image'] ) && $style_atts['background_image'] ) : ?>
					background-image: url(<?php echo ( $style_atts['background_image'] && !is_array( $style_atts['background_image'] ) ) ? jevelin_get_small_thumb($style_atts['background_image'],'large') : jevelin_get_image_size($style_atts['background_image'],'large'); ?>);
				<?php endif; ?>
			}

			<?php if( $hover_color ) : ?>
				<?php if( $hover_element == 'section') : ?>
					.vc_row:hover #heading-<?php echo esc_attr( $id ); ?> .sh-heading-content,
					.sh-section:hover #heading-<?php echo esc_attr( $id ); ?> .sh-heading-content {
				<?php elseif( $hover_element == 'column') : ?>
					.vc_column_container:hover > div > div > #heading-<?php echo esc_attr( $id ); ?> .sh-heading-content,
					.sh-column:hover #heading-<?php echo esc_attr( $id ); ?> .sh-heading-content {
				<?php else : ?>
					#heading-<?php echo esc_attr( $id ); ?>:hover .sh-heading-content {
				<?php endif; ?>
					color: <?php echo esc_attr( $hover_color ); ?>;
				}
			<?php endif; ?>


			<?php if( $font == 'additional1' || $font == 'additional2' || $font == 'body' ) : ?>
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
			<?php endif; ?>

			<?php if( $font_bold == 'additional1' || $font_bold == 'additional2' || $font_bold == 'body' ) : ?>
				#heading-<?php echo esc_attr( $id ); ?> .sh-heading-content strong,
				#heading-<?php echo esc_attr( $id ); ?> .sh-heading-additional-text strong {
					<?php if( $font_bold == 'additional1' ) : ?>
						font-family: '<?php echo jevelin_option_value('additional_font1','family'); ?>'!important;
					<?php elseif( $font_bold == 'additional2' ) : ?>
						font-family: '<?php echo jevelin_option_value('additional_font2','family'); ?>'!important;
					<?php elseif( $font_bold == 'body' ) : ?>
						font-family: '<?php echo jevelin_option_value('styling_body','family'); ?>'!important;
					<?php else : ?>
					<?php endif; ?>

				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:heading','jevelin_shortcode_heading_css');
endif;
?>
