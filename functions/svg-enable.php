<?php

//------------------------- Allow SVG Files Upload
function hopscotch_mime_types( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';    
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'hopscotch_mime_types' );