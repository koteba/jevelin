<?php
	/* HEADER 10 */

	if ( ! function_exists( 'jevelin_nav_wrap' ) ) :
		function jevelin_nav_wrap() {
		    $wrap  = '<ul id="%1$s" class="%2$s">%3$s';
		    $wrap .= '</ul>';

		    return $wrap;
		}
	endif;
?>

<?php /* Header top bar */ ?>
<?php if( jevelin_option( 'topbar_status', 1 ) == true ) : ?>
	<div class="sh-header-top sh-header-top-10">
		<div class="container">
			<div class="sh-table">

	            <?php /* Header logo */ ?>
	            <div class="sh-table-cell">
	                <?php /* Header logo */ ?>
	                <?php jevelin_header_logo(); ?>
	            </div>

				<?php /* Header contact details */ ?>
				<div class="header-contacts sh-table-cell">
					<div class="header-contacts-item sh-group">

						<?php if( jevelin_option('contact_phone') ) : ?>
	                        <div class="header-contacts-details-large">
	                            <div class="header-contacts-details-large-icon">
	                                <i class="icon-call-in"></i>
	                            </div>
	                            <div class="header-contacts-details-large-content">
	                                <div class="header-contacts-details-large-title">
	                                    <?php esc_html_e( 'CALL US', 'jevelin' ); ?>
	                                </div>
	                                <?php echo do_shortcode( wp_kses_post( jevelin_option('contact_phone') ) ); ?>
	                            </div>
	                        </div>
						<?php endif; ?>
						<?php if( jevelin_option('contact_email') ) : ?>
	                        <div class="header-contacts-details-large">
	                            <div class="header-contacts-details-large-icon">
	                                <i class="icon-envelope"></i>
	                            </div>
	                            <div class="header-contacts-details-large-content">
	                                <div class="header-contacts-details-large-title">
	                                    <?php esc_html_e( 'E-MAIL', 'jevelin' ); ?>
	                                </div>
	                                <?php echo do_shortcode( wp_kses_post( jevelin_option('contact_email') ) ); ?>
	                            </div>
	                        </div>
						<?php endif; ?>
						<?php if( jevelin_option('contact_location') ) : ?>
	                        <div class="header-contacts-details-large">
	                            <div class="header-contacts-details-large-icon">
	                                <i class="icon-location-pin"></i>
	                            </div>
	                            <div class="header-contacts-details-large-content">
	                                <div class="header-contacts-details-large-title">
	                                    <?php esc_html_e( 'LOCATION', 'jevelin' ); ?>
	                                </div>
	                                <?php echo do_shortcode( wp_kses_post( jevelin_option('contact_location') ) ); ?>
	                            </div>
	                        </div>
						<?php endif; ?>
						<?php if( jevelin_option('contact_workhours') ) : ?>
	                        <div class="header-contacts-details-large">
	                            <div class="header-contacts-details-large-icon">
	                                <i class="icon-clock"></i>
	                            </div>
	                            <div class="header-contacts-details-large-content">
	                                <div class="header-contacts-details-large-title">
	                                    <?php esc_html_e( 'WORKING HOURS', 'jevelin' ); ?>
	                                </div>
	                                <?php echo do_shortcode( wp_kses_post( jevelin_option('contact_workhours') ) ); ?>
	                            </div>
	                        </div>
						<?php endif; ?>

					</div>
				</div>

			</div>
		</div>
	</div>
<?php endif; ?>


<?php /* Header */ ?>
<div class="sh-header-height">
	<div class="<?php jevelin_header_classes( 10 ); ?>">
		<div class="container">
			<div class="sh-table">
				<div class="sh-table-cell">

					<?php /* Header navigation */ ?>
					<nav id="header-navigation" class="header-standard-position">
						<?php if ( has_nav_menu( 'header' ) ) : ?>
							<?php
								wp_nav_menu( array(
									'theme_location' => 'header',
									'depth' => 4,
									'container_class' => 'sh-nav-container',
									'menu_class' => 'sh-nav sh-nav-left',
									'items_wrap' => jevelin_nav_wrap()
								));
							?>
						<?php else :
							jevelin_asign_menu();
						endif; ?>
					</nav>

				</div>

                <div class="sh-table-cell">

					<?php /* Header navigation - icons */ ?>
                    <nav id="header-navigation" class="header-standard-position">
    					<div class="sh-nav-container">
    						<ul class="sh-nav sh-nav-right">

    							<?php echo jevelin_nav_wrap_search(); ?>
                                <?php echo jevelin_nav_wrap_social(); ?>
    							<?php echo jevelin_nav_wrap_lang(); ?>
    							<?php echo jevelin_nav_wrap_login(); ?>
    							<?php echo jevelin_nav_wrap_cart(); ?>

    						</ul>
    					</div>
    				</nav>

				</div>
			</div>

    		<?php
    			/* Header popup search */
    			get_template_part('inc/headers/header-search');
    		?>
		</div>
	</div>
</div>
