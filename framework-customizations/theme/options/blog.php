<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$blog_options = array(
	'pagination' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Pagination', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable pagination', 'jevelin' ),
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

	'blog-items' => array(
	    'type'  => 'slider',
	    'value' => 12,
	    'properties' => array(
	        'min' => 1,
	        'max' => 30,
	    ),
	    'label' => esc_html__('Blog Posts Per Page', 'jevelin'),
	    'desc'  => esc_html__('Choose how many posts will be disaplayed per page', 'jevelin'),
	),

	'blog_round_images' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Round Images', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable round images for blog posts', 'jevelin' ),
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



	'post_title' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Post Settings', 'jevelin').'</span></h3>',
	),

	'post_layout' => array(
	    'type'  => 'radio',
	    'value' => 'sidebar-right',
	    'label' => esc_html__('Post Template', 'jevelin'),
	    'desc'  => esc_html__('Choose post template', 'jevelin'),
	    'choices' => array(
	        'default' => esc_html__( 'Default', 'jevelin' ),
	        'sidebar-left' => esc_html__( 'Sidebar Left', 'jevelin' ),
	        'sidebar-right' => esc_html__( 'Sidebar Right', 'jevelin' ),
	    ),
	    'inline' => false,
	),

	'post_overlay' => array(
	    'type'  => 'select',
	    'value' => 'style1',
	    'label' => esc_html__('Post Overlay', 'jevelin'),
	    'desc'  => esc_html__('Choose post overlay style', 'jevelin'),
	    'choices' => array(
	        'style1' => esc_html__( 'Style 1', 'jevelin' ),
	        'style2' => esc_html__( 'Style 2', 'jevelin' ),
	        'style3' => esc_html__( 'Style 3', 'jevelin' ),
	    ),
	    'inline' => false,
	),

	'post_elements' => array(
	    'type'  => 'checkboxes',
	    'value' => array(
	    	'date' => true,
	        'prev_next' => true,
	        'athor_box' => true,
	        'share' => true,
			'related_posts' => true,
	        'comments' => true,
	    ),
	    'label' => esc_html__('Post Elements', 'jevelin'),
	    'desc'  => esc_html__('Select post elements you want to see in blog', 'jevelin'),
	    'choices' => array(
	    	'date' => esc_html__('Date', 'jevelin'),
	        'share' => esc_html__('Share', 'jevelin'),
	        'prev_next' => esc_html__('Prev/next links', 'jevelin'),
	        'athor_box' => esc_html__('Author additional information box', 'jevelin'),
			'related_posts' => esc_html__('Related posts', 'jevelin'),
	        'comments' => esc_html__('Comments', 'jevelin'),
	    ),
	    'inline' => false,
	),

	'post_related_posts' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Related Posts', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable related posts', 'jevelin' ),
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

	'post_main_image_lightbiox' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Post Featured Image Lightbox', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable single blog post featured image lightbox', 'jevelin' ),
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

	'post_desc' => array(
	    'type'  => 'slider',
	    'value' => 45,
	    'properties' => array(
	        'min' => 10,
	        'max' => 250,
	    ),
	    'label' => esc_html__('Description Length (words)', 'jevelin'),
	    'desc'  => esc_html__('Choose post description preview length', 'jevelin'),
	),
);


$options = array(
	'blog' => array(
		'title'	=> esc_html__( 'Blog', 'jevelin' ),
		'type'	=> 'tab',
		'icon'	=> 'fa fa-phone',
		'options' => array(
			'blog-box' => array(
				'title'   => esc_html__( 'Blog Settings', 'jevelin' ),
				'type'    => 'box',
				'options' => $blog_options
			),
		)
	)
);
