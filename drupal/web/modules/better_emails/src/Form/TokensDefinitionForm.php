<?php

namespace Drupal\better_emails\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Utility\Token;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Class TokensDefinitionForm.
 */
class TokensDefinitionForm extends FormBase {

  /**
   * Drupal\Core\Config\ConfigFactoryInterface definition.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Token replacement system.
   *
   * @var \Drupal\Core\Utility\Token
   */
  protected $token;

  /**
   * TokensDefinitionForm constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   * @param \Drupal\Core\Utility\Token $token
   */
  public function __construct(
    ConfigFactoryInterface $config_factory,
    EntityTypeManagerInterface $entity_type_manager,
    Token $token
  ) {
    $this->configFactory = $config_factory;
    $this->entityTypeManager = $entity_type_manager;
    $this->token = $token;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('entity_type.manager'),
      $container->get('token')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'tokens_definition_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $email_id = '', $all_tokens = []) {

    $this->unsetSystemTokenGroups($all_tokens);

    $all_entities = $this->entityTypeManager->getDefinitions();
    ksort($all_entities);
    $form['#token_groups'] = array_keys($all_tokens);
    foreach ($all_entities as $entity) {
      $options[$entity->id()] = $entity->id();
    }

    foreach ($all_tokens as $group => $tokens) {
      $form[$group] = [
        '#type' => 'fieldset',
        '#title' => $group,
        '#description' => $this->t('Provide entity for <b>@group</b> tokens', ['@group' => $group]),
      ];
      $form[$group][$group . '_entity'] = [
        '#title' => $this->t('Entity type'),
        '#type' => 'select',
        '#options' => $options,
        '#empty_option' => $this->t('- Select entity type -'),
        '#ajax' => [
          // Could also use [get_class($this), 'updateColor'].
          'callback' => '::getIds',
          'wrapper' => $group . '-entity-id-wrapper',
        ],
      ];
      $form[$group][$group . '_entity_id_wrapper'] = [
        '#type' => 'container',
        '#attributes' => ['id' => $group . '-entity-id-wrapper'],
      ];
      $entity = $form_state->getValue($group . '_entity');
      if (!empty($entity)) {
        $form[$group . '_entity_id_wrapper'][$entity.'_id'] = [
          '#type' => 'select',
          '#title' => $this->t('ID'),
          '#options' => $this->getEntityIds($entity),
          '#empty_option' => $this->t('- Select entity ID -'),
        ];
        $form['#param'] = $group;
      }

    }

    $form['#email_id'] = $email_id;
    $form['actions'] = [
      '#type' => 'button',
      '#value' => $this->t('Submit'),
      '#ajax' => [
        'callback' => '::preparePreview',
      ],
    ];
    $form['preview'] = [
      '#type' => 'markup',
      '#markup' => '<div class="preview_html"></div>'
    ];

    return $form;
  }

  public function preparePreview(array $form, FormStateInterface $form_state) {

    $token_groups = $form['#token_groups'];
    $token_data = [];
    $values = $form_state->getValues();
    $data = [];
    foreach ($token_groups as $group) {
      $data[$group] = [
        'entity' => $values[$group . '_entity'],
        'id' => $values[$values[$group . '_entity'] . '_id'],
      ];
    }
    $email = $this->configFactory->get('user.mail')->get($form['#email_id']);
    foreach ($data as $name => $token_group) {
      $object = $this->entityTypeManager->getStorage($token_group['entity'])->load($token_group['id']);
      reset($object);
      $token_data[$token_group['entity']] = $object;
    }

    $content = '<br><br><div><b>Subject:</b><br><br>';
    $content .= $email['subject'];
    $content .= '</div><br><br>';
    $content .= '<div><b>Body:</b><br>';
    $content .= $email['body'];
    $content .= '</div>';
    $content = $this->token->replace($content, $token_data);

    $response = new AjaxResponse();
    $response->addCommand(
      new HtmlCommand(
        '.preview_html',
        $content
      )
    );
    return $response;
  }

  public function getEntityIds($entity) {
    $ids = array_values(array_keys($this->entityTypeManager->getStorage($entity)->loadMultiple()));
    $ids = array_combine($ids, $ids);
    return $ids;
  }

  public function getIds(array $form, FormStateInterface $form_state) {
    $group = $form['#param'];
    return $form[$group.'_entity_id_wrapper'];
  }

  public function unsetSystemTokenGroups(&$all_tokens) {
    unset($all_tokens['site']);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
  }

}
