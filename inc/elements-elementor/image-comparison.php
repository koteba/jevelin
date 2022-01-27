<?php
namespace ElementorJevelinElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Frontend;
use Elementor\ATTACH_IMAGE;
use vcBlogPostsFancy;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor - Blog Posts
 */
class Jevelin_Image_Comparison extends Widget_Base {

	/**
	 * Adds scripts
	 */
	public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );
        wp_enqueue_script( 'jevelin-event-move', get_template_directory_uri() . '/framework-customizations/extensions/shortcodes/shortcodes/image-comparison/static/jquery.event.move.js', [ 'jquery' ] );
        wp_enqueue_style( 'jevelin-twentytwenty-css', get_template_directory_uri() . '/framework-customizations/extensions/shortcodes/shortcodes/image-comparison/static/twentytwenty.css' );
        wp_enqueue_script( 'jevelin-twentytwenty-js', get_template_directory_uri() . '/framework-customizations/extensions/shortcodes/shortcodes/image-comparison/static/jquery.twentytwenty.js', [ 'jquery', 'jevelin-event-move' ] );
    }

	/**
	 * Retrieve the widget name.
	 */
	public function get_name() {
		return 'jevelin-image-comparison';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title() {
		return esc_attr__( 'Image Comparison', 'jevelin' );
	}


	/**
	 * Retrieve the widget icon.
	 */
	 public function get_icon() {
 		return 'far fa-images';
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
                'image_b',
                [
                    'label' => esc_attr__( 'Image Before (Left Side)', 'jevelin' ),
                    'description' => esc_attr__( 'Upload a image before', 'jevelin' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'image_a',
                [
                    'label' => esc_attr__( 'Image After (Right Side)', 'jevelin' ),
                    'description' => esc_attr__( 'Upload a image right', 'jevelin' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'text_b',
                [
                    'label' => esc_attr__( 'Image Caption (before)', 'jevelin' ),
                    'description' => esc_attr__( 'Enter image caption (before)', 'jevelin' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Before',
                ]
            );

            $this->add_control(
                'text_a',
                [
                    'label' => esc_attr__( 'Image Caption (after)', 'jevelin' ),
                    'description' => esc_attr__( 'Enter image caption (after)', 'jevelin' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'After',
                ]
            );

            $this->add_control(
                'button_color',
                [
                    'label' => esc_attr__( 'Button Color', 'jevelin' ),
                    'description' => esc_attr__( 'Select button color or leave blank for theme accent color', 'jevelin' ),
                    'type' => Controls_Manager::COLOR,
                ]
            );

            $this->add_control(
                'source',
                [
                    'label' => esc_attr__( 'Image Source', 'jevelin' ),
                    'description' => esc_attr__( 'Choose image source size', 'jevelin' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'large' => esc_attr__( 'Large Size (dynamic image sizes)', 'jevelin' ),
                        'full' => esc_attr__( 'Full Size (dynamic image sizes)', 'jevelin' ),
                        'jevelin-portrait' => esc_attr__( 'Portrait', 'jevelin' ),
                        'jevelin-square' => esc_attr__( 'Square', 'jevelin' ),
                        'jevelin-landscape-large' => esc_attr__( 'Landscape', 'jevelin' ),
                    ],
                    'default' => 'large',
                ]
            );

        $this->end_controls_section();
	}


	/**
	 * Render the widget output on the frontend.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$source = $settings['source'];
        $image_a = !empty( $settings['image_a']['id'] ) ? jevelin_image_url_by_id( $settings['image_a']['id'], $source ) : '';
        $image_b = !empty( $settings['image_b']['id'] ) ? jevelin_image_url_by_id( $settings['image_b']['id'], $source ) : '';
        $text_b = $settings['text_b'];
        $text_a = $settings['text_a'];
        $id = jevelin_rand();
        if( $image_b || $image_a ) : ?>

            <script type="text/javascript">
            	<?php echo ( jevelin_is_vc_front() ) ? 'jQuery(document).ready(function ($)' : 'jQuery(window).load(function()'; ?> {
            		if( jQuery.isFunction( jQuery.fn.twentytwenty ) ) {
            			jQuery("#image-comparison-<?php echo esc_js($id); ?>").twentytwenty({
            				default_offset_pct: 0.5,
            			});
            		}
            	});
            </script>

            <div class="sh-image-comparison-container">
            	<div id="image-comparison-<?php echo esc_attr( $id ); ?>" class="sh-image-comparison">
            		<img src="<?php echo esc_url( $image_b ); ?>" alt="<?php echo esc_attr( $text_b ); ?>" />
            		<img src="<?php echo esc_url( $image_a ); ?>" alt="<?php echo esc_attr( $text_a ); ?>" />
            	</div>
            </div>

        <?php endif;
	}
}
