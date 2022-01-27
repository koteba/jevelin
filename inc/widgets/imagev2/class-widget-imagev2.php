<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

class Widget_ImageV2 extends WP_Widget {

    /**
     * Widget constructor.
     */
    private $options;
    private $prefix;
    function __construct() {

        $widget_ops = array( 'description' => esc_html__( 'Add your image', 'jevelin' ) );
        parent::__construct( false, esc_html__( 'Shufflehound Image', 'jevelin' ), $widget_ops );
        $this->options = array(

            'id' => array( 'type' => 'unique' ),

            'title' => array(
                'type' => 'text',
                'label' => esc_html__('Widget Title', 'jevelin'),
                'value' => __('Image', 'jevelin'),
            ),


            'image' => array(
                'label'   => esc_html__( 'Image', 'jevelin' ),
                'desc'    => esc_html__( 'Upload image', 'jevelin' ),
                'type'    => 'upload',
                'images_only' => true,
            ),

            'url'   => array(
                'type'  => 'text',
                'label' => esc_html__( 'URL', 'jevelin' ),
                'desc'  => esc_html__( 'Enter URL', 'jevelin' ),
            ),

        );
        $this->prefix = 'online_support';
    }

    function widget( $args, $instance ) {
        extract( $args );
        $params = array();

        foreach ( $instance as $key => $value ) {
            $atts[ $key ] = $value;
        }

        $filepath = dirname( __FILE__ ) . '/views/widget.php';

        $instance = $atts;
        $before_widget = str_replace( 'class="', 'class="widget_advertise ', $before_widget );

        if ( file_exists( $filepath ) ) {
            require_once $filepath;
        }
    }

    function update( $new_instance, $old_instance ) {
        return Shufflehound_Metaboxes::widget_update( $new_instance, $old_instance, $this->options );
    }

    function form( $values ) {
        $name_prefix = substr( $this->get_field_name(''), 0, -2 );
        echo Shufflehound_Metaboxes::widget( $this->options, $values, $name_prefix );
    }

}
