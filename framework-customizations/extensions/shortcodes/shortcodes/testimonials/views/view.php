<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Testiomonials HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$style = ( isset( $atts['style'] ) ) ? $atts['style'] : 'style1';
$testimonials = ( isset( $atts['testimonials'] ) ) ? $atts['testimonials'] : array();
$quote = ( isset( $atts['quote'] ) && $atts['quote'] ) ? $atts['quote'] : 'on';
$autoplay_data = '';
$i = 0;


/* If Visual Composer */
if( !isset( $atts['id'] ) ) :
	$testimonials = vc_param_group_parse_atts( $testimonials );
	$autoplay = ( isset( $atts['autoplay'] ) ) ? $atts['autoplay'] : 'off';
else :
	$autoplay = ( isset( $atts['autoplay']['autoplay'] ) ) ? $atts['autoplay']['autoplay'] : 'off';
endif;


/* Autoplay
if( $autoplay == 'on' ) :
	$autoplay_data = ' data-autoplay="'.intval( $autoplay_atts['animation_speed'] * 1000 ).'"';
endif; */

$slidesToShow = ($style == 'style4' || $style == 'style5') ? '3' : '1';
if( is_array( $testimonials ) && count( $testimonials ) < $slidesToShow && count( $testimonials ) > 0 ) :
	$slidesToShow = count( $testimonials );
endif;
?>

<script type="text/javascript">
jQuery(document).ready(function ($) {

	$('#testimonials-slider-<?php echo esc_js( $id ); ?>').on('init', function(event, slick, currentSlide, nextSlide){
		$('#testimonials-<?php echo esc_js( $id ); ?> .sh-testimonials-switch').css( 'opacity','1' );
	});

	$('#testimonials-slider-<?php echo esc_js( $id ); ?>').slick({
		dots: false,
		arrows: true,
		infinite: true,
		speed: 500,
		slidesToShow: <?php echo $slidesToShow; ?>,
		fade: <?php echo ($style != 'style4' && $style != 'style5') ? 'true' : 'false'; ?>,
		responsive: [
			{
				breakpoint: 1000,
				settings: {
					slidesToShow: 1
				}
			}
		],
		adaptiveHeight: true,
		autoplay: <?php if( $autoplay == 'on' ) { echo 'true'; } else { echo 'false'; } ?>,
		autoplaySpeed: 5000,
	});

	function testimonials_slider_update_<?php echo esc_js( $id ); ?>() {
		$('#testimonials-slider-<?php echo esc_js( $id ); ?> .slick-slide').css('height', '');
		var stHeight = $('#testimonials-slider-<?php echo esc_js( $id ); ?> .slick-track').height();
		$('#testimonials-slider-<?php echo esc_js( $id ); ?> .slick-slide').css('height',stHeight + 'px' );
	}

	testimonials_slider_update_<?php echo esc_js( $id ); ?>();
	$(window).on( 'load resize', function() {
		setTimeout(function(){
			testimonials_slider_update_<?php echo esc_js( $id ); ?>();
		}, 50);
	});

	$('#testimonials-<?php echo esc_js( $id ); ?> .sh-testimonials-prev').on( 'click', function() {
		$('#testimonials-slider-<?php echo esc_js( $id ); ?>').slick('slickPrev');
	});

	$('#testimonials-<?php echo esc_js( $id ); ?> .sh-testimonials-next').on( 'click', function() {
		$('#testimonials-slider-<?php echo esc_js( $id ); ?>').slick('slickNext');
	});

});
</script>

<div id="testimonials-<?php echo esc_attr( $id ); ?>" class="sh-testimonials sh-testimonials-quote-<?php echo esc_attr( $quote ); ?> sh-testimonials-<?php echo esc_attr( $style ); ?>"<?php echo esc_attr( $autoplay_data ); ?>>
	<div class="sh-testimonials-group" id="testimonials-slider-<?php echo esc_attr( $id ); ?>">
		<?php if( in_array( $style, array('style3') ) ) : $j = 0; ?>
			<?php foreach( $testimonials as $item ) : $j++; $i++;
				$item_avatar = ( isset( $item['avatar'] ) ) ? $item['avatar'] : '';
				$item_name =  ( isset( $item['name'] ) ) ? $item['name'] : '';
				$item_job = ( isset( $item['job'] ) ) ? $item['job'] : '';
				$item_quote = ( isset( $item['quote'] ) ) ? $item['quote'] : '';

				if( $item_avatar ) :
					$item_avatar = ( $item_avatar && !is_array( $item_avatar ) ) ? jevelin_get_small_thumb( $item_avatar, 'large' ) : jevelin_get_image( $item_avatar );
				endif;
			?>

				<?php if( $j == 1 ) : ?>
					<div class="sh-testimonials-item">
				<?php endif; ?>

					<div class="sh-testimonials-item-container">
						<div class="sh-testimonials-table sh-table text-left">
							<div class="sh-testimonials-table-icon sh-table-cell text-center">
								<div class="sh-testimonials-quote-icon">
									<i class="ti-quote-right"></i>
								</div>
							</div>
							<?php if( $item_avatar ) : ?>
								<div class="sh-testimonials-table-image sh-table-cell">
									<div class="sh-testimonials-image" style="background-image: url(<?php echo esc_url( $item_avatar ); ?>);"></div>
								</div>
							<?php endif; ?>
							<div class="sh-testimonials-table-name sh-table-cell">
								<div class="sh-testimonials-name">
									<h3><?php echo esc_attr( $item_name ); ?></h3>
								</div>
								<div class="sh-testimonials-job">
									<?php echo esc_attr( $item_job ); ?>
								</div>
							</div>
							<div class="sh-testimonials-table-quote sh-table-cell-top">
								<div class="sh-testimonials-quote">
									<?php echo esc_attr( $item_quote ); ?>
								</div>
							</div>
						</div>
					</div>

				<?php if( $j == 2 || $i == count($testimonials) ) : $j = 0; ?>
					</div>
				<?php endif; ?>

			<?php endforeach; ?>
		<?php else : ?>
			<?php foreach( $testimonials as $item ) :
				$item_avatar = ( isset( $item['avatar'] ) ) ? $item['avatar'] : '';
				$item_avatar2 = ( isset( $item['avatar2'] ) ) ? $item['avatar2'] : '';
				$item_name =  ( isset( $item['name'] ) ) ? $item['name'] : '';
				$item_job = ( isset( $item['job'] ) ) ? $item['job'] : '';
				$item_quote = ( isset( $item['quote'] ) ) ? $item['quote'] : '';

				if( $item_avatar ) :
					$item_avatar = ( $item_avatar && !is_array( $item_avatar ) ) ? jevelin_get_small_thumb( $item_avatar, 'large' ) : jevelin_get_image( $item_avatar );
				endif;

				if( $item_avatar2 ) :
					$item_avatar2 = ( $item_avatar2 && !is_array( $item_avatar2 ) ) ? jevelin_get_small_thumb( $item_avatar2, 'large' ) : jevelin_get_image( $item_avatar2 );
				endif;
			?>
				<div class="sh-testimonials-item">

					<?php if( in_array( $style, array('style4','style5') ) ) : ?>

						<div class="sh-testimonials-item-container" style="background-image: url(<?php echo esc_url( $item_avatar ); ?>);">
							<div class="sh-testimonials-item-top">
								<div class="sh-testimonials-avatar2">
									<img src="<?php echo esc_url( $item_avatar2 ); ?>" alt="">
								</div>

								<div class="sh-testimonials-name">
									<h3><?php echo esc_attr( $item_name ); ?></h3>
								</div>
								<div class="sh-testimonials-job">
									<?php echo esc_attr( $item_job ); ?>
								</div>
							</div>

							<div class="sh-testimonials-table sh-table">
								<div class="sh-testimonials-table-icon sh-table-cell">
									<i class="ti-quote-right"></i>
								</div>
								<div class="sh-testimonials-table-quote sh-table-cell-top">
									<div class="sh-testimonials-quote">
										<?php echo esc_attr( $item_quote ); ?>
									</div>
								</div>
							</div>
						</div>

					<?php elseif( in_array( $style, array('style2') ) ) : ?>

						<div class="sh-testimonials-top">
							<div class="sh-testimonials-image" style="background-image: url(<?php echo esc_url( $item_avatar ); ?>);"></div>

							<div class="sh-testimonials-top-aside">
								<div class="sh-testimonials-name">
									<h3><?php echo esc_attr( $item_name ); ?></h3>
								</div>

								<div class="sh-testimonials-job">
									<?php echo esc_attr( $item_job ); ?>
								</div>
							</div>
						</div>
						<div class="sh-testimonials-quote">
							<?php echo esc_attr( $item_quote ); ?>
						</div>

					<?php else : ?>

						<div class="sh-testimonials-table sh-table">
							<div class="sh-table-cell" style="width: 50%;">
								<div class="sh-testimonials-switch sh-testimonials-switch-left sh-group">
									<div class="sh-testimonials-prev">
										<i class="icon-arrow-left"></i>
									</div>
								</div>
							</div>
							<div class="sh-table-cell sh-testimonials-center">
								<div class="sh-testimonials-image" style="background-image: url(<?php echo esc_url( $item_avatar ); ?>);"></div>

								<?php if( $style == 'style6' ) : ?>
									<div class="sh-testimonials-quote-icon-container">
										<div class="sh-testimonials-quote-icon text-center">
											<i class="ti-quote-right"></i>
										</div>
									</div>
								<?php endif; ?>
							</div>
							<div class="sh-table-cell" style="width: 50%;">
								<div class="sh-testimonials-switch sh-testimonials-switch-right sh-group">
									<div class="sh-testimonials-next">
										<i class="icon-arrow-right"></i>
									</div>
								</div>
							</div>
						</div>

						<div class="sh-testimonials-quote">
							<?php echo esc_attr( $item_quote ); ?>
						</div>

						<div class="sh-testimonials-name">
							<h3><?php echo esc_attr( $item_name ); ?></h3>
						</div>

						<div class="sh-testimonials-job">
							<?php echo esc_attr( $item_job ); ?>
						</div>

						<?php if( $style == 'style1' ) : ?>
							<div class="sh-testimonials-quote-icon text-center">
								<i class="ti-quote-right"></i>
							</div>
						<?php endif; ?>

					<?php endif; ?>

				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>

	<?php if( count($testimonials) > 0 && !in_array( $style, array('style1','style6') ) ) : ?>
		<?php if( $style != 'style3' || ( $style == 'style3' && count($testimonials) > 2 ) ) : ?>
			<?php if( $style != 'style4' && $style != 'style5' || ( $style == 'style4' && count($testimonials) > 3 ) ) : ?>
				<div class="sh-testimonials-switch sh-group">
					<div class="sh-testimonials-prev">
						<i class="icon-arrow-left"></i>
					</div>
					<div class="sh-testimonials-next">
						<i class="icon-arrow-right"></i>
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
</div>
