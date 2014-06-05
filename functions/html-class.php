<?php

//------------------------- HTML Class
if (!function_exists('hopscotch_html_default_class')) :
	function hopscotch_html_default_class() {
		echo 'html site-default status-main-nav-inactive';
    }
add_action( 'hopscotch_html_class', 'hopscotch_html_default_class');
endif;