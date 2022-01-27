<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* WooCommerce Recent Product AJAX HTML
/*-----------------------------------------------------------------------------------*/
$id = '';
if( isset( $atts['id'] ) ) :
	$id = $atts['id'];
elseif( isset( $id_rand ) ) :
	$id = $id_rand;
endif;

$posts_per_page = ( $atts['posts_per_page'] > 0 ) ? $atts['posts_per_page'] : 12;
$load_more = ( isset( $atts['load_more'] ) && $atts['load_more'] > 0 ) ? $atts['load_more'] : 4;
$pagination_type = ( isset( $atts['pagination_type'] ) && $atts['pagination_type'] ) ? $atts['pagination_type'] : 'button';
$columns = ( isset( $atts['columns'] ) && $atts['columns'] > 0 ) ? $atts['columns'] : '4';
$class = '';

if( jevelin_option( 'wc_style' ) == 'style2' ) :
	$class = ' sh-woocommerce-products-style2';
elseif( jevelin_option( 'wc_style' ) == 'style3' ) :
	$class = ' sh-woocommerce-products-style3';
endif;
?>

<div class="sh-woocommerce-products<?php echo esc_attr( $class ); ?> sh-recent-products" id="woocommerce-products-ajax-<?php echo esc_attr( $id ); ?>" data-id="<?php echo intval( $columns ); ?>">

	<div class="vcg-woocommerce-products">
		<div class="woocommerce columns-<?php echo intval( $columns ); ?>">
			<ul class="products columns-<?php echo intval( $columns ); ?>">
				<?php
					$products = new WP_Query( array(
						'post_type' => 'product',
						'posts_per_page' => intval( $posts_per_page ),
						'paged' => 1,
					));
					if( $products->have_posts() ) :
						while ( $products->have_posts() ) : $products->the_post();
							wc_get_template_part( 'content', 'product' );
						endwhile;
					endif;
					wp_reset_postdata();
				?>
			</ul>
			<div class="sh-load-more sh-load-more-product sh-heading-font <?php echo ( $pagination_type == 'infinite' ) ? ' infinite' : ''; ?>"
			data-posts-per-page="<?php echo intval( $load_more ); ?>"
			data-paged="2"
			data-id="woocommerce-page-list">
				<?php
					if( $pagination_type == 'button' ) :
						esc_html_e( 'Load more', 'jevelin' );
					else :
						esc_html_e( 'Loading', 'jevelin' );
					endif;
				?>
			</div>
		</div>
	</div>

</div>
