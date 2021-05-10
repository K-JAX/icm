<?php

namespace Drupal\better_emails\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Emails entity.
 *
 * @ConfigEntityType(
 *   id = "emails",
 *   label = @Translation("Emails"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\better_emails\EmailsListBuilder",
 *     "form" = {
 *       "add" = "Drupal\better_emails\Form\EmailsForm",
 *       "edit" = "Drupal\better_emails\Form\EmailsForm",
 *       "delete" = "Drupal\better_emails\Form\EmailsDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\better_emails\EmailsHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "emails",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/emails/{emails}",
 *     "add-form" = "/admin/structure/emails/add",
 *     "edit-form" = "/admin/structure/emails/{emails}/edit",
 *     "delete-form" = "/admin/structure/emails/{emails}/delete",
 *     "collection" = "/admin/structure/emails"
 *   }
 * )
 */
class Emails extends ConfigEntityBase implements EmailsInterface {

  /**
   * The Emails ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Emails label.
   *
   * @var string
   */
  protected $title;

  /**
   * The Emails label.
   *
   * @var string
   */
  protected $description;

}
