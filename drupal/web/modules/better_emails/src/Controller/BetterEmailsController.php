<?php

namespace Drupal\better_emails\Controller;

use Drupal\better_emails\Form\TokensDefinitionForm;
use Drupal\Component\Utility\Html;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Mail\MailFormatHelper;
use Drupal\Core\Utility\Token;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class BetterEmailsController.
 */
class BetterEmailsController extends ControllerBase {

  public $configFactory;

  public $token;

  /**
   * BetterEmailsController constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   * @param \Drupal\Core\Utility\Token $token
   */
  public function __construct(
    ConfigFactoryInterface $config_factory,
    Token $token
  ) {
    $this->configFactory = $config_factory;
    $this->token = $token;
  }

  /**
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *
   * @return static
   */
  public static function create(ContainerInterface $container) {
    return new static (
      $container->get('config.factory'),
      $container->get('token')
    );
  }

  /**
   * Adjustmentsaction.
   *
   * @return string
   *   Return Hello string.
   */
  public function adjustmentsAction() {

    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: adjustmentsAction'),
    ];
  }

  /**
   * @param $message
   *
   * @return mixed
   */
  public function format($message) {
    // Wrap the mail body for sending.
    $body = Html::transformRootRelativeUrlsToAbsolute(
      $message['body'],
      \Drupal::request()
        ->getSchemeAndHttpHost()
    );
    $message['body'] = MailFormatHelper::wrapMail($body);
    return $message;
  }

  /**
   * @param $email_id
   *
   * @return array
   */
  public function emailPreviewAction($email_id) {
    $mail = $this->configFactory->get('user.mail')->get($email_id);
    $subject_tokens = $this->token->scan($mail['subject']);
    $body_tokens = $this->token->scan($mail['body']);
    $tokens = array_merge($body_tokens, $subject_tokens);
    $html = $this->formBuilder()->getForm(TokensDefinitionForm::class, $email_id, $tokens);
    return $html;
  }

}
