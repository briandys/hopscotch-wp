<?php

//------------------------- Edit Entry
if ( ! function_exists( 'hopscotch_entry_action_edit' ) ) :
    function hopscotch_entry_action_edit() {
    ?>
        <?php if ( current_user_can('edit_posts') ) : ?>
        <?php get_template_part( ''.hopscotch_components_directory().'/entry-action-edit' ); ?>
        <?php endif; ?>
    <?php }
endif;