<?php

//------------------------- Show Home Link by Default
function hopscotch_home_nav( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'hopscotch_home_nav' );