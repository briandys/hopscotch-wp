<?php

//------------------------- JS
function hopscotch_js() {
    if( ! is_admin() ) {
        
        // Remove scripts from the header - especially those bundled with WP
        remove_action('wp_head', 'wp_print_scripts');
        remove_action('wp_head', 'wp_print_head_scripts', 9);
        remove_action('wp_head', 'wp_enqueue_scripts', 1);
        
        wp_enqueue_script( 'hopscotch-js-modernizr', get_template_directory_uri() . '/js/vendor/modernizr.custom.min.js', array(), '1.0', false );
        wp_enqueue_script( 'hopscotch-js-functions', get_template_directory_uri() . '/js/functions.js', array('jquery', 'hopscotch-js-modernizr'), '1.1', true );
        wp_enqueue_script( 'hopscotch-js-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '1.0', true );
    }
	
	if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
	   wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'hopscotch_js' );