<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
$atts = $params;
$id_rand = jevelin_rand();
$username = !empty( $atts['username'] ) ? $atts['username'] : '';
$limit = !empty( $atts['number'] ) ? $atts['number'] : 6;
$image_size = !empty( $atts['size'] ) ? $atts['size'] : 6;


if( $image_size == 'thumbnail' ) :
    $image = '150';
elseif( $image_size == 'small' ) :
    $image = '320';
elseif( $image_size == 'large' ) :
    $image = '640';
else :
    $image = '640';
endif;
?>

<?php echo wp_kses_post( $before_widget );
if( $atts['title'] ) :
    echo '<div class="sh-widget-title-styling"><h3 class="widget-title">'.esc_attr( $atts['title'] ).'</h3></div>';
endif;
?>


<?php if( $username ) : ?>
    <script>
        (function($){
            $(window).on('load', function(){
                $.instagramFeed({
                    'username': '<?php echo esc_attr( $username ); ?>',
                    'container': "#instagram-feed-<?php echo esc_attr( $id_rand ); ?>",
                    'display_profile': false,
                    'display_biography': false,
                    'display_gallery': true,
                    'callback': null,
                    'styling': true,
                    'items': <?php echo intval( $limit ); ?>,
                    'items_per_row': <?php echo intval( $limit ); ?>,
                    'margin': 0,
                    'image_size': <?php echo esc_attr( $image ); ?>,
                    'styling': 0,
                });
            });
        })(jQuery);
    </script>
    <div id="instagram-feed-<?php echo esc_attr( $id_rand ); ?>" class="sh-widget-instagramv2 sh-widget-instagramv2-columns2"></div>
<?php endif; ?>

<?php echo wp_kses_post( $after_widget ); ?>
