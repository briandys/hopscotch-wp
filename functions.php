<?php

// Setup
require_once( trailingslashit(get_template_directory()) . 'functions/setup.php');

// Action Hooks
require_once( trailingslashit(get_template_directory()) . 'functions/action-hooks.php');

// Front-End
require_once( trailingslashit(get_template_directory()) . 'functions/styles-scripts.php');
require_once( trailingslashit(get_template_directory()) . 'functions/fonts.php');

// Widgets
require_once( trailingslashit(get_template_directory()) . 'functions/widgets.php');

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
require_once( trailingslashit(get_template_directory()) . 'functions/article-entry-excerpt.php');
require_once( trailingslashit(get_template_directory()) . 'functions/article-content.php');
require_once( trailingslashit(get_template_directory()) . 'functions/article-entry-timestamp.php');
require_once( trailingslashit(get_template_directory()) . 'functions/article-entry-image.php');
require_once( trailingslashit(get_template_directory()) . 'functions/article-entry-attachment.php');

// Comments
require_once( trailingslashit(get_template_directory()) . 'functions/comments-item.php');
require_once( trailingslashit(get_template_directory()) . 'functions/comment-reply-title.php');
require_once( trailingslashit(get_template_directory()) . 'functions/comment-form.php');

// Navigation
require_once( trailingslashit(get_template_directory()) . 'functions/primary-navigation.php');
require_once( trailingslashit(get_template_directory()) . 'functions/web-product-page-navigation.php');
require_once( trailingslashit(get_template_directory()) . 'functions/breadcrumb-navigation.php');

// Conditionals
require_once( trailingslashit(get_template_directory()) . 'functions/conditionals-category-descendant.php');
require_once( trailingslashit(get_template_directory()) . 'functions/conditionals-child-page.php');

// CSS Classes
require_once( trailingslashit(get_template_directory()) . 'functions/html-class.php');
require_once( trailingslashit(get_template_directory()) . 'functions/body-class.php');
require_once( trailingslashit(get_template_directory()) . 'functions/ui-settings-class.php');

// Others
require_once( trailingslashit(get_template_directory()) . 'functions/get-page-id.php');
require_once( trailingslashit(get_template_directory()) . 'functions/auto-copyright-year.php');