<?php
if ( ! function_exists( 'hopscotch_html_classs' ) ) :	
    function hopscotch_html_classs() {
        echo 'site-default hopscotch--site ui-state__nav-sidebar-masthead--inactive ';
    }
    add_action( 'hopscotch_hook_html_class', 'hopscotch_html_classs');
endif;