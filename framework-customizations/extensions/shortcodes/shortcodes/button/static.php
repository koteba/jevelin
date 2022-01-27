<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_button_css' ) ) :
	function jevelin_shortcode_button_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'button' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$style = ( isset( $atts['style'] ) ) ? $atts['style'] : '1';
		$font_size = ( isset( $atts['font_size'] ) ) ? $atts['font_size'] : '';
		$icon_size = ( isset( $atts['icon_size'] ) ) ? $atts['icon_size'] : '';
		$font_weight = ( isset( $atts['font_weight'] ) ) ? $atts['font_weight'] : '700';
		$radius = ( isset( $atts['radius'] ) ) ? $atts['radius'] : '0';
		$background_color = ( isset( $atts['background_color'] ) ) ? $atts['background_color'] : '#3f3f3f';
		$text_color = ( isset( $atts['text_color'] ) ) ? $atts['text_color'] : '#ffffff';
		$border_hover_color = ( isset( $atts['border_hover_color'] ) ) ? $atts['border_hover_color'] : '';
		$border_color = ( isset( $atts['border_color'] ) ) ? $atts['border_color'] : '';
		$image = ( isset( $atts['image'] ) ) ? $atts['image'] : '';
		$shadow = ( isset( $atts['shadow'] ) ) ? $atts['shadow'] : 'none';
		$full = ( isset( $atts['full'] ) ) ? $atts['full'] : '';
		$height = ( isset( $atts['height'] ) ) ? $atts['height'] : '';
		$line_height = ( isset( $atts['line_height'] ) ) ? $atts['line_height'] : '';
		$leftright_padding = ( isset( $atts['leftright_padding'] ) ) ? $atts['leftright_padding'] : '';
		$alignment = ( isset( $atts['alignment'] ) ) ? $atts['alignment'] : 'left';
		$margin = ( isset( $atts['margin'] ) ) ? $atts['margin'] : '';
		$background_hover_color = ( isset( $atts['background_hover_color'] ) ) ? $atts['background_hover_color'] : '';
		$text_hover_color = ( isset( $atts['text_hover_color'] ) ) ? $atts['text_hover_color'] : '';
		$tale = ( isset( $atts['tale'] ) ) ? $atts['tale'] : 'none';
		$alignment_mobile = ( isset( $atts['alignment_mobile'] ) ) ? $atts['alignment_mobile'] : 'center';
		$border_size = ( isset( $atts['border_size'] ) ) ? $atts['border_size'] : '2';
		ob_start(); ?>



			<?php if( $icon_size ) : ?>
				#button-<?php echo esc_attr( $id ); ?> .sh-button-icon i {
					font-size: <?php echo jevelin_addpx( $icon_size ); ?>;
				}
			<?php endif; ?>


			<?php if( $font_weight && $font_weight != 700 ) : ?>
				#button-<?php echo esc_attr( $id ); ?> .sh-button-text {
					font-weight: <?php echo esc_attr( $font_weight ); ?>;
				}
			<?php endif; ?>


			#button-<?php echo esc_attr( $id ); ?> .sh-button {
				<?php if( $height ) : ?>
					line-height: <?php echo jevelin_addpx( $height ); ?>;
					height: <?php echo jevelin_addpx( $height ); ?>;
					padding-top: 0;
				    padding-bottom: 0;
				<?php endif; ?>

				<?php if( $line_height ) : ?>
					line-height: <?php echo jevelin_addpx( $line_height ); ?>;
					padding-top: 0;
				    padding-bottom: 0;
				<?php elseif( $height ) : ?>
					line-height: <?php echo jevelin_addpx( $height ); ?>;
				<?php endif; ?>

				<?php if( $leftright_padding ) : ?>
					padding-left: <?php echo jevelin_addpx( $leftright_padding ); ?>;
				    padding-right: <?php echo jevelin_addpx( $leftright_padding ); ?>;
				<?php endif; ?>

				<?php if( $font_size ) : ?>
					font-size: <?php echo jevelin_addpx( $font_size ); ?>;
				<?php endif; ?>

				<?php if( $radius ) : ?>
					border-radius: <?php echo jevelin_addpx( $radius ); ?>;
				<?php endif; ?>

				<?php if( $background_color ) : ?>
					background-color: <?php echo esc_attr( $background_color ); ?>;
				<?php endif; ?>

				<?php if( $text_color ) : ?>
					color: <?php echo esc_attr( $text_color ); ?>;
				<?php endif; ?>

				<?php if( $border_hover_color ) : ?>
					border: 2px solid transparent;
				<?php endif; ?>

				<?php if( $border_color ) : ?>
					border: <?php echo esc_attr( $border_size ); ?>px solid <?php echo esc_attr( $border_color ); ?>;
				<?php endif; ?>

				<?php if( $image ) : ?>
					background-image: url( <?php echo ( $image && !is_array( $image ) ) ? jevelin_get_small_thumb( $image ) : jevelin_get_image_size( $image ); ?> );
				<?php endif; ?>

				<?php if( $shadow == 'simple' ) : ?>
					box-shadow: 0px 3px 0px rgba(0,0,0,0.15);
				<?php elseif( $shadow == 'far' ) : ?>
					box-shadow: 0px 3px 10px rgba(0,0,0,0.25);
				<?php elseif( $shadow && $shadow == 'extrafar' ) : ?>
					box-shadow: 0 6px 40px rgba(0,0,0,0.25);
				<?php elseif( $shadow && $shadow == 'near' ) : ?>
					box-shadow: 0px 2px 2px rgba(0,0,0,0.15);
				<?php endif; ?>

				<?php if( $full == true ) : ?>
					display: block!important;
					width: 100%;
				<?php endif; ?>
			}

			#button-<?php echo esc_attr( $id ); ?>  {
				<?php if( $alignment == 'center' ) : ?>
					text-align: center;
				<?php elseif( $alignment == 'right' ) : ?>
					text-align: right;
				<?php endif; ?>
			}

			<?php if( $margin ) : ?>
				#button-<?php echo esc_attr( $id ); ?> .sh-element-margin {
					margin: <?php echo esc_attr( $margin ); ?>;
				}
			<?php endif; ?>

			#button-<?php echo esc_attr( $id ); ?>:not(.sh-button-style-2) .sh-button:hover {
				<?php if( $background_hover_color ) : ?>
					background-color: <?php echo esc_attr( $background_hover_color ); ?>;
				<?php endif; ?>

				<?php if( $text_hover_color ) : ?>
					color: <?php echo esc_attr( $text_hover_color ); ?>;
				<?php endif; ?>

				<?php if( $border_hover_color ) : ?>
					border: <?php echo esc_attr( $border_size ); ?>px solid <?php echo esc_attr( $border_hover_color ); ?>;
				<?php endif; ?>
			}

			#button-<?php echo esc_attr( $id ); ?>.sh-button-style-2 .sh-button:after {
				<?php if( $background_hover_color ) : ?>
					background-color: <?php echo esc_attr( $background_hover_color ); ?>;
				<?php endif; ?>
			}

			#button-<?php echo esc_attr( $id ); ?>.sh-button-style-2 .sh-button:hover {
				<?php if( $text_hover_color ) : ?>
					color: <?php echo esc_attr( $text_hover_color ); ?>;
				<?php endif; ?>

				<?php if( $border_hover_color ) : ?>
					border: <?php echo esc_attr( $border_size ); ?>px solid <?php echo esc_attr( $border_hover_color ); ?>;
				<?php endif; ?>
			}

			<?php if( $tale != 'none' ) : ?>
				#button-<?php echo esc_attr( $id ); ?>  .sh-button-tale {
					<?php if( $background_color ) : ?>
						border-top-color: <?php echo esc_attr( $background_color ); ?>;
					<?php endif; ?>
				}

				#button-<?php echo esc_attr( $id ); ?>:hover  .sh-button-tale {
					<?php if( $background_hover_color ) : ?>
						border-top-color: <?php echo esc_attr( $background_hover_color ); ?>;
					<?php endif; ?>
				}
			<?php endif; ?>


			<?php if( $border_color && $style == 3 ) : ?>
				#button-<?php echo esc_attr($id); ?> .sh-button-icon-right:after,
				#button-<?php echo esc_attr($id); ?> .sh-button-icon-left:after {
					border-color: <?php echo esc_attr( $border_color ); ?>!important;
				}
			<?php endif; ?>


			<?php if( $alignment_mobile == 'center' ) : ?>
				@media (max-width: 800px) {
					#button-<?php echo esc_attr($id); ?> {
						text-align: center;
					}
				}
			<?php endif; ?>

			<?php if( $alignment_mobile == 'right' ) : ?>
				@media (max-width: 800px) {
					#button-<?php echo esc_attr($id); ?> {
						text-align: right;
					}
				}
			<?php endif; ?>

			<?php if( $alignment_mobile == 'left' ) : ?>
				@media (max-width: 800px) {
					#button-<?php echo esc_attr($id); ?> {
						text-align: left;
					}
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:button','jevelin_shortcode_button_css');
endif;
?>
