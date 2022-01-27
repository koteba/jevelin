<?php
/**
 * Description tab
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

$heading = esc_html( apply_filters( 'woocommerce_product_description_heading', esc_html__( 'Product Description', 'jevelin' ) ) );

?>

<?php if ( $heading ): ?>
  <h2><?php echo wp_kses_post( $heading ); ?></h2>
<?php endif; ?>

<?php the_content(); ?>
