<?php
// UI Settings Class
// Contains Theme Class and Template Class

// Theme
if ( ! function_exists( 'hopscotch_ui_settings_html_class' ) ) :
	function hopscotch_ui_settings_html_class() {
        
        // Theme
        echo 'hs-theme--hopscotch ';
        
        // Search
        // echo 'hs-template__search--default ';
        echo 'hs-template__search--lightsaber ';
        
        // Primary Navigation and Masthead Sidebar
        // echo 'hs-template__primary-nav-masthead-sidebar--default ';
        echo 'hs-template__primary-nav-masthead-sidebar--hamburger ';
        
        // Show Top
        // echo 'hs-template__show-top--default ';
        echo 'hs-template__show-top--mushroom ';
    
    }
    add_action( 'hopscotch_html_class', 'hopscotch_ui_settings_html_class');
endif;