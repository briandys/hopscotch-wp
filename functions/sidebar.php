<?php

//------------------------- Widgets
function hopscotch_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'hopscotch' ),
		'id'            => 'sidebar-secondary',
		'description'   => __( 'Secondary content at the body', 'hopscotch' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Sidebar', 'hopscotch' ),
		'id'            => 'sidebar-header',
		'description'   => __( 'Secondary content at the header', 'hopscotch' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Tertiary Sidebar', 'hopscotch' ),
		'id'            => 'sidebar-tertiary',
		'description'   => __( 'Secondary content at the footer', 'hopscotch' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'hopscotch_widgets_init' );