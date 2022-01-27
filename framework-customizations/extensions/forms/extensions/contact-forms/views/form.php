<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}
/**
 * @var string $form_id
 * @var string $form_html
 * @var array $extra_data
 */

?>
<div id="contact-form-<?php echo esc_attr( $form_id ); ?>" class="form-wrapper contact-form">
	<?php echo wp_kses( $form_html, jevelin_allowed_html_form() ); ?>
</div>
