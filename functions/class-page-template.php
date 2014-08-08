<?php

//------------------------- Rename '.page-template-template-name-php' to '.page-template-name'
// http://www.franckmaurin.com/change-the-body-class-name-for-a-wordpress-template-page/

function rename_template_body_class( $classes ) {
    foreach ( $classes as $k =>  $v ) {
        if ( substr($v, 0, 22) == 'page-template-template' )
            $classes[ $k ] = 'page-' . substr( $v, 14, -4 );
    }
    return $classes;
}
add_filter( 'body_class', 'rename_template_body_class' );