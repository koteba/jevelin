<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * @var $instance
 * @var $before_widget
 * @var $after_widget
 * @var $title
 */


?>

<?php if ( ! empty( $instance ) ) : ?>
	<?php echo wp_kses_post( $before_widget ); ?>
	<div class="wrap-social">
		<?php echo wp_kses_post( $title ); ?>
		<?php foreach ( $instance as $key => $value ) :
			if ( empty( $value ) ) { continue; } ?>
			<div class="sh-contacts-widget-item">
				<i class="<?php
					if( $key == 'address' ) :
						echo 'icon-map';
					elseif( $key == 'phone' ) :
						echo 'icon-phone';
					elseif( $key == 'email' ) :
						echo 'icon-envelope';
					else :
						echo 'icon-clock';
					endif;
				?>"></i>
				<?php echo do_shortcode( wp_kses_post( $value )); ?>
			</div>
		<?php endforeach; ?>

	</div>
	<?php echo wp_kses_post( $after_widget ); ?>
<?php endif; ?>
