<nav id="main-navigation" class="main-navigation <?php hopscotch_main_nav_class(); ?>" role="navigation">
    <div class="main-navigation-cr">
        <h2 id="main-navigation-heading" class="main-navigation-heading" title="Main Navigation">
            <span class="label"><?php _e( 'Main Navigation', 'hopscotch' ); ?></span>
            <span class="svg-icon-cr"><svg class="icon icon-menu" width="0" height="0" viewBox="0 0 48 48"><use xlink:href="#icon-menu"></use></svg></span>
        </h2>
        <div class="main-navigation-ct">
            <a class="skip-to-content-link" href="#primary-content" title="Skip to content"><?php _e( 'Skip to content', 'hopscotch' ); ?></a>
            <?php
            wp_nav_menu( array(
                'theme_location'    => 'primary',
                'container'         => 'div',
                'container_class'   => 'nav-menu',
                'menu_class'        => 'nav-menu'
            ) );
            ?>
        </div>
    </div>
</nav><!-- main-navigation -->