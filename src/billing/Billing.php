<?php

require_once __DIR__ . '/../core/Core.php';

class Billing extends Core {

  public function getCustomerPricing($customerId) {

  }

  public function getResellerPricing($resellerId) {

  }

  public function getResellerCostPricing($resellerId) {

  }

  public function getCustomerTransactionDetails($transactionIds) {
    // Handle array and string
  }

  public function getResellerTransactionDetails($transactionIds) {

  }

  public function payTransactions($invoiceIds, $debitIds) {

  }

  public function cancelInvoiceDebitNote($invoiceIds, $debitIds) {

  }

  public function getCustomerBalance($customerId) {

  }

  public function executeOrderWithoutPayment($invoiceIds, $cancelInvoice = FALSE) {
    
  }

  public function searchCustomerTransaction($options, $page = 1, $count = 10) {

  }

  public function searchResellerTransaction($options, $page = 1, $count = 10) {

  }

  public function getResellerBalance($resellerId) {
    
  }

  public function discountInvoice($invoiceId, $discount, $transactionKey, $role) {
    
  }

  public function addFundsCustomer($customerId, $options) {

  }

  public function addFundsReseller($resellerId, $options) {
    
  }

  public function addDebitNoteCustomer($customerId, $options) {

  }

  public function addDebitNoteReseller($customerId, $options) {
    
  }

  public function suspendOrder($orderId, $reason) {

  }

  public function unsuspendOrder($orderId, $reason) {

  }

  public function getCurrentActions($options, $page = 1, $count = 10) {

  }

  public function getArchiveActions($options, $page = 1, $count = 10) {

  }

  public function getLegalAggrement($type) {

  }

  /**
   * Get allowed payment gateway for a customer
   * 
   * @param int $customerId Customer ID
   * @param string $paymentType Values can be AddFund or Payment.
   * @return array Parsed output of API call
   */
  public function getAllowedPaymentGatewayCustomer($customerId, $paymentType = NULL) {
    $options['customer-id'] = $customerId;
    if (!empty($paymentType)) {
      $options['payment-type'] = $paymentType;
    }
    $apiOut = $this->callApi('pg', 'allowedlist-for-customer', $options);
    return $apiOut;
  }

  /**
   * Get allowed Payment Gateways
   * @return array Parsed output of API call
   */
  public function getAllowedPaymentGatewayReseller() {
    $apiOut = $this->callApi('pg', 'list-for-reseller', array());
    return $apiOut;
  }

  public function getCurrencyDetails() {
    $apiOut = $this->callApi('currency', 'details', array());
    return $apiOut;
  }

  /**
   * Get list of country
   *
   * @see http://manage.resellerclub.com/kb/answer/1746
   * @return array Parsed output of API call
   */
  public function getCountryList() {
    $apiOut = $this->callApi('country', 'list', array());
    return $apiOut;
  }

  /**
   * Get list of states of a given country
   *
   * @see http://manage.resellerclub.com/kb/answer/1747
   * @param string $countryCode 2 letter country code
   * @return array Parsed output of API call
   */
  public function getStateList($countryCode) {
    $apiOut = $this->callApi('country', 'state-list', array(
      'country-code' => $countryCode,
    ));
    return $apiOut;
  }
}
