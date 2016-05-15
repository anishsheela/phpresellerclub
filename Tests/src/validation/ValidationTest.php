<?php

// TODO: use autoloader
require_once __DIR__ . '/../../../src/index.php';

/**
 * Created by PhpStorm.
 * User: anish
 * Date: 12/5/16
 * Time: 12:29 AM
 */
class ValidationTest extends PHPUnit_Framework_TestCase {

  /**
   * @var Validation
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp() {
    $mock = $this->getMock('Validation', array('callApi'));
    $mock->method('callApi')->willReturn('foo');
    $this->object = $mock;
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown() {

  }

  /**
   * @covers Validation::validate
   */
  public function testValidateEmail() {
    $this->assertTrue($this->object->validate('string', 'email', 'mail@example.com'));
    $this->assertFalse($this->object->validate('string', 'email', 'mail@example'));
  }
}
