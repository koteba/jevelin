<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

$cfg = array(
	'page_builder' => array(
		'title'       => '  ' . esc_html__( 'Heading', 'jevelin' ),
		'description' => esc_html__( 'Add a Heading', 'jevelin' ),
		'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
		'popup_size'  => 'medium',
		'icon' => 'ti-pin2',
        'title_template' => '
			<b>{{- htmlDecode(title) }}</b>
        	<div class="sh-builder-item-desc">

	        	{{ if( typeof o.content != "undefined" && o.content ) { }}
					<div style="color: #787878; font-size: 18px; font-weight: bold;">{{- o.content.replace(/(<([^>]+)>)/ig,"").split(/\s+/, 25).join(" ") }}</div>
	    		{{ } }}
	    		
        	</div>',
	)
);
