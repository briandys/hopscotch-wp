<?php // Body Class

if ( ! function_exists( 'hopscotch_body_class' ) ) :
    function hopscotch_body_class( $classes ) {
        global $post, $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

        // Set default classes
        $classes[] = 'status-search-inactive status-scroll-top-inactive ui-type__masthead--fixed-header';

        // Inner pages (not home)
        if ( ! is_front_page() ) {
            $classes[] = 'page-inner';
        }

        // Entry Slug as Class
        // Format: <Post Type>--<Slug>
        if ( isset( $post ) &&  ! is_home() ) {		
            $classes[] = $post->post_type . '--' . $post->post_name;
        }

        // Entry Category as Class
        if ( is_single() ) {
            foreach((get_the_category( $post->ID )) as $category)
            $classes[] = 'category--' .$category->category_nicename;
        }

        // Browser Detected as Class
        if($is_lynx) $classes[] = 'browser-lynx';
        elseif($is_gecko) $classes[] = 'browser-gecko';
        elseif($is_opera) $classes[] = 'browser-opera';
        elseif($is_NS4) $classes[] = 'browser-ns4';
        elseif($is_safari) $classes[] = 'browser-safari';
        elseif($is_chrome) $classes[] = 'browser-chrome';
        elseif($is_IE) $classes[] = 'browser-ie';
        else $classes[] = 'browser-unknown';

        if($is_iphone) $classes[] = 'device-iphone';

        // Sidebar Class Toggle
        if( is_active_sidebar( 'masthead-sidebar' ) ) $classes[] = 'masthead-sidebar-active';
        else $classes[] = 'masthead-sidebar-inactive';

        // Sidebar Class Toggle
        if( is_active_sidebar( 'content-sidebar' ) ) $classes[] = 'content-sidebar-active';
        else $classes[] = 'content-sidebar-inactive';

        if( is_active_sidebar( 'colophon-sidebar' ) ) $classes[] = 'colophon-sidebar-active';
        else $classes[] = 'colophon-sidebar-inactive';

        // Custom Field: entry-template; Usage: Custom Field Name: entry-template; Custom Field Value: [any class name you want]
        if ( get_post_meta( get_the_ID(), 'entry-template', true ) ) $classes[] = 'hopscotch-template-'.get_post_meta( get_the_ID(), 'entry-template', true );

        return $classes;
    }
    add_filter('body_class','hopscotch_body_class');
endif;