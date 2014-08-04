<?php

//------------------------- Add Favicon
function hopscotch_favicon() {
		
    if ( is_child_theme() ) {
        $favicon_directory = get_stylesheet_directory_uri();
    } else {
        $favicon_directory = get_template_directory_uri();
    }

    // Favicon
    echo '<link rel="shortcut icon" href="'.$favicon_directory.'/img/favicon.ico">' . "\n";
    
    echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="'.$favicon_directory.'/img/touch/apple-touch-icon-144x144-precomposed.png">' . "\n";
    echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'.$favicon_directory.'/img/touch/apple-touch-icon-114x114-precomposed.png">' . "\n";
    echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="'.$favicon_directory.'/img/touch/apple-touch-icon-72x72-precomposed.png">' . "\n";
    echo '<link rel="apple-touch-icon-precomposed" href="'.$favicon_directory.'/img/touch/apple-touch-icon-57x57-precomposed.png">' . "\n";
    
    // Android and iOS Icons
    echo '<link rel="shortcut icon" sizes="196x196" href="'.$favicon_directory.'/img/touch/touch-icon-196x196.png">' . "\n";
    echo '<link rel="shortcut icon" href="'.$favicon_directory.'/img/touch/apple-touch-icon.png">' . "\n";

    // Tile icon for Win8 (144x144 + tile color)
    echo '<meta name="msapplication-TileImage" content="'.$favicon_directory.'/img/touch/apple-touch-icon-144x144-precomposed.png">' . "\n";
    echo '<meta name="msapplication-TileColor" content="#00aaff">' . "\n";
}
add_action( 'wp_head', 'hopscotch_favicon' );