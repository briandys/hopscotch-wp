<?php

// Automatic Excerpt
// This is used when the_excerpt() is in the template but the Excerpt Box is not used
if ( ! function_exists( 'hopscotch_excerpt_length' ) ) :
    function hopscotch_excerpt_length( $length ) {
        return 48;
    }
    add_filter( 'excerpt_length', 'hopscotch_excerpt_length', 999 );
endif;

// Manual Excerpt
function hopscotch_excerpt_more( $more ) {
    return '<span class="label ellipsis_label">...</span>';
}
add_filter( 'excerpt_more', 'hopscotch_excerpt_more' );

// Teaser
function hopscotch_modify_read_more() {
    global $post;
    $more = '<span class="comp show-more-content_comp">';
    $more .= '<span class="cr show-more-content_cr">';
    $more .= '<a class="axn show-more-content_axn more-link" href="' . get_permalink( $post->ID ) . '" rel="bookmark">';
    $more .= '<span class="label pred_label">';
    $more .= __( '<span class="label verb_label">Show</span> <span class="label noun_label">Content</span> <span class="label prep_label">of</span>', 'hopscotch' );
    $more .= '</span>';
    $more .= '<span class="label subj_label article-entry-title_label">' . get_the_title( $post->ID ) . '</span> ';
    $more .= '<span class="label slash_label">/</span>';
    $more .= '<span class="friendly-name show-more-content_friendly-name">Read More</span>';
    $more .= '</a>';
    $more .= '</span>';
    $more .= '</span><!-- show-more-content_comp -->';
    return $more;
}
add_filter( 'the_content_more_link', 'hopscotch_modify_read_more' );

// The Excerpt Tag's Show More Content
if ( ! function_exists( 'hopscotch_the_excerpt_show_content' ) ) :
    function hopscotch_the_excerpt_show_content( $excerpt_tag ) {
        global $post;
        $more = '<p class="more-link_cr">';
        $more .= '<span class="comp show-more-content_comp">';
        $more .= '<span class="cr show-more-content_cr">';
        $more .= '<a class="axn show-more-content_axn more-link" href="' . get_permalink( $post->ID ) . '" rel="bookmark">';
        $more .= '<span class="label pred_label">';
        $more .= __( '<span class="label verb_label">Show</span> <span class="label noun_label">Content</span> <span class="label prep_label">of</span>', 'hopscotch' );
        $more .= '</span>';
        $more .= '<span class="label subj_label article-entry-title_label">' . get_the_title( $post->ID ) . '</span> ';
        $more .= '<span class="label slash_label">/</span>';
        $more .= '<span class="friendly-name show-more-content_friendly-name">Read More</span>';
        $more .= '</a>';
        $more .= '</span>';
        $more .= '</span><!-- show-more-content_comp -->';
        $more .= '</p>';
        return $excerpt_tag . $more;
    }
    add_filter('the_excerpt', 'hopscotch_the_excerpt_show_content');
endif;