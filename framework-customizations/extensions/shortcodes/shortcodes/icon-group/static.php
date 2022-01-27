<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_icon_group_css' ) ) :
	function jevelin_shortcode_icon_group_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data, 'icon-group' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$icon_size = ( isset( $atts['icon_size'] ) ) ? $atts['icon_size'] : '';
		$icon_color = ( isset( $atts['icon_color'] ) ) ? $atts['icon_color'] : '';
		$icon_hover_color = ( isset( $atts['icon_hover_color'] ) ) ? $atts['icon_hover_color'] : '';
		$padding = ( isset( $atts['padding'] ) ) ? $atts['padding'] : '';
		$width = ( isset( $atts['width'] ) ) ? $atts['width'] : '';
		$width_line_height = ( $width == 'auto' ) ? 'normal' : $width;
		$alignment_mobile = ( isset( $atts['alignment_mobile'] ) ) ? $atts['alignment_mobile'] : '';
		$margin = ( isset( $atts['margin_desktop'] ) ) ? $atts['margin_desktop'] : '';
		$margin_responsive = ( isset( $atts['margin_responsive'] ) ) ? $atts['margin_responsive'] : '';
		ob_start(); ?>

			<?php if( $margin ) : ?>
				#icon-group-<?php echo esc_attr( $id ); ?>  {
					margin: <?php echo esc_attr( $margin ); ?>;
				}
			<?php endif; ?>

			<?php if( $margin_responsive ) : ?>
				@media (max-width: 800px) {
					#icon-group-<?php echo esc_attr( $id ); ?> {
						margin: <?php echo esc_attr( $margin_responsive ); ?>;
					}
				}
			<?php endif; ?>

			<?php if( $alignment_mobile && $alignment_mobile != 'default' ) : ?>
				@media (max-width: 800px) {
					#icon-group-<?php echo esc_attr( $id ); ?> {
						text-align: <?php echo esc_attr( $alignment_mobile ); ?>;
					}
				}
			<?php endif; ?>

			<?php if( $width ) : ?>
				#icon-group-<?php echo esc_attr( $id ); ?> .sh-icon-group-item,
				#icon-group-<?php echo esc_attr( $id ); ?>.sh-icon-group-style1 .sh-icon-group-item-container {
					width: <?php echo esc_attr( jevelin_addpx( $width ) ); ?>;
					height: <?php echo esc_attr( jevelin_addpx( $width ) ); ?>;
				}

				#icon-group-<?php echo esc_attr( $id ); ?>.sh-icon-group-style1 .sh-icon-group-item-container {
					position: relative;
					top: 0;
					right: 0;
					transform: none;
					animation: none!important;
				}

				#icon-group-<?php echo esc_attr( $id ); ?> .sh-icon-group-item i {
					line-height: <?php echo esc_attr( jevelin_addpx( $width_line_height ) ); ?>;
				}
			<?php endif; ?>

			<?php if( $padding ) : ?>
				#icon-group-<?php echo esc_attr( $id ); ?> .sh-icon-group-item {
					padding: <?php echo esc_attr( jevelin_addpx( $padding ) ); ?>;
				}
			<?php endif; ?>

			<?php if( $icon_size ) : ?>
				#icon-group-<?php echo esc_attr( $id ); ?> .sh-icon-group-item i {
					font-size: <?php echo jevelin_addpx( $icon_size ); ?>;
				}
			<?php endif; ?>


			<?php if( $icon_color ) : ?>
				#icon-group-<?php echo esc_attr( $id ); ?> .sh-icon-group-item i {
					color: <?php echo esc_attr( $icon_color ); ?>;
				}
			<?php endif; ?>

			<?php if( $icon_hover_color ) : ?>
				#icon-group-<?php echo esc_attr( $id ); ?> .sh-icon-group-item-container:hover i {
					color: <?php echo esc_attr( $icon_hover_color ); ?>;
				}
			<?php endif; ?>

		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:icon_group','jevelin_shortcode_icon_group_css');
endif;
?>
