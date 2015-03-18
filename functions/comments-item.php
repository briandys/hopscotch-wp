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
                                        <a class="axn author_axn comment-entry-author_axn url fn n" rel="author" title="" href="">
                                            <span class="label subj_label author_label comment-entry-author_label"><?php comment_author_link(); ?></span>
                                            <div class="author-avatar">
                                                <a href="<?php if ( get_comment_author_url( $comment->comment_ID ) ) { echo get_comment_author_url( $comment->comment_ID ); } else echo '#'; ?>"><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?></a>
                                            </div><!-- author-avatar -->
                                        </a>
                                    </div>
                                </div><!-- entry-author_comp -->

                                <?php
                                // Comment Entry Published Timestamp
                                // The date and time the comment was published.
                                
                                // Structure
                                $timestamp_comp_string = '<div class="comp timestamp_comp comment-entry--published--timestamp_comp">';
                                $timestamp_comp_string .= '<div class="cr timestamp_cr comment-entry--published--timestamp_cr">';
                                $timestamp_comp_string .= '<span class="label pred_label">%1$s</span> ';
                                $timestamp_comp_string .= '<a class="timestamp_axn" href="%2$s" title="Comment Permalink on %4$s" rel="bookmark">%3$s</a>';
                                $timestamp_comp_string .= '</div>';
                                $timestamp_comp_string .= '</div><!-- comment-entry--published--timestamp_comp -->';

                                // Published timestamp
                                $time_string = '<time class="timestamp_datetime datetime="%1$s">';
                                $time_string = '<span class="label subj_label timestamp-date_label">';
                                $time_string .= '<span class="label timestamp-day_label">%2$s</span> ';
                                $time_string .= '<span class="label timestamp-month_label">%3$s</span> ';
                                $time_string .= '<span class="label timestamp-year_label">%4$s</span>';
                                $time_string .= '<span class="label comma_label">,</span> ';
                                $time_string .= '<span class="label timestamp-time_label">%5$s</span>';
                                $time_string .= '</span>';
                                $time_string .= '</time>';

                                $time_string = sprintf( $time_string,
                                    esc_attr( get_comment_date( 'c' ) ), // 1: For Published datetime attribute
                                    get_comment_date( 'j' ), // 2: For Published Date
                                    get_comment_date( 'F' ), // 3: For Published Month
                                    get_comment_date( 'Y' ), // 4: For Published Year
                                    get_comment_time( 'H:i' ) // 5: For Published Time
                                );

                                printf( $timestamp_comp_string,
                                    _x( '<span class="label adj_label">Commented</span> <span class="label prep_label">on</span>', 'Used for entry publish date.', 'hopscotch' ),
                                    htmlspecialchars( get_comment_link( $comment->comment_ID ) ),
                                    $time_string,
                                    get_the_title()
                                );
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

                        <?php if ( comments_open() && get_option( 'thread_comments' ) ) : ?>
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