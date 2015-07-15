<?php
if ( is_active_sidebar( 'content-sidebar' ) ) : ?>

<aside class="sidebar content-sidebar_sidebar" role="complementary">

    <div class="content-sidebar_cr">

        <h4 class="accessible-name">Content Sidebar</h4>

        <div class="content-sidebar_ct widget-area">
            <?php dynamic_sidebar( 'content-sidebar' ); ?>
        </div><!-- content-sidebar_ct -->

    </div>

</aside><!-- content-sidebar_sidebar -->

<?php
endif;
?>