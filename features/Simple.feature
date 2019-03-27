
Feature: Custom Page

  @api
  Scenario: Viewing the Foo Page
    Given I am logged in as a user with the "administrator" role
    When I go to the url "/foo"
    Then the page header reads "bar"