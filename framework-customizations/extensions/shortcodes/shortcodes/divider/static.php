<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_divider_css' ) ) :
	function jevelin_shortcode_divider_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data, 'divider' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$height = ( isset( $atts['height'] ) ) ? $atts['height'] : '1px';
		$height = ( is_numeric( $height ) ) ? esc_attr( $height ).'px' : esc_attr( $height );

		/* If Visual Composer */
		if( !isset( $atts['id'] ) ) :
			$content = ( isset( $atts['contentlayout'] ) ) ? $atts['contentlayout'] : 'none';
			$content_atts = jevelin_vc_option_picker( $atts, array(
				array( 'name' => 'icon' ),
				array( 'name' => 'icon_color', 'if' => in_array( $content, array( 'icon_option' ) ), 'default' => '#cccccc' ),
				array( 'name' => 'icon_multiplier', 'if' => in_array( $content, array( 'icon_option' ) ), 'default' => '1' ),
				array( 'name' => 'icon_size' ),
				array( 'name' => 'title', 'if' => in_array( $content, array( 'title_option' ) ), 'default' => 'Lorem ipsum dolor sit amet' ),
				array( 'name' => 'font', 'if' => in_array( $content, array( 'title_option', 'title_box_option' ) ), 'default' => 'heading' ),
				array( 'name' => 'title_color' ),
				array( 'name' => 'title_box', 'if' => in_array( $content, array( 'title_box_option' ) ), 'default' => '<p>Lorem ipsum dolor sit amet</p>' ),
				array( 'name' => 'title_background_color', 'if' => in_array( $content, array( 'title_box_option' ) ), 'default' => '#8d8d8d' ),
				array( 'name' => 'title_radius', 'if' => in_array( $content, array( 'title_box_option' ) ), 'default' => '0' ),
			));
			$width = ( isset( $atts['width'] ) ) ? $atts['width'] : 'full';
			$width_atts = jevelin_vc_option_picker( $atts, array(
				array( 'name' => 'fixed_width', 'if' => in_array( $width, array( 'fixed' ) ), 'default' => 30 ),
			));
		else :
			$content = jevelin_get_picker_value( $atts['content'], 'none' );
			$content_atts = jevelin_get_picker( $atts['content'] );
			$width_atts = jevelin_get_picker( $atts['width'] );
		endif;
		ob_start(); ?>


			#divider-<?php echo esc_attr( $id ); ?> {
				<?php if( isset( $atts['margin'] ) && $atts['margin'] ) : ?>
					margin: <?php echo esc_attr( $atts['margin'] ); ?>!important;
				<?php endif; ?>
			}

			<?php if( $content == 'none' ) : ?>
				#divider-<?php echo esc_attr( $id ); ?>.sh-divider-content-none .sh-divider-line {

					<?php if( isset($atts['radius']) && $atts['radius'] ) : ?>
						border-radius: <?php echo esc_attr($atts['radius']); ?>px;
					<?php endif; ?>

					<?php if( $height ) : ?>
						border-top-width: <?php echo  esc_attr( $height ); ?>;
					<?php endif; ?>

					<?php if( isset($atts['line_color']) && $atts['line_color'] ) : ?>
						border-top-color: <?php echo esc_attr( $atts['line_color'] ); ?>;
					<?php endif; ?>

					<?php if( isset($atts['type']) && $atts['type'] ) : ?>
						border-top-style: <?php echo esc_attr( $atts['type'] ); ?>;
					<?php endif; ?>

					<?php if( isset($width_atts['fixed_width']) && $width_atts['fixed_width'] ) : ?>
						max-width: <?php echo ( is_numeric( $width_atts['fixed_width'] ) ) ? intval( $width_atts['fixed_width'] ).'px' : esc_attr( $width_atts['fixed_width'] ); ?>;
					<?php endif; ?>
				}
			<?php else : ?>
				<?php if( isset($width_atts['fixed_width']) && $width_atts['fixed_width'] ) : ?>
					#divider-<?php echo esc_attr( $id ); ?> .sh-divider-content {
						<?php if( isset($width_atts['fixed_width']) && $width_atts['fixed_width'] ) : ?>
							max-width: <?php echo esc_attr( $width_atts['fixed_width'] ); ?>px;
						<?php endif; ?>
					}
				<?php endif; ?>

				#divider-<?php echo esc_attr( $id ); ?> .sh-divider-content:before,
				#divider-<?php echo esc_attr( $id ); ?> .sh-divider-content:after {
					<?php if( $height ) : ?>
						border-top-width: <?php echo esc_attr( $height ); ?>;
						margin-top: -<?php
							if( $height <= 5 ) :
								echo esc_attr( $height );
							else :
								echo ( esc_attr( $height ) / 2) + ( esc_attr( $height ) * 0.5 );
							endif;
						?>px;
					<?php endif; ?>

					<?php if( isset($atts['line_color']) && $atts['line_color'] ) : ?>
						border-top-color: <?php echo esc_attr( $atts['line_color'] ); ?>;
					<?php endif; ?>

					<?php if( isset($atts['type']) && $atts['type'] ) : ?>
						border-top-style: <?php echo esc_attr( $atts['type'] ); ?>;
					<?php endif; ?>
				}
			<?php endif; ?>

			<?php if( $content == 'title_option' ) : ?>
				#divider-<?php echo esc_attr( $id ); ?> .sh-divider-title {
					<?php if( isset($content_atts['title_color']) && $content_atts['title_color'] ) : ?>
						color: <?php echo esc_attr($content_atts['title_color']); ?>;
					<?php endif; ?>
				}
			<?php elseif( $content == 'title_box_option' ) : ?>
				#divider-<?php echo esc_attr( $id ); ?> .sh-divider-title-box {
					<?php if( isset($content_atts['title_color']) && $content_atts['title_color'] ) : ?>
						color: <?php echo esc_attr($content_atts['title_color']); ?>;
					<?php endif; ?>

					<?php if( isset($content_atts['title_background_color']) && $content_atts['title_background_color'] ) : ?>
						background-color: <?php echo esc_attr($content_atts['title_background_color']); ?>;
					<?php endif; ?>

					<?php if( isset($content_atts['title_radius']) && $content_atts['title_radius'] ) : ?>
						border-radius: <?php echo esc_attr($content_atts['title_radius']); ?>px;
					<?php endif; ?>
				}
			<?php elseif( $content == 'icon_option' ) : ?>
				#divider-<?php echo esc_attr( $id ); ?> .sh-divider-icon {
					<?php if( isset($content_atts['icon_color']) && $content_atts['icon_color'] ) : ?>
						color: <?php echo esc_attr($content_atts['icon_color']); ?>;
					<?php endif; ?>

					<?php if( isset( $content_atts['icon_size'] ) && $content_atts['icon_size'] ) : ?>
						font-size: <?php echo jevelin_addpx( $content_atts['icon_size'] ); ?>;
					<?php endif; ?>
				}
			<?php endif; ?>

			<?php if( isset($content_atts['font']) && ( $content_atts['font'] == 'additional1' || $content_atts['font'] == 'additional2' || $content_atts['font'] == 'body' ) ) : ?>
				#divider-<?php echo esc_attr( $id ); ?> .sh-divider-title,
				#divider-<?php echo esc_attr( $id ); ?> .sh-divider-title-box {

					<?php if( $content_atts['font'] == 'additional1' ) : ?>
						font-family: '<?php echo jevelin_option_value('additional_font1','family'); ?>'!important;
					<?php elseif( $content_atts['font'] == 'additional2' ) : ?>
						font-family: '<?php echo jevelin_option_value('additional_font2','family'); ?>'!important;
					<?php elseif( $content_atts['font'] == 'body' ) : ?>
						font-family: '<?php echo jevelin_option_value('styling_body','family'); ?>'!important;
					<?php endif; ?>

				}
			<?php endif; ?>

		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:divider','jevelin_shortcode_divider_css');
endif;
?>
