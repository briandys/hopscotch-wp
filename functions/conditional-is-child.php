<?php

//------------------------- Is Child Conditional
function hopscotch_is_child($page_id_or_slug) { 
	global $post; 
	if(!is_int($page_id_or_slug)) {
		$page = get_page_by_path($page_id_or_slug);
		$page_id_or_slug = $page->ID;
	} 
	if(is_page() && $post->post_parent == $page_id_or_slug ) {
       		return true;
	} else { 
       		return false; 
	}
}