<?php if ( ! defined( 'FW' ) && !function_exists( 'jevelin_framework' ) ) {
	die( 'Forbidden.' );
}

$options = array(

	'id' => array( 'type' => 'unique' ),
	'general' => array(
		'title'   => esc_html__( 'General', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'limit' => array(
			    'type'  => 'slider',
			    'value' => 6,
			    'properties' => array(
			        'min' => 1,
			        'max' => 41,
			    ),
			    'label' => esc_html__('Limit posts', 'jevelin'),
			    'desc'  => esc_html__('Choose post limit. Choose 41 posts to select unlimited posts', 'jevelin'),
			),

			'style' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Style', 'jevelin'),
				'desc'  => esc_html__( 'Choose main style for recent posts', 'jevelin' ),
				'value'	  => 'masonry',
				'choices' => array(
					// Standard
					'masonry masonry2' => esc_html__( 'Masonry 2.0', 'jevelin' ),
					'masonry masonry-shadow' => esc_html__( 'Masonry Shadow', 'jevelin' ),
					'masonry' => esc_html__('Masonry Standard', 'jevelin'),
					'grid masonry2' => esc_html__( 'Grid 2.0', 'jevelin' ),
					'grid' => esc_html__( 'Grid', 'jevelin' ),
					'mix masonry2' => esc_html__( 'Mix', 'jevelin' ),
					'large' => esc_html__( 'Large Images', 'jevelin' ),
					'medium' => esc_html__( 'Medium Images', 'jevelin' ),
					'small' => esc_html__( 'Small Images', 'jevelin' ),

					// Custom
					'largedate' => esc_html__('Date only', 'jevelin'),
					'largeimage' => esc_html__('Image only', 'jevelin'),
					'minimalistic' => esc_html__('Minimalistic', 'jevelin'),
				)
			),

			'columns' => array(
				'type'    => 'radio',
				'label'   => esc_html__('Columns', 'jevelin'),
				'desc'  => esc_html__( 'Choose columns count', 'jevelin' ),
				'value'	  => '3',
				'choices' => array(
					'2' => esc_html__( '2 columns', 'jevelin' ),
					'3' => esc_html__( '3 columns', 'jevelin' ),
					'4' => esc_html__( '4 columns', 'jevelin' ),
					'5' => esc_html__( '5 columns', 'jevelin' ),
				)
			),


			'carousel' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Carousel', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable carousel', 'jevelin' ),
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

		    'categories' => array(
		        'type'  => 'multi-select',
		        'label' => esc_html__('Blog Categories', 'jevelin'),
		        'desc'  => esc_html__('Choose which blog categories you want to show', 'jevelin'),
				'help'  => esc_html__("If you can't see the category you ar looking for, please start typing it in input field", 'jevelin'),
		        'population' => 'taxonomy',
		        'source' => 'category',
		        'prepopulate' => 200,
		        'limit' => 50,
		    ),

			'tags' => array(
		        'type'  => 'multi-select',
		        'label' => esc_html__('Blog Tags', 'jevelin'),
		        'desc'  => esc_html__('Choose which blog tags you want to show', 'jevelin'),
				'help'  => esc_html__("If you can't see the tag you ar looking for, please start typing it in input field", 'jevelin'),
		        'population' => 'taxonomy',
		        'source' => 'post_tag',
		        'prepopulate' => 200,
		        'limit' => 50,
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

			'margin_bottom' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Bottom Posts Margin', 'jevelin' ),
				'desc'  => esc_html__( 'Here you can set custom bottom post margin (top right bottom left). For example: 30px', 'jevelin' ),
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
				'desc' => esc_html__( 'Enable or disable element pagination', 'jevelin' ),
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
	),

	'categories_tab' => array(
		'title'   => esc_html__( 'Categories Switch', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'categories_switch' => array(
				'type' => 'switch',
				'label' => esc_html__( 'Categories Switch', 'jevelin' ),
				'desc' => esc_html__( 'Enable or disable element categories switch', 'jevelin' ),
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
	),

	'styling_tab' => array(
		'title'   => esc_html__( 'Styling', 'jevelin' ),
		'type'    => 'tab',
		'options' => array(

			'title_color' => array(
				'type'  => 'rgba-color-picker',
				'label' => esc_html__( 'Title Color', 'jevelin' ),
				'desc' => '',
			),

			'title_size'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title Size', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter title size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'help'  => esc_html__( 'Example: 18px;', 'jevelin' ),
			),




			'content_color' => array(
				'type'  => 'rgba-color-picker',
				'label' => esc_html__( 'Content Color', 'jevelin' ),
				'desc' => '',
			),

			'content_size'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Content Size', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter content size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'help'  => esc_html__( 'Example: 18px;', 'jevelin' ),
			),




			'category_color' => array(
				'type'  => 'rgba-color-picker',
				'label' => esc_html__( 'Category Color', 'jevelin' ),
				'desc' => '',
			),

			'category_size'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Category Size', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter category size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'help'  => esc_html__( 'Example: 18px;', 'jevelin' ),
			),

			'category_transform' => array(
				'type'  => 'select',
				'label' => esc_html__('Category Text Transform', 'jevelin'),
				'desc' => '',
				'choices' => array(
					'default' => esc_html__( 'Default', 'jevelin' ),
					'none' => esc_html__( 'None', 'jevelin' ),
					'uppercase' => esc_html__( 'Uppercase', 'jevelin' ),
					'lowercase' => esc_html__( 'Lowercase', 'jevelin' ),
					'capitalize' => esc_html__( 'Capitalize', 'jevelin' ),
				),
				'value'	=> 'default',
			),






			'readmore_color' => array(
				'type'  => 'rgba-color-picker',
				'label' => esc_html__( 'Read More Color', 'jevelin' ),
				'desc' => '',
			),

			'readmore_size'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Read More Size', 'jevelin' ),
				'desc'  => wp_kses( __( 'Enter read more size (with <b>px</b>)', 'jevelin' ), jevelin_allowed_html() ),
				'help'  => esc_html__( 'Example: 18px;', 'jevelin' ),
			),

			'readmore_transform' => array(
				'type'  => 'select',
				'label' => esc_html__('Read More Text Transform', 'jevelin'),
				'desc' => '',
				'choices' => array(
					'default' => esc_html__( 'Default', 'jevelin' ),
					'none' => esc_html__( 'None', 'jevelin' ),
					'uppercase' => esc_html__( 'Uppercase', 'jevelin' ),
					'lowercase' => esc_html__( 'Lowercase', 'jevelin' ),
					'capitalize' => esc_html__( 'Capitalize', 'jevelin' ),
				),
				'value'	=> 'default',
			),

		),
	),
);
