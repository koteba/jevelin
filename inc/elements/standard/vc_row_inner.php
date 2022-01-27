<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css
 * @var $el_id
 * @var $equal_height
 * @var $content_placement
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row_Inner
 */
$el_class = $equal_height = $content_placement = $css = $el_id = '';
$disable_element = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );
$css_classes = array(
	'vc_row',
	'wpb_row',
	//deprecated
	'vc_inner',
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);
if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if ( vc_shortcode_custom_css_has_property( $css, array(
	'border',
	'background',
) ) ) {
	$css_classes[] = 'vc_row-has-fill';
}

if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}


/* Jevelin Custom Changes - Starts */
$shadow = ( isset( $shadow ) ) ? $shadow : 'disabled';
$shadow_hover = ( isset( $shadow_hover ) ) ? $shadow_hover : 'disabled';
$padding = ( isset( $padding_tablet ) ) ? $padding_tablet : '';
$margin_large = ( isset( $margin_tablet_large ) ) ? $margin_tablet_large : '';
$margin = ( isset( $margin_tablet ) ) ? $margin_tablet : '';
$column_order = ( isset( $column_order ) ) ? $column_order : '';
$zindex = ( isset( $zindex ) ) ? $zindex : '';
$max_width = ( isset( $max_width ) ) ? $max_width : '';
$max_width = ( is_numeric( $max_width ) ) ? $max_width.'px' : $max_width;
$max_width_alignment = ( isset( $max_width_alignment ) && $max_width_alignment && in_array( $max_width_alignment, array( 'left', 'center', 'right' ) ) ) ? $max_width_alignment : 'center';
$max_width_alignment_mobile = ( isset( $max_width_alignment_mobile ) && $max_width_alignment_mobile && in_array( $max_width_alignment, array( 'left', 'center', 'right' ) ) ) ? $max_width_alignment_mobile : '';
$faster_parallax = ( isset( $faster_parallax ) ) ? $faster_parallax : '';
$background_image_mobile = ( isset( $background_image_mobile ) ) ? $background_image_mobile : '';
$background_position = ( isset( $background_position ) ) ? $background_position : 'default';
$overflow = ( isset( $overflow ) ) ? $overflow : 'default';
$full_width = ( isset( $full_width ) ) ? $full_width : '';
$style_element = '';
$element_css = '';
$element_id = 'vc_row_'.rand();
$css_classes[] = $element_id;




/*
** Shadows
*/
if( ( $shadow && $shadow != 'disabled' ) || $shadow_custom ) :
	if( $shadow_custom ) :
		$element_css.= '.'.$element_id.' { box-shadow: '.$shadow_custom.'!important; }';
		$css_classes[] = 'vc_element_shadow';
	else :
		$css_classes[] = 'vc_row_'.esc_attr( $shadow );
	endif;
endif;

if( ( $shadow_hover && $shadow_hover != 'disabled' ) || $shadow_hover_custom ) :
	if( $shadow_hover_custom ) :
		$element_css.= '.'.$element_id.':hover { box-shadow: '.$shadow_hover_custom.'!important; }';
		$css_classes[] = 'vc_element_shadow';
	else :
		$css_classes[] = 'vc_row_'.esc_attr( $shadow_hover ).'_hover';
	endif;
endif;




if( $max_width && !$full_width ) :
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
		$element_css.= '@media (max-width: 800px) {.'.$element_id.' { margin-left: auto!important; margin-right: auto!important; }}';
	elseif( $max_width_alignment_mobile == 'left' ) :
		$element_css.= '@media (max-width: 800px) {.'.$element_id.' { margin-left: 0!important; margin-right: auto!important; }}';
	elseif( $max_width_alignment_mobile == 'right' ) :
		$element_css.= '@media (max-width: 800px) {.'.$element_id.' { margin-left: auto!important; margin-right: 0!important; }}';
	endif;
endif;

if( $style_element ) :
	$style_element = ' style="'.$style_element.'"';
endif;

if( $padding ) :
	$element_css.= '@media (max-width: 800px) { #content .'.$element_id.', .sh-footer-template .'.$element_id.', .sh-header-template .'.$element_id.' { padding: '.$padding.'!important;}}';
endif;

if( $margin_large ) :
	$element_css.= '@media (max-width: 1025px) { #content .'.$element_id.', .sh-footer-template .'.$element_id.', .sh-header-template .'.$element_id.' { margin: '.$margin_large.'!important;}}';
endif;


if( $margin ) :
	$element_css.= '@media (max-width: 800px) { #content .'.$element_id.', .sh-footer-template .'.$element_id.', .sh-header-template .'.$element_id.' { margin: '.$margin.'!important;}}';
endif;

if( is_numeric( $background_image_mobile ) ) :
	$css_classes[] = 'vc_element_responsive_background_image';
	$element_css.= '@media (max-width: 800px) {.'.$element_id.' { background-image: url( "'.jevelin_get_small_thumb( $background_image_mobile ).'" )!important;}}';
endif;

if( $background_position != 'default' ) :
	$element_css.= ' .'.$element_id.' { background-position: '.$background_position.'!important; }';
endif;

if( $overflow != 'default' ) :
	$element_css.= ' .'.$element_id.':not(.vc_parallax):not(.jarallax) { overflow: '.$overflow.'!important; position: relative; }';
endif;

if( $zindex ) :
	$wrapper_attributes[] = 'style="z-index: '.$zindex.';"';
endif;

if( $column_order == 'reversed' ) :
	$css_classes[] = 'vc_row_reversed_columns';
endif;

if( $faster_parallax == 'standard' && strpos( implode( ' ', $css_classes), 'vc_parallax' ) == false ) :
	$css_classes[] = 'jarallax';
	$wrapper_attributes[] = 'data-jarallax';
	$wrapper_attributes[] = 'data-speed="0.2"';
endif;

if( $element_css ) :
	$element_css = '<style type="text/css">'.$element_css.'</style>';
endif;
/* Jevelin Custom Changes - Ends */


$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . ( $style_element ).'>'; /* Jevelin Custom Changes - $style_element */
$output .= wpb_js_remove_wpautop( $content ).$element_css; /* Jevelin Custom Changes - .$element_css */
$output .= '</div>';
$output .= $after_output;

echo $output;
