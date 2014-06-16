<?php

//------------------------- HopScotch Setup
function hopscotch_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	register_nav_menu( 'primary', __( 'Navigation Menu', 'hopscotch' ) );
    remove_filter('term_description','wpautop');
}
add_action( 'after_setup_theme', 'hopscotch_setup' );


//------------------------- Featured Image
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 160, 160, true );
}


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