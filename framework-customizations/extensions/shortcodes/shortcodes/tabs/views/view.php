<?php
if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
/*-----------------------------------------------------------------------------------*/
/* Tabs HTML
/*-----------------------------------------------------------------------------------*/
$id = ( isset( $atts['id'] ) ) ? $atts['id'] : $id_rand;
$style = ( isset( $atts['style'] ) ) ? $atts['style'] : 'style1';
$tabs = ( isset( $atts['tabs'] ) ) ? $atts['tabs'] : '';

/* If Visual Composer */
if( !isset( $atts['id'] ) ) :
	$tabs = vc_param_group_parse_atts( $tabs );
endif;
?>

<div id="tabs-<?php echo esc_attr( $id ); ?>" class="sh-tabs sh-tabs-<?php echo esc_attr( $style ); ?>">
	<!-- Tabs -->
	<ul class="nav nav-tabs sh-tabs-filter sh-noselect" role="tablist">
		<?php if( is_array( $tabs ) && count( $tabs ) ) : ?>
			<?php $i = 0;
			foreach( $tabs as $item ) :
				$i++;
				$id2 = 'tab-'. $id .'-'.$i;
				$icon = ( isset( $item['icon'] ) ) ? $item['icon'] : '';
				$title = ( isset( $item['title'] ) ) ? $item['title'] : '';
			?>
				<li role="presentation" class="<?php echo ($i == 1) ? ' active' : ''; ?>">
					<a href="#<?php echo esc_attr( $id2 ); ?>" role="tab" data-toggle="tab">
						<?php if( $icon && $style != 'style4' ) : ?>
							<span class="sh-tabs-icon">
								<i class="<?php echo esc_attr( $icon ); ?>"></i>
							</span>
						<?php endif; ?>

						<?php echo esc_attr( $title ); ?>

						<?php if( $icon && $style == 'style4' ) : ?>
							<span class="sh-tabs-icon">
								<i class="<?php echo esc_attr( $icon ); ?>"></i>
							</span>
						<?php endif; ?>
					</a>
				</li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>

	<!-- Content -->
	<div class="tab-content">
		<?php if( is_array( $tabs ) && count( $tabs ) ) : ?>
			<?php $i = 0;
			foreach( $tabs as $item ) :
				$i++;
				$id2 = 'tab-'.esc_attr( $id ).'-'.$i;
				$item_content = ( isset( $item['content2'] ) ) ? $item['content2'] : $item['content'];
			?>
				<div role="tabpanel" class="tab-pane fade<?php echo ($i == 1) ? ' in active' : ''; ?>" id="<?php echo esc_attr( $id2 ); ?>">
					<?php echo do_shortcode( $item_content ); ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
