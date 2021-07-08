<?php

namespace Drupal\modal_page\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ModalForm.
 */
class ModalForm extends EntityForm {


  /**
   * The language manager.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * Construct of Modal Page.
   */
  public function __construct(LanguageManagerInterface $language_manager) {
    $this->languageManager = $language_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('language_manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    /* @var \Drupal\modal_page\Entity\Modal $modal */
    $modal = $this->entity;

    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#maxlength' => 255,
      '#default_value' => $modal->label(),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $modal->id(),
      '#machine_name' => [
        'exists' => '\Drupal\modal_page\Entity\Modal::load',
      ],
      '#disabled' => !$modal->isNew(),
    ];

    $body = '';

    if (!empty($modal->getBody())) {
      $body = $modal->getBody();
    }

    if (!empty($body['value'])) {
      $body = $body['value'];
    }

    $displayTitle = TRUE;

    if (empty($modal->isNew())) {
      $displayTitle = $modal->getDisplayTitle();
    }

    $form['display_title'] = [
      '#title' => $this->t('Display title'),
      '#type' => 'checkbox',
      '#default_value' => $displayTitle,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_header"]' => ['checked' => TRUE],
        ],
        'checked' => [
          ':input[name="display_title_in_modal_header"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['body'] = [
      '#title' => $this->t('Body'),
      '#required' => TRUE,
      '#type' => 'text_format',
      '#format' => 'full_html',
      '#default_value' => $body,
    ];

    $form['pages'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Pages'),
      '#format' => 'full_html',
      '#default_value' => $modal->getPages(),
      '#description' => $this->t("One per line. The '*' character is a wildcard. An example path is /admin/* for every admin pages. Leave in blank to show in all pages. @front_key@ is used to front page", ['@front_key@' => '<front>']),
    ];

    $form['pages']['#states']['visible'][] = [':input[id="edit-type"]' => ['value' => 'page']];

    $form['parameters'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Parameters'),
      '#format' => 'full_html',
      '#default_value' => $modal->getParameters(),
      '#description' => $this->t("Parameters for the Modal appear. One per line. An example path is welcome for show in this parameter. In URL should be /page?modal=welcome"),
    ];

    $form['parameters']['#states']['visible'][] = [':input[id="edit-type"]' => ['value' => 'parameter']];

    $autoOpen = $modal->getAutoOpen();

    if ($modal->isNew()) {
      $autoOpen = TRUE;
    }

    $form['auto_open'] = [
      '#title' => $this->t('Auto Open'),
      '#type' => 'checkbox',
      '#default_value' => $autoOpen,
    ];

    $descriptionOpenModalOnElementClick = $this->t('Example: <b>@example_class@</b>. Default is <b>@default_class@</b>', [
      '@example_class@' => '.open-modal-welcome',
      '@default_class@' => '.open-modal-page',
    ]);

    $form['open_modal_on_element_click'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Open this modal clicking on this element'),
      '#default_value' => $modal->getOpenModalOnElementClick(),
      '#description' => $descriptionOpenModalOnElementClick,
    ];

    $languages = $this->languageManager->getLanguages();

    $languagesOptions = [];
    foreach ($languages as $lid => $language) {
      $languagesOptions[$lid] = $language->getName();
    }

    $langCode = $modal->getLangCode();

    if ($modal->isNew()) {
      $langCode = $this->languageManager->getCurrentLanguage()->getId();
    }

    $form['langcode'] = [
      '#type' => 'select',
      '#title' => $this->t('Language'),
      '#options' => $languagesOptions,
      '#default_value' => $langCode,
    ];

    if (count($languages) <= 1) {
      $disabled = ['disabled' => 'disabled'];
      $form['langcode']['#attributes'] = $disabled;
      unset($form['langcode']);
    }

    $form['advanced'] = [
      '#type' => 'vertical_tabs',
      '#default_tab' => 'modal_header',
    ];

    $form['modal_header'] = [
      '#type' => 'details',
      '#title' => $this->t('MODAL HEADER'),
      '#group' => 'advanced',
    ];

    $form['modal_header']['enable'] = [
      '#type' => 'details',
      '#title' => $this->t('Enable'),
      '#open' => TRUE,
    ];

    $enableModalFooterHeader = $modal->getEnableModalHeader();

    if ($modal->isNew()) {
      $enableModalFooterHeader = TRUE;
    }

    $form['modal_header']['enable']['enable_modal_header'] = [
      '#title' => $this->t('Show Modal Header'),
      '#type' => 'checkbox',
      '#default_value' => $enableModalFooterHeader,
    ];

    $form['modal_header']['title'] = [
      '#type' => 'details',
      '#title' => $this->t('Title'),
      '#open' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_header"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['modal_header']['title']['display_title_in_modal_header'] = [
      '#title' => $this->t('Display title'),
      '#type' => 'checkbox',
      '#default_value' => $displayTitle,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_header"]' => ['checked' => TRUE],
        ],
        'checked' => [
          ':input[name="display_title"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['modal_header']['button_close'] = [
      '#type' => 'details',
      '#title' => $this->t('Button X close'),
      '#open' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_header"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $displayButtonXclose = TRUE;

    if (empty($modal->isNew())) {
      $displayButtonXclose = $modal->getDisplayButtonXclose();
    }

    $form['modal_header']['button_close']['display_button_x_close'] = [
      '#title' => $this->t('Display button "X" to close'),
      '#type' => 'checkbox',
      '#default_value' => $displayButtonXclose,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_header"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['modal_header']['horizontal_line'] = [
      '#type' => 'details',
      '#title' => $this->t('Horizontal Line'),
      '#open' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_header"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $insertHorizontalLineHeader = $modal->getInsertHorizontalLineHeader();

    if ($modal->isNew()) {
      $insertHorizontalLineHeader = TRUE;
    }

    $form['modal_header']['horizontal_line']['insert_horizontal_line_header'] = [
      '#title' => $this->t('Insert horizontal line'),
      '#type' => 'checkbox',
      '#default_value' => $insertHorizontalLineHeader,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_header"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['modal_footer'] = [
      '#type' => 'details',
      '#title' => $this->t('MODAL FOOTER'),
      '#group' => 'advanced',
    ];

    $form['modal_footer']['enable'] = [
      '#type' => 'details',
      '#title' => $this->t('Enable'),
      '#open' => TRUE,
    ];

    $enableModalFooter = $modal->getEnableModalFooter();

    if ($modal->isNew()) {
      $enableModalFooter = TRUE;
    }

    $form['modal_footer']['enable']['enable_modal_footer'] = [
      '#title' => $this->t('Show Modal Footer'),
      '#type' => 'checkbox',
      '#default_value' => $enableModalFooter,
    ];

    $form['modal_footer']['horizontal_line'] = [
      '#type' => 'details',
      '#title' => $this->t('Horizontal Line'),
      '#open' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $insertHorizontalLineFooter = $modal->getInsertHorizontalLineFooter();

    if ($modal->isNew()) {
      $insertHorizontalLineFooter = TRUE;
    }

    $form['modal_footer']['horizontal_line']['insert_horizontal_line_footer'] = [
      '#title' => $this->t('Insert horizontal line'),
      '#type' => 'checkbox',
      '#default_value' => $insertHorizontalLineFooter,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['modal_footer']['ok_button'] = [
      '#type' => 'details',
      '#title' => $this->t('OK Button'),
      '#open' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $okLabelButton = $modal->getOkLabelButton();

    if ($modal->isNew()) {
      $okLabelButton = $this->t('OK');
    }

    $form['modal_footer']['ok_button']['ok_label_button'] = [
      '#type' => 'textfield',
      '#title' => $this->t('OK Label Button'),
      '#default_value' => $okLabelButton,
      '#description' => $this->t('If blank the value will be <b>@default_label@</b>', [
        '@default_label@' => 'OK',
      ]),
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['modal_footer']['dont_show_again'] = [
      '#type' => 'details',
      '#title' => $this->t("Don't show again"),
      '#open' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $enableDontShowAgainOption = $modal->getEnableDontShowAgainOption();

    if ($modal->isNew()) {
      $enableDontShowAgainOption = TRUE;
    }

    $form['modal_footer']['dont_show_again']['enable_dont_show_again_option'] = [
      '#title' => $this->t('Enable option <b>@dont_show_again_label@</b>', [
        '@dont_show_again_label@' => "Don't show again",
      ]),
      '#type' => 'checkbox',
      '#default_value' => $enableDontShowAgainOption,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $dontShowAgainLabel = $modal->getDontShowAgainLabel();

    if ($modal->isNew()) {
      $dontShowAgainLabel = $this->t("Don't show again");
    }

    $form['modal_footer']['dont_show_again']['dont_show_again_label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#default_value' => $dontShowAgainLabel,
      '#description' => $this->t('If blank the value will be <b>@dont_show_again_label@</b>', [
        '@dont_show_again_label@' => "Don't show again",
      ]),
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['modal_customization'] = [
      '#type' => 'details',
      '#title' => $this->t('MODAL STYLES'),
      '#group' => 'advanced',
    ];

    $form['modal_customization']['modal_size'] = [
      '#type' => 'details',
      '#title' => $this->t("Modal Size"),
      '#open' => TRUE,
    ];

    $modalSizeOptions = [
      'modal-sm' => 'Small',
      'modal-md' => 'Medium',
      'modal-lg' => 'Large',
    ];

    $modalSizeDefaultValue = $modal->getModalSize();

    if ($modal->isNew()) {
      $modalSizeDefaultValue = 'modal-md';
    }

    $form['modal_customization']['modal_size']['modal_size'] = [
      '#type' => 'select',
      '#title' => $this->t('Modal Size'),
      '#options' => $modalSizeOptions,
      '#default_value' => $modalSizeDefaultValue,
    ];

    $form['modal_customization']['close_modal_options'] = [
      '#type' => 'details',
      '#title' => $this->t("Close Modal"),
      '#open' => TRUE,
    ];

    $closeModalEscKey = $modal->getCloseModalEscKey();

    if ($modal->isNew()) {
      $closeModalEscKey = TRUE;
    }

    $form['modal_customization']['close_modal_options']['close_modal_esc_key'] = [
      '#title' => $this->t('Close Modal pressing ESC key'),
      '#type' => 'checkbox',
      '#default_value' => $closeModalEscKey,
    ];

    $closeModalClickingOutside = $modal->getCloseModalClickingOutside();

    if ($modal->isNew()) {
      $closeModalClickingOutside = TRUE;
    }

    $form['modal_customization']['close_modal_options']['close_modal_clicking_outside'] = [
      '#title' => $this->t('Close Modal clicking outside the modal'),
      '#type' => 'checkbox',
      '#default_value' => $closeModalClickingOutside,
    ];

    $form['roles_restriction'] = [
      '#type' => 'details',
      '#title' => $this->t('ROLES RESTRICTION'),
      '#group' => 'advanced',
    ];

    $form['roles_restriction']['roles_details'] = [
      '#type' => 'details',
      '#title' => $this->t('Roles'),
      '#open' => TRUE,
    ];

    $roles = $modal->getRoles();

    if ($modal->isNew()) {
      $roles = [];
    }

    $form['roles_restriction']['roles_details']['roles'] = [
      '#title' => $this->t('Who can access this Modal'),
      '#type' => 'checkboxes',
      '#options' => user_role_names(),
      '#default_value' => $roles,
      '#description' => $this->t('If no role is selected this Modal will be visible to everyone.'),
    ];

    $form['extras'] = [
      '#type' => 'details',
      '#title' => $this->t('EXTRAS'),
      '#group' => 'advanced',
    ];

    $modalTypeOptions = [
      'page' => 'Page',
      'parameter' => 'Parameter',
    ];

    $type = $modal->getType();

    if ($modal->isNew()) {
      $type = 'page';
    }

    $form['extras']['type'] = [
      '#type' => 'select',
      '#title' => $this->t('Modal By'),
      '#options' => $modalTypeOptions,
      '#default_value' => $type,
    ];

    $defaultValueDelayDisplay = $modal->getDelayDisplay();

    if ($modal->isNew()) {
      $defaultValueDelayDisplay = 0;
    }

    $form['extras']['delay_display'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Delay to display'),
      '#default_value' => $defaultValueDelayDisplay,
      '#description' => $this->t('Value in seconds.'),
    ];

    $published = $modal->getPublished();

    if ($modal->isNew()) {
      $published = TRUE;
    }

    $form['extras']['published'] = [
      '#title' => $this->t('Published'),
      '#type' => 'checkbox',
      '#default_value' => $published,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

    $values = $form_state->getValues();

    if (empty($values['pages'])) {
      return FALSE;
    }

    $pages = $values['pages'];

    $urlList = [];
    $urlList = explode(PHP_EOL, $pages);

    foreach ($urlList as $url) {

      $trimUrl = trim($url);

      // Validate Slash.
      if ($trimUrl !== '<front>' && $trimUrl[0] !== '/' && $trimUrl[0] !== '') {
        $form_state->setErrorByName('pages', $this->t("@url path needs to start with a slash.", ['@url' => $trimUrl]));
      }

      // Validate wildcard.
      if (strpos($trimUrl, '*') !== FALSE && substr($trimUrl, -1) != '*') {
        $form_state->setErrorByName('pages', $this->t("The wildcard * must be used at the end of the path. E.g. /admin/*"));
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {

    $modal = $this->entity;

    $body = '';
    if (!empty($form_state->getValue('body'))) {
      $body = $form_state->getValue('body');
    }

    $modal->setBody($body);

    $pages = '';
    if (!empty($form_state->getValue('pages'))) {
      $pages = $form_state->getValue('pages');
    }

    $modal->setPages($pages);

    $status = $modal->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Modal.', [
          '%label' => $modal->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Modal.', [
          '%label' => $modal->label(),
        ]));
    }
    $form_state->setRedirectUrl($modal->toUrl('collection'));

    // Clear Views' cache.
    drupal_flush_all_caches();
  }

}
