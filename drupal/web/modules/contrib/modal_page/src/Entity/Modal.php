<?php

namespace Drupal\modal_page\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Modal entity.
 *
 * @ConfigEntityType(
 *   id = "modal",
 *   label = @Translation("Modal"),
 *   label_collection = @Translation("Modals"),
 *   label_singular = @Translation("Modal"),
 *   label_plural = @Translation("Modals"),
 *   label_count = @PluralTranslation(
 *     singular = "@count Modal",
 *     plural = "@count Modals",
 *   ),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\modal_page\ModalListBuilder",
 *     "form" = {
 *       "add" = "Drupal\modal_page\Form\ModalForm",
 *       "edit" = "Drupal\modal_page\Form\ModalForm",
 *       "delete" = "Drupal\modal_page\Form\ModalDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\modal_page\ModalHtmlRouteProvider",
 *     },
 *     "translation" = "Drupal\node\NodeTranslationHandler",
 *   },
 *   config_prefix = "modal",
 *   admin_permission = "administer modal page",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *     "body" = "body",
 *     "pages" = "pages",
 *     "parameters" = "parameters",
 *     "auto_open" = "auto_open",
 *     "open_modal_on_element_click" = "open_modal_on_element_click",
 *     "langcode" = "langcode",
 *     "ok_label_button" = "ok_label_button",
 *     "enable_dont_show_again_option" = "enable_dont_show_again_option",
 *     "dont_show_again_label" = "dont_show_again_label",
 *     "modal_size" = "modal_size",
 *     "close_modal_esc_key" = "close_modal_esc_key",
 *     "close_modal_clicking_outside" = "close_modal_clicking_outside",
 *     "roles" = "roles",
 *     "type" = "type",
 *     "delay_display" = "delay_display",
 *     "published" = "published",
 *     "insert_horizontal_line_header" = "insert_horizontal_line_header",
 *     "insert_horizontal_line_footer" = "insert_horizontal_line_footer",
 *     "enable_modal_header" = "enable_modal_header",
 *     "enable_modal_footer" = "enable_modal_footer",
 *     "display_title" = "display_title",
 *     "display_button_x_close" = "display_button_x_close",
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "uuid",
 *     "body",
 *     "pages",
 *     "parameters",
 *     "auto_open",
 *     "open_modal_on_element_click",
 *     "langcode",
 *     "ok_label_button",
 *     "enable_dont_show_again_option",
 *     "dont_show_again_label",
 *     "modal_size",
 *     "close_modal_esc_key",
 *     "close_modal_clicking_outside",
 *     "roles",
 *     "type",
 *     "delay_display",
 *     "published",
 *     "insert_horizontal_line_header",
 *     "insert_horizontal_line_footer",
 *     "enable_modal_header",
 *     "enable_modal_footer",
 *     "display_title",
 *     "display_button_x_close",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/modal/{modal}",
 *     "add-form" = "/admin/structure/modal/add",
 *     "edit-form" = "/admin/structure/modal/{modal}/edit",
 *     "delete-form" = "/admin/structure/modal/{modal}/delete",
 *     "collection" = "/admin/structure/modal"
 *   }
 * )
 */
class Modal extends ConfigEntityBase implements ModalInterface {

  /**
   * The Modal ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Modal label.
   *
   * @var string
   */
  protected $label;

  /**
   * Body.
   *
   * @var string
   */
  protected $body;

  /**
   * Pages.
   *
   * @var string
   */
  protected $pages;

  /**
   * Parameters.
   *
   * @var string
   */
  protected $parameters;

  /**
   * Auto Open.
   *
   * @var string
   */
  protected $autoOpen;

  /**
   * Open Modal on Element Click.
   *
   * @var string
   */
  protected $openModalOnElementClick;

  /**
   * Language code.
   *
   * @var string
   */
  protected $langCode;

  /**
   * Ok Label Button.
   *
   * @var string
   */
  protected $okLabelButton;

  /**
   * Ok Label Button.
   *
   * @var bool
   */
  protected $enableDontShowAgainOption;

  /**
   * Dont Show Again Label.
   *
   * @var string
   */
  protected $dontShowAgainLabel;

  /**
   * Modal Size.
   *
   * @var string
   */
  protected $modalSize;

  /**
   * Close Modal pressing ESC key.
   *
   * @var string
   */
  protected $closeModalEscKey;

  /**
   * Close Modal clicking outside the Modal.
   *
   * @var string
   */
  protected $closeModalClickingOutside;

  /**
   * Roles.
   *
   * @var string
   */
  protected $roles;

  /**
   * Type.
   *
   * @var string
   */
  protected $type;

  /**
   * Delay Display.
   *
   * @var string
   */
  protected $delayDisplay;

  /**
   * Published.
   *
   * @var string
   */
  protected $published;

  /**
   * Insert Horizontal Line Header.
   *
   * @var string
   */
  protected $insertHorizontalLineHeader;

  /**
   * Insert Horizontal Line Footer.
   *
   * @var string
   */
  protected $insertHorizontalLineFooter;

  /**
   * Enable Modal Header.
   *
   * @var bool
   */
  protected $enableModalHeader;

  /**
   * Enable Modal footer.
   *
   * @var bool
   */
  protected $enableModalFooter;

  /**
   * Display Title.
   *
   * @var bool
   */

  protected $displayTitle;

  /**
   * Display Button X to close.
   *
   * @var bool
   */

  protected $displayButtonXclose;

  /**
   * Get Id.
   */
  public function getId() {
    return $this->get('id');
  }

  /**
   * Set Id.
   */
  public function setId($id) {
    $this->set('id', $id);
    return $this;
  }

  /**
   * Get Label.
   */
  public function getLabel() {
    return $this->get('label');
  }

  /**
   * Set Label.
   */
  public function setLabel($label) {
    $this->set('label', $label);
    return $this;
  }

  /**
   * Get Body.
   */
  public function getBody() {
    return $this->get('body');
  }

  /**
   * Set Body.
   */
  public function setBody($body) {
    $this->set('body', $body);
    return $this;
  }

  /**
   * Get Pages.
   */
  public function getPages() {
    return $this->get('pages');
  }

  /**
   * Set Pages.
   */
  public function setPages($pages) {
    $this->set('pages', $pages);
    return $this;
  }

  /**
   * Get Parameters.
   */
  public function getParameters() {
    return $this->get('parameters');
  }

  /**
   * Set Parameters.
   */
  public function setParameters($parameters) {
    $this->set('parameters', $parameters);
    return $this;
  }

  /**
   * Auto Open.
   */
  public function getAutoOpen() {
    return $this->get('auto_open');
  }

  /**
   * Auto Open.
   */
  public function setAutoOpen($autoOpen) {
    $this->set('auto_open', $autoOpen);
    return $this;
  }

  /**
   * Get Open Modal on Element Click.
   */
  public function getOpenModalOnElementClick() {
    return $this->get('open_modal_on_element_click');
  }

  /**
   * Set Open Modal on Element Click.
   */
  public function setOpenModalOnElementClick($openModalOnElementClick) {
    $this->set('open_modal_on_element_click', $openModalOnElementClick);
    return $this;
  }

  /**
   * Get LangCode.
   */
  public function getLangCode() {
    return $this->get('langcode');
  }

  /**
   * Set LangCode.
   */
  public function setLangCode($langCode) {
    $this->set('langcode', $langCode);
    return $this;
  }

  /**
   * Get Ok Label Button.
   */
  public function getOkLabelButton() {
    return $this->get('ok_label_button');
  }

  /**
   * Set Ok Label Button.
   */
  public function setOkLabelButton($okLabelButton) {
    $this->set('ok_label_button', $okLabelButton);
    return $this;
  }

  /**
   * Get Enable Don't Show Again.
   */
  public function getEnableDontShowAgainOption() {
    return $this->get('enable_dont_show_again_option');
  }

  /**
   * Set Enable Don't Show Again.
   */
  public function setEnableDontShowAgainOption($enableDontShowAgainOption) {
    $this->set('enable_dont_show_again_option', $enableDontShowAgainOption);
    return $this;
  }

  /**
   * Get Dont Show Again Label.
   */
  public function getDontShowAgainLabel() {
    return $this->get('dont_show_again_label');
  }

  /**
   * Set Dont Show Again Label.
   */
  public function setDontShowAgainLabel($dontShowAgainLabel) {
    $this->set('dont_show_again_label', $dontShowAgainLabel);
    return $this;
  }

  /**
   * Get Modal Size.
   */
  public function getModalSize() {
    return $this->get('modal_size');
  }

  /**
   * Set Modal Size.
   */
  public function setModalSize($modalSize) {
    $this->set('modal_size', $modalSize);
    return $this;
  }

  /**
   * Get Close Modal ESC key.
   */
  public function getCloseModalEscKey() {
    return $this->get('close_modal_esc_key');
  }

  /**
   * Set Close Modal ESC key.
   */
  public function setCloseModalEscKey($closeModalEscKey) {
    $this->set('close_modal_esc_key', $closeModalEscKey);
    return $this;
  }

  /**
   * Get Close Modal clicking outside the Modal.
   */
  public function getCloseModalClickingOutside() {
    return $this->get('close_modal_clicking_outside');
  }

  /**
   * Set Close Modal clicking outside the Modal.
   */
  public function setCloseModalClickingOutside($closeModalEscKey) {
    $this->set('close_modal_clicking_outside', $closeModalEscKey);
    return $this;
  }

  /**
   * Get Roles.
   */
  public function getRoles() {
    return $this->get('roles');
  }

  /**
   * Set Roles.
   */
  public function setRoles($roles) {
    $this->set('roles', $roles);
    return $this;
  }

  /**
   * Get Type.
   */
  public function getType() {
    return $this->get('type');
  }

  /**
   * Set Type.
   */
  public function setType($type) {
    $this->set('type', $type);
    return $this;
  }

  /**
   * Get Delay Display.
   */
  public function getDelayDisplay() {
    return $this->get('delay_display');
  }

  /**
   * Set Delay Display.
   */
  public function setDelayDisplay($delayDisplay) {
    $this->set('delay_display', $delayDisplay);
    return $this;
  }

  /**
   * Get Published.
   */
  public function getPublished() {
    return $this->get('published');
  }

  /**
   * Set Published.
   */
  public function setPublished($published) {
    $this->set('published', $published);
    return $this;
  }

  /**
   * Get Insert Horizontal Line Header.
   */
  public function getInsertHorizontalLineHeader() {
    return $this->get('insert_horizontal_line_header');
  }

  /**
   * Set Insert Horizontal Line Header.
   */
  public function setInsertHorizontalLineHeader($insertHorizontalLineHeader) {
    $this->set('insert_horizontal_line_header', $insertHorizontalLineHeader);
    return $this;
  }

  /**
   * Get Insert Horizontal Line Footer.
   */
  public function getInsertHorizontalLineFooter() {
    return $this->get('insert_horizontal_line_footer');
  }

  /**
   * Set Insert Horizontal Line Footer.
   */
  public function setInsertHorizontalLineFooter($insertHorizontalLineFooter) {
    $this->set('insert_horizontal_line_footer', $insertHorizontalLineFooter);
    return $this;
  }

  /**
   * Get Enable Modal Header.
   */
  public function getEnableModalHeader() {
    return $this->get('enable_modal_header');
  }

  /**
   * Set Enable Modal Header.
   */
  public function setEnableModalHeader($enableModalHeader) {
    $this->set('enable_modal_header', $enableModalHeader);
    return $this;
  }

  /**
   * Get Enable Modal footer.
   */
  public function getEnableModalFooter() {
    return $this->get('enable_modal_footer');
  }

  /**
   * Set Enable Modal footer.
   */
  public function setEnableModalFooter($enableModalFooter) {
    $this->set('enable_modal_footer', $enableModalFooter);
    return $this;
  }

  /**
   * Get Display Title.
   */
  public function getDisplayTitle() {
    return $this->get('display_title');
  }

  /**
   * Set Display Title.
   */
  public function setDisplayTitle($displayTitle) {
    $this->set('display_title', $displayTitle);
    return $this;
  }

  /**
   * Get Display Button X close.
   */
  public function getDisplayButtonXclose() {
    return $this->get('display_button_x_close');
  }

  /**
   * Get Display Button X close.
   */
  public function setDisplayButtonXclose($displayButtonXclose) {
    $this->set('display_button_x_close', $displayButtonXclose);
    return $this;
  }

}
