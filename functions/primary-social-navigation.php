<?php
// Primary and Social Navigation
// Called from header.php

if ( ! function_exists( 'hopscotch_primary_social_nav' ) ) :
    function hopscotch_primary_social_nav() { ?>

        <!--
        Sub-Constructor: Primary Navigation
        Class: primary_nav
        -->
        <nav id="primary_nav" class="nav primary_nav" role="navigation">
            <div class="cr primary-nav_cr">
                <h3 class="accessible-name primary-nav_accessible-name"><?php _e( 'Primary Navigation', 'hopscotch' ); ?></h3>

                <?php
                if ( ! has_nav_menu( 'primary-navigation' ) ) {
                    wp_page_menu( array(
                        'menu_class'        => 'ct primary-nav_ct' // Used as <div> class when there is no Custom Menu
                    ) );
                } else {
                    wp_nav_menu( array(
                        'theme_location'    => 'primary-navigation',
                        'container'         => 'div',
                        'container_class'   => 'ct primary-nav_ct', // Used as <div> class when there is a Custom Menu
                        'menu_class'        => 'grp primary-nav_grp' // Used as <ul> class when there is a Custom Menu
                    ) );
                }
                ?>

            </div>
        </nav><!-- primary_nav -->

        <?php if ( has_nav_menu( 'social-navigation' ) ) : ?>
            
            <!--
            Sub-Constructor: Social Navigation
            Class: social_nav
            -->
            <nav id="social_nav" class="nav social_nav" role="navigation">
                <div class="cr social-nav_cr social-nav_accessible-name">
                    <h3 class="accessible-name"><?php _e( 'Social Navigation', 'hopscotch' ); ?></h3>

                    <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'social-navigation',
                        'container'         => 'div',
                        'container_class'   => 'ct social-nav_ct',
                        'menu_class'        => 'grp social-nav_grp',
                        'depth'             => '1'
                    ) );
                    ?>

                </div>
            </nav><!-- social_nav -->
        <?php endif;

    }
endif;


// Show Home Primary Navigation Item by Default
function hopscotch_primary_nav_add_home_nav_item( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'hopscotch_primary_nav_add_home_nav_item' );