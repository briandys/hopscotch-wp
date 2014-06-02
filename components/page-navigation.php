<nav class="action-items content-navigation page-navigation-action page-navigation" role="navigation">
    <h1 class="assistive-text"><?php _e( 'Page Navigation', 'hopscotch' ); ?></h1>
    <ul class="acton-list content-navigation-list page-navigation-list">
        <?php if ( get_next_posts_link() ) : ?>
        <li class="action-item action-go-previous">
            <?php next_posts_link( __( '<span class="label" title="Older Posts">Older Posts</span>', 'hopscotch' ) ); ?>
        </li>
        <?php endif; ?>
        <?php if ( get_previous_posts_link() ) : ?>
        <li class="action-item action-go-next">
            <?php previous_posts_link( __( '<span class="label" title="Newer Posts">Newer Posts</span>', 'hopscotch' ) ); ?>
        </li>
        <?php endif; ?>
    </ul>
</nav><!-- action-items -->