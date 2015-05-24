<?php
// Article Entry Comments Actions
// Displays the Comment Link (with comment count)
// Called from content.php

if ( ! function_exists( 'hopscotch_article_entry_comments_actions' ) ) :
    function hopscotch_article_entry_comments_actions() {
        
        $num_comments = get_comments_number();
        
        $comment_count_class = 'hs-type__article-entry-comments--zero';
        $number = (int) get_comments_number( get_the_ID() );

        // Defines the class depending on the comment count
        if ( 1 === $number )
            $comment_count_class = 'hs-type__article-entry-comments--single';
        elseif ( 1 < $number )
            $comment_count_class = 'hs-type__article-entry-comments--multiple';
        
        // CSS Class for Closed or Open Comments
        if ( comments_open() )
            $comment_state_class = 'hs-state__article-entry-comments--open';
        else
            $comment_state_class = 'hs-state__article-entry-comments--closed';
        ?>

        <!--
        Component: Article Entry Comments Actions
        Class: article-entry-comments-actions_comp
        -->
        <div class="comp article-entry-comments-actions_comp <?php echo $comment_state_class .' '. $comment_count_class ?>">
            <div class="cr article-entry-comments-actions_cr">
                <p class="accessible-name article-entry-comments-actions_accessible-name">Entry Comments Actions</p>
                <ul class="grp article-entry-comments-actions_grp">
                    <li class="item article-entry-comments-actions_item">
                        <?php comments_popup_link(

                        // Zero comment
                        __( '<span class="label pred_label">Write</span> ' .
                            '<span class="label subj_label">Comment</span>', 'hopscotch' ),

                        // Single comment
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
        </div><!-- article-entry-comments-actions_comp -->
            
    <?php
    }
endif;