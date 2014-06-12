<?php

//------------------------- Entry Class
// Description: You can add a custom class via Custom Field
// Usage:
// Key: entry-class
// Value: Class name

function hopscotch_custom_post_id($classes) {
    ?>

    id

<?php
	}
add_action('hopscotch_post_id','hopscotch_custom_post_id');