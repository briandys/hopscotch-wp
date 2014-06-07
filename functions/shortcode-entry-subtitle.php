<?php

//------------------------- Custom Field Subtitle
// Description: You can add a subtitle via Custom Field
// Usage:
// Key: entry-subtitle
// Value: Subtitle

if ( ! function_exists( 'hopscotch_entry_subtitle' ) ) :
    function hopscotch_entry_subtitle() {
    ?>
        <?php if ( get_post_meta( get_the_ID(), 'entry-subtitle', true ) ) : ?>
        <?php $entry_subtitle = "entry-subtitle"; ?>
        <?php echo '<div class="entry-subtitle"><p><span class="label">Subtitle:</span> '.get_post_meta(get_the_ID(), $entry_subtitle, true).'</p></div>'; ?>
    <?php endif; ?>
    <?php }
endif;