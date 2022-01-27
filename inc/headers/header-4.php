<?php
	/* HEADER 6 */

	if ( ! function_exists( 'jevelin_nav_wrap' ) ) :
		function jevelin_nav_wrap() {
		    $wrap  = '<ul id="%1$s" class="%2$s">%3$s';
		    $wrap .= jevelin_nav_wrap_lang();
		    $wrap .= jevelin_nav_wrap_cart();
		    $wrap .= jevelin_nav_wrap_search();
			$wrap .= jevelin_nav_wrap_social();
		    $wrap .= jevelin_nav_wrap_login();
		    $wrap .= '</ul>';

		    return $wrap;
		}
	endif;
?>


<?php /* Header top bar */ ?>
<?php if( jevelin_option( 'topbar_status', 1 ) == true ) : ?>
	<div class="sh-header-top sh-header-top-4">
		<div class="container">

			<?php /* Header logo */ ?>
			<?php jevelin_header_logo(); ?>

		</div>
	</div>
<?php endif; ?>


<?php /* Header */ ?>
<div class="sh-header-height">
	<div class="<?php jevelin_header_classes( 4 ); ?>">
		<div class="container">

			<?php /* Header navigation */ ?>
			<nav id="header-navigation" class="header-standard-position">
				<?php if ( has_nav_menu( 'header' ) ) : ?>
					<?php
						wp_nav_menu( array(
							'theme_location' => 'header',
							'depth' => 4,
							'container_class' => 'sh-nav-container',
							'menu_class' => 'sh-nav',
							'items_wrap' => jevelin_nav_wrap()
						));
					?>
				<?php else :
					jevelin_asign_menu();
				endif; ?>
			</nav>

		</div>
		<?php
			/* Header popup search */
			get_template_part('inc/headers/header-search');
		?>
	</div>
</div>
