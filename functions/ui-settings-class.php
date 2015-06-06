<?php
// UI Settings Class
// Contains Theme Class and Template Class

// Templates
if ( ! function_exists( 'hopscotch_ui_settings_templates_html_class' ) ) :
	function hopscotch_ui_settings_templates_html_class() {        
        
        // Features (Built-In)
        echo ' hs-template__masthead--celery';
        echo ' hs-template__primary-nav-masthead-sidebar--hamburger';
        echo ' hs-template__primary-nav--vines';
        echo ' hs-template__search--poppy-seeds';
        echo ' hs-template__breadcrumb-navigation--breadings';
        
        // Modifications (Optional)
        echo ' hs-template__search--blank-fill';
        echo ' hs-template__content--hero';
        echo ' hs-template__tag--string-beans';
        echo ' hs-template__show-top--mushroom';
    }
    add_action( 'hopscotch_html_class', 'hopscotch_ui_settings_templates_html_class');
endif;

// Theme
if ( ! function_exists( 'hopscotch_ui_settings_themes_html_class' ) ) :
	function hopscotch_ui_settings_themes_html_class() {
        echo ' hs-theme--hopscotch';
    }
    add_action( 'hopscotch_html_class', 'hopscotch_ui_settings_themes_html_class');
endif;