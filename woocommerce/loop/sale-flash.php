<?php
/**
 * Product loop sale flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$woo_style = jevelin_option( 'wc_style', 'style1' );
if( $woo_style == 'style3' ) :
	$sale_text = esc_html__( 'Sale', 'jevelin' );
	$outofstock_text = esc_html__( 'Out of Stock', 'jevelin' );
else :
	$sale_text = esc_html__( 'Sale!', 'jevelin' );
	$outofstock_text = esc_html__( 'Sold out', 'jevelin' );
endif;

if( ! $product->is_in_stock() ) :
	echo apply_filters( 'woocommerce_sale_flash', '<span class="sh-popover-mini sh-popover-mini-dark">' . $outofstock_text . '</span>', $post, $product );
elseif( $product->is_in_stock() && $product->is_on_sale() ) :
	echo apply_filters( 'woocommerce_sale_flash', '<span class="sh-popover-mini">' . $sale_text . '</span>', $post, $product );
endif;
?>
