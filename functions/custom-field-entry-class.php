<?php

//------------------------- Entry Class
// Description: You can add a custom class via Custom Field
// Usage:
// Key: entry-class
// Value: Class name

function hopscotch_post_class($classes) {
    global $post;

    if ( get_post_meta( get_the_ID(), 'entry-class', true ) ) :
        $entry_class = ' hopscotch-' . get_post_meta( get_the_ID(), 'entry-class', true );
    endif;

    $classes[] = $entry_class;
    return $classes;
}
add_filter('post_class','hopscotch_post_class');