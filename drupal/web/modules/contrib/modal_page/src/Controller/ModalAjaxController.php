<?php

namespace Drupal\modal_page\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Extension\ExtensionList;
use Drupal\Core\Routing\RouteMatchInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\modal_page\Service\ModalPageHelperService;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Controller routines for Ajax routes.
 */
class ModalAjaxController extends ControllerBase {

  /**
   * The current route match.
   *
   * @var \Drupal\Core\Routing\RouteMatchInterface
   */
  protected $routeMatch;

  /**
   * The extension list module.
   *
   * @var \Drupal\Core\Extension\ExtensionList
   */
  protected $extensionListModule;

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Modal Page Helper Service.
   *
   * @var \Drupal\modal_page\Service\ModalPageHelperService
   */
  protected $modalPageHelperService;

  /**
   * The project handler.
   *
   * @var \Drupal\Core\Extension\ProjectHandler
   */
  protected $projectHandler;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Creates a new HelpController.
   */
  public function __construct(RouteMatchInterface $route_match, ExtensionList $extension_list_module, ConfigFactoryInterface $config_factory, ModalPageHelperService $modalPageHelperService, ModuleHandlerInterface $projectHandler, EntityTypeManagerInterface $entityManager) {
    $this->routeMatch = $route_match;
    $this->extensionListModule = $extension_list_module;
    $this->configFactory = $config_factory;
    $this->modalPageHelperService = $modalPageHelperService;
    $this->projectHandler = $projectHandler;
    $this->entityTypeManager = $entityManager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('current_route_match'),
      $container->get('extension.list.module'),
      $container->get('config.factory'),
      $container->get('modal_page.helper'),
      $container->get('module_handler'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function hookModalSubmit() {

    // We need use Service on this item. @codingStandardsIgnoreLine
    if (empty($_POST['id'])) {
      echo FALSE;
      exit;
    }

    // We need use Service on this item. @codingStandardsIgnoreLine
    $modalId = $_POST['id'];

    // Load Modal.
    $modal = $this->entityTypeManager->getStorage('modal')->load($modalId);

    if (empty($modal)) {
      echo FALSE;
      exit;
    }

    // Verify if User Has Access on this Modal.
    $userHasAccessOnModal = $this->modalPageHelperService->verifyIfUserHasAccessOnModal($modal);

    if (empty($userHasAccessOnModal)) {
      echo FALSE;
      exit;
    }

    // Load Methods.
    $projectsThatImplementsHookModalSubmit = $this->projectHandler->getImplementations('modal_submit');

    if (empty($projectsThatImplementsHookModalSubmit)) {
      echo FALSE;
      exit;
    }

    $modalState = [];
    // We need use Service on this item. @codingStandardsIgnoreLine
    if (!empty($_POST['modal_state'])) {
      // We need use Service on this item. @codingStandardsIgnoreLine
      $modalState = $_POST['modal_state'];
    }

    // Arguments to be sent to Hook.
    $argsToHookModalSubmit = [
      'modal' => $modal,
      'modal_state' => $modalState,
      'modal_id' => $modalId,
    ];

    $hookNameModalIdModalSubmit = $modalId . '_modal_submit';

    $this->projectHandler->invokeAll($hookNameModalIdModalSubmit, $argsToHookModalSubmit);

    $hookNameModalSubmit = 'modal_submit';

    $this->projectHandler->invokeAll($hookNameModalSubmit, $argsToHookModalSubmit);

    echo TRUE;
    exit;
  }

}
