<?php
/**
 * WooCommerce
 */

if( is_shop() ) :
	$id = wc_get_page_id('shop');
else :
	$id = get_the_ID();
endif;

if( !is_product() ) :
	if( jevelin_option( 'wc_layout' ) == 'sidebar-right' || jevelin_option( 'wc_layout' ) == 'sidebar-left') :
		$layout_sidebar = esc_attr( jevelin_option( 'wc_layout' ) );
	endif;
else :
	if( jevelin_option( 'wc_layout_single' ) == 'sidebar-right' || jevelin_option( 'wc_layout_single' ) == 'sidebar-left') :
		$layout_sidebar = esc_attr( jevelin_option( 'wc_layout_single' ) );
	endif;
endif;

$class = '';
if( jevelin_option( 'wc_style' ) == 'style2' ) :
	$class = ' sh-woocommerce-products-style2';
elseif( jevelin_option( 'wc_style' ) == 'style3' ) :
	$class = ' sh-woocommerce-products-style3';
endif;

get_header();
?>

<div class="woocomerce-styling<?php echo esc_attr( $class ); ?>">
	<div id="content" class="<?php if( isset($layout_sidebar) && $layout_sidebar ) : ?>content-with-<?php echo esc_attr( $layout_sidebar ); endif; ?>">
		<?php woocommerce_content(); ?>
	</div>
	<?php if( isset($layout_sidebar) && $layout_sidebar ) : ?>
		<div id="sidebar" class="<?php echo esc_attr( $layout_sidebar ); ?>">
			<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
