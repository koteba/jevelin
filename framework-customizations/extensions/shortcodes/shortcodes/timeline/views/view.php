<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Timeline HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$timeline = ( isset( $atts['timeline'] ) ) ? $atts['timeline'] : '';

/* If Visual Composer */
if( !isset( $atts['id'] ) ) :
	$timeline = vc_param_group_parse_atts( $timeline );
	$style = ( isset( $atts['style'] ) ) ? esc_attr($atts['style']) : 'style1';
else :
	$style = ( isset( $atts['style']['style'] ) ) ? esc_attr($atts['style']['style']) : 'style1';
endif;
?>

<?php if( $style == 'style2' || $style == 'style2 style3' ) : ?>

	<div class="sh-timeline-2 sh-timeline-<?php echo esc_attr( $style ); ?>" id="timeline-<?php echo esc_attr( $id ); ?>">
		<?php if( is_array( $timeline ) && count( $timeline ) ) : ?>
			<?php
				$i = 0;
				foreach( $timeline as $item ) : $i++;
					$image = '';
					$image_lightbox = '';
					if( isset( $item['image'] ) ) :
						if( isset( $atts['id'] ) ) :
							if( isset( $item['image'] ) && isset( $item['image']['attachment_id'] ) && $item['image']['attachment_id'] ) :
								$image_src = wp_get_attachment_image_src( esc_attr($item['image']['attachment_id'] ), 'medium' );
							endif;

							if( isset( $image_src ) && isset( $image_src[0] ) && $image_src ) :
								$image = esc_url( $image_src[0] );
							endif;
						else :
							$image = jevelin_get_small_thumb( $item['image'], 'large' );
						endif;

						if( $image ) :
							$image_lightbox = $image;
						endif;
					endif;

					$icon = ( isset( $item['icon'] ) ) ? $item['icon'] : '';
					$title = ( isset( $item['title'] ) ) ? $item['title'] : '';
					$content = ( isset( $item['content'] ) ) ? $item['content'] : '';
					$date = ( isset( $item['date'] ) ) ? $item['date'] : '';
			?>
				<div class="sh-timeline-item">
					<div class="sh-timeline-item-container">
						<div class="sh-timeline-box sh-timeline-box-left">
							<div class="sh-table">
								<?php if( $image ) : ?>
									<div class="sh-table-cell sh-timeline-image">
										<a href="<?php echo esc_url( $image_lightbox ); ?>" rel="lightbox" class="sh-timeline-image-container" style="background-image: url(<?php echo esc_url( $image ); ?>);"></a>
									</div>
								<?php endif; ?>
								<div class="sh-timeline-content-container sh-table-cell<?php if( !$image ) : ?> sh-timeline-content-full<?php endif; ?>">
									<h3>
										<?php if( $icon ) : ?>
											<i class="<?php echo esc_attr( $icon ); ?>"></i>
										<?php endif; ?>
										<?php echo esc_attr( $title ); ?>
									</h3>
									<div class="sh-timeline-content">
										<?php add_filter('wp_kses_allowed_html','jevelin_allow_iframe_tags', 1); ?>
										<?php echo wp_kses_post( apply_filters( 'the_content', $content ) ); ?>
										<?php remove_filter('wp_kses_allowed_html','jevelin_allow_iframe_tags', 1); ?>
									</div>
								</div>
							</div>
							<div class="sh-timeline-box-circle"></div>
							<div class="sh-timeline-box-tale"></div>
							<div class="sh-timeline-date">
								<?php echo esc_attr( $date ); ?>
							</div>
						</div>

						<div class="sh-timeline-box sh-timeline-box-right">
							<div class="sh-table">
								<div class="sh-timeline-content-container sh-table-cell<?php if( !$image ) : ?> sh-timeline-content-full<?php endif; ?>">
									<h3>
										<?php echo esc_attr( $title ); ?>
										<?php if( $icon ) : ?>
											<i class="<?php echo esc_attr( $icon ); ?>"></i>
										<?php endif; ?>
									</h3>
									<div class="sh-timeline-content">
										<?php add_filter('wp_kses_allowed_html','jevelin_allow_iframe_tags', 1); ?>
										<?php echo wp_kses_post( apply_filters( 'the_content', $content ) ); ?>
										<?php remove_filter('wp_kses_allowed_html','jevelin_allow_iframe_tags', 1); ?>
									</div>
								</div>
								<div class="sh-table-cell sh-timeline-image">
									<a href="<?php echo esc_url( $image_lightbox ); ?>" rel="lightbox" class="sh-timeline-image-container" style="background-image: url(<?php echo esc_url( $image ); ?>);"></a>
								</div>
							</div>
							<div class="sh-timeline-box-circle"></div>
							<div class="sh-timeline-box-tale"></div>
							<div class="sh-timeline-date">
								<?php echo esc_attr( $date ); ?>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>

<?php else : ?>

	<div class="sh-timeline" id="timeline-<?php echo esc_attr( $id ); ?>">
		<?php if( is_array( $timeline ) && count( $timeline ) ) : ?>
			<?php foreach( $timeline as $item ) :
				$title = ( isset( $item['title'] ) ) ? $item['title'] : '';
				$content = ( isset( $item['content'] ) ) ? $item['content'] : '';
				$date = ( isset( $item['date'] ) ) ? $item['date'] : '';
			?>
				<div class="sh-timeline-item">
					<div class="sh-timeline-item-container">
						<div class="sh-timeline-box">
							<?php echo esc_attr( $date ); ?>
							<div class="sh-timeline-box-circle"></div>
							<div class="sh-timeline-box-tale"></div>
						</div>
						<h3><?php echo esc_attr( $title ); ?></h3>
						<div class="sh-timeline-content">
							<?php echo wp_kses_post( $content ); ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>

<?php endif; ?>
