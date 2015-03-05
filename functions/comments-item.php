<?php
// Comments Item

if ( ! function_exists( 'hopscotch_comments_item' ) ) :
    function hopscotch_comments_item( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        extract( $args, EXTR_SKIP );

        if ( 'div' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'comment-entry_comp';
        } else {
            $tag = 'li';
            $add_below = 'comment-entry_comp';
        }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent-comment' ) ?> id="comment-<?php comment_ID() ?>">

        <?php if ( 'div' != $args['style'] ) : ?>
        <div id="comment-entry_comp-<?php comment_ID() ?>" class="comp entry_comp comment-entry_comp">
            <div class="cr entry_cr comment-entry_cr">
        <?php endif; ?>

                <header class="entry_hr comment-entry_hr">
                    <div class="cr entry-hr_cr comment-entry-hr_cr">

                        <div class="comp byline_comp comment-entry-byline_comp">
                            <div class="cr byline_cr comment-entry-byline_cr">

                                <div class="comp author_comp comment-entry-author_comp">
                                    <div class="author vcard cr author_cr comment-entry-author_cr">
                                        <span class="label pred_label"><?php _e( 'Comment by', 'hopscotch' ); ?></span>
                                        <a class="url fn n author_axn comment-entry-author_axn" rel="author" title="" href="">
                                            <span class="label subj_label author_label comment-entry-author_label"><?php comment_author_link(); ?></span>
                                            <div class="author-avatar">
                                                <a href="<?php if ( get_comment_author_url( $comment->comment_ID ) ) { echo get_comment_author_url( $comment->comment_ID ); } else echo '#'; ?>"><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?></a>
                                            </div><!-- author-avatar -->
                                        </a>
                                    </div>
                                </div><!-- entry-author_comp -->

                                <?php
                                // Comment Entry Published Timestamp
                                // Location: functions > entry-timestamp.php
                                hopscotch_comment_entry_published_timestamp();
                                ?>

                                <?php
                                // Comment Entry Admin Actions
                                // Location: functions > entry-admin-actions.php
                                hopscotch_comment_entry_admin_actions();
                                ?>

                            </div><!-- entry-byline_comp -->

                        </div>
                    </div>
                </header>

                <div class="entry_ct comment-entry_ct">
                    <div class="cr entry-ct_cr comment-entry-ct_cr">

                        <?php if ( $comment->comment_approved == '0' ) : ?>
                        <div class="notice comment-pending_notice">
                            <div class="cr comment-pending-notice_cr">
                                <p><?php _e('Thanks! Your comment will be reviewed for approval.', 'hopscotch') ?></p>
                            </div>
                        </div><!-- comment-pending_notice -->
                        <?php endif; ?>

                        <?php
                        // Comment Entry
                        comment_text()
                        ?>

                        <?php if ( comments_open() ) : ?>
                        <div class="axn-comp comment-entry-axn_axn-comp">
                            <div class="comment-entry-axn_axn-cr">
                                <p class="accessible-name"><?php _e( 'Comment Actions', 'hopscotch' ); ?></p>
                                <ul class="axn-grp comment-entry-axn_axn-grp">
                                    <li class="axn-item reply_axn-item comment-entry-reply-axn_axn-item">
                                        <?php comment_reply_link( array_merge( $args,
                                            array(
                                                'add_below'     => $add_below,
                                                'depth'         => 1,
                                                'max_depth'     => $args['max_depth'],
                                                'reply_text'    => '<span class="label pred_label"><span class="label verb_label">Reply</span> <span class="label prep_label">to</span></span> <span class="label subj_label">Comment</span>',
                                                'login_text'    => '<span class="label pred_label"><span class="label verb_label">Sign</span> <span class="label adv_label">in</span> <span class="label prep_label">to</span></span> <span class="label subj_label">post a reply.</span>'
                                            ) ) ); ?>
                                </ul>
                            </div>
                        </div><!-- comment-entry-axn_axn-comp -->
                        <?php endif; ?>

                    </div>
                </div><!-- comment-entry_ct -->

        <?php if ( 'div' != $args['style'] ) : ?>
            </div>
        </div><!-- comment-entry_comp -->
        <?php endif;
    }
endif;