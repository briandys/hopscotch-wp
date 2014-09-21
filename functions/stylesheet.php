<?php

//------------------------- CSS
function hopscotch_styles() {
	wp_enqueue_style( 'hopscotch-fonts' );
    wp_enqueue_style( 'hopscotch-style', get_template_directory_uri() . '/css/app.css', array(), '1.1', 'all' );
    
    if( is_child_theme() ) :
        wp_enqueue_style( 'hopscotch-child-style', get_stylesheet_directory_uri() . '/css/app.css', array('hopscotch-style'), '1.2', 'all' );
    endif;
}
add_action('wp_enqueue_scripts', 'hopscotch_styles');