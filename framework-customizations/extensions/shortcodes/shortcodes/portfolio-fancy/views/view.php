<?php
if( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Portfolio Fancy HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
if( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
if( function_exists('jevelin_portfolio_gallery_images') ) :
	global $post; $post_id = ( isset( $post->ID ) && $post->ID > 0 ) ? $post->ID : '';

	if( function_exists( 'jevelin_portfolio_get_settings' ) ) :
		$ext_portfolio_settings = jevelin_portfolio_get_settings();
	else :
		$ext_portfolio_instance = fw()->extensions->get( 'portfolio' );
		$ext_portfolio_settings = $ext_portfolio_instance->get_settings();
	endif;

	$portfolio_categories_url = $ext_portfolio_settings['taxonomy_slug'];
	$page_link = ( isset( $atts['page_link'] ) && $atts['page_link'] == true ) ? true : false;
	$pagination = ( isset( $atts['pagination'] ) && $atts['pagination'] == true ) ? true : false;
	$pagination_filters = ( isset( $atts['pagination_filters'] ) && $pagination == true && $atts['pagination_filters'] == true ) ? true : false;
	$pagination_per_page = ( isset( $atts['pagination_per_page'] ) && is_numeric($atts['pagination_per_page']) ) ? intval( $atts['pagination_per_page'] ) : 6;
	$filter_all_limit = ( isset( $atts['filter_all_limit'] ) && $atts['filter_all_limit'] > 0 ) ? '*:nth-child(-n+'.$atts['filter_all_limit'].')' : '*';
	$image_ratio = ( isset( $atts['image_ratio'] ) ) ? $atts['image_ratio'] : 'fluid';
	$filter = ( isset( $atts['filter'] ) ) ? $atts['filter'] : 'default';
	$filter_icon = ( isset( $atts['filter_icon'] ) ) ? $atts['filter_icon'] : '';
	$atts_categories = ( isset( $atts['categories'] ) ) ? $atts['categories'] : array();
	$filter_alignment = ( isset( $atts['filter_alignment'] ) ) ? $atts['filter_alignment'] : 'center';
	$filter_mobile_alignment = ( isset( $atts['filter_mobile_alignment'] ) ) ? $atts['filter_mobile_alignment'] : 'center';
	$columns = ( isset( $atts['columns'] ) ) ? $atts['columns'] : '3';


	/* Portfolios */
	$categories_query = array();
	if( is_array( $atts_categories ) && count( $atts_categories ) > 0 ) :
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

	$orderby = ( isset($atts['order_by']) && $atts['order_by'] ) ? esc_attr( $atts['order_by'] ) : 'post_date';
	$order = ( isset($atts['order']) && $atts['order'] ) ? esc_attr( $atts['order'] ) : 'desc';
	$limit = ( isset( $atts['limit'] ) && is_numeric( $atts['limit'] ) ) ? intval( $atts['limit'] ) : 6;

	if( $pagination ) :
		if( is_front_page() ) :
			$page = (get_query_var('page')) ? get_query_var('page') : 1;
		else :
			$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
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

		$loop = new WP_Query( array( 'post_type' => 'fw-portfolio', 'orderby' => $orderby, 'order' => $order ) );
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
<?php if( jevelin_is_vc_front() ) : ?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			var portfolio_isotope_failed = 0;
			var portfolio_isotope_loaded_times = 0;
			var portfolio_isotope_loaded = setInterval(function() {
			    if( $.isFunction( $.fn.isotope ) ) {

					/* Portfolio Items */
					var $portfolio_element = $('#portfolio-fancy-<?php echo esc_attr( $id ); ?>');
					$portfolio_element.css( 'height', '0px' );
					var $portfolio_filter_element = $('#portfolio-fancy-filter-<?php echo esc_attr( $id ); ?>');
					var $portfolio = $portfolio_element.isotope({
					    itemSelector: '.sh-portfolio-fancy-item',
					    columnWidth: 0,
					    gutter: 0,
					}).isotope('reloadItems');


				    $portfolio.imagesLoaded( function() {
						if( $portfolio_element.height() > 0 ) {
							var time = 0;
					        $portfolio_filter_element.find('.sh-portfolio-fancy-item').each( function() {
					            var self = $(this);
					            if( self.isVisible() ) {
					                setTimeout( function(){
					                    self.addClass( 'sh-portfolio-fancy-item-active' );
					                }, time);
					                time += 300;
					            } else if( self.isVisibleAbove() ) {
					                self.addClass( 'sh-portfolio-fancy-item-active' );
					            }
					        });
					        $portfolio.isotope('layout');
						} else {
							// If isotope fails then create backup layout
							$portfolio_element.find('.sh-portfolio-fancy-item').css( 'display', 'inline-block' ).css( 'position', 'static' ).css( 'margin-right', '-4px' ).css( 'vertical-align', 'top' ).css( 'opacity', '1' );
							$portfolio_element.css( 'height', '' ).css( 'opacity', 1 );
						}
				    });


					$(window).load(function (){
					    $(window).scroll(function() {
							if( !portfolio_isotope_failed ) {
						        clearTimeout(window.scrollFinished);
						        window.scrollFinished = setTimeout(function(){

						            var time2 = 0;
						            $portfolio_element.find('.sh-portfolio-fancy-item:not(.sh-portfolio-fancy-item-active)').each( function() {
						                var self = $(this);
						                if( self.isVisible() ) {
						                    setTimeout( function(){
						                        self.addClass( 'sh-portfolio-fancy-item-active' );
						                    }, time2);
						                    time2 += 300;
						                }
						            });

						        }, 100);
							}
					    });
					});


					/* Portfolio fancy filter */
					$portfolio_filter_element.on( 'click', 'span', function() {
					    var filterValue = $(this).attr('data-filter');
					    $(this).parent().parent().parent().find('.sh-portfolio-fancy .sh-portfolio-fancy-item').each( function() {
					        $(this).removeClass('sh-portfolio-fancy-item-active').addClass('sh-portfolio-fancy-item-active-cat');
					    });
					    $(this).parent().parent().parent().find('.sh-portfolio-fancy').isotope({ filter: filterValue });

					    $(this).parent().children().removeClass('active');
					    $(this).addClass('active');
					});

					clearInterval( portfolio_isotope_loaded );
				}


				// Close loop if not closed
				portfolio_isotope_loaded_times++;
				if( portfolio_isotope_loaded_times > 50 ) {
					clearInterval( portfolio_isotope_loaded );
				}
			}, 100);
		});
	</script>
<?php endif; ?>


<?php if( $filter != 'none' && ( ( $pagination != true ) || $pagination_filters == true ) ) : ?>
	<div id="portfolio-fancy-filter-<?php echo esc_attr( $id ); ?>" class="sh-filter-container sh-filter-fancy-container sh-portfolio-filter-<?php echo esc_attr( $filter ); ?> sh-portfolio-filter-alignment-<?php echo esc_attr( $filter_alignment ); ?> sh-portfolio-filter-mobile-alignment-<?php echo esc_attr( $filter_mobile_alignment ); ?>">
		<?php if( $filter_icon ) : ?>
			<div class="sh-filer-icon">
				<i class="<?php echo esc_attr( $filter_icon ); ?>"></i>
			</div>
		<?php endif; ?>

		<div class="sh-filter<?php echo ( $pagination_filters ) ? ' sh-filter-pagination' : ''; ?>" id="filter-<?php echo esc_attr( $id ); ?>">
			<span class="sh-filter-item<?php echo ( !isset( $cat_slug ) ) ? ' active' : ''; ?>" data-filter="<?php echo esc_attr( $filter_all_limit ); ?>" data-href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
				<div class="sh-filter-item-content"><?php esc_html_e( 'All', 'jevelin' ); ?></div>
			</span>
			<?php if( is_array( $atts_categories ) && count( $atts_categories ) > 0 ) : ?>

				<?php foreach( $categories as $cat ) : ?>
					<?php if( in_array( $cat->term_id, $atts_categories ) && in_array( $cat->name, $categories_used ) ) : ?>
						<span class="sh-filter-item<?php echo ( isset( $cat_slug ) && $cat_slug == $cat->slug ) ? ' active' : ''; ?>" data-filter=".category-<?php echo esc_js( $cat->slug ); ?>" data-href="<?php echo esc_url( get_permalink( $post_id ) ); ?>?category=<?php echo esc_js( $cat->slug ); ?>">
							<div class="sh-filter-item-content"><?php echo esc_attr( $cat->name ); ?></div>
						</span>
					<?php endif; ?>
				<?php endforeach; ?>

			<?php else : ?>

				<?php foreach( get_terms('fw-portfolio-category') as $cat ) : ?>
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


<div id="portfolio-fancy-<?php echo esc_attr( $id ); ?>" class="sh-portfolio-fancy sh-portfolio-fancy-columns<?php echo esc_attr( $columns ); ?>">
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

		<?php
			$categories = wp_get_post_terms( get_the_ID(), 'fw-portfolio-category', array("fields" => "names"));
			$categories2 = wp_get_post_terms( get_the_ID(), 'fw-portfolio-category', array("fields" => "all"));
			$item_category = '';
			foreach($categories2 as $category) :
				$item_category.= ' category-'.esc_attr( $category->slug );
			endforeach;


			/* Lazy Loading */
			$lazy = jevelin_element_lazy_option( $atts );
			if( $lazy ) :
				$attachment_id = get_post_thumbnail_id( get_the_ID() );
				$ratio = 0;

				if( $attachment_id ) :
					$image_media = wp_get_attachment_metadata( $attachment_id );

					if( $image_ratio ) :
						$image_width = ( isset( $image_media['sizes'][$image_ratio]['width'] ) ) ? $image_media['sizes'][$image_ratio]['width'] : 0;
						$image_height = ( isset( $image_media['sizes'][$image_ratio]['height'] ) ) ? $image_media['sizes'][$image_ratio]['height'] : 0;
					endif;
					if( !isset( $image_width ) || !$image_width ) :
						$image_width = ( isset( $image_media['width'] ) ) ? $image_media['width'] : 0;
						$image_height = ( isset( $image_media['height'] ) ) ? $image_media['height'] : 0;
					endif;

					if( $image_width ) :
						$ratio = ( $image_height / $image_width ) * 100;
					endif;
				endif;
			endif;
		?>

		<div class="sh-portfolio-fancy-item<?php echo esc_attr( $item_category ); ?>" id="portfolio-<?php echo get_the_ID(); ?>">
			<div class="sh-portfolio-fancy-itemc-container">

				<?php if( $lazy && $image_width > 0 && $ratio ) :?>
					<div class="ratio-container" style="padding-top: <?php echo esc_attr( $ratio ); ?>%;">
						<div class="ratio-content">
							<img class="sh-image-url lazy" data-src="<?php echo jevelin_get_thumb( get_the_ID(), $image_ratio ); ?>" alt="" />
						</div>
					</div>
				<?php else : ?>
					<img class="sh-portfolio-img" src="<?php echo jevelin_get_thumb( get_the_ID(), $image_ratio ); ?>" alt="" />
				<?php endif; ?>

				<a href="<?php the_permalink(); ?>" class="sh-portfolio-fancy-item-overlay-bg"></a>
				<div class="sh-portfolio-fancy-item-overlay">
					<div class="sh-portfolio-fancy-item-overlay-container">
						<a href="<?php the_permalink(); ?>" class="sh-portfolio-fancy-item-overlay-title">
							<h3><?php the_title(); ?></h3>
						</a>
						<div class="sh-portfolio-fancy-item-overlay-categories">
							<?php
								foreach($categories2 as $category) :
									echo '<a href="'.esc_attr( get_site_url( get_current_blog_id() ) ).'/'.esc_attr( $portfolio_categories_url ).'/'.esc_attr( $category->slug ).'/" class="sh-portfolio-category sh-heading-font">'.esc_attr( $category->name ).'</a>';
									if( $category !== end($categories2) ) :
										echo '<span>,</span> ';
									endif;
								endforeach;
							?>
						</div>
						<a href="<?php echo jevelin_get_thumb( get_the_ID(), $image_ratio ); ?>" data-rel="lightcase:portfolio<?php echo esc_attr( $id ); ?>" class="sh-portfolio-fancy-item-overlay-lightbox">
							<i class="icon icon-size-fullscreen"></i>
						</a>
					</div>
				</div>
			</div>
		</div>

	<?php endwhile; ?>
</div>

<?php if( $pagination ) : ?>
	<?php jevelin_pagination( $loop ); ?>
<?php endif; ?>

<?php endif; ?>
