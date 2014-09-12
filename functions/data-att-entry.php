<?php

//------------------------- Entry Data Attribute
function hopscotch_add_entry_att() {
    
    $data_attribute = 'data-entry-thumbnail-state';
    
    if ( has_post_thumbnail() || get_post_meta( get_the_ID(), 'entry-thumbnail', true ) ) :
        echo $data_attribute.'="active"';
    else :
        echo $data_attribute.'="inactive"';
    endif;
    
}
add_action( 'hopscotch_hook_entry_data_att', 'hopscotch_add_entry_att' );