<div class="action-items content-navigation comment-navigation-action comment-navigation" role="navigation">
    <p class="assistive-text"><?php _e( 'Comment Navigation', 'hopscotch' ); ?></p>
    <ul class="acton-list content-navigation-list comment-navigation-list">
        <?php if ( get_next_comments_link() ) : ?>
        <li class="action-item action-go-next">
            <span class="label label-next"><?php next_comments_link( __( 'Newer Comments', 'hopscotch' ) ); ?></span>
        </li>
        <?php endif; ?>
        <?php if ( get_previous_comments_link() ) : ?>
        <li class="action-item action-go-previous">
            <span class="label label-previous"><?php previous_comments_link( __( 'Older Comments', 'hopscotch' ) ); ?></span>
        </li>
        <?php endif; ?>
    </ul>
</div><!-- action-items -->