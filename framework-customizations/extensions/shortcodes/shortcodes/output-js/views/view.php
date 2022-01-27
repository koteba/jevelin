<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); } ?>
<div class="sh-output-js">
	<script type="text/javascript">
		<?php echo wp_kses_post($atts['content']); ?>
	</script>
</div>