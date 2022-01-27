<?php
/*
** Layout
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'General', 'jevelin' ),
    'id'     => 'general',
    'icon'   => 'ti-crown',
    'fields' => array(

        array(
    		'id' => 'content_width',
    		'title' => esc_html__( 'Content Width', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose page content width', 'jevelin' ),
    		'min' => '1000',
    		'max' => '1600',
    		'type' => 'slider',
    		'default' => '1200',
    	),

        array(
    		'id' => 'global_page_layout',
    		'title' => esc_html__( 'Page Layout', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose default page layout', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'default' => esc_html__( 'Default (without sidebar)', 'jevelin' ),
    			'full' => esc_html__( 'Full Width', 'jevelin' ),
    			'sidebar-left' => esc_html__( 'Sidebar Left', 'jevelin' ),
    			'sidebar-right' => esc_html__( 'Sidebar Right', 'jevelin' ),
    		),
    		'default' => 'default',
    	),

        array(
    		'id' => 'page_layout',
    		'title' => esc_html__( 'Boxed Layout', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose main page layout. Boxed layout will not work together with left header', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'full' => esc_html__( 'Disabled', 'jevelin' ),
    			'boxed' => esc_html__( 'Enabled', 'jevelin' ),
    		),
            'default' => 'full',
    	),

            array(
        		'id' => 'boxed_border_style',
        		'title' => esc_html__( 'Border Style', 'jevelin' ),
        		'subtitle' => esc_html__( 'Choose content border style', 'jevelin' ),
        		'type' => 'radio',
        		'options' => array(
        			'none' => esc_html__( 'None', 'jevelin' ),
        			'shadow' => esc_html__( 'Shadow', 'jevelin' ),
        			'line' => esc_html__( 'Line', 'jevelin' ),
        		),
        		'default' => 'shadow',
                'required' => [ 'page_layout', '=', 'boxed' ],
        	),

        	array(
        		'id' => 'boxed_background_color',
        		'title' => esc_html__( 'Background Color', 'jevelin' ),
        		'subtitle' => esc_html__( 'Select background color', 'jevelin' ),
        		'type' => 'color',
        		'default' => [
                    'color' => '#fafafa'
                ],
                'required' => [ 'page_layout', '=', 'boxed' ],
        	),

        	array(
        		'id' => 'boxed_background_image',
        		'title' => esc_html__( 'Page Background Image', 'jevelin' ),
        		'subtitle' => esc_html__( 'Select page background image', 'jevelin' ),
        		'url' => '1',
        		'type' => 'media',
                'required' => [ 'page_layout', '=', 'boxed' ],
        	),

        array(
    		'id' => 'blog_style',
    		'title' => esc_html__( 'Jevelin Style', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose overall Jevelin style (will change some widget, post and other element style)', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'style1' => esc_html__( 'Style 1', 'jevelin' ),
    			'style2' => esc_html__( 'Style 2', 'jevelin' ),
                'style3' => esc_html__( 'Style 3', 'jevelin' ),
    		),
    		'default' => 'style2',
    	),

    	array(
    		'id' => 'wc_style',
    		'title' => esc_html__( 'WooCommerce Item Style', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose WooCommerce item style', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'style1' => esc_html__( 'Style 1', 'jevelin' ),
    			'style2' => esc_html__( 'Style 2', 'jevelin' ),
                'style3' => esc_html__( 'Style 3', 'jevelin' ),
    		),
    		'default' => 'style3',
    	),

    	array(
    		'id' => 'white_borders',
    		'title' => esc_html__( 'White Frame', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable white frame around the page', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
            'default' => '0',
    	),

    	array(
    		'id' => 'white_borders_only_on_pages',
    		'title' => esc_html__( 'White Frame Only in Pages', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable white frame only in pages', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
            'default' => '0',
    	),

    	array(
    		'id' => 'responsive_layout',
    		'title' => esc_html__( 'Responsive Layout', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable responsive layout for mobile devices', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'smooth-scrooling',
    		'title' => esc_html__( 'Smooth Scrolling', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable smooth scrolling for webkit browers like Chrome', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
            'default' => '0',
    	),

    	array(
    		'id' => 'back_to_top',
    		'title' => esc_html__( 'Back To Top Button', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose style for "Back to top" button or disable it', 'jevelin' ),
    		'type' => 'select',
    		'options' => array(
    			'disabled' => esc_html__( 'Disabled', 'jevelin' ),
    			'1' => esc_html__( 'Style 1', 'jevelin' ),
    			'1 filled' => esc_html__( 'Style 1 (filled)', 'jevelin' ),
    			'2' => esc_html__( 'Style 2', 'jevelin' ),
    			'2 filled' => esc_html__( 'Style 2 (filled)', 'jevelin' ),
    			'3' => esc_html__( 'Style 3', 'jevelin' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'back_to_top_rounded',
    		'title' => esc_html__( 'Back To Top Button Rounded', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable rounded corners for back to top button', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'rtl_support',
    		'title' => esc_html__( 'RTL Support', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable RTL (Right to Left) support', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '0',
    	),

    	array(
    		'id' => 'crispy_images',
    		'title' => esc_html__( 'Crispy Images', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable crispy images effect', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '0',
    	),

    	array(
    		'id' => 'page_comments',
    		'title' => esc_html__( 'Comments', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable post comments and page comments', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'page_comments_depth',
    		'title' => esc_html__( 'Comments Depth', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose comments max depth', 'jevelin' ),
    		'type' => 'select',
    		'options' => array(
    			'1' => esc_html__( '1 level', 'jevelin' ),
    			'2' => esc_html__( '2 levels', 'jevelin' ),
    			'3' => esc_html__( '3 levels', 'jevelin' ),
    			'4' => esc_html__( '4 levels', 'jevelin' ),
    			'5' => esc_html__( '5 levels', 'jevelin' ),
    		),
    		'default' => '5',
    	),

    	array(
    		'id' => 'one_pager',
    		'title' => esc_html__( 'One Page Navigation', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable one page navigation', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'one_pager_anchor_scroll_speed',
    		'title' => esc_html__( 'One Page Anchor Scroll Speed', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose the anchor scolling speed', 'jevelin' ),
    		'type' => 'select',
    		'options' => array(
				'2000' => esc_html__( 'Slower', 'jevelin' ),
				'1500' => esc_html__( 'Slow', 'jevelin' ),
				'1000' => esc_html__( 'Normal', 'jevelin' ),
				'500' => esc_html__( 'Fast', 'jevelin' ),
				'250' => esc_html__( 'Faster', 'jevelin' ),
				'1' => esc_html__( 'Instant', 'jevelin' ),
    		),
    		'default' => '1000',
    	),

    	array(
    		'id' => 'api_key',
    		'title' => esc_html__( 'Google Maps API Key', 'jevelin' ),
    		'subtitle' => esc_html__( 'Google Maps requires API Key to work correctly. Therefore please create an application in Google Console and add key here.</a>', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'theme_options_stored',
    		'title' => esc_html__( 'Themes Options Stored In', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose how theme options are stored', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'file' => esc_html__( 'Stored in CSS file (inside wp-content/uploads) - faster', 'jevelin' ),
    			'inline' => esc_html__( 'Generated on fly in HTML HEAD tag as dynamic CSS - slower', 'jevelin' ),
    		),
    		'default' => 'file',
    	),


    )
));




/*
** Styling
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Styling', 'jevelin' ),
    'id'     => 'styling',
    'icon'   => 'ti-palette',
    'fields' => array(

        array(
    		'id' => 'styling_body_background',
    		'title' => esc_html__( 'Body Background Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select body background color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#ffffff',
    	),

    	array(
    		'id' => 'styling_body',
    		'title' => esc_html__( 'Body Font', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose default body font settings', 'jevelin' ),
    		'type' => 'typography',
            'google'   => true,
    		'default' => array(
    			'font-family' => 'Montserrat',
    			'font-weight' => '400',
    			'font-size' => '14px',
    			'color' => '#8d8d8d',
    		),
            'text-align' => false,
            'letter-spacing' => true,
            'line-height' => true,
            'subsets' => false,
    	),

    	array(
    		'id' => 'google_fonts_subset',
    		'title' => esc_html__( 'Choose the character sets', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select the character sets you want to use for fonts (will be used only if available)', 'jevelin' ),
    		'type' => 'checkbox',
    		'options' => array(
    			'greek' => esc_html__( 'Greek ', 'jevelin' ),
    			'greek-ext' => esc_html__( 'Greek Extended', 'jevelin' ),
    			'latin' => esc_html__( 'Latin', 'jevelin' ),
    			'vietnamese' => esc_html__( 'Vietnamese', 'jevelin' ),
    			'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'jevelin' ),
    			'latin-ext' => esc_html__( 'Latin Extended', 'jevelin' ),
    			'cyrillic' => esc_html__( 'Cyrillic ', 'jevelin' ),
    		),
    		'default' => array(
    			'latin' => 1,
    		),
    	),

    	array(
    		'id' => 'google_fonts_mini',
    		'title' => esc_html__( 'Only main font weights', 'jevelin' ),
    		'subtitle' => esc_html__( 'Improve page speed by loading only main font weights', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '1',
    	),

	array(
		'id' => 'general_divider',
		'title' => '<h2>' . esc_html__( 'General', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'accent_color',
    		'title' => esc_html__( 'Accent Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select page accent color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#294cff',
    	),

    	array(
    		'id' => 'accent_hover_color',
    		'title' => esc_html__( 'Accent Hover Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select page accent color on hover', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#15bee4',
    	),

    	array(
    		'id' => 'link_color',
    		'title' => esc_html__( 'Link Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select page link color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#16acce',
    	),

    	array(
    		'id' => 'link_hover_color',
    		'title' => esc_html__( 'Link Hover Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select page link color on hover', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#10a0c0',
    	),

	array(
		'id' => 'headings_divider',
		'title' => '<h2>' . esc_html__( 'Headings', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'styling_headings',
    		'title' => esc_html__( 'Headings', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose default font settings for all headings', 'jevelin' ),
    		'type' => 'typography',
    		'default' => array(
    			'font-family' => 'Montserrat',
    			'font-weight' => '700',
    			'color' => '#3f3f3f',
    		),
            'font-size' => false,
            'text-align' => false,
            'letter-spacing' => false,
            'line-height' => false,
            'subsets' => false,
    	),

    	array(
    		'id' => 'styling_h1',
    		'title' => esc_html__( 'Heading 1', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select heading 1 font size (pixels)', 'jevelin' ),
    		'min' => '5',
    		'max' => '65',
    		'type' => 'slider',
    		'default' => '30',
    	),

    	array(
    		'id' => 'styling_h2',
    		'title' => esc_html__( 'Heading 2', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select heading 2 font size (pixels)', 'jevelin' ),
    		'min' => '5',
    		'max' => '65',
    		'type' => 'slider',
    		'default' => '24',
    	),

    	array(
    		'id' => 'styling_h3',
    		'title' => esc_html__( 'Heading 3', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select heading 3 font size (pixels)', 'jevelin' ),
    		'min' => '5',
    		'max' => '65',
    		'type' => 'slider',
    		'default' => '21',
    	),

    	array(
    		'id' => 'styling_h4',
    		'title' => esc_html__( 'Heading 4', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select heading 4 font size (pixels)', 'jevelin' ),
    		'min' => '5',
    		'max' => '65',
    		'type' => 'slider',
    		'default' => '18',
    	),

    	array(
    		'id' => 'styling_h5',
    		'title' => esc_html__( 'Heading 5', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select heading 5 font size (pixels)', 'jevelin' ),
    		'min' => '5',
    		'max' => '65',
    		'type' => 'slider',
    		'default' => '16',
    	),

    	array(
    		'id' => 'styling_h6',
    		'title' => esc_html__( 'Heading 6', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select heading 6 font size (pixels)', 'jevelin' ),
    		'min' => '5',
    		'max' => '65',
    		'type' => 'slider',
    		'default' => '14',
    	),

	array(
		'id' => 'header_divider',
		'title' => '<h2>' . esc_html__( 'Header', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'header_background_color',
    		'title' => esc_html__( 'Header Background Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select header background color', 'jevelin' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#ffffff'
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    	array(
    		'id' => 'header_background_image',
    		'title' => esc_html__( 'Header Background Image', 'jevelin' ),
    		'subtitle' => esc_html__( 'Upload a header background image. Note: Image will only appear when background color transparancy will be set', 'jevelin' ),
    		'url' => '1',
    		'type' => 'media',
    	),

    	array(
    		'id' => 'header_text_color',
    		'title' => esc_html__( 'Header Text Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select header text color', 'jevelin' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#8d8d8d'
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    	array(
    		'id' => 'header_border_color',
    		'title' => esc_html__( 'Header Border Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select header border color', 'jevelin' ),
            'type' => 'color_rgba',
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    	array(
    		'id' => 'header_top_background_color',
    		'title' => esc_html__( 'Top Bar Background Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select top bar background color', 'jevelin' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#294cff',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    	array(
    		'id' => 'header_top_color',
    		'title' => esc_html__( 'Top Bar Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select top bar color', 'jevelin' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#ffffff',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

        array(
    		'id' => 'header_light_text_color',
    		'title' => esc_html__( 'Light Header Text Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select light header text color', 'jevelin' ),
    		'type' => 'color',
    	),

        array(
    		'id' => 'header_light_text_active_color',
    		'title' => esc_html__( 'Light Header Text Active Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select light header text active color', 'jevelin' ),
    		'type' => 'color',
    	),

	array(
		'id' => 'navigation_divider',
		'title' => '<h2>' . esc_html__( 'Navigation', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'header_nav_font',
    		'title' => esc_html__( 'Font Famility', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select navigation font famility', 'jevelin' ),
    		'type' => 'select',
    		'options' => array(
    			'heading' => esc_html__( 'Heading', 'jevelin' ),
    			'body' => esc_html__( 'Body', 'jevelin' ),
    			'additional1' => esc_html__( 'Additional font 1', 'jevelin' ),
    			'additional2' => esc_html__( 'Additional font 2', 'jevelin' ),
    		),
    		'default' => 'body',
    	),

    	array(
    		'id' => 'header_nav_size',
    		'title' => esc_html__( 'Navigation Size', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your navigation size (with <b>px</b>)', 'jevelin' ),
    		'type' => 'text',
    		'default' => '14px',
    	),

    	array(
    		'id' => 'header_nav_color',
    		'title' => esc_html__( 'Navigation Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select navigation color', 'jevelin' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#3d3d3d',
                'alpha' => '0.69',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    	array(
    		'id' => 'header_nav_hover_color',
    		'title' => esc_html__( 'Navigation Hover Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select navigation color on hover', 'jevelin' ),
            'type' => 'color_rgba',
            'default' => [
                'color' =>  '#3d3d3d',
                'alpha' => '0.80',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    	array(
    		'id' => 'header_nav_active_color',
    		'title' => esc_html__( 'Active Navigation Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select active navigation color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#294cff',
    	),

    	array(
    		'id' => 'header_nav_active_background_color',
    		'title' => esc_html__( 'Active Navigation Background Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select active navigation background color (optional)', 'jevelin' ),
            'type' => 'color_rgba',
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

	array(
		'id' => 'dropdown / menu_divider',
		'title' => '<h2>' . esc_html__( 'Dropdown / Menu', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'menu_background_color',
    		'title' => esc_html__( 'Menu Background Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select background color', 'jevelin' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#232323',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    	array(
    		'id' => 'menu_title_color',
    		'title' => esc_html__( 'Menu Title Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select title color', 'jevelin' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'menu_link_color',
    		'title' => esc_html__( 'Menu Text Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select text color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#aaaaaa',
    	),

    	array(
    		'id' => 'menu_link_hover_color',
    		'title' => esc_html__( 'Menu Link Hover and Active Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select menu link hover and active color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#ffffff',
    	),

    	array(
    		'id' => 'menu_link_border_color',
    		'title' => esc_html__( 'Menu Link Border Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select menu link border color', 'jevelin' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#303030',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    	array(
    		'id' => 'menu_active_background1',
    		'title' => esc_html__( 'Menu Background Color 1', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select menu background color 1 (for dropdown style 2 only)', 'jevelin' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'menu_active_background2',
    		'title' => esc_html__( 'Menu Background Color 2', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select menu background color 2 to make gradient (for dropdown style 2 only)', 'jevelin' ),
    		'type' => 'color',
    	),

	array(
		'id' => 'content_divider',
		'title' => '<h2>' . esc_html__( 'Content', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'content_border',
    		'title' => esc_html__( 'Borders', 'jevelin' ),
    		'subtitle' => esc_html__( 'Will change borders in blog, portfolio and shop content pages', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#e5e5e5',
    	),

    	array(
    		'id' => 'content_button_background',
    		'title' => esc_html__( 'Buttons Background Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Will change different button background color in blog, portfolio and shop content pages', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#f2f2f2',
    	),

    	array(
    		'id' => 'content_button_background_hover',
    		'title' => esc_html__( 'Buttons Background Hover Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Will change different button background hover color in blog, portfolio and shop content pages', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#e5e5e5',
    	),

    	array(
    		'id' => 'content_button_text_color',
    		'title' => esc_html__( 'Buttons Text Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Will change different button text color in blog, portfolio and shop content pages', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#9a9a9a',
    	),

    	array(
    		'id' => 'content_input_background_color',
    		'title' => esc_html__( 'Input, Textarea Background Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Will change different input and textarea field background color in blog, portfolio and shop content pages', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#ffffff',
    	),

    	array(
    		'id' => 'content_input_border_color',
    		'title' => esc_html__( 'Input, Textarea Border Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Will change different input and textarea field border color in blog, portfolio and shop content pages', 'jevelin' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#e3e3e3'
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    	array(
    		'id' => 'content_input_text_color',
    		'title' => esc_html__( 'Input, Textarea Text Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Will change different input and textarea field border color in blog, portfolio and shop content pages', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#8d8d8d',
    	),

    	array(
    		'id' => 'content_search_background_color',
    		'title' => esc_html__( 'Search Widget Icon Background Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Will change search widget icon background color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#f0f0f0',
    	),

    	array(
    		'id' => 'content_search_text_color',
    		'title' => esc_html__( 'Search Widget Icon Text Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Will change search widget icon text color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#505050',
    	),

	array(
		'id' => 'sidebar_divider',
		'title' => '<h2>' . esc_html__( 'Sidebar', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'sidebar_headings',
    		'title' => esc_html__( 'Sidebar Headings', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose default sidebar heading font settings', 'jevelin' ),
    		'type' => 'typography',
    		'default' => array(
    			'font-size' => 20,
    			'color' => '#505050',
    		),
            'text-align' => false,
            'font-style' => false,
            'font-family' => false,
            'font-weight' => false,
            'letter-spacing' => false,
            'line-height' => false,
            'subsets' => false,
    	),

        array(
    		'id' => 'sidebar_font_weight',
    		'title' => esc_html__('Sidebar Font Weight', 'jevelin'),
    		'subtitle' => esc_html__('Choose sidebar font weight (depends on chosen font)', 'jevelin'),
    		'type' => 'radio',
    		'options' => array(
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
    		'default' => 'default',
    	),

    	array(
    		'id' => 'sidebar_border_color',
    		'title' => esc_html__( 'Sidebar Border Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select sidebar border color', 'jevelin' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#e3e3e3'
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

	array(
		'id' => 'footer styling_divider',
		'title' => '<h2>' . esc_html__( 'Footer Styling', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'footer_background_color',
    		'title' => esc_html__( 'Footer Background Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select footer background color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#262626',
    	),

    	array(
    		'id' => 'footer_background_image',
    		'title' => esc_html__( 'Footer Background Image', 'jevelin' ),
    		'subtitle' => esc_html__( 'Upload a footer background image. Note: Image will appear only when background color transparancy will be set', 'jevelin' ),
    		'url' => '1',
    		'type' => 'media',
    	),

    	array(
    		'id' => 'footer_headings',
    		'title' => esc_html__( 'Footer Headings', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose default footer heading font settings', 'jevelin' ),
    		'type' => 'typography',
    		'default' => array(
    			'font-size' => 20,
    			'color' => '#ffffff',
    		),
            'text-align' => false,
            'font-style' => false,
            'font-family' => false,
            'font-weight' => false,
            'letter-spacing' => false,
            'line-height' => false,
            'subsets' => false,
    	),

    	array(
    		'id' => 'footer_text_color',
    		'title' => esc_html__( 'Footer Text Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select footer text color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#e3e3e3',
    	),

    	array(
    		'id' => 'footer_link_color',
    		'title' => esc_html__( 'Footer Link Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select footer link color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#ffffff',
    	),

    	array(
    		'id' => 'footer_hover_color',
    		'title' => esc_html__( 'Footer Hover Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select footer color on hover', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#294cff',
    	),

    	array(
    		'id' => 'footer_icon_color',
    		'title' => esc_html__( 'Footer Icon Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select footer icon color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#f7f7f7',
    	),

    	array(
    		'id' => 'footer_border_color',
    		'title' => esc_html__( 'Footer Border Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select footer border color', 'jevelin' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#ffffff',
                'alpha' => '0.1',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

	array(
		'id' => 'copyright styling_divider',
		'title' => '<h2>' . esc_html__( 'Copyright Styling', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'copyright_background_color',
    		'title' => esc_html__( 'Copyright Background Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select copyright background color', 'jevelin' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#222222',
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    	array(
    		'id' => 'copyright_text_color',
    		'title' => esc_html__( 'Copyright Text Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select copyright text color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#ffffff',
    	),

    	array(
    		'id' => 'copyright_link_color',
    		'title' => esc_html__( 'Copyright Link Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select copyright link color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#ffffff',
    	),

    	array(
    		'id' => 'copyright_hover_color',
    		'title' => esc_html__( 'Copyright Link Hover Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select copyright link color on hover', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#c0e3eb',
    	),

    	array(
    		'id' => 'copyright_border_color',
    		'title' => esc_html__( 'Copyright Border Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select copyright border color', 'jevelin' ),
            'type' => 'color_rgba',
            'default' => [
                'color' => '#ffffff',
                'alpha' => '0.15'
            ],
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

	array(
		'id' => 'popover styling_divider',
		'title' => '<h2>' . esc_html__( 'Popover Styling', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'popover_wc',
    		'title' => esc_html__( 'Popover', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable popover for WooCommerce elements', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'popover_color',
    		'title' => esc_html__( 'Popover Background Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select popover background color. Leave empty for default accent color', 'jevelin' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'popover_font',
    		'title' => esc_html__( 'Popover Font Famility', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select popover font famility source', 'jevelin' ),
    		'type' => 'select',
    		'options' => array(
    			'heading' => esc_html__( 'Heading', 'jevelin' ),
    			'body' => esc_html__( 'Body', 'jevelin' ),
    			'additional1' => esc_html__( 'Additional font 1', 'jevelin' ),
    			'additional2' => esc_html__( 'Additional font 2', 'jevelin' ),
    		),
    		'default' => 'additional1',
    	),

	array(
		'id' => 'adittional fonts_divider',
		'title' => '<h2>' . esc_html__( 'Adittional Fonts', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'additional_font1',
    		'title' => esc_html__( 'Adittional Font 1', 'jevelin' ),
    		'subtitle' => esc_html__( 'Used adittional font for WoocCmmerce sale popover', 'jevelin' ),
    		'type' => 'typography',
    		'default' => array(
    			'font-family' => 'Raleway',
    			'font-weight' => '400',
    		),
            'text-align' => false,
            'letter-spacing' => false,
            'line-height' => false,
            'subsets' => false,
            'font-size' => false,
            'color' => false,
    	),

    	array(
    		'id' => 'additional_font2',
    		'title' => esc_html__( 'Adittional Font 2', 'jevelin' ),
    		'subtitle' => esc_html__( 'Used adittional font for heading and other shortcodes', 'jevelin' ),
    		'type' => 'typography',
    		'default' => array(
                'font-family' => 'Raleway',
    			'font-weight' => '400',
    		),
            'text-align' => false,
            'letter-spacing' => false,
            'line-height' => false,
            'subsets' => false,
            'font-size' => false,
            'color' => false,
    	),

    )
));




/*
** Header
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Header', 'jevelin' ),
    'id'     => 'header',
    'icon'   => 'ti-flag-alt-2',
    'fields' => array(

        array(
    		'id' => 'header_layout',
    		'title' => esc_html__( 'Header Template', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose header template', 'jevelin' ),
    		'type' => 'radio',
    		'options' => jevelin_get_headers(),
    		'default' => '1',
    	),

    	array(
    		'id' => 'header logos_divider',
    		'title' => '<h2>' . esc_html__( 'Header Logos', 'jevelin' ) . '</h2>',
    		'type' => 'raw',
    	),

    	array(
    		'id' => 'logo',
    		'title' => esc_html__( 'Standard Logo', 'jevelin' ),
    		'subtitle' => esc_html__( 'Upload a logo image (max height 250px) used in posts, portfolio and other pages', 'jevelin' ),
    		'url' => '1',
    		'type' => 'media',
    	),

    	array(
    		'id' => 'logo_light',
    		'title' => esc_html__( 'Light Logo Version (optional)', 'jevelin' ),
    		'subtitle' => esc_html__( 'Upload a light logo version (max height 250px) used only when light style is activated or is above slide', 'jevelin' ),
    		'url' => '1',
    		'type' => 'media',
    	),

    	array(
    		'id' => 'logo_sticky',
    		'title' => esc_html__( 'Sticky Logo (optional)', 'jevelin' ),
    		'subtitle' => esc_html__( 'Upload a sticky logo image (max height 250px) used only when sticky header is activated', 'jevelin' ),
    		'url' => '1',
    		'type' => 'media',
    	),

        array(
    		'id' => 'header_logo_sizes',
    		'title' => esc_html__( 'Logo Sizes', 'jevelin' ),
    		'subtitle' => esc_html__( 'Switch between orgianl and manual header logo sizing', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'orginal' => esc_html__( 'Orginal', 'jevelin' ),
    			'manual' => esc_html__( 'Manual', 'jevelin' ),
    		),
    		'default' => 'orginal',
    	),

        	array(
        		'id' => 'header_logo_sizes_standard_height',
        		'title' => esc_html__( 'Logo Height', 'jevelin' ),
        		'subtitle' => esc_html__( 'Choose header logo height size', 'jevelin' ),
        		'type' => 'text',
        		'default' => '40',
                'required' => [ 'header_logo_sizes', '=', 'manual' ],
        	),

        	array(
        		'id' => 'header_logo_sizes_sticky_height',
        		'title' => esc_html__( 'Sticky Logo Height', 'jevelin' ),
        		'subtitle' => esc_html__( 'Choose sticky logo height size', 'jevelin' ),
        		'type' => 'text',
        		'default' => '40',
                'required' => [ 'header_logo_sizes', '=', 'manual' ],
        	),

        	array(
        		'id' => 'header_logo_sizes_responsive_height',
        		'title' => esc_html__( 'Responsive Logo Height', 'jevelin' ),
        		'subtitle' => esc_html__( 'Choose responsive logo height size', 'jevelin' ),
        		'type' => 'text',
        		'default' => '40',
                'required' => [ 'header_logo_sizes', '=', 'manual' ],
        	),

    	array(
    		'id' => 'logo_status',
    		'title' => esc_html__( 'Logo Visibilty', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable header logo visibilty', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '1',
    	),

        array(
    		'id' => 'logo_title',
    		'title' => esc_html__( 'Title Logo', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable custom logo title', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'off',
    	),

        	array(
        		'id' => 'logo_title_value',
        		'title' => esc_html__( 'Logo Title Name', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enter your login title name', 'jevelin' ),
        		'type' => 'text',
                'required' => [ 'logo_title', '=', 'on' ],
        	),

        	array(
        		'id' => 'logo_both',
        		'title' => esc_html__( 'Logo Title Name With Logo Image', 'jevelin' ),
        		'subtitle' => esc_html__( 'Show both logo image and text', 'jevelin' ),
        		'type' => 'button_set',
        		'options' => array(
        			'off' => esc_html__( 'Off', 'jevelin' ),
        			'on' => esc_html__( 'On', 'jevelin' ),
        		),
        		'default' => 'off',
                'required' => [ 'logo_title', '=', 'on' ],
        	),

	array(
		'id' => 'header settings_divider',
		'title' => '<h2>' . esc_html__( 'Header Settings', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'header_mega_style',
    		'title' => esc_html__( 'Dropdown Style', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose header dropdown style', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'style1' => esc_html__( 'Style 1', 'jevelin' ),
    			'style2' => esc_html__( 'Style 2 (with shadow)', 'jevelin' ),
    		),
    		'default' => 'style1',
    	),

    	array(
    		'id' => 'ipad_landscape_full_navigation',
    		'title' => esc_html__( 'iPad landscape navigation', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable iPad landscape to use desktop navigation (expermetal feature)', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
            'default' => '0',
    	),

    	array(
    		'id' => 'header_width',
    		'title' => esc_html__( 'Header Width', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select header width', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'default' => esc_html__( 'Default', 'jevelin' ),
    			'full' => esc_html__( 'Full', 'jevelin' ),
    		),
    		'default' => 'default',
    	),

    	array(
    		'id' => 'header_sticky',
    		'title' => esc_html__( 'Sticky Header', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable sticky header', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'header_mobile_sticky',
    		'title' => esc_html__( 'Sticky Mobile Header', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable sticky mobile header', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '0',
    	),

    	array(
    		'id' => 'header_elements',
    		'title' => esc_html__( 'Header Elements', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select header elements you want to see', 'jevelin' ),
    		'type' => 'checkbox',
    		'options' => array(
    			'social' => esc_html__( 'Social Media', 'jevelin' ),
    			'social_mobile' => esc_html__( 'Social Media (mobile)', 'jevelin' ),
    			'search' => esc_html__( 'Search', 'jevelin' ),
    			'woo_cart' => esc_html__( 'WooCommerce Cart', 'jevelin' ),
    			'woo_account' => esc_html__( 'WooCommerce Account', 'jevelin' ),
    		),
    		'default' => array(
    			'social' => 1,
    			'social_mobile' => 1,
    			'search' => 1,
    			'woo_cart' => 1,
    			'woo_account' => '',
    		),
    	),

    	array(
    		'id' => 'header_search_style',
    		'title' => esc_html__( 'Header Search Style', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose header search style', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'style1' => esc_html__( 'Style 1', 'jevelin' ),
    			'style2' => esc_html__( 'Style 2', 'jevelin' ),
    		),
    		'default' => 'style1',
    	),

    	array(
    		'id' => 'header_uppercase',
    		'title' => esc_html__( 'Navigation Uppercase', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable uppercase navigation text transformation', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
            'default' => '0',
    	),

    	array(
    		'id' => 'header_icons',
    		'title' => esc_html__( 'Icons Size', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose icons size', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'small' => esc_html__( 'Small', 'jevelin' ),
    			'large' => esc_html__( 'Large', 'jevelin' ),
    		),
    		'default' => 'large',
    	),

    	array(
    		'id' => 'header_search_results',
    		'title' => esc_html__( 'Header Search Results', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose Header Search Results', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'posts' => esc_html__( 'Blog posts and pages', 'jevelin' ),
    			'onlyposts' => esc_html__( 'Blog posts only', 'jevelin' ),
    			'products' => esc_html__( 'Products', 'jevelin' ),
    			'adaptive' => esc_html__( 'Adaptive', 'jevelin' ),
    		),
    		'default' => 'posts',
    	),

    	array(
    		'id' => 'header_menu_icon',
    		'title' => esc_html__( 'Header Menu Icon', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose Header Search Results', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'hamburger' => esc_html__( 'Hamburger', 'jevelin' ),
    			'dots' => esc_html__( 'Dots grid', 'jevelin' ),
    		),
    		'default' => 'hamburger',
    	),

    	array(
    		'id' => 'header language settings_divider',
    		'title' => '<h2>' . esc_html__( 'Header Language Settings', 'jevelin' ) . '</h2>',
    		'type' => 'raw',
    	),

    	array(
    		'id' => 'header_lang',
    		'title' => esc_html__( 'Header Language Dropdown', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose language dropdown plugin', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'wpml' => esc_html__( 'WPML integration', 'jevelin' ),
    			'polylang' => esc_html__( 'Polylang integration', 'jevelin' ),
    		),
    		'default' => 'off',
    	),

    	array(
    		'id' => 'top bar settings_divider',
    		'title' => '<h2>' . esc_html__( 'Top Bar Settings', 'jevelin' ) . '</h2>',
    		'type' => 'raw',
    	),

    	array(
    		'id' => 'topbar_status',
    		'title' => esc_html__( 'Topbar', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable header topbar', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'contact_phone',
    		'title' => esc_html__( 'Contact Phone', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter contact phone', 'jevelin' ),
    		'type' => 'text',
    		'default' => '+123 456 678 890',
    	),

    	array(
    		'id' => 'contact_email',
    		'title' => esc_html__( 'Contact E-mail', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter contact e-mail', 'jevelin' ),
    		'type' => 'text',
    		'default' => 'info@mysite.com',
    	),

    	array(
    		'id' => 'contact_location',
    		'title' => esc_html__( 'Contact Location', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter contact location', 'jevelin' ),
    		'type' => 'text',
    		'default' => 'Main street 12',
    	),

    	array(
    		'id' => 'contact_workhours',
    		'title' => esc_html__( 'Contact Working hours', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter working hours', 'jevelin' ),
    		'type' => 'text',
    	),

	array(
		'id' => 'header_animations_divider',
		'title' => '<h2>' . esc_html__( 'Header Animations', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'header_animation_dropdown_delay',
    		'title' => esc_html__( 'Header Dropdown Closing Delay', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose header dropdown closing delay speed (seconds)', 'jevelin' ),
    		'max' => '4',
    		'step' => '0.1',
    		'resolution' => '0.1',
    		'type' => 'text',
    		'default' => '1',
    	),

    	array(
    		'id' => 'header_animation_dropdown_speed',
    		'title' => esc_html__( 'Header Dropdown Opening Speed', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose header dropdown opening speed (seconds)', 'jevelin' ),
    		'max' => '4',
    		'step' => '0.1',
    		'resolution' => '0.1',
    		'type' => 'text',
    		'default' => '0.3',
    	),

    	array(
    		'id' => 'header_animation_dropdown',
    		'title' => esc_html__( 'Header Dropdown Animation', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose dropdown animation', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'linear' => esc_html__( 'Linear', 'jevelin' ),
    			'easeOutQuint' => esc_html__( 'Fast to slow', 'jevelin' ),
    			'easeInExpo' => esc_html__( 'Slow to fast', 'jevelin' ),
    			'easeInOutExpo' => esc_html__( 'Slow to fast (2)', 'jevelin' ),
    			'easeOutBounce' => esc_html__( 'Bounce', 'jevelin' ),
    		),
    		'default' => 'easeOutQuint',
    	),

	array(
		'id' => 'header responsive_divider',
		'title' => '<h2>' . esc_html__( 'Header Responsive', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'header_mobile_spacing',
    		'title' => esc_html__( 'Mobile Spacing', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose header mobile spacing', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'default' => esc_html__( 'Default', 'jevelin' ),
    			'compact' => esc_html__( 'Compact', 'jevelin' ),
    		),
    		'default' => 'compact',
    	),

    )
));




/*
** Titlebar
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Titlebar', 'jevelin' ),
    'id'     => 'titlebar',
    'icon'   => 'ti-layout-list-thumb',
    'fields' => array(

        array(
    		'id' => 'titlebar',
    		'title' => esc_html__( 'Titlebar', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable titlebar', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'titlebar_layout',
    		'title' => esc_html__( 'Titlebar Layout', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose titlebar layout', 'jevelin' ),
    		'type' => 'radio',
    		'options' => jevelin_get_titlebars(),
    		'default' => 'side',
    	),

    	array(
    		'id' => 'titlebar_height',
    		'title' => esc_html__( 'Titlebar Height', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose titlebar height', 'jevelin' ),
    		'type' => 'select',
    		'options' => array(
    			'small' => esc_html__( 'Small', 'jevelin' ),
    			'medium' => esc_html__( 'Medium', 'jevelin' ),
    			'large' => esc_html__( 'Large', 'jevelin' ),
    		),
    		'default' => 'medium',
    	),

    	array(
    		'id' => 'titlebar_background',
    		'title' => esc_html__( 'Titlebar Background Image', 'jevelin' ),
    		'subtitle' => esc_html__( 'Upload a background image for titlebar', 'jevelin' ),
    		'url' => '1',
    		'type' => 'media',
    	),

    	array(
    		'id' => 'titlebar_background_parallax',
    		'title' => esc_html__( 'Parallax Background', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable parallax background', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'off',
    	),

    	array(
    		'id' => 'titlebar-background-color',
    		'title' => esc_html__( 'Titlebar Background Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select titlebar background color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#fbfbfb',
    	),

    	array(
    		'id' => 'titlebar-title-color',
    		'title' => esc_html__( 'Titlebar Title Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select titlebar title color', 'jevelin' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'titlebar-breadcrumbs-color',
    		'title' => esc_html__( 'Titlebar Breadcrumbs Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select titlebar breadcrumbs color', 'jevelin' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'titlebar-headings-seo',
    		'title' => esc_html__( 'Titlebar Headings', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose titlebar headings for seo purposes', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'h1' => esc_html__( 'H1', 'jevelin' ),
    			'h2' => esc_html__( 'H2', 'jevelin' ),
    		),
    		'default' => 'h2',
    	),

    	array(
    		'id' => 'titlebar-home-title',
    		'title' => esc_html__( 'Home Title', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter main title of home page', 'jevelin' ),
    		'type' => 'text',
    		'default' => 'Home',
    	),

    	array(
    		'id' => 'titlebar-post-title',
    		'title' => esc_html__( 'Post Title', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter main title of post pages', 'jevelin' ),
    		'type' => 'text',
    		'default' => 'Blog Post',
    	),

    	array(
    		'id' => 'titlebar-portfolio-title',
    		'title' => esc_html__( 'Portfolio Title', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter main title of Portfolio pages', 'jevelin' ),
    		'type' => 'text',
    		'default' => 'Portfolio',
    	),

    	array(
    		'id' => 'titlebar-blog-woocommerce',
    		'title' => esc_html__( 'WooCommerce Title', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter main title of WooCommerce pages', 'jevelin' ),
    		'type' => 'text',
    		'default' => 'Shop',
    	),

    	array(
    		'id' => 'titlebar-404-title',
    		'title' => esc_html__( '404 Title', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter main title of 404 page', 'jevelin' ),
    		'type' => 'text',
    		'default' => 'Page could not be found',
    	),

    	array(
    		'id' => 'titlebar responsive_divider',
    		'title' => '<h2>' . esc_html__( 'Titlebar Responsive', 'jevelin' ) . '</h2>',
    		'type' => 'raw',
    	),

    	array(
    		'id' => 'titlebar_mobile_spacing',
    		'title' => esc_html__( 'Mobile Spacing', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose titlebar mobile spacing', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'default' => esc_html__( 'Default', 'jevelin' ),
    			'compact' => esc_html__( 'Compact', 'jevelin' ),
    		),
    		'default' => 'compact',
    	),

    	array(
    		'id' => 'titlebar_mobile_title',
    		'title' => esc_html__( 'Mobile Layout Main Title', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable main title', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'on',
    	),

    )
));





/*
** Footer
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Footer', 'jevelin' ),
    'id'     => 'footer',
    'icon'   => 'ti-anchor',
    'fields' => array(

        array(
    		'id' => 'footer_template',
    		'title' => esc_html__( 'Footer Template', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select footer template', 'jevelin' ),
    		'type' => 'radio',
    		'options' => jevelin_get_footers(),
    		'default' => 'default',
    	),

	array(
		'id' => 'footer settings_divider',
		'title' => '<h2>' . esc_html__( 'Footer Settings', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'footer_widgets',
    		'title' => esc_html__( 'Footer Widgets', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable footer widgets', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'footer_width',
    		'title' => esc_html__( 'Footer Width', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select footer width', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'default' => esc_html__( 'Default', 'jevelin' ),
    			'full' => esc_html__( 'Full', 'jevelin' ),
    		),
    		'default' => 'default',
    	),

    	array(
    		'id' => 'footer_columns',
    		'title' => esc_html__( 'Footer Columns', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select footer column count', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'1' => esc_html__( '1 Columns', 'jevelin' ),
    			'2' => esc_html__( '2 Columns', 'jevelin' ),
    			'3' => esc_html__( '3 Columns', 'jevelin' ),
    			'4' => esc_html__( '4 Columns', 'jevelin' ),
    			'5' => esc_html__( '5 Columns', 'jevelin' ),
    		),
    		'default' => '4',
    	),

    	array(
    		'id' => 'footer_parallax',
    		'title' => esc_html__( 'Footer Parallax', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable whole footer to act as an parallax element', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'off',
    	),

	array(
		'id' => 'footer copyright settings_divider',
		'title' => '<h2>' . esc_html__( 'Footer Copyright Settings', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'copyright_bar',
    		'title' => esc_html__( 'Copyright Bar', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable copyright bar', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'on',
    	),

        array(
    		'id' => 'copyright_style',
    		'title' => esc_html__( 'Copyright Style', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose main style for copyrights', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'style1' => esc_html__( 'Style 1', 'jevelin' ),
    			'style2' => esc_html__( 'Style 2 (logo and copyright left, social icons right)', 'jevelin' ),
    			'style3' => esc_html__( 'Style 3 (logo left, copyrights center, social icons rights)', 'jevelin' ),
    		),
            'default' => 'style1',
    	),

        	array(
        		'id' => 'copyright_style_social',
        		'title' => esc_html__( 'Social Icons', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enable or disable social icons', 'jevelin' ),
        		'type' => 'button_set',
        		'options' => array(
        			'off' => 'Off',
        			'on' => esc_html__( 'On', 'jevelin' ),
        		),
        		'default' => 'on',
                'required' => [
                    'style', '=', 'style1',
                    'style', '=', 'style3'
                ],
        	),


    	array(
    		'id' => 'copyright_padding',
    		'title' => esc_html__( 'Padding', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter custom footer widgets padding (default: 0px 0px 0px 0px)', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'copyright_logo',
    		'title' => esc_html__( 'Footer Logo', 'jevelin' ),
    		'subtitle' => esc_html__( 'Upload a footer logo image', 'jevelin' ),
    		'url' => '1',
    		'type' => 'media',
    	),

    	array(
    		'id' => 'copyright_text',
    		'title' => esc_html__( 'Copyright Text', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter some description about copyright in your website', 'jevelin' ),
    		'type' => 'editor',
    		'size' => 'large',
    		'editor_height' => '110',
            'args' => [
                'teeny' => false,
            ]
    	),

    	array(
    		'id' => 'copyright_text_multi_lines',
    		'title' => esc_html__( 'Copyright Text in Multiple Lines', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable copyright text in multiple lines', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'off',
    	),

    	array(
    		'id' => 'copyright_deveveloper',
    		'title' => esc_html__( 'Developer Copyrights', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable theme developer copyrights', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'copyright_deveveloper_all',
    		'title' => esc_html__( 'Invisible Developer Copyrights', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable invisible developer copyrights. Say thanks by leaving invisible developer copyrights on', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '1',
    	),

    )
));




/*
** Social Media Icons
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Social Media Icons', 'jevelin' ),
    'id'     => 'social-media',
    'icon'   => 'ti-facebook',
    'fields' => array(

        array(
    		'id' => 'social_newtab',
    		'title' => esc_html__( 'Links In New Tab', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable social media link opening in new tab', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'social_twitter',
    		'title' => esc_html__( 'Twitter URL', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Twitter icon. Leave blank to hide this icon', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_facebook',
    		'title' => esc_html__( 'Facebok URL', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Facebook icon. Leave blank to hide this icon', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_instagram',
    		'title' => esc_html__( 'Instagram URL', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Instagram icon. Leave blank to hide this icon', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_youtube',
    		'title' => esc_html__( 'Youtube URL', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Yotube icon. Leave blank to hide this icon', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_pinterest',
    		'title' => esc_html__( 'Pinterest URL', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Pinterest icon. Leave blank to hide this icon', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_flickr',
    		'title' => esc_html__( 'Flickr URL', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Flickr icon. Leave blank to hide this icon', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_dribbble',
    		'title' => esc_html__( 'Dribbble URL', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Dribbble icon. Leave blank to hide this icon', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_linkedIn',
    		'title' => esc_html__( 'LinkedIn URL', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the LinkedIn icon. Leave blank to hide this icon', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_skype',
    		'title' => esc_html__( 'Skype Nick', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your account name to show the Skype icon. Leave blank to hide this icon', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_snapchat',
    		'title' => esc_html__( 'Snapchat URL', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Snapchat icon. Leave blank to hide this icon', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_spotify',
    		'title' => esc_html__( 'Spotify', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your account name to show the Spotify icon. Leave blank to hide this icon', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_soundcloud',
    		'title' => esc_html__( 'Soundcloud', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your account name to show the Soundcloud icon. Leave blank to hide this icon', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_reddit',
    		'title' => esc_html__( 'Reddit URL', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Reddit icon. Leave blank to hide this icon', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_tumblr',
    		'title' => esc_html__( 'Tumblr URL', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Tumblr icon. Leave blank to hide this icon', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'social_wordpress',
    		'title' => esc_html__( 'Wordpress URL', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your custom link to show the Wordpress icon. Leave blank to hide this icon', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
            'id'          => 'social_custom',
            'type'        => 'slides',
            'title'       => __( 'Custom Social Media', 'jevelin'),
            'subtitle'    => __( 'Add custom icons not included in upper list for other social media links', 'jevelin'),
            'content_title' => 'Item',
            'show'        => array(
                'title' => true,
                'description' => false,
                'url' => true
            ),
            'placeholder' => array(
                'title'       => __( 'Choose your media icon', 'jevelin' ),
                'url'         => __( 'Enter your custom link to show the icon', 'jevelin' ),
            ),
        ),

    )
));




/*
** Blog
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Blog', 'jevelin' ),
    'id'     => 'blog',
    'icon'   => 'ti-pencil-alt',
    'fields' => array(

    	array(
    		'id' => 'pagination',
    		'title' => esc_html__( 'Pagination', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable pagination', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'blog-items',
    		'title' => esc_html__( 'Blog Posts Per Page', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose how many posts will be disaplayed per page', 'jevelin' ),
    		'min' => '1',
    		'max' => '30',
    		'type' => 'slider',
    		'default' => '12',
    	),

    	array(
    		'id' => 'blog_round_images',
    		'title' => esc_html__( 'Round Images', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable round images for blog posts', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'off',
    	),

	array(
		'id' => 'post settings_divider',
		'title' => '<h2>' . esc_html__( 'Post Settings', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'post_layout',
    		'title' => esc_html__( 'Post Template', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose post template', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'default' => esc_html__( 'Default', 'jevelin' ),
    			'sidebar-left' => esc_html__( 'Sidebar Left', 'jevelin' ),
    			'sidebar-right' => esc_html__( 'Sidebar Right', 'jevelin' ),
    		),
    		'default' => 'sidebar-right',
    	),

    	array(
    		'id' => 'post_overlay',
    		'title' => esc_html__( 'Post Overlay', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose post overlay style', 'jevelin' ),
    		'type' => 'select',
    		'options' => array(
    			'style1' => esc_html__( 'Style 1', 'jevelin' ),
    			'style2' => esc_html__( 'Style 2', 'jevelin' ),
    			'style3' => esc_html__( 'Style 3', 'jevelin' ),
    		),
    		'default' => 'style1',
    	),

    	array(
    		'id' => 'post_elements',
    		'title' => esc_html__( 'Post Elements', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select post elements you want to see in blog', 'jevelin' ),
    		'type' => 'checkbox',
    		'options' => array(
    			'date' => esc_html__( 'Date', 'jevelin' ),
    			'share' => esc_html__( 'Share', 'jevelin' ),
    			'prev_next' => esc_html__( 'Prev/next links', 'jevelin' ),
    			'athor_box' => esc_html__( 'Author additional information box', 'jevelin' ),
    			'related_posts' => esc_html__( 'Related posts', 'jevelin' ),
    			'comments' => esc_html__( 'Comments', 'jevelin' ),
    		),
    		'default' => array(
    			'date' => 1,
    			'prev_next' => 1,
    			'athor_box' => 1,
    			'share' => 1,
    			'related_posts' => 1,
    			'comments' => 1,
    		),
    	),

    	array(
    		'id' => 'post_related_posts',
    		'title' => esc_html__( 'Related Posts', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable related posts', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'post_main_image_lightbiox',
    		'title' => esc_html__( 'Post Featured Image Lightbox', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable single blog post featured image lightbox', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'post_desc',
    		'title' => esc_html__( 'Description Length (words)', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose post description preview length', 'jevelin' ),
    		'min' => '10',
    		'max' => '250',
    		'type' => 'slider',
    		'default' => '45',
    	),

    )
));





/*
** AMP
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'AMP', 'jevelin' ),
    'id'     => 'amp',
    'icon'   => 'ti-bolt',
    'fields' => array(

        array(
    		'id' => 'amp_post_accent_color',
    		'title' => esc_html__( 'Accent Color', 'jevelin' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'amp_post_content_color',
    		'title' => esc_html__( 'Content Color', 'jevelin' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'amp_post_heading_color',
    		'title' => esc_html__( 'Heading Color', 'jevelin' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'amp_post_content_size',
    		'title' => esc_html__( 'Post Content Size', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter post content size with PX', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'amp_logo_size_desktop',
    		'title' => esc_html__( 'Logo Size (desktop)', 'jevelin' ),
    		'min' => '1',
    		'max' => '100',
    		'type' => 'slider',
    		'default' => '40',
    	),

    	array(
    		'id' => 'amp_logo_size_mobile',
    		'title' => esc_html__( 'Logo Size (mobile)', 'jevelin' ),
    		'min' => '1',
    		'max' => '100',
    		'type' => 'slider',
    		'default' => '22',
    	),

        array(
    		'id' => 'amp_mode',
    		'title' => esc_html__( 'AMP Mode', 'jevelin' ),
    		'subtitle' => esc_html__( 'Advanced: Set to all modes if Standard or Transitional template mode is needed', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
                'optimised' => esc_html__( 'Optimized mode only', 'jevelin' ),
    			'all' => esc_html__( 'All modes', 'jevelin' ),
    			'disabled' => esc_html__( 'Disable all Gillion optimizations (not recommended)', 'jevelin' ),
    		),
    		'default' => 'optimised',
    	),

    )
));




/*
** Portfolio
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Portfolio', 'jevelin' ),
    'id'     => 'portfolio',
    'icon'   => 'ti-layout-grid2',
    'fields' => array(

        array(
    		'id' => 'portfolio_main_page',
    		'title' => esc_html__( 'Portfolio Main Page ID', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter portfolio main page ID, useful to change default portfolio breadcrumbs page', 'jevelin' ),
    		'type' => 'text',
    	),

	array(
		'id' => 'portfolio single page_divider',
		'title' => '<h2>' . esc_html__( 'Portfolio Single Page', 'jevelin' ) . '</h2>',
		'type' => 'raw',
	),

    	array(
    		'id' => 'portfolio_single_page_layout',
    		'title' => esc_html__( 'Layout', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose portfolio single page layout', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'default' => esc_html__( 'Default', 'jevelin' ),
    			'full' => esc_html__( 'Full Width', 'jevelin' ),
    		),
            'default' => 'default',
    	),

    	array(
    		'id' => 'portfolio_related',
    		'title' => esc_html__( 'Related items', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable "Related items" in single portfolio page', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'portfolio_comments',
    		'title' => esc_html__( 'Portfolio Comments', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable comments in single portfolio page', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
            'default' => '0',
    	),

    	array(
    		'id' => 'portfolio_share',
    		'title' => esc_html__( 'Social Share', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable social share buttons in single portfolio page', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'portfolio_single_image',
    		'title' => esc_html__( 'Image Size', 'jevelin' ),
    		'subtitle' => esc_html__( 'Use full size image, if image quality is lower than expected.', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'large' => esc_html__( 'Large', 'jevelin' ),
    			'full' => esc_html__( 'Full', 'jevelin' ),
    		),
    		'default' => 'large',
    	),

    	array(
    		'id' => 'portfolio_gallery_autoplay',
    		'title' => esc_html__( 'Gallery Autoplay', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable gallery autoplay in single portfolio page', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'off',
    	),

    	array(
    		'id' => 'portfolio archive settings_divider',
    		'title' => '<h2>' . esc_html__( 'Portfolio Archive Settings', 'jevelin' ) . '</h2>',
    		'type' => 'raw',
    	),

    	array(
    		'id' => 'portfolio_archive_layout',
    		'title' => esc_html__( 'Portfolio Archive Layout', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose portfolio archive layout', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'default' => esc_html__( 'Default', 'jevelin' ),
    			'sidebar-left' => esc_html__( 'Sidebar Left', 'jevelin' ),
    			'sidebar-right' => esc_html__( 'Sidebar Right', 'jevelin' ),
    		),
    		'default' => 'default',
    	),

    	array(
    		'id' => 'portfolio_archive_columns',
    		'title' => esc_html__( 'Portfolio Archive Columns', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose portfolio archive column item count', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'2' => esc_html__( '2 columns', 'jevelin' ),
    			'3' => esc_html__( '3 columns', 'jevelin' ),
    			'4' => esc_html__( '4 columns', 'jevelin' ),
    		),
    		'default' => '3',
    	),

    	array(
    		'id' => 'portfolio_archive_per_page',
    		'title' => esc_html__( 'Portfolio Archive Items Per Page', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose portfolio archive items per page', 'jevelin' ),
    		'type' => 'select',
    		'options' => array(
    			'-1' => esc_html__( 'Show All items', 'jevelin' ),
    			'1' => esc_html__( '1 item', 'jevelin' ),
    			'2' => esc_html__( '2 items', 'jevelin' ),
    			'3' => esc_html__( '3 items', 'jevelin' ),
    			'4' => esc_html__( '4 Items', 'jevelin' ),
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
    		'default' => '12',
    	),

    	array(
    		'id' => 'portfolio_gallery_columns',
    		'title' => esc_html__( 'Portfolio Project Gallery Columns', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose portfolio project columns for gallery layout', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'columns3' => esc_html__( 'Columns 3', 'jevelin' ),
    			'columns4' => esc_html__( 'Columns 4', 'jevelin' ),
    			'columns5' => esc_html__( 'Columns 5', 'jevelin' ),
    		),
    		'default' => 'columns3',
    	),

    	array(
    		'id' => 'portfolio_gallery_slider',
    		'title' => esc_html__( 'Portfolio Project Gallery Slider', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable portfolio project gallery slider', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'off',
    	),

    	array(
    		'id' => 'portfolio_padding',
    		'title' => esc_html__( 'Portfolio Single Page Content Padding', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter custom portfolio single plage default content padding (default: 60px 0px 60px 0px)', 'jevelin' ),
    		'type' => 'text',
    	),

    )
));




/*
** Lightbox
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Lightbox', 'jevelin' ),
    'id'     => 'lightbox',
    'icon'   => 'ti-gallery',
    'fields' => array(

        array(
    		'id' => 'lightbox_transition',
    		'title' => esc_html__( 'Transition', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose lightbox transition', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'none' => esc_html__( 'None', 'jevelin' ),
    			'elastic' => esc_html__( 'Elastic', 'jevelin' ),
    			'fade' => esc_html__( 'Fade', 'jevelin' ),
    			'fadeInline' => esc_html__( 'Fade Inline', 'jevelin' ),
    		),
    		'default' => 'elastic',
    	),

    	array(
    		'id' => 'lightbox_opacity',
    		'title' => esc_html__( 'Background Opacity', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose lightbox background opacity', 'jevelin' ),
    		'min' => '1',
    		'max' => '100',
    		'type' => 'slider',
    		'default' => '88',
    	),

    	array(
    		'id' => 'lightbox_window_max_width',
    		'title' => esc_html__( 'Window Max Width', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter window max width', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'lightbox_window_max_height',
    		'title' => esc_html__( 'Window Max Height', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter window max height', 'jevelin' ),
    		'type' => 'text',
    	),

    	array(
    		'id' => 'lightbox_window_size',
    		'title' => esc_html__( 'Windows Size in Percentage', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter window size 10-100, default is 80', 'jevelin' ),
    		'type' => 'text',
    		'default' => '80',
    	),

    )
));



/*
** Carousel
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Carousel', 'jevelin' ),
    'id'     => 'carousel',
    'icon'   => 'ti-layout-column3',
    'fields' => array(

        array(
    		'id' => 'carousel_dots_style',
    		'title' => esc_html__( 'Dots Style', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'style1' => esc_html__( 'Standard - Large active (width shadow) and smaller other dots with background color', 'jevelin' ),
    			'style2' => esc_html__( 'Standard - Equal size dots with background color', 'jevelin' ),
    			'style3' => esc_html__( 'Modern - Equal size dots with background color for active and border only for other dots', 'jevelin' ),
    		),
    		'default' => 'style1',
    	),

    	array(
    		'id' => 'carousel_dots_spacing',
    		'title' => esc_html__( 'Dots Spacing', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'3px' => esc_html__( '3px', 'jevelin' ),
    			'5px' => esc_html__( '5px', 'jevelin' ),
    			'8px' => esc_html__( '8px', 'jevelin' ),
    			'10px' => esc_html__( '10px', 'jevelin' ),
    			'12px' => esc_html__( '12px', 'jevelin' ),
    			'15px' => esc_html__( '15px', 'jevelin' ),
    		),
    		'default' => '5px',
    	),

    	array(
    		'id' => 'carousel_dots_top_margin',
    		'title' => esc_html__( 'Dots Additional Top Margin', 'jevelin' ),
    		'type' => 'select',
    		'options' => array(
    			'0px' => esc_html__( '0px', 'jevelin' ),
    			'3px' => esc_html__( '3px', 'jevelin' ),
    			'5px' => esc_html__( '5px', 'jevelin' ),
    			'8px' => esc_html__( '8px', 'jevelin' ),
    			'10px' => esc_html__( '10px', 'jevelin' ),
    			'12px' => esc_html__( '12px', 'jevelin' ),
    			'15px' => esc_html__( '15px', 'jevelin' ),
    		),
    		'default' => '0px',
    	),

    	array(
    		'id' => 'carousel_dots_size',
    		'title' => esc_html__( 'Dots Size', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'small' => esc_html__( 'Small', 'jevelin' ),
    			'standard' => esc_html__( 'Standard', 'jevelin' ),
    		),
    		'default' => 'standard',
    	),

    	array(
    		'id' => 'carousel_dots_background_color',
    		'title' => esc_html__( 'Dot Background Color', 'jevelin' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'carousel_dots_border_color',
    		'title' => esc_html__( 'Dot Border Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Changes dot border color if this style uses border', 'jevelin' ),
            'type' => 'color_rgba',
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    	array(
    		'id' => 'carousel_dots_active_background_color',
    		'title' => esc_html__( 'Active Dot Background Color', 'jevelin' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'carousel_dots_active_border_color',
    		'title' => esc_html__( 'Active Dot Border Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Changes dot border color if this style uses border', 'jevelin' ),
            'type' => 'color_rgba',
            'options' => [
                'clickout_fires_change' => true,
                'show_buttons' => false,
            ],
    	),

    )
));




/*
** WooCommerce
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'WooCommerce', 'jevelin' ),
    'id'     => 'woocommerce',
    'icon'   => 'ti-shopping-cart-full',
    'fields' => array(

        array(
    		'id' => 'wc_sort',
    		'title' => esc_html__( 'WooCommerce Sort', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable WooCommerce product sorting dropdown', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => 'wc_sort_sale',
    		'title' => esc_html__( 'WooCommerce Sort by Sale', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable opaction to sort by sale', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'off',
    	),

    	array(
    		'id' => 'wc_lightbox',
    		'title' => esc_html__( 'WooCommerce Lightbox', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose WooCommerce lightbox', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'jevelin' => esc_html__( 'Jevelin Lightbox', 'jevelin' ),
    			'woocommerce' => esc_html__( 'WooCommerce Lightbox', 'jevelin' ),
    			'disable' => esc_html__( 'Disable', 'jevelin' ),
    		),
    		'default' => 'jevelin',
    	),

    	array(
    		'id' => 'wc_columns',
    		'title' => esc_html__( 'WooCommerce Columns', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose WooCommerce product column count', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'2' => esc_html__( '2 columns', 'jevelin' ),
    			'3' => esc_html__( '3 columns', 'jevelin' ),
    			'4' => esc_html__( '4 columns', 'jevelin' ),
    		),
    		'default' => '4',
    	),

    	array(
    		'id' => 'wc_layout',
    		'title' => esc_html__( 'WooCommerce Layout', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose WooCommerce layout', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'default' => esc_html__( 'Default', 'jevelin' ),
    			'sidebar-left' => esc_html__( 'Sidebar Left', 'jevelin' ),
    			'sidebar-right' => esc_html__( 'Sidebar Right', 'jevelin' ),
    		),
    		'default' => 'sidebar-left',
    	),

    	array(
    		'id' => 'wc_items',
    		'title' => esc_html__( 'Items Per Page', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose WooCommerce products per page', 'jevelin' ),
    		'min' => '1',
    		'max' => '40',
    		'type' => 'slider',
    		'default' => '12',
    	),

    	array(
    		'id' => 'wc_items_additional_information',
    		'title' => esc_html__( 'Items Additional Information', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose what kind of additional information will be shown under product title', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'none' => esc_html__( 'None', 'jevelin' ),
    			'desc' => esc_html__( 'Short description', 'jevelin' ),
    			'cat' => esc_html__( 'Categories', 'jevelin' ),
    		),
    		'default' => 'cat',
    	),

    	array(
    		'id' => 'wc_quantity_button',
    		'title' => esc_html__( 'Jevelin Quantity Button', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable Jevelin quantity button (by disabling it could fix some plugin compatibility issues)', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => 'on',
    	),

    	array(
    		'id' => 'wc_banner',
    		'title' => esc_html__( 'Banner', 'jevelin' ),
    		'subtitle' => esc_html__( 'You can upload a banner image, which will be shown in checkout page', 'jevelin' ),
    		'url' => '1',
    		'type' => 'media',
    	),

    	array(
    		'id' => 'single product page_divider',
    		'title' => '<h2>' . esc_html__( 'Single Product Page', 'jevelin' ) . '</h2>',
    		'type' => 'raw',
    	),

    	array(
    		'id' => 'wc_layout_single',
    		'title' => esc_html__( 'WooCommerce Layout', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose WooCommerce layout for Product Page', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'default' => esc_html__( 'Default', 'jevelin' ),
    			'sidebar-left' => esc_html__( 'Sidebar Left', 'jevelin' ),
    			'sidebar-right' => esc_html__( 'Sidebar Right', 'jevelin' ),
    		),
    		'default' => 'default',
    	),

    	array(
    		'id' => 'wc_tabs',
    		'title' => esc_html__( 'Tabs Position', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose tab product tabs position', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'right' => esc_html__( 'Right Side', 'jevelin' ),
    			'bottom' => esc_html__( 'Bottom', 'jevelin' ),
    		),
    		'default' => 'right',
    	),

    	array(
    		'id' => 'wc_related',
    		'title' => esc_html__( 'Related Products', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable "Related products" in single product page', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '1',
    	),

    )
));




/*
** Lazy loading
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Lazy Loading', 'jevelin' ),
    'id'     => 'lazy-laoding',
    'icon'   => 'ti-reload',
    'fields' => array(

        array(
    		'id' => 'lazy_loading',
    		'title' => esc_html__( 'Lazy Loading', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable lazy loading for image gallery and single image elements (improves page loading time)', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'disabled' => esc_html__( 'Disabled', 'jevelin' ),
    			'enabled' => esc_html__( 'Enabled', 'jevelin' ),
    		),
    		'default' => 'disabled',
    	),

    )
));




/*
** Page Loader
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Page Loader', 'jevelin' ),
    'id'     => 'page-loader',
    'icon'   => 'ti-infinite',
    'fields' => array(

        array(
    		'id' => 'page_loader',
    		'title' => esc_html__( 'Enable Page Loader', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose page loader status', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'off' => esc_html__( 'Off', 'jevelin' ),
    			'on1' => esc_html__( 'On - In every page', 'jevelin' ),
    			'on2' => esc_html__( 'On - Only first load', 'jevelin' ),
    		),
    		'default' => 'off',
    	),

    	array(
    		'id' => 'page_loader_style',
    		'title' => esc_html__( 'Page Loader Style', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose page loader style', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'cube-folding' => esc_html__( 'Cube Folding', 'jevelin' ),
    			'cube-grid' => esc_html__( 'Cube Grid', 'jevelin' ),
    			'spinner' => esc_html__( 'Dots', 'jevelin' ),
    		),
    		'default' => 'cube-folding',
    	),

    	array(
    		'id' => 'page_loader_accent_color',
    		'title' => esc_html__( 'Page Loader Accent Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select page loader accent color', 'jevelin' ),
    		'type' => 'color',
    	),

    	array(
    		'id' => 'page_loader_background_color',
    		'title' => esc_html__( 'Page Loader Background Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select page loader background color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#ffffff',
    	),

    )
));




/*
** 404 Page
*/
Redux::setSection( $opt_name, array(
    'title'  => __( '404 Page', 'jevelin' ),
    'id'     => 'page-404',
    'icon'   => 'ti-alert',
    'fields' => array(

        array(
    		'id' => '404_status',
    		'title' => esc_html__( 'Enable 404 page', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable 404 page', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
    		'default' => '1',
    	),

    	array(
    		'id' => '404_wpbakery_page',
    		'title' => esc_html__( 'Replace with page content', 'jevelin' ),
    		'subtitle' => esc_html__( 'Choose any WPbakery page builder page and set it to 404 page', 'jevelin' ),
    		'type' => 'select',
    		'options' => jevelin_get_pages(),
    		'default' => 'disabled',
    	),

    	array(
    		'id' => '404_title',
    		'title' => esc_html__( 'Title', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter 404 page title', 'jevelin' ),
    		'type' => 'text',
    		'default' => 'Oops, This Page Could Not Be Found!',
    	),

    	array(
    		'id' => '404_text',
    		'title' => esc_html__( 'Message', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter 404 page message', 'jevelin' ),
    		'type' => 'text',
    		'default' => 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.',
    	),

    	array(
    		'id' => '404_button',
    		'title' => esc_html__( 'Reload Button', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter 404 page "Reload" button name', 'jevelin' ),
    		'type' => 'text',
    		'default' => 'Reload',
    	),

    	array(
    		'id' => '404_image',
    		'title' => esc_html__( 'Image', 'jevelin' ),
    		'subtitle' => esc_html__( 'Upload a background image for 404 page', 'jevelin' ),
    		'url' => '1',
    		'type' => 'media',
    	),

    	array(
    		'id' => '404_background',
    		'title' => esc_html__( 'Background Color', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select 404 page background color', 'jevelin' ),
    		'type' => 'color',
    		'default' => '#3f3f3f',
    	),


    )
));




/*
** Notice
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Notice', 'jevelin' ),
    'id'     => 'notice',
    'icon'   => 'ti-notepad',
    'fields' => array(

        array(
    		'id' => 'notice_status',
    		'title' => esc_html__( 'Notice', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enable or disable notice abowe header', 'jevelin' ),
    		'type' => 'button_set',
    		'options' => array(
    			'0' => 'Off',
    			'1' => esc_html__( 'On', 'jevelin' ),
    		),
            'default' => '0',
    	),

    	array(
    		'id' => 'notice_text',
    		'title' => esc_html__( 'Notice Text', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter notice text', 'jevelin' ),
    		'type' => 'editor',
    		'default' => 'By using our website, you agree to the use of our cookies.',
    		'size' => 'large',
    		'editor_height' => '110',
            'args' => [
                'teeny' => false,
            ]
    	),

    	array(
    		'id' => 'notice_close',
    		'title' => esc_html__( 'Close Button', 'jevelin' ),
    		'subtitle' => esc_html__( 'Select if this notice can be closed', 'jevelin' ),
    		'type' => 'radio',
    		'options' => array(
    			'disable' => esc_html__( 'Disable', 'jevelin' ),
    			'enable' => esc_html__( 'Enable (remember close action)', 'jevelin' ),
    			'enable2' => esc_html__( 'Enable (do not remember close action)', 'jevelin' ),
    		),
    		'default' => 'enable',
    	),

    	array(
    		'id' => 'notice_more_url',
    		'title' => esc_html__( 'Learn More URL', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter learn more URL', 'jevelin' ),
    		'type' => 'text',
    	),

    )
));





/*
** Custom CSS/JS
*/
Redux::setSection( $opt_name, array(
    'title'  => __( 'Custom CSS/JS', 'jevelin' ),
    'id'     => 'custom-js-css',
    'icon'   => 'ti-reload',
    'fields' => array(

        array(
            'id'       => 'custom_css',
            'type'     => 'ace_editor',
            'title'    => __( 'CSS Code', 'jevelin' ),
            'subtitle' => __( 'Paste your CSS code here.', 'jevelin' ),
            'mode'     => 'css',
            'theme'    => 'monokai',
            'default'  => "body {\n\t\n}"
        ),

        array(
            'id'       => 'custom_js',
            'type'     => 'ace_editor',
            'title'    => __( 'JavaScript Code', 'jevelin' ),
            'subtitle' => __( 'Paste your JS code here.', 'jevelin' ),
            'mode'     => 'javascript',
            'theme'    => 'chrome',
            'default'  => "jQuery(document).ready( function($){\n\t\n});"
        ),

        array(
    		'id' => 'google_analytics',
    		'title' => esc_html__( 'Google Analytics ID', 'jevelin' ),
    		'subtitle' => esc_html__( 'Enter your Google Analytics ID like UA-XXXXX-Y to enable Google Analytics statistics', 'jevelin' ),
    		'type' => 'text',
    	),

    )
));
