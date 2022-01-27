<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

$cfg = array();

$cfg['page_builder'] = array(
    'title'       => ' ' . esc_html__( 'Divider', 'jevelin' ),
	'description' => esc_html__( 'Add a Divider', 'jevelin' ),
	'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
	'popup_size'  => 'medium',
    'icon' => 'ti-line-dashed',
    'title_template' => '
        <b>{{- htmlDecode(title) }}</b>
    	<div class="sh-builder-item-desc">

            {{ if( typeof o.height != "undefined" && o.height ) { }}
                {{- o.height }}px,
            {{ } }}

            {{ if( typeof o.type != "undefined" && o.type ) { }}
                {{- o.type }},
            {{ } }}

            {{ if( typeof o.alignment != "undefined" && o.alignment ) { }}
                {{- o.alignment }}
            {{ } }}

    	</div>',
);
