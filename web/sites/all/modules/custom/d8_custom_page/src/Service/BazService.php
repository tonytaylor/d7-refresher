<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 3/24/19
 * Time: 4:11 AM
 */

namespace Drupal\d8_custom_page\Service;


class BazService {
  protected $greeting;

  public function __construct($greeting = "Hello,") {
    $this->greeting = $greeting;
  }

  public function greet($name) {
    return $this->greeting . "$name";
  }
}