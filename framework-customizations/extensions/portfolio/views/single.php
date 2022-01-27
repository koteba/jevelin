<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

$custom_url = jevelin_post_option( get_the_ID(), 'custom_url' );
if( $custom_url ) :
	wp_redirect( esc_url( $custom_url ) );
	exit;
endif;


/* Define variable */
$fw_ext_projects_gallery_image = array(
	'featured-image' => array(
		'width'  => 223,
		'height' => 139,
		'crop'   => true
	),
	'gallery-image'  => array(
		'width'  => 700,
		'height' => 455,
		'crop'   => true
	)
);


if( function_exists( 'jevelin_portfolio_get_settings' ) ) :
	$ext_portfolio_settings = jevelin_portfolio_get_settings();
else :
	$ext_portfolio_instance = fw()->extensions->get( 'portfolio' );
	$ext_portfolio_settings = $ext_portfolio_instance->get_settings();
endif;

$fw_ext_projects_gallery_image = $fw_ext_projects_gallery_image['gallery-image'];
$portfolio_categories_url = $ext_portfolio_settings['taxonomy_slug'];
$portfolio_gallery_column = ( in_array( jevelin_option( 'portfolio_gallery_columns' ), array( 'columns3', 'columns4', 'columns5' ) ) ) ? jevelin_option( 'portfolio_gallery_columns' ) : 'columns3';
$portfolio_gallery_column_int = intval( str_replace( 'columns', '', $portfolio_gallery_column ) );
$portfilio_widgets = 'portfolio-widgets';


/* Full width */
if( jevelin_option( 'portfolio_single_page_layout', 'default' ) == 'full' ) :
	$container_class = ' sh-portfolio-single-container-full-width';
	$column_left = 'col-md-6';
	$column_right = 'col-md-6';
else :
	$container_class = '';
	$column_left = 'col-md-8';
	$column_right = 'col-md-4';
endif;


// Media
$categories = wp_get_post_terms( get_the_ID(), 'fw-portfolio-category', array( "fields" => "all" ) );
$portfolio_thumnails = jevelin_portfolio_gallery_images();
$portfolio_thumnails = is_array( $portfolio_thumnails ) ? $portfolio_thumnails : [];
$thumbnail_id = get_post_thumbnail_id();
if( jevelin_framework() == 'redux' && isset( $portfolio_thumnails[0] ) && !empty( $portfolio_thumnails[0]['id'] ) ) :
	foreach( $portfolio_thumnails as $key => $portfolio_thumnail ) :
		if( isset( $portfolio_thumnail['id'] ) ) :
			$portfolio_thumnails[$key]['attachment_id'] = $portfolio_thumnail['id'];
		endif;
	endforeach;
endif;


get_header();
?>

	<div class="sh-portfolio-single-container<?php echo esc_attr( $container_class ); ?>">

		<?php
			$prev_post = get_previous_post();
			$next_post = get_next_post();
			$page_switcher = '<div class="sh-page-switcher">';

			if( isset($prev_post->ID) && get_permalink($prev_post->ID) ) :
				$page_switcher.= '<a class="sh-page-switcher-button" href="'.esc_url( get_permalink($prev_post->ID) ).'"><i class="ti-arrow-left"></i></a>';
			else :
				$page_switcher.= '<a class="sh-page-switcher-button sh-page-switcher-disabled" href="#"><i class="ti-arrow-left"></i></a>';
			endif;

			if( isset($next_post->ID) && get_permalink($next_post->ID) ) :
				$page_switcher.= '<a class="sh-page-switcher-button" href="'.esc_url( get_permalink($next_post->ID) ).'"><i class="ti-arrow-right"></i></a>';
			else :
				$page_switcher.= '<a class="sh-page-switcher-button sh-page-switcher-disabled" href="#"><i class="ti-arrow-right"></i></a>';
			endif;

			$page_switcher.= '</div>';
		?>

		<?php while ( have_posts() ) : the_post(); ?>
		<?php
			// Is VC
			$post_content = get_the_content();
			$is_vc = ( $post_content && preg_match( '/vc_row/', $post_content ) ) ? ' sh-portfolio-single-description-vc' : '';
		?>


			<?php if( jevelin_post_option( get_the_ID(), 'style' ) == 'video-slider' ) : ?>

				<div class="sh-portfolio-single-slider">
					<?php if( jevelin_post_option( get_the_ID(), 'video' ) ) : ?>
						<div class="sh-portfolio-single-video">
							<div class="sh-ratio">
								<div class="sh-ratio-container">
									<div class="sh-ratio-content">
										<?php echo wp_oembed_get( esc_url( jevelin_post_option( get_the_ID(), 'video' ) ) ); ?>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<div class="sh-portfolio-single row">
						<div class="sh-portfolio-single-right <?php echo esc_attr( $column_left ); ?>">

							<div class="sh-portfolio-single-buttons">
								<?php echo wp_kses_post( $page_switcher ); ?>
							</div>

							<h1 class="sh-portfolio-single-title"><?php the_title(); ?></h1>
							<div class="sh-portfolio-single-description<?php echo esc_attr( $is_vc ); ?>"><?php the_content(); ?></div>

						</div>
						<div class="sh-portfolio-single-left <?php echo esc_attr( $column_right ); ?>">
							<?php if( jevelin_option('portfolio_share', true) == true ) : ?>
						    	<?php jevelin_share( 'portfolio' ); ?>
						    <?php endif; ?>
							<div class="sh-portfolio-single-info">
								<?php if( jevelin_post_option( get_the_ID(), 'info' ) ) : ?>
									<?php foreach ( jevelin_post_option( get_the_ID(), 'info' ) as $info ) : ?>
										<div class="sh-portfolio-single-info-item sh-table">
											<?php if( $info['icon'] ) : ?>
												<div class="sh-portfolio-single-info-left sh-table-cell-top">
													<i class="<?php echo esc_attr( $info['icon'] ); ?>"></i>
												</div>
											<?php endif; ?>
											<div class="sh-portfolio-single-info-right sh-table-cell-top">
												<div><strong><?php echo esc_attr( $info['title'] ); ?></strong></div>
												<div><?php echo jevelin_link_it( wp_kses_post( $info['description'] ) ); ?></div>
											</div>
										</div>
									<?php endforeach ?>
								<?php endif; ?>

								<?php if( jevelin_post_option( get_the_ID(), 'field_client' ) ) : ?>
									<div class="sh-portfolio-single-info-item sh-table">
										<div class="sh-portfolio-single-info-left sh-table-cell-top">
											<i class="icon-briefcase"></i>
										</div>
										<div class="sh-portfolio-single-info-right sh-table-cell-top">
											<div><strong><?php esc_html_e( 'Client', 'jevelin' ); ?></strong></div>
											<div><?php echo esc_attr( jevelin_post_option( get_the_ID(), 'field_client' ) ); ?></div>
										</div>
									</div>
								<?php endif; ?>
								<?php if( jevelin_post_option( get_the_ID(), 'field_link' ) ) : ?>
									<div class="sh-portfolio-single-info-item sh-table">
										<div class="sh-portfolio-single-info-left sh-table-cell-top">
											<i class="icon-link"></i>
										</div>
										<div class="sh-portfolio-single-info-right sh-table-cell-top">
											<div><strong><?php esc_html_e( 'URL', 'jevelin' ); ?></strong></div>
											<div>
												<a href="<?php echo esc_url( jevelin_post_option( get_the_ID(), 'field_link' )); ?>" target="_blank" class="sh-accent-color">
													<?php echo jevelin_gethost( esc_url( jevelin_post_option( get_the_ID(), 'field_link' ) ) ); ?>
												</a>
											</div>
										</div>
									</div>
								<?php endif; ?>

								<div class="sh-portfolio-single-info-item sh-table">
									<div class="sh-portfolio-single-info-left sh-table-cell-top">
										<i class="icon-folder-alt"></i>
									</div>
									<div class="sh-portfolio-single-info-right sh-table-cell-top">
										<div><strong><?php esc_html_e( 'Categories','jevelin' ); ?></strong></div>
										<div>
											<?php
												foreach( $categories as $category ) :
													echo '<a href="'.esc_attr( get_site_url( get_current_blog_id() ) ).'/'.esc_attr( $portfolio_categories_url ).'/'.esc_attr( $category->slug ).'/" class="sh-default-color">'.esc_attr( $category->name ).'</a>';
													if($category !== end($categories)) :
														echo ', ';
													endif;
												endforeach;
											?>
										</div>
									</div>
								</div>
							</div>


							<?php
							/*
							** Portfolio Widgets
							*/
							if( is_active_sidebar( $portfilio_widgets ) ) : ?>
								<div id="sidebar">
									<?php dynamic_sidebar( $portfilio_widgets ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

			<?php elseif( jevelin_post_option( get_the_ID(), 'style' ) == 'iframe-slider' ) : ?>

				<div class="sh-portfolio-single-slider">
					<?php if( jevelin_post_option( get_the_ID(), 'iframe' ) ) : ?>
						<div class="sh-portfolio-single-video">
							<div class="sh-ratio">
								<div class="sh-ratio-container">
									<div class="sh-ratio-content">
										<?php echo '<iframe src="'.esc_url(jevelin_post_option( get_the_ID(), 'iframe' )).'"></iframe>'; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>


					<div class="sh-portfolio-single row">
						<div class="sh-portfolio-single-right <?php echo esc_attr( $column_left ); ?>">

							<div class="sh-portfolio-single-buttons">
								<?php echo wp_kses_post( $page_switcher ); ?>
							</div>

							<h1 class="sh-portfolio-single-title"><?php the_title(); ?></h1>
							<div class="sh-portfolio-single-description<?php echo esc_attr( $is_vc ); ?>"><?php the_content(); ?></div>

						</div>
						<div class="sh-portfolio-single-left <?php echo esc_attr( $column_right ); ?>">
							<?php if( jevelin_option('portfolio_share', true) == true ) : ?>
						    	<?php jevelin_share( 'portfolio' ); ?>
						    <?php endif; ?>
							<div class="sh-portfolio-single-info">
								<?php if( jevelin_post_option( get_the_ID(), 'info' ) ) : ?>
									<?php foreach ( jevelin_post_option( get_the_ID(), 'info' ) as $info ) : ?>
										<div class="sh-portfolio-single-info-item sh-table">
											<?php if( $info['icon'] ) : ?>
												<div class="sh-portfolio-single-info-left sh-table-cell-top">
													<i class="<?php echo esc_attr( $info['icon'] ); ?>"></i>
												</div>
											<?php endif; ?>
											<div class="sh-portfolio-single-info-right sh-table-cell-top">
												<div><strong><?php echo esc_attr( $info['title'] ); ?></strong></div>
												<div><?php echo jevelin_link_it( wp_kses_post( $info['description'] ) ); ?></div>
											</div>
										</div>
									<?php endforeach ?>
								<?php endif; ?>

								<?php if( jevelin_post_option( get_the_ID(), 'field_client' ) ) : ?>
									<div class="sh-portfolio-single-info-item sh-table">
										<div class="sh-portfolio-single-info-left sh-table-cell-top">
											<i class="icon-briefcase"></i>
										</div>
										<div class="sh-portfolio-single-info-right sh-table-cell-top">
											<div><strong><?php esc_html_e( 'Client', 'jevelin' ); ?></strong></div>
											<div><?php echo esc_attr( jevelin_post_option( get_the_ID(), 'field_client' ) ); ?></div>
										</div>
									</div>
								<?php endif; ?>
								<?php if( jevelin_post_option( get_the_ID(), 'field_link' ) ) : ?>
									<div class="sh-portfolio-single-info-item sh-table">
										<div class="sh-portfolio-single-info-left sh-table-cell-top">
											<i class="icon-link"></i>
										</div>
										<div class="sh-portfolio-single-info-right sh-table-cell-top">
											<div><strong><?php esc_html_e( 'URL', 'jevelin' ); ?></strong></div>
											<div>
												<a href="<?php echo esc_url( jevelin_post_option( get_the_ID(), 'field_link' )); ?>" target="_blank" class="sh-accent-color">
													<?php echo jevelin_gethost( esc_url( jevelin_post_option( get_the_ID(), 'field_link' ) ) ); ?>
												</a>
											</div>
										</div>
									</div>
								<?php endif; ?>

								<div class="sh-portfolio-single-info-item sh-table">
									<div class="sh-portfolio-single-info-left sh-table-cell-top">
										<i class="icon-folder-alt"></i>
									</div>
									<div class="sh-portfolio-single-info-right sh-table-cell-top">
										<div><strong><?php esc_html_e( 'Categories','jevelin' ); ?></strong></div>
										<div>
											<?php
												foreach( $categories as $category ) :
													echo '<a href="'.esc_attr( get_site_url( get_current_blog_id() ) ).'/'.esc_attr( $portfolio_categories_url ).'/'.esc_attr( $category->slug ).'/" class="sh-default-color">'.esc_attr( $category->name ).'</a>';
													if($category !== end($categories)) :
														echo ', ';
													endif;
												endforeach;
											?>
										</div>
									</div>
								</div>
							</div>


							<?php
							/*
							** Portfolio Widgets
							*/
							if( is_active_sidebar( $portfilio_widgets ) ) : ?>
								<div id="sidebar">
									<?php dynamic_sidebar( $portfilio_widgets ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>


			<?php elseif( jevelin_post_option( get_the_ID(), 'style' ) == 'slider' || jevelin_post_option( get_the_ID(), 'style' ) == 'gallery-slider-dynamic' ) :
			$slider = jevelin_post_option( get_the_ID(), 'style' ); ?>


				<?php if( $slider == 'gallery-slider-dynamic' ) : ?>

					<div class="swiper-container sh-gallery-slider-dynamic">
						<div class="swiper-wrapper">
							<?php
								$thumbnail_id = get_post_thumbnail_id();
								$url = jevelin_get_small_thumb( $thumbnail_id, 'full' );
								if( $thumbnail_id > 0 && $url ) :
							?>

								<div class="swiper-slide">
									<img src="<?php echo esc_url( $url ); ?>" />
								</div>

							<?php endif; ?>


							<?php foreach( $portfolio_thumnails as $thumbnail ) :
								$url = jevelin_get_small_thumb( $thumbnail['attachment_id'], 'large' );
							?>

								<div class="swiper-slide">
									<img src="<?php echo esc_url( $url ); ?>" />
								</div>

							<?php endforeach ?>

						</div>
						<!-- Add Scrollbar -->
						<div class="swiper-scrollbar"></div>
					</div>


					<script type="text/javascript">
					jQuery(document).ready(function ($) {
						var mySwiper = new Swiper('.sh-gallery-slider-dynamic', {
						    slidesPerView : 'auto',
						    spaceBetween: 20,
							speed: 500,
							//centeredSlides: true,
						    scrollbar: {
						    	el: '.sh-gallery-slider-dynamic .swiper-scrollbar',
						    	hide: true,
						    },
						});
					});
					</script>

					<style media="screen">
					    .swiper-slide {
					      text-align: center;
					      font-size: 18px;
					      background: #fff;

					      /* Center slide text vertically */
					      display: -webkit-box;
					      display: -ms-flexbox;
					      display: -webkit-flex;
					      display: flex;
					      -webkit-box-pack: center;
					      -ms-flex-pack: center;
					      -webkit-justify-content: center;
					      justify-content: center;
					      -webkit-box-align: center;
					      -ms-flex-align: center;
					      -webkit-align-items: center;
					      align-items: center;
						  width: auto;
					    }

						.sh-gallery-slider-dynamic {
							margin-bottom: 45px;
							padding-bottom: 45px;
							margin-left: calc(-100vw/2 + 1200px/2 + 7.5px);
							margin-right: calc(-100vw/2 + 1200px/2 + 7.5px);
						}

						.sh-gallery-slider-dynamic .swiper-scrollbar {
							left: 0px;
							right: 0px;
							margin-left: 30px;
							margin-right: 30px;
							bottom: 0;
							width: auto;
							height: 3px;'
							background-color: #e7e7e7;
						}


						.sh-gallery-slider-dynamic  .swiper-scrollbar-drag {
							background-color: #a0a0a0;
						}

						.swiper-container,
						.swiper-slide img {
					    	height: 680px;
					    }

						@media screen and (min-width: 1025px) and (max-width: 1400px) {
							.swiper-container,
							.swiper-slide img {
						    	height: 500px;
						    }
						}

						@media (max-width: 1024px) {
							.sh-gallery-slider-dynamic {
								margin-right: 0;
								margin-left: 0px;
							}

							.swiper-container,
							.swiper-slide img {
						    	height: 300px;
						    }
						}
					</style>

				<?php else : ?>
					<div class="sh-portfolio-single-slider">
						<div class="sh-gallery<?php echo ( jevelin_option( 'portfolio_gallery_autoplay', 'off' ) == 'on' ) ? ' sh-gallery-autoplay' : ''; ?>">

							<?php
								$thumbnail_id = get_post_thumbnail_id();
								$url = jevelin_get_small_thumb( $thumbnail_id, 'full' );
								if( $thumbnail_id > 0 && $url ) :
							?>

								<div class="sh-ratio">
									<div class="sh-ratio-container">
										<div class="sh-ratio-content" style="background-image: url(<?php echo esc_url($url); ?>);">

											<div class="sh-overlay-style1">
												<div class="sh-table-full">
													<a href="<?php echo esc_url( $url ); ?>" class="sh-overlay-lightbox sh-table-cell" data-rel="lightcase:PortfolioGallery">
														<i class="icon-magnifier-add"></i>
													</a>
												</div>
											</div>

										</div>
									</div>
								</div>

							<?php endif; ?>
							<?php foreach( $portfolio_thumnails as $thumbnail ) :
								$url = jevelin_get_small_thumb( $thumbnail['attachment_id'], 'full' );
							?>

								<div class="sh-ratio">
									<div class="sh-ratio-container">
										<div class="sh-ratio-content" style="background-image: url(<?php echo esc_url($url); ?>);">

											<div class="sh-overlay-style1">
												<div class="sh-table-full">
													<a href="<?php echo esc_url( $url ); ?>" class="sh-overlay-lightbox sh-table-cell" data-rel="lightcase:PortfolioGallery">
														<i class="icon-magnifier-add"></i>
													</a>
												</div>
											</div>

										</div>
									</div>
								</div>

							<?php endforeach ?>
						</div>

					<?php endif; ?>


					<div class="sh-portfolio-single row">
						<div class="sh-portfolio-single-right <?php echo esc_attr( $column_left ); ?>">

							<div class="sh-portfolio-single-buttons">
								<?php echo wp_kses_post( $page_switcher ); ?>
							</div>

							<h1 class="sh-portfolio-single-title"><?php the_title(); ?></h1>
							<div class="sh-portfolio-single-description<?php echo esc_attr( $is_vc ); ?>"><?php the_content(); ?></div>

						</div>
						<div class="sh-portfolio-single-left <?php echo esc_attr( $column_right ); ?>">
							<?php if( jevelin_option('portfolio_share', true) == true ) : ?>
						    	<?php jevelin_share( 'portfolio' ); ?>
						    <?php endif; ?>
							<div class="sh-portfolio-single-info">
								<?php if( jevelin_post_option( get_the_ID(), 'info' ) ) : ?>
									<?php foreach ( jevelin_post_option( get_the_ID(), 'info' ) as $info ) : ?>
										<div class="sh-portfolio-single-info-item sh-table">
											<?php if( $info['icon'] ) : ?>
												<div class="sh-portfolio-single-info-left sh-table-cell-top">
													<i class="<?php echo esc_attr( $info['icon'] ); ?>"></i>
												</div>
											<?php endif; ?>
											<div class="sh-portfolio-single-info-right sh-table-cell-top">
												<div><strong><?php echo esc_attr( $info['title'] ); ?></strong></div>
												<div><?php echo jevelin_link_it( wp_kses_post( $info['description'] ) ); ?></div>
											</div>
										</div>
									<?php endforeach ?>
								<?php endif; ?>

								<?php if( jevelin_post_option( get_the_ID(), 'field_client' ) ) : ?>
									<div class="sh-portfolio-single-info-item sh-table">
										<div class="sh-portfolio-single-info-left sh-table-cell-top">
											<i class="icon-briefcase"></i>
										</div>
										<div class="sh-portfolio-single-info-right sh-table-cell-top">
											<div><strong><?php esc_html_e( 'Client', 'jevelin' ); ?></strong></div>
											<div><?php echo esc_attr( jevelin_post_option( get_the_ID(), 'field_client' ) ); ?></div>
										</div>
									</div>
								<?php endif; ?>
								<?php if( jevelin_post_option( get_the_ID(), 'field_link' ) ) : ?>
									<div class="sh-portfolio-single-info-item sh-table">
										<div class="sh-portfolio-single-info-left sh-table-cell-top">
											<i class="icon-link"></i>
										</div>
										<div class="sh-portfolio-single-info-right sh-table-cell-top">
											<div><strong><?php esc_html_e( 'URL', 'jevelin' ); ?></strong></div>
											<div>
												<a href="<?php echo esc_url( jevelin_post_option( get_the_ID(), 'field_link' )); ?>" target="_blank" class="sh-accent-color">
													<?php echo jevelin_gethost( esc_url( jevelin_post_option( get_the_ID(), 'field_link' ) ) ); ?>
												</a>
											</div>
										</div>
									</div>
								<?php endif; ?>

								<div class="sh-portfolio-single-info-item sh-table">
									<div class="sh-portfolio-single-info-left sh-table-cell-top">
										<i class="icon-folder-alt"></i>
									</div>
									<div class="sh-portfolio-single-info-right sh-table-cell-top">
										<div><strong><?php esc_html_e( 'Categories','jevelin' ); ?></strong></div>
										<div>
											<?php
												foreach( $categories as $category ) :
													echo '<a href="'.esc_attr( get_site_url( get_current_blog_id() ) ).'/'.esc_attr( $portfolio_categories_url ).'/'.esc_attr( $category->slug ).'/" class="sh-default-color">'.esc_attr( $category->name ).'</a>';
													if($category !== end($categories)) :
														echo ', ';
													endif;
												endforeach;
											?>
										</div>
									</div>
								</div>
							</div>


							<?php
							/*
							** Portfolio Widgets
							*/
							if( is_active_sidebar( $portfilio_widgets ) ) : ?>
								<div id="sidebar">
									<?php dynamic_sidebar( $portfilio_widgets ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

			<?php else : ?>

				<div class="sh-portfolio-single-default">
					<div class="sh-portfolio-single row">
						<div class="sh-portfolio-single-right <?php echo esc_attr( $column_left ); ?>">

							<?php if( jevelin_option( 'portfolio_gallery_slider', 'on' ) == 'on' ) : /* Carousel Layout */ ?>

								<script type="text/javascript">
									jQuery(document).ready( function($) {
										$('.sh-portfolio-single-gallery-slider-for').slick({
											slidesToShow: 1,
											slidesToScroll: 1,
											arrows: false,
											fade: true,
											asNavFor: '.sh-portfolio-single-gallery-slider-nav'
										});

										$('.sh-portfolio-single-gallery-slider-nav').slick({
											slidesToShow: <?php echo esc_attr( $portfolio_gallery_column_int ); ?>,
											slidesToScroll: 1,
											asNavFor: '.sh-portfolio-single-gallery-slider-for',
											dots: false,
											focusOnSelect: true,
											prevArrow: '<button type="button" class="sh-page-switcher-button sh-page-switcher-button-left"><i class="ti-arrow-left"></i></<button>',
									        nextArrow: '<button type="button" class="sh-page-switcher-button sh-page-switcher-button-right"><i class="ti-arrow-right"></i></<button>',
											responsive: [
								                {
								                    breakpoint: 1024,
								                    settings: {
								                        slidesToShow: 3,
								                    }
								                },{
								                    breakpoint: 600,
								                    settings: {
								                        slidesToShow: 2,
								                    }
								                }
								            ]
										});
									});
								</script>

								<div class="sh-portfolio-single-gallery-slider-for">
									<?php
										$thumbnail_id = get_post_thumbnail_id();
										$url = jevelin_get_small_thumb( $thumbnail_id, jevelin_option( 'portfolio_single_image', 'large' ) );
									?>

									<?php if( $url ) : ?>
										<div class="sh-portfolio-single-gallery-slider-item">
											<a href="<?php echo esc_url( $url ); ?>" data-rel="lightcase:leftgallery">
												<?php echo jevelin_image_ratio_by_thumbnail( $thumbnail_id, 'large', 'landscape' ); ?>
											</a>
										</div>
									<?Php endif; ?>

									<?php
									foreach( $portfolio_thumnails as $thumbnail ) :
										$attachment = get_post( $thumbnail['attachment_id'] );
										$image = jevelin_get_small_thumb( $thumbnail['attachment_id'], 'large' );
										$portfolio_title = ( isset( $attachment->post_title ) && $attachment->post_title ) ? $attachment->post_title : '';
									?>
										<div class="sh-portfolio-single-gallery-slider-item">
											<a href="<?php echo esc_url( $image ); ?>" title="<?php echo esc_attr( $portfolio_title ); ?>" data-rel="lightcase:leftgallery">
												<?php echo jevelin_image_ratio_by_thumbnail( $thumbnail['attachment_id'], 'large', 'landscape' ); ?>
											</a>
										</div>
									<?php endforeach ?>
								</div>

								<div class="sh-portfolio-single-gallery-slider-nav-container">
									<div class="sh-portfolio-single-gallery-slider-nav">
										<?php if( $url ) : ?>
											<div class="sh-portfolio-single-gallery-slider-item">
												<?php echo jevelin_image_ratio_by_thumbnail( $thumbnail_id, 'jevelin-square' ); ?>
											</div>
										<?Php endif; ?>

										<?php
										foreach( $portfolio_thumnails as $thumbnail ) :
											$attachment = get_post( $thumbnail['attachment_id'] );
											// $image = jevelin_get_small_thumb( $thumbnail['attachment_id'], 'jevelin-square' );
											// $portfolio_title = ( isset( $attachment->post_title ) && $attachment->post_title ) ? $attachment->post_title : '';
										?>
											<div class="sh-portfolio-single-gallery-slider-item">
												<?php echo jevelin_image_ratio_by_thumbnail( $thumbnail['attachment_id'], 'jevelin-square' ); ?>
											</div>
										<?php endforeach ?>
									</div>
								</div>

							<?php else : /* Standard Layout */ ?>

								<?php
									$thumbnail_id = get_post_thumbnail_id();
									$url = jevelin_get_small_thumb( $thumbnail_id, jevelin_option( 'portfolio_single_image', 'large' ) );
								?>
								<a href="<?php echo esc_url( $url ); ?>" rel="sh-lightbox[showcase]" class="sh-portfolio-single-image" title="<?php echo esc_attr( jevelin_get_image_alt( $thumbnail_id ) ); ?>">
									<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( jevelin_get_image_alt( $thumbnail_id ) ); ?>" />
								</a>

								<div class="sh-portfolio-single-gallery sh-portfolio-single-gallery-<?php echo $portfolio_gallery_column; ?>">
									<?php
									foreach( $portfolio_thumnails as $thumbnail ) :
										$attachment = get_post( $thumbnail['attachment_id'] );
										$image = jevelin_get_small_thumb( $thumbnail['attachment_id'], 'jevelin-square' );
										$portfolio_title = ( isset( $attachment->post_title ) && $attachment->post_title ) ? $attachment->post_title : '';
									?>
										<div class="sh-portfolio-single-gallery-item">
											<a href="<?php echo jevelin_get_small_thumb( $thumbnail['attachment_id'], 'large' ); ?>" title="<?php echo esc_attr( $portfolio_title ); ?>" rel="sh-lightbox[showcase]">
												<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $portfolio_title ); ?>" />
											</a>
										</div>
									<?php endforeach ?>
								</div>

							<?php endif; ?>
						</div>
						<div class="sh-portfolio-single-left <?php echo esc_attr( $column_right ); ?>">
							<div class="sh-portfolio-single-whitespace hidden-md hidden-lg"></div>
							<div class="sh-portfolio-single-buttons">
								<?php echo wp_kses_post( $page_switcher ); ?>
							</div>
							<h1 class="sh-portfolio-single-title"><?php the_title(); ?></h1>
							<div class="sh-portfolio-single-description<?php echo esc_attr( $is_vc ); ?>"><?php the_content(); ?></div>
							<?php if( jevelin_option('portfolio_share', true) == true ) : ?>
						    	<?php jevelin_share( 'portfolio' ); ?>
						    <?php endif; ?>
							<div class="sh-portfolio-single-info">
								<?php if( jevelin_post_option( get_the_ID(), 'info' ) ) : ?>
									<?php foreach ( jevelin_post_option( get_the_ID(), 'info' ) as $info ) : ?>
										<div class="sh-portfolio-single-info-item sh-table">
											<?php if( $info['icon'] ) : ?>
												<div class="sh-portfolio-single-info-left sh-table-cell-top">
													<i class="<?php echo esc_attr( $info['icon'] ); ?>"></i>
												</div>
											<?php endif; ?>
											<div class="sh-portfolio-single-info-right sh-table-cell-top">
												<div><strong><?php echo esc_attr( $info['title'] ); ?></strong></div>
												<div><?php echo jevelin_link_it( wp_kses_post( $info['description'] ) ); ?></div>
											</div>
										</div>
									<?php endforeach ?>
								<?php endif; ?>

								<?php if( jevelin_post_option( get_the_ID(), 'field_client' ) ) : ?>
									<div class="sh-portfolio-single-info-item sh-table">
										<div class="sh-portfolio-single-info-left sh-table-cell-top">
											<i class="icon-briefcase"></i>
										</div>
										<div class="sh-portfolio-single-info-right sh-table-cell-top">
											<div><strong><?php esc_html_e( 'Client', 'jevelin' ); ?></strong></div>
											<div><?php echo esc_attr( jevelin_post_option( get_the_ID(), 'field_client' ) ); ?></div>
										</div>
									</div>
								<?php endif; ?>
								<?php if( jevelin_post_option( get_the_ID(), 'field_link' ) ) : ?>
									<div class="sh-portfolio-single-info-item sh-table">
										<div class="sh-portfolio-single-info-left sh-table-cell-top">
											<i class="icon-link"></i>
										</div>
										<div class="sh-portfolio-single-info-right sh-table-cell-top">
											<div><strong><?php esc_html_e( 'URL', 'jevelin' ); ?></strong></div>
											<div>
												<a href="<?php echo esc_url( jevelin_post_option( get_the_ID(), 'field_link' )); ?>" target="_blank" class="sh-accent-color">
													<?php echo jevelin_gethost( esc_url( jevelin_post_option( get_the_ID(), 'field_link' ) ) ); ?>
												</a>
											</div>
										</div>
									</div>
								<?php endif; ?>

								<div class="sh-portfolio-single-info-item sh-table">
									<div class="sh-portfolio-single-info-left sh-table-cell-top">
										<i class="icon-folder-alt"></i>
									</div>
									<div class="sh-portfolio-single-info-right sh-table-cell-top">
										<div><strong><?php esc_html_e( 'Categories','jevelin' ); ?></strong></div>
										<div>
											<?php
												foreach( $categories as $category ) :
													echo '<a href="'.esc_attr( get_home_url( get_current_blog_id() ) ).'/'.esc_attr( $portfolio_categories_url ).'/'.esc_attr( $category->slug ).'/" class="sh-default-color">'.esc_attr( $category->name ).'</a>';
													if($category !== end($categories)) :
														echo ', ';
													endif;
												endforeach;
											?>
										</div>
									</div>
								</div>
							</div>


							<?php
							/*
							** Portfolio Widgets
							*/
							if( is_active_sidebar( $portfilio_widgets ) ) : ?>
								<div id="sidebar">
									<?php dynamic_sidebar( $portfilio_widgets ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

			<?php endif; ?>
		<?php endwhile; ?>

		<?php if( jevelin_option('portfolio_related', true) == true ) : ?>
			<div class="sh-portfolio-single-related">
				<h3><?php esc_html_e( 'Related items','jevelin' ); ?></h3>
				<div class="row">
					<?php
						$portfolio_items = new WP_Query(array(
							'post_type' => 'fw-portfolio',
							'posts_per_page' => 4,
							'orderby' => 'rand',
							'post_status' => 'publish',
							'post__not_in' => array( get_the_ID() )

						));
						while ( $portfolio_items->have_posts() ) : $portfolio_items->the_post();
							$item_category = '';
							foreach( $categories as $category ) :
								$item_category.= 'category-'.$category->slug.' ';
							endforeach;

							$thumb = jevelin_get_thumb( get_the_ID(), 'post-thumbnail' );
						?>

						<div class="sh-portfolio-single-related-mini col-md-3 col-sm-6 sh-portfolio-overlay-style-overlay4">

							<?php if( $thumb ) : ?>
								<div class="sh-portfolio-image">
									<a href="<?php echo get_permalink(); ?>">

										<div class="sh-portfolio-image-position">
											<img class="sh-portfolio-img" src="<?php echo esc_url( $thumb ); ?>" alt="" />
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

									</a>
								</div>
							<?php endif; ?>
							<a href="<?php the_permalink(); ?>">
								<h5>
									<?php the_title(); ?>
								</h5>
							</a>
							<div>
								<?php
									if( !is_numeric( strpos( get_the_content(), '[vc_row' ) ) ) :
										echo jevelin_get_excerpt( 15, get_the_content() );
									endif;
								?>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>

		<?php /* Portfolio Comments */
		if( jevelin_option( 'portfolio_comments', false ) == true ) : ?>
			<div class="sh-portfolio-comments">
				<?php
					comments_template();
					wp_enqueue_script( 'comment-reply' );
				?>
			</div>
		<?php endif; ?>

	</div>

<?php get_footer();
