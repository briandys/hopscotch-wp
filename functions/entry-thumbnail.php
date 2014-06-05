<?php

//------------------------- Entry Thumbnail
// Custom Field
// The option to use an external image source as Featured Image (instead of from the Media Library)
// Between the Custom Field and Featured Image from the Library, Custom Field is priority
// Usage:
// Key: entry-thumbnail
// Value: Absolute path of image. E.g., http://path/filename.img
function hopscotch_entry_thumbnail() {
?>
	<?php get_template_part( ''.hopscotch_components_directory().'/entry-thumbnail' ); ?>
<?php }