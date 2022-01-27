<?php
/**
 * Loop Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;
if ( ! wc_review_ratings_enabled() ) {
	return;
}
?>

	<?php if( jevelin_option( 'wc_items_additional_information', 'cat' ) == 'cat' ) : ?>
		<div class="additional-information sh-default-color">
			<?php
			$terms = wp_get_post_terms( get_the_ID(), 'product_cat' );
			foreach( $terms as $term ) : ?>

				<?php
					echo wp_kses_post( $term->name );
					if(end($terms) !== $term) :
						echo ', ';
					endif;
				?>

			<?php endforeach;
			if( count($terms) == 0 ) :
				echo '-';
			endif; ?>
		</div>
	<?php elseif( jevelin_option( 'wc_items_additional_information', 'desc' ) == 'desc' ) : ?>
		<div class="additional-information sh-default-color">
			<p><?php echo jevelin_get_excerpt( 8, get_the_excerpt() ); ?></p>
		</div>
	<?php endif; ?>

<?php
if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' )
	return;

echo wc_get_rating_html( $product->get_average_rating() ); // WordPress.XSS.EscapeOutput.OutputNotEscaped.
