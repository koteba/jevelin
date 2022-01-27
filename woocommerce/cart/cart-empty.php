<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */
defined( 'ABSPATH' ) || exit;
/*
 * @hooked wc_empty_cart_message - 10
 */
do_action( 'woocommerce_cart_is_empty' );
?>



<?php if( jevelin_style() == 3 ) : ?>

<style media="screen">
.sh-jevelin-style3 .cart-empty {
	margin: 100px 0;
}

.sh-jevelin-style3 .cart-empty h2 {
	font-size: 30px;
	margin-bottom: 15px;
}

.sh-jevelin-style3 .cart-empty p {
	font-size: 16px;
	font-weight: 500;
	color: #8d8d8d;
}

.sh-jevelin-style3 .cart-empty-icon {
	display: inline-block;
	position: relative;
	margin-bottom: 45px;
}

.sh-jevelin-style3 .cart-empty-icon > i {
	font-size: 82px;
}

.sh-jevelin-style3 .cart-empty-icon-indicator {
	display: block;
	position: absolute;
	font-size: 20px;
	background-color: #3a3a3a;
	color: #fff;
	width: 40px;
	height: 40px;
	line-height: 40px;
	right: -10px; bottom: -10px;
	border-radius: 100px;
	animation: spin 4s ease forwards;
	transform:rotate(-180deg);
}

@keyframes spin {
	100% {
		transform:rotate(0deg);
	}
}

.sh-jevelin-style3  .return-to-shop {
	margin-top: 35px;
}
</style>


	<div class="text-center">
		<div class="cart-empty">
			<div class="cart-empty-icon">
				<i class="shi shi-cart"></i>
				<div class="cart-empty-icon-indicator">
					<i class="fa fa-times" aria-hidden="true"></i>
				</div>
			</div>

			<h2>
				<?php esc_html_e( 'Ops! There is nothing in your cart', 'jevelin' ) ?>
			</h2>

			<p>
				<?php esc_html_e( 'Explore around to add items to your shopping cart', 'jevelin' ) ?>
			</p>

			<div class="return-to-shop">
				<a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
					<?php _e( 'Return to shop', 'jevelin' ) ?>
				</a>
			</div>
		</div>

	</div>

<?php else : ?>

	<p class="cart-empty">
		<div class="sh-nothing-found sh-table">
			<div class="sh-table-cell-top">
				<i class="icon-compass"></i>
			</div>
			<div class="sh-table-cell-top">
				<h2><?php esc_html_e( 'Cart is empty', 'jevelin' ) ?></h2>
				<p>
					<?php esc_html_e( 'Looks like there is no items in your cart.', 'jevelin' ) ?>
				</p>
			</div>
		</div>

		<div class="sh-nothing-found-big">
			<span><?php esc_html_e( 'Your cart is', 'jevelin' ); ?></span>
			<div><?php esc_html_e( 'Currently empty', 'jevelin' ); ?></div>
		</div>
	</p>


	<?php do_action( 'woocommerce_cart_is_empty' ); ?>

	<?php if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
		<p class="return-to-shop">
			<a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
				<?php _e( 'Return to shop', 'jevelin' ) ?>
			</a>
		</p>
	<?php endif; ?>

<?php endif; ?>
