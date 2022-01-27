<?php
if( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Icons HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$style = ( isset( $atts['style'] ) && $atts['style'] ) ? $atts['style'] : 'style1';
$alignment = ( isset( $atts['alignment'] ) ) ? $atts['alignment'] : 'center';
$icons = ( isset( $atts['icons'] ) ) ? $atts['icons'] : '';

/* If Visual Composer */
if( !isset( $atts['id'] ) ) :
	$icons = vc_param_group_parse_atts( $icons );
endif;
?>

<div id="icon-group-<?php echo esc_attr( $id ); ?>" class="sh-icon-group sh-icon-group-<?php echo esc_attr( $alignment ); ?> sh-icon-group-<?php echo esc_attr( $style ); ?>">
	<?php
	if( is_array( $icons ) && count( $icons ) ) :
		foreach( $icons as $icon ) :
			$link = ( isset( $icon['link'] ) ) ? $icon['link'] : '';
			$icon = ( isset( $icon['icon'] ) ) ? $icon['icon'] : 'ti-check';
		?>

			<div class="sh-icon-group-item">
				<div class="sh-icon-group-item-container">
					<?php if( $link ) : ?>
						<a href="<?php echo esc_url( $link ); ?>" target="_blank">
					<?php endif; ?>

						<i class="<?php echo esc_attr( $icon ); ?>"></i>

					<?php if( $link ) : ?>
						</a>
					<?php endif; ?>
				</div>
			</div>

	<?php endforeach; endif; ?>
</div>
