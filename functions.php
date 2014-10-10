<?php

// Setup
require_once( trailingslashit(get_template_directory()) . 'functions/setup.php');

require_once( trailingslashit(get_template_directory()) . 'functions/custom-header.php');

// Action hooks
require_once( trailingslashit(get_template_directory()) . 'functions/action-hooks.php');


// Content
require_once( trailingslashit(get_template_directory()) . 'functions/the-content.php');
require_once( trailingslashit(get_template_directory()) . 'functions/single-content.php');


// Front-end
require_once( trailingslashit(get_template_directory()) . 'functions/stylesheet.php');

require_once( trailingslashit(get_template_directory()) . 'functions/fonts.php');
require_once( trailingslashit(get_template_directory()) . 'functions/javascript.php');
require_once( trailingslashit(get_template_directory()) . 'functions/google-analytics.php');

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
require_once( trailingslashit(get_template_directory()) . 'functions/home-link.php');
// require_once( trailingslashit(get_template_directory()) . 'functions/admin-nav.php');

// Navigation
require_once( trailingslashit(get_template_directory()) . 'functions/page-navigation.php');

// Previous Entry / Next Entry
require_once( trailingslashit(get_template_directory()) . 'functions/entry-navigation.php');

// Pagination in Entry
require_once( trailingslashit(get_template_directory()) . 'functions/entry-page-navigation.php');

require_once( trailingslashit(get_template_directory()) . 'functions/breadcrumbs.php');

// Entry
require_once( trailingslashit(get_template_directory()) . 'functions/page-title.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-action-edit.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-action-comment.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-timestamp.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-byline.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-thumbnail.php');
require_once( trailingslashit(get_template_directory()) . 'functions/show-more-content.php');
require_once( trailingslashit(get_template_directory()) . 'functions/show-more-content-link-skip.php');
require_once( trailingslashit(get_template_directory()) . 'functions/excerpt.php');



// ID
require_once( trailingslashit(get_template_directory()) . 'functions/id-entry.php');

// Classes
require_once( trailingslashit(get_template_directory()) . 'functions/class-html.php');
require_once( trailingslashit(get_template_directory()) . 'functions/class-body.php');
require_once( trailingslashit(get_template_directory()) . 'functions/class-entry.php');
require_once( trailingslashit(get_template_directory()) . 'functions/class-plain-image.php');
require_once( trailingslashit(get_template_directory()) . 'functions/class-slug.php');
require_once( trailingslashit(get_template_directory()) . 'functions/class-page-template.php');
require_once( trailingslashit(get_template_directory()) . 'functions/class-main-nav.php');


// Data Attributes
require_once( trailingslashit(get_template_directory()) . 'functions/data-att-entry.php');


// get_the_content Formatted
require_once( trailingslashit(get_template_directory()) . 'functions/get-the-content-formatted.php');


// Custom Fields
require_once( trailingslashit(get_template_directory()) . 'functions/custom-field-entry-subtitle.php');
require_once( trailingslashit(get_template_directory()) . 'functions/custom-field-entry-class.php');

// Shortcodes
require_once( trailingslashit(get_template_directory()) . 'functions/shortcode-custom-fields.php');

// Comments
require_once( trailingslashit(get_template_directory()) . 'functions/comment-form.php');
require_once( trailingslashit(get_template_directory()) . 'functions/comment-list.php');

// Colophon
require_once( trailingslashit(get_template_directory()) . 'functions/web-designer.php');
require_once( trailingslashit(get_template_directory()) . 'functions/copyright.php');
require_once( trailingslashit(get_template_directory()) . 'functions/auto-copyright-year.php');

// Functionalities, Conditionals
require_once( trailingslashit(get_template_directory()) . 'functions/conditional-is-child.php');
require_once( trailingslashit(get_template_directory()) . 'functions/category-descendant.php');
require_once( trailingslashit(get_template_directory()) . 'functions/widget-entry-count-format.php');
require_once( trailingslashit(get_template_directory()) . 'functions/image-margin-fix.php');
require_once( trailingslashit(get_template_directory()) . 'functions/page-id-via-slug.php');

// WordPress Native Functions
require_once( trailingslashit(get_template_directory()) . 'functions/the-tags.php');

// Admin Dashboard
require_once( trailingslashit(get_template_directory()) . 'functions/allow-html-attributes.php');
require_once( trailingslashit(get_template_directory()) . 'functions/svg-enable.php');