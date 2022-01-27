<?php if (!defined( 'FW' ) && !function_exists( 'jevelin_framework' )) die('Forbidden.');

$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Video Player', 'jevelin' ),
		'description' => esc_html__( 'Add a Video Player', 'jevelin' ),
		'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
		'popup_size'  => 'medium',
		'icon' => 'ti-video-camera',
        'title_template' => '
        	<b>{{- title }}</b>
        	<div class="sh-builder-item-desc">

                {{ if( typeof o.url != "undefined" && o.url ) { }}
                    {{- o.url.replace(/(<([^>]+)>)/ig,"").split(/\s+/, 25).join(" ") }}
                {{ } }}

        	</div>',
	)
);
