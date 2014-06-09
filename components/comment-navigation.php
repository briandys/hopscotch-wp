<div class="action-items content-navigation comment-navigation comment-navigation-action" role="navigation">
    <p class="assistive-text"><?php _e( 'Comment Navigation', 'hopscotch' ); ?></p>
    <ul class="action-list comment-navigation-list">
        <?php if ( get_next_comments_link() ) : ?>
        <li class="action-item action-go-next">
            <span class="action-link action-go-next-link"><?php next_comments_link( __( 'Newer Comments', 'hopscotch' ) ); ?></span>
        </li>
        <?php endif; ?>
        <?php if ( get_previous_comments_link() ) : ?>
        <li class="action-item action-go-previous">
            <span class="action-link action-go-previous-link"><?php previous_comments_link( __( 'Older Comments', 'hopscotch' ) ); ?></span>
        </li>
        <?php endif; ?>
    </ul>
</div><!-- action-items -->