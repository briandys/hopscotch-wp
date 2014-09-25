<?php

//------------------------- CSS
function hopscotch_styles() {
	wp_enqueue_style( 'hopscotch-fonts' );
    wp_enqueue_style( 'hopscotch-style', get_template_directory_uri() . '/css/app.css', array(), '1.1', 'all' );
}
add_action('wp_enqueue_scripts', 'hopscotch_styles');