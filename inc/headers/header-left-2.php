<?php /* Header side */ ?>
<div class="sh-header-left-side sh-header-left-2 <?php jevelin_header_classes( 1, 1 ); ?>">

	<?php /* Header logo */ ?>
	<?php if( jevelin_option_image('logo') ) : ?>
		<div id="header-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="sh-table-cell">
					<img src="<?php echo esc_url( jevelin_option_image('logo') ); ?>" height="<?php jevelin_logo_height(); ?>" />
				</div>
			</a>
		</div>
	<?php endif; ?>


	<?php /* Header side navigation */ ?>
	<div class="sh-header-left-navigation">
		<div class="sh-table-full">
			<div class="sh-table-cell">
				<nav id="header-navigation-side" class="header-standard-position">
					<?php if ( has_nav_menu( 'header' ) ) : ?>
						<?php
							wp_nav_menu( array(
								'theme_location' => 'header',
								'depth' => 4,
								'container_class' => 'sh-nav-container',
								'menu_class' => 'sh-nav',
							));
						?>
					<?php else :
						jevelin_asign_menu(); 
					endif; ?>
				</nav>


				<?php /* Header side buttons */ ?>
				<div class="sh-side-buttons sh-table">
					<?php
						$elements = jevelin_option( 'header_elements' );
			        	if( isset($elements['search']) && $elements['search'] == true ) :
			        ?>
			    
						<div class="sh-table-cell">
							<div class="sh-side-button-search">
								<i class="icon icon-magnifier"></i>
							</div>
						</div>

					<?php endif; ?>
					<?php
						$elements = jevelin_option( 'header_elements' );
						if ( class_exists( 'WooCommerce' ) && isset($elements['woo_cart']) && $elements['woo_cart'] == true ) :
					?>

						<div class="sh-table-cell">
							<div class="sh-side-button-cart">
								<div class="sh-nav-container">
									<ul class="sh-nav">
										<?php echo jevelin_nav_wrap_cart(true); ?>
									</ul>
								</div>
							</div>
						</div>

					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>


	<?php /* Header side contact and social details */ ?>
	<div class="header-bottom">
		<div class="sh-header-copyrights-text">
			<?php
				$dev = 'http://shufflehound.com';
				echo '
					<div class="sh-copyrights-text">
						<span class="developer-copyrights '.(( jevelin_option('copyright_deveveloper', true) == false ) ? ' sh-hidden' : '' ).'">
							'.esc_html__( 'WordPress Theme built by', 'jevelin' ).' <a href="'.$dev.'" target="blank"><strong>'.esc_html__( 'Shufflehound', 'jevelin' ).'</strong>.</a>
						</span>
						<span>'.wp_kses_post( jevelin_remove_p( jevelin_option('copyright_text') ) ).'</span>
					</div>';
			?>
		</div>

		<div class="header-social-media">
			<?php echo jevelin_social_media(); ?>
		</div>
	</div>

	<?php
		/* Header popup search */
		get_template_part('inc/headers/header-search');
	?>
</div>
