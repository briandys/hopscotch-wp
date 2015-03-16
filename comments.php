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

<!--
Component: Comments
Class: comments_comp
-->
<div id="comments" class="comp comments_comp">
    <section class="cr comments_cr">
        
        <h4 class="accessible_name"><?php _e( 'Comments', 'hopscotch' ); ?></h4>
        <div class="ct comments_ct">
            
            <!--
            Component: Comments Count
            Class: comments-count_comp
            -->
            <div class="comp comments-count_comp">
                <div class="cr comments-count_cr">
                    <p>
                        <?php printf( _nx(
                            
                            // One comment
                            '<span class="label pred_label">' .
                            '<span class="label comments-count_label">One</span> ' .
                            '<span class="label noun_label">Comment</span> ' .
                            '<span class="label prep_label">on</span> ' .
                            '</span> ' .
                            '<span class="label subj_label article-entry_label">%2$s</a>',
                            
                            // More than one comment
                            '<span class="label pred_label">' .
                            '<span class="label comments-count_label">%1$s</span> ' .
                            '<span class="label noun_label">Comments</span> ' .
                            '<span class="label prep_label">on</span> ' .
                            '</span> ' .
                            '<span class="label subj_label article-entry-title_label">%2$s</a>',
                            
                            get_comments_number(),
                            'comments title', 'hopscotch' ),
                            number_format_i18n( get_comments_number() ),
                            get_the_title() );
                        ?>
                    </p>
                </div>
            </div><!-- comments-count_comp -->
            
            <?php // If there are comments
            if ( have_comments() ) : ?>

                <ol class="grp comments_grp">
                <?php
                wp_list_comments( array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size'=> 48,
                    'callback' => 'hopscotch_comments_item'
                ) );
                ?>
                </ol><!-- comments_grp -->

                <?php // If there are comments but Comments is closed
                if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
                    <!--
                    Component: Closed Comments
                    Class: closed-comments_notice
                    -->
                    <div class="notice closed-comments_notice">
                        <div class="cr closed-comments-notice_cr">
                            <p><?php _e( 'Comments are closed.', 'hopscotch' ); ?></p>
                        </div>
                    </div><!-- closed-comments_notice -->
                <?php endif; ?>

                <?php
                // Comments Entry Navigation
                // Location: functions > entry-navigation.php
                hopscotch_comments_entry_nav();
                ?>

            <?php // If there are no comments
            else : ?>

                <!--
                Component: Blank Comments
                Class: blank-comments_notice
                -->
                <div class="notice blank-comments_notice">
                    <div class="cr notice_cr">
                        <p>There are no comments yet.</p>
                    </div>
                </div><!-- blank-comments_notice -->

            <?php endif; ?>            

            <?php
            // Comment Form
            // Location: functions > comment-form.php

            comment_form( array(
                'id_form'                   => 'comment_form',
                'id_submit'                 => 'submit_axn',
                'title_reply'               => __( 'Compose Comment', 'hopscotch' ),                

                // Cancel Reply Action
                'cancel_reply_link'         => '<span class="label pred_label">Cancel</span> <span class="label subj_label">Compose Comment</span></span>',

                'title_reply_to'            => __( 'Leave a Reply to %s', 'hopscotch' ),
                'label_submit'              => __( 'Post', 'hopscotch' ),
                'comment_notes_before'      => '',
                'comment_field'             => '<div class="field comment_field">' .
                                            '<div class="field_cr comment-field_cr">' .
                                            '<label for="comment">' .
                                            __( 'Comment', 'hopscotch' ) .
                                            '</label>' .
                                            '<textarea id="comment_textarea" class="text_input" name="comment" title="Comment" placeholder="Please leave a comment." required aria-required="true">' .
                                            '</textarea>' .
                                            '</div>' .
                                            '</div><!-- field -->',

                'must_log_in'               => '<div class="notice comment-sign-in_notice">' .
                                            '<div class="cr comment-sign-in-notice_cr">' .
                                            sprintf(
                                                __( '<p><a class="comment-sign-in_axn" href="%s">Sign in to post a comment.</a></p>' ),
                                                wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
                                                ) .
                                            '</div>' .
                                            '</div><!-- comment-sign-in_notice -->',

                'logged_in_as'              => '<div class="comp comment-admin_comp">' .
                                            '<div class="cr comment-admin_cr">' .
                                            sprintf(
                                                __( '<div class="comp comment-admin-sign-in_comp"> ' .
                                                   '<div class="cr comment-admin-sign-in_cr"> ' .
                                                   '<span class="label pred_label">Signed in as</span> ' .
                                                   '<a class="axn comment-admin-sign-in_axn" href="%1$s"><span class="label subj_label">%2$s</span></a>' .
                                                   '</div>' .
                                                   '</div><!-- comment-admin-sign-in_comp -->' .
                                                   '<div class="comp comment-form-admin-actions_comp">' .
                                                   '<div class="cr comment-form-admin-actions_cr">' .
                                                   '<p class="accessible-name">Comment Form Admin Actions</p>' .
                                                   '<ul class="grp comment-form-admin-actions_grp">' .
                                                   '<li class="item sign-out_item comment-form-admin-actions-sign-out_item">' .
                                                   '<a class="axn sign-out_axn comment-form-admin-actions-sign-out_axn" href="%3$s" title="Sign out of this account.">Sign Out</a>' .
                                                   '</li>' .
                                                   '</ul>' .
                                                   '</div>' .
                                                   '</div><!-- comment-admin-sign-in_comp -->' ),
                                                admin_url( 'profile.php' ),
                                                $user_identity,
                                                wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
                                                ) .
                                            '</div>' .
                                            '</div><!-- comment-admin_comp -->'
                ) );
            ?>
        
        </div><!-- comments_ct -->
    
    </section>
</div><!-- comments_comp -->