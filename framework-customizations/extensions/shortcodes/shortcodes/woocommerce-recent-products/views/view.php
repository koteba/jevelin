<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* WooCommerce Recent Product HTML
/*-----------------------------------------------------------------------------------*/
$id = '';
if( isset( $atts['id'] ) ) :
	$id = $atts['id'];
elseif( isset( $id_rand ) ) :
	$id = $id_rand;
endif;

$per_page = ( isset( $atts['per_page'] ) ) ? $atts['per_page'] : '12';
$columns = ( isset( $atts['columns'] ) ) ? $atts['columns'] : '5';
$filter = ( isset( $atts['filter'] ) ) ? $atts['filter'] : 'none';
$order_by = ( isset( $atts['order_by'] ) ) ? $atts['order_by'] : 'date';
$order = ( isset( $atts['order'] ) ) ? $atts['order'] : 'desc';

$class = '';
$class2 = '';

if( isset( $atts['carousel'] ) && $atts['carousel'] == true ) :
	$class = ' sh-recent-products-carousel';
endif;

if( isset( $atts['style'] ) && $atts['style'] == 'style2' ) :
	$class2 = 'sh-woocommerce-products-style2';
endif;
?>

<div class="sh-woocommerce-products<?php echo esc_attr( $class ); ?> sh-recent-products" id="woocommerce-products-<?php echo esc_attr( $id ); ?>" data-id="<?php echo intval( $columns ); ?>">

	<?php if( $filter != 'none' ) : ?>
		<div class="sh-filter-container sh-portfolio-filter-<?php echo esc_attr( $filter ); ?>">
			<div class="sh-filter" id="filter-<?php echo esc_attr( $id ); ?>" data-type="woocommerce">
				<span class="sh-filter-item active" data-filter="*">
					<div class="sh-filter-item-content"><?php esc_html_e( 'All', 'jevelin' ); ?></div>
				</span>
				<?php foreach( get_terms('product_cat') as $cat ) : ?>
					<span class="sh-filter-item" data-filter=".product_cat-<?php echo esc_js( $cat->slug ); ?>">
						<div class="sh-filter-item-content"><?php echo esc_attr( $cat->name ); ?></div>
					</span>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>

	<div class="<?php echo esc_attr( $class2 ); ?>">
		<?php
			if ( class_exists( 'WooCommerce' ) ) :
				echo do_shortcode( '[recent_products per_page="'.esc_attr( $per_page ).'" columns="'.esc_attr( $columns ).'" orderby="'.esc_attr( $order_by ).'" order="'.esc_attr( $order ).'"]' );
			endif;
		?>
	</div>
</div>
