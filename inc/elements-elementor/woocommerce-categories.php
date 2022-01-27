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
class Jevelin_WooCommerce_Categories extends Widget_Base {

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
		return 'jevelin-woocommerce-categories';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title() {
		return esc_attr__( 'WooCommerce Categories', 'jevelin' );
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
                'categories',
                [
                    'label' => esc_attr__( 'Blog Categories', 'jevelin' ),
                    'description' => esc_attr__( 'Choose which blog categories you want to show', 'jevelin' ),
                    'type' => Controls_Manager::TEXTAREA,
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
                    ],
                    'default' => '2',
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

        $this->end_controls_section();
	}


	/**
	 * Render the widget output on the frontend.
	 */
	protected function render() {
		$atts = $settings = $this->get_settings_for_display();
        $view = trailingslashit( get_template_directory() ) . '/framework-customizations/extensions/shortcodes/shortcodes/woocommerce-categories/views/view.php';
		if( file_exists( $view ) ) :
	        include $view;
		endif;
	}
}
