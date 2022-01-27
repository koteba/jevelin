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
class Jevelin_Progress_Bar extends Widget_Base {

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
		return 'jevelin-progress-bar';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title() {
		return esc_attr__( 'Progress Bar', 'jevelin' );
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
                'title',
                [
                    'label' => esc_attr__( 'Title', 'gillion' ),
                    'description' => esc_attr__( 'Enter title', 'gillion' ),
                    'type' => Controls_Manager::TEXT,
                    'value' => esc_attr__( 'Title', 'gillion' ),
                ]
            );

            $this->add_control(
                'percentage',
                [
                    'label' => esc_attr__( 'Percentage', 'gillion' ),
                    'description' => esc_attr__( 'Enter percentage between 0-100 (without %)', 'gillion' ),
                    'type' => Controls_Manager::TEXT,
                    'value' => '50'
                ]
            );

            $this->add_control(
                'style',
                [
                    'label' => esc_attr__( 'Style', 'gillion' ),
                    'description' => esc_attr__( 'Choose main style', 'gillion' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'style1' => esc_attr__( 'Style 1', 'gillion' ),
                        'style2' => esc_attr__( 'Style 2', 'gillion' ),
                        'style3' => esc_attr__( 'Style 3', 'gillion' ),
                        'style4' => esc_attr__( 'Style 4', 'gillion' ),
                        'style5' => esc_attr__( 'Style 5', 'gillion' ),
                    ],
                    'default' => 'style1',
                ]
            );

            $this->add_control(
                'accent_color',
                [
                    'label' => esc_attr__( 'Accent Color', 'gillion' ),
                    'description' => esc_attr__( 'Select accent color or leave empty for global value', 'gillion' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sh-progress-status-value' => 'background-color: {{VALUE}}',
                        '{{WRAPPER}} .sh-progress-status-value-edge' => 'border-left-color: {{VALUE}}',
                        '{{WRAPPER}} .sh-progress-status-value:before' => 'border-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'background_color',
                [
                    'label' => esc_attr__( 'Background Color', 'gillion' ),
                    'description' => esc_attr__( 'Choose background color', 'gillion' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sh-progress-style1 .sh-progress-status, {{WRAPPER}} .sh-progress-style2 .sh-progress-content-container, {{WRAPPER}} .sh-progress-style3 .sh-progress-content-container, .sh-progress-style4 .sh-progress-status, .sh-progress-style5 .sh-progress-status' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

        $this->end_controls_section();
	}


	/**
	 * Render the widget output on the frontend.
	 */
	protected function render() {
		$atts = $settings = $this->get_settings_for_display();
        $view = trailingslashit( get_template_directory() ) . '/framework-customizations/extensions/shortcodes/shortcodes/progress-bar/views/view.php';
		if( file_exists( $view ) ) :
	        include $view;
		endif;
	}
}
