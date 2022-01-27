<?php
	if( jevelin_option('back_to_top') != 'disabled' ) :
	$filled = ( in_array( jevelin_option('back_to_top'), array('1 filled', '2 filled', '3 filled') ) ) ? ' filled' : '';
?>

	<?php if( jevelin_option('back_to_top') == 3 ) : ?>

		<div class="sh-back-to-top sh-back-to-top3<?php echo esc_attr( $filled ); ?>">
			<i class="icon-arrow-up"></i>
		</div>

	<?php elseif( jevelin_option('back_to_top') == 2 ) : ?>

		<div class="sh-back-to-top sh-back-to-top2<?php echo esc_attr( $filled ); ?>">
			<i class="icon-control-start"></i>
		</div>

	<?php else : ?>

		<div class="sh-back-to-top sh-back-to-top1<?php echo esc_attr( $filled ); ?>">
			<i class="icon-arrow-up"></i>
		</div>

	<?php endif; ?>
<?php endif; ?>
