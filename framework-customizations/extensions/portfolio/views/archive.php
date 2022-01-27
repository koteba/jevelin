<?php
/**
 * Portfolio Archive posts redirect
 */
wp_reset_postdata();
$portfolio1 = get_page_by_path( 'portfolio' );
$portfolio2 = get_page_by_path( 'portfolio-page' );
$custom_portfolio_page = jevelin_option( 'portfolio_main_page' );

if( $custom_portfolio_page > 0 && is_string( get_post_status( $custom_portfolio_page ) ) ) :
	wp_redirect( get_the_permalink( $custom_portfolio_page ) );
else :
	if( get_the_ID() != $portfolio1->ID && get_the_ID() != $portfolio1->ID ) :
		if( isset( $portfolio1->ID ) && $portfolio1->ID > 0 ) :
			wp_redirect( get_the_permalink( $portfolio1->ID ) );
		elseif( isset( $portfolio2->ID ) && $portfolio2->ID > 0 ) :
			wp_redirect( get_the_permalink( $portfolio2->ID ) );
		else :
			wp_redirect( home_url( '/' ) );
		endif;
	else :
		wp_redirect( home_url( '/' ) );
	endif;
endif;
exit;
