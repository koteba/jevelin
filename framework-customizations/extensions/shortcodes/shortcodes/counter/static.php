<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_counter_css' ) ) :
	function jevelin_shortcode_counter_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'counter' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$title_size = ( isset( $atts['title_size'] ) ) ? $atts['title_size'] : '';
		$icon_color = ( isset( $atts['icon_color'] ) ) ? $atts['icon_color'] : '';
		$number_symbol = ( isset( $atts['number_symbol'] ) ) ? $atts['number_symbol'] : '';
		$number_weight = ( isset( $atts['number_weight'] ) ) ? $atts['number_weight'] : '700';
		$number_color = ( isset( $atts['number_color'] ) ) ? $atts['number_color'] : '';
		$font = ( isset( $atts['font'] ) ) ? $atts['font'] : 'body';
		$title_color = ( isset( $atts['title_color'] ) ) ? $atts['title_color'] : '';
		$subtitle_color = ( isset( $atts['subtitle_color'] ) ) ? $atts['subtitle_color'] : '';

		/* If Visual Composer */
		if( !isset( $atts['id'] ) ) :
			$style = ( isset( $atts['style'] ) ) ? $atts['style'] : 'style1';
			$style_atts = jevelin_vc_option_picker( $atts, array(
				array( 'name' => 'divider_color', 'if' => in_array( $style, array( 'style2', 'style3' ) ), 'default' => '#ffffff' ),
				array( 'name' => 'divider_style', 'if' => in_array( $style, array( 'style6' ) ), 'default' => 'normal' ),
				array( 'name' => 'icon_border_color', 'if' => in_array( $style, array( 'style5', 'style6' ) ), 'default' => '#ffffff' ),
				array( 'name' => 'icon_background_color', 'if' => in_array( $style, array( 'style5' ) ), 'default' => '#ffffff' ),
			));

			$size = ( isset( $atts['number_size'] ) ) ? $atts['number_size'] : 'default';
			$size_atts = jevelin_vc_option_picker( $atts, array(
				array( 'name' => 'desktop_size' ),
				array( 'name' => 'responsive_size' ),
			));
		else :
			$style = ( isset( $atts['style']['style'] ) ) ? $atts['style']['style'] : 'style1';
			$style_atts = jevelin_get_picker( $atts['style'] );

			$size = ( isset( $atts['number_size']['number_size'] ) ) ? esc_attr($atts['number_size']['number_size']) : 'default';
			$size_atts = jevelin_get_picker( $atts['number_size'] );
		endif;
		ob_start(); ?>

			<?php if( $number_symbol ) : ?>
				#counter-<?php echo esc_attr( $id ); ?> .sh-counter-number:after {
					content: "<?php echo esc_attr( str_replace( '"', '', $number_symbol ) ); ?>";
				}
			<?php endif; ?>

			<?php if( !empty( $size_atts['responsive_size'] ) ) : ?>
			@media (max-width: 1024px) {
				#counter-<?php echo esc_attr( $id ); ?> .sh-counter-number {
					font-size: <?php echo jevelin_addpx( $size_atts['responsive_size'] ); ?>!important;
				}
			}
			<?php endif; ?>

			<?php if( $title_size ) : ?>
			#counter-<?php echo esc_attr( $id ); ?> .sh-counter-title {
				font-size: <?php echo jevelin_addpx( $title_size ); ?>!important;
			}
			<?php endif; ?>

			<?php if( $icon_color ) : ?>
			#counter-<?php echo esc_attr( $id ); ?> .sh-counter-icon {
				color: <?php echo esc_attr( $icon_color ); ?>;
			}
			<?php endif; ?>

			#counter-<?php echo esc_attr( $id ); ?> .sh-counter-number {
				font-weight: <?php echo esc_attr( $number_weight ); ?>!important;
			}

			<?php if( !empty( $size_atts['desktop_size'] ) ) : ?>
			#counter-<?php echo esc_attr( $id ); ?> .sh-counter-number {
				font-size: <?php echo jevelin_addpx( $size_atts['desktop_size'] ); ?>;
			}
			<?php endif; ?>

			<?php if( $number_color ) : ?>
			#counter-<?php echo esc_attr( $id ); ?> .sh-counter-number {
				color: <?php echo esc_attr( $number_color ); ?>;
			}
			<?php endif; ?>

			<?php if( $title_size ) : ?>
			#counter-<?php echo esc_attr( $id ); ?> .sh-counter-title {
				font-size: <?php echo jevelin_addpx( $title_size ); ?>;
			}
			<?php endif; ?>

			<?php if( $title_color ) : ?>
			#counter-<?php echo esc_attr( $id ); ?> .sh-counter-title {
				color: <?php echo esc_attr( $title_color ); ?>;
			}
			<?php endif; ?>

			<?php if( $subtitle_color ) : ?>
			#counter-<?php echo esc_attr( $id ); ?> .sh-counter-subtitle {
				color: <?php echo esc_attr( $subtitle_color ); ?>;
			}
			<?php endif; ?>

			<?php if( $style == 'style2' && isset($style_atts['divider_color']) && $style_atts['divider_color'] ) : ?>
			#counter-<?php echo esc_attr( $id ); ?>.sh-counter-style2 .sh-counter-divider {
				border-color: <?php echo esc_attr( $style_atts['divider_color'] ); ?>;
			}
			<?php endif; ?>

			<?php if( $style == 'style3' && isset($style_atts['divider_color']) && $style_atts['divider_color'] ) : ?>
			#counter-<?php echo esc_attr( $id ); ?>.sh-counter-style3 .text-left {
				border-color: <?php echo esc_attr( $style_atts['divider_color'] ); ?>;
			}
			<?php endif; ?>

			<?php if( $style == 'style5' && isset($style_atts['icon_border_color']) && $style_atts['icon_border_color'] ) : ?>
			#counter-<?php echo esc_attr( $id ); ?>.sh-counter-style5 .sh-counter-icon {
				border-color: <?php echo esc_attr( $style_atts['icon_border_color'] ); ?>;
			}
			<?php endif; ?>

			<?php if( $style == 'style5' && isset($style_atts['icon_background_color']) && $style_atts['icon_background_color'] ) : ?>
			#counter-<?php echo esc_attr( $id ); ?>.sh-counter-style5 .sh-counter-icon {
				background-color: <?php echo esc_attr( $style_atts['icon_background_color'] ); ?>;
			}
			<?php endif; ?>

			<?php if( $style == 'style6' && isset($style_atts['divider_color']) && $style_atts['divider_color'] ) : ?>
			#counter-<?php echo esc_attr( $id ); ?>.sh-counter-style6 .sh-counter-divider {
				border-color: <?php echo esc_attr( $style_atts['divider_color'] ); ?>;
			}
			<?php endif; ?>

			<?php if( $style == 'style6' && isset($style_atts['divider_style']) && $style_atts['divider_style'] ) : ?>
			#counter-<?php echo esc_attr( $id ); ?>.sh-counter-style6 .sh-counter-divider {
				border-style: <?php echo esc_attr( $style_atts['divider_style'] ); ?>;
			}
			<?php endif; ?>

			#counter-<?php echo esc_attr( $id ); ?> .sh-counter-number {
				<?php if( $font == 'additional1' ) : ?>
					font-family: '<?php echo jevelin_option_value('additional_font1','family'); ?>'!important;
				<?php elseif( $font == 'additional2' ) : ?>
					font-family: '<?php echo jevelin_option_value('additional_font2','family'); ?>'!important;
				<?php elseif( $font == 'body' ) : ?>
					font-family: '<?php echo jevelin_option_value('styling_body','family'); ?>'!important;
				<?php elseif( $font == 'heading' ) : ?>
					font-family: '<?php echo jevelin_option_value('styling_headings','family'); ?>'!important;
				<?php endif; ?>
			}


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:counter','jevelin_shortcode_counter_css');
endif;
?>
