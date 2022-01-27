<?php
/**
 * Recent posts
 */
add_action( 'wp_ajax_nopriv_load_more_posts', 'jevelin_load_more_posts' );
add_action( 'wp_ajax_load_more_posts', 'jevelin_load_more_posts' );

function jevelin_load_more_posts() {
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) :

        $categories = ( isset( $_POST['categories'] ) && $_POST['categories'] ) ? explode( ',', esc_attr( $_POST['categories'] ) ) : array();
        $post_style = ( isset( $_POST['post_style'] ) && $_POST['post_style'] ) ? esc_attr( $_POST['post_style'] ) : 'masonry';
        $posts_per_page = ( isset( $_POST['per_page'] ) && $_POST['per_page'] ) ? esc_attr( $_POST['per_page'] ) : '6';
        $paged = ( isset( $_POST['paged'] ) && $_POST['paged'] ) ? esc_attr( $_POST['paged'] ) : '1';

        $posts = new WP_Query( array(
        	'post_type' => 'post',
        	'paged' => $paged,
        	'category__in' => $categories,
        	'posts_per_page' => $posts_per_page,
            'post_status' => 'publish',
        ));

        if( isset( $posts->found_posts ) && $posts->found_posts > 0 ) :
            set_query_var( 'style', $post_style );
            while ( $posts->have_posts() ) : $posts->the_post();
                if( get_post_format() ) :
                    get_template_part( 'content', 'format-'.get_post_format() );
                else :
                    get_template_part( 'content' );
                endif;
            endwhile;
        else :
            echo 'done';
        endif;

    endif;
	die();
}


/**
 * Recent products
 */
add_action( 'wp_ajax_nopriv_load_more_products', 'jevelin_load_more_products' );
add_action( 'wp_ajax_load_more_products', 'jevelin_load_more_products' );

function jevelin_load_more_products() {
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) :

        $posts_per_page = ( isset( $_POST['per_page'] ) && $_POST['per_page'] ) ? esc_attr( $_POST['per_page'] ) : '6';
        $paged = ( isset( $_POST['paged'] ) && $_POST['paged'] ) ? esc_attr( $_POST['paged'] ) : '1';

        $posts = new WP_Query( array(
            'post_type' => 'product',
            'paged' => $paged,
            'posts_per_page' => $posts_per_page,
            'post_status' => 'publish',
        ));

        if( isset( $posts->found_posts ) && $posts->found_posts > 0 ) :
            while ( $posts->have_posts() ) : $posts->the_post();
                wc_get_template_part( 'content', 'product' );
            endwhile;
        else :
            echo 'done';
        endif;

    endif;
    die();
}
