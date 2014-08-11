<?php

//------------------------- get_the_content() with HTML tags
// http://www.web-templates.nu/2008/08/31/get_the_content-with-formatting/
// To show the content HTML markup inside a textarea: echo esc_textarea( get_the_content_formatted() );

function get_the_content_formatted ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}