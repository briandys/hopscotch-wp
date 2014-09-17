<?php

//------------------------- .entry Classes
function hopscotch_add_entry_class( $classes ) {
	global $post;
    
    // Slug
    $classes[] = 'hopscotch-' . $post->post_name;
    
    // Info Card vCard
    if ( is_page_template( 'template-info-card.php' ) ) $classes[] = 'vcard org';
    
    // Empty Content
    if( $post->post_content == "" ) $classes[] = 'entry-empty data-entry-content-state--empty';
    
    if ( has_post_thumbnail() || get_post_meta( get_the_ID(), 'entry-thumbnail', true ) ) :
        $classes[] = "entry-thumbnail-active entry-thumbnail--active";
    else :
        $classes[] = "entry-thumbnail-inactive entry-thumbnail--inactive";
    endif;
    
	return $classes;
}
add_filter('post_class', 'hopscotch_add_entry_class');


//------------------------- .entry-ct Classes
function hopscotch_add_entry_content_class() {
    
    // Default
    echo 'entry-ct ';
    
    // Search (show only the excerpt)
    if ( is_search() ) {
        echo 'entry-summary ';
    }
}
add_action('hopscotch_hook_entry_content_class', 'hopscotch_add_entry_content_class');