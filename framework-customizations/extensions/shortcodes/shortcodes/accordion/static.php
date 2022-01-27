<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_accordion_css' ) ) :
	function jevelin_shortcode_accordion_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'accordion' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$text_color = ( isset( $atts['text_color'] ) ) ? $atts['text_color'] : '#505050';
		$background_color = ( isset( $atts['background_color'] ) ) ? $atts['background_color'] : '#f4f4f4';
		$expanded_text_color = ( isset( $atts['expanded_text_color'] ) ) ? $atts['expanded_text_color'] : '#ffffff';
		$expanded_background_color = ( isset( $atts['expanded_background_color'] ) ) ? $atts['expanded_background_color'] : '';
		$icon_size = ( isset( $atts['icon_size'] ) ) ? $atts['icon_size'] : '14px';
		$icon_position = ( isset( $atts['icon_position'] ) ) ? $atts['icon_position'] : '';
		$icon_color = ( isset( $atts['icon_color'] ) ) ? $atts['icon_color'] : '#505050';
		$border_radius = ( isset( $atts['border_radius'] ) ) ? $atts['border_radius'] : '';

		/* If Visual Composer */
		if( !isset( $atts['id'] ) ) :
			$style = ( isset( $atts['style'] ) ) ? $atts['style'] : 'style1';
			$style_atts = array();
			$style_atts['border_color'] = ( isset( $atts['border_color'] ) ) ? $atts['border_color'] : '';
			$style_atts['border_color'] = ( !$style_atts['border_color'] && in_array( $style, array( 'style3', 'style3 sh-accordion-style3-center', 'style7' ) ) ) ? '#e5e5e5' : $style_atts['border_color'];
		else :
			$style = ( isset( $atts['style']['style'] ) ) ? $atts['style']['style'] : 'style1';
			$style_atts = ( isset( $atts['style'] ) ) ? jevelin_get_picker( $atts['style'] ) : array();
		endif;
		ob_start(); ?>


			#accordion-<?php echo esc_attr( $id ); ?>.sh-accordion .panel-title a.collapsed,
			#accordion-<?php echo esc_attr( $id ); ?>.sh-accordion .panel-title a.collapsed i {
				<?php /* Text color */ if( $text_color ) : ?>
					color: <?php echo esc_attr( $text_color ); ?>;
				<?php endif; ?>

				<?php /* Background color */ if( $background_color != 'f4f4f4' ) : ?>
					background-color: <?php echo esc_attr( $background_color ); ?>;
				<?php endif; ?>
			}

			#accordion-<?php echo esc_attr( $id ); ?>.sh-accordion .panel-title a,
			#accordion-<?php echo esc_attr( $id ); ?>.sh-accordion .panel-title a i {
				<?php /* Active text color */ if( $expanded_text_color ) : ?>
					color: <?php echo esc_attr( $expanded_text_color ); ?>;
				<?php endif; ?>

				<?php /* Active background color */
					$accent_color = ( $expanded_background_color ) ? $expanded_background_color : jevelin_option('accent_color');
					if( $accent_color ) : ?>
						background-color: <?php echo esc_attr( $accent_color ); ?>;
				<?php endif; ?>
			}

			<?php /* Icon size */ if( $icon_size ) : ?>
				#accordion-<?php echo esc_attr( $id ); ?> .sh-accordion-icon {
					font-size: <?php echo esc_attr( $icon_size ); ?>
				}
			<?php endif; ?>

			<?php /* Icon position */ if( $icon_position == 'right' ) : ?>
				#accordion-<?php echo esc_attr( $id ); ?> .sh-accordion-icon {
					display: block;
					float: right;
					margin-right: -5px;
					margin-left: 0;
				}

				#accordion-<?php echo esc_attr( $id ); ?> .sh-accordion-icon-cell {
					padding-right: 0;
					padding-left: 20px;
				}
			<?php endif; ?>

			<?php if( !empty( $style_atts['border_color'] ) ) : ?>
				#accordion-<?php echo esc_attr( $id ); ?>:not(.sh-accordion-style7) .panel {
					border-bottom: 1px solid <?php echo esc_attr( $style_atts['border_color'] ); ?>!important;
				}

				#accordion-<?php echo esc_attr( $id ); ?>:not(.sh-accordion-style7) .panel .panel-collapse .panel-body,
				#accordion-<?php echo esc_attr( $id ); ?>.sh-accordion-style7 .panel-title a {
					border-color: <?php echo esc_attr( $style_atts['border_color'] ); ?>!important;
				}
			<?php endif; ?>

			<?php if( $icon_color ) : ?>
				#accordion-<?php echo esc_attr( $id ); ?> .sh-accordion-icon i.open-icon {
					color: <?php echo esc_attr( $icon_color ); ?>!important;
				}
			<?php endif; ?>


			#accordion-<?php echo esc_attr( $id ); ?>.sh-accordion-style5 .nav-tabs li.active:after {
				<?php if( $accent_color ) : ?>
					background-color: <?php echo esc_attr($accent_color); ?>;
				<?php endif; ?>
			}


			<?php if( $border_radius ) : ?>
				#accordion-<?php echo esc_attr( $id ); ?>.sh-accordion .panel-title a {
					border-radius: <?php echo jevelin_addpx( $border_radius ); ?>!important;
				}
			<?php endif; ?>


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:accordion','jevelin_shortcode_accordion_css');
endif;
?>
