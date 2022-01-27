<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Video Player HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$style = ( isset($atts['placeholder_icon_style']) && $atts['placeholder_icon_style'] ) ? esc_attr( $atts['placeholder_icon_style'] ) : '';
$class = ( isset($atts['custom_class']) && $atts['custom_class'] ) ? ' '.esc_attr( $atts['custom_class'] ) : '';
$url = ( isset($atts['url'] ) ) ? $atts['url'] : '';
$placement = ( isset($atts['placement'] ) ) ? $atts['placement'] : '';
$placeholder_icon = ( isset($atts['placeholder_icon'] ) ) ? $atts['placeholder_icon'] : 'on';
$image_size = ( isset($atts['image_size'] ) ) ? $atts['image_size'] : 'large';

$image = '';
if( isset( $atts['image'] ) && jevelin_is_url( $atts['image'] ) ) :
	$image = $atts['image'];
elseif( isset( $atts['image'] ) && !is_array( $atts['image'] ) ) :
	$image = jevelin_get_small_thumb( $atts['image'], $image_size );
elseif( isset( $atts['image'] ) ) :
	$image = jevelin_get_image( $atts['image'] );
endif;

if( $image ) :
	if( !isset( $atts['id'] ) && $placeholder_icon == 'on' ) :
		$atts['placeholder_icon'] = 'on';
	endif;

	$class.= ' sh-video-player-image-placeholder';
	if( !isset( $atts['placeholder_icon'] ) || ( isset( $atts['placeholder_icon'] ) && $atts['placeholder_icon'] == 'on' ) ) : else :
		$class.= ' sh-video-player-image-placeholder-noicon';
	endif;
endif;


if( isset( $atts['video_ratio'] ) && $atts['video_ratio'] == '4_3' ) :
	$class.= ' sh-video-player-4_3';
endif;
?>

<div id="video-player-<?php echo esc_attr( $id ); ?>" class="sh-video-player sh-video-player-<?php echo esc_attr( $style ); ?> sh-placement-<?php echo esc_attr( $placement ).$class; ?>">
	<div class="sh-video-player-container">
		<div class="sh-video-player-content">
			<?php echo wp_oembed_get( esc_url( $url ) ); ?>
		</div>
	</div>

	<?php if( $image ) : ?>
		<div class="sh-video-player-image-container">
			<div class="sh-video-player-image">
				<img src="<?php echo esc_url( $image ); ?>" alt="" />
			</div>
			<div class="sh-video-player-image-play">
				<?php if( $style == 'style2') : ?>
					<i class="fa fa-play"></i>
				<?php else : ?>
					<i class="icon-control-play"></i>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
</div>
