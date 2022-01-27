<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Heading Pro', 'jevelin' ),
		'description' => esc_html__( 'Add a Heading Advanced Element', 'jevelin' ),
		'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
		'popup_size'  => 'medium',
		'icon' => 'ti-pin2',
        'title_template' => '
        	<b>{{- title }}</b>
        	<div class="sh-builder-item-desc">

	        	{{ if( typeof o.content != "undefined" && o.content ) { }}
	        		<div class="sh-heading-sc-content" 
	        			{{ if( typeof o.letter_spacing != "undefined" && o.letter_spacing ) { }}
	        				style="letter-spacing: {{- o.letter_spacing }};"
	        			{{ } }}
	        		>
	        			{{= o.content }}
	        		</div>
	    		{{ } }}
	    		
        	</div>',
	)
);
