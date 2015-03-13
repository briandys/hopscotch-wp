<?php
// HTML Class

if ( ! function_exists( 'hopscotch_detection_html_class' ) ) :
	function hopscotch_detection_html_class() {
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        
        // Default
        echo 'html ';
        
        // Level
        if ( ! is_child_theme() ) echo 'hs-level--parent ';
        else echo 'hs-level--child ';
        
        // Browser Detection
        if ( $is_lynx ) echo 'hs-browser--lynx ';
        elseif ( $is_gecko ) echo 'hs-browser--gecko ';
        elseif ( $is_opera ) echo 'hs-browser--opera ';
        elseif ( $is_NS4 ) echo 'hs-browser--ns4 ';
        elseif ( $is_safari ) echo 'hs-browser--safari ';
        elseif ( $is_chrome ) echo 'hs-browser--chrome ';
        elseif ( $is_IE ) echo 'hs-browser--ie ';
        else echo 'hs-browser--unlisted ';

        // Device Model Detection
        if ($is_iphone) echo 'hs-device--iphone ';
        else echo 'hs-device--not-iphone ';
        
        // Mobile Detection
        if ( wp_is_mobile() ) echo 'hs-device--mobile ';
        else echo 'hs-device--not-mobile ';

        // View
        if ( ! is_front_page() ) echo 'hs-view--inner ';
        else echo 'hs-view--front ';
    
    }
    add_action( 'hopscotch_html_class', 'hopscotch_detection_html_class');
endif;