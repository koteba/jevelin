<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Portfolio 2.0', 'jevelin' ),
	'description' => esc_html__( 'Add a Portfolio Fancy', 'jevelin' ),
	'tab'         => esc_html__( 'Content Elements', 'jevelin' ),
	'popup_size'  => 'medium',
	'icon' => 'ti-gallery',
    'title_template' => '
        <b>{{- htmlDecode(title) }}</b>
    	<div class="sh-builder-item-desc">

            {{ if( typeof o.columns != "undefined" && o.columns ) { }}
                {{- o.columns }} columns
            {{ } }}

    	</div>',
);
