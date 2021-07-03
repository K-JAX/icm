<?php

/**
 * @file
 * Contains \Drupal\block_cookie_condition\Plugin\Block\GetUserTypeBlock
 */

namespace Drupal\block_cookie_condition\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Get User Type' Block.
 *
 * @Block(
 *   id = "get_user_type",
 *   admin_label = @Translation("Get User Type"),
 *   category = @Translation("Conditional Cookie Blocks"),
 * )
 */
class GetUserTypeBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    // return [
    //   '#markup' => $this->t('Hello, World!'),
    // ];
	$form = \Drupal::formBuilder()->getForm('Drupal\block_cookie_condition\Form\CookieForm');
	return $form;
  }

}
