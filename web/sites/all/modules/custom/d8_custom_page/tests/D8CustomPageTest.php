<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 3/26/19
 * Time: 12:03 AM
 */


use PHPUnit\Framework\TestCase;

class D8CustomPageTest extends TestCase {
  public function setUp() {
    drupal_load('module', 'd8_custom_page');
    parent::setUp();
  }

  public function testCustomPageFooFunction() {
    $message = 'calling the "foo" function returns an HTML H1 tag containing "bar".';
    $output = d8_custom_page_foo();
    $this->assertEqual($output, '<h1>bar</h1>', $message);
  }

  public function testCustomPageCanary() {
    $message = 'simple addition operation.';
    $this->assertEqual(2 + 2, 5, $message);
  }
}