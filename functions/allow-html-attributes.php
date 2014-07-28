<?php

//------------------------- Allow HTML Attributes in TinyMCE
function allow_all_tinymce_elements_attributes( $init ) {

    // Allow all elements and all attributes
    $ext = '*[*]';

    // Add to extended_valid_elements if it already exists
    if ( isset( $init['extended_valid_elements'] ) ) {
        $init['valid_elements'] .= ',' . $ext;
        $init['extended_valid_elements'] .= ',' . $ext;
    } else {
        $init['valid_elements'] = $ext;
        $init['extended_valid_elements'] = $ext;
    }

    // return value
    return $init;
}
add_filter('tiny_mce_before_init', 'allow_all_tinymce_elements_attributes');