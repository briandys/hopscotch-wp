<?php

//------------------------- wp_link_pages
// Displays the pages of a post (done by <!--nextpage-->)

function hopscotch_wp_link_pages() {
    wp_link_pages( array(
        'before'      => '<div class="action-items content-navigation entry-page-navigation page-links"><div class="content-navigation-cr"><div class="action-list content-navigation-list entry-page-navigation-list"><p class="text-label">' . __( 'Entry pages:', 'hopscotch' ) . '</p>',
        'after'       => '</div></div></div>',
        'link_before' => '<span class="label">',
        'link_after'  => '</span>',
    ) );
}