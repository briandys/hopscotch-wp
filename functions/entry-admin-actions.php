<?php
// Article Entry Admin Actions
// Called from content.php

if ( ! function_exists( 'hopscotch_article_entry_admin_actions' ) ) :
    function hopscotch_article_entry_admin_actions() {        
        if ( current_user_can( 'edit_posts' ) ) : ?>
            
            <!--
            Component: Article Entry Admin Action
            Class: article-entry-admin_comp
            -->
            <div class="comp entry-admin_comp article-entry-admin_comp">
                <div class="cr entry-admin_cr article-entry-admin_cr">
                    <p class="accessible-name"><?php _e( 'Article Entry Admin Actions', 'hopscotch' ); ?></p>
                    <ul class="grp entry-admin_grp article-entry-admin_grp">
                        <?php edit_post_link( __( '<span class="label pred_label">Edit</span> <span class="label subj_label">Entry</span>', 'hopscotch' ), '<li class="item entry-admin_item article-entry-admin_item">', '</li>' ); ?>
                    </ul>
                </div>
            </div><!-- article-entry-admin_comp -->
        <?php endif;        
    }
endif;


// Comments Entry Admin Actions
// Called from functions > comments-item.php

if ( ! function_exists( 'hopscotch_comment_entry_admin_actions' ) ) :
    function hopscotch_comment_entry_admin_actions() {  
        if ( current_user_can('edit_posts') ) : ?>
            
            <!--
            Component: Comment Entry Admin Action
            Class: comment-entry-admin_comp
            -->
            <div class="comp entry-admin_comp comment-entry-admin_comp">
                <div class="cr entry-admin_cr comment-entry-admin_cr">
                    <p class="accessible-name"><?php _e( 'Comment Entry Admin Actions', 'hopscotch' ); ?></p>
                    <ul class="grp entry-admin_grp comment-entry-admin_grp">
                        <li class="item entry-admin_item comment-entry-admin_item">
                            <?php edit_comment_link( __( '<span class="label pred_label">Edit</span> <span class="label subj_label">Comment</span>', 'hopscotch' ),'  ','' ); ?>
                    </ul>
                </div>
            </div><!-- comment-entry-admin_comp -->
        <?php endif;
    }
endif;