<?php

namespace Resellerclub;

require_once __DIR__ . '/../core/Core.php';

class Customer extends Core {

  public function createCustomer($customerDetails) {
    $this->validate('array', 'customer', $customerDetails);
    return $this->callApi(METHOD_POST, 'customers', 'signup', $customerDetails);
  }

  public function editCustomer($customerId, $customerDetails) {
    $customerDetails['customer-id'] = $customerId;
    $this->validate('array', 'customer', $customerDetails);
    return $this->callApi(METHOD_POST, 'customers', 'modify', $customerDetails);
  }

  public function getCustomerByUserName($userName) {
    $customerDetails['username'] = $userName;
    $this->defaultValidate($customerDetails);
    return $this->callApi(METHOD_GET, 'customers', 'details', $customerDetails);
  }

  public function getCustomerByCustomerId($customerId) {
    $customerDetails['customer-id'] = $customerId;
    $this->defaultValidate($customerDetails);
    return $this->callApi(METHOD_GET, 'customers', 'details-by-id', $customerDetails);
  }

  public function generateToken($userName, $password, $ip) {
    $customerDetails['username'] = $userName;
    $customerDetails['passwd'] = $password;
    $customerDetails['ip'] = $ip;
    $this->defaultValidate($customerDetails);
    return $this->callApi(METHOD_POST, 'customers', 'generate-token', $customerDetails);
  }

  public function authenticateToken($token) {
    $customerDetails['token'] = $token;
    $this->defaultValidate($customerDetails);
    return $this->callApi(METHOD_POST, 'customers', 'authenticate-token', $customerDetails);
  }

  public function changePassword($customerId, $newPassword) {
    $customerDetails['customer-id'] = $customerId;
    $customerDetails['new-passwd'] = $newPassword;
    $this->defaultValidate($customerDetails);
    return $this->callApi(METHOD_POST, 'customers', 'change-password', $customerDetails);
  }

  public function generateTemporaryPassword($customerId) {
    $customerDetails['customer-id'] = $customerId;
    $this->defaultValidate($customerDetails);
    return $this->callApi(METHOD_POST, 'customers', 'temp-password', $customerDetails);
  }

  public function searchCustomer($customerDetails, $count = 10, $page = 1) {
    $customerDetails['no-of-records'] = $count;
    $customerDetails['page-no'] = $page;
    $this->defaultValidate($customerDetails);
    return $this->callApi(METHOD_GET, 'customers', 'search', $customerDetails);
  }

  public function forgotPassword($userName) {
    $customerDetails['forgot-password'] = $userName;
    $this->defaultValidate($customerDetails);
    return $this->callApi(METHOD_POST, 'customers', 'forgot-password', $customerDetails);
  }

  public function deleteCustomer($customerId) {
    $customerDetails['customer-id'] = $customerId;
    $this->defaultValidate($customerDetails);
    return $this->callApi(METHOD_POST, 'customers', 'delete', $customerDetails);
  }
}
