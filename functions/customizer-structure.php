<?php

//------------------------- Structure Customizer
function hopscotch_customize_register_main($wp_customize){
    
    $wp_customize->add_section('hopscotch_customize_main', array(
        'title'    => __('HopScotch Structure Customizer', 'hopscotch'),
        'priority' => 0,
    ) );
	
	// Max Content Width
	$wp_customize->add_setting( 'hopscotch_customize_main[max_content_width]', array(
		'default'        => '',
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'type' => 'option' ,
	) );
	
	$wp_customize->add_control( 'hopscotch_max_content_width', array(
		'label'      => __( 'Maximum Width (rem, em, %, px)', 'hopscotch' ),
		'section'    => 'hopscotch_customize_main',
		'settings'   => 'hopscotch_customize_main[max_content_width]',
	) );
	
	// Google Analytics
	$wp_customize->add_setting( 'hopscotch_customize_main[google_analytics]', array(
		'default'        => 'UA-XXXXX-X',
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'type' => 'option' ,
	) );
	
	$wp_customize->add_control( 'hopscotch_google_analytics', array(
		'label'      => __( 'Google Analytics ID', 'hopscotch' ),
		'section'    => 'hopscotch_customize_main',
		'settings'   => 'hopscotch_customize_main[google_analytics]',
	) );
}
add_action('customize_register', 'hopscotch_customize_register_main');


//------------------------- Structure CSS
function hopscotch_customize_main_css() {
    $options_main = get_option(hopscotch_customize_main);
	?>
    <style type="text/css">
        .masthead-cr,
        .main-cr,
        .colophon-cr {
            max-width: <?php echo $options_main['max_content_width']; ?>;
        }
     </style>
    <?php
}
add_action( 'wp_head', 'hopscotch_customize_main_css');