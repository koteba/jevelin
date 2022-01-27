<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Alert Message HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$alignment = ( isset( $atts['alignment']) ) ? $atts['alignment'] : 'left';
$title = ( isset( $atts['title'] ) ) ? $atts['title'] : '';
$text = ( isset( $atts['text'] ) ) ? $atts['text'] : '';
$icon = ( isset( $atts['icon'] ) ) ? $atts['icon'] : '';
$close = ( isset( $atts['close'] ) ) ? $atts['close'] : '';
$type = ( isset( $atts['type'] ) ) ? $atts['type'] : '';
?>

<div id="alert-<?php echo esc_attr( $id ); ?>" class="sh-alert sh-alert-<?php echo esc_attr( $type ); ?>">
	<div class="sh-alert-data sh-table">
		<?php if( $alignment != 'center' ) : ?>

			<?php if( $icon ) : ?>
				<div class="sh-table-cell sh-alert-data-icon">
					<i class="<?php echo esc_attr( $icon ); ?> sh-alert-icon"></i>
				</div>
			<?php endif; ?>
			<div class="sh-table-cell width-full">
				<?php if( $title ) : ?>
					<h3 class="sh-alert-title">
						<?php echo esc_attr( $title ); ?>
					</h3>
				<?php endif; ?>

				<?php if( $text ) : ?>
					<div class="sh-alert-text">
						<?php echo ( $text ); ?>
					</div>
				<?php endif; ?>
			</div>

		<?php else : ?>

			<div class="sh-table-cell-top sh-alert-center width-full">
				<?php if( $title ) : ?>
					<h3 class="sh-alert-title">
						<?php if( $icon ) : ?>
							<i class="<?php echo esc_attr( $icon ); ?> sh-alert-icon"></i>
						<?php endif; ?>

						<?php echo esc_attr( $title ); ?>
					</h3>
				<?php endif; ?>

				<?php if( $text ) : ?>
					<div class="sh-alert-text">
						<?php echo ( $text ); ?>
					</div>
				<?php endif; ?>
			</div>

		<?php endif; ?>
	</div>
	<?php if( $close != false ) : ?>
	<div class="sh-alert-close">
		<div class="sh-table-full">
			<div class="sh-table-cell">
				<i class="ti-close"></i>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>
