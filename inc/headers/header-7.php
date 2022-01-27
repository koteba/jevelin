<?php
	/* HEADER 7 */
?>

<div class="<?php jevelin_header_classes( 7 ); ?>">
	<div class="container">
		<div class="sh-table">
			<div class="sh-table-cell">

				<?php /* Header navigation */ ?>
				<nav class="header-standard-position">
					<div class="sh-nav-container">
						<ul class="sh-nav sh-nav-left">

							<?php echo jevelin_nav_wrap_search(); ?>

						</ul>
					</div>
				</nav>

			</div>
			<div class="sh-table-cell">

				<?php /* Header logo */ ?>
				<div class="header-logo-container">
					<?php jevelin_header_logo(); ?>
				</div>

			</div>
			<div class="sh-table-cell">

				<?php /* Header navigation */
				$elements = jevelin_option( 'header_elements' ); ?>
				<nav class="header-standard-position">
					<div class="sh-nav-container">
						<ul class="sh-nav <?php if ( class_exists( 'WooCommerce' ) && isset($elements['woo_cart']) && $elements['woo_cart'] == true ) : ?>sh-nav-header7-menu-cart<?php endif; ?>">

						    <?php echo jevelin_nav_wrap_menu_mobile(); ?>

						</ul>
						 <?php if ( class_exists( 'WooCommerce' ) && isset($elements['woo_cart']) && $elements['woo_cart'] == true ) : ?>
							<ul class="sh-nav">

							    <?php echo jevelin_nav_wrap_cart(); ?>

							</ul>
						<?php endif; ?>
					</div>
				</nav>

			</div>
		</div>
	</div>

	<?php
		/* Header popup search */
		get_template_part('inc/headers/header-search');
	?>
</div>
