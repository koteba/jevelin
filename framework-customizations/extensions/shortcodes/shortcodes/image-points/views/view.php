<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Image Points HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$style = ( isset( $atts['style'] ) ) ? $atts['style'] : 'style1';
$source = ( isset( $atts['source'] ) && $atts['source'] != 'large' ) ? 'full' : 'large';
$points = ( isset( $atts['points'] ) ) ? $atts['points'] : '';

/* If Visual Composer */
if( isset( $points ) && $points && !is_array( $points ) ) :
	$points = vc_param_group_parse_atts( $points );
endif;


// Get Image
if( jevelin_is_url( $atts['image'] ) ) :
	$image = $atts['image'];
elseif( $atts['image'] && !is_array( $atts['image'] ) ) :
	$image = jevelin_get_small_thumb( $atts['image'], $source );
else :
	$image = jevelin_get_image_size( $atts['image'], $source );
endif;
?>

<div id="image-points-<?php echo esc_attr( $id ); ?>" class="sh-image-points sh-image-points-<?php echo esc_attr( $style ); ?>">
	<img class="sh-image-url" src="<?php echo esc_url( $image ); ?>" alt="" />
	<?php
	$i = 0;
	if( is_array( $points ) && count( $points ) ) :
	foreach( $points as $point ) : $i++; ?>
		<?php
			$top = ( isset( $point['top'] ) ) ? $point['top'] : 0;
			$left = ( isset( $point['left'] ) ) ? $point['left'] : 0;
			$content = ( isset( $point['content'] ) ) ? $point['content'] : '';

			$right_side = '';
			if( $left > 65 ) :
				$right_side.= ' sh-image-point-right';
			else :
				$right_side.= '';
			endif;

			if( $left > 50 ) :
				$right_side.= ' sh-image-point-right-mobile';
			else :
				$right_side.= '';
			endif;
		?>
		<div class="sh-animated zoomIn sh-image-point<?php echo esc_attr( $right_side ); ?>" onclick="void(0)"
			style="animation-delay: <?php echo intval( $i ) * 0.25; ?>s; top: <?php echo esc_attr( $top ); ?>%; left: <?php echo esc_attr( $left ); ?>%;" >
			<i class="<?php echo /*( $style == 'style1' ) ? 'ti-plus' : */'fa fa-plus'; ?>"></i>
			<?php if( $content ) : ?>
				<span class="sh-image-point-tooltip"><?php echo wp_kses_post( $content ); ?></span>
			<?php endif; ?>
		</div>
	<?php endforeach; endif; ?>
</div>
