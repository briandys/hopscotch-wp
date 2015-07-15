<?php
if ( is_active_sidebar( 'masthead-sidebar' ) ) : ?>

<aside class="sidebar masthead-sidebar_sidebar" role="complementary">

    <div class="masthead-sidebar_cr">

        <h4 class="accessible-name">Masthead Sidebar</h4>

        <div class="masthead-sidebar_ct widget-area">
            <?php dynamic_sidebar( 'masthead-sidebar' ); ?>
        </div><!-- masthead-sidebar_ct -->

    </div>

</aside><!-- masthead-sidebar_sidebar -->

<?php
endif;
?>