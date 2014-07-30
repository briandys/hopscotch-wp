<?php

//------------------------- Allow HTML Attributes in TinyMCE
function allow_all_tinymce_elements_attributes( $init ) {

    // Allow all elements and all attributes
    $ext = '*[*]';
    
    $initArray['valid_elements'] = $ext;
    $initArray['extended_valid_elements'] = $ext;
    
    // return value
    return $init;
}
add_filter('tiny_mce_before_init', 'allow_all_tinymce_elements_attributes');