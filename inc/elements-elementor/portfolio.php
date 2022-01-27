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
class Jevelin_Portfolio extends Widget_Base {

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
		return 'jevelin-portfolio';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title() {
		return esc_attr__( 'Portfolio', 'jevelin' );
	}


	/**
	 * Retrieve the widget icon.
	 */
	 public function get_icon() {
 		return 'fas fa-images';
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
                  'style',
                  [
                      'label' => esc_attr__( 'Style', 'jevelin' ),
                      'description' => esc_attr__( 'Choose main style', 'jevelin' ),
                      'type' => Controls_Manager::SELECT,
                      'options' => [
                          'default' => esc_attr__( 'Standard', 'jevelin' ),
                          'default-shadow' => esc_attr__( 'Standard with Shadow', 'jevelin' ),
                          'default2' => esc_attr__( 'Trendy', 'jevelin' ),
                          'masonry' => esc_attr__( 'Gallery', 'jevelin' ),
                          'masonry2' => esc_attr__( 'Marginless Gallery', 'jevelin' ),
                          'minimalistic' => esc_attr__( 'Minimalistic', 'jevelin' ),
                      ],
                      'default' => 'default',
                  ]
              );

              $this->add_control(
                  'image_ratio',
                  [
                      'label' => esc_attr__( 'Image Ratio', 'jevelin' ),
                      'description' => esc_attr__( 'Choose default image ratio', 'jevelin' ),
                      'type' => Controls_Manager::SELECT,
                      'options' => [
                          'fluid' => esc_attr__( 'Fluid', 'jevelin' ),
                          'landscape' => esc_attr__( 'Landscape', 'jevelin' ),
                          'portrait' => esc_attr__( 'Portrait', 'jevelin' ),
                          'square' => esc_attr__( 'Square', 'jevelin' ),
                      ],
                      'default' => 'fluid',
                  ]
              );

              $this->add_control(
                  'overlay',
                  [
                      'label' => esc_attr__( 'Overlay', 'jevelin' ),
                      'description' => esc_attr__( 'Select overlat style or disable it', 'jevelin' ),
                      'type' => Controls_Manager::SELECT,
                      'options' => [
                          'none' => esc_attr__( 'Disable', 'jevelin' ),
                          'overlay1' => esc_attr__( 'Overlay 1 - Bottom bar', 'jevelin' ),
                          'overlay2' => esc_attr__( 'Overlay 2 - Text with description in top left (with seperation line)', 'jevelin' ),
                          'overlay3' => esc_attr__( 'Overlay 3 - Text with description in top left', 'jevelin' ),
                          'overlay4' => esc_attr__( 'Overlay 4 - Text and categories with link and view buttons in middle', 'jevelin' ),
                          'overlay4 overlay5' => esc_attr__( 'Overlay 5 - Link and view buttons in middle', 'jevelin' ),
                          'overlay4 overlay6' => esc_attr__( 'Overlay 6 - Text and categories in middle', 'jevelin' ),
                      ],
                      'default' => 'none',
                  ]
              );

              $this->add_control(
                  'columns',
                  [
                      'label' => esc_attr__( 'Columns', 'jevelin' ),
                      'description' => esc_attr__( 'Select column count', 'jevelin' ),
                      'type' => Controls_Manager::SELECT,
                      'options' => [
                          '2' => esc_attr__( '2 columns', 'jevelin' ),
                          '3' => esc_attr__( '3 columns', 'jevelin' ),
                          '4' => esc_attr__( '4 columns', 'jevelin' ),
                      ],
                      'default' => '2',
                  ]
              );

              $this->add_control(
                  'categories',
                  [
                      'label' => esc_attr__( 'Categories', 'jevelin' ),
                      'description' => esc_attr__( 'Enter categories (by names or slugs) and separate them with enter button', 'jevelin' ),
                      'type' => Controls_Manager::TEXTAREA,
                  ]
              );

              $this->add_control(
                  'categories_order',
                  [
                      'label' => esc_attr__( 'Category Order', 'jevelin' ),
                      'description' => esc_attr__( 'Choose category order', 'jevelin' ),
                      'type' => Controls_Manager::SELECT,
                      'options' => [
                          'asc' => esc_attr__( 'Ascending', 'jevelin' ),
                          'desc' => esc_attr__( 'Descending', 'jevelin' ),
                      ],
                      'default' => 'asc',
                  ]
              );

              $this->add_control(
                  'limit',
                  [
                      'label' => esc_attr__( 'Limit', 'jevelin' ),
                      'description' => esc_attr__( 'Enter item limit (default 6, infinite -1)', 'jevelin' ),
                      'type' => Controls_Manager::TEXT,
                      'default' => '6',
                  ]
              );

              $this->add_control(
                  'spacing',
                  [
                      'label' => esc_attr__( 'Spacing', 'jevelin' ),
                      'description' => esc_attr__( 'Enter portfolio item spacing (with px)', 'jevelin' ),
                      'type' => Controls_Manager::TEXT,
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
                  'page_link',
                  [
                      'label' => esc_attr__( 'Page Link', 'jevelin' ),
                      'description' => esc_attr__( 'Enable or disable portfolio page link', 'jevelin' ),
                      'type' => Controls_Manager::SELECT,
                      'options' => [
                          '' => esc_attr__( 'Off', 'jevelin' ),
                          '1' => esc_attr__( 'On', 'jevelin' ),
                      ],
                  ]
              );

              $this->add_control(
                  'layout',
                  [
                      'label' => esc_attr__( 'Layout', 'jevelin' ),
                      'description' => esc_attr__( 'Select portfolio layout. Grid layout is useful for maintaining correct item order', 'jevelin' ),
                      'type' => Controls_Manager::SELECT,
                      'options' => [
                          'masonry' => esc_attr__( 'Masonry', 'jevelin' ),
                          'grid' => esc_attr__( 'Grid', 'jevelin' ),
                      ],
                      'default' => 'masonry',
                  ]
              );

              $this->add_control(
                  'filter',
                  [
                      'label' => esc_attr__( 'Filter', 'jevelin' ),
                      'description' => esc_attr__( 'Select filter style or disable it', 'jevelin' ),
                      'type' => Controls_Manager::SELECT,
                      'options' => [
                          'none' => esc_attr__( 'None', 'jevelin' ),
                          'default' => esc_attr__( 'Style 1', 'jevelin' ),
                          'style2' => esc_attr__( 'Style 2', 'jevelin' ),
                          'style3' => esc_attr__( 'Style 3', 'jevelin' ),
                          'style3 sh-portfolio-filter-style4' => esc_attr__( 'Style 4', 'jevelin' ),
                      ],
                      'default' => 'none',
                  ]
              );

              $this->add_control(
                  'filter_all_limit',
                  [
                      'label' => esc_attr__( 'Limit All tab items', 'jevelin' ),
                      'description' => esc_attr__( 'Enter "All" tab item limit', 'jevelin' ),
                      'type' => Controls_Manager::TEXT,
                  ]
              );

              $this->add_control(
                  'pagination',
                  [
                      'label' => esc_attr__( 'Pagination', 'jevelin' ),
                      'description' => esc_attr__( 'Enable or disable portfolio pagination', 'jevelin' ),
                      'type' => Controls_Manager::SELECT,
                      'options' => [
                          '' => esc_attr__( 'Off', 'jevelin' ),
                          '1' => esc_attr__( 'On', 'jevelin' ),
                      ],
                  ]
              );

              $this->add_control(
                  'pagination_filters',
                  [
                      'label' => esc_attr__( 'Pagination Filters', 'jevelin' ),
                      'description' => esc_attr__( 'Enable or disable portfolio pagination filters', 'jevelin' ),
                      'type' => Controls_Manager::SELECT,
                      'options' => [
                          '' => esc_attr__( 'Off', 'jevelin' ),
                          '1' => esc_attr__( 'On', 'jevelin' ),
                      ],
                  ]
              );

              $this->add_control(
                  'pagination_per_page',
                  [
                      'label' => esc_attr__( 'Projects Per Page', 'jevelin' ),
                      'description' => esc_attr__( 'Enter projects per page limit (default: 6)', 'jevelin' ),
                      'type' => Controls_Manager::TEXT,
                      'default' => '6',
                  ]
              );


        $this->end_controls_section();
	}


	/**
	 * Render the widget output on the frontend.
	 */
	protected function render() {
		$atts = $settings = $this->get_settings_for_display();
        $view = trailingslashit( get_template_directory() ) . '/framework-customizations/extensions/shortcodes/shortcodes/portfolio/views/view.php';
		if( file_exists( $view ) ) :
	        include $view;
		endif;
	}
}
