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
                <?php // If Commenting is disabled but there is at least 1 comment, show
                if ( comments_open() || ( ! comments_open() && (int) get_comments_number( get_the_ID() ) >= 1 ) ) : ?>                
                
                <p class="accessible-name article-entry-comments-actions_accessible-name">Entry Comments Actions</p>                
                <ul class="grp article-entry-comments-actions_grp">
                    
                    <?php
                    $comment_count_css_class = 'hs-type__comments-actions-item--axn';
                    $number = (int) get_comments_number( get_the_ID() );

                    if ( 1 === $number )
                        $comment_count_css_class = 'hs-type__comments-actions-item--single';
                    elseif ( 1 < $number )
                        $comment_count_css_class = 'hs-type__comments-actions-item--multiple';                                    
                     ?>
                    
                    <li class="item article-entry-comments-actions_item <?php echo $comment_count_css_class; ?>">

                    <?php comments_popup_link(
                        // Zero comment
                        __( '<span class="label pred_label">Write</span> ' .
                            '<span class="label subj_label">Comment</span>', 'hopscotch' ),

                        // Single comment
                        __( '<span class="label pred_label">' .
                            '<span class="label verb_label">Show</span> ' .
                            '<span class="label comment-count_label">1</span>' .
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
                        __( '<p class="note commenting-disabled_note article-entry-commenting-disabled_note">Commenting is disabled.</p>' )
                    );
                    ?>
                </ul>                
                
                <?php else : ?>                
                
                <p class="note commenting-disabled_note article-entry-commenting-disabled_note"><?php _e( 'Commenting is disabled.', 'hopscotch' ); ?></p>                
                
                <?php
                endif; ?>
            </div>
        </div><!-- article-entry-comments-actions_comp -->
            
    <?php
    }
endif;