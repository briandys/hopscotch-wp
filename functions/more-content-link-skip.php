<?php

//------------------------- Remove Read More Link Skip
function hopscotch_remove_more_skip_link($link) {
$offset = strpos($link, '#more-');
if ($offset) {
$end = strpos($link, '"',$offset);
}
if ($end) {
$link = substr_replace($link, '', $offset, $end-$offset);
}
return $link;
}
add_filter('the_content_more_link', 'hopscotch_remove_more_skip_link');