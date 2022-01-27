<?php
	/* HEADER 1 */

	if ( ! function_exists( 'jevelin_nav_wrap' ) ) :
		function jevelin_nav_wrap() {
		    $wrap  = '<ul id="%1$s" class="%2$s">%3$s';
            $wrap .= '<li class="menu-item sh-nav-seperator"><a><i class="icon icon-list"></i></a></li>';
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

<?php /* Header */ ?>
<div class="sh-header-height">
	<div class="<?php jevelin_header_classes( 1, '', 8 ); ?>">
		<div class="container">
			<div class="sh-table">
				<div class="sh-table-cell sh-group">

					<?php /* Header logo */ ?>
					<?php jevelin_header_logo(); ?>

				</div>
				<div class="sh-table-cell">

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
			</div>
		</div>

		<?php
			/* Header popup search */
			get_template_part('inc/headers/header-search');
		?>
	</div>
</div>
