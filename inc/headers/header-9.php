<?php
	/* HEADER 9 */
?>

<div class="<?php jevelin_header_classes( 7 ); ?> sh-header-9">
	<div class="container">
		<div class="sh-table">
			<div class="sh-table-cell">

				<?php /* Header navigation */ ?>
				<nav class="header-standard-position">
					<div class="sh-nav-container">
						<ul class="sh-nav sh-nav-left">

							<?php echo jevelin_nav_wrap_social(); ?>

						</ul>
					</div>
				</nav>

			</div>
			<div class="sh-table-cell">

				<?php /* Header logo */ ?>
				<?php jevelin_header_logo(); ?>

			</div>
			<div class="sh-table-cell">

				<?php /* Header navigation */ ?>
				<nav class="header-standard-position">
					<div class="sh-nav-container">
						<ul class="sh-nav">

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
