<?php
/**
 * OCDI Demo Installation Method
 */
function jevelin_ocdi_import_files() {
    $demos = [];


    /*
    ** WPBakery page builder - demos
    */
    $wpbakery = array(

        array(
            'name' => 'Burger Shop',
            'categories' => array( 'Industries', 'eCommerce' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Minimal Furniture Shop',
            'categories' => array( 'Industries', 'eCommerce' ),
            'revslider' => false,
        ),

        array(
            'name' => 'Mobile App 2',
            'categories' => array( 'Industries' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Mobile App',
            'categories' => array( 'Industries' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Business',
            'categories' => array( 'Industries' ),
            'revslider' => false,
        ),

        array(
            'name' => 'Startup Creative',
            'categories' => array( 'Industries' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Portfolio Freelance',
            'categories' => array( 'Portfolio' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Startup Clean',
            'categories' => array( 'Industries' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Education',
            'categories' => array( 'Industries' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Portfolio Minimalistic',
            'categories' => array( 'Portfolio' ),
        ),

        array(
            'name' => 'Corporate Accounting',
            'categories' => array( 'Industries' ),
        ),

        array(
            'name' => 'Portfolio Full-Width',
            'slug' => 'portfolio_full_width',
            'image_url' => 'portfolio_full_width',
            'preview_url' => 'portfolio-full-width/',
            'categories' => array( 'Portfolio' ),
        ),

        array(
            'name' => 'Architect',
            'slug' => 'architect',
            'image_url' => 'architect',
            'preview_url' => 'architect/',
            'categories' => array( 'eCommerce' ),
            'revslider' => false,
        ),

        array(
            'name' => 'Single Product',
            'slug' => 'single_product',
            'image_url' => 'single_product',
            'preview_url' => 'single-product/',
            'categories' => array( 'eCommerce' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Personal Blog',
            'slug' => 'personal_blog',
            'image_url' => 'personal_blog',
            'preview_url' => 'personal-blog/',
            'categories' => array( 'Blog' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Fashion eCommerce',
            'slug' => 'fashion_shop',
            'image_url' => 'fashion_shop',
            'preview_url' => 'fashion-shop/',
            'categories' => array( 'eCommerce' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Finances',
            'slug' => 'finances',
            'image_url' => 'finances',
            'preview_url' => 'finances/',
            'categories' => array( 'eCommerce' ),
            'revslider' => false,
        ),

        array(
            'name' => 'Digital Media Agency',
            'slug' => 'digital_agency',
            'image_url' => 'digital_agency',
            'preview_url' => 'digital-media-agency/',
            'categories' => array( 'Industries' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Creative Agency',
            'slug' => 'creative_agency',
            'image_url' => 'creative_agency',
            'preview_url' => 'creative-agency/',
            'categories' => array( 'Industries' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Medical',
            'slug' => 'medical',
            'image_url' => 'medical',
            'preview_url' => '',
            'categories' => array( 'Industries' ),
            'revslider' => false,
        ),

        array(
            'name' => 'Crypto',
            'categories' => array( 'Industries' ),
        ),

        array(
            'name' => 'Beauty',
            'slug' => 'beauty',
            'image_url' => 'beauty',
            'preview_url' => 'beauty/',
            'categories' => array( 'WPBakery Builder', 'Industries' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Foodie',
            'categories' => array( 'Industries' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Coming Soon Side by Side',
            'categories' => array( 'Basic' ),
            'preview_url' => 'coming-soon',
            'widgets' => false,
        ),

        array(
            'name' => 'Coming Soon',
            'categories' => array( 'Basic' ),
            'preview_url' => 'coming-soon/side-by-side',
            'widgets' => false,
        ),

        array(
            'name' => 'Construction',
            'categories' => array( 'Industries' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Startup',
            'slug' => 'startup',
            'image_url' => 'startup',
            'preview_url' => 'startup/',
            'categories' => array( 'WPBakery Builder', 'Industries' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Autospot',
            'slug' => 'autospot',
            'image_url' => 'autospot',
            'preview_url' => 'autospot/',
            'categories' => array( 'WPBakery Builder', 'Industries' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Portfolio Side Header',
            'categories' => array( 'Portfolio' ),
            'preview_url' => 'portfolio1/masonry-side-header',
        ),

        array(
            'name' => 'Portfolio',
            'categories' => array( 'Portfolio' ),
            'preview_url' => 'portfolio1',
        ),

        array(
            'name' => 'Blog Sidebar',
            'categories' => array( 'Blog' ),
            'preview_url' => 'blog1',
        ),

        array(
            'name' => 'Blog Side to Side',
            'categories' => array( 'Blog' ),
            'revslider' => true,
            'preview_url' => 'blog1/from-side-to-side',
        ),

        array(
            'name' => 'Blog Full',
            'categories' => array( 'Blog' ),
            'preview_url' => 'blog1/masonry_sidebar',
        ),

        array(
            'name' => 'Shop',
            'slug' => 'shop',
            'image_url' => 'shop',
            'preview_url' => 'shop1/',
            'categories' => array( 'WPBakery Builder', 'eCommerce' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Landing 2',
            'slug' => 'landing2',
            'image_url' => 'landing2',
            'preview_url' => 'landing2/',
            'categories' => array( 'WPBakery Builder', 'Basic' ),
            'revslider' => false,
        ),

        array(
            'name' => 'Landing',
            'slug' => 'landing',
            'image_url' => 'landing',
            'preview_url' => 'landing/',
            'categories' => array( 'WPBakery Builder', 'Basic' ),
            'revslider' => false,
        ),

        array(
            'name' => 'Wedding',
            'categories' => array( 'Industries' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Corporate',
            'slug' => 'corporate',
            'image_url' => 'corporate',
            'preview_url' => 'corporate/',
            'categories' => array( 'WPBakery Builder', 'Industries' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Fitness',
            'slug' => 'fitness',
            'image_url' => 'fitness',
            'preview_url' => 'home/home-fitness/',
            'categories' => array( 'Basic', 'WPBakery Builder', 'Industries' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Boxed',
            'categories' => array( 'Basic' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Nature',
            'slug' => 'nature',
            'image_url' => 'nature',
            'preview_url' => 'home/home-nature/',
            'categories' => array( 'Basic', 'WPBakery Builder' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Event',
            'slug' => 'event',
            'image_url' => 'event',
            'preview_url' => 'home/home-event/',
            'categories' => array( 'Basic', 'WPBakery Builder' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Creative',
            'slug' => 'creative_home',
            'image_url' => 'creative',
            'preview_url' => 'home/home-creative/',
            'categories' => array( 'Basic', 'WPBakery Builder' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Photography',
            'slug' => 'photography_home',
            'image_url' => 'photography',
            'preview_url' => 'home/home-photography/',
            'categories' => array( 'Basic', 'WPBakery Builder' ),
            'revslider' => true,
        ),

        array(
            'name' => 'Basic',
            'slug' => 'basic_home',
            'image_url' => 'basic_home',
            'preview_url' => '',
            'categories' => array( 'Basic', 'WPBakery Builder' ),
            'revslider' => true,
        ),
    );




    /*
    ** Unyson Page Builder- Demos
    */
    if( defined( 'FW' ) ) :
        $unyson = array(
            array(
                'import_file_name'           => 'Basic (Unyson Builder)',
                'categories'                 => array( 'Basic', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/basic_home/basic_home_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/basic_home/basic_home_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/basic_home/basic_home_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_revslider'           => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/basic_home/basic_home_slider.zip',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/basic_home.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/',
            ),

            array(
                'import_file_name'           => 'Creative (Unyson Builder)',
                'categories'                 => array( 'Basic', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/creative/creative_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/basic_home/basic_home_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/basic_home/basic_home_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_revslider'           => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/creative/creative_slider.zip',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/creative.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/home/home-creative/',
            ),

            array(
                'import_file_name'           => 'Event (Unyson Builder)',
                'categories'                 => array( 'Basic', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/event/event_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/basic_home/basic_home_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/basic_home/basic_home_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_revslider'           => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/event/event_slider.zip',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/event.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/home/home-event/',
            ),

            array(
                'import_file_name'           => 'Fitness (Unyson Builder)',
                'categories'                 => array( 'Industries', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/fitness/fitness_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/basic_home/basic_home_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/basic_home/basic_home_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_revslider'           => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/fitness/fitness_slider.zip',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/fitness.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/home/home-fitness/',
            ),

            array(
                'import_file_name'           => 'Nature (Unyson Builder)',
                'categories'                 => array( 'Basic', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/nature/nature_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/basic_home/basic_home_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/basic_home/basic_home_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_revslider'           => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/nature/nature_slider.zip',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/nature.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/home/home-nature/',
            ),

            array(
                'import_file_name'           => 'Boxed (Unyson Builder)',
                'categories'                 => array( 'Industries', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/boxed/boxed_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/boxed/boxed_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/boxed/boxed_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_revslider'           => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/boxed/boxed_slider.zip',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/boxed.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/boxed/',
            ),

            array(
                'import_file_name'           => 'Corporate (Unyson Builder)',
                'categories'                 => array( 'Industries', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/corporate/corporate_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/corporate/corporate_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/corporate/corporate_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_revslider'           => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/corporate/corporate_slider.zip',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/corporate.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/corporate/',
            ),

            array(
                'import_file_name'           => 'Wedding (Unyson Builder)',
                'categories'                 => array( 'Industries', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/wedding/wedding_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/wedding/wedding_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/wedding/wedding_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_revslider'           => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/wedding/wedding_slider.zip',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/wedding.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/wedding/',
            ),

            array(
                'import_file_name'           => 'Landing (Unyson Builder)',
                'categories'                 => array( 'Basic', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/landing/landing_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/landing/landing_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/landing/landing_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/landing.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/landing/',
            ),

            array(
                'import_file_name'           => 'Landing 2 (Unyson Builder)',
                'categories'                 => array( 'Basic', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/landing2/landing2_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/landing2/landing2_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/landing2/landing2_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/landing2.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/landing2/',
            ),

            array(
                'import_file_name'           => 'Shop (Unyson Builder)',
                'categories'                 => array( 'eCommerce', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/shop/shop_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/shop/shop_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/shop/shop_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_revslider'           => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/shop/shop_slider.zip',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/shop.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/shop1/',
            ),

            array(
                'import_file_name'           => 'Blog',
                'categories'                 => array( 'Blog', 'Unyson Builder', 'WPBakery Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/blog/blog_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/blog/blog_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/blog/blog_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_revslider'           => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/blog/blog_slider.zip',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/blog.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/blog1/',
            ),

            array(
                'import_file_name'           => 'Portfolio (Unyson Builder)',
                'categories'                 => array( 'Portfolio', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/portfolio/portfolio_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/portfolio/portfolio_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/portfolio/portfolio_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/portfolio.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/portfolio1/',
            ),

            array(
                'import_file_name'           => 'Startup (Unyson Builder)',
                'categories'                 => array( 'Industries', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/startup/startup_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/startup/startup_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/startup/startup_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_revslider'           => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/startup/startup_slider.zip',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/startup.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/startup/',
            ),

            array(
                'import_file_name'           => 'Construction (Unyson Builder)',
                'categories'                 => array( 'Industries', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/construction/construction_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/construction/construction_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/construction/construction_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_revslider'           => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/construction/construction_slider.zip',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/construction.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/construction/',
            ),

            array(
                'import_file_name'           => 'Coming Soon (Unyson Builder)',
                'categories'                 => array( 'Basic', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/soon/soon_content.xml',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/soon/soon_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/soon.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/coming-soon/',
            ),

            array(
                'import_file_name'           => 'Foodie (Unyson Builder)',
                'categories'                 => array( 'Industries', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/foodie/foodie_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/foodie/foodie_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/foodie/foodie_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_revslider'           => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/foodie/foodie_slider.zip',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/foodie.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/foodie/',
            ),

            array(
                'import_file_name'           => 'Beauty (Unyson Builder)',
                'categories'                 => array( 'Industries', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/beauty/beauty_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/beauty/beauty_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/beauty/beauty_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_revslider'           => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/beauty/beauty_slider.zip',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/beauty.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/beauty/',
            ),

            array(
                'import_file_name'           => 'Crypto (Unyson Builder)',
                'categories'                 => array( 'Industries', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/crypto/crypto_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/crypto/crypto_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/crypto/crypto_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/crypto.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/crypto/',
            ),

            array(
                'import_file_name'           => 'Education (Unyson Builder)',
                'categories'                 => array( 'Industries', 'Unyson Builder' ),
                'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_files/education/education_content.xml',
                'import_widget_file_url'     => 'https://cdn.shufflehound.com/jevelin/ocdi_files/education/education_widgets.wie',
                'import_json'                => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/education/education_options.json',
                        'option_name' => 'fw_theme_settings_options:jevelin',
                    ),
                ),
                'import_revslider'           => array(
                    array(
                        'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_files/education/education_slider.zip',
                    ),
                ),
                'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/education.jpg',
                'preview_url'                => 'https://jevelin.shufflehound.com/education/',
            ),
        );
        $demos = array_merge( $demos, $unyson );
    endif;


    /*
    ** WPBakery Page Builder- Demos Init
    */
    foreach( array_reverse( $wpbakery ) as $demo ) :
        $name = $demo['name'];
        $slug = isset( $demo['slug'] ) ? $demo['slug'] : str_replace( [ ' ', '-' ], '_', strtolower( $name ) );
        $image_url = isset( $demo['image_url'] ) ? $demo['image_url'] : str_replace( [ ' ', '-' ], '_', strtolower( $name ) );
        $preview_url = isset( $demo['preview_url'] ) ? $demo['preview_url'] : str_replace( ' ', '-', strtolower( $name ) ) . '/';
        $revslider = ( isset( $demo['revslider'] ) && $demo['revslider'] == true ) ? 1 : 0;
        $widgets = ( isset( $demo['widgets'] ) ) ? $demo['widgets'] : 1;
        $categories = $demo['categories'];
        if( !in_array( 'WPBakery Builder', $categories ) ) :
            $categories[] = 'WPBakery Builder';
        endif;

        if( defined( 'FW' ) ) :
            $name.= ' (WPBakery Builder)';
        else :
            foreach( $categories as $category_key => $category_value ) :
                if( $category_value == 'WPBakery Builder' ) :
                    unset( $categories[ $category_key ] );
                endif;
            endforeach;
        endif;

        $thisdemo = array(
            'import_file_name'           => $name,
            'categories'                 => $categories,
            'import_file_url'            => 'https://cdn.shufflehound.com/jevelin/ocdi_wpbakery_files/'.$slug.'/'.$slug.'_content.xml?v=7',
            'import_json'                => array(
                array(
                    'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_wpbakery_files/'.$slug.'/'.$slug.'_options.json',
                    'option_name' => 'fw_theme_settings_options:jevelin',
                ),
            ),
            'import_preview_image_url'   => '//cdn.shufflehound.com/jevelin/files/'.$image_url.'.jpg',
            'preview_url'                => 'https://jevelin.shufflehound.com/'.$preview_url,
        );


        if( $widgets ) :
            $thisdemo['import_widget_file_url'] = 'https://cdn.shufflehound.com/jevelin/ocdi_wpbakery_files/'.$slug.'/'.$slug.'_widgets.wie';
        else :
            $thisdemo['import_widget_file_url'] = false;
        endif;

        if( $revslider ) :
            $thisdemo['import_revslider'] = array(
                array(
                    'file_url'    => 'https://cdn.shufflehound.com/jevelin/ocdi_wpbakery_files/'.$slug.'/'.$slug.'_slider.zip',
                ),
            );
        endif;

        $demos[] = $thisdemo;
    endforeach;

    return array_reverse( $demos );
}
add_filter( 'pt-ocdi/import_files', 'jevelin_ocdi_import_files' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
add_filter( 'ocdi/import_files', 'jevelin_ocdi_import_files' );
add_filter( 'ocdi/disable_pt_branding', '__return_true' );


//echo '<pre>';
//var_dump( jevelin_ocdi_import_files( $demos ) );
//die;



/**
 * OCDI Demo Installation Method - Final Steps
 */



function jevelin_ocdi_after_import_setup( $selected_import ) {

    // demo name
    $demo_name = $selected_import['import_file_name'];
    //$demo_name = str_replace('(WPBakery Builder)', '(WPbakery)', $demo_name);
    $demo_name = str_replace('Fashion eCommerce', 'Fashion Shop', $demo_name);
    $demo_name = str_replace(' (WPBakery Builder)', '', $demo_name);

    /* Get page builder working */
    global $wpdb;
    $metas = $wpdb->get_results( "SELECT * FROM `$wpdb->postmeta` WHERE `meta_key` = 'jevelin_page_builder'" );
    foreach( $metas as $meta ) :
        $content = $meta->meta_value;
        $content = str_replace( '="', '=\"',  $content );
        $content = str_replace( '">', '\">',  $content );
        $content = str_replace( '/', '\/',    $content );
        $content = str_replace( 'u201c', '\u201c', $content );
        $content = str_replace( 'u201d', '\u201d', $content );
        $content = str_replace( 'u00a0', '\u00a0', $content );

        // JSON 1 Fix
        $pieces = explode(',"styling":"[{"', $content);
        if( count( $pieces ) > 1 ) :
        	$i = 0;
        	foreach( $pieces as $key => $piece ) : $i++;
        		if( $i > 1 ) :
        			$piece_array = explode('}]}]"', $piece, 2 );
        			$piece_array[0] = json_encode( $piece_array[0] );
                    $piece_array[0] = substr($piece_array[0], 1, -1);
        			$pieces[$key] = implode('}]}]"', $piece_array );
        		endif;
        	endforeach;
        	$content = implode(',"styling":"[{\"', $pieces );
        endif;


        // JSON 2 Fix
        $pieces = explode(',"form":{"json":"[{"', $content);
        if( count( $pieces ) > 1 ) :
        	$i = 0;
        	foreach( $pieces as $key => $piece ) : $i++;
        		if( $i > 1 ) :
        			$piece_array = explode('"}}]"},"subject_message', $piece, 2 );
        			$piece_array[0] = json_encode( $piece_array[0] );
                    $piece_array[0] = substr($piece_array[0], 1, -1);
        			$pieces[$key] = implode('\"}}]"},"subject_message', $piece_array );
        		endif;
        	endforeach;
        	$content = implode(',"form":{"json":"[{\"', $pieces );
        endif;


        /* Get Revolution slider slides */
        if( class_exists('RevSlider') ) :
            if( strpos( $demo_name, 'Unyson') !== false ) :
                $slider = new RevSlider();
                $arrSliders = $slider->getArrSlidersShort();

                if( $selected_import['import_file_name'] != 'Basic' ) :
                    $slide_value = 0;
                    foreach( $arrSliders as $key => $slide ) :
                        if( $slide == 'Fitness slider' && $selected_import['import_file_name'] == 'Boxed' ) :
                            $slide_value = $key;
                        elseif( $slide == 'Startup Slaider' && $selected_import['import_file_name'] == 'Startup' ) :
                            $slide_value = $key;
                        elseif( $slide == 'Corporate slider' && $selected_import['import_file_name'] == 'Corporate' ) :
                            $slide_value = $key;
                        elseif( $slide == 'Shop Slider' && $selected_import['import_file_name'] == 'Shop' ) :
                            $slide_value = $key;
                        elseif( $slide == 'Wedding Slider' && $selected_import['import_file_name'] == 'Wedding' ) :
                            $slide_value = $key;
                        elseif( $slide == 'Autospot Slider' && $selected_import['import_file_name'] == 'Autospot' ) :
                            $slide_value = $key;
                        elseif( $slide == 'Construction Slider' && $selected_import['import_file_name'] == 'Construction' ) :
                            $slide_value = $key;
                        elseif( $slide == 'Foodie Slider' && $selected_import['import_file_name'] == 'Foodie' ) :
                            $slide_value = $key;
                        elseif( $slide == 'Education' && $selected_import['import_file_name'] == 'Education' ) :
                            $slide_value = $key;

                        elseif( $slide == 'Home Basic slider' && $selected_import['import_file_name'] == 'Basic' ) :
                            $slide_value = $key;
                        elseif( $slide == 'Home Creative slider' && $selected_import['import_file_name'] == 'Creative' ) :
                            $slide_value = $key;
                        elseif( $slide == 'Home Event slider' && $selected_import['import_file_name'] == 'Event' ) :
                            $slide_value = $key;
                        elseif( $slide == 'Fitness slider' && $selected_import['import_file_name'] == 'Fitness' ) :
                            $slide_value = $key;
                        elseif( $slide == 'Home Nature slider' && $selected_import['import_file_name'] == 'Nature' ) :
                            $slide_value = $key;
                        elseif( $slide == 'Photographer slider' && $selected_import['import_file_name'] == 'Photography' ) :
                            $slide_value = $key;
                        elseif( $slide == 'Blog Slider' && $selected_import['import_file_name'] == 'Blog From Side to Side' ) :
                            $slide_value = $key;

                        endif;
                    endforeach;
                endif;


                // Revolution Slider set
                if( $slide_value > 0 ) :

                    // basic homepages
                    if( $selected_import['import_file_name'] == 'Basic' ) :
                        $content = str_replace( '","slide":"12","class":"', '","slide":"'.intval( $slide_value ).'","class":"', $content );

                    elseif( $selected_import['import_file_name'] == 'Creative' ) :
                        $content = str_replace( '","slide":"17","class":"', '","slide":"'.intval( $slide_value ).'","class":"', $content );

                    elseif( $selected_import['import_file_name'] == 'Event' ) :
                        $content = str_replace( '","slide":"14","class":"', '","slide":"'.intval( $slide_value ).'","class":"', $content );

                    elseif( $selected_import['import_file_name'] == 'Fitness' ) :
                        $content = str_replace( '","slide":"18","class":"', '","slide":"'.intval( $slide_value ).'","class":"', $content );

                    elseif( $selected_import['import_file_name'] == 'Nature' ) :
                        $content = str_replace( '","slide":"11","class":"', '","slide":"'.intval( $slide_value ).'","class":"', $content );

                    elseif( $selected_import['import_file_name'] == 'Photography' ) :
                        $content = str_replace( '","slide":"13","class":"', '","slide":"'.intval( $slide_value ).'","class":"', $content );


                    // blog demo
                    elseif( $selected_import['import_file_name'] == 'Blog From Side to Side' ) :
                        $blog_option = $wpdb->get_results( "SELECT * FROM `$wpdb->postmeta` WHERE `meta_key` = 'fw_options' and `post_id` = '37' LIMIT 1" );
                        if( isset( $blog_option[0]->meta_value ) ) :
                            $blog_option_content = str_replace( ';s:18:"titlebar_revslider";s:1:"1";', ';s:18:"titlebar_revslider";s:'.strlen( $slide_value ).':"'.intval( $slide_value ).'";', $blog_option[0]->meta_value );
                            //error_log( 'Content: '.$blog_option_content, 0);
                            $wpdb->update( $wpdb->postmeta, array( 'meta_value' => $blog_option_content ), array( 'post_id' => 37, 'meta_key' => 'fw_options' ) );
                        endif;


                    // other demos
                    else :
                        $content = str_replace( '","slide":"1","class":"', '","slide":"'.intval( $slide_value ).'","class":"', $content );
                        $content = str_replace( '","slide":"2","class":"', '","slide":"'.intval( $slide_value ).'","class":"', $content );
                        $content = str_replace( '<p style=\"text-align: center;" class', '<p style=\"text-align: center;\" class', $content );
                    endif;
                endif;
            endif;
        endif;


        /* Page builder fix */
        $content = str_replace( '\\\\"', '\"', $content );
        $content = str_replace( '\\\\/', '\/', $content );
        $content = str_replace( '\\"', '\"', $content );
        $content = str_replace( '\\/', '\/', $content );
    	$wpdb->delete( $wpdb->postmeta, array( 'post_id' => intval( $meta->post_id ), 'meta_key' => 'fw:opt:ext:pb:page-builder:json' ) );
    	$wpdb->update( $wpdb->postmeta, array( 'meta_key' => 'fw:opt:ext:pb:page-builder:json', 'meta_value' => $content ), array( 'meta_id' => intval( $meta->meta_id ), 'post_id' => intval( $meta->post_id ) ) );
    endforeach;


    // Assign menus to their locations.
    $demo_name_clean = str_replace('(Unyson Builder)', '', $demo_name);
    $demo_name_clean = trim( $demo_name_clean );

    $main_menu1 = get_term_by( 'name', $demo_name . ' - Menu', 'nav_menu' );
    $main_menu2 = get_term_by( 'name', $demo_name_clean . ' - Menu', 'nav_menu' );
    $main_menu3 = get_term_by( 'name', 'Header - '.$demo_name, 'nav_menu' );
    $main_menu4 = get_term_by( 'name', 'Header - '.$demo_name_clean, 'nav_menu' );
    $main_menu5 = get_term_by( 'name', 'Menu 1', 'nav_menu' );
    $main_menu6 = get_term_by( 'name', 'Header Navigation', 'nav_menu' );
    $main_menu7 = get_term_by( 'name', 'Header', 'nav_menu' );

    if( isset( $main_menu1->term_id ) && $main_menu1->term_id > 0 ) :
        set_theme_mod( 'nav_menu_locations', array( 'header' => $main_menu1->term_id, ));
    elseif( isset( $main_menu2->term_id ) && $main_menu2->term_id > 0 ) :
        set_theme_mod( 'nav_menu_locations', array( 'header' => $main_menu2->term_id, ));
    elseif( isset( $main_menu3->term_id ) && $main_menu3->term_id > 0 ) :
        set_theme_mod( 'nav_menu_locations', array( 'header' => $main_menu3->term_id, ));
    elseif( isset( $main_menu4->term_id ) && $main_menu4->term_id > 0 ) :
        set_theme_mod( 'nav_menu_locations', array( 'header' => $main_menu4->term_id, ));
    elseif( isset( $main_menu5->term_id ) && $main_menu5->term_id > 0 ) :
        set_theme_mod( 'nav_menu_locations', array( 'header' => $main_menu5->term_id, ));
    elseif( isset( $main_menu6->term_id ) && $main_menu6->term_id > 0 ) :
        set_theme_mod( 'nav_menu_locations', array( 'header' => $main_menu6->term_id, ));
    elseif( isset( $main_menu7->term_id ) && $main_menu7->term_id > 0 ) :
        set_theme_mod( 'nav_menu_locations', array( 'header' => $main_menu7->term_id, ));
    endif;


    // Assign front page
    update_option( 'show_on_front', 'page' );
    $front_page_id1 = get_page_by_title( 'Home - '.$demo_name_clean );
    $front_page_id2 = get_page_by_title( 'Home - '.$demo_name );
    $front_page_id3 = get_page_by_title( 'Home '.$demo_name_clean );
    $front_page_id4 = get_page_by_title( 'Home '.$demo_name );
    $front_page_id5 = get_page_by_title( 'Home Basic' );
    $front_page_id6 = get_page_by_title( 'Your ocean of posts' );
    $front_page_id7 = get_page_by_title( 'Home' );
    if( isset( $front_page_id1->ID ) && $front_page_id1->ID > 0 ) :
        update_option( 'page_on_front', $front_page_id1->ID );
    elseif( isset( $front_page_id2->ID ) && $front_page_id2->ID > 0 ) :
        update_option( 'page_on_front', $front_page_id2->ID );
    elseif( isset( $front_page_id3->ID ) && $front_page_id3->ID > 0 ) :
        update_option( 'page_on_front', $front_page_id3->ID );
    elseif( isset( $front_page_id4->ID ) && $front_page_id4->ID > 0 ) :
        update_option( 'page_on_front', $front_page_id4->ID );
    elseif( isset( $front_page_id5->ID ) && $front_page_id5->ID > 0 ) :
        update_option( 'page_on_front', $front_page_id5->ID );
    elseif( isset( $front_page_id6->ID ) && $front_page_id6->ID > 0 ) :
        update_option( 'page_on_front', $front_page_id6->ID );
    elseif( isset( $front_page_id7->ID ) && $front_page_id7->ID > 0 ) :
        update_option( 'page_on_front', $front_page_id7->ID );
    endif;


    // Reset theme settings
    $upload_dir = wp_upload_dir();
    if( isset( $upload_dir['basedir'] ) ) :
        $file_path  = $upload_dir['basedir'] . '/jevelin-dynamic-styles.css';
        if( function_exists( 'wp_delete_file' ) ) :
            wp_delete_file( $file_path );
        endif;
    endif;
    delete_option( 'jevelin_settings_updated' );


    // fix onepager links
    $theme_urls = array(
        'https://cdn.jevelin.shufflehound.com/creative-vc/',
    );

    $locations = get_nav_menu_locations();
    $locations_header = isset( $locations[ 'header' ] ) ? $locations[ 'header' ] : '';
    $menu = wp_get_nav_menu_object( $locations_header );
    if( isset( $menu->term_id ) ) :
        $menuitems = wp_get_nav_menu_items( $menu->term_id );
    endif;
    if( !empty( $menuitems ) && is_array( $menuitems ) ) :
        foreach( $menuitems as $item ) :

            $i = 0;
            foreach( $theme_urls as $url ) :
                if( $i == 0 && strpos( $item->url, $url ) !== false ) :
                    update_post_meta(
                        $item->ID,
                        '_menu_item_url',
                        str_replace( $url, get_home_url().'/', $item->url )
                    );

                    $i++;
                endif;

                if( is_numeric( strpos( $item->url, "[SH-NAV-LINK]") ) ) :
                    update_post_meta(
                        $item->ID,
                        '_menu_item_url',
                        str_replace( '[SH-NAV-LINK]', get_home_url().'/#', $item->url )
                    );
                endif;
            endforeach;

        endforeach;
    endif;


}
add_action( 'pt-ocdi/after_import', 'jevelin_ocdi_after_import_setup' );
add_action( 'ocdi/after_import', 'jevelin_ocdi_after_import_setup' );
//var_dump( get_registered_nav_menus() );

/**
 * OCDI Demo Installation Method - Integration for Custom Frameworks and RevSlider
 */
if ( ! function_exists( 'jevelin_prefix_after_content_import_execution' ) ) {
  function jevelin_prefix_after_content_import_execution( $selected_import_files, $import_files, $selected_index ) {

    $downloader = new OCDI\Downloader();
    /* Custom Framework */
    if( ! empty( $import_files[$selected_index]['import_json'] ) ) {

      foreach( $import_files[$selected_index]['import_json'] as $index => $import ) {
        $file_path = $downloader->download_file( $import['file_url'], 'demo-json-import-file-'. $index . '-'. date( 'Y-m-d__H-i-s' ) .'.json' );
        $file_raw  = OCDI\Helpers::data_from_file( $file_path );
    	$media = wp_upload_dir();
    	if( isset( $media['baseurl'] ) ) :
    		$url = $media['baseurl'];
    		$url = str_replace('/', '\/', $url);
    		$url = str_replace('http:', '', $url);
            $url = str_replace('https:', '', $url);
    		$file_raw = str_replace( '[SH-JEVELIN-DOMAIN-MEDIA]', $url, $file_raw );
    		$file_raw = str_replace( '[SH-JEVELIN-DOMAIN]', get_site_url(), $file_raw );
    	endif;

        update_option( $import['option_name'], json_decode( $file_raw, true ) );
      }

    } else if( ! empty( $import_files[$selected_index]['local_import_json'] ) ) {

      foreach( $import_files[$selected_index]['local_import_json'] as $index => $import ) {
        $file_path = $import['file_path'];
        $file_raw  = OCDI\Helpers::data_from_file( $file_path );
        update_option( $import['option_name'], json_decode( $file_raw, true ) );
      }

    }

    $ocdi       = OCDI\OneClickDemoImport::get_instance();
    $log_path   = $ocdi->get_log_file_path();
    OCDI\Helpers::append_to_file( 'Custom Framework file loaded.', $log_path );


    /* Revolution Slider */
    if( class_exists( 'RevSlider' ) ) :
        if( !empty( $import_files[$selected_index]['import_revslider'] ) ) :
            $slider = new RevSlider();
            foreach( $import_files[$selected_index]['import_revslider'] as $index => $import ) :
                $file_path = $downloader->download_file( $import['file_url'], 'demo-revslider-import-file-'. $index . '-'. date( 'Y-m-d__H-i-s' ) .'.zip' );
                if( $file_path ) :
                    $slider->importSliderFromPost( true, true, $file_path );
                endif;
            endforeach;
        endif;
   endif;


   // Run Unyson content migration to Redux (if needed)
   if( jevelin_framework() == 'redux' ) :
       jevelin_framework_migrate_redux( 'start', 1 );
   endif;
  }
  add_action('pt-ocdi/after_content_import_execution', 'jevelin_prefix_after_content_import_execution', 3, 99 );
  add_action('ocdi/after_content_import_execution', 'jevelin_prefix_after_content_import_execution', 3, 99 );
}




/*
** Make sure that the main content will be imported
*/
function ocdi_before_content_import( $selected_import_files, $import_files = '', $selected_index = '' ) {
    $content_file = !empty( $selected_import_files['content'] ) ? $selected_import_files['content'] : '';
    if( $content_file ) :
        $orginal_content_data = $content_data = file_get_contents( $content_file );

        // Get XML posts
        $content_data = str_replace( 'wp:post_id>', 'wp_post_id>', $content_data );
        $content_data = str_replace( 'wp:post_name>', 'wp_post_name>', $content_data );
        $xml = json_decode( json_encode( (array)simplexml_load_string( $content_data ) ), true );
        $items = !empty( $xml['channel']['item'] ) ? $xml['channel']['item'] : [];

        // Find Home post
        $home_id = $header_id = $footer_id = $home_guid = $home_slug = '';
        foreach( $items as $item ) : $item = (object)$item;
            if( isset( $item->title ) && !is_array( $item->title ) && is_numeric( strpos( $item->title, 'Home - ' ) ) ) :
                $home_id = intval( $item->wp_post_id );
                $home_guid = $item->guid;
                $home_slug = $item->wp_post_name;
            endif;
        endforeach;

        // Change Home ID
        if( $home_id > 0 && $home_slug ) :
            $post_slug_exists = get_page_by_path( $home_slug, OBJECT, 'page' );
            if( !$post_slug_exists ) :

                global $wpdb;
                $result = $wpdb->get_results( "SELECT ID FROM $wpdb->posts ORDER BY ID DESC LIMIT 1" );
                $max_id = !empty( $result[0]->ID ) ? ( intval( $result[0]->ID ) + 1 ) : '';

                if( $max_id > 0 ) :
                    $orginal_content_data = str_replace( '<wp:post_id>'.intval( $home_id ).'</wp:post_id>', '<wp:post_id>'.intval( $max_id ).'</wp:post_id>', $orginal_content_data );
                    if( $home_guid ) :
                        $home_guid_new = explode( '?', $home_guid );
                        $home_guid_new = !empty( $home_guid_new[0] ) ? $home_guid_new[0] : '';
                        $home_guid_new = $home_guid_new . '?page_id=' . $max_id;
                        $orginal_content_data = str_replace( '<guid isPermaLink="false">'.( $home_guid ).'</guid>', '<guid isPermaLink="false">'.( $home_guid_new ).'</guid>', $orginal_content_data );
                    endif;

                    if( $orginal_content_data ) :
                        file_put_contents( $content_file, $orginal_content_data );
                    endif;
                endif;

            endif;
        endif;
    endif;
}
add_action( 'pt-ocdi/before_content_import_execution', 'ocdi_before_content_import', 10 );
add_action( 'ocdi/before_content_import_execution', 'ocdi_before_content_import', 10 );




function ocdi_register_plugins( $plugins ) {
    $theme_plugins = [
        [
            'name' => esc_html__( 'Redux Framework', 'jevelin' ),
            'description' => 'Adds main theme settings for controling layouts, colors, fonts etc',
            'slug' => 'redux-framework',
            'required' => true,
        ],
        [
            'name' => esc_html__( 'WPBakery Page Builder', 'jevelin' ),
            'description' => 'Main page builder (formerly Visual Composer). Build a responsive website and manage your content easily with intuitive WordPress Front end editor',
            'slug' => 'js_composer',
            'required' => true,
        ],
        [
            'name' => esc_html__( 'Slider Revolution', 'jevelin' ),
            'description' => 'Slider Revolution is a new way to build rich & dynamic slides',
            'slug' => 'revslider',
            'required'  => false,
        ],
        [
            'name' => esc_html__( 'Contact Form 7', 'jevelin' ),
            'description'  => 'Manage multiple contact forms, customize the form and the mail contents flexibly',
            'slug' => 'contact-form-7',
            'required'  => false,
        ],
        [
            'name' => esc_html__( 'WooCommerce', 'jevelin' ),
            'description' => 'Most customizable eCommerce platform for building online business',
            'slug' => 'woocommerce',
            'required' => false,
        ],

    ];
    return array_merge( $plugins, $theme_plugins );
}
add_filter( 'ocdi/register_plugins', 'ocdi_register_plugins' );
