<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Image Points HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$columns = ( isset( $atts['columns'] ) ) ? $atts['columns'] : '3columns';
$dots = ( isset( $atts['dots'] ) ) ? $atts['dots'] : 'dots1';

/* Lazy Loading */
if( isset( $atts['lazy'] ) && $atts['lazy'] == 'default' ) :
	$lazy = ( jevelin_option('lazy_loading') == 'enabled' ) ? 1 : 0;
else :
	$lazy = ( isset( $atts['lazy'] ) && $atts['lazy'] == 'enabled' ) ? 1 : 0;
endif;

/* Image Sizes */
if( isset( $atts['image_ratio'] ) && $atts['image_ratio'] == 'landscape' ) :
	$image_ratio = 'post-thumbnail';
elseif( isset( $atts['image_ratio'] ) && $atts['image_ratio'] == 'portrait' ) :
	$image_ratio = 'jevelin-portrait';
elseif( isset( $atts['image_ratio'] ) && $atts['image_ratio'] == 'large' ) :
	$image_ratio = 'large';
elseif( isset( $atts['image_ratio'] ) && $atts['image_ratio'] == 'full' ) :
	$image_ratio = 'full';
else :
	$image_ratio = 'jevelin-square';
endif;

$class = '';
if( !isset( $atts['overlay'] ) || $atts['overlay'] == 'off' ) :
	$class = ' sh-image-gallery-noverlay';
endif;

if( isset( $atts['dots_alignment'] ) && $atts['dots_alignment'] && $atts['dots_alignment'] != 'center' ) :
	$class = ' sh-image-gallery-dots-'.$atts['dots_alignment'];
endif;

if( isset( $atts['shadow'] ) && $atts['shadow'] != 'disabled' ) :
	$class.= ' sh-single-image-'. $atts['shadow'] ;
endif;

if( isset( $atts['overlay'] ) && $atts['overlay'] == 'off' ) :
	$class.= ' sh-image-gallery-nozoom' ;
endif;


/* Images */
$images = [];
if( isset( $atts['images'] ) ) :
	$images = ( !isset( $atts['id'] ) ) ? explode( ',', $atts['images'] ) : $atts['images'];
endif;


/* If Visual Composer */
if( !isset( $atts['id'] ) ) :
	$autoplay = ( isset( $atts['autoplay'] ) ) ? $atts['autoplay'] : 'off';
	$autoplay_atts = array();
	$autoplay_atts['animation_speed'] = ( isset( $atts['animation_speed'] ) ) ? $atts['animation_speed'] : '';
	$autoplay_atts['animation_speed'] = ( !$autoplay_atts['animation_speed'] && in_array( $autoplay, array( 'on' ) ) ) ? 3 : $autoplay_atts['animation_speed'];
else :
	$autoplay = ( isset( $atts['autoplay']['autoplay'] ) ) ? $atts['autoplay']['autoplay'] : 'off';
	$autoplay_atts = jevelin_get_picker( $atts['autoplay'] );
endif;

$autoplay_data = '';
if( !empty( $autoplay_atts['animation_speed'] ) ) :
	$autoplay_data = ' data-autoplay="'.intval( $autoplay_atts['animation_speed'] * 1000 ).'"';
endif;
?>


<?php /* Visual Composer Optimization */ ?>
<?php if( jevelin_is_vc_front() ) : ?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			if( $.isFunction( $.fn.isotope ) ) {

		        var image_gallery_columns = parseInt( $('#image-gallery-<?php echo esc_attr( $id ); ?>').attr('data-columns') );
		        if( isNaN( image_gallery_columns ) ) {
		            image_gallery_columns = 1;
		        }

		        if( image_gallery_columns >= 3 ) {
		            var image_gallery_1024 = 3;
		        } else {
		            var image_gallery_1024 = image_gallery_columns;
		        }

		        if( image_gallery_columns >= 2 ) {
		            var image_gallery_600 = 2;
		        } else {
		            var image_gallery_600 = image_gallery_columns;
		        }

		        var image_gallery_autoplay = parseInt( $('#image-gallery-<?php echo esc_attr( $id ); ?>').attr('data-autoplay') );
		        if( image_gallery_autoplay > 0 ) {
		            var image_gallery_autoplay_status = true;
		            var image_gallery_autoplay_speed = parseInt( image_gallery_autoplay );
		        } else {
		            var image_gallery_autoplay_status = false;
		            var image_gallery_autoplay_speed = 0;
		        }
		        var image_gallery_infinite = ( image_gallery_autoplay_status == true ) ? true : false;

		        $('#image-gallery-<?php echo esc_attr( $id ); ?>').slick({
		            infinite: image_gallery_infinite,
		            dots: true,
		            slidesToShow: image_gallery_columns,
		            slidesToScroll: image_gallery_columns,
		            autoplay: image_gallery_autoplay_status,
		            autoplaySpeed: image_gallery_autoplay_speed,
		            responsive: [
		                {
		                    breakpoint: 1024,
		                    settings: {
		                        slidesToShow: image_gallery_1024,
		                        slidesToScroll: image_gallery_1024,
		                    }
		                },{
		                    breakpoint: 600,
		                    settings: {
		                        slidesToShow: image_gallery_600,
		                        slidesToScroll: image_gallery_600
		                    }
		                },{
		                    breakpoint: 480,
		                    settings: {
		                        slidesToShow: 1,
		                        slidesToScroll: 1
		                    }
		                }
		            ]
		        });

			}
		});
	</script>
<?php endif; ?>


<div id="image-gallery-<?php echo esc_attr( $id ); ?>" class="sh-image-gallery<?php echo esc_attr( $class ); ?> sh-image-gallery-container sh-image-gallery-<?php echo esc_attr( $dots ); ?>" <?php echo wp_kses_post( $autoplay_data ); ?> data-columns="<?php echo preg_replace( "/[^0-9]/","", intval( $columns ) ); ?>">
	<?php foreach( $images as $image ) :
		$attachment_id = ( isset( $image['attachment_id'] ) ) ? $image['attachment_id'] : $image;
		$attachment_lightbox = ( isset( $image['attachment_id'] ) ) ? jevelin_get_image_size( $image, 'large' ) : jevelin_get_small_thumb( $attachment_id, 'large' );

		if( $lazy && $attachment_id > 0 ) :
			$image_media = wp_get_attachment_metadata( $attachment_id );

			if( $image_ratio == 'full' ) :
				$image_width = ( isset( $image_media['width'] ) ) ? $image_media['width'] : 0;
				$image_height = ( isset( $image_media['height'] ) ) ? $image_media['height'] : 0;
				$ratio = ( $image_height / $image_width ) * 100;
			else :
				$image_width = 0;
				$image_height = 0;
				$ratio = 0;
			endif;

		endif;
	?>
		<div class="sh-image-gallery-item">
			<div class="sh-gallery-item">
				<div class="post-meta-thumb">

					<?php if( $lazy ) : ?>
						<?php if( $image_width > 0 ) : ?>
							<div class="ratio-container" style="padding-top: <?php echo esc_attr( $ratio ); ?>%;">
								<div class="ratio-content">
									<img class="lazy" data-src="<?php echo jevelin_get_small_thumb( $attachment_id, $image_ratio ); ?>" alt="<?php echo esc_attr( jevelin_get_image_alt( $attachment_id ) ); ?>" />
								</div>
							</div>
						<?php else : ?>
							<img class="lazy" data-src="<?php echo jevelin_get_small_thumb( $attachment_id, $image_ratio ); ?>" alt="<?php echo esc_attr( jevelin_get_image_alt( $attachment_id ) ); ?>" />
						<?php endif; ?>
					<?php else : ?>
						<img src="<?php echo jevelin_get_small_thumb( $attachment_id, $image_ratio ); ?>" alt="<?php echo esc_attr( jevelin_get_image_alt( $attachment_id ) ); ?>" />
					<?php endif; ?>

					<?php if( !isset( $atts['overlay'] ) || $atts['overlay'] != 'off' ) : ?>
						<?php jevelin_blog_overlay( $attachment_lightbox, 0, 1, ':imgCollection'.$id ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
