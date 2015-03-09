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
		'after_title'   => '</h4><div class="ct widget_ct">',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'hopscotch' ),
		'id'            => 'content-sidebar',
		'description'   => __( 'Body secondary content', 'hopscotch' ),
		'before_widget' => '<div id="%1$s" class="comp widget_comp %2$s"><div class="crwidget_cr">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="accessible-name widget-title">',
		'after_title'   => '</h4><div class="ct widget_ct">',
	) );
    register_sidebar( array(
		'name'          => __( 'Colophon Sidebar', 'hopscotch' ),
		'id'            => 'colophon-sidebar',
		'description'   => __( 'Footer secondary content', 'hopscotch' ),
		'before_widget' => '<div id="%1$s" class="comp widget_comp %2$s"><div class="cr widget_cr">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="accessible-name widget-title">',
		'after_title'   => '</h4><div class="ct widget_ct">',
	) );
}
add_action( 'widgets_init', 'hopscotch_widgets_init' );


// Modify the format of Category and Archive post counts
// Only works if displayed as list
function hopscotch_cat_count($links) {
    $opening_char = '';
    $closing_char = '';
	$links = str_replace('</a> (', ' </a> <span class="label article-entry-count_label" title="Number of Entries">' . $opening_char, $links);
	$links = str_replace(')', $closing_char . '</span>', $links);
	return $links;
}
add_filter('wp_list_categories', 'hopscotch_cat_count');

function hopscotch_archive_count($links) {
    $opening_char = '';
    $closing_char = '';
    $links = str_replace('</a>&nbsp;(', '</a> <span class="label article-entry-count_label" title="Number of Entries">' . $opening_char, $links);
    $links = str_replace(')', $closing_char . '</span>', $links);
    return $links;
}
add_filter('get_archives_link', 'hopscotch_archive_count');