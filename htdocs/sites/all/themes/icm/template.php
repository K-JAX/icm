<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * nstar theme.
 */
function NSTAR_PREPROCESS_HTML(&$variables) {
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
