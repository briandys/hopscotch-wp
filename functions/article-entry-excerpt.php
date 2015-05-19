<?php

// Excerpt Length
// Automatic Excerpt
// This is used when the_excerpt() is in the template but the Excerpt Box is not used
if ( ! function_exists( 'hopscotch_excerpt_length' ) ) :
    function hopscotch_excerpt_length( $length ) {
        return 48;
    }
    add_filter( 'excerpt_length', 'hopscotch_excerpt_length', 999 );
endif;

// Excerpt Ellipsis
// This is related to the Excerpt Length function
function hopscotch_excerpt_more( $more ) {
    return '<span class="ellipsis">...</span>';
}
add_filter( 'excerpt_more', 'hopscotch_excerpt_more' );


// Excerpt More Label
// Manual Excerpt
// Appears when there's a content in the Excerpt box
if ( ! function_exists( 'hopscotch_the_excerpt_show_content' ) ) :
    function hopscotch_the_excerpt_show_content( $excerpt_tag ) {
        global $post;
        // Component: Show More Content
        // Class: show-more-content_comp
        $more = '<div class="comp show-more-content_comp">';
        $more .= '<div class="cr show-more-content_cr">';
        $more .= '<a class="axn show-more-content_axn more-link" href="'. get_permalink( $post->ID ) . '" rel="bookmark">';
        $more .= '<span class="label pred_label">';
        $more .= '<span class="label verb_label">' . __( 'Show', 'hopscotch' ) . '</span> ';
        $more .= '<span class="label noun_label">' . __( 'Content', 'hopscotch' ) . '</span> ';
        $more .= '<span class="label prep_label">' . __( 'of', 'hopscotch' ) . '</span> ';
        $more .= '</span>';
        $more .= '<span class="label subj_label article-entry-title_label">' . get_the_title( $post->ID ) . '</span> ';
        $more .= '<span class="friendly-name show-more-content_friendly-name"><span class="label slash_label">/</span> Read More</span>';
        $more .= '</a>';
        $more .= '</div>';
        $more .= '</div><!-- show-more-content_comp -->';
        return $excerpt_tag . $more;
    }
    add_filter('the_excerpt', 'hopscotch_the_excerpt_show_content');
endif;