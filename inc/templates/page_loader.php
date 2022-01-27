<?php
/**
 * Page loader HTML
 */

$page_loader = 0;
if( jevelin_option('page_loader', 'off') != 'off' ) :
	if( jevelin_option('page_loader') == 'on2' ) :

		if (strpos(wp_get_referer(), esc_url( home_url('/') ) ) !== false) :
			$page_loader = 0;
		else :
			$page_loader = 1;
		endif;

	else :

		$page_loader = 1;

	endif;
endif;
?>

<?php if( $page_loader == 1 ) : ?>

	<div class="sh-page-loader sh-table sh-page-loader-style-<?php echo esc_attr( jevelin_option('page_loader_style') ); ?>">
		<div class="sh-table-cell">
			
			<?php if( jevelin_option('page_loader_style') == 'cube-folding' ) : ?>
				<div class="sk-folding-cube">
					<div class="sk-cube1 sk-cube"></div>
					<div class="sk-cube2 sk-cube"></div>
					<div class="sk-cube4 sk-cube"></div>
					<div class="sk-cube3 sk-cube"></div>
				</div>
			<?php elseif( jevelin_option('page_loader_style') == 'cube-grid' ) : ?>
				<div class="sk-cube-grid">
					<div class="sk-cube sk-cube1"></div>
					<div class="sk-cube sk-cube2"></div>
					<div class="sk-cube sk-cube3"></div>
					<div class="sk-cube sk-cube4"></div>
					<div class="sk-cube sk-cube5"></div>
					<div class="sk-cube sk-cube6"></div>
					<div class="sk-cube sk-cube7"></div>
					<div class="sk-cube sk-cube8"></div>
					<div class="sk-cube sk-cube9"></div>
				</div>
			<?php elseif( jevelin_option('page_loader_style') == 'spinner' ) : ?>

				<div id="loading-center-absolute">
					<div class="object" id="object_one"></div>
					<div class="object" id="object_two"></div>
					<div class="object" id="object_three"></div>
				</div>

			<?php endif; ?>

		</div>
	</div>

<?php endif; ?>