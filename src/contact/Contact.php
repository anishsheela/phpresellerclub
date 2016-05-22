<?php

namespace Resellerclub;

require_once __DIR__ . '/../core/Core.php';

class Contact extends Core {

  /**
   * Creates a contact with given contact details.
   *
   * @see http://manage.resellerclub.com/kb/answer/790
   * @param $contact array Details Contact details array as specified in API docs.
   * @return array Output of the API call.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function createContact($contactDetails) {
    $this->validate('array', 'contact', $contactDetails);
    return $this->callApi(METHOD_POST, 'contacts', 'add', $contactDetails);
  }

  /**
   * Deletes a contact from its ID.
   *
   * @see http://manage.resellerclub.com/kb/answer/796
   * @param $contactId integer ID of contact to delete
   * @return array Output of API call
   * @throws \Resellerclub\ApiConnectionException
   */
  public function deleteContact($contactId) {
    $contactDetails = array('contact-id' => $contactId,);
    $this->defaultValidate($contactDetails);
    return $this->callApi(METHOD_POST, 'contacts', 'delete', $contactDetails);
  }

  /**
   * Modify the details of a contact
   *
   * @see http://manage.resellerclub.com/kb/answer/791
   * @param $contactId array ID of contact to modify.
   * @param $contactDetails array Details of contact according to API docs.
   * @return array Output of API call
   * @throws \Resellerclub\ApiConnectionException
   */
  public function editContact($contactId, $contactDetails) {
    $contactDetails['contact-id'] = $contactId;
    $this->defaultValidate($contactDetails);
    return $this->callApi(METHOD_POST, 'contacts', 'edit', $contactDetails);
  }

  /**
   * Get the contact details by ID.
   *
   * @see http://manage.resellerclub.com/kb/answer/792
   * @param $contactId integer ID of contact to fetch.
   * @return array Output of API call.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function getContact($contactId) {
    $contactDetails['contact-id'] = $contactId;
    $this->defaultValidate($contactDetails);
    return $this->callApi(METHOD_GET, 'contacts', 'details', $contactDetails);
  }

  /**
   * Search for a contact by specified customer.
   *
   * @see http://manage.resellerclub.com/kb/answer/793
   * @param $customerId integer The Customer for which you want to get the Contact Details.
   * @param $contactDetails array Parameters needed to search.
   * @param int $count Number of records to be shown per page.
   * @param int $page Page number.
   * @return array Output of API call.
   * @throws \Resellerclub\ApiConnectionException
   */
  public function searchContact($customerId, $contactDetails, $count = 10, $page = 0) {
    $contactDetails['customer-id'] = $customerId;
    $contactDetails['no-of-records'] = $count;
    $contactDetails['page-no'] = $page;
    $this->defaultValidate($contactDetails);
    return $this->callApi(METHOD_GET, 'contacts', 'search', $contactDetails);
  }
}
