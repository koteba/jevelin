<?php
/* Column - Element */
$column_attributes = array(
    array(
        'param_name' => 'padding_tablet',
        'heading' => __( 'Responsive Padding', 'jevelin' ),
        'description' => __( 'Here you can set responsive smartphone and tablet padding (<b>top right bottom left</b>). For example: <b>30px 0px 30px 0px</b>', 'jevelin' ),
        'type' => 'textfield',
        'group' => __( 'Extras', 'jevelin' ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => "Responsive Border",
        'param_name' => 'responsive_border',
        'value' => array(
            __( 'Enabled', 'jevelin' ) => 'enabled',
            __( 'Disabled', 'jevelin' ) => 'disabled',
        ),
        'description' => __( 'Enable or disable column borders in smartophone and tablet', 'jevelin' ),
        'group' => __( 'Extras', 'jevelin' ),
    ),
    array(
        'param_name' => 'max_width',
        'heading' => __( 'Max Width', 'jevelin' ),
        'description' => __( 'Enter columns content max width (Note: CSS measurement units allowed).', 'jevelin' ),
        'type' => 'textfield',
        'group' => __( 'Extras', 'jevelin' ),
    ),
    array(
        'param_name' => 'max_width_alignment',
        'heading' => __( 'Max Width Alignment', 'jevelin' ),
        'description' => __( 'Choose max width content alignment', 'jevelin' ),
        'type' => 'dropdown',
        'value' => array(
            __( 'Left', 'jevelin' ) => 'left',
            __( 'Center', 'jevelin' ) => 'center',
            __( 'Right', 'jevelin' ) => 'right',
        ),
        'std' => 'center',
        'edit_field_class' => 'vc_col-xs-6',
        'group' => __( 'Extras', 'jevelin' ),
    ),

    array(
        'param_name' => 'max_width_alignment_mobile',
        'heading' => __( 'Mobile Max Width Alignment', 'jevelin' ),
        'description' => __( 'Choose mobile max width content alignment', 'jevelin' ),
        'type' => 'dropdown',
        'value' => array(
            __( 'Default', 'jevelin' ) => 'default',
            __( 'Left', 'jevelin' ) => 'left',
            __( 'Center', 'jevelin' ) => 'center',
            __( 'Right', 'jevelin' ) => 'right',
        ),
        'std' => 'default',
        'edit_field_class' => 'vc_col-xs-6',
        'group' => __( 'Extras', 'jevelin' ),
    ),

    array(
        'type' => 'dropdown',
        'heading' => "Shadow",
        'param_name' => 'shadow',
        'value' => array(
            __( 'Disabled', 'jevelin' ) => 'disabled',
            __( 'Shadow 1', 'jevelin' ) => 'shadow1',
            __( 'Shadow 2', 'jevelin' ) => 'shadow2',
            __( 'Shadow 3', 'jevelin' ) => 'shadow3',
        ),
        'description' => __( 'Choose Column Shadow', 'jevelin' ),
        'edit_field_class' => 'vc_col-xs-6',
        'group' => __( 'Shadows', 'jevelin' ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => "Shadow Hover",
        'param_name' => 'shadow_hover',
        'value' => array(
            __( 'Disabled', 'jevelin' ) => 'disabled',
            __( 'Shadow 1', 'jevelin' ) => 'shadow1',
            __( 'Shadow 2', 'jevelin' ) => 'shadow2',
            __( 'Shadow 3', 'jevelin' ) => 'shadow3',
        ),
        'description' => __( 'Choose Column Shadow on Hover', 'jevelin' ),
        'edit_field_class' => 'vc_col-xs-6',
        'group' => __( 'Shadows', 'jevelin' ),
    ),

    array(
        'param_name' => 'shadow_custom',
        'heading' => __( 'Shadow Custom', 'jevelin' ),
        'description' => __( 'You can overwrite shadow hover with custom box shadow variable (<b>h-offset v-offset blur spread color</b>). <a href="https://www.cssmatic.com/box-shadow" target="_blank">Generate here</a>', 'jevelin' ),
        'type' => 'textfield',
        'edit_field_class' => 'vc_col-xs-6',
        'group' => __( 'Shadows', 'jevelin' ),
    ),

    array(
        'param_name' => 'shadow_hover_custom',
        'heading' => __( 'Shadow Hover Custom', 'jevelin' ),
        'description' => __( 'You can overwrite shadow hover with custom box shadow variable (<b>h-offset v-offset blur spread color</b>). <a href="https://www.cssmatic.com/box-shadow" target="_blank">Generate here</a>', 'jevelin' ),
        'type' => 'textfield',
        'edit_field_class' => 'vc_col-xs-6',
        'group' => __( 'Shadows', 'jevelin' ),
    ),


    array(
        'type' => 'dropdown',
        'heading' => "Shadow For",
        'param_name' => 'shadow_for',
        'value' => array(
            __( 'Outer Column Block', 'jevelin' ) => 'outer',
            __( 'Inner Column Block', 'jevelin' ) => 'inner',
        ),
        'description' => __( 'Choose Column Shadow Block', 'jevelin' ),
        'group' => __( 'Shadows', 'jevelin' ),
    ),
    array (
        'param_name' => 'background_image_hover',
        'heading' => 'Background Image (hover)',
        'description' => 'Upload image background image (hover)',
        'type' => 'attach_image',
        'group' => __( 'Extras', 'jevelin' ),
    ),
    array(
        'param_name' => 'mobile_element_alignment',
        'heading' => __( 'Mobile Element Alignment', 'jevelin' ),
        'description' => __( 'Choose text block, heading, button and other element mobile alignment', 'jevelin' ),
        'type' => 'dropdown',
        'value' => array(
            __( 'Disabled', 'jevelin' ) => 'disabled',
            __( 'Left', 'jevelin' ) => 'left',
            __( 'Center', 'jevelin' ) => 'center',
            __( 'Right', 'jevelin' ) => 'right',
        ),
        'std' => 'disabled',
        'group' => __( 'Extras', 'jevelin' ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => "Text Align",
        'param_name' => 'text_align_inline',
        'value' => array(
            __( 'Left', 'jevelin' ) => 'left',
            __( 'Center', 'jevelin' ) => 'center',
            __( 'Right', 'jevelin' ) => 'right',
        ),
        'std' => 'left',
        'description' => __( 'Column general text alignment, useful for inline elements', 'jevelin' ),
        'edit_field_class' => 'vc_col-xs-6',
        'group' => __( 'Extras', 'jevelin' ),
    ),
    array(
        'param_name' => 'overflow',
        'heading' => __( 'Overflow', 'jevelin' ),
        'description' => __( 'Choose overflow setting (not availble when using parallax)', 'jevelin' ),
        'type' => 'dropdown',
        'value' => array(
            __( 'Default', 'jevelin' ) => 'default',
            __( 'Visible', 'jevelin' ) => 'visible',
            __( 'Hidden', 'jevelin' ) => 'hidden',
        ),
        'std' => 'center',
        'group' => __( 'Extras', 'jevelin' ),
    ),
    array(
        'param_name' => 'zindex',
        'heading' => __( 'Z-Index', 'jevelin' ),
        'description' => __( 'Enter z-index value to fix shadows', 'jevelin' ),
        'type' => 'textfield',
        'group' => __( 'Extras', 'jevelin' ),
    ),
);
vc_add_params( 'vc_column', $column_attributes );


$column_attributes_more = array(
    array(
        'type' => 'animation_style',
        'param_name' => 'css_animation',
        'heading' => __( 'CSS Animation', 'jevelin' ),
        'description' => __( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'jevelin' ),
    ),

    array(
        'type' => 'textfield',
        'param_name' => 'css_animation_delay',
        'heading' => __( 'CSS Animation Delay', 'jevelin' ),
        'description' => __( 'Enter CSS animation delay in seconds (for example: 1.0).', 'jevelin' ),
        'edit_field_class' => 'vc_col-xs-6',
    ),

    array(
        'type' => 'textfield',
        'param_name' => 'css_animation_speed',
        'heading' => __( 'CSS Animation Spped', 'jevelin' ),
        'description' => __( 'Enter CSS animation speed in seconds (for example: 1.0).', 'jevelin' ),
        'edit_field_class' => 'vc_col-xs-6',
    ),
);
$column_attributes = array_merge( $column_attributes, $column_attributes_more );
vc_add_params( 'vc_column_inner', $column_attributes );


/* Row - Element */
$row_attributes = array(
    array(
        'param_name' => 'padding_tablet',
        'heading' => __( 'Responsive Padding', 'jevelin' ),
        'description' => __( 'Here you can set responsive smartphone and tablet padding (<b>top right bottom left</b>). For example: <b>30px 0px 30px 0px</b>', 'jevelin' ),
        'type' => 'textfield',
        'group' => __( 'Responsive', 'jevelin' ),
    ),
    array(
        'param_name' => 'margin_tablet',
        'heading' => __( 'Responsive Margin (800px and below - tablet portrait and smartphones)', 'jevelin' ),
        'description' => __( 'Here you can set responsive smartphone and tablet margin (<b>top right bottom left</b>). For example: <b>30px 0px 30px 0px</b>', 'jevelin' ),
        'type' => 'textfield',
        'group' => __( 'Responsive', 'jevelin' ),
    ),
    array(
        'param_name' => 'margin_tablet_large',
        'heading' => __( 'Responsive Margin (1025px and below - tablet landscape)', 'jevelin' ),
        'description' => __( 'Here you can set responsive smartphone and tablet margin (<b>top right bottom left</b>). For example: <b>30px 0px 30px 0px</b>', 'jevelin' ),
        'type' => 'textfield',
        'group' => __( 'Responsive', 'jevelin' ),
    ),

    array(
        'type' => 'dropdown',
        'heading' => "Responsive Column Order",
        'param_name' => 'column_order',
        'value' => array(
            __( 'Default', 'jevelin' ) => 'default',
            __( 'Reversed', 'jevelin' ) => 'reversed',
        ),
        'description' => __( 'Choose responsive column order for smartphones and tablets', 'jevelin' ),
        'group' => __( 'Responsive', 'jevelin' ),
    ),
    array(
        'param_name' => 'background_image_mobile',
        'heading' => __( 'Background Image Responsive', 'jevelin' ),
        'description' => __( 'Upload responsive background image (will appear under 800px wide screen). Notice this option will work only if parallax is disabled', 'jevelin' ),
        'type' => 'attach_image',
        'group' => __( 'Responsive', 'jevelin' ),
    ),


    array(
        'param_name' => 'max_width',
        'heading' => __( 'Max Width', 'jevelin' ),
        'description' => __( 'Enter columns content max width (Note: CSS measurement units allowed).', 'jevelin' ),
        'type' => 'textfield',
        'group' => __( 'Extras', 'jevelin' ),
    ),
    array(
        'param_name' => 'max_width_alignment',
        'heading' => __( 'Max Width Alignment', 'jevelin' ),
        'description' => __( 'Choose max width content alignment', 'jevelin' ),
        'type' => 'dropdown',
        'value' => array(
            __( 'Left', 'jevelin' ) => 'left',
            __( 'Center', 'jevelin' ) => 'center',
            __( 'Right', 'jevelin' ) => 'right',
        ),
        'std' => 'center',
        'edit_field_class' => 'vc_col-xs-6',
        'group' => __( 'Extras', 'jevelin' ),
    ),
    array(
        'param_name' => 'max_width_alignment_mobile',
        'heading' => __( 'Mobile Max Width Alignment', 'jevelin' ),
        'description' => __( 'Choose mobile max width content alignment', 'jevelin' ),
        'type' => 'dropdown',
        'value' => array(
            __( 'Default', 'jevelin' ) => 'default',
            __( 'Left', 'jevelin' ) => 'left',
            __( 'Center', 'jevelin' ) => 'center',
            __( 'Right', 'jevelin' ) => 'right',
        ),
        'std' => 'default',
        'edit_field_class' => 'vc_col-xs-6',
        'group' => __( 'Extras', 'jevelin' ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => "Faster Parallax",
        'param_name' => 'faster_parallax',
        'value' => array(
            __( 'Disabled', 'jevelin' ) => 'disabled',
            __( 'Standard', 'jevelin' ) => 'standard',
        ),
        'description' => __( 'Add parallax type background for row (Note: If no image is specified, parallax will use background image from Design Options). Also standard parallax should be disabled', 'jevelin' ),
        'group' => __( 'Extras', 'jevelin' ),
    ),




    array(
        'type' => 'dropdown',
        'heading' => "Shadow",
        'param_name' => 'shadow',
        'value' => array(
            __( 'Disabled', 'jevelin' ) => 'disabled',
            __( 'Shadow 1', 'jevelin' ) => 'shadow1',
            __( 'Shadow 2', 'jevelin' ) => 'shadow2',
            __( 'Shadow 3', 'jevelin' ) => 'shadow3',
        ),
        'description' => __( 'Choose Column Shadow', 'jevelin' ),
        'edit_field_class' => 'vc_col-xs-6',
        'group' => __( 'Shadow', 'jevelin' ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => "Shadow Hover",
        'param_name' => 'shadow_hover',
        'value' => array(
            __( 'Disabled', 'jevelin' ) => 'disabled',
            __( 'Shadow 1', 'jevelin' ) => 'shadow1',
            __( 'Shadow 2', 'jevelin' ) => 'shadow2',
            __( 'Shadow 3', 'jevelin' ) => 'shadow3',
        ),
        'description' => __( 'Choose Column Shadow on Hover', 'jevelin' ),
        'edit_field_class' => 'vc_col-xs-6',
        'group' => __( 'Shadow', 'jevelin' ),
    ),
    array(
        'param_name' => 'shadow_custom',
        'heading' => __( 'Shadow Custom', 'jevelin' ),
        'description' => __( 'You can overwrite shadow hover with custom box shadow variable (<b>h-offset v-offset blur spread color</b>). <a href="https://www.cssmatic.com/box-shadow" target="_blank">Generate here</a>', 'jevelin' ),
        'type' => 'textfield',
        'edit_field_class' => 'vc_col-xs-6',
        'group' => __( 'Shadow', 'jevelin' ),
    ),

    array(
        'param_name' => 'shadow_hover_custom',
        'heading' => __( 'Shadow Hover Custom', 'jevelin' ),
        'description' => __( 'You can overwrite shadow hover with custom box shadow variable (<b>h-offset v-offset blur spread color</b>). <a href="https://www.cssmatic.com/box-shadow" target="_blank">Generate here</a>', 'jevelin' ),
        'type' => 'textfield',
        'edit_field_class' => 'vc_col-xs-6',
        'group' => __( 'Shadow', 'jevelin' ),
    ),




    array(
        'type' => 'dropdown',
        'param_name' => 'background_position',
        'heading' => __( 'Background Position', 'jevelin' ),
        'description' => __( 'If background is set to repeat, then here you choose background position', 'jevelin' ),
        'value' => array(
            __( 'Default', 'jevelin' ) => 'default',
            __( 'Left Top', 'jevelin' ) => 'left top',
            __( 'Left Center', 'jevelin' ) => 'left center',
            __( 'Left Bottom', 'jevelin' ) => 'left bottom',
            __( 'Right Top', 'jevelin' ) => 'right top',
            __( 'Right Center', 'jevelin' ) => 'right center',
            __( 'Right Bottom', 'jevelin' ) => 'right bottom',
            __( 'Center Top', 'jevelin' ) => 'center top',
            __( 'Center Center', 'jevelin' ) => 'center center',
            __( 'Center Bottom', 'jevelin' ) => 'center bottom',
        ),
        'group' => __( 'Extras', 'jevelin' ),
    ),
    array(
        'param_name' => 'overflow',
        'heading' => __( 'Overflow', 'jevelin' ),
        'description' => __( 'Choose overflow setting (not availble when using parallax)', 'jevelin' ),
        'type' => 'dropdown',
        'value' => array(
            __( 'Default', 'jevelin' ) => 'default',
            __( 'Visible', 'jevelin' ) => 'visible',
            __( 'Hidden', 'jevelin' ) => 'hidden',
        ),
        'std' => 'center',
        'group' => __( 'Extras', 'jevelin' ),
    ),
    array(
        'param_name' => 'zindex',
        'heading' => __( 'Z-Index', 'jevelin' ),
        'description' => __( 'Enter z-index value to fix shadows', 'jevelin' ),
        'type' => 'textfield',
        'group' => __( 'Extras', 'jevelin' ),
    ),
);
vc_add_params( 'vc_row', $row_attributes );
vc_add_params( 'vc_row_inner', $row_attributes );


/* Rev Slider - Element */
$attributes = array(
	array(
		'param_name' => 'css',
		'type' => 'css_editor',
		'heading' => __( 'CSS box', 'jevelin' ),
		'group' => __( 'Design Options', 'jevelin' ),
	),
);
vc_add_params( 'rev_slider_vc', $attributes );
