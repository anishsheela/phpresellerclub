<?php

require_once __DIR__ . '/../core/Core.php';

class Contact extends Core {

  /**
   * Create a contact 
   * @param array $customerDetails
   * @return array
   */
  function createContact($customerDetails) {
    $apiOut = $this->callApi('contacts', 'add', $customerDetails);
    return $apiOut;
  }

  function deleteContact($customerId) {
    $apiOut = $this->callApi('contacts', 'delete', array(
      'contact-id' => $customerId,
    ));
    return $apiOut;
  }

  function editContact($customerId, $customerDetails) {
    $customerDetails['contact-id'] = $customerId;
    $apiOut = $this->callApi('contacts', 'edit', array(
      'contact-id' => $customerDetails,
    ));
    return $apiOut;
  }

}
