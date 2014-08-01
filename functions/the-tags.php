<?php

//------------------------- the_tags
// Displays the tags of a post

function hopscotch_the_tags() {
    ?>
    
    <?php the_tags( '<div class="entry-tags"><div class="tag-list"><span class="label">Tags:</span> ', '<span class="separator">,</span> ', '</div></div>' ); ?>

<?php }