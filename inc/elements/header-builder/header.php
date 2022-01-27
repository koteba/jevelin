<?php



















// Header - Logo
$div_logo = '<div class="sh-header-builder-logo">';
    $div_logo.= '<a href="'. esc_url( home_url( '/' ) ) .'">';

        $standard_url = get_template_directory_uri().'/img/logo.png';

        // standard
        $url = ( is_numeric( $header_logo ) && jevelin_get_small_thumb( $header_logo ) ) ? jevelin_get_small_thumb( $header_logo ) : $standard_url;
        $div_logo.= '<img src="'.esc_url( $url ).'" class="sh-header-builder-logo-standard" />';

        // sticky
        $url = ( is_numeric( $header_logo_sticky ) && jevelin_get_small_thumb( $header_logo_sticky ) ) ? jevelin_get_small_thumb( $header_logo_sticky ) : $url;
        $div_logo.= '<img src="'.esc_url( $url ).'" class="sh-header-builder-logo-sticky" />';

    $div_logo.= '</a>';
$div_logo.= '</div>';



// Header - Navigation
$div_navigation_elements = '';
$div_navigation = '';
if ( has_nav_menu( 'header' ) ) :
    $div_navigation = wp_nav_menu( array(
        'theme_location' => 'header',
        'depth' => 4,
        'container_class' => 'sh-header-builder-main-element sh-header-builder-main-element-navigation sh-nav-container',
        'menu_class' => 'sh-nav',
        'echo' => false
    ));
endif;



// Header - Logo in center of navigation
$div_navigation_left = '';
$div_navigation_right = '';
$div_navigation_elements_left = '';
$div_navigation_elements_right = '';
if( in_array( $header_layout, array( 4, 6 ) ) ) :

    // Header - Navigation Left Side
    if ( has_nav_menu( 'header-left' ) ) :
        $div_navigation_left = wp_nav_menu( array(
            'theme_location' => 'header-left',
            'depth' => 4,
            'container_class' => 'sh-header-builder-main-element sh-header-builder-main-element-navigation sh-nav-container',
            'menu_class' => 'sh-nav',
            'echo' => false
        ));
    endif;

    // Header - Navigation Right Side
    if ( has_nav_menu( 'header-right' ) ) :
        $div_navigation_right = wp_nav_menu( array(
            'theme_location' => 'header-right',
            'depth' => 4,
            'container_class' => 'sh-header-builder-main-element sh-header-builder-main-element-navigation sh-nav-container',
            'menu_class' => 'sh-nav',
            'echo' => false
        ));
    endif;
endif;



// Header - Navigation Element - Social Media
if( $header_nav_social_hidden != true ) :
    $self = '';
    foreach( $socials as $social ) :
        if( isset( $social['link'] ) && $social['link'] ) :
            $self.= '
            <div class="sh-header-builder-main-element sh-header-builder-main-element-social">
                <a href="'.$social['link'].'" target="_blank">
                    <i class="'.$social['icon'].' sh-header-builder-main-element-icon"></i>
                </a>
            </div>';
        endif;
    endforeach;
    $div_navigation_elements.= $self;
    $div_navigation_elements_left.= $self;
endif;


// Header - Navigation Element - Search
if( $header_nav_search_hidden != true ) :
    $self = '
    <div class="sh-header-builder-main-element sh-header-builder-main-element-search sh-nav-container">
        <ul class="sh-nav">
            <li class="menu-item sh-nav-search sh-header-builder-search-trigger">
                <a href="#"><i class="'.$icon->search.' sh-header-builder-main-element-icon"></i></a>
            </li>
        </ul>
    </div>';
    $div_navigation_elements.= $self;
    $div_navigation_elements_right.= $self;
endif;


// Header - Navigation Element - Cart
if( class_exists( 'WooCommerce' ) && $header_nav_cart_hidden != true ) :
    $self = '
    <div class="sh-header-builder-main-element sh-header-builder-main-element-cart sh-nav-container">
        <ul class="sh-nav">
            '.jevelin_nav_wrap_cart( NULL, 1 ).'
        </ul>
    </div>';
    $div_navigation_elements.= $self;
    $div_navigation_elements_right.= $self;
endif;


// Header - Navigation Element - Language Switch
$languages = array();
if( function_exists( 'pll_the_languages' ) ) :
    foreach( pll_the_languages( array( 'raw' =>1 ) ) as $language ) :
        $languages[] = '<li class="menu-item sh-nav-language"><a href="'.esc_url( $language['url'] ).'">'.$language['slug'].'</a></li>';
    endforeach;
endif;

if( $header_nav_language_hidden != true && count( $languages ) ) :
    $self = '
    <div class="sh-header-builder-main-element sh-header-builder-main-element-language sh-nav-container">
        <ul class="sh-nav">
            '.implode( '', $languages ).'
        </ul>
    </div>';
    $div_navigation_elements.= $self;
    $div_navigation_elements_right.= $self;
endif;


// Header - Buttons
if( $header_buttons ) :
    $header_buttons = vc_param_group_parse_atts( $header_buttons );
endif;

$self = '';
$buttons_classes = array();
if( $header_nav_buttons_hidden != true && is_array( $header_buttons ) && count( $header_buttons ) ) :
    $buttons_data = '';
    //$buttons_classes[] = ( $topbar_buttons_style ) ? 'sh-header-builder-buttons-style-'.$topbar_buttons_style : '';
    $buttons_classes = [];

    foreach( $header_buttons as $button ) :
        if( isset( $button['name'] ) && $button['name'] && isset( $button['link'] ) ) :
            $icon = '';
            if( isset( $button['icon'] ) && $button['icon'] ) :
                $icon = '<i class="'.esc_attr( $button['icon']  ).'"></i>';
            endif;

            $buttons_data.= '
            <a href="'.$button['link'].'" class="sh-header-builder-main-element-button-item">
                '. $icon . $button['name'] .'
            </a>';
        endif;
    endforeach;

    if( $buttons_data ) :
        $self = '<div class="sh-header-builder-main-element sh-header-builder-main-element-buttons sh-nav-container" style="display: inline-block;">
            <div class="sh-header-builder-main-element-button-container '.implode( ' ', $buttons_classes ).'">';
        $self.= $buttons_data;
        $self.= '</div></div>';
    endif;



    $div_navigation_elements.= $self;
    $div_navigation_elements_right.= $self;
endif;







// Add elements to navigation
$header_nav_divider = '<div class="sh-header-builder-main-element sh-header-builder-main-element-divider"></div>';
if( $div_navigation_elements && $header_layout != 8 ) :
    $div_navigation.= $header_nav_divider.$div_navigation_elements;
endif;
if( $div_navigation_elements_left ) :
    $div_navigation_left.= $header_nav_divider.$div_navigation_elements_left;
endif;
if( $div_navigation_elements_right ) :
    $div_navigation_right.= $header_nav_divider.$div_navigation_elements_right;
endif;
?>


<div class="sh-header-builder-main sh-header-builder-layout<?php echo esc_attr( $header_layout ); ?> <?php echo implode( ' ', $element_main_class ); ?>">
    <div class="sh-header-builder-main-container">
        <div class="container">
            <div class="sh-header-builder-main-content">
                <?php if( $header_layout == 8 ) : ?>

                    <div class="sh-header-builder-main-content-left">

                        <div class="sh-header-builder-main-logo">
                            <?php echo ( $div_logo ); ?>
                        </div>

                    </div>
                    <div class="sh-header-builder-main-content-center">

                        <div class="sh-header-builder-main-navigation">
                            <div class="sh-header-builder-main-navigation-alignment">
                                <?php echo ( $div_navigation ); ?>
                            </div>
                        </div>

                    </div>
                    <div class="sh-header-builder-main-content-right">

                        <div class="sh-header-builder-main-elements">
                            <div class="sh-header-builder-main-elements-alignment">
                                <?php echo ( $div_navigation_elements ); ?>
                            </div>
                        </div>

                    </div>

                <?php elseif( $header_layout == 7 ) : ?>

                    <div class="sh-header-builder-main-logo">
                        <?php echo ( $div_logo ); ?>
                    </div>
                    <div class="sh-header-builder-main-content-center">

                        <div class="sh-header-builder-main-navigation">
                            <div class="sh-header-builder-main-navigation-alignment">
                                <?php echo ( $div_navigation ); ?>
                            </div>
                        </div>

                    </div>

                <?php elseif( $header_layout == 6 ) : ?>

                    <div class="sh-header-builder-main-content-left">

                        <div class="sh-header-builder-main-navigation text-right">
                            <div class="sh-header-builder-main-navigation-alignment">
                                <?php echo ( $div_navigation_left ); ?>
                            </div>
                        </div>

                    </div>
                    <div class="sh-header-builder-main-content-center">

                        <div class="sh-header-builder-main-logo">
                            <?php echo ( $div_logo ); ?>
                        </div>

                    </div>
                    <div class="sh-header-builder-main-content-right">

                        <div class="sh-header-builder-main-navigation">
                            <div class="sh-header-builder-main-navigation-alignment">
                                <?php echo ( $div_navigation_right ); ?>
                            </div>
                        </div>

                    </div>

                <?php elseif( $header_layout == 5 ) : ?>

                    <div class="sh-header-builder-main-content-left">

                        <div class="sh-header-builder-main-logo">
                            <?php echo ( $div_logo ); ?>
                        </div>

                    </div>
                    <div class="sh-header-builder-main-content-right">

                        <div class="sh-header-builder-main-navigation">
                            <div class="sh-header-builder-main-navigation-alignment">
                                <?php echo ( $div_navigation ); ?>
                            </div>
                        </div>

                    </div>

                <?php elseif( $header_layout == 4 ) : ?>

                    <div class="sh-header-builder-main-content-left">

                        <div class="sh-header-builder-main-navigation text-right">
                            <div class="sh-header-builder-main-navigation-alignment">
                                <?php echo ( $div_navigation_left ); ?>
                            </div>
                        </div>

                    </div>
                    <div class="sh-header-builder-main-content-center">

                        <div class="sh-header-builder-main-logo">
                            <?php echo ( $div_logo ); ?>
                        </div>

                    </div>
                    <div class="sh-header-builder-main-content-right">

                        <div class="sh-header-builder-main-navigation">
                            <div class="sh-header-builder-main-navigation-alignment">
                                <?php echo ( $div_navigation_right ); ?>
                            </div>
                        </div>

                    </div>

                <?php elseif( $header_layout == 3 ) : ?>

                    <div class="sh-header-builder-main-logo">
                        <?php echo ( $div_logo ); ?>
                    </div>
                    <div class="sh-header-builder-main-content-center">

                        <div class="sh-header-builder-main-navigation">
                            <div class="sh-header-builder-main-navigation-alignment">
                                <?php echo ( $div_navigation ); ?>
                            </div>
                        </div>

                    </div>

                <?php elseif( $header_layout == 2 ) : ?>

                    <div class="sh-header-builder-main-content-left">

                        <div class="sh-header-builder-main-navigation">
                            <div class="sh-header-builder-main-navigation-alignment">
                                <?php echo ( $div_navigation ); ?>
                            </div>
                        </div>

                    </div>
                    <div class="sh-header-builder-main-content-right">

                        <div class="sh-header-builder-main-logo">
                            <?php echo ( $div_logo ); ?>
                        </div>

                    </div>

                <?php else : ?>

                    <div class="sh-header-builder-main-content-left">

                        <div class="sh-header-builder-main-logo">
                            <?php echo ( $div_logo ); ?>
                        </div>

                    </div>
                    <div class="sh-header-builder-main-content-right">

                        <div class="sh-header-builder-main-navigation">
                            <div class="sh-header-builder-main-navigation-alignment">
                                <?php echo ( $div_navigation ); ?>
                            </div>
                        </div>

                    </div>

                <?php endif; ?>
            </div>
        </div>

        <?php
            /* Header popup search */
            set_query_var( 'header_builder_search', 1 );
            get_template_part('inc/headers/header-search');
        ?>
    </div>
</div>
