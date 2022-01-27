<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$favicon = array(
    'type'  => 'hidden',
    'value' => 'outdated',
);

if ( !function_exists( 'has_site_icon' ) || ! has_site_icon() ) :
	$favicon = array(
		'label' => esc_html__( 'Favicon', 'jevelin' ),
		'desc'  => esc_html__( 'Upload a 32px x 32px (ico/png) image', 'jevelin' ),
		'type'  => 'upload'
	);
endif;

$google_api_key = 'https://developers.google.com/maps/documentation/javascript/get-api-key';

$general_options = array(
	'content_width' => array(
	    'type'  => 'slider',
	    'value' => '1',
	    'label' => esc_html__('Content Width', 'jevelin'),
	    'desc'  => esc_html__('Choose page content width', 'jevelin'),
	    'properties' => array(
	        'min' => 1000,
	        'max' => 1600,
	        'step' => 1
	    ),
	    'inline' => false,
		'value' => 1200,
	),

	'global_page_layout' => array(
        'type'  => 'radio',
        'value' => 'default',
        'label' => esc_html__( 'Page Layout', 'jevelin' ),
        'desc'  => esc_html__( 'Choose default page layout', 'jevelin' ),
        'choices' => array(
			'default' => esc_html__( 'Default (without sidebar)', 'jevelin' ),
            'full' => esc_html__( 'Full Width', 'jevelin' ),
            'sidebar-left' => esc_html__( 'Sidebar Left', 'jevelin' ),
            'sidebar-right' => esc_html__( 'Sidebar Right', 'jevelin' ),
        ),
        'inline' => false,
    ),

	'page_layout' => array(
	    'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
	    'value' => array(
	        'page_layout' => 'full',
	    ),
	    'picker' => array(
	        'page_layout' => array(
	            'label'   => esc_html__('Boxed Layout', 'jevelin'),
	            'desc'    => esc_html__('Choose main page layout. Boxed layout will not work together with left header', 'jevelin'),
	            'type'    => 'radio',
	            'choices' => array(
	                'full' => esc_html__( 'Disabled', 'jevelin' ),
	                'boxed' => esc_html__( 'Enabled', 'jevelin' ),
	            ),
	        )
	    ),
	    'choices' => array(
	        'boxed' => array(
		        'border_style' => array(
		            'label'   => esc_html__('Border Style', 'jevelin'),
		            'desc'    => esc_html__('Choose content border style', 'jevelin'),
		            'type'    => 'radio',
		            'choices' => array(
		                'none' => esc_html__('None', 'jevelin'),
		                'shadow' => esc_html__('Shadow', 'jevelin'),
		                'line' => esc_html__('Line', 'jevelin'),
		            ),
		            'value' => 'shadow'
		        ),

				'background_color' => array(
				    'label' => esc_html__('Background Color', 'jevelin'),
				    'desc'  => esc_html__('Select background color', 'jevelin'),
				    'type'  => 'color-picker',
				    'value' => '#fafafa'
				),

				'background_image' => array(
					'label' => esc_html__( 'Page Background Image', 'jevelin' ),
					'desc'  => esc_html__( 'Select page background image', 'jevelin' ),
					'type'  => 'upload',
					'images_only' => true,
				),
	        ),
	    ),
	),

	'blog_style' => array(
	    'type'  => 'radio',
	    'label' => esc_html__('Jevelin Style', 'jevelin'),
	    'desc'  => esc_html__('Choose overall Jevelin style (will change some widget, post and other element style)', 'jevelin'),
	    'choices' => array(
	        'style1' => esc_html__( 'Style 1', 'jevelin' ),
	        'style2' => esc_html__( 'Style 2', 'jevelin' ),
			'style3' => esc_html__( 'Style 3', 'jevelin' ),
	    ),
		'value' => 'style2',
	    'inline' => false,
	),

	'wc_style' => array(
	    'type'  => 'radio',
	    'value' => 'style1',
	    'label' => esc_html__('WooCommerce Product Item Style', 'jevelin'),
	    'desc'  => esc_html__('Choose WooCommerce product item style', 'jevelin'),
	    'choices' => array(
	        'style1' => esc_html__( 'Style 1', 'jevelin' ),
	        'style2' => esc_html__( 'Style 2', 'jevelin' ),
			'style3' => esc_html__( 'Style 3', 'jevelin' ),
	    ),
	    'inline' => false,
	),

	'white_borders' => array(
		'label' => esc_html__( 'White Frame', 'jevelin' ),
		'desc'  => esc_html__( 'Enable or disable white frame around the page', 'jevelin' ),
		'type'  => 'switch',
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

	'white_borders_only_on_pages' => array(
		'label' => esc_html__( 'White Frame Only in Pages', 'jevelin' ),
		'desc'  => esc_html__( 'Enable or disable white frame only in pages', 'jevelin' ),
		'type'  => 'switch',
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

	'favicon' => $favicon,

	'responsive_layout' => array(
		'label' => esc_html__( 'Responsive Layout', 'jevelin' ),
		'desc'  => esc_html__( 'Enable or disable responsive layout for mobile devices', 'jevelin' ),
		'type'  => 'switch',
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

	'smooth-scrooling' => array(
		'label' => esc_html__( 'Smooth Scrolling', 'jevelin' ),
		'desc'  => esc_html__( 'Enable or disable smooth scrolling for webkit browers like Chrome', 'jevelin' ),
		'type'  => 'switch',
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

	'back_to_top' => array(
	    'type'  => 'select',
	    'value' => '1',
	    'label' => esc_html__('Back To Top Button', 'jevelin'),
	    'desc'  => esc_html__('Choose style for "Back to top" button or disable it', 'jevelin'),
	    'choices' => array(
	        'disabled' => esc_html__( 'Disabled', 'jevelin' ),
	        '1' => esc_html__( 'Style 1', 'jevelin' ),
	        '1 filled' => esc_html__( 'Style 1 (filled)', 'jevelin' ),
	        '2' => esc_html__( 'Style 2', 'jevelin' ),
	        '2 filled' => esc_html__( 'Style 2 (filled)', 'jevelin' ),
	        '3' => esc_html__( 'Style 3', 'jevelin' ),
	    ),
	),

	'back_to_top_rounded' => array(
	    'label' => esc_html__('Back To Top Button Rounded', 'jevelin'),
		'desc'  => esc_html__( 'Enable or disable rounded corners for back to top button', 'jevelin' ),
		'type'  => 'switch',
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

	'rtl_support' => array(
		'label' => esc_html__( 'RTL Support', 'jevelin' ),
		'desc'  => esc_html__( 'Enable or disable RTL (Right to Left) support', 'jevelin' ),
		'type'  => 'switch',
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

	'crispy_images' => array(
		'label' => esc_html__( 'Crispy Images', 'jevelin' ),
		'desc'  => esc_html__( 'Enable or disable crispy images effect', 'jevelin' ),
		'type'  => 'switch',
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

	'page_comments' => array(
		'label' => esc_html__( 'Comments', 'jevelin' ),
		'desc'  => esc_html__( 'Enable or disable post comments and page comments', 'jevelin' ),
		'type'  => 'switch',
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

	'page_comments_depth' => array(
	    'type'  => 'select',
	    'value' => '5',
	    'label' => esc_html__('Comments Depth', 'jevelin'),
	    'desc'  => esc_html__('Choose comments max depth', 'jevelin'),
	    'choices' => array(
	        '1' => esc_html__( '1 level', 'jevelin' ),
	        '2' => esc_html__( '2 levels', 'jevelin' ),
	        '3' => esc_html__( '3 levels', 'jevelin' ),
	        '4' => esc_html__( '4 levels', 'jevelin' ),
	        '5' => esc_html__( '5 levels', 'jevelin' ),
	    ),
	),

	'one_pager' => array(
		'label' => esc_html__( 'One Page Navigation', 'jevelin' ),
		'desc'  => esc_html__( 'Enable or disable one page navigation', 'jevelin' ),
		'type'  => 'switch',
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

	'one_pager_anchor_scroll_speed' => array(
	    'type'  => 'select',
	    'value' => '1000',
	    'label' => esc_html__('One Page Anchor Scroll Speed', 'jevelin'),
	    'desc'  => esc_html__('Choose the anchor scolling speed', 'jevelin'),
	    'choices' => array(
	        '2000' => esc_html__( 'Slower', 'jevelin' ),
	        '1500' => esc_html__( 'Slow', 'jevelin' ),
	        '1000' => esc_html__( 'Normal', 'jevelin' ),
	        '500' => esc_html__( 'Fast', 'jevelin' ),
	        '250' => esc_html__( 'Faster', 'jevelin' ),
	        '1' => esc_html__( 'Instant', 'jevelin' ),
	    ),
	),


	'api_key' => array(
	    'type'  => 'text',
	    'label' => esc_html__('Google Maps API Key', 'jevelin'),
	    'desc'  => esc_html__('Google Maps requires API Key to work correctly. Therefore please create an application in Google Console and add key here.', 'jevelin').'</a>',
	),

	'theme_options_stored' => array(
	    'type'  => 'radio',
	    'value' => 'file',
	    'label' => esc_html__('Themes Options Stored In', 'jevelin'),
	    'desc'  => esc_html__('Choose how theme options are stored', 'jevelin'),
	    'choices' => array(
	        'file' => esc_html__( 'Stored in CSS file (inside wp-content/uploads) - faster', 'jevelin' ),
	        'inline' => esc_html__( 'Generated on fly in HTML HEAD tag as dynamic CSS - slower', 'jevelin' ),
	    ),
	),

);


$options = array(
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => esc_html__( 'General Settings', 'jevelin' ),
				'type'    => 'box',
				'options' => $general_options
			),
		)
	)
);
