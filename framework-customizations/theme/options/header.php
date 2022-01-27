<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$header_options = array(

	'header_layout' => array(
	    'type'  => 'radio',
	    'value' => '1',
	    'label' => esc_html__('Header Template', 'jevelin'),
	    'desc'  => esc_html__('Choose header template', 'jevelin'),
	    'choices' => jevelin_get_headers(),
	),

	'title_header_logo_settings' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Header Logos', 'jevelin').'</span></h3>',
	),

	'logo' => array(
		'label' => esc_html__( 'Standard Logo', 'jevelin' ),
		'desc'  => esc_html__( 'Upload a logo image (max height 250px) used in posts, portfolio and other pages', 'jevelin' ),
		'type'  => 'upload',
		'images_only' => true,
	),

	'logo_light' => array(
		'label' => esc_html__( 'Light Logo Version (optional)', 'jevelin' ),
		'desc'  => esc_html__( 'Upload a light logo version (max height 250px) used only when light style is activated or is above slide', 'jevelin' ),
		'type'  => 'upload',
		'images_only' => true,
	),

	'logo_sticky' => array(
		'label' => esc_html__( 'Sticky Logo (optional)', 'jevelin' ),
		'desc'  => esc_html__( 'Upload a sticky logo image (max height 250px) used only when sticky header is activated', 'jevelin' ),
		'type'  => 'upload',
		'images_only' => true,
	),

	'header_logo_sizes' => array(
	    'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
	    'value' => array(
	        'header_logo_sizes' => 'orginal',
	        'manual' => array(
	            'standard_height' => '40',
	            'sticky_height' => '40',
	            'responsive_height' => '40',
	        ),
	    ),
	    'picker' => array(
	        'header_logo_sizes' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Logo Sizes', 'jevelin' ),
				'desc' => esc_html__( 'Switch between orgianl and manual header logo sizing', 'jevelin' ),
				'value' => true,
				'left-choice' => array(
					'value' => 'orginal',
					'label' => esc_html__('Orginal', 'jevelin'),
				),
				'right-choice' => array(
					'value' => 'manual',
					'label' => esc_html__('Manual', 'jevelin'),
				),
	        )
	    ),
	    'choices' => array(
	    	'manual' => array(
				'standard_height' => array(
				    'type'  => 'slider',
				    'value' => '50',
				    'label' => esc_html__('Logo Height', 'jevelin'),
				    'desc'  => esc_html__('Choose header logo height size', 'jevelin'),
				    'properties' => array(
				        'min' => 20,
				        'max' => 250,
				        'step' => 1
				    ),
				    'inline' => false,
				),

				'sticky_height' => array(
				    'type'  => 'slider',
				    'value' => '40',
				    'label' => esc_html__('Sticky Logo Height', 'jevelin'),
				    'desc'  => esc_html__('Choose sticky logo height size', 'jevelin'),
				    'properties' => array(
				        'min' => 20,
				        'max' => 250,
				        'step' => 1
				    ),
				    'inline' => false,
				),

				'responsive_height' => array(
				    'type'  => 'slider',
				    'value' => '30',
				    'label' => esc_html__('Responsive Logo Height', 'jevelin'),
				    'desc'  => esc_html__('Choose responsive logo height size', 'jevelin'),
				    'properties' => array(
				        'min' => 20,
				        'max' => 250,
				        'step' => 1
				    ),
				    'inline' => false,
				),
			),
	    ),
	),

	'logo_status' => array(
		'label' => esc_html__( 'Logo Visibilty', 'jevelin' ),
		'desc'  => esc_html__( 'Enable or disable header logo visibilty', 'jevelin' ),
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

	'logo_title' => array(
	    'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
	    'value' => array(
	        'header_logo_sizes' => 'orginal',
	        'manual' => array(
	            'standard_height' => '40',
	            'sticky_height' => '40',
	            'responsive_height' => '40',
	        ),
	    ),
	    'picker' => array(
	        'logo_title' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Title Logo', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable custom logo title', 'jevelin' ),
				'value' => true,
				'left-choice' => array(
					'value' => 'off',
					'label' => esc_html__('Off', 'jevelin'),
				),
				'right-choice' => array(
					'value' => 'on',
					'label' => esc_html__('On', 'jevelin'),
				),
	        )
	    ),
	    'choices' => array(
	    	'on' => array(

				'logo_title_value' => array(
					'type'  => 'text',
					'value' => '',
					'label' => esc_html__('Logo Title Name', 'jevelin'),
					'desc'  => esc_html__('Enter your login title name', 'jevelin'),
				),

				'logo_both' => array(
					'type' => 'switch',
					'label' => esc_html__( 'Logo Title Name With Logo Image', 'jevelin' ),
					'desc' => esc_html__( 'Show both logo image and text', 'jevelin' ),
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

			),
	    ),
	),

	'title_header_settings' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Header Settings', 'jevelin').'</span></h3>',
	),

	'header_mega_style' => array(
	    'type'  => 'radio',
	    'value' => 'style1',
	    'label' => esc_html__('Dropdown Style', 'jevelin'),
	    'desc'  => esc_html__('Choose header dropdown style', 'jevelin'),
	    'choices' => array(
            'style1' => esc_html__( 'Style 1', 'jevelin' ),
            'style2' => esc_html__( 'Style 2 (with shadow)', 'jevelin' ),
	    ),
	    'inline' => false,
	),

	'ipad_landscape_full_navigation' => array(
		'label' => esc_html__( 'iPad landscape navigation', 'jevelin' ),
		'desc'  => esc_html__( 'Enable or disable iPad landscape to use desktop navigation (expermetal feature)', 'jevelin' ),
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

	/*'header_layout_test1' => array(
	    'type'  => 'image-picker',
	    'value' => '3',
	    'label' => __('Header Test', '{domain}'),
	    'desc'  => __('Choose main header layout', '{domain}'),
	    'choices' => array(
			'1' => 'https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/04/header_1.png',
			'2' => 'https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/04/header_5.png',
			'3' => 'https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/04/header_6.png',
	        //'value-1' => get_template_directory_uri() .'/images/thumbnail.png',
	        //'value-2' => get_template_directory_uri() .'/images/thumbnail.png',
	        //'value-3' => array(
	        //    'small' => get_template_directory_uri() .'/images/thumbnail.png',
	        //    'large' => get_template_directory_uri() .'/images/preview.png',
	        //),
	    ),
	    'blank' => false, // (optional) if true, images can be deselected
	),*/

	'header_width' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Header Width', 'jevelin' ),
		'desc' => esc_html__( 'Select header width', 'jevelin' ),
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

	'header_sticky' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Sticky Header', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable sticky header', 'jevelin' ),
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

	'header_mobile_sticky' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Sticky Mobile Header', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable sticky mobile header', 'jevelin' ),
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

	'header_elements' => array(
	    'type'  => 'checkboxes',
	    'value' => array(
	    	'social' => true,
	    	'social_mobile' => true,
	        'search' => true,
	        'woo_cart' => true,
	        'woo_account' => false,
	    ),
	    'label' => esc_html__('Header Elements', 'jevelin'),
	    'desc'  => esc_html__('Select header elements you want to see', 'jevelin'),
	    'choices' => array(
	        'social' => esc_html__('Social Media', 'jevelin'),
	        'social_mobile' => esc_html__('Social Media (mobile)', 'jevelin'),
	    	'search' => esc_html__('Search', 'jevelin'),
	        'woo_cart' => esc_html__('WooCommerce Cart', 'jevelin'),
	        'woo_account' => esc_html__('WooCommerce Account', 'jevelin'),
	    ),
	    'inline' => false,
	),

	'header_search_style' => array(
	    'type'  => 'radio',
	    'value' => 'style1',
	    'label' => esc_html__('Header Search Style', 'jevelin'),
	    'desc'  => esc_html__('Choose header search style', 'jevelin'),
	    'choices' => array(
            'style1' => esc_html__( 'Style 1', 'jevelin' ),
            'style2' => esc_html__( 'Style 2', 'jevelin' ),
	    ),
	    'inline' => false,
	),

	'header_uppercase' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Navigation Uppercase', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable uppercase navigation text transformation', 'jevelin' ),
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

	'header_icons' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Icons Size', 'jevelin' ),
		'desc' => esc_html__( 'Choose icons size', 'jevelin' ),
		'value' => 'large',
		'left-choice' => array(
			'value' => 'small',
			'label' => esc_html__('Small', 'jevelin'),
		),
		'right-choice' => array(
			'value' => 'large',
			'label' => esc_html__('Large', 'jevelin'),
		),
	),

	'header_search_results' => array(
	    'type'  => 'radio',
	    'value' => 'posts',
	    'label' => esc_html__('Header Search Results', 'jevelin'),
	    'desc'  => esc_html__('Choose Header Search Results', 'jevelin'),
	    'choices' => array(
	        'posts' => esc_html__( 'Blog posts and pages', 'jevelin' ),
			'onlyposts' => esc_html__( 'Blog posts only', 'jevelin' ),
	        'products' => esc_html__( 'Products', 'jevelin' ),
			'adaptive' => esc_html__( 'Adaptive', 'jevelin' ),
	    ),
	    'inline' => false,
	),


	'header_menu_icon' => array(
	    'type'  => 'radio',
	    'value' => 'hamburger',
	    'label' => esc_html__('Header Menu Icon', 'jevelin'),
	    'desc'  => esc_html__('Choose Header Search Results', 'jevelin'),
	    'choices' => array(
	        'hamburger' => esc_html__( 'Hamburger', 'jevelin' ),
			'dots' => esc_html__( 'Dots grid', 'jevelin' ),
	    ),
	    'inline' => false,
	),


	/*'header_nav_icon_status' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Custom Navigation Icon', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable custom header navigation icon', 'jevelin' ),
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

	'header_nav_icon' => array(
		'type'  => 'new-icon',
		'label' => esc_html__('Custom Navigation Icon Standard', 'jevelin'),
		'desc'   => esc_html__( 'Select header navigation icon', 'jevelin' ),
		'set' => 'jevelin-icons',
	),

	'header_nav_icon_close' => array(
		'type'  => 'new-icon',
		'label' => esc_html__('Custom Navigation Icon Close', 'jevelin'),
		'desc'   => esc_html__( 'Select header navigation icon', 'jevelin' ),
		'set' => 'jevelin-icons',
		'value' => 'ti-close',
	),*/



	'title_header_lang_settings' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Header Language Settings', 'jevelin').'</span></h3>',
	),

	'header_lang' => array(
	    'type'  => 'radio',
	    'value' => 'off',
	    'label' => esc_html__('Header Language Dropdown', 'jevelin'),
	    'desc'  => esc_html__('Choose language dropdown plugin', 'jevelin'),
	    'choices' => array(
            'off' => esc_html__( 'Off', 'jevelin' ),
            'wpml' => esc_html__( 'WPML integration', 'jevelin' ),
			'polylang' => esc_html__( 'Polylang integration', 'jevelin' ),
	    ),
	    'inline' => false,
	),


	'title_topbar' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Top Bar Settings', 'jevelin').'</span></h3>',
	),

	'topbar_status' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Topbar', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable header topbar', 'jevelin' ),
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

	'contact_phone' => array(
		'type'  => 'text',
		'value' => '+123 456 678 890',
		'label' => esc_html__('Contact Phone', 'jevelin'),
		'desc'  => esc_html__('Enter contact phone', 'jevelin'),
	),

	'contact_email' => array(
		'type'  => 'text',
		'value' => 'info@mysite.com',
		'label' => esc_html__('Contact E-mail', 'jevelin'),
		'desc'  => esc_html__('Enter contact e-mail', 'jevelin'),
	),

	'contact_location' => array(
		'type'  => 'text',
		'value' => 'Main street 12',
		'label' => esc_html__('Contact Location', 'jevelin'),
		'desc'  => esc_html__('Enter contact location', 'jevelin'),
	),

	'contact_workhours' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Contact Working hours', 'jevelin'),
		'desc'  => esc_html__('Enter working hours', 'jevelin'),
	),


	'title_header_animations' => array(
	    'type'  => 'html-full',
	    'label' => false,
	    'html'  => '
	    <h3 class="hndle sh-custom-group-divder">
	    	<span>'.esc_html__('Header Animations', 'jevelin').'</span>
	    </h3>',
	),

	'header_animation_dropdown_delay' => array(
	    'type'  => 'slider',
	    'value' => '1',
	    'label' => esc_html__('Header Dropdown Closing Delay', 'jevelin'),
	    'desc'  => esc_html__('Choose header dropdown closing delay speed (seconds)', 'jevelin'),
	    'properties' => array(
	        'min' => 0,
	        'max' => 4,
	        'step' => 0.1
	    ),
	    'inline' => false,
	),

	'header_animation_dropdown_speed' => array(
	    'type'  => 'slider',
	    'value' => '0.3',
	    'label' => esc_html__('Header Dropdown Opening Speed', 'jevelin'),
	    'desc'  => esc_html__('Choose header dropdown opening speed (seconds)', 'jevelin'),
	    'properties' => array(
	        'min' => 0,
	        'max' => 4,
	        'step' => 0.1
	    ),
	    'inline' => false,
	),

	'header_animation_dropdown' => array(
	    'type'  => 'radio',
	    'value' => 'easeOutQuint',
	    'label' => esc_html__('Header Dropdown Animation', 'jevelin'),
	    'desc'  => esc_html__('Choose dropdown animation', 'jevelin'),
	    'choices' => array(
	    	'linear' => esc_html__( 'Linear', 'jevelin' ),
	        'easeOutQuint' => esc_html__( 'Fast to slow', 'jevelin' ),
	        'easeInExpo' => esc_html__( 'Slow to fast', 'jevelin' ),
	        'easeInOutExpo' => esc_html__( 'Slow to fast (2)', 'jevelin' ),
	        'easeOutBounce' => esc_html__( 'Bounce', 'jevelin' ),
	    ),
	    'inline' => false,
	),


	'header_title1' => array( 'type'  => 'html-full', 'value' => '', 'label' => false, 'html'  =>
		'<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Header Responsive', 'jevelin').'</span></h3>',
	),

	'header_mobile_spacing' => array(
	    'type'  => 'radio',
	    'label' => esc_html__('Mobile Spacing', 'jevelin'),
	    'desc'  => esc_html__('Choose header mobile spacing', 'jevelin'),
	    'choices' => array(
	    	'default' => esc_html__( 'Default', 'jevelin' ),
	        'compact' => esc_html__( 'Compact', 'jevelin' ),
	    ),
	    'value' => 'compact',
	),
);


$options = array(
	'header' => array(
		'title'   => esc_html__( 'Header', 'jevelin' ),
		'type'    => 'tab',
		'icon'	  => 'fa fa-phone',
		'options' => array(
			'header-box' => array(
				'title'   => esc_html__( 'Header', 'jevelin' ),
				'type'    => 'box',
				'options' => $header_options
			),
		)
	)
);
