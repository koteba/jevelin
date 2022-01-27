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
	<div class="wrap-image">
		<?php if( $title ) : ?>
			<?php echo wp_kses_post( $title ); ?>
		<?php endif; ?>
		<div class="sh-image-widgets">

			<?php if( isset($params['url']) && $params['url'] ) : ?>
				<a href="<?php echo $params['url']; ?>">
			<?php endif; ?>

			<?php if( $params['image'] ) : ?>
				<img src="<?php echo esc_url( $params['image'] ); ?>" alt="<?php echo esc_attr( $params['widget-title'] ); ?>" />
			<?php endif; ?>

			<?php if( isset($params['url']) && $params['url'] ) : ?>
				</a>
			<?php endif; ?>

			<?php if( isset( $params['description'] ) && $params['description'] ) : ?>
				<p class="sh-image-widgets-description">
					<?php echo esc_attr( $params['description'] ); ?>
				</p>
			<?php endif; ?>

			<?php if( isset( $params['social_icons'] ) && $params['social_icons'] == 'on' ) : ?>
				<p class="sh-image-widgets-description sh-image-widgets-social">
					<?php echo jevelin_social_media(); ?>
				</p>
			<?php endif; ?>


		</div>
	</div>
	<?php echo wp_kses_post( $after_widget ); ?>
<?php endif; ?>
