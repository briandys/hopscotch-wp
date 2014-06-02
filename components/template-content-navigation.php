<!--
Used for Page and Post Navigation
-->

<nav class="action-items content-navigation" role="navigation">
    <h1 class="assistive-text"><?php _e( 'Page Navigation', 'hopscotch' ); ?></h1>
    <ul class="acton-list content-navigation-list post-navigation-list">
        <?php if ( get_next_post_link() ) : ?>
        <li class="action-item action-go-previous">
            <?php next_post_link( '%link', _x( '%title', 'Next Post', 'hopscotch' ) ); ?>
        </li>
        <?php endif; ?>
        <?php if ( get_previous_post_link() ) : ?>
        <li class="action-item action-go-next">
            <?php previous_post_link( '%link', _x( '%title', 'Previous Post', 'hopscotch' ) ); ?>
        </li>
        <?php endif; ?>
    </ul>
</nav><!-- action-items -->