<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$social_options = array(
	'social_newtab' => array(
		'label' => esc_html__( 'Links In New Tab', 'jevelin' ),
		'desc'  => esc_html__( 'Enable or disable social media link opening in new tab', 'jevelin' ),
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

	'social_twitter' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Twitter URL', 'jevelin'),
		'desc'  => esc_html__('Enter your custom link to show the Twitter icon. Leave blank to hide this icon', 'jevelin'),
	),

	'social_facebook' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Facebok URL', 'jevelin'),
		'desc'  => esc_html__('Enter your custom link to show the Facebook icon. Leave blank to hide this icon', 'jevelin'),
	),

	'social_instagram' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Instagram URL', 'jevelin'),
		'desc'  => esc_html__('Enter your custom link to show the Instagram icon. Leave blank to hide this icon', 'jevelin'),
	),

	'social_youtube' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Youtube URL', 'jevelin'),
		'desc'  => esc_html__('Enter your custom link to show the Yotube icon. Leave blank to hide this icon', 'jevelin'),
	),

	'social_pinterest' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Pinterest URL', 'jevelin'),
		'desc'  => esc_html__('Enter your custom link to show the Pinterest icon. Leave blank to hide this icon', 'jevelin'),
	),

	'social_flickr' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Flickr URL', 'jevelin'),
		'desc'  => esc_html__('Enter your custom link to show the Flickr icon. Leave blank to hide this icon', 'jevelin'),
	),

	'social_dribbble' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Dribbble URL', 'jevelin'),
		'desc'  => esc_html__('Enter your custom link to show the Dribbble icon. Leave blank to hide this icon', 'jevelin'),
	),

	'social_linkedIn' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('LinkedIn URL', 'jevelin'),
		'desc'  => esc_html__('Enter your custom link to show the LinkedIn icon. Leave blank to hide this icon', 'jevelin'),
	),

	'social_skype' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Skype Nick', 'jevelin'),
		'desc'  => esc_html__('Enter your account name to show the Skype icon. Leave blank to hide this icon', 'jevelin'),
	),

	'social_snapchat' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Snapchat URL', 'jevelin'),
		'desc'  => esc_html__('Enter your custom link to show the Snapchat icon. Leave blank to hide this icon', 'jevelin'),
	),

	'social_spotify' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Spotify', 'jevelin'),
		'desc'  => esc_html__('Enter your account name to show the Spotify icon. Leave blank to hide this icon', 'jevelin'),
	),

	'social_soundcloud' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Soundcloud', 'jevelin'),
		'desc'  => esc_html__('Enter your account name to show the Soundcloud icon. Leave blank to hide this icon', 'jevelin'),
	),

	'social_reddit' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Reddit URL', 'jevelin'),
		'desc'  => esc_html__('Enter your custom link to show the Reddit icon. Leave blank to hide this icon', 'jevelin'),
	),

	'social_tumblr' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Tumblr URL', 'jevelin'),
		'desc'  => esc_html__('Enter your custom link to show the Tumblr icon. Leave blank to hide this icon', 'jevelin'),
	),

	'social_wordpress' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Wordpress URL', 'jevelin'),
		'desc'  => esc_html__('Enter your custom link to show the Wordpress icon. Leave blank to hide this icon', 'jevelin'),
	),

	'social_custom' => array(
	    'type' => 'addable-popup',
	    'label' => esc_html__('Custom Social Media', 'jevelin'),
	    'desc'  => esc_html__('Add custom icons not included in upper list for other social media links', 'jevelin'),
	    'template' => '{{- link }}',
	    'popup-title' => null,
	    'size' => 'small',
	    'limit' => 10,
	    'popup-options' => array(

			'icon' => array(
				'type'  => 'icon',
				'label' => esc_html__('Icon', 'jevelin'),
				'desc'  => esc_html__('Choose your media icon', 'jevelin'),
				'set' => 'jevelin-icons',
			),

			'link' => array(
				'type'  => 'text',
				'label' => esc_html__('URL', 'jevelin'),
				'desc'  => esc_html__('Enter your custom link to show the icon', 'jevelin'),
			),

	    ),
	),
);


$options = array(
	'social' => array(
		'title'   => esc_html__( 'Social Media', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(
			'social-box' => array(
				'title'   => esc_html__( 'Social Media Icons', 'jevelin' ),
				'type'    => 'box',
				'options' => $social_options
			),
		)
	)
);
