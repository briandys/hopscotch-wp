<!DOCTYPE html>
<!--[if lt IE 8]><html class="no-js <?php do_action( 'hopscotch_html_class' ); ?> lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if lt IE 9]><html class="no-js <?php do_action( 'hopscotch_html_class' ); ?> lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js <?php do_action( 'hopscotch_html_class' ); ?>" <?php language_attributes(); ?>><!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title( '&mdash;', true, 'right' ); ?></title>
        
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
        
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/respond.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/selectivizr-min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/nwmatcher-1.2.5-min.js"></script>
        <![endif]-->
        
        <?php wp_head(); ?>
        
    </head>
    
    <body <?php body_class(); ?>>
    
        <?php get_template_part( 'img/svg' ); ?>
        
        <!--[if lt IE 9]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="page">
        
            <header id="masthead" class="masthead" role="banner">
                <div class="masthead-cr">
                    
                    <?php get_template_part( ''.hopscotch_components_directory().'/masthead-header' ); ?>
                    
                    <?php get_template_part( ''.hopscotch_components_directory().'/main-navigation' ); ?>
                    
                    <?php get_template_part( ''.hopscotch_components_directory().'/sidebar-header' ); ?>
                
                </div>
            </header><!-- masthead -->