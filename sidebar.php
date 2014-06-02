<?php if ( is_active_sidebar( 'sidebar-secondary' ) ) : ?>
<section id="secondary" class="sidebar-container secondary-sidebar-container" role="complementary">
    <h2 class="assistive-text">Secondary Content</h2>
    <div class="secondary-cr">
        
        <div class="widget-area">
            <?php dynamic_sidebar( 'sidebar-secondary' ); ?>
        </div><!-- widget-area -->
    
    </div>
</section><!-- sidebar-container -->
<?php endif; ?>