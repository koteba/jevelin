<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Countdown HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$date = ( isset( $atts['date'] ) ) ? $atts['date'] : '';
$style = ( isset( $atts['style'] ) ) ? $atts['style'] : 'style1';
$size = ( isset( $atts['size'] ) ) ? $atts['size'] : 'medium';
$class = '';
if( isset($atts['alignment']) ) :
	$class = ' sh-countdown-alignment-'.$atts['alignment'];
endif;
?>

<script type="text/javascript">
	jQuery(document).ready(function ($) {
		if( $.isFunction( $.fn.countdown ) ) {
			$("#countdown-<?php echo esc_attr( $id ); ?>").countdown('<?php echo esc_attr( $date ); ?>', function(event) {
				var $this = $(this).html(event.strftime(''
				+ '<div class="weeks"><span>%w</span><div><?php esc_html_e('Weeks', 'jevelin') ?></div></div>'
				+ '<div class="days"><span>%d</span><div><?php esc_html_e('Days', 'jevelin') ?></div></div>'
				+ '<div class="sh-coundtdown-container"></div>'
				+ '<div class="hours"><span>%H</span><div><?php esc_html_e('Hours', 'jevelin') ?></div></div>'
				+ '<div class="minutes"><span>%M</span><div><?php esc_html_e('Minutes', 'jevelin') ?></div></div>'
				+ '<div class="seconds"><span>%S</span><div><?php esc_html_e('Seconds', 'jevelin') ?></div></div>'));
			});
		}
	});
</script>

<div id="countdown-<?php echo esc_attr( $id ); ?>" class="sh-countdown sh-countdown-<?php echo esc_attr( $style ); ?> sh-countdown-<?php echo esc_attr( $size ).$class; ?>"></div>
