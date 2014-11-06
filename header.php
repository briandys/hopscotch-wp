<!DOCTYPE html>
<html id="html" class="no-js <?php hopscotch_html_class(); ?>" <?php language_attributes(); ?> <?php hopscotch_html_data_att(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title( '&mdash;', true, 'right' ); ?></title>
        
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="cleartype" content="on">
        
        <!-- Android Home Screen -->
        <meta name="mobile-web-app-capable" content="yes">
        
        <!-- iOS Home Screen -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?>">
        
        <?php wp_head(); ?>        
    </head>
    
    <body <?php body_class(); ?>>
    
        <?php // HopScotch Body Hook
        hopscotch_body_content();
        ?>
        
        <?php get_template_part( 'img/svg' ); ?>
        <?php get_template_part( 'components/browse-happy' ); ?>

        <div id="page" class="view">
        
            <header id="masthead" class="masthead" role="banner">
                <div class="masthead-cr">
                    
                    <?php get_template_part( 'components/masthead-header'); ?>
                    <?php get_template_part( 'components/main-navigation' ); ?>
                    <?php get_template_part( 'components/sidebar-header' ); ?>
                
                </div>
            </header><!-- masthead -->
            
            <div id="main" class="main">
                <div class="main-cr">