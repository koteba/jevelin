<?php
/*-----------------------------------------------------------------------------------*/
/* Revolution Slider HTML
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
$class = ( $atts['class'] ) ? ' '. $atts['class'] : '';
?>

<div class="sh-revslider<?php echo esc_attr( $class ); ?>" id="revslider-<?php echo esc_attr( $atts['id'] ); ?>">
	<?php
		if( class_exists('RevSlider') && function_exists( 'putRevSlider' ) && $atts['slide'] ) :
			$slider = new RevSlider();
			$arrSliders = $slider->getArrSlidersShort();
			$validate = 0;
			foreach( $arrSliders as $key => $slide ) :
				if( $key == $atts['slide'] ) :
					$validate = 1;
				endif;
			endforeach;

			if( $validate == 1 ) :
				echo do_shortcode( '[rev_slider alias="'.esc_attr( $atts['slide'] ).'"]' );
			else :
				if( current_user_can( 'manage_options' ) ) :
					echo '<div style="text-align: center; padding: 25px; font-weight: bold;">'.esc_html__( 'Slide not found, please select other slide', 'jevelin' ).'</div>';
				endif;
			endif;
		endif;
	?>
</div>
