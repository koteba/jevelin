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
class Jevelin_Team_Member extends Widget_Base {

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
		return 'jevelin-team-member';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title() {
		return esc_attr__( 'Team Member', 'jevelin' );
	}


	/**
	 * Retrieve the widget icon.
	 */
	 public function get_icon() {
 		return 'far fa-id-card';
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
                'image',
                [
                    'label' => esc_attr__( 'Image', 'gillion' ),
                    'description' => esc_attr__( 'Upload image', 'gillion' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'name',
                [
                    'label' => esc_attr__( 'Name', 'gillion' ),
                    'description' => esc_attr__( 'Enter name', 'gillion' ),
                    'type' => Controls_Manager::TEXT,
                ]
            );

            $this->add_control(
                'role',
                [
                    'label' => esc_attr__( 'Profession', 'gillion' ),
                    'description' => esc_attr__( 'Enter profession', 'gillion' ),
                    'type' => Controls_Manager::TEXT,
                ]
            );

            $this->add_control(
                'content',
                [
                    'label' => esc_attr__( 'Description', 'gillion' ),
                    'description' => esc_attr__( 'Enter description', 'gillion' ),
                    'type' => Controls_Manager::WYSIWYG,
                ]
            );

            $this->add_control(
                'facebook',
                [
                    'label' => esc_attr__( 'Facebook', 'gillion' ),
                    'description' => esc_attr__( 'Enter Facebook URL or leave it blank', 'gillion' ),
                    'type' => Controls_Manager::TEXT,
                ]
            );

            $this->add_control(
                'twitter',
                [
                    'label' => esc_attr__( 'Twitter', 'gillion' ),
                    'description' => esc_attr__( 'Enter Twitter URL or leave it blank', 'gillion' ),
                    'type' => Controls_Manager::TEXT,
                ]
            );

            $this->add_control(
                'instagram',
                [
                    'label' => esc_attr__( 'Instagram', 'gillion' ),
                    'description' => esc_attr__( 'Enter Instagram URL or leave it blank', 'gillion' ),
                    'type' => Controls_Manager::TEXT,
                ]
            );

            $this->add_control(
                'skype',
                [
                    'label' => esc_attr__( 'Skype', 'gillion' ),
                    'description' => esc_attr__( 'Enter Skype URL or leave it blank', 'gillion' ),
                    'type' => Controls_Manager::TEXT,
                ]
            );

            $this->add_control(
                'behance',
                [
                    'label' => esc_attr__( 'Behance', 'gillion' ),
                    'description' => esc_attr__( 'Enter Behance URL or leave it blank', 'gillion' ),
                    'type' => Controls_Manager::TEXT,
                ]
            );

            $this->add_control(
                'linkedin',
                [
                    'label' => esc_attr__( 'linkedin', 'gillion' ),
                    'description' => esc_attr__( 'Enter Linkedin URL or leave it blank', 'gillion' ),
                    'type' => Controls_Manager::TEXT,
                ]
            );

            $this->add_control(
                'tumblr',
                [
                    'label' => esc_attr__( 'Tumblr', 'gillion' ),
                    'description' => esc_attr__( 'Enter Tumblr URL or leave it blank', 'gillion' ),
                    'type' => Controls_Manager::TEXT,
                ]
            );


        $this->end_controls_section();
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_attr__( 'Style', 'jevelin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


            $this->add_control(
                'layout',
                [
                    'label' => esc_attr__( 'Style', 'gillion' ),
                    'description' => esc_attr__( 'Choose main style for accordion', 'gillion' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'style1' => esc_attr__( 'Style 1', 'gillion' ),
                        'style2' => esc_attr__( 'Style 2', 'gillion' ),
                        'style3' => esc_attr__( 'Style 3 (left alignment)', 'gillion' ),
                        'style4' => esc_attr__( 'Style 4', 'gillion' ),
                    ],
                    'default' => 'style1',
                ]
            );

            $this->add_control(
                'image_ratio',
                [
                    'label' => esc_attr__( 'Image Ratio', 'gillion' ),
                    'description' => esc_attr__( 'Select image aspect ratio', 'gillion' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'landscape' => esc_attr__( 'Landscape', 'gillion' ),
                        'portrait' => esc_attr__( 'Portrait', 'gillion' ),
                        'square' => esc_attr__( 'Square', 'gillion' ),
                    ],
                    'default' => 'landscape',
                ]
            );

            $this->add_control(
                'icon_style',
                [
                    'label' => esc_attr__( 'Social Media Position', 'gillion' ),
                    'description' => esc_attr__( 'Choose main style for social icons', 'gillion' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'standard' => esc_attr__( 'Standard', 'gillion' ),
                        'overlay' => esc_attr__( 'Overlay', 'gillion' ),
                        'overlay2' => esc_attr__( 'Overlay 2', 'gillion' ),
                    ],
                    'default' => 'standard',
                ]
            );

            $this->add_control(
                'color_name',
                [
                    'label' => esc_attr__( 'Name Color', 'gillion' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
						'{{WRAPPER}} .sh-team-name h3' => 'color: {{VALUE}}',
					],
                ]
            );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'el_name_typography',
					'label' => esc_attr__( 'Name Typography', 'jevelin' ),
					'scheme' => Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .sh-team-name h3',
				]
            );

            $this->add_control(
                'color_role',
                [
                    'label' => esc_attr__( 'Proffesion Color', 'gillion' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
						'{{WRAPPER}} .sh-team-role' => 'color: {{VALUE}}',
					],
                ]
            );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'el_proffesion_typography',
					'label' => esc_attr__( 'Proffesion Typography', 'jevelin' ),
					'scheme' => Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .sh-team-role',
				]
            );

            $this->add_control(
                'color_description',
                [
                    'label' => esc_attr__( 'Description Color', 'gillion' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
						'{{WRAPPER}} .sh-team-description' => 'color: {{VALUE}}',
					],
                ]
            );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'el_proffesion_description',
					'label' => esc_attr__( 'Description Typography', 'jevelin' ),
					'scheme' => Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .sh-team-description',
				]
            );

            $this->add_control(
                'color_accent',
                [
                    'label' => esc_attr__( 'Accent Color', 'gillion' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
						'{{WRAPPER}} .sh-team-social-overlay .sh-team-icons' => 'backgroud-color: {{VALUE}}',
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
        $view = trailingslashit( get_template_directory() ) . '/framework-customizations/extensions/shortcodes/shortcodes/team-member/views/view.php';
		if( file_exists( $view ) ) :
	        include $view;
		endif;
	}
}
