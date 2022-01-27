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
        'priority' => 'high',
        'options' => array(
            'general_tab' => array(
                'title'   => esc_html__( 'General', 'jevelin' ),
                'type'    => 'tab',
                'options' => array(

					'post_layout' => array(
					    'type'  => 'radio',
					    'value' => 'global_default',
					    'label' => esc_html__('Post Template', 'jevelin'),
					    'desc'  => esc_html__('Choose post template', 'jevelin'),
					    'choices' => array(
							'global_default' => esc_html__( 'Global Default (from theme settings)', 'jevelin' ),
					        'default' => esc_html__( 'Default', 'jevelin' ),
					        'sidebar-left' => esc_html__( 'Sidebar Left', 'jevelin' ),
					        'sidebar-right' => esc_html__( 'Sidebar Right', 'jevelin' ),
					    ),
					    'inline' => false,
					),

                    'post-popover' => array(
                        'label'   => esc_html__('Popover', 'jevelin'),
                        'desc'    => esc_html__('Small informative meesage', 'jevelin'),
                        'type'    => 'radio',
                        'choices' => array(
                            'none' => esc_html__('None', 'jevelin'),
                            'new' => esc_html__('NEW', 'jevelin'),
                            'hot' => esc_html__('HOT', 'jevelin'),
                        ),
                        'value' => 'none'
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
                        'label' => esc_html__( 'Widgets', 'jevelin' ),
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
                        'label' => esc_html__( 'Copyrights', 'jevelin' ),
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

                ),
            ),
        ),
    ),

    'post-format-0' => array(
        'type'     => 'box',
        'title'    => esc_html__('Image Settings', 'jevelin'),
        'priority' => 'high',
        'options'  => array(

            'hide-image' => array(
                'type' => 'switch',
                'label' => esc_html__( 'Hide Featured Image', 'jevelin' ),
                'desc' => esc_html__( 'Enable this if you want to hide featured image inside the blog post', 'jevelin' ),
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

        )
    ),

    'post-format-gallery' => array(
        'type'     => 'box',
        'title'    => esc_html__('Gallery Settings', 'jevelin'),
        'priority' => 'high',
        'options'  => array(

            'post-gallery' => array(
                'type'  => 'multi-upload',
                'label' => esc_html__( 'Gallery', 'jevelin' ),
                'desc'  => esc_html__( 'Upload images to your gallery', 'jevelin' ),
                'images_only' => true,
            ),

        )
    ),


    'post-format-quote' => array(
        'type'     => 'box',
        'title'    => esc_html__('Quote Settings', 'jevelin'),
        'priority' => 'high',
        'options'  => array(

            'post-quote' => array(
                'type'  => 'textarea',
                'label' => esc_html__( 'Quote', 'jevelin' ),
                'desc'  => esc_html__( 'Enter quote', 'jevelin' ),
            ),

            'post-quote-author' => array(
                'type' => 'text',
                'label' => esc_html__( 'Quote Author', 'jevelin' ),
                'desc' => esc_html__( 'Enter quote author', 'jevelin' ),
            ),

        )
    ),


    'post-format-link' => array(
        'type'     => 'box',
        'title'    => esc_html__('Link Settings', 'jevelin'),
        'priority' => 'high',
        'options'  => array(

            'post-url-title' => array(
                'type' => 'text',
                'label' => esc_html__( 'URL Title', 'jevelin' ),
                'desc' => esc_html__( 'Enter URL title', 'jevelin' ),
            ),

            'post-url' => array(
                'type' => 'text',
                'label' => esc_html__( 'URL', 'jevelin' ),
                'desc' => esc_html__( 'Dont forget to add http://', 'jevelin' ),
            ),

        )
    ),


    'post-format-video' => array(
        'type'     => 'box',
        'title'    => esc_html__('Video Settings', 'jevelin'),
        'priority' => 'high',
        'options'  => array(

            'post-video' => array(
                'type' => 'text',
                'label' => esc_html__( 'Video URL', 'jevelin' ),
                'desc' => esc_html__( 'Enter WordPress supported link', 'jevelin' ),
            ),

			'post-video-file' => array(
				'label' => esc_html__( 'Video File URL', 'jevelin' ),
				'desc'  => esc_html__( 'Enter video file URL (MP4 or WebM)', 'jevelin' ),
				'help' => esc_html__( 'Please note that not all WordPress installation supports media file upload by default', 'jevelin' ),
				'type'  => 'upload',
				'images_only' => false,
			),

        )
    ),


    'post-format-audio' => array(
        'type'     => 'box',
        'title'    => esc_html__('Audio Settings', 'jevelin'),
        'priority' => 'high',
        'options'  => array(

            'post-audio' => array(
                'type' => 'text',
                'label' => esc_html__( 'Audio URL', 'jevelin' ),
                'desc' => esc_html__( 'Enter WordPress supported link (like Soundcloud)', 'jevelin' ),
            ),

			'post-audio-file' => array(
				'label' => esc_html__( 'Audio File URL', 'jevelin' ),
				'desc'  => esc_html__( 'Enter audio file URL (MP3 or OGG)', 'jevelin' ),
				'help' => esc_html__( 'Please note that not all WordPress installation supports media file upload by default', 'jevelin' ),
				'type'  => 'upload',
				'images_only' => false,
			),

        )
    ),

	'post-media-copyrights-section' => array(
        'type'     => 'box',
        'title'    => esc_html__('Media Copyrights Settings', 'jevelin'),
        'priority' => 'low',
        'options'  => array(

            'post-copyrights' => array(
                'type' => 'wp-editor',
				'teeny'  => true,
				'reinit' => true,
				'size'   => 'large',
                'label' => esc_html__( 'Copyrights Text', 'jevelin' ),
                'desc' => esc_html__( 'Enter copyrights text for your main featured image, video or media', 'jevelin' ),
            ),

        )
    ),

);
