<?php
// Article Entry Comments Actions
// Displays the Comment Link (with comment count)
// Called from content.php

if ( ! function_exists( 'hopscotch_article_entry_comments_actions' ) ) :
    function hopscotch_article_entry_comments_actions() { ?>

        <!--
        Component: Article Entry Comments Actions
        Class: article-entry-comments-actions_comp
        -->
        <div class="comp article-entry-comments-actions_comp">
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
                            __( '<p class="note closed-comments_note article-entry-closed-comments_note">Comments are closed.</p>' )
                        );
                        ?>
                </ul>
            </div>
        </div><!-- article-entry-comments-actions_comp -->
            
    <?php
    }
endif;