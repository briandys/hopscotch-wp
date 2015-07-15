<?php

//------------------------- Get Page ID via Slug
// http://erikt.tumblr.com/post/278953342/get-a-wordpress-page-id-with-the-slug
function hopscotch_get_page_ID($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
}