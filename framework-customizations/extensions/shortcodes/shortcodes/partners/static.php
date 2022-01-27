<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_partners_css' ) ) :
	function jevelin_shortcode_partners_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'partners' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$columns = ( isset( $atts['columns'] ) ) ? $atts['columns'] : '5';
		$line = ( isset( $atts['line'] ) ) ? $atts['line'] : false;

		$opacity = ( isset( $atts['opacity'] ) ) ? $atts['opacity'] : '';
		$opacity_hover = ( isset( $atts['opacity_hover'] ) ) ? $atts['opacity_hover'] : '75';
		ob_start(); ?>


			<?php if( is_numeric( $opacity ) && $opacity <= 100 ) : ?>
				#partners-<?php echo esc_attr( $id ); ?> img {
					opacity: <?php echo esc_attr( $opacity / 100 ); ?>!important;
				}
			<?php endif; ?>

			<?php if( is_numeric( $opacity_hover ) && $opacity_hover <= 100 ) : ?>
				#partners-<?php echo esc_attr( $id ); ?> a img:hover {
					opacity: <?php echo esc_attr( $opacity_hover / 100 ); ?>!important;
				}
			<?php endif; ?>

			<?php if( $columns > 0 ) : ?>
				#partners-<?php echo esc_attr( $id ); ?> .sh-partners-item {
					width: <?php
						if( $columns == '1') :
							echo '100';
						elseif( $columns == '2') :
							echo '50';
						elseif( $columns == '3') :
							echo '33';
						elseif( $columns == '4') :
							echo '25';
						elseif( $columns == '6') :
							echo '16.6666666667';
						else :
							echo '20';
						endif;
					?>%;
				}
			<?php endif; ?>

			<?php if( $columns > 3 ) : ?>
				@media (max-width: 1000px) {

					#partners-<?php echo esc_attr( $id ); ?> .sh-partners-item {
						width: 33%;
					}

				}
			<?php endif; ?>

			<?php if( $columns > 2 ) : ?>
				@media (max-width: 850px) {

					#partners-<?php echo esc_attr( $id ); ?> .sh-partners-item {
						width: 50%;
					}

				}
			<?php endif; ?>


			<?php if( $line == true ) : ?>
				#partners-<?php echo esc_attr( $id ); ?> .slick-slide:not(:last-child) {
					border-right: 1px solid rgba(0,0,0,0.08);
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:partners','jevelin_shortcode_partners_css');
endif;
?>
