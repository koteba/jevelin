<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Pricing Table', 'jevelin' ),
		'description' => esc_html__( 'Add a Pricing Table', 'jevelin' ),
		'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
		'popup_size'  => 'medium',
		'icon' => 'ti-money',
        'title_template' => '
        	<b>{{- title }}</b>
        	<div class="sh-builder-item-desc">

                {{ if( typeof o.name != "undefined" && o.name ) { }}
                    {{- o.name.replace(/(<([^>]+)>)/ig,"").split(/\s+/, 25).join(" ") }}
                {{ } }}
                {{ if( typeof o.price != "undefined" && o.price ) { }}
                    <i>({{- o.price }})</i>
                {{ } }}
                
        	</div>',
	)
);      
