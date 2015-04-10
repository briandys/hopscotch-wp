<?php
// UI Settings Class
// Contains Theme Class and Template Class

// Theme
if ( ! function_exists( 'hopscotch_ui_settings_html_class' ) ) :
	function hopscotch_ui_settings_html_class() {
        
        // Theme
        // echo ' hs-theme--hopscotch';
        
        echo ' hs-template__web-product-header--default';
        
        // Primary Navigation
        // echo ' hs-template__primary-nav--default';
        echo ' hs-template__primary-nav--vines';
        
        // Primary Navigation and Masthead Sidebar
        // echo ' hs-template__primary-nav-masthead-sidebar--default';
        echo ' hs-template__primary-nav-masthead-sidebar--hamburger';
        
        // Search
        // echo ' hs-template__search--default';
        echo ' hs-template__search--poppy-seed';
        
        // Show Top
        echo ' hs-template__show-top--default';
        // echo ' hs-template__show-top--mushroom';
    
    }
    add_action( 'hopscotch_html_class', 'hopscotch_ui_settings_html_class');
endif;