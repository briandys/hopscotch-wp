<?php

//------------------------- Hook for the_content in content.php
if ( ! function_exists( 'hopscotch_modify_the_content' ) ) :

    function hopscotch_modify_the_content() {
        
        the_content();
        
    }
    add_action('hopscotch_hook_the_content','hopscotch_modify_the_content');

endif;