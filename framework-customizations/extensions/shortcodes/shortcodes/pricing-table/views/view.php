<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Pricing Table HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$first_symbol = ( isset( $atts['first_symbol'] ) ) ? $atts['first_symbol'] : true;
$popover = ( isset( $atts['popover'] ) ) ? $atts['popover'] : '';
$content_alignment = ( isset( $atts['content_alignment'] ) ) ? $atts['content_alignment'] : 'center';
$name = ( isset( $atts['name'] ) ) ? $atts['name'] : '';
$price = ( isset( $atts['price'] ) ) ? $atts['price'] : '$ 100';
$description = ( isset( $atts['description'] ) ) ? $atts['description'] : '';
$content = ( isset( $atts['content2'] ) ) ? $atts['content2'] : $atts['content'];
$button_status = ( isset( $atts['button_status'] ) ) ? $atts['button_status'] : true;
$button_url = ( isset( $atts['button_url'] ) ) ? $atts['button_url'] : '#';
$button_name = ( isset( $atts['button_name'] ) ) ? $atts['button_name'] : '';
$button_style = ( isset( $atts['button_style'] ) ) ? $atts['button_style'] : 'button1';

/* If Visual Composer */
if( !isset( $atts['id'] ) ) :
	$content = vc_param_group_parse_atts( $content );
	$style = ( isset( $atts['style'] ) ) ? $atts['style'] : 'style1';
	$style_atts = jevelin_vc_option_picker( $atts, array(
		array( 'name' => 'icon' ),
	));
else :
	$style = ( isset( $atts['style']['style'] ) ) ? $atts['style']['style'] : 'style1';
	$style_atts = jevelin_get_picker( $atts['style'] );
endif;

$class = !empty( $style_atts['icon'] ) ? ' sh-pricing-with-icon' : '';
if( isset( $atts['enlarge'] ) && $atts['enlarge'] == true ) :
	$class.= ' sh-pricing-enlarge';
endif;
?>

<div class="sh-pricing-container">
	<div class="sh-pricing sh-pricing-<?php echo esc_attr( $style ); ?> sh-pricing-content-<?php echo esc_attr( $content_alignment ); ?><?php echo esc_attr( $class ); ?>" id="pricing-<?php echo esc_attr( $id ); ?>">
		<?php if( $popover ) : ?>
			<span class="sh-popover-mini sh-popover-mini-center sh-animated fadeIn">
			<?php echo esc_attr( $popover ); ?>
			</span>
		<?php endif; ?>

			<div class="sh-pricing-top">
				<div class="sh-table-full">
					<div class="sh-table-cell">
						<div class="sh-pricing-name">
							<?php if( $name ) : ?>
								<h2><?php echo esc_attr( $name ); ?></h2>
							<?php endif; ?>
						</div>
						<div class="sh-pricing-top-aside">
							<?php if( $price ) : ?>
								<div class="sh-pricing-price">
									<?php if( $first_symbol == true ) : ?>
										<?php echo preg_replace('/^([\<\sa-z\d\/\>]*)(([$\€\£\¥\₽\₺\;]+)|([\"\'\w]))/', '$1<span class="sh-pricing-currency">$2</span>', esc_attr( $price )); ?>
									<?php else : ?>
										<?php echo esc_attr( $price ); ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>
							<?php if( $description ) : ?>
								<div class="sh-pricing-description">
									<?php echo esc_attr( $description ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="sh-pricing-content">

				<?php if( !empty( $style_atts['icon'] ) ) : ?>
					<div class="sh-pricing-icon">
						<i class="<?php echo esc_attr( $style_atts['icon'] ); ?>"></i>
					</div>
				<?php endif; ?>

				<?php
				if( is_array( $content ) && count( $content ) ) :
				foreach( $content as $item ) :
					$item_icon = ( isset( $item['icon'] ) ) ? $item['icon'] : '';
					$item_amount = ( isset( $item['amount'] ) ) ? $item['amount'] : '';
					$item_description = ( isset( $item['description'] ) ) ? $item['description'] : '';
				?>
					<div class="sh-pricing-content-item">
						<i class="<?php echo esc_attr( $item_icon ); ?>"></i>
						<span class="sh-pricing-amount"><?php echo esc_attr( $item_amount ); ?></span>
						<span><?php echo esc_attr( $item_description ); ?></span>
					</div>
				<?php endforeach; endif; ?>

			</div>

		<?php if( $button_status == true ) : ?>
			<div class="sh-pricing-bottom">

				<a href="<?php echo esc_url( $button_url ); ?>" class="sh-pricing-button sh-pricing-button-<?php echo esc_attr( $button_style ); ?>">
					<span><?php echo esc_attr( $button_name ); ?></span>
				</a>

			</div>
		<?php endif; ?>
	</div>
</div>
