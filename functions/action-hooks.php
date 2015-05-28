<?php
// Action Hooks

// Location: header.php
function hopscotch_html_class() {
    do_action('hopscotch_html_class');
}

// Location: content.php
function hopscotch_hook_article_entry_banner() {
    do_action('hopscotch_hook_article_entry_banner');
}

// Location: content.php
function hopscotch_hook_after_the_title() {
    do_action('hopscotch_hook_after_the_title');
}

// Location: content.php
function hopscotch_hook_after_the_content() {
    do_action('hopscotch_hook_after_the_content');
}

// Location: content.php
function hopscotch_hook_after_modified_timestamp() {
    do_action('hopscotch_hook_after_modified_timestamp');
}