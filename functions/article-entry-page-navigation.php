<?php

function hopscotch_article_entry_page_nav( $args = '' ) {
    wp_link_pages( array(
        'before'      => '<nav class="nav content_nav article-entry-page_nav"><div class="cr content-nav_cr article-entry-page-nav_cr"><h2 class="accessible-name article-entry-page-nav_accessible-name">' . __( 'Article Entry Page Navigation', 'hopscotch' ) . '</h2><p class="friendly-name article-entry-page-nav_friendly-name">' . __( 'Entry Pages', 'hopscotch' ) . '</p><div class="grp content-nav_grp article-entry-page-nav_grp">',
        'after'       => '</div></div></nav>',
        'link_before' => '<span class="item content-nav_item article-entry-page-nav_item">',
        'link_after'  => '</span>',
    ) );
}