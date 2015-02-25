<?php
// Entry Comments Action

if ( ! function_exists( 'hopscotch_entry_comments_action' ) ) :
    function hopscotch_entry_comments_action() {
        
        $num_comments = get_comments_number();
        
        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) && ! $num_comments == 0 ) :
            
            $comment_count_class = 'ui-state_entry-comments--zero-comment';
            $number = (int) get_comments_number( get_the_ID() );

            if ( 1 === $number )
                $comment_count_class = 'ui-state_entry-comments--single-comment';
            elseif ( 1 < $number )
                $comment_count_class = 'ui-state_entry-comments--multiple-comments';

            echo '<div class="axn entry-comments-axn_axn ' . $comment_count_class . '>';
            ?>
                <div class="entry-comments-axn_cr">
                    <p class="accessible-name">Entry Comments Actions</p>
                    <ul class="axn_grp entry-comments-axn_axn-grp">
                        <li class="axn_item entry-comments-axn_axn-item">
                            <?php comments_popup_link(
                            __( '<span class="label pred_label">Write</span> <span class="label subj_label">Comment</span>', 'hopscotch' ),
                            __( '<span class="label pred_label">Show</span> <span class="label comment-count_label">One</span> <span class="label subj_label">Comment</span>', 'hopscotch' ),
                            __( '<span class="label pred_label">Show</span> <span class="label comment-count_label">%</span> <span class="label subj_label">Comments</span>', 'hopscotch' ),
                            'show-comments_axn',
                            '<div class="notice entry-comments_notice"><div class="notice-cr"><p>Comments are closed.</p></div></div><!-- notice -->' );
                            ?>
                    </ul>
                </div>
            </div><!-- entry-comments-axn_axn -->
        <?php
        endif;
    }
endif;