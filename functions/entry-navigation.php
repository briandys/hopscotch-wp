<?php
// Entry Navigation
// Navigates from Single Entry to Single Entry
// Displayed as Next Entry, Previous Entry Actions

if ( ! function_exists('hopscotch_entry_nav' ) ) :
	function hopscotch_entry_nav() {
        if ( get_previous_post_link() || get_next_post_link() ) : ?>
        <nav class="nav content-nav_nav entry-nav_nav" role="navigation">
            <div class="cr entry-nav_cr">
                <h2 class="accessible-name"><?php _e( 'Entry Navigation', 'hopscotch' ); ?></h2>
                <ul class="nav-grp content-nav_nav-grp entry-nav_nav-grp">

                    <?php // Next
                    if ( get_next_post_link() ) :
                    ?>
                    <li class="nav-item content-nav_nav-item entry-nav_nav-item next-entry-nav_nav-item">
                        <span class="label next-ct_label">
                            <span class="label pred_label"><?php _e( 'Next', 'hopscotch' ); ?></span>
                            <span class="label subj_label"><?php _e( 'Entry', 'hopscotch' ); ?></span>
                        </span>
                        <?php next_post_link( '%link', _x( '%title', 'Newer Entry', 'hopscotch' ) ); ?>
                    <?php endif; ?>

                    <?php // Previous
                    if ( get_previous_post_link() ) :
                    ?>
                    <li class="nav-item content-nav_nav-item entry-nav_nav-item prev-entry-nav_nav-item">     
                        <span class="label prev-ct_label">
                            <span class="label pred_label"><?php _e( 'Previous', 'hopscotch' ); ?></span>
                            <span class="label subj_label"><?php _e( 'Entry', 'hopscotch' ); ?></span>
                        </span>
                        <?php previous_post_link( '%link', _x( '%title', 'Older Entry', 'hopscotch' ) ); ?>
                    <?php endif; ?>

                </ul>
            </div>
        </nav><!-- entry-nav_nav -->
        <?php endif;
    }
endif;