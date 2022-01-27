<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

$cfg = array();

$cfg['page_builder'] = array(
    'title'       => ' ' . esc_html__( 'Button', 'jevelin' ),
	'description' => esc_html__( 'Add a Button', 'jevelin' ),
	'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
	'popup_size'  => 'medium',
    'icon' => 'ti-arrow-circle-right',
    'title_template' => '
        <b>{{- htmlDecode(title) }}</b>
    	<div class="sh-builder-item-desc">

            {{ if( typeof o.icon != "undefined" && o.icon ) { }}
                <i class="{{- o.icon }}"></i> 
            {{ } }}

        	{{ if( typeof o.text != "undefined" && o.text ) { }}
        		{{- o.text.replace(/(<([^>]+)>)/ig,"").split(/\s+/, 25).join(" ") }}
    		{{ } }}

    	</div>',
);
