<?php

//------------------------- Add Admin Nav
if (!function_exists('hopscotch_admin_nav')) :
    function hopscotch_admin_nav( $items, $args ) {
        if (is_user_logged_in() && $args->theme_location == 'primary') {
            $items .= '<li class="sign-out-link"><a href="'. wp_logout_url( get_permalink() ) .'">Sign out</a></li>';
        }
        elseif (!is_user_logged_in() && $args->theme_location == 'primary') {
            $items .= '<li class="sign-in-link"><a href="'. wp_login_url() .'">Sign in</a></li>';
        }
        return $items;
    }
    add_filter( 'wp_nav_menu_items', 'hopscotch_admin_nav', 10, 2 );
endif;