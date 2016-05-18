<?php

namespace Resellerclub;

require_once __DIR__ . '/../core/Core.php';

class Contact extends Core {

  public function createContact($contactDetails) {
    $this->validate('array', 'contact', $contactDetails);
    return $this->callApi(METHOD_POST, 'contacts', 'add', $contactDetails);
  }

  public function deleteContact($customerId) {
    $contactDetails = array('contact-id' => $customerId,);
    $this->defaultValidate($contactDetails);
    return $this->callApi(METHOD_POST, 'contacts', 'delete', $contactDetails);
  }

  public function editContact($customerId, $contactDetails) {
    $contactDetails['contact-id'] = $customerId;
    $this->defaultValidate($contactDetails);
    return $this->callApi(METHOD_POST, 'contacts', 'edit', $contactDetails);
  }

  public function getContact($customerId) {
    $contactDetails['contact-id'] = $customerId;
    $this->defaultValidate($contactDetails);
    return $this->callApi(METHOD_GET, 'contacts', 'details', $contactDetails);
  }

  public function searchContact($customerId, $contactDetails, $count = 10, $page = 0) {
    $contactDetails['contact-id'] = $customerId;
    $contactDetails['no-of-records'] = $count;
    $contactDetails['page-no'] = $page;
    $this->defaultValidate($contactDetails);
    return $this->callApi(METHOD_GET, 'contacts', 'search', $contactDetails);
  }
}
