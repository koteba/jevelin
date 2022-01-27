<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

if( !class_exists('Widget_Portfolio') ) :
	class Widget_Portfolio extends WP_Widget {

		function __construct() {
			$widget_ops = array( 'description' => esc_html__( 'Portfolio', 'jevelin' ) );

			parent::__construct( false, esc_html__( 'Shufflehound Portfolio', 'jevelin' ), $widget_ops );
		}

		function widget( $args, $instance ) {
			extract( $args );
			$params = array();

			foreach ( $instance as $key => $value ) {
				$params[ $key ] = $value;
			}

			$limit = ( is_numeric($params['limit']) ) ? intval( $params['limit'] ) : 6;
			$title = $before_title . esc_attr( $params['title'] ) . $after_title;
			unset( $params['title'] );

			$filepath = get_template_directory() . '/inc/widgets/portfolio/views/widget.php';

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
				'title' => esc_html__( 'Title:', 'jevelin' ),
				'limit'       => esc_html__( 'Limit (number of items to show):', 'jevelin' ),
			);

			$instance = wp_parse_args( (array) $instance, $titles );

			foreach ( $instance as $key => $value ) {
				if( $key == 'limit' ) :
					$enter = ( $instance[ $key ] === $titles[ $key ] ) ? '6' : $instance[ $key ];
				else :
					$enter = ( $instance[ $key ] === $titles[ $key ] ) ? esc_attr__( 'Latest Projects', 'jevelin' ) : $instance[ $key ];
				endif;
				?>
				<p>
					<label><?php echo esc_attr( $titles[ $key ] ); ?></label>
					<input class="widefat widget_social_link widget_link_field"
					       name="<?php echo esc_attr( $this->get_field_name( $key ) ); ?>" type="text"
					       value="<?php echo esc_attr( $enter ); ?>"/>
				</p>
			<?php
			}
		}
	}
endif;
