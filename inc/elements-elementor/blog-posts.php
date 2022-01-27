<?php
namespace ElementorJevelinElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Frontend;
use vcBlogPostsFancy;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor - Blog Posts
 */
class Jevelin_Blog_Posts extends Widget_Base {

	/**
	 * Adds scripts
	 */
	public function __construct($data = [], $args = null) {
       parent::__construct($data, $args);
    }

	/**
	 * Retrieve the widget name.
	 */
	public function get_name() {
		return 'jevelin-blog-posts';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title() {
		return esc_attr__( 'Blog Posts', 'jevelin' );
	}


	/**
	 * Retrieve the widget icon.
	 */
	 public function get_icon() {
 		return 'fas fa-pencil-alt';
 	}


	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories() {
		return [ 'jevelin' ];
	}


	/**
	 * Register the widget controls.
	 */
	protected function _register_controls() {
		$this->start_controls_section(
		    'section_content',
		    [
		        'label' => esc_attr__( 'Content', 'jevelin' ),
		    ]
		);

            $this->add_control(
                'limit',
                [
                    'label' => esc_attr__( 'Limit posts', 'jevelin' ),
                    'description' => esc_attr__( 'Choose post limit. Choose 41 posts to select unlimited posts', 'jevelin' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '6',
                ]
            );

            $this->add_control(
                'style',
                [
                    'label' => esc_attr__( 'Style', 'jevelin' ),
                    'description' => esc_attr__( 'Choose main style for recent posts', 'jevelin' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'masonry masonry2' => esc_attr__( 'Masonry 2.0', 'jevelin' ),
                        'masonry masonry-shadow' => esc_attr__( 'Masonry Shadow', 'jevelin' ),
                        'masonry' => esc_attr__( 'Masonry Standard', 'jevelin' ),
                        'grid masonry2' => esc_attr__( 'Grid 2.0', 'jevelin' ),
                        'grid' => esc_attr__( 'Grid', 'jevelin' ),
                        'mix masonry2' => esc_attr__( 'Mix', 'jevelin' ),
                        'large' => esc_attr__( 'Large Images', 'jevelin' ),
                        'medium' => esc_attr__( 'Medium Images', 'jevelin' ),
                        'small' => esc_attr__( 'Small Images', 'jevelin' ),
                        'largedate' => esc_attr__( 'Date only', 'jevelin' ),
                        'largeimage' => esc_attr__( 'Image only', 'jevelin' ),
                        'minimalistic' => esc_attr__( 'Minimalistic', 'jevelin' ),
                    ],
                    'default' => 'masonry masonry2',

                ]
            );

            $this->add_control(
                'columns',
                [
                    'label' => esc_attr__( 'Columns', 'jevelin' ),
                    'description' => esc_attr__( 'Choose columns count', 'jevelin' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '2' => esc_attr__( '2 columns', 'jevelin' ),
                        '3' => esc_attr__( '3 columns', 'jevelin' ),
                        '4' => esc_attr__( '4 columns', 'jevelin' ),
                        '5' => esc_attr__( '5 columns', 'jevelin' ),
                    ],
                    'default' => '2',
                ]
            );


            $this->add_control(
                'carousel',
                [
                    'label' => esc_attr__( 'Carousel', 'jevelin' ),
                    'description' => esc_attr__( 'Enable or disable carousel', 'jevelin' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '' => esc_attr__( 'Off', 'jevelin' ),
                        '1' => esc_attr__( 'On', 'jevelin' ),
                    ],
                ]
            );

            $this->add_control(
                'categories',
                [
                    'label' => esc_attr__( 'Blog Categories', 'jevelin' ),
                    'description' => esc_attr__( 'Choose which blog categories you want to show', 'jevelin' ),
                    'type' => Controls_Manager::TEXTAREA,

                ]
            );

            $this->add_control(
                'tags',
                [
                    'label' => esc_attr__( 'Blog Tags', 'jevelin' ),
                    'description' => esc_attr__( 'Choose which blog tags you want to show', 'jevelin' ),
                    'type' => Controls_Manager::TEXTAREA,

                ]
            );

            $this->add_control(
                'order_by',
                [
                    'label' => esc_attr__( 'Order By', 'jevelin' ),
                    'description' => esc_attr__( 'Choose product order by', 'jevelin' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'date' => esc_attr__( 'Date', 'jevelin' ),
                        'name' => esc_attr__( 'Name', 'jevelin' ),
                        'author' => esc_attr__( 'Author', 'jevelin' ),
                        'rand' => esc_attr__( 'Random', 'jevelin' ),
                        'comment_count' => esc_attr__( 'Comment Count', 'jevelin' ),
                    ],
                    'default' => 'date',
                ]
            );

            $this->add_control(
                'order',
                [
                    'label' => esc_attr__( 'Order', 'jevelin' ),
                    'description' => esc_attr__( 'Choose product order', 'jevelin' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'asc' => esc_attr__( 'Ascending', 'jevelin' ),
                        'desc' => esc_attr__( 'Descending', 'jevelin' ),
                    ],
                    'default' => 'asc',
                ]
            );

            $this->add_control(
                'margin_bottom',
                [
                    'label' => esc_attr__( 'Bottom Posts Margin', 'jevelin' ),
                    'description' => esc_attr__( 'Here you can set custom bottom post margin (top right bottom left). For example: 30px', 'jevelin' ),
                    'type' => Controls_Manager::TEXT,
                ]
            );

            $this->add_control(
                'pagination',
                [
                    'label' => esc_attr__( 'Pagination', 'jevelin' ),
                    'description' => esc_attr__( 'Enable or disable element pagination', 'jevelin' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'off' => esc_attr__( 'Off', 'jevelin' ),
                        'on' => esc_attr__( 'On', 'jevelin' ),
                    ],
                    'default' => 'off',
                ]
            );

            $this->add_control(
                'categories_switch',
                [
                    'label' => esc_attr__( 'Categories Switch', 'jevelin' ),
                    'description' => esc_attr__( 'Enable or disable element categories switch', 'jevelin' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'off' => esc_attr__( 'Off', 'jevelin' ),
                        'on' => esc_attr__( 'On', 'jevelin' ),
                    ],
                    'default' => 'off',
                ]
            );


        $this->end_controls_section();
		$this->start_controls_section(
			'styling_section',
			[
				'label' => esc_attr__( 'Styling', 'jevelin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


            $this->add_control(
                'el_title_color',
                [
                    'label' => esc_attr__( 'Title Color', 'jevelin' ),
                    'description' => esc_attr__( '', 'jevelin' ),
                    'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .post-title' => 'color: {{VALUE}}',
						'{{WRAPPER}} .post-title > *' => 'color: {{VALUE}}',
					],
                ]
            );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'el_title_typography',
					'label' => esc_attr__( 'Title Typography', 'jevelin' ),
					'scheme' => Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .post-title, {{WRAPPER}} .post-title > *',
				]
            );



            $this->add_control(
                'el_content_color',
                [
                    'label' => esc_attr__( 'Content Color', 'jevelin' ),
                    'description' => esc_attr__( '', 'jevelin' ),
                    'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} article.post-item .post-content' => 'color: {{VALUE}}',
						'{{WRAPPER}} article.post-item .post-content > *' => 'color: {{VALUE}}',
					],
                ]
            );

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'el_content_size',
					'label' => esc_attr__( 'Content Typography', 'jevelin' ),
					'scheme' => Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} article.post-item .post-content, {{WRAPPER}} article.post-item .post-content > *',
				]
            );



			$this->add_control(
                'el_category_color',
                [
                    'label' => esc_attr__( 'Category Color', 'jevelin' ),
                    'description' => esc_attr__( '', 'jevelin' ),
                    'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} article.post-item .post-meta-categories' => 'color: {{VALUE}}',
						'{{WRAPPER}} article.post-item .post-meta-categories > *' => 'color: {{VALUE}}!important ',
					],
                ]
            );

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'el_category_typography',
					'label' => esc_attr__( 'Category Typography', 'jevelin' ),
					'scheme' => Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} article.post-item .post-meta-categories, {{WRAPPER}} article.post-item .post-meta-categories > *',
				]
            );



			$this->add_control(
                'el_readmore_color',
                [
                    'label' => esc_attr__( 'Read More Color', 'jevelin' ),
                    'description' => esc_attr__( '', 'jevelin' ),
                    'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} article.post-item .post-readmore > div:first-child' => 'color: {{VALUE}}',
					],
                ]
            );

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'el_readmore_typography',
					'label' => esc_attr__( 'Read More Typography', 'jevelin' ),
					'scheme' => Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} article.post-item .post-readmore > div:first-child',
				]
            );


        $this->end_controls_section();
	}


	/**
	 * Render the widget output on the frontend.
	 */
	protected function render() {
		$atts = $settings = $this->get_settings_for_display();
        $view = trailingslashit( get_template_directory() ) . '/framework-customizations/extensions/shortcodes/shortcodes/blog-posts/views/view.php';
		if( file_exists( $view ) ) :
	        include $view;
		endif;
	}
}
