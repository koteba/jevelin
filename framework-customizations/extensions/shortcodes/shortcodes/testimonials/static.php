<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_testimonials_css' ) ) :
	function jevelin_shortcode_testimonials_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'testimonials' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];

		$color_heading = ( isset( $atts['color_heading'] ) ) ? $atts['color_heading'] : '';
		$color_job = ( isset( $atts['color_job'] ) ) ? $atts['color_job'] : '';
		$style = ( isset( $atts['style'] ) ) ? $atts['style'] : 'style1';
		$color_text = ( isset( $atts['color_text'] ) ) ? $atts['color_text'] : '';
		$color_switch = ( isset( $atts['color_switch'] ) ) ? $atts['color_switch'] : '';
		$color_quote = ( isset( $atts['color_quote'] ) ) ? $atts['color_quote'] : '';
		$line_text = ( isset( $atts['line_text'] ) ) ? $atts['line_text'] : '';
		$color_accent = ( isset( $atts['color_accent'] ) ) ? $atts['color_accent'] : '';
		$description_size = ( isset( $atts['description_size'] ) ) ? $atts['description_size'] : '';
		$description_styles = ( isset( $atts['description_styles'] ) ) ? $atts['description_styles'] : '';

		ob_start(); ?>


			<?php if( $color_heading ) : ?>
				#testimonials-<?php echo esc_attr( $id ); ?> .sh-testimonials-name h3 {
					color: <?php echo esc_attr( $color_heading ); ?>;
				}
			<?php endif; ?>

			<?php if( $color_job ) : ?>
				#testimonials-<?php echo esc_attr( $id ); ?> .sh-testimonials-job {
					color: <?php echo esc_attr( $color_job ); ?>;
				}
			<?php endif; ?>

			<?php if( !$color_job && $style == 'style5' ) : ?>

				#testimonials-<?php echo esc_attr( $id ); ?> .sh-testimonials-job {
					color: <?php echo esc_attr( jevelin_option('accent_color') ); ?>;
				}

			<?php endif; ?>

			<?php if( $color_text ) : ?>
				#testimonials-<?php echo esc_attr( $id ); ?> .sh-testimonials-quote-icon i,
				#testimonials-<?php echo esc_attr( $id ); ?> .sh-testimonials-quote,
				#testimonials-<?php echo esc_attr( $id ); ?>.sh-testimonials-style2 .sh-testimonials-quote:after,
				#testimonials-<?php echo esc_attr( $id ); ?>.sh-testimonials-style2 .sh-testimonials-quote:before {
					color: <?php echo esc_attr( $color_text ); ?>;
				}
			<?php endif; ?>

			<?php if( $color_switch ) : ?>
				#testimonials-<?php echo esc_attr( $id ); ?> .sh-testimonials-switch > div {
					border-color: <?php echo esc_attr( $color_switch ); ?>;
				}
				#testimonials-<?php echo esc_attr( $id ); ?> .sh-testimonials-switch i {
					color: <?php echo esc_attr( $color_switch ); ?>;
				}
			<?php endif; ?>

			<?php if( $color_quote ) : ?>
				#testimonials-<?php echo esc_attr( $id ); ?> .sh-testimonials-quote:before,
				#testimonials-<?php echo esc_attr( $id ); ?> .sh-testimonials-quote:after {
					color: <?php echo esc_attr( $color_quote ); ?>!important;
				}
			<?php endif; ?>

			<?php if( $line_text ) : ?>
				#testimonials-<?php echo esc_attr( $id ); ?>.sh-testimonials-style3 .sh-testimonials-item-container,
				#testimonials-<?php echo esc_attr( $id ); ?>.sh-testimonials-style4 .sh-testimonials-table-icon {
					border-color: <?php echo esc_attr( $line_text ); ?>!important;
				}
			<?php endif; ?>

			#testimonials-<?php echo esc_attr( $id ); ?> .sh-testimonials-container:hover .sh-testimonials-bottom,
			#testimonials-<?php echo esc_attr( $id ); ?> .sh-testimonials-top {
				background-color: <?php echo ( $color_accent ) ? esc_attr( $color_accent ) : esc_attr( jevelin_option('accent_color') ); ?>;
			}

			#testimonials-<?php echo esc_attr( $id ); ?> .sh-testimonials-quote {


				<?php if( isset($description_styles['bold']) && $description_styles['bold'] == true ) : ?>
					font-weight: bold;
				<?php endif; ?>

				<?php if( isset($description_styles['italic']) && $description_styles['italic'] == true ) : ?>
					font-style: italic;
				<?php endif; ?>

				<?php if( isset($description_styles['underline']) && $description_styles['underline'] == true ) : ?>
					text-decoration: underline;
				<?php endif; ?>

				<?php if( $description_size ) : ?>
					font-size: <?php echo jevelin_addpx( $description_size ); ?>;
				<?php endif; ?>


				<?php if( isset( $description_styles ) && !is_array( $description_styles ) && $description_styles ) : ?>
					<?php if( $description_styles == 'bold' ) : ?>
						font-weight: bold;
					<?php endif; ?>

					<?php if( $description_styles == 'italic' ) : ?>
						font-style: italic;
					<?php endif; ?>

					<?php if( $description_styles == 'underline' ) : ?>
						text-decoration: underline;
					<?php endif; ?>
				<?php endif; ?>
			}

			<?php if( $style == 'style6' && jevelin_option('accent_color') ) : ?>
				#testimonials-<?php echo esc_attr( $id ); ?>.sh-testimonials-style6 .sh-testimonials-quote-icon-container {
					background-color: <?php echo esc_attr( jevelin_option('accent_color') ); ?>;
				}
			<?php endif; ?>

		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:testimonials','jevelin_shortcode_testimonials_css');
endif;
?>
