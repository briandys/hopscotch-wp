<?php

//------------------------- Slug Class
function hopscotch_add_slug_class() {
    global $post;
    echo 'hopscotch-'.$post->post_name;
}
add_action('hopscotch_slug_class','hopscotch_add_slug_class');