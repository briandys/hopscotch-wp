<?php

//------------------------- Edit Entry
if ( ! function_exists( 'hopscotch_entry_action_edit' ) ) :
    function hopscotch_entry_action_edit() {
        
        if ( current_user_can('edit_posts') ) :
            get_template_part( 'components/entry-action-edit' );
        endif;
        
    }
endif;