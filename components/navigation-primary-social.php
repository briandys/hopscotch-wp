<!--
Component Name: Primary Navigation
Class Name: pri-nav_nav
-->
<nav id="pri-nav_nav" class="nav pri-nav_nav" role="navigation">
    
    <div class="pri-nav_cr">
        
        <h3 class="accessible-name"><?php _e( 'Primary Navigation', 'hopscotch' ); ?></h3>
        
        <?php
        if ( ! has_nav_menu( 'primary-navigation' ) ) {
            wp_page_menu( array(
                'menu_class'        => 'pri-nav_ct' // Used as <div> class when there is no Custom Menu
            ) );
        } else {
            wp_nav_menu( array(
                'theme_location'    => 'primary-navigation',
                'container'         => 'div',
                'container_class'   => 'pri-nav_ct', // Used as <div> class when there is a Custom Menu
                'menu_class'        => 'nav-grp pri-nav_nav-grp' // Used as <ul> class when there is a Custom Menu
            ) );
        }
        ?>

    </div>

</nav><!-- pri-nav_nav -->


<!--
Component Name: Social Navigation
Class Name: social-nav_nav
-->
<nav id="social-nav_nav" class="nav social-nav_nav" role="navigation">
    
    <div class="social-nav_cr">
        
        <h3 class="accessible-name"><?php _e( 'Social Navigation', 'hopscotch' ); ?></h3>
        
        <?php
        if ( has_nav_menu( 'social-navigation' ) ) {
            wp_nav_menu( array(
                'theme_location'    => 'social-navigation',
                'container'         => 'div',
                'container_class'   => 'social-nav_ct',
                'menu_class'        => 'nav-grp social-nav_nav-grp',
                'depth'             => '1'
            ) );
        }
        ?>

    </div>

</nav><!-- social-nav_nav -->