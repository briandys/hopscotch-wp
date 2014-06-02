<nav id="main-navigation" class="main-navigation" role="navigation">
    <div class="main-navigation-cr">
        <h2 id="main-navigation-control" class="main-navigation-heading" title="Main Navigation">
            <span class="label"><?php _e( 'Main Navigation', 'hopscotch' ); ?></span>
        </h2>
        <div class="main-navigation-ct">
            <a class="skip-to-content-link" href="#content" title="Skip to content"><?php _e( 'Skip to content', 'hopscotch' ); ?></a>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'div', 'container_class' => 'nav-menu', 'menu_class' => 'nav-menu' ) ); ?>
        </div>
    </div>
</nav><!-- main-navigation -->