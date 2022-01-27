<?php
/*
** Add Elementor category
*/
function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'jevelin',
		[
			'title' => esc_attr__( 'Jevelin', 'jevelin' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );




/*
** Load functions when WPBakery Page Builder is disabled
*/
if( !class_exists( 'WPBakeryShortCode' ) ) :
	class WPBakeryShortCode {
		public function __construct() {
			//
		}
	}
endif;




/*
** Check if elementor content
*/
function jevelin_is_elementor_content( $post_id ) {
	if( did_action( 'elementor/loaded' ) ) :
		global $post;
		return \Elementor\Plugin::$instance->db->is_built_with_elementor( $post_id );
	endif;
}
