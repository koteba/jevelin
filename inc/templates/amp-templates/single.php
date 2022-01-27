<?php
$this->load_parts( [ 'html-start' ] );
$post_format = get_post_format();
?>

<?php $this->load_parts( [ 'header' ] ); ?>

<article class="amp-wp-article">
	<header class="amp-wp-article-header">
		<h1 class="amp-wp-title"><?php echo esc_html( $this->get( 'post_title' ) ); ?></h1>
		<div class="">
			<?php $this->load_parts( apply_filters( 'amp_post_article_header_meta', [ 'meta-author', 'meta-time' ] ) ); ?>
		</div>
	</header>




	<?php if( $post_format == 'audio' ) :
	$audio_url  = jevelin_post_option( get_the_ID(), 'post-audio' );
	$audio_content = wp_oembed_get( $audio_url, [ 'width' => 900, 'height' => 450 ] ); ?>
		<?php if( $audio_url && $audio_content ) :
			$ampEmbedder = new \AMP_Content(
		        $audio_content,
		        apply_filters(
		            'amp_content_embed_handlers',
		            array(
		                'AMP_Twitter_Embed_Handler' => array(),
		                'AMP_YouTube_Embed_Handler' => array(),
		                'AMP_Instagram_Embed_Handler' => array(),
		                'AMP_Facebook_Embed_Handler' => array(),
		                'AMP_Gallery_Embed_Handler' => array(),
		            )
		        ),
				apply_filters(
		            'amp_content_sanitizers',
		            array(
		                'AMP_Style_Sanitizer' => array(),
		                'AMP_Img_Sanitizer' => array(),
		                'AMP_Video_Sanitizer' => array(),
		                'AMP_Audio_Sanitizer' => array(),
		                'AMP_Iframe_Sanitizer' => array(
		                    'add_placeholder' => true,
		                ),
		            )
		        ),
		        array(
		            'content_max_width' => $this->get('content_max_width'),
		        )
		    );
		?>

			<div class="amp-wp-article-media">
				<?php echo ( $ampEmbedder->get_amp_content() ); ?>
			</div>

		<?php endif; ?>
	<?php elseif( $post_format == 'video' ) :
	$video_url  = jevelin_post_option( get_the_ID(), 'post-video' );
	$video_content = wp_oembed_get( $video_url, [ 'width' => 900, 'height' => 600 ] ); ?>
		<?php if( $video_url && $video_content ) :
			$ampEmbedder = new \AMP_Content(
		        $video_content,
		        apply_filters(
		            'amp_content_embed_handlers',
		            array(
		                'AMP_Twitter_Embed_Handler' => array(),
		                'AMP_YouTube_Embed_Handler' => array(),
		                'AMP_Instagram_Embed_Handler' => array(),
		                'AMP_Facebook_Embed_Handler' => array(),
		                'AMP_Gallery_Embed_Handler' => array(),
		            )
		        ),
				apply_filters(
		            'amp_content_sanitizers',
		            array(
		                'AMP_Style_Sanitizer' => array(),
		                'AMP_Img_Sanitizer' => array(),
		                'AMP_Video_Sanitizer' => array(),
		                'AMP_Audio_Sanitizer' => array(),
		                'AMP_Iframe_Sanitizer' => array(
		                    'add_placeholder' => true,
		                ),
		            )
		        ),
		        array(
		            'content_max_width' => $this->get('content_max_width'),
		        )
		    );
		?>

			<div class="amp-wp-article-media">
				<?php echo ( $ampEmbedder->get_amp_content() ); ?>
			</div>

		<?php endif; ?>
	<?php else : ?>
		<?php $this->load_parts( [ 'featured-image' ] ); ?>
	<?php endif; ?>




	<div class="amp-wp-article-content">
		<?php echo $this->get( 'post_amp_content' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</div>

	<footer class="amp-wp-article-footer">
		<?php $this->load_parts( apply_filters( 'amp_post_article_footer_meta', [ 'meta-taxonomy' ] ) ); ?>
	</footer>


	<?php if( jevelin_option( 'single_related_posts', 'on' ) == 'on' ) : ?>
		<div class="amp-wp-article-related-posts">
			<h2>
				<?php esc_attr_e( 'Related posts', 'jevelin' ); ?>
			</h2>
			<div class="amp-wp-article-related-posts-list">
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
				$query = new WP_Query( $args );

				if( $query->post_count < 3 ) :
					$args = array(
						'post__not_in' => array( get_the_ID() ),
						'posts_per_page' => 3,
						'ignore_sticky_posts' => 1,
						'orderby' => 'rand'
					);
					$query = new WP_Query( $args );
				endif;

				if( $query->have_posts() ) :
					set_query_var( 'style', 'grid-simple' );
					while( $query->have_posts() ) : $query->the_post();
						$permalink = ( function_exists( 'amp_get_permalink' ) ) ? amp_get_permalink( get_the_ID() ) : get_permalink();
						$post_format = get_post_format();
					?>

						<div class="amp-wp-article-related-posts-item">
							<a href="<?php echo esc_url( $permalink ); ?>">

								<?php
								$audio_url = jevelin_post_option( get_the_ID(), 'post-audio' );
								$video_url = jevelin_post_option( get_the_ID(), 'post-video' );

								if( $post_format == 'audio' && $audio_url ) :
								$audio_content = wp_oembed_get( $audio_url ); ?>
									<?php if( $audio_url && $audio_content ) : ?>

										<div class="amp-wp-article-media sh-ratio">
											<div class="sh-ratio-container">
												<div class="sh-ratio-content">
													<?php echo ( $audio_content ); ?>
												</div>
											</div>
										</div>

									<?php endif; ?>
								<?php elseif( $post_format == 'video' && $video_url ) :
								$video_content = wp_oembed_get( $video_url ); ?>
									<?php if( $video_url && $video_content ) : ?>

										<div class="amp-wp-article-media sh-ratio">
											<div class="sh-ratio-container">
												<div class="sh-ratio-content">
													<?php echo ( $video_content ); ?>
												</div>
											</div>
										</div>

									<?php endif; ?>
								<?php elseif( has_post_thumbnail() ) : ?>

									<div class="sh-ratio">
										<div class="sh-ratio-container">
											<div class="sh-ratio-content" style="background-image: url( <?php echo esc_url( the_post_thumbnail_url( 'jevelin-landscape-small' ) ); ?>);"></div>
										</div>
									</div>

								<?php endif; ?>


								<h3>
									<?php the_title(); ?>
								</h3>

								<div class="amp-wp-article-related-posts-meta">
									<div class="amp-wp-meta">
										<?php esc_attr_e( 'by', 'jevelin' ); ?>
										<strong>
											<?php echo get_the_author(); ?>
										</strong>
									</div>
									<div class="amp-wp-meta">
										<?php if( jevelin_option( 'post_date_format', 'friendly' ) == 'friendly' ) : ?>
				                            <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ' . esc_html__( 'ago', 'jevelin' ); ?>
				                        <?php else : ?>
				                            <?php echo get_the_date(); ?>
				                        <?php endif; ?>
									</div>
								</div>
							</a>
						</div>

					<?php endwhile; ?>
				<?php endif; wp_reset_postdata(); ?>
			</div>
		<?php endif; ?>

		<footer class="amp-wp-article-footer">
			<?php $this->load_parts( apply_filters( 'amp_post_article_footer_meta', [ 'meta-comments-link' ] ) ); ?>
		</footer>



	</div>
</article>

<?php $this->load_parts( [ 'footer' ] ); ?>

<?php
$this->load_parts( [ 'html-end' ] );
