<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$styling_options = array(
	'styling_body_background' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#ffffff',
	    'label' => esc_html__('Body Background Color', 'jevelin'),
	    'desc'  => esc_html__('Select body background color', 'jevelin'),
	),

	'styling_body' => array(
		'type'  => 'typography-v2',
		'value'      => array(
	        'family'    => 'Montserrat',
	        'subset'    => 'latin',
	        'variation' => 'regular',
	        'size'      => 14,
	        'line-height' => 0,
	        'letter-spacing' => 0,
	        'color'     => '#8d8d8d'
		),
		'components' => array(
	        'family'         => true,
	        'size'           => true,
	        'line-height'    => true,
	        'letter-spacing' => true,
	        'color'          => true
		),
		'label' => esc_html__('Body Font', 'jevelin'),
		'desc'  => esc_html__('Choose default body font settings', 'jevelin'),
	),

	'google_fonts_subset' => array(
		'type'  => 'checkboxes',
		'value' => array(
			'latin' => true,
		),
		'label' => esc_html__('Choose the character sets', 'jevelin'),
		'desc'  => esc_html__('Select the character sets you want to use for fonts (will be used only if available)', 'jevelin'),
		'choices' => array(
			'greek' => esc_html__('Greek ', 'jevelin'),
			'greek-ext' => esc_html__('Greek Extended', 'jevelin'),
			'latin' => esc_html__('Latin', 'jevelin'),
			'vietnamese' => esc_html__('Vietnamese', 'jevelin'),
			'cyrillic-ext' => esc_html__('Cyrillic Extended', 'jevelin'),
			'latin-ext' => esc_html__('Latin Extended', 'jevelin'),
			'cyrillic' => esc_html__('Cyrillic ', 'jevelin'),
		),
		'inline' => true,
	),

	'google_fonts_mini' => array(
		'label' => esc_html__( 'Only main font weights', 'jevelin' ),
		'desc'  => esc_html__( 'Improve page speed by loading only main font weights', 'jevelin' ),
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

	'title_styling_body' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('General', 'jevelin').'</span></h3>',
	),

	'accent_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#294cff',
	    'label' => esc_html__('Accent Color', 'jevelin'),
	    'desc'  => esc_html__('Select page accent color', 'jevelin'),
	),

	'accent_hover_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#1738e2',
	    'label' => esc_html__('Accent Hover Color', 'jevelin'),
	    'desc'  => esc_html__('Select page accent color on hover', 'jevelin'),
	),

	'link_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#294cff',
	    'label' => esc_html__('Link Color', 'jevelin'),
	    'desc'  => esc_html__('Select page link color', 'jevelin'),
	),

	'link_hover_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#1738e2',
	    'label' => esc_html__('Link Hover Color', 'jevelin'),
	    'desc'  => esc_html__('Select page link color on hover', 'jevelin'),
	),

	'title_styling_headings' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Headings', 'jevelin').'</span></h3>',
	),

	'styling_headings' => array(
		'type'  => 'typography-v2',
		'value'      => array(
	        'family'    => 'Montserrat',
	        'subset'    => 'latin',
	        'variation' => '700',
	        'color'     => '#3a3a3a'
		),
		'components' => array(
	        'family'         => true,
	        'size'           => false,
	        'line-height'    => false,
	        'letter-spacing' => false,
	        'color'          => true
		),
		'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
		'label' => esc_html__('Headings', 'jevelin'),
	    'desc'  => esc_html__('Choose default font settings for all headings', 'jevelin'),
	),

	'styling_h1' => array(
	    'type'  => 'slider',
	    'value' => 30,
	    'properties' => array(
	        'min' => 5,
	        'max' => 65,
	    ),
	    'label' => esc_html__('Heading 1', 'jevelin'),
	    'desc'  => esc_html__('Select heading 1 font size (pixels)', 'jevelin'),
	),

	'styling_h2' => array(
	    'type'  => 'slider',
	    'value' => 24,
	    'properties' => array(
	        'min' => 5,
	        'max' => 65,
	    ),
	    'label' => esc_html__('Heading 2', 'jevelin'),
	    'desc'  => esc_html__('Select heading 2 font size (pixels)', 'jevelin'),
	),

	'styling_h3' => array(
	    'type'  => 'slider',
	    'value' => 21,
	    'properties' => array(
	        'min' => 5,
	        'max' => 65,
	    ),
	    'label' => esc_html__('Heading 3', 'jevelin'),
	    'desc'  => esc_html__('Select heading 3 font size (pixels)', 'jevelin'),
	),

	'styling_h4' => array(
	    'type'  => 'slider',
	    'value' => 18,
	    'properties' => array(
	        'min' => 5,
	        'max' => 65,
	    ),
	    'label' => esc_html__('Heading 4', 'jevelin'),
	    'desc'  => esc_html__('Select heading 4 font size (pixels)', 'jevelin'),
	),

	'styling_h5' => array(
	    'type'  => 'slider',
	    'value' => 16,
	    'properties' => array(
	        'min' => 5,
	        'max' => 65,
	    ),
	    'label' => esc_html__('Heading 5', 'jevelin'),
	    'desc'  => esc_html__('Select heading 5 font size (pixels)', 'jevelin'),
	),

	'styling_h6' => array(
	    'type'  => 'slider',
	    'value' => 14,
	    'properties' => array(
	        'min' => 5,
	        'max' => 65,
	    ),
	    'label' => esc_html__('Heading 6', 'jevelin'),
	    'desc'  => esc_html__('Select heading 6 font size (pixels)', 'jevelin'),
	),


	'title_styling_header' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Header', 'jevelin').'</span></h3>',
	),

	'header_background_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#fff',
	    'label' => esc_html__('Header Background Color', 'jevelin'),
	    'desc'  => esc_html__('Select header background color', 'jevelin'),
	),

	'header_background_image' => array(
		'label' => esc_html__( 'Header Background Image', 'jevelin' ),
		'desc'  => esc_html__( 'Upload a header background image. Note: Image will only appear when background color transparancy will be set', 'jevelin' ),
		'type'  => 'upload'
	),

	'header_text_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#8d8d8d',
	    'label' => esc_html__('Header Text Color', 'jevelin'),
	    'desc'  => esc_html__('Select header text color', 'jevelin'),
	),

	'header_border_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => 'rgba( 0,0,0,0.08 )',
	    'label' => esc_html__('Header Border Color', 'jevelin'),
	    'desc'  => esc_html__('Select header border color', 'jevelin'),
	),

	'header_top_background_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#294cff',
	    'label' => esc_html__('Top Bar Background Color', 'jevelin'),
	    'desc'  => esc_html__('Select top bar background color', 'jevelin'),
	),

	'header_top_color' => array(
	    'type'  => 'color-picker',
	    'value' => '#ffffff',
	    'label' => esc_html__('Top Bar Color', 'jevelin'),
	    'desc'  => esc_html__('Select top bar color', 'jevelin'),
	),

	'header_light_text_color' => array(
	    'type'  => 'color-picker',
	    'label' => esc_html__('Light Header Text Color', 'jevelin'),
	    'desc'  => esc_html__('Select light header text color', 'jevelin'),
	),

	'header_light_text_active_color' => array(
	    'type'  => 'color-picker',
	    'label' => esc_html__('Light Header Text Active Color', 'jevelin'),
	    'desc'  => esc_html__('Select light header text active color', 'jevelin'),
	),


	'title_styling_nav' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Navigation', 'jevelin').'</span></h3>',
	),

	'header_nav_font' => array(
		'type'  => 'select',
		'label' => esc_html__('Font Famility', 'jevelin'),
		'desc'  => esc_html__( 'Select navigation font famility', 'jevelin' ),
		'choices' => array(
			'heading' => esc_html__( 'Heading', 'jevelin' ),
			'body' => esc_html__( 'Body', 'jevelin' ),
			'additional1' => esc_html__( 'Additional font 1', 'jevelin' ),
			'additional2' => esc_html__( 'Additional font 2', 'jevelin' ),
		),
		'value'	  => 'body',
	),

	'header_nav_size' => array(
		'type'  => 'text',
		'value' => '14px',
		'attr'  => array( 'style' => 'max-width: 70px' ),
		'label' => esc_html__('Navigation Size', 'jevelin'),
		'desc'  => wp_kses( __( 'Enter your navigation size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
	),

	'header_nav_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => 'rgba(61,61,61,0.69)',
	    'label' => esc_html__('Navigation Color', 'jevelin'),
	    'desc'  => esc_html__('Select navigation color', 'jevelin'),
	),

	'header_nav_hover_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => 'rgba(61,61,61,0.80)',
	    'label' => esc_html__('Navigation Hover Color', 'jevelin'),
	    'desc'  => esc_html__('Select navigation color on hover', 'jevelin'),
	),

	'header_nav_active_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#294cff',
	    'label' => esc_html__('Active Navigation Color', 'jevelin'),
	    'desc'  => esc_html__('Select active navigation color', 'jevelin'),
	),

	'header_nav_active_background_color' => array(
	    'type'  => 'rgba-color-picker',
	    'label' => esc_html__('Active Navigation Background Color', 'jevelin'),
	    'desc'  => esc_html__('Select active navigation background color (optional)', 'jevelin'),
	    'value' => ''
	),


	'title_styling_menu' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Dropdown / Menu', 'jevelin').'</span></h3>',
	),

	'menu_background_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#232323',
	    'label' => esc_html__('Menu Background Color', 'jevelin'),
	    'desc'  => esc_html__('Select background color', 'jevelin'),
	),

	'menu_title_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '',
	    'label' => esc_html__('Menu Title Color', 'jevelin'),
	    'desc'  => esc_html__('Select title color', 'jevelin'),
	),

	'menu_link_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#aaaaaa',
	    'label' => esc_html__('Menu Text Color', 'jevelin'),
	    'desc'  => esc_html__('Select text color', 'jevelin'),
	),

	'menu_link_hover_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#ffffff',
	    'label' => esc_html__('Menu Link Hover and Active Color', 'jevelin'),
	    'desc'  => esc_html__('Select menu link hover and active color', 'jevelin'),
	),

	'menu_link_border_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#303030',
	    'label' => esc_html__('Menu Link Border Color', 'jevelin'),
	    'desc'  => esc_html__('Select menu link border color', 'jevelin'),
	),

	'menu_active_background1' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '',
	    'label' => esc_html__('Menu Background Color 1', 'jevelin'),
	    'desc'  => esc_html__('Select menu background color 1 (for dropdown style 2 only)', 'jevelin'),
	),

	'menu_active_background2' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '',
	    'label' => esc_html__('Menu Background Color 2', 'jevelin'),
	    'desc'  => esc_html__('Select menu background color 2 to make gradient (for dropdown style 2 only)', 'jevelin'),
	),

	'title_styling_content' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Content', 'jevelin').'</span></h3>',
	),

	'content_border' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#e5e5e5',
	    'label' => esc_html__('Borders', 'jevelin'),
	    'desc'  => esc_html__('Will change borders in blog, portfolio and shop content pages', 'jevelin'),
	),

	'content_button_background' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#f2f2f2',
	    'label' => esc_html__('Buttons Background Color', 'jevelin'),
	    'desc'  => esc_html__('Will change different button background color in blog, portfolio and shop content pages', 'jevelin'),
	),

	'content_button_background_hover' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#e5e5e5',
	    'label' => esc_html__('Buttons Background Hover Color', 'jevelin'),
	    'desc'  => esc_html__('Will change different button background hover color in blog, portfolio and shop content pages', 'jevelin'),
	),

	'content_button_text_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#9a9a9a',
	    'label' => esc_html__('Buttons Text Color', 'jevelin'),
	    'desc'  => esc_html__('Will change different button text color in blog, portfolio and shop content pages', 'jevelin'),
	),

	'content_input_background_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#ffffff',
	    'label' => esc_html__('Input, Textarea Background Color', 'jevelin'),
	    'desc'  => esc_html__('Will change different input and textarea field background color in blog, portfolio and shop content pages', 'jevelin'),
	),

	'content_input_border_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#e3e3e3',
		'label' => esc_html__('Input, Textarea Border Color', 'jevelin'),
	    'desc'  => esc_html__('Will change different input and textarea field border color in blog, portfolio and shop content pages', 'jevelin'),
	),

	'content_input_text_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#8d8d8d',
		'label' => esc_html__('Input, Textarea Text Color', 'jevelin'),
	    'desc'  => esc_html__('Will change different input and textarea field border color in blog, portfolio and shop content pages', 'jevelin'),
	),

	'content_search_background_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#f0f0f0',
		'label' => esc_html__('Search Widget Icon Background Color', 'jevelin'),
	    'desc'  => esc_html__('Will change search widget icon background color', 'jevelin'),
	),

	'content_search_text_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#505050',
		'label' => esc_html__('Search Widget Icon Text Color', 'jevelin'),
	    'desc'  => esc_html__('Will change search widget icon text color', 'jevelin'),
	),

	'title_styling_sidebar' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Sidebar', 'jevelin').'</span></h3>',
	),

	'sidebar_headings' => array(
		'type'  => 'typography-v2',
		'value'      => array(
			'size'     => '20',
	        'color'     => '#3a3a3a',
		),
		'components' => array(
	        'family'         => false,
	        'size'           => true,
	        'line-height'    => false,
	        'letter-spacing' => false,
	        'color'          => true
		),
		'label' => esc_html__('Sidebar Headings', 'jevelin'),
		'desc'  => esc_html__('Choose default sidebar heading font settings', 'jevelin'),
	),

	'sidebar_font_weight' => array(
	    'type'  => 'select',
	    'value' => 'default',
	    'label' => esc_html__('Sidebar Font Weight', 'jevelin'),
	    'desc'  => esc_html__('Choose sidebar font weight (depends on chosen font)', 'jevelin'),
	    'choices' => array(
            'default' => esc_html__( 'Default', 'jevelin' ),
			'300' => esc_html__( 'Thin', 'jevelin' ),
			'300' => esc_html__( 'Extra Light', 'jevelin' ),
            '300' => esc_html__( 'Light', 'jevelin' ),
			'400' => esc_html__( 'Regular', 'jevelin' ),
			'500' => esc_html__( 'Medium', 'jevelin' ),
			'600' => esc_html__( 'Semi Bold', 'jevelin' ),
			'700' => esc_html__( 'Bold', 'jevelin' ),
			'800' => esc_html__( 'Extra bold', 'jevelin' ),
			'900' => esc_html__( 'Black', 'jevelin' ),
	    ),
	    'inline' => false,
	),

	'sidebar_border_color' => array(
	    'type'  => 'rgba-color-picker',
	    'label' => esc_html__('Sidebar Border Color', 'jevelin'),
	    'desc'  => esc_html__('Select sidebar border color', 'jevelin'),
	    'value' => '#e3e3e3'
	),


	'title_footer_styling' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Footer Styling', 'jevelin').'</span></h3>',
	),

	'footer_background_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#262626',
	    'label' => esc_html__('Footer Background Color', 'jevelin'),
	    'desc'  => esc_html__('Select footer background color', 'jevelin'),
	),

	'footer_background_image' => array(
		'label' => esc_html__( 'Footer Background Image', 'jevelin' ),
		'desc'  => esc_html__( 'Upload a footer background image. Note: Image will appear only when background color transparancy will be set', 'jevelin' ),
		'type'  => 'upload'
	),

	'footer_headings' => array(
		'type'  => 'typography-v2',
		'value'      => array(
			'size'     => '20',
	        'color'     => '#ffffff'
		),
		'components' => array(
	        'family'         => false,
	        'size'           => true,
	        'line-height'    => false,
	        'letter-spacing' => false,
	        'color'          => true
		),
		'label' => esc_html__('Footer Headings', 'jevelin'),
		'desc'  => esc_html__('Choose default footer heading font settings', 'jevelin'),
	),

	'footer_text_color' => array(
	    'type'  => 'color-picker',
	    'value' => '#e3e3e3',
	    'label' => esc_html__('Footer Text Color', 'jevelin'),
	    'desc'  => esc_html__('Select footer text color', 'jevelin'),
	),

	'footer_link_color' => array(
	    'type'  => 'color-picker',
	    'value' => '#ffffff',
	    'label' => esc_html__('Footer Link Color', 'jevelin'),
	    'desc'  => esc_html__('Select footer link color', 'jevelin'),
	),

	'footer_hover_color' => array(
	    'type'  => 'color-picker',
	    'value' => '#294cff',
	    'label' => esc_html__('Footer Hover Color', 'jevelin'),
	    'desc'  => esc_html__('Select footer color on hover', 'jevelin'),
	),

	'footer_icon_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#f7f7f7',
	    'label' => esc_html__('Footer Icon Color', 'jevelin'),
	    'desc'  => esc_html__('Select footer icon color', 'jevelin'),
	),

	'footer_border_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => 'rgba(255,255,255,0.10)',
	    'label' => esc_html__('Footer Border Color', 'jevelin'),
	    'desc'  => esc_html__('Select footer border color', 'jevelin'),
	),


	'title_copyright_styling' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Copyright Styling', 'jevelin').'</span></h3>',
	),

	'copyright_background_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => '#222222',
	    'label' => esc_html__('Copyright Background Color', 'jevelin'),
	    'desc'  => esc_html__('Select copyright background color', 'jevelin'),
	),

	'copyright_text_color' => array(
	    'type'  => 'color-picker',
	    'value' => '#ffffff',
	    'label' => esc_html__('Copyright Text Color', 'jevelin'),
	    'desc'  => esc_html__('Select copyright text color', 'jevelin'),
	),

	'copyright_link_color' => array(
	    'type'  => 'color-picker',
	    'value' => '#ffffff',
	    'label' => esc_html__('Copyright Link Color', 'jevelin'),
	    'desc'  => esc_html__('Select copyright link color', 'jevelin'),
	),

	'copyright_hover_color' => array(
	    'type'  => 'color-picker',
	    'value' => '#b4c0ff',
	    'label' => esc_html__('Copyright Link Hover Color', 'jevelin'),
	    'desc'  => esc_html__('Select copyright link color on hover', 'jevelin'),
	),

	'copyright_border_color' => array(
	    'type'  => 'rgba-color-picker',
	    'value' => 'rgba(255,255,255,0.15)',
	    'label' => esc_html__('Copyright Border Color', 'jevelin'),
	    'desc'  => esc_html__('Select copyright border color', 'jevelin'),
	),



	'additional_styling_popover' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Popover Styling', 'jevelin').'</span></h3>',
	),

	'popover_wc' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Popover', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable popover for WooCommerce elements', 'jevelin' ),
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


	'popover_color' => array(
	    'type'  => 'rgba-color-picker',
	    'label' => esc_html__('Popover Background Color', 'jevelin'),
	    'desc'  => esc_html__('Select popover background color. Leave empty for default accent color', 'jevelin'),
	    'value' => ''
	),

	'popover_font' => array(
		'type'  => 'select',
		'label' => esc_html__('Popover Font Famility', 'jevelin'),
		'desc'  => esc_html__( 'Select popover font famility source', 'jevelin' ),
		'choices' => array(
			'heading' => esc_html__( 'Heading', 'jevelin' ),
			'body' => esc_html__( 'Body', 'jevelin' ),
			'additional1' => esc_html__( 'Additional font 1', 'jevelin' ),
			'additional2' => esc_html__( 'Additional font 2', 'jevelin' ),
		),
		'value'	  => 'additional1',
	),





	'additional_styling' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Adittional Fonts', 'jevelin').'</span></h3>',
	),

	'additional_font1' => array(
		'type'  => 'typography-v2',
		'value'      => array(
	        'family'    => 'Raleway',
	        'subset'    => 'latin',
		),
		'components' => array(
	        'family'         => true,
	        'size'           => false,
	        'line-height'    => false,
	        'letter-spacing' => false,
	        'color'          => false
		),
		'label' => esc_html__('Adittional Font 1', 'jevelin'),
		'desc'  => esc_html__('Used adittional font for WoocCmmerce sale popover', 'jevelin'),
	),

	'additional_font2' => array(
		'type'  => 'typography-v2',
		'value'      => array(
	        'family'    => 'Raleway',
	        'subset'    => 'latin',
		),
		'components' => array(
	        'family'         => true,
	        'size'           => false,
	        'line-height'    => false,
	        'letter-spacing' => false,
	        'color'          => false
		),
		'label' => esc_html__('Adittional Font 2', 'jevelin'),
		'desc'  => esc_html__('Used adittional font for heading and other shortcodes', 'jevelin'),
	),
);


$options = array(
	'styling' => array(
		'title'   => esc_html__( 'Styling', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(
			'styling-box' => array(
				'title'   => esc_html__( 'Body', 'jevelin' ),
				'type'    => 'box',
				'options' => $styling_options
			),
		)
	)
);
