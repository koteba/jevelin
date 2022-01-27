<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_heading_animation_css' ) ) :
	function jevelin_shortcode_heading_animation_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data, 'heading-animation' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$margin = ( isset( $atts['margin'] ) ) ? $atts['margin'] : '';
		$line_height = ( isset( $atts['line_height'] ) ) ? $atts['line_height'] : '';
		$color = ( isset( $atts['color'] ) ) ? $atts['color'] : '';
		$fixed_color = ( isset( $atts['fixed_color'] ) ) ? $atts['fixed_color'] : '';
		$font = ( isset( $atts['font'] ) ) ? $atts['font'] : 'heading';
		$alignment = ( isset( $atts['alignment'] ) ) ? $atts['alignment'] : 'left';

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


			<?php if( $margin ) : ?>
				#heading-animated-<?php echo esc_attr( $id ); ?> {
					margin: <?php echo esc_attr( $margin ); ?>;
				}
			<?php endif; ?>

			<?php if( !empty( $size_atts['responsive_size'] ) ) : ?>
				@media (max-width: 1024px) {
					#heading-animated-<?php echo esc_attr( $id ); ?> .sh-heading-content {
						font-size: <?php echo jevelin_addpx( $size_atts['responsive_size'] ); ?>!important;
					}
				}
			<?php endif; ?>

			#heading-animated-<?php echo esc_attr( $id ); ?> .sh-heading-animated-content {
				<?php if( !empty( $size_atts['desktop_size'] ) ) : ?>
					font-size: <?php echo jevelin_addpx( $size_atts['desktop_size'] ); ?>;
				<?php endif; ?>

				<?php if( $line_height ) : ?>
					line-height: <?php echo jevelin_addpx( $line_height ); ?>!important;
				<?php endif; ?>

				<?php if( $alignment ) : ?>
					text-align: <?php echo esc_attr( $alignment ); ?>;
				<?php endif; ?>

				<?php if( $font == 'additional1' ) : ?>
					font-family: '<?php echo esc_attr( jevelin_option_value('additional_font1','family') ); ?>'!important;
				<?php elseif( $font == 'additional2' ) : ?>
					font-family: '<?php echo esc_attr( jevelin_option_value('additional_font2','family') ); ?>'!important;
				<?php elseif( $font == 'body' ) : ?>
					font-family: '<?php echo esc_attr( jevelin_option_value('styling_body','family') ); ?>'!important;
				<?php endif; ?>
			}

			<?php if( $color ) : ?>
				#heading-animated-<?php echo esc_attr( $id ); ?> .sh-heading-animated-typed,
				#heading-animated-<?php echo esc_attr( $id ); ?> .typed-cursor {
					color: <?php echo esc_attr( $color ); ?>;
				}
			<?php endif; ?>

			<?php if( $fixed_color ) : ?>
				#heading-animated-<?php echo esc_attr( $id ); ?> .sh-heading-animated-fixed {
					color: <?php echo esc_attr( $fixed_color ); ?>;
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:heading_animation','jevelin_shortcode_heading_animation_css');
endif;
?>
