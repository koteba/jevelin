<?php
/*
Element: Image Gallery
*/

class vcj_image_gallery_simple extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_image_gallery_simple', array( $this, '_html' ) );
    }


    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }

        vc_map(
            array(
                'name' => __('Image Gallery', 'jevelin'),
                'base' => 'vcj_image_gallery_simple',
                'description' => __('Simple image gallery', 'jevelin'),
                'category' => __('Jevelin Elements', 'jevelin'),
                'icon' => get_template_directory_uri().'/img/builder-icon.png',
                'params' => array(

                    array (
                        'param_name' => 'images',
                        'heading' => 'Images',
                        'description' => 'To select multiple images use the CTRL key for PC or COMMAND key for MAC.',
                        'value' => '',
                        'type' => 'attach_images',
                        'class' => '',
                        'std' => '',
                    ),

                    array (
                        'param_name' => 'columns',
                        'heading' => 'Image Columns',
                        'description' => 'Choose image columns count',
                        'value' =>
                        array (
                            '1 Column' => '1columns',
                            '2 Columns' => '2columns',
                            '3 Columns' => '3columns',
                            '4 Columns' => '4columns',
                            '5 columns' => '5columns',
                        ),
                        'type' => 'dropdown',
                        'class' => '',
                        'std' => '3columns',
                        'admin_label' => true,
                    ),

                    array (
                        'param_name' => 'image_ratio',
                        'heading' => 'Image Ratio',
                        'description' => 'Choose image ratio',
                        'value' => array (
                            'Landscape' => 'landscape',
                            'Portrait' => 'portrait',
                            'Square' => 'square',
                            'Large (default ratio)' => 'large',
                            'Full (default ratio)' => 'full',
                        ),
                        'type' => 'dropdown',
                        'class' => '',
                        'std' => 'square',
                    ),

                    array (
                        'param_name' => 'overlay',
                        'heading' => 'Overlay',
                        'description' => 'Enable or disable overlay',
                        'value' =>
                        array (
                            'Off' => 'off',
                            'On' => 'on',
                        ),
                        'type' => 'dropdown',
                        'class' => '',
                        'std' => 'on',
                        'group' => 'Styling',
                    ),

                    array (
                        'param_name' => 'gap',
                        'heading' => 'Images Gap',
                        'description' => 'Select image gap for white space around them',
                        'value' => array (
                            '0px' => '0px',
                            '2px' => '2px',
                            '5px' => '5px',
                            '8px' => '8px',
                            '10px' => '10px',
                            '12px' => '12px',
                            '15px' => '15px',
                        ),
                        'type' => 'dropdown',
                        'class' => '',
                        'std' => '5px',
                        'group' => 'Styling',
                    ),

                    array (
                        'param_name' => 'radius',
                        'heading' => 'Image Radius',
                        'description' => 'Select image radius',
                        'value' => array (
                            '0px' => '0px',
                            '2px' => '2px',
                            '5px' => '5px',
                            '8px' => '8px',
                            '10px' => '10px',
                            '12px' => '12px',
                            '15px' => '15px',
                        ),
                        'type' => 'dropdown',
                        'class' => '',
                        'std' => '',
                        'group' => 'Styling',
                    ),

                ),
            )
        );

    }


    public function _html( $atts ) {
        // Params extraction
        extract( shortcode_atts( array(
            'images' => array(),
            'columns' => '3columns',
            'image_ratio' => 'square',
            'gap' => '5px',
            'radius' => '',
            'overlay' => 'on',
        ), $atts ) );
        $images = ( $images ) ? explode( ',', $images ) : $images;

        // HTML
        $id = 'sh-image-gallery-simple-'.jevelin_rand();
        $attachements = new WP_Query( array(
            'post_type' => 'attachment',
            'post_status' => 'any',
            'post__in' => $images,
            'posts_per_page' => -1,
            'ignore_sticky_posts' => 1
        ));

        if( $image_ratio == 'landscape' ) :
        	$image_ratio = 'post-thumbnail';
        elseif( $image_ratio == 'portrait' ) :
        	$image_ratio = 'jevelin-portrait';
        elseif( $image_ratio == 'large' ) :
        	$image_ratio = 'large';
        elseif( $image_ratio == 'full' ) :
        	$image_ratio = 'full';
        else :
        	$image_ratio = 'jevelin-square';
        endif;

        $classes = [];
        $classes[] = 'sh-image-gallery-simple';
        $classes[] = 'sh-image-gallery-simple-overlay-' . $overlay;
        $classes[] = 'sh-image-gallery-simple-' . $columns;
        ob_start(); ?>

            <style media="screen">
                <?php if( $gap != '0px' ) : ?>
                    #<?php echo $id; ?> {
                        margin: 0 -<?php echo $gap; ?>;
                    }

                    #<?php echo $id; ?> .sh-image-gallery-item {
                        padding: <?php echo $gap; ?>;
                    }
                <?php endif; ?>

                #<?php echo $id; ?> .sh-gallery-item {
                    border-radius: <?php echo $radius; ?>;
                }
            </style>

            <div id="<?php echo $id; ?>" class="<?php echo implode( ' ', $classes ); ?>">
                <?php if( $attachements->have_posts() ) : ?>
                    <?php while ( $attachements->have_posts() ) : $attachements->the_post();
                        $image = jevelin_get_small_thumb( get_the_ID(), $image_ratio );
                        $image_lightbox = jevelin_get_small_thumb( get_the_ID(), 'large' );
                    ?>

                        <div class="sh-image-gallery-item">
                			<div class="sh-gallery-item">
                				<div class="<?php echo ( $overlay != 'off' ) ? 'post-meta-thumb' : ''; ?>">
                					<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />

                                    <?php /* Overlay */ ?>
                                    <?php if( $overlay != 'off' ) : ?>
                                        <a class="sh-overlay-style2"  href="<?php echo esc_url( $image_lightbox ); ?>" data-rel="lightcase:imgCollection<?php echo esc_attr( $id ); ?>">
                                            <div class="sh-overlay-item">
                                                <div class="sh-overlay-item-open"></div>
                                            </div>
                                        </a>
                                    <?php endif; ?>

                				</div>
                			</div>
                		</div>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

        <?php return ob_get_clean();
    }

}
new vcj_image_gallery_simple();
