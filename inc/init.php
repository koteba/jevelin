<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );
/**
 * Unyson framewrok init
 */
function shufflehound_theme( $caps = 0 ) {
	$name = 'jevelin';
	return ( $caps == 1 ) ? ucfirst( $name ) : $name;
}

class Jevelin_Theme_Includes
{
	private static $rel_path = null;

	private static $include_isolated_callable;

	private static $initialized = false;

	public static function init()
	{
		if (self::$initialized) {
			return;
		} else {
			self::$initialized = true;
		}

		/**
		 * Include a file isolated, to not have access to current context variables
		 */
		self::$include_isolated_callable = function( $path ) {
			include $path;
		};


		/**
		 * Both frontend and backend
		 */
		{
			global $pagenow;
			$plugin_activation = ( $pagenow == 'plugins.php' ) ? 1 : 0;
			$plugin_tgmpa_activation = ( isset( $_GET['page'] ) && $_GET['page'] == 'tgmpa-install-plugins' ) ? 1 : 0;
			$migration_page = ( is_admin() && isset( $_GET['page'] ) && $_GET['page'] == 'shufflehound_framework_upgrade' ) ? true : false;
			/* Load when doing AJAX */
			if( defined('DOING_AJAX') && DOING_AJAX ) :
				self::include_child_first('/ajax.php');
			endif;


			/* Basic loading */
			self::include_child_first('/plugins/redux/framework.php');
			self::include_child_first('/plugins/redux/migration.php');
			self::include_child_first('/helpers.php');
			self::include_child_first('/hooks.php');
			self::include_child_first('/plugins/amp/amp.php');
			self::include_child_first('/schema.php');


			// Load unyson
			if( defined( 'FW' ) && jevelin_framework() == 'unyson' ) :
				self::include_child_first('/plugins/unyson/unyson.php');
				if( is_admin() ) :
					self::include_child_first('/plugins/unyson/unyson-demos.php');
				endif;
			endif;
			if( defined( 'FW' ) ) :
				self::include_child_first('/plugins/unyson/unyson-icons.php');
			endif;


			// Load redux
			if( in_array( jevelin_framework(), [ 'redux', 'both' ] ) || $migration_page ) :
				self::include_child_first('/plugins/redux/redux.php');
			endif;

			// Load Redux Portfolio
			self::include_child_first('/plugins/redux/portfolio.php');

			// Metaboxes
			if( !defined( 'FW' ) || in_array( jevelin_framework(), [ 'redux', 'both' ] ) || $migration_page ) :
				if( in_array( jevelin_framework(), [ 'redux', 'both' ] ) || $migration_page ) :
					self::include_child_first('/plugins/metaboxes/metaboxes-options.php');
				endif;
			endif;
			if( !defined( 'FW' ) ) :
				self::include_child_first('/plugins/metaboxes/metaboxes-megamenu.php');
			endif;
			self::include_child_first('/plugins/metaboxes/metaboxes.php');


			/* Load when in administration panel */
			if( is_admin() ) :
				self::include_child_first('/admin.php');
				self::include_child_first('/core/start.php');
				self::include_child_first('/plugins/tgmpa/install-plugins.php');

				/* Include OCDI functions only if plugin activated and PHP version meets min requirments to avoid fatal errors */
				$phpversion = phpversion();
				if( class_exists( 'OCDI_Plugin' ) && version_compare( (float)$phpversion, '5.3.2', '>' ) ) {
					self::include_child_first('/plugins/ocdi/ocdi-demos.php');
				}
			endif;


			/* Load WPBakery */
			if( defined( 'WPB_VC_VERSION' ) ) :
				self::include_child_first('/plugins/wpbakery/wpbakery.php');
				self::include_child_first('/plugins/wpbakery/wpbakery-sections.php');
				self::include_child_first('/plugins/wpbakery/wpbakery-templates-content.php');
				self::include_child_first('/plugins/wpbakery/wpbakery-templates.php');
			endif;


			/* Load Elementor */
			if( did_action( 'elementor/loaded' ) ) :
                if( !$plugin_activation && !$plugin_tgmpa_activation ) :
    				self::include_child_first( '/plugins/elementor/elementor.php' );
    				self::include_child_first( '/plugins/elementor/elementor-elements.php' );
                endif;
			endif;


			add_action('init', array(__CLASS__, '_action_init'));
			add_action('widgets_init', array(__CLASS__, '_action_widgets_init'));
		}

		/**
		 * Only frontend
		 */
		if (!is_admin()) {
			add_action('wp_enqueue_scripts', array(__CLASS__, '_action_enqueue_scripts'),
				20 // Include later to be able to make wp_dequeue_style|script()
			);
		}
	}

	private static function get_rel_path($append = '')
	{
		if (self::$rel_path === null) {
			self::$rel_path = '/inc';
		}

		return self::$rel_path . $append;
	}

	private static function include_all_child_first($dir_rel_path)
	{
		$paths = array();

		if (is_child_theme()) {
			$paths[] = self::get_child_path($dir_rel_path);
		}

		$paths[] = self::get_parent_path($dir_rel_path);

		foreach ($paths as $path) {
			if ($files = glob($path .'/*.php')) {
				foreach ($files as $file) {
					self::include_isolated($file);
				}
			}
		}
	}

	/**
	 * @param string $dirname 'foo-bar'
	 * @return string 'Foo_Bar'
	 */
	private static function dirname_to_classname($dirname) {
		$class_name = explode('-', $dirname);
		$class_name = array_map('ucfirst', $class_name);
		$class_name = implode('_', $class_name);

		return $class_name;
	}

	public static function get_parent_path($rel_path)
	{
		return get_template_directory() . self::get_rel_path($rel_path);
	}

	public static function get_child_path($rel_path)
	{
		if (!is_child_theme()) {
			return null;
		}

		return get_stylesheet_directory() . self::get_rel_path($rel_path);
	}

	public static function include_isolated($path)
	{
		call_user_func(self::$include_isolated_callable, $path);
	}

	public static function include_child_first($rel_path)
	{
		if (is_child_theme()) {
			$path = self::get_child_path($rel_path);

			if (file_exists($path)) {
				self::include_isolated($path);
			}
		}

		{
			$path = self::get_parent_path($rel_path);

			if (file_exists($path)) {
				self::include_isolated($path);
			}
		}
	}

	/**
	 * @internal
	 */
	public static function _action_enqueue_scripts()
	{
		self::include_child_first('/static.php');
	}

	/**
	 * @internal
	 */
	public static function _action_init()
	{
		self::include_child_first('/menus.php');
	}

	/**
	 * @internal
	 */
	public static function _action_widgets_init()
	{
		{
			$paths = array();

			if( is_child_theme() ) :
				$paths[] = self::get_child_path('/widgets');
			endif;

			$paths[] = self::get_parent_path('/widgets');
		}

		$included_widgets = array();

		foreach ($paths as $path) {
			$dirs = glob($path .'/*', GLOB_ONLYDIR);

			if (!$dirs) {
				continue;
			}

			foreach ($dirs as $dir) {
				$dirname = wp_basename($dir);

				if (isset($included_widgets[$dirname])) {
					// this happens when a widget in child theme wants to overwrite the widget from parent theme
					continue;
				} else {
					$included_widgets[$dirname] = true;
				}

				self::include_isolated($dir .'/class-widget-'. $dirname .'.php');

				$widget_class = 'Widget_' . self::dirname_to_classname( $dirname );
				if ( class_exists( $widget_class ) ) {
					register_widget( $widget_class );
				}

			}
		}
	}
}

Jevelin_Theme_Includes::init();
