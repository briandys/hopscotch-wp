<?php

//------------------------- HTML Class
function hopscotch_html_default_class() {
    global $post;
    
    // Default
    echo 'html status-mobile-main-nav-inactive ';
    
    // Post Slug as Class
    if ( isset( $post ) ) {		
		echo ' html-' . $post->post_type . '-' . $post->post_name . ' ';
	}
}
add_action( 'hopscotch_html_class', 'hopscotch_html_default_class');


// This is the unique HTML class of site projects
if ( ! function_exists( 'hopscotch_html_site_parent_class' ) ) :	
    function hopscotch_html_site_parent_class() {
		echo 'site-default ';
    }
    add_action( 'hopscotch_html_class', 'hopscotch_html_site_parent_class');
endif;