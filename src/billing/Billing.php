<?php

namespace Resellerclub;

require_once __DIR__ . '/../core/Core.php';

class Billing extends Core {

  public function getCustomerPricing($customerId) {
    $options = array(
      'customer-id' => $customerId,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'products', 'customer-price', $options);
  }

  public function getResellerPricing($resellerId) {
    $options = array(
      'reseller-id' => $resellerId,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'products', 'reseller-price', $options);
  }

  public function getResellerCostPricing($resellerId) {
    $options = array(
      'reseller-id' => $resellerId,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'products', 'reseller-cost-price', $options);
  }

  public function getCustomerTransactionDetails($transactionIds) {
    // TODO: Check
    // Handles array and string
    return $this->callApi(METHOD_GET, 'products', 'reseller-cost-price', $transactionIds);
  }

  public function getResellerTransactionDetails($transactionIds) {
    // TODO: Check
    return $this->callApi(METHOD_GET, 'products', 'reseller-cost-price', $transactionIds);
  }

  public function payTransactions($invoiceIds = NULL, $debitIds = NULL) {
    $options = array(
      'invoice-ids' => $invoiceIds,
      'debit-ids' => $debitIds,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'billing', 'customer-pay', $options);
  }

  public function cancelInvoiceDebitNote($invoiceIds = NULL, $debitIds = NULL) {
    $options = array(
      'invoice-ids' => $invoiceIds,
      'debit-ids' => $debitIds,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'billing', 'cancel', $options, 'customer-transactions');
  }

  public function getCustomerBalance($customerId) {
    $options = array(
      'customer-id' => $customerId,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'billing', 'customer-balance', $options);
  }

  public function executeOrderWithoutPayment($invoiceIds, $cancelInvoice = FALSE) {
    $options = array(
      'invoice-ids' => $invoiceIds,
      'cancel-invoice' => $cancelInvoice,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'billing', 'execute-order-without-payment', $options);
  }

  public function searchCustomerTransaction($options, $page = 1, $count = 10) {
    $options['no-of-records'] = $count;
    $options['page-no'] = $page;
    $this->defaultValidate($options);
    //TODO: Check
    return $this->callApi(METHOD_GET, 'billing', 'search', $options, 'customer-transactions');
  }

  public function searchResellerTransaction($options, $page = 1, $count = 10) {
    $options['no-of-records'] = $count;
    $options['page-no'] = $page;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'billing', 'search', $options, 'reseller-transactions');
  }

  public function getResellerBalance($resellerId) {
    $options = array(
      'reseller-id' => $resellerId,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'billing', 'reseller-balance', $options);
  }

  public function discountInvoice($invoiceId, $discount, $transactionKey, $role) {
    $options = array(
      'invoice-id' => $invoiceId,
      'discount-without-tax', $discount,
      'transaction-key' => $transactionKey,
      'role' => $role,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'billing', 'customer-processdiscount', $options);
  }

  public function addFundsCustomer($customerId, $options) {
    $options['customer-id'] = $customerId;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'billing', 'add-customer-fund', $options);
  }

  public function addFundsReseller($resellerId, $options) {
    $options['reseller-id'] = $resellerId;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'billing', 'add-reseller-fund', $options);
  }

  public function addDebitNoteCustomer($customerId, $options) {
    $options['customer-id'] = $customerId;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'billing', 'add-customer-debit-note', $options);
  }

  public function addDebitNoteReseller($resellerId, $options) {
    $options['reseller-id'] = $resellerId;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'billing', 'add-reseller-debit-note', $options);
  }

  public function suspendOrder($orderId, $reason) {
    $options = array(
      'order-id' => $orderId,
      'reason', $reason,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'orders', 'suspend', $options);
  }

  public function unsuspendOrder($orderId) {
    $options = array(
      'order-id' => $orderId,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'orders', 'unsuspend', $options);
  }

  public function getCurrentActions($options, $page = 1, $count = 10) {
    $options['no-of-records'] = $count;
    $options['page-no'] = $page;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'actions', 'search-current', $options);
  }

  public function getArchiveActions($options, $page = 1, $count = 10) {
    $options['no-of-records'] = $count;
    $options['page-no'] = $page;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'actions', 'search-archived', $options);
  }

  public function getLegalAggrement($type) {
    $options = array(
      'type' => $type
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'commons', 'legal-agreements', $options);
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
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'pg', 'allowedlist-for-customer', $options);
  }

  /**
   * Get allowed Payment Gateways
   * @return array Parsed output of API call
   */
  public function getAllowedPaymentGatewayReseller() {
    return $this->callApi(METHOD_GET, 'pg', 'list-for-reseller', array());
  }

  public function getCurrencyDetails() {
    return $this->callApi(METHOD_GET, 'currency', 'details', array());
  }

  /**
   * Get list of country
   *
   * @see http://manage.resellerclub.com/kb/answer/1746
   * @return array Parsed output of API call
   */
  public function getCountryList() {
    return $this->callApi(METHOD_GET, 'country', 'list', array());
  }

  /**
   * Get list of states of a given country
   *
   * @see http://manage.resellerclub.com/kb/answer/1747
   * @param string $countryCode 2 letter country code
   * @return array Parsed output of API call
   */
  public function getStateList($countryCode) {
    $options = array(
      'country-code' => $countryCode,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'country', 'state-list', $options);
  }

}
