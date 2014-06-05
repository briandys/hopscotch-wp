<?php

//------------------------- Comment Form Fields
if ( ! function_exists( 'hopscotch_comment_form_fields' ) ) :
    function hopscotch_comment_form_fields($fields){
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );    
        $fields['author'] = '<div class="field field-author">' . '<label for="author">' . __( 'Name', 'hopscotch' ) . '</label> ' . ( $req ? '' : '' ) . '<input id="author" class="input-text" name="author" type="text" placeholder="Nickname" required title="Name" value="' . esc_attr( $commenter['comment_author'] ) . '" size="32"' . $aria_req . '></div>';
        $fields['email'] = '<div class="field field-email">' . '<label for="email">' . __( 'Email', 'hopscotch' ) . '</label> ' . ( $req ? '' : '' ) . '<input id="email" class="input-text" name="email" type="email" placeholder="email@address.com" required title="Email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="32"' . $aria_req . '></div>';
        $fields['url'] = '<div class="field field-url">' . '<label for="url">' . __( 'Website <span class="note-optional">(optional)</span>', 'hopscotch' ) . '</label> ' . '<input id="url" class="input-text" name="url" type="url" placeholder="URL" title="URL" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="32"></div>';
        return $fields;
    }
    add_filter( 'comment_form_default_fields', 'hopscotch_comment_form_fields' );
endif;