<?php

namespace Resellerclub;

require_once __DIR__ . '/../core/Core.php';

class Contact extends Core {

  public function createContact($contactDetails) {
    if ($this->validate('array', 'contact', $contactDetails)) {
      $apiOut = $this->callApi(METHOD_POST, 'contacts', 'add', $contactDetails);
      return $apiOut;
    }
    else {
      throw new \Exception('Adding contact failed.', 2001);
    }
  }

  public function deleteContact($customerId) {
    $apiOut = $this->callApi(METHOD_POST, 'contacts', 'delete', array(
      'contact-id' => $customerId,
    ));
    return $apiOut;
  }

  public function editContact($customerId, $contactDetails) {
    $contactDetails['contact-id'] = $customerId;
    $apiOut = $this->callApi(METHOD_POST, 'contacts', 'edit', $contactDetails);
    return $apiOut;
  }

  public function getContact($customerId) {
    $contactDetails['contact-id'] = $customerId;
    $apiOut = $this->callApi(METHOD_GET, 'contacts', 'details', array(
      'contact-id' => $contactDetails,
    ));
    return $apiOut;
  }

  public function searchContact($customerId, $contactDetails, $count = 10, $page = 0) {
    $contactDetails['contact-id'] = $customerId;
    $contactDetails['no-of-records'] = $count;
    $contactDetails['page-no'] = $page;
    $apiOut = $this->callApi(METHOD_GET, 'contacts', 'search', $contactDetails);
    return $apiOut;
  }
}
