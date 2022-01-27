<?php
/*
** Shufflehound Custom Metaboxes
*/
class Shufflehound_Metaboxes {
    private $metaboxes = [];
	public function __construct() {
        $this->metaboxes = function_exists( 'sh_metaboxes_options' ) ? sh_metaboxes_options() : [];

		add_action( 'add_meta_boxes', [ $this, 'register' ] );
        add_action( 'save_post', [ $this, 'save' ] );
	}


    public function register() {
        $metaboxes = $this->metaboxes;
        if( !empty( $metaboxes ) ) :
            foreach( $metaboxes as $metabox ) : $metabox = (object)$metabox;
                add_meta_box(
                    $metabox->id,
                    $metabox->title,
                    [ $this, 'output' ],
                    $metabox->post_type,
                    $metabox->position,
                    $metabox->priority
                );
            endforeach;
        endif;
    }


    public function output( $post, $data ) {
        $id = !empty( $data['id'] ) ? $data['id'] : '';
        $metaboxes = $this->metaboxes;
        foreach( $metaboxes as $metabox ) :
            if( $metabox['id'] == $id ) : ?>

                <div class="sh-metaboxes">
                    <div class="sh-metaboxes-sidebar">

                        <?php $j = 0; foreach( $metabox['sections'] as $section ) : $j++;  ?>
                            <div class="sh-metaboxes-sidebar-item<?php echo ( $j == 1 ) ? ' active' : ''; ?>" data-id="<?php echo $j; ?>">
                                <i class="<?php echo $section['icon']; ?>"></i>
                                <span>
                                    <?php echo $section['title']; ?>
                                </span>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="sh-metaboxes-content">

                        <div class="sh-metaboxes-notice-unsaved">
                            <?php esc_attr_e( 'Settings have changed, you should save them!', 'jevelin' ); ?>
                        </div>

                        <?php  $j = 0; foreach( $metabox['sections'] as $section ) : $j++; ?>
                            <div class="sh-metaboxes-section<?php echo ( $j == 1 ) ? ' active' : ''; ?>" data-id="<?php echo $j; ?>">
                                <h3 class="sh-metaboxes-section-title">
                                    <?php echo $section['title']; ?>
                                </h3>

                                <?php
                                    foreach( $section['fields'] as $field ) :
                                        $this->field( $post, $field );
                                    endforeach;
                                ?>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            <?php endif;
        endforeach;
    }


    public static function field( $post, $field, $metaboxes_type = 'post', $widget_name_prefix = '' ) {
        $field = (object)$field;
        $type = $field->type;
        $default = !empty( $field->default ) ? $field->default : '';

        if( $metaboxes_type == 'widget' ) :
            $widget_values = $post;
            foreach( $widget_values as $widget_key => $widget_value ) :
                if( $field->id == $widget_key ) :
                    $value = $widget_value;
                endif;
            endforeach;

            if( !isset( $value ) ) :
                $value = $default;
            endif;
        else :
            $meta_values = get_post_meta( $post->ID );
            if( array_key_exists( $field->id, $meta_values ) ) :
                $value = isset( $meta_values[ $field->id ][0] ) ? $meta_values[ $field->id ][0] : '';
            else :
                $value = $default;
            endif;
        endif;

        $field_name = $field->id;
        if( $widget_name_prefix ) :
            $field_name = $widget_name_prefix . '[' . $field->id . ']';
        endif;

        $classes = [];
        $classes[] = 'sh-metaboxes-field';
        if( !empty( $field->class ) ) :
            $classes[] = $field->class;
        endif;
        ?>

            <div class="<?php echo implode( ' ', $classes ); ?>">
                <div class="sh-metaboxes-info">
                    <?php if( !empty( $field->title ) ) : ?>
                        <strong>
                            <?php echo $field->title; ?>
                        </strong>
                    <?php endif; ?>
                    <?php if( !empty( $field->subtitle ) ) : ?>
                        <p>
                            <?php echo $field->subtitle; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="sh-metaboxes-data" data-field-name="<?php echo esc_attr( $field_name ); ?>">
                    <?php
                    /*
                    ** Select
                    */
                    if( $type == 'select' ) :
                        $selected = 0;
                        $options = !empty( $field->options ) ? $field->options : [];
                    ?>

                        <select class="" name="<?php echo esc_attr( $field_name ); ?>">
                            <?php foreach( $options as $key=>$option ) :?>
                                <option value="<?php echo $key; ?>" <?php echo ( $key && $key == $value && !$selected ) ? 'selected' : ''; ?>>
                                    <?php echo $option; ?>
                                </option>
                            <?php
                                if( $key && $key == $value ) :
                                    $selected++;
                                endif;
                            endforeach; ?>
                        </select>




                    <?php
                    /*
                    ** Button Set
                    */
                    elseif( $type == 'button_set' ) :
                        $options = !empty( $field->options ) ? $field->options : [];
                    ?>

                        <div class="sh-metaboxes-field-button">
                            <?php $i = 0;
                            foreach( $options as $key=>$option ) : $i++;
                                $class = 'sh-' . $field->id . '-' . $i;
                            ?>
                                <div class="sh-metaboxes-field-button-item">
                                    <input type="radio" id="<?php echo $class; ?>" name="<?php echo esc_attr( $field_name ); ?>" value="<?php echo $key; ?>" <?php echo ( $key == $value ) ? 'checked' : ''; ?>  class="sh-metaboxes-field-button-checkbox">
                                    <label for="<?php echo $class; ?>">
                                        <?php echo $option; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>



                    <?php
                    /*
                    ** Gallery
                    */
                    elseif( $type == 'gallery' ) :
                        $media_data = !is_array( $value ) ? unserialize( $value ) : $value;
                        $media_id = $media_thumbnail = '';
                    ?>

                        <div class="sh-metaboxes-field-media">
                            <div class="sh-metaboxes-field-media-gallery">
                                <?php if( is_array( $media_data ) && count( $media_data ) ) : ?>
                                    <?php foreach( $media_data as $gallery_item ) :
                                        $media_id = !empty( $gallery_item['id'] ) ? $gallery_item['id'] : '';
                                        $media_thumbnail = !empty( $gallery_item['thumbnail'] ) ? $gallery_item['thumbnail'] : '';
                                    ?>
                                        <div class="sh-metaboxes-field-media-preview active">
                                            <img src="<?php echo esc_url( $media_thumbnail ); ?>">
                                            <input type="hidden" name="<?php echo $field->id; ?>[]" value="<?php echo esc_attr( $media_id ); ?>" class="sh-metaboxes-field-media-value">
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div>
                                <input type="button" class="button sh-metaboxes-field-media-upload" data-type="gallery" data-prefix="<?php echo $field->id; ?>[]" value="<?php esc_attr_e( 'Upload', 'jevelin' ); ?>" />
                                <input type="button" class="button sh-metaboxes-field-media-remove <?php echo $media_id ? 'active-button' : ''; ?>" value="<?php esc_attr_e( 'Remove', 'jevelin' ); ?>" />
                            </div>
                        </div>




                    <?php
                    /*
                    ** Media
                    */
                    elseif( $type == 'media' ) :
                        if( is_numeric( $value ) && $value > 0 ) :
                            $media_id = $value;
                            $media_thumbnail_data = wp_get_attachment_image_src( $media_id );
                            $media_thumbnail = !empty( $media_thumbnail_data[0] ) ? $media_thumbnail_data[0] : '';
                            $media_images_only = 'on';
                        else :
                            $media_data = !is_array( $value ) ? unserialize( $value ) : $value;
                            $media_id = !empty( $media_data['id'] ) ? $media_data['id'] : '';
                            $media_url = !empty( $media_data['url'] ) ? $media_data['url'] : '';
                            $media_thumbnail = !empty( $media_data['thumbnail'] ) ? $media_data['thumbnail'] : '';
                            $media_images_only = ( isset( $field->images_only ) && !$field->images_only ) ? 'off' : 'on';

                            // Unyson fix
                            if( !empty( $media_data['attachment_id'] ) ) :
                                $media_id = $media_data['attachment_id'];
                            endif;

                            // Missing thumbnail
                            if( !$media_thumbnail && $media_id ) :
                                $media_thumbnail_data = wp_get_attachment_image_src( $media_id );
                                $media_thumbnail = !empty( $media_thumbnail_data[0] ) ? $media_thumbnail_data[0] : '';
                            endif;
                        endif;
                    ?>

                        <div class="sh-metaboxes-field-media">
                            <div class="sh-metaboxes-field-media-preview <?php echo $media_thumbnail ? 'active' : ''; ?>">
                                <img src="<?php echo esc_url( $media_thumbnail ); ?>" style="max-width: 150px;">
                            </div>
                            <div>
                            	<input type="hidden" name="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_url( $media_id ); ?>" class="sh-metaboxes-field-media-value">
                            	<input type="button" class="button sh-metaboxes-field-media-upload" data-type="media" data-images-only="<?php echo esc_attr( $media_images_only ); ?>" value="<?php esc_attr_e( 'Upload', 'jevelin' ); ?>" />
                                <input type="button" class="button sh-metaboxes-field-media-remove <?php echo $media_id ? 'active-button' : ''; ?>" value="<?php esc_attr_e( 'Remove', 'jevelin' ); ?>" />
                            </div>
                        </div>




                    <?php
                    /*
                    ** Color
                    */
                    elseif( $type == 'color' ) : ?>
                        <div class="sh-metaboxes-field-color">
                            <div class="sh-metaboxes-field-color-content">
                                <input type="text" id="<?php echo esc_attr( $field->id ); ?>" name="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $value ); ?>" />
                            </div>
                        </div>




                    <?php
                    /*
                    ** Repeater
                    */
                    elseif( $type == 'repeater' ) :
                        $button_name = !empty( $field->add_text ) ? $field->add_text : esc_attr__( 'Add', 'jevelin' );
                        $items = !is_array( $value ) ? unserialize( $value ) : $value;
                        $fields_data = ( !empty( $field->fields ) && is_array( $field->fields ) ) ? $field->fields : [];
                        $fields = [];
                        $i = 0;

                        // Fix fields
                        foreach( $fields_data as $field_key => $field ) : $field = (object) $field;
                            $field_id = isset( $field->id ) ? $field->id : '';
                            $field_title = isset( $field->title ) ? $field->title : '';
                            $field_class = isset( $field->class ) ? $field->class : '';

                            // Unyson fix
                            if( !$field_title && isset( $field->label ) ) :
                                $field_title = $field->label;
                            endif;
                            if( !$field_id && !empty( $field_key ) ) :
                                $field_id = $field_key;
                            endif;

                            $fields[] = [
                                'id' => $field_id,
                                'title' => $field_title,
                                'class' => $field_class,
                            ];
                        endforeach;
                    ?>

                        <div class="sh-metaboxes-field-repeater">
                            <div class="sh-metaboxes-field-repeater-content">
                                <?php if( is_array( $items ) ) : ?>
                                    <?php foreach( $items as $item ) : $item = (object) $item; $i++;
                                        $item_title = reset( $item );
                                    ?>
                                        <div class="sh-metaboxes-repeater-item">
                                            <div class="sh-metaboxes-repeater-item-container">

                                                <div class="sh-metaboxes-repeater-header">
                                                    <div class="sh-metaboxes-repeater-header-title">
                                                        <?php echo esc_attr( strip_tags( $item_title ) ); ?>
                                                    </div>
                                                    <div class="sh-metaboxes-repeater-header-controls">
                                                        <span class="sh-metaboxes-field-repeater-delete">
                                                            <i class="dashicons dashicons-dismiss"></i>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="sh-metaboxes-repeater-item-content">
                                                    <?php foreach( $fields as $field_key => $field ) : $field = (object) $field;
                                                        $field_id = $field->id;
                                                        $field_title = $field->title;
                                                        $field_value = isset( $item->{ $field->id } ) ? $item->{ $field->id } : '';
                                                        $field_class = isset( $field->class ) ? ' ' . $field->class : '';
                                                    ?>
                                                        <div class="sh-metaboxes-repeater-field-item<?php echo esc_attr( $field_class ); ?>">
                                                            <label>
                                                                <?php echo esc_attr( $field->title ); ?>
                                                                <input name="<?php echo esc_attr( $field_name ); ?>[<?php echo intval( $i ); ?>][<?php echo esc_attr( $field_id ); ?>]" class="sh-metaboxes-field-repeater-field-input" value="<?php echo esc_attr( $field_value ); ?>" type="text" />
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <span class="sh-metaboxes-field-repeater-add button" data-next-number="<?php echo ( $i + 1 ); ?>" data-fields='<?php echo json_encode( $fields ); ?>' data-prefix="<?php echo esc_attr( $field_name ); ?>">
                                <?php echo esc_attr( $button_name ); ?>
                            </span>
                        </div>




                    <?php
                    /*
                    ** Multi Text
                    */
                    elseif( $type == 'multi_text' ) :
                        $button_name = !empty( $field->add_text ) ? $field->add_text : esc_attr__( 'Add', 'jevelin' );
                        $items = !is_array( $value ) ? unserialize( $value ) : $value;
                    ?>

                        <div class="sh-metaboxes-field-multi_text">
                            <div class="sh-metaboxes-field-multi_text-content">
                                <?php if( is_array( $items ) ) : ?>
                                    <?php foreach( $items as $item ) : ?>
                                        <div class="sh-metaboxes-field-multi_text-item">
                                            <input name="<?php echo esc_attr( $field_name ); ?>[]" class="sh-metaboxes-field-multi_text-input" value="<?php echo esc_attr( $item ); ?>" type="text" />
                                            <span class="sh-metaboxes-field-multi_text-delete">
                                                <i class="dashicons dashicons-dismiss"></i>
                                            </span>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <span class="sh-metaboxes-field-multi_text-add button" data-prefix="<?php echo esc_attr( $field_name ); ?>[]">
                                <?php echo esc_attr( $button_name ); ?>
                            </span>
                        </div>




                    <?php
                    /*
                    ** Radio
                    */
                    elseif( $type == 'radio' ) :
                        $options = !empty( $field->options ) ? $field->options : [];
                    ?>

                        <div class="sh-metaboxes-field-radio">
                            <?php $i = 0;
                            foreach( $options as $key=>$option ) : $i++;
                                $class = 'sh-' . $field->id . '-' . $i;
                            ?>
                                <div class="sh-metaboxes-field-radio-item">
                                    <input type="radio" id="<?php echo $class; ?>" name="<?php echo esc_attr( $field_name ); ?>" value="<?php echo $key; ?>" <?php echo ( $key == $value ) ? 'checked' : ''; ?>>
                                    <label for="<?php echo $class; ?>">
                                        <?php echo $option; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>




                    <?php
                    /*
                    ** Textarea
                    */
                    elseif( $type == 'textarea' ) : ?>

                        <textarea name="<?php echo esc_attr( $field_name ); ?>"><?php echo $value; ?></textarea>




                    <?php elseif( $type == 'raw' ) : ?>
                    <?php else : ?>

                        <input type="text" id="<?php echo esc_attr( $field->id ); ?>" name="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $value ); ?>" />

                    <?php endif; ?>
                </div>
            </div>

        <?php
    }


    public static function save_fields( $post_type ) {
        $metaboxes = [];
        if( function_exists( 'sh_metaboxes_options' ) ) :
            $metaboxes = sh_metaboxes_options();
        else :
            require_once ( trailingslashit( get_template_directory() ) . '/inc/plugins/metaboxes/metaboxes-options.php' );
            if( function_exists( 'sh_metaboxes_options' ) ) :
                $metaboxes = sh_metaboxes_options();
            endif;
        endif;

        $meta_fields = [];
        foreach( $metaboxes as $metabox ) :
            if( $metabox['post_type'] == $post_type ) :
                foreach( $metabox['sections'] as $section ) :
                    foreach( $section['fields'] as $field ) :
                        $default = isset( $field['default'] ) ? $field['default'] : '';
                        if( !$default && isset( $field['options'] ) && key( $field['options'] ) ) :
                            $default = key( $field['options'] );
                        endif;

                        $meta_fields[$field['id']] = $default;
                    endforeach;
                endforeach;
            endif;
        endforeach;

        return $meta_fields;
    }



    public static function save( $post_id, $data = [], $migration = 0 ) {
        $id = '';
        $post_type = get_post_type( $post_id );


        // If custom data empty
        if( empty( $data ) ) :
            $data = $_POST;
        endif;


        // Start process
        if( !empty( $data ) && is_array( $data ) && count( $data ) ) :
            // Get fields
            $meta_fields = Shufflehound_Metaboxes::save_fields( $post_type );

            // Search and insert input
            $meta_values = get_post_meta( $post_id );
            foreach( $meta_fields as $key => $meta_field ) :
                if( array_key_exists( $key, $data ) ) :
                    $value = $data[$key];
                    if( $value && $value != $meta_field ) :

                        if( ( in_array( $key, [ 'post-video-file', 'post-audio-file', 'image', 'post-thumbnail', 'ad_image' ] ) || is_numeric( strpos( $key, '-image' ) ) ) && $value > 0 && get_post_type( $value ) == 'attachment' ) :
                            //$media_url_data = wp_get_attachment_image_src( $value, 'full' );
                            //$media_url = !empty( $media_url_data[0] ) ? $media_url_data[0] : '';
                            $media_url = wp_get_attachment_url( $value );

                            $media_thumbnail_data = wp_get_attachment_image_src( $value, 'thumbnail' );
                            $media_thumbnail = !empty( $media_thumbnail_data[0] ) ? $media_thumbnail_data[0] : '';

                            $value = [
                                'id' => $value,
                                'url' => $media_url,
                                'thumbnail' => $media_thumbnail,
                            ];
                        elseif( in_array( $key, [ 'post-gallery', 'project-gallery' ] ) ) :
                            $gallery = $value;
                            $value = [];
                            foreach( $gallery as $gallery_id ) :
                                if( $gallery_id > 0 && get_post_type( $gallery_id ) == 'attachment' ) :
                                    $media_url_data = wp_get_attachment_image_src( $gallery_id, 'full' );
                                    $media_url = !empty( $media_url_data[0] ) ? $media_url_data[0] : '';

                                    $media_thumbnail_data = wp_get_attachment_image_src( $gallery_id, 'thumbnail' );
                                    $media_thumbnail = !empty( $media_thumbnail_data[0] ) ? $media_thumbnail_data[0] : '';

                                    $value[] = [
                                        'id' => $gallery_id,
                                        'url' => $media_url,
                                        'thumbnail' => $media_thumbnail,
                                    ];
                                elseif( !empty( $gallery_id['attachment_id'] ) && !empty( $gallery_id['url'] ) ) :
                                    $value[] = [
                                        'id' => $gallery_id['attachment_id'],
                                        'url' => $gallery_id['url'],
                                        'thumbnail' => $gallery_id['url'],
                                    ];
                                endif;
                            endforeach;
                        endif;


                        // Sanitize both string and array
                        if( is_array( $value ) ) :
                            $value_original = $value;
                            foreach( $value_original as $value_key => $value_item ) :
                                if( is_array( $value_item ) ) :
                                    foreach( $value_item as $value_key2 => $value_item2 ) :
                                        $value[$value_key][$value_key2] = sanitize_text_field( $value_item2 );
                                    endforeach;
                                else :
                                    $value[$value_key] = sanitize_text_field( $value_item );
                                endif;
                            endforeach;
                        else :
                            if( in_array( $key, [ 'page_blog_category' ] ) ) :
                                $value = sanitize_textarea_field( $value );
                            else :
                                $value = sanitize_text_field( $value );
                            endif;
                        endif;


                        // Update post meta
                        update_post_meta(
                            $post_id,
                            sanitize_text_field( $key ),
                            $value
                        );

                    else :

                        // Allow empty for some fields
                        if( in_array( $key, [ 'header_style_description' ] ) && !$value ) :
                            update_post_meta(
                                $post_id,
                                sanitize_text_field( $key ),
                                ''
                            );

                        // Remove if exists and blank value
                        elseif( array_key_exists( $key, $meta_values ) ) :
                            delete_post_meta(
                                $post_id,
                                sanitize_text_field( $key )
                            );
                        endif;

                    endif;
                endif;
            endforeach;
        endif;
    }


    public static function convert_from_unyson( $unyson_options = [] ) {
        $redux_options = [];
        foreach( $unyson_options as $key=>$option ) : $option = (object)$option;
            $validate = '';
            $data = [];
            $data['id'] = $key;

            if( isset( $option->label ) ) :
                $data['title'] = $option->label;
            endif;

            if( isset( $option->desc ) ) :
                $data['subtitle'] = $option->desc;
            endif;

            if( isset( $option->type ) ) :
        		$type = $option->type;
        		// colors
        		if( in_array( $type, [ 'rgba-color-picker', 'color-picker' ] ) ) :
        			$type = $validate = 'color';

        		// swtich
        		elseif( $type == 'switch' ) :
        			$type = 'button_set';
        			$choices = [];
        			$left_choise = $option->{'left-choice'};
        			$right_choise = $option->{'right-choice'};
        			if( is_array( $left_choise ) ) :
        				$choice_value = isset( $left_choise['value'] ) ? $left_choise['value'] : '';
        				$choice_label = isset( $left_choise['label'] ) ? $left_choise['label'] : '';
        				if( $choice_label ) :
        					$choices[$choice_value] = $choice_label;
        				endif;
        			endif;
        			if( is_array( $right_choise ) ) :
        				$choice_value = isset( $right_choise['value'] ) ? $right_choise['value'] : '';
        				$choice_label = isset( $right_choise['label'] ) ? $right_choise['label'] : '';
        				if( $choice_label ) :
        					$choices[$choice_value] = $choice_label;
        				endif;
        			endif;
        			if( is_array( $choices ) ) :
        				$option->choices = $choices;
        			endif;

        		// slider
        		elseif( $type == 'slider' ) :
        			if( !empty( $option->properties['min'] ) ) :
        				$data['min'] = $option->properties['min'];
        			endif;
        			if( !empty( $option->properties['max'] ) ) :
        				$data['max'] = $option->properties['max'];
        			endif;
        			if( !empty( $option->properties['step'] ) ) :
        				$data['step'] = $option->properties['step'];
                        if( isset( $data['resolution'] ) ) :
            				$data['resolution'] = $option->properties['resolution'];
                        endif;
        			endif;

                // repeater
                elseif( $type == 'addable-popup' ) :
        			$type = 'repeater';
                    if( isset( $option->{'popup-options'} ) ) :
                        $data['fields'] = $option->{'popup-options'};
                    endif;

        		// checkboxes
        		elseif( $type == 'checkboxes' ) :
        			$type = 'checkbox';

                // checkboxes
        		elseif( $type == 'radio' ) :
        			$type = 'select';

        		// single image upload
        		elseif( $type == 'upload' ) :
        			$type = 'media';
        			$data['url'] = 1;

        		// raw title
        		elseif( $type == 'html-full' && isset( $option->html ) ) :
        			$raw_title = strip_tags( $option->html );
        			$type = 'raw';
        			$data['id'] = strtolower( $raw_title ) . '_divider';
        			$data['title'] = '<h2>' . $raw_title . '</h2>';
        		endif;

        		$data['type'] = $type;
        	endif;

        	if( isset( $option->choices ) ) :
        		$data['options'] = $option->choices;
        	endif;

        	if( !empty( $option->value ) ) :
        		$data['default'] = $option->value;
        	endif;

        	if( $validate ) :
        		$data['validate'] = $validate;
        	endif;

            if( !in_array( $type, [ 'unique' ] ) ) :
        	    $options[] = $data;
            endif;
        endforeach;
        return $options;
    }


    public static function widget( $options = [], $values = [], $name_prefix = '' ) {
        $options = Shufflehound_Metaboxes::convert_from_unyson( $options );
        echo '<div class="sh-metaboxes-widget">';

        foreach( $options as $option ) :
            echo Shufflehound_Metaboxes::field( $values, $option, 'widget', $name_prefix );
        endforeach;

        echo '</div>';
    }


    public static function widget_update( $new_instance, $old_instance, $options ) {
        $instance = $old_instance;
        foreach( $new_instance as $key => $value ) :
            if( array_key_exists( $key, $options ) /*&& isset( $options[$key]['type'] ) && $options[$key]['type'] != 'media' */ ) :
                $instance[$key] = $value;
            endif;
        endforeach;

        return $instance;
    }
}
new Shufflehound_Metaboxes();
