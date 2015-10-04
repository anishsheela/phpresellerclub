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
    
  }

  function getCustomerByCustomerId($customerId) {
    
  }

  function generateToken($userName, $password, $ip) {
    
  }

  function authenticateToken($token) {
    
  }

  function changePassword($customerId, $newPassword) {
    
  }

  function generateTemporaryPassword($customerId) {
    
  }

  function searchCustomer($count = 10, $page = 1) {
    
  }

  function forgotPassword($userName) {
    
  }

  function deleteCustomer($customerId) {
    
  }

}
