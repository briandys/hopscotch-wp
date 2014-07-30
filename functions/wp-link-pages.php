<?php

//------------------------- wp_link_pages
// Displays the pages of a post (done by <!--nextpage--> 

function hopscotch_wp_link_pages() {
    ?>

    <?php
        
    wp_link_pages( array(
        'before'      => '<div class="page-links"><p class="page-links-title">' . __( 'Pages:', 'hopscotch' ) . '</p>',
        'after'       => '</div>',
        'link_before' => '<span class="label">',
        'link_after'  => '</span>',
    ) );
    
    ?>

<?php }