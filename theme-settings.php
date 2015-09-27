<?php
/**
 * @file
 * Theme settings file for Starch.
 */

// Build an options list of image fields on the Post content type.
$options = array();

foreach (field_info_instances('node', 'post') as $field_name => $instance) {
  $field = field_info_field($field_name);

  if ($field['type'] == 'image') {
    $options[$field_name] = $instance['label'];
  }
}

$form['featured_image_field'] = array(
  '#type' => 'select',
  '#title' => t('Featured image field'),
  '#description' => t('Select the image field on the <em>Post</em> content type that will be used for featured images.'),
  '#options' => $options,
  '#default_value' => theme_get_setting('featured_image_field', 'starch'),
  '#empty_option' => t('- Select a field -'),
);
