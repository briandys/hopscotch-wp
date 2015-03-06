<?php
// Add class to plain images (the ones without caption)

function hopscotch_plain_image_add_class( $content ) {
    return preg_replace('/<p[^>]*>\\s*?(<a.*?><img.*?><\\/a>|<img.*?>)?\\s*<\/p>/', '<p class="img_cr">$1</p>', $content);
}
add_filter('the_content', 'hopscotch_plain_image_add_class');