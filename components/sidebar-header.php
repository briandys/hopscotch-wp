<?php if ( is_active_sidebar( 'sidebar-header' ) ) : ?>
<section id="header-sidebar" class="sidebar header-sidebar" role="complementary">
    <div class="header-sidebar-cr">
        <h2 class="header-sidebar-heading">Header Content</h2>
        <div class="widget-area">            
            <?php dynamic_sidebar( 'sidebar-header' ); ?>                        
        </div><!-- widget-area -->        
    </div>
</section><!-- header-sidebar -->
<?php endif; ?>