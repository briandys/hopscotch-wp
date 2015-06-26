<?php

// Style Sheets
function hopscotch_style_sheets() {
    
    // Default Style Sheet
    // Location: css > default.css
    // Source: css > sass > default.scss
    wp_enqueue_style( 'hopscotch-style-default', get_template_directory_uri() . '/css/default.css', array(), '1.0', 'all' );
    
    // Fonts
    // Location: functions > fonts.php
    // Temp disabled for faster development    
    // wp_enqueue_style( 'hopscotch-fonts', hopscotch_fonts_url(), array(), null );
    
    if( ! is_admin() ) {
        
        // Transfer JS from header to footer
        // Source: http://www.fluxbytes.com/wordpress/move-javascript-files-to-footer-in-wordpress/
        remove_action('wp_head', 'wp_print_scripts');
        remove_action('wp_head', 'wp_print_head_scripts', 9);
        remove_action('wp_head', 'wp_enqueue_scripts', 1);
        add_action('wp_footer', 'wp_print_scripts', 5);
        add_action('wp_footer', 'wp_enqueue_scripts', 5);
        add_action('wp_footer', 'wp_print_head_scripts', 5);
        
        // Modernizr
        wp_enqueue_script( 'hopscotch-js-modernizr', get_template_directory_uri() . '/js/vendor/modernizr.custom.min.js', array(), '1.0', false );
        
        // Plugins
        wp_enqueue_script( 'hopscotch-js-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '1.0', true );
        
        // Functions
        wp_enqueue_script( 'hopscotch-js-functions', get_template_directory_uri() . '/js/functions.js', array('jquery', 'hopscotch-js-modernizr'), '3.0', true );
        
        // Skip Link Focus Fix from Twenty Fifteen
        wp_enqueue_script( 'hopscotch-js-skip-link', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20150306', true );
        
        // Threaded Comments
        if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) )
           wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'hopscotch_style_sheets');