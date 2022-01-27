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
		<div class="sh-social-widgets">
			<?php foreach ( $instance as $key => $value ) :
				if( $value && $key && in_array( $key, [ 'facebook', 'twitter', 'instagram', 'dribbble', 'behance', 'linkedin', 'youtube' ] ) ) : ?>
					<a href="<?php echo esc_attr( $value ); ?>" class="sh-social-widgets-item" target="_blank">
						<i class="icon-social-<?php echo esc_attr( $key ); ?>"></i>
					</a>
				<?php endif;
			endforeach; ?>
		</div>
	</div>
	<?php echo wp_kses_post( $after_widget ); ?>
<?php endif; ?>
