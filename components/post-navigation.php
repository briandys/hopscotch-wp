<?php if ( get_previous_post_link() || get_next_post_link() ) : ?>
<nav class="action-items content-navigation post-navigation-action post-navigation" role="navigation">
    <div class="content-navigation-cr">
        <h1 class="assistive-text"><?php _e( 'Page Navigation', 'hopscotch' ); ?></h1>
        <ul class="acton-list content-navigation-list post-navigation-list">

            <?php // Previous
            if ( get_previous_post_link() ) :
            ?>
            <li class="action-item action-go-previous">
                <span class="label label-previous">Previous entry</span> <?php previous_post_link( '%link', _x( '%title', 'Previous Post', 'hopscotch' ) ); ?>
            <?php endif; ?>

            <?php // Next
            if ( get_next_post_link() ) :
            ?>
            <li class="action-item action-go-next">
                <span class="label label-next">Next entry</span> <?php next_post_link( '%link', _x( '%title', 'Next Post', 'hopscotch' ) ); ?>
            <?php endif; ?>
        </ul>
    </div>
</nav><!-- action-items -->
<?php endif; ?>