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

                    'style' => array(
                        'label' => esc_html__('Portfolio Layout', 'jevelin'),
                        'desc'  => esc_html__('Choose portfolio layout', 'jevelin'),
                        'type'  => 'radio',
                        'value' => 'default',
                        'choices' => array(
                            'default' => esc_html__('Default', 'jevelin'),
                            'slider' => esc_html__('Gallery Slider', 'jevelin'),
							'gallery-slider-dynamic' => esc_html__('Gallery Dynamic Slider', 'jevelin'),
                            'video-slider' => esc_html__('Video Slider', 'jevelin'),
                            'iframe-slider' => esc_html__('Iframe Slider', 'jevelin'),
                        )
                    ),

                    'video' => array(
                        'type'  => 'text',
                        'value' => '',
                        'label' => esc_html__('Video URL', 'jevelin'),
                        'desc'  => wp_kses( __( 'Enter video URL from WordPress <a target="_blank" href="https://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F">supported video sites</a>. Only for video slider layout', 'jevelin' ), jevelin_allowed_html() ),
                    ),

                    'iframe' => array(
                        'type'  => 'text',
                        'value' => '',
                        'label' => esc_html__('Iframe URL', 'jevelin'),
                        'desc'  => wp_kses( __( 'Enter iframe URL. Only for iframe slider layout', 'jevelin' ), jevelin_allowed_html() ),
                    ),

                    'field_client' => array(
                        'type'  => 'text',
                        'value' => '',
                        'label' => esc_html__('Client', 'jevelin'),
                        'desc'  => esc_html__('Enter your client name', 'jevelin'),
                    ),

                    'field_link' => array(
                        'type'  => 'text',
                        'value' => '',
                        'label' => esc_html__('URL', 'jevelin'),
                        'desc'  => esc_html__('Enter your URL', 'jevelin'),
                    ),

                    'info'  => array(
                        'label' => esc_html__('Custom Fields', 'jevelin'),
                        'desc'  => esc_html__('Add some custom fields', 'jevelin'),
                        'type'  => 'addable-box',
                        'box-options' => array(
                            'title' => array( 'type' => 'text' ),
                            'description' => array( 'type' => 'textarea' ),
                            'icon' => array( 'type' => 'icon', 'set' => 'jevelin-icons', ),
                        ),
                        'template' => '{{- title }}',
                        'add-button-text' => esc_html__('Add', 'jevelin'),
                        'sortable' => true,
                    ),

                    'custom_url' => array(
                        'type'  => 'text',
                        'value' => '',
                        'label' => esc_html__('Custom URL', 'jevelin'),
                        'desc'  => esc_html__('Enter your custom URL where page will be redirected', 'jevelin'),
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
        ),
    ),

);
