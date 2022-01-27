<?php
if( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Portfolio HTML
/*-----------------------------------------------------------------------------------*/
$id = '';
if( isset( $atts['id'] ) ) :
	$id = $atts['id'];
elseif( isset( $id_rand ) ) :
	$id = $id_rand;
endif;

if( function_exists('jevelin_portfolio_gallery_images') ) :
	global $post; $post_id = ( isset( $post->ID ) && $post->ID > 0 ) ? $post->ID : '';

	if( function_exists( 'jevelin_portfolio_get_settings' ) ) :
		$ext_portfolio_settings = jevelin_portfolio_get_settings();
	else :
		$ext_portfolio_instance = fw()->extensions->get( 'portfolio' );
		$ext_portfolio_settings = $ext_portfolio_instance->get_settings();
	endif;

	$portfolio_categories_url = $ext_portfolio_settings['taxonomy_slug'];
	$page_link = ( isset( $atts['page_link'] ) ) ? $atts['page_link'] : true;
	$pagination = ( isset( $atts['pagination'] ) ) ? $atts['pagination'] : false;
	$pagination_filters = ( isset( $atts['pagination_filters'] ) && $pagination == true && $atts['pagination_filters'] == true ) ? true : false;
	$pagination_per_page = ( isset( $atts['pagination_per_page'] ) && is_numeric($atts['pagination_per_page']) ) ? intval( $atts['pagination_per_page'] ) : 6;
	$filter_all_limit = ( isset( $atts['filter_all_limit'] ) && $atts['filter_all_limit'] > 0 ) ? '*:nth-child(-n+'.$atts['filter_all_limit'].')' : '*';
	$layout = ( isset( $atts['layout'] ) && $atts['layout'] ) ? $atts['layout'] : 'masonry';
	$image_ratio = ( isset( $atts['image_ratio'] ) ) ? $atts['image_ratio'] : 'fluid';
	$orderby = ( isset( $atts['order_by'] ) && $atts['order_by'] ) ? esc_attr( $atts['order_by'] ) : 'post_date';
	$order = ( isset( $atts['order'] ) && $atts['order'] ) ? esc_attr( $atts['order'] ) : 'desc';
	$limit = ( isset( $atts['limit'] ) && is_numeric( $atts['limit'] ) ) ? intval( $atts['limit'] ) : 6;
	$spacing = ( isset( $atts['spacing'] ) && $atts['spacing'] && is_numeric( $atts['spacing'] ) ) ? intval( $atts['spacing'] ) : '';
	$filter = ( isset( $atts['filter'] ) ) ? $atts['filter'] : 'default';
	$filter_icon = ( isset( $atts['filter_icon'] ) ) ? $atts['filter_icon'] : '';
	$atts_categories = ( isset( $atts['categories'] ) ) ? $atts['categories'] : array();
	$categories_order = ( isset( $atts['categories_order'] ) && $atts['categories_order'] ) ? esc_attr( $atts['categories_order'] ) : 'asc';
	$style = ( isset( $atts['style'] ) ) ? $atts['style'] : 'default';
	$overlay = ( isset( $atts['overlay'] ) ) ? $atts['overlay'] : 'overlay4';
	$columns = ( isset( $atts['columns'] ) ) ? $atts['columns'] : '3';


	/* Portfolios */
	$categories_query = array();
	if( is_array( $atts_categories ) && count( $atts_categories ) ) :
		$categories_query[] = array(
			'taxonomy' => 'fw-portfolio-category',
			'field' => 'id',
			'terms' => $atts_categories
		);
	elseif( $atts_categories ) :
		$categories_query = array(
		   	'taxonomy' => 'fw-portfolio-category',
		   	'field' => 'slug',
		   	'terms' => $atts_categories
		);
	endif;

	if( $image_ratio == 'landscape' ) :
		$image_ratio = 'post-thumbnail';
	elseif( $image_ratio == 'portrait' ) :
		$image_ratio = 'jevelin-portrait';
	elseif( $image_ratio == 'square' ) :
		$image_ratio = 'jevelin-square';
	else :
		$image_ratio = 'large';
	endif;


	/* Pagination */
	if( $pagination ) :
		if( is_front_page() ) :
			$page = ( get_query_var('page') ) ? get_query_var('page') : 1;
		else :
			$page = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		endif;

		$categories_query = array();
		if( $pagination_filters && isset( $_GET['category'] ) && $_GET['category'] ) :
			$category = get_term_by( 'slug', esc_attr( $_GET['category'] ), 'fw-portfolio-category' );
			if( isset( $category->slug ) && $category->slug == $_GET['category'] ) :
				$categories_query[] = array(
					'taxonomy' => 'fw-portfolio-category',
					'field' => 'id',
					'terms' => array( $category->term_id )
				);
				$cat_slug = $category->slug;
			endif;
		endif;

		$loop = new WP_Query( array( 'post_type' => 'fw-portfolio', 'orderby' => $orderby, 'order' => $order, 'posts_per_page' => '-1' ) );
	    $loop2 = new WP_Query( array( 'post_type' => 'fw-portfolio', 'tax_query' => $categories_query, 'posts_per_page' => $pagination_per_page, 'paged' => $page, 'orderby' => $orderby, 'order' => $order ) );
	else :
		$loop = new WP_Query( array( 'post_type' => 'fw-portfolio', 'tax_query' => $categories_query, 'posts_per_page' => $limit, 'orderby' => $orderby, 'order' => $order ) );
	endif;


	/* Categories */
	$categories = get_terms('fw-portfolio-category');
	$categories_used = array();
	while ( $loop->have_posts() ) : $loop->the_post();
		foreach( wp_get_post_terms( get_the_ID(), 'fw-portfolio-category', array("fields" => "names")) as $item ) :
			if( !in_array( $item, $categories_used ) )  :
				$categories_used[] = $item;
			endif;
		endforeach;
	endwhile;
	$loop = ( isset( $loop2 ) ) ? $loop2 : $loop;


	/* WPbakery Page Builder */
	if( !isset( $atts['id'] ) && !is_array( $atts_categories ) ) :
		$atts_categories_data = explode( ',', $atts_categories );
		$atts_categories = array();
		foreach( $atts_categories_data as $item ) :
			 $this_item = get_term_by( 'slug', $item, 'fw-portfolio-category' );
			 if( isset( $this_item->term_id ) && $this_item->term_id > 0 ) :
				$atts_categories[] = (int)$this_item->term_id;
			 endif;
		endforeach;
	endif;
?>


<?php /* Visual Composer Optimization */ ?>
<?php if( jevelin_is_vc_front() && $layout != 'grid' ) : ?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			var portfolio_isotope_loaded_times = 0;
			var portfolio_isotope_loaded = setInterval(function() {
			    if( $.isFunction( $.fn.isotope ) ) {

					/* Portfolio Items */
					var $portfolio_element = $('#portfolio-<?php echo esc_attr( $id ); ?>');
					$portfolio_element.css( 'height', '0px' );
			        var $portfolio_filter = $portfolio_element.attr( 'data-all-filter' ) ? $portfolio_element.attr( 'data-all-filter' ) : '*';
			        var $portfolio = $portfolio_element.isotope({
			            itemSelector: '.sh-portfolio-item',
			            columnWidth: 0,
						percentPosition: true,
			            gutter: 0,
			            filter: $portfolio_filter,
			        }).isotope('reloadItems');
					$portfolio.imagesLoaded( function() {
							$portfolio.isotope('reloadItems');
						$portfolio.isotope('layout');

						if( $portfolio_element.height() > 0 ) {
							$portfolio.css( 'opacity', 1 );
						} else {
							// If isotope fails then create backup layout
							$portfolio_element.find('.sh-portfolio-item').css( 'display', 'inline-block' ).css( 'position', 'static' ).css( 'margin-right', '-4px' ).css( 'vertical-align', 'top' );
							$portfolio_element.css( 'height', 'auto' ).css( 'opacity', 1 );
						}
					});


				    /* Portfolio filter */
					var $portfolio_filter_element = $('#portfolio-filter-<?php echo esc_attr( $id ); ?>');
				    $portfolio_filter_element.on( 'click', 'span', function() {
				        var $filterValue = $(this).attr('data-filter');
				        if( $(this).parent().attr('data-type') != 'woocommerce' ) {
				            $(this).parent().parent().parent().find('.sh-portfolio').isotope({ filter: $filterValue });
				        } else {
				            $(this).parent().parent().parent().find('ul.products').isotope({ filter: $filterValue });
				        }

				        $(this).parent().children().removeClass('active');
				        $(this).addClass('active');
				    });

					clearInterval( portfolio_isotope_loaded );
				}


				// Close loop if not closed
				portfolio_isotope_loaded_times++;
				if( portfolio_isotope_loaded_times > 5 ) {
					clearInterval( portfolio_isotope_loaded );
				}
			}, 500);
		});
	</script>
<?php endif; ?>


<?php if( $spacing ) : ?>
	<style media="screen">
		#portfolio-<?php echo esc_attr( $id ); ?> {
			margin: 0 -<?php echo jevelin_addpx( $spacing ); ?>;
		}

		#portfolio-<?php echo esc_attr( $id ); ?> .sh-portfolio-item {
			padding: 0 <?php echo jevelin_addpx( $spacing ); ?>;
			margin-top: <?php echo jevelin_addpx( $spacing ); ?>;
			margin-bottom: <?php echo jevelin_addpx( $spacing ); ?>;
		}
	</style>
<?php endif; ?>


<?php if( $filter != 'none' && ( ( $pagination != true ) || $pagination_filters == true ) ) : ?>
	<div id="portfolio-filter-<?php echo esc_attr( $id ); ?>" class="sh-filter-container sh-portfolio-filter-<?php echo esc_attr( $filter ); ?>">
		<?php if( $filter_icon ) : ?>
			<div class="sh-filer-icon">
				<i class="<?php echo esc_attr( $filter_icon ); ?>"></i>
			</div>
		<?php endif; ?>

		<div class="sh-filter<?php echo ( $pagination_filters ) ? ' sh-filter-pagination' : ''; ?>" id="filter-<?php echo esc_attr( $id ); ?>">
			<span class="sh-filter-item<?php echo ( !isset( $cat_slug ) ) ? ' active' : ''; ?>" data-filter="<?php echo esc_attr( $filter_all_limit ); ?>" data-href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
				<div class="sh-filter-item-content"><?php esc_html_e( 'All', 'jevelin' ); ?></div>
			</span>
			<?php if( count( $atts_categories ) > 0 ) :
				$filter_category = ( $categories_order == 'desc' ) ? array_reverse( $categories ) : $categories;
			?>

				<?php foreach( $filter_category as $cat ) : ?>
					<?php if( in_array( $cat->term_id, $atts_categories ) && in_array( $cat->name, $categories_used ) ) : ?>
						<span class="sh-filter-item<?php echo ( isset( $cat_slug ) && $cat_slug == $cat->slug ) ? ' active' : ''; ?>" data-filter=".category-<?php echo esc_js( $cat->slug ); ?>" data-href="<?php echo esc_url( get_permalink( $post_id ) ); ?>?category=<?php echo esc_js( $cat->slug ); ?>">
							<div class="sh-filter-item-content"><?php echo esc_attr( $cat->name ); ?></div>
						</span>
					<?php endif; ?>
				<?php endforeach; ?>

			<?php else :
				$filter_category = ( $categories_order == 'desc' ) ? array_reverse( get_terms('fw-portfolio-category') ) : get_terms('fw-portfolio-category');
			?>

				<?php foreach( $filter_category as $cat ) : ?>
					<?php if( in_array( $cat->name, $categories_used ) ) : ?>
						<span class="sh-filter-item<?php echo ( isset( $cat_slug ) && $cat_slug == $cat->slug ) ? ' active' : ''; ?>" data-filter=".category-<?php echo esc_js( $cat->slug ); ?>" data-href="<?php echo esc_url( get_permalink( $post_id ) ); ?>?category=<?php echo esc_js( $cat->slug ); ?>">
							<div class="sh-filter-item-content"><?php echo esc_attr( $cat->name ); ?></div>
						</span>
					<?php endif; ?>
				<?php endforeach; ?>

			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>

<div id="portfolio-<?php echo esc_attr( $id ); ?>" class="sh-portfolio sh-portfolio-columns<?php echo esc_attr( $columns ); ?> sh-portfolio-style-<?php echo esc_attr( $style ); ?> sh-portfolio-layout-<?php echo esc_attr( $layout ); ?>" data-all-filter="<?php echo ( isset( $filter_all_limit ) && $filter_all_limit ) ? $filter_all_limit : '*'; ?>">
	<?php $j = 0;
	while ( $loop->have_posts() ) : $loop->the_post(); $j++; ?>

		<?php
			$class = array();

			$categories = wp_get_post_terms( get_the_ID(), 'fw-portfolio-category', array("fields" => "names"));
			$categories2 = wp_get_post_terms( get_the_ID(), 'fw-portfolio-category', array("fields" => "all"));
			foreach($categories2 as $category) :
				$class[] = 'category-'.esc_attr( $category->slug );
			endforeach;

			$class[] = 'sh-portfolio-item';
			$class[] = 'sh-portfolio-'.$style;
			$class[] = 'sh-portfolio-overlay-style-'.$overlay;
		?>

		<div class="<?php echo esc_attr( implode( " ", $class ) ); ?>">

			<?php if( jevelin_get_thumb( get_the_ID(), $image_ratio ) ) : ?>
				<div class="sh-portfolio-image">
					<div class="sh-portfolio-image-position">
						<?php if( $image_ratio == 'square' ) : ?>
							<?php echo jevelin_image_ratio( get_the_ID(), 'jevelin-square' ); ?>
						<?php else : ?>
							<img class="sh-portfolio-img" src="<?php echo jevelin_get_thumb( get_the_ID(), $image_ratio ); ?>" alt="<?php echo get_post(get_post_thumbnail_id())->post_title; ?>" />
						<?php endif; ?>
					</div>

					<?php if( $style == 'default2' ) : ?>
						<div class="sh-portfolio-title-container">
							<h3 class="sh-portfolio-title">
								<?php the_title(); ?>
							</h3>
						</div>
					<?php endif; ?>

					<?php if( $overlay != 'overlay4' && $overlay != 'overlay4 overlay5' ) : ?>
						<?php if( $page_link ) : ?>
							<a href="<?php the_permalink(); ?>" class="sh-portfolio-overlay sh-portfolio-<?php echo esc_attr( $overlay ); ?>">
						<?php endif; ?>
					<?php else : ?>
						<div class="sh-portfolio-overlay sh-portfolio-<?php echo esc_attr( $overlay ); ?>">
					<?php endif; ?>

						<?php if( $overlay != 'none') : ?>
							<?php if( $overlay == 'overlay4 overlay6' ) : ?>

								<div class="sh-portfolio-overlay4-container">
									<div class="sh-portfolio-overlay4-title">
										<?php the_title(); ?>
									</div>
									<div class="sh-portfolio-overlay4-categories">
										<?php
											foreach($categories2 as $category) :
												echo '<span href="'.esc_attr( get_home_url('/') ).'/'.esc_attr( $portfolio_categories_url ).'/'.esc_attr( $category->slug ).'/" class="sh-portfolio-category">'.esc_attr( $category->name ).'</span>';
												if( $category !== end($categories) ) :
													echo '<span class="sh-whitespace-small"></span>';
												endif;
											endforeach;
										?>
									</div>
								</div>

							<?php elseif( $overlay == 'overlay4' || $overlay == 'overlay4 overlay5' ) : ?>

								<div class="sh-portfolio-overlay4-container">

									<?php if( $overlay != 'overlay4 overlay5') : ?>
										<div class="sh-portfolio-overlay4-title">
											<?php the_title(); ?>
										</div>
										<div class="sh-portfolio-overlay4-categories">
											<?php
												foreach($categories2 as $category) :
													echo '<a href="'.esc_attr( get_home_url('/') ).'/'.esc_attr( $portfolio_categories_url ).'/'.esc_attr( $category->slug ).'/" class="sh-portfolio-category">'.esc_attr( $category->name ).'</a>';
													if( $category !== end($categories) ) :
														echo '<span class="sh-whitespace-small"></span>';
													endif;
												endforeach;
											?>
										</div>
									<?php endif; ?>

									<div class="sh-portfolio-overlay4-icons sh-table">

										<?php if( $page_link ) : ?>
							                <a href="<?php the_permalink(); ?>" class="sh-overlay-item sh-table-cell">
							                    <div class="sh-overlay-item-container">
							                        <i class="icon-link"></i>
							                    </div>
							                </a>
						                <?php endif; ?>

						                <a href="<?php echo jevelin_get_thumb( get_the_ID(), $image_ratio ); ?>" class="sh-overlay-item sh-table-cell" data-rel="lightcase:portfilio<?php echo esc_attr( $id ); ?>">
						                    <div class="sh-overlay-item-container">
						                        <i class="icon-magnifier-add"></i>
						                    </div>
						                </a>

									</div>
								</div>

							<?php elseif( $overlay == 'overlay3') : ?>

								<div class="sh-portfolio-overlay3-data">
									<div class="sh-portfolio-overlay3-title">
										<?php the_title(); ?>
									</div>
									<?php echo jevelin_get_excerpt( 10, get_the_excerpt() ); ?>

									<div class="sh-portfolio-overlay3-bar">
										<div class="sh-table">
											<div class="sh-portfolio-overlay1-icon sh-table-cell">
												<i class="icon-link"></i>
											</div>
											<div class="sh-portfolio-overlay1-categories sh-table-cell">
												<?php
													foreach($categories as $category) :
														echo '<span class="sh-portfolio-category">'.esc_attr( $category ).'</span>';
														if($category !== end($categories)) :
															echo '<span class="sh-whitespace-small"></span>';
														endif;
													endforeach;
												?>
											</div>
										</div>
									</div>
								</div>

							<?php elseif( $overlay == 'overlay2') : ?>

								<div class="sh-portfolio-overlay2-data">
									<div class="sh-portfolio-overlay2-title">
										<?php the_title(); ?>
									</div>
									<?php echo jevelin_get_excerpt( 10, get_the_excerpt() ); ?>
								</div>

								<div class="sh-portfolio-overlay2-bar">
									<div class="sh-table">
										<div class="sh-portfolio-overlay1-icon sh-table-cell">
											<i class="icon-link"></i>
										</div>
										<div class="sh-portfolio-overlay1-categories sh-table-cell">
											<?php
												foreach($categories as $category) :
													echo '<span class="sh-portfolio-category">'.esc_attr( $category ).'</span>';
													if($category !== end($categories)) :
														echo '<span class="sh-whitespace-small"></span>';
													endif;
												endforeach;
											?>
										</div>
									</div>
								</div>

							<?php else : ?>

								<div class="sh-portfolio-overlay1-bar">
									<div class="sh-table">
										<div class="sh-portfolio-overlay1-icon sh-table-cell">
											<i class="icon-link"></i>
										</div>
										<div class="sh-portfolio-overlay1-categories sh-table-cell">
											<?php
												foreach($categories as $category) :
													echo '<span class="sh-portfolio-category">'.esc_attr( $category ).'</span>';
													if($category !== end($categories)) :
														echo '<span class="sh-whitespace-small"></span>';
													endif;
												endforeach;
											?>
										</div>
									</div>
								</div>

							<?php endif; ?>
						<?php endif; ?>


					<?php if( $overlay != 'overlay4' && $overlay != 'overlay4 overlay5' ) : ?>
						<?php if( $page_link ) : ?>
							</a>
						<?php endif; ?>
					<?php else : ?>
						</div>
					<?php endif; ?>


				</div>
			<?php endif; ?>

			<?php if( $style == 'default' || $style == 'default-shadow' || $style == 'default2' ) : ?>

				<div class="sh-portfolio-content-container">
					<?php if( $style == 'default' || $style == 'default-shadow' ) : ?>
						<?php if( $page_link ) : ?>
							<a href="<?php the_permalink(); ?>">
								<h3 class="sh-portfolio-title">
									<?php the_title(); ?>
								</h3>
							</a>
						<?php else : ?>
							<a>
								<h3 class="sh-portfolio-title">
									<?php the_title(); ?>
								</h3>
							</a>
						<?php endif; ?>
					<?php endif; ?>

					<div class="sh-portfolio-description">
						<?php echo get_the_excerpt(); ?>
					</div>
				</div>

			<?php endif; ?>

			<?php if( $style == 'minimalistic' ) : ?>
				<div class="sh-portfolio-content-container">
					<div class="sh-portfolio-content-container-left">
						<?php if( $page_link ) : ?>
							<a href="<?php the_permalink(); ?>">
								<h3 class="sh-portfolio-title">
									<?php the_title(); ?>
								</h3>
							</a>
						<?php else : ?>
							<a>
								<h3 class="sh-portfolio-title">
									<?php the_title(); ?>
								</h3>
							</a>
						<?php endif; ?>
					</div>
					<div>
						<div class="sh-portfolio-categories">
							<?php $i = 0;
								foreach($categories as $category) :
									if( $i == 0 ) :
										echo '<span class="sh-portfolio-category">'.esc_attr( $category ).'</span>';
										$i++;
									endif;
								endforeach;
							?>
						</div>
					</div>
				</div>
			<?php endif; ?>

		</div>
	<?php endwhile; ?>
</div>

<?php if( $pagination ) : ?>
	<?php jevelin_pagination( $loop ); ?>
<?php endif; ?>

<?php endif; wp_reset_postdata(); ?>
