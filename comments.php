<?php
// The template for displaying comments
// The area of the page that contains both current comments
// and the comment form.
// @package WordPress
// @subpackage HopScotch
// @since HopScotch 1.0
?>

<?php if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comp comments_comp">
    <div class="cr comments_cr">
        
        <h3 class="accessible_name">
        <?php
        printf( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'hopscotch' ),
            number_format_i18n( get_comments_number() ), get_the_title() );
        ?>
        </h3>
        <div class="comments_ct">
            
        <?php // If there are comments
        if ( have_comments() ) : ?>

            <ol class="grp comments_grp">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size'=> 72,
                'callback' => 'hopscotch_comments_item'
            ) );
            ?>
            </ol><!-- comments_grp -->
            
            <?php // If there are comments but Comments is closed
            if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
            <div class="notice closed-comments_notice">
                <div class="cr notice_cr">
                    <p><?php _e( 'Comments are closed.', 'hopscotch' ); ?></p>
                </div>
            </div><!-- closed-comments_notice -->
            <?php endif; ?>

            <?php hopscotch_comments_nav(); ?>
            
        <?php // If there are no comments
        else : ?>
            
            <div class="notice blank-comments_notice">
                <div class="cr notice_cr">
                    <p>There are no comments yet.</p>
                </div>
            </div><!-- blank-comments_notice -->
            
        <?php endif; ?>            
            
        <?php comment_form( array(
            'id_form'           => 'comment-form',
            'id_submit'         => 'submit',
            'title_reply'       => __( 'Compose Comment', 'hopscotch' ),                
            'cancel_reply_link' => '<span class="action-item">Cancel <span class="label-verb-subject">Compose</span></span>',
            'title_reply_to'    => __( 'Leave a Reply to %s', 'hopscotch' ),
            'label_submit'      => __( 'Post', 'hopscotch' ),
            'comment_notes_before' => '',
            'comment_field'     => '<div class="field field-comment"><div class="field-cr"><label for="comment">' . _x( 'Comment', 'noun', 'hopscotch' ) .
            '</label><div class="sudo-input-text sudo-input-text-comment" data-state-form-element="unfocused"><textarea id="comment" title="Comment" placeholder="Write message" name="comment" required aria-required="true">' .
            '</textarea></div></div>',

            'must_log_in'       => '<div class="comment-form-user-name">' .
            sprintf(
                __( '<span class="label">You must be</span> <a href="%s">signed in</a> to post a comment.' ),
                wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
            ) . '</div>',

            'logged_in_as'      => '<div class="comment-form-admin"><div class="comment-form-signed-in-as">' .
            sprintf(
            __( '<span class="label">Signed in as</span> <a class="signed-in-as-link" href="%1$s">%2$s</a></div>' .
            '<div class="action-items comment-form-action"><p class="assistive-text">Comment Form Actions</p><ul class="action-list comment-form-action-list"><li class="action-item action-exit comment-form-actio-exit"><a class="action-link exit-link comment-form-exit-link" href="%3$s" title="Sign out of this account">Sign out</a></ul></div>' ),
                admin_url( 'profile.php' ),
                $user_identity,
                wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
            ) . '</div>'
            ));
        ?>
        
        </div><!-- comments_ct -->
    
    </div>
</div><!-- comments_comp -->