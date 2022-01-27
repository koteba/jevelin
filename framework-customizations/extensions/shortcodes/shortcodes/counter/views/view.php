<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Counter HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$number = ( isset( $atts['number'] ) ) ? $atts['number'] : '';
$subtitle = ( isset( $atts['subtitle'] ) ) ? $atts['subtitle'] : '';
$title = ( isset( $atts['title'] ) ) ? $atts['title'] : '';
$icon = ( isset( $atts['icon'] ) ) ? $atts['icon'] : '';
$size_class = '';

/* If Visual Composer */
if( !isset( $atts['id'] ) ) :
	$style = ( isset( $atts['style'] ) ) ? $atts['style'] : 'style1';
	if( isset( $atts['number_size'] ) ) :
		$size = ( isset( $atts['number_size'] ) ) ? $atts['number_size'] : 'default';
		$size_class = ' size-'.$size;
	endif;
else :
	$style = ( isset( $atts['style']['style'] ) ) ? $atts['style']['style'] : 'style1';
	if( isset( $atts['number_size'] ) ) :
		$size = ( isset( $atts['number_size']['number_size'] ) ) ? $atts['number_size']['number_size'] : 'default';
		$size_class = ' size-'.$size;
	endif;
endif;
?>

<div id="counter-<?php echo esc_attr( $id ); ?>" class="sh-counter sh-counter-<?php echo esc_attr( $style ); ?>">
	<?php if( $style == 'style2' || $style == 'style6' ) : ?>

		<div class="sh-counter-icon"><i class="<?php echo esc_attr( $icon ); ?>"></i></div>
		<div class="sh-counter-number sh-counter-animate<?php echo esc_attr( $size_class ); ?>"><?php echo intval( $number ); ?></div>
		<div class="sh-counter-divider"></div>
		<span class="sh-counter-title"><?php echo ( $title); ?></span>
		<?php if( $subtitle ) : ?>
			<div class="sh-counter-subtitle"><?php echo esc_attr( $subtitle ); ?></div>
		<?php endif; ?>

	<?php elseif( $style == 'style3' ) : ?>

		<?php if( $icon ) : ?>
			<div class="sh-counter-icon"><i class="<?php echo esc_attr( $icon ); ?>"></i></div>
		<?php endif; ?>
		<div class="sh-table">
			<div class="sh-table-cell text-right">
				<div class="sh-counter-number sh-counter-animate"><?php echo intval( $number ); ?></div>
			</div>
			<div class="sh-table-cell text-left">
				<span class="sh-counter-title"><?php echo ( $title ); ?></span>
				<?php if( $subtitle ) : ?>
					<div class="sh-counter-subtitle"><?php echo esc_attr( $subtitle ); ?></div>
				<?php endif; ?>
			</div>
		</div>

	<?php elseif( $style == 'style4' ) : ?>

		<div class="sh-counter-icon"><i class="<?php echo esc_attr( $icon ); ?>"></i></div>
		<div>
			<span class="sh-counter-number sh-counter-animate<?php echo esc_attr( $size_class ); ?>"><?php echo intval( $number ); ?></span>
			<span class="sh-counter-title"><?php echo ( $title ); ?></span>
		</div>
		<?php if( $subtitle ) : ?>
			<div class="sh-counter-subtitle"><?php echo esc_attr( $subtitle ); ?></div>
		<?php endif; ?>

	<?php elseif( $style == 'style5' ) : ?>

		<div class="sh-counter-icon"><i class="<?php echo esc_attr( $icon ); ?>"></i></div>
		<div class="sh-counter-number sh-counter-animate<?php echo esc_attr( $size_class ); ?>"><?php echo intval( $number ); ?></div>
		<span class="sh-counter-title"><?php echo ( $title ); ?></span>
		<?php if( $subtitle ) : ?>
			<div class="sh-counter-subtitle"><?php echo esc_attr( $subtitle ); ?></div>
		<?php endif; ?>

	<?php elseif( $style == 'style7' ) : /* Number Only */ ?>

		<div class="sh-counter-number sh-counter-animate<?php echo esc_attr( $size_class ); ?>"><?php echo intval( $number ); ?></div>

	<?php else : ?>

		<div class="sh-counter-number sh-counter-animate<?php echo esc_attr( $size_class ); ?>"><?php echo intval( $number ); ?></div>
		<div class="sh-counter-topbar">
			<?php if( $icon ) : ?>
				<div class="sh-counter-icon">
					<i class="<?php echo esc_attr( $icon ); ?>"></i>
				</div>
			<?php endif; ?>
			<h3 class="sh-counter-title">
				<?php echo ( $title ); ?>
			</h3>
		</div>

		<?php if( $subtitle ) : ?>
			<div class="sh-counter-subtitle"><?php echo esc_attr( $subtitle ); ?></div>
		<?php endif; ?>

	<?php endif; ?>
</div>
