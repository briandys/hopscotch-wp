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


function hopscotch_page_nav_state() {
    if ( $GLOBALS['wp_query']->max_num_pages < 2 ) :
        echo 'data-html-page-nav-state="inactive"';
    else :
        echo 'data-html-page-nav-state="active"';
    endif;
}
add_action( 'hopscotch_html_data_att', 'hopscotch_page_nav_state');


//------------------------- This is the unique HTML class of site projects
// Site class: hopscotch--site

// Masthead class:
// ui-type__masthead--default
// ui-type__masthead--semi-compact

if ( ! function_exists( 'hopscotch_html_site_parent_class' ) ) :	
    function hopscotch_html_site_parent_class() {
		
        echo 'site-default hopscotch--site ';
        
    }
    add_action( 'hopscotch_html_class', 'hopscotch_html_site_parent_class');
endif;