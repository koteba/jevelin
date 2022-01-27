<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_countdown_css' ) ) :
	function jevelin_shortcode_countdown_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data, 'countdown' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$title_size = ( isset( $atts['title_size'] ) ) ? $atts['title_size'] : '';
		$number_color = ( isset( $atts['number_color'] ) ) ? $atts['number_color'] : '';
		$title_color = ( isset( $atts['title_color'] ) ) ? $atts['title_color'] : '';
		$border_color = ( isset( $atts['border_color'] ) ) ? $atts['border_color'] : '';
		$bold = ( isset( $atts['bold'] ) ) ? $atts['bold'] : '';
		ob_start(); ?>


			<?php if( $title_size ) : ?>
			#countdown-<?php echo esc_attr( $id ); ?> > div > div {
				font-size: <?php echo esc_attr( $title_size ); ?>;
			}
			<?php endif; ?>

			<?php if( $number_color ) : ?>
			#countdown-<?php echo esc_attr( $id ); ?> > div > span {
				color: <?php echo esc_attr( $number_color ); ?>!important;
			}
			<?php endif; ?>

			<?php if( $title_color ) : ?>
			#countdown-<?php echo esc_attr( $id ); ?> > div > div {
				color: <?php echo esc_attr( $title_color ); ?>!important;
			}
			<?php endif; ?>

			<?php if( $border_color ) : ?>
				#countdown-<?php echo esc_attr( $id ); ?>.sh-countdown-style1 > div,
				#countdown-<?php echo esc_attr( $id ); ?>.sh-countdown-style2 > div > div,
				#countdown-<?php echo esc_attr( $id ); ?>.sh-countdown-style3 > .weeks {
					border-color: <?php echo esc_attr( $border_color ); ?>!important;
				}
			<?php endif; ?>

			<?php if( $bold ) : ?>
				#countdown-<?php echo esc_attr( $id ); ?> > div > span {
					font-weight: bold;
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:countdown','jevelin_shortcode_countdown_css');
endif;


wp_enqueue_script(
	'jevelin-countdown',
	get_template_directory_uri() . '/framework-customizations/extensions/shortcodes/shortcodes/countdown/static/jquery.countdown.min.js',
	array('jquery'),
	NULL,
	true
);
