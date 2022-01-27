<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/success.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $notices ) {
	return;
}

?>


<div class="sh-alert sh-alert-success">
	<div class="sh-alert-data sh-table">
		<div class="sh-table-cell sh-alert-data-icon">
			<i class="icon-check sh-alert-icon"></i>
		</div>
		<div class="sh-table-cell width-full">
			<h3 class="sh-alert-title">
				<?php foreach ( $notices as $notice ) : ?>
				<div><?php echo wc_kses_notice( $notice['notice'] ); ?></div>
				<?php endforeach; ?>
			</h3>
		</div>
	</div>

	<div class="sh-alert-close">
		<div class="sh-table-full">
			<div class="sh-table-cell">
				<i class="ti-close"></i>
			</div>
		</div>
	</div>
</div>
