<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

if( !class_exists('Widget_Social') ) :
	class Widget_Social extends WP_Widget {

		function __construct() {
			$widget_ops = array( 'description' => esc_html__( 'Social links', 'jevelin' ) );

			parent::__construct( false, esc_html__( 'Shufflehound Social', 'jevelin' ), $widget_ops );
		}

		function widget( $args, $instance ) {
			extract( $args );
			$params = array();

			foreach ( $instance as $key => $value ) {
				$params[ $key ] = $value;
			}

			$title = $before_title . esc_attr( $params['widget-title'] ) . $after_title;
			unset( $params['widget-title'] );

			$filepath = get_template_directory() . '/inc/widgets/social/views/widget.php';

			$instance      = $params;
			$before_widget = str_replace( 'class="', 'class="widget_social_links ', $before_widget );

			if ( file_exists( $filepath ) ) {
				include $filepath;
			}
		}

		function update( $new_instance, $old_instance ) {
			$instance = wp_parse_args( (array) $new_instance, $old_instance );

			return $instance;
		}

		function form( $instance ) {

			$titles = array(
				'widget-title' => esc_html__( 'Social Title:', 'jevelin' ),
				'facebook'     => esc_html__( 'Facebook URL:', 'jevelin' ),
				'twitter'      => esc_html__( 'Twitter URL:', 'jevelin' ),
				'instagram'    => esc_html__( 'Instagram URL:', 'jevelin' ),
				'dribbble'     => esc_html__( 'Dribbble URL:', 'jevelin' ),
				'behance'      => esc_html__( 'Behance URL:', 'jevelin' ),
				'linkedin'     => esc_html__( 'Linkedin URL:', 'jevelin' ),
				'youtube'     => esc_html__( 'YouTube URL:', 'jevelin' ),
			);

			$instance = wp_parse_args( (array) $instance, $titles );

			foreach ( $instance as $key => $value ) :
				if( isset( $titles[ $key ] ) && $titles[ $key ] ) : ?>

				<p>
					<label><?php echo esc_attr( $titles[ $key ] ); ?></label>
					<input class="widefat widget_social_link widget_link_field"
					       name="<?php echo esc_attr( $this->get_field_name( $key ) ); ?>" type="text"
					       value="<?php echo ( $instance[ $key ] === $titles[ $key ] ) ? '' : esc_attr( $instance[ $key ] ); ?>"/>
				</p>

			<?php endif;
			endforeach;
		}
	}
endif;
