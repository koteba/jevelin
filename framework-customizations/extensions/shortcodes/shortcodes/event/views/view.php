<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Event HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$title = ( isset( $atts['title'] ) ) ? $atts['title'] : '';
$desc = ( isset( $atts['desc'] ) ) ? $atts['desc'] : '';
$button_link = ( isset( $atts['button_link'] ) ) ? $atts['button_link'] : '#';
$button_name = ( isset( $atts['button_name'] ) ) ? $atts['button_name'] : esc_attr( 'More', 'jevelin' );
?>

<div id="event-<?php echo esc_attr( $id ); ?>" class="sh-event">
	<div class="sh-event-container sh-columns">
		<div>
			<h3 class="sh-event-title"><?php echo esc_attr( $title ); ?></h3>
			<div class="sh-event-desc"><?php echo wp_kses_post( $desc ); ?></div>
		</div>
		<div>
			<a href="<?php echo esc_url( $button_link ); ?>" class="sh-event-button">
				<?php echo esc_attr( $button_name ); ?>
			</a>
		</div>
	</div>
</div>
