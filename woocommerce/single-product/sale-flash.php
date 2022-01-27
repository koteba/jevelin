<?php
/**
 * Single Product Sale Flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

if( !$product->is_in_stock() ) :
	echo apply_filters( 'woocommerce_sale_flash', '<span class="sh-popover-mini sh-popover-mini-dark">' . esc_html__( 'Sold out', 'jevelin' ) . '</span>', $post, $product );
elseif( $product->is_in_stock() && $product->is_on_sale() ) :
	echo apply_filters( 'woocommerce_sale_flash', '<span class="sh-popover-mini">' . esc_html__( 'Sale!', 'jevelin' ) . '</span>', $post, $product );
endif;
?>
