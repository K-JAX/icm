<?php
 
namespace Drupal\cookies_page_cache\StackMiddleware;
 
use Drupal\page_cache\StackMiddleware\PageCache;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\Request;
 
/**
 * Extends PageCache to include cookie value in the Cache ID.
 */
class CookiesPageCache extends PageCache {
 
  /**
   * @inheritdoc
   */
  protected function getCacheId(Request $request) {
 
    if (!isset($this->cid)) {
      $cid_parts = [
        $request->getSchemeAndHttpHost() . $request->getRequestUri(),
        $request->getRequestFormat(NULL),
      ];
 
      // Only cache by Cookies on Node routes.
      $node = $request->attributes->get('node');
      if ($node instanceof NodeInterface) {
        $cid_parts[] = $request->cookies->get('userType', 'advisor_type');
        kint($cid_parts);
        // $cid_parts[] = $_COOKIE['userType'];
      } 
 
      $this->cid = implode(':', $cid_parts);
    }
 
    return $this->cid;
  }
 
}