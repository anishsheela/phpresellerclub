<?php

require '../src/index.php';

$domain = new \Resellerclub\Domain;

$orderId = '12345678';
$contactId = '47737452';

$contactDetails = array(
  'reg-contact-id' => $contactId,
  'admin-contact-id' => $contactId,
  'tech-contact-id' => $contactId,
  'billing-contact-id' => $contactId,
);

$apiOut = $domain->modifyDomainContacts($orderId, $contactDetails);

var_dump($apiOut);
