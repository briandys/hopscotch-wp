<?php

//------------------------- HopScotch Setup
function hopscotch_setup() {
	
    load_theme_textdomain( 'hopscotch', get_template_directory() . '/languages' );
    
    add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	register_nav_menu( 'primary', __( 'Navigation Menu', 'hopscotch' ) );
    remove_filter('term_description','wpautop');
    
    add_theme_support( 'post-thumbnails' );
    
    update_option('thumbnail_size_w', 160);
    update_option('thumbnail_size_h', 160);
    update_option('thumbnail_crop', 1);
    
    add_image_size( 'hopscotch-small', 320 );
    update_option('medium_size_w', 640);
    update_option('medium_size_h', 640);
    add_image_size( 'hopscotch-regular', 800 );    
    update_option('large_size_w', 1200);
    update_option('large_size_h', 1200);

}
add_action( 'after_setup_theme', 'hopscotch_setup' );


//------------------------- Content Width
if ( ! isset( $content_width ) ) {
    $content_width = 960;
}


//------------------------- Editor Style
function hopscotch_add_editor_styles() {
    add_editor_style( get_template_directory_uri() ); 
}
add_action( 'init', 'hopscotch_add_editor_styles' );


//------------------------- Hide Admin Toolbar
add_filter('show_admin_bar', '__return_false');