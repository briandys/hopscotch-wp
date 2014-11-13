<?php

//------------------------- Hook for the_content in content.php
if ( ! function_exists( 'hopscotch_modify_the_content' ) ) :

    function hopscotch_modify_the_content() {
        
        the_content(
            sprintf(
                __( '<div class="show-more-content">Continue reading%s</div>', 'hopscotch' ),
                '<span class="show-more-content-entry-title">: '.get_the_title().'</span>'
            )
        );
        
    }
    add_action('hopscotch_hook_the_content','hopscotch_modify_the_content');

endif;