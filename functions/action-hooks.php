<?php
// Action Hooks



function hopscotch_post_id() {
    do_action('hopscotch_post_id');
}

function hopscotch_content_header() {
    do_action('hopscotch_content_header');
}

function hopscotch_body_content() {
    do_action('hopscotch_body_content');
}

function hopscotch_entry_content() {
    do_action('hopscotch_entry_content');
}

function hopscotch_copyright() {
    do_action('hopscotch_copyright');
}

function hopscotch_hook_extra_content() {
    do_action('hopscotch_hook_extra_content');
}

function hopscotch_hook_pre_content() {
    do_action('hopscotch_hook_pre_content');
}

function hopscotch_hook_content_title() {
    do_action('hopscotch_hook_content_title');
}

// Location: content.php > above .entry
function hopscotch_hook_above_entry() {
    do_action('hopscotch_hook_above_entry');
}

// Location: content.php > .entry
function hopscotch_hook_entry_data_att() {
    do_action('hopscotch_hook_entry_data_att');
}

// Location: content.php > .entry-ct-cr
function hopscotch_hook_pre_the_content() {
    do_action('hopscotch_hook_pre_the_content');
}

// Location: index.php > .main-content-ct
function hopscotch_hook_index_content() {
    do_action('hopscotch_hook_index_content');
}

// Location: content.php > the_content
function hopscotch_hook_the_content() {
    do_action('hopscotch_hook_the_content');
}

// Location: content.php > .entry-meta-cr
function hopscotch_hook_header_meta() {
    do_action('hopscotch_hook_header_meta');
}

// Location: content.php > entry-hr-cr
function hopscotch_hook_subtitle() {
    do_action('hopscotch_hook_subtitle');
}

// Location: content.php
function hopscotch_hook_entry_banner() {
    do_action('hopscotch_hook_entry_banner');
}