<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if( !function_exists( 'jevelin_shortcode_blog_posts_css' ) ) :
	function jevelin_shortcode_blog_posts_css( $data, $id_rand = '' ) {
		$atts = ( $id_rand ) ? $data : jevelin_shortcode_options( $data,'blog-posts' );
        $id = ( $id_rand ) ? $id_rand : $atts['id'];
		$margin_bottom = ( isset( $atts['margin_bottom'] ) ) ? esc_attr($atts['margin_bottom']) : '';

		$title_color = ( isset( $atts['title_color'] ) ) ? $atts['title_color'] : '';
		$title_size = ( isset( $atts['title_size'] ) ) ? $atts['title_size'] : '';

		$content_color = ( isset( $atts['content_color'] ) ) ? $atts['content_color'] : '';
		$content_size = ( isset( $atts['content_size'] ) ) ? $atts['content_size'] : '';

		$category_color = ( isset( $atts['category_color'] ) ) ? $atts['category_color'] : '';
		$category_size = ( isset( $atts['category_size'] ) ) ? $atts['category_size'] : '';
		$category_transform = ( isset( $atts['category_transform'] ) ) ? $atts['category_transform'] : 'default';

		$readmore_color = ( isset( $atts['readmore_color'] ) ) ? $atts['readmore_color'] : '';
		$readmore_size = ( isset( $atts['readmore_size'] ) ) ? $atts['readmore_size'] : '';
		$readmore_transform = ( isset( $atts['readmore_transform'] ) ) ? $atts['readmore_transform'] : 'default';
		ob_start(); ?>


			<?php if( $margin_bottom ) : ?>
				#recent-posts-<?php echo esc_attr( $id ); ?> article.post-item {
					margin-bottom: <?php echo jevelin_addpx( $margin_bottom ); ?>;
				}
			<?php endif; ?>


			<?php if( $title_color || $title_size ) : ?>
				#recent-posts-<?php echo esc_attr( $id ); ?> article.post-item .post-title,
				#recent-posts-<?php echo esc_attr( $id ); ?> article.post-item .post-title > * {
					<?php if( $title_color ) : ?>
						color: <?php echo esc_attr( $title_color ); ?>;
					<?php endif; ?>

					<?php if( $title_size ) : ?>
						font-size: <?php echo esc_attr( $title_size ); ?>;
					<?php endif; ?>
				}
			<?php endif; ?>


			<?php if( $content_color || $content_size ) : ?>
				#recent-posts-<?php echo esc_attr( $id ); ?> article.post-item .post-content,
				#recent-posts-<?php echo esc_attr( $id ); ?> article.post-item .post-content > * {
					<?php if( $content_color ) : ?>
						color: <?php echo esc_attr( $content_color ); ?>;
					<?php endif; ?>

					<?php if( $content_size ) : ?>
						font-size: <?php echo esc_attr( $content_size ); ?>;
					<?php endif; ?>
				}
			<?php endif; ?>


			<?php if( $category_color || $category_size || $category_transform ) : ?>
				#recent-posts-<?php echo esc_attr( $id ); ?> article.post-item .post-meta-categories,
				#recent-posts-<?php echo esc_attr( $id ); ?> article.post-item .post-meta-categories > * {
					<?php if( $category_color ) : ?>
						color: <?php echo esc_attr( $category_color ); ?>!important;
					<?php endif; ?>

					<?php if( $category_size ) : ?>
						font-size: <?php echo esc_attr( $category_size ); ?>;
					<?php endif; ?>

					<?php if( $category_transform && $category_transform != 'default' ) : ?>
						text-transform: <?php echo esc_attr( $category_transform ); ?>!important;
					<?php endif; ?>
				}
			<?php endif; ?>


			<?php if( $readmore_color || $readmore_size || $category_transform ) : ?>
				#recent-posts-<?php echo esc_attr( $id ); ?> article.post-item .post-readmore > div:first-child {
					<?php if( $readmore_color ) : ?>
						color: <?php echo esc_attr( $readmore_color ); ?>!important;
					<?php endif; ?>

					<?php if( $readmore_size ) : ?>
						font-size: <?php echo esc_attr( $readmore_size ); ?>;
					<?php endif; ?>

					<?php if( $readmore_transform && $readmore_transform != 'default' ) : ?>
						text-transform: <?php echo esc_attr( $readmore_transform ); ?>!important;
					<?php endif; ?>
				}
			<?php endif; ?>

        <?php $css = ob_get_contents(); ob_end_clean();
    	if( $id_rand ) : echo jevelin_echo_style( $css ); else : wp_add_inline_style( 'jevelin-responsive', jevelin_compress( $css ) ); endif;
	}
	add_action('fw_ext_shortcodes_enqueue_static:blog_posts','jevelin_shortcode_blog_posts_css');
endif;
?>
