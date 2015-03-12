<?php
// HTML Class

if ( ! function_exists( 'hopscotch_html_default_class' ) ) :
	function hopscotch_html_default_class() {
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        
        echo 'html ';
        
        // Browser Detected as Class
        if ( $is_lynx ) echo 'hs-browser--lynx ';
        elseif ( $is_gecko ) echo 'hs-browser--gecko ';
        elseif ( $is_opera ) echo 'hs-browser--opera ';
        elseif ( $is_NS4 ) echo 'hs-browser--ns4 ';
        elseif ( $is_safari ) echo 'hs-browser--safari ';
        elseif ( $is_chrome ) echo 'hs-browser--chrome ';
        elseif ( $is_IE ) echo 'hs-browser--ie ';
        else echo 'hs-browser--unknown ';

        // If browser's device is iPhone
        if ($is_iphone) echo 'hs-device--iphone ';
        
        // HopScotch Parent Template Class
        echo 'hs-level--parent ';

        // Sets class for inner or front page
        if ( ! is_front_page() )
            echo 'hs-view--inner ';
        else
            echo 'hs-view--front ';
    
    }
    add_action( 'hopscotch_html_class', 'hopscotch_html_default_class');
endif;