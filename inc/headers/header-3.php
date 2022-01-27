<?php
	/* HEADER 3 */

	if ( ! function_exists( 'jevelin_nav_wrap' ) ) :
		function jevelin_nav_wrap() {
		    $wrap  = '<ul id="%1$s" class="%2$s">%3$s';
		    $wrap .= jevelin_nav_wrap_lang();
		    $wrap .= jevelin_nav_wrap_cart();
		    $wrap .= jevelin_nav_wrap_search();
		    $wrap .= jevelin_nav_wrap_login();
		    $wrap .= '</ul>';

		    return $wrap;
		}
	endif;
?>

<?php /* Header top bar */ ?>
<?php if( jevelin_option( 'topbar_status', 1 ) == true ) : ?>
	<div class="sh-header-top sh-header-top-3">
		<div class="container">
			<div class="sh-table">

				<?php /* Header contact details */ ?>
				<div class="header-contacts sh-table-cell">
					<div class="header-contacts-item">

						<?php if( jevelin_option('contact_phone') ) : ?>
							<span class="header-contacts-details">
								<i class="icon-call-in"></i>
								<?php echo do_shortcode( wp_kses_post( jevelin_option('contact_phone') ) ); ?>
							</span>
						<?php endif; ?>
						<?php if( jevelin_option('contact_email') ) : ?>
							<span class="header-contacts-details">
								<i class="icon-envelope-open"></i>
								<?php echo do_shortcode( wp_kses_post( jevelin_option('contact_email') ) ); ?>
							</span>
						<?php endif; ?>
						<?php if( jevelin_option('contact_location') ) : ?>
							<span class="header-contacts-details">
								<i class="icon-location-pin"></i>
								<?php echo do_shortcode( wp_kses_post( jevelin_option('contact_location') ) ); ?>
							</span>
						<?php endif; ?>
						<?php if( jevelin_option('contact_workhours') ) : ?>
							<span class="header-contacts-details">
								<i class="icon-clock"></i>
								<?php echo do_shortcode( wp_kses_post( jevelin_option('contact_workhours') ) ); ?>
							</span>
						<?php endif; ?>

					</div>
				</div>

				<?php /* Header social media */ ?>
				<div class="header-social-media sh-table-cell">
					<?php echo jevelin_social_media(); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>


<?php /* Header */ ?>
<div class="sh-header-height">
	<div class="<?php jevelin_header_classes( 3 ); ?>">
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
