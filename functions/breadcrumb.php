<?php
//------------------------- Breadcrumb Navigation
// Displays the parent pages of a page

function hopscotch_breadcrumb_nav() {    
    global $post;    
    if ( ( is_page() && $post->post_parent > 0 ) || is_search() ) {
        $ancestors = get_post_ancestors($post);
        if ( $ancestors ) {
            $ancestors = array_reverse($ancestors);
            ?>
            <nav class="nav content-nav_nav breadcrumb-nav_nav">
                <h2 class="accessible-name">Breadcrumb Navigation</h2>  
            <?php
            foreach ($ancestors as $crumb) {
                echo '<ul class="nav-grp content-nav_nav-grp breadcrumb-nav_nav-grp">';
                echo '<li class="nav-item content-nav_nav-item breadcrumb-nav_nav-item">';
                echo '<a class="content-nav_axn breadcrumb-nav_axn" href="' . get_permalink($crumb) . '">' . get_the_title($crumb) . '</a>';
                echo '</li>';
            }
            ?>
                </ul>
            </nav><!--  breadcrumb-nav_nav -->
        <?php
        }        
    }    
}