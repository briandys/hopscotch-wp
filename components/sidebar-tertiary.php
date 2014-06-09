<?php if ( is_active_sidebar( 'sidebar-tertiary' ) ) : ?>
<section id="tertiary-sidebar" class="sidebar tertiary-sidebar" role="complementary">
    <div class="tertiary-sidebar-cr">
        <h2 class="tertiary-sidebar-heading">Tertiary Content</h2>        
        <div class="widget-area">            
            <?php dynamic_sidebar( 'sidebar-tertiary' ); ?>                        
        </div><!-- widget-area -->        
    </div>
</section><!-- tertiary-sidebar -->
<?php endif; ?>