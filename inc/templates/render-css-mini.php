<?php
ob_start("jevelin_compress");
if( jevelin_framework_active() ) :

/*-----------------------------------------------------------------------------------*/
/* Define Variables
/*-----------------------------------------------------------------------------------*/

$footer_columns_padding =  jevelin_post_option( jevelin_page_id(), 'footer_widgets_padding');
$titlebar_text_color =  jevelin_post_option( jevelin_page_id(), 'titlebar_text_color');

$accent_color =  jevelin_option( 'accent_color', '#47c9e5' );
$accent_hover_color = jevelin_option('accent_hover_color');
$header_nav_active_color = jevelin_option('header_nav_active_color');
$footer_hover_color = jevelin_option('footer_hover_color');

$popover_color = ( jevelin_option('popover_color') ) ? jevelin_option('popover_color') : jevelin_option('accent_color');


// Set default accent color
if( !$accent_color && !jevelin_option( 'header_layout' ) ) :
	$accent_color = '#47c9e5';
endif;
?>


	<?php if( !empty( $_GET['vc_editable'] ) ) : ?>
		html, body {
			overflow: visible;
		}
	<?php endif; ?>


<?php
/*-----------------------------------------------------------------------------------*/
/* Accent colors
/*-----------------------------------------------------------------------------------*/
?>

	.cf7-required:after,
	.woocommerce ul.products li.product a h3:hover,
	.woocommerce ul.products li.product ins,
	.post-title h2:hover,
	.sh-team:hover .sh-team-role,
	.sh-team-style4 .sh-team-role,
	.sh-team-style4 .sh-team-icon:hover i,
	.sh-header-search-submit,
	.woocommerce .woocommerce-tabs li.active a,
	.woocommerce .required,
	<?php if( jevelin_option( 'wc_style' ) != 'style3' ) : ?>
		.sh-recent-products .woocommerce .star-rating span::before,
		.woocommerce .woocomerce-styling .star-rating span::before,
	<?php else : ?>
		.sh-woocommerce-products-style3 .woocommerce ul.products li.product .add_to_cart_button:hover,
		.sh-woocommerce-products-style3 .woocommerce ul.products li.product .sh-woo-post-content-container .button:hover,
		.woocommerce .sh-woocommerce-products-style3 ul.products li.product .add_to_cart_button:hover,
		.woocommerce .sh-woocommerce-products-style3 ul.products li.product .sh-woo-post-content-container .button:hover,
		.woocommerce .sh-woocommerce-products-style3 ul.products li.product .woocommerce-loop-product__title:hover,
	<?php endif; ?>
	.sh-jevelin-style3.woocommerce .product .product_meta .posted_in a,
	.sh-jevelin-style3 .sh-increase-numbers span:hover,
	.woocommerce div.product p.price,
	.woocomerce-styling li.product .amount,
	.post-format-icon,
	.sh-accent-color,
	.sh-blog-tag-item:hover h6,
	ul.page-numbers a:hover,
	.sh-portfolio-single-info-item i,
	.sh-filter-item.active,
	.sh-filter-item:hover,
	.sh-nav .sh-nav-cart li.menu-item-cart .mini_cart_item .amount,
	.sh-pricing-button-style3,
	#sidebar a:not(.sh-social-widgets-item):hover,
	.logged-in-as a:hover,
	.woocommerce table.shop_table.cart a:hover,
	.wrap-forms sup:before,
	.sh-comment-date a:hover,
	.reply a.comment-edit-link,
	.comment-respond #cancel-comment-reply-link,
	.sh-portfolio-title:hover,
	.sh-portfolio-single-related-mini h5:hover,
	.sh-header-top-10 .header-contacts-details-large-icon i,
	.sh-unyson-frontend-test.active,
	.plyr--full-ui input[type=range],
	.woocommerce td.woocommerce-grouped-product-list-item__label a:hover,
	.sh-accent-color-hover:hover {
		color: <?php echo esc_attr( $accent_color ); ?>!important;
	}

	<?php if( jevelin_option( 'wc_style' ) != 'style3' ) : ?>
		.woocommerce p.stars.selected a:not(.active),
		.woocommerce p.stars.selected a.active,
	<?php endif; ?>
	.sh-jevelin-style3 .woocommerce-form-coupon-toggle .sh-alert,
	.sh-jevelin-style3 .woocommerce-progress.step1 .woocommerce-header-item-cart,
	.sh-jevelin-style3 .woocommerce-progress.step2 .woocommerce-header-item-checkout,
	.sh-dropcaps-full-square,
	.sh-dropcaps-full-square-border,
	.masonry2 .post-content-container a.post-meta-comments:hover,
	.sh-header-builder-edit:hover {
		background-color: <?php echo esc_attr( $accent_color ); ?>;
	}

	.contact-form input[type="submit"],
	.sh-back-to-top:hover,
	.sh-dropcaps-full-square-tale,
	.sh-404-button,
	.woocommerce .wc-forward,
	.woocommerce .checkout-button,
	.woocommerce div.product form.cart button,
	.woocommerce .button:not(.add_to_cart_button),
	.sh-blog-tag-item,
	.sh-comments .submit,
	.sh-sidebar-search-active .search-field,
	.sh-nav .sh-nav-cart .buttons a.checkout,
	ul.page-numbers .current,
	ul.page-numbers .current:hover,
	.post-background,
	.post-item .post-category .post-category-list,
	.cart-icon span,
	.comment-input-required,
	.widget_tag_cloud a:hover,
	.widget_product_tag_cloud a:hover,
	.woocommerce #respond input#submit,
	.sh-portfolio-overlay1-bar,
	.sh-pricing-button-style4,
	.sh-pricing-button-style11,
	.sh-revslider-button2,
	.sh-portfolio-default2 .sh-portfolio-title,
	.sh-recent-posts-widgets-count,
	.sh-filter-item.active:after,
	.blog-style-largedate .post-comments,
	.sh-video-player-style1 .sh-video-player-image-play,
	.sh-video-player-style2 .sh-video-player-image-play:hover,
	.sh-video-player-style2 .sh-video-player-image-play:focus,
	.woocommerce .woocommerce-tabs li a:after,
	.sh-image-gallery .slick-dots li.slick-active button,
	.sh-recent-posts-carousel .slick-dots li.slick-active button,
	.sh-recent-products-carousel .slick-dots li.slick-active button,
	.sh-settings-container-bar .sh-progress-status-value,
	.post-password-form input[type="submit"],
	.wpcf7-form .wpcf7-submit,
	.sh-portfolio-filter-style3 .sh-filter-item.active .sh-filter-item-content,
	.sh-portfolio-filter-style4 .sh-filter-item:hover .sh-filter-item-content,
	.sh-woocommerce-categories-count,
	.sh-woocommerce-products-style2 .woocommerce ul.products li.product .add_to_cart_button:hover,
	.woocomerce-styling.sh-woocommerce-products-style2 ul.products li.product .add_to_cart_button:hover,
	.sh-icon-group-style2 .sh-icon-group-item:hover,
	.sh-text-background,
	.plyr--audio .plyr__control.plyr__tab-focus,
	.plyr--audio .plyr__control:hover,
	.plyr--audio .plyr__control[aria-expanded=true],
	.sh-jevelin-style3 .widget_price_filter .ui-slider .ui-slider-range {
		background-color: <?php echo esc_attr( $accent_color ); ?>!important;
	}

	.sh-cf7-style4 form input:not(.wpcf7-submit):focus {
		border-bottom-color: <?php echo esc_attr( $accent_color ); ?>;
	}

	::selection {
		background-color: <?php echo esc_attr( $accent_color ); ?>!important;
		color: #fff;
	}
	::-moz-selection {
		background-color: <?php echo esc_attr( $accent_color ); ?>!important;
		color: #fff;
	}

	.woocommerce .woocommerce-tabs li.active a {
		border-bottom-color: <?php echo esc_attr( $accent_color ); ?>!important;
	}

	#header-quote,
	.sh-dropcaps-full-square-tale:after,
	.sh-blog-tag-item:after,
	.widget_tag_cloud a:hover:after,
	.widget_product_tag_cloud a:hover:after {
		border-left-color: <?php echo esc_attr( $accent_color ); ?>!important;
	}

	.cart-icon .cart-icon-triangle-color {
		border-right-color: <?php echo esc_attr( $accent_color ); ?>!important;
	}

	.sh-back-to-top:hover,
	.widget_price_filter .ui-slider .ui-slider-handle,
	.sh-sidebar-search-active .search-field:hover,
	.sh-sidebar-search-active .search-field:focus,
	.sh-cf7-style2 form p input:not(.wpcf7-submit):focus,
	.sh-cf7-style2 form p textarea:focus,
	.sh-jevelin-style3 .order-total .woocommerce-Price-amount {
		border-color: <?php echo esc_attr( $accent_color ); ?>!important;
	}

	.post-item .post-category .arrow-right {
		border-left-color: <?php echo esc_attr( $accent_color ); ?>;
	}

	<?php if($accent_hover_color) : ?>
		.woocommerce .wc-forward:hover,
		.woocommerce .button:not(.add_to_cart_button):hover,
		.woocommerce .checkout-button:hover,
		.woocommerce #respond input#submit:hover,
		.contact-form input[type="submit"]:hover,
		.wpcf7-form .wpcf7-submit:hover,
		.sh-video-player-image-play:hover,
		.sh-404-button:hover,
		.post-password-form input[type="submit"],
		.sh-pricing-button-style11:hover,
		.sh-revslider-button2.spacing-animation:not(.inverted):hover {
			background-color: <?php echo esc_attr( $accent_hover_color ); ?>!important;
		}

		.sh-cf7-unyson form .wpcf7-submit {
			background-size: 200% auto;
			background-image: linear-gradient(to right, <?php echo esc_attr( $accent_color ); ?> , <?php echo esc_attr( $accent_hover_color ); ?>, <?php echo esc_attr( $accent_hover_color ); ?>);
		}
	<?php endif; ?>

	.sh-mini-overlay-container,
	.sh-portfolio-overlay-info-box,
	.sh-portfolio-overlay-bottom .sh-portfolio-icon,
	.sh-portfolio-overlay-bottom .sh-portfolio-text,
	.sh-portfolio-overlay2-bar,
	.sh-portfolio-overlay2-data,
	.sh-portfolio-overlay3-data {
		background-color: <?php echo esc_attr( jevelin_hex2rgba( $accent_color, 0.75 ) ); ?>!important;
	}

	.woocommerce-progress {
		background-color: <?php echo esc_attr( jevelin_hex2rgba( $accent_color, 0.07 ) ); ?>;
	}

	.woocommerce-progress-item {
		color: <?php echo esc_attr( jevelin_hex2rgba( $accent_color, 0.50 ) ); ?>;
	}

	.sh-jevelin-style3 .sh-increase-numbers span:hover,
	.widget_price_filter .price_slider_wrapper .ui-widget-content {
		background-color: <?php echo esc_attr( jevelin_hex2rgba( $accent_color, 0.12 ) ); ?>!important;
	}

	.widget_price_filter .ui-slider .ui-slider-range {
		background-color: <?php echo esc_attr( jevelin_hex2rgba( $accent_color, 0.50 ) ); ?>!important;
	}

	.sh-team-social-overlay2 .sh-team-image:hover .sh-team-overlay2,
	.sh-overlay-style1,
	.sh-portfolio-overlay4 {
		background-color: <?php echo esc_attr( jevelin_hex2rgba( $accent_color, 0.80 ) ); ?>!important;
	}


<?php
/*-----------------------------------------------------------------------------------*/
/* Navigation
/*-----------------------------------------------------------------------------------*/
?>


	<?php if( $header_nav_active_color ) : ?>
		.sh-header .sh-nav > .current_page_item > a,
		.sh-header .sh-nav > .current-menu-ancestor > a,
		.sh-header .sh-nav > .current-menu-item > a,
		.sh-header-left-side .sh-nav > .current_page_item > a {
			color: <?php echo esc_attr( $header_nav_active_color ); ?>!important;
		}
	<?php endif; ?>


<?php
/*-----------------------------------------------------------------------------------*/
/* WooCommerce
/*-----------------------------------------------------------------------------------*/
?>

	.sh-popover-mini:not(.sh-popover-mini-dark) {
		background-color: <?php echo esc_attr( $popover_color ); ?>;
	}

	.sh-popover-mini:not(.sh-popover-mini-dark):before {
		border-color: transparent transparent <?php echo esc_attr( $popover_color ); ?> <?php echo esc_attr( $popover_color ); ?>!important;
	}


<?php
/*-----------------------------------------------------------------------------------*/
/* Footer
/*-----------------------------------------------------------------------------------*/
?>


	.sh-footer .sh-footer-widgets a:hover,
	.sh-footer .sh-footer-widgets li a:hover,
	.sh-footer .sh-footer-widgets h6:hover {
		color: <?php echo esc_attr( $footer_hover_color ); ?>;
	}

	<?php if( $footer_columns_padding ) : ?>
		.sh-footer-widgets {
			padding: <?php echo esc_attr( $footer_columns_padding ); ?>
		}
	<?php endif; ?>

	<?php if( $titlebar_text_color ) : ?>
		.sh-titlebar .titlebar-title .titlebar-title-h1,
		.sh-titlebar .sh-titlebar-desc {
			color: <?php echo esc_attr( $titlebar_text_color ); ?>!important;
		}
	<?php endif; ?>

<?php endif;
ob_end_flush();
?>
