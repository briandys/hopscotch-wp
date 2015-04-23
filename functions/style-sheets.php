<?php

// Style Sheets
function hopscotch_style_sheets() {
    
    // Default Style Sheet
    // Location: css > default.css
    // Source: css > sass > default.scss
    wp_enqueue_style( 'hopscotch-style-default', get_template_directory_uri() . '/css/default.css', array(), '1.0', 'all' );
    
    // Fonts
    // Location: functions > fonts.php
    // Temp disabled for faster development
    
    // wp_enqueue_style( 'hopscotch-fonts', hopscotch_fonts_url(), array(), null );
}
add_action('wp_enqueue_scripts', 'hopscotch_style_sheets');