<?php

//------------------------- Entry Class
// Description: You can add a custom class via Custom Field
// Usage:
// Key: entry-class
// Value: Class name

function hopscotch_entry_class($classes) {
?>    
<?php if ( get_post_meta( get_the_ID(), 'entry-class', true ) ) : ?>
    <?php $entry_class = ' hopscotch-' . get_post_meta( get_the_ID(), 'entry-class', true ); ?>
<?php endif; ?>
<?php
$classes[] = $entry_class;
return $classes;
}
add_filter('post_class','hopscotch_entry_class');