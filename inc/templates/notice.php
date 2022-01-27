<?php
/**
 * Notice option HTML
 */

if( jevelin_framework_active() && jevelin_option( 'notice_status', false ) == true ) :
?>

	<div class="sh-page-notice">
		<div class="container">
			<div class="sh-table">
				<div class="sh-table-cell">
					<?php echo jevelin_remove_p( wp_kses_post( jevelin_option( 'notice_text' ) ) ); ?>
				</div>
				<div class="sh-table-cell text-right">
					<?php if( jevelin_option( 'notice_more_url' ) ) : ?>
						<a href="<?php echo esc_url( jevelin_option( 'notice_more_url' )); ?>">
							<?php esc_html_e( 'Learn more', 'jevelin' ); ?>
						</a>
					<?php endif; ?>
					<?php if( jevelin_option( 'notice_close' ) != 'disable' ) : ?>
						<a href="#" class="sh-page-notice-button">
							<?php esc_html_e( 'Got it!', 'jevelin' ); ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>
