<?php

//------------------------- Allow SVG Files Upload
function hopscotch_mime_types( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';    
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'hopscotch_mime_types' );


// Remove SVG width and height attribute from <img> element
// Source: https://core.trac.wordpress.org/ticket/26256#comment:3
/**
 * Removes the width and height attributes of <img> tags for SVG
 * 
 * Without this filter, the width and height are set to "1" since
 * WordPress core can't seem to figure out an SVG file's dimensions.
 * 
 * For SVG:s, returns an array with file url, width and height set 
 * to null, and false for 'is_intermediate'.
 * 
 * @wp-hook image_downsize
 * @param mixed $out Value to be filtered
 * @param int $id Attachment ID for image.
 * @return bool|array False if not in admin or not SVG. Array otherwise.
 */
function wg_fix_svg_size_attributes( $out, $id )
{
	$image_url  = wp_get_attachment_url( $id );
	$file_ext   = pathinfo( $image_url, PATHINFO_EXTENSION );

	if ( ! is_admin() || 'svg' !== $file_ext )
	{
		return false;
	}

	return array( $image_url, null, null, false );
}
add_filter( 'image_downsize', 'wg_fix_svg_size_attributes', 10, 2 );