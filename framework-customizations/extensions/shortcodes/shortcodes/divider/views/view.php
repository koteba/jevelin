<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Divider HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$alignment = ( isset( $atts['alignment'] ) ) ? $atts['alignment'] : '';

/* If Visual Composer */
if( !isset( $atts['id'] ) ) :
	$content = ( isset( $atts['contentlayout'] ) ) ? $atts['contentlayout'] : 'none';
	$content_atts = jevelin_vc_option_picker( $atts, array(
		array( 'name' => 'icon' ),
		array( 'name' => 'icon_color', 'if' => in_array( $content, array( 'icon_option' ) ), 'default' => '#cccccc' ),
		array( 'name' => 'icon_multiplier', 'if' => in_array( $content, array( 'icon_option' ) ), 'default' => '1' ),
		array( 'name' => 'icon_size' ),
		array( 'name' => 'title', 'if' => in_array( $content, array( 'title_option' ) ), 'default' => 'Divider Title' ),
		array( 'name' => 'font', 'if' => in_array( $content, array( 'title_option', 'title_box_option' ) ), 'default' => 'heading' ),
		array( 'name' => 'title_color' ),
		array( 'name' => 'title_box', 'if' => in_array( $content, array( 'title_box_option' ) ), 'default' => 'Divider Title Box' ),
		array( 'name' => 'title_background_color', 'if' => in_array( $content, array( 'title_box_option' ) ), 'default' => '#8d8d8d' ),
		array( 'name' => 'title_radius', 'if' => in_array( $content, array( 'title_box_option' ) ), 'default' => '0' ),
	));
	$width = ( isset( $atts['width'] ) ) ? $atts['width'] : 'full';
	$width_atts = jevelin_vc_option_picker( $atts, array(
		array( 'name' => 'fixed_width', 'if' => in_array( $width, array( 'fixed' ) ), 'default' => 30 ),
	));
else :
	$content = jevelin_get_picker_value( $atts['content'], 'none' );
	$content_atts = jevelin_get_picker( $atts['content'] );
	$width_atts = jevelin_get_picker( $atts['width'] );
endif;
?>

<div id="divider-<?php echo esc_attr( $id ); ?>" class="sh-divider sh-divider-<?php echo esc_attr( $alignment ); ?> sh-divider-content-<?php echo esc_attr( $content ); ?>">
	<?php if( $content == 'icon_option' ) : ?>
		<div class="sh-divider-content">
			<span class="sh-divider-icon">
				<?php
					if( $content_atts['icon_multiplier'] == '3' ) :
						echo '<i class="'.esc_attr( $content_atts['icon'] ).'"></i>&nbsp;<i class="'.esc_attr( $content_atts['icon'] ).'"></i>&nbsp;<i class="'.esc_attr( $content_atts['icon'] ).'"></i>';
					elseif( $content_atts['icon_multiplier'] == '2' ) :
						echo '<i class="'.esc_attr( $content_atts['icon'] ).'"></i>&nbsp;<i class="'.esc_attr( $content_atts['icon'] ).'"></i>';
					elseif( $content_atts['icon_multiplier'] == '5' ) :
						echo '<i class="'.esc_attr( $content_atts['icon'] ).'"></i>&nbsp;<i class="'.esc_attr( $content_atts['icon'] ).'"></i>&nbsp;<i class="'.esc_attr( $content_atts['icon'] ).'"></i>&nbsp;<i class="'.esc_attr( $content_atts['icon'] ).'"></i>&nbsp;<i class="'.esc_attr( $content_atts['icon'] ).'"></i>';
					else :
						echo '<i class="'.esc_attr( $content_atts['icon'] ).'"></i>';
					endif;
				?>
			</span>
		</div>
	<?php elseif( $content == 'title_option' ) : ?>
		<div class="sh-divider-content">
			<span class="sh-divider-title">
				<?php echo jevelin_remove_p( wp_kses_post( $content_atts['title'] ) ); ?>
			</span>
		</div>
	<?php elseif( $content == 'title_box_option' ) : ?>
		<div class="sh-divider-content">
			<span class="sh-divider-title-box">
				<?php echo jevelin_remove_p( wp_kses_post( $content_atts['title_box'] ) ); ?>
			</span>
		</div>
	<?php else : ?>
		<div class="sh-divider-line"></div>
	<?php endif; ?>
</div>
