<?php
 
namespace Drupal\cookies_page_cache;
 
use Drupal\cookies_page_cache\StackMiddleware\CookiesPageCache;
use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceModifierInterface;
 
/**
 * Overrides the Core PageCache service.
 */
class CookiesPageCacheServiceProvider implements ServiceModifierInterface {
 
  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    $container->getDefinition('http_middleware.page_cache')->setClass(CookiesPageCache::class);
  }
 
}