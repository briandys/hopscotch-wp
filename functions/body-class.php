<?php
// Body Class
// Conditionals to add different classes to the body tag

function hopscotch_body_class( $classes ) {
    global $post, $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

    // Sets default classes
    $classes[] = '';

    // Sets class for inner or front page
    if ( ! is_front_page() )
        $classes[] = 'ui-type__view--inner';
    else
        $classes[] = 'ui-type__view--front';

    // Entry Slug as Class
    // Format: <Post Type>--<Slug>
    // Example: If type is Post then: post--page-title
    if ( isset( $post ) &&  ! is_home() ) {		
        $classes[] = $post->post_type . '--' . $post->post_name;
    }

    // Entry Category as Class
    // Format: category--<Category-Name>
    // Example: category--uncategorized
    if ( is_single() ) {
        foreach( ( get_the_category( $post->ID ) ) as $category )
        $classes[] = 'ui-category__view--' .$category->category_nicename;
    }

    // Browser Detected as Class
    if ( $is_lynx ) $classes[] = 'ui-type__browser--lynx';
    elseif ( $is_gecko ) $classes[] = 'ui-type__browser--gecko';
    elseif ( $is_opera ) $classes[] = 'ui-type__browser--opera';
    elseif ( $is_NS4 ) $classes[] = 'ui-type__browser--ns4';
    elseif ( $is_safari ) $classes[] = 'ui-type__browser--safari';
    elseif ( $is_chrome ) $classes[] = 'ui-type__browser--chrome';
    elseif ( $is_IE ) $classes[] = 'ui-type__browser--ie';
    else $classes[] = 'ui-type__browser--unknown';

    // If browser's device is iPhone
    if ($is_iphone) $classes[] = 'ui-type__device--iphone';

    // Masthead Sidebar Class
    if ( is_active_sidebar( 'masthead-sidebar' ) )
        $classes[] = 'ui-state__masthead-sidebar--active';
    else
        $classes[] = 'ui-state__masthead-sidebar--inactive';

    // Content Sidebar Class
    if ( is_active_sidebar( 'content-sidebar' ) )
        $classes[] = 'ui-state__content-sidebar--active';
    else
        $classes[] = 'ui-state__content-sidebar--inactive';

    // Colophon Sidebar Class
    if ( is_active_sidebar( 'colophon-sidebar' ) )
        $classes[] = 'ui-state__colophon-sidebar--active';
    else
        $classes[] = 'ui-state__colophon-sidebar--inactive';
    
    // Renames ".page-template-<template-name-php>" to ".page-<template-name>"
    // It removes the file extension of "php" from the class name
    // Source: http://www.franckmaurin.com/change-the-body-class-name-for-a-wordpress-template-page/
    // Source: http://mimoymima.com/better-body-class-function-wordpress/
    // Add the new class name with the template file
    // Format: ui-template__view--<template-name>
    // Translates to: The template of "view or page" is "solo" or "info card".
    $page_template = get_page_template();
    if ( $page_template != null ) {
        
        // Remove the WP-generated class name with "-php"
        foreach ( $classes as $k =>  $v ) {
            if ( substr($v, 0, 23) == 'page-template-hopscotch' )
                $classes[ $k ] = '';
        }
        
        // Add HopScotch's own class
        $path = pathinfo( $page_template );
        $tmp = $path['filename'] . "." . $path['extension'];
        $tn= str_replace( ".php", "", $tmp );
        $classes[] = "ui-template__view--" . $tn;
    }

    return $classes;
}
add_filter('body_class','hopscotch_body_class');