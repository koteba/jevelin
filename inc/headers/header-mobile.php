<?php /* HEADER Mobile */
$class = '';
if( jevelin_option( 'header_mobile_sticky', false ) == true ) :
	$class = ' sh-sticky-mobile-header';
endif;
?>

<div id="header-mobile" class="sh-header-mobile<?php echo esc_attr( $class ); ?>">
	<div class="sh-header-mobile-navigation">
		<?php
			/* Inlcude page notice HTML */
			get_template_part('inc/templates/notice' );
		?>


		<div class="container">
			<div class="sh-table">
				<div class="sh-table-cell sh-group">

					<?php /* Header logo */ ?>
					<?php jevelin_header_logo(); ?>

				</div>
				<div class="sh-table-cell">

					<?php /* Header navigation */ ?>
					<nav id="header-navigation-mobile" class="header-standard-position">
						<div class="sh-nav-container">
							<ul class="sh-nav">

								<?php echo jevelin_nav_wrap_cart(); ?>
							    <?php echo jevelin_nav_wrap_menu_mobile(); ?>

							</ul>
						</div>
					</nav>

				</div>
			</div>
		</div>
	</div>

	<nav class="sh-header-mobile-dropdown">
		<div class="container sh-nav-container">
			<ul class="sh-nav-mobile"></ul>
		</div>

		<div class="container sh-nav-container">
			<?php
				$elements = jevelin_option( 'header_elements' );
				if ( isset($elements['search']) && $elements['search'] == true ) :
			?>
				<div class="header-mobile-search">
					<form role="search" method="get" class="header-mobile-form" action="<?php echo esc_url( home_url('/') ); ?>">
						<input class="header-mobile-form-input" type="text" placeholder="<?php esc_html_e( 'Search here..', 'jevelin' ); ?>" value="" name="s" required />
						<button type="submit" class="header-mobile-form-submit">
							<i class="icon-magnifier"></i>
						</button>

						<?php if( jevelin_option( 'header_search_results', 'posts' ) == 'adaptive' && jevelin_is_realy_woocommerce_page() ) : ?>
							<input type="hidden" name="post_type" value="product" />
						<?php elseif( jevelin_option( 'header_search_results', 'posts' ) == 'products' ) : ?>
							<input type="hidden" name="post_type" value="product" />
						<?php endif; ?>
					</form>
				</div>
			<?php endif; ?>
		</div>

		<?php
			$elements = jevelin_option( 'header_elements' );
			if( isset($elements['social_mobile']) && $elements['social_mobile'] == true ) :
		?>
			<div class="header-mobile-social-media">
				<?php echo jevelin_social_media(); ?>
			</div>
		<?php endif; ?>
	</nav>
</div>
