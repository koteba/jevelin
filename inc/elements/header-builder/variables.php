<?php
// Params extraction
extract( shortcode_atts( array(
    // Header
    'width' => 'standard',
    'header_layout' => '1',
    'header_preset' => 'dark',
    'header_height' => '70px',
    'header_font_size' => '',
    'header_icon_size' => '',
    'header_background_color' => '',
    'header_element_spacing' => 'standard',
    'header_nav_spacing' => 'standard',
    'header_icon_color' => '',
    'header_icon_hover_color' => '',
    'header_cart_bubble_color' => '',
    'header_nav_bottom_line' => '',
    'header_nav_letter_spacing' => '',
    'header_sticky' => 'disabled',
    'header_shadow' => 'disabled',
    'header_icon_pack' => 'simple',
    'header_padding' => '',

    'header_logo' => '',
    'header_logo_sticky' => '',
    'header_logo_responsive' => '',

    'header_nav_font_family' => 'body',
    'header_nav_font_weight' => '400',
    'header_nav_font_weight_active' => 'disabled',
    'header_nav_text_color' => '',
    'header_nav_text_hover_color' => '',
    'header_nav_search_hidden' => false,
    'header_nav_social_hidden' => false,
    'header_nav_cart_hidden' => false,
    'header_nav_language_hidden' => false,
    'header_nav_buttons_hidden' => false,

    'dropdown_style' => '2',
    'dropdown_background_color' => '',
    'dropdown_link_color' => '',
    'dropdown_link_active_color' => '',
    'dropdown_link_hover_color' => '',
    'dropdown_title_color' => '',
    'dropdown_border_color' => '',
    'header_nav_elements_spacing' => '0px',
    'header_bottom_border_color' => '',
    'dropdown_item_background_color' => '',
    'dropdown_item_text_color' => '',

    'sticky_height' => '60px',
    'sticky_shadow' => 'disabled',
    'sticky_background_color' => '#ffffff',
    'sticky_nav_text_color' => '',
    'sticky_nav_text_hover_color' => '',
    'sticky_icon_color' => '',

    'header_buttons' => '',
    'header_buttons_weight' => '400',
    'header_buttons_style' => 'dark',
    'header_buttons_radius' => '8px',
    'header_buttons_height' => '',
    'header_buttons_leftright_padding' => '',
    'header_button_text_color' => '',
    'header_button_text_hover_color' => '',
    'header_button_background_color' => '',
    'header_button_background_hover_color' => '',
    'header_button_uppercase' => false,
    'header_nav_button_spacing' => '',


    // Topbar
    'topbar_hidden' => false,
    'topbar_hidden_mobile' => 'default',
    'topbar_height' => '40px',
    'topbar_font_size' => '',
    'topbar_icon_size' => '',
    'topbar_weight' => '',
    'topbar_background_color' => '',
    'topbar_text_color' => '',

    'topbar_contact_location' => '',
    'topbar_contact_email' => 'info@your-email',
    'topbar_contact_phone' => '',
    'topbar_contact_working_hours' => '',
    'topbar_contacts_icon_color' => '',
    'topbar_contacts_icon_hover_color' => '',
    'topbar_bottom_border_color' => '',
    'topbar_contacts_item_margin' => '',
    'topbar_contacts_letter_spacing' => '',

    'social_facebook' => '#',
    'social_twitter' => '#',
    'social_youtube' => '#',
    'social_instagram' => '#',
    'social_pinterest' => '',
    'social_linkedin' => '',

    'topbar_navigation_uppercase' => false,
    'topbar_navigation_weight' => '400',
    'topbar_navigation_text_hover_color' => '',

    'topbar_buttons' => array(),
    'topbar_buttons_weight' => '400',
    'topbar_buttons_style' => 'dark',
    'topbar_buttons_radius' => '8px',
    'topbar_button_text_color' => '',
    'topbar_button_text_hover_color' => '',
    'topbar_button_background_color' => '',
    'topbar_button_background_hover_color' => '',
    'topbar_button_uppercase' => false,

    'topbar_contacts_position' => 'left',
    'topbar_social_position' => 'left',
    'topbar_navigation_position' => 'right',
    'topbar_buttons_position' => 'right',
    'topbar_search_position' => 'left',
    'topbar_contacts_hidden' => false,
    'topbar_social_hidden' => false,
    'topbar_navigation_hidden' => false,
    'topbar_buttons_hidden' => false,
    'topbar_search_show' => false,


    // Responsive
    'mobile_header_layout' => '1',
    'mobile_sticky_header' => 'default',
    'mobile_dropdown_search_hidden' => false,
    'mobile_dropdown_social_hidden' => false,
    'mobile_height' => '70px',
    'mobile_icon_size' => '',
    'mobile_icon_color' => '',
    'mobile_icon_hover_color' => '',
    'mobile_background_color' => '',
    'mobile_border_color' => '#e4e4e4',


    // Search
    'search_background' => '#ffffff',
    'search_text_color' => '',
    'search_text_placholder_color' => '',
    'search_search_icon_color' => '',
    'search_close_icon_color' => '',


    // Design Options
    'css' => 'none',
), $atts ) );


// Icons
if( $header_icon_pack == 'themify' ) :
    $icon = (object)array(
        'facebook' => 'ti-facebook',
        'twitter' => 'ti-twitter',
        'youtube' => 'ti-youtube',
        'instagram' => 'ti-instagram',
        'pinterest' => 'ti-pinterest',
        'linkedin' => 'ti-linkedin',
        'search' => 'ti-search',
        'cart' => 'ti-shopping-cart',
        'contacts_location' => 'ti-location-pin',
        'contacts_email' => 'ti-email',
        'contacts_phone' => 'ti-mobile',
        'contacts_working_hours' => 'ti-time',
    );
elseif( $header_icon_pack == 'fa' ) :
    $icon = (object)array(
        'facebook' => 'fa fa-facebook',
        'twitter' => 'fa fa-twitter',
        'youtube' => 'fa fa-youtube-play',
        'instagram' => 'fa fa-instagram',
        'pinterest' => 'fa fa-pinterest',
        'linkedin' => 'fa fa-linkedin',
        'search' => 'fa fa-search',
        'cart' => 'fa fa-shopping-bag',
        'contacts_location' => 'fa fa-map-marker',
        'contacts_email' => 'fa fa-envelope-o',
        'contacts_phone' => 'fa fa-phone',
        'contacts_working_hours' => 'fa fa-clock-o',
    );
else :
    $icon = (object)array(
        'facebook' => 'icon-social-facebook',
        'twitter' => 'icon-social-twitter',
        'youtube' => 'icon-social-youtube',
        'instagram' => 'icon-social-instagram',
        'pinterest' => 'icon-social-pinterest',
        'linkedin' => 'icon-social-linkedin',
        'search' => 'icon-magnifier',
        'cart' => 'icon-bag',
        'contacts_location' => 'icon-location-pin',
        'contacts_email' => 'icon-envelope',
        'contacts_phone' => 'icon-call-in',
        'contacts_working_hours' => 'icon-clock',
    );
endif;


$socials = array(
    array(
        'link' => $social_facebook,
        'icon' => $icon->facebook
    ),
    array(
        'link' => $social_twitter,
        'icon' => $icon->twitter
    ),
    array(
        'link' => $social_youtube,
        'icon' => $icon->youtube
    ),
    array(
        'link' => $social_instagram,
        'icon' => $icon->instagram
    ),
    array(
        'link' => $social_pinterest,
        'icon' => $icon->pinterest
    ),
    array(
        'link' => $social_linkedin,
        'icon' => $icon->linkedin
    ),
);






$id = 'sh-header-builder-'.jevelin_rand();
$element_main_class = array();
$element_class = array();
$element_class[] = $id;
$element_class[] = 'sh-header-builder-main-spacing-'.esc_attr( $header_element_spacing );
$element_class[] = 'sh-header-builder-main-nav-spacing-'.esc_attr( $header_nav_spacing );
$element_main_class[] = 'sh-header-builder-main-sticky-'.esc_attr( $header_sticky );
$element_main_class[] = 'sh-header-megamenu-style'.intval( $dropdown_style );


if( 'shufflehound_header' == get_post_type( get_the_ID() ) ) :
    $header_above_content = jevelin_post_option( get_option( 'page_on_front' ), 'header_above_content' );
else :
    $header_above_content = jevelin_post_option( get_the_ID(), 'header_above_content' );
endif;


if( $header_above_content == 'enabled' ) :
    $element_class[] = 'sh-header-builder-main-above-content';
endif;
if( $header_shadow != 'disabled' ) :
    $element_main_class[] = 'sh-header-builder-main-shadow-'.$header_shadow;
endif;
if( $sticky_shadow != 'disabled' ) :
    $element_main_class[] = 'sh-header-builder-main-sticky-shadow-'.$sticky_shadow;
endif;



if( intval( $header_icon_size ) < 20 ) :
    $element_class[] = 'sh-header-builder-main-icons-small';
endif;


$settings_base = !empty( $this->settings['base'] ) ? $this->settings['base'] : '';
$element_class[] = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $settings_base, $atts );
