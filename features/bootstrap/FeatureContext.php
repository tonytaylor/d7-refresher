<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;

use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Session;

use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends Assert implements Context
{
  /** @var string $siteRoot */
  protected $siteRoot;

  /** @var Session $session */
  protected $session;

  /** @var Behat\Mink\Driver\GoutteDriver $driver */
  protected $driver;

  /**
   * Initializes context.
   *
   * Every scenario gets its own context instance.
   * You can also pass arbitrary arguments to the
   * context constructor through behat.yml.
   */
  public function __construct() {
    $this->siteRoot = 'http://127.0.0.1';
    $this->driver = new GoutteDriver();
    $this->session = new Session($this->driver);
  }

  /**
   * @Given I am a user
   */
  public function thereIsAURLWithValueOf() {
    $this->session->start();
  }

  /**
   * @When I go to the url :path
   *
   * @param string $path URL Path.
   */
  public function iGoToTheUrl($path) {
    $this->session->visit($this->siteRoot . $path);
  }

  /**
   * @Then the page header reads :arg1
   *
   * @param string $arg1 Header text.
   */
  public function thePageReads($arg1) {
    $page = $this->session->getPage();

    $h1 = $page->find('css', '.content > h1');
    parent::assertEquals($arg1, $h1->getText(), 'found header text.');
  }
}
