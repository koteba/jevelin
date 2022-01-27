<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Blog Posts', 'jevelin' ),
		'description' => esc_html__( 'Add a Blog Posts', 'jevelin' ),
		'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
		'popup_size'  => 'medium',
		'icon' => 'ti-write',
        'title_template' => '
        	<b>{{- title }}</b>
		  	<div class="sh-builder-item-desc">

		        {{ if( typeof o.limit != "undefined" && o.limit ) { }}
		            {{- o.limit }} items,
		        {{ } }}

		        {{ if( typeof o.columns != "undefined" && o.columns ) { }}
		            {{- o.columns }} columns
		        {{ } }}
		        
			</div>',
	)
);
