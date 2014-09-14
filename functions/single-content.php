<?php

//------------------------- HopScotch Single Content Hook
// To enable Child Themes to hook up conditionals in single.php without duplicating it from the parent

if ( ! function_exists( 'hopscotch_single_content_conditionals' ) ) :	
    function hopscotch_single_content_conditionals() {

        // Default is get content template
        get_template_part( 'content', get_post_format() );        
        hopscotch_post_nav();
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }

    }
    add_action( 'hopscotch_hook_single_content', 'hopscotch_single_content_conditionals' );
endif;