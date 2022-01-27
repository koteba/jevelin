<?php
if ( is_customize_preview() || ( is_admin() && defined( 'DOING_AJAX' ) && DOING_AJAX ) || defined( 'DOING_CRON' ) ) {

    $customizer_mode = 1;
    include get_template_directory() . '/framework-customizations/theme/options/general.php';
    include get_template_directory() . '/framework-customizations/theme/options/styling.php';
    include get_template_directory() . '/framework-customizations/theme/options/header.php';
    include get_template_directory() . '/framework-customizations/theme/options/footer.php';
    include get_template_directory() . '/framework-customizations/theme/options/titlebar.php';
    include get_template_directory() . '/framework-customizations/theme/options/social_media.php';
    include get_template_directory() . '/framework-customizations/theme/options/blog.php';
    include get_template_directory() . '/framework-customizations/theme/options/portfolio.php';
    include get_template_directory() . '/framework-customizations/theme/options/lightbox.php';
    include get_template_directory() . '/framework-customizations/theme/options/carousel.php';
    include get_template_directory() . '/framework-customizations/theme/options/woocommerce.php';
    include get_template_directory() . '/framework-customizations/theme/options/lazy_loading.php';
    include get_template_directory() . '/framework-customizations/theme/options/page_loader.php';
    include get_template_directory() . '/framework-customizations/theme/options/404_page.php';
    include get_template_directory() . '/framework-customizations/theme/options/notice.php';
    include get_template_directory() . '/framework-customizations/theme/options/amp.php';

    $options = array(
        'customizer_general' => array(
            'type' => 'box',
            'title' => esc_html__('General', 'gillion'),
            'options' => $general_options
        ),

        'customizer_styling' => array(
            'type' => 'box',
            'title' => esc_html__('Styling', 'gillion'),
            'options' => $styling_options
        ),

        'customizer_header' => array(
            'type' => 'box',
            'title' => esc_html__('Header', 'gillion'),
            'options' => $header_options
        ),

        'customizer_footer' => array(
            'type' => 'box',
            'title' => esc_html__('Footer', 'gillion'),
            'options' => $footer_options
        ),

        'customizer_titlebar' => array(
            'type' => 'box',
            'title' => esc_html__('Titlebar', 'gillion'),
            'options' => $titlebar_options
        ),

        'customizer_social_media' => array(
            'type' => 'box',
            'title' => esc_html__('Social Media', 'gillion'),
            'options' => $social_options
        ),

        'customizer_blog' => array(
            'type' => 'box',
            'title' => esc_html__('Blog', 'gillion'),
            'options' => $blog_options
        ),

        'customizer_blog' => array(
            'type' => 'box',
            'title' => esc_html__('AMP', 'gillion'),
            'options' => $amp_options
        ),

        'customizer_portfolio' => array(
            'type' => 'box',
            'title' => esc_html__('Portfolio', 'gillion'),
            'options' => $portfilio_options
        ),

       'customizer_lightbox' => array(
            'type' => 'box',
            'title' => esc_html__('Lightbox', 'gillion'),
            'options' => $lightbox_options
        ),

        'customizer_carousel' => array(
             'type' => 'box',
             'title' => esc_html__('Carousel', 'gillion'),
             'options' => $carousel_options
         ),

        'customizer_woocommerce' => array(
             'type' => 'box',
             'title' => esc_html__('WooCommerce', 'gillion'),
             'options' => $woocommerce_options
         ),

        'customizer_lazy_loading' => array(
            'type' => 'box',
            'title' => esc_html__('Lazy Loading', 'gillion'),
            'options' => $lazy_loading_options
        ),

       'customizer_page_loader' => array(
            'type' => 'box',
            'title' => esc_html__('Page Loader', 'gillion'),
            'options' => $page_loader_options
        ),

       'customizer_404' => array(
            'type' => 'box',
            'title' => esc_html__('404 page', 'gillion'),
            'options' => $page_404_options
        ),

        'customizer_notice' => array(
             'type' => 'box',
             'title' => esc_html__('Notice', 'gillion'),
             'options' => $notice_options
         ),
    );

}
