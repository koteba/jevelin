<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); } ?>

<?php echo wp_kses_post( $before_widget ); ?>

	<?php
		if( isset( $atts['title'] ) && $atts['title'] ) :
			echo '<h3 class="widget-title">'.esc_attr( $atts['title'] ).'</h3>';
		endif;
	?>

	<?php if( isset( $atts['image']['attachment_id']) ) :
		$url = ( $atts['url'] ) ? $atts['url'] : '';
	?>

		<a href="<?php echo esc_url( $url ); ?>">
			<img src="<?php echo jevelin_get_small_thumb( $atts['image']['attachment_id'], 'large' ); ?>" />
		</a>

	<?php endif; ?>

<?php echo wp_kses_post( $after_widget ); ?>
