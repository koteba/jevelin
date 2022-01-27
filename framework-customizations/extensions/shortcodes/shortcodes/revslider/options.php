<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

if( class_exists('RevSlider') ) :
	$slider = new RevSlider();
	$arrSliders = $slider->getArrSlidersShort();
endif;

if( !isset($arrSliders) || !count($arrSliders) ) :
	$arrSliders = array(
		'noslides' => 'No slides found'
	);
endif;

$options = array(

	'id' => array( 'type' => 'unique' ),

	'slide' => array(
	    'type'  => 'select',
	    'label' => esc_html__('Revolution Slider', 'jevelin'),
	    'desc'  => esc_html__('Select your slide', 'jevelin'),
	    'choices' => $arrSliders,
	),
	
	'class'   => array(
		'type'  => 'text',
		'label' => esc_html__( 'Class Name', 'jevelin' ),
		'desc'  => esc_html__( 'Enter custom class name', 'jevelin' )
	),
);
