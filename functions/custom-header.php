<?php

//------------------------- Custom Header
if ( ! function_exists( 'hopscotch_custom_header' ) ) {
    function hopscotch_custom_header() {

        add_theme_support( 'custom-header' );

    }
    add_action( 'after_setup_theme', 'hopscotch_custom_header' );
}