<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Counter', 'jevelin' ),
	'description' => esc_html__( 'Add a Counter', 'jevelin' ),
	'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
	'popup_size'  => 'medium',
    'icon' => 'ti-dashboard',
    'title_template' => '
    	<b>{{- title }}</b>
    	<div class="sh-builder-item-desc">

            {{ if( typeof o.icon != "undefined" && o.icon ) { }}
                <i class="{{- o.icon }}"></i> 
            {{ } }}

        	{{ if( typeof o.number != "undefined" && o.number ) { }}
        		{{- o.number.replace(/(<([^>]+)>)/ig,"").split(/\s+/, 25).join(" ") }}
    		{{ } }}

    	</div>',
);
