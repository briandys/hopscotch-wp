<?php
// Article Entry Admin Actions
// Called from content.php

if ( ! function_exists( 'hopscotch_article_entry_admin_actions' ) ) :
    function hopscotch_article_entry_admin_actions() {        
        if ( current_user_can( 'edit_posts' ) ) : ?>
            <div class="comp admin-axn_comp article-entry--admin-axn_comp">
                <div class="cr admin-axn_cr article-entry--admin-axn_cr">
                    <p class="accessible-name"><?php _e( 'Entry Admin Actions', 'hopscotch' ); ?></p>
                    <ul class="grp admin-axn_grp article-entry--admin-axn_grp">
                        <?php edit_post_link( __( '<span class="label pred_label">Edit</span> <span class="label subj_label">Entry</span>', 'hopscotch' ), '<li class="item admin-axn_item article-entry--admin-axn_item">', '</li>' ); ?>
                    </ul>
                </div>
            </div><!-- article-entry--admin-axn_comp -->
        <?php endif;        
    }
endif;


// Comments Entry Admin Actions
// Called from functions > comments-item.php

if ( ! function_exists( 'hopscotch_comment_entry_admin_actions' ) ) :
    function hopscotch_comment_entry_admin_actions() {  
        if ( current_user_can('edit_posts') ) : ?>
            <div class="comp admin-axn_comp comment-entry--admin-axn_comp">
                <div class="cr admin-axn_axn-cr comment-entry--admin-axn_cr">
                    <p class="accessible-name"><?php _e( 'Comment Admin Actions', 'hopscotch' ); ?></p>
                    <ul class="grp admin-axn_grp comment-entry--admin-axn_axn-grp">
                        <li class="item admin-axn_item edit-axn-item comment-entry--edit-axn_item">
                            <?php edit_comment_link( __( '<span class="label pred_label">Edit</span> <span class="label subj_label">Comment</span>', 'hopscotch' ),'  ','' ); ?>
                    </ul>
                </div>
            </div><!-- comment-entry--admin-axn_comp -->
        <?php endif;
    }
endif;