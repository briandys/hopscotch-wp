<?php
// Article Entry Author

if ( ! function_exists( 'hopscotch_article_entry_author' ) ) :
    function hopscotch_article_entry_author() {        
        
        // Component: Article Entry Author
        // Class: article-entry-author_comp
        if ( 'post' == get_post_type() ) {            
            $author_comp_string = '<div class="comp author_comp article-entry-author_comp">';
            $author_comp_string .= '<div class="cr author_cr article-entry-author_cr author vcard">';
            $author_comp_string .= '<span class="label pred_label">';
            $author_comp_string .= '<span class="label noun_label">Entry</span> ';
            $author_comp_string .= '<span class="label prep_label">by</span> ';
            $author_comp_string .= '</span>';
            $author_comp_string .= '<a class="author_axn url fn n" href="%1$s" title="%2$s" rel="author">';
            $author_comp_string .= '<span class="label subj_label author-name_label">%3$s</span>';
            $author_comp_string .= '%4$s';
            $author_comp_string .= '</a>';
            $author_comp_string .= '</div>';
            $author_comp_string .= '</div><!-- article-entry-author_comp -->';

            printf( $author_comp_string,
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), // 1: Author Entries URL
                esc_attr( sprintf( __( 'View all entries by %s', 'hopscotch' ), get_the_author() ) ), // 2: Title
                get_the_author(), // 3: Author Name
                get_avatar(
                    get_the_author_meta( 'user_email' ),
                    $size = '48',
                    $default = '',
                    $alt = 'Author Avatar of ' . get_the_author_meta( 'display_name' )
                ) // 4: Author Avatar
            );
        }
    }
endif;