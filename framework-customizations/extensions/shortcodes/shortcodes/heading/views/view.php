<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Heading HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$class = ( isset( $atts['custom_class'] ) && $atts['custom_class'] ) ? ' '.$atts['custom_class'] : '';
$heading = ( isset( $atts['heading'] ) && $atts['heading'] ) ? $atts['heading'] : 'h2';
$animated = ( isset( $atts['animation'] ) && $atts['animation'] != 'none' ) ? ' sh-animated '. $atts['animation'] : '';
$animated_delay = ( $animated && $atts['animation_delay'] ) ? 'data-wow-delay="'. $atts['animation_delay'] .'s"' : '';
$animated_speed = ( $animated && $atts['animation_speed'] ) ? 'data-wow-duration="'. $atts['animation_speed'] .'s"' : '';

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
		array( 'name' => 'background_text', 'if' => in_array( $style, array( 'style2' ) ), 'default' => 'Just a sample text' ),
	));

	$size = ( isset( $atts['size'] ) ) ? $atts['size'] : 'default';
else :
	$style = ( isset( $atts['style']['style'] ) ) ? $atts['style']['style'] : 'style1';
	$style_atts = jevelin_get_picker( $atts['style'] );

	$size = ( isset( $atts['size']['size'] ) ) ? $atts['size']['size'] : 'default';
endif;
$size_class = ' size-'.$size;
$class.= ' size-'.$size;
?>

<?php if( $style == 'style2' ) : ?>

	<div class="sh-heading sh-heading-style2" id="heading-<?php echo esc_attr( $id ); ?><?php echo esc_attr( $animated ); ?>"<?php echo wp_kses_post( $animated_speed ) . wp_kses_post( $animated_delay ); ?>>
		<div class="sh-heading-additional">
			<div class="sh-table-full">
				<div class="sh-table-cell">
					<<?php echo esc_attr( $heading ); ?> class="sh-heading-content<?php echo esc_attr( $class ); ?>">
						<?php echo jevelin_remove_p( $content ); ?>
					</<?php echo esc_attr( $heading ); ?>>
				</div>
			</div>
		</div>
		<?php if( $style_atts['background_text'] ) : ?>
			<div class="sh-heading-additional-text sh-noselect">
				<?php echo esc_attr( $style_atts['background_text'] ); ?>
			</div>
		<?php endif; ?>
	</div>

<?php else : ?>

	<div class="sh-heading sh-heading-<?php echo esc_attr( $style ); ?><?php echo esc_attr( $animated ); ?>" id="heading-<?php echo esc_attr( $id ); ?>"<?php echo esc_attr( $animated_speed ) . esc_attr( $animated_delay ) ; ?>>
		<<?php echo esc_attr( $heading ); ?> class="sh-heading-content<?php echo esc_attr( $class ); ?>">
			<?php echo jevelin_replace_p( $content ); ?>
		</<?php echo esc_attr( $heading ); ?>>
	</div>

<?php endif; ?>
