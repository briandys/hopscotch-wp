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
        
            
            <!-- Constructor: Masthead -->
            <header id="masthead" class="masthead" role="banner">
  
              <div class="masthead_cr">
                  
                <?php get_template_part( 'components/web-product-header' ); ?>

                <?php get_template_part( 'components/masthead-content' ); ?>

              </div>

            </header><!-- masthead -->
            
            
            <!-- Constructor: Content -->
            <main id="content" class="content" role="main">
                
                <section class="content_cr">