<?php

//------------------------- HopScotch Setup
function hopscotch_setup() {
	
    load_theme_textdomain( 'hopscotch', get_template_directory() . '/languages' );
    
    add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	
    register_nav_menu( 'primary', __( 'Navigation Menu', 'hopscotch' ) );
    remove_filter('term_description','wpautop');
    
    add_theme_support( 'custom-background' );
    add_theme_support( 'post-thumbnails' );
    
    // Sets the default sizes of images in Admin > Settings
    update_option('thumbnail_size_w', 160);
    update_option('thumbnail_size_h', 160);
    update_option('thumbnail_crop', 1);
    update_option('medium_size_w', 640);
    update_option('medium_size_h', 640);
    update_option('large_size_w', 1200);
    update_option('large_size_h', 1200);
    
    // Adds extra custom sizes for thumbnails (see functions > entry-thumbnail.php)
    add_image_size( 'hopscotch-small', 320 );
    add_image_size( 'hopscotch-medium', 640 );
    add_image_size( 'hopscotch-regular', 800 );
    add_image_size( 'thumbnail-size-800', 800 );

}
add_action( 'after_setup_theme', 'hopscotch_setup' );


//------------------------- Content Width
if ( ! isset( $content_width ) ) {
    $content_width = 960;
}