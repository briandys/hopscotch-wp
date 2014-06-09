<?php if ( is_active_sidebar( 'sidebar-secondary' ) && ! is_page() ) : ?>
<section id="secondary-sidebar" class="sidebar secondary-sidebar" role="complementary">
    <div class="secondary-sidebar-cr">
        <h2 class="secondary-sidebar-heading">Secondary Content</h2>
        <div class="widget-area">
            <?php dynamic_sidebar( 'sidebar-secondary' ); ?>
        </div><!-- widget-area -->    
    </div>
</section><!-- secondary-sidebar -->
<?php endif; ?>