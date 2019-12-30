<?php

namespace Resellerclub;

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../../src/index.php';

class ValidationTest extends TestCase {

  /**
   * @var \Resellerclub\Validation
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp() {
    $mock = $this->getMock('\Resellerclub\Validation', array('callApi'));
    $mock->method('callApi')->willReturn(array('success' => TRUE));
    $this->object = $mock;
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown() {

  }

  /**
   * @covers \Resellerclub\Validation::validate
   */
  public function testValidateEmail() {
    $this->assertTrue($this->object->validate('string', 'email', 'mail@example.com'));
    $this->assertFalse($this->object->validate('string', 'email', 'mail@example'));
  }

  /**
   * @covers \Resellerclub\Validation::validate
   */
  public function testValidateIps() {
    $this->assertTrue($this->object->validate('string', 'ip', '8.8.8.8'));
    $this->assertFalse(
      $this->object->validate(
        'string',
        'ip',
        array('8.8.8.8', '8.8.4.4')
      )
    );
  }

}
