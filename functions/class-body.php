<?php
// Body Class
// Conditionals to add different classes to the body tag

function hopscotch_body_class( $classes ) {
    global $post, $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

    // Sets default classes
    $classes[] = 'default-classes';

    // Sets class for inner or front page
    if ( ! is_front_page() )
        $classes[] = 'ui-view--inner';
    else
        $classes[] = 'ui-view--front';

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
        $classes[] = 'category--' .$category->category_nicename;
    }

    // Browser Detected as Class
    if ( $is_lynx ) $classes[] = 'browser--lynx';
    elseif ( $is_gecko ) $classes[] = 'browser--gecko';
    elseif ( $is_opera ) $classes[] = 'browser--opera';
    elseif ( $is_NS4 ) $classes[] = 'browser--ns4';
    elseif ( $is_safari ) $classes[] = 'browser--safari';
    elseif ( $is_chrome ) $classes[] = 'browser--chrome';
    elseif ( $is_IE ) $classes[] = 'browser--ie';
    else $classes[] = 'browser--unknown';

    // If browser's device is iPhone
    if ($is_iphone) $classes[] = 'device--iphone';

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

    return $classes;
}
add_filter('body_class','hopscotch_body_class');