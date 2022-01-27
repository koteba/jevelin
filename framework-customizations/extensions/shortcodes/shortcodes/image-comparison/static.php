<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_image_comparison_css' ) ) :
	function jevelin_shortcode_image_comparison_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'image-comparison' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$accent_color = ( isset( $atts['button_color'] ) && $atts['button_color'] )  ? $atts['button_color'] : jevelin_option('accent_color');
		$text_b = ( isset( $atts['text_b'] ) ) ? $atts['text_b'] : '';
		$text_a = ( isset( $atts['text_a'] ) ) ? $atts['text_a'] : '';
		ob_start(); ?>

			#image-comparison-<?php echo esc_attr( $id ); ?> .twentytwenty-handle {
				background-color: <?php echo esc_attr($accent_color); ?>;
			}

			<?php if( $text_b || $text_a ) : ?>
				#image-comparison-<?php echo esc_attr( $id ); ?> .twentytwenty-before-label:before {
					content: "<?php echo esc_attr( $text_b ); ?>";
				}

				#image-comparison-<?php echo esc_attr( $id ); ?> .twentytwenty-after-label:before {
					content: "<?php echo esc_attr( $text_a ); ?>";
				}
			<?php else : ?>
				#image-comparison-<?php echo esc_attr( $id ); ?> .twentytwenty-overlay {
					display: none;
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:image_comparison','jevelin_shortcode_image_comparison_css');
endif;


if( function_exists( 'fw_ext' ) ) :
	$shortcodes_extension = fw_ext('shortcodes');
	wp_enqueue_script('jevelin-event-move', fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/image-comparison/static/jquery.event.move.js'), array('jquery'));
	wp_enqueue_style( 'jevelin-twentytwenty-css', fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/image-comparison/static/twentytwenty.css') );
	wp_enqueue_script('jevelin-twentytwenty-js', fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/image-comparison/static/jquery.twentytwenty.js'), array('jquery', 'jevelin-event-move'));
endif;
