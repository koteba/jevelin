<?php
	/* HEADER 10 */
	$header_width = jevelin_option( 'header_width' );
?>

<div class="<?php jevelin_header_classes( 6 ); ?> sh-header-6-clean">
	<div class="container">

		<?php if( $header_width != 'full' ) : ?>
			<div class="sh-header-6-clean-content">
		<?php endif; ?>


			<div class="sh-table">
				<div class="sh-table-cell sh-group">

					<?php /* Header logo */ ?>
					<?php jevelin_header_logo(); ?>

				</div>
				<div class="sh-table-cell">

					<?php /* Header navigation */ ?>
					<nav id="header-navigation" class="header-standard-position">
						<div class="sh-nav-container">
							<ul class="sh-nav">

								<?php echo jevelin_nav_wrap_lang(); ?>
								<?php echo jevelin_nav_wrap_login(); ?>
								<?php echo jevelin_nav_wrap_cart(); ?>
								<?php echo jevelin_nav_wrap_search(); ?>
							    <?php echo jevelin_nav_wrap_menu_mobile(); ?>

							</ul>
						</div>
					</nav>

				</div>
			</div>


		<?php if( $header_width != 'full' ) : ?>
			</div>
		<?php endif; ?>

	</div>

	<?php
		/* Header popup search */
		get_template_part('inc/headers/header-search');
	?>
</div>
