<?php
// Comment Form Fields

if ( ! function_exists( 'hopscotch_comment_form_fields' ) ) :
    function hopscotch_comment_form_fields( $fields ){
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );    
        
        // Author Field
        $fields['author'] = '<div class="field comment-author-name_field">';
        $fields['author'] .= '<div class="cr field_cr comment-author-name-field_cr">';
        $fields['author'] .= '<label for="comment-author-name_input">';
        $fields['author'] .= __( 'Name', 'hopscotch' );
        $fields['author'] .= '</label>';
        $fields['author'] .= ( $req ? '' : '' );
        $fields['author'] .= '<input id="comment-author-name_input" class="input text_input comment-author-name_input" name="author" type="text" placeholder="Name" title="Name" value="' . esc_attr( $commenter['comment_author'] ) . '" size="32"' . $aria_req . ' required>';
        $fields['author'] .= '</div>';
        $fields['author'] .= '</div><!-- field -->';
        
        // Email Field
        $fields['email'] = '<div class="field comment-author-email_field">';
        $fields['email'] .= '<div class="cr field_cr comment-author-email-field_cr">';
        $fields['email'] .= '<label for="comment-author-email_input">';
        $fields['email'] .= __( 'Email', 'hopscotch' );
        $fields['email'] .= '</label>';
        $fields['email'] .= ( $req ? '' : '' );
        $fields['email'] .= '<input id="comment-author-email_input" class="input text_input comment-author-email_input" name="email" type="email" placeholder="email@address.com" title="Email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="32"' . $aria_req . ' required>';
        $fields['email'] .= '</div>';
        $fields['email'] .= '</div><!-- field -->';
        
        // URL Field
        $fields['url'] = '<div class="field comment-author-url_field">';
        $fields['url'] .= '<div class="cr field_cr comment-author-url-field_cr">';
        $fields['url'] .= '<label for="comment-author-url_input">';
        $fields['url'] .= __( 'Website <span class="note-optional">(optional)</span>', 'hopscotch' );
        $fields['url'] .= '</label>';
        $fields['url'] .= '<input id="comment-author-url_input" class="input text_input comment-author-url_input" name="url" type="url" placeholder="URL" title="URL" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="32">';
        $fields['url'] .= '</div>';
        $fields['url'] .= '</div><!-- field -->';
        
        return $fields;
    }
    add_filter( 'comment_form_default_fields', 'hopscotch_comment_form_fields' );
endif;