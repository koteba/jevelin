<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

if( !class_exists('Widget_WP_Instagram_Widget') ) :
	class Widget_WP_Instagram_Widget extends WP_Widget {

		function __construct() {
			$widget_ops = array(
                'description' => esc_html__( 'Displays your latest Instagram photos', 'gillion' ),
                'customize_selective_refresh' => true,
            );

			parent::__construct( 'jevelin-instagram', esc_html__( 'Shufflehound Instagram', 'gillion' ), $widget_ops ); //
		}

		function widget( $args, $instance ) {
			wp_enqueue_script( 'instagramFeed', get_template_directory_uri() . '/js/plugins/jquery.instagramFeed.min.js', array( 'jquery' ), '1.0', true );

			extract( $args );
			$params = array();

			foreach ( $instance as $key => $value ) {
				$params[ $key ] = $value;
			}

			//$title = $before_title . $params['widget-title'] . $after_title;
			//unset( $params['widget-title'] );

			$filepath = get_template_directory() . '/inc/widgets/wp-instagram-widget/views/widget.php';

			$instance      = $params;
			$before_widget = str_replace( 'class="', 'class="widget_social_links ', $before_widget );

			if ( file_exists( $filepath ) ) {
				include ( $filepath );
			}
		}

		function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
    		$instance['title'] = strip_tags( $new_instance['title'] );
    		$instance['username'] = trim( strip_tags( $new_instance['username'] ) );
    		$instance['number'] = ! absint( $new_instance['number'] ) ? 9 : $new_instance['number'];
    		$instance['size'] = ( ( 'thumbnail' === $new_instance['size'] || 'large' === $new_instance['size'] || 'small' === $new_instance['size'] || 'original' === $new_instance['size'] ) ? $new_instance['size'] : 'large' );
    		$instance['target'] = ( ( '_self' === $new_instance['target'] || '_blank' === $new_instance['target'] ) ? $new_instance['target'] : '_self' );
    		$instance['link'] = strip_tags( $new_instance['link'] );
    		return $instance;
		}

		function form( $instance ) {
            $instance = wp_parse_args( (array) $instance, array(
    			'title' => __( 'Instagram', 'wp-instagram-widget' ),
    			'username' => '',
    			'size' => 'large',
    			'link' => __( 'Follow Me!', 'wp-instagram-widget' ),
    			'number' => 9,
    			'target' => '_self',
    		) );
    		$title = $instance['title'];
    		$username = $instance['username'];
    		$number = absint( $instance['number'] );
    		$size = $instance['size'];
    		$target = $instance['target'];
    		$link = $instance['link'];
    		?>
    		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'wp-instagram-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></label></p>
    		<p><label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( '@username', 'wp-instagram-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" type="text" value="<?php echo esc_attr( $username ); ?>" /></label></p>
    		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of photos', 'wp-instagram-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" /></label></p>
    		<p><label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Photo size', 'wp-instagram-widget' ); ?>:</label>
    			<select id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" class="widefat">
    				<option value="thumbnail" <?php selected( 'thumbnail', $size ); ?>><?php esc_html_e( 'Thumbnail', 'wp-instagram-widget' ); ?></option>
    				<option value="small" <?php selected( 'small', $size ); ?>><?php esc_html_e( 'Small', 'wp-instagram-widget' ); ?></option>
    				<option value="large" <?php selected( 'large', $size ); ?>><?php esc_html_e( 'Large', 'wp-instagram-widget' ); ?></option>
    				<option value="original" <?php selected( 'original', $size ); ?>><?php esc_html_e( 'Original', 'wp-instagram-widget' ); ?></option>
    			</select>
    		</p>
    		<p style="display: none;"><label for="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>"><?php esc_html_e( 'Open links in', 'wp-instagram-widget' ); ?>:</label>
    			<select id="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'target' ) ); ?>" class="widefat">
    				<option value="_self" <?php selected( '_self', $target ); ?>><?php esc_html_e( 'Current window (_self)', 'wp-instagram-widget' ); ?></option>
    				<option value="_blank" <?php selected( '_blank', $target ); ?>><?php esc_html_e( 'New window (_blank)', 'wp-instagram-widget' ); ?></option>
    			</select>
    		</p>
    		<p style="display: none;"><label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_html_e( 'Link text', 'wp-instagram-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" /></label></p>
    		<?php
		}
	}
endif;
