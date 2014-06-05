<?php

//------------------------- Class for Featured Image
function hopscotch_thumbnail_class($classes) {
	if(current_theme_supports('post-thumbnails'))
		if ( has_post_thumbnail() || get_post_meta( get_the_ID(), 'entry-thumbnail', true ) )
			$classes[] = "entry-thumbnail-active";
        else
            $classes[] = "entry-thumbnail-inactive";
	return $classes;
}
add_filter('post_class', "hopscotch_thumbnail_class");