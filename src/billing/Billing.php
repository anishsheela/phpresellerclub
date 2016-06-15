<?php

namespace Resellerclub;

require_once __DIR__ . '/../core/Core.php';

/**
 * Billing related API calls.
 * @package Resellerclub
 */
class Billing extends Core {

  /**
   * Get the pricing of customer.
   *
   * @see http://manage.resellerclub.com/kb/answer/864
   * @param $customerId integer Customer ID
   * @return array API call output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function getCustomerPricing($customerId) {
    $options = array(
      'customer-id' => $customerId,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'products', 'customer-price', $options);
  }

  /**
   * Get pricing for reseller.
   *
   * @see http://manage.resellerclub.com/kb/answer/865
   * @param $resellerId integer Reseller ID.
   * @return array API call output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function getResellerPricing($resellerId) {
    $options = array(
      'reseller-id' => $resellerId,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'products', 'reseller-price', $options);
  }

  /**
   * Get the cost pricing of reseller.
   *
   * @see http://manage.resellerclub.com/kb/answer/1029
   * @param $resellerId integer Reseller ID
   * @return array API call output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function getResellerCostPricing($resellerId) {
    $options = array(
      'reseller-id' => $resellerId,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'products', 'reseller-cost-price', $options);
  }

  /**
   * Gets a Customer's Transactions along with their details.
   *
   * @see http://manage.resellerclub.com/kb/answer/868
   * @param $transactionIds mixed Array or a single Transaction ID.
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function getCustomerTransactionDetails($transactionIds) {
    $options = array(
      'transaction-ids' => $transactionIds,
    );
    return $this->callApi(METHOD_GET, 'products', 'customer-transactions', $options);
  }

  /**
   * Gets a Reseller's Transactions along with their details.
   *
   * @see http://manage.resellerclub.com/kb/answer/1155
   * @param $transactionIds mixed Array or a single Transaction ID.
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function getResellerTransactionDetails($transactionIds) {
    $options = array(
      'transaction-ids' => $transactionIds,
    );
    return $this->callApi(METHOD_GET, 'products', 'reseller-transactions', $options);
  }

  /**
   * Pay the transactions using the account balance.
   *
   * @see http://manage.resellerclub.com/kb/answer/871
   * @param $invoiceIds array IDs of invoices.
   * @param $debitIds array Ids of debit Ids
   * @return array API call output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function payTransactions($invoiceIds = array(), $debitIds = array()) {
    $options = array(
      'invoice-ids' => $invoiceIds,
      'debit-ids' => $debitIds,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'billing', 'customer-pay', $options);
  }

  /**
   * Cancel invoice(s) or/and debit note(s).
   *
   * @see http://manage.resellerclub.com/kb/answer/2415
   * @param $invoiceIds array Invoice ids.
   * @param $debitIds array Debit note ids.
   * @return array API Output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function cancelInvoiceDebitNote($invoiceIds = array(), $debitIds = array()) {
    $options = array(
      'invoice-ids' => $invoiceIds,
      'debit-ids' => $debitIds,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'billing', 'cancel', $options, 'customer-transactions');
  }

  /**
   * Get account balance of a customer.
   *
   * @see http://manage.resellerclub.com/kb/answer/872
   * @param $customerId int Customer ID.
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function getCustomerBalance($customerId) {
    $options = array(
      'customer-id' => $customerId,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'billing', 'customer-balance', $options);
  }

  /**
   * Execute an order without payment from customer side.
   *
   * @see http://manage.resellerclub.com/kb/answer/873
   * @param $invoiceIds array Invoice ID(s).
   * @param bool $cancelInvoice TRUE if invoice needs to be cancelled, else FALSE.
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function executeOrderWithoutPayment($invoiceIds, $cancelInvoice = FALSE) {
    $options = array(
      'invoice-ids' => $invoiceIds,
      'cancel-invoice' => $cancelInvoice,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'billing', 'execute-order-without-payment', $options);
  }

  /**
   * Gets a detailed list of Customer's Transactions, matching the search criteria.
   *
   * @see http://manage.resellerclub.com/kb/answer/964
   * @param $options array Search criteria. See reference for options.
   * @param int $page Page number.
   * @param int $count Number of records to fetch.
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function searchCustomerTransaction($options, $page = 1, $count = 10) {
    $options['no-of-records'] = $count;
    $options['page-no'] = $page;
    $this->defaultValidate($options);
    //TODO: Check
    return $this->callApi(METHOD_GET, 'billing', 'search', $options, 'customer-transactions');
  }

  /**
   * Gets a detailed list of Reseller's Transactions, matching the search criteria.
   *
   * @see http://manage.resellerclub.com/kb/answer/1153
   * @param $options array Search criteria. See reference for options.
   * @param int $page Page number.
   * @param int $count Number of records to fetch.
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function searchResellerTransaction($options, $page = 1, $count = 10) {
    $options['no-of-records'] = $count;
    $options['page-no'] = $page;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'billing', 'search', $options, 'reseller-transactions');
  }

  /**
   * Get available account balance of a reseller.
   *
   * @see http://manage.resellerclub.com/kb/answer/1110
   * @param $resellerId int Reseller ID.
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function getResellerBalance($resellerId) {
    $options = array(
      'reseller-id' => $resellerId,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'billing', 'reseller-balance', $options);
  }

  /**
   * Adds a discount for a given invoice.
   *
   * @see http://manage.resellerclub.com/kb/answer/2414
   * @param $invoiceId int Invoice ID to be discounted.
   * @param $discount float Discount amount without tax.
   * @param $transactionKey string A unique transaction key.
   * @param $role string "reseller"/"customer"
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
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

  /**
   * Adds funds in a Customer's Account.
   *
   * @see http://manage.resellerclub.com/kb/answer/1152
   * @param $customerId integer Customer id.
   * @param $options array Details like amount, see reference.
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function addFundsCustomer($customerId, $options) {
    $options['customer-id'] = $customerId;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'billing', 'add-customer-fund', $options);
  }

  /**
   * Adds funds in a Reseller's Account.
   *
   * @see http://manage.resellerclub.com/kb/answer/1151
   * @param $resellerId integer Reseller id.
   * @param $options array Details like amount, see reference.
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function addFundsReseller($resellerId, $options) {
    $options['reseller-id'] = $resellerId;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'billing', 'add-reseller-fund', $options);
  }

  /**
   * Add debit note in a Customer's Account.
   *
   * @see http://manage.resellerclub.com/kb/answer/1166
   * @param $customerId integer Customer id.
   * @param $options array Details like amount, see reference.
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function addDebitNoteCustomer($customerId, $options) {
    $options['customer-id'] = $customerId;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'billing', 'add-customer-debit-note', $options);
  }

  /**
   * Add debit note in a Reseller's Account.
   *
   * @see http://manage.resellerclub.com/kb/answer/1167
   * @param $resellerId integer Reseller id.
   * @param $options array Details like amount, see reference.
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function addDebitNoteReseller($resellerId, $options) {
    $options['reseller-id'] = $resellerId;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'billing', 'add-reseller-debit-note', $options);
  }

  /**
   * Suspend an order, in case the client screws up.
   *
   * @see http://manage.resellerclub.com/kb/answer/1077
   * @param $orderId integer Order Id to suspend.
   * @param $reason string Reason to state for suspension.
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function suspendOrder($orderId, $reason) {
    $options = array(
      'order-id' => $orderId,
      'reason', $reason,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'orders', 'suspend', $options);
  }

  /**
   * Unsuspend an order.
   *
   * @see http://manage.resellerclub.com/kb/answer/1078
   * @param $orderId integer Order ID to unsuspend.
   * @return array API Output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function unsuspendOrder($orderId) {
    $options = array(
      'order-id' => $orderId,
    );
    $this->defaultValidate($options);
    return $this->callApi(METHOD_POST, 'orders', 'unsuspend', $options);
  }

  /**
   * Gets the Current Actions based on the criteria specified.
   *
   * @see http://manage.resellerclub.com/kb/answer/908
   * @param $options array Search parameters. See reference.
   * @param int $page Page number.
   * @param int $count Number of records to fetch.
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function getCurrentActions($options, $page = 1, $count = 10) {
    $options['no-of-records'] = $count;
    $options['page-no'] = $page;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'actions', 'search-current', $options);
  }

  /**
   * Searches the Archived Actions based on the criteria specified.
   *
   * @see http://manage.resellerclub.com/kb/answer/909
   * @param $options array Search parameters. See reference.
   * @param int $page Page number.
   * @param int $count Number of records to fetch.
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function getArchiveActions($options, $page = 1, $count = 10) {
    $options['no-of-records'] = $count;
    $options['page-no'] = $page;
    $this->defaultValidate($options);
    return $this->callApi(METHOD_GET, 'actions', 'search-archived', $options);
  }

  /**
   * Gets the default and customized Legal Agreements.
   *
   * @see http://manage.resellerclub.com/kb/answer/835
   * @param $type string type of legal aggrement. See reference.
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
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

  /**
   * Get a list of approved currencies.
   *
   * @see http://manage.resellerclub.com/kb/answer/1745
   * @return array API output.
   * @throws \Resellerclub\ApiConnectionException
   */
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
