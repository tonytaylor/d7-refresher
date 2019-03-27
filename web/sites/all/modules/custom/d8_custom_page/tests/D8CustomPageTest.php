<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 3/26/19
 * Time: 12:03 AM
 */
declare(strict_types=1);


use PHPUnit\Framework\TestCase;

class D8CustomPageTest extends TestCase {
  public static function _webRoot() {
    return dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))));
  }

  public static function _bootstrap() {
    define('DRUPAL_ROOT', self::_webRoot());
    require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
    $_SERVER['REMOTE_ADDR'] = '127.0.0.1';
      // Bootstrap Drupal.
    drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
  }

  public static function setupBeforeClass() {
    self::_bootstrap();
  }

  public function setUp() {
    drupal_load('module', 'd8_custom_page');
    parent::setUp();
  }

  public function testCustomPageFooFunction() {
    $message = 'calling the "foo" function returns an HTML H1 tag containing "bar".';
    $output = d8_custom_page_foo();
    $this->assertEquals($output, '<h1>bar</h1>', $message);
  }
}