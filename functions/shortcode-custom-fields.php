<?php

//------------------------- Custom Fields via Shortcode
// Insert a piece of widget or code anywhere in your content by using Custom Fields and Shortcode
// Usage:
// Key: [hopscotch]whatever[/hopscotch]
// Value: whatever
function hopscotch_custom_fields_shortcode($atts, $text, $content = null) {
	global $post;
	
	extract(shortcode_atts(array(
	  'label' => '',
	  'class' => 'hopscotch-shortcode'
	), $atts));
	
	return '<div class="'.$class.'">' .$label .get_post_meta($post->ID, $text, true) .'</div>';
}

add_shortcode('hopscotch','hopscotch_custom_fields_shortcode');