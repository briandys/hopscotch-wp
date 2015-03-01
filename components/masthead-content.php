<?php
if ( has_nav_menu( 'primary-navigation' ) || has_nav_menu( 'social-navigation' ) || is_active_sidebar( 'masthead-sidebar' )  ) : ?>

<div id="masthead_ct" class="masthead_ct">
<?php get_template_part( 'components/primary-navigation-toggle-action' ); ?>

<!-- Component: Navigation and Sidebar Masthead Component -->
<div id="nav-sidebar-masthead_comp" class="comp nav-sidebar-masthead_comp ui-state__nav-sidebar-masthead--inactive" aria-expanded="false">

    <section class="nav-sidebar-masthead_cr">

        <h2 class="accessible-name">Masthead Navigation and Sidebar</h2>    

        <div class="nav-sidebar-masthead_ct">
            
            <?php get_template_part( 'components/navigation-primary-social' ); ?>
            
            <aside class="sidebar masthead-sidebar_sidebar" role="complementary">

                <div class="masthead-sidebar_cr">

                    <h3 class="accessible-name">Masthead Sidebar</h3>

                    <div class="masthead-sidebar_ct widget-area">
                        <?php dynamic_sidebar( 'masthead-sidebar' ); ?>
                    </div><!-- masthead-sidebar_ct -->

                </div>

            </aside><!-- masthead-sidebar_sidebar -->
            
        </div><!-- nav-sidebar-masthead_ct -->

    </section>

</div><!-- nav-sidebar-masthead_comp -->

</div><!-- masthead_ct -->

<?php endif; ?>