<?php

//------------------------- Entry Author
if ( ! function_exists( 'hopscotch_entry_author' ) ) :
    function hopscotch_entry_author() {
        
        // Post author
        if ( 'post' == get_post_type() ) {
            printf( '<div class="comp entry-author_comp article-entry-author_comp"><div class="author vcard entry-author_cr article-entry-author_cr"><span class="label pred_label"><span class="label noun_label">Entry</span> <span class="label prep_label">by</span></span> <a class="url fn n entry-author_axn article-entry-author_axn" href="%1$s" title="%2$s" rel="author"><span class="label subj_label entry-author_label article-entry-author_label">%3$s</span> %4$s</a></div></div><!-- article-entry-author_comp -->',
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                esc_attr( sprintf( __( 'View all entries by %s', 'hopscotch' ), get_the_author() ) ),
                get_the_author(),
                get_avatar( get_the_author_meta( 'user_email' ), $size = '32')
            );
        }
    }
endif;