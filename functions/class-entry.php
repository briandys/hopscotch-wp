<?php

//------------------------- Entry Classes
function hopscotch_add_entry_class( $classes ) {
	global $post;
    // Defaults
    $classes[] = 'entry';    
    
    // Slug
    $classes[] = 'hopscotch-' . $post->post_name;
    
    // Info Card vCard
    if ( is_page_template( 'template-info-card.php' ) ) $classes[] = 'vcard org';
    
    // Empty Content
    if( $post->post_content == "" ) $classes[] = 'entry-empty';
    
    if ( has_post_thumbnail() || get_post_meta( get_the_ID(), 'entry-thumbnail', true ) ) :
        $classes[] = "entry-thumbnail-active";
    else :
        $classes[] = "entry-thumbnail-inactive";
    endif;
    
	return $classes;
}
add_filter('post_class', "hopscotch_add_entry_class");