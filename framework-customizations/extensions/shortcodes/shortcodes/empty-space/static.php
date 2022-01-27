<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

if(!function_exists('jevelin_shortcode_empty_space_css')) :
	function jevelin_shortcode_empty_space_css ($data) {
		$atts = jevelin_shortcode_options($data,'empty-space');
		$mobile = ( isset( $atts['mobile']['mobile'] ) ) ? esc_attr($atts['mobile']['mobile']) : 'off';
		$mobile_atts = jevelin_get_picker( $atts['mobile'] );
		ob_start(); ?>


			<?php if( !empty( $atts['height'] ) ) : ?>
				#empty-space-<?php echo esc_attr( $atts['id'] ); ?> {
					height: <?php echo jevelin_addpx( $atts['height'] ); ?>;
				}
			<?php endif; ?>

			<?php if( !empty( $mobile_atts['height'] ) ) : ?>
			@media (max-width: 1020px) {
				#empty-space-<?php echo esc_attr( $atts['id'] ); ?> {
					height: <?php echo jevelin_addpx( $mobile_atts['height'] ); ?>;
				}
			}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) );
	}
	add_action('fw_ext_shortcodes_enqueue_static:empty_space','jevelin_shortcode_empty_space_css');
endif;
?>
