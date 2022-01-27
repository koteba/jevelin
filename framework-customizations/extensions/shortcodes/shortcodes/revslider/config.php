<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

$cfg = array();

$cfg['page_builder'] = array(
	'title'         => esc_html__('Revolution Slider', 'jevelin'),
	'description'   => esc_html__('Embed a Revolution Slider', 'jevelin'),
	'tab'           => esc_html__('Content Elements', 'jevelin'),
	'popup_size'    => 'small',
    'icon' => 'ti-layout-slider',
    'title_template' => '
    	<b>{{- title }}</b>
    	<div class="sh-builder-item-desc">

        	{{ if( typeof o.slide != "undefined" && o.slide ) { }}
        		Slider ID {{- o.slide }} <br>
    		{{ } }}

    	</div>',
);
