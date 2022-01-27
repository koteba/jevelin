<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_pie_chart_css' ) ) :
	function jevelin_shortcode_pie_chart_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'pie_chart' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$percentage = ( isset( $atts['percentage'] ) ) ? intval( $atts['percentage'] ) : '50';
		$text_color = ( isset( $atts['text_color'] ) ) ? $atts['text_color'] : '';
		$accent_color = ( isset( $atts['accent_color'] ) && $atts['accent_color'] ) ? $atts['accent_color'] : jevelin_option('accent_color');
		$accent_hover_color = ( isset( $atts['accent_hover_color'] ) ) ? $atts['accent_hover_color'] : '';
		$line_color = ( isset( $atts['line_color'] ) ) ? $atts['line_color'] : '#eeeeee';
		$background_color = ( isset( $atts['background_color'] ) ) ? $atts['background_color'] : '#ffffff';
		if( $percentage > 100 || $percentage < 0 ) :
			$percentage = 100;
		endif;
		ob_start(); ?>


			#piechart-<?php echo esc_attr( $id ); ?>.sh-piechart-circle .circle_animation {
			    animation: piechart_<?php echo esc_attr( $id ); ?>_circle 2s cubic-bezier(0.785, 0.135, 0.150, 0.860) forwards;
			}

			#piechart-<?php echo esc_attr( $id ); ?>.sh-piechart-circle .sh-piechart-pointer {
			    animation: piechart_<?php echo esc_attr( $id ); ?>_circle_pointer 2s cubic-bezier(0.785, 0.135, 0.150, 0.860) forwards;
			}

			#piechart-<?php echo esc_attr( $id ); ?>.sh-piechart-rhomb .rhomb_animation {
			    animation: piechart_<?php echo esc_attr( $id ); ?>_rhomb  2s cubic-bezier(0.785, 0.135, 0.150, 0.860) forwards;
			}

			#piechart-<?php echo esc_attr( $id ); ?> .sh-piechart-pointer {
				background-color: <?php echo esc_attr( $accent_color ); ?>;
			}

			<?php if( $text_color ) : ?>
				#piechart-<?php echo esc_attr( $id ); ?> .sh-piechart-percentage {
					color: <?php echo esc_attr( $text_color ); ?>!important;
				}
			<?php endif; ?>

			<?php if( $accent_hover_color ) : ?>
				#piechart-<?php echo esc_attr( $id ); ?>:hover .sh-piechart-animation {
					stroke: <?php echo esc_attr( $accent_hover_color ); ?>;
				}

				#piechart-<?php echo esc_attr( $id ); ?>:hover .sh-piechart-pointer {
					background-color: <?php echo esc_attr( $accent_hover_color ); ?>;
				}
			<?php endif; ?>

			@keyframes piechart_<?php echo esc_attr( $id ); ?>_circle {
				to { stroke-dashoffset: <?php echo ( 100- intval( $percentage ) ) * 6; ?>; }
			}

			@keyframes piechart_<?php echo esc_attr( $id ); ?>_circle_pointer {
				from { 	transform: rotate(-90deg) translateX(95px) rotate(0deg); }
				to   {  transform: rotate(<?php echo ( intval( $percentage ) * 3.6 -90); ?>deg) translateX(95px) rotate(-360deg); }
			}

			@keyframes piechart_<?php echo esc_attr( $id ); ?>_rhomb {
				to { stroke-dashoffset: <?php echo 800-(800*( ( intval( $percentage ) *0.8/100)/2 )); ?>; }
			}


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:pie_chart','jevelin_shortcode_pie_chart_css');
endif;
?>
