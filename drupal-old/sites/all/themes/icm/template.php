<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * nstar theme.
 */
function ICM_PREPROCESS_HTML(&$variables) {
  if (!empty($variables['page']['l-region--sidebar-first']) && !empty($variables['page']['l-region--sidebar-second'])) {
    $variables['attributes_array']['class'][] = 'two-sidebars';
  }
  elseif (!empty($variables['page']['l-region--sidebar-first'])) {
    $variables['attributes_array']['class'][] = 'sidebar-first';
  }
  elseif (!empty($variables['page']['l-region--sidebar-second'])) {
    $variables['attributes_array']['class'][] = 'sidebar-second';
  }
  else {
    $variables['attributes_array']['class'][] = 'no-sidebars';
  }
}

function icm_menu_local_tasks(&$variables) {
  $output = '';
  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary tabs--primary  links--inline">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary tabs--secondary links--inline">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  return $output;
}

?>