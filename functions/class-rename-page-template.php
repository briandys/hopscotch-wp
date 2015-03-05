<?php
// Rename ".page-template-<template-name-php>" to ".page-<template-name>"
// It removes the file extension of "php" from the class name
// Source: http://www.franckmaurin.com/change-the-body-class-name-for-a-wordpress-template-page/
// Source: http://mimoymima.com/better-body-class-function-wordpress/

function rename_page_template_class( $classes ) {
    
    // Add the new class name with the template file
    // Format: ui-template__view--<template-name>
    // Translates to: The template of "view or page" is "solo" or "info card".
    $page_template = get_page_template();
    if ( $page_template != null ) {
        
        // Remove the WP-generated class name with "-php"
        foreach ( $classes as $k =>  $v ) {
            if ( substr($v, 0, 23) == 'page-template-hopscotch' )
                $classes[ $k ] = '';
        }
        
        // Add HopScotch's own class
        $path = pathinfo( $page_template );
        $tmp = $path['filename'] . "." . $path['extension'];
        $tn= str_replace( ".php", "", $tmp );
        $classes[] = "ui-template__view--" . $tn;
    }
    
    return $classes;
}
add_filter( 'body_class', 'rename_page_template_class' );