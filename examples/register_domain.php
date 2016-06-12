<?php

require '../src/index.php';

$domain = new \Resellerclub\Domain;

$customerId = '13647145';
$contactId = '47738316';

$domainDetails = array(
  'years' => '1',
  'ns' => array('ns1.onlyfordemo.net', 'ns2.onlyfordemo.net'),
  'customer-id' => $customerId,
  'reg-contact-id' => $contactId,
  'admin-contact-id' => $contactId,
  'tech-contact-id' => $contactId,
  'billing-contact-id' => $contactId,
  'invoice-option' => 'NoInvoice',
);

$apiOut = $domain->register('example.com', $domainDetails);

var_dump($apiOut);
