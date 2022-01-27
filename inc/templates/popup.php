<style media="screen">
.sh-popup {
    display: flex;
	justify-content: center;
    align-items: center;
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background-color: rgba(0,0,0,0.9);
    z-index: 1050;

    display: none;
}

.sh-popup-content {
    background-color: #fff;
    width: 800px;
    border-radius: 8px;
    overflow: hidden;
}
</style>

<div class="sh-popup">
    <div class="sh-popup-content">

        <?php
            /* Footer Builder Output */
            $popup_id = 8861;
            if( class_exists( 'Vc_Manager' ) ) :
                ob_start();

                Vc_Manager::getInstance()->vc()->addShortcodesCustomCss( $popup_id );
                $popup_css = ob_get_contents();
                ob_end_clean();

                if( $popup_css ) :
                    echo $popup_css;
                else :
                    $popup_custom_css = get_post_meta( $popup_id, '_wpb_shortcodes_custom_css', true );
                    if( !empty( $popup_custom_css ) ) :
                        echo '<style type="text/css">';
                        echo $popup_custom_css;
                        echo '</style>';
                    endif;
                endif;

                $the_post = get_post( $popup_id );
                echo do_shortcode(  apply_filters( 'the_content', $the_post->post_content ) );
            endif;
        ?>

    </div>
</div>
