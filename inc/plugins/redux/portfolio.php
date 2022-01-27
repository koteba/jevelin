<?php
// Get portfolio gallery
function jevelin_portfolio_gallery_images( $post_id = 0 ) {
    if( jevelin_framework() == 'redux' ) :
        if( 0 === $post_id && null === ( $post_id = get_the_ID() ) ) :
    		return array();
    	endif;

    	return jevelin_post_option( $post_id, 'project-gallery', array() );
    else :
        if( function_exists( 'fw_ext_portfolio_get_gallery_images' ) ) :
            return fw_ext_portfolio_get_gallery_images( $post_id );
        endif;
    endif;
}




// Close if Unyson is active or plugin install page
global $pagenow;
$plugin_activation = ( $pagenow == 'plugins.php' ) ? 1 : 0;
$plugin_tgmpa_activation = ( isset( $_GET['page'] ) && $_GET['page'] == 'tgmpa-install-plugins' ) ? 1 : 0;
if( $plugin_activation || $plugin_tgmpa_activation || jevelin_framework() != 'redux' || defined( 'FW' ) ) :
    return ;
endif;




// Register portfolio post type
function jevelin_portfolio_post_type() {
    $post_names = apply_filters( 'fw_ext_projects_post_type_name',
        array(
            'singular' => __( 'Portfolio', 'fw' ),
            'plural'   => __( 'Portfolio', 'fw' )
        ) );

    $supports = array(
        'title', /* Text input field to create a post title. */
        'editor',
        'thumbnail', /* Displays a box for featured image. */
        'revisions'
    );

    register_post_type( 'fw-portfolio',
        array(
            'labels'             => array(
                'name'               => $post_names['plural'], //__( 'Portfolio', 'fw' ),
                'singular_name'      => $post_names['singular'], //__( 'Portfolio project', 'fw' ),
                'add_new'            => __( 'Add New', 'fw' ),
                'add_new_item'       => sprintf( __( 'Add New %s', 'fw' ), $post_names['singular'] ),
                'edit'               => __( 'Edit', 'fw' ),
                'edit_item'          => sprintf( __( 'Edit %s', 'fw' ), $post_names['singular'] ),
                'new_item'           => sprintf( __( 'New %s', 'fw' ), $post_names['singular'] ),
                'all_items'          => sprintf( __( 'All %s', 'fw' ), $post_names['plural'] ),
                'view'               => sprintf( __( 'View %s', 'fw' ), $post_names['singular'] ),
                'view_item'          => sprintf( __( 'View %s', 'fw' ), $post_names['singular'] ),
                'search_items'       => sprintf( __( 'Search %s', 'fw' ), $post_names['plural'] ),
                'not_found'          => sprintf( __( 'No %s Found', 'fw' ), $post_names['plural'] ),
                'not_found_in_trash' => sprintf( __( 'No %s Found In Trash', 'fw' ), $post_names['plural'] ),
                'parent_item_colon'  => '' /* text for parent types */
            ),
            'description'        => __( 'Create a portfolio item', 'fw' ),
            'public'             => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'publicly_queryable' => true,
            /* queries can be performed on the front end */
            'has_archive'        => true,
            'rewrite'            => array(
                'slug' => 'project'
            ),
            'menu_position'      => 4,
            'show_in_nav_menus'  => true,
            'menu_icon'          => 'dashicons-portfolio',
            'hierarchical'       => false,
            'query_var'          => true,
            'show_in_rest' => true,
            /* Sets the query_var key for this post type. Default: true - set to $post_type */
            'supports'           => $supports,
            'capabilities'       => array(
                'edit_post'              => 'edit_pages',
                'read_post'              => 'edit_pages',
                'delete_post'            => 'edit_pages',
                'edit_posts'             => 'edit_pages',
                'edit_others_posts'      => 'edit_pages',
                'publish_posts'          => 'edit_pages',
                'read_private_posts'     => 'edit_pages',
                'read'                   => 'edit_pages',
                'delete_posts'           => 'edit_pages',
                'delete_private_posts'   => 'edit_pages',
                'delete_published_posts' => 'edit_pages',
                'delete_others_posts'    => 'edit_pages',
                'edit_private_posts'     => 'edit_pages',
                'edit_published_posts'   => 'edit_pages',
            ),
        )
    );


    $category_names = apply_filters( 'fw_ext_portfolio_category_name', array(
        'singular' => __( 'Category', 'fw' ),
        'plural'   => __( 'Categories', 'fw' )
    ) );

    register_taxonomy( 'fw-portfolio-category', 'fw-portfolio', array(
        'labels'            => array(
            'name'              => sprintf( _x( 'Portfolio %s', 'taxonomy general name', 'fw' ), $category_names['plural'] ),
            'singular_name'     => sprintf( _x( 'Portfolio %s', 'taxonomy singular name', 'fw' ), $category_names['singular'] ),
            'search_items'      => sprintf( __( 'Search %s', 'fw' ), $category_names['plural'] ),
            'all_items'         => sprintf( __( 'All %s', 'fw' ), $category_names['plural'] ),
            'parent_item'       => sprintf( __( 'Parent %s', 'fw' ), $category_names['singular'] ),
            'parent_item_colon' => sprintf( __( 'Parent %s:', 'fw' ), $category_names['singular'] ),
            'edit_item'         => sprintf( __( 'Edit %s', 'fw' ), $category_names['singular'] ),
            'update_item'       => sprintf( __( 'Update %s', 'fw' ), $category_names['singular'] ),
            'add_new_item'      => sprintf( __( 'Add New %s', 'fw' ), $category_names['singular'] ),
            'new_item_name'     => sprintf( __( 'New %s Name', 'fw' ), $category_names['singular'] ),
            'menu_name'         => $category_names['plural'],
        ),
        'public'            => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => false,
        'rewrite'           => array(
            'slug' => 'portfolio'
        ),
    ) );


    $tag_names = apply_filters( 'fw_ext_portfolio_tag_name', array(
        'singular' => __( 'Tag', 'fw' ),
        'plural'   => __( 'Tags', 'fw' )
    ) );

    register_taxonomy( 'fw-portfolio-tag', 'fw-portfolio', array(
        'hierarchical' => false,
        'labels' => array(
            'name'              => $tag_names['plural'],
            'singular_name'     => $tag_names['singular'],
            'search_items'      => sprintf( __('Search %s','fw'), $tag_names['plural']),
            'popular_items'     => sprintf( __( 'Popular %s','fw' ), $tag_names['plural']),
            'all_items'         => sprintf( __('All %s','fw'), $tag_names['plural']),
            'parent_item'       => null,
            'parent_item_colon' => null,
            'edit_item'         => sprintf( __('Edit %s','fw'), $tag_names['singular'] ),
            'update_item'       => sprintf( __('Update %s','fw'), $tag_names['singular'] ),
            'add_new_item'      => sprintf( __('Add New %s','fw'), $tag_names['singular'] ),
            'new_item_name'     => sprintf( __('New %s Name','fw'), $tag_names['singular'] ),
            'separate_items_with_commas'    => sprintf( __( 'Separate %s with commas','fw' ), strtolower($tag_names['plural'])),
            'add_or_remove_items'           => sprintf( __( 'Add or remove %s','fw' ), strtolower($tag_names['plural'])),
            'choose_from_most_used'         => sprintf( __( 'Choose from the most used %s','fw' ), strtolower($tag_names['plural'])),
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'portfolio-tag'
        ),
    ));
}
add_action( 'init', 'jevelin_portfolio_post_type', 0 );




// Portfolio settings
function jevelin_portfolio_get_settings() {
    $response = array(
        'post_type'     => 'fw-portfolio',
        'slug'          => 'project',
        'taxonomy_slug' => 'portfolio',
        'taxonomy_name' => 'fw-portfolio-category',
    );
    return $response;
}




// Portfolio template pages
function jevelin_portfolio_templates( $template ) {
	if( is_singular( 'fw-portfolio' ) ) :
        return locate_template( 'framework-customizations/extensions/portfolio/views/single.php' );
	elseif( is_tax( 'fw-portfolio-category' ) || is_tax( 'fw-portfolio-tag' ) ) :
        return locate_template( 'framework-customizations/extensions/portfolio/views/taxonomy.php' );
	elseif( is_post_type_archive( 'fw-portfolio' ) ) :
        return locate_template( 'framework-customizations/extensions/portfolio/views/archive.php' );
	endif;

	return $template;
}

add_filter( 'template_include', 'jevelin_portfolio_templates' );





add_filter( 'manage_edit-fw-portfolio_columns', '_filter_admin_manage_edit_columns', 10, 1 );
function _filter_admin_manage_edit_columns( $columns ) {
    $new_columns          = array();
    $new_columns['cb']    = $columns['cb']; // checkboxes for all projects page
    $new_columns['image'] = __( 'Cover Image', 'fw' );

    return array_merge( $new_columns, $columns );
}


add_action( 'manage_fw-portfolio_posts_custom_column', '_action_admin_manage_custom_column', 10, 2 );
function _action_admin_manage_custom_column( $column_name, $id ) {

    switch ( $column_name ) {
        case 'image':
            if ( get_the_post_thumbnail( intval( $id ) ) ) {
                $value = '<a href="' . get_edit_post_link( $id,
                        true ) . '" title="' . esc_attr( __( 'Edit this item', 'fw' ) ) . '">' .
                         wp_get_attachment_image( get_post_thumbnail_id( intval( $id ) ),
                             array( 150, 100 ),
                             true ) .
                         '</a>';
            } else {
                //$value = '<img src="' . $this->get_declared_URI( '/static/images/no-image.png' ) . '"/>';
                $value = '';
            }
            echo $value;
            break;

        default:
            break;
    }
}
