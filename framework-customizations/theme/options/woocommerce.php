<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$woocommerce_options = array(
	'wc_sort' => array(
		'type' => 'switch',
		'label' => esc_html__( 'WooCommerce Sort', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable WooCommerce product sorting dropdown', 'jevelin' ),
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

	'wc_sort_sale' => array(
		'type' => 'switch',
		'label' => esc_html__( 'WooCommerce Sort by Sale', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable opaction to sort by sale', 'jevelin' ),
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

	'wc_lightbox' => array(
	    'type'  => 'radio',
	    'value' => 'jevelin',
	    'label' => esc_html__('WooCommerce Lightbox', 'jevelin'),
	    'desc'  => esc_html__('Choose WooCommerce lightbox', 'jevelin'),
	    'choices' => array(
	        'jevelin' => esc_html__( 'Jevelin Lightbox', 'jevelin' ),
	        'woocommerce' => esc_html__( 'WooCommerce Lightbox', 'jevelin' ),
			'disable' => esc_html__( 'Disable', 'jevelin' ),
	    ),
	    'inline' => false,
	),

	'wc_columns' => array(
	    'type'  => 'radio',
	    'value' => '4',
	    'label' => esc_html__('WooCommerce Columns', 'jevelin'),
	    'desc'  => esc_html__('Choose WooCommerce product column count', 'jevelin'),
	    'choices' => array(
	        '2' => esc_html__( '2 columns', 'jevelin' ),
	        '3' => esc_html__( '3 columns', 'jevelin' ),
	        '4' => esc_html__( '4 columns', 'jevelin' ),
	    ),
	    'inline' => false,
	),

	'wc_layout' => array(
	    'type'  => 'radio',
	    'value' => 'sidebar-left',
	    'label' => esc_html__('WooCommerce Layout', 'jevelin'),
	    'desc'  => esc_html__('Choose WooCommerce layout', 'jevelin'),
	    'choices' => array(
            'default' => esc_html__( 'Default', 'jevelin' ),
            'sidebar-left' => esc_html__( 'Sidebar Left', 'jevelin' ),
            'sidebar-right' => esc_html__( 'Sidebar Right', 'jevelin' ),
	    ),
	    'inline' => false,
	),

	'wc_items' => array(
	    'type'  => 'slider',
	    'value' => 12,
	    'properties' => array(
	        'min' => 1,
	        'max' => 40,
	    ),
	    'label' => esc_html__('Items Per Page', 'jevelin'),
	    'desc'  => esc_html__('Choose WooCommerce products per page', 'jevelin'),
	),

	'wc_items_additional_information' => array(
	    'type'  => 'radio',
	    'value' => 'cat',
	    'choices' => array(
	        'none' => esc_html__( 'None', 'jevelin' ),
	        'desc' => esc_html__( 'Short description', 'jevelin' ),
	        'cat' => esc_html__( 'Categories', 'jevelin' ),
	    ),
	    'label' => esc_html__('Items Additional Information', 'jevelin'),
	    'desc'  => esc_html__('Choose what kind of additional information will be shown under product title', 'jevelin'),
	),

	'wc_quantity_button' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Jevelin Quantity Button', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable Jevelin quantity button (by disabling it could fix some plugin compatibility issues)', 'jevelin' ),
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

	'wc_banner' => array(
		'label' => esc_html__( 'Banner', 'jevelin' ),
		'desc'  => esc_html__( 'You can upload a banner image, which will be shown in checkout page', 'jevelin' ),
		'type'  => 'upload'
	),

	'wc_banner_link' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__('Banner URL', 'jevelin'),
		'desc'  => esc_html__('Enter banner image URL', 'jevelin'),
	),



	'title_single_product_settings' => array(
	    'type'  => 'html-full',
	    'value' => '',
	    'label' => false,
	    'html'  => '<h3 class="hndle sh-custom-group-divder"><span>'.esc_html__('Single Product Page', 'jevelin').'</span></h3>',
	),

	'wc_layout_single' => array(
	    'type'  => 'radio',
	    'value' => 'default',
	    'label' => esc_html__('WooCommerce Layout', 'jevelin'),
	    'desc'  => esc_html__('Choose WooCommerce layout for Product Page', 'jevelin'),
	    'choices' => array(
            'default' => esc_html__( 'Default', 'jevelin' ),
            'sidebar-left' => esc_html__( 'Sidebar Left', 'jevelin' ),
            'sidebar-right' => esc_html__( 'Sidebar Right', 'jevelin' ),
	    ),
	    'inline' => false,
	),

	'wc_tabs' => array(
	    'type'  => 'radio',
	    'value' => 'right',
	    'choices' => array(
	        'right' => esc_html__( 'Right Side', 'jevelin' ),
	        'bottom' => esc_html__( 'Bottom', 'jevelin' ),
	    ),
	    'label' => esc_html__('Tabs Position', 'jevelin'),
	    'desc'  => esc_html__('Choose tab product tabs position', 'jevelin'),
	),

	'wc_related' => array(
		'type' => 'switch',
		'label' => esc_html__( 'Related Products', 'jevelin' ),
		'desc' => esc_html__( 'Enable or disable "Related products" in single product page', 'jevelin' ),
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
);


$options = array(
	'woocommerce' => array(
		'title'   => esc_html__( 'WooCommerce', 'jevelin' ),
		'type'    => 'tab',
		'icon'	  => 'fa fa-phone',
		'options' => array(
			'woocommerce-box' => array(
				'title'   => esc_html__( 'WooCommerce Settings', 'jevelin' ),
				'type'    => 'box',
				'options' => $woocommerce_options
			),
		)
	)
);
