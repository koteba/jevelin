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
	<div class="wrap-portfolio">
		<?php echo wp_kses_post( $title ); ?>

		<?php if( function_exists('jevelin_portfolio_gallery_images') ) : ?>
			<div class="sh-portfolio-widget">
				<?php
					$loop = new WP_Query( array( 'post_type' => 'fw-portfolio', 'order' => 'DESC', 'posts_per_page' => $limit) );
					while ( $loop->have_posts() ) : $loop->the_post();
				?>

					<div class="sh-portfolio-widget-item">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" class="sh-portfolio-widget-background">
							<?php echo jevelin_image_ratio( get_the_ID(), 'thumbnail' ); ?>
							<div class="sh-mini-overlay">
								<div class="sh-mini-overlay-container">
									<div class="sh-table-full">
										<div class="sh-table-cell">
											<i class="icon-link"></i>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>

				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		<?php endif; ?>
	</div>
	<?php echo wp_kses_post( $after_widget ); ?>
<?php endif; ?>
