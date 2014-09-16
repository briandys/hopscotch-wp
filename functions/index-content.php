<?php

//------------------------- HopScotch Index Content Hook
// To enable Child Themes to hook up conditionals in index.php content without duplicating it from the parent theme

if ( ! function_exists( 'hopscotch_index_content_conditionals' ) ) :	
    function hopscotch_index_content_conditionals() {

        if ( have_posts() ) :
                                    
            while ( have_posts() ) : the_post();
                get_template_part( 'content', get_post_format() );
            endwhile;

            hopscotch_paging_nav();

        else :

            get_template_part( 'content', 'none' );                                                    

        endif;

    }
    add_action( 'hopscotch_hook_index_content', 'hopscotch_index_content_conditionals' );
endif;