<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$icon = 'icon icon-magnifier';
if( is_jevelin_style( 3 ) ) :
	$icon = 'shi shi-search';
endif;
?>
<div class="widget_search">
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	    <div>
	        <label>
	            <input type="search" class="sh-sidebar-search search-field" placeholder="<?php echo esc_attr_e( 'Search products...', 'jevelin' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'jevelin' ); ?>" required />
	        </label>
	        <button type="submit" class="search-submit">
	            <i class="<?php echo esc_attr( $icon ); ?>"></i>
	        </button>
	    </div>
		<input type="hidden" name="post_type" value="product" />
	</form>
</div>
