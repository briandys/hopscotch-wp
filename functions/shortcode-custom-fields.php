<?php

//------------------------- Custom Fields via Shortcode
// Insert a piece of widget or code anywhere in your content by using Custom Fields and Shortcode
// Usage:
// Shortcode: [hopscotch]Custom Field Name[/hopscotch]
// Custom Field Name: Custom Field Name
// Custom Field Value: anything entered here will show in the content where the shortcode is inserted
// You can insert a JavaScript here

function hopscotch_custom_fields_shortcode($atts, $text, $content = null) {
	global $post;
	
	extract(shortcode_atts(array(
	  'label' => '',
	  'class' => 'hopscotch-shortcode'
	), $atts));
	
	return '<div class="'.$class.'">' .$label .get_post_meta($post->ID, $text, true) .'</div>';
}
add_shortcode('hopscotch','hopscotch_custom_fields_shortcode');


// Shortcode and Custom Fields
//http://wpsnipp.com/index.php/functions-php/get-custom-field-value-with-shortcode/
// Usage: [display "[custom field name]"]
// Custom Field Name: [custom field name]
// Custom Field Value: anything entered here will show in the content where the shortcode is inserted

function hopscotch_display_custom_field_via_shortcode($atts){
    extract(shortcode_atts(array(
        'post_id' => NULL,
    ), $atts));
    if(!isset($atts[0])) return;
    $field = esc_attr($atts[0]);
    global $post;
    $post_id = (NULL === $post_id) ? $post->ID : $post_id;
    return get_post_meta($post_id, $field, true);
}
add_shortcode('display', 'hopscotch_display_custom_field_via_shortcode');