<?php
// Modify the image size in the Attachment Page

function hopscotch_article_entry_modify_attachment_image( $p ) {
    return '<p class="attachment">'.wp_get_attachment_link( 0, 'large', false ).'</p>';
}
add_filter('prepend_attachment', 'hopscotch_article_entry_modify_attachment_image');