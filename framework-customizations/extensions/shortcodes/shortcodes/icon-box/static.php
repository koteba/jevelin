<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_icon_box_css' ) ) :
	function jevelin_shortcode_icon_box_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'icon-box' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$color_title = ( isset( $atts['color_title'] ) ) ? $atts['color_title'] : '';
		$font_size = ( isset( $atts['font_size'] ) ) ? $atts['font_size'] : '16px';
		$weight = ( isset( $atts['weight'] ) ) ? $atts['weight'] : 'default';
		$font = ( isset( $atts['font'] ) ) ? $atts['font'] : 'heading';
		$alignment = ( isset( $atts['alignment'] ) ) ? $atts['alignment'] : 'center';
		$icon_size = ( isset( $atts['icon_size'] ) ) ? $atts['icon_size'] : '';
		$color_icon = ( isset( $atts['color_icon'] ) ) ? $atts['color_icon'] : '';
		$color_icon_hover = ( isset( $atts['color_icon_hover'] ) ) ? $atts['color_icon_hover'] : '';
		$color_text = ( isset( $atts['color_text'] ) ) ? $atts['color_text'] : '';
		$color_text_hover = ( isset( $atts['color_text_hover'] ) ) ? $atts['color_text_hover'] : '';
		$icon = ( isset( $atts['icon'] ) ) ? $atts['icon'] : '';

		/* If Visual Composer */
		if( !isset( $atts['id'] ) ) :
			$style = ( isset( $atts['style'] ) ) ? $atts['style'] : 'style1';
			$style_atts = jevelin_vc_option_picker( $atts, array(
				array( 'name' => 'icon', 'if' => in_array( $style, array( 'style1' ) ), 'default' => 'icon-like' ),
				array( 'name' => 'color_line' ),
				array( 'name' => 'shape', 'if' => in_array( $style, array( 'style7', 'style8', 'style9' ) ), 'default' => 'circle' ),
				array( 'name' => 'background_color' ),
			));
		else :
			$style = ( isset( $atts['style']['style'] ) && $atts['style']['style'] ) ? esc_attr($atts['style']['style']) : 'style1';
			$style_atts = jevelin_get_picker( $atts['style'] );
		endif;
		ob_start(); ?>


			#iconbox-<?php echo esc_attr( $id ); ?> .sh-iconbox-title h3 {
				<?php if( $color_title ) : ?>
					color: <?php echo esc_attr( $color_title ); ?>;
				<?php endif; ?>

				<?php if( $font_size ) : ?>
					font-size: <?php echo esc_attr( $font_size ); ?>;
				<?php endif; ?>

				<?php if( $weight != 'default' ) : ?>
					font-weight: <?php echo esc_attr( $weight ); ?>!important;
				<?php endif; ?>

				<?php if( $font == 'additional1' ) : ?>
					font-family: '<?php echo jevelin_option_value('additional_font1','family'); ?>'!important;
				<?php elseif( $font == 'additional2' ) : ?>
					font-family: '<?php echo jevelin_option_value('additional_font2','family'); ?>'!important;
				<?php elseif( $font == 'body' ) : ?>
					font-family: '<?php echo jevelin_option_value('styling_body','family'); ?>'!important;
				<?php endif; ?>
			}

			<?php if( $alignment == 'right' && $icon_size ) :
				$alignment_size = preg_replace("/[^0-9]/","", esc_attr( $icon_size ) );
				if( $alignment_size > 20 ) : ?>
					#iconbox-<?php echo esc_attr( $id ); ?>.sh-iconbox-right .sh-iconbox-aside {
						margin-right: <?php echo intval($alignment_size) * 0.2; ?>px;
					}
				<?php endif; ?>
			<?php endif; ?>

			<?php if( $alignment == 'left' && $icon_size ) :
				$alignment_size = preg_replace("/[^0-9]/","",$icon_size);
				if( $alignment_size > 20 ) : ?>
					#iconbox-<?php echo esc_attr( $id ); ?>.sh-iconbox-left .sh-iconbox-aside {
						margin-left: <?php echo intval($alignment_size) * 0.2; ?>px;
					}
				<?php endif; ?>
			<?php endif; ?>

			<?php if( isset($style_atts['color_line']) && $style_atts['color_line'] ) : ?>
				#iconbox-<?php echo esc_attr( $id ); ?>.sh-iconbox-style4 .sh-iconbox-seperator {
					background-color: <?php echo esc_attr( $style_atts['color_line'] ); ?>;
				}

				#iconbox-<?php echo esc_attr( $id ); ?>.sh-iconbox-style5 .sh-iconbox-title,
				#iconbox-<?php echo esc_attr( $id ); ?>.sh-iconbox-style1 .sh-iconbox-icon-shape,
				#iconbox-<?php echo esc_attr( $id ); ?>.sh-iconbox-style7 .sh-iconbox-icon-shape,
				#iconbox-<?php echo esc_attr( $id ); ?>.sh-iconbox-style10 .sh-iconbox-top {
					border-color: <?php echo esc_attr( $style_atts['color_line'] ); ?>;
				}

				#iconbox-<?php echo esc_attr( $id ); ?>.sh-iconbox-style1 .sh-iconbox-icon2 i {
					color: <?php echo esc_attr( $style_atts['color_line'] ); ?>;
				}
			<?php endif; ?>

			<?php if( isset($style_atts['background_color']) && $style_atts['background_color'] ) : ?>
				#iconbox-<?php echo esc_attr( $id ); ?>.sh-iconbox-style8 .sh-iconbox-icon-shape,
				#iconbox-<?php echo esc_attr( $id ); ?>.sh-iconbox-style9 .sh-iconbox-icon-shape {
					background-color: <?php echo esc_attr( $style_atts['background_color'] ); ?>;
				}
			<?php endif; ?>

			<?php if( $icon_size ) : ?>
				#iconbox-<?php echo esc_attr( $id ); ?> .sh-iconbox-hover {
					font-size: <?php echo esc_attr( $icon_size ); ?>;
				}

				<?php if( $alignment == 'left' ) : ?>

					<?php if( in_array($style, array( 'style2', 'style3', 'style4', 'style5', 'style6' )) ) : ?>
						#iconbox-<?php echo esc_attr( $id ); ?>.sh-iconbox-left .sh-iconbox-aside {
							padding-left: <?php echo esc_attr( intval( $icon_size ) ) + 30; ?>px;
						}
					<?php endif; ?>

				<?php elseif( $alignment == 'right' ) : ?>

					<?php if( in_array($style, array( 'style2', 'style3', 'style4', 'style5', 'style6' )) ) : ?>
						#iconbox-<?php echo esc_attr( $id ); ?>.sh-iconbox-right .sh-iconbox-aside {
							padding-right: <?php echo esc_attr( $icon_size ) + 30; ?>px;
						}
					<?php endif; ?>

				<?php endif; ?>
			<?php endif; ?>

			<?php if( $color_icon ) : ?>
				#iconbox-<?php echo esc_attr( $id ); ?> .sh-iconbox-hover {
					color: <?php echo esc_attr($color_icon); ?>;
				}

				#iconbox-<?php echo esc_attr( $id ); ?>.sh-iconbox-style6 .sh-iconbox-hover {
					text-shadow: -3px 2px <?php echo jevelin_hex2rgba( esc_attr($color_icon), 0.3 ); ?>;
				}
			<?php endif; ?>

			<?php if( $color_text ) : ?>
				#iconbox-<?php echo esc_attr( $id ); ?> .sh-iconbox-content {
					color: <?php echo esc_attr($color_text); ?>;
				}
			<?php endif; ?>

			<?php if( $color_icon_hover ) : ?>
				#iconbox-<?php echo esc_attr( $id ); ?>:hover .sh-iconbox-hover {
					color: <?php echo esc_attr($color_icon_hover); ?>;
				}
			<?php endif; ?>

			<?php if( $color_text_hover ) : ?>
				#iconbox-<?php echo esc_attr( $id ); ?>:hover .sh-iconbox-title h3 {
					color: <?php echo esc_attr($color_text_hover); ?>;
				}
			<?php endif; ?>

			<?php if( ( isset($style_atts['background_color']) && $style_atts['background_color'] ) || ( isset($style_atts['image_background']) && jevelin_get_image($style_atts['image_background']) ) ) : ?>
				#iconbox-<?php echo esc_attr( $id ); ?>:not(.sh-iconbox-style11),
				#iconbox-<?php echo esc_attr( $id ); ?>.sh-iconbox-style11 .sh-iconbox-container {
					<?php if( isset($style_atts['background_color']) && $style_atts['background_color'] ) : ?>
						background-color: <?php echo esc_attr( $style_atts['background_color'] ); ?>;
					<?php endif; ?>

					<?php if( isset( $style_atts['image_background'] ) ) : ?>
						background-image: url(<?php echo ( $style_atts['image_background'] && !is_array( $atts['image'] ) ) ? jevelin_get_small_thumb( $style_atts['image_background'], 'large' ) : jevelin_get_image( $style_atts['image_background'] ); ?>);
					<?php endif; ?>
				}
			<?php endif; ?>

			<?php if( !$atts['icon'] ) : ?>
				#iconbox-<?php echo esc_attr( $id ); ?> .sh-iconbox-aside {
					padding-left: 0px!important;
					padding-right: 0px!important;
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:icon_box','jevelin_shortcode_icon_box_css');
endif;
?>
