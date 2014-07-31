<?php

//------------------------- Custom Header
function hopscotch_custom_header() {
	
    $defaults = array(
        'default-image' => get_template_directory_uri() . '/img/sites-default-thumbnail.svg',
    );
    add_theme_support( 'custom-header', $defaults );

}
add_action( 'after_setup_theme', 'hopscotch_custom_header' );