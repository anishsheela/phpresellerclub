<?php

require_once __DIR__ . '/../core/Core.php';

class Contact extends Core {

  /**
   * Create a contact 
   * @param array $contactDetails
   * @return array
   */
  function createContact($contactDetails) {
    if ($this->validate('array', 'contact', $contactDetails)) {
      $apiOut = $this->callApi('contacts', 'add', $contactDetails);
      return $apiOut;
    }
    else {
      throw new Exception('Adding contact failed.', 2001);
    }
  }

  function deleteContact($customerId) {
    $apiOut = $this->callApi('contacts', 'delete', array(
      'contact-id' => $customerId,
    ));
    return $apiOut;
  }

  function editContact($customerId, $contactDetails) {
    $contactDetails['contact-id'] = $customerId;
    $apiOut = $this->callApi('contacts', 'edit', array(
      'contact-id' => $contactDetails,
    ));
    return $apiOut;
  }

  function getContact($customerId) {
    $contactDetails['contact-id'] = $customerId;
    $apiOut = $this->callApi('contacts', 'details', array(
      'contact-id' => $contactDetails,
    ));
  }

  function searchContact($customerId, $contactDetails, $count = 10, $page = 0) {
    $contactDetails['contact-id'] = $customerId;
    $contactDetails['no-of-records'] = $count;
    $contactDetails['page-no'] = $page;
    $apiOut = $this->callApi('contacts', 'search', array(
      'contact-id' => $contactDetails,
    ));
  }

}
