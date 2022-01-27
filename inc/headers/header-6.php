<?php
	/* HEADER 10 */
?>

<div class="<?php jevelin_header_classes( 6 ); ?>">
	<div class="container">
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
	</div>

	<?php
		/* Header popup search */
		get_template_part('inc/headers/header-search');
	?>
</div>
