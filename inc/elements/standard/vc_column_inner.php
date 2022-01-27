<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $el_id
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column_Inner
 */
$el_class = $width = $el_id = $css = $offset = '';
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	$this->getExtraClass( $el_class ),
	'wpb_column',
	'vc_column_container',
	$width,
);

if ( vc_shortcode_custom_css_has_property( $css, array(
	'border',
	'background',
) ) ) {
	$css_classes[] = 'vc_col-has-fill';
}


/* Jevelin Custom Changes - Starts */
$shadow = ( isset( $shadow ) ) ? $shadow : 'disabled';
$shadow_custom = ( isset( $shadow_custom ) ) ? $shadow_custom : '';
$shadow_hover = ( isset( $shadow_hover ) ) ? $shadow_hover : 'disabled';
$shadow_costum_hover = ( isset( $shadow_costum_hover ) ) ? $shadow_costum_hover : '';
$shadow_for = ( isset( $shadow_for ) ) ? $shadow_for : 'outer';
$zindex = ( isset( $zindex ) ) ? $zindex : '';
$padding = ( isset( $padding_tablet ) ) ? $padding_tablet : '';
$max_width = ( isset( $max_width ) ) ? $max_width : '';
$background_image_hover = ( isset( $background_image_hover ) ) ? $background_image_hover : '';
$max_width = ( isset( $max_width ) && is_numeric( $max_width ) ) ? $max_width.'px' : $max_width;
$max_width_alignment = ( isset( $max_width_alignment ) && $max_width_alignment && in_array( $max_width_alignment, array( 'left', 'center', 'right' ) ) ) ? $max_width_alignment : 'center';
$max_width_alignment_mobile = ( isset( $max_width_alignment_mobile ) && $max_width_alignment_mobile && in_array( $max_width_alignment, array( 'left', 'center', 'right' ) ) ) ? $max_width_alignment_mobile : '';
$responsive_border = ( isset( $responsive_border ) ) ? $responsive_border : '';
$mobile_element_alignment = ( isset( $mobile_element_alignment ) ) ? $mobile_element_alignment : '';
$css_animation = ( isset( $css_animation ) ) ? $css_animation : '';
$css_animation_delay = ( isset( $css_animation_delay ) ) ? $css_animation_delay : '';
$css_animation_speed = ( isset( $css_animation_speed ) ) ? $css_animation_speed : '';
$overflow = ( isset( $overflow ) ) ? $overflow : 'default';
$element_id = 'vc_column_'.rand();
$style_element = '';
$element_css = '';
$wrapper_attributes = array();
$wrapper_attributes_style = '';
$css_classes2 = array();

/* CSS Animation Style */
if( $css_animation ) :
	$css_classes[] = $this->getCSSAnimation( $css_animation );
endif;

/* CSS Animation Speed */
if( $css_animation_speed ) :
	$wrapper_attributes_style.= 'animation-duration: '.floatval( $css_animation_speed ).'s;';
endif;

/* CSS Animation Custom Delay System */
if( $css_animation_delay ) :
	$wrapper_attributes_style.= 'animation-delay: '.floatval( $css_animation_delay ).'s;';
	$css_classes[] = 'sh-animated';

	$wrapper_attributes[] = 'data-wow-delay="'. $css_animation_delay .'s"';
	$wrapper_attributes[] = 'data-wow-duration="'. $css_animation_speed .'s"';

	foreach( $css_classes as $key=>$item ) :
		if( is_numeric( strpos( $item, 'wpb_animate_when_almost_visible') ) ) :
			$css_classes[$key] = str_replace( 'wpb_animate_when_almost_visible ', '', $css_classes[$key] );
		endif;
	endforeach;
endif;


if( $mobile_element_alignment && $mobile_element_alignment != 'disabled' ) :
	$css_classes[] = 'vc_column_mobile_element_alignment_'.esc_attr( $mobile_element_alignment );
endif;




/*
** Shadows
*/
if( ( $shadow && $shadow != 'disabled' ) || $shadow_custom ) :
	if( $shadow_for == 'inner' ) :
		if( $shadow_custom ) :
			$element_css.= '.'.$element_id.' > .vc_column-inner { box-shadow: '.$shadow_custom.'!important; }';
			$css_classes2[] = 'vc_element_shadow';
		else :
			$css_classes2[] = 'vc_column_'.esc_attr( $shadow );
		endif;
	else :
		if( $shadow_custom ) :
			$element_css.= '.'.$element_id.' { box-shadow: '.$shadow_custom.'!important; }';
			$css_classes[] = 'vc_element_shadow';
		else :
			$css_classes[] = 'vc_column_'.esc_attr( $shadow );
		endif;
	endif;
endif;

if( ( $shadow_hover && $shadow_hover != 'disabled' ) || $shadow_hover_custom ) :
	if( $shadow_for == 'inner' ) :
		if( $shadow_hover_custom ) :
			$element_css.= '.'.$element_id.' > .vc_column-inner:hover { box-shadow: '.$shadow_hover_custom.'!important; }';
			$css_classes2[] = 'vc_element_shadow';
		else :
			$css_classes2[] = 'vc_column_'.esc_attr( $shadow_hover ).'_hover';
		endif;
	else :
		if( $shadow_hover_custom ) :
			$element_css.= '.'.$element_id.':hover { box-shadow: '.$shadow_hover_custom.'!important; }';
			$css_classes[] = 'vc_element_shadow';
		else :
			$css_classes[] = 'vc_column_'.esc_attr( $shadow_hover ).'_hover';
		endif;
	endif;
endif;




if( $responsive_border == 'disabled' ) :
	$css_classes[] = 'vc_column_reponsive_border_disabled';
endif;

if( $max_width ) :
	$style_element.= 'width: 100%; max-width: '.$max_width.';';

	// Desktop alignment
	if( $max_width_alignment == 'center' ) :
		$style_element.= 'margin-left: auto; margin-right: auto;';
	elseif( $max_width_alignment == 'left' ) :
		$style_element.= 'margin-left: 0; margin-right: auto;';
	else :
		$style_element.= 'margin-left: auto; margin-right: 0;';
	endif;

	// Mobile alignment
	if( $max_width_alignment_mobile == 'center' ) :
		$element_css.= '@media (max-width: 800px) {.'.$element_id.' > .vc_column-inner > .wpb_wrapper { margin-left: auto!important; margin-right: auto!important; }}';
	elseif( $max_width_alignment_mobile == 'left' ) :
		$element_css.= '@media (max-width: 800px) {.'.$element_id.' > .vc_column-inner > .wpb_wrapper { margin-left: 0!important; margin-right: auto!important; }}';
	elseif( $max_width_alignment_mobile == 'right' ) :
		$element_css.= '@media (max-width: 800px) {.'.$element_id.' > .vc_column-inner > .wpb_wrapper { margin-left: auto!important; margin-right: 0!important; }}';
	endif;
endif;

if( $overflow != 'default' ) :
	$element_css.= ' .'.$element_id.':not(.vc_parallax):not(.jarallax) { overflow: '.$overflow.'!important; position: relative; }';
endif;

if( $zindex ) :
	$wrapper_attributes_style = 'z-index: '.$zindex.';';
endif;

if( $style_element ) :
	$style_element = ' style="'.$style_element.'"';
endif;

if( $padding ) :
	$element_css.= '@media (max-width: 800px) { .'.$element_id.' > .vc_column-inner { padding: '.$padding.'!important;}}';
endif;


// Custom Mobile Background Image
if( $background_image_hover ) :
	$element_css.= '.'.$element_id.':hover > .vc_column-inner { background-image: url( '.jevelin_get_small_thumb( $background_image_hover, 'large' ).' )!important; } ';
	$element_css.= '.'.$element_id.' > .vc_column-inner { transition: 0.3s all ease-in-out; }.';
	$css_classes[] = 'vc_element_responsive_background_image';
endif;

if( $element_css ) :
	$element_css = '<style type="text/css">'.$element_css.'</style>';
	$css_classes[] = $element_id;
endif;


if( $wrapper_attributes_style ) :
	$wrapper_attributes[] = 'style="'.$wrapper_attributes_style.'"';
endif;

$css_classes2 = ( is_array( $css_classes2 ) && count( $css_classes2 ) ) ? ' '.implode( ' ', $css_classes2 ) : '';
/* Jevelin Custom Changes - Ends */


$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= '<div class="vc_column-inner ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . $css_classes2 . '">';
$output .= '<div class="wpb_wrapper"'. $style_element .'>'; /* Jevelin Custom Changes - $style_element */
$output .= wpb_js_remove_wpautop( $content ).$element_css; /* Jevelin Custom Changes - .$element_css */
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

echo $output;
