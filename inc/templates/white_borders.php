<?php
/**
 * White borders option HTML
 */

$white_borders = ( esc_attr( jevelin_option('white_borders', false)) == true ) ? 'page-white-borders' : '';
$white_borders_only_on_pages = jevelin_option('white_borders_only_on_pages', false);
?>

<?php if( $white_borders ) : ?>
	<?php if( $white_borders_only_on_pages == false || is_page() ) : ?>
		<div class="sh-window-line line-top"></div>
		<div class="sh-window-line line-bottom"></div>
		<div class="sh-window-line line-right"></div>
		<div class="sh-window-line line-left"></div>
	<?php endif; ?>
<?php endif; ?>
