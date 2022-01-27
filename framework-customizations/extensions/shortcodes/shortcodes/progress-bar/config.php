<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Progress Bar', 'jevelin' ),
	'description' => esc_html__( 'Add a Progress Bar', 'jevelin' ),
	'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
	'popup_size'  => 'medium',
	'icon' => 'ti-ruler-alt',
    'title_template' => '
    	<b>{{- title }}</b>
    	<div class="sh-builder-item-desc">

        	{{ if( typeof o.title != "undefined" && o.title ) { }}
        		{{- o.title.replace(/(<([^>]+)>)/ig,"").split(/\s+/, 25).join(" ") }}
    		{{ } }}

        	{{ if( typeof o.percentage != "undefined" && o.percentage ) { }}
        		({{- o.percentage.replace(/(<([^>]+)>)/ig,"").split(/\s+/, 25).join(" ") }}%)
    		{{ } }}

    	</div>',
);
