<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');
if(!function_exists('jevelin_shortcode_list_css')) :
	function jevelin_shortcode_list_css ($data) {
		$atts = jevelin_shortcode_options($data,'list'); ob_start(); ?>


			<?php if( $atts['text_color'] ) : ?>
				#list-<?php echo esc_attr( $atts['id'] ); ?>{
					color: <?php echo esc_attr( $atts['text_color'] ); ?>!important;
				}
			<?php endif; ?>

			<?php if( $atts['icon_color'] ) : ?>
				#list-<?php echo esc_attr( $atts['id'] ); ?> .sh-list-icon i {
					color: <?php echo esc_attr( $atts['icon_color'] ); ?>!important;
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) );
	}
	add_action('fw_ext_shortcodes_enqueue_static:list','jevelin_shortcode_list_css');
endif;
?>
