<?php

//------------------------- Excerpt Length
if ( ! function_exists( 'hopscotch_excerpt_length' ) ) :
    function hopscotch_excerpt_length( $length ) {
        return 24;
    }
    add_filter( 'excerpt_length', 'hopscotch_excerpt_length', 999 );
endif;


//------------------------- Excerpt Ellipsis
function hopscotch_excerpt_more( $more ) {
    return '&hellip;'; // nicer without the brackets
}
add_filter( 'excerpt_more', 'hopscotch_excerpt_more' );


//------------------------- Excerpt More Label
if ( ! function_exists( 'hopscotch_more_content_link' ) ) :
    function hopscotch_more_content_link($output) {
        global $post;
        return $output . '<div class="show-more-content"><a class="more-link" href="'. get_permalink($post->ID) . '"> Continue reading</a></div>';
    }
    add_filter('the_excerpt', 'hopscotch_more_content_link');
endif;