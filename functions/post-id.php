<?php

//------------------------- Post ID
// Description: Automatically add the slug as ID


function hopscotch_custom_post_id() {
    global $post;
    echo $post->post_name;
}
add_action('hopscotch_post_id','hopscotch_custom_post_id');