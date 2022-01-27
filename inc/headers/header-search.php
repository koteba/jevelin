<?php
$id = ( isset( $header_builder_search ) && $header_builder_search ) ? '' : ' id="header-search"';
?>

<div <?php echo $id; ?> class="sh-header-search">
	<div class="sh-table-full">
		<div class="sh-table-cell">

			<div class="line-test">
				<div class="container">

					<form method="get" class="sh-header-search-form" action="<?php echo esc_url( home_url('/') ); ?>">
						<input type="search" class="sh-header-search-input" placeholder="<?php esc_html_e( 'Search Here..', 'jevelin' ); ?>" value="" name="s" required />
						<button type="submit" class="sh-header-search-submit">
							<i class="<?php echo ( is_jevelin_style( 3 ) ) ? 'shi shi-search' : 'icon-magnifier'; ?>"></i>
						</button>
						<div class="sh-header-search-close close-header-search">
							<i class="<?php echo ( is_jevelin_style( 3 ) ) ? 'shi shi-close' : 'ti-close'; ?>"></i>
						</div>

						<?php if( jevelin_option( 'header_search_results', 'posts' ) == 'adaptive' && jevelin_is_realy_woocommerce_page() ) : ?>
							<input type="hidden" name="post_type" value="product" />
						<?php elseif( jevelin_option( 'header_search_results', 'posts' ) == 'products' ) : ?>
							<input type="hidden" name="post_type" value="product" />
						<?php endif; ?>
					</form>

				</div>
			</div>

		</div>
	</div>
</div>
