<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$portfilio_options = array(

	'portfolio_main_page' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Portfolio Main Page ID', 'jevelin'),
		'desc'  => esc_html__('Enter portfolio main page ID, useful to change default portfolio breadcrumbs page', 'jevelin'),
	),




	'portfolio_archive_title2' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Portfolio Single Page', 'jevelin').'</span></h3>',
	),

	'portfolio_single_page_layout' => array(
		'type' => 'radio',
		'label' => esc_html__( 'Layout', 'jevelin' ),
		'desc' => esc_html__( 'Choose portfolio single page layout', 'jevelin' ),
		'choices' => array(
            'default' => esc_html__( 'Default', 'jevelin' ),
            'full' => esc_html__( 'Full Width', 'jevelin' ),
	    ),
	    'inline' => false,
	),

	'portfolio_related' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Related items', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable "Related items" in single portfolio page', 'jevelin' ),
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

	'portfolio_comments' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Portfolio Comments', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable comments in single portfolio page', 'jevelin' ),
		'value' => false,
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__('Off', 'jevelin'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('On', 'jevelin'),
		),
	),

	'portfolio_share' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Social Share', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable social share buttons in single portfolio page', 'jevelin' ),
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

	'portfolio_single_image' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Image Size', 'jevelin' ),
		'desc' => esc_html__( 'Use full size image, if image quality is lower than expected.', 'jevelin' ),
		'value' => 'large',
		'left-choice' => array(
			'value' => 'large',
			'label' => esc_html__('Large', 'jevelin'),
		),
		'right-choice' => array(
			'value' => 'full',
			'label' => esc_html__('Full', 'jevelin'),
		),
	),

	'portfolio_gallery_autoplay' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Gallery Autoplay', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable gallery autoplay in single portfolio page', 'jevelin' ),
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






	'portfolio_archive_title' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Portfolio Archive Settings', 'jevelin').'</span></h3>',
	),

	'portfolio_archive_layout' => array(
	    'type'  => 'radio',
	    'value' => 'default',
	    'label' => esc_html__('Portfolio Archive Layout', 'jevelin'),
	    'desc'  => esc_html__('Choose portfolio archive layout', 'jevelin'),
	    'choices' => array(
            'default' => esc_html__( 'Default', 'jevelin' ),
            'sidebar-left' => esc_html__( 'Sidebar Left', 'jevelin' ),
            'sidebar-right' => esc_html__( 'Sidebar Right', 'jevelin' ),
	    ),
	    'inline' => false,
	),

	'portfolio_archive_columns' => array(
	    'type'  => 'radio',
	    'value' => '3',
	    'label' => esc_html__('Portfolio Archive Columns', 'jevelin'),
	    'desc'  => esc_html__('Choose portfolio archive column item count', 'jevelin'),
	    'choices' => array(
	        '2' => esc_html__( '2 columns', 'jevelin' ),
	        '3' => esc_html__( '3 columns', 'jevelin' ),
	        '4' => esc_html__( '4 columns', 'jevelin' ),
	    ),
	    'inline' => false,
	),

	'portfolio_archive_per_page' => array(
	    'type'  => 'select',
	    'value' => '12',
	    'label' => esc_html__('Portfolio Archive Items Per Page', 'jevelin'),
	    'desc'  => esc_html__('Choose portfolio archive items per page', 'jevelin'),
	    'choices' => array(
			'-1' => esc_html__( 'Show All items', 'jevelin' ),
	        '1' => esc_html__( '1 item', 'jevelin' ),
	        '2' => esc_html__( '2 items', 'jevelin' ),
			'3' => esc_html__( '3 items', 'jevelin' ),
	        '4' => esc_html__( '4 items', 'jevelin' ),
			'5' => esc_html__( '5 Items', 'jevelin' ),
	        '6' => esc_html__( '6 items', 'jevelin' ),
			'7' => esc_html__( '7 items', 'jevelin' ),
	        '8' => esc_html__( '8 items', 'jevelin' ),
			'9' => esc_html__( '9 items', 'jevelin' ),
	        '10' => esc_html__( '10 items', 'jevelin' ),
			'11' => esc_html__( '12 items', 'jevelin' ),
	        '12' => esc_html__( '12 items', 'jevelin' ),
			'13' => esc_html__( '13 items', 'jevelin' ),
			'14' => esc_html__( '14 items', 'jevelin' ),
	        '15' => esc_html__( '15 items', 'jevelin' ),
	    ),
	    'inline' => false,
	),

	'portfolio_gallery_columns' => array(
	    'type'  => 'radio',
	    'value' => 'columns3',
	    'label' => esc_html__('Portfolio Project Gallery Columns', 'jevelin'),
	    'desc'  => esc_html__('Choose portfolio project columns for gallery layout', 'jevelin'),
	    'choices' => array(
			'columns3' => esc_html__( 'Columns 3', 'jevelin' ),
	        'columns4' => esc_html__( 'Columns 4', 'jevelin' ),
	        'columns5' => esc_html__( 'Columns 5', 'jevelin' ),
	    ),
	    'inline' => false,
	),





	'portfolio_gallery_slider' => array(
	    'type'  => 'radio',
	    'value' => 'off',
	    'label' => esc_html__('Portfolio Project Gallery Slider', 'jevelin'),
	    'desc'  => esc_html__('Enable or disable portfolio project gallery slider', 'jevelin'),
	    'choices' => array(
			'off' => esc_html__( 'Off', 'jevelin' ),
	        'on' => esc_html__( 'On', 'jevelin' ),
	    ),
	    'inline' => false,
	),

	'portfolio_padding' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Portfolio Single Page Content Padding', 'jevelin'),
		'desc'  => esc_html__('Enter custom portfolio single plage default content padding (default: 60px 0px 60px 0px)', 'jevelin'),
	),
);


$options = array(
	'portfolio' => array(
		'title'   => esc_html__( 'Portfolio', 'jevelin' ),
		'type'    => 'tab',
		'icon'	  => 'fa fa-phone',
		'options' => array(
			'lightbox-box' => array(
				'title'   => esc_html__( 'Portfolio Settings', 'jevelin' ),
				'type'    => 'box',
				'options' => $portfilio_options
			),
		)
	)
);
