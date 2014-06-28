<?php

//------------------------- Comment on Entry
if ( ! function_exists( 'hopscotch_entry_action_comment' ) ) :
    function hopscotch_entry_action_comment() {
        $num_comments = get_comments_number();
    ?>
        <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) && ! $num_comments == 0 ) : ?>            
            <?php get_template_part( ''.hopscotch_components_directory().'/entry-action-comment' ); ?>
        <?php endif; ?>
    <?php }
endif;