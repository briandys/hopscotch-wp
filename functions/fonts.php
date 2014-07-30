
<?php

//------------------------- Register Fonts
if (!function_exists('hopscotch_fonts')) :
    function hopscotch_fonts() {
        /* translators: If there are characters in your language that are not supported
           by this font, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'hopscotch' ) ) {

            $protocol = is_ssl() ? 'https' : 'http';

            wp_register_style( 'hopscotch-fonts', "$protocol://fonts.googleapis.com/css?family=Raleway:400,600,700", array(), null );

        }
    }
    add_action( 'init', 'hopscotch_fonts' );
endif;