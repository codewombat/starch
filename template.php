<?php

/**
 * @file
 * Theme functions and overides for the Starch theme.
 */


/**
 * Implements hook_preprocess_HOOK().
 *
 * - Adds the external CSS to use the Open Sans and Satisfy fonts.
 * - Identifies the theme in the body ID attribute.
 */
function starch_preprocess_page(&$variables) {
  // Add the Open Sans and Satisfy fonts.
  backdrop_add_css('//fonts.googleapis.com/css?family=Open+Sans%3A400%2C700%7CSatisfy&#038;ver=4.3.1', array('type' => 'external'));

  // Create a body attributes variable that contains its ID.
  $variables['body_attributes']['id'] = 'starch';
}

/**
 * Implements hook_preprocess_HOOK().
 *
 * - On full page layouts for Post nodes, looks for a featured image and renders
 *   it above the page title if found.
 *
 * @todo Add a theme setting to use a difference node type.
 * @todo Add a theme setting to use a specific image style.
 */
function starch_preprocess_layout(&$variables) {
  $field_name = theme_get_setting('featured_image_field', 'starch');

  // If we could determine a featured image field...
  if (!empty($field_name)) {
    // And the current page being viewed is a full Post node...
    if ($node = menu_get_object('node', 1)) {
      if ($node->type == 'post' && current_path() == 'node/' . $node->nid) {
        // Attempt to extract the image field from the current page's node and
        // add it to the title_prefix array to be rendered above the page title.
        $field_items = field_get_items('node', $node, $field_name);

        if (!empty($field_items)) {
          $featured_image = reset($field_items);

          $variables['title_prefix']['featured_image'] = array(
            '#markup' => '<div class="featured-image" style="background-image: url(' . file_create_url($featured_image['uri']) . ');"></div>',
          );
        }
      }
    }
  }
}

/**
 * Implements hook_preprocess_HOOK().
 *
 * - On Post node teasers, looks for a featured image and renders it above the
 *   title if found.
 */
function starch_preprocess_node(&$variables) {
  $field_name = theme_get_setting('featured_image_field', 'starch');
  $node = $variables['node'];

  // If we could determine a featured image field...
  if (!empty($field_name)) {
    // And the node is a Post being rendered as a teaser...
    if ($node->type == 'post' && $variables['view_mode'] == 'teaser') {
      // Attempt to extract the image field from the current page's node and
      // add it to the title_prefix array to be rendered above the page title.
      $field_items = field_get_items('node', $node, $field_name);

      if (!empty($field_items)) {
        $featured_image = reset($field_items);

        $variables['title_prefix']['featured_image'] = array(
          '#markup' => '<div class="featured-image" style="background-image: url(' . file_create_url($featured_image['uri']) . ');">' . l($node->title, 'node/' . $node->nid) . '</div>',
        );

        // If the node is sticky, add the "Featured post" tag.
        if ($node->sticky) {
          $variables['title_prefix']['featured_post'] = array(
            '#markup' => '<div class="sticky-status"><span>' . t('Featured Post') . '</span></div>',
          );
        }
      }
    }
  }
}
