<?php

namespace Resellerclub;
use PHPUnit\Framework\TestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-12-03 at 06:16:08.
 */
class BillingTest extends TestCase {

  /**
   * @var Billing
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp():void {
    $mock = $this->getMockBuilder(Billing::class)
      ->disableOriginalConstructor()
      ->setMethods(['callApi'])
      ->getMock();
    $mock->method('callApi')->willReturn(array('success' => TRUE));
    $this->object = $mock;
  }

  /**
   * @covers Billing::getCustomerPricing
   */
  public function testGetCustomerPricing() {
    $this->assertArrayHasKey(
      'success',
      $this->object->getCustomerPricing(34678976)
    );
  }

  /**
   * @covers \Resellerclub\Billing::getResellerPricing
   */
  public function testGetResellerPricing() {
    $this->assertArrayHasKey(
      'success',
      $this->object->getResellerPricing(34678976)
    );
  }

  /**
   * @covers \Resellerclub\Billing::getResellerCostPricing
   */
  public function testGetResellerCostPricing() {
    $this->assertArrayHasKey(
      'success',
      $this->object->getResellerCostPricing(789657)
    );
  }

  /**
   * @covers \Resellerclub\Billing::getCustomerTransactionDetails
   */
  public function testGetCustomerTransactionDetails() {
    $this->assertArrayHasKey(
      'success',
      $this->object->getCustomerTransactionDetails(array(67865489, 78987656))
    );
  }

  /**
   * @covers \Resellerclub\Billing::getResellerTransactionDetails
   */
  public function testGetResellerTransactionDetails() {
    $this->assertArrayHasKey(
      'success',
      $this->object->getResellerTransactionDetails(237678675)
    );
  }

  /**
   * @covers \Resellerclub\Billing::payTransactions
   */
  public function testPayTransactions() {
    $this->assertArrayHasKey(
      'success',
      $this->object->payTransactions(array(56879867, 78978907))
    );
  }

  /**
   * @covers \Resellerclub\Billing::cancelInvoiceDebitNote
   */
  public function testCancelInvoiceDebitNote() {
    $this->assertArrayHasKey(
      'success',
      $this->object->cancelInvoiceDebitNote(array(56789765, 78976567))
    );
  }

  /**
   * @covers \Resellerclub\Billing::getCustomerBalance
   */
  public function testGetCustomerBalance() {
    $this->assertArrayHasKey(
      'success',
      $this->object->getCustomerBalance(67867896)
    );
  }

  /**
   * @covers \Resellerclub\Billing::executeOrderWithoutPayment
   */
  public function testExecuteOrderWithoutPayment() {
    $this->assertArrayHasKey(
      'success',
      $this->object->executeOrderWithoutPayment(array(56789678))
    );
  }

  /**
   * @covers \Resellerclub\Billing::searchCustomerTransaction
   */
  public function testSearchCustomerTransaction() {
    $this->assertArrayHasKey(
      'success',
      $this->object->searchCustomerTransaction(
        array('username' => 'sherlock@example.com')
      )
    );
  }

  /**
   * @covers \Resellerclub\Billing::searchResellerTransaction
   */
  public function testSearchResellerTransaction() {
    $this->assertArrayHasKey(
      'success',
      $this->object->searchResellerTransaction(
        array('username' => 'sherlock@example.com')
      )
    );
  }

  /**
   * @covers \Resellerclub\Billing::getResellerBalance
   */
  public function testGetResellerBalance() {
    $this->assertArrayHasKey(
      'success',
      $this->object->getResellerBalance(56789765)
    );
  }

  /**
   * @covers \Resellerclub\Billing::discountInvoice
   */
  public function testDiscountInvoice() {
    $this->assertArrayHasKey(
      'success',
      $this->object->discountInvoice(
        367867897,
        100,
        'code123',
        'reseller'
      )
    );
  }

  /**
   * @covers \Resellerclub\Billing::addFundsCustomer
   */
  public function testAddFundsCustomer() {
    $this->assertArrayHasKey(
      'success',
      $this->object->addFundsCustomer(
        16789765,
        array(
          'amount' => 1000,
          'description' => 'Bank Payment',
          'transaction-type' => 'credit',
          'transaction-key' => 'code123',
          'update-total-receipt' => TRUE,
        )
      )
    );
  }

  /**
   * @covers \Resellerclub\Billing::addFundsReseller
   */
  public function testAddFundsReseller() {
    $this->assertArrayHasKey(
      'success',
      $this->object->addFundsReseller(
        16789765,
        array(
          'amount' => 2000,
          'description' => 'Cheque Payment',
          'transaction-type' => 'credit',
          'transaction-key' => 'newcode123',
          'update-total-receipt' => FALSE,
        )
      )
    );
  }

  /**
   * @covers \Resellerclub\Billing::addDebitNoteCustomer
   */
  public function testAddDebitNoteCustomer() {
    $this->assertArrayHasKey(
      'success',
      $this->object->addDebitNoteCustomer(
        16789765,
        array(
          'selling-amount' => 100.2,
          'description' => 'Sample Payment',
          'debit-note-date' => time(),
          'transaction-key' => 'newcode123',
          'update-total-receipt' => FALSE,
        )
      )
    );
  }

  /**
   * @covers \Resellerclub\Billing::addDebitNoteReseller
   */
  public function testAddDebitNoteReseller() {
    $this->assertArrayHasKey(
      'success',
      $this->object->addDebitNoteCustomer(
        16789765,
        array(
          'selling-amount' => 100.2,
          'description' => 'Sample Payment',
          'debit-note-date' => time(),
          'transaction-key' => 'newcode123',
          'update-total-receipt' => FALSE,
        )
      )
    );
  }

  /**
   * @covers \Resellerclub\Billing::suspendOrder
   */
  public function testSuspendOrder() {
    $this->assertArrayHasKey(
      'success',
      $this->object->suspendOrder(
        16789765,
        'Unpaid bills.'
      )
    );
  }

  /**
   * @covers \Resellerclub\Billing::unsuspendOrder
   */
  public function testUnsuspendOrder() {
    $this->assertArrayHasKey(
      'success',
      $this->object->unsuspendOrder(16789765)
    );
  }

  /**
   * @covers \Resellerclub\Billing::getCurrentActions
   */
  public function testGetCurrentActions() {
    $this->assertArrayHasKey(
      'success',
      $this->object->getCurrentActions(array('order-id' => array(12345645, 58925632)))
    );
  }

  /**
   * @covers \Resellerclub\Billing::getArchiveActions
   */
  public function testGetArchiveActions() {
    $this->assertArrayHasKey(
      'success',
      $this->object->getArchiveActions(array('order-id' => array(12345645, 58925632)))
    );
  }

  /**
   * @covers \Resellerclub\Billing::getLegalAggrement
   */
  public function testGetLegalAggrement() {
    $this->assertArrayHasKey(
      'success',
      $this->object->getLegalAggrement('customermasteragreement')
    );
  }

  /**
   * @covers \Resellerclub\Billing::getAllowedPaymentGatewayCustomer
   */
  public function testGetAllowedPaymentGatewayCustomer() {
    $this->assertArrayHasKey(
      'success',
      $this->object->getAllowedPaymentGatewayCustomer(56789078, 'AddFund')
    );
  }

  /**
   * @covers \Resellerclub\Billing::getAllowedPaymentGatewayReseller
   */
  public function testGetAllowedPaymentGatewayReseller() {
    $this->assertArrayHasKey(
      'success',
      $this->object->getAllowedPaymentGatewayReseller()
    );
  }

  /**
   * @covers \Resellerclub\Billing::getCurrencyDetails
   */
  public function testGetCurrencyDetails() {
    $this->assertArrayHasKey(
      'success',
      $this->object->getCurrencyDetails()
    );
  }

  /**
   * @covers \Resellerclub\Billing::getCountryList
   */
  public function testGetCountryList() {
    $this->assertArrayHasKey(
      'success',
      $this->object->getCountryList()
    );
  }

  /**
   * @covers \Resellerclub\Billing::getStateList
   */
  public function testGetStateList() {
    $this->assertArrayHasKey(
      'success',
      $this->object->getStateList('IN')
    );
  }

}
