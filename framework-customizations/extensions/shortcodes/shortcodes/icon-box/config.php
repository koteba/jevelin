<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
    die( 'Forbidden.' );
}

$cfg = array(
    'page_builder' => array(
    	'title'         => esc_html__('Icon Box', 'jevelin'),
    	'description'   => esc_html__('Add an Icon Box', 'jevelin'),
    	'tab'           => esc_html__('Content Elements', 'jevelin'),
    	'popup_size'  => 'large',
        'icon' => 'ti-package',
        'title_template' => '
        	<b>{{- title }}</b>
        	<div class="sh-builder-item-desc">

                {{ if( typeof o.title != "undefined" && o.title ) { }}
                    {{- o.title.replace(/(<([^>]+)>)/ig,"").split(/\s+/, 25).join(" ") }}
                {{ } }}

        	</div>',
    )
);
