<?php

//------------------------- Post More Label
if ( ! function_exists( 'hopscotch_more_link' ) ) :
    function hopscotch_more_link( $more_link, $more_link_text ) {
        return str_replace( $more_link_text, 'Continue reading', '<div class="show-more-content">' .$more_link .'</div>' );
    }
    add_filter( 'the_content_more_link', 'hopscotch_more_link', 10, 2 );
endif;