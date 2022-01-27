<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Alert Message', 'jevelin' ),
	'description' => esc_html__( 'Add a Alert Message', 'jevelin' ),
	'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
	'popup_size'  => 'medium',
    'icon' => 'ti-info-alt',
    'title_template' => '
    	<b>{{- title }}</b>
        <div class="sh-builder-item-desc">

            {{ if( typeof o.icon != "undefined" && o.icon ) { }}
                <i class="{{- o.icon }}"></i> 
            {{ } }}

        	{{ if( typeof o.title != "undefined" && o.title ) { }}
        		{{- o.title.replace(/(<([^>]+)>)/ig,"").split(/\s+/, 25).join(" ") }}
    		{{ } }}

    	</div>',
);
