<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_icon_box_slider_css' ) ) :
	function jevelin_shortcode_icon_box_slider_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data, 'icon-box-slider' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$accent_color_val = ( isset( $atts['accent_color'] ) ) ? $atts['accent_color'] : '';
		$height = ( isset( $atts['height'] ) ) ? $atts['height'] : '600px';
		$slide_title_color = ( isset( $atts['slide_title_color'] ) ) ? $atts['slide_title_color'] : '';
		$slide_descr_color = ( isset( $atts['slide_descr_color'] ) ) ? $atts['slide_descr_color'] : '';

		ob_start(); ?>

			<?php
			$accent_color = ( esc_attr( $accent_color_val ) ) ? $accent_color_val : jevelin_option('accent_color');
			if( $accent_color ) : ?>

                #iconbox-slider-<?php echo esc_attr( $id ); ?> .sh-iconbox-slider-tab.slick-current .sh-iconbox-slider-tab-content i {
                    color: <?php echo esc_attr( $accent_color ); ?>!important;
                }
                #iconbox-slider-<?php echo esc_attr( $id ); ?> .sh-iconbox-slider-tab.slick-current:after {
                    background-color: <?php echo esc_attr( $accent_color ); ?>!important;
                }

			<?php endif; ?>

			<?php if( $height != '600px' && $height ) : ?>
				@media (max-width: 1024px) {
					#iconbox-slider-<?php echo esc_attr( $id ); ?> .sh-iconbox-slider-item {
						height: <?php echo jevelin_addpx( $height ); ?>
					}
				}
			<?php endif; ?>

			<?php if( $slide_title_color ) : ?>
				#iconbox-slider-<?php echo esc_attr( $id ); ?> .sh-iconbox-slider-item * {
					color: <?php echo esc_attr( $slide_title_color ); ?>!important;
				}
			<?php endif; ?>

			<?php if( $slide_descr_color ) : ?>
				#iconbox-slider-<?php echo esc_attr( $id ); ?> .sh-iconbox-slider-item p,
				#iconbox-slider-<?php echo esc_attr( $id ); ?> .sh-iconbox-slider-item p * {
					color: <?php echo esc_attr( $slide_descr_color ); ?>!important;
					opacity: 1;
				}
			<?php endif; ?>

		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:icon_box_slider','jevelin_shortcode_icon_box_slider_css');
endif;
?>
