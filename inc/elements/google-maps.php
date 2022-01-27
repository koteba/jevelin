<?php
/*
Element: Empry Space (responsive)
*/

class vcj_google_maps extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_google_maps', array( $this, '_html' ) );
    }


    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }

        vc_map(
            array(
                'name' => __('Google Maps', 'jevelin'),
                'base' => 'vcj_google_maps',
                'description' => __('Add map to your website', 'jevelin'),
                'category' => __('Jevelin Elements', 'jevelin'),
                'icon' => get_template_directory_uri().'/img/builder-icon.png',
                'params' => array(

                    array (
                        'param_name' => 'locations',
                        'heading' => '<p style="background-color: #f5f5f5; padding: 4px 8px; border-radius: 8px;">Google Maps requires API Key to work correctly. Therefore please create an application in Google Console and add key under "Appearance > Theme Settings > General > API Key".</p><br />Locations',
                        'value' => '',
                        'type' => 'param_group',
                        'std' => '',
                        'params' => array(
                            array (
                                'param_name' => 'address',
                                'type' => 'textfield',
                                'heading' => 'Address',
                                'description' => 'Enter your adress (for example: 86000 Poitiers, France)',
                                'value' => '',
                            ),
                            array (
                                'param_name' => 'latitude',
                                'type' => 'textfield',
                                'heading' => 'Latitude',
                                'description' => 'Enter latitude (optional and will overwrite adress)',
                                'value' => '',
                            ),
                            array (
                                'param_name' => 'longitude',
                                'type' => 'textfield',
                                'heading' => 'Longitude',
                                'description' => 'Enter longitude (optional and will overwrite adress)',
                                'value' => '',
                            ),
                            array (
                                'param_name' => 'description',
                                'type' => 'textarea',
                                'heading' => 'Description',
                                'description' => 'Enter description',
                                'value' => '',
                            ),
                        ),
                    ),

                    array(
                        'param_name' => 'image',
                        'heading' => __( 'Marker Image', 'jevelin' ),
                        'value' => __( 'Upload marker image', 'jevelin' ),
                        'type' => 'attach_image',
                        'admin_label' => true,
                    ),

                    array(
                        'param_name' => 'height',
                        'heading' => __( 'Height', 'jevelin' ),
                        'description' => __( 'Enter empty space height (Note: CSS measurement units allowed).', 'jevelin' ),
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => '',
                        'std' => '450px',
                        'admin_label' => true,
                    ),

                    array(
                        'param_name' => 'zoom',
                        'heading' => __( 'Custom Zoom', 'jevelin' ),
                        'description' => __( 'Enter custom zoom level (1-19). Only available if one location is used.', 'jevelin' ),
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => '',
                        'std' => '12',
                        'admin_label' => true,
                    ),

                    array (
                        'param_name' => 'styling',
                        'type' => 'textarea',
                        'heading' => 'Advanced Styling',
                        'description' => 'Enter styling data from <a href="https://snazzymaps.com/" target="_blank">Snazzy maps</a>',
                        'value' => '',
                    ),

                    array(
                        'param_name' => 'id',
                        'heading' => __( 'Element ID', 'jevelin' ),
                        'description' => __( 'Enter element ID (Note: make sure it is unique and valid according to <a href="https://www.w3schools.com/tags/att_global_id.asp" target="_blank">w3c specification</a>).', 'jevelin' ),
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => '',
                        'admin_label' => true,
                    ),

                    array(
                        'param_name' => 'class',
                        'heading' => __( 'Extra class name', 'jevelin' ),
                        'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'jevelin' ),
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => '',
                        'admin_label' => true,
                    ),

                ),
            )
        );

    }


    public function _html( $atts ) {

        // API key
        if( function_exists( 'shufflehound_google_maps_api_key' ) ) :
            $key = shufflehound_google_maps_api_key();
        elseif( jevelin_option('api_key') ) :
            $key = jevelin_option( 'api_key' );
        else :
            $key = '';
        endif;

        $enqueue_key = '';
        if( $key ) :
            $enqueue_key = '?key='.$key;
        endif;

        // Enqueue scripts
        wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js'.$enqueue_key, array(), null );
        wp_enqueue_script( 'gmap3', '//cdn.jsdelivr.net/gmap3/7.2.0/gmap3.min.js' );


        // Params extraction
        extract( shortcode_atts( array(
            'locations' => array(),
            'image' => '',
            'height' => '450px',
            'image' => '',
            'zoom' => '12',
            'styling' => '',
            'id' => '',
            'class' => '',
        ), $atts ) );


        // HTML
        $id = 'sh-google-maps-'.jevelin_rand();
        $element_class = array();
        $element_class[] = $id;
        $element_class[] = $class;
        if( $locations ) :
            $locations = vc_param_group_parse_atts( $locations );
        endif;


        // Get image
        if( jevelin_is_url( $image ) ) :
            $marker_image = $image;
        elseif( $image ) :
            $marker_image = jevelin_get_small_thumb( $image );
        else :
            $marker_image = get_template_directory_uri().'/img/google-maps-marker.png';
        endif;


        if( $zoom > 19 ) :
            $zoom = 19;
        elseif( !is_numeric( $zoom ) ) :
            $zoom = 12;
        endif;

        $only_position = '';
        $only_position_value = '';
        if( is_array( $locations ) && count( $locations ) == 1 ) :
            foreach( $locations as $location ) :
                $address = ( isset( $location['address'] ) ) ? $location['address'] : '';
                $latitude = ( isset( $location['latitude'] ) ) ? $location['latitude'] : '';
                $longitude = ( isset( $location['longitude'] ) ) ? $location['longitude'] : '';
                $only_content = ( isset( $location['description'] ) ) ? $location['description'] : '';

                if( $latitude && $longitude ) :
                    $only_position = 'position';
                    $only_position_value = '['.$latitude.', '.$longitude.']';
                elseif( $address ) :
                    $only_position = 'address';
                    $only_position_value = '"'.$address.'"';
                endif;
            endforeach;
        endif;
        ob_start(); ?>
            <div <?php echo $id ? 'id="'.$id.'" ' : ''; ?>class="sh-google-maps">

                <div class="map" style="height: <?php echo ( is_numeric( $height ) ) ? $height.'px' : $height; ?>;"></div>
                <script>
                jQuery(document).ready(function ($) {
        			if( $.isFunction( $.fn.gmap3 ) ) {

                        $('#<?php echo esc_attr( $id ); ?> .map')
                        .gmap3({
                            <?php if( $key ) : ?>
                                key: '<?php echo esc_attr( $key ); ?>',
                            <?php endif; ?>

                            <?php if( $only_position ) : ?>
                                <?php echo $only_position.':'.$only_position_value; ?>,
                                zoom:<?php echo intval( $zoom ); ?>,
                            <?php endif; ?>

                            <?php if( $styling ) : ?>
                                mapTypeId: "shadeOfGrey", // to select it directly
                                mapTypeControlOptions: {
                                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, "shadeOfGrey"]
                                }
                            <?php endif; ?>
                        })
                        .marker(
                            <?php if( $only_position ) : ?>{
                                <?php echo $only_position.':'.$only_position_value; ?>,
                                content: "<?php echo esc_attr( $only_content ); ?>",
                                icon: "<?php echo esc_url( $marker_image ); ?>"
                            }<?php else : ?>[
                                <?php foreach( $locations as $location ) :
                                    $address = ( isset( $location['address'] ) ) ? $location['address'] : '';
                                    $latitude = ( isset( $location['latitude'] ) ) ? $location['latitude'] : '';
                                    $longitude = ( isset( $location['longitude'] ) ) ? $location['longitude'] : '';
                                    $content = ( isset( $location['description'] ) ) ? $location['description'] : '';

                                    if( $latitude && $longitude ) :
                                        $position = 'position';
                                        $position_value = '['.$latitude.', '.$longitude.']';
                                    elseif( $address ) :
                                        $position = 'address';
                                        $position_value = '"'.$address.'"';
                                    else :
                                        $position = '';
                                        $position_value = '';
                                    endif;
                                ?>
                                    { <?php echo ( $position ) ? $position.':'.$position_value.', ' : ''; ?>content: "<?php echo esc_attr( $content ); ?>", icon: "<?php echo esc_url( $marker_image ); ?>" },
                                <?php endforeach; ?>]
                            <?php endif; ?>
                        )
                        .infowindow(
                            <?php if( $only_position ) : ?>{
                                content: "<?php echo esc_attr( $only_content ); ?>",
                            }<?php else : ?>[
                                <?php foreach( $locations as $location ) :
                                    $content = ( isset( $location['description'] ) ) ? $location['description'] : '';
                                ?>
                                    { content: "<?php echo esc_attr( $content ); ?>" },
                                <?php endforeach; ?>
                            ]<?php endif; ?>
                        )<?php if( $only_position ) : ?>
                            .then(function (infowindow) {
                                infowindow.open(this.get(0));
                            })
                        <?php else : ?>
                            .then(function (infowindow) {
                                var map = this.get(0);
                                var marker = this.get(1);
                                marker.forEach(function(item,i){
                                    if( item.content ) {
                                        item.addListener('click', function() {
                                            infowindow[i].open(map, item);
                                        });
                                    }
                                })
                            }).fit()
                        <?php endif; ?>
                        <?php if( $styling ) :
                            /* Fix Formating */
                            $styling = str_replace( '`{`{', '[{', $styling );
                            $styling = str_replace( '}`}`', '}]', $styling );
                            $styling = str_replace( "`{`", '[', $styling );
                            $styling = str_replace( "`}`", ']', $styling );
                            $styling = str_replace( '``', '"', $styling );
                            $styling = str_replace( '<br />', '', $styling );
                        ?>
                        .styledmaptype(
                          "shadeOfGrey", <?php echo ( $styling ); ?>
                        )<?php endif; ?>;


                    }
        		});
                </script>

            </div>
        <?php return ob_get_clean();
    }

}
new vcj_google_maps();
