<?php
// Breadcrumb Navigation
// Displays the parent pages of a page

if ( ! function_exists( 'hopscotch_breadcrumb_nav' ) ) :
    function hopscotch_breadcrumb_nav() {    
        global $post;    
        if ( ( is_page() && $post->post_parent > 0 ) || is_search() ) {
            $ancestors = get_post_ancestors($post);
            if ( $ancestors ) {
                $ancestors = array_reverse($ancestors);
                ?>
                
                <!--
                Component: Breadcrumb Navigation
                Class: breadcrumb_nav
                -->
                <nav class="nav content_nav breadcrumb_nav">
                    <div class="cr content-nav_cr breadcrumb-nav_cr">
                        <h2 class="accessible-name breadcrumb-nav_accessible-name"><?php _e( 'Breadcrumb Navigation', 'hopscotch' ); ?></h2>
                        <ul class="grp content-nav_grp breadcrumb-nav_grp">
                        <?php
                        foreach ($ancestors as $crumb) {
                            echo '<li class="item content-nav_item breadcrumb-nav_item">';
                            echo '<a class="axn content-nav_axn breadcrumb-nav_axn" href="' . get_permalink($crumb) . '">' . get_the_title($crumb) . '</a>';
                        }
                        ?>
                        </ul>
                    </div>
                </nav><!--  breadcrumb_nav -->
            <?php
            }        
        }    
    }
endif;