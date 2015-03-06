<?php
// Article Entry Tags
// Based on Twenty Fifteen twentyfifteen_entry_meta() function.

if ( ! function_exists( 'hopscotch_article_entry_tags' ) ) :
    function hopscotch_article_entry_tags() {
        $tags_list = get_the_tag_list( '', _x( '<span class="sep">,</span> ', 'Used between list items, there is a space after the comma.', 'hopscotch' ) );
        if ( $tags_list ) {
			printf( '<div class="comp tag_comp entry-tag-tag_comp"><div class="entry-tag-tag_cr"><span class="accessible-name">%1$s</span> %2$s</div></div><!-- entry-tag-tag_comp -->',
				_x( 'Tags:', 'Used before tag names.', 'hopscotch' ),
				$tags_list
			);
        }
    }
endif;