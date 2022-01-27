<?php
/**
 * Unyson Demo Installation Method
 */
if ( ! function_exists( 'jevelin_remote_demos' ) ) :
	function jevelin_remote_demos( $demos ) {


	    $demos_array = array(
			'burger-shop' => [],
			'minimal-furniture-shop' => [],
			'mobile-app-2' => [],
			'mobile-app' => [],
			'business' => [],
			'startup-creative' => [],
			'portfolio-freelance' => [],
			'startup-clean' => [],
			'portfolio-minimalistic' => [],
			'corporate-accounting' => [],
			'portfolio-full-width' => [],
			'architect' => [],
			'single-product' => [],
			'personal-blog' => [],

			'fashion-shop' => array(
	            'title' => __('Fashion eCommerce (WPbakery Page Builder)', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/fashion_shop.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/fashion-shop/',
	        ),

			'finances' => array(
	            'title' => __('Finances (WPbakery Page Builder)', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/finances.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/finances/',
	        ),

			'digital-agency' => array(
	            'title' => __('Digital Media Agency (WPbakery Page Builder)', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/digital_agency.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/digital-media-agency/',
	        ),

			'creative-agency' => array(
	            'title' => __('Creative Agency (WPbakery Page Builder)', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/creative_agency.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/creative-agency/',
	        ),

			'medical' => array(
	            'title' => __('Medical (WPbakery Page Builder)', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/medical.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/',
	        ),



			'basic-home-vc' => array(
	            'title' => __('Basic Home (WPbakery Page Builder)', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/basic_home.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/',
	        ),

			'education-full' => array(
	            'title' => __('Beauty', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/education.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/education/',
	        ),

			'crypto-full' => array(
	            'title' => __('Beauty', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/crypto.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/crypto/',
	        ),

			'beauty-full' => array(
	            'title' => __('Beauty', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/beauty.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/beauty/',
	        ),

			'foodie-full' => array(
	            'title' => __('Foodie', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/foodie.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/foodie/',
	        ),

			'soon-full' => array(
	            'title' => __('Coming Soon', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/soon.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/coming-soon/',
	        ),

			'construction-full' => array(
	            'title' => __('Construction', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/construction.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/construction/',
	        ),

			'autospot-full' => array(
	            'title' => __('Autospot', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/autospot.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/autospot/',
	        ),

			'startup-full' => array(
	            'title' => __('Startup', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/startup.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/startup/',
	        ),

			'portfolio-full' => array(
	            'title' => __('Portfolio', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/portfolio.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/portfolio1/',
	        ),

            'blog-full' => array(
	            'title' => __('Blog', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/blog.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/blog1/',
	        ),

			'shop-full' => array(
	            'title' => __('Shop', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/shop.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/shop1/',
	        ),

			'landing2-full' => array(
	            'title' => __('Landing 2', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/landing2.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/landing2/',
	        ),

			'landing-full' => array(
	            'title' => __('Landing', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/landing.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/landing/',
	        ),

			'corporate-full' => array(
	            'title' => __('Corporate', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/corporate.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/corporate/',
	        ),

			'boxed-full' => array(
	            'title' => __('Boxed', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/boxed.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/boxed/',
	        ),

			'wedding-full' => array(
	            'title' => __('Wedding', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/wedding.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/wedding/',
	        ),

	        'basic-full' => array(
	            'title' => __('Basic', 'jevelin'),
	            'screenshot' => '//cdn.shufflehound.com/jevelin/files/basic.jpg',
	            'preview_link' => 'https://jevelin.shufflehound.com/',
	        ),

	    );
		//$demos_array = array_reverse( $demos_array );
	    $download_url = 'https://shufflehound.com/jevelin/';


	    foreach( $demos_array as $id => $data ) :
	        $demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
	            'url' => $download_url,
	            'file_id' => $id,
	        ));

			$title = isset( $data['title'] ) ? $data['title'] : str_replace( [ '-' ], ' ', ucwords( $id ) ) . ' (WPbakery Page Builder)';
			$title_clean = str_replace( [ ' (WPbakery Page Builder)', '(WPbakery Page Builder)' ], '', $title );
			$screenshot = isset( $data['screenshot'] ) ? $data['screenshot'] : '//cdn.shufflehound.com/jevelin/files/' . str_replace( [ '-' ], '_', strtolower( $id ) ) . '.jpg';
	        $preview_link = isset( $data['preview_link'] ) ? $data['preview_link'] : 'https://jevelin.shufflehound.com/' . $id . '/';

	        $demo->set_title( ucwords( $title ) );
	        $demo->set_screenshot( $screenshot );
	        $demo->set_preview_link( $preview_link );
	        $demos[ $demo->get_id() ] = $demo;
	        unset($demo);
	    endforeach;


	    return $demos;
	}
	add_filter('fw:ext:backups-demo:demos', 'jevelin_remote_demos');
endif;


/**
 * Jevelin demo installation update
 */
 add_filter(
     'fw:ext:backups:add-restore-task:image-sizes-restore',
     'jevelin_fw_backups_disable_image_sizes_restore',
     10, 2
 );
 function jevelin_fw_backups_disable_image_sizes_restore(
     $do, FW_Ext_Backups_Task_Collection $collection
 ) {
     if (
         $collection->get_id() === 'demo-content-install'
         &&
         ($task = $collection->get_task('demo:demo-download'))
         &&
         ($task_args = $task->get_args())
         &&
         isset($task_args['demo_id'])
         &&
         ( strpos($task_args['demo_id'], 'demo-local-') !== false )
     ) {
         $do = false;
     }

     return $do;
 }
