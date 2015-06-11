<?php
// Entry Classes

function hopscotch_entry_add_class( $classes ) {
	global $post;
    
    // Slug
    $classes[] = 'hs-name__entry--' . $post->post_name;
    
    // Info Card Template
    if ( is_page_template( 'template-info-card.php' ) )
        $classes[] = 'vcard org';
    
    // Empty Content
    if( is_single() && $post->post_content == "" && ! has_excerpt() )
        $classes[] = 'hs-state__article-entry--blank';
    
    // Entry Banner (Featured Image)
    if ( has_post_thumbnail() || get_post_meta( get_the_ID(), 'entry-thumbnail', true ) ) :
        $classes[] = "hs-state__entry-banner--active";
    else :
        $classes[] = "hs-state__entry-banner--inactive";
    endif;
    
    // Info Card Template Microformats
    if ( is_page_template( 'hopscotch-info-card.php' ) )
        $classes[] = "vcard";
    
    // Excerpt
    if ( ! has_excerpt() ) :
        $classes[] = "hs-type__article-entry--non-excerpt";
    else :
        $classes[] = "hs-type__article-entry--excerpt";
    endif;
    
    // Comments
    $num_comments = get_comments_number();
        
    $comment_count_class = 'hs-type__article-entry-comments--zero';
    $number = (int) get_comments_number( get_the_ID() );

    // Defines the class depending on the comment count
    if ( 1 === $number )
        $classes[] = 'hs-type__article-entry-comments--single';
    elseif ( 1 < $number )
        $classes[] = 'hs-type__article-entry-comments--multiple';

    // CSS Class for Closed or Open Comments
    if ( comments_open() )
        $classes[] = 'hs-state__article-entry-comments--open';
    else
        $classes[] = 'hs-state__article-entry-comments--closed';
    
    if ( have_comments() )
        $classes[] = 'hs-state__article-entry-comments--populated';
    else
        $classes[] = 'hs-state__article-entry-comments--empty';
    
	return $classes;
}
add_filter('post_class', 'hopscotch_entry_add_class');