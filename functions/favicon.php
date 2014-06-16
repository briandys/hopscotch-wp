<?php

//------------------------- Add Favicon
if (!function_exists('hopscotch_favicon')) :
	function hopscotch_favicon() {
		
        if ( is_child_theme() ) {
            $favicon_directory = get_stylesheet_directory_uri();
        } else {
            $favicon_directory = get_template_directory_uri();
        }
        
		echo '<link rel="shortcut icon" href="'.$favicon_directory.'/img/favicon.ico">' . "\n";
	}
	add_action( 'wp_head', 'hopscotch_favicon' );
endif;