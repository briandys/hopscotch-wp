<?php if ( is_active_sidebar( 'sidebar-tertiary' ) ) : ?>
<section id="tertiary" class="sidebar-container tertiary-sidebar-container" role="complementary">
    <h2 class="assistive-text">Tertiary Content</h2>
    <div class="tertiary-cr">
        
        <div class="widget-area">            
            <?php dynamic_sidebar( 'sidebar-tertiary' ); ?>                        
        </div><!-- widget-area -->
        
    </div>
</section><!-- sidebar-container -->
<?php endif; ?>