<?php
// Article Entry Comments Actions
// Displays the Comment Link (with comment count)
// Called from content.php

if ( ! function_exists( 'hopscotch_article_entry_comments_actions' ) ) :
    function hopscotch_article_entry_comments_actions() {
        
        $num_comments = get_comments_number();
        
        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) && ! $num_comments == 0 ) :
            
            $comment_count_class = 'ui-cond_article-entry-comments--blank';
            $number = (int) get_comments_number( get_the_ID() );

            // Defines the class depending on the comment count
            if ( 1 === $number )
                $comment_count_class = 'ui-cond_article-entry-comments--single';
            elseif ( 1 < $number )
                $comment_count_class = 'ui-cond_article-entry-comments--multiple';
            ?>
            <div class="comp article-entry-comments_comp <?php echo $comment_count_class ?>">
                <div class="cr article-entry-comments_cr">
                    <p class="accessible-name">Entry Comments Actions</p>
                    <ul class="grp article-entry-comments_grp">
                        <li class="item article-entry-comments_item">
                            <?php comments_popup_link(
                            
                            // Zero comment
                            __( '<span class="label pred_label">Write</span> ' .
                                '<span class="label subj_label">Comment</span>', 'hopscotch' ),
                            
                            // One comment
                            __( '<span class="label pred_label">' .
                                '<span class="label verb_label">Show</span> ' .
                                '<span class="label comment-count_label">One</span>' .
                                '</span> ' .
                                '<span class="label subj_label">Comment</span>', 'hopscotch' ),
                            
                            // Multiple comments
                            __( '<span class="label pred_label">' .
                                '<span class="label verb_label">Show</span> ' .
                                '<span class="label comment-count_label">%</span> ' .
                                '</span> ' .
                                '<span class="label subj_label">Comments</span>', 'hopscotch' ),
                            
                            'show-comments_axn',
                            
                            // Notice for closed comments
                            '<div class="notice article-entry-comments_notice">' .
                            '<div class="cr article-entry-comments-notice_cr">' .
                            '<p>Comments are closed.</p>' .
                            '</div>' .
                            '</div><!-- article-entry-comments_notice -->' );
                            ?>
                    </ul>
                </div>
            </div><!-- article-entry-comments_comp -->
        <?php
        endif;
    }
endif;