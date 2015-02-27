<?php
if ( is_active_sidebar( 'colophon-sidebar' ) ) : ?>

<aside class="sidebar colophon-sidebar_sidebar" role="complementary">

    <div class="colophon-sidebar_cr">

        <h3 class="accessible-name">Colophon Sidebar</h3>

        <div class="colophon-sidebar_ct widget-area">
            <?php dynamic_sidebar( 'colophon-sidebar' ); ?>
        </div><!-- colophon-sidebar_ct -->

    </div>

</aside><!-- colophon-sidebar_sidebar -->

<?php
endif;
?>