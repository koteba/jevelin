<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Accordion HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$testimonials = ( isset( $atts['testimonials'] ) ) ? $atts['testimonials'] : '';
$icon_close = ( isset( $atts['icon_close'] ) ) ? $atts['icon_close'] : 'fa fa-chevron-up';
$icon = ( isset( $atts['icon'] ) ) ? $atts['icon'] : 'fa fa-chevron-down';
$icon_position = ( isset( $atts['icon_position'] ) ) ? $atts['icon_position'] : 'left';
$icon_position = ( isset( $atts['icon_position'] ) ) ? $atts['icon_position'] : 'left';

if( !isset( $atts['collapsed'] ) ) :
	$collapsed = 1;
elseif( $atts['collapsed'] == 1 || $atts['collapsed'] == 'true' ) :
	$collapsed = 1;
else :
	$collapsed = 0;
endif;


/* If Visual Composer */
if( !isset( $atts['id'] ) ) :
	$testimonials = vc_param_group_parse_atts( $testimonials );
	$style = ( isset( $atts['style'] ) ) ? $atts['style'] : 'style1';
else :
	$style = ( isset( $atts['style']['style'] ) ) ? $atts['style']['style'] : 'style1';
endif;
?>

<div class="sh-accordion sh-accordion-<?php echo esc_attr( $style ); ?> panel-group" id="accordion-<?php echo esc_attr( $id ); ?>" role="tablist" aria-multiselectable="true">
	<?php
		$i = 0;
		if( $collapsed != true ) :
			$i++;
		endif;
	?>

	<?php
	if( is_array( $testimonials ) && count( $testimonials ) ) :
	wp_reset_postdata();

	foreach( $testimonials as $item ) :
		$title = ( isset( $item['title'] ) ) ? $item['title'] : '';
		$content = ( isset( $item['content'] ) ) ? $item['content'] : '';

		if( !isset( $atts['id'] ) ) :
			$icon_current = $icon;
		else :
			$icon_current = ( $style == 'style1 sh-accordion-style6' && isset( $item['icon'] ) && $item['icon'] ) ? $item['icon'] : $icon;
		endif;

		$i++;
		$collapse = 'collapse-'.$id.'-'.$i;
		$heading = 'heading-'.$id.'-'.$i; ?>

		<div class="sh-accordion-item panel panel-default">
			<div class="panel-heading" role="tab" id="<?php echo esc_attr( $heading ); ?>">
				<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion-<?php echo esc_attr( $id ); ?>" href="#<?php echo esc_attr( $collapse ); ?>" aria-expanded="<?php echo ($i == 1) ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $collapse ); ?>" class="<?php echo ($i != 1) ? 'collapsed' : ''; ?>">

						<?php if( isset($icon_position) && $icon_position != 'right' ) : ?>

							<div class="sh-table">
								<div class="sh-table-cell sh-accordion-icon-cell">
									<span class="sh-accordion-icon">

										<?php if( $icon_close ) : ?>
											<i class="open-icon <?php echo esc_attr( $icon_current ); ?>"></i>
											<i class="close-icon <?php echo esc_attr( $icon_close ); ?>"></i>
										<?php else : ?>
											<i class="<?php echo esc_attr( $icon_current ); ?>"></i>
										<?php endif; ?>

									</span>
								</div>
								<div class="sh-table-cell sh-accordion-content-cell">
									<span class="sh-accordion-title"><?php echo esc_attr( $title ); ?></span>
								</div>
							</div>

						<?php else : ?>

							<div class="sh-table">
								<div class="sh-table-cell-top sh-accordion-content-cell">
									<span><?php echo esc_attr( $title ); ?></span>
								</div>
								<div class="sh-table-cell-top sh-accordion-icon-cell">
									<span class="sh-accordion-icon">

										<?php if( $icon_close ) : ?>
											<i class="open-icon <?php echo esc_attr( $icon_current ); ?>"></i>
											<i class="close-icon <?php echo esc_attr( $icon_close ); ?>"></i>
										<?php else : ?>
											<i class="<?php echo esc_attr( $icon_current ); ?>"></i>
										<?php endif; ?>

									</span>
								</div>
							</div>

						<?php endif; ?>

					</a>
				</h4>
			</div>
			<div id="<?php echo esc_attr( $collapse ); ?>" class="panel-collapse collapse<?php echo ($i == 1) ? ' in' : ''; ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $heading ); ?>">
				<div class="panel-body">

					<div class="sh-table">
						<?php if( isset($icon_position) && $icon_position != 'right' ) : ?>

							<div class="sh-table-cell-top sh-accordion-icon-cell">
								<span class="sh-accordion-icon">

									<?php if( $icon_close ) : ?>
										<i class="open-icon <?php echo esc_attr( $icon ); ?>"></i>
										<i class="close-icon <?php echo esc_attr( $icon_close ); ?>"></i>
									<?php else : ?>
										<i class="<?php echo esc_attr( $icon ); ?>"></i>
									<?php endif; ?>

								</span>
							</div>

						<?php endif; ?>
						<div class="sh-table-cell-top sh-accordion-content-cell">
							<?php add_filter('wp_kses_allowed_html','jevelin_allow_iframe_tags', 1); ?>
							<?php echo wp_kses_post( apply_filters( 'the_content', $content ) ); ?>
							<?php remove_filter('wp_kses_allowed_html','jevelin_allow_iframe_tags', 1); ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	<?php endforeach; endif; ?>
</div>
