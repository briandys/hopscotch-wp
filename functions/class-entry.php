<?php
// Entry Classes

function hopscotch_entry_add_class( $classes ) {
	global $post;
    
    // Slug
    $classes[] = 'hopscotch--' . $post->post_name;
    
    // Info Card Template
    if ( is_page_template( 'template-info-card.php' ) )
        $classes[] = 'vcard org';
    
    // Empty Content
    if( $post->post_content == "" )
        $classes[] = 'ui-cond__entry--blank';
    
    // Entry Banner (Featured Image)
    if ( has_post_thumbnail() || get_post_meta( get_the_ID(), 'entry-thumbnail', true ) ) :
        $classes[] = "ui-state__entry-banner--active";
    else :
        $classes[] = "ui-state__entry-banner--inactive";
    endif;
    
	return $classes;
}
add_filter('post_class', 'hopscotch_entry_add_class');