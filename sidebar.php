<?php
/**
 *  Sidebar
 */

global $sidebars_widgets;
$page_widgets = 0;
if( isset($sidebars_widgets['page-widgets']) && count($sidebars_widgets['page-widgets']) > 0 ) :
	$page_widgets = count($sidebars_widgets['page-widgets']);
endif;

if( jevelin_is_realy_woocommerce_page() && !is_search() ) :
	$sidebar = 'woocommerce-widgets';
elseif( get_page_template_slug( jevelin_page_id() ) == 'page-blog.php' && !is_home() || is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag() && 'post' == get_post_type() ) :
	$sidebar = 'blog-widgets';
else :

	if( $page_widgets > 0 ) {
		$sidebar = 'page-widgets';
	} else {
		$sidebar = 'blog-widgets';
	}

endif;
?>

<?php if ( is_active_sidebar( $sidebar ) ) : ?>
	<?php dynamic_sidebar( $sidebar ); ?>
<?php else : ?>
	<aside id="no-widgets-found" class="widget widget_recent_entries">
		<h3 class="widget-title">
			<?php if( current_user_can( 'manage_options' ) ) : ?>
				<a href="<?php echo admin_url(); ?>/widgets.php"><?php esc_html_e( 'Please assign your widgets', 'jevelin' ) ?></a>
			<?php endif; ?>
		</h3>
	</aside>
<?php endif; ?>
