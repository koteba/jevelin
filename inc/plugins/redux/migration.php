<?php
/**
** Migrate fro Unyson to Redux framework
**/
function jevelin_framework_migrate_redux( $type = '', $ocdi = 0 ) {
    if( $type == 'start' ) :
        if( class_exists( 'Redux' ) ) :

            // Migrate theme settings
            $options = get_option( 'fw_theme_settings_options:jevelin' ); //fw_get_db_settings_option();
            $options = is_array( $options ) ? $options : [];
            foreach( $options as $key => $option ) :
                if( !is_array( $option ) ) :
                    if( is_bool( $option ) ) :
                        $option = (int)$option;
                    endif;

                    // Fix colors
                    if( $option && in_array( $key, [
                        'boxed_background_color',
                        'header_background_color',
                        'header_text_color',
                        'header_border_color',
                        'header_nav_active_background_color',
                        'menu_background_color',
                        'menu_link_border_color',
                        'footer_border_color',
                        'copyright_background_color',
                        'header_top_background_color',
                        'header_top_background_image',
                        'header_top_color',
                        'header_nav_color',
                        'header_nav_hover_color',
                        'copyright_border_color',
                        'content_input_border_color',
                        'sidebar_border_color',
                    ]) ) :
                        $rgba = $color = $option;
                        $alpha = 1;
                        if( is_numeric( strpos( $option, '#' ) ) ) :
                            $option = [
                                'color' => $color
                            ];
                        elseif( is_numeric( strpos( $option, 'rgb' ) ) ) :
                            preg_match( '/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i', $color, $by_color );

                            if( isset( $by_color[3] ) ) :
                                if( substr_count( $color, ',') == 3 ) :
                                    $color_data = explode( ',', $color );
                                    $alpha_data = floatval( end( $color_data ) );
                                    if( $alpha_data > 0 ) :
                                        $alpha = $alpha_data;
                                    endif;

                                    //var_dump( $color_data ); die;
                                endif;

                                $color = sprintf( '#%02x%02x%02x', $by_color[1], $by_color[2], $by_color[3] );
                            endif;

                            $option = [
                                'color' => $color,
                                'alpha' => $alpha,
                                'rgba' => $rgba,
                            ];
                        else :
                            $option = '';
                        endif;
                    endif;

                    Redux::set_option( 'jevelin_options', $key, $option );
                else :
                    // Page layouts
                    if( $key == 'page_layout' && isset( $option['page_layout'] ) ) :
                        Redux::set_option( 'jevelin_options', $key, $option['page_layout'] );

                        if( $option['page_layout'] == 'boxed' && isset( $option[ $option['page_layout'] ] ) ) :
                            $boxed = $option[ $option['page_layout'] ];

                            if( !empty( $boxed[ 'border_style' ] ) ) :
                                Redux::set_option( 'jevelin_options', 'boxed_border_style', $boxed[ 'border_style' ] );
                            endif;
                            if( !empty( $boxed[ 'page_background_color' ] ) ) :
                                Redux::set_option( 'jevelin_options', 'boxed_page_background_color', $boxed[ 'page_background_color' ] );
                            endif;
                            if( !empty( $boxed[ 'page_background_image' ] ) ) :
                                Redux::set_option( 'jevelin_options', 'boxed_page_background_image', $boxed[ 'page_background_image' ] );
                            endif;
                            if( !empty( $boxed[ 'content_background_color' ] ) ) :
                                Redux::set_option( 'jevelin_options', 'boxed_content_background_color', $boxed[ 'content_background_color' ] );
                            endif;
                            if( !empty( $boxed[ 'specific_pages' ] ) ) :
                                Redux::set_option( 'jevelin_options', 'boxed_specific_pages', $boxed[ 'specific_pages' ] );
                            endif;
                            if( !empty( $boxed[ 'margin_top' ] ) ) :
                                Redux::set_option( 'jevelin_options', 'boxed_margin_top', $boxed[ 'margin_top' ] );
                            endif;
                            if( !empty( $boxed[ 'footer_width' ] ) ) :
                                Redux::set_option( 'jevelin_options', 'boxed_footer_width', $boxed[ 'footer_width' ] );
                            endif;
                            if( !empty( $boxed[ 'page_radius' ] ) ) :
                                Redux::set_option( 'jevelin_options', 'boxed_page_radius', $boxed[ 'page_radius' ] );
                            endif;
                        endif;

                    // Header Logo Sizes
                    elseif( $key == 'header_logo_sizes' && isset( $option['header_logo_sizes'] ) ) :
                        Redux::set_option( 'jevelin_options', $key, $option['header_logo_sizes'] );
                        if( $option['header_logo_sizes'] == 'manual' ) :
                            $manual = !empty( $option['manual'] ) ? $option['manual'] : [];

                            if( !empty( $manual[ 'standard_height' ] ) ) :
                                Redux::set_option( 'jevelin_options', 'header_logo_sizes_standard_height', $manual[ 'standard_height' ] );
                            endif;
                            if( !empty( $manual[ 'sticky_height' ] ) ) :
                                Redux::set_option( 'jevelin_options', 'header_logo_sizes_sticky_height', $manual[ 'sticky_height' ] );
                            endif;
                            if( !empty( $manual[ 'responsive_height' ] ) ) :
                                Redux::set_option( 'jevelin_options', 'header_logo_sizes_responsive_height', $manual[ 'responsive_height' ] );
                            endif;
                        endif;

                    // Custom media icons
                    elseif( $key == 'social_custom' && is_array( $option ) ) :
                        $custom_option = [];
                        foreach( $option as $option_key => $custom_val ) :
                            $custom_option[$option_key]['title'] = isset( $custom_val['icon'] ) ? $custom_val['icon'] : '';
                            $custom_option[$option_key]['url'] = isset( $custom_val['link'] ) ? $custom_val['link'] : '';
                        endforeach;
                        Redux::set_option( 'jevelin_options', $key, $custom_option );

                    // Media
                    elseif( isset( $option['attachment_id'] ) ) :
                        $custom_option = [];
                        $custom_option['id'] = $option['attachment_id'];
                        if( isset( $option['url'] ) ) :
                            $custom_option_url = $option['url'];
                            if( substr( $custom_option_url, 0, 2 ) == '//' ) :
                                if( is_ssl() ) :
                                    $custom_option_url = 'https:' . $custom_option_url;
                                else :
                                    $custom_option_url = 'http:' . $custom_option_url;
                                endif;
                            endif;

                            $custom_option['url'] = $custom_option_url;
                            $custom_option['thumbnail'] = $custom_option_url;
                        endif;

                        Redux::set_option( 'jevelin_options', $key, $custom_option );
                    elseif( isset( $option['family'] ) ) :
                        $custom_option = $option;
                        $custom_option['font-family'] = $option['family'];
                        unset( $custom_option['family'] );

                        if( isset( $option['variation'] ) ) :
                            $font_weight = $option['variation'];
                            $font_weight = ( $font_weight == 'regular' ) ? 400 : (int)$font_weight;

                            if( $font_weight < 200 ) :
                                if( $key == 'styling_headings' ) :
                                    $font_weight = 700;
                                else :
                                    $font_weight = 400;
                                endif;
                            endif;

                            $custom_option['font-weight'] = $font_weight;
                            unset( $custom_option['variation'] );
                        endif;

                        if( isset( $option['size'] ) ) :
                            $custom_option['font-size'] = is_numeric( $option['size'] ) ? $option['size'] . 'px' : $option['size'];
                            unset( $custom_option['size'] );
                        endif;

                        Redux::set_option( 'jevelin_options', $key, $custom_option );
                    else :
                        Redux::set_option( 'jevelin_options', $key, $option );
                    endif;
                endif;
            endforeach;


            // Migrate page and post setttings
            $page_posts = new WP_Query( array(
                'post_type' => [ 'page', 'post', 'fw-portfolio' ],
                'posts_per_page' => -1,
            ));
            if( $page_posts->have_posts() ) :
                while( $page_posts->have_posts() ) : $page_posts->the_post();
                    $post_id = get_the_ID();
                    $post_meta = get_post_meta( $post_id, 'fw_options', 1 );
                    if( $ocdi ) :
                        $migration_check = get_post_meta( $post_id, 'shufflehound_migration_version', 1 );
                    endif;

                    if( empty( $migration_check ) ) :
                        // Fix page blog categories
                        if( isset( $post_meta['page_blog_category'] ) && is_array( $post_meta['page_blog_category'] ) ) :
                            $categories = [];
                            $categories_data = $post_meta['page_blog_category'];
                            foreach( $categories_data as $category_id ) :
                                $category = get_term_by( 'id', $category_id, 'category');
                    			if( !empty( $category->term_id ) ) :
                    				$categories[] = $category->name;
                    			endif;
                            endforeach;
                            $post_meta['page_blog_category'] = implode( PHP_EOL, $categories );
                        endif;

                        // Fix header_style
                        if( isset( $post_meta['header_style'] ) ) :
                            $header_style = $post_meta['header_style'];
                            if( isset( $header_style['header_style'] ) ) :
                                $post_meta['header_style'] = $header_style['header_style'];
                                $header_style = isset( $header_style[$header_style['header_style']] ) ? $header_style[$header_style['header_style']] : [];

                                if( isset( $header_style['description'] ) ) :
                                    $post_meta['header_style_description'] = $header_style['description'];
                                endif;

                                if( isset( $header_style['breadcrumbs'] ) ) :
                                    $post_meta['header_style_breadcrumbs'] = $header_style['breadcrumbs'];
                                endif;

                                if( isset( $header_style['scroll_button'] ) ) :
                                    $post_meta['header_style_scroll_button'] = $header_style['scroll_button'];
                                endif;
                            endif;
                        endif;

                        // Save
                        Shufflehound_Metaboxes::save( $post_id, $post_meta, $migration = 1 );

                        // Review score
                        $review_score = get_post_meta( $post_id, 'fw:opt:review_score', 1 );
                        if( $review_score ) :
                            update_post_meta(
                                $post_id,
                                'review_score',
                                sanitize_text_field( $review_score )
                            );
                        endif;

                        // Save post migration complete
                        update_post_meta(
                            $post_id,
                            'shufflehound_migration_version',
                            '1'
                        );
                    endif;
                endwhile;
                wp_reset_postdata();
            endif;


            // Set framework to Redux
            update_option( 'jevelin_framework', 'redux' );


            // Success message
            return '<span style="color: #00b50f;">Done! You are now using Redux Framework</span>';
        else :
            return 'Migration failed';
        endif;
    endif;
}
