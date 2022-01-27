<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

$cfg = array();

$cfg['page_builder'] = array(
    'title'       => ' ' . esc_html__( 'Empty Space', 'jevelin' ),
	'description'   => esc_html__('Add a Empty Space', 'jevelin'),
	'tab'           => esc_html__('Content Elements', 'jevelin'),
	'popup_size'    => 'small',
    'icon' => 'ti-layout-width-default-alt',
    'title_template' => '
    	{{= title }}
    	<div class="sh-builder-item-desc">

        	{{ if( typeof o.height != "undefined" && o.height ) { }}
        		{{- o.height }}
    		{{ } }}

    	</div>',
);
