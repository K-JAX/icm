<?php

namespace Drupal\better_emails\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Routing\RouteBuilderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Class OptionsForm.
 */
class OptionsForm extends FormBase {

  /**
   * Drupal\Core\Config\ConfigFactoryInterface definition.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  protected $routerBuilder;

  /**
   * Constructs a new OptionsForm object.
   */
  public function __construct(
    ConfigFactoryInterface $config_factory,
    RouteBuilderInterface $route_builder
  ) {
    $this->configFactory = $config_factory;
    $this->routerBuilder = $route_builder;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('router.builder')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'options_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['enable_better_emails'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable Better Emails'),
      '#description' => $this->t(
        'Activating better emails will extend the Drupal Core Emails by inheriting their standard form by own improved.'
      ),
      '#default_value' => $this->configFactory->get('better_emails.configs')
        ->get('configs.enable_better_emails') ?? FALSE,
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    try {
      $this->configFactory->getEditable('better_emails.configs')
        ->set('configs.enable_better_emails', $form_state->getValue('enable_better_emails'))
        ->save();
      $this->routerBuilder->rebuild();
      // Display result.
      $this->messenger()->addMessage('Saved');

    }
    catch (\Exception $exception) {
      $this->messenger()->addError('Exception: ' . $exception->getMessage());
    }

  }

}
