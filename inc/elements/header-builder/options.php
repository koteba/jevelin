<?php
$tab = 'vc_col-xs-12 wpbakery-element-tab wpbakery-element-tab-';
$half_width = ' vc_col-xs-6';
$hidden = ' wpbakery-element-tab-hidden';
$html = '
<div class="wpbakery-element-minitabs">
    <div data-id="main" class="active">
        <i class="ti-settings"></i>
        General
    </div>
    <div data-id="navigation">
        <i class="ti-brush-alt"></i>
        Navigation
    </div>
    <div data-id="dropdown">
        <i class="ti-brush-alt"></i>
        Dropdown
    </div>
    <div data-id="logo">
        <i class="ti-image"></i>
        Logo
    </div>
    <div data-id="sticky">
        <i class="ti-crown"></i>
        Sticky
    </div>
    <div data-id="buttons">
        <i class="ti-link"></i>
        Buttons
    </div>
</div>';


vc_map(
    array(
        'name' => __('Header Builder', 'jevelin'),
        'base' => 'vcj_header_builder',
        'description' => __('Build your header in WPbakery', 'jevelin'),
        'category' => __('Jevelin Elements', 'jevelin'),
        'icon' => get_template_directory_uri().'/img/builder-icon.png',
        'params' => array(


            /**
             * Header
             */
            array (
                'heading' => $html,
                'param_name' => 'no-input1',
                'type' => 'textfield',
                'group' => 'Header',
                'edit_field_class' => 'vc_col-xs-12 wpbakery-element-tab-html'
            ),

            array (
                'param_name' => 'header_layout',
                'heading' => 'Header Layouts',
                'value' => array (
                    'Layout 1 (navigation in right)' => '1',
                    'Layout 2 (navigation in left)' => '2',
                    'Layout 3 (navigation below logo centered)' => '3',
                    'Layout 4 (logo inbetween navigation)' => '4',
                    'Layout 5 (navigation in left + logo in left)' => '5',
                    'Layout 6 (logo inbetween navigation - full width)' => '6',
                    'Layout 7 (navigation below logo in left)' => '7',
                    'Layout 8 (navigation in middle)' => '8',
                ),
                'type' => 'dropdown',
                'std' => 'dark',
                'group' => 'Header',
                'edit_field_class' => $tab.'main'
            ),

            array (
                'param_name' => 'width',
                'heading' => __( 'Width', 'jevelin' ),
                'description' => __( 'Choose header content width', 'jevelin' ),
                'value' => array (
                    'Standard' => 'standard',
                    'Full (100%)' => 'full',
                ),
                'type' => 'dropdown',
                'std' => 'standard',
                'group' => 'Header',
                'edit_field_class' => $tab.'main vc_col-xs-6'
            ),

            array (
                'param_name' => 'header_height',
                'heading' => __( 'Height', 'jevelin' ),
                'description' => __( 'Enter header height in PX', 'jevelin' ),
                'type' => 'textfield',
                'std' => '70px',
                'group' => 'Header',
                'edit_field_class' => $tab.'main vc_col-xs-6'
            ),

            array (
                'param_name' => 'header_preset',
                'heading' => 'Color Preset',
                'description' => 'Choose color preset, that can be overwritten by color options',
                'value' =>
                array (
                    'Dark Text + White Background' => 'dark',
                    'Light Text + Dark Background' => 'light',
                    'Dark Text + Transparent Background' => 'dark-transparent',
                    'Light Text + Transparent Background' => 'light-transparent',
                ),
                'type' => 'dropdown',
                'std' => 'dark',
                'group' => 'Header',
                'edit_field_class' => $tab.'main'
            ),

            array (
                'param_name' => 'header_sticky',
                'heading' => 'Sticky Header',
                'description' => 'Enable or disable sticky header',
                'value' =>
                array (
                    'Disabled' => 'disabled',
                    'Enabled' => 'enabled',
                ),
                'type' => 'dropdown',
                'std' => 'disabled',
                'group' => 'Header',
                'edit_field_class' => $tab.'main'
            ),

            array (
                'param_name' => 'header_shadow',
                'heading' => 'Shadow',
                'value' =>
                array (
                    'Disabled' => 'disabled',
                    'XSmall' => 'xsmall',
                    'Small' => 'small',
                    'Medium' => 'medium',
                    'Large' => 'large',
                    'XLarge' => 'xlarge',
                ),
                'type' => 'dropdown',
                'std' => 'disabled',
                'group' => 'Header',
                'edit_field_class' => $tab.'main'
            ),

            array (
                'param_name' => 'header_background_color',
                'heading' => 'Background Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'main'
            ),

            array (
                'param_name' => 'header_bottom_border_color',
                'heading' => 'Bottom Border Color',
                'description' => 'Choose color to enable border bottom color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'main'
            ),

            array (
                'param_name' => 'header_padding',
                'heading' => __( 'Padding', 'jevelin' ),
                'description' => __( 'Enter header padding (top right bottom left). For example: 30px 0px 30px 0px', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Header',
                'edit_field_class' => $tab.'main'
            ),

            array (
                'param_name' => 'header_icon_pack',
                'heading' => 'Icon Pack',
                'description' => 'Choose header icon pack. Disabled when using with Jevelin Style 3',
                'value' =>
                array (
                    'Simple Line' => 'simple',
                    'Themify' => 'themify',
                    'Font Awesome' => 'fa',
                ),
                'type' => 'dropdown',
                'std' => 'simple',
                'group' => 'Header',
                'edit_field_class' => $tab.'main'
            ),


            // Logo
            array(
                'param_name' => 'header_logo',
                'heading' => __( 'Logo', 'jevelin' ),
                'description' => __( 'Upload your logo', 'jevelin' ),
                'type' => 'attach_image',
                'group' => 'Header',
                'edit_field_class' => $tab.'logo'.$hidden
            ),

            /*array(
                'param_name' => 'header_logo_retina',
                'heading' => __( 'Logo Retina (2x larger)', 'jevelin' ),
                'description' => __( 'Upload your logo', 'jevelin' ),
                'type' => 'attach_image',
                'group' => 'Header',
                'edit_field_class' => $tab.'logo'.$hidden
            ),*/

            /*array(
                'param_name' => 'header_logo_light',
                'heading' => __( 'Above Content Logo (optional)', 'jevelin' ),
                'description' => __( 'Upload your above content logo. Sometimes when using above content option its background color is dark and it is useful to upload light logo', 'jevelin' ),
                'type' => 'attach_image',
                'group' => 'Header',
                'edit_field_class' => $tab.'logo'.$hidden
            ),*/


            array(
                'param_name' => 'header_logo_sticky',
                'heading' => __( 'Sticky Logo (optional)', 'jevelin' ),
                'description' => __( 'Upload your logo', 'jevelin' ),
                'type' => 'attach_image',
                'group' => 'Header',
                'edit_field_class' => $tab.'logo'.$hidden
            ),


            /*array (
                'param_name' => 'header_logo_text',
                'heading' => __( 'Text', 'jevelin' ),
                'description' => __( 'Enter text logo', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Header',
                'edit_field_class' => $tab.'logo'.$hidden
            ),

            array (
                'param_name' => 'header_logo_text_size',
                'heading' => __( 'Size', 'jevelin' ),
                'description' => __( 'Enter text logo size in PX', 'jevelin' ),
                'value' => '21px',
                'type' => 'textfield',
                'group' => 'Header',
                'edit_field_class' => $tab.'logo'.$hidden
            ),

            array (
                'param_name' => 'header_logo_text_color',
                'heading' => 'Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'logo'.$hidden
            ),*/


            // Navigation
            array (
                'heading' => '<span style="color: #999;">Assign your pages and posts to your navigation <a href="'.admin_url( 'nav-menus.php' ).'" target="_blank">in this page</a>
                <br />(display location - Header Navigation)</span>',
                'description' => 'Choose text font',
                'param_name' => 'no-input3',
                'type' => 'textfield',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden.' wpbakery-element-tab-hidden-input'
            ),

            array (
                'param_name' => 'header_nav_font_family',
                'heading' => 'Font',
                'description' => 'Choose text font',
                'value' => array (
                    'Body' => 'body',
                    'Heading' => 'heading',
                ),
                'type' => 'dropdown',
                'std' => 'body',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden
            ),

            array (
                'param_name' => 'header_font_size',
                'heading' => __( 'Font Size', 'jevelin' ),
                'description' => __( 'Enter header font size in PX', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden.' vc_col-xs-6'
            ),

            array (
                'param_name' => 'header_icon_size',
                'heading' => __( 'Icon Size', 'jevelin' ),
                'description' => __( 'Enter header icon size in PX', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden.' vc_col-xs-6'
            ),

            array (
                'param_name' => 'header_nav_font_weight',
                'heading' => 'Font Weight',
                'value' => array (
                    'Light' => '300',
                    'Normal' => '400',
                    'Medium' => '500',
                    'Semi-Bold' => '600',
                    'Bold' => '700',
                    'Extra Bold' => '800',
                    'Black' => '900',
                ),
                'type' => 'dropdown',
                'std' => '400',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden.' vc_col-xs-6'
            ),

            array (
                'param_name' => 'header_nav_font_weight_active',
                'heading' => 'Font Weight (For Active Items)',
                'value' => array (
                    'Disabled' => 'disabled',
                    'Light' => '300',
                    'Normal' => '400',
                    'Medium' => '500',
                    'Semi-Bold' => '600',
                    'Bold' => '700',
                    'Extra Bold' => '800',
                    'Black' => '900',
                ),
                'type' => 'dropdown',
                'std' => 'disabled',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden.' vc_col-xs-6'
            ),

            array (
                'param_name' => 'header_nav_text_color',
                'heading' => 'Link Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden.$half_width
            ),

            array (
                'param_name' => 'header_nav_text_hover_color',
                'heading' => 'Link Hover Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden.$half_width
            ),

            array (
                'param_name' => 'header_icon_color',
                'heading' => 'Icon Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden.$half_width
            ),

            array (
                'param_name' => 'header_icon_hover_color',
                'heading' => 'Icon Hover Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden.$half_width
            ),

            array (
                'param_name' => 'header_cart_bubble_color',
                'heading' => 'Cart Bubble Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden
            ),

            array (
                'param_name' => 'header_nav_bottom_line',
                'heading' => 'Bottom Line Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden
            ),

            array (
                'param_name' => 'header_nav_spacing',
                'heading' => 'Navigation Spacing',
                'description' => 'Choose header navigation element spacing',
                'value' =>
                array (
                    'Small' => 'small',
                    'Standard' => 'standard',
                    'Large' => 'large',
                ),
                'type' => 'dropdown',
                'std' => 'standard',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden.' vc_col-xs-6'
            ),

            array (
                'param_name' => 'header_element_spacing',
                'heading' => 'Element Spacing',
                'description' => 'Choose header element spacing',
                'value' =>
                array (
                    'Small' => 'small',
                    'Standard' => 'standard',
                    'Large' => 'large',
                    'XLarge' => 'xlarge',
                    'XXLarge' => 'xxlarge',
                ),
                'type' => 'dropdown',
                'std' => 'standard',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden.' vc_col-xs-6'
            ),

            array (
                'param_name' => 'header_nav_elements_spacing',
                'heading' => __( 'Spacing Between Navigation and Elements', 'jevelin' ),
                'description' => __( 'Enter spacing between navigation and elements in PX', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden
            ),

            array (
                'param_name' => 'header_nav_letter_spacing',
                'heading' => __( 'Letter Spacing', 'jevelin' ),
                'description' => __( 'Enter navigation letter spacing in PX', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden
            ),

            array (
                'param_name' => 'header_nav_search_hidden',
                'heading' => 'Hide Search Bar',
                'type' => 'checkbox',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden.' vc_col-xs-4'
            ),

            array (
                'param_name' => 'header_nav_social_hidden',
                'heading' => 'Hide Social Icons',
                'type' => 'checkbox',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden.' vc_col-xs-4'
            ),

            array (
                'param_name' => 'header_nav_cart_hidden',
                'heading' => 'Hide Cart',
                'type' => 'checkbox',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden.' vc_col-xs-4'
            ),

            array (
                'param_name' => 'header_nav_language_hidden',
                'heading' => 'Hide Language',
                'type' => 'checkbox',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden.' vc_col-xs-4'
            ),

            array (
                'param_name' => 'header_nav_buttons_hidden',
                'heading' => 'Hide Buttons',
                'type' => 'checkbox',
                'group' => 'Header',
                'edit_field_class' => $tab.'navigation'.$hidden.' vc_col-xs-4'
            ),


            // Dropdown
            array (
                'param_name' => 'dropdown_style',
                'heading' => 'Style',
                'description' => 'Choose dropdown style',
                'value' =>
                array (
                    'Style 1 - With line seperator' => '1',
                    'Style 2 - With shadows' => '2',
                ),
                'std' => '2',
                'type' => 'dropdown',
                'group' => 'Header',
                'edit_field_class' => $tab.'dropdown'.$hidden
            ),

            array (
                'param_name' => 'dropdown_background_color',
                'heading' => 'Background Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'dropdown'.$hidden
            ),

            array (
                'param_name' => 'dropdown_link_color',
                'heading' => 'Link Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'dropdown'.$hidden
            ),

            array (
                'param_name' => 'dropdown_link_active_color',
                'heading' => 'Link Active Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'dropdown'.$hidden
            ),

            array (
                'param_name' => 'dropdown_link_hover_color',
                'heading' => 'Link Hover',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'dropdown'.$hidden
            ),

            array (
                'param_name' => 'dropdown_title_color',
                'heading' => 'Mega Menu Title Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'dropdown'.$hidden
            ),

            array (
                'param_name' => 'dropdown_border_color',
                'heading' => 'Border Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'dropdown'.$hidden
            ),

            array (
                'param_name' => 'dropdown_item_background_color',
                'heading' => 'Style 2 - Item Hover Background Color ',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'dropdown'.$hidden
            ),

            array (
                'param_name' => 'dropdown_item_text_color',
                'heading' => 'Style 2 - Item Hover Text Color ',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'dropdown'.$hidden
            ),


            // Sticky
            array (
                'param_name' => 'sticky_height',
                'heading' => __( 'Height', 'jevelin' ),
                'description' => __( 'Enter header height in PX', 'jevelin' ),
                'type' => 'textfield',
                'std' => '60px',
                'group' => 'Header',
                'edit_field_class' => $tab.'sticky'.$hidden
            ),

            array (
                'param_name' => 'sticky_shadow',
                'heading' => 'Shadow',
                'value' => array (
                    'Disabled' => 'disabled',
                    'XSmall' => 'xsmall',
                    'Small' => 'small',
                    'Medium' => 'medium',
                    'Large' => 'large',
                    'XLarge' => 'xlarge',
                ),
                'type' => 'dropdown',
                'std' => 'disabled',
                'group' => 'Header',
                'edit_field_class' => $tab.'sticky'.$hidden
            ),



            // Buttons
            array (
                'param_name' => 'header_buttons',
                'heading' => 'Buttons',
                'type' => 'param_group',
                'params' => array(
                    array (
                        'param_name' => 'name',
                        'type' => 'textfield',
                        'heading' => 'Name',
                        'description' => 'Enter your button name',
                        //'value' => 'Button Name',
                    ),
                    array (
                        'param_name' => 'link',
                        'type' => 'textfield',
                        'heading' => 'Link',
                        'description' => 'Enter your button link',
                        //'value' => get_home_url(),
                    ),

                    array (
                        'param_name' => 'icon',
                        'heading' => 'Icon',
                        'description' => 'Choose icon',
                        'type' => 'iconpicker',
                        'settings' =>
                        array (
                            'emptyIcon' => true,
                            'type' => 'jevelin_vc_icons',
                        ),
                    ),
                ),
                'group' => 'Header',
                'edit_field_class' => $tab.'buttons'.$hidden
            ),

            array (
                'param_name' => 'header_buttons_style',
                'heading' => 'Style',
                'value' => array (
                    'Dark Text' => 'dark',
                    'Light Text' => 'light',
                ),
                'type' => 'dropdown',
                'std' => 'dark',
                'group' => 'Header',
                'edit_field_class' => $tab.'buttons'.$hidden
            ),

            array (
                'param_name' => 'header_buttons_weight',
                'heading' => 'Font Weight',
                'value' => array (
                    'Light' => '300',
                    'Normal' => '400',
                    'Medium' => '500',
                    'Semi-Bold' => '600',
                    'Bold' => '700',
                    'Extra-Bold' => '800',
                    'Black' => '900',
                ),
                'type' => 'dropdown',
                'std' => '400',
                'group' => 'Header',
                'edit_field_class' => $tab.'buttons'.$hidden
            ),

            array (
                'param_name' => 'header_buttons_radius',
                'heading' => __( 'Border Radius', 'jevelin' ),
                'description' => __( 'Enter top bar buttons border radius size in PX', 'jevelin' ),
                'type' => 'textfield',
                'std' => '8px',
                'group' => 'Header',
                'edit_field_class' => $tab.'buttons'.$hidden
            ),

            array (
                'param_name' => 'header_buttons_height',
                'heading' => __( 'Height', 'jevelin' ),
                'description' => __( 'Enter button height size in px', 'jevelin' ),
                'type' => 'textfield',
                'std' => '',
                'group' => 'Header',
                'edit_field_class' => $tab.'buttons'.$hidden
            ),

            array (
                'param_name' => 'header_buttons_leftright_padding',
                'heading' => __( 'Left/right Padding', 'jevelin' ),
                'description' => __( 'Enter left/right padding size in px', 'jevelin' ),
                'type' => 'textfield',
                'std' => '',
                'group' => 'Header',
                'edit_field_class' => $tab.'buttons'.$hidden
            ),

            array (
                'param_name' => 'header_button_uppercase',
                'heading' => 'Text Uppercase',
                'type' => 'checkbox',
                'group' => 'Header',
                'edit_field_class' => $tab.'buttons'.$hidden
            ),

            array (
                'param_name' => 'header_button_text_color',
                'heading' => 'Text Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'buttons'.$hidden.$half_width
            ),

            array (
                'param_name' => 'header_button_text_hover_color',
                'heading' => 'Text Hover Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'buttons'.$hidden.$half_width
            ),

            array (
                'param_name' => 'header_button_background_color',
                'heading' => 'Background Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'buttons'.$hidden.$half_width
            ),

            array (
                'param_name' => 'header_button_background_hover_color',
                'heading' => 'Background Hover Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'buttons'.$hidden.$half_width
            ),

            array (
                'param_name' => 'header_nav_button_spacing',
                'heading' => __( 'Spacing Between Buttons', 'jevelin' ),
                'description' => __( 'Enter spacing between buttons', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Header',
                'edit_field_class' => $tab.'buttons'.$hidden
            ),




            array (
                'param_name' => 'sticky_background_color',
                'heading' => 'Background Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'std' => '#ffffff',
                'edit_field_class' => $tab.'sticky'.$hidden
            ),

            array (
                'param_name' => 'sticky_nav_text_color',
                'heading' => 'Navigation Link Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'sticky'.$hidden.$half_width
            ),

            array (
                'param_name' => 'sticky_nav_text_hover_color',
                'heading' => 'Link Hover Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'sticky'.$hidden.$half_width
            ),

            array (
                'param_name' => 'sticky_icon_color',
                'heading' => 'Icon Color',
                'type' => 'colorpicker',
                'group' => 'Header',
                'edit_field_class' => $tab.'sticky'.$hidden.$half_width
            ),



            /**
             * Top Bar
             */
            array (
                'heading' => '
                <div class="wpbakery-element-minitabs">
                    <div data-id="general" class="active" style="width: 25%;">
                        <i class="ti-settings"></i>
                        General
                    </div>
                    <div data-id="contacts" style="width: 25%;">
                        <i class="ti-email"></i>
                        Contacts
                    </div>
                    <div data-id="navigation" style="width: 25%;">
                        <i class="ti-brush-alt"></i>
                        Navigation
                    </div>
                    <div data-id="buttons" style="width: 25%;">
                        <i class="ti-link"></i>
                        Buttons
                    </div>
                    <div data-id="position" style="width: 25%;">
                        <i class="ti-move"></i>
                        Position
                    </div>
                </div>',
                'param_name' => 'no-input2',
                'type' => 'textfield',
                'group' => 'Top Bar',
                'edit_field_class' => 'vc_col-xs-12 wpbakery-element-tab-html'
            ),

            array (
                'param_name' => 'topbar_hidden',
                'heading' => 'Hide Top Bar',
                'type' => 'checkbox',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'general'
            ),

            array (
                'param_name' => 'topbar_hidden_mobile',
                'heading' => 'Hide Top Bar in Mobile',
                'description' => __( 'Choose to enable or disable top bar for mobile devices', 'jevelin' ),
                'value' => array (
                    'Default (as above)' => 'default',
                    'Hidden' => 'hidden',
                ),
                'type' => 'dropdown',
                'std' => 'default',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'general'
            ),

            array (
                'param_name' => 'topbar_height',
                'heading' => __( 'Height', 'jevelin' ),
                'description' => __( 'Enter top bar height in PX', 'jevelin' ),
                'type' => 'textfield',
                'std' => '40px',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'general'
            ),

            array (
                'param_name' => 'topbar_font_size',
                'heading' => __( 'Font Size', 'jevelin' ),
                'description' => __( 'Enter top bar font size in PX', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'general'.$half_width
            ),

            array (
                'param_name' => 'topbar_icon_size',
                'heading' => __( 'Icon Size', 'jevelin' ),
                'description' => __( 'Enter top bar icon size in PX', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'general'.$half_width
            ),

            array (
                'param_name' => 'topbar_background_color',
                'heading' => 'Background Color',
                'type' => 'colorpicker',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'general'.$half_width
            ),

            array (
                'param_name' => 'topbar_text_color',
                'heading' => 'Text Color',
                'type' => 'colorpicker',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'general'.$half_width
            ),

            array (
                'param_name' => 'topbar_contacts_icon_color',
                'heading' => 'Icon Color',
                'type' => 'colorpicker',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'general'.$half_width
            ),

            array (
                'param_name' => 'topbar_contacts_icon_hover_color',
                'heading' => 'Icon Hover Color',
                'type' => 'colorpicker',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'general'.$half_width
            ),

            array (
                'param_name' => 'topbar_bottom_border_color',
                'heading' => 'Topbar Bottom Border Color',
                'description' => 'Choose color to enable topbar border bottom color',
                'type' => 'colorpicker',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'general'
            ),


            // Contacts
            array (
                'param_name' => 'topbar_contact_location',
                'heading' => __( 'Location', 'jevelin' ),
                'description' => __( 'Enter your location', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'contacts'.$hidden.$half_width
            ),

            array (
                'param_name' => 'topbar_contact_email',
                'heading' => __( 'Email Address', 'jevelin' ),
                'description' => __( 'Enter your emaila address', 'jevelin' ),
                'type' => 'textfield',
                'std' => 'info@your-email',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'contacts'.$hidden.$half_width
            ),

            array (
                'param_name' => 'topbar_contact_phone',
                'heading' => __( 'Phone', 'jevelin' ),
                'description' => __( 'Enter your phone', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'contacts'.$hidden.$half_width
            ),

            array (
                'param_name' => 'topbar_contact_working_hours',
                'heading' => __( 'Working Hours', 'jevelin' ),
                'description' => __( 'Enter your working hours', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'contacts'.$hidden.$half_width
            ),

            array (
                'param_name' => 'topbar_weight',
                'heading' => 'Font Weight',
                'description' => __( 'Choose font weight for contacts text', 'jevelin' ),
                'value' => array (
                    'Light' => '300',
                    'Normal' => '400',
                    'Medium' => '500',
                    'Semi-Bold' => '600',
                    'Bold' => '700',
                    'Extra-Bold' => '800',
                    'Black' => '900',
                ),
                'type' => 'dropdown',
                'std' => '400',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'contacts'.$hidden
            ),

            array (
                'param_name' => 'topbar_contacts_item_margin',
                'heading' => __( 'Item Margin', 'jevelin' ),
                'description' => __( 'Enter custom item margin (default 1em or 13px)', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'contacts'.$hidden
            ),

            array (
                'param_name' => 'topbar_contacts_letter_spacing',
                'heading' => __( 'Letter Spacing', 'jevelin' ),
                'description' => __( 'Enter contacts letter spacing in PX', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'contacts'.$hidden
            ),


            // Navigation
            array (
                'heading' => '<span style="color: #999;">Assign your pages and posts to your navigation <a href="'.admin_url( 'nav-menus.php' ).'" target="_blank">in this page</a>
                <br />(display location - Top Bar Navigation)</span>',
                'description' => 'Choose text font',
                'param_name' => 'no-input4',
                'type' => 'textfield',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'navigation'.$hidden.' wpbakery-element-tab-hidden-input'
            ),

            array (
                'param_name' => 'topbar_navigation_uppercase',
                'heading' => 'Navigation Uppercase',
                'type' => 'checkbox',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'navigation'.$hidden
            ),

            array (
                'param_name' => 'topbar_navigation_weight',
                'heading' => 'Font Weight',
                'value' => array (
                    'Light' => '300',
                    'Normal' => '400',
                    'Medium' => '500',
                    'Semi-Bold' => '600',
                    'Bold' => '700',
                    'Extra-Bold' => '800',
                    'Black' => '900',
                ),
                'type' => 'dropdown',
                'std' => '400',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'navigation'.$hidden
            ),

            array (
                'param_name' => 'topbar_navigation_text_hover_color',
                'heading' => 'Hover Color',
                'type' => 'colorpicker',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'navigation'.$hidden
            ),


            // Buttons
            array (
                'param_name' => 'topbar_buttons',
                'heading' => 'Buttons',
                'type' => 'param_group',
                'params' => array(
                    array (
                        'param_name' => 'name',
                        'type' => 'textfield',
                        'heading' => 'Name',
                        'description' => 'Enter your button name',
                        'value' => 'Button Name',
                    ),
                    array (
                        'param_name' => 'link',
                        'type' => 'textfield',
                        'heading' => 'Link',
                        'description' => 'Enter your button link',
                        'value' => get_home_url(),
                    ),
                ),
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'buttons'.$hidden
            ),

            array (
                'param_name' => 'topbar_buttons_style',
                'heading' => 'Style',
                'value' => array (
                    'Dark Text' => 'dark',
                    'Light Text' => 'light',
                ),
                'type' => 'dropdown',
                'std' => 'dark',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'buttons'.$hidden
            ),

            array (
                'param_name' => 'topbar_buttons_weight',
                'heading' => 'Font Weight',
                'value' => array (
                    'Light' => '300',
                    'Normal' => '400',
                    'Medium' => '500',
                    'Semi-Bold' => '600',
                    'Bold' => '700',
                    'Extra-Bold' => '800',
                    'Black' => '900',
                ),
                'type' => 'dropdown',
                'std' => '400',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'buttons'.$hidden
            ),

            array (
                'param_name' => 'topbar_buttons_radius',
                'heading' => __( 'Border Radius', 'jevelin' ),
                'description' => __( 'Enter top bar buttons border radius size in PX', 'jevelin' ),
                'type' => 'textfield',
                'std' => '8px',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'buttons'.$hidden
            ),

            array (
                'param_name' => 'topbar_button_uppercase',
                'heading' => 'Text Uppercase',
                'type' => 'checkbox',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'buttons'.$hidden
            ),

            array (
                'param_name' => 'topbar_button_text_color',
                'heading' => 'Text Color',
                'type' => 'colorpicker',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'buttons'.$hidden.$half_width
            ),

            array (
                'param_name' => 'topbar_button_text_hover_color',
                'heading' => 'Text Hover Color',
                'type' => 'colorpicker',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'buttons'.$hidden.$half_width
            ),

            array (
                'param_name' => 'topbar_button_background_color',
                'heading' => 'Background Color',
                'type' => 'colorpicker',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'buttons'.$hidden.$half_width
            ),

            array (
                'param_name' => 'topbar_button_background_hover_color',
                'heading' => 'Background Hover Color',
                'type' => 'colorpicker',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'buttons'.$hidden.$half_width
            ),


            /* Position */
            array (
                'param_name' => 'topbar_contacts_position',
                'heading' => 'Contacts Position',
                'value' => array (
                    'Left side' => 'left',
                    'Right side' => 'right',
                ),
                'type' => 'dropdown',
                'std' => 'left',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'position'.$hidden.$half_width
            ),

            array (
                'param_name' => 'topbar_social_position',
                'heading' => 'Social Icons Position',
                'value' => array (
                    'Left side' => 'left',
                    'Right side' => 'right',
                ),
                'type' => 'dropdown',
                'std' => 'left',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'position'.$hidden.$half_width
            ),

            array (
                'param_name' => 'topbar_navigation_position',
                'heading' => 'Navigation Position',
                'value' => array (
                    'Left side' => 'left',
                    'Right side' => 'right',
                ),
                'type' => 'dropdown',
                'std' => 'right',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'position'.$hidden.$half_width
            ),

            array (
                'param_name' => 'topbar_buttons_position',
                'heading' => 'Buttons Position',
                'value' => array (
                    'Left side' => 'left',
                    'Right side' => 'right',
                ),
                'type' => 'dropdown',
                'std' => 'right',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'position'.$hidden.$half_width
            ),

            array (
                'param_name' => 'topbar_search_position',
                'heading' => 'Search Position',
                'value' => array (
                    'Left side' => 'left',
                    'Right side' => 'right',
                ),
                'type' => 'dropdown',
                'std' => 'left',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'position'.$hidden.$half_width
            ),

            array (
                'param_name' => 'topbar_contacts_hidden',
                'heading' => 'Hide Contacts',
                'type' => 'checkbox',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'position'.$hidden
            ),

            array (
                'param_name' => 'topbar_social_hidden',
                'heading' => 'Hide Social Icons',
                'type' => 'checkbox',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'position'.$hidden.$half_width
            ),

            array (
                'param_name' => 'topbar_navigation_hidden',
                'heading' => 'Hide Navigation',
                'type' => 'checkbox',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'position'.$hidden.$half_width
            ),

            array (
                'param_name' => 'topbar_buttons_hidden',
                'heading' => 'Hide Buttons',
                'type' => 'checkbox',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'position'.$hidden.$half_width
            ),

            array (
                'param_name' => 'topbar_search_show',
                'heading' => 'Show Search',
                'type' => 'checkbox',
                'group' => 'Top Bar',
                'edit_field_class' => $tab.'position'.$hidden.$half_width,
            ),


            /**
             * Responsive
             */
            array (
                'param_name' => 'mobile_header_layout',
                'heading' => 'Mobile Header Layouts',
                'description' => 'Choose header layout',
                'value' => array (
                    'Layout 1 (navigation in right)' => '1',
                    'Layout 2 (navigation in left)' => '2',
                    'Layout 3 (menu, logo, cart)' => '3',
                    'Layout 4 (cart, logo, menu)' => '4',
                ),
                'type' => 'dropdown',
                'std' => '1',
                'group' => 'Responsive',
            ),

            array (
                'param_name' => 'mobile_height',
                'heading' => __( 'Height', 'jevelin' ),
                'description' => __( 'Enter mobile height in PX', 'jevelin' ),
                'type' => 'textfield',
                'std' => '70px',
                'group' => 'Responsive',
            ),

            array (
                'param_name' => 'mobile_sticky_header',
                'heading' => 'Sticky Header',
                'description' => 'Enable or disable mobile sticky header',
                'value' => array(
                    'Default as desktop header option' => 'default',
                    'Disabled' => 'disabled',
                    'Enabled' => 'enabled',
                ),
                'type' => 'dropdown',
                'std' => 'default',
                'group' => 'Responsive',
            ),

            array (
                'param_name' => 'mobile_dropdown_search_hidden',
                'heading' => 'Hide Dropdown Search',
                'type' => 'checkbox',
                'group' => 'Responsive',
            ),

            array (
                'param_name' => 'mobile_dropdown_social_hidden',
                'heading' => 'Hide Dropdown Social Icons',
                'type' => 'checkbox',
                'group' => 'Responsive',
            ),

            /*array (
                'param_name' => 'mobile_background_color',
                'heading' => 'Background Color',
                'type' => 'colorpicker',
                'group' => 'Responsive',
            ),*/

            array (
                'param_name' => 'mobile_icon_size',
                'heading' => __( 'Icon Size', 'jevelin' ),
                'description' => __( 'Enter header icon size in PX', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Responsive',
            ),

            /*array (
                'param_name' => 'mobile_icon_color',
                'heading' => 'Icon Color',
                'type' => 'colorpicker',
                'group' => 'Responsive',
                'edit_field_class' => $half_width,
            ),

            array (
                'param_name' => 'mobile_icon_hover_color',
                'heading' => 'Icon Hover Color',
                'type' => 'colorpicker',
                'group' => 'Responsive',
                'edit_field_class' => $half_width,
            ),*/

            array (
                'param_name' => 'mobile_border_color',
                'heading' => 'Border Color',
                'type' => 'colorpicker',
                'value' => '#e4e4e4',
                'group' => 'Responsive',
                'edit_field_class' => $half_width,
            ),




            // Social Icons
            array (
                'param_name' => 'social_facebook',
                'heading' => __( 'Facebook', 'jevelin' ),
                'description' => __( 'Enter full Facebook URL to your account', 'jevelin' ),
                'std' => '#',
                'type' => 'textfield',
                'group' => 'Social',
            ),

            array (
                'param_name' => 'social_twitter',
                'heading' => __( 'Twitter', 'jevelin' ),
                'description' => __( 'Enter full Twitter URL to your account', 'jevelin' ),
                'std' => '#',
                'type' => 'textfield',
                'group' => 'Social',
            ),

            array (
                'param_name' => 'social_youtube',
                'heading' => __( 'Youtube', 'jevelin' ),
                'description' => __( 'Enter full Youtube URL to your account', 'jevelin' ),
                'std' => '#',
                'type' => 'textfield',
                'group' => 'Social',
            ),

            array (
                'param_name' => 'social_instagram',
                'heading' => __( 'Instagram', 'jevelin' ),
                'description' => __( 'Enter full Instagram URL to your account', 'jevelin' ),
                'std' => '#',
                'type' => 'textfield',
                'group' => 'Social',
            ),

            array (
                'param_name' => 'social_pinterest',
                'heading' => __( 'Pinterest', 'jevelin' ),
                'description' => __( 'Enter full Pinterest URL to your account', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Social',
            ),

            array (
                'param_name' => 'social_linkedin',
                'heading' => __( 'LinkedIn', 'jevelin' ),
                'description' => __( 'Enter full Linkedin URL to your account', 'jevelin' ),
                'type' => 'textfield',
                'group' => 'Social',
            ),



            /**
             * Search
             */
            array (
                'param_name' => 'search_background',
                'heading' => 'Background Color',
                'type' => 'colorpicker',
                'std' => '#ffffff',
                'group' => 'Search',
            ),

            array (
                'param_name' => 'search_text_color',
                'heading' => 'Text Color',
                'type' => 'colorpicker',
                'std' => '',
                'group' => 'Search',
            ),

            array (
                'param_name' => 'search_text_placholder_color',
                'heading' => 'Text Placholder Color',
                'type' => 'colorpicker',
                'std' => '',
                'group' => 'Search',
            ),

            array (
                'param_name' => 'search_search_icon_color',
                'heading' => 'Search Icon Color',
                'type' => 'colorpicker',
                'std' => '',
                'group' => 'Search',
            ),

            array (
                'param_name' => 'search_close_icon_color',
                'heading' => 'Close Icon Color',
                'type' => 'colorpicker',
                'std' => '',
                'group' => 'Search',
            ),




            /**
             * Design Options
             */
    		array(
    			'param_name' => 'css',
    			'type' => 'css_editor',
    			'heading' => __( 'CSS box', 'jevelin' ),
    			'group' => __( 'Design Options', 'jevelin' ),
    		),

        ),
    )
);
