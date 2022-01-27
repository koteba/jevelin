<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$titlebar_options = array(
	'titlebar' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Titlebar', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable titlebar', 'jevelin' ),
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

	'titlebar_layout' => array(
	    'type'  => 'radio',
	    'label' => esc_html__('Titlebar Layout', 'jevelin'),
	    'desc'  => esc_html__('Choose titlebar layout', 'jevelin'),
	    'choices' => jevelin_get_titlebars(),
	    'value' => 'side',
	    'inline' => false,
	),

	'titlebar_height' => array(
	    'type'  => 'select',
	    'label' => esc_html__('Titlebar Height', 'jevelin'),
	    'desc'  => esc_html__('Choose titlebar height', 'jevelin'),
	    'choices' => array(
	    	'small' => esc_html__( 'Small', 'jevelin' ),
	        'medium' => esc_html__( 'Medium', 'jevelin' ),
	        'large' => esc_html__( 'Large', 'jevelin' ),
	    ),
	    'value' => 'medium',
	),

	'titlebar_background' => array(
		'label' => esc_html__( 'Titlebar Background Image', 'jevelin' ),
		'desc'  => esc_html__( 'Upload a background image for titlebar', 'jevelin' ),
		'type'  => 'upload'
	),

    'titlebar_background_parallax' => array(
        'type' => 'switch',
        'label' => esc_html__( 'Parallax Background', 'jevelin' ),
        'desc' => esc_html__( 'Enable or disable parallax background', 'jevelin' ),
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

	'titlebar-background-color' => array(
	    'type'  => 'color-picker',
	    'value' => '#fbfbfb',
	    'label' => esc_html__('Titlebar Background Color', 'jevelin'),
	    'desc'  => esc_html__('Select titlebar background color', 'jevelin'),
	),

	'titlebar-title-color' => array(
	    'type'  => 'color-picker',
	    'label' => esc_html__('Titlebar Title Color', 'jevelin'),
	    'desc'  => esc_html__('Select titlebar title color', 'jevelin'),
	),

	'titlebar-breadcrumbs-color' => array(
	    'type'  => 'color-picker',
	    'label' => esc_html__('Titlebar Breadcrumbs Color', 'jevelin'),
	    'desc'  => esc_html__('Select titlebar breadcrumbs color', 'jevelin'),
	),

	'titlebar-headings-seo' => array(
	    'type'  => 'radio',
	    'label' => esc_html__('Titlebar Headings', 'jevelin'),
	    'desc'  => esc_html__('Choose titlebar headings for seo purposes', 'jevelin'),
	    'choices' => array(
	        'h1' => esc_html__( 'H1', 'jevelin' ),
	        'h2' => esc_html__( 'H2', 'jevelin' ),
	    ),
	    'value' => 'h2',
	    'inline' => false,
	),

	'titlebar-home-title' => array(
		'type'  => 'text',
		'label' => esc_html__('Home Title', 'jevelin'),
		'desc'  => esc_html__('Enter main title of home page', 'jevelin'),
		'value' => 'Home',
	),

	'titlebar-post-title' => array(
		'type'  => 'text',
		'label' => esc_html__('Post Title', 'jevelin'),
		'desc'  => esc_html__('Enter main title of post pages', 'jevelin'),
		'value' => 'Blog Post',
	),

	'titlebar-portfolio-title' => array(
		'type'  => 'text',
		'label' => esc_html__('Portfolio Title', 'jevelin'),
		'desc'  => esc_html__('Enter main title of Portfolio pages', 'jevelin'),
		'value' => 'Portfolio',
	),

	'titlebar-blog-woocommerce' => array(
		'type'  => 'text',
		'label' => esc_html__('WooCommerce Title', 'jevelin'),
		'desc'  => esc_html__('Enter main title of WooCommerce pages', 'jevelin'),
		'value' => 'Shop',
	),

	'titlebar-404-title' => array(
		'type'  => 'text',
		'label' => esc_html__('404 Title', 'jevelin'),
		'desc'  => esc_html__('Enter main title of 404 page', 'jevelin'),
		'value' => 'Page could not be found',
	),




	'titlebar_title1' => array( 'type'  => 'html-full', 'value' => '', 'label' => false, 'html'  =>
		'<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Titlebar Responsive', 'jevelin').'</span></h3>',
	),

	'titlebar_mobile_spacing' => array(
	    'type'  => 'radio',
	    'label' => esc_html__('Mobile Spacing', 'jevelin'),
	    'desc'  => esc_html__('Choose titlebar mobile spacing', 'jevelin'),
	    'choices' => array(
	    	'default' => esc_html__( 'Default', 'jevelin' ),
	        'compact' => esc_html__( 'Compact', 'jevelin' ),
	    ),
	    'value' => 'compact',
	),

	'titlebar_mobile_title' => array(
        'type' => 'switch',
        'label' => esc_html__( 'Mobile Layout Main Title', 'jevelin' ),
        'desc' => esc_html__( 'Enable or disable main title', 'jevelin' ),
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

);


$options = array(
	'titlebar' => array(
		'title'   => esc_html__( 'Titlebar', 'jevelin' ),
		'type'    => 'tab',
		'icon'	  => 'fa fa-phone',
		'options' => array(
			'titlebar-box' => array(
				'title'   => esc_html__( 'Titlebar Settings', 'jevelin' ),
				'type'    => 'box',
				'options' => $titlebar_options
			),
		)
	)
);
