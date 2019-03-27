<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 3/25/19
 * Time: 3:13 PM
 */
declare(strict_types=1);


use PHPUnit\Framework\TestCase;

class CanaryTest extends TestCase {
  public function testSimpleAddition() {
    $this->assertEquals(4, 2 + 2, 'simple addition.');
  }

  public function testFailed() {
    $this->assertNotEquals('foo', 'BAR');
  }
}