<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_team_member_css' ) ) :
	function jevelin_shortcode_team_member_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'team-member' );
		$id = ( $id_rand ) ? $id_rand : $atts['id'];
		$color_name = ( isset( $atts['color_name'] ) ) ? $atts['color_name'] : '';
		$color_role = ( isset( $atts['color_role'] ) ) ? $atts['color_role'] : '';
		$color_description = ( isset( $atts['color_description'] ) ) ? $atts['color_description'] : '';
		$color_accent = ( isset( $atts['color_accent'] ) ) ? $atts['color_accent'] : '';
		ob_start(); ?>


			<?php if( $color_name ) : ?>
			#team-<?php echo esc_attr( $id ); ?> .sh-team-name h3 {
				color: <?php echo esc_attr( $color_name ); ?>
			}
			<?php endif; ?>

			<?php if( $color_role ) : ?>
			#team-<?php echo esc_attr( $id ); ?> .sh-team-role {
				color: <?php echo esc_attr( $color_role ); ?>!important;
			}
			<?php endif; ?>

			<?php if( $color_description ) : ?>
			#team-<?php echo esc_attr( $id ); ?> .sh-team-description {
				color: <?php echo esc_attr( $color_description ); ?>;
			}
			<?php endif; ?>

			#team-<?php echo esc_attr( $id ); ?>.sh-team-social-overlay .sh-team-icons {
				background-color: <?php echo ( $color_accent ) ? $color_accent : jevelin_option('accent_color'); ?>;
			}


		<?php $css = ob_get_contents(); ob_end_clean();
		if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:team_member','jevelin_shortcode_team_member_css');
endif;
?>
