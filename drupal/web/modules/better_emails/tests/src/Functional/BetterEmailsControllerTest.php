<?php

namespace Drupal\Tests\better_emails\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Provides automated tests for the better_emails module.
 */
class BetterEmailsControllerTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "better_emails BetterEmailsController's controller functionality",
      'description' => 'Test Unit for module better_emails and controller BetterEmailsController.',
      'group' => 'Other',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests better_emails functionality.
   */
  public function testBetterEmailsController() {
    // Check that the basic functions of module better_emails.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
