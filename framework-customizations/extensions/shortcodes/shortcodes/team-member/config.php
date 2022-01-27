<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Team Member', 'jevelin' ),
		'description' => esc_html__( 'Add a Team Member', 'jevelin' ),
		'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
		'popup_size'  => 'large',
		'icon' => 'ti-id-badge',
        'title_template' => '
        	<b>{{- title }}</b>
        	<div class="sh-builder-item-desc">

                {{ if( typeof o.name != "undefined" && o.name ) { }}
                    {{- o.name.replace(/(<([^>]+)>)/ig,"").split(/\s+/, 25).join(" ") }}
                {{ } }}
                {{ if( typeof o.role != "undefined" && o.role ) { }}
                    <i>({{- o.role }})</i>
                {{ } }}

        	</div>',
	)
);
