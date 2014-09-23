<?php

//------------------------- Adding class to plain images
function hopscotch_image_class($content) {
    return preg_replace('/<p[^>]*>\\s*?(<a.*?><img.*?><\\/a>|<img.*?>)?\\s*<\/p>/', '<p class="img-cr">$1</p>', $content);
}
add_filter('the_content', 'hopscotch_image_class');