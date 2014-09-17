<?php

//------------------------- Action hooks
function hopscotch_html_class() {
    do_action('hopscotch_html_class');
}

function hopscotch_post_id() {
    do_action('hopscotch_post_id');
}

function hopscotch_slug_class() {
    do_action('hopscotch_slug_class');
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

function hopscotch_web_designer() {
    do_action('hopscotch_web_designer');
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

// Location: single.php > .main-content-ct
function hopscotch_hook_single_content() {
    do_action('hopscotch_hook_single_content');
}

// Location: content.php > .entry-ct-cr
function hopscotch_hook_pre_the_content() {
    do_action('hopscotch_hook_pre_the_content');
}

// Location: header.php > html
function hopscotch_html_data_att() {
    do_action('hopscotch_html_data_att');
}

// Location: index.php > .main-content-ct
function hopscotch_hook_index_content() {
    do_action('hopscotch_hook_index_content');
}

// Location: content.php > .entry-ct
function hopscotch_hook_entry_content_class() {
    do_action('hopscotch_hook_entry_content_class');
}

// Location: content.php > the_content
function hopscotch_hook_the_content() {
    do_action('hopscotch_hook_the_content');
}