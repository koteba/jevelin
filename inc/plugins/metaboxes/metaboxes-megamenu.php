<?php
/*
** Shufflehound Mega Menu Options - HTML
*/
if( jevelin_framework() == 'redux' ) :
	function jevelin_menus_custom_fields( $item_id = 0, $item = [], $depth = 0 ) {  // $item_id, $item, $depth, $args, $id
	    if( !$depth ) :
            $mega_menu = get_post_meta( $item_id, 'mega-menu' );
			$status = isset( $mega_menu[0]['enabled'] ) ? $mega_menu[0]['enabled'] : false;
			$icon = isset( $mega_menu[0]['icon'] ) ? $mega_menu[0]['icon'] : '';
	    ?>

			<div class="description sh-metaboxes-field" style="display: block; padding-bottom: 5px;">
				<div class="">
					<?php echo esc_attr__( 'Icon', 'jevelin' ); ?>
				</div>
				<span class="button sh-mega-menu-icon-trigger">
					<?php echo esc_attr__( 'Choose Icon', 'jevelin' ); ?>
				</span>
				<div class="sh-metaboxes-field-icon">
					<input type="hidden" name="mega-menu-icon[<?php echo intval( $item_id ); ?>]" value="<?php echo esc_attr( $icon ); ?>" />
				</div>
			</div>

	        <div class="description">
	            <label>
                    <input type="checkbox" name="mega-menu[<?php echo intval( $item_id ); ?>]" value="on" <?php echo ( $status == 'on' ) ? ' checked' : ''; ?> class="sh-menus-mega-menu-checkbox">
	                <?php echo esc_attr__( 'Use as Mega Menu', 'jevelin' ); ?> <br>
	            </label>
	        </div>

	    <?php endif;
	}
	add_action( 'wp_nav_menu_item_custom_fields', 'jevelin_menus_custom_fields', 10, 4 );
endif;




/*
** Shufflehound Mega Menu Options - Save
*/
function haste_menus_custom_fields_update( $menu_id, $menu_item_db_id ) {
	$mega_menu_content = [];
	$status = isset( $_POST['mega-menu'][$menu_item_db_id] ) ? sanitize_text_field( $_POST['mega-menu'][$menu_item_db_id] ) : '';
	$icon = isset( $_POST['mega-menu-icon'][$menu_item_db_id] ) ? sanitize_text_field( $_POST['mega-menu-icon'][$menu_item_db_id] ) : '';

	// Status
	if( $status == 'on' ) :
        $mega_menu_content['enabled'] = true;
	endif;

	// Icon
	if( $icon ) :
        $mega_menu_content['icon'] = $icon;
	endif;

	// Update
	if( count( $mega_menu_content ) ) :
        update_post_meta( $menu_item_db_id, 'mega-menu', $mega_menu_content );
	else :
		delete_post_meta( $menu_item_db_id, 'mega-menu' );
	endif;
}
add_action( 'wp_update_nav_menu_item', 'haste_menus_custom_fields_update', 10, 2 );
