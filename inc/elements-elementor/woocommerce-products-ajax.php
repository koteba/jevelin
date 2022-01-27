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
class Jevelin_WooCommerce_Products_AJAX extends Widget_Base {

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
		return 'jevelin-woocommerce-products-ajax';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title() {
		return esc_attr__( 'WooCommerce Products AJAX', 'jevelin' );
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
                'posts_per_page',
                [
                    'label' => esc_attr__( 'Show Posts', 'gillion' ),
                    'description' => esc_attr__( 'Choose how many posts will be shown. Notice: Currently this element works only when using one instance per page', 'gillion' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '12',
                ]
            );

            $this->add_control(
                'load_more',
                [
                    'label' => esc_attr__( 'Load More Posts Per Page', 'gillion' ),
                    'description' => esc_attr__( 'Choose how many items will be loaded', 'gillion' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '4',
                ]
            );

            $this->add_control(
                'pagination_type',
                [
                    'label' => esc_attr__( 'Pagination Type', 'gillion' ),
                    'description' => esc_attr__( 'Choose pagination type', 'gillion' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'button' => esc_attr__( 'Load More button (on click)', 'gillion' ),
                        'infinite' => esc_attr__( 'Infinite loading (on scroll)', 'gillion' ),
                    ],
                    'default' => 'button',
                ]
            );

            $this->add_control(
                'columns',
                [
                    'label' => esc_attr__( 'Columns', 'gillion' ),
                    'description' => esc_attr__( 'Choose column count', 'gillion' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '3' => esc_attr__( 'Columns 3', 'gillion' ),
                        '4' => esc_attr__( 'Columns 4', 'gillion' ),
                    ],
                    'default' => '3',
                ]
            );

        $this->end_controls_section();
	}


	/**
	 * Render the widget output on the frontend.
	 */
	protected function render() {
		$atts = $settings = $this->get_settings_for_display();
        $view = trailingslashit( get_template_directory() ) . '/framework-customizations/extensions/shortcodes/shortcodes/woocommerce-recent-products-ajax/views/view.php';
		if( file_exists( $view ) ) :
	        include $view;
		endif;
	}
}
