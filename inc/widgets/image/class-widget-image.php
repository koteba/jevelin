<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

if( !class_exists('Widget_Image') ) :
	class Widget_Image extends WP_Widget {

		function __construct() {
			$widget_ops = array( 'description' => esc_html__( 'Enter information', 'jevelin' ) );

			parent::__construct( false, esc_html__( 'Shufflehound Information', 'jevelin' ), $widget_ops );
		}

		function widget( $args, $instance ) {
			extract( $args );
			$params = array();

			foreach ( $instance as $key => $value ) {
				$params[ $key ] = $value;
			}

			$title = ( isset( $params['widget-title'] ) && $params['widget-title'] ) ? $before_title . $params['widget-title'] . $after_title : '';

			$filepath = get_template_directory() . '/inc/widgets/image/views/widget.php';

			$instance      = $params;
			$before_widget = str_replace( 'class="', 'class="widget_social_links ', $before_widget );

			if ( file_exists( $filepath ) ) {
				include $filepath;
			}
		}

		function update( $new_instance, $old_instance ) {
			$instance = wp_parse_args( $new_instance, $old_instance );

			return $instance;
		}

		function form( $instance ) {

			$titles = array(
				'widget-title' => esc_html__( 'Image Title:', 'jevelin' ),
				'image' => esc_html__( 'Image URL:', 'jevelin' ),
				'description' => esc_html__( 'Description:', 'jevelin' ),
				'url' => esc_html__( 'URL:', 'jevelin' ),
				'social_icons' => esc_html__( 'Enable header social icons', 'jevelin' ),
			);

			$instance = wp_parse_args( (array) $instance, $titles );

			foreach ( $instance as $key => $value ) {
				?>
				<p>
					<label><?php echo esc_attr( ( isset( $titles[ $key ] ) && $titles[ $key ] ) ? $titles[ $key ] : '' ); ?></label>

					<?php if( strpos($this->get_field_name( $key ), 'description') !== false ) : ?>

						<textarea class="widefat widget_social_link widget_link_field" rows="4"
					    	name="<?php echo esc_attr( $this->get_field_name( $key ) ); ?>"><?php echo ( $instance[ $key ] === $titles[ $key ] ) ? '' : esc_attr( $instance[ $key ] ); ?></textarea>

					<?php elseif( strpos($this->get_field_name( $key ), 'social_icons') !== false ) : ?>

						<select name="<?php echo esc_attr( $this->get_field_name( $key ) ); ?>">
							<option value="off">Off</option>
							<option value="on" <?php echo ( $instance[ $key ] == 'on' ) ? ' selected' : ''; ?>>On</option>
						</select>

					<?php else : ?>

						<input class="widefat widget_social_link widget_link_field"
					       name="<?php echo esc_attr( $this->get_field_name( $key ) ); ?>" type="text"
					       value="<?php echo ( $instance[ $key ] === $titles[ $key ] ) ? '' : esc_attr( $instance[ $key ] ); ?>"/>

					<?php endif; ?>
				</p>
			<?php
			}
		}
	}
endif;
