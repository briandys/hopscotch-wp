<?php

// Setup
require_once( trailingslashit(get_template_directory()) . 'functions/setup.php');

require_once( trailingslashit(get_template_directory()) . 'functions/custom-header.php');

// Action hooks
require_once( trailingslashit(get_template_directory()) . 'functions/action-hooks.php');


//------------------------- Components Directory
function hopscotch_components_directory() {
    global $comdir;
    $comdir = 'components';
    return $comdir;
}


// Front-end
require_once( trailingslashit(get_template_directory()) . 'functions/fonts.php');
require_once( trailingslashit(get_template_directory()) . 'functions/stylesheet.php');
require_once( trailingslashit(get_template_directory()) . 'functions/javascript.php');
require_once( trailingslashit(get_template_directory()) . 'functions/favicon.php');

// Prepend attachment
require_once( trailingslashit(get_template_directory()) . 'functions/prepend-attachment.php');

// Text domain
require_once( trailingslashit(get_template_directory()) . 'functions/text-domain.php');

// Page Excerpt
require_once( trailingslashit(get_template_directory()) . 'functions/page-excerpt.php');

// Register Sidebars
require_once( trailingslashit(get_template_directory()) . 'functions/sidebar.php');

// Customizer
require_once( trailingslashit(get_template_directory()) . 'functions/customizer-structure.php');
//require_once( trailingslashit(get_template_directory()) . 'functions/customizer-theme.php');

// Header
// require_once( trailingslashit(get_template_directory()) . 'functions/home-link.php');
require_once( trailingslashit(get_template_directory()) . 'functions/admin-nav.php');

// Navigation
require_once( trailingslashit(get_template_directory()) . 'functions/page-navigation.php');
require_once( trailingslashit(get_template_directory()) . 'functions/post-navigation.php');
require_once( trailingslashit(get_template_directory()) . 'functions/breadcrumbs.php');

// Entry
require_once( trailingslashit(get_template_directory()) . 'functions/page-title.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-action-edit.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-action-comment.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-date.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-byline.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-thumbnail.php');
require_once( trailingslashit(get_template_directory()) . 'functions/more-content.php');
require_once( trailingslashit(get_template_directory()) . 'functions/excerpt.php');

// Classes
require_once( trailingslashit(get_template_directory()) . 'functions/html-class.php');
require_once( trailingslashit(get_template_directory()) . 'functions/body-class.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-id.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-class.php');
require_once( trailingslashit(get_template_directory()) . 'functions/plain-image-class.php');
require_once( trailingslashit(get_template_directory()) . 'functions/slug-class.php');

// Custom Fields
require_once( trailingslashit(get_template_directory()) . 'functions/custom-field-entry-subtitle.php');
require_once( trailingslashit(get_template_directory()) . 'functions/custom-field-entry-class.php');

// Shortcodes
require_once( trailingslashit(get_template_directory()) . 'functions/shortcode-custom-fields.php');

// Comments
require_once( trailingslashit(get_template_directory()) . 'functions/comment-form.php');
require_once( trailingslashit(get_template_directory()) . 'functions/comment-list.php');

// Footer
require_once( trailingslashit(get_template_directory()) . 'functions/site-info.php');
require_once( trailingslashit(get_template_directory()) . 'functions/auto-copyright-year.php');

// Functionalities
require_once( trailingslashit(get_template_directory()) . 'functions/conditional-is-child.php');
require_once( trailingslashit(get_template_directory()) . 'functions/post-count-format.php');
require_once( trailingslashit(get_template_directory()) . 'functions/image-margin-fix.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-thumbnail-state-class.php');
require_once( trailingslashit(get_template_directory()) . 'functions/page-id-via-slug.php');
require_once( trailingslashit(get_template_directory()) . 'functions/google-analytics.php');

// require_once( trailingslashit(get_template_directory()) . 'functions/more-content-link-skip.php');

require_once( trailingslashit(get_template_directory()) . 'functions/text-widget-php.php');

// WordPress Native Functions
require_once( trailingslashit(get_template_directory()) . 'functions/wp-link-pages.php');
require_once( trailingslashit(get_template_directory()) . 'functions/the-tags.php');

// Admin Dashboard
require_once( trailingslashit(get_template_directory()) . 'functions/allow-html-attributes.php');
require_once( trailingslashit(get_template_directory()) . 'functions/svg-enable.php');