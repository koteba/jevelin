<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_timeline_css' ) ) :
	function jevelin_shortcode_timeline_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data, 'timeline' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$title_color = ( isset( $atts['title_color'] ) ) ? $atts['title_color'] : '';
		$content_color = ( isset( $atts['content_color'] ) ) ? $atts['content_color'] : '';
		$accent_color = ( isset( $atts['accent_color'] ) ) ? $atts['accent_color'] : '';
		$date_background_color = ( isset( $atts['date_background_color'] ) ) ? $atts['date_background_color'] : '';
		$date_color = ( isset( $atts['date_color'] ) ) ? $atts['date_color'] : '';
		$border_color = ( isset( $atts['border_color'] ) ) ? $atts['border_color'] : '';

		/* If Visual Composer */
		if( !isset( $atts['id'] ) ) :
			$style = ( isset( $atts['style'] ) ) ? esc_attr($atts['style']) : 'style1';
		else :
			$style = ( isset( $atts['style']['style'] ) ) ? esc_attr($atts['style']['style']) : 'style1';
		endif;
		ob_start(); ?>


			<?php if( $title_color ) : ?>
				#timeline-<?php echo esc_attr( $id ); ?> h3 {
					color: <?php echo esc_attr($title_color); ?>;
				}
			<?php endif; ?>

			<?php if( $content_color ) : ?>
				#timeline-<?php echo esc_attr( $id ); ?> .sh-timeline-content {
					color: <?php echo esc_attr($content_color); ?>;
				}
			<?php endif; ?>

			<?php
				$accent_color = ( $accent_color ) ? esc_attr( $accent_color ) : esc_attr(jevelin_option('accent_color'));
				if( $accent_color && $style != 'style2' && $style != 'style2 style3' ) :
			?>
				#timeline-<?php echo esc_attr( $id ); ?> .sh-timeline-item:hover .sh-timeline-box {
					background-color: <?php echo esc_attr( $accent_color ); ?>;
				}

				#timeline-<?php echo esc_attr( $id ); ?> .sh-timeline-item:hover .sh-timeline-box-tale {
					border-left-color: <?php echo esc_attr( $accent_color ); ?>!important;
					border-right-color: <?php echo esc_attr( $accent_color ); ?>!important;
				}

				#timeline-<?php echo esc_attr( $id ); ?> .sh-timeline-item:hover .sh-timeline-box-circle {
					border-color: <?php echo esc_attr( $accent_color ); ?>;
				}
			<?php elseif( $accent_color && $style == 'style2' || $style == 'style2 style3' ) :?>

				#timeline-<?php echo esc_attr( $id ); ?>.sh-timeline-2 .sh-timeline-box-left i,
				#timeline-<?php echo esc_attr( $id ); ?>.sh-timeline-2 .sh-timeline-box-right i,
				#timeline-<?php echo esc_attr( $id ); ?>.sh-timeline-2.style3 .sh-timeline-box-left i,
				#timeline-<?php echo esc_attr( $id ); ?>.sh-timeline-2.style3 .sh-timeline-box-right i, {
					color: <?php echo esc_attr( $accent_color ); ?>;
				}

				#timeline-<?php echo esc_attr( $id ); ?>.sh-timeline-2 .sh-timeline-box-circle,
				#timeline-<?php echo esc_attr( $id ); ?>.sh-timeline-2.style3 .sh-timeline-box-circle {
					background-color: <?php echo esc_attr( $accent_color ); ?>;
				}

			<?php endif; ?>

			<?php if( $date_background_color ) : ?>
				#timeline-<?php echo esc_attr( $id ); ?> .sh-timeline-item .sh-timeline-box {
					background-color: <?php echo esc_attr( $date_background_color ); ?>;
				}

				#timeline-<?php echo esc_attr( $id ); ?>.sh-timeline .sh-timeline-item .sh-timeline-box-tale {
					border-left-color: <?php echo esc_attr( $date_background_color ); ?>!important;
					border-right-color: <?php echo esc_attr( $date_background_color ); ?>!important;
				}

				#timeline-<?php echo esc_attr( $id ); ?>.sh-timeline-2 .sh-timeline-item .sh-timeline-box-tale,
				#timeline-<?php echo esc_attr( $id ); ?>.sh-timeline-2.style3 .sh-timeline-item .sh-timeline-box-tale,
				#timeline-<?php echo esc_attr( $id ); ?>.sh-timeline .sh-timeline-item .sh-timeline-box-circle {
					border-color: <?php echo esc_attr( $date_background_color ); ?>;
				}
			<?php endif; ?>

			<?php if( $border_color ) : ?>
				#timeline-<?php echo esc_attr( $id ); ?> .sh-timeline-item .sh-timeline-box {
					border: 1px solid <?php echo esc_attr( $border_color ); ?>!important;
				}

				#timeline-<?php echo esc_attr( $id ); ?> .sh-timeline-box-tale:after {
					border-left-color: <?php echo esc_attr( $border_color ); ?>!important;
					border-right-color: <?php echo esc_attr($border_color); ?>!important;
				}
			<?php endif; ?>

			<?php if( ( $style == 'style2' || $style == 'style2 style3' ) && $date_color ) : ?>
				#timeline-<?php echo esc_attr( $id ); ?> .sh-timeline-item .sh-timeline-date {
					color: <?php echo esc_attr($date_color); ?>;
				}
			<?php elseif( $date_color ) : ?>
				#timeline-<?php echo esc_attr( $id ); ?> .sh-timeline-item .sh-timeline-box {
					color: <?php echo esc_attr($date_color); ?>;
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:timeline','jevelin_shortcode_timeline_css');
endif;
?>
