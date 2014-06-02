<?php if ( is_active_sidebar( 'sidebar-header' ) ) : ?>
<section id="header-sidebar" class="sidebar-container header-sidebar-container" role="complementary">
    <h2 class="assistive-text">Header Content</h2>
    <div class="header-sidebar-cr">
        
        <div class="widget-area">            
            <?php dynamic_sidebar( 'sidebar-header' ); ?>                        
        </div><!-- widget-area -->
        
    </div>
</section><!-- sidebar-container -->
<?php endif; ?>