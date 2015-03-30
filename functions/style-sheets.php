<?php

// Style Sheets
function hopscotch_style_sheets() {
    
    // Default Style Sheet
    // Location: css > default.css
    // Source: css > sass > default.scss
    wp_enqueue_style( 'hopscotch-default', get_template_directory_uri() . '/css/default.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'hopscotch-three', get_template_directory_uri() . '/css/hopscotch3.css', array(), '1.0', 'all' );
    
    // Fonts
    // Location: functions > fonts.php
    // wp_enqueue_style( 'hopscotch-fonts', hopscotch_fonts_url(), array(), null );
}
add_action('wp_enqueue_scripts', 'hopscotch_style_sheets');