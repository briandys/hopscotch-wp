<?php
// Entry Category
// Based on Twenty Fifteen twentyfifteen_entry_meta() function.

if ( ! function_exists( 'hopscotch_article_entry_category' ) ) :
    function hopscotch_article_entry_category() {        
        $categories_list = get_the_category_list( _x( '<span class="separator comma_separator">,</span> ', 'Used between list items, there is a space after the comma.', 'hopscotch' ) );
        
        // Component: Article Entry Category Tag
        // Class: article-entry-category_comp
        if ( $categories_list && hopscotch_categorized_blog() ) {
            printf( '<div class="comp tag_comp category-tag_comp article-entry-category_comp"><div class="cr tag_cr category-tag_cr article-entry-category-tag_cr"><span class="accessible-name tag_accessible-name category-tag_accessible-name">%1$s</span> %2$s</div></div><!-- article-entry-category-tag_comp -->',
				_x( 'Categories', 'Used before category names.', 'hopscotch' ),
				$categories_list
			);
        }    
    }
endif;


// Determine whether blog/site has more than one category.
// @return bool True of there is more than one category, false otherwise.
// Based on Twenty Fifteen twentyfifteen_categorized_blog() function.

function hopscotch_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'hopscotch_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'hopscotch_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so twentyfifteen_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so twentyfifteen_categorized_blog should return false.
		return false;
	}
}

// Flush out the transients used in {@see twentyfifteen_categorized_blog()}.
// Based on Twenty Fifteen twentyfifteen_category_transient_flusher() function.

function hopscotch_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'hopscotch_categories' );
}
add_action( 'edit_category', 'hopscotch_category_transient_flusher' );
add_action( 'save_post',     'hopscotch_category_transient_flusher' );