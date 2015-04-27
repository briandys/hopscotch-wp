<?php
// UI Settings Class
// Contains Theme Class and Template Class

// Templates
if ( ! function_exists( 'hopscotch_ui_settings_templates_html_class' ) ) :
	function hopscotch_ui_settings_templates_html_class() {
        
        // Masthead
        echo ' hs-template__masthead--default';
        
        // Primary Navigation
        // echo ' hs-template__primary-nav--default';
        echo ' hs-template__primary-nav--vines';
        
        // Primary Navigation and Masthead Sidebar
        // echo ' hs-template__primary-nav-masthead-sidebar--default';
        echo ' hs-template__primary-nav-masthead-sidebar--hamburger';
        
        // Search
        // echo ' hs-template__search--default';
        echo ' hs-template__search--poppy-seeds';
        
        // Show Top
        // echo ' hs-template__show-top--default';
        echo ' hs-template__show-top--mushroom';    
    }
    add_action( 'hopscotch_html_class', 'hopscotch_ui_settings_templates_html_class');
endif;

// Theme
if ( ! function_exists( 'hopscotch_ui_settings_themes_html_class' ) ) :
	function hopscotch_ui_settings_themes_html_class() {
        
        // Main Theme Class
        echo ' hs-theme--hopscotch';
    }
    add_action( 'hopscotch_html_class', 'hopscotch_ui_settings_themes_html_class');
endif;