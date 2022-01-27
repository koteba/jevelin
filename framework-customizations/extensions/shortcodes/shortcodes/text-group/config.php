<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Text Group', 'jevelin' ),
		'description' => esc_html__( 'Add a Text Group', 'jevelin' ),
		'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
		'popup_size'  => 'large',
		'icon' => 'ti-text',
        'title_template' => '
        	<b>{{= title }}</b>
        	<div class="sh-builder-item-desc">

	        	{{ if( typeof o.content != "undefined" && o.content ) { }}
	        		<div style="font-size: 14px;">{{- o.content.replace(/(<([^>]+)>)/ig,"").split(/\s+/, 25).join(" ") }}</div>
	    		{{ } }}

        	</div>',
	)
);
