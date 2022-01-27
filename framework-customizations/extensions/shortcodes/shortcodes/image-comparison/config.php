<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Image Curtains', 'jevelin' ),
		'description' => esc_html__( 'Add a Image Comparison Shortcode', 'jevelin' ),
		'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
		'popup_size'  => 'medium',
		'icon' => 'ti-image',
        'title_template' => '
        	<b>{{- title }}</b>
        	<div class="sh-builder-item-desc">

                {{ if( typeof o.image_b != "undefined" && o.image_b ) { }}
                    <img src="{{- o.image_b.url }}" height="50" />
                {{ } }}

        	</div>',
	)
);
