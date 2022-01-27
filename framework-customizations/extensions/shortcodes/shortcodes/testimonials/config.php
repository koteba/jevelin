<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Testimonials', 'jevelin' ),
	'description' => esc_html__( 'Add a Testimonials', 'jevelin' ),
	'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
	'popup_size'  => 'medium',
	'icon' => 'ti-quote-left',
    'title_template' => '
    	<b>{{- title }}</b>
	  	<div class="sh-builder-item-desc">

	        {{ if( typeof o.style != "undefined" && o.style ) { }}
	            Style {{- o.style.replace(/[^\d.-]/g, "") }}
	        {{ } }}
	        
		</div>',
);
