<?php

//------------------------- Entry Byline
if ( ! function_exists( 'hopscotch_entry_byline' ) ) :
    function hopscotch_entry_byline() {
        
        // Post author
        if ( 'post' == get_post_type() ) {
            printf( '<div class="entry-byline"><span class="label">By</span> <span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s %4$s</a></span>',
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                esc_attr( sprintf( __( 'View all posts by %s', 'hopscotch' ), get_the_author() ) ),
                get_the_author(),
                get_avatar( get_the_author_meta( 'user_email' ), $size = '32')
            );
        }

        // Translators: used between list items, there is a space after the comma.
        $categories_list = get_the_category_list( __( '<span class="separator">,</span> ', 'hopscotch' ) );
        if ( $categories_list ) {
            echo ' <span class="mid-label">on</span>';
            echo ' <span class="category-list">' . $categories_list . '</span></div><!-- .entry-byline -->';
        }
    }
endif;