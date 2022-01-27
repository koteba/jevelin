<?php
	/* Header Right 1 */
?>

<?php /* Header */ ?>
<div class="sh-header-right-side sh-header-side">
	<div class="sh-header-scrollbar">

		<div class="sh-table-full">
			<div class="sh-table-cell">

				<div class="sh-header-mobile">
					<nav class="sh-header-mobile-dropdown">
						<div class="container sh-nav-container">
							<ul class="sh-nav-mobile">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'header',
										'depth' => 4,
										'items_wrap' => '%3$s',
										'container' => false
									));
								?>
							</ul>
						</div>

					</nav>
				</div>

			</div>
		</div>

		<?php
			$elements = jevelin_option( 'header_elements' );
			if( isset($elements['social_mobile']) && $elements['social_mobile'] == true ) :
		?>
			<div class="header-mobile-social-media">
				<?php echo jevelin_social_media(); ?>
			</div>
		<?php endif; ?>

	</div>
</div>