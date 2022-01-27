<?php
function sh_metaboxes_options( $id = '' ) {
    // Declare your sections
    $page_sections = $post_sections = $portfolio_sections = [];


    // Single - Post Media
    $post_sections[] = array(
        'title'         => __( 'Post', 'jevelin' ),
        'icon'          => 'ti-layout-column3',
        'fields'        => array(


            /*
            ** Post Format - Standard
            */
            array(
        		'id' => 'hide-image',
        		'title' => esc_html__( 'Hide Featured Image', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enable this if you want to hide featured image inside the blog post', 'jevelin' ),
        		'type' => 'button_set',
        		'options' => array(
        			'0' => 'Off',
        			'1' => esc_html__( 'On', 'jevelin' ),
        		),
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-0',
        	),


            /*
            ** Post Format - Gallery
            */
        	array(
        		'id' => 'post-gallery',
        		'title' => esc_html__( 'Gallery', 'jevelin' ),
        		'subtitle' => esc_html__( 'Upload images to your gallery', 'jevelin' ),
        		'type' => 'gallery',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-gallery',
        	),


            /*
            ** Post Format - Quote
            */
        	array(
        		'id' => 'post-quote',
        		'title' => esc_html__( 'Quote', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enter quote', 'jevelin' ),
        		'type' => 'textarea',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-quote',
        	),

        	array(
        		'id' => 'post-quote-author',
        		'title' => esc_html__( 'Quote Author', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enter quote author', 'jevelin' ),
        		'type' => 'text',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-quote',
        	),


            /*
            ** Post Format - Link
            */
        	array(
        		'id' => 'post-url-title',
        		'title' => esc_html__( 'URL Title', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enter URL title', 'jevelin' ),
        		'type' => 'text',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-link',
        	),

        	array(
        		'id' => 'post-url',
        		'title' => esc_html__( 'URL', 'jevelin' ),
        		'subtitle' => esc_html__( 'Dont forget to add http://', 'jevelin' ),
        		'type' => 'text',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-link',
        	),


            /*
            ** Post Format - Video
            */
        	array(
        		'id' => 'post-video',
        		'title' => esc_html__( 'Video URL', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enter WordPress supported link (like Youtube or Vimeo)', 'jevelin' ),
        		'type' => 'text',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-video',
        	),

        	array(
        		'id' => 'post-video-file',
        		'title' => esc_html__( 'Video File URL', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enter video file URL (MP4 or WebM)', 'jevelin' ),
        		'url' => '1',
        		'type' => 'media',
                'images_only' => false,
        		'help' => 'Please note that not all WordPress installation supports media file upload by default',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-video',
        	),


            /*
            ** Post Format - Audio
            */
        	array(
        		'id' => 'post-audio',
        		'title' => esc_html__( 'Audio URL', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enter WordPress supported link (like Soundcloud)', 'jevelin' ),
        		'type' => 'text',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-audio',
        	),

        	array(
        		'id' => 'post-audio-file',
        		'title' => esc_html__( 'Audio File URL', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enter audio file URL (MP3 or OGG)', 'jevelin' ),
        		'url' => '1',
        		'type' => 'media',
                'images_only' => false,
        		'help' => 'Please note that not all WordPress installation supports media file upload by default',
                'class' => 'sh-metaboxes-post-format sh-metaboxes-post-format-audio',
        	),



            array(
        		'id' => 'post-copyrights',
        		'title' => esc_html__( 'Copyrights Text', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enter copyrights text for your main featured image, video or media', 'jevelin' ),
        		'type' => 'textarea',
        	),

            array(
        		'id' => 'post-popover',
        		'title' => esc_html__( 'Popover', 'jevelin' ),
        		'subtitle' => esc_html__( 'Small informative meesage', 'jevelin' ),
        		'type' => 'radio',
        		'options' => array(
        			'none' => esc_html__( 'None', 'jevelin' ),
        			'new' => esc_html__( 'NEW', 'jevelin' ),
        			'hot' => esc_html__( 'HOT', 'jevelin' ),
        		),
        		'default' => 'none',
        	),

        ),
    );


    // Single - Post
    $post_sections[] = array(
        'title'         => __( 'General', 'jevelin' ),
        'icon'          => 'ti-crown',
        'fields'        => array(

            array(
        		'id' => 'post_layout',
        		'title' => esc_html__( 'Post Template', 'jevelin' ),
        		'subtitle' => esc_html__( 'Choose post template', 'jevelin' ),
        		'type' => 'radio',
        		'options' => array(
        			'global_default' => esc_html__( 'Global Default (from theme settings)', 'jevelin' ),
        			'default' => esc_html__( 'Default', 'jevelin' ),
        			'sidebar-left' => esc_html__( 'Sidebar Left', 'jevelin' ),
        			'sidebar-right' => esc_html__( 'Sidebar Right', 'jevelin' ),
        		),
        		'default' => 'global_default',
        	),

        ),
    );


    // Single - Page
    $page_sections[] = array(
        'title'         => __( 'General', 'jevelin' ),
        'icon'          => 'ti-crown',
        'fields'        => array(

            array(
        		'id' => 'page_layout',
        		'title' => esc_html__( 'Page Layout', 'jevelin' ),
        		'subtitle' => esc_html__( 'Choose main page layout', 'jevelin' ),
        		'type' => 'radio',
        		'options' => array(
        			'global_default' => esc_html__( 'Global Default (from theme settings)', 'jevelin' ),
        			'default' => esc_html__( 'Default (without sidebar)', 'jevelin' ),
        			'full' => esc_html__( 'Full Width', 'jevelin' ),
        			'sidebar-left' => esc_html__( 'Sidebar Left', 'jevelin' ),
        			'sidebar-right' => esc_html__( 'Sidebar Right', 'jevelin' ),
        		),
        		'default' => 'global_default',
        	),

        	array(
        		'id' => 'page_featured_image',
        		'title' => esc_html__( 'Featured Image', 'jevelin' ),
        		'subtitle' => esc_html__( 'Choose to enable or disable page featured image', 'jevelin' ),
        		'type' => 'radio',
        		'options' => array(
        			'on' => esc_html__( 'On', 'jevelin' ),
        			'off' => esc_html__( 'Off', 'jevelin' ),
        		),
        		'default' => 'on',
        	),

        ),
    );


    // Single - Portfolio
    $portfolio_sections[] = array(
        'title'         => __( 'General', 'jevelin' ),
        'icon'          => 'ti-crown',
        'fields'        => array(

        	array(
        		'id' => 'project-gallery',
        		'title' => esc_html__( 'Porject Gallery', 'jevelin' ),
        		'subtitle' => esc_html__( 'Upload images to your gallery', 'jevelin' ),
        		'type' => 'gallery',
        	),

            array(
        		'id' => 'style',
        		'title' => esc_html__( 'Portfolio Layout', 'jevelin' ),
        		'subtitle' => esc_html__( 'Choose portfolio layout', 'jevelin' ),
        		'type' => 'radio',
        		'options' => array(
        			'default' => esc_html__( 'Default', 'jevelin' ),
        			'slider' => esc_html__( 'Gallery Slider', 'jevelin' ),
        			'gallery-slider-dynamic' => esc_html__( 'Gallery Dynamic Slider', 'jevelin' ),
        			'video-slider' => esc_html__( 'Video Slider (uses Video URL)', 'jevelin' ),
        			'iframe-slider' => esc_html__( 'Iframe Slider (uses Iframe URL)', 'jevelin' ),
        		),
        		'default' => 'default',
        	),

        	array(
        		'id' => 'video',
        		'title' => esc_html__( 'Video URL', 'jevelin' ),
                'subtitle'  => wp_kses( __( 'Enter video URL from WordPress <a target="_blank" href="https://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F">supported video sites</a>. Only for video slider layout', 'jevelin' ), jevelin_allowed_html() ),
        		'type' => 'text',
            ),

        	array(
        		'id' => 'iframe',
        		'title' => esc_html__( 'Iframe URL', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enter iframe URL. Only for iframe slider layout', 'jevelin' ),
        		'type' => 'text',
        	),

        	array(
        		'id' => 'field_client',
        		'title' => esc_html__( 'Client', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enter your client name', 'jevelin' ),
        		'type' => 'text',
        	),

        	array(
        		'id' => 'field_link',
        		'title' => esc_html__( 'URL', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enter your URL', 'jevelin' ),
        		'type' => 'text',
        	),

        	array(
        		'id' => 'info',
        		'title' => esc_html__( 'Custom Fields', 'jevelin' ),
        		'subtitle' => esc_html__( 'Add some custom fields', 'jevelin' ),
        		'type' => 'repeater',
                'fields' => [
                    array(
                        'id' => 'title',
                        'title' => esc_html__( 'Title', 'jevelin' ),
                    ),
                    array(
                        'id' => 'description',
                        'title' => esc_html__( 'Description', 'jevelin' ),
                    ),
                    array(
                        'id' => 'icon',
                        'title' => esc_html__( 'Icon', 'jevelin' ),
                        'class' => 'sh-metaboxes-field-icon'
                    ),
                ],
        		'template' => '{{- title }})',
        		'limit' => '0',
        		'add-button-text' => 'Add a New Source',
        		'sortable' => '1',
        	),

        	array(
        		'id' => 'custom_url',
        		'title' => esc_html__( 'Custom URL', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enter your custom URL where page will be redirected', 'jevelin' ),
        		'type' => 'text',
        	),

        ),
    );


    // Header
    $page_sections[] = $post_sections[] = $portfolio_sections[] = array(
        'title'         => __( 'Header', 'jevelin' ),
        'icon'          => 'ti-flag-alt-2',
        'fields'        => array(

            array(
        		'id' => 'header',
        		'title' => esc_html__( 'Header', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enable or disable header', 'jevelin' ),
        		'type' => 'button_set',
        		'options' => array(
        			'off' => esc_html__( 'Off', 'jevelin' ),
        			'on' => esc_html__( 'On', 'jevelin' ),
        		),
        		'default' => 'on',
        	),

        	array(
        		'id' => 'header_layout',
        		'title' => esc_html__( 'Header Layout', 'jevelin' ),
        		'subtitle' => esc_html__( 'Choose main header layout', 'jevelin' ),
        		'type' => 'select',
                'options' => array_merge( array( 'default' => esc_html__( 'Default (from theme options)', 'jevelin' ) ), jevelin_get_headers() ),
        		'default' => 'default',
        	),

    	array(
    		'id' => 'header builder_divider',
    		'title' => '<h3 class="sh-metaboxes-field-raw-title">' . esc_html__( 'Header Builder', 'jevelin' ) . '</h3>',
    		'type' => 'raw',
    	),

        	array(
        		'id' => 'header_above_content',
        		'title' => esc_html__( 'Above Content', 'jevelin' ),
        		'subtitle' => esc_html__( 'Can be useful when using transparent background to place it above content like a slider (will be applied only when viewing actual pages)', 'jevelin' ),
        		'type' => 'select',
        		'options' => array(
        			'disabled' => esc_html__( 'Disabled', 'jevelin' ),
        			'enabled' => esc_html__( 'Enabled', 'jevelin' ),
        		),
        		'default' => 'disabled',
        	),

    	array(
    		'id' => 'header_classic_divider',
    		'title' => '<h3 class="sh-metaboxes-field-raw-title">' . esc_html__( 'Header Classic', 'jevelin' ) . '</h3>',
    		'type' => 'raw',
    	),

            array(
                'id' => 'header_style',
                'title' => esc_html__('Header Above', 'jevelin'),
                'subtitle' => esc_html__('Choose if header will be shown above content', 'jevelin'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_html__( 'Disabled', 'jevelin' ),
                    'light' => esc_html__( 'Light (Header + Titlebar)', 'jevelin' ),
                    'light light_noborder' => esc_html__( 'Light (Header + Titlebar + withoutborder)', 'jevelin' ),
                    'light_mobile_off' => esc_html__( 'Light (Header + Titlebar) - Mobile Off', 'jevelin' ),
                    'bottom_titlebar' => esc_html__( 'Bottom of Titlebar', 'jevelin' ),
                ),
                'default' => 'default',
            ),

            array(
        		'id' => 'header_style_description',
        		'title' => esc_html__( 'Titlebar Description', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enter this page description (for Header Above - Light)', 'jevelin' ),
        		'type' => 'text',
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
        	),

            array(
        		'id' => 'header_style_breadcrumbs',
        		'title' => esc_html__( 'Titlebar Breadcrumbs', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enable or disable dreadcrumbs (for Header Above - Light)', 'jevelin' ),
        		'type' => 'button_set',
        		'options' => array(
        			false => esc_html__( 'Off', 'jevelin' ),
        			true => esc_html__( 'On', 'jevelin' ),
        		),
        		'default' => false,
        	),

            array(
        		'id' => 'header_style_scroll_button',
        		'title' => esc_html__( 'Titlebar Scroll Down Button', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enable or disable scroll down button (for Header Above - Light)', 'jevelin' ),
        		'type' => 'button_set',
        		'options' => array(
        			false => esc_html__( 'Off', 'jevelin' ),
        			true => esc_html__( 'On', 'jevelin' ),
        		),
        		'default' => false,
        	),

            array(
                'id' => 'header_style_titlebar_text_style',
                'title' => esc_html__('Titlebar Text Style', 'jevelin'),
                'subtitle' => esc_html__('Choose text style (for Header Above - Light)', 'jevelin'),
                'type' => 'select',
                'options' => array(
                    'style1' => esc_html__( 'Style 1', 'jevelin' ),
                    'style2' => esc_html__( 'Style 2', 'jevelin' ),
                ),
                'default' => 'style1',
            ),

        ),
    );


    // Titlebar
    if( class_exists('RevSlider') ) :
    	$slider = new RevSlider();
    	$arrSliders = $slider->getArrSlidersShort();
    endif;

    if( !isset($arrSliders) || !count($arrSliders) ) :
    	$arrSliders = array(
    		'disabled' => 'Disabled'
    	);
    elseif( class_exists('RevSlider') ) :
    	$arrSliders['disabled'] = 'Disabled';
    	$arrSliders = array_reverse($arrSliders, true);
    endif;

    $page_sections[] = $post_sections[] = $portfolio_sections[] = array(
        'title'         => __( 'Titlebar', 'jevelin' ),
        'icon'          => 'ti-layout-list-thumb',
        'fields'        => array(

        	array(
        		'id' => 'titlebar',
        		'title' => esc_html__( 'Titlebar', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enable or disable titlebar', 'jevelin' ),
        		'type' => 'select',
        		'options' => array(
        			'default' => esc_html__( 'Default (from theme options)', 'jevelin' ),
        			'on' => esc_html__( 'On', 'jevelin' ),
        			'off' => esc_html__( 'Off', 'jevelin' ),
        		),
        	),

            array(
        		'id' => 'titlebar_layout',
        		'title' => esc_html__( 'Titlebar Layout', 'jevelin' ),
        		'subtitle' => esc_html__( 'Choose titlebar layout', 'jevelin' ),
        		'type' => 'radio',
        		'options' => jevelin_get_titlebars( 1 ),
                'default' => 'default',
        	),

        	array(
        		'id' => 'titlebar_text_color',
        		'title' => esc_html__( 'Titlebar Text Color', 'jevelin' ),
        		'subtitle' => esc_html__( 'Select titlebar text color', 'jevelin' ),
        		'type' => 'color',
        	),

        	array(
        		'id' => 'titlebar_background',
        		'title' => esc_html__( 'Titlebar Background Image', 'jevelin' ),
        		'subtitle' => esc_html__( 'Upload titlebar background image', 'jevelin' ),
        		'url' => '1',
        		'type' => 'media',
        	),

        	array(
        		'id' => 'titlebar_background_parallax',
        		'title' => esc_html__( 'Titlebar Parallax Background', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enable or disable parallax background', 'jevelin' ),
        		'type' => 'select',
        		'options' => array(
        			'default' => esc_html__( 'Default (from theme options)', 'jevelin' ),
        			'on' => esc_html__( 'On', 'jevelin' ),
        			'off' => esc_html__( 'Off', 'jevelin' ),
        		),
        	),

        	array(
        		'id' => 'titlebar_revslider',
        		'title' => esc_html__( 'Titlebar Revolution Slider', 'jevelin' ),
        		'subtitle' => esc_html__( 'Replace titlebar content with Revolution Slider', 'jevelin' ),
        		'type' => 'select',
                'options' => $arrSliders
        	),

        ),
    );


    // Footer
    $page_sections[] = $post_sections[] = $portfolio_sections[] = array(
        'title'         => __( 'Footer', 'jevelin' ),
        'icon'          => 'ti-anchor',
        'fields'        => array(

            array(
        		'id' => 'footer_template',
        		'title' => esc_html__( 'Footer Layout', 'jevelin' ),
        		'subtitle' => esc_html__( 'Choose footer layout', 'jevelin' ),
        		'type' => 'select',
        		'options' => jevelin_get_footers(),
        		'default' => 'default',
        	),

        	array(
        		'id' => 'footer_widgets',
        		'title' => esc_html__( 'Widgets', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enable or disable footer widgets', 'jevelin' ),
        		'type' => 'select',
        		'options' => array(
        			'default' => esc_html__( 'Default (from theme options)', 'jevelin' ),
        			'on' => esc_html__( 'On', 'jevelin' ),
        			'off' => esc_html__( 'Off', 'jevelin' ),
        		),
        	),

        	array(
        		'id' => 'footer_widgets_padding',
        		'title' => esc_html__( 'Footer Widgets Padding', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enter custom footer widgets padding (default: 100px 0 100px 0)', 'jevelin' ),
        		'type' => 'text',
        	),

        	array(
        		'id' => 'copyright_bar',
        		'title' => esc_html__( 'Copyrights', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enable or disable footer copyrights', 'jevelin' ),
        		'type' => 'select',
        		'options' => array(
        			'default' => esc_html__( 'Default (from theme options)', 'jevelin' ),
        			'on' => esc_html__( 'On', 'jevelin' ),
        			'off' => esc_html__( 'Off', 'jevelin' ),
        		),
        	),


        ),
    );


    // Blog
    $page_sections[] = array(
        'title'         => __( 'Blog', 'jevelin' ),
        'icon'          => 'ti-pencil-alt',
        'fields'        => array(

            array(
        		'id' => 'use only if page template is set to blog_divider',
        		'title' => '<h2>' . esc_html__( 'Use only if page template is set to Blog', 'jevelin' ) . '</h2>',
        		'type' => 'raw',
        	),

        	array(
        		'id' => 'page_blog_editor',
        		'title' => esc_html__( 'Blog Editor Content', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enable or disable blog page editor content tabs', 'jevelin' ),
        		'type' => 'radio',
        		'options' => array(
        			'on' => esc_html__( 'On', 'jevelin' ),
        			'off' => esc_html__( 'Off', 'jevelin' ),
        		),
        		'default' => 'off',
        	),

        	array(
        		'id' => 'page-blog-style',
        		'title' => esc_html__( 'Blog Style', 'jevelin' ),
        		'subtitle' => esc_html__( 'Choose blog style', 'jevelin' ),
        		'type' => 'radio',
        		'options' => array(
        			'masonry masonry2' => esc_html__( 'Masonry 2.0 Standard', 'jevelin' ),
        			'masonry masonry-shadow' => esc_html__( 'Masonry Shadow', 'jevelin' ),
        			'masonry' => esc_html__( 'Masonry Standard', 'jevelin' ),
        			'grid' => esc_html__( 'Grid', 'jevelin' ),
        			'mix masonry2' => esc_html__( 'Mix', 'jevelin' ),
        			'large' => esc_html__( 'Large Images', 'jevelin' ),
        			'medium' => esc_html__( 'Medium Images', 'jevelin' ),
        			'small' => esc_html__( 'Small Images', 'jevelin' ),
        		),
        		'default' => 'masonry masonry-shadow',
        	),

        	array(
        		'id' => 'page_blog_categories_tab',
        		'title' => esc_html__( 'Blog Categories Tabs', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enable or disable blog categories tabs', 'jevelin' ),
        		'type' => 'radio',
        		'options' => array(
        			'on' => esc_html__( 'On', 'jevelin' ),
        			'off' => esc_html__( 'Off', 'jevelin' ),
        		),
        		'default' => 'off',
        	),

        	array(
        		'id' => 'page_blog_category',
        		'title' => esc_html__( 'Blog Categories', 'jevelin' ),
        		'subtitle' => esc_html__( 'Enter blog categories slugs and seperate them by comma', 'jevelin' ),
        		'type' => 'multi-select',
        		'population' => 'taxonomy',
        		'source' => 'category',
        		'prepopulate' => '200',
        		'limit' => '100',
        	),

        	array(
        		'id' => 'page_blog_posts_per_page',
        		'title' => esc_html__( 'Blog Posts Per Page', 'jevelin' ),
        		'subtitle' => esc_html__( 'Choose how many posts will be disaplayed per page', 'jevelin' ),
        		'type' => 'select',
        		'options' => array(
        			'default' => esc_html__( 'Default (from theme options)', 'jevelin' ),
        			'3' => esc_html__( '3 posts', 'jevelin' ),
        			'4' => esc_html__( '4 posts', 'jevelin' ),
        			'5' => esc_html__( '5 posts', 'jevelin' ),
        			'6' => esc_html__( '6 posts', 'jevelin' ),
        			'7' => esc_html__( '7 posts', 'jevelin' ),
        			'8' => esc_html__( '8 posts', 'jevelin' ),
        			'9' => esc_html__( '9 posts', 'jevelin' ),
        			'10' => esc_html__( '10 posts', 'jevelin' ),
        			'11' => esc_html__( '11 posts', 'jevelin' ),
        			'12' => esc_html__( '12 posts', 'jevelin' ),
        			'13' => esc_html__( '13 posts', 'jevelin' ),
        			'14' => esc_html__( '14 posts', 'jevelin' ),
        			'15' => esc_html__( '15 posts', 'jevelin' ),
        			'16' => esc_html__( '16 posts', 'jevelin' ),
        		),
        		'default' => 'default',
        	),

        	array(
        		'id' => 'page_blog_pagination_type',
        		'title' => esc_html__( 'Blog Pagination Type', 'jevelin' ),
        		'subtitle' => esc_html__( 'Choose blog pagination type', 'jevelin' ),
        		'type' => 'radio',
        		'options' => array(
        			'default' => esc_html__( 'Default per page', 'jevelin' ),
        			'button' => esc_html__( 'Load More button (on click)', 'jevelin' ),
        			'infinite' => esc_html__( 'Infinite loading (on scroll)', 'jevelin' ),
        		),
        		'default' => 'default',
        	),

        ),
    );


    // Colors
    $page_sections[] = $post_sections[] = array(
        'title'         => __( 'Colors', 'jevelin' ),
        'icon'          => 'ti-palette',
        'fields'        => array(

            array(
        		'id' => 'accent_color',
        		'title' => esc_html__( 'Accent Color', 'jevelin' ),
        		'subtitle' => esc_html__( 'Set custom accent color for this page or leave blank for default', 'jevelin' ),
        		'type' => 'color',
        	),

        	array(
        		'id' => 'accent_hover_color',
        		'title' => esc_html__( 'Accent Hover Color', 'jevelin' ),
        		'subtitle' => esc_html__( 'Select page accent color on hover or leave blank for default', 'jevelin' ),
        		'type' => 'color',
        	),

        	array(
        		'id' => 'header_nav_active_color',
        		'title' => esc_html__( 'Active Navigation Color', 'jevelin' ),
        		'subtitle' => esc_html__( 'Select active navigation color or leave blank for default', 'jevelin' ),
        		'type' => 'color',
        	),

            array(
        		'id' => 'footer_hover_color',
        		'title' => esc_html__( 'Footer Hover Color', 'jevelin' ),
        		'subtitle' => esc_html__( 'Select footer color on hover', 'jevelin' ),
        		'type' => 'color',
        	),


        ),
    );




    // Declare your metaboxes
    $metaboxes = array();
    $metaboxes[] = array(
        'id'            => 'page-settings',
        'title'         => __( 'Page Settings', 'jevelin' ),
        'post_type'     => 'page',
        //'page_template' => array('page-test.php'), // Visibility of box based on page template selector
        //'post_format' => array('image'), // Visibility of box based on post format
        'position'      => 'normal', // normal, advanced, side
        'priority'      => 'high', // high, core, default, low - Priorities of placement
        'sections'      => $page_sections,
    );

    $metaboxes[] = array(
        'id'            => 'post-settings',
        'title'         => __( 'Post Settings', 'jevelin' ),
        'post_type'     => 'post',
        'position'      => 'normal',
        'priority'      => 'high',
        'sections'      => $post_sections,
    );

    $metaboxes[] = array(
        'id'            => 'portfolio-settings',
        'title'         => __( 'Portfolio Settings', 'jevelin' ),
        'post_type'     => 'fw-portfolio',
        //'page_template' => array('page-test.php'), // Visibility of box based on page template selector
        //'post_format' => array('image'), // Visibility of box based on post format
        'position'      => 'normal', // normal, advanced, side
        'priority'      => 'high', // high, core, default, low - Priorities of placement
        'sections'      => $portfolio_sections,
    );

    return $metaboxes;
}
