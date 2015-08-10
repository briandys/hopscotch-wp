<?php if ( is_active_sidebar( 'content-sidebar' ) ) : ?>
    
    <!--
    Sub-Constructor: Content Sidebar
    Class: content_sidebar
    -->
    <aside id="content_sidebar" class="sidebar content_sidebar" role="complementary">
        <div class="cr content-sidebar_cr">
            <h3 class="accessible-name content-sidebar_accessible-name"><?php _e( 'Content Sidebar', 'hopscotch'); ?></h3>
            <div class="ct content-sidebar_ct widget-area">
                <?php                
                // Sidebar
                dynamic_sidebar( 'content-sidebar' );
                ?>
            </div><!-- content-sidebar_ct -->
        </div>
    </aside><!-- content_sidebar -->

<?php endif; ?>