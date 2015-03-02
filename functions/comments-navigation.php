<?php
if ( ! function_exists( 'hopscotch_comments_nav' ) ) :
    function hopscotch_comments_nav() {
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <nav class="nav content-nav_nav comments-nav_nav" role="navigation">
            <div class="cr comments-nav_cr">
                <h2 class="accessible-name"><?php _e( 'Comments Navigation', 'hopscotch' ); ?></h2>
                <ul class="nav-grp content-nav_nav-grp comments-nav_nav-grp">

                    <?php // Next
                    if ( get_next_comments_link() ) :
                    ?>
                    <li class="nav-item content-nav_nav-item comments-nav_nav-item next-comments-nav_nav-item">
                        <span class="label next-ct_label">
                            <?php next_comments_link( __( '<span class="label pred_label">Newer</span> <span class="label subj_label">Comments</span>', 'hopscotch' ) ); ?>
                        </span>
                    <?php endif; ?>

                    <?php // Previous
                    if ( get_previous_comments_link() ) :
                    ?>
                    <li class="nav-item content-nav_nav-item comments-nav_nav-item prev-comments-nav_nav-item">
                        <span class="label prev-ct_label">
                            <?php previous_comments_link( __( '<span class="label pred_label">Older</span> <span class="label subj_label">Comments</span>', 'hopscotch' ) ); ?>
                        </span>
                    <?php endif; ?>

                </ul>
            </div>
        </nav><!-- entry-nav_nav -->
        
        <?php
        endif;
    }
endif;