<?php

/**
 * @file
 * Hooks provided by the Modals.
 */

/**
 * Implements hook_modal_alter().
 */
function hook_modal_alter(&$modal, $modal_id) {
  $modal->setLabel('New Title');
  $modal->setBody('New Body');
}

/**
 * Implements hook_modal_ID_alter().
 */
function hook_modal_ID_alter(&$modal, $modal_id) {
  $modal->setLabel('New Title');
  $modal->setBody('New Body');
}
