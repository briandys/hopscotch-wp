<?php

//------------------------- HTML Class
if ( ! function_exists( 'hopscotch_html_default_class' ) ) :
    function hopscotch_html_default_class() {
        echo 'html status-mobile-main-nav-inactive ';
    }
    add_action( 'hopscotch_html_class', 'hopscotch_html_default_class');
endif;

// This is the unique HTML class of site projects
if ( ! function_exists( 'hopscotch_html_site_parent_class' ) ) :	
    function hopscotch_html_site_parent_class() {
		echo 'site-default ';
    }
    add_action( 'hopscotch_html_class', 'hopscotch_html_site_parent_class');
endif;