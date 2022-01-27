<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
    die( 'Forbidden.' );
}

$cfg = array(
    'page_builder' => array(
    	'title'         => esc_html__('Icon', 'jevelin'),
    	'description'   => esc_html__('Add an Icon', 'jevelin'),
    	'tab'           => esc_html__('Content Elements', 'jevelin'),
    	'popup_size'  => 'medium',
        'icon' => 'ti-layout-width-full',
        'title_template' => '
        	<b>{{- title }}</b>
        	<div class="sh-builder-item-desc">
                {{ if( typeof o.icon != "undefined" && o.icon ) { }}
                    <i class="{{- o.icon }}" style="font-size: 16px;"></i>
                {{ } }}

                {{ if( typeof o.alignment != "undefined" && o.alignment ) { }}
                    {{- o.alignment }}
                {{ } }}
        	</div>',
    )
);
