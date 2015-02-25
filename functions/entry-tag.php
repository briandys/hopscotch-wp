<?php
// Tags
// Displays the tags of an entry.

function hopscotch_entry_tags() {
    the_tags( '<div class="comp tag_comp entry-tag-tag_comp"><div class="entry-tag-tag_cr"><span class="accessible-name">Tag:</span> ', '<span class="sep">,</span> ', '</div></div><!-- entry-tag-tag_comp -->' );
}