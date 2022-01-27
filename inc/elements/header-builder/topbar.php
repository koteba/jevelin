<?php
// Topbar - Contacts
$div_contacts = '';
$contacts_classes = array();
if( $topbar_contacts_hidden != true ) :
    $div_contacts = '<div class="sh-header-builder-topbar-group" style="display: inline-block;"><div class="sh-header-builder-contacts sh-header-builder-contacts-content">';

    if( $topbar_contact_location ) :
        $div_contacts.= '<div><i class="'.$icon->contacts_location.'"></i><span>'.$topbar_contact_location.'</span></div>';
    endif;

    if( $topbar_contact_email ) :
        $div_contacts.= '<div><i class="'.$icon->contacts_email.'"></i><span>'.$topbar_contact_email.'</span></div>';
    endif;

    if( $topbar_contact_phone ) :
        $div_contacts.= '<div><i class="'.$icon->contacts_phone.'"></i><span>'.$topbar_contact_phone.'</span></div>';
    endif;

    if( $topbar_contact_working_hours ) :
        $div_contacts.= '<div><i class="'.$icon->contacts_working_hours.'"></i><span>'.$topbar_contact_working_hours.'</span></div>';
    endif;

    $div_contacts.= '</div></div>';
endif;


// Topbar - Social Icons
$div_social = '';
$social_classes = array();
if( $topbar_social_hidden != true ) :
    $div_social = '<div class="sh-header-builder-topbar-group" style="display: inline-block;"><div class="sh-header-builder-social sh-header-builder-contacts '.implode( ' ', $social_classes ).'">';
    foreach( $socials as $social ) :
        if( isset( $social['link'] ) && $social['link'] ) :
            $div_social.= '
            <a href="'.$social['link'].'" target="_blank">
                <i class="'.$social['icon'].'"></i>
            </a>';
        endif;
    endforeach;
    $div_social.= '</div></div>';
endif;


// Topbar - Search
$div_search = '';
if( $topbar_search_show ) :
    $div_search = '
    <div class="sh-header-builder-topbar-group" style="display: inline-block;">
        <div class="sh-header-builder-social sh-header-builder-contacts">

            <div class="sh-header-builder-search-trigger" style="margin-left: 0;">
                <a href="#">
                    <i class="icon-magnifier sh-header-builder-main-element-icon" style="margin-right: 0;"></i>
                </a>
            </div>

        </div>
    </div>';
endif;


// Topbar - Buttons
$div_buttons = '';
$buttons_classes = array();
if( $topbar_buttons_hidden != true ) :
    $topbar_buttons = '';
    if( $topbar_buttons ) :
        $topbar_buttons = vc_param_group_parse_atts( $topbar_buttons );
    endif;

    $buttons_classes[] = ( $topbar_buttons_style ) ? 'sh-header-builder-buttons-style-'.$topbar_buttons_style : '';
    $div_buttons = '<div class="sh-header-builder-topbar-group" style="display: inline-block;"><div class="sh-header-builder-buttons sh-header-builder-contacts '.implode( ' ', $buttons_classes ).'">';

    if( is_array( $topbar_buttons ) && count( $topbar_buttons ) ) :
        foreach( $topbar_buttons as $button ) :
            $div_buttons.= '<a href="'.$button['link'].'">'.$button['name'].'</a>';
        endforeach;
    endif;

    $div_buttons.= '</div></div>';
endif;


// Topbar - Navigation
$div_topbar_navigation = '';
if( $topbar_navigation_hidden != true ) :
    $topbar_navigation_uppercase = ( $topbar_navigation_uppercase ) ? ' sh-text-uppercase' : '';

    $div_topbar_navigation = wp_nav_menu( array(
        'theme_location' => 'topbar',
        'depth' => 1,
        'container_class' => 'sh-header-builder-topbar-group'.$topbar_navigation_uppercase,
        'menu_class' => 'sh-topbar-nav',
        'echo' => false
    ));
endif;


// Topbar - Positions
$topbar = (object)array(
    'left' => '',
    'center' => '',
    'right' => '',
);
if( $topbar_contacts_position == 'right' ) :
    $topbar->right.= $div_contacts;
else :
    $topbar->left.= $div_contacts;
endif;

if( $topbar_social_position == 'right' ) :
    $topbar->right.= $div_social;
else :
    $topbar->left.= $div_social;
endif;

if( $topbar_navigation_position == 'right' ) :
    $topbar->right.= $div_topbar_navigation;
else :
    $topbar->left.= $div_topbar_navigation;
endif;

if( $topbar_buttons_position == 'right' ) :
    $topbar->right.= $div_buttons;
else :
    $topbar->left.= $div_buttons;
endif;

if( $topbar_search_position == 'right' ) :
    $topbar->right.= $div_search;
else :
    $topbar->left.= $div_search;
endif;




$topbar_classes = array();
$topbar_classes[] = 'sh-header-builder-topbar';
$topbar_classes[] = 'sh-header-builder-topbar-mobile-' . $topbar_hidden_mobile;
?>


<div class="<?php echo implode( ' ', $topbar_classes ); ?>">
    <div class="sh-header-builder-topbar-container container" style="display: flex;">

        <div class="sh-header-builder-topbar-content" style="display: flex; width: 100%; align-items: center;">
            <div class="sh-header-builder-topbar-left" style="flex:1;">
                <?php echo ( $topbar->left ); ?>
            </div>
            <div class="sh-header-builder-topbar-right" style="text-align: right;">
                <?php echo ( $topbar->right ); ?>
            </div>
        </div>

    </div>
</div>
