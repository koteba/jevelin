<?php
/*-----------------------------------------------------------------------------------*/
/* List HTML
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) { die( 'Forbidden.' ); }
?>

<ul class="sh-list sh-list-<?php echo esc_attr($atts['style']); ?>" id="list-<?php echo esc_attr( $atts['id'] ); ?>">
	<?php foreach( $atts['list'] as $list ) : ?>
		<li class="sh-list-item">
			<span class="sh-list-icon">
				<i class="<?php echo esc_attr($atts['icon']); ?>"></i>
			</span>
			<?php echo esc_attr($list['title']); ?>
		</li>
	<?php endforeach; ?>
</ul>
