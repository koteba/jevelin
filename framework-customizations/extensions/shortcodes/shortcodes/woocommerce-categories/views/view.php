<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* WooCommerce Categories HTML
/*-----------------------------------------------------------------------------------*/
$id = '';
if( isset( $atts['id'] ) ) :
	$id = $atts['id'];
elseif( isset( $id_rand ) ) :
	$id = $id_rand;
endif;

$columns = ( isset( $atts['columns'] ) ) ? $atts['columns'] : '3';
?>
<div class="sh-woocommerce-categories" id="woocommerce-categories-<?php echo esc_attr( $id ); ?>" data-id="<?php echo intval( $columns ); ?>">
	<div class="row">
		<?php
		$categories_type = 'include';
		$categories_query = array();
		if( isset( $atts['categories'] ) && isset( $atts['categories'][0] ) ) :
			if( !isset( $atts['id'] ) ) :
				$categories_type = 'name';
				$categories_query = explode( ',', $atts['categories'] );
			else :
				$categories_query = $atts['categories'];
			endif;
		endif;
		$order = ( isset( $atts['order'] ) && $atts['order'] ) ? esc_attr( $atts['order'] ) : 'desc';

		$class_columns = 'col-md-6 col-sm-6';
		if( ( $columns == 3 && !isset( $atts['categories'][0] ) ) || ( $columns == 3 && count( $categories_query ) > 2 ) ) :
			$class_columns = 'col-md-4 col-sm-4';
		endif;
		$categories = get_categories( array( 'taxonomy' => 'product_cat', $categories_type => $categories_query, 'empty' => 1 ) );


		/* Categories order */
		if( is_array( $categories ) && count( $categories ) ) :

			$categories_new = array();
			foreach( $categories as $category ) :
				$categories_new[ $category->cat_ID ] = $category;
			endforeach;
			ksort( $categories_new );
			$categories = $categories_new;

		endif;

		if( $order == 'desc' ) :
			$categories = array_reverse( $categories );
		endif;


		/* Display categories */
		foreach( $categories as $cat ) :
			$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id ); ?>

			<div class="<?php echo esc_attr( $class_columns ); ?> sh-woocommerce-categories-item">
				<a href="<?php echo get_term_link( $cat->slug, 'product_cat' ); ?>">
					<div class="sh-ratio">
			            <div class="sh-ratio-container">
			                <div class="sh-ratio-content sh-woocommerce-categories-content">
								<div class="sh-woocommerce-categories-thumb" style="background-image: url(<?php echo esc_url( $image ); ?>);"></div>
								<h3>
									<?php echo esc_attr( $cat->name ); ?> <span class="sh-woocommerce-categories-count"><?php echo esc_attr( $cat->count ); ?></span>
								</h3>
			                </div>
			            </div>
			        </div>
				</a>
			</div>

		<?php endforeach; ?>
	</div>
</div>
