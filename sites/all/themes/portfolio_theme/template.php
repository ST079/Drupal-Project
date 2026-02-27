<?php
/**
 * @file
 * Preprocess functions for Portfolio Theme
 */

/**
 * Implements template_preprocess_html().
 * Prepares variables for html.tpl.php
 */
function portfolio_theme_preprocess_html(&$variables) {
  // Add classes for body
  $variables['classes_array'][] = 'html';
  
  // Add IE conditional classes
  $variables['classes_array'][] = 'no-js';
}

/**
 * Implements template_preprocess_page().
 * Prepares variables for page.tpl.php
 */
function portfolio_theme_preprocess_page(&$variables) {
  // Add default variables that should be available
  $variables['head_title'] = isset($variables['head_title']) ? $variables['head_title'] : drupal_get_title();
  $variables['head'] = drupal_get_html_head();
  $variables['styles'] = drupal_get_css();
  $variables['scripts'] = drupal_get_js();
  
  // Add messages
  $variables['messages'] = theme('status_messages');
  
  // Add main and secondary menus
  $variables['main_menu'] = menu_navigation_links('main-menu');
  $variables['secondary_menu'] = menu_navigation_links('secondary-menu');
  
  // Add tabs
  $variables['tabs'] = menu_local_tabs();
  
  // Add action links
  $variables['action_links'] = menu_local_actions();
  
  // Add title prefix/suffix (for contextual links)
  $variables['title_prefix'] = isset($variables['title_prefix']) ? $variables['title_prefix'] : array();
  $variables['title_suffix'] = isset($variables['title_suffix']) ? $variables['title_suffix'] : array();
}