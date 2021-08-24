<?php

namespace Drupal\layout_builder_ids\EventSubscriber;

use Drupal\layout_builder\Event\SectionComponentBuildRenderArrayEvent;
use Drupal\layout_builder\LayoutBuilderEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Render the layout with block ids.
 */
class LayoutBuilderIdsRenderSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {

    // Layout Builder also subscribes to this event to build the initial render
    // array. We use a higher weight so that we execute after it.
    $events[LayoutBuilderEvents::SECTION_COMPONENT_BUILD_RENDER_ARRAY] = [
      'onBuildRender',
      50,
    ];

    return $events;
  }

  /**
   * Add each component's block styles to the render array.
   *
   * @param \Drupal\layout_builder\Event\SectionComponentBuildRenderArrayEvent $event
   *   The section component render event.
   */
  public static function onBuildRender(SectionComponentBuildRenderArrayEvent $event) {

    // The render array.
    $build = $event->getBuild();

    // This shouldn't happen - Layout Builder should have already created the
    // initial build data.
    if (empty($build)) {
      return;
    }

    // Get the layout builder id.
    $layout_builder_id = $event->getComponent()->get('layout_builder_id');

    // If there is a layout builder id, then set it in the attributes.
    if ((string) $layout_builder_id) {

      // Set the id attribute.
      $build['#attributes']['id'] = $layout_builder_id;

      // Now set the build for the event.
      $event->setBuild($build);
    }
  }

}
