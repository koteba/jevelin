<?php
if ( ! defined( 'ABSPATH' ) ) { die( 'Access forbidden.' ); }
/**
 * Include static files: javascript and css
 */

if ( is_admin() ) {
	return;
}


/**
 * Load JavaScript files
 */
wp_enqueue_script( 'jquery-effects-core' );
wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/plugins/bootstrap.min.js', array( 'jquery' ), '3.3.4', true );
wp_enqueue_script( 'jevelin-plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ) );
wp_enqueue_script( 'jevelin-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ) );
wp_enqueue_script( 'instagramFeed', get_template_directory_uri() . '/js/plugins/jquery.instagramFeed.min.js', array( 'jquery' ), '1.0', true );
wp_localize_script( 'jevelin-scripts', 'jevelin_loadmore_posts', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ));

if(
	( function_exists( 'fw_get_db_customizer_option' ) && fw_get_db_customizer_option('smooth-scrooling') == true ) ||
	( function_exists( 'fw_get_db_settings_option' ) && fw_get_db_settings_option('smooth-scrooling') == true ) &&
	!function_exists( 'shufflehound_disable_smooth_scrolling' )
) :
	wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/plugins/smoothscroll.js', array( ), '1.4.4', true );
endif;


/* Unminified files
wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.4', true );
wp_enqueue_script( 'sumoselect', get_template_directory_uri() . '/js/jquery.sumoselect.min.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'hoverIntent', get_template_directory_uri() . '/js/hoverIntent.js', array( 'jquery' ), 'r7', true );
wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '1.7.5', true );
wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array( ), '1.2.2', true );
wp_enqueue_script( 'vide', get_template_directory_uri() . '/js/jquery.vide.js', array( 'jquery' ), '0.3.7', true );
wp_enqueue_script( 'resizesensor', get_template_directory_uri() . '/js/jquery.resize.sensor.js', array( 'jquery' ), '0.3', true );
wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.5.9', true );
wp_enqueue_script( 'lightcase', get_template_directory_uri() . '/js/lightcase.min.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'typed', get_template_directory_uri() . '/js/typed.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'jarallax', get_template_directory_uri() . '/js/jarallax.min.js', array( 'jquery' ), '1.5.2', true );
wp_enqueue_script( 'jarallax-video', get_template_directory_uri() . '/js/jarallax-video.min.js', array( 'jquery' ), '1.0.1', true );
wp_enqueue_script( 'jssocials', get_template_directory_uri() . '/js/jssocials.min.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array( 'jquery' ) );
wp_enqueue_script( 'counterup', get_template_directory_uri() . '/js/jquery.counterup.min.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'velocity', get_template_directory_uri() . '/js/velocity.min.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'viewportChecker', get_template_directory_uri() . '/js/jquery.viewportChecker.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'simpleselect', get_template_directory_uri() . '/js/jquery.simpleselect.min.js', array( 'jquery', 'masonry' ), '1.0', true );
wp_enqueue_script( 'hoverdir', get_template_directory_uri() . '/js/jquery.hoverdir.js', array( 'jquery' ), '1.0', true );
wp_enqueue_script( 'actual', get_template_directory_uri() . '/js/jquery.actual.min.js', array( 'jquery' ), '1.0.16', true );
wp_enqueue_script( 'jevelin-jquery-cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array( 'jquery' ) );

wp_enqueue_script( 'jevelin-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery', 'masonry' ), '1.0', true );*/


/**
 * Load CSS files
 */
wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/plugins/bootstrap.min.css', array(), '3.3.4' );
wp_enqueue_style( 'jevelin-plugins', get_template_directory_uri() . '/css/plugins.css' );
wp_enqueue_style( 'jevelin-shortcodes', get_template_directory_uri() . '/css/shortcodes.css' );
wp_enqueue_style( 'jevelin-styles', get_template_directory_uri() . '/style.css', array() );
wp_enqueue_style( 'jevelin-responsive', get_template_directory_uri() . '/css/responsive.css' );
wp_enqueue_style( 'jevelin-ie', get_template_directory_uri() . '/css/ie.css', array( 'jevelin-styles' ) );
if( !defined( 'FW' ) ) :
	wp_enqueue_style( 'jevelin-font-awesome', get_template_directory_uri() . '/assets/plugins/font-awesome-4/font-awesome.min.css' );
endif;


/* Load Dynamic Settings CSS */
$upload_dir = wp_upload_dir();
$file_dir   = $upload_dir['basedir'] . '/jevelin-dynamic-styles.css';
$file_path  = $upload_dir['baseurl'] . '/jevelin-dynamic-styles.css';
$updated = get_option( 'jevelin_settings_updated' );
if( !is_customize_preview() && file_exists( $file_dir ) && $updated > 0 && jevelin_option( 'theme_options_stored', 'file' ) == 'file' ) :
	if ( is_ssl() ) :
		$file_path = str_replace( 'http://', 'https://', $file_path );
	endif;

	wp_enqueue_style( 'jevelin-theme-settings', $file_path, array(), ''.intval( $updated ).'' );
else :
	wp_add_inline_style( 'jevelin-responsive', jevelin_render_css() );
endif;
wp_add_inline_style( 'jevelin-responsive', jevelin_render_css_mini() );


/*
** Load Swiper for portfolio
*/
if( is_singular( 'fw-portfolio' ) ) :
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/plugins/swiper.min.css' );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/plugins/swiper.min.js' );
endif;

// Video player
wp_enqueue_style( 'plyr', get_template_directory_uri() . '/css/plugins/plyr.css' );
wp_enqueue_script( 'plyr', get_template_directory_uri() . '/js/plugins/plyr.min.js' );




/* Unminified files
wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4' );
wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', array(), '3.4.0' );
wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css', array(), '1.5.9' );
wp_enqueue_style( 'simple-icons', get_template_directory_uri() . '/css/simple-line-icons.css', false, '1.0.0' );
wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/css/themify-icons.css', false, '1.0.0' );
wp_enqueue_style( 'lightcase', get_template_directory_uri() . '/css/lightcase.css', false, '1.0.0' );
wp_enqueue_style( 'jssocials', get_template_directory_uri() . '/css/jssocials.css', false, '1.0.0' );
wp_enqueue_style( 'simpleselect', get_template_directory_uri() . '/css/jquery.simpleselect.min.css', false, '1.0.0' );
wp_enqueue_style( 'sumoselect', get_template_directory_uri() . '/css/sumoselect.min.css', array(), '1.0' );
wp_enqueue_style( 'jevelin-shortcodes', get_template_directory_uri() . '/css/shortcodes.css', array(), '1.0' );
wp_enqueue_style( 'jevelin-styles', get_template_directory_uri() . '/style.css', array(), '1.0' );
wp_enqueue_style( 'jevelin-responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0' );
wp_enqueue_style( 'pixeden-icons', get_template_directory_uri() . '/css/pe-icon-7-stroke.css', false, '1.0.0' );
wp_enqueue_style( 'jevelin-ie', get_template_directory_uri() . '/css/ie.css', array( 'jevelin-styles' ) );*/

if( jevelin_option( 'rtl_support', false ) == true ) :
	wp_enqueue_style( 'jevelin-rtl', get_template_directory_uri() . '/css/rtl.css' );
endif;

if( jevelin_option('custom_css') ) :
	wp_add_inline_style( 'jevelin-plugins', jevelin_compress( do_shortcode( jevelin_option('custom_css') ) ) );
endif;


if ( !function_exists( 'jevelin_render_google_analytics_js' ) ) :
	add_action( 'wp_head', 'jevelin_render_google_analytics_js' , 100);
	function jevelin_render_google_analytics_js() { ?>
		<?php if( jevelin_option('google_analytics') ) :
		    /*-----------------------------------------------------------------------------------*/
		    /* Theme Options - Google Analytics
		    /*-----------------------------------------------------------------------------------*/
		    ?>

			<!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_js( jevelin_option('google_analytics') ); ?>"></script>
			<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());

				gtag('config', '<?php echo esc_js( jevelin_option('google_analytics') ); ?>');
			</script>
		<?php endif; ?>
	<?php }
endif;


if ( !function_exists( 'jevelin_render_js' ) ) :
	add_action( 'wp_footer', 'jevelin_render_js' , 100);
	function jevelin_render_js() { ?>
		<script type="text/javascript"><?php get_template_part('inc/templates/render-js' ); ?></script>
	<?php }
endif;


/**
 * Load Google Fonts
 */
if( function_exists( 'fw_get_db_settings_option' ) ) :
	if ( 'off' !== _x( 'on', 'Google fonts: on or off', 'jevelin' ) ) :
		$enqueue_fonts = array(); $o = '';
		$google_fonts = fw_get_google_fonts();


		global $wp_customize;
		$customizer_option = fw_get_db_customizer_option('styling_body');
		if (isset($wp_customize) && $wp_customize->is_preview() && ! is_admin() && isset($customizer_option) ) {
			$typography1 = fw_get_db_customizer_option('styling_body');
			$typography2 = fw_get_db_customizer_option('styling_headings');
			$typography3 = fw_get_db_customizer_option('additional_font1');
			$typography4 = fw_get_db_customizer_option('additional_font2');
			$mini = fw_get_db_customizer_option('google_fonts_mini');
		} else {
			$typography1 = fw_get_db_settings_option('styling_body');
			$typography2 = fw_get_db_settings_option('styling_headings');
			$typography3 = fw_get_db_settings_option('additional_font1');
			$typography4 = fw_get_db_settings_option('additional_font2');
			$mini = fw_get_db_settings_option('google_fonts_mini');
		}

		if( isset( $typography1 ) && isset($google_fonts[$typography1['family']]) ) :
		    $enqueue_fonts[$typography1['family']] =  $google_fonts[$typography1['family']];
		endif;
		if( isset( $typography2 ) && isset($google_fonts[$typography2['family']]) ) :
		    $enqueue_fonts[$typography2['family']] = $google_fonts[$typography2['family']];
		endif;
		if( isset( $typography3 ) && isset($google_fonts[$typography3['family']]) ) :
		    $enqueue_fonts[$typography3['family']] = $google_fonts[$typography3['family']];
		endif;
		if( isset( $typography4 ) && isset($google_fonts[$typography4['family']]) ) :
		    $enqueue_fonts[$typography4['family']] = $google_fonts[$typography4['family']];
		endif;

		if( is_array( $enqueue_fonts ) && count( $enqueue_fonts ) ) :

			$font_families = array();
			foreach ( $enqueue_fonts as $font => $styles ) :
				$this_font_families = str_replace( ' ', '+', esc_attr($font) ) . ':' . implode( ',', $styles['variants'] );
				if( $mini == true ) :
					$this_font_families = str_replace( array( '100,', '100italic,', '200italic,', '500,', '500italic,', '800,', '800italic,', '900,', '900italic,', '900italic' ), '', $this_font_families);
				endif;

			    $font_families[] = $this_font_families;
			endforeach;

			$subset = jevelin_option( 'google_fonts_subset', 'jevelin' );
			if( is_array( $subset ) && count( $subset ) < 1 ) :
				$subset = array( 'latin' );
			endif;

			if( count($font_families) > 0 ) {
				$font_inline = implode( '|', $font_families );
				$font_inline = str_replace( 'regular', '400', $font_inline );
				$font_inline = str_replace( 'italic', 'i', $font_inline );
				$font_inline = str_replace( ',i,', ',400i,', $font_inline );


				if( is_array( $subset ) ) :
					$fonts_args = array(
						'family' => $font_inline,
						'subset' => implode( ',', array_keys( $subset ) ),
					);
				endif;

				/* If Unyson plugin is enabled, include Google Fonts from Theme Settings */
				if( isset( $fonts_args ) ) :
					$fonts_url1 = esc_url( add_query_arg( $fonts_args, 'https://fonts.googleapis.com/css' ) );
					wp_enqueue_style( 'jevelin-fonts', $fonts_url1, array(), null );
				endif;
			}

		endif;
	endif;
endif;


if( !function_exists( 'fw_get_db_settings_option' ) || !get_option( 'fw_theme_settings_options:jevelin' ) ) :
	/* If Unyson plugin is disabled, include Google Font "Raleway" (this is Jevelin theme main font and is used by default in style.css) */
	wp_enqueue_style( 'jevelin-default-font', 'https://fonts.googleapis.com/css?family=Raleway:400,700' );
	wp_enqueue_style( 'jevelin-default-font2', 'https://fonts.googleapis.com/css?family=Montserrat:400,700' );
endif;




/**
 * Set Javascript variables
 */

$jevelin_notice = false;
if( jevelin_framework_active() && jevelin_option( 'notice_status', true ) == true && jevelin_option( 'notice_close', 'enable' ) != 'disable' ) :
	$jevelin_notice = esc_js( jevelin_option( 'notice_close', 'enable' ) );
endif;

$page_loader = 0;
if( jevelin_option('page_loader', 'off') != 'off' ) :
	if( jevelin_option('page_loader') == 'on2' ) :
		if (strpos(wp_get_referer(), esc_url( home_url('/') ) ) !== false) :
			$page_loader = 0;
		else :
			$page_loader = 1;
		endif;
	else :
		$page_loader = 1;
	endif;
endif;

$lightbox_window_max_width = ( jevelin_option('lightbox_window_max_width') > 0 ) ? jevelin_option('lightbox_window_max_width') : 1200;
$lightbox_window_max_width = intval( $lightbox_window_max_width );

$lightbox_window_max_height = ( jevelin_option('lightbox_window_max_height') > 0 ) ? jevelin_option('lightbox_window_max_height') : 1200;
$lightbox_window_max_height = intval( $lightbox_window_max_height );

$lightbox_window_size = ( jevelin_option('lightbox_window_size') >= 10 && jevelin_option('lightbox_window_size') <= 100 ) ? jevelin_option('lightbox_window_size') : 80;
$lightbox_window_size = intval( $lightbox_window_size ) / 100;


$scripts_array = array(
	'page_loader' => $page_loader,
	'notice' => $jevelin_notice,
	'header_animation_dropdown_delay' => ( esc_js( jevelin_option('header_animation_dropdown_delay' , 1) ) * 1000 ),
	'header_animation_dropdown' => esc_js( jevelin_option('header_animation_dropdown' , 'easeOutQuint') ),
	'header_animation_dropdown_speed' => ( esc_js( jevelin_option('header_animation_dropdown_speed' , 0.3) ) * 1000 ),
	//'lightbox_woocommerce' => ( get_option( 'woocommerce_enable_lightbox' ) != 'yes' ) ? ', .woocommerce-page a[data-rel^="prettyPhoto[product-gallery]"]' : '',
	'lightbox_opacity' => ( ( jevelin_option('lightbox_opacity') > 0 ) ? esc_js( jevelin_option('lightbox_opacity') ) / 100 : '0.88' ),
	'lightbox_transition' => ( ( jevelin_option('lightbox_transition') > 0 ) ? esc_js( jevelin_option('lightbox_transition') ) : 'elastic' ),
	'lightbox_window_max_width' => $lightbox_window_max_width,
	'lightbox_window_max_height' => $lightbox_window_max_height,
	'lightbox_window_size' => $lightbox_window_size,
	'page_numbers_prev' => esc_html__( 'Previous', 'jevelin' ),
	'page_numbers_next' => esc_html__( 'Next', 'jevelin' ),
	'rtl_support' => ( ( jevelin_option('rtl_support') ) ? esc_js( jevelin_option('rtl_support') ) : false ),
	'footer_parallax' => ( ( jevelin_option( 'footer_parallax', 'off' ) == 'on' ) ? true : false ),
	'one_pager' => ( ( jevelin_option( 'one_pager', true ) == true ) ? true : false ),
	'wc_lightbox' => jevelin_option( 'wc_lightbox', 'jevelin' ),
	'quantity_button' => ( ( jevelin_option( 'wc_quantity_button', 'on' ) == 'on' ) ? 'on' : 'off' ),
	'anchor_scroll_speed' => jevelin_option( 'one_pager_anchor_scroll_speed', '1000' ),
);

wp_localize_script( 'jevelin-scripts', 'jevelin', $scripts_array );
wp_enqueue_script( 'jevelin-scripts' );
