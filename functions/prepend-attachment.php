<?php

//------------------------- Modify the image size in the Attachment Page
function hopscotch_prepend_attachment($p) {
    return '<p class="attachment">'.wp_get_attachment_link(0, 'large', false).'</p>';
}
add_filter('prepend_attachment', 'hopscotch_prepend_attachment');