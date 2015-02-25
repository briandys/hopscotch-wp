<?php
// Entry Admin Actions

if ( ! function_exists( 'hopscotch_entry_admin_actions' ) ) :
    function hopscotch_entry_admin_actions() {        
        if ( current_user_can('edit_posts') ) :
            get_template_part( 'components/entry-admin-actions' );
        endif;        
    }
endif;