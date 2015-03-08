<?php
// Primary and Social Navigation
// Called from header.php

if ( ! function_exists( 'hopscotch_pri_social_nav' ) ) :
    function hopscotch_pri_social_nav() { ?>

        <!--
        Component Name: Primary Navigation
        Class Name: pri-nav_comp
        -->
        <nav id="pri-nav_comp" class="comp pri-nav_comp" role="navigation">
            <div class="cr pri-nav_cr">
                <h3 class="accessible-name"><?php _e( 'Primary Navigation', 'hopscotch' ); ?></h3>

                <?php
                if ( ! has_nav_menu( 'primary-navigation' ) ) {
                    wp_page_menu( array(
                        'menu_class'        => 'ct pri-nav_ct' // Used as <div> class when there is no Custom Menu
                    ) );
                } else {
                    wp_nav_menu( array(
                        'theme_location'    => 'primary-navigation',
                        'container'         => 'div',
                        'container_class'   => 'cr pri-nav_cr', // Used as <div> class when there is a Custom Menu
                        'menu_class'        => 'grp pri-nav_grp' // Used as <ul> class when there is a Custom Menu
                    ) );
                }
                ?>

            </div>
        </nav><!-- pri-nav_nav -->

        <?php if ( has_nav_menu( 'social-navigation' ) ) : ?>
            
            <!--
            Component Name: Social Navigation
            Class Name: social-nav_comp
            -->
            <nav id="social-nav_comp" class="comp social-nav_comp" role="navigation">
                <div class="cr social-nav_cr">
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
            </nav><!-- social-nav_comp -->
        <?php endif;

    }
endif;


// Show Home Primary Navigation Item by Default
function hopscotch_pri_nav_add_home_nav_item( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'hopscotch_pri_nav_add_home_nav_item' );