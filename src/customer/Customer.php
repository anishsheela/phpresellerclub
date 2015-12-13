<?php

require_once __DIR__ . '/../core/Core.php';

class Customer extends Core {

  public function createCustomer($customerDetails) {
    if ($this->validate('array', 'customer', $customerDetails)) {
      $apiOut = $this->callApi(METHOD_POST, 'customers', 'signup', $customerDetails);
      return $apiOut;
    }
    else {
      throw new Exception('Adding customer failed.', 3001);
    }
  }

  public function editCustomer($customerId, $customerDetails) {
    $customerDetails['customer-id'] = $customerId;
    if ($this->validate('array', 'customer', $customerDetails)) {
      $apiOut = $this->callApi(METHOD_POST, 'customers', 'modify', $customerDetails);
      return $apiOut;
    }
    else {
      throw new Exception('Editing customer failed.', 3002);
    }
  }

  public function getCustomerByUserName($userName) {
    $customerDetails['username'] = $userName;
    $apiOut = $this->callApi(METHOD_GET, 'customers', 'details', $customerDetails);
    return $apiOut;
  }

  public function getCustomerByCustomerId($customerId) {
    $customerDetails['customer-id'] = $customerId;
    $apiOut = $this->callApi(METHOD_GET, 'customers', 'details-by-id', $customerDetails);
    return $apiOut;
  }

  public function generateToken($userName, $password, $ip) {
    $customerDetails['username'] = $userName;
    $customerDetails['passwd'] = $password;
    $customerDetails['ip'] = $ip;
    $apiOut = $this->callApi(METHOD_POST, 'customers', 'generate-token', $customerDetails);
    return $apiOut;
  }

  public function authenticateToken($token) {
    $customerDetails['token'] = $token;
    $apiOut = $this->callApi(METHOD_POST, 'customers', 'authenticate-token', $customerDetails);
    return $apiOut;
  }

  public function changePassword($customerId, $newPassword) {
    $customerDetails['customer-id'] = $customerId;
    $customerDetails['new-passwd'] = $newPassword;
    $apiOut = $this->callApi(METHOD_POST, 'customers', 'change-password', $customerDetails);
    return $apiOut;
  }

  public function generateTemporaryPassword($customerId) {
    $customerDetails['customer-id'] = $customerId;
    $apiOut = $this->callApi(METHOD_POST, 'customers', 'temp-password', $customerDetails);
    return $apiOut;
  }

  public function searchCustomer($customerDetails, $count = 10, $page = 1) {
    $customerDetails['no-of-records'] = $count;
    $customerDetails['page-no'] = $page;
    $apiOut = $this->callApi(METHOD_GET, 'customers', 'search', $customerDetails);
    return $apiOut;
  }

  public function forgotPassword($userName) {
    $customerDetails['forgot-password'] = $userName;
    $apiOut = $this->callApi(METHOD_POST, 'customers', 'forgot-password', $customerDetails);
    return $apiOut;
  }

  public function deleteCustomer($customerId) {
    $customerDetails['customer-id'] = $customerId;
    $apiOut = $this->callApi(METHOD_POST, 'customers', 'delete', $customerDetails);
    return $apiOut;
  }
}
