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

  public function getBalance($customerId) {

  }

  public function executeOrderWithoutPayment($invoiceIds, $cancelInvoice = FALSE) {
    
  }

  public function searchCustomerTransaction($options, $page = 1, $count = 10) {

  }

  public function searchResellerTransaction($options, $page = 1, $count = 10) {

  }

  public function getResellerBalance($resellerId) {
    
  }
  
}