<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Recent Posts HTML
/*-----------------------------------------------------------------------------------*/
$id = '';
if( isset( $atts['id'] ) ) :
	$id = $atts['id'];
elseif( isset( $id_rand ) ) :
	$id = $id_rand;
endif;

$style = ( isset( $atts['style'] ) ) ? $atts['style'] : 'masonry';
$columns = ( isset( $atts['columns'] ) ) ? $atts['columns'] : '3';
$pagination = ( isset( $atts['pagination'] ) &&  $atts['pagination'] == 'on' ) ? true : false;
$categories_switch = ( isset( $atts['categories_switch'] ) &&  $atts['categories_switch'] == 'on' ) ? true : false;
$elements = jevelin_option( 'post_elements' );
$class = '';
$class2 = '';
$categories_type = 'category__in';
$categories_query = array();
$tags_type = 'tag__in';
$tags_query = array();
$this_category = ( isset($_GET['category']) && $_GET['category'] ) ? esc_attr($_GET['category']) : '';


/* Get Categories - WPbakery Page Builder */
if( !isset( $atts['id'] ) && isset( $atts['categories'] ) ) :
	$categories_type = 'cat';
	$categories_query = [];
	$categories_query_items = explode( ',', $atts['categories'] );

	foreach( $categories_query_items as $categories_query_item ) :
		$categories_query_item = trim( $categories_query_item );
		$term = get_term_by('slug', $categories_query_item, 'category');
		if( !isset( $term->term_id ) ) :
			$term = get_term_by('name', $categories_query_item, 'category');
		endif;

		if( isset( $term->term_id ) ) :
			$categories_query[] = $term->term_id;
		endif;
	endforeach;

	$categories_query = implode( ',', $categories_query );
/* Get Categories - Unyson Page Builder */
elseif( isset( $atts['categories'] ) && count( $atts['categories'] ) > 0 ) :
	$categories_type = 'category__in';
	$categories_query = $atts['categories'];
endif;


/* Get Tags */
if( !isset( $atts['id'] ) && isset( $atts['tags'] ) ) :
	$tags_type = 'tag';
	$tags_query = $atts['tags'];
elseif( isset( $atts['tags'] ) && count( $atts['tags'] ) > 0 ) :
	$tags_type = 'tag__in';
	$tags_query = $atts['tags'];
endif;


/* Get Columns */
if( isset( $atts['columns'] ) && ( $atts['columns'] == 2 || $atts['columns'] == 4 || $atts['columns'] == 5 ) ) :
	$class = ' sh-recent-posts-columns'.$atts['columns'];
endif;


/* Set Carousel */
if( isset( $atts['carousel'] ) && $atts['carousel'] == true ) :
	$class.= ' sh-recent-posts-carousel';
	$class2.= ' sh-recent-posts-list-carousel';
endif;
?>


<?php /* Visual Composer Optimization */ ?>
<?php if( jevelin_is_vc_front() ) : ?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			if( $.isFunction( $.fn.isotope ) ) {

				var $masonry2 = $('#recent-posts-<?php echo esc_attr( $id ); ?> .blog-list').isotope({
					itemSelector: '.post-item, .post-content-gallery-item',
					columnWidth: 0,
					gutter: 0,
				}).isotope('reloadItems');
				$masonry2.imagesLoaded( function() {
					$masonry2.isotope('layout').css( 'opacity', 1 );
				});

			}

			if( typeof $.fn.Slick !== 'undefined' ) {
				/* Blog Posts Carousel */
		        var desktop_slides = parseInt( $('#recent-posts-<?php echo esc_attr( $id ); ?> .blog-list').parent().attr('data-id') );
		        if( desktop_slides == 4 || desktop_slides == 5 ) {
		            var desktop_slides = 3;
		        }

		        $('#recent-posts-<?php echo esc_attr( $id ); ?> .blog-list').slick({
		            infinite: true,
		            dots: true,
		            arrows: false,
		            slidesToShow: desktop_slides,
		            slidesToScroll: desktop_slides,
		            autoplay: true,
		            autoplaySpeed: 5000,
		            responsive: [
		                {
		                    breakpoint: 1025,
		                    settings: {
		                        slidesToShow: desktop_slides,
		                        slidesToScroll: desktop_slides,
		                    }
		                },{
		                    breakpoint: 800,
		                    settings: {
		                        slidesToShow: 2,
		                        slidesToScroll: 2,
		                        pauseOnHover: false
		                    }
		                },{
		                    breakpoint: 550,
		                    settings: {
		                        slidesToShow: 1,
		                        slidesToScroll: 1,
		                        pauseOnHover: false
		                    }
		                }
		            ],
		        });
			}
		});
	</script>
<?php endif; ?>


<div class="sh-recent-posts<?php echo esc_attr( $class ); ?>" id="recent-posts-<?php echo esc_attr( $id ); ?>" data-id="<?php echo intval( $columns ); ?>">

	<?php /* Categories Switch */ ?>
	<?php if( $categories_switch ) :
			$terms_data = [
				'taxonomy' => 'category',
			    'hide_empty' => false,
				'fields' => 'ids'
			];

			if( $categories_query ) :
				$terms_data['include'] = $categories_query;
			endif;

			$categories_tabs = get_terms( $terms_data );
		?>

		<div class="sh-filter-blog sh-filter-container sh-portfolio-filter-style3 sh-portfolio-filter-style4">
			<div class="sh-filter">
				<span class="sh-filter-item<?php echo ( !$this_category ) ? ' active' : ''; ?>">
					<a href="<?php echo esc_url( get_the_permalink() )?>" class="sh-filter-item-content">
						<?php esc_attr_e( 'All', 'jevelin' ); ?>
					</a>
				</span>

				<?php foreach( $categories_tabs as $category_id ) :
					$category = get_term_by('id', $category_id, 'category');
					if( $category->count > 0 ) : ?>

					<span class="sh-filter-item<?php echo ( $this_category == $category->slug ) ? ' active' : ''; ?>">
						<a href="<?php echo esc_url( add_query_arg( 'category', esc_attr( $category->slug ), get_the_permalink() ) ); ?>" class="sh-filter-item-content">
							<?php echo esc_attr( $category->name ); ?>
						</a>
					</span>

				<?php endif; endforeach; ?>
			</div>
		</div>
	<?php endif; ?>

	<div class="sh-group blog-list blog-style-<?php echo ( $style != 'minimalistic' ) ? esc_attr( $style ) : 'grid minimalistic'; echo esc_attr( $class2 ); ?>">
		<?php
			set_query_var( 'style', $style );

			$limit = ( isset( $atts['limit'] ) && is_numeric($atts['limit']) ) ? intval( $atts['limit'] ) : 6;
			if( $limit == 41 ) {
				$limit = -1;
			}

			$orderby = ( isset($atts['order_by']) && $atts['order_by'] ) ? esc_attr( $atts['order_by'] ) : 'post_date';
			$order = ( isset($atts['order']) && $atts['order'] ) ? esc_attr( $atts['order'] ) : 'desc';


			// Category Page
			if( $this_category ) {
				$categories_type = 'category_name';
				$categories_query = esc_attr( $this_category );
			}


			// Pagination
			if( $pagination ) :
				if( is_front_page() ) :
					$page = (get_query_var('page')) ? get_query_var('page') : 1;
				else :
					$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
				endif;


				// Pagination Select
				$posts = new WP_Query( array(
					'post_type' => 'post',
					'posts_per_page' => $limit,
					$categories_type => $categories_query,
					$tags_type => $tags_query,
					'orderby' => $orderby,
					'order' => $order,

					// Page
					'paged' => $page
				));
			else :
				$posts = new WP_Query( array(
					'post_type' => 'post',
					'posts_per_page' => $limit,
					$categories_type => $categories_query,
					$tags_type => $tags_query,
					'orderby' => $orderby,
					'order' => $order
				));
			endif;


			if( $posts->have_posts() ) :
				while ( $posts->have_posts() ) : $posts->the_post();
					if( in_array( $style, array( 'masonry masonry2', 'masonry masonry-shadow', 'masonry', 'grid', 'grid masonry2', 'mix masonry2', 'large', 'medium', 'small', 'minimalistic' ) ) ) :

						if( get_post_format() ) :
							get_template_part( 'content', 'format-'.get_post_format() );
						else :
							get_template_part( 'content' );
						endif;

					elseif( $style == 'largeimage' ) : ?>


						<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
							<div class="post-container">
								<?php jevelin_popover( jevelin_post_option( get_the_ID(), 'post-popover' ) ); ?>

								<?php if( get_post_format() == 'link' ) : ?>

									<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-title post-title-format">
										<h2><i class="post-format-icon icon-link"></i> <?php echo jevelin_post_option( get_the_ID(), 'post-url-title' ); ?></h2>
									</a>

									<div class="post-content">
										<p><?php echo jevelin_post_option( get_the_ID(), 'post-url' ); ?></p>
									</div>

								<?php elseif( get_post_format() == 'quote' ) : ?>

									<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-title post-title-format">
										<h2><i class="post-format-icon ti-quote-left"></i> <?php echo jevelin_post_option( get_the_ID(), 'post-quote' ); ?></h2>
									</a>

									<div class="post-content">
										<p><?php echo jevelin_post_option( get_the_ID(), 'post-quote-author' ); ?></p>
									</div>

								<?php elseif( get_post_format() == 'video' ) : ?>

									<div class="post-meta-video">
										<div class="ratio-container ratio-container-classic">
											<div class="ratio-content">
												<?php echo wp_oembed_get( jevelin_post_option( get_the_ID(), 'post-video' ) ); ?>
											</div>
										</div>
									</div>
									<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-title">
										<h2><?php the_title(); ?></h2>
									</a>

								<?php elseif( get_post_format() == 'audio' ) : ?>

									<div class="post-meta-video">
										<div class="ratio-container ratio-container-classic">
											<div class="ratio-content">
												<?php echo wp_oembed_get( jevelin_post_option( get_the_ID(), 'post-audio' ) ); ?>
											</div>
										</div>
									</div>
									<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-title">
										<h2><?php the_title(); ?></h2>
									</a>

								<?php elseif( get_post_format() == 'gallery' ) : ?>

									<div class="sh-gallery">
										<?php
											$gallery = jevelin_post_option( get_the_ID(), 'post-gallery' );
											if( count($gallery) > 0 ) :
												foreach( $gallery as $image ) : ?>

													<div class="sh-gallery-item">
														<img src="<?php echo jevelin_get_small_thumb( $image['attachment_id'] ); ?>" alt="" class="width-full" />
													</div>

												<?php endforeach;
											endif;
										?>
									</div>
									<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-title">
										<h2><?php the_title(); ?></h2>
									</a>

								<?php else : ?>

									<div class="post-meta-thumb">
										<?php echo the_post_thumbnail(); ?>
										<?php jevelin_blog_overlay( jevelin_get_thumb( get_the_ID() ) ); ?>
									</div>
									<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-title">
										<h2><?php the_title(); ?></h2>
									</a>

								<?php endif; ?>

								<div class="post-meta post-meta-two">
									<?php jevelin_meta_two(); ?>
								</div>

							</div>
						</article>


					<?php else : ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
							<div class="post-container">

								<div class="sh-table">
									<div class="sh-table-cell-top post-custom-date">

										<?php if( isset($elements['comments']) && $elements['comments'] == true ) : ?>
											<div class="post-comments">
												<?php echo get_comments_number( '0', '1', '%' ); ?>
											</div>
										<?php endif; ?>
										<div class="post-day">
											<?php echo the_time( 'd' ); ?>
										</div>
										<div class="post-month">
											<?php echo the_time( 'M' ); ?>
										</div>

									</div>
									<div class="sh-table-cell-top">

										<?php if( get_post_format() == 'link' ) : ?>

											<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-title post-title-format">
												<h2><i class="post-format-icon icon-link"></i> <?php echo jevelin_post_option( get_the_ID(), 'post-url-title' ); ?></h2>
											</a>

											<div class="post-content">
												<p><?php echo jevelin_post_option( get_the_ID(), 'post-url' ); ?></p>
											</div>

										<?php elseif( get_post_format() == 'quote' ) : ?>

											<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-title post-title-format">
												<h2><i class="post-format-icon ti-quote-left"></i> <?php echo jevelin_post_option( get_the_ID(), 'post-quote' ); ?></h2>
											</a>

											<div class="post-content">
												<p><?php echo jevelin_post_option( get_the_ID(), 'post-quote-author' ); ?></p>
											</div>

										<?php else : ?>

											<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-title">
												<h2><?php the_title(); ?></h2>
											</a>

											<div class="post-content">
												<?php the_excerpt(); ?>
											</div>

										<?php endif; ?>
										<div class="post-meta post-meta-two">
											<?php jevelin_meta_two(); ?>
										</div>

									</div>
								</div>

							</div>
						</article>

					<?php endif;
				endwhile;

				wp_reset_postdata();
			endif;
		?>
	</div>

	<?php if( $pagination ) : ?>
		<?php jevelin_pagination( $posts ); ?>
	<?php endif; ?>
</div>
