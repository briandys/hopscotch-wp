<?php

//------------------------- Theme Customizer
function hopscotch_customize_register_theme($wp_customize){
    
    $wp_customize->add_section('hopscotch_customize_theme', array(
        'title'    => __('HopScotch Theme Customizer', 'hopscotch'),
        'priority' => 0,
    ) );
	
	// Primary Color
	$wp_customize->add_setting('hopscotch_customize_theme[theme_primary_color]', array(
        'default'           => '#3778CC',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
		'type' => 'option' ,
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'theme_primary_color', array(
        'label'    => __('Theme Header Color', 'hopscotch'),
        'section'  => 'hopscotch_customize_theme',
        'settings' => 'hopscotch_customize_theme[theme_primary_color]',
    )) );
	
	// Navigation Color
	$wp_customize->add_setting('hopscotch_customize_theme[theme_nav_color]', array(
        'default'           => '#3778CC',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
		'type' => 'option' ,
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'theme_nav_color', array(
        'label'    => __('Theme Navigation Color', 'hopscotch'),
        'section'  => 'hopscotch_customize_theme',
        'settings' => 'hopscotch_customize_theme[theme_nav_color]',
    )) );
	
	// Link Color
	$wp_customize->add_setting('hopscotch_customize_theme[theme_link_color]', array(
        'default'           => '#3778CC',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
		'type' => 'option' ,
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'theme_link_color', array(
        'label'    => __('Theme Link Color', 'hopscotch'),
        'section'  => 'hopscotch_customize_theme',
        'settings' => 'hopscotch_customize_theme[theme_link_color]',
    )) );
}
add_action('customize_register', 'hopscotch_customize_register_theme');


//------------------------- Theme CSS
function hopscotch_customize_theme_css() {
    $options_theme = get_option(hopscotch_customize_theme);
	?>
    <style type="text/css">
        .site-header {
            background-color: <?php echo $options_theme['theme_primary_color']; ?>;
        }

        .site-header,
        .page-nav-links a:hover,
        .page-links a:hover,
        .menu-toggle,
        .menu-active div.nav-menu > ul,
        .menu-active div.nav-menu li,
        .nav-menu .children,
        .nav-menu .sub-menu,
        input[type="submit"],
        .site-header .search-form,
        .site-header .search-bar-title {
            background-color: <?php echo $options_theme['theme_nav_color']; ?>;
        }

        .entry-hr a:hover,
        .entry-title,
        .entry-title-link,
        .entry-ct a,
        .entry-fr a:hover,
        .widget-area a,
        .comment-hr a:hover,
        .comment-form-admin a:hover,
        .comment-ct a,
        .entry-actions a,
        .comment-actions a,
        .entry-ct .more-link {
            color: <?php echo $options_theme['theme_link_color']; ?>;
        }
     </style>
    <?php
}
add_action( 'wp_head', 'hopscotch_customize_theme_css');