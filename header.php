<?php
// The template for displaying the header
// Displays all of the head element and everything up until the Content Constructor.
// @package WordPress
// @subpackage HopScotch
// @since HopScotch 3.0
?>

<!doctype html>
<html id="top" class="no-js <?php hopscotch_html_class(); ?>" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        
        <!-- H5BP -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        
        <!--[if lt IE 9]>
        <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
        <![endif]-->
        
        <!-- H5BP Mobile -->
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="cleartype" content="on">
        
        <!-- Add to homescreen for Chrome on Android -->
        <meta name="mobile-web-app-capable" content="yes">
        
        <!-- iOS Home Screen -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?>">
        
        <script>( function(){ document.documentElement.className += ' hs-state__js--enabled' } )();</script>
        
        <?php wp_head(); ?>
    </head>
    
    
    <body <?php body_class(); ?>>
        
        <?php get_template_part( 'img/svg' ); ?>
        
        <!--[if lt IE 8]>
        <div class="notice browser-upgrade_notice">
            <div class="cr notice_cr">
                <p><?php $url = 'http://browsehappy.com/'; echo sprintf( __( 'You are using an <strong>outdated</strong> browser. Please <a href="%s">upgrade your browser</a> to improve your experience.', 'hopscotch' ), esc_url( $url ) ); ?></p>
            </div>
        </div>
        <![endif]-->

        <div class="hs-cr--screen">
            
            <!--
            Action: Show Content
            Class: show-content_axn
            -->
            <div class="comp show-content_comp">    
                <div class="cr show-content_cr">
                    <a class="axn show-content_axn" href="#content"><?php _e( 'Skip to content', 'hopscotch' ); ?></a>
                </div>
            </div><!-- show-content_comp -->
            
            <!--
            Constructor: Masthead
            Class: masthead
            -->
            <header id="masthead" class="comp masthead" role="banner">
  
                <div class="cr masthead_cr">
                  
                    <!--
                    Component: Web Product Header
                    Class: web-product-header_comp
                    -->
                    <div class="comp web-product-header_comp">
                        <div class="cr web-product-header_cr">
                            <h1 class="web-product_name web-product-header_name">
                                <a class="axn web-product-name_axn web-product-header-name_axn" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="Home">
                                    <span class="label web-product-name_label"><?php bloginfo( 'name' ); ?></span>
                                </a>
                            </h1>

                            <?php $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                            <p class="web-product_desc"><?php echo $description; ?></p>
                            <?php endif; ?>

                        </div>
                    </div><!-- web-product-header_comp -->

                    <div id="masthead_ct" class="ct masthead_ct hs-state__tree-nav--inactive" aria-expanded="false">
    
                        <!--
                        Action: Primary Navigation and Masthead Sidebar Toggle Action
                        Class: primary-nav-masthead-sidebar-toggle_axn
                        -->
                        <button id="primary-nav-masthead-sidebar-toggle_axn" class="axn toggle_axn primary-nav-masthead-sidebar-toggle_axn" title="Toggle Navigation and Sidebar">
                            <span class="label toggle_label"><?php _e( 'Toggle Navigation and Sidebar', 'hopscotch' ); ?></span>
                            <svg class="icon menu_icon" width="0" height="0"><use xlink:href="#menu_icon"></use></svg>
                            <svg class="icon dismiss_icon" width="0" height="0"><use xlink:href="#dismiss_icon"></use></svg>
                        </button><!-- primary-nav-masthead-sidebar-toggle_axn -->

                        <!--
                        Component: Primary Navigation and Masthead Sidebar Component
                        Class: primary-nav-masthead-sidebar_comp
                        -->
                        <div id="primary-nav-masthead-sidebar_comp" class="comp primary-nav-masthead-sidebar_comp" role="tree" aria-expanded="false">

                            <section class="cr primary-nav-masthead-sidebar_cr">

                                <h2 class="accessible-name primary-nav-masthead-sidebar_accessible-name"><?php _e( 'Primary Navigation and Masthead Sidebar', 'hopscotch' ); ?></h2>    
                                <div class="ct primary-nav-masthead-sidebar_ct">

                                    <?php
                                    // Primary and Social Navigation
                                    // Located at functions > primary-social-navigation.php
                                    hopscotch_primary_social_nav(); ?>

                                    <?php if ( is_active_sidebar( 'masthead-sidebar' )  ) : ?>
                                    <!--
                                    Sub-Constructor: Masthead Sidebar Component
                                    Class: masthead_sidebar
                                    -->
                                    <aside id="masthead_sidebar" class="sidebar masthead_sidebar" role="complementary">
                                        <div class="cr masthead-sidebar_cr">
                                            <h3 class="accessible-name masthead-sidebar_accessible-name"><?php _e( 'Masthead Sidebar', 'hopscotch' ); ?></h3>
                                            <div class="ct masthead-sidebar_ct widget-area">
                                                <?php dynamic_sidebar( 'masthead-sidebar' ); ?>
                                            </div><!-- masthead-sidebar_ct -->
                                        </div>
                                    </aside><!-- masthead_sidebar -->
                                    <?php endif; ?>

                                </div><!-- nav-sidebar-masthead_ct -->
                            </section>
                        </div><!-- nav-sidebar-masthead_comp -->
                    </div><!-- masthead_ct -->
                  </div>
                </header><!-- masthead -->

                <!--
                Constructor: Content
                Class: content
                -->
                <main id="content" class="comp content" role="main">
                    <section class="cr content_cr">