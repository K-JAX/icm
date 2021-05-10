<?php

namespace Drupal\better_emails\Form;

use Drupal\Component\Serialization\Json;
use Drupal\Core\Config\Entity\ConfigEntityInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\user\AccountSettingsForm;
use Drupal\user\RoleStorageInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Class BetterEmailsForm.
 */
class BetterEmailsForm extends AccountSettingsForm {

  public $entityTypeManager;

  /**
   * {@inheritdoc}
   */
  public static function create(
    ContainerInterface $container
  ) {
    return new static(
      $container->get('config.factory'),
      $container->get('module_handler'),
      $container->get('entity.manager')->getStorage('user_role'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * BetterEmailsForm constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   * @param \Drupal\user\RoleStorageInterface $role_storage
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   */
  public function __construct(
    ConfigFactoryInterface $config_factory,
    ModuleHandlerInterface $module_handler,
    RoleStorageInterface $role_storage,
    EntityTypeManagerInterface $entity_type_manager
  ) {
    parent::__construct($config_factory, $module_handler, $role_storage);
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return parent::getFormId();
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);
    $enabled = $this->configFactory->get('better_emails.configs')->get(
      'configs.enable_better_emails'
    );
    // Convert all standard form elements types and format.
    if ($enabled) {
      // Modify form element type and format.
      $modifyTypeFormat = function ($email_item) {
        if (\is_array($email_item) && 'textarea' == $email_item['#type']) {
          $email_item['#type'] = 'text_format';
          $email_item['#format'] = 'full_html';
          return $email_item;
        }
        return $email_item;
      };
      // Find element that able to be modified.
      $findDetailItems = function ($item) use ($modifyTypeFormat) {
        if (isset($item['#type']) && 'details' == $item['#type']) {
          return array_map($modifyTypeFormat, $item);
        }
        return $item;
      };
      // Go through form.
      $form = array_map($findDetailItems, $form);
    }

    $emails = $this->entityTypeManager->getStorage('emails')->loadMultiple();

    // Generate form elements based on email types and add Preview link.
    $addEmailTypes = function ($form_element) use (&$form) {
      $form['email_' . $form_element->get('id')] = $this->formElement($form_element);
      return $form_element;
    };

    array_map($addEmailTypes, $emails);

    // Ids of email and their config.
    $drupalEmails = [
      'email_admin_created' => 'register_admin_created',
      'email_pending_approval' => 'register_pending_approval',
      'email_pending_approval_admin' => 'register_pending_approval_admin',
      'email_no_approval_required' => 'register_no_approval_required',
      'email_password_reset' => 'password_reset',
      'email_activated' => 'status_activated',
      'email_blocked' => 'status_blocked',
      'email_cancel_confirm' => 'cancel_confirm',
      'email_canceled' => 'status_canceled',
    ];

    // Add Preview link to emails.
    $addPreviewLink = function ($element_id, $config_id) use (&$form) {
      $form[$element_id]['link'] = [
        '#title' => 'Preview',
        '#type' => 'link',
        '#url' => Url::fromRoute(
          'better_emails.email_preview',
          [
            'email_id' => $config_id,
          ]
        ),
        '#attributes' => [
          'class' => ['use-ajax'],
          'data-dialog-type' => 'dialog',
          'data-dialog-options' => Json::encode(['width' => 800]),
        ],
      ];
    };

    array_map($addPreviewLink, array_keys($drupalEmails), $drupalEmails);

    $form['#attached'] = [
      'library' => [
        'core/drupal.dialog.ajax',
      ],
    ];

    return $form;
  }

  /**
   * @param \Drupal\Core\Config\Entity\ConfigEntityInterface $email_entity
   *
   * @return array
   */
  public function formElement(ConfigEntityInterface $email_entity) {
    $email_token_help = '';
    $id = $email_entity->get('id');
    $config = $this->configFactory()->get('user.mail');

    $form = [
      '#type' => 'details',
      '#title' => $this->t($email_entity->get('label')),
      '#description' => $this->t($email_entity->get('description')) . ' ' . $email_token_help,
      '#group' => 'email',
      '#weight' => 15,
    ];

    $form['email_' . $id . '_subject'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Subject'),
      '#default_value' => $config->get($id . '.subject'),
      '#maxlength' => 180,
    ];

    $form['email_' . $id . '_body'] = [
      '#type' => 'text_format',
      '#format' => 'full_html',
      '#title' => $this->t('Body'),
      '#default_value' => $config->get($id . '.body'),
      '#rows' => 15,
    ];

    $form['link'] = [
      '#title' => 'Preview',
      '#type' => 'link',
      '#url' => Url::fromRoute(
        'better_emails.email_preview',
        [
          'email_id' => $id,
        ]
      ),
      '#attributes' => [
        'class' => ['use-ajax'],
        'data-dialog-type' => 'dialog',
        'data-dialog-options' => Json::encode(['width' => 800]),
      ],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    // Convert values format of modified templates.
    foreach ($form_state->getValues() as $key => $value) {
      if (strstr($key, 'body') && is_array($value)) {
        $form_state->setValue($key, $form_state->getValue($key)['value']);
      }
    }
    parent::submitForm($form, $form_state);

    $emails = $this->entityTypeManager->getStorage('emails')->loadMultiple();
    $mail_config = $this->configFactory()->getEditable('user.mail');

    // Save custom templates configs.
    foreach ($emails as $id => $configName) {
      $subject_value = $form_state->getValue('email_' . $id . '_subject');
      $body_value = $form_state->getValue('email_' . $id . '_body');
      $mail_config->set($id . '.subject', $subject_value);
      $mail_config->set($id . '.body', $body_value)->save();
    }

  }

}
