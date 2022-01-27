<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

$cfg = array();

$cfg = array(
	'page_builder' => array(
    	'title'       => ' ' . esc_html__( 'Single Image', 'jevelin' ),
		'description' => esc_html__( 'Add a Single Image', 'jevelin' ),
		'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
		'popup_size'  => 'medium',
		'icon' => 'ti-image',
        'title_template' => '
        	<b>{{= title }}</b>
        	<div class="sh-builder-item-desc">

                {{ if( typeof o.image != "undefined" && o.image ) { }}
                    <img src="{{- o.image.url }}" height="50" />
                {{ } }}

        	</div>',
	)
);
