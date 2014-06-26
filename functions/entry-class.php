<?php

//------------------------- Entry Classes
function hopscotch_add_entry_class($classes) {
	global $post;
    // Defaults
    $classes[] = 'entry';    
    
    // Slug
    $classes[] = 'hopscotch-' . $post->post_name;
    
    // Info Card vCard
    if ( is_page_template( 'templates/info-card.php' ) ) $classes[] = 'vcard';
	return $classes;
}
add_filter('post_class', "hopscotch_add_entry_class");


//------------------------- Slug Class
function hopscotch_add_slug_class() {
    global $post;
    echo 'hopscotch-'.$post->post_name;
}
add_action('hopscotch_slug_class','hopscotch_add_slug_class');