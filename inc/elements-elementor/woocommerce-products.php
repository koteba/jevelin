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
class Jevelin_WooCommerce_Products extends Widget_Base {

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
		return 'jevelin-woocommerce-products';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title() {
		return esc_attr__( 'WooCommerce Products', 'jevelin' );
	}


	/**
	 * Retrieve the widget icon.
	 */
	 public function get_icon() {
		return 'fas fa-shopping-bag';
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
                'per_page',
                [
                    'label' => esc_attr__( 'Limit', 'jevelin' ),
                    'description' => esc_attr__( 'Choose products limit', 'jevelin' ),
                    'type' => Controls_Manager::TEXT,

                    'default' => '12',
                ]
            );

            $this->add_control(
                'columns',
                [
                    'label' => esc_attr__( 'Columns', 'jevelin' ),
                    'description' => esc_attr__( 'Choose product column count', 'jevelin' ),
                    'type' => Controls_Manager::TEXT,

                    'default' => '5',
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
                'style',
                [
                    'label' => esc_attr__( 'Style', 'jevelin' ),
                    'description' => esc_attr__( 'Choose item style', 'jevelin' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'style1' => esc_attr__( 'Style 1', 'jevelin' ),
                        'style2' => esc_attr__( 'Style 2', 'jevelin' ),
                    ],
                    'default' => 'style1',
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

        $this->end_controls_section();
	}


	/**
	 * Render the widget output on the frontend.
	 */
	protected function render() {
		$atts = $settings = $this->get_settings_for_display();
        $view = trailingslashit( get_template_directory() ) . '/framework-customizations/extensions/shortcodes/shortcodes/woocommerce-recent-products/views/view.php';
		if( file_exists( $view ) ) :
	        include $view;
		endif;
	}
}
