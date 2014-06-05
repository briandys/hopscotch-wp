<?php

//------------------------- Page Title
function hopscotch_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'hopscotch' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'hopscotch_wp_title', 10, 2 );