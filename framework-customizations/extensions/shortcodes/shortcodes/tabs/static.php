<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_tabs_css' ) ) :
	function jevelin_shortcode_tabs_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'tabs' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$text_color = ( isset( $atts['text_color'] ) ) ? $atts['text_color'] : '';
		$border_accent_color = ( isset( $atts['border_accent_color'] ) ) ? $atts['border_accent_color'] : '';
		$border_color = ( isset( $atts['border_color'] ) ) ? $atts['border_color'] : '';
		ob_start(); ?>

			<?php if( $text_color ) : ?>
				#tabs-<?php echo esc_attr( $id ); ?> .sh-tabs-filter li:not(.active) a,
				#tabs-<?php echo esc_attr( $id ); ?> .tab-pane {
					color: <?php echo esc_attr( $text_color ); ?>!important;
				}
			<?php endif; ?>

			<?php
			$accent_color = ( $atts['accent_color'] ) ? $atts['accent_color'] : jevelin_option('accent_color');
			if( $accent_color ) : ?>

				#tabs-<?php echo esc_attr( $id ); ?> .sh-tabs-filter li.active a,
				#tabs-<?php echo esc_attr( $id ); ?> .sh-tabs-filter li:hover a {
					color: <?php echo esc_attr( $accent_color ); ?>!important;
				}

				#tabs-<?php echo esc_attr( $id ); ?> .sh-tabs-filter li.active a {
					border-bottom-color: <?php echo esc_attr( $accent_color ); ?>!important;
				}
			<?php endif; ?>

			<?php if( $border_accent_color ) : ?>
				#tabs-<?php echo esc_attr( $id ); ?> .sh-tabs-filter li a:after {
					background-color: <?php echo esc_attr( $border_accent_color ); ?>!important;
				}
			<?php else : ?>
				#tabs-<?php echo esc_attr( $id ); ?> .sh-tabs-filter li a:after {
					background-color: <?php echo jevelin_option( 'accent_color' ); ?>!important;
				}
			<?php endif; ?>

			<?php if( $border_color ) : ?>
				#tabs-<?php echo esc_attr( $id ); ?> .nav-tabs,
				#tabs-<?php echo esc_attr( $id ); ?> .sh-tabs-filter li {
					border-color: <?php echo esc_attr( $border_color ); ?>!important;
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:tabs','jevelin_shortcode_tabs_css');
endif;
?>
