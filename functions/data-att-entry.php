<?php

//------------------------- Entry Data Attribute
function hopscotch_add_entry_att() {
    
    $data_attribute = 'data-entry-thumbnail-state';
    
    // Post thumbnail state
    if ( has_post_thumbnail() || get_post_meta( get_the_ID(), 'entry-thumbnail', true ) ) :
        echo $data_attribute.'="active"';
    else :
        echo $data_attribute.'="inactive"';
    endif;
    
    
    // Schema attributes
    if( is_page_template( 'template-info-card.php' ) ) :
        echo 'itemscope itemtype="http://schema.org/Organization"';
    endif;
    
}
add_action( 'hopscotch_hook_entry_data_att', 'hopscotch_add_entry_att' );