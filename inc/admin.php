<?php
function jevelin_admin_enqueue() {
    global $pagenow;
    global $wp_customize;
    global $wp_version;
    $page = !empty( $_GET['page'] ) ? $_GET['page'] : '';
    $post = !empty( $_GET['post'] ) ? $_GET['post'] : '';
    $post_id = !empty( $_GET['post_id'] ) ? $_GET['post_id'] : '';


    // Load general styling
    wp_enqueue_style( 'jevelin-admin', get_template_directory_uri() . '/assets/admin/css/admin.css' );


    // Load redux related assets
    if( jevelin_framework() == 'redux' ) :
        if( $page == 'jevelin-theme-settings' || $pagenow == 'customize.php' ) :
            wp_enqueue_style( 'jevelin-admin-redux', get_template_directory_uri() . '/assets/admin/css/admin-redux.css' );
        endif;
    endif;


    // Load metaboxes assets
    if( !defined( 'FW' ) || jevelin_framework() == 'redux'  ) :
        wp_enqueue_style( 'jevelin-admin-metaboxes', get_template_directory_uri() . '/assets/admin/plugins/metaboxes/admin-metaboxes.css' );
        wp_enqueue_script( 'jevelin-admin-metaboxes', get_template_directory_uri() . '/assets/admin/plugins/metaboxes/admin-metaboxes.js', [ 'jquery' ] );
    endif;


    // Load Font Awesome
    if( ( !defined( 'FW' ) && $pagenow == 'nav-menus.php' ) || ( isset( $_GET['page'] ) && $_GET['page'] == 'jevelin-theme-settings' ) ) :
    	wp_enqueue_style( 'jevelin-font-awesome', get_template_directory_uri() . '/assets/plugins/font-awesome-4/font-awesome.min.css' );
    endif;


    // Load revslider assets
    if( $page == 'revslider' ) :
        wp_enqueue_style( 'jevelin-admin-revslider', get_template_directory_uri() . '/assets/admin/css/admin-revslider.css' );
    endif;


    // Load unyson related assets
    if( jevelin_framework() == 'unyson' ) :
        if( $page == 'fw-settings' ) :
            wp_enqueue_style( 'jevelin-admin-unyson', get_template_directory_uri() . '/assets/admin/css/admin-unyson.css' );
            wp_enqueue_script( 'jevelin-admin-unyson', get_template_directory_uri() . '/assets/admin/js/admin-unyson.js', array( 'jquery' ) );
            wp_enqueue_script( 'jevelin-jquery-cookie', get_template_directory_uri() . '/js/plugins/jquery.cookie.js', array( 'jquery' ) );
        endif;

        // Unyson RGBA color picker fix
        if( isset( $wp_version ) && $wp_version > 5.4 ) :
            wp_enqueue_style( 'jevelin-admin-unyson-rgba-fix', get_template_directory_uri() . '/assets/admin/css/admin-unyson-rgba-fix.css', false, '1.0.0' );
            if( $page == 'fw-settings' || in_array( $pagenow, [ 'post.php', 'post-new.php' ] ) || isset( $wp_customize ) ) :
                wp_enqueue_script( 'jevelin-unyaon-rgba-fix', get_template_directory_uri() . '/assets/admin/js/admin-unyson-rgba-fix.js', array( 'fw-events', 'iris', 'wp-color-picker' ) );
                wp_localize_script(
                    'jevelin-unyaon-rgba-fix',
        			'_fw_option_type_rgba_color_picker_localized',
        			array( 'l10n' => array( 'reset_to_default' => esc_html__( 'Reset', 'fw' ) ) )
        		);
            endif;
        endif;
    endif;


    // Load post related assetes
    if( $post > 0 || $post_id > 0 || $pagenow == 'post-new.php' ) :
        wp_enqueue_style( 'jevelin-admin-post', get_template_directory_uri() . '/assets/admin/css/admin-post.css' );
        wp_enqueue_style( 'jevelin-admin-wpbakkery', get_template_directory_uri() . '/assets/admin/css/admin-wpbakery.css' );
        wp_enqueue_script( 'jevelin-admin-wpbakkery', get_template_directory_uri() . '/assets/admin/js/admin-wpbakery.js', array( 'jquery' ) );
    endif;


    // Load fonts
    wp_enqueue_style( 'jevelin-simple-icons', get_template_directory_uri() . '/css/plugins/simple-line-icons.css', false, '1.0.0' );
    wp_enqueue_style( 'jevelin-themify-icons', get_template_directory_uri() . '/css/plugins/themify-icons.css', false, '1.0.0' );
    wp_enqueue_style( 'jevelin-pixeden-icons', get_template_directory_uri() . '/css/plugins/pe-icon-7-stroke.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'jevelin_admin_enqueue' );


/**
 * Admin panel - loading body class
 */
if( !function_exists( 'jevelin_add_admin_body_classes' ) ) :
    add_filter('admin_body_class', 'jevelin_add_admin_body_classes');
    function jevelin_add_admin_body_classes( $classes ) {
        $classes.= ' sh-adminbody-loading';
        return $classes;
    }
endif;


/**
 * Admin panel - add column
 */
global $pagenow;
if (( $pagenow == 'edit.php' ) && !isset($_GET['post_type']) ) {

    add_filter('manage_posts_columns', 'jevelin_posts_columns', 5);
    add_action('manage_posts_custom_column', 'jevelin_posts_custom_columns', 5, 2);

    function jevelin_posts_columns($defaults){
        $defaults['sh_post_thumbs'] = esc_html__('Image', 'jevelin');
        return $defaults;
    }

    function jevelin_posts_custom_columns($column_name, $id){
        if($column_name === 'sh_post_thumbs'){
            echo the_post_thumbnail( 'thumbnail' );
        }
    }

}


/**
 * Admin - Dynamic Styling
 */
if( !function_exists( 'jevelin_admin_style' ) ) :
    add_action('admin_head', 'jevelin_admin_style');
    function jevelin_admin_style() {
        $body = jevelin_font_option( 'styling_body' );
        $body = explode( '; ', $body );

        $font_size = '';
        foreach( $body as $item ) :
            if( strpos( $item, 'font-size' ) !== false ) :
                $font_size = $item;
            endif;
        endforeach;
    ?>

        <style media="screen">
            <?php if( $font_size ) : ?>
                .editor-styles-wrapper {
                    <?php echo esc_attr( $font_size ); ?>;
                }
            <?php endif; ?>
        </style>

    <?php }
endif;
