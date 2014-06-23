<!DOCTYPE html>
<!--[if lt IE 8]><html class="no-js <?php hopscotch_html_class(); ?> lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if lt IE 9]><html class="no-js <?php hopscotch_html_class(); ?> lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js <?php hopscotch_html_class(); ?>" <?php language_attributes(); ?>><!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title( '&mdash;', true, 'right' ); ?></title>
        
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
        
        <?php get_template_part( ''.hopscotch_components_directory().'/ie-javascript' ); ?>
        
        <?php wp_head(); ?>
        
    </head>
    
    <body <?php body_class(); ?>>
    
        <?php get_template_part( 'img/svg' ); ?>        
        <?php get_template_part( ''.hopscotch_components_directory().'/browse-happy' ); ?>

        <div id="page">
        
            <header id="masthead" class="masthead" role="banner">
                <div class="masthead-cr">
                    
                    <?php get_template_part( ''.hopscotch_components_directory().'/masthead-header' ); ?>                    
                    <?php get_template_part( ''.hopscotch_components_directory().'/main-navigation' ); ?>                    
                    <?php get_template_part( ''.hopscotch_components_directory().'/sidebar-header' ); ?>
                
                </div>
            </header><!-- masthead -->
            
                <div id="main" class="main">
                    <div class="main-cr">