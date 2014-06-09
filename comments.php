<?php
if ( post_password_required() )
	return;
?>

<section id="comments" class="comments">
    <div class="comments-cr">
        <header class="comments-hr">
            <h3 class="comments-heading">Comments</h3>
        </header>
        <div class="comments-ct">
            
            <?php if ( have_comments() ) : ?>
            
                <ol class="comment-list">
                    <?php
                        wp_list_comments( array(
                            'style'      => 'ol',
                            'short_ping' => true,
                            'avatar_size'=> 72,
                            'callback' => 'hopscotch_comments'
                        ) );
                    ?>
                </ol><!-- .comment-list -->

                <?php if ( ! comments_open() ) : ?>
                <div class="blank"><div class="blank-cr"><?php _e( 'Comments are closed.', 'hopscotch' ); ?></div></div>
                <?php endif; ?>

                <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>            
                    <?php get_template_part( ''.hopscotch_components_directory().'/comment-navigation' ); ?>            
                <?php endif; ?>
            
            <?php else : ?>
            
            <div class="blank"><div class="blank-cr">No comment yet.</div></div>
            
            <?php endif; ?>
            
            <?php comment_form( array(
                'id_form'           => 'comment-form',
                'id_submit'         => 'submit',
                'title_reply'       => __( 'Compose Comment' ),                
                'cancel_reply_link' => '<span class="action-item">Cancel <span class="label-verb-subject">Compose</span></span>',
                'title_reply_to'    => __( 'Leave a Reply to %s' ),
                'label_submit'      => __( 'Post' ),
                'comment_notes_before' => '',
                'comment_field'     => '<div class="field field-comment"><div class="field-cr"><label for="comment">' . _x( 'Comment', 'noun' ) .
                '</label><textarea id="comment" title="Comment" placeholder="Write message" name="comment" required aria-required="true">' .
                '</textarea></div>',
                
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
        
        </div><!-- .comments-ct -->
    </div><!-- .comments-cr -->
</section><!-- .comments -->