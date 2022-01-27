<?php
namespace ElementorJevelinElements;
/**
 * Gillion Load Elements
 */
if( !class_exists( 'JevelinElementsLoad' ) ) :
	class JevelinElementsLoad {

		private static $_instance = null;
		private static $elements = [
			// Jevelin
			'blog-posts' => 'Blog_Posts',
			'portfolio' => 'Portfolio',
			'image-comparison' => 'Image_Comparison',
			'progress-bar' => 'Progress_bar',
			'team-member' => 'Team_Member',
			'woocommerce-products' => 'WooCommerce_Products',
			'woocommerce-products-ajax' => 'WooCommerce_Products_AJAX',
			'woocommerce-categories' => 'WooCommerce_Categories',
		];


		/*
		** Register widgets
		*/
		public function __construct() {
			// Load Elementor elements
			add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
		}


		/*
		** Ensures only one instance of the class is loaded or can be loaded.
		**/
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}


		/**
		** Load widgets files
		*/
		private function include_widgets_files() {
			foreach( self::$elements as $key => $element ) :
				require_once ( trailingslashit( get_template_directory() ) . '/inc/elements-elementor/' . esc_attr( $key ) . '.php' );
			endforeach;
		}


		/**
		 * Register widgets by classes
		 */
		public function register_widgets() {
			$this->include_widgets_files();
			foreach( self::$elements as $element ) :
				$class = 'ElementorJevelinElements\\Widgets\\Jevelin_'.$element;
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new $class() );
			endforeach;
		}
	}

	JevelinElementsLoad::instance();
endif;
