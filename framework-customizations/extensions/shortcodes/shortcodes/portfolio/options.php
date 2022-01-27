<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(

	'id' => array( 'type' => 'unique' ),
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'style' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Style', 'jevelin'),
				'desc'  => esc_html__('Choose main style', 'jevelin'),
				'choices' => array(
					'default' => esc_html__('Standard', 'jevelin'),
					'default-shadow' => esc_html__('Standard with Shadow', 'jevelin'),
					'default2' => esc_html__('Trendy', 'jevelin'),
					'masonry' => esc_html__('Gallery', 'jevelin'),
					'masonry2' => esc_html__('Marginless Gallery', 'jevelin'),
					'minimalistic' => esc_html__('Minimalistic', 'jevelin'),
				),
				'value'	  => 'default',
			),

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

			'overlay' => array(
				'type'    => 'select',
				'label'   => esc_html__('Overlay', 'jevelin'),
				'desc'  => esc_html__('Select overlat style or disable it', 'jevelin'),
				'choices' => array(
					'none' => esc_html__('Disable', 'jevelin'),
					'overlay1' => esc_html__('Overlay 1 - Bottom bar', 'jevelin'),
					'overlay2' => esc_html__('Overlay 2 - Text with description in top left (with seperation line)', 'jevelin'),
					'overlay3' => esc_html__('Overlay 3 - Text with description in top left', 'jevelin'),
					'overlay4' => esc_html__('Overlay 4 - Text and categories with link and view buttons in middle', 'jevelin'),
					'overlay4 overlay5' => esc_html__('Overlay 5 - Link and view buttons in middle', 'jevelin'),
					'overlay4 overlay6' => esc_html__('Overlay 6 - Text and categories in middle', 'jevelin'),
				),
				'value'	  => 'overlay4',
			),

			'columns' => array(
				'type'    => 'select',
				'label'   => esc_html__('Columns', 'jevelin'),
				'desc'  => esc_html__('Select column count', 'jevelin'),
				'choices' => array(
					'2' => esc_html__('2 columns', 'jevelin'),
					'3' => esc_html__('3 columns', 'jevelin'),
					'4' => esc_html__('4 columns', 'jevelin'),
				),
				'value'	  => '3',
			),

			'categories' => array(
			    'type'  => 'multi-select',
			    'label' => esc_html__('Categories', 'jevelin'),
			    'desc'  => esc_html__('Enter categories (by names or slugs) and separate them with enter button', 'jevelin'),
			    'population' => 'taxonomy',
			    'source' => 'fw-portfolio-category',
			    'prepopulate' => 200,
			    'limit' => 100,
			),

			'categories_order' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Category Order', 'jevelin'),
				'desc'  => esc_html__( 'Choose category order', 'jevelin' ),
				'value'	  => 'asc',
				'choices' => array(
					'asc' => esc_html__('Ascending', 'jevelin'),
					'desc' => esc_html__('Descending', 'jevelin'),
				)
			),

			'limit' => array(
				'label' => esc_html__( 'Limit', 'jevelin' ),
				'desc'  => esc_html__( 'Enter item limit (default 6, infinite -1)', 'jevelin' ),
				'type'  => 'text',
				'value' => '6',
				'attr'  => array( 'style' => 'max-width: 60px;' ),
			),

			/*'limit_all_cat' => array(
				'label' => esc_html__( 'Limit "All" Category', 'jevelin' ),
				'desc'  => esc_html__( 'Enter "All" category item limit (default 0 - no limit)', 'jevelin' ),
				'type'  => 'text',
				'value' => '0',
				'attr'  => array( 'style' => 'max-width: 60px;' ),
			),*/

			'spacing' => array(
				'label' => esc_html__( 'Spacing', 'jevelin' ),
				'desc'  => esc_html__( 'Enter portfolio item spacing (with px)', 'jevelin' ),
				'type'  => 'text',
				'value' => '',
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

			'layout' => array(
				'type' => 'radio',
				'label' => esc_html__('Layout', 'jevelin'),
				'desc' => esc_html__('Select portfolio layout. Grid layout is useful for maintaining correct item order', 'jevelin'),
				'choices' => array(
					'masonry' => esc_html__( 'Masonry', 'jevelin' ),
					'grid' => esc_html__( 'Grid', 'jevelin' ),
				),
				'value' => 'masonry',
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
					'style3 sh-portfolio-filter-style4' => esc_html__('Style 4', 'jevelin'),
				),
				'value'	  => 'default',
			),

			'filter_icon' => array(
				'type'    => 'new-icon',
				'label'   => esc_html__('Filter Icon', 'jevelin'),
				'desc'  => esc_html__('Select filter icon', 'jevelin'),
			    'set' => 'jevelin-icons',
			    'value' => 'icon-layers'
			),

			'filter_all_limit' => array(
				'label' => esc_html__( 'Limit All tab items', 'jevelin' ),
				'desc'  => esc_html__( 'Enter "All" tab item limit', 'jevelin' ),
				'type'  => 'text',
				'value' => '',
				'attr'  => array( 'style' => 'max-width: 60px;' ),
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
);
