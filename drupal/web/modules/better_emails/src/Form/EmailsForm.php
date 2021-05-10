<?php

namespace Drupal\better_emails\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class EmailsForm.
 */
class EmailsForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $emails = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $emails->label(),
      '#description' => $this->t("Label for the Emails."),
      '#required' => TRUE,
    ];
    $form['description'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Description'),
      '#maxlength' => 255,
      '#default_value' => $emails->get('description'),
      '#description' => $this->t("Description for the Emails."),
      '#required' => TRUE,
    ];
    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $emails->id(),
      '#machine_name' => [
        'exists' => '\Drupal\better_emails\Entity\Emails::load',
      ],
      '#disabled' => !$emails->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $emails = $this->entity;
    $status = $emails->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Emails.', [
          '%label' => $emails->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Emails.', [
          '%label' => $emails->label(),
        ]));
    }
    $form_state->setRedirectUrl($emails->toUrl('collection'));
  }

}
