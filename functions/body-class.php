<?php
// Body Class
// Conditionals to add different classes to the body tag

function hopscotch_body_class( $classes ) {
    global $post;

    // Article Entry Slug as Class
    // Format: <Post Type>--<Slug>
    // Example: If type is Post then: post--page-title
    if ( isset( $post ) &&  ! is_front_page() ) {		
        $classes[] = 'hs-type__' . $post->post_type . '--' . $post->post_name;
        $classes[] = 'hs-type__view--' . $post->post_type;
    } else {        
        $classes[] = 'hs-type__view--front';
    }

    // Article Entry Category as Class
    // Format: category--<Category-Name>
    // Example: category--uncategorized
    if ( is_single() ) {
        foreach( ( get_the_category( $post->ID ) ) as $category )
        $classes[] = 'hs-category__article-entry--' .$category->category_nicename;
    }

    // Masthead Sidebar Class
    if ( is_active_sidebar( 'masthead-sidebar' ) )
        $classes[] = 'hs-state__masthead-sidebar--enabled';
    else
        $classes[] = 'hs-state__masthead-sidebar--disabled';

    // Content Header Sidebar Class
    if ( is_active_sidebar( 'content-header-sidebar' ) )
        $classes[] = 'hs-state__content-header-sidebar--enabled';
    else
        $classes[] = 'hs-state__content-header-sidebar--disabled';

    // Content Sidebar Class
    if ( is_active_sidebar( 'content-sidebar' ) )
        $classes[] = 'hs-state__content-sidebar--enabled';
    else
        $classes[] = 'hs-state__content-sidebar--disabled';

    // Colophon Sidebar Class
    if ( is_active_sidebar( 'colophon-sidebar' ) )
        $classes[] = 'hs-state__colophon-sidebar--enabled';
    else
        $classes[] = 'hs-state__colophon-sidebar--disabled';

    return $classes;
}
add_filter('body_class','hopscotch_body_class');