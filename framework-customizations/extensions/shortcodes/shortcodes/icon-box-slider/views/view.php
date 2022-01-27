<?php
if( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Icon Box Slider HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$slides = ( isset( $atts['slides'] ) ) ? $atts['slides'] : '';
$arrows = ( isset( $atts['arrows'] ) ) ? $atts['arrows'] : 'on';
$autoplay = ( isset( $atts['autoplay'] ) ) ? $atts['autoplay'] : 'on';
$class = '';

/* If Visual Composer */
if( !isset( $atts['id'] ) ) :
	$slides = vc_param_group_parse_atts( $slides );
endif;

if( is_array( $slides ) && count( $slides ) < 5 ) :
	$class = ' sh-iconbox-slider-dynamic';
endif;
?>

<div class="sh-iconbox-slider<?php echo esc_attr( $class ); ?>" id="iconbox-slider-<?php echo esc_attr( $id ); ?>">

	<div class="sh-iconbox-slider-content" id="iconbox-slider-content-<?php echo esc_attr( $id ); ?>">
		<?php
		if( is_array( $slides ) && count( $slides ) ) :
		foreach( $slides as $slide ) :
			$color = ( isset( $slide['color'] ) && $slide['color'] ) ? 'background-color: '.$slide['color'].';' : '';
			$content = ( isset( $slide['content2'] ) ) ? $slide['content2'] : $slide['content'];

			if( !empty( $slide['image'] ) ) :
				$image = ( isset( $atts['id'] ) ) ? jevelin_get_image( $slide['image'] ) : jevelin_get_small_thumb( $slide['image'], 'large' );
			else :
				$image = '';
			endif;
		?>
			<div class="sh-iconbox-slider-item" style="<?php echo esc_attr( $color ); ?>background-image: url( <?php echo esc_url( $image ); ?> );">
				<div class="sh-iconbox-slider-item-content">
					<div class="container">
						<div class="sh-iconbox-slider-item-content-container">
							<?php echo do_shortcode( $content ); ?>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; endif; ?>
	</div>

	<div class="container">
		<div class="sh-iconbox-slider-tabs<?php echo ( is_array( $slides ) && count($slides) <= 5 ) ? ' sh-iconbox-slider-lock' : ''; ?>" id="iconbox-slider-tabs-<?php echo esc_attr( $id ); ?>">
			<?php
			if( is_array( $slides ) && count( $slides ) ) :
			foreach( $slides as $slide ) :
				$icon = ( isset( $slide['icon'] ) ) ? $slide['icon'] : '';
				$title = ( isset( $slide['title'] ) ) ? $slide['title'] : '';
			?>
				<div class="sh-iconbox-slider-tab">

					<div class="sh-iconbox-slider-tab-container">
						<div class="sh-iconbox-slider-tab-content">
							<i class="<?php echo esc_attr( $icon ); ?>"></i>
							<h5><?php echo esc_attr( $title ); ?></h5>
						</div>
						<i class="sh-iconbox-slider-tab-icon <?php echo esc_attr( $icon ); ?>"></i>
					</div>

				</div>
			<?php endforeach; endif; ?>
		</div>
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function($){
			$('#iconbox-slider-content-<?php echo esc_attr( $id ); ?>').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: <?php echo ( $arrows == 'off' ) ? 'false' : 'true'; ?>,
				fade: true,
				asNavFor: '#iconbox-slider-tabs-<?php echo esc_attr( $id ); ?>',
		        prevArrow: '<button type="button" class="slick-prev"><span class="ti-angle-left"></span></button>',
		        nextArrow: '<button type="button" class="slick-next"><span class="ti-angle-right"></span></button>',
				autoplay: <?php echo ( $autoplay == 'off' ) ? 'false' : 'true'; ?>,
				autoplaySpeed: 6000,
			});
			$('#iconbox-slider-tabs-<?php echo esc_attr( $id ); ?>').slick({
				accessibility: false,
				slidesToShow: <?php echo ( is_array( $slides ) && count($slides ) < 5 ) ? esc_js( count($slides) ) : 5; ?>,
				slidesToScroll: 1,
				asNavFor: '#iconbox-slider-content-<?php echo esc_attr( $id ); ?>',
				arrows: false,
				dots: false,
				centerMode: <?php echo ( is_array( $slides ) && count($slides ) < 6 ) ? 'false' : 'true'; ?>,
				focusOnSelect: true,
				responsive: [
					{
						breakpoint: 1000,
						settings: {
							slidesToShow: <?php echo ( is_array( $slides ) && count($slides ) < 3 ) ? esc_js( count($slides) ) : 3; ?>,
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: <?php echo ( is_array( $slides ) && count($slides ) < 2 ) ? 1 : 2; ?>
						}
					}
				]
			});
		});
	</script>

</div>
