<?php
/**
 * Portfolio Taxonomy
 */
if( jevelin_option( 'portfolio_archive_layout' ) == 'sidebar-right' || jevelin_option( 'portfolio_archive_layout' ) == 'sidebar-left') :
	$layout_sidebar = esc_attr( jevelin_option( 'portfolio_archive_layout' ) );
endif;

$term_id = get_queried_object()->term_id;
get_header(); ?>
	<div id="content" class="<?php if( isset($layout_sidebar) && $layout_sidebar ) : ?>content-with-<?php echo esc_attr( $layout_sidebar ); endif; ?>">
		<div class="sh-portfolio sh-portfolio-archive sh-portfolio-columns<?php echo esc_attr( jevelin_option( 'portfolio_archive_columns', '3' ) ); ?> sh-portfolio-style-default-shadow">

			<?php
			$page = ( get_query_var('page') ) ? get_query_var('page') : 1;
			$portfolio_items = new WP_Query(array(
				'post_type' => 'fw-portfolio',
				'post_status' => 'publish',
				'posts_per_page' => intval( jevelin_option( 'portfolio_archive_per_page', '12' ) ),
				'paged' => intval( $page ),
				'tax_query' => array(
					array(
						'taxonomy' => 'fw-portfolio-category',
						'field' => 'id',
						'terms' => intval($term_id),
					)
				),
			));
			while ( $portfolio_items->have_posts() ) : $portfolio_items->the_post();
				$content = trim( jevelin_get_excerpt( 15, strip_shortcodes( get_the_content() ) ) );
			?>
				<div class="sh-portfolio-item sh-portfolio-default-shadow sh-portfolio-overlay-style-overlay4">

					<div class="sh-portfolio-image">
						<div class="sh-portfolio-image-position">
							<img class="sh-portfolio-img" src="<?php echo jevelin_get_thumb( get_the_ID(), 'post-thumbnail' ); ?>" alt="" />
						</div>
						<div class="sh-portfolio-overlay sh-portfolio-overlay4">
							<div class="sh-portfolio-overlay4-container">
								<div class="sh-portfolio-overlay4-icons sh-table">

					                <a href="<?php the_permalink(); ?>" class="sh-overlay-item sh-table-cell">
					                    <div class="sh-overlay-item-container">
					                        <i class="icon-link"></i>
					                    </div>
					                </a>
					                <a href="<?php echo jevelin_get_thumb( get_the_ID(), 'large' ); ?>" class="sh-overlay-item sh-table-cell" rel="lightbox">
					                    <div class="sh-overlay-item-container">
					                        <i class="icon-magnifier-add"></i>
					                    </div>
					                </a>

								</div>
							</div>
						</div>
					</div>
					<div class="sh-portfolio-content-container">
						<a href="<?php the_permalink(); ?>">
							<h3 class="sh-portfolio-title">
								<?php the_title(); ?>
							</h3>
						</a>

						<?php if( $content ) : ?>
							<div class="sh-portfolio-description">
								<?php echo ( $content ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<?php jevelin_pagination( $portfolio_items, 1, 1 ); ?>
	</div>
	<?php if( isset($layout_sidebar) && $layout_sidebar ) : ?>
		<div id="sidebar" class="<?php echo esc_attr( $layout_sidebar ); ?>">
			<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>
<?php get_footer(); ?>
