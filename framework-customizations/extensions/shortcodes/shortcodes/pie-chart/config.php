<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Pie Chart', 'jevelin' ),
		'description' => esc_html__( 'Add a Pie Chart', 'jevelin' ),
		'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
		'popup_size'  => 'medium',
		'icon' => 'ti-pie-chart',
        'title_template' => '
        	<b>{{- title }}</b>
   
            {{ if( typeof o.percentage != "undefined" && o.percentage ) { }}
                ({{- o.percentage }}%)
            {{ } }}',
	)
);
