<?php
// Widgets

function hopscotch_widgets_init() {
    register_sidebar( array(
		'name'          => __( 'Masthead Sidebar', 'hopscotch' ),
		'id'            => 'masthead-sidebar',
		'description'   => __( 'Header secondary content', 'hopscotch' ),
		'before_widget' => '<div id="%1$s" class="comp widget_comp %2$s"><div class="cr widget_cr">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="accessible-name widget-title">',
		'after_title'   => '</h4>',
	) );
    register_sidebar( array(
		'name'          => __( 'Content Header Sidebar', 'hopscotch' ),
		'id'            => 'content-header-sidebar',
		'description'   => __( 'Content Header Secondary Content', 'hopscotch' ),
		'before_widget' => '<div id="%1$s" class="comp widget_comp %2$s"><div class="cr widget_cr">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="accessible-name widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'hopscotch' ),
		'id'            => 'content-sidebar',
		'description'   => __( 'Body secondary content', 'hopscotch' ),
		'before_widget' => '<div id="%1$s" class="comp widget_comp %2$s"><div class="cr widget_cr">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="accessible-name widget-title">',
		'after_title'   => '</h4>',
	) );
    register_sidebar( array(
		'name'          => __( 'Colophon Sidebar', 'hopscotch' ),
		'id'            => 'colophon-sidebar',
		'description'   => __( 'Footer secondary content', 'hopscotch' ),
		'before_widget' => '<div id="%1$s" class="comp widget_comp %2$s"><div class="cr widget_cr">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="accessible-name widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'hopscotch_widgets_init' );