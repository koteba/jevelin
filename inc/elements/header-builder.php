<?php
/*
Element: Header Builder
*/

class vcj_header_builder extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, '_mapping' ), 12 );
        add_shortcode( 'vcj_header_builder', array( $this, '_html' ) );
    }


    public function _mapping() {
        if ( !defined( 'WPB_VC_VERSION' ) ) { return; }
        require_once ( trailingslashit( get_template_directory() ) . '/inc/elements/header-builder/options.php' );
    }


    public function _html( $atts ) {
        include ( trailingslashit( get_template_directory() ) . '/inc/elements/header-builder/variables.php' );
        ob_start(); ?>

            <?php /* Dynamic JS */ ?>
            <script type="text/javascript">
                jQuery(document).ready(function ($) {
                    $('#<?php echo esc_attr( $id ); ?> .sh-header-builder-mobile').css('height', $('#<?php echo esc_attr( $id ); ?> .sh-header-builder-mobile').actual( 'outerHeight' ) );
                });
            </script>

            <?php /* Dynamic CSS */ ?>
            <?php include ( trailingslashit( get_template_directory() ) . '/inc/elements/header-builder/css.php' ); ?>


            <?php /* Element Output */ ?>
            <header<?php echo $id ? ' id="'.$id.'" ' : ''; ?> class="sh-header-builder <?php echo implode( ' ', $element_class ); ?>">
                <?php
                    /* Topbar CSS */
                    if( $topbar_hidden == false ) :
                        include ( trailingslashit( get_template_directory() ) . '/inc/elements/header-builder/topbar.php' );
                    endif;

                    /* Header and Mobile CSS */
                    include ( trailingslashit( get_template_directory() ) . '/inc/elements/header-builder/header.php' );
                    include ( trailingslashit( get_template_directory() ) . '/inc/elements/header-builder/mobile.php' );
                ?>
            </header>

        <?php return ob_get_clean();
    }

}
new vcj_header_builder();
