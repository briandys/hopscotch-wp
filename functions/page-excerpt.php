<?php

//------------------------- Enable page excerpt
function hopscotch_enable_page_excerpt() {
     add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'hopscotch_enable_page_excerpt' );