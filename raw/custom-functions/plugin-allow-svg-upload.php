<?php
// Allow SVG uploading in Media Uploader
// https://css-tricks.com/snippets/wordpress/allow-svg-through-wordpress-media-uploader/

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');