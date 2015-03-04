<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the Content Constructor.
 *
 * @package WordPress
 * @subpackage HopScotch
 * @since HopScotch 3.0
 */
?>

<!DOCTYPE html>
<html id="html" class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        
        <!-- H5BP -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        
        <!--[if lt IE 9]>
        <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
        <![endif]-->
        <script>(function(){document.documentElement.className='js'})();</script>
        
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
        
        <?php wp_head(); ?>
    </head>
    
    
    <body <?php body_class(); ?>>
        
        <?php get_template_part( 'img/svg' ); ?>
        
        <!--[if lt IE 8]>
        <div class="notice browser-upgrade_notice">
            <div class="notice_cr">
                <p><?php $url = 'http://browsehappy.com/'; echo sprintf( __( 'You are using an <strong>outdated</strong> browser. Please <a href="%s">upgrade your browser</a> to improve your experience.', 'hopscotch' ), esc_url( $url ) ); ?></p>
            </div>
        </div>
        <![endif]-->

        <a class="show-content_axn" href="#content"><?php _e( 'Skip to content', 'hopscotch' ); ?></a>
        
        <div class="ui-view--home ui-cr--screen">
            
            <header id="masthead" class="masthead" role="banner">
  
              <div class="masthead_cr">
                  
                <div class="comp web-product-header_comp">
                    <div class="web-product-header_cr">
                        <h1 class="web-product_name">
                            <a class="web-product-name_axn" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="Home">
                                <span class="label web-product-name_label"><?php bloginfo( 'name' ); ?></span>
                            </a>
                        </h1>

                        <?php $description = get_bloginfo( 'description', 'display' );
                        if ( $description || is_customize_preview() ) : ?>
                            <p class="web-product_desc"><?php echo $description; ?></p>
                        <?php endif; ?>

                    </div> 
                </div><!-- web-product-header_comp -->

                <div id="masthead_ct" class="masthead_ct">
    
                    <button id="pri-nav_toggle-axn" class="axn toggle_axn pri-nav_toggle-axn">
                        <span class="label"><?php _e( 'Toggle Navigation and Sidebar', 'hopscotch' ); ?></span>
                        <span class="svg-icon-cr"><svg class="icon icon-menu" width="0" height="0" viewBox="0 0 48 48"><use xlink:href="#icon-menu"></use></svg></span>
                    </button><!-- pri-nav_toggle-axn -->

                    <div id="nav-sidebar-masthead_comp" class="comp nav-sidebar-masthead_comp ui-state__nav-sidebar-masthead--inactive" aria-expanded="false">

                        <section class="nav-sidebar-masthead_cr">

                            <h2 class="accessible-name"><?php _e( 'Masthead Navigation and Sidebar', 'hopscotch' ); ?></h2>    
                            <div class="nav-sidebar-masthead_ct">

                                <?php // Masthead Navigation
                                // Located at functions > masthead-navigation.php
                                hopscotch_masthead_navigation(); ?>

                                <?php if ( is_active_sidebar( 'masthead-sidebar' )  ) : ?>
                                <aside class="sidebar masthead-sidebar_sidebar" role="complementary">
                                    <div class="masthead-sidebar_cr">
                                        <h3 class="accessible-name"><?php _e( 'Masthead Sidebar', 'hopscotch' ); ?></h3>
                                        <div class="masthead-sidebar_ct widget-area">
                                            <?php dynamic_sidebar( 'masthead-sidebar' ); ?>
                                        </div><!-- masthead-sidebar_ct -->
                                    </div>
                                </aside><!-- masthead-sidebar_sidebar -->
                                <?php endif; ?>

                            </div><!-- nav-sidebar-masthead_ct -->
                        </section>
                    </div><!-- nav-sidebar-masthead_comp -->
                </div><!-- masthead_ct -->
              </div>
            </header><!-- masthead -->
            
            <main id="content" class="content" role="main">
                <section class="content_cr">