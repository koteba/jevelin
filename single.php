<?php
/**
 * Single Post
 */
if( jevelin_framework_active() ) :
	$elements = jevelin_option( 'post_elements' );

	if( jevelin_post_option( jevelin_page_id(), 'post_layout', 'global_default' ) != 'global_default' ) :
		$layout_sidebar = esc_attr( jevelin_post_option( jevelin_page_id(), 'post_layout', 'default' ) );
	elseif( jevelin_option( 'post_layout' ) == 'sidebar-left' || jevelin_option( 'post_layout' ) == 'sidebar-right' ) :
		$layout_sidebar = esc_attr( jevelin_option( 'post_layout' ) );
	endif;

else :
	$layout_sidebar = 'sidebar-right';
endif;

get_header();
?>

	<?php if( 1  ) : ?>
		<div id="content" class="<?php if( isset($layout_sidebar) && $layout_sidebar ) : ?>content-with-<?php echo esc_attr( $layout_sidebar ); endif; ?>">
			<div class="blog-single blog-style-large">
				<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();

							get_template_part( 'content', 'format-'.get_post_format() ); ?>


							<?php /* Clear unclosed floats */ ?>
							<div class="sh-clear"></div>


							<?php /* Show page links navigation */ ?>
							<?php jevelin_page_links(); ?>


							<?php /* Show Tags */ ?>
							<?php if( count( wp_get_post_tags( get_the_ID() ) ) > 0 ) : ?>
								<div class="sh-blog-tags">
									<h5><?php esc_html_e( 'Tags In', 'jevelin' ); ?></h5>
									<div class="sh-blog-tags-list">
										<?php foreach( get_the_tags( get_the_ID() ) as $tag ) :
											$term_link = get_tag_link( $tag->term_id );
										?>
											<a href="<?php echo esc_url( $term_link ); ?>" class="sh-blog-tag-item">
												<?php echo esc_attr( $tag->name ); ?>
											</a>
										<?php endforeach; ?>
									</div>
								</div>
							<?php endif; ?>


							<div class="sh-blog-single-meta row">
								<div class="col-md-6 col-sm-6 col-xs-6">

									<?php /* Show social share */ ?>
									<?php if( !jevelin_framework_active() || ( isset($elements['share']) && $elements['share'] == true ) ) : ?>
										<div class="sh-blog-social">
											<?php jevelin_share(); ?>
										</div>
									<?php endif; ?>

								</div>
								<div class="col-md-6 col-sm-6">

									<?php /* Show next / previous post links */ ?>
									<?php if( !jevelin_framework_active() || ( isset($elements['prev_next']) && $elements['prev_next'] == true ) ) :
											$prev_post = get_previous_post();
											$next_post = get_next_post();
											$page_switcher = '<div class="sh-page-switcher">';

											if( isset($prev_post->ID) && get_permalink($prev_post->ID) ) :
												$page_switcher.= '<a class="sh-page-switcher-button" href="'.esc_url( get_permalink($prev_post->ID) ).'"><i class="ti-arrow-left"></i></a>';
											else :
												$page_switcher.= '<a class="sh-page-switcher-button sh-page-switcher-disabled" href="#"><i class="ti-arrow-left"></i></a>';
											endif;

											$page_switcher.= '<span class="sh-page-switcher-content">'.jevelin_count_posts().'</span>';

											if( isset($next_post->ID) && get_permalink($next_post->ID) ) :
												$page_switcher.= '<a class="sh-page-switcher-button" href="'.esc_url( get_permalink($next_post->ID) ).'"><i class="ti-arrow-right"></i></a>';
											else :
												$page_switcher.= '<a class="sh-page-switcher-button sh-page-switcher-disabled" href="#"><i class="ti-arrow-right"></i></a>';
											endif;

											$page_switcher.= '</div>';
											echo wp_kses_post( $page_switcher );
									endif; ?>

								</div>
							</div>


							<?php /* Show information about author */ ?>
							<?php if( ( !jevelin_framework_active() || ( isset($elements['athor_box']) && $elements['athor_box'] == true ) ) && get_the_author_meta( 'description' ) ) : ?>
								<div class="sh-post-author sh-table">
									<div class="sh-post-author-avatar sh-table-cell-top">
										<?php echo get_avatar( get_the_author_meta( 'ID' ), '185' ); ?>
									</div>
									<div class="sh-post-author-info sh-table-cell-top">
										<h4><?php the_author(); ?></h4>
										<div><?php the_author_meta( 'description' ); ?></div>
									</div>
								</div>
							<?php endif; ?>


							<?php /* Show related posts */ ?>
							<?php if( jevelin_option( 'post_related_posts', 'on' ) == 'on' ) : ?>
								<div class="sh-related-posts">
									<div class="sh-related-posts-title">
										<h3><?php esc_attr_e( 'Related Posts', 'jevelin' ); ?></h3>
									</div>
									<div class="blog-list blog-style-largeimage">
										<?php
										$categories = array();
										foreach( get_the_category( get_the_ID() ) as $category ) :
											$categories[] = $category->term_id;
										endforeach;

										$args = array(
											'post__not_in' => array( get_the_ID() ),
											'posts_per_page' => 3,
											'ignore_sticky_posts' => 1,
											'tax_query' => array(
												'relation' => 'AND',
												array(
													'taxonomy' => 'category',
													'field'    => 'term_id',
													'terms'    => $categories,
													'operator' => 'IN',
												),
												array(
													 'taxonomy' => 'post_format',
													 'field' => 'slug',
													 'terms' => array( 'post-format-quote', 'post-format-link' ),
													 'operator' => 'NOT IN'
												 )
											),
											'orderby' => 'rand'
										);
										$related_posts = new WP_Query( $args );

										if( $related_posts->post_count < 3 ) :
											$args = array(
												'post__not_in' => array( get_the_ID() ),
												'posts_per_page' => 3,
												'ignore_sticky_posts' => 1,
												'orderby' => 'rand'
											);
											$related_posts = new WP_Query( $args );
										endif;

										if( $related_posts->have_posts() ) :
											while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>

											<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
												<div class="post-container">
													<?php jevelin_popover( jevelin_post_option( get_the_ID(), 'post-popover' ) ); ?>

													<?php if( get_post_format() == 'link' ) : ?>

														<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-title post-title-format">
															<h2 itemprop="headline"><i class="post-format-icon icon-link"></i> <?php echo jevelin_post_option( get_the_ID(), 'post-url-title' ); ?></h2>
														</a>

														<div class="post-content">
															<p><?php echo jevelin_post_option( get_the_ID(), 'post-url' ); ?></p>
														</div>

													<?php elseif( get_post_format() == 'quote' ) : ?>

														<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-title post-title-format">
															<h2 itemprop="headline"><i class="post-format-icon ti-quote-left"></i> <?php echo jevelin_post_option( get_the_ID(), 'post-quote' ); ?></h2>
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
															<h2 itemprop="headline"><?php the_title(); ?></h2>
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
															<h2 itemprop="headline"><?php the_title(); ?></h2>
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
															<h2 itemprop="headline"><?php the_title(); ?></h2>
														</a>

													<?php else : ?>

														<div class="post-meta-thumb">
															<?php echo the_post_thumbnail(); ?>
															<?php jevelin_blog_overlay( jevelin_get_thumb( get_the_ID() ) ); ?>
														</div>
														<a href="<?php echo esc_url( get_permalink() ); ?>" class="post-title">
															<h2 itemprop="headline"><?php the_title(); ?></h2>
														</a>

													<?php endif; ?>

													<div class="post-meta post-meta-two">
														<?php jevelin_meta_two(); ?>
													</div>

												</div>
											</article>


											<?php endwhile;
											wp_reset_postdata();
										endif; ?>
									</div>
								</div>
							<?php endif; ?>








						<?php endwhile;

						/* Show comments */
						if( !defined('FW') || ( isset($elements['comments']) && $elements['comments'] == true ) ) :
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							if ( is_singular() ) :
								wp_enqueue_script( 'comment-reply' );
							endif;
						endif;

						else :
							get_template_part( 'content', 'none' );
						endif;
					?>

				</div>
			</div>
			<?php if( isset($layout_sidebar) && $layout_sidebar ) : ?>
				<div id="sidebar" class="<?php echo esc_attr( $layout_sidebar ); ?>">
					<?php get_sidebar(); ?>
				</div>
			<?php endif; ?>

	<?php else: ?>


		<?php
		$frontpage_id = 0;
		$post = get_post( $frontpage_id );
		if( $post->post_content ) :

			Vc_Manager::getInstance()->vc()->addShortcodesCustomCss( $frontpage_id );
			$footer_css = ob_get_contents();
			ob_end_clean();

			if( $footer_css ) :
				echo $footer_css;
			else :
				$footer_custom_css = get_post_meta( $frontpage_id, '_wpb_shortcodes_custom_css', true );
				if( !empty( $footer_custom_css ) ) :
					echo '<style type="text/css">';
					echo $footer_custom_css;
					echo '</style>';
				endif;
			endif;
	?>
		<div id="content" class="page-content" style="margin-top: -1px;" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			<?php echo do_shortcode( $post->post_content ); ?>
		</div>
	<?php endif; //endif; ?>


	<?php endif; ?>
<?php get_footer(); ?>
