<?php
// UI Settings Class
// Contains Theme Class and Template Class

// Theme
if ( ! function_exists( 'hopscotch_ui_settings_html_class' ) ) :
	function hopscotch_ui_settings_html_class() {
        
        echo 'hs-theme--hopscotch ';
    
    }
    add_action( 'hopscotch_html_class', 'hopscotch_ui_settings_html_class');
endif;

// Template
if ( ! function_exists( 'hopscotch_ui_settings_body_class' ) ) :
    function hopscotch_ui_settings_body_class( $classes ) {
        
        // Search Template
        $classes[] = 'hs-template__search--lightsaber ';
        
        return $classes;
    }
    add_filter('body_class','hopscotch_ui_settings_body_class');
endif;