<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Partners HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$class = '';
$class.= ( isset( $atts['padding'] ) && $atts['padding'] == true ) ? ' sh-partners-carousel-additional-padding' : '';
$class.= ( isset( $atts['padding_horizontal'] ) && $atts['padding_horizontal'] == false ) ? ' sh-partners-carousel-additional-horizontal-padding-remove' : '';
$autoplay = ( isset( $atts['autoplay'] ) && $atts['autoplay'] > 0 ) ? ( $atts['autoplay'] * 1000 ) : 5000;
$partners = ( isset( $atts['partners'] ) ) ? $atts['partners'] : '';
$columns = ( isset( $atts['columns'] ) ) ? $atts['columns'] : '5';

/* If Visual Composer */
if( !isset( $atts['id'] ) ) :
	$partners = vc_param_group_parse_atts( $partners );
endif;
?>


<?php /* Visual Composer Optimization */ ?>
<?php if( jevelin_is_vc_front() ) : ?>
<style media="screen">
	#partners-<?php echo esc_attr( $id ); ?> {
		opacity: 1;
		overflow: visible;
		height: auto;
	}

	#partners-<?php echo esc_attr( $id ); ?> .sh-partners-carousel-item {
		display: inline-block;
		vertical-align: middle;
		text-align: center;
		margin-right: -4px;
		width: <?php echo ( 100 / $columns ); ?>%;
	}

	#partners-<?php echo esc_attr( $id ); ?> .sh-partners-carousel-item > div {
		display: table;
		margin: 0 auto;
	}

	#partners-<?php echo esc_attr( $id ); ?> .sh-partners-carousel-item:nth-child(n+<?php echo ( intval( $columns ) + 1 ); ?>) {
		display: none;
	}
</style>
<?php endif; ?>


<div id="partners-<?php echo esc_attr( $id ); ?>" class="sh-partners-carousel<?php echo esc_attr( $class ); ?>" data-autoplay="<?php echo intval( $autoplay ); ?>" data-id="<?php echo intval( $columns ); ?>">
	<?php if( is_array( $partners ) && count( $partners ) ) : ?>
		<?php foreach( $partners as $content ) :
			$company = ( isset( $content['company'] ) ) ? $content['company'] : '';
			$website = ( isset( $content['website'] ) ) ? $content['website'] : '';
			$image = '';

			if( isset( $content['logo'] ) && $content['logo'] ) :
				$image = ( isset( $atts['id'] ) ) ? jevelin_get_image( $content['logo'] ) : jevelin_get_small_thumb( $content['logo'], 'large' );
			endif;
		?>
			<div class="sh-partners-carousel-item <?php if( $website ) : ?>sh-partners-carousel-item-link<?php endif; ?>">
				<div class="sh-partners-carousel-item-content">
					<?php if( $website ) : ?>
						<a href="<?php echo esc_url( $website ); ?>" target="_blank">
					<?php endif; ?>

					<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $company ); ?>" />

					<?php if( $website ) : ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
