<?php
if ( is_active_sidebar( 'content-sidebar' ) ) : ?>

    <!-- Sub-Constructor: Secondary Content -->
    <div class="comp secondary-content_comp">

        <section class="secondary-content_cr">

            <h3 class="accessible-name">Secondary Content</h3>

            <div class="secondary-content_ct">
                <aside class="sidebar content-sidebar_sidebar" role="complementary">

                    <div class="content-sidebar_cr">

                        <h4 class="accessible-name">Content Sidebar</h4>

                        <div class="content-sidebar_ct widget-area">
                            <?php dynamic_sidebar( 'content-sidebar' ); ?>
                        </div><!-- content-sidebar_ct -->

                    </div>

                </aside><!-- content-sidebar_sidebar -->
            </div><!-- secondary-content_ct -->

        </section>

    </div><!-- secondary-content_comp -->

<?php
endif;
?>