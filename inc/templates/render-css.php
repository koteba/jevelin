<?php
ob_start("jevelin_compress");
if( jevelin_framework_active() ) :

/*-----------------------------------------------------------------------------------*/
/* Define Variables
/*-----------------------------------------------------------------------------------*/

$content_width = jevelin_option( 'content_width', 1200 );

$body = jevelin_font_option('styling_body');
$body_color = jevelin_option_value('styling_body','color');
$body_line_height = jevelin_option_value('styling_body','line-height');
$body_background = jevelin_option('styling_body_background');

$link_color = jevelin_option('link_color');
$link_hover_color = jevelin_option('link_hover_color');

$headings = jevelin_font_option('styling_headings');
$heading_color = jevelin_option_value('styling_headings','color');
$heading_font = jevelin_option_value('styling_headings','family');
$heading1 = jevelin_option('styling_h1');
$heading2 = jevelin_option('styling_h2');
$heading3 = jevelin_option('styling_h3');
$heading4 = jevelin_option('styling_h4');
$heading5 = jevelin_option('styling_h5');
$heading6 = jevelin_option('styling_h6');

$header_width = jevelin_option('header_width');
$header_uppercase = jevelin_option('header_uppercase');
$header_background_color = jevelin_option('header_background_color');
$header_background_image = jevelin_option_image('header_background_image');
$header_text_color = jevelin_option('header_text_color');
$header_border_color = jevelin_option('header_border_color');
$topbar_background_color = jevelin_option('header_top_background_color');
$topbar_color = jevelin_option('header_top_color');
$header_light_text_color = jevelin_option('header_light_text_color');
$header_light_text_active_color = jevelin_option('header_light_text_active_color');

$header_nav_font = jevelin_option('header_nav_font');
$header_nav_size = jevelin_option('header_nav_size');
$header_nav_color = jevelin_option('header_nav_color');
$header_nav_hover_color = jevelin_option('header_nav_hover_color');
$header_nav_active_background_color = jevelin_option('header_nav_active_background_color');
$header_height = intval( jevelin_logo_height() ) + 30;
if( $header_height < 70 ) :
	$header_height = 70;
endif;

$menu_background_color = jevelin_option('menu_background_color');
$menu_link_border_color = jevelin_option('menu_link_border_color');
$menu_title_color = jevelin_option('menu_title_color');
$menu_link_color = jevelin_option('menu_link_color');
$menu_link_hover_color = jevelin_option('menu_link_hover_color');
$menu_link_border_color = jevelin_option('menu_link_border_color');
$menu_active_background1 = jevelin_option('menu_active_background1');
$menu_active_background2 = jevelin_option('menu_active_background2');

$sidebar_headings = jevelin_font_option('sidebar_headings');
$sidebar_border_color = jevelin_option('sidebar_border_color');
$sidebar_font_weight = jevelin_option('sidebar_font_weight');

$footer_width = jevelin_option('footer_width');
$footer_background_image = jevelin_option_image('footer_background_image');
$footer_background_color = jevelin_option('footer_background_color');
$footer_text_color = jevelin_option('footer_text_color');
$footer_icon_color = jevelin_option('footer_icon_color');
$footer_headings = jevelin_font_option('footer_headings');
$footer_border_color = jevelin_option('footer_border_color');
$footer_link_color = jevelin_option('footer_link_color');
$footer_columns =  jevelin_option('footer_columns');
$footer_padding =  jevelin_option( 'copyright_padding' );

$copyright_background_color = jevelin_option('copyright_background_color');
$copyright_text_color = jevelin_option('copyright_text_color');
$copyright_link_color = jevelin_option('copyright_link_color');
$copyright_hover_color = jevelin_option('copyright_hover_color');
$copyright_border_color = jevelin_option('copyright_border_color');

$post_overlay = jevelin_option('post_overlay');
$wc_columns = jevelin_option('wc_columns');
$additional_font1 = jevelin_option_value('additional_font1','family');
$popover_font = jevelin_option('popover_font');

$popover_wc = jevelin_option( 'popover_wc', 'on' );

$white_borders = jevelin_option('white_borders', false);
$white_borders_only_on_pages = jevelin_option('white_borders_only_on_pages', false);
$header_layout = jevelin_option('header_layout', 1);
$topbar_status = jevelin_option('topbar_status', 1);
$crispy_images = jevelin_option('crispy_images', false);
$back_to_top_rounded = jevelin_option('back_to_top_rounded', true);

$content_border = jevelin_option( 'content_border', '#e5e5e5' );
$content_button_background = jevelin_option( 'content_button_background', '#f2f2f2' );
$content_button_background_hover = jevelin_option( 'content_button_background_hover', '#e5e5e5' );
$content_button_text_color = jevelin_option( 'content_button_text_color', '#9a9a9a' );

$content_input_background_color = jevelin_option( 'content_input_background_color', '#ffffff' );
$content_input_border_color = jevelin_option( 'content_input_border_color', '#e3e3e3' );
$content_input_text_color = jevelin_option( 'content_input_text_color', '#8d8d8d' );

$content_search_background_color = jevelin_option( 'content_search_background_color', '#f0f0f0' );
$content_search_text_color = jevelin_option( 'content_search_text_color', '#505050' );

$wc_related = jevelin_option( 'wc_related', true );

$carousel_dots_background_color = jevelin_option( 'carousel_dots_background_color' );
$carousel_dots_border_color = jevelin_option( 'carousel_dots_border_color' );
$carousel_dots_active_background_color = jevelin_option( 'carousel_dots_active_background_color' );
$carousel_dots_active_border_color = jevelin_option( 'carousel_dots_active_border_color' );
$portfolio_padding = jevelin_option( 'portfolio_padding' );
?>

	/* Elements CSS */


	<?php if( $content_width && $content_width >= 1000 ) : ?>
		@media (min-width: <?php echo ( intval( $content_width ) + 60 ); ?>px) {
			.container {
			    max-width: <?php echo intval( $content_width ); ?>px!important;
				min-width: <?php echo intval( $content_width ); ?>px!important;
			    width: <?php echo intval( $content_width ); ?>px!important;
			}

			/* WPBakery Page Builder */
			.vc_row[data-vc-full-width="true"]:not([data-vc-stretch-content="true"]) {
			    margin-left: calc(-100vw/2 + <?php echo intval( $content_width ); ?>px/2 + 7.5px);
			    margin-right: calc(-100vw/2 + <?php echo intval( $content_width ); ?>px/2 + 7.5px);
			    padding-left: calc(100vw/2 - <?php echo intval( $content_width ); ?>px/2 - 7.5px)!important;
			    padding-right: calc(100vw/2 - <?php echo intval( $content_width ); ?>px/2 - 7.5px)!important;
			}

			/* Elementor Page Builder */
			.elementor-section-boxed.elementor-top-section > .elementor-container {
		    	width: <?php echo intval( $content_width ); ?>px;
				min-width: auto;
				max-width: 100%;
		    }

			.elementor-section-boxed.elementor-top-section > .elementor-container .elementor-section > .elementor-container {
				width: 100%;
			}
		}
	<?php endif; ?>

<?php
/*-----------------------------------------------------------------------------------*/
/* Body
/*-----------------------------------------------------------------------------------*/
?>

	.sh-tabs-filter li a,
	.woocommerce .woocommerce-tabs li:not(.active) a,
	.woocommerce .product .posted_in a,
	.woocommerce .product .tagged_as a,
	.woocommerce .product .woocommerce-review-link,
	.woocommerce-checkout #payment div.payment_box,
	.sh-default-color a,
	.sh-default-color,
	.post-meta-two a,
	#sidebar a,
	.logged-in-as a ,
	.post-meta-author a,
	.sh-social-share-networks .jssocials-share i,
	.sh-header-left-side .sh-header-copyrights-text a,
	.wpcf7-form-control-wrap .simpleselect {
		color: <?php echo esc_attr( $body_color ); ?>!important;
	}

	.woocommerce nav.woocommerce-pagination ul.page-numbers a {
		color: <?php echo esc_attr( $body_color ); ?>;
	}

	html body,
	html .menu-item a {
		<?php echo wp_kses_post( $body ); ?>
	}

	<?php if( $body_background != '#ffffff' ) : ?>
		html body,
		.sh-woo-post-content-container {
			background-color: <?php echo esc_attr( $body_background ); ?>;
		}
		.sh-404 > div {
			border-color: <?php echo esc_attr( $body_background ); ?>;
		}
	<?php endif; ?>

	<?php if( $body_line_height > 0 ) : ?>
		body p {
			line-height: <?php echo esc_attr( $body_line_height ); ?>px;
		}
	<?php endif; ?>



<?php
/*-----------------------------------------------------------------------------------*/
/* Links
/*-----------------------------------------------------------------------------------*/
?>

	<?php if( $link_color ) : ?>
		a {
			color: <?php echo esc_attr( $link_color ); ?>;
		}
	<?php endif; ?>

	<?php if( $link_hover_color ) : ?>
		a:hover,
		a:focus,
		.post-meta-two a:hover  {
			color: <?php echo esc_attr( $link_hover_color ); ?>;
		}
	<?php endif; ?>


<?php
/*-----------------------------------------------------------------------------------*/
/* Headings
/*-----------------------------------------------------------------------------------*/
?>

	body h1,
	body h2,
	body h3,
	body h4,
	body h5,
	body h6,
	.sh-heading span.sh-heading-content {
		<?php echo wp_kses_post( $headings ); ?>
	}

	.sh-heading-font,
	.masonry2 .post-meta-one,
	.masonry2 .post-meta-two,
	.sh-countdown > div > span,
	.sh-woocommerce-products-style2 ul.products li.product .price,
	.sh-blog-style2 .widget_product_tag_cloud a,
	.sh-blog-style2 .widget_tag_cloud a,
	.sh-blog-style2 .sh-recent-posts-widgets-item-content .post-meta-categories,
	.sh-blog-style2 .post-meta-categories,
	.sh-blog-style2 .post-item-single .post-meta-data,
	.rev_slider .sh-rev-blog .sh-revslider-button2,
	.sh-portfolio-filter-style4 .sh-filter span,
	.sh-accordion-style6 .panel-title a {
		font-family: <?php echo esc_attr( $heading_font ); ?>;
	}

	<?php if( $heading1 ) : ?>
		h1 {
			font-size: <?php echo esc_attr( $heading1 ); ?>px;
		}
	<?php endif; ?>

	<?php if( $heading2 ) : ?>
		h2 {
			font-size: <?php echo esc_attr( $heading2 ); ?>px;
		}
	<?php endif; ?>

	<?php if( $heading3 ) : ?>
		h3 {
			font-size: <?php echo esc_attr( $heading3 ); ?>px;
		}
	<?php endif; ?>

	<?php if( $heading4 ) : ?>
		h4 {
			font-size: <?php echo esc_attr( $heading4 ); ?>px;
		}
	<?php endif; ?>

	<?php if( $heading5 ) : ?>
		h5 {
			font-size: <?php echo esc_attr( $heading5 ); ?>px;
		}
	<?php endif; ?>

	<?php if( $heading6 ) : ?>
		h6 {
			font-size: <?php echo esc_attr( $heading6 ); ?>px;
		}
	<?php endif; ?>

	.sh-progress-style1 .sh-progress-title,
	.sh-progress-style1 .sh-progress-value2,
	.sh-progress-style4 .sh-progress-title,
	.sh-progress-style4 .sh-progress-value2,
	.sh-progress-style5 .sh-progress-title,
	.widget_price_filter .price_slider_wrapper .price_label span,
	.product_list_widget a span,
	.woocommerce .product .woo-meta-title,
	.woocommerce .product .price ins,
	.woocommerce .product .price .amount,
	.woocommerce-checkout #payment ul.payment_methods li,
	table th,
	.woocommerce-checkout-review-order-table .order-total span,
	.sh-comment-form label,
	.sh-piechart-percentage,
	.woocommerce table.shop_table a.remove:hover:before,
	.woocommerce .woocommerce-tabs .commentlist .comment-text .meta strong,
	.sh-pricing-amount,
	.sh-pricing-icon,
	.sh-countdown > div > span,
	.blog-single .post-title h1:hover,
	.blog-single .post-title h2:hover,
	.post-meta-author a:hover,
	.post-meta-categories a:hover,
	.post-meta-categories span:hover,
	.woocommerce table.shop_table.cart a,
	.wrap-forms label,
	.wpcf7-form p,
	.sh-cf7-wpbakery label,
	.post-password-form label,
	.product_list_widget ins,
	.product_list_widget .amount,
	.sh-social-share-networks .jssocials-share:hover i,
	.sh-page-links p,
	.woocommerce ul.products li.product .add_to_cart_button:hover,
	.woocommerce td.woocommerce-grouped-product-list-item__label a,
	.woocommerce .product.product-type-grouped .price,
	.sh-heading-color {
		color: <?php echo esc_attr( $heading_color ); ?>!important;
	}


<?php
/*-----------------------------------------------------------------------------------*/
/* Content
/*-----------------------------------------------------------------------------------*/
?>

<?php if( $content_border && $content_border != '#e5e5e5' ) : ?>
	.post-item-single .post-meta-data,
	.blog-single .sh-blog-single-meta,
	.sh-comment-list li.depth-1,
	.sh-comment-list,
	.sh-portfolio-single-title,
	.sh-portfolio-single-info-item,
	.woocommerce .woocomerce-styling .product .product_title,
	.woocommerce .product .woo-seperator-line,
	body.woocommerce div.product .woocommerce-tabs ul.tabs::before,
	.post-meta-two,
	.woocommerce ul.products li.product .sh-woo-post-content-container a:first-child,
	.woocommerce-MyAccount-navigation ul li,
	blockquote {
		border-color: <?php echo esc_attr( $content_border ); ?>;
	}

	.woocommerce .woocommerce-tabs li,
	table, table td, table th {
		border-color: <?php echo esc_attr( $content_border ); ?>!important;
	}
<?php endif; ?>

<?php if( ( $content_button_background && $content_button_background != '#f2f2f2' ) || ( $content_button_text_color && $content_button_text_color != '#9a9a9a' ) ) : ?>
	.sh-page-switcher-button,
	.sh-social-share-button,
	#sidebar .widget_product_categories li .count,
	#sidebar .widget_categories li .count,
	.sh-increase-numbers span {
		<?php if( $content_button_background != '#f2f2f2' ) : ?>
			background-color: <?php echo esc_attr( $content_button_background ); ?>;
		<?php endif; ?>
		<?php if( $content_button_text_color != '#9a9a9a' ) : ?>
			color: <?php echo esc_attr( $content_button_text_color ); ?>;
		<?php endif; ?>
	}

	<?php if( $content_button_background != '#f2f2f2' ) : ?>
	.sh-page-switcher-button i {
		color: <?php echo esc_attr( $content_button_text_color ); ?>;
	}
	<?php endif; ?>

	.widget_price_filter .price_slider_wrapper .price_slider_amount .button,
	.sh-blog-style2 .sh-blog-tag-item:not(:hover) {
		<?php if( $content_button_background != '#f2f2f2' ) : ?>
			background-color: <?php echo esc_attr( $content_button_background ); ?>!important;
		<?php endif; ?>
		<?php if( $content_button_text_color != '#9a9a9a' ) : ?>
			color: <?php echo esc_attr( $content_button_text_color ); ?>!important;
		<?php endif; ?>
	}
<?php endif; ?>

<?php if( $content_button_background_hover && $content_button_background_hover != '#e5e5e5' ) : ?>
	.sh-social-share-button:hover,
	.sh-social-share-button:before,
	.sh-page-switcher-button:not(.sh-page-switcher-disabled):hover,
	.widget_price_filter .price_slider_wrapper .price_slider_amount .button:hover,
	.woocommerce div.product form.cart div.quantity span:hover {
		background-color: <?php echo esc_attr( $content_button_background_hover ); ?>!important;
	}
<?php endif; ?>

<?php if( ( $content_input_background_color && $content_input_background_color != '#ffffff' ) ||
		  ( $content_input_border_color && $content_input_border_color != '#e3e3e3' ) ||
		  ( $content_input_text_color && $content_input_text_color != '#8d8d8d' ) ) : ?>

	#content > .woocommerce input:not(.submit),
	#content > .woocommerce textarea,
	.comment-form input:not(.submit),
	.comment-form textarea,
	.comment-form select,
	.woocommerce .select2-choice,
	.SumoSelect .SelectBox,
	.SumoSelect.open .search-txt,
	.SumoSelect.open > .optWrapper {
		<?php if( $content_input_background_color != '#ffffff' ) : ?>
			background-color: <?php echo esc_attr( $content_input_background_color ); ?>!important;
		<?php endif; ?>
		<?php if( $content_input_border_color != '#e3e3e3' ) : ?>
			border-color: <?php echo esc_attr( $content_input_border_color ); ?>!important;
		<?php endif; ?>
		<?php if( $content_input_text_color != '#8d8d8d' ) : ?>
			color: <?php echo esc_attr( $content_input_text_color ); ?>!important;
		<?php endif; ?>
	}

	#sidebar .search-field {
		background-color: <?php echo esc_attr( $content_input_background_color ); ?>;
		color: <?php echo esc_attr( $content_input_text_color ); ?>;
	}

	.SumoSelect>.optWrapper>.options li.opt {
		border-color: <?php echo esc_attr( $content_input_border_color ); ?>;
	}

<?php endif; ?>

<?php if( $content_search_background_color && $content_search_background_color != '#f0f0f0' ) : ?>
	.sh-blog-style2 #sidebar .widget_search .search-submit {
		background-color: <?php echo esc_attr( $content_search_background_color ); ?>;
	}
<?php endif; ?>

<?php if( $content_search_text_color && $content_search_text_color != '#505050' ) : ?>
	.sh-blog-style2 #sidebar .widget_search .search-submit i {
		color: <?php echo esc_attr( $content_search_text_color ); ?>!important;
	}
<?php endif; ?>



<?php
/*-----------------------------------------------------------------------------------*/
/* Header
/*-----------------------------------------------------------------------------------*/
?>

	<?php if( $header_background_color ) : ?>
		.sh-header,
		.sh-header-top,
		.sh-header-mobile,
		.sh-header-left-side {
			background-color: <?php echo esc_attr( $header_background_color ); ?>;
		}
	<?php endif; ?>

	<?php if( $topbar_background_color ) : ?>
		.primary-desktop .sh-header-top:not(.sh-header-top-10) {
			background-color: <?php echo esc_attr( $topbar_background_color ); ?>!important;
		}
	<?php endif; ?>

	<?php if( $topbar_color ) : ?>
		.primary-desktop .header-contacts-details,
		.primary-desktop .header-social-media a,
		.primary-desktop:not(.primary-desktop-light) .header-contacts-details-large-content {
			color: <?php echo esc_attr( $topbar_color ); ?>;
		}
	<?php endif; ?>

	<?php if( $header_light_text_color ) : ?>
		.primary-mobile-light #header-logo-title,
		.primary-desktop-light .sh-header-top-4 #header-logo-title,
		.primary-desktop-light .sh-header:not(.sh-sticky-header-active) #header-logo-title,
		.primary-desktop-light .sh-header:not(.sh-sticky-header-active):not(.sh-header-10) .sh-nav > li > a,
		.primary-desktop-light .sh-header:not(.sh-sticky-header-active):not(.sh-header-10) .sh-nav > li.menu-item > a > i {
			color: <?php echo esc_attr( $header_light_text_color ); ?>!important;
		 }
	<?php endif; ?>

	<?php if( $header_light_text_active_color ) : ?>
		.primary-desktop-light .sh-header:not(.sh-sticky-header-active):not(.sh-header-10) .sh-nav > li.current_page_item > a,
		.primary-desktop-light .sh-header:not(.sh-sticky-header-active):not(.sh-header-10) .sh-nav > li:not(.current_page_item):hover > a,
		.primary-desktop-light .sh-header:not(.sh-sticky-header-active):not(.sh-header-10) .sh-nav .icon-basket {
			color: <?php echo esc_attr( $header_light_text_active_color ); ?>!important;
		}
	<?php endif; ?>


	<?php if( $header_background_image ) : ?>
		.sh-header,
		.sh-header-mobile-navigation,
		.sh-header-left-side {
			background-image: url(<?php echo esc_url( $header_background_image ); ?>);
			background-size: cover;
			background-position: 50% 50%;
		}
	<?php endif; ?>

	<?php if( $header_uppercase == true ) : ?>
		.sh-header .sh-nav > li.menu-item > a,
		.sh-header-left-side .sh-nav > li.menu-item > a,
		.sh-nav-mobile li a {
			text-transform: uppercase;
		}
	<?php endif; ?>

	<?php if( $header_text_color ) : ?>
		.sh-header-left-1 .header-bottom,
		.sh-header-left-1 .header-social-media i,
		.sh-header-left-1 .sh-side-button-search i,
		.sh-header-left-1 .sh-side-button-cart .sh-nav-cart i,
		.sh-header-left-side .header-bottom,
		.sh-header-left-2 .header-social-media i {
			color: <?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>

	<?php if( $header_nav_color ) : ?>
		.sh-header-search-close i,
		.sh-header .sh-nav > li.menu-item > a,
		.sh-header #header-logo-title,
		.sh-header .sh-nav > li.menu-item > a > i,
		.sh-header-mobile-navigation li.menu-item > a > i,
		.sh-header-left-side li.menu-item > a,
		.sh-header-left-2 .sh-side-button-search, .sh-header-left-2 .sh-side-button-cart,
		.sh-header-left-2 .sh-side-button-cart .sh-nav-cart i,
		.sh-header-left-2 .sh-nav li.menu-item > a.fa:before {
			color: <?php echo esc_attr( $header_nav_color ); ?>;
		}

		.sh-header .c-hamburger span,
		.sh-header .c-hamburger span:before,
		.sh-header .c-hamburger span:after,
		.sh-header-mobile-navigation .c-hamburger span,
		.sh-header-mobile-navigation .c-hamburger span:before,
		.sh-header-mobile-navigation .c-hamburger span:after {
			background-color: <?php echo esc_attr( $header_nav_color ); ?>;
		}

		.sh-header .sh-nav-custom-icon-image svg,
		.sh-header-mobile-navigation .sh-nav-custom-icon-image svg {
			fill: <?php echo esc_attr( $header_nav_color ); ?>;
		}

		.sh-header .sh-nav-login #header-login > span {
			border-color: <?php echo esc_attr( $header_nav_color ); ?>;
		}
	<?php endif; ?>


	<?php if( $header_nav_font ) : ?>
		<?php if( $header_nav_font == 'additional1' || $header_nav_font == 'additional2' || $header_nav_font == 'heading' ) : ?>
			.sh-nav > li.menu-item > a {

				<?php if( $header_nav_font == 'additional1' ) : ?>
					font-family: '<?php echo jevelin_option_value('additional_font1','family'); ?>'!important;
				<?php elseif($header_nav_font == 'additional2' ) : ?>
					font-family: '<?php echo jevelin_option_value('additional_font2','family'); ?>'!important;
				<?php elseif( $header_nav_font == 'heading' ) : ?>
					font-family: '<?php echo jevelin_option_value('styling_headings','family'); ?>'!important;
				<?php endif; ?>

			}
		<?php endif; ?>
	<?php endif; ?>


	<?php if( $header_nav_size ) : ?>
		.sh-nav > li.menu-item > a,
		.sh-nav-mobile li a {
			font-size: <?php echo esc_attr( jevelin_addpx($header_nav_size) ); ?>;
		}
	<?php endif; ?>


	<?php if( $header_nav_hover_color ) : ?>
		.sh-header .sh-nav > li.menu-item:hover:not(.sh-nav-social) > a,
		.sh-header .sh-nav > li.menu-item:hover:not(.sh-nav-social) > a > i,
		.sh-header .sh-nav > li.sh-nav-social > a:hover > i,
		.sh-header-mobile-navigation li > a:hover > i,
		.sh-header-left-side li.menu-item > a:hover {
			color: <?php echo esc_attr( $header_nav_hover_color ); ?>;
		}
	<?php endif; ?>

	<?php if( $header_nav_active_background_color ) : ?>
		.sh-header .sh-nav > .current_page_item,
		.sh-header-left-2 .sh-nav > li.current-menu-item {
			background-color: <?php echo esc_attr( $header_nav_active_background_color ); ?>!important;
		}
	<?php endif; ?>

	<?php if( $header_height ) : ?>
		.header-logo img {
			height: <?php echo esc_attr( jevelin_logo_height() ); ?>;
			max-height: 250px;
		}

		.sh-header-mobile-navigation .header-logo img {
			height: <?php echo esc_attr( jevelin_logo_height( 'responsive' ) ); ?>;
			max-height: 250px;
			max-width: 100%;
		}

		.sh-sticky-header-active .header-logo img {
			height: <?php echo esc_attr( jevelin_logo_height( 'sticky' ) ); ?>;
		}

		.sh-header-6 .sh-nav > .menu-item:not(.sh-nav-social),
		.sh-header-6 .sh-nav > .sh-nav-social a {
			height: <?php echo esc_attr( $header_height ); ?>px;
			width: <?php echo esc_attr( $header_height ); ?>px;
		}

		.sh-header-5 .sh-nav > .menu-item {
			height: <?php echo esc_attr( $header_height ); ?>px!important;
			max-height: <?php echo esc_attr( $header_height ); ?>px!important;
		}

		.sh-header-5 .sh-nav > .menu-item > a,
		.sh-header-6 .sh-nav > .menu-item > a {
			line-height: <?php echo esc_attr( $header_height ); ?>px!important;
			max-height: <?php echo esc_attr( $header_height ); ?>px!important;
			height: <?php echo esc_attr( $header_height ); ?>px!important;
		}

		.sh-header-5 .sh-nav > .current_page_item {
			margin-top: <?php echo (( esc_attr( $header_height ) -40)/2); ?>px!important;
			margin-bottom: <?php echo (( esc_attr( $header_height ) -40)/2); ?>px!important;
		}
	<?php endif; ?>

	<?php if( $header_border_color ) : ?>
		.sh-header,
		.sh-header-top-3,
		.sh-header-top-4,
		.sh-header-left-side .sh-header-search .line-test,
		.sh-header-left-2 .sh-nav > li > a,
		.sh-header-mobile-navigation {
			border-bottom: 1px solid <?php echo esc_attr( $header_border_color ); ?>;
		}

		.sh-header-top-3 .header-contacts-item span,
		.sh-header-top-3 .header-social-media a,
		.sh-header-5 .sh-nav-login,
		.sh-header-5 .sh-nav-cart,
		.sh-header-5 .sh-nav-search,
		.sh-header-5 .sh-nav-social,
		.sh-header-5 .sh-nav-social a:not(:first-child),
		.sh-header-6 .sh-nav > .menu-item:not(.sh-nav-social),
		.sh-header-6 .sh-nav > .sh-nav-social a,
		.sh-header-6 .header-logo,
		.sh-header-left-1 .header-social-media a {
			border-left: 1px solid <?php echo esc_attr( $header_border_color ); ?>;
		}

		.sh-header-top-3 .container,
		.sh-header-5 .sh-nav > .menu-item:last-child,
		.sh-header-6 .sh-nav > .menu-item:last-child,
		.sh-header-6 .header-logo,
		.sh-header-left-side,
		.sh-header-left-1 .sh-side-button-search,
		.sh-header-left-2 .sh-side-button-search {
			border-right: 1px solid <?php echo esc_attr( $header_border_color ); ?>;
		}

		.sh-header-left-1 .header-social-media,
		.sh-header-left-1 .sh-side-buttons .sh-table-cell,
		.sh-header-left-2 .sh-side-buttons .sh-table-cell {
			border-top: 1px solid <?php echo esc_attr( $header_border_color ); ?>;
		}

		.sh-header-left-2 .sh-side-buttons .sh-table-cell {
			border-bottom: 1px solid <?php echo esc_attr( $header_border_color ); ?>;
		}
	<?php endif; ?>

	<?php if( $header_width == 'full' ) : ?>
		.sh-header:not(.sh-header-6) .container,
		.sh-header-top:not(.sh-header-top-6) .container {
			width: 90%!important;
			max-width: 90%!important;
		}

		.sh-header-6 .container,
		.sh-header-top-6 .container {
			width: 100%!important;
			max-width: 100%!important;
		}
	<?php endif; ?>


<?php
/*-----------------------------------------------------------------------------------*/
/* Menu
/*-----------------------------------------------------------------------------------*/
?>

 	<?php if( $menu_background_color ) : ?>
		.sh-header-right-side,
		.header-mobile-social-media a,
		.sh-header .sh-nav > li.menu-item ul,
		.sh-header-left-side .sh-nav > li.menu-item ul,
		.sh-header-mobile-dropdown {
			background-color: <?php echo esc_attr( $menu_background_color ); ?>!important;
		}
	<?php endif; ?>

 	<?php if( $menu_link_border_color ) : ?>
		.sh-nav-mobile li:after,
		.sh-nav-mobile ul:before {
			background-color: <?php echo esc_attr( $menu_link_border_color ); ?>!important;
		}
	<?php endif; ?>

 	<?php if( $menu_link_color ) : ?>
		.header-mobile-social-media a i,
		.sh-nav-mobile li a,
		.sh-header .sh-nav > li.menu-item ul a,
		.sh-header-left-side .sh-nav > li.menu-item ul a,
		.header-mobile-search .header-mobile-form .header-mobile-form-input,
		.header-mobile-search .header-mobile-form-submit {
			color: <?php echo esc_attr( $menu_link_color ); ?>!important;
		}
	<?php endif; ?>

	.sh-nav-mobile .current_page_item > a,
	.sh-nav-mobile > li a:hover,
	.sh-header .sh-nav ul,
	.sh-header:not(.sh-header-megamenu-style2) .sh-nav > li.menu-item:not(.menu-item-cart) ul a:hover,
	.sh-header .sh-nav ul.mega-menu-row li.mega-menu-col > a,
	.sh-header .woocommerce a.remove:hover:before,
	.sh-header-left-side .sh-nav ul,
	.sh-header-left-side .sh-nav > li.menu-item:not(.menu-item-cart) ul a:hover,
	.sh-header-left-side .sh-nav ul.mega-menu-row li.mega-menu-col > a,
	.sh-header-left-side .woocommerce a.remove:hover:before {
		color: <?php echo esc_attr( $menu_link_hover_color ); ?>!important;
	}

	<?php if( $menu_title_color ) : ?>
		.sh-nav .sh-nav-cart li.mini_cart_item a:nth-child(2),
		.sh-header .sh-nav ul.mega-menu-row li.mega-menu-col > a {
			color: <?php echo esc_attr( $menu_title_color ); ?>!important;
		}
	<?php endif; ?>

	<?php if( $menu_active_background1 ) : ?>
		.sh-header-megamenu-style2 .sh-nav > li.menu-item:not(.menu-item-has-mega-menu):not(.sh-nav-cart) li.current-menu-item > a,
		.sh-header-megamenu-style2 .sh-nav > li.menu-item:not(.menu-item-has-mega-menu):not(.sh-nav-cart) ul li:hover > a,
		.sh-header-megamenu-style2 li.mega-menu-col ul li.current-menu-item a,
		.sh-header-megamenu-style2 li.mega-menu-col ul li.menu-item:not(.current-menu-item):hover a {
 			background-color: <?php echo esc_attr( $menu_active_background1 ); ?>;
			<?php if( $menu_active_background2 ) : ?>
				background-image: linear-gradient( to right, <?php echo esc_attr( $menu_active_background1 ); ?>, <?php echo esc_attr( $menu_active_background2 ); ?> );
			<?php endif; ?>
		}
	<?php endif; ?>

	.header-mobile-social-media,
	.header-mobile-social-media a,
	.sh-nav > li.menu-item:not(.menu-item-cart) ul a:hover {
		border-color: <?php echo esc_attr( $menu_link_border_color ); ?>!important;
	}

	.sh-nav > li.menu-item:not(.menu-item-cart) ul a:hover,
	.sh-nav-cart .menu-item-cart .total {
		border-bottom: 1px solid <?php echo esc_attr( $menu_link_border_color ); ?>!important;
	}

	.sh-nav-cart .menu-item-cart .total {
		border-top: 1px solid <?php echo esc_attr( $menu_link_border_color ); ?>!important;
	}

	.sh-nav .mega-menu-row > li.menu-item,
	.sh-nav-cart .menu-item-cart .widget_shopping_cart_content p.buttons a:first-child {
		border-right: 1px solid <?php echo esc_attr( $menu_link_border_color ); ?>!important;
	}


<?php
/*-----------------------------------------------------------------------------------*/
/* Sidebar
/*-----------------------------------------------------------------------------------*/
?>

	#sidebar .widget-item .widget-title {
		<?php echo wp_kses_post( $sidebar_headings ); ?>
	}

	<?php if( $sidebar_border_color ) : ?>
		#sidebar .widget-item li,
		#sidebar .widget-item .sh-recent-posts-widgets-item {
			border-color: <?php echo esc_attr( $sidebar_border_color ); ?>!important;
		}
	<?php endif; ?>

	<?php if( $sidebar_font_weight > 0 ) : ?>
		#sidebar .widget-item .widget-title {
			font-weight: <?php echo esc_attr( $sidebar_font_weight ); ?>;
		}
	<?php endif; ?>

<?php
/*-----------------------------------------------------------------------------------*/
/* Footer
/*-----------------------------------------------------------------------------------*/
?>

	<?php if( $footer_width == 'full' ) : ?>
		@media (min-width: 1000px) {
			.sh-footer .container {
				width: 90%!important;
				max-width: 90%!important;
			}
		}
	<?php endif; ?>

	.sh-footer {
		<?php if( $footer_background_image ) : ?>
			background-image: url(<?php echo esc_url ($footer_background_image ); ?>);
		<?php endif; ?>
		background-size: cover;
		background-position: 50% 50%;
	}

	.sh-footer .sh-footer-widgets {
		background-color: <?php echo esc_attr( $footer_background_color ); ?>;
		color: <?php echo esc_attr( $footer_text_color ); ?>;
	}

	.sh-footer .sh-footer-widgets .sh-recent-posts-widgets-item-meta a {
		color: <?php echo esc_attr( $footer_text_color ); ?>;
	}

	.sh-footer .sh-footer-widgets i:not(.icon-link),
	.sh-footer .sh-footer-widgets .widget_recent_entries li:before {
		color: <?php echo esc_attr( $footer_icon_color ); ?>!important;
	}

	.sh-footer .sh-footer-widgets h3 {
		<?php echo wp_kses_post( $footer_headings ); ?>
	}

	.sh-footer .sh-footer-widgets ul li,
	.sh-footer .sh-footer-widgets ul li,
	.sh-footer .sh-recent-posts-widgets .sh-recent-posts-widgets-item {
		border-color: <?php echo esc_attr( $footer_border_color ); ?>;
	}

	.sh-footer .sh-footer-widgets a,
	.sh-footer .sh-footer-widgets li a,
	.sh-footer .sh-footer-widgets h6 {
		color: <?php echo esc_attr( $footer_link_color ); ?>;
	}

	.sh-footer .sh-footer-widgets .product-title,
	.sh-footer .sh-footer-widgets .woocommerce-Price-amount {
		color: <?php echo esc_attr( $footer_link_color ); ?>!important;
	}

	.sh-footer-columns > .widget-item {
		<?php if( $footer_columns == 1 ) : ?>
			width: 100%!important;
		<?php elseif( $footer_columns == 2 ) : ?>
			width: 50%!important;
		<?php elseif( $footer_columns == 4 ) : ?>
			width: 25%!important;
		<?php elseif( $footer_columns == 5 ) : ?>
			width: 20%!important;
		<?php endif; ?>
	}

	.sh-footer .sh-copyrights {
		background-color: <?php echo esc_attr( $copyright_background_color ); ?>;
		color: <?php echo esc_attr( $copyright_text_color ); ?>;
		<?php if( $footer_padding ) : ?>
			padding: <?php echo esc_attr( $footer_padding ); ?>
		<?php endif; ?>
	}

	.sh-footer .sh-copyrights a {
		color: <?php echo esc_attr( $copyright_link_color ); ?>;
	}

	.sh-footer .sh-copyrights a:hover {
		color: <?php echo esc_attr( $copyright_hover_color ); ?>!important;
	}

	.sh-footer .sh-copyrights-social a {
		border-left: 1px solid <?php echo esc_attr( $copyright_border_color ); ?>;
	}

	.sh-footer .sh-copyrights-social a:last-child {
		border-right: 1px solid <?php echo esc_attr( $copyright_border_color ); ?>;
	}

	@media (max-width: 850px) {
		.sh-footer .sh-copyrights-social a {
			border: 1px solid <?php echo esc_attr( $copyright_border_color ); ?>;
		}
	}


<?php
/*-----------------------------------------------------------------------------------*/
/* WooCommerce
/*-----------------------------------------------------------------------------------*/
?>

	.woocommerce .woocomerce-styling ul.products li {
		<?php if( $wc_columns == 3 ) : ?>
			width: 33.3%;
		<?php elseif( $wc_columns == 2 ) : ?>
			width: 50%;
		<?php else : ?>;
			width: 25%;
		<?php endif; ?>
	}


	<?php if( $popover_font == 'additional1' || $popover_font == 'additional2' || $popover_font == 'body' ) : ?>
		.sh-popover-mini {

			<?php if( $popover_font == 'additional1' ) : ?>
				font-family: '<?php echo esc_attr( jevelin_option_value('additional_font1','family') ); ?>'!important;
			<?php elseif( $popover_font == 'additional2' ) : ?>
				font-family: '<?php echo esc_attr( jevelin_option_value('additional_font2','family') ); ?>'!important;
			<?php elseif( $popover_font == 'body' ) : ?>
				font-family: '<?php echo esc_attr( jevelin_option_value('styling_body','family') ); ?>'!important;
			<?php endif; ?>

		}
	<?php endif; ?>


	<?php if( $popover_wc == 'off' ) : ?>
		li.product .sh-popover-mini {
			display: none;
		}
	<?php endif; ?>

	<?php if( $wc_related == false ) : ?>
		div.product section.related.products {
			display: none;
		}
	<?php endif; ?>

<?php
/*-----------------------------------------------------------------------------------*/
/* Post Overlay
/*-----------------------------------------------------------------------------------*/
?>

	<?php if( $post_overlay == 'style2' ) : ?>
		.post-container .sh-overlay-style1 .sh-overlay-item:first-child {
			width: 100%;
			cursor: pointer;
		}

		.post-container .sh-overlay-style1 .sh-overlay-item:first-child .sh-overlay-item-container {
			left: 50%;
			right: auto;
			transform: translateX(-40px) translateY(-30px);
		}

		.post-container .sh-overlay-style1 .sh-overlay-item:last-child {
			display: none;
		}
	<?php elseif( $post_overlay == 'style3' ) : ?>
		.post-container .sh-overlay-style1 .sh-overlay-item:first-child {
			width: 100%;
			border: none;
			opacity: 0;
			cursor: pointer;
		}

		.post-container .sh-overlay-style1 .sh-overlay-item:last-child {
			display: none;
		}
	<?php endif; ?>


<?php
/*-----------------------------------------------------------------------------------*/
/* Page Layout
/*-----------------------------------------------------------------------------------*/
?>

	<?php
	if( jevelin_framework() == 'redux' ) :
		$page_layout = jevelin_option( 'page_layout' );
	else :
		$page_layout_val = jevelin_option( 'page_layout' );
		$page_layout = ( isset( $page_layout_val['page_layout'] ) ) ? esc_attr($page_layout_val['page_layout']) : 'line';
		$page_layout_atts = jevelin_get_picker( $page_layout_val );
	endif;

	if( $page_layout == 'boxed' && $header_layout != 'left-1' && $header_layout != 'left-2' ) :
		if( jevelin_framework() == 'redux' ) :
			$border_style = jevelin_option( 'boxed_border_style' );
			$background_color = jevelin_option( 'boxed_background_color' );
			$background_image  = jevelin_option( 'boxed_background_image' );
			$background_image = isset( $background_image['url'] ) ? $background_image['url'] : '';
		else :
			$border_style = $page_layout_atts['border_style'];
			$background_color = $page_layout_atts['background_color'];
			$background_image = isset( $page_layout_atts['background_image']['url'] ) ? $page_layout_atts['background_image']['url'] : '';
		endif;
	?>
		body {
			background-color: <?php echo esc_attr( $background_color ); ?>!important;
			<?php if( $background_image ) : ?>
				background-image: url( <?php echo esc_url( $background_image ); ?> );
				background-repeat: no-repeat;
				background-size: cover;
			<?php endif; ?>
		}

		#page-container {
			position: relative;
			max-width: 1200px!important;
			margin: 0 auto;
			background-color: <?php echo esc_attr( $body_background ); ?>;

			<?php if( $border_style == 'shadow' ) : ?>
				box-shadow: 0px 6px 30px rgba(0,0,0,0.1);
			<?php elseif( $border_style == 'line' ) : ?>
				border-left: 1px solid rgba(0,0,0,0.07);
				border-right: 1px solid rgba(0,0,0,0.07);
				border-bottom: 1px solid rgba(0,0,0,0.07);
			<?php endif; ?>
		}

		#page-container .container {
			width: 100%!important;
			min-width: 100%!important;
			max-width: 100%!important;
			padding-left: 45px!important;
			padding-right: 45px!important;
		}

		.sh-sticky-header-active {
			max-width: 1200px!important;
			margin: 0 auto;
		}
	<?php endif; ?>


<?php
/*-----------------------------------------------------------------------------------*/
/* Titlebar
/*-----------------------------------------------------------------------------------*/
?>

	<?php if( $topbar_status == false ) : ?>
		.sh-header-top {
			display: none!important;
		}
	<?php endif; ?>

	<?php if( jevelin_option_image( 'titlebar-background' ) ) : ?>
		.sh-titlebar {
			background-image: url(<?php echo esc_url( jevelin_option_image( 'titlebar-background' ) ); ?>);
		}
	<?php endif; ?>

	<?php if( jevelin_option( 'titlebar-background-color' ) ) : ?>
		.sh-titlebar {
			background-color: <?php echo esc_attr( jevelin_option( 'titlebar-background-color') ); ?>;
		}
	<?php endif; ?>

	<?php if( jevelin_option( 'titlebar-title-color' ) ) : ?>
		.sh-titlebar .titlebar-title h1,
		.sh-titlebar .titlebar-title h2 {
			color: <?php echo esc_attr( jevelin_option( 'titlebar-title-color') ); ?>;
		}
	<?php endif; ?>

	<?php if( jevelin_option( 'titlebar-breadcrumbs-color' ) ) : ?>
		.sh-titlebar .title-level a,
		.sh-titlebar .title-level span {
			color: <?php echo esc_attr( jevelin_option( 'titlebar-breadcrumbs-color') ); ?>!important;
		}
	<?php endif; ?>




<?php
/*-----------------------------------------------------------------------------------*/
/* Portfilio
/*-----------------------------------------------------------------------------------*/
?>

	<?php if( $portfolio_padding == true ) : ?>
		body.single-fw-portfolio #wrapper > .sh-page-layout-default {
			padding: <?php echo esc_attr( $portfolio_padding ); ?>
		}
	<?php endif; ?>




<?php
/*-----------------------------------------------------------------------------------*/
/* Crispy Images
/*-----------------------------------------------------------------------------------*/
?>

	<?php if( $crispy_images == true ) : ?>
		img,
		.sh-column,
		.sh-section {
			-webkit-backface-visibility: hidden;
		}
	<?php endif; ?>


<?php
/*-----------------------------------------------------------------------------------*/
/* Back to top button - rounded
/*-----------------------------------------------------------------------------------*/
?>

	<?php if( $back_to_top_rounded == true ) : ?>
		.sh-back-to-top {
			border-radius: 100px;
		}
	<?php endif; ?>


<?php
/*-----------------------------------------------------------------------------------*/
/* Carousel
/*-----------------------------------------------------------------------------------*/
?>

<?php if( $carousel_dots_background_color || $carousel_dots_border_color ) : ?>
	#page-container .slick-dots li button {
		<?php if( $carousel_dots_background_color ) : ?>
		background-color: <?php echo esc_attr( $carousel_dots_background_color ); ?>!important;
	<?php endif; ?>
	<?php if( $carousel_dots_border_color ) : ?>
		border-color:  <?php echo esc_attr( $carousel_dots_border_color ); ?>;
	<?php endif; ?>
	}
<?php endif; ?>

<?php if( $carousel_dots_active_background_color || $carousel_dots_active_border_color ) : ?>
	#page-container .slick-dots li.slick-active button {
		<?php if( $carousel_dots_active_background_color ) : ?>
			background-color: <?php echo esc_attr( $carousel_dots_active_background_color ); ?>!important;
		<?php endif; ?>
		<?php if( $carousel_dots_active_border_color ) : ?>
			border-color: <?php echo esc_attr( $carousel_dots_active_border_color ); ?>;
		<?php endif; ?>
	}
<?php endif; ?>

<?php
/*-----------------------------------------------------------------------------------*/
/* 404 Page
/*-----------------------------------------------------------------------------------*/
?>

	.sh-404 {
		background-image: url(<?php echo esc_url( jevelin_option_image('404_image') ); ?>);
		background-color: <?php echo esc_attr( jevelin_option('404_background') ); ?>;
	}


<?php
/*-----------------------------------------------------------------------------------*/
/* Page Loader
/*-----------------------------------------------------------------------------------*/
$page_loader = 0;
if( jevelin_option('page_loader', 'off') != 'off' ) :
	if( jevelin_option('page_loader') == 'on2' ) :

		if (strpos(wp_get_referer(), esc_url( home_url('/') ) ) !== false) :
			$page_loader = 0;
		else :
			$page_loader = 1;
		endif;

	else :

		$page_loader = 1;

	endif;
endif;
?>

	<?php if( $page_loader == 1 ) : ?>
		body {
			overflow: hidden;
		}

		.sh-page-loader {
			background-color: <?php echo esc_attr( jevelin_option('page_loader_background_color') ); ?>;
		}

		.sk-cube-grid .sk-cube,
		.sk-folding-cube .sk-cube:before,
		.sk-spinner > div,
		.sh-page-loader-style-spinner .object {
			background-color: <?php echo ( jevelin_option('page_loader_accent_color') ) ? esc_attr(jevelin_option('page_loader_accent_color')) : esc_attr(jevelin_option('accent_color')); ?>!important;
		}
	<?php endif; ?>

<?php
/*-----------------------------------------------------------------------------------*/
/* Page - White Borders
/*-----------------------------------------------------------------------------------*/
?>

	<?php if( $white_borders == true ) : ?>
		<?php if( $white_borders_only_on_pages == false || is_page() ) : ?>
			@media (min-width: 600px) {
				body.admin-bar.page-white-borders .sh-window-line.line-top,
				body.admin-bar.page-white-borders .sh-window-line.line-left,
				body.admin-bar.page-white-borders .sh-window-line.line-right {
					top: 56px;
				}
			}

			@media (min-width: 782px) {
				body.admin-bar.page-white-borders .sh-window-line.line-top,
				body.admin-bar.page-white-borders .sh-window-line.line-left,
				body.admin-bar.page-white-borders .sh-window-line.line-right {
					top: 56px;
				}
			}

			@media (min-width: 1023px) {
				body.admin-bar.page-white-borders .sh-window-line.line-top,
				body.admin-bar.page-white-borders .sh-window-line.line-left,
				body.admin-bar.page-white-borders .sh-window-line.line-right {
					top: 32px;
				}
			}

			body.page-white-borders #page-container {
				padding-top: 20px;
			}

			body.admin-bar.page-white-borders #page-container {
				padding-top: 52px!important;
			}

			body.page-white-borders.page-layout-right-fixed .sh-window-line.line-top {
				top: 0!important;
			}

			body.page-white-borders .sh-sticky-header-active {
				top: 20px!important;
				left: 20px!important;
				right: 20px!important;
				width: auto!important;
			}

			body.admin-bar.page-white-borders .sh-sticky-header-active {
				top: 52px!important;
			}
		<?php endif; ?>
	<?php endif; ?>

<?php else : ?>

	.post-title h2:hover {
		color: #47c9e5;
	}

	.blog-single .post-title h1:hover,
	.blog-single .post-title h2:hover,
	.post-meta-author a:hover,
	.post-meta-categories a:hover,
	.post-meta-categories span:hover,
	.post-password-form label,
	.sh-page-links p {
		color: #3f3f3f!important;
	}

	.sh-tabs-filter li a,
	.woocommerce .woocommerce-tabs li:not(.active) a,
	.woocommerce .product .posted_in a,
	.woocommerce .product .tagged_as a,
	.woocommerce .product .woocommerce-review-link,
	.woocommerce-checkout #payment div.payment_box,
	.sh-default-color a,
	.sh-default-color,
	.post-meta-two a,
	#sidebar a,
	.logged-in-as a ,
	.post-meta-author a,
	.sh-social-share-networks .jssocials-share i {
		color: #8d8d8d!important;
	}

	.sh-popover-mini,
	.woocommerce span.onsale,
	.sh-sidebar-search-active .search-field,
	.post-password-form input[type="submit"] {
		background-color: #47c9e5;
	}

	.post-password-form input[type="submit"]:hover {
		background-color: #21bee2;
	}

	.sh-sidebar-search-active .search-field,
	.sh-sidebar-search-active .search-submit i {
		color: #fff;
	}

	.sh-popover-mini:before,
	.woocommerce span.onsale:before,
	.sh-sidebar-search-active .search-field {
		border-color: #47c9e5!important;
	}

	.woocommerce .product .price .amount {
		color: #505050;
	}

	.woocommerce .woocomerce-styling ul.products li {
		width: 25%;
	}

	.sh-back-to-top {
		border-radius: 100px;
	}

	/* Elements CSS */

<?php endif;
ob_end_flush();
?>
