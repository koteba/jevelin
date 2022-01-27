<?php
$step = '';
if( function_exists( 'is_cart' ) && ( is_cart() || is_checkout() ) ) :
    if( is_wc_endpoint_url( 'order-received' ) ) :
        $step = 'step3';
    elseif( is_checkout() ) :
        $step = 'step2';
    elseif( is_cart() && WC()->cart->get_cart_contents_count() != 0 ) :
        $step = 'step1';
    endif;

    $classes = [
        'woocommerce-progress',
        'container',
        'sh-heading-font'
    ];

    if( $step ) :
        $classes[] = $step;
    endif;

    if ( WC()->cart->get_cart_contents_count() == 0  && !$step ) :
        $classes[] = 'woocommerce-progress-empty';
    endif;
?>

    <div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
        <div class="woocommerce-progress-item woocommerce-header-item-cart">
            <?php esc_attr_e( 'View Cart', 'jevelin' ); ?>
        </div>
        <div class="woocommerce-progress-item woocommerce-header-item-checkout">
            <?php esc_attr_e( 'Checkout', 'jevelin' ); ?>
        </div>
        <div class="woocommerce-progress-item woocommerce-header-item-done">
            <?php esc_attr_e( 'Done', 'jevelin' ); ?>
        </div>
    </div>
<?php endif; ?>
