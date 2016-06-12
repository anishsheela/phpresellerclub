<?php

require '../src/index.php';

$contact = new \Resellerclub\Contact;

$contactDetails = array(
  'name' => 'Anish Sheela',
  'company' => 'N/A',
  'email' => 'anishsheela@outlook.com',
  'address-line-1' => '221B Baker St.',
  'city' => 'London',
  'country' => 'IN',
  'zipcode' => '635426',
  'phone-cc' => '91',
  'phone' => '9876543210',
  'customer-id' => '13647145',
  'type' => 'Contact',
);

$apiOut = $contact->createContact($contactDetails);

var_dump($apiOut);
