<?php
/*
** Categories
**/
function jevelin_add_template_categories() {
    return array(
        'all'  => esc_html__( 'All', 'jevelin' ),
        'accordion' => esc_html__( 'Accordion', 'jevelin' ),
        //'blog' => esc_html__( 'Blog', 'jevelin' ),
        'call-to-action' => esc_html__( 'Call To Action', 'jevelin' ),
        // 'contact-form' => esc_html__( 'Contact Form', 'jevelin' ),
        'contacts' => esc_html__( 'Contacts', 'jevelin' ),
        'countdown' => esc_html__( 'Countdown', 'jevelin' ),
        'counter' => esc_html__( 'Counter', 'jevelin' ),
        'event' => esc_html__( 'Event', 'jevelin' ),
        'gallery' => esc_html__( 'Gallery', 'jevelin' ),
        'icon-box' => esc_html__( 'Icon Box', 'jevelin' ),
        'icon-box-slider' => esc_html__( 'Icon Box Slider', 'jevelin' ),
        'image-points' => esc_html__( 'Image Points', 'jevelin' ),
        'map' => esc_html__( 'Map', 'jevelin' ),
        'misc' => esc_html__( 'Misc', 'jevelin' ),
        'paragraph' => esc_html__( 'Paragraph', 'jevelin' ),
        'partners' => esc_html__( 'Partners', 'jevelin' ),
        'pie-chart' => esc_html__( 'Pie Chart', 'jevelin' ),
        // 'portfolio' => esc_html__( 'Portfolio', 'jevelin' ),
        'pricing' => esc_html__( 'Pricing', 'jevelin' ),
        'progress-bar' => esc_html__( 'Progress Bar', 'jevelin' ),
        // 'shop' => esc_html__( 'Shop', 'jevelin' ),
        'social' => esc_html__( 'Social', 'jevelin' ),
        'tabs' => esc_html__( 'Tabs', 'jevelin' ),
        'team' => esc_html__( 'Team', 'jevelin' ),
        'testimonials' => esc_html__( 'Testimonials', 'jevelin' ),
        'timeline' => esc_html__( 'Timeline', 'jevelin' ),
    );
}


/**
 * Custom Dir
 */
if( function_exists( 'vc_set_shortcodes_templates_dir' ) ) :
    $dir = get_template_directory() . '/inc/elements/standard';
    vc_set_shortcodes_templates_dir( $dir );
endif;


/**
 * Add new tab
 */
add_filter( 'vc_get_all_templates', 'jevelin_add_template_tab' );
function jevelin_add_template_tab( $data ) {

    $sh_templates = jevelin_get_templates();
    $category_templates = array();
    foreach ( $sh_templates as $template_id => $template_data ) {
        $category_templates[] = array(
            'unique_id' => $template_id,
            'name' => $template_data['name'],
            'type' => 'sh_templates',
            'image' => isset( $template_data['image'] ) ? $template_data['image'] : false,
            'custom_class' => isset( $template_data['custom_class'] ) ? $template_data['custom_class'] : false,
            'category' => isset( $template_data['category'] ) ? $template_data['category'] : false,
        );
    }

    $newCategory = array(
        'category'        => 'sh_templates',
        'category_name'   => esc_html__( 'Jevelin Templates', 'jevelin' ),
        'category_weight' => 1,
        'templates'       => $category_templates,
    );
    $data[] = $newCategory;

    return $data;
}


/**
 * Add new content
 */
add_filter( 'vc_templates_render_category', 'jevelin_add_template_content' );
function jevelin_add_template_content( $category ) {

    if ( 'sh_templates' === $category['category'] ) :
        $categories = jevelin_add_template_categories();

        $templates = jevelin_get_templates();
        $output = ''; $i = 0;

        // if( function_exists( 'shufflehound_jevelin_template_categories_custom' ) ) :
        //    $categories = shufflehound_jevelin_template_categories_custom( $categories );
        // endif;

        $output .= '<div class="sortable_templates"><ul>';
        foreach( $categories as $key => $value ) : $i++;
            $active = ( $i == 1 ) ? 'class="active"' : '';

            $count = 0;
            if( $key == 'all' ) :
                foreach( $templates as $template ) :
                    $count++;
                endforeach;
            else :
                foreach( $templates as $template ) :
                    if( str_replace( ' ', '-', strtolower( $template['category'] ) ) == $key ) :
                        $count++;
                    endif;
                endforeach;
            endif;
            $output .= '<li '.$active.' data-sort="'.$key.'">'.$value.' <span class="count">'.$count.'</span></li>';
        endforeach;
        $output .= '</ul></div>';


        $category['output'] = '
        <div id="sh-templates-content">
            <div class="sh-categories-container vc_column vc_col-md-2">
                '.$output.'
                <div class="sh-categories-notice">* Slider and posts preview images are just examples of layouts, no new posts will be added</div>
            </div>
            <div class="sh-templates-container vc_column vc_col-md-10">
                <div class="vc_ui-template-list vc_templates-list-default_templates vc_ui-list-bar">';
                    if ( ! empty( $category['templates'] ) ) {
                        foreach ( $category['templates'] as $template ) {
                            $category['output'] .= jevelin_get_template_item( $template );
                        }
                    }
                    $category['output'] .= '
                </div>
            </div>
        </div>';
    endif;

    return $category;
}


/**
 * Add new item
 */
function jevelin_get_template_item( $template ) {
	$name = ( isset( $template['name'] ) ) ? esc_html( $template['name'] ) : esc_html( __( 'Error loading title', 'jevelin' ) );
	$template_id = esc_attr( $template['unique_id'] );
	$template_id_hash = md5( $template_id );
    $template_type = ( isset( $template['type'] ) ) ? $template['type'] : 'custom';
	$template_name = esc_html( substr( $name, 3 ) );
	$template_name_lower = esc_attr( vc_slugify( $template_name ) );
	$template_sort_name = esc_attr( isset( $template['category'] ) ? $template['category'] : '' );
	$template_class = esc_attr( vc_slugify( $template_sort_name ) );
    $template_image = ( isset( $template['image'] ) ) ? $template['image'] : '';
    $template_alt = esc_attr( 'Add this template', 'jevelin' );
    $image_ext = ( $template_class == 'categories' || $template_class == 'subscribe' ) ? 'jpg' : 'png';

    if( is_numeric( strpos( $template_name, '(new)' ) ) ) :
        $template_name = '<span style="color: #d10d0d!important;">'.$template_name.'</span>';
    endif;

    $image = ( $template_image ) ? $template_image : get_template_directory_uri().'/img/templates/'.$template_class.'/'.$template_name.'.'.$image_ext;
	$output = '
	<div class="sh-template vc_ui-template vc_templates-template-type-default_templates '.$template_class.'"
		data-template_id="'.$template_id.'"
		data-template_id_hash="'.$template_id_hash.'"
		data-category="'.$template_type.'"
		data-template_unique_id="'.$template_id.'"
		data-template_name="'.$template_name_lower.'"
		data-template_type="default_templates"
		data-vc-content=".vc_ui-template-content">
		<div class="sh-template-container vc_ui-list-bar-item">

            <div class="sh-template-preview">
                <div class="sh-ratio">
                    <div class="sh-ratio-container">
                        <div class="sh-ratio-content" style="background-image: url(' . esc_url( $image ) . ');"></div>
                    </div>
                </div>
            </div>

            <div class="sh-template-information">
        		<button type="button" class="sh-template-title vc_ui-list-bar-item-trigger sh-heading-font" title="'.$template_alt.'" data-template-handler="" data-vc-ui-element="template-title">
                    '.$template_name.'
                </button>
                <span class="sh-template-categories">' . esc_html( $template_sort_name ) . '</span>
            </div>

            <div class="vc_ui-list-bar-item-actions">
                <button type="button" class="sh-template-add vc_general vc_ui-control-button" title="'.$template_alt.'" data-template-handler="">
                    <i class="vc-composer-icon vc-c-icon-add"></i>
                </button>
            </div>

            <div class="sh-template-loading">
                <div class="loader-item">
                    <div class="loader loader-8"></div>
                </div>
            </div>

		</div>
		<div class="vc_ui-template-content" data-js-content></div>
	</div>';


	return $output;
}


/**
 * Recet templates
 */
add_filter( 'vc_load_default_templates', 'jevelin_reset_templates' );
function jevelin_reset_templates( $data ) {
    return array();
}


/**
 * Add templates
 */
function jevelin_add_templates() {
	$templates = jevelin_get_templates();
    foreach( $templates as $key => $template ) :
        $templates[$key]['disabled'] = 1;
    endforeach;

	return array_map( 'vc_add_default_templates', $templates );
}
jevelin_add_templates();


/**
 * Get templates
 */
function jevelin_get_templates(){

    $categories = jevelin_add_template_categories();

    /* Templates */
    $templates = jevelin_get_templates_content();

    // if( function_exists( 'shufflehound_jevelin_template_posts_custom' ) ) :
    //     $templates = shufflehound_jevelin_template_posts_custom( $templates );
    // endif;

    foreach( $templates as $key => $template ) :
        $templates[$key]['name'] = substr( $template['category'], 0, 2 ). ' '.$template['name'];
    endforeach;

    return $templates;
}
