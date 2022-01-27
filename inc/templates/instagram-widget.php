<?php
$thumb_size = ( did_action( 'get_footer' ) ) ? 'small' : $size;
$is_element = get_query_var( 'is_instagram_element' ) ? 1 : 0;
$offset = get_query_var( 'is_instagram_element_offset' );
if( $offset ) :
    set_query_var( 'is_instagram_element_offset', ( $offset - 1 ) );
    return ;
endif;
?>
<li class="<?php echo esc_attr( $liclass ); ?>">

    <?php if( $is_element ) : ?>

        <div class="sh-instagram-element-item">
            <div class="sh-instagram-element-content sh-ratio">
                <div class="sh-ratio-container sh-ratio-container-square">
                    <div class="sh-ratio-content" style="background-image: url( <?php echo esc_url( $item[$thumb_size] ); ?> );">

                        <a href="<?php echo esc_url( $item['link'] ); ?>" target="<?php echo esc_attr( $target ); ?>" class="sh-instagram-element-overlay">
                            <span class="sh-instagram-element-overlay-item">
                                <span class="sh-instagram-element-overlay-text">
                                    <?php echo esc_attr( $item['likes'] ); ?>
                                </span>
                                <i class="fa fa-heart"></i>
                            </span>
                            <span class="sh-instagram-element-overlay-item">
                                <span class="sh-instagram-element-overlay-text">
                                    <?php echo esc_attr( $item['comments'] ); ?>
                                </span>
                                <i class="fa fa-comment"></i>
                            </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>

    <?php else : ?>

        <div class="sh-ratio null-instagram-feed-item">
            <div class="sh-ratio-container sh-ratio-container-square">
                <div class="sh-ratio-content" style="background-image: url( <?php echo esc_url( $item[$thumb_size] ); ?> );">

                    <div class="sh-overlay-style1">
                        <div class="sh-table-full">
                            <a href="<?php echo esc_url( $item['link'] ); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php echo esc_attr( $aclass ); ?> sh-overlay-item sh-table-cell">
                                <div class="sh-overlay-item-container">
                                    <i class="icon-link"></i>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <?php endif; ?>
</li>
