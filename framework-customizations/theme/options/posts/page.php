<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}


// Check current framework
if( jevelin_framework() == 'redux' ) :
	return false;
endif;


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


$options = array(
    'page_settings' => array(
        'title'   => esc_html__( 'Page Settings', 'jevelin' ),
        'type'    => 'box',
        'options' => array(
            'general_tab' => array(
                'title'   => esc_html__( 'General', 'jevelin' ),
                'type'    => 'tab',
                'options' => array(

                    'page_layout' => array(
                        'type'  => 'radio',
                        'value' => 'global_default',
                        'label' => esc_html__( 'Page Layout', 'jevelin' ),
                        'desc'  => esc_html__( 'Choose main page layout', 'jevelin' ),
                        'choices' => array(
							'global_default' => esc_html__( 'Global Default (from theme settings)', 'jevelin' ),
                            'default' => esc_html__( 'Default (without sidebar)', 'jevelin' ),
                            'full' => esc_html__( 'Full Width', 'jevelin' ),
                            'sidebar-left' => esc_html__( 'Sidebar Left', 'jevelin' ),
                            'sidebar-right' => esc_html__( 'Sidebar Right', 'jevelin' ),
                        ),
                        'inline' => false,
                    ),

					'page_featured_image' => array(
                        'type'  => 'radio',
                        'value' => 'on',
                        'label' => esc_html__( 'Featured Image', 'jevelin' ),
                        'desc'  => esc_html__( 'Choose to enable or disable page featured image', 'jevelin' ),
                        'choices' => array(
							'on' => esc_html__( 'On', 'jevelin' ),
                            'off' => esc_html__( 'Off', 'jevelin' ),
                        ),
                        'inline' => false,
                    ),

                ),
            ),

            'header_tab' => array(
                'title'   => esc_html__( 'Header', 'jevelin' ),
                'type'    => 'tab',
                'options' => array(


                    'header' => array(
                        'type' => 'switch',
                        'label' => esc_html__( 'Header', 'jevelin' ),
                        'desc' => esc_html__( 'Enable or disable header', 'jevelin' ),
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

                    'header_layout' => array(
                        'type'  => 'select',
                        'value' => 'default',
                        'label' => esc_html__('Header Layout', 'jevelin'),
                        'desc'  => esc_html__('Choose main header layout', 'jevelin'),
                        'choices' => array_merge( array( 'default' => esc_html__( 'Default (from theme options)', 'jevelin' ) ), jevelin_get_headers() ),
                    ),


					'page_title1' => array( 'type' => 'html-full', 'value' => '', 'label' => false, 'html'  =>
						'<h3><span>
							'.esc_html__( 'Header Builder (beta)', 'gillion' ).'
						</span></h3>',
					),

					'header_above_content' => array(
						'type' => 'select',
						'label' => esc_html__( 'Above Content', 'jevelin' ),
						'desc' => esc_html__( 'Can be useful when using transparent background to place it above content like a slider (will be applied only when viewing actual pages)', 'jevelin' ),
						'value' => 'disabled',
						'choices' => array(
                            'disabled' => esc_html__( 'Disabled', 'jevelin' ),
                            'enabled' => esc_html__( 'Enabled', 'jevelin' ),
                        ),
					),

                    /*'header_style' => array(
                        'type'  => 'select',
                        'value' => '1',
                        'label' => esc_html__('Header Style', 'jevelin'),
                        'desc'  => esc_html__('Choose main header style', 'jevelin'),
                        'choices' => array(
                            'default' => esc_html__( 'Default', 'jevelin' ),
                            'light' => esc_html__( 'Light (Header + Titlebar)', 'jevelin' ),
                        ),
                    ),*/


					'page_title2' => array( 'type' => 'html-full', 'value' => '', 'label' => false, 'html'  =>
						'<h3><span>
							'.esc_html__( 'Header Classic (from Theme Settings)', 'gillion' ).'
						</span></h3>',
					),

                    'header_style' => array(
                        'type'  => 'multi-picker',
                        'label' => false,
                        'desc'  => false,
                        'value' => array(
                            'header_style' => 'default',
                            'manual' => array(
                                'description' => '',
                                'breadcrumbs' => true,
                                'scroll_button' => true,
                            ),
                        ),
                        'picker' => array(
                            'header_style' => array(
                                'type'  => 'select',
                                'value' => '1',
                                'label' => esc_html__('Header Above', 'jevelin'),
                                'desc'  => esc_html__('Choose if header will be shown above content', 'jevelin'),
                                'choices' => array(
									'default' => esc_html__( 'Disabled', 'jevelin' ),
                                    'light' => esc_html__( 'Light (Header + Titlebar)', 'jevelin' ),
									'light light_noborder' => esc_html__( 'Light (Header + Titlebar + withoutborder)', 'jevelin' ),
                                    'light_mobile_off' => esc_html__( 'Light (Header + Titlebar) - Mobile Off', 'jevelin' ),
									'bottom_titlebar' => esc_html__( 'Bottom of Titlebar', 'jevelin' ),
                                ),
                            ),
                        ),
                        'choices' => array(
                            'light' => array(
                                'description' => array(
                                    'type'  => 'text',
                                    'value' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'jevelin'),
                                    'label' => esc_html__('Description', 'jevelin'),
                                    'desc'  => esc_html__('Enter this page description', 'jevelin'),
                                ),

                                'breadcrumbs' => array(
                                    'type' => 'switch',
                                    'label' => esc_html__( 'Breadcrumbs', 'jevelin' ),
                                    'desc' => esc_html__( 'Enable or disable dreadcrumbs', 'jevelin' ),
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

                                'scroll_button' => array(
                                    'type' => 'switch',
                                    'label' => esc_html__( 'Scroll Down Button', 'jevelin' ),
                                    'desc' => esc_html__( 'Enable or disable scroll down button', 'jevelin' ),
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

								'titlebar_text_style' => array(
			                        'type' => 'radio',
			                        'label' => esc_html__( 'Text Style', 'jevelin' ),
			                        'desc' => esc_html__( 'Choose text style', 'jevelin' ),
			                       'choices' => array(
			                            'style1' => esc_html__( 'Style 1', 'jevelin' ),
			                            'style2' => esc_html__( 'Style 2', 'jevelin' ),
			                        ),
			                        'value' => 'style1',
			                        'inline' => false,
			                    ),

                            ),
							'light light_noborder' => array(
                                'description' => array(
                                    'type'  => 'text',
                                    'value' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'jevelin'),
                                    'label' => esc_html__('Description', 'jevelin'),
                                    'desc'  => esc_html__('Enter this page description', 'jevelin'),
                                ),

                                'breadcrumbs' => array(
                                    'type' => 'switch',
                                    'label' => esc_html__( 'Breadcrumbs', 'jevelin' ),
                                    'desc' => esc_html__( 'Enable or disable dreadcrumbs', 'jevelin' ),
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

                                'scroll_button' => array(
                                    'type' => 'switch',
                                    'label' => esc_html__( 'Scroll Down Button', 'jevelin' ),
                                    'desc' => esc_html__( 'Enable or disable scroll down button', 'jevelin' ),
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

								'titlebar_text_style' => array(
			                        'type' => 'radio',
			                        'label' => esc_html__( 'Text Style', 'jevelin' ),
			                        'desc' => esc_html__( 'Choose text style', 'jevelin' ),
			                       'choices' => array(
			                            'style1' => esc_html__( 'Style 1', 'jevelin' ),
			                            'style2' => esc_html__( 'Style 2', 'jevelin' ),
			                        ),
			                        'value' => 'style1',
			                        'inline' => false,
			                    ),

                            ),
                        ),
                    ),



					'titlebar1' => array( 'type' => 'html-full', 'value' => '', 'label' => false, 'html'  =>
						'<h3><span>
							'.esc_html__( 'Titlebar', 'gillion' ).'
						</span></h3>',
					),

                    'titlebar' => array(
                        'type'  => 'select',
                        'label' => esc_html__('Titlebar', 'jevelin'),
                        'desc'  => esc_html__('Enable or disable titlebar', 'jevelin'),
                        'choices' => array(
                            'default' => esc_html__( 'Default (from theme options)', 'jevelin' ),
                            'on' => esc_html__( 'On', 'jevelin' ),
                            'off' => esc_html__( 'Off', 'jevelin' ),
                        ),
                        'value' => '',
                        'inline' => false,
                    ),

					'titlebar_layout' => array(
						'type'  => 'radio',
					    'label' => esc_html__('Titlebar Layout', 'jevelin'),
					    'desc'  => esc_html__('Choose titlebar layout', 'jevelin'),
					    'choices' => jevelin_get_titlebars( 1 ),
                        'value' => '',
					    'inline' => false,
                    ),

					'titlebar_text_color' => array(
                        'type'  => 'color-picker',
                        'value' => '',
                        'label' => esc_html__('Titlebar Text Color', 'jevelin'),
                        'desc'  => esc_html__('Select titlebar text color', 'jevelin'),
                    ),

                    'titlebar_background' => array(
                        'label' => esc_html__( 'Titlebar Background Image', 'jevelin' ),
                        'desc'  => esc_html__( 'Upload titlebar background image', 'jevelin' ),
                        'type'  => 'upload'
                    ),

                    'titlebar_background_parallax' => array(
                        'type' => 'select',
                        'label' => esc_html__( 'Titlebar Parallax Background', 'jevelin' ),
                        'desc' => esc_html__( 'Enable or disable parallax background', 'jevelin' ),
                        'choices' => array(
                            'default' => esc_html__( 'Default (from theme options)', 'jevelin' ),
                            'on' => esc_html__( 'On', 'jevelin' ),
                            'off' => esc_html__( 'Off', 'jevelin' ),
                        ),
                        'value' => '',
                        'inline' => false,
                    ),

					'titlebar_revslider' => array(
					    'type'  => 'select',
					    'label' => esc_html__('Titlebar Revolution Slider', 'jevelin'),
					    'desc'  => esc_html__('Replace titlebar content with Revolution Slider', 'jevelin'),
					    'choices' => $arrSliders,
					),


                ),
            ),

            'footer_tab' => array(
                'title'   => esc_html__( 'Footer', 'jevelin' ),
                'type'    => 'tab',
                'options' => array(


					'footer_template' => array(
                        'type'  => 'select',
                        'value' => 'default',
                        'label' => esc_html__('Footer Layout', 'jevelin'),
                        'desc'  => esc_html__('Choose footer layout', 'jevelin'),
                        'choices' => jevelin_get_footers(),
                    ),

                    'footer_widgets' => array(
                        'type' => 'select',
                        'label' => esc_html__( 'Footer Widgets', 'jevelin' ),
                        'desc' => esc_html__( 'Enable or disable footer widgets', 'jevelin' ),
                       'choices' => array(
                            'default' => esc_html__( 'Default (from theme options)', 'jevelin' ),
                            'on' => esc_html__( 'On', 'jevelin' ),
                            'off' => esc_html__( 'Off', 'jevelin' ),
                        ),
                        'value' => '',
                        'inline' => false,
                    ),

					'footer_widgets_padding' => array(
						'type'  => 'text',
						'label' => esc_html__('Footer Widgets Padding', 'jevelin'),
						'desc'  => esc_html__('Enter custom footer widgets padding (default: 100px 0 100px 0)', 'jevelin'),
					),

                    'copyright_bar' => array(
                        'type' => 'select',
                        'label' => esc_html__( 'Footer Copyrights', 'jevelin' ),
                        'desc' => esc_html__( 'Enable or disable footer copyrights', 'jevelin' ),
                        'choices' => array(
                            'default' => esc_html__( 'Default (from theme options)', 'jevelin' ),
                            'on' => esc_html__( 'On', 'jevelin' ),
                            'off' => esc_html__( 'Off', 'jevelin' ),
                        ),
                        'value' => '',
                        'inline' => false,
                    ),

                ),
            ),

            'blog_tab' => array(
                'title'   => esc_html__( 'Blog', 'jevelin' ),
                'type'    => 'tab',
                'options' => array(

                    'page_blog_notice' => array(
                        'type'  => 'html-full',
                        'value' => '',
                        'label' => false,
                        'html'  => '<i>Use only if page template is set to <b>Blog</b></i>',
                    ),

					'page_blog_editor' => array(
                        'type' => 'radio',
                        'label' => esc_html__( 'Blog Editor Content', 'jevelin' ),
                        'desc' => esc_html__( 'Enable or disable blog page editor content tabs', 'jevelin' ),
                       'choices' => array(
                            'on' => esc_html__( 'On', 'jevelin' ),
                            'off' => esc_html__( 'Off', 'jevelin' ),
                        ),
                        'value' => 'off',
                        'inline' => false,
                    ),

                    'page-blog-style' => array(
                        'type'  => 'radio',
                        'value' => 'masonry masonry-shadow',
                        'label' => esc_html__( 'Blog Style', 'jevelin' ),
                        'desc'  => esc_html__( 'Choose blog style', 'jevelin' ),
                        'choices' => array(
							'masonry masonry2' => esc_html__( 'Masonry 2.0 Standard', 'jevelin' ),
                            'masonry masonry-shadow' => esc_html__( 'Masonry Shadow', 'jevelin' ),
                            'masonry' => esc_html__( 'Masonry Standard', 'jevelin' ),
                            'grid' => esc_html__( 'Grid', 'jevelin' ),
							'mix masonry2' => esc_html__( 'Mix', 'jevelin' ),
                            'large' => esc_html__( 'Large Images', 'jevelin' ),
                            'medium' => esc_html__( 'Medium Images', 'jevelin' ),
                            'small' => esc_html__( 'Small Images', 'jevelin' ),
                        ),
                        'inline' => false,
                    ),

					'page_blog_categories_tab' => array(
                        'type' => 'radio',
                        'label' => esc_html__( 'Blog Categories Tabs', 'jevelin' ),
                        'desc' => esc_html__( 'Enable or disable blog categories tabs', 'jevelin' ),
                       'choices' => array(
                            'on' => esc_html__( 'On', 'jevelin' ),
                            'off' => esc_html__( 'Off', 'jevelin' ),
                        ),
                        'value' => 'off',
                        'inline' => false,
                    ),

                    'page_blog_category' => array(
                        'type'  => 'multi-select',
                        'label' => esc_html__('Blog Categories', 'jevelin'),
                        'desc'  => esc_html__('Choose which blog categories you want to show', 'jevelin'),
                        'population' => 'taxonomy',
                        'source' => 'category',
                        'prepopulate' => 200,
                        'limit' => 100,
                    ),

					'page_blog_posts_per_page' => array(
                        'type' => 'select',
                        'label' => esc_html__( 'Blog Posts Per Page', 'jevelin' ),
                        'desc' => esc_html__( 'Choose how many posts will be disaplayed per page', 'jevelin' ),
                        'choices' => array(
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
                        'value' => 'default',
                        'inline' => false,
                    ),

					'page_blog_pagination_type' => array(
                        'type'  => 'radio',
                        'value' => 'default',
                        'label' => esc_html__( 'Blog Pagination Type', 'jevelin' ),
                        'desc'  => esc_html__( 'Choose blog pagination type', 'jevelin' ),
                        'choices' => array(
                            'default' => esc_html__( 'Default per page', 'jevelin' ),
                            'button' => esc_html__( 'Load More button (on click)', 'jevelin' ),
                            'infinite' => esc_html__( 'Infinite loading (on scroll)', 'jevelin' ),
                        ),
                        'inline' => false,
                    ),

                ),
            ),

            'colors_tab' => array(
                'title'   => esc_html__( 'Colors', 'jevelin' ),
                'type'    => 'tab',
                'options' => array(

                    'accent_color' => array(
                        'type'  => 'color-picker',
                        'label' => esc_html__('Accent Color', 'jevelin'),
                        'desc'  => esc_html__('Set custom accent color for this page or leave blank for default', 'jevelin'),
                        'value' => '',
                    ),

                    'accent_hover_color' => array(
                        'type'  => 'rgba-color-picker',
                        'label' => esc_html__('Accent Hover Color', 'jevelin'),
                        'desc'  => esc_html__('Select page accent color on hover or leave blank for default', 'jevelin'),
                        'value' => '',
                    ),

                    'header_nav_active_color' => array(
                        'type'  => 'rgba-color-picker',
                        'label' => esc_html__('Active Navigation Color', 'jevelin'),
                        'desc'  => esc_html__('Select active navigation color or leave blank for default', 'jevelin'),
                        'value' => '',
                    ),

                    'footer_hover_color' => array(
                        'type'  => 'color-picker',
                        'value' => '',
                        'label' => esc_html__('Footer Hover Color', 'jevelin'),
                        'desc'  => esc_html__('Select footer color on hover', 'jevelin'),
                    ),

                ),
            ),
        ),
    ),
);
