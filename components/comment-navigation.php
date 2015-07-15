<nav class="action-items content-navigation entry-navigation comment-nav" role="navigation">
    <div class="content-navigation-cr">
        <h1 class="assistive-text"><?php _e( 'Comment Navigation', 'hopscotch' ); ?></h1>
        <ul class="action-list content-navigation-list entry-navigation-list comment-nav-list">
            <?php
            if ( get_next_comments_link() ) :
            ?>
            <li class="action-item action-go-next entry-navigation--next--action-item">
                <span class="label label-next">Newer Comments</span> <?php next_comments_link( __( 'Newer Comments', 'hopscotch' ) ); ?>
            <?php endif; ?>
            <?php
            if ( get_previous_comments_link() ) :
            ?>
            <li class="action-item action-go-previous entry-navigation--previous--action-item">
                <span class="label label-previous">Older Comments</span> <?php previous_comments_link( __( 'Older Comments', 'hopscotch' ) ); ?>
            <?php endif; ?>
        </ul>
    </div>
</nav><!-- action-items -->