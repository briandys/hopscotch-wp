<div class="action-items entry-action entry-user-action">
    <ul class="action-list entry-action-list">
        
        <!-- Comment on Entry -->
        <li class="action-item action-comment action-comment-entry entry-user-action--action-item">
            <?php comments_popup_link(
            __( '<span class="comment-zero"><span class="label">Comment</span></span>', 'hopscotch' ),
            __( '<span class="comment-one"><span class="counter comment-counter">1</span> <span class="label">Comment</span></span>', 'hopscotch' ),
            __( '<span class="comment-multiple"><span class="counter comment-counter">%</span> <span class="label">Comments</span></span>', 'hopscotch' ),
            'action-link comment-entry-link entry-user-action--action-link', '<span class="comment-closed"><span class="label" data-state="inactive">Comments are closed.</span></span>' );
            ?>    
    </ul>
</div><!-- action-items -->