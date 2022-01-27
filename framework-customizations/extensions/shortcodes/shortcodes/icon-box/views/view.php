<?php
if( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Icon Box HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$alignment = ( isset( $atts['alignment'] ) ) ? $atts['alignment'] : 'center';
$icon = ( isset( $atts['icon'] ) ) ? $atts['icon'] : '';
$title = ( isset( $atts['title'] ) ) ? $atts['title'] : '';
$url = ( isset( $atts['url']  ) ) ? $atts['url']  : '';
$class = '';

if( isset( $content ) && $content ) :
	$content = $content;
elseif( isset( $atts['content'] ) ) :
	$content = $atts['content'];
else :
	$content = '';
endif;

/* If Visual Composer */
if( !isset( $atts['id'] ) ) :
	$style = ( isset( $atts['style'] ) ) ? $atts['style'] : 'style1';
	$style_atts = jevelin_vc_option_picker( $atts, array(
		array( 'name' => 'icon2', 'if' => in_array( $style, array( 'style1' ) ), 'default' => 'icon-like' ),
		array( 'name' => 'color_line' ),
		array( 'name' => 'shape', 'if' => in_array( $style, array( 'style7', 'style8', 'style9' ) ), 'default' => 'circle' ),
		array( 'name' => 'background_color' ),
	));
	$style_atts['icon'] = $style_atts['icon2'];
else :
	$style = ( isset( $atts['style']['style'] ) && $atts['style']['style'] ) ? esc_attr($atts['style']['style']) : 'style1';
	$style_atts = jevelin_get_picker( $atts['style'] );
endif;

if( $style == 8 && !$style_atts['color_background'] ) {
	$class.= ' sh-iconbox-nobg';
}

if( isset($style_atts['active_hover_action']) && $style_atts['active_hover_action'] == true && $style == 'style11') :
	$class.= ' sh-iconbox-active-hover-action';
endif;

if( isset( $atts['improved_responsiveness'] ) && $atts['improved_responsiveness'] == 1 ) :
	$class.= ' improved-responsiveness';
endif;

if( !empty( $atts['box_alignment'] ) && $atts['box_alignment'] != 'default' ) :
	$class.= ' sh-iconbox-box-alignment-' . $atts['box_alignment'];
endif;

if( isset( $style_atts['shape'] ) && $style_atts['shape'] ) :
	$shape = $style_atts['shape'];
else :
	if( in_array($style, array( 'style2', 'style3', 'style4', 'style5', 'style6' )) ) :
		$shape = 'square';
	else :
		$shape = 'circle';
	endif;
endif;
?>

<div class="sh-iconbox sh-iconbox-<?php echo esc_attr( $style ); ?> sh-iconbox-<?php echo esc_attr( $alignment ); ?><?php echo esc_attr( $class ); ?>" id="iconbox-<?php echo esc_attr( $id ); ?>">
	<?php if( $style == 'style10' || $style == 'style11' ) : ?>

		<div class="sh-iconbox-container">
			<div class="sh-iconbox-top">
				<?php if( $icon ) : ?>
					<div class="sh-iconbox-icon">
						<div class="sh-iconbox-icon-shape sh-iconbox-square">
							<i class="sh-iconbox-hover <?php echo esc_attr( $icon ); ?>"></i>
						</div>
					</div>
				<?php endif; ?>

				<?php if( $title ) : ?>
					<div class="sh-iconbox-title">

						<?php if( $url ) : ?>
							<a href="<?php echo esc_url( $url ); ?>">
								<h3><?php echo esc_attr( $title ); ?></h3>
							</a>
						<?php else : ?>
							<h3><?php echo esc_attr( $title ); ?></h3>
						<?php endif; ?>

					</div>
				<?php endif; ?>
			</div>
			<div class="sh-iconbox-bottom">
				<div class="sh-iconbox-content">
					<?php echo wp_kses_post( $content ); ?>
				</div>
			</div>
		</div>

	<?php else : ?>

		<?php if( $icon ) : ?>
			<div class="sh-iconbox-icon">
				<div class="sh-iconbox-icon-shape sh-iconbox-<?php echo esc_attr( $shape ); ?>">
					<i class="sh-iconbox-hover <?php echo esc_attr( $icon ); ?>"></i>

					<?php if( in_array( $style, array('style1') ) ) : ?>
						<div class="sh-iconbox-icon2">
							<i class="<?php echo esc_attr( $style_atts['icon'] ); ?>"></i>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="sh-iconbox-aside<?php echo ( !$icon ) ? ' sh-iconbox-aside-noicon' : ''; ?>">
			<div class="sh-iconbox-title">
				<?php if( $url ) : ?>
					<a href="<?php echo esc_url( $url ); ?>">
						<h3><?php echo esc_attr( $title ); ?></h3>
					</a>
				<?php else : ?>
					<h3><?php echo esc_attr( $title ); ?></h3>
				<?php endif; ?>
			</div>
			<div class="sh-iconbox-seperator"></div>
			<div class="sh-iconbox-content">
				<?php echo ( $content ); ?>
			</div>
		</div>

	<?php endif; ?>
</div>
