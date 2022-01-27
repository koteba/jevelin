<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(

	'id' => array( 'type' => 'unique' ),
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'image_ratio' => array(
				'type'  => 'radio',
				'label' => esc_html__('Image Ratio', 'jevelin'),
				'desc'  => esc_html__('Choose default image ratio', 'jevelin'),
				'choices' => array(
					'fluid' => esc_html__('Fluid', 'jevelin'),
					'landscape' => esc_html__('Landscape', 'jevelin'),
					'portrait' => esc_html__('Portrait', 'jevelin'),
					'square' => esc_html__('Square', 'jevelin'),
				),
				'value'	  => 'fluid',
			),

			'columns' => array(
				'type'    => 'select',
				'label'   => esc_html__('Columns', 'jevelin'),
				'desc'  => esc_html__('Select column count', 'jevelin'),
				'choices' => array(
					'2' => esc_html__('2 columns', 'jevelin'),
					'3' => esc_html__('3 columns', 'jevelin'),
					'4' => esc_html__('4 columns', 'jevelin'),
					'5' => esc_html__('5 columns', 'jevelin'),
				),
				'value'	  => '3',
			),

			'categories' => array(
			    'type'  => 'multi-select',
			    'label' => esc_html__('Categories', 'jevelin'),
			    'desc'  => esc_html__('Select categories', 'jevelin'),
			    'population' => 'taxonomy',
			    'source' => 'fw-portfolio-category',
			    'prepopulate' => 200,
			    'limit' => 100,
			),

			'limit' => array(
				'label' => esc_html__( 'Limit', 'jevelin' ),
				'desc'  => esc_html__( 'Enter item limit (default 6, infinite -1)', 'jevelin' ),
				'type'  => 'text',
				'value' => '6',
				'attr'  => array( 'style' => 'max-width: 60px;' ),
			),

			'spacing' => array(
				'label' => esc_html__( 'Spacing', 'jevelin' ),
				'desc'  => esc_html__( 'Enter portfolio item spacing (with px)', 'jevelin' ),
				'type'  => 'text',
				'value' => '15px',
				'attr'  => array( 'style' => 'max-width: 60px;' ),
			),

			'order_by' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Order By', 'jevelin'),
				'desc'  => esc_html__( 'Choose product order by', 'jevelin' ),
				'value'	  => 'date',
				'choices' => array(
					'date' => esc_html__('Date', 'jevelin'),
					'name' => esc_html__('Name', 'jevelin'),
					'author' => esc_html__('Author', 'jevelin'),
					'rand' => esc_html__('Random', 'jevelin'),
					'comment_count' => esc_html__('Comment Count', 'jevelin'),
				)
			),

			'order' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Order', 'jevelin'),
				'desc'  => esc_html__( 'Choose product order', 'jevelin' ),
				'value'	  => 'desc',
				'choices' => array(
					'asc' => esc_html__('Ascending', 'jevelin'),
					'desc' => esc_html__('Descending', 'jevelin'),
				)
			),

			'page_link' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Page Link', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable portfolio page link', 'jevelin' ),
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

		),
	),

	'filter_tab' => array(
		'title'   => esc_html__( 'Filter', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'filter' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Filter', 'jevelin'),
				'desc'  => esc_html__('Select filter style or disable it', 'jevelin'),
				'choices' => array(
					'none' => esc_html__('None', 'jevelin'),
					'default' => esc_html__('Style 1', 'jevelin'),
					'style2' => esc_html__('Style 2', 'jevelin'),
					'style3' => esc_html__('Style 3', 'jevelin'),
					'style3 sh-portfolio-filter-style4' => esc_html__('Style 4 (light background)', 'jevelin'),
					'style3 sh-portfolio-filter-style4 sh-portfolio-filter-style5' => esc_html__('Style 5 (dark background)', 'jevelin'),
				),
				'value'	  => 'default',
			),

			'filter_alignment' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Filter Alignment', 'jevelin'),
				'desc'  => esc_html__('Select filter alignment', 'jevelin'),
				'choices' => array(
					'left' => esc_html__('Left', 'jevelin'),
					'center' => esc_html__('Center', 'jevelin'),
					'right' => esc_html__('Right', 'jevelin'),
				),
				'value'	  => 'center',
			),

			'filter_mobile_alignment' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Mobile Filter Alignment', 'jevelin'),
				'desc'  => esc_html__('Select mobile filter alignment', 'jevelin'),
				'choices' => array(
					'left' => esc_html__('Left', 'jevelin'),
					'center' => esc_html__('Center', 'jevelin'),
					'right' => esc_html__('Right', 'jevelin'),
				),
				'value'	  => 'center',
			),

			'filter_icon' => array(
				'type'    => 'new-icon',
				'label'   => esc_html__('Filter Icon', 'jevelin'),
				'desc'  => esc_html__('Select filter icon', 'jevelin'),
			    'set' => 'jevelin-icons',
			    'value' => 'icon-layers'
			),

			'padding' => array(
				'type'  => 'text',
			    'label' => esc_html__('Padding', 'jevelin'),
				'desc'  => wp_kses( __( 'Enter your custom margin (<b>top right bottom left</b>)', 'jevelin' ), jevelin_allowed_html() ),
			    'value' => '0px 0px 0px 0px',
				'help'  => wp_kses( __( 'Example 1: 20px 0px 20px 0px <br>Example 2: 0% 15% 0% 15%', 'jevelin' ), jevelin_allowed_html() ),
			),

			'padding_mobile' => array(
			    'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
			    'value' => array(
			        'mobile' => 'off',
			    ),
			    'picker' => array(
					'padding_mobile' => array(
						'type' => 'switch',
						'label' => esc_html__( 'Custom Mobile Padding', 'jevelin' ),
						'desc' => esc_html__( 'Enable or disable custom mobile paddings', 'jevelin' ),
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
			    'choices' => array(
			        'on' => array(
						'padding' => array(
							'type'  => 'text',
						    'label' => esc_html__('Mobile Padding', 'jevelin'),
							'desc'  => wp_kses( __( 'Enter your custom mobile padding (<b>top right bottom left</b>)', 'jevelin' ), jevelin_allowed_html() ),
						    'value' => '0px 0px 0px 0px',
							'help'  => esc_html__( 'Example 1: 100px 0px 100px 0px <br>Example 2: 0% 15% 0% 15%', 'jevelin' ),
						),
			        ),
			    ),
			),

		),
	),
	'colors' => array(
		'title'   => esc_html__( 'Colors', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'overlay_color' => array(
				'type'  => 'rgba-color-picker',
				'label' => esc_html__('Overlay Color', 'jevelin'),
				'desc'  => esc_html__('Choose overlay color', 'jevelin'),
				'value' => ''
			),

			'overlay_second_color' => array(
				'type'  => 'rgba-color-picker',
				'label' => esc_html__('Overlay Second Color', 'jevelin'),
				'desc'  => esc_html__('Choose overlay second color to change color', 'jevelin'),
				'value' => ''
			),

		),
	),

	'pagination_tab' => array(
		'title'   => esc_html__( 'Pagination', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'pagination' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Pagination', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable portfolio pagination', 'jevelin' ),
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

			'pagination_filters' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Pagination Filters', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable portfolio pagination filters', 'jevelin' ),
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

			'pagination_per_page' => array(
				'label' => esc_html__( 'Projects Per Page', 'jevelin' ),
				'desc'  => esc_html__( 'Enter projects per page limit (default: 6)', 'jevelin' ),
				'type'  => 'text',
				'value' => '6',
				'attr'  => array( 'style' => 'max-width: 60px;' ),
			),

		),
	),

	'lazy_tab' => array(
		'title'   => esc_html__( 'Lazy Loading', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'lazy' => array(
				'type'    => 'radio',
				'label'   => esc_html__( 'Lazy Loading', 'jevelin' ),
				'desc'    => esc_html__( 'Choose to enable to disable lazy loading', 'jevelin' ),
				'value'	  => 'default',
				'choices' => array(
					'default' => esc_html__('Default (from theme settings)', 'jevelin'),
					'disabled' => esc_html__('Disabled', 'jevelin'),
					'enabled' => esc_html__('Enabled', 'jevelin'),
				)
			),

		),
	),
);
