<?php

// Setup
require_once( trailingslashit(get_template_directory()) . 'functions/setup.php');

// Action Hooks
require_once( trailingslashit(get_template_directory()) . 'functions/action-hooks.php');

// Front-end
require_once( trailingslashit(get_template_directory()) . 'functions/style-sheets.php');
require_once( trailingslashit(get_template_directory()) . 'functions/javascripts.php');

// Translations
require_once( trailingslashit(get_template_directory()) . 'functions/text-domain.php');

// Widgets
require_once( trailingslashit(get_template_directory()) . 'functions/widgets.php');



require_once( trailingslashit(get_template_directory()) . 'functions/fonts.php');

// Entry (Articles and Comments)
require_once( trailingslashit(get_template_directory()) . 'functions/entry-navigation.php');
require_once( trailingslashit(get_template_directory()) . 'functions/entry-admin-actions.php');

// Article Entry
require_once( trailingslashit(get_template_directory()) . 'functions/article-entry-comments-actions.php');
require_once( trailingslashit(get_template_directory()) . 'functions/article-entry-class.php');
require_once( trailingslashit(get_template_directory()) . 'functions/article-entry-author.php');
require_once( trailingslashit(get_template_directory()) . 'functions/article-entry-banner.php');
require_once( trailingslashit(get_template_directory()) . 'functions/article-entry-category.php');
require_once( trailingslashit(get_template_directory()) . 'functions/article-entry-tag.php');
require_once( trailingslashit(get_template_directory()) . 'functions/article-entry-page-navigation.php');
require_once( trailingslashit(get_template_directory()) . 'functions/article-excerpt.php');
require_once( trailingslashit(get_template_directory()) . 'functions/article-content.php');
require_once( trailingslashit(get_template_directory()) . 'functions/article-entry-timestamp.php');
require_once( trailingslashit(get_template_directory()) . 'functions/article-entry-image.php');
require_once( trailingslashit(get_template_directory()) . 'functions/article-entry-attachment.php');

require_once( trailingslashit(get_template_directory()) . 'functions/auto-copyright-year.php');

// Comments
require_once( trailingslashit(get_template_directory()) . 'functions/comments-item.php');
require_once( trailingslashit(get_template_directory()) . 'functions/comment-reply-title.php');
require_once( trailingslashit(get_template_directory()) . 'functions/comment-form.php');

// Masthead
require_once( trailingslashit(get_template_directory()) . 'functions/masthead-navigation.php');

// Navigation
require_once( trailingslashit(get_template_directory()) . 'functions/web-product-page-navigation.php');
require_once( trailingslashit(get_template_directory()) . 'functions/breadcrumb-navigation.php');

// Conditionals
require_once( trailingslashit(get_template_directory()) . 'functions/conditionals-category-descendant.php');
require_once( trailingslashit(get_template_directory()) . 'functions/conditionals-child-page.php');

// Add Classes for CSS Selectors
require_once( trailingslashit(get_template_directory()) . 'functions/body-class.php');
require_once( trailingslashit(get_template_directory()) . 'functions/plain-image-class.php');

// Others
require_once( trailingslashit(get_template_directory()) . 'functions/get-page-id.php');