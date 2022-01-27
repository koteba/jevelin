<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$footer_options = array(

	'footer_template' => array(
	    'type'  => 'radio',
	    'value' => 'default',
	    'label' => esc_html__('Footer Template', 'jevelin'),
	    'desc'  => esc_html__('Select footer template', 'jevelin'),
	    'choices' => jevelin_get_footers()
	),


	'footer_settings_title' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Footer Settings', 'jevelin').'</span></h3>',
	),

	'footer_widgets' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Footer Widgets', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable footer widgets', 'jevelin' ),
		'value' => 'on',
		'left-choice' => array(
			'value' => 'off',
			'label' => esc_html__('Off', 'jevelin'),
		),
		'right-choice' => array(
			'value' => 'on',
			'label' => esc_html__('On', 'jevelin'),
		),
	),

	'footer_width' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Footer Width', 'jevelin' ),
		'desc' => esc_html__( 'Select footer width', 'jevelin' ),
		'value' => 'default',
		'left-choice' => array(
			'value' => 'default',
			'label' => esc_html__('Default', 'jevelin'),
		),
		'right-choice' => array(
			'value' => 'full',
			'label' => esc_html__('Full', 'jevelin'),
		),
	),

	'footer_columns' => array(
	    'type'  => 'radio',
	    'value' => '4',
	    'label' => esc_html__('Footer Columns', 'jevelin'),
	    'desc'  => esc_html__('Select footer column count', 'jevelin'),
	    'choices' => array(
	        '1' => esc_html__( '1 Columns', 'jevelin' ),
	        '2' => esc_html__( '2 Columns', 'jevelin' ),
	        '3' => esc_html__( '3 Columns', 'jevelin' ),
	        '4' => esc_html__( '4 Columns', 'jevelin' ),
	        '5' => esc_html__( '5 Columns', 'jevelin' ),
	    ),
	),

	'footer_parallax' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Footer Parallax', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable whole footer to act as an parallax element', 'jevelin' ),
		'value' => 'off',
		'left-choice' => array(
			'value' => 'off',
			'label' => esc_html__('Off', 'jevelin'),
		),
		'right-choice' => array(
			'value' => 'on',
			'label' => esc_html__('On', 'jevelin'),
		),
	),


	'copyright_title' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Footer Copyright Settings', 'jevelin').'</span></h3>',
	),

	'copyright_bar' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Copyright Bar', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable copyright bar', 'jevelin' ),
		'value' => 'on',
		'left-choice' => array(
			'value' => 'off',
			'label' => esc_html__('Off', 'jevelin'),
		),
		'right-choice' => array(
			'value' => 'on',
			'label' => esc_html__('On', 'jevelin'),
		),
	),

	'copyright_style' => array(
	    'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
	    'value' => array(
	        'style' => 'style1',
	        'style1' => array(
	            'social' => true,
	        ),
	    ),
	    'picker' => array(
	        'style' => array(
	            'label'   => esc_html__('Copyright Style', 'jevelin'),
	            'desc'    => esc_html__('Choose main style for copyrights', 'jevelin'),
	            'type'    => 'radio',
	            'choices' => array(
	                'style1' => esc_html__('Style 1', 'jevelin'),
	                'style2' => esc_html__('Style 2 (logo and copyright left, social icons right)', 'jevelin'),
					'style3' => esc_html__('Style 3 (logo left, copyrights center, social icons rights)', 'jevelin'),
	            ),
	        )
	    ),
	    'choices' => array(
	        'style1' => array(
				'social' => array(
					'type' => 'switch',
					'label' => esc_html__( 'Social Icons', 'jevelin' ),
					'desc' => esc_html__( 'Enable or disable social icons', 'jevelin' ),
					'value' => true,
					'left-choice' => array(
						'value' => false,
						'label' => esc_html__('Off', 'jevelin'),
					),
					'right-choice' => array(
						'value' => true,
						'label' => esc_html__('On', 'jevelin'),
					),
				),
	        ),
			'style3' => array(
				'social' => array(
					'type' => 'switch',
					'label' => esc_html__( 'Social Icons', 'jevelin' ),
					'desc' => esc_html__( 'Enable or disable social icons', 'jevelin' ),
					'value' => true,
					'left-choice' => array(
						'value' => false,
						'label' => esc_html__('Off', 'jevelin'),
					),
					'right-choice' => array(
						'value' => true,
						'label' => esc_html__('On', 'jevelin'),
					),
				),
	        ),
	    ),
	),

	'copyright_padding' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Padding', 'jevelin'),
		'desc'  => esc_html__('Enter custom footer widgets padding (default: 0px 0px 0px 0px)', 'jevelin'),
	),

	'copyright_logo' => array(
		'label' => esc_html__( 'Footer Logo', 'jevelin' ),
		'desc'  => esc_html__( 'Upload a footer logo image', 'jevelin' ),
		'type'  => 'upload'
	),

	'copyright_text' => array(
		'type'   => 'wp-editor',
		'teeny'  => true,
		'reinit' => true,
		'size'   => 'large',
		'label'  => esc_html__( 'Copyright Text', 'jevelin' ),
		'desc'   => esc_html__( 'Enter some description about copyright in your website', 'jevelin' ).'
			<script>jQuery(document).ready(function ($) { setTimeout(function(){ $("#textarea_dynamic_id-tmce").trigger("click"); }, 1); });</script>',
		'editor_height' => 110,
	),

	'copyright_text_multi_lines' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Copyright Text in Multiple Lines', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable copyright text in multiple lines', 'jevelin' ),
		'value' => 'off',
		'left-choice' => array(
			'value' => 'off',
			'label' => esc_html__('Off', 'jevelin'),
		),
		'right-choice' => array(
			'value' => 'on',
			'label' => esc_html__('On', 'jevelin'),
		),
	),

	'copyright_deveveloper' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Developer Copyrights', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable theme developer copyrights', 'jevelin' ),
		'value' => true,
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__('Off', 'jevelin'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('On', 'jevelin'),
		),
	),

	'copyright_deveveloper_all' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Invisible Developer Copyrights', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable invisible developer copyrights. Say thanks by leaving invisible developer copyrights on', 'jevelin' ),
		'value' => true,
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__('Off', 'jevelin'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('On', 'jevelin'),
		),
	),
);


$options = array(
	'footer' => array(
		'title'   => esc_html__( 'Footer', 'jevelin' ),
		'type'    => 'tab',
		'icon'	  => 'fa fa-phone',
		'options' => array(
			'footer-box' => array(
				'title'   => esc_html__( 'Footer', 'jevelin' ),
				'type'    => 'box',
				'options' => $footer_options
			),
		)
	)
);
