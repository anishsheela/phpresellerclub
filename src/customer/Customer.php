<?php

require_once __DIR__ . '/../core/Core.php';

class Customer extends Core {

  function createCustomer($customerDetails) {
    $apiOut = $this->callApi('customers', 'signup', $customerDetails);
    return $apiOut;
  }

  function editCustomer($customerId, $customerDetails) {
    $customerDetails['contact-id'] = $customerId;
    $apiOut = $this->callApi('customers', 'modify', $customerDetails);
    return $apiOut;
  }

  function getCustomerByUserName($userName) {
    $customerDetails['username'] = $userName;
    $apiOut = $this->callApi('customers', 'details', $customerDetails);
    return $apiOut;
  }

  function getCustomerByCustomerId($customerId) {
    $customerDetails['customer-id'] = $customerId;
    $apiOut = $this->callApi('customers', 'details-by-id', $customerDetails);
    return $apiOut;
  }

  function generateToken($userName, $password, $ip) {
    $customerDetails['username'] = $userName;
    $customerDetails['passwd'] = $password;
    $customerDetails['ip'] = $ip;
    $apiOut = $this->callApi('customers', 'generate-token', $customerDetails);
    return $apiOut;
  }

  function authenticateToken($token) {
    $customerDetails['token'] = $token;
    $apiOut = $this->callApi('customers', 'authenticate-token', $customerDetails);
    return $apiOut;
  }

  function changePassword($customerId, $newPassword) {
    $customerDetails['customer-id'] = $customerId;
    $customerDetails['new-passwd'] = $newPassword;
    $apiOut = $this->callApi('customers', 'change-password', $customerDetails);
    return $apiOut;
  }

  function generateTemporaryPassword($customerId) {
    $customerDetails['customer-id'] = $customerId;
    $apiOut = $this->callApi('customers', 'temp-password', $customerDetails);
    return $apiOut;
  }

  function searchCustomer($customerDetails, $count = 10, $page = 1) {
    $customerDetails['no-of-records'] = $count;
    $customerDetails['page-no'] = $page;
    $apiOut = $this->callApi('customers', 'search', $customerDetails);
    return $apiOut;
  }

  function forgotPassword($userName) {
    $customerDetails['forgot-password'] = $userName;
    $apiOut = $this->callApi('customers', 'forgot-password', $customerDetails);
    return $apiOut;
  }

  function deleteCustomer($customerId) {
    $customerDetails['customer-id'] = $customerId;
    $apiOut = $this->callApi('customers', 'delete', $customerDetails);
    return $apiOut;
  }

}
