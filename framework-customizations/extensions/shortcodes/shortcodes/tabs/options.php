<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(

	'id' => array( 'type' => 'unique' ),
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'tabs' => array(
				'label'         => esc_html__( 'Tabs', 'jevelin' ),
				'popup-title'   => esc_html__( 'Add/Edit Tabs', 'jevelin' ),
				'desc'          => esc_html__( 'Here you can add, remove and edit your Tabs.', 'jevelin' ),
				'type'          => 'addable-popup',
				'template'      => '{{=title}}',
				'size'			=> 'medium',
				'popup-options' => array(

					'title'   => array(
						'label' => esc_html__( 'Title', 'jevelin' ),
						'desc'  => esc_html__( 'Enter title', 'jevelin' ),
						'type'  => 'text'
					),

					'content' => array(
						'type'   => 'wp-editor',
						'teeny'  => false,
						'reinit' => true,
						'size'   => 'large',
						'label'  => esc_html__( 'Content', 'jevelin' ),
						'desc'   => esc_html__( 'Enter content', 'jevelin' ).'
							<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
						'editor_height' => 300,
					),

					'icon'    => array(
						'type'  => 'new-icon',
						'label' => esc_html__('Icon', 'jevelin'),
						'desc' => esc_html__( 'Enter title', 'jevelin' ),
						'set' => 'jevelin-icons',
					),

				)
			)

		),
	),


	'styling' => array(
		'title'   => esc_html__( 'Styling', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'style' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Style', 'jevelin'),
				'desc'  => esc_html__('Choose main style', 'jevelin'),
				'choices' => array(
					'style1' => esc_html__('Style 1', 'jevelin'),
					'style2' => esc_html__('Style 2', 'jevelin'),
					'style2 sh-tabs-style3' => esc_html__('Style 3', 'jevelin'),
					'style4' => esc_html__('Style 4', 'jevelin'),
				),
				'value'	  => 'style1',
			),

			'text_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Text Color', 'jevelin'),
			    'desc'  => esc_html__('Select text color', 'jevelin'),
			),

			'border_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Tab Line Color', 'jevelin'),
			    'desc'  => esc_html__('Select border color', 'jevelin'),
			),

			'accent_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Active Tab Color', 'jevelin'),
			    'desc'  => esc_html__('Select accent tab color or leave it empty for global value', 'jevelin'),
			),

			'border_accent_color' => array(
			    'type'  => 'color-picker',
			    'label' => esc_html__('Active Tab Line Color', 'jevelin'),
			    'desc'  => esc_html__('Select active border color', 'jevelin'),
			),

		),
	),

);
