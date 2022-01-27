<?php
/*-----------------------------------------------------------------------------------*/
/* Text Group HTML
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
$class = array();
$class[] = 'sh-text-group'; ?>

<div id="text-group-<?php echo esc_attr( $atts['id'] ); ?>" class="<?php echo esc_attr( implode( " ", $class ) ); ?>">

	<?php if( $atts['content'] && $atts['content_two'] ) : ?>
		<?php if( isset( $atts['layout'] ) && $atts['layout'] == 'layout2' ) : ?>
			<div class="text-group-layout2">
				<div class="text-group-content" style="display: inline-block; vertical-align: bottom; margin-right: 15px;">
					<?php echo do_shortcode( $atts['content'] ); ?>
				</div>
				<div class="text-group-content" style="display: inline-block; vertical-align: bottom;">
					<?php echo do_shortcode( $atts['content_two'] ); ?>
				</div>
			</div>
		<?php else : ?>
			<div class="row">
				<div class="col-md-6">
					<?php echo do_shortcode( $atts['content'] ); ?>
				</div>
				<div class="col-md-6">
					<?php echo do_shortcode( $atts['content_two'] ); ?>
				</div>
			</div>
		<?php endif; ?>
	<?php elseif( $atts['content_two'] ) : ?>
		<div class="row">
			<div class="text-group-content col-md-12">
				<?php echo do_shortcode( $atts['content_two'] ); ?>
			</div>
		</div>
	<?php elseif( $atts['content'] ) : ?>
		<div class="row">
			<div class="text-group-content col-md-12">
				<?php echo do_shortcode( $atts['content'] ); ?>
			</div>
		</div>
	<?php endif; ?>

</div>
