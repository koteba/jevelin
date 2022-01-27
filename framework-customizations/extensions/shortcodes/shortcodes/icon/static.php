<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_icon_css' ) ) :
	function jevelin_shortcode_icon_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data, 'icon' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$shadow = ( isset( $atts['shadow'] ) ) ? $atts['shadow'] : 'none';
		$icon_size = ( isset( $atts['icon_size'] ) ) ? $atts['icon_size'] : '30px';
		$icon_line_height = ( isset( $atts['icon_line_height'] ) ) ? $atts['icon_line_height'] : '';
		$icon_color = ( isset( $atts['icon_color'] ) ) ? $atts['icon_color'] : '';
		$icon_second_color = ( isset( $atts['icon_second_color'] ) ) ? $atts['icon_second_color'] : '';
		$icon_hover_color = ( isset( $atts['icon_hover_color'] ) ) ? $atts['icon_hover_color'] : '';
		$icon_hover_second_color = ( isset( $atts['icon_hover_second_color'] ) ) ? $atts['icon_hover_second_color'] : '';
		$margin = ( isset( $atts['margin'] ) ) ? $atts['margin'] : '';

		$box_border_width = ( isset( $atts['box_border_width'] ) ) ? $atts['box_border_width'] : '0px';
		$box_border_color = ( isset( $atts['box_border_color'] ) ) ? $atts['box_border_color'] : '';
		$box_border_hover_color = ( isset( $atts['box_border_hover_color'] ) ) ? $atts['box_border_hover_color'] : '';

		$box_status = ( isset( $atts['box_status'] ) ) ? $atts['box_status'] : 'disabled';
		$box_background_color = ( isset( $atts['box_background_color'] ) ) ? $atts['box_background_color'] : '#fafafa';
		$box_background_hover_color = ( isset( $atts['box_background_hover_color'] ) ) ? $atts['box_background_hover_color'] : '';
		$box_border_radius = ( isset( $atts['box_border_radius'] ) ) ? $atts['box_border_radius'] : '5px';
		$box_padding = ( isset( $atts['box_padding'] ) ) ? $atts['box_padding'] : '10px 10px 10px 10px';
		$box_size = ( isset( $atts['box_size'] ) ) ? $atts['box_size'] : '';
		ob_start(); ?>



			<?php if( $box_status == 'enabled' ) : ?>
				#icon-<?php echo esc_attr( $id ); ?> .sh-icon-container {
					transition: all 0.4s ease-in-out;
					<?php if( $box_background_color ) : ?>
						background-color: <?php echo esc_attr( $box_background_color ); ?>;
					<?php endif; ?>

					<?php if( $box_border_radius ) : ?>
						border-radius: <?php echo esc_attr( $box_border_radius ); ?>;
					<?php endif; ?>

					<?php if( $box_padding ) : ?>
						padding: <?php echo esc_attr( $box_padding ); ?>;
					<?php elseif( $box_size ) : ?>
						text-align: center;
						width: <?php echo jevelin_addpx( $box_size ); ?>;
						height: <?php echo jevelin_addpx( $box_size ); ?>;
						line-height: <?php echo jevelin_addpx( $box_size ); ?>;
					<?php endif; ?>

					<?php if( $box_border_width != '0px' && $box_border_width && $box_border_color ) : ?>
						border: <?php echo jevelin_addpx( $box_border_width ); ?> solid <?php echo esc_attr( $box_border_color ); ?>;
					<?php endif; ?>
				}

				<?php if( $box_border_hover_color ) : ?>
					#icon-<?php echo esc_attr( $id ); ?> .sh-icon-container:hover {
						border-color: <?php echo esc_attr( $box_border_hover_color ); ?>;
					}
				<?php endif; ?>

				<?php if( $box_background_hover_color ) : ?>
					#icon-<?php echo esc_attr( $id ); ?> .sh-icon-container:hover {
						background-color: <?php echo esc_attr( $box_background_hover_color ); ?>;
					}
				<?php endif; ?>
			<?php endif; ?>


			<?php if( $icon_line_height || $icon_size || $icon_color ) : ?>
				#icon-<?php echo esc_attr( $id ); ?> .sh-icon-data {
					<?php if( $icon_line_height ) : ?>
						line-height: <?php echo jevelin_addpx( $icon_line_height ); ?>;
					<?php endif; ?>

					<?php if( $icon_size ) : ?>
						font-size: <?php echo jevelin_addpx( $icon_size ); ?>;
					<?php endif; ?>

					<?php if( $icon_color ) : ?>
						color: <?php echo esc_attr( $icon_color ); ?>;
					<?php endif; ?>
				}
			<?php endif; ?>

			<?php if( $icon_hover_color ) : ?>
				#icon-<?php echo esc_attr( $id ); ?>:hover .sh-icon-data {
					color: <?php echo esc_attr( $icon_hover_color ); ?>;
				}
			<?php endif; ?>

			<?php if( $shadow != 'none' ) : ?>
				#icon-<?php echo esc_attr( $id ); ?> .sh-icon-data {
					<?php if( $shadow == 'small' ) : ?>
						text-shadow: 0px 2px 10px rgb(25, 25, 25);
					<?php else : ?>
						text-shadow: 0px 5px 35px rgb(15, 15, 15);
					<?php endif; ?>
				}
			<?php endif; ?>

			<?php if( $icon_second_color && $icon_color ) : ?>
				#icon-<?php echo esc_attr( $id ); ?> .sh-icon-data {
					background: -webkit-linear-gradient(45deg, <?php echo esc_attr( $icon_color ); ?>, <?php echo esc_attr( $icon_second_color ); ?>);
				    -webkit-background-clip: text;
				    -webkit-text-fill-color: transparent;
				}
			<?php endif; ?>

			<?php if( $icon_hover_second_color && $icon_hover_color ) : ?>
				#icon-<?php echo esc_attr( $id ); ?> .sh-icon-data:hover {
					background: -webkit-linear-gradient(45deg, <?php echo esc_attr( $icon_hover_color ); ?>, <?php echo esc_attr( $icon_hover_second_color ); ?>);
				    -webkit-background-clip: text;
				    -webkit-text-fill-color: transparent;
				}
			<?php endif; ?>

			<?php if( $margin ) : ?>
				#icon-<?php echo esc_attr( $id ); ?> .sh-element-margin {
					margin: <?php echo esc_attr( $margin ); ?>;
				}
			<?php endif; ?>

		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:icon','jevelin_shortcode_icon_css');
endif;
?>
