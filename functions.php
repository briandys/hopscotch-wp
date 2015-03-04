<?php

// Setup
require_once( trailingslashit(get_template_directory()) . 'functions/setup.php');


// Action hooks
require_once( trailingslashit(get_template_directory()) . 'functions/action-hooks.php');




// Front-end
require_once( trailingslashit(get_template_directory()) . 'functions/stylesheet.php');

// require_once( trailingslashit(get_template_directory()) . 'functions/fonts.php');
require_once( trailingslashit(get_template_directory()) . 'functions/javascript.php');

require_once( trailingslashit(get_template_directory()) . 'functions/favicon.php');

// Prepend attachment
require_once( trailingslashit(get_template_directory()) . 'functions/prepend-attachment.php');

// Text domain
require_once( trailingslashit(get_template_directory()) . 'functions/text-domain.php');

// Register Sidebars
require_once( trailingslashit(get_template_directory()) . 'functions/widgets.php');


// Header
require_once( trailingslashit(get_template_directory()) . 'functions/home-link.php');



// Previous Entry / Next Entry





// Entry
//require_once( trailingslashit(get_template_directory()) . 'functions/page-title.php');







// Updated
require_once( trailingslashit(get_template_directory()) . 'functions/entry-admin-actions.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-comments-action.php');

// Published and Modified Timestamps
require_once( trailingslashit(get_template_directory()) . 'functions/entry-timestamp.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-author.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-category.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-banner.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-tag.php');

require_once( trailingslashit(get_template_directory()) . 'functions/auto-copyright-year.php');

// Comments
require_once( trailingslashit(get_template_directory()) . 'functions/comments-item.php');
require_once( trailingslashit(get_template_directory()) . 'functions/comments-navigation.php');

// Navigation
require_once( trailingslashit(get_template_directory()) . 'functions/entry-navigation.php');
require_once( trailingslashit(get_template_directory()) . 'functions/masthead-navigation.php');
require_once( trailingslashit(get_template_directory()) . 'functions/breadcrumb-navigation.php');
require_once( trailingslashit(get_template_directory()) . 'functions/web-product-page-navigation.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-page-navigation.php');

require_once( trailingslashit(get_template_directory()) . 'functions/single-content.php');

// Conditionals
require_once( trailingslashit(get_template_directory()) . 'functions/conditionals-category-descendant.php');










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


// Comments
require_once( trailingslashit(get_template_directory()) . 'functions/comment-form.php');


// Colophon



// Functionalities, Conditionals
require_once( trailingslashit(get_template_directory()) . 'functions/conditional-is-child.php');

require_once( trailingslashit(get_template_directory()) . 'functions/widget-entry-count-format.php');
require_once( trailingslashit(get_template_directory()) . 'functions/image-margin-fix.php');
require_once( trailingslashit(get_template_directory()) . 'functions/page-id-via-slug.php');
