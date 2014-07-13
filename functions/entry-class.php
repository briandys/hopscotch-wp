<?php

//------------------------- Entry Classes
function hopscotch_add_entry_class( $classes ) {
	global $post;
    // Defaults
    $classes[] = 'entry';    
    
    // Slug
    $classes[] = 'hopscotch-' . $post->post_name;
    
    // Info Card vCard
    if ( is_page_template( 'templates/info-card.php' ) ) $classes[] = 'vcard org';
	return $classes;
}
add_filter('post_class', "hopscotch_add_entry_class");