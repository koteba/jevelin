<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) die( 'Forbidden.' );
/**
 * @var FW_Ext_Backups_Demo[] $demos
 */

/**
 * @var FW_Extension_Backups $backups
 */
$backups = fw_ext('backups');

if ($backups->is_disabled()) {
	$confirm = '';
} else {
	$confirm = esc_html__(
		'IMPORTANT: Installing this demo content will delete the content you currently have on your website. However, we create a backup of your current content in (Tools > Backup). You can restore the backup from there at any time in the future.',
		'jevelin'
	);
}
?>
<h2><?php esc_html_e('Demo Content Install', 'jevelin') ?></h2>
<?php echo function_exists( 'shufflehound_unyson_demo_notice' ) ? shufflehound_unyson_demo_notice() : ''; ?>
<div>
	<a href="#" class="sh-demo-install-issues-button"><?php esc_html_e('Installation troubleshooting', 'jevelin') ?></a>
</div>

<div class="sh-demo-install-issues">
	<p class="sh-demo-install-issues-intro"><?php esc_html_e('Demo content installing process should be easy (just by pressing an installation button).', 'jevelin') ?></p>
	<p class="sh-demo-install-issues-intro"><?php esc_html_e('However in background this process is pretty complicated and depends on your server configuration.', 'jevelin') ?></p>
	<p class="sh-demo-install-issues-intro sh-demo-install-issues-intro-last"><?php esc_html_e('A lot of hosting services tend to limit multiple important server settings and therefore below you can see most common issues and how to fix them:', 'jevelin') ?></p>

	<div><strong><?php esc_html_e('Issue:', 'jevelin') ?></strong> "Maximum execution time of 29 seconds exceeded in ..."</div>
	<p><strong><?php esc_html_e('Solution:', 'jevelin') ?></strong> Please take a look at <a target="_blank" href="https://support.shufflehound.com/forums/topic/error-demo-content-install/#post-1292">these solutions</a>, there are two solutions for this issue: by editing .htaccess file or by installing additional plugin</p>

	<div><strong><?php esc_html_e('Issue:', 'jevelin') ?></strong> "Extension ZIP is missing"</div>
	<p><strong><?php esc_html_e('Solution:', 'jevelin') ?></strong> Please take a look at <a target="_blank" href="https://support.shufflehound.com/forums/topic/demo-content-error-extenssion-zip-is-missing/">this solution</a></p>

	<div><strong><?php esc_html_e('Issue:', 'jevelin') ?></strong> "Cannot create directory: ../wp-content/uploads/fw-backup/tmp"</div>
	<p><strong><?php esc_html_e('Solution:', 'jevelin') ?></strong> Please take a look at <a target="_blank" href="https://support.shufflehound.com/forums/topic/using-demo-content/">this solution</a></p>

	<div><strong><?php esc_html_e('Issue:', 'jevelin') ?></strong> "Files Export: The execution failed. Please check error.log"</div>
	<p><strong><?php esc_html_e('Solution:', 'jevelin') ?></strong> Please take a look at <a target="_blank" href="https://support.shufflehound.com/forums/topic/cannot-install-demo-content/">this solution</a></p>

	<p><strong>If you have other type of issue, please create a topic in our <a target="_blank" href="https://support.shufflehound.com/forums/forum/jevelin/">official support forum here</a> and we will help you.</strong></p>
</div>


<div>
	<?php if ( !class_exists('ZipArchive') ): ?>
		<div class="error below-h2">
			<p>
				<strong><?php _e( 'Important', 'jevelin' ); ?></strong>:
				<?php printf(
					__( 'You need to activate %s.', 'jevelin' ),
					'<a href="https://php.net/manual/en/book.zip.php" target="_blank">'. __('zip extension', 'jevelin') .'</a>'
				); ?>
			</p>
		</div>
	<?php endif; ?>

	<?php if ($http_loopback_warning = fw_ext_backups_loopback_test()) : ?>
		<div class="error">
			<p><strong><?php _e( 'Important', 'jevelin' ); ?>:</strong> <?php echo $http_loopback_warning; ?></p>
		</div>
		<script type="text/javascript">var fw_ext_backups_loopback_failed = true;</script>
	<?php endif; ?>
</div>

<p></p>
<div class="theme-browser rendered" id="fw-ext-backups-demo-list">
<?php foreach ($demos as $demo): ?>
	<div class="theme fw-ext-backups-demo-item" id="demo-<?php echo esc_attr($demo->get_id()) ?>">
		<div class="theme-screenshot">
			<img src="<?php echo esc_attr($demo->get_screenshot()); ?>" alt="Screenshot" />
		</div>
		<?php if ($demo->get_preview_link()): ?>
			<a class="more-details" target="_blank" href="<?php echo esc_attr($demo->get_preview_link()) ?>">
				<?php esc_html_e('Live Preview', 'jevelin') ?>
			</a>
		<?php endif; ?>
		<h3 class="theme-name"><?php echo esc_html($demo->get_title()); ?></h3>
		<div class="theme-actions">
			<a class="button button-primary"
			   href="#" onclick="return false;"
			   data-confirm="<?php echo esc_attr($confirm); ?>"
			   data-install="<?php echo esc_attr($demo->get_id()) ?>"><?php esc_html_e('Install', 'jevelin'); ?></a>
		</div>
	</div>
<?php endforeach; ?>
</div>
