<?php
// Entry Category

if ( ! function_exists( 'hopscotch_entry_category' ) ) :
    function hopscotch_entry_category() {        
        $categories_list = get_the_category_list( __( '<span class="sep">,</span> ', 'hopscotch' ) );
        if ( $categories_list ) {
            echo '<div class="comp tag_comp entry-category-tag_comp"><div class="entry-category-tag_cr"><span class="accessible-name">Category:</span> ' . $categories_list . '</div></div><!-- entry-category-tag_comp -->';
        }    
    }
endif;