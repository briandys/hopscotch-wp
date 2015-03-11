<?php
// Body Class
// Conditionals to add different classes to the body tag

function hopscotch_body_class( $classes ) {
    global $post;

    // Sets class for inner or front page
    if ( ! is_front_page() )
        $classes[] = 'hs-view--inner';
    else
        $classes[] = 'hs-view--front';

    // Article Entry Slug as Class
    // Format: <Post Type>--<Slug>
    // Example: If type is Post then: post--page-title
    if ( isset( $post ) &&  ! is_home() ) {		
        $classes[] = $post->post_type . '--' . $post->post_name;
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
        $classes[] = 'hs-state__masthead-sidebar--active';
    else
        $classes[] = 'hs-state__masthead-sidebar--inactive';

    // Content Sidebar Class
    if ( is_active_sidebar( 'content-sidebar' ) )
        $classes[] = 'hs-state__content-sidebar--active';
    else
        $classes[] = 'hs-state__content-sidebar--inactive';

    // Colophon Sidebar Class
    if ( is_active_sidebar( 'colophon-sidebar' ) )
        $classes[] = 'hs-state__colophon-sidebar--active';
    else
        $classes[] = 'hs-state__colophon-sidebar--inactive';

    return $classes;
}
add_filter('body_class','hopscotch_body_class');