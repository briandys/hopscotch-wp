<?php
// Article Entry Tags
// Based on Twenty Fifteen twentyfifteen_entry_meta() function.

if ( ! function_exists( 'hopscotch_article_entry_tags' ) ) :
    function hopscotch_article_entry_tags() {
        $tags_list = get_the_tag_list( '', _x( '<span class="separator comma_separator">,</span> ', 'Used between list items, there is a space after the comma.', 'hopscotch' ) );
        if ( $tags_list ) {
			
            // Component: Article Entry Tag
            // Class: article-entry-tag_comp
            printf( '<div class="comp tag_comp tag-tag_comp article-entry-tag_comp"><div class="cr tag_cr tag-tag_cr article-entry-tag_cr"><span class="accessible-name">%1$s</span> %2$s</div></div><!-- article-entry-tag_comp -->',
				_x( 'Tags:', 'Used before tag names.', 'hopscotch' ),
				$tags_list
			);
        }
    }
endif;