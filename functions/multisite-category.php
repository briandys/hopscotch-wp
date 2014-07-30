<?php

//------------------------- Multisite Category
if (!function_exists('hopscotch_multisite_category')) :
    
    function hopscotch_multisite_category() {
        get_template_part( 'components/multisite-category' );
    }
    add_action( 'hopscotch_entry_content', 'hopscotch_multisite_category');

endif;