<?php

//------------------------- Controlling the Post Count on Archive & Category Widgets
function hopscotch_cat_count($links) {
	$links = str_replace('</a> (', ' </a> <span class="counter counter-category">', $links);
	$links = str_replace('', ')</span>', $links);
	return $links;
}
add_filter('wp_list_categories', 'hopscotch_cat_count');

function hopscotch_archive_count($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="counter counter-archive">', $links);
    $links = str_replace('', ')</span>', $links);
    return $links;
}
add_filter('get_archives_link', 'hopscotch_archive_count');