<?php

//------------------------- HopScotch Setup
function hopscotch_setup() {
	
    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
    load_theme_textdomain( 'hopscotch', get_template_directory() . '/languages' );
    
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
	
    /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );
	
    /*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
    add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
	
    // Register Primary Navigation
    register_nav_menu( 'primary-navigation', __( 'Primary Navigation', 'hopscotch' ) );
    register_nav_menu( 'social-navigation', __( 'Social Navigation', 'hopscotch' ) );
    
    // Removes the <p> tags from category description
    remove_filter('term_description','wpautop');
    
    // Setup the WordPress core custom background feature.
    add_theme_support( 'custom-background' );
    
    
    /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
    add_theme_support( 'title-tag' );
    
    
    /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
    add_theme_support( 'post-thumbnails' );
    // set_post_thumbnail_size( 825, 510, true ); // Specify the Featured Image dimensions
    
    // Sets the default sizes of images in Admin > Settings
    update_option('thumbnail_size_w', 320);
    update_option('thumbnail_size_h', 320);
    update_option('thumbnail_crop', 1);
    update_option('medium_size_w', 960);
    update_option('medium_size_h', 960);
    update_option('large_size_w', 1920);
    update_option('large_size_h', 1920);
    
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