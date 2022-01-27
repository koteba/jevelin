<?php
$categories = get_the_category_list( _x( ' ', 'Used between list items, there is a space after the comma.', 'amp' ), '', $this->ID );
?>
<?php if ( $categories ) : ?>
	<div class="amp-wp-meta amp-wp-tax-category">
		<span class="amp-wp-tax-title">
			<?php esc_html_e( 'Categories', 'jevelin' ); ?>
		</span>
		<?php echo ( $categories ); ?>
	</div>
<?php endif; ?>

<?php
$tags = get_the_tag_list(
	'',
	_x( ' ', 'Used between list items, there is a space after the comma.', 'amp' ),
	'',
	$this->ID
);
?>
<?php if ( $tags && ! is_wp_error( $tags ) ) : ?>
	<div class="amp-wp-meta amp-wp-tax-tag">
		<span class="amp-wp-tax-title">
			<?php esc_html_e( 'Tags in', 'jevelin' ); ?>
		</span>
		<?php echo ( $tags ); ?>
	</div>
<?php endif; ?>
